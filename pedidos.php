<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <title>Pedidos</title>
</head>
<body>

    <!-- ######################################requisicao da nav################################# -->
        <div>
            <?php require_once('nav.php')?>
        </div>
    <!-- ########################################################################################### -->

    <br>  
    <br> 

<center>  

    <!-- #############################insercao e consulta de informacao############################## -->
   
        <section class="container-fluid">

            <!-- --- ------------------area de botoes --------------------------- -->
                <p>
                    <button class="btn btn-primary" data-toggle="collapse"data-target="#cadastrar" role="button" aria-expanded="false" >
                        Cadastrar
                    </button>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#consulta" aria-expanded="false" >
                    Consultar
                    </button>
                </p>
            <!-- ________________________________________________________________ -->

            
            
            <!-- --- ------------------area de cadastro --------------------------- -->
                <div class="collapse" id="cadastrar">
                    <div class="card card-body">
                        <form action="" method="post">
                            
                            <label>orders</label>
                            <br>
                            <input type="text" name="orders">
                            <br>
                            <label>nome</label>
                            <br>
                            <input type="text" name="nome">
                            <br>
                            <label>ruptura </label>
                            <br>
                            <select type="text" name="ruptura">
                                <option>Sem Estoque</option>
                                <option>Enviado Parcial</option>
                                <option>Atraso Entrega</option>
                                <option>Boleto em Aberto</option>
                                <option>Perfil ou Cred. não Aprovado</option>
                                <option>Não atende Região</option>
                                <option>Endereço Inconsistente</option>
                                <option>Contato Inválido</option>
                                <option>Entrga/Dia Especifico</option>
                            </select>
                            <br>

                            <label>Seller</label>
                            <br>
                                <input type="text" name="seller">
                            <br>
                            <label>vendedor </label>
                            <br>
                            <select type="text" name="vendedor">
                                <option value="1">Herlander</option>
                                <option value="2">Victor</option>
                            </select>
                            <br>
                            <label>telefone </label>
                            <br>
                            <input type="text" name="telefone">
                            <br>
                            <button type="submit">Cadastrar</button>
                            <?php
                            if(isset($_POST["orders"]) && !empty($_POST["orders"])){
                                require("configs.php");
                                $dados = array($_POST["orders"],$_POST["nome"],$_POST["ruptura"],$_POST["vendedor"],$_POST["telefone"],$_POST["seller"]);
                                $go = new sql();
                                $go->cadastrar($dados);
                                }
                            ?>
                    </form>
                    </div>
                </div>
            <!--__________________________________________________________________ -->



            <!-- --- ------------------area de consulta --------------------------- -->
                <div class="collapse" id="consulta">
                    <div class="card border-sencondary title-card">
                        <h3>Consulta de rupturas</h3> 
                        <form action="" method="get">
                            <select name ="vendedor" class="custom-select custom-select-lg mb-3 border-sencondary">
                                <option selected value="0">selecione um</option>
                                <option value="1">herlander</option>
                                <option value="2">Victor</option>
                            </select>
                            <button class="btn btn-" type="submit">Selecionar</button>
                        <form>
                    </div>
                </div>
            <!--__________________________________________________________________ -->

        </section>

    <!-- ############################################################################################ -->

    <br>
    <br>

    <!-- ################################secao de envio para mysql#################################### -->
        <section class="container-fluid">

            <!-- --- ------------------chamada sql --------------------------- -->
            <?php    
                require("configs.php");
                $teste = new sql();
                if (isset($_GET["vendedor"]) && !empty($_GET["vendedor"])) {    
                        require("configs.php");
                        $teste = new sql();
                        $teste->select($_GET["vendedor"]);
                }elseif(isset($_GET["vendedor"]) && $_GET["vendedor"]==0){
                    echo "<p style='color:red'>voce precisa escolher um vendedor<p>";
                }else{
                    echo "<p class='text-success'>" ."selecione uma opcao" . "<p>";  
                }

            ?>
            <!-- __________________________________________________________________ -->
        </section>
    <!-- ############################################################################################# -->

    <br>
    <br>

    <!-- ##################################chamada de scripts######################################### -->
                <?php require_once('scripts.php')?>
    <!-- ############################################################################################# -->

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
                $(resolver[i]).attr("name","1");
            }else{
                $(resolver[i]).siblings().removeClass('greenalpha');
                $(resolver[i]).removeClass('bg-success');
                $(resolver[i]).addClass('bg-info');
                $(resolver[i]).attr("name","0");

            }
        });
    }  


</script>
</body>
</html>