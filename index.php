<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA SEARCH 1.0.0</title>
</head>
<body>
    <center>
        
        <h1 style="font-family: timesNewRoman;color: gray;">DATA SEARCH <br><span style="font-size:15px">1.0.0 <span></h1>
        <form action="" method="post">
            <input type="text" name="resultado">
            <button type="submmit">consultar</button>
            <br/>
            <br/>
        </form>
        
        <?php  
        //chamada da classe sql
        //-------------------------------------------------   
            require("configs.php");
            $teste = new sql();
           
            if(isset($_POST["resultado"])):
            $teste->select($_POST["resultado"]);
            unset($_POST["resultado"]);
            else:
                echo "valor invalido";
            endif;
            //-------------------------------------------------
        ?>
    </center>

</body>
</html>