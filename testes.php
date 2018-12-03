<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
       orders
      <input type="text" name="orders">
      <br>
      nome
      <input type="text" name="nome">
      <br>
      ruptura
      <input type="text" name="ruptura">
      <br>
      vendedor
      <input type="text" name="vendedor">
      <br>
      telefone
      <input type="text" name="telefone">
      <button type="submit">clique</button>


      <?php
      if(isset($_POST["orders"]) && !empty($_POST["orders"])){
          require("configs.php");
          $dados = array($_POST["orders"],$_POST["nome"],$_POST["ruptura"],$_POST["vendedor"],$_POST["telefone"]);
          $go = new sql();
          $go->cadastrar($dados);
        }
      ?>
</form>
</body>
</html>