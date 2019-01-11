<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php require_once("components/nav.php");?>
    <br>
    <br>
    <center>
       <form action="" method="post">
            <div class="container form-group">
                <label for="exampleFormControlTextarea1">Definir mensagem de whatsapp</label>
                <textarea class="form-control" name="whats" rows="3"></textarea>
                <br>
                <button class="btn btn-warning" type="submit">definir </button>
                </div>
        </form>
    </center>
<?php
   
 
?>
    <?php require_once("scripts/scripts.php");?>
</body>
</html>
