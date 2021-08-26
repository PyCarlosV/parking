<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTES</title>
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
        
        <h5 class="card-header">Clientes </h5>
        
        <div class="card-body">
         
          <h5 class="card-title">Crear clientes</h5>
        
          <p class="card-text">
          <form  action="<?php echo site_url('/crearclientes')?>" method="post">
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="nombres" class="form-control-label">Nombres</label>
                        <input type="text" name="nombres" class="form-control" id="nombres" aria-describedby="nombres" required>
                        <?php if($validation->getError('nombres')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('nombres'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" aria-describedby="apellidos" required>
                        <?php if($validation->getError('apellidos')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('apellidos'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="tel" id="tel" aria-describedby="tel" required>
                        <?php if($validation->getError('tel')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('tel'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="dire" id="dire" aria-describedby="dire" required>
                        <?php if($validation->getError('dire')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('dire'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">#documento de identidad</label>
                        <input type="text" class="form-control" name="di" id="di" aria-describedby="di" required>
                        <?php if($validation->getError('di')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('di'); ?>
                                El campo no cumple con los requisitos
                            </div>
                        <?php };?>
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