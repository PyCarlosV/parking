<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PARQUEADERO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    
<style>
        body {
            background-color: blue;
            background: linear-gradient(to bottom, #44a17d 0, #365e81 100%);
            
        }
        .container {
            margin-top: 55px;
            margin-left: 105px;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
    </style>
    <div class="container">
        <br><br><br>
        <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header text-center"><b>UBICAR VEHICULO</b></div>
            <div class="card-body text-primary">
            <form action="<?php echo site_url('/validar') ?>" method="post">
                <div class="text-center">
                <img src="https://www.itemformacion.com/img/netlog3.png" >
                </div>
                <!--input type="text" name="txtuser" class="form-control" placeholder="Digite su numero de documento" required maxlength="12" minlength="9">
                <br-->
                <input type="password" name="txtpassword" class="form-control" placeholder="Digite la placa de su vehiculo"required maxlength="6" minlength="6" >
                <br>
               <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-outline-primary">Ingresar</button>
            </div>
            </div>
</form>
         </div>
        <div class="col-lg-4">
            
        </div>
        </div>
    </div>



<script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>/js/jquery-3.3.1.min.js"></script>
</body>

</html>