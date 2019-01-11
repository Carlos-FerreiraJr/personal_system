<?php
require('config/configs.php');

$file = 'pedidos/pedidoos.csv';
$pedidos= array();
$pedidosall = new sql();


    

 if(($abrir = fopen($file,"r")) !== false){
    
    while (($data = fgetcsv($abrir,1000,';')) !== false) {
    array_push($pedidos ,$data);
    }
}

$pedidosall->registrar($pedidos);
