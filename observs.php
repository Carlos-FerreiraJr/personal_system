<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once("components/nav.php");
    ?>
    <div class ="container">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">registrar informacoes importantes e anuncios</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        <br>
        <button>registrar</button>
    </div>    
    </div>
    <?php 
    require_once("scripts/scripts.php");
    ?>
</body>
</html>