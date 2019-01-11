<?php

    /* ######################################classe sql #################################### */
        class sql extends PDO{
            protected $conn;
            protected $cad;

            function __construct(){
                $this->conn = new PDO("mysql:dbname=testes;host=localhost","root","meugola12#=", array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                    PDO::ATTR_PERSISTENT => false,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                ));
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


                    $ruptura =$resultados["ruptura"];
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

            public function registrar($pedidos = array()){
                $stmt = $this->conn->prepare("insert into pedidos(pedido_magento,data,storeid,status,cliente,forma_de_pagamento,grupo_do_cliente,id_cliente,cnpj,email,telefone,endereco,cidade,cep,produto,sku,qtd,unitario,total,total_do_pedido,status_label,comentario) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                foreach ($pedidos as $orders) {
                    try {
                        $stmt->execute([$orders[0],$orders[1],$orders[2],$orders[3],$orders[4],$orders[5],$orders[6],$orders[7],$orders[8],$orders[9],$orders[10],$orders[11],$orders[12],$orders[13],$orders[14],$orders[15],$orders[16],$orders[17],$orders[18],$orders[19],$orders[20],$orders[21]]);
                    }catch(Exception $e){
                       echo $e->getMessage();
                    }catch(InvalidArgumentException $e){
                        echo $e->getMessage();
                    }
                }
            }
        }
                /* another class teste *****************************************************************************
                    // class Pedidos extends sql{
                    
                    //     public function __construct()
                    //     {
                    //         parent::__construct();
                    //     }


                    //     public function registrar($pedidos = array()){
                    //         // $stmt = $this->conn->prepare("insert into pedidos(pedido_magento,data,status,cliente,forma_de_pagamento,grupo_do_cliente,id_cliente,cnpj,email,telefone,endereco,cidade,cep,produto,sku,qtd,unitario,total,total_do_pedido,status_label,comentario) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    //         // $variable = "12345678910";
                    //         //only edit code below this line
                    //             var_dump($pedidos);
                            
                    //         //only edit code above this line
                    //         // $stmt->execute([$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable,$variable]);
                    //    }

                    // }
                    // $teste = new Pedidos();
                    // $arrayon = array(4,5,6);
                    // $teste->registrar($arrayon);
                /* another class teste *****************************************************************************                
    /* ##################################################################################### */