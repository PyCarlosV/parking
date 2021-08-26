<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de espacios</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
                            <a class="nav-link" href="<?php echo base_url('/salir')   ?>">Regsar</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>

  <div class="container">
    <div class="card">

      <h5 class="card-header">Espacios disponibles</h5>

      <div class="card-body">

        <h5 class="card-title">Opciones</h5>

        <p class="card-text">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">OP1</th>
              <th scope="col">OP2</th>
              <th scope="col">OP3</th>
              <th scope="col">OP4</th>
              <th scope="col">OP5</th>
              <th scope="col">OP6</th>
            </tr>
          </thead>
          <?php
          $lista = json_decode($productos['productos'], true)
          ?>

          <tbody>
            <?php for ($i = 0; $i <= (count($lista['data']) - 1); $i+=6) { ?>
              <tr>
              <td scope="col"><?php echo ($lista['data'][$i][0]) ?></td>
              <td scope="col"><?php print_r($lista['data'][$i+1][0]) ?></td>
              <td scope="col"><?php print_r($lista['data'][$i+2][0]) ?></td>
              <td scope="col"><?php print_r($lista['data'][$i+3][0]) ?></td>
              <td scope="col"><?php print_r($lista['data'][$i+4][0]) ?></td>
              <td scope="col"><?php print_r($lista['data'][$i+5][0]) ?></td>
              </tr>
            <?php }; ?>
          </tbody>
        </table>
      </div>
      <tr>
      <td scope="col"><button type="button" value='<?php echo ($sesion['vehi']) ?>' data-bs-id='<?php echo ($sesion['user']) ?>' class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="obtener(this)">
                  parquear el vehicuo</button></td>
      <td scope="col"><button type="button" value='<?php echo ($sesion['vehi']) ?>' data-bs-id='<?php echo ($sesion['user']) ?>' class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2" onclick="obtener(this)">
                  Ubicar el vehicuo de <?php echo ($sesion['user']) ?></button></td>
                  </tr>
    </div>
  </div>

  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estacionado en </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="frmdelete" action="<?php echo (base_url('ocupar/')) ?>" method="post">
            Requerde que los codigos se en cuentran escritos a la derecha del espacio correspondiente. <br>
            Estructura del codigo: ¨1.numero de piso o planta + letra de la seccion + numero del puesto¨. <br>
            <label>Placa</label>
            <input type="text" id="txteditarmodal" name="txteditarmodal" class="form-control" value="<?php print_r($sesion['placa']) ?>" readonly>
            <label>Espacio</label>
            <input type="text" id="txtnomremodal" name="txtnomremodal" class="form-control" placeholder="#piso,letra,numero">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Insertar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubicacion </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="frmdelete" action="<?php echo (base_url('/')) ?>" method="get">
          <label>Usuario</label>
            <input type="text" id="txteditarmodal" name="txteditarmodal" class="form-control" value="<?php print_r($sesion['user']) ?>" readonly>
            <label>PLaca del vehiculo</label>
            <input type="text" id="txteditarmodal" name="txteditarmodal" class="form-control" value="<?php print_r($myve['data'][0][0]) ?>" readonly>
            <label>Espacio del vehiculo</label>
            <input type="text" id="txtnomremodal" name="txtnomremodal" class="form-control" value="<?php print_r($myve['data'][0][1]) ?>" readonly>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!----------------------------------------------------------------------------------------------------------->

  <script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
  <script src="<?php echo base_url() ?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url() ?>/js/popper/popper.min.js"></script>
  <script src="<?php echo base_url() ?>/js/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url() ?>/js/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url() ?>/js/datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="<?php echo base_url() ?>/js/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="<?php echo base_url() ?>/js/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="<?php echo base_url() ?>/js/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

  <script src="<?php echo base_url() ?>/js/main.js"></script>
</body>

</html>