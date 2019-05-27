 <?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MEDIS.CL - Bienvenido</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/custom.js'); ?>"></script>
	<link rel="icon" href="<?=base_url()?>/assets/img/favicon.gif" type="image/gif">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css');?>" />
	<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/footer/footer.css');?>" />
</head>
<body>

<span style="font-size:12px;">
	<div class="container-fluid" align="center">
		<div class="row">
			<div class="col-md-12"></br>
				<img src="<?=base_url('assets/img/MEDIS_2_300_GES_trans.png')?>" alt="Medis">
			</div>
		</div></br>
	</div>
	<div class="container">

			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="well">
					<form role="form" method="post" action="<?=base_url();?>">
						<div class="form-group"></br></br>
							<label for="txt_loginUser">USUARIO</label>
							<input type="text" class="form-control" id="txt_loginUser" name="txt_loginUser" size="60" />
						</div>

						<div class="form-group">
							<label for="pass_loginUser">PASSWORD</label>
							<input type="password" class="form-control" id="pass_loginUser" name="pass_loginUser" />
						</div>
						<button type="submit" class="btn btn-sm btn-danger">ENTRAR</button></br></br></br>
								<?php if (validation_errors()) {?>
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<p><?php echo validation_errors('<div class="error">', '</div>'); ?></p>
									</div>
								<?php
								}
								?>
						<div class="col-md-4">
						</div>
					</form>
					</div>
				</div>
			</div>
			
	</div>
	<div class="container" align="center">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4"><hr/>
			  <h5>Si no tiene una cuenta MEDIS, obtenga una gratis registrándose <a class="btn btn-sm btn-warning" href="<?=base_url('index.php/ClientesNewController')?>"><strong>  Aquí </a></strong></h5>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
</span>		
</body>
</html>