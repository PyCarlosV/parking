<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTES</title>
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
        
        <h5 class="card-header">Clientes </h5>
        
        <div class="card-body">
         
          <h5 class="card-title">Crear clientes</h5>
        
          <p class="card-text">
          <?php $lista=json_decode($productos,true)?>
          <form  action="<?php echo site_url('/updatecontact')?>" method="post">
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="Nombre" class="form-control-label">Nombres</label>
                        <input type="text" name="Nombre" value="<?php echo $lista['data'][0][1]; ?>" class="form-control" id="Nombre" aria-describedby="Nombre" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">Apellidos</label>
                        <input type="text" value="<?php echo $lista['data'][0][2]; ?>" class="form-control" id="Apellido" name="Apellido" aria-describedby="Apellido" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">Telefono</label>
                        <input type="text" value="<?php echo $lista['data'][0][3]; ?>" class="form-control" name="Telefono" id="Telefono" aria-describedby="telefono" required>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">Dirección</label>
                        <input type="text" value="<?php echo $lista['data'][0][4]; ?>" class="form-control" name="Dirección" id="Dirección" aria-describedby="direccion" required>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="text" class="form-label">#documento de identidad</label>
                        <input type="text" value="<?php echo $lista['data'][0][5]; ?>" class="form-control" name="di" id="di" aria-describedby="di" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <input type="hidden" value="<?php echo $lista['data'][0][0]; ?>" class="form-control " name="idc" id="idc" aria-describedby="idc" required>
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