<?php

require('config/configs.php');
// send post to another website **********************************
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://menu.com.vc/sheyla.php");
    curl_setopt($ch, CURLOPT_POST, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
            "fromDate=01/01/2019&toDate=01/03/2019");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    echo $server_output;
    //create a new file if not exist and throw
    $fp = fopen('pedidos/pedido.csv','w');
    fwrite($fp,$server_output);


    curl_close ($ch);
    fclose($fp);

if ($server_output) {
    echo"completo";
 } else { 
    echo "erro ao processsar pedido";
}
// ****************************************************************


$file = 'pedidos/pedido.csv';
$pedidos= array();
$pedidosall = new sql();
 
 if(($abrir = fopen($file,"r")) !== false){   
    while (($data = fgetcsv($abrir,1000,';')) !== false) {
    array_push($pedidos ,$data);
        }
}

$pedidosall->registrar($pedidos);

     
?>