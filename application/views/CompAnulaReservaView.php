<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>

<div class="container-fluid" style='text-align:center'>
<div class="container-fluid">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<hr/>
		</div>
		<div class="col-md-1">
		</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
		</div>
			<div class="col-md-10">
				<div class="container-fluid">
					<div class="table-responsive">				
						<span style="font-size:12px;">
							<form action="" method="POST">
								<div class="panel panel-danger">
									<div class="panel-heading"><strong><h3>RESERVA ANULADA</h3></strong></div>
										<table class="table table-hover" id="tbl_datos">
											<thead>
												<?php foreach ($comprobante as $fila){ ?>
													<tr align="center">
													</tr>
													<tr align="center">
													</tr>	
														<?php } ?>
												</thead>
												
										</table>
											<hr/>
											<div class="panel-footer" align="center">
												<?php
													if( isset($_SESSION['flag']) && $_SESSION['flag'] ){
														/*
															$_SESSION['flag'] == true 
																Significa que se actualizó exitosamente.
														*/ 
												?>
													<div class="container">
														<div class="alert alert-success alert-dismissible fade in">
															<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																Su reserva número <strong> <?=$fila->id_reserva?></strong> para el <strong><?=$fila->dia_fecha?> a las <?=$fila->hora?>hrs. </strong> ha sido anulada correctamente.
														</div>
													</div>
												<?php
													}
												?>
												<a class="btn btn-warning btn-md" href="<?=base_url('index.php/MisReservasController/ver/')?><?php echo $_SESSION['id_pers'];?>">Volver a Mis Reservas</a>
												</br></br>
											</div>
								</div>
							</form>
						</span>
					</div>
				</div>
			</div>
		<div class="col-md-1">
		</div>
	</div>
</div>
</br>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>