<?php 
//classe de conexao 
class sql extends PDO{
    private $conn;
    function __construct(){
        $this->conn = new PDO("mysql:dbname=testes;host=localhost","root","");/*TODO DADOS DE CONEXAO ENTRE < >*/
    }

//funcao de selecionar os dados 
    function select($idcod){
        $stmt = $this->conn->prepare("select * from clientes where vendedor = ? ");/*TODO dado da tabela */
        $codigo = $idcod;
        $stmt->execute([$codigo]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $resultados) {
             $resultados["telefone"] = "<a href=https://wa.me/55" . $resultados["telefone"] . "?text=credito%20nao%20aprovado >" .$resultados["telefone"] . "</a>"; 
            foreach ($resultados as $key => $value) {
            echo "<i style='color:red'>" . $key ."</i> ::" . $value .   "</br>";
            }
            echo "<br>";
            echo "<br>";
        }

    }   
}