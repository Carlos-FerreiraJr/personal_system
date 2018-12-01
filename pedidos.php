<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <center>
        <form action="" method="post">
            <select name="vendedor">
                <option value="0"</option>
                <option value="1">herlander</option>
                <option value="2">victor</option>
            </select>
            <br>
            <br>
            <button type="submit">consultar</button>
        </form>
    </center>



    <?php  
        //chamada da classe sql
        //-------------------------------------------------   
            require("configs.php");
            $teste = new sql();
           
            $teste->select($_POST["vendedor"]);
            // if(isset($_POST["vendedor"])):
            // if($_POST["vendedor"]===""):
            //         echo "tente inserir algo na busca :)";
            //     endif;
            // $teste->select($_POST["vendedor"]);
            // else:
            //     // echo "<span style='color:red'>" . "insira um pedido";
            // endif;
            //-------------------------------------------------
    ?>
</body>
</html>