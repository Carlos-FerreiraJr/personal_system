<?php 

    /* ######################################classe sql #################################### */
        class sql extends PDO{
            protected $conn;

            function __construct(){
                $this->conn = new PDO("mysql:dbname=testes;host=localhost","root","meugola12#=");/*TODO DADOS DE CONEXAO ENTRE < >*/
            }

            function select($idcod){
                $stmt = $this->conn->prepare("select * from clientes where vendedor = ? and status = ? order by data_registro ");/*TODO dado da tabela */
         
                switch($idcod){
                    case 3:
                        $codigo = 1;
                        $status = 1;
                    break;
                    case 4:
                        $codigo = 2;
                        $status = 1;
                    break;
                    default:
                    $codigo = $idcod;
                    $status = 0;
                }
                
                $stmt->execute([$codigo,$status]);

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $resultados) {

                    if($resultados["status"] == 1){
                        $color = "bg-success";
                        $colorbody = "greenalpha";
                    }else{
                        $color = "bg-info";
                        $colorbody = "";
                        
                    }

                    $ruptura = $resultados["ruptura"];
                    $ruptura = preg_replace('/\s+/','%20',$ruptura);
                    $resultados["telefone"] = "<a href=https://wa.me/55" . $resultados["telefone"] . "?text=$ruptura>" .$resultados["telefone"] . "</a>"; 
                    echo "<div class='list-group col-md-10'>".
                    "<p class='list-group-item list-group-item-action . $color . resolver'>". $resultados["orders"] . "</p>" . 
                    "<p class='list-group-item list-group-item-action . $colorbody .'>". $resultados["nome"] . "</p>".
                    "<p class='list-group-item list-group-item-action . $colorbody .'>" .$resultados["ruptura"] ."</p>".
                    "<p class='list-group-item list-group-item-action . $colorbody .'>" .$resultados["seller"] ."</p>".
                    "<p class='list-group-item list-group-item-action . $colorbody .'>" .$resultados["telefone"] ."</p>".
                    "<p class='list-group-item list-group-item-action botaoresolver . $colorbody .'>" ."<input class='btn btn-warning type='button' placeholder='resolver' readonly >"."</p>".
                    "</div>". 
                    "<br>";
                }   
            }

            function cadastrar($dados){
                $stmt =  $this->conn->prepare("insert into clientes(orders,nome,ruptura,vendedor,telefone,seller) values(?,?,?,?,?,?)");
                
                  for ($i=0; $i <count($dados); $i++) { 
                      $ped = $dados[0];
                      $nom = $dados[1];
                      $rup = $dados[2];
                      $pro = $dados[3];
                      $ven = $dados[4];
                      $sel = $dados[5];
                  }

                 $stmt->execute([$ped,$nom,$rup,$pro,$ven,$sel]);   
               }

            function Setstatus(){
                    $stmt = $this->conn->prepare("update clientes set status = ? where orders = '100003084'");
                    $teste = 3;
                    $stmt->execute([$teste]);
            }

        }
    
    /* ##################################################################################### */