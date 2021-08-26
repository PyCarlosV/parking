<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

                .form {
                    min-height:350px;
                }

          </style>
    <div class="content">
                <div class="container">
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <form class="form" action="<?php echo site_url('/singup')?>" method="post">
                            <div class="card card-login">
                                <div class="card-header ">
                                    <div class="card-header ">
                                        <h3 class="header text-center">Registro</h3>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body ">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="Cargo" type="text" name="Cargo" value="" required>
                                        <?php if($validation->getError('Cargo')) {?>
                                            <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('Cargo'); ?>
                                                El campo no cumple con los requisitos
                                            </div>
                                        <?php };?>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="Numero de documento" type="text" name="ndi" value="" required>
                                        <?php if($validation->getError('ndi')) {?>
                                            <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('ndi'); ?>
                                                El campo no cumple con los requisitos
                                            </div>
                                        <?php };?>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="Tipo de documento" type="text" name="idf" value="" required>
                                        <?php if($validation->getError('idf')) {?>
                                            <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('idf'); ?>
                                                El campo no cumple con los requisitos
                                            </div>
                                        <?php };?>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" name="email" value="" required autofocus>
                                        <?php if($validation->getError('email')) {?>
                                            <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('email'); ?>
                                                El campo no cumple con los requisitos
                                            </div>
                                        <?php };?>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                        </div>
                                        <input class="form-control passwordInput" name="password" placeholder="Password" type="password" required>
                                        <?php if($validation->getError('password')) {?>
                                            <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('password'); ?>
                                                El campo no cumple con los requisitos
                                            </div>
                                        <?php };?>
                                        <div class="input-group-append showPassword">
                                            <span class="input-group-text pl-2"><i class="fa fa-eye-slash passIcon" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                        </div>
                                        <input class="form-control passwordInput" name="repassword" placeholder="Confirmar Password" type="password" required>
                                        <?php if($validation->getError('password')) {?>
                                            <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('password'); ?>
                                                El campo no cumple con los requisitos
                                            </div>
                                        <?php };?>
                                        <div class="input-group-append showPassword">
                                            <span class="input-group-text pl-2"><i class="fa fa-eye-slash passIcon" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="card-footer">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-round ">Registrarse</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a href="<?php echo base_url('login') ?>" class="btn btn-link">
                            Iniciar sesion
                        </a>
                        <a href="<?php echo base_url('recu') ?>" class="btn btn-link">
                            Olvide mi contraseña
                        </a>
                    </div>
                </div>
            </div>
        </body>




        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
</body>
</html>