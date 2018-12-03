<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
 
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







 <label class="col-sm-2 col-form-label">vendedor </label>
                            <select name="vendedor">
                                <option value="1">herlander</option>
                                <option value="2">Victor</option>
                            </select>