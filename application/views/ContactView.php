<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
	<div class="container-fluid">		<div class="row">			<div class="col-md-4">			</div>				<div class="col-md-4">					<form role="form" action="<?=base_url('index.php/ContactController');?>" method="post">						<div class="panel panel-danger">							<div class="panel-heading"><strong><h5>FORMULARIO DE CONTACTO</h5></strong></div>								<div class="panel-body">										<div class="form-group">
											<label for="InputEmail"> Email address </label>												<input type="email" class="form-control" id="InputEmail" name="InputEmail"/>													<?php if (form_error('InputEmail')){ ?>													  <div class="alert alert-danger alert-dismissible">														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>														<strong><?=form_error('InputEmail'); ?></strong></div>													<?php } ?>										</div>
										<div class="form-group">											<label for="Subject"> Asunto </label>												<input type="text" class="form-control" id="Subject" name="Subject" required="true"/>													<?php if (form_error('Subject')){?>
														<div class="alert alert-danger alert-dismissible">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong><?=form_error('Subject'); ?></strong></div>													<?php } ?>
										</div>																				<div class="form-group">											<label for="message"> Mensaje </label>												<input type="text" class="form-control" id="Subject" name="Subject" required="true"/>													<?php if (form_error('Subject')){?>														<div class="alert alert-danger alert-dismissible">														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>														<strong><?=form_error('Subject'); ?></strong></div>													<?php } ?>										</div>										<div class="panel-footer" align="center">
											<button type="submit" class="btn btn-default"> Enviar </button></br></br></br>
											<?php if ( isset ($_SESSION['result']) ){ ?>
											  <div class="alert alert-success alert-dismissible">												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>												<strong>Mensaje enviado correctamente</strong></div>											<?php											$_SESSION['result']=null;											}											?>										</div>									</div>							</div>						</form>				</div>							<div class="col-md-4">			</div>		</div>	</div>

<?php
	// Inicio HTML
	$this->load->view('sis_footer');
?>