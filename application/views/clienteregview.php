<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MEDIS.CL</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/custom.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css');?>" />
	<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/footer/footer.css');?>" />
	
</head>

<body>
<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Secondary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Success card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Danger card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Warning card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-white bg-info mb-3" style="max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Info card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card bg-light mb-3" style="max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Light card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Dark card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>


  <div id="izq"><img src="http://localhost/medis/assets/img/MEDIS_2_300.png" alt="Medis" class="img-rounded"></div>
  <div id="der"><p class="txt1">Registro MEDIS</p>
  <form action="<?=base_url('index.php/ClientesController/nuevo')?>" method="post">
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="text" class="form-control" name="rut" placeholder="Rut" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="text" class="form-control" name="ap_pat" placeholder="Paterno" required>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="ap_mat" placeholder="Materno" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre1" placeholder="Primer Nombre" required>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre2" placeholder="Segundo Nombre" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="telefono" placeholder="Teléfono" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <input type="password" class="form-control" name="pass1" placeholder="Contraseña">
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" name="pass2" placeholder="Reingresar Contraseña">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-12 col-sm-12">
        <button type="submit" class="btn btn-outline-light btn-block">Registrarme</button>
      </div>
    </div>
  </form>
  <br>
  <br>
  <br>
</div>
</body>
</html>
