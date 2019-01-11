<html>
<head>
</head>
<body>
    


<div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Relatório de Vendas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" lpformnum="1" method="POST" action="https://menu.com.vc/sheyla.php">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">De:</label>
                        <input type="date" name="fromDate" value="<?php echo date('Y-m-d', strtotime('-4 day')); ?>">
                        </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Até:</label>
                        <input type="date" name="toDate" class="form-control" value="<?php echo date('Y-m-d', strtotime('now')); ?>" >
                    </div>
                </div>
                
                <!-- /.box-body -->
		<br>
                <div class="box-footer">
                    <button id ="gol" type="submit" class="btn btn-primary">Download</button>
                </div>
            </form>
        </div>
    </div>
    <?php require('scripts/scripts.php') ?>
<script>
    $(function() {
    $('#gol').click();
    });
</script>
</body>
</html>