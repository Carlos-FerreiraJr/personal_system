<?php 
//classe de conexao 
class sql extends PDO{
    private $conn;
    function __construct(){
        $this->conn = new PDO("mysql:dbname=testes;host=localhost","root","");
    }

//funcao de selecionar os dados 
    function select($idcod){
        $stmt = $this->conn->prepare("select * from clientes where orders = ? ");
        $codigo = $idcod;
        $stmt->execute([$codigo]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $resultados) {
            foreach ($resultados as $key => $value) {
            echo "<i style='color:red'>" . $key ."</i> ::" . $value . "</br>";
            }
        }
    }
}