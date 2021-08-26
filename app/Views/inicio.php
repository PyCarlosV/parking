<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/bootstrap.css">
</head>

<body>
    <style>
        body {
            background: linear-gradient(to top, #44a17d 0, #365e81 100%);
        }

        .containerf {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;

        }
    </style>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="http://assets.stickpng.com/images/588a64f5d06f6719692a2d13.png" height="25" alt="" loading="lazy" />
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img src="https://image.flaticon.com/icons/png/512/67/67994.png" height="25" alt="" loading="lazy" />
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="<?php echo base_url('/cliente')   ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="<?php echo base_url('/cliente')   ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="<?php echo base_url('/vehiculo')   ?>">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/login')   ?>">Iniciar sesion</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white container-fluid" style="
      background-image: url('https://www.ciencuadras.com/blog/wp-content/uploads/2019/07/nomas-de-parqueaderos-de-visitantes-1280x720.jpg');
     max-width: 180vh; max-height: 150vh; min-height: 100vh;">
            <h1 class="mb-3 h2">Vick Parking Lot</h1>

            <p>
                Vick Parking Lot es la plataforma flexible y robusta para la administración
                automatizada de parqueaderos públicos, parqueaderos privados, propiedad
                horizontal, centros comerciales, accesos Vehiculares y edificios estatales.

            </p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 container-fluid">
                    <div class="bg-image card shadow-1-strong" style="
      background-image: url('https://mdbootstrap.com/img/new/slides/003.jpg');
    ">
                        <div class="card-body text-white">
                            <h5 class="card-title">Estacionar</h5>
                            <p class="card-text">
                                (Solo en caso que no se le asigne un espacio en la entrada)
                                Queridos clientes, un vez estacione su vehiculo debe registrar el
                                espacio en el que dejo su vehiculo, los espacios estan 
                                organizados por 1. numero de planta, 2. letra de la seccion,
                                3. numero de espacio. Estos datos estan a la vista, Tambien en caso
                                de no encontrar sus vehiculos recuerden que aqui puede ubicarlos y
                                ver los espacios disponibles.
                            </p>
                            <a href="http://localhost/parking/public/publi" class="btn btn-outline-dark  btn-warning">visualizar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-12 container-fluid">
                    
                <br><br>
                    <div class="bg-image card shadow-1-strong" style="
      background-image: url('https://mdbootstrap.com/img/new/slides/003.jpg');
    ">
                        <div class="card-body text-white">
                            <h5 class="card-title"> Ubícanos </h5>
                            <p class="card-text">
                                Estamos enacntado de servirles, nuestras instalaciones se encuentran
                                en Sao Macarena, para mas detalles a cerca de nuestra ubicacion te 
                                invitamos a presionar el boton de mostrar.
                            </p>
                            <button type="button" value='2' data-bs-id='2' class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2">
      mostrar</button>
                        </div>
                    </div>
                </div>
                

        </div>
        </div>
        <br><br><br>
            <footer  class="bg-light text-lg-start">
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>
                        <p>Barranquilla, Colombia</p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-phone"></i></a>
                        <p>+ 57 316 167 21</p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-envelope"></i></a>
                        <p>seigenssama@gmail.com</p>
                    </div>
                </div>
                </div>
                    © 2021 Copyright:
                    <a class="text-dark" href="https://getbootstrap.com/">LaMacarenaTorres.com</a>
                </div>
                
            </footer>
        </div>


        <!--/div-->
        
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mapa </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body  mb-0 p-0 text-center">
      <div id="map-container-google-11" class="z-depth-1-half map-container-6 alingth-center" style="height: 400px">
                            <iframe class="center fluid" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.135162184319!2d-74.8089329851977!3d10.953161192201762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef5d2cbac7aaaab%3A0x3f5c9b9330dd2efd!2sTorres%20De%20La%20Macarena!5e0!3m2!1ses!2sco!4v1628547326255!5m2!1ses!2sco"
                            width="600" height="400" loading="lazy" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-md">Save location <i class="fas fa-map-marker-alt ml-1"></i></button>
      </div>
    </div>
  </div>
</div>

    <!--
            <div class="col-lg-6">
                la suma es: <php print_r(validation(1,2)); ?>
            </div>-->

    <script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
</body>

</html>