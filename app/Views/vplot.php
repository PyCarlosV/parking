<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de vehiculos</title>
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
        
        <h5 class="card-header">Lista de vehiculos </h5>
        
        <div class="card-body">
         
          <h5 class="card-title">vehiculos</h5>
        
          <p class="card-text">
         
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
                            <th scope="col">placa</th>
                            <th scope="col">modelo</th>
                            <th scope="col">color</th>
                            <th scope="col">fecha de entrada</th>
                            <th scope="col">Hora de entrada</th>
                            <th scope="col">acciones</th>
        </tr>
    </thead>
    <?php
$lista=json_decode($productos,true)
?>
  <tbody>
  <?php   for ($i=0; $i <=(count($lista['data'])-1) ; $i++) {?>
        <tr>
        <td scope="col"><?php print_r($lista['data'][$i][0])?></td>
        <td scope="col"><?php print_r($lista['data'][$i][1])?></td>
        <td scope="col"><?php print_r($lista['data'][$i][2])?></td>   
        <td scope="col"><?php print_r($lista['data'][$i][3])?></td>
        <td scope="col"><?php print_r($lista['data'][$i][4])?></td>
        <td scope="col"><?php print_r($lista['data'][$i][5])?></td>     
        <td scope="col"><button type="button" value='<?php echo ($lista['data'][$i][0]) ?>' data-bs-id='<?php echo ($lista_['data'][$i][0]) ?>' class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2" onclick="obtener(this)">
      Editar</button><!--<a href="< ?php echo base_url('edit/'.$lista['data'][$i][0]) ?>" class="btn btn-info">editar</a>-->
        /<!--------------------------------------LLAMAR EL MODAL DE ELIMINAR----------------------------------->
      <button type="button" value='<?php echo ($lista['data'][$i][0]) ?>' data-bs-id=<?php echo ($lista['data'][$i][0]) ?> class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="obtenerID(this)">
      Eliminar</button>
</td>
        </tr>
        <?php };?>
  </tbody>
    <!--<div class="col-lg-6">
      la suma es: <php print_r(validation(1,2)); ?>
    </div>-->    
    </div>
      </div>
    </div>
    <!--------------------------------------MODAL DE ELIMINAR---------------------------------------------------->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminacion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="frmdelete" action="<?php echo (base_url('deletev/')) ?>"  method="get">
          ¿esta seguro de eliminar al clienet cuyo registro es?
          <input type="text" id="txtideliminar" name="txtideliminar" class="form-control" readonly>
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-danger">Eliminar</button>
       
        <button class="btn btn-dark"> "Cancelar"</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edicion </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="frmdelete" action="<?php echo( base_url('updatevehi/'))?>"  method="POST">
          ¿esta seguro de editar un contacto cuyo registro es?
          <label>Id</label>
          <input type="text" id="txteditarmodal" name="txteditarmodal" class="form-control" readonly>
          <label>placa</label>
          <input type="text" id="txtplacamodal" name="txtplacamodal" class="form-control" >
          <label>modelo</label>
          <input type="text" id="txtmodemodal" name="txtmodemodal" class="form-control" >
          <label>color</label>
          <input type="text" id="txtcolmodal" name="txtcolmodal" class="form-control" >
          <label>fecha</label>
          <input type="text" id="txtfechamodal" name="txtfechamodal" class="form-control" >
          <label>hora</label>
          <input type="text" id="txthoramodal" name="txthoramodal" class="form-control" >
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-danger">Editar</button>
       
        <button class="btn btn-dark"> Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
    <script>
      //////////////////////////////////////////////////
      function obtenerID(td) {
        selectedRow = td.parentElement.parentElement;
        
        document.getElementById('txtideliminar').value =selectedRow.cells[0].innerHTML
        }

      //////////////////////////////////////////////////
       











       
        function obtener(td) {
        selectedRow = td.parentElement.parentElement;
        
        document.getElementById('txteditarmodal').value =selectedRow.cells[0].innerHTML
        document.getElementById('txtplacamodal').value =selectedRow.cells[1].innerHTML
        document.getElementById('txtmodemodal').value =selectedRow.cells[2].innerHTML
        document.getElementById('txtcolmodal').value =selectedRow.cells[3].innerHTML
        document.getElementById('txtfechamodal').value =selectedRow.cells[4].innerHTML
        document.getElementById('txthoramodal').value =selectedRow.cells[5].innerHTML
        }
       
        /////////////////////////////////////////////////////////////
    </script>

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