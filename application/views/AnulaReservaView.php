<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>

<div class="container-fluid" style='text-align:center'>
   </br><h3>Anula Reserva</h3>
</div>
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
									<div class="panel-heading"><strong>Datos de Reserva</strong></div>
										<table class="table table-hover" id="tbl_datos">
											<thead>
												<?php foreach ($mod as $fila){ ?>
													<tr align="center">
														<td align="center"><p><strong>ID RESERVA</strong></p></td>
														<td align="center"><p><strong>NOMBRE MEDICO</strong></p></td>
														<td align="center"><p><strong>ESPECIALIDAD</strong></p></td>	
														<td align="center"><p><strong>DIA DE RESERVA</strong></p></td>
														<td align="center"><p><strong>HORA</strong></p></td>					
														<td align="center"><p><strong>ESTADO</strong></p></td>
														<td align="center"><p><strong>PERSONA QUE RESERVA</strong></p></td>
														<td align="center"><p><strong>INGRESAR NOMBRE PACIENTE</strong></p></td>
													</tr>
													<tr align="center">
														<td><?=$fila->id_reserva?></td>
														<td><?=$fila->pers_nombre_completo?></td>
														<td><?=$fila->nombre?></td>
														<td><?=$fila->dia_fecha?></td>
														<td><?=$fila->hora?></td>
														<td><?=$fila->estado?></td>
														<td><?=$fila->reservador?></td>
														<td><?=$fila->paciente?></td>	
													</tr>	
														<?php } ?>
												</thead>
												
										</table>
									
											<hr/>
											<div class="panel-footer" align="center">
												<input type="submit" class="btn btn-md btn-danger" name="submit" value="Confirmar ANULACIÓN" style= 'text-align:center'/>
												<a class="btn btn-warning btn-md" href=<?=base_url("index.php/MisReservasController")?>>Volver a MIS RESERVAS DE HORAS</a>
												</br></br>
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
																Su reserva número <strong> <?=$fila->id_reserva?> </strong> a nombre de <?=$fila->nombre_paciente?> se ha confirmado exitosamente.
														</div>
													</div>
												<?php
													}
												?>
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