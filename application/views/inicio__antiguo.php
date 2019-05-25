<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MEDIS.CL</title>

	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css');?>" />
</head>

<body>
<div class="jumbotron-fluid" align="right">
	<a class="btn btn-primary btn-sm" href="<?=base_url('index.php/Inicio/cerrar_sesion')?>">Cerrar Sesión</a>
</div>
<div class="jumbotron-fluid">
	<div class="row">
		<div class="col-md-4">
		<img src="<?=base_url('assets/img/MEDIS_2_300.png')?>" alt="Medis" class="img-rounded">
		</div>
		<div class="col-md-4" align="center">
			<h2></h2>
			<p> </p>
		</div>
			<div class="col-md-4" align="right">
			<h6><strong>Usuario: <?php echo $_SESSION['pers_user'];?></strong></h6>
			<h6>
			<?php echo $_SESSION['pers_name1'].' '.
					   $_SESSION['pers_name2'].' '.
					   $_SESSION['pers_lastname1'].' '.
					   $_SESSION['pers_lastname2'];?>
			<br>
			<?php $hoy = date("F j, Y, g:i a"); echo 'Fecha: ' . $hoy?></br>
			</h6>
			<h6> PERFIL: <strong>MÉDICO</strong> </h6>
			</div>
			</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MEDIS</a>
  <button class="navbar-toggler" type="button" 
  data-toggle="collapse" 
  data-target="#navbarColor03" 
  aria-controls="navbarColor03" 
  aria-expanded="false" 
  aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Configuración Agenda<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Gestión de Horas</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#">Mi Cuenta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacto</a>
      </li>
	  	  <li class="nav-item">
	  <a class="nav-link" href="<?=base_url('index.php/usuariosController')?>">Modificar Usuarios</a>
	  </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
</body>
</html>
