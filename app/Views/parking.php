<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de registro</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/bootstrap.css">
</head>
<body>
<style>
            body {
            background: linear-gradient(to bottom, #44a17d 0, #365e81 100%);
            }
            .container {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            
                }

            .card{
                min-height:350px;
      min-width: 1000px;
            }

          </style>

    <div class="container">
    <div class="card">
        
        <h5 class="card-header">Lista de parqueadero </h5>
        
        <div class="card-body">
         
          <h5 class="card-title">parqueadero</h5>
        
          <p class="card-text">
         
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Marca</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha de entrada</th>
                            <th scope="col">Fecha de salida</th>
                            <th scope="col">Hora entrada</th>
                            <th scope="col">Hora salida</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Tarifa</th> 
                            <th scope="col">Total</th>
                            <!--<th scope="col">Actions</th>-->
        </tr>
    </thead>
    <?php
$lista=json_decode($productos,true);
?>
  <tbody>
  <?php for ($i=0; $i <=(count($lista['data'])-1) ; $i++) {?>
  <tr>
  <td scope="col"><?php print_r($lista['data'][$i][0])?></td>
  <td scope="col"><?php print_r($lista['data'][$i][1])?></td>
  <td scope="col"><?php print_r($lista['data'][$i][2])?></td>
  <td scope="col"><?php print_r($lista['data'][$i][3])?></td>
  <td scope="col"><?php print_r($lista['data'][$i][4])?></td>
  <td scope="col"><?php print_r($lista['data'][$i][5])?></td>
  <td scope="col"><?php print_r($lista['data'][$i][6])?></td>
  <td scope="col"><?php print_r($lista['data'][$i][7])?></td>
  <td scope="col"><?php print_r($lista['data'][$i][8])?></td>
  </tr>
            <?php };?>
  </tbody>
               
    </div>
      </div>
    </div>
     

<script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
</body>
</html>