<?php 
    /* ######################################classe sql #################################### */
        class sql extends PDO{
            private $conn;

            function __construct(){
                $this->conn = new PDO("mysql:dbname=testes;host=localhost","root","meugola12#=");/*TODO DADOS DE CONEXAO ENTRE < >*/
            }

            function select($idcod){
                $stmt = $this->conn->prepare("select * from clientes where vendedor = ? ");/*TODO dado da tabela */
                $codigo = $idcod;
                $stmt->execute([$codigo]);

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $resultados) {
                    $ruptura = $resultados["ruptura"];
                    $ruptura = preg_replace('/\s+/','%20',$ruptura);
                    $resultados["telefone"] = "<a href=https://wa.me/55" . $resultados["telefone"] . "?text=$ruptura>" .$resultados["telefone"] . "</a>"; 
                    echo "<div class='list-group col-md-10'>".
                    "<p class='list-group-item list-group-item-action bg-info' id='resolver'>". $resultados["orders"] . "</p>" . 
                    "<p class='list-group-item list-group-item-action'>". $resultados["nome"] . "</p>".
                    "<p class='list-group-item list-group-item-action'>" .$resultados["ruptura"] ."</p>".
                    "<p class='list-group-item list-group-item-action'>" .$resultados["telefone"] ."</p>".
                    "<p class='list-group-item list-group-item-action' id='botaoresolver'>" ."<input class='btn btn-warning type='button' placeholder='resolver' >"."</p>".
                    "</div>". 
                    "<br>";
                }   
            }

            function cadastrar($dados){
                $stmt =  $this->conn->prepare("insert into clientes(orders,nome,ruptura,vendedor,telefone) values(?,?,?,?,?)");
                
                  for ($i=0; $i <count($dados); $i++) { 
                      $ped = $dados[0];
                      $nom = $dados[1];
                      $rup = $dados[2];
                      $pro = $dados[3];
                      $ven = $dados[4];
                  }

                 $stmt->execute([$ped,$nom,$rup,$pro,$ven]);   

                   
               }
            
        }

        // $go = new sql();
        // $dados = array('rewrewrew','nbnnnn','pita','2','2222');
        // $go->cadastrar($dados);
    /* ##################################################################################### */