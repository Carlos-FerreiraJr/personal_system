<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/grafico1.gif"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> EVOLUTION DATA CONTROL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</head>
<body>
    <!-- ######################################requisicao da nav################################# -->
        <div>
            <?php require_once('nav.php')?>
        </div>
    <!-- ######################################################################################## -->

    <!-- ######################################requisicao do header############################## -->
        <?php require_once('header.php')?>
    <!-- ######################################################################################## -->

    <!-- ##############################################chart##################################### -->
        <div style="margin:0 auto;max-width:70%">
            <canvas id="myChart"></canvas>
        <div>
    <!-- ######################################################################################## -->
    <script>


        nome0 = "Herlander";
        nome1 = "Victor";
        nome3 = "teste";

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
        labels: [nome0, nome1,nome3],
        datasets: [{
            label: "Rupturas",
            backgroundColor:'#FDAA24',
            borderColor: '#75D6C8',
            data: [280,160,40, 60],
            }]
        },
            // Configuration options go here
            options: {}
        });

    
    
    </script>

  <?php require_once('scripts.php')?>
</body>
</html>