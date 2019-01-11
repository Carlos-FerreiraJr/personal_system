<?php 
// var_dump($_POST);
foreach ($_POST as $key => $value) {
    $ordernum = $key . $value;
}

if(isset($ordernum) && !empty($ordernum)){
    $teste = new resolver();
    $teste->Setstatus($ordernum);
}

/*todo*/
//  substituir por namespace da classe sql 
class resolver extends PDO{
    protected $conn;

    function __construct(){
        $this->conn = new PDO("mysql:dbname=testes;host=localhost","root","meugola12#=", array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ));
    }

    function Setstatus($ordernum){
        $stmt = $this->conn->prepare("update clientes set status = ? where orders = ?");
        $status = 1;
        $order = $ordernum;
        $stmt->execute([$status,$order]);
    }

}



