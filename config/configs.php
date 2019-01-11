<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function($nome_classe){
        if(file_exists($nome_classe .".php")):
            require_once($nome_classe .".php");
        elseif(file_exists("class" .DIRECTORY_SEPARATOR. $nome_classe . ".php")):
            require_once("class" . DIRECTORY_SEPARATOR. $nome_classe . ".php");
        endif;
});


