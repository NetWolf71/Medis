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
	<link rel="icon" href="<?=base_url()?>/assets/img/favicon.gif" type="image/gif">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css');?>" />
	<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/footer/footer.css');?>" />
	
</head>

<body>
<div class="container-fluid" align="right">
	</br><a class="btn btn-danger btn-sm" href="<?=base_url('index.php/Inicio/cerrar_sesion')?>">Cerrar Sesión</a>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		<img src="<?=base_url('assets/img/MEDIS_2_300.png')?>" alt="Medis" class="img-responsive">
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
			<h6> PERFIL: <strong><?php echo $_SESSION['pers_tipo_nombre']; ?></strong> </h6>
			</div>
			</div>
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			  </button>
				  <a class="navbar-brand" href="<?= base_url('index.php/Inicio'); ?>">MEDIS</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
				  <li class="active"><a href="<?= base_url('index.php/Inicio'); ?>">Inicio</a></li>
				  <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Mantenedores
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="<?=base_url('index.php/UsuariosController')?>">Mantenedor de Usuarios</a></li>
					  <li><a href="<?=base_url('index.php/MedicosController')?>">Mantenedor de Médicos</a></li>
					  <li><a href="<?=base_url('index.php/PacientesController')?>">Mantenedor de Pacientes</a></li>
					  <li><a href="<?=base_url('index.php/InstitucionesController')?>">Instituciones Médicas</a></li>
					  <li><a href="#">Especialidades Médicas</a></li>
					</ul>
				  </li>
				  <li><a href="<?=base_url('index.php/calendario/cal')?>">Reservar Hora</a></li>
				  <li><a href="#">Mis Reservas</a></li>
				  <li><a href="#">Mi Cuenta</a></li>
				  <li><a href="#">Contáctanos</a></li>
				</ul>
			  </div>
			  </div>
			</nav>
			</div>