<?php
defined('BASEPATH') or exit('No direct script access allowed');
//$mensaje = "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/estiloportada.css');?>" />
    <link rel="icon" href="<?=base_url()?>assets/img/favicon.gif" type="image/gif">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <title>Bienvenido a MEDIS</title>
</head>
<body>
  <div id="izq"><img src="<?=base_url("assets/img/MEDIS_2_300_GES_trans.png");?>" alt="Medis" class="img-rounded">
    <div><h2><?php if(isset($mensaje)) echo $mensaje; ?></h2></div>
  </div>
  <div id="der"><p class="txt1">Registro MEDIS</p>
  <form action="<?=base_url("index.php/ClientesNewController/add");?>" method="post">
  <div class="form-group row">
    <input type="hidden" name="id_pers_tipo" class="form-control" style="text-transform:uppercase;text-align:center" size="3" value="4" readonly="readonly" id="id_pers_tipo"/>
  </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="text" class="form-control" name="pers_name1" placeholder="Primer Nombre" required>
      </div>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="pers_name2" placeholder="Segundo Nombre" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="text" class="form-control" name="pers_lastname1" placeholder="Apellido Paterno" required>
      </div>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="pers_lastname2" placeholder="Apellido Materno" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
      </div>
    <div class="col-sm-6">
        <input type="text" class="form-control" oninput="checkRut(this)" id="rut" name="rut" placeholder="Cédula I." required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="pers_user" placeholder="Usuario Medis" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="password" class="form-control" name="pers_password" placeholder="Contraseña" required>
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" name="pers_password2" placeholder="Reingresar Contraseña" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-12 col-sm-12">
        <button type="submit" class="btn btn-outline-light btn-block">Registrarme</button>
        <script src="<?=base_url()?>assets/js/validarRUT.js"></script>
      </div>
    </div>
  </form>
  <br>
  <a class="volver" href=<?=base_url()?>>Volver al Inicio</a>
  <br>
  <br>
</div>
</body>
</html>