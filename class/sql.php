<?php 
    /* ######################################classe sql #################################### */
        class sql extends PDO{
            private $conn;

            function __construct(){
                $this->conn = new PDO("mysql:dbname=testes;host=localhost","root","");/*TODO DADOS DE CONEXAO ENTRE < >*/
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
    
        }
    /* ##################################################################################### */