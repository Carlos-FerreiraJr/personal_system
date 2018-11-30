<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <!-- <form action="" method="post">
    <center>
        <p>cadastrar pedido com problema</p>
        <input type="text" name="cad">
        <br>
        <textarea name="problema" id="" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">cadastrar</button>
    </center>
    </form> -->
  

    <br>
    <br>
    <br>

    <form action="" method="post">

        <center>
            <p>consultar pedido especifico</p>
            <input type="text" name="resultado">
            <br>
            <br>
            <button type="submmit">consultar</button>
            <br/>
            <br/>
            <!-- <p>consultar por vendedores</p>
            <input type="text"> -->

            <!-- <select name="vendedor">
                <option value="herlander">herlander</option>
                <option value="victor">Victor</option>
            </select> -->
        </center>
    </form>


    <br>
    <br>
    <br>



     <!-- <form action="" method="post">
        <center>
            <p>Alterar problema</p>
            <input type="text" name="resultado">
            <br>
            <textarea name="problema" id="" cols="30" rows="10"></textarea>
            <button type="submmit">consultar</button>
            <br/>
            <br/>
        </center>
    </form> -->


    <?php  
        //chamada da classe sql
        //-------------------------------------------------   
            require("configs.php");
            $teste = new sql();
           
            if(isset($_POST["resultado"])):
            if($_POST["resultado"]===""):
                    echo "tente inserir algo na busca :)";
                endif;
            $teste->select($_POST["resultado"]);
            else:
                // echo "<span style='color:red'>" . "insira um pedido";
            endif;
            //-------------------------------------------------
    ?>
</body>
</html>