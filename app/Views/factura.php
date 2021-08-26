<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURA</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/bootstrap.css">
    <?php $validation = \Config\Services::Validation();?>
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
        
        <h5 class="card-header">Factura </h5>
        
        <div class="card-body">
         
          <h5 class="card-title">Registro de Factura</h5>
        
          <p class="card-text">
            <form id="form" action="<?php echo site_url('/crearfactura')?>" method="post">
                <div class="row">
               
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="entrance" class="form-label">fecha de salida</label>
                        <input type="date" class="form-control" id="tieent" name="tieent" aria-describedby="tieent" min="2018-01-01" max="2021-12-31">
                        <?php if($validation->getError('tieent')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('tieent'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="departure" class="form-label">Hora de salida</label> </label>
                        <input type="time" class="form-control" name="tiesal" id="tiesal" required> 
                        <?php if($validation->getError('tiesal')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('tiesal'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control" id="tot" name="tot" aria-describedby="tot" required>
                        <?php if($validation->getError('tot')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('tot'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">Caja</label>
                        <input type="text" class="form-control" id="caja" name="caja" aria-describedby="caja" required>
                        <?php if($validation->getError('caja')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('caja'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                    </div>
                    <?php 
                                    $lista=json_decode($productos,true);
                            ?>
                    <div class="form-group col-md-4 col-sm-12">
                                <label for="date" class="form-label">Placa del vehiculo</label><br>
                                <input type="text" class="form-control" id="idr" name="idr" aria-describedby="idr" required>
                                <?php if($validation->getError('idr')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('idr'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                            </div>
                            <div class="form-group col-md-2 col-sm-12">
                                <label for="date" class="form-label hidden">placas</label><br>
                                <select id='dic' name="dic">
                                    <option value="0" selected> </option>
                                    <?php $a =0;
                                    for ($i=0; $i <=(count($lista['data'])-1) ; $i++) {?>
                                        <option value="<?php echo $a ?>"><?php echo $lista['data'][$i][1] ?></option>
                                    <?php };?>
                                </select>
                            </div>
                    
                
                </div>
                <br>
                    <button  type="submit" class="btn btn-primary" onclick="">Enviar</button>
                </form>
            </p>
            
            
    </div>
      </div>
    </div>

<script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
</body>
</html>