<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEHICULOS</title>
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

        .card {
            min-height:350px;
      min-width: 1000px;
        }
    </style>

        <div class="container">
            <div class="card">

                <h5 class="card-header">Vehiculos </h5>

                <div class="card-body">

                    <h5 class="card-title">Crear vehiculos</h5>

                    <p class="card-text">
                    <form id="form" action="<?php echo site_url('/crearvehiculo') ?>" method="post">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="text" class="form-control-label">Placa</label>
                                <input type="text" name="placa" class="form-control" id="placa" aria-describedby="placa" required>
                                <?php if($validation->getError('placa')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('placa'); ?>
                                        El campo no cumple con los requisitos
                                    </div>
                                <?php };?>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="text" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" aria-describedby="modelo" required>
                                <?php if($validation->getError('modelo')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('modelo'); ?>
                                        El campo no cumple con los requisitos
                                    </div>
                                <?php };?>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="text" class="form-label">Color</label>
                                <input type="text" class="form-control" name="color" id="color" aria-describedby="color" required>
                                <?php if($validation->getError('color')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('color'); ?>
                                        El campo no cumple con los requisitos
                                    </div>
                                <?php };?>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="date" class="form-label">Fecha de entrada</label>
                                <input type="date" value="" class="form-control" name="entrada" id="entrada" aria-describedby="entrada" min="2018-01-01" max="2021-12-31">
                                <?php if($validation->getError('entrada')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('entrada'); ?>
                                        El campo no cumple con los requisitos
                                    </div>
                                <?php };?>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="date" class="form-label">Hora de entrada</label>
                                <input type="time" class="form-control" id="salida" name="salida" required>
                                <?php if($validation->getError('salida')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('salida'); ?>
                                        El campo no cumple con los requisitos
                                    </div>
                                <?php };?>
                            </div>


                            <div class="form-group col-md-4 col-sm-12">
                                <label for="date" class="form-label">#DI del cliente</label><br>
                                <input type="text" class="form-control" id="di" name="di" aria-describedby="di" required>
                                <?php if($validation->getError('di')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('di'); ?>
                                        El campo no cumple con los requisitos
                                    </div>
                                <?php };?>
                            </div>
                            <?php 
                                    $lista=json_decode($productos,true);
                            ?>
                            <div class="form-group col-md-2 col-sm-12">
                                <label for="date" class="form-label hidden">clientes</label><br>
                                <select id='dic' name="dic">
                                    <option value="0" selected> </option>
                                    <?php $a =0;
                                    for ($i=0; $i <=(count($lista['data'])-1) ; $i++) {?>
                                        <option value="<?php echo $a ?>"><?php echo $lista['data'][$i][5] ?></option>
                                    <?php };?>
                                </select>
                            </div>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" onclick="">Enviar</button>
                    </form>
                    </p>


                </div>
            </div>
        </div>
<!--
            <div class="col-lg-6">
                la suma es: <php echo $ns; ?>
            </div>-->

        <script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
</body>

</html>