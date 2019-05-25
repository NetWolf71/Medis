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
<div class="jumbotron text-center">
  <h1></h1>
</div>
<div id="container">
	<h1></h1>
	<div class="container" align=center>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<img src="<?=base_url('assets/img/MEDIS_2_300_GES.png')?>" alt="Medis" class="img-rounded">
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<div id="body">
<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<form role="form" method="post" action="<?=base_url();?>">
				<div class="form-group">
					 </br>
					<label for="txt_loginUser">
						USUARIO
					</label>
					<input type="text" class="form-control" id="txt_loginUser" name="txt_loginUser" />
				</div>
				<div class="form-group">
					 
					<label for="pass_loginUser">
						PASSWORD
					</label>
					<input type="password" class="form-control" id="pass_loginUser" name="pass_loginUser" />
				</div>
				<button type="submit" class="btn btn-info">
					Entrar
				</button>
				</br>
				<?php
				if (validation_errors()) {
				
				?>
				<div class="container-fluid" >
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissable">
								 
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									×
								</button>
								<h4>
									<?php echo validation_errors('<div class="error">', '</div>'); ?>
								</h4> 
							</div>
						</div>
					</div>
				</div>

				<?php
				}
				?>
			</form>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<div class="container" id="" align="center">
  <br/><br/>
  <p><small> (c) Medis Group - Santiago, Chile 2018</small>
</div>
<div class="container" id="" >
<table class="table table-bordered">
<br>
<br><br><br><br><br>
<tr>
	<th>ID</th>
	<th>Nombre</th>
	<th>Segundo Nombre</th>
	<th>Apellido Paterno</th>
	<th>Apellido Materno</th>
	<th>Nombre Usuario</th>
	<th>Password Usuario</th>
	<th>Fecha Creacion</th>
	<th>Vigente</th>
	<th>Email</th>
</tr>

<?php
   foreach ($consulta->result() as $fila) { ?>
	<tr>	
		<td><?= $fila->id_pers?></td>
		<td><?= $fila->pers_name1?></td>
		<td><?= $fila->pers_name2?></td>
		<td><?= $fila->pers_lastname1?></td>
		<td><?= $fila->pers_lastname2?></td>
		<td><?= $fila->pers_user?></td>
		<td><?= $fila->pers_password?></td>
		<td><?= $fila->pers_fecha_creacion?></td>
		<td><?= $fila->pers_vigencia?></td>
		<td><?= $fila->email?></td>
	</tr>
   <?php
   }
?>
</table> 
</div>

 </div>
 </div>

</body>
</html>



