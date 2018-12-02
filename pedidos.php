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
    
<div>
      <?php require_once('nav.php')?>
<div>

    <br>  
    <br> 


<center>  

    <section class="container-fluid">
    <div class="card border-sencondary title-card">
        <h3>Consulta de rupturas</h3> 
    <div>
     <!-- formulario de consulta -->
    <div class="card-body">
    <form action="" method="post">
        <select name ="vendedor" class="custom-select custom-select-lg mb-3 border-sencondary">
            <option selected value="0">selecione um</option>
            <option value="1">herlander</option>
            <option value="2">Victor</option>
        </select>
        <button class="btn btn-" type="submit">Selecionar</button>
        <form>
    <div>
    </section>

    <section class="container-fluid">
    <br>
    <br>
     <!-- progresso nas rupturas -->

    <!-- <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
    </div> -->

    <?php  

        //chamada da classe sql
        //-------------------------------------------------   
        require("configs.php");
        $teste = new sql();
        if (isset($_POST["vendedor"])) {
            if ($_POST["vendedor"]==0){
                echo "<p style='color:red'>voce precisa escolher um vendedor<p>";    
            }else{
                require("configs.php");
                $teste = new sql();
                $teste->select($_POST["vendedor"]);
            }
        }
            //-------------------------------------------------
    ?>
    
     <?php require_once('scripts.php')?>
    </section>
</center>






<script>

    resolver = document.querySelectorAll('#resolver');
    botao = document.querySelectorAll('#botaoresolver');

for (let i = 0; i < resolver.length; i++) {
    $(botao[i]).click(function(){
    if($(resolver[i]).hasClass('bg-info')){
        $(resolver[i]).siblings().addClass('greenalpha');
        $(resolver[i]).removeClass('bg-info');
        $(resolver[i]).addClass('bg-success');
    }else{
        $(resolver[i]).siblings().removeClass('greenalpha');
        $(resolver[i]).removeClass('bg-success');
        $(resolver[i]).addClass('bg-info');
    }
    });
}
  
</script>
</body>
</html>