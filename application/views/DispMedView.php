<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
	
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
	<link rel="stylesheet" type="text/css" media="all" href="css/autocomplete.css">
	<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
	<script type="text/javascript" src="js/currency-autocomplete.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	<div class="container-fluid" style= 'text-align:center'>
		<h3>Filtrar disponibilidad por rango de fechas</br></h3>
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
	<form action="" method="POST">
		<div class="row">
			<div class="col-md-1">
			</div>
			
			<div class="col-md-10">
				<div class="container-fluid">
					<div class="table-responsive" >				
							<span style="font-size:11px;" align="center">
								<table class="table table-hover table-bordered" id="tbl_datos">
									<thead>							
											<tr>
												<th>Id Reserva</th>
												<th>Nombre Medico</th>
												<th>Especialidad</th>
												<th>Día</th>
												<th>Hora</th>
												<th>Estado</th>
												<th>Acción</th>
												
											</tr>
										</thead>
										<tbody>
											<?php
												foreach($ver as $fila){
											?>
												<tr>	
													<td> <?=$fila->id_reserva;?> </td>
													<td> <?=$fila->pers_nombre_completo;?></td>
													<td> <?=$fila->nombre;?> </td>
													<td> <?=$fila->dia_fecha;?></td>
													<td> <?=$fila->hora;?></td>
													<td> <?=$fila->estado;?></td>
													<td style="white-space: nowrap;" >
														<button class="btn btn-sm btn-warning" type="button" onclick='window.location.href="<?=base_url("index.php/DispMedController/mod/$fila->id_reserva")?>";'  >
																<em class="glyphicon glyphicon-chevron-right"></em> Reservar Hora																
														</button>
													</td>
												</tr>
											<?php   
												}
											?>
										</tbody>
								</table>
							</span>
					</div>						
				</div>
				
			</div>
			
			<div class="col-md-1">
			</div>
		</div>
		</form>
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
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tbl_datos').DataTable( {
				"language": {
					"lengthMenu": "Mostrar _MENU_ &nbsp;registros",
					"zeroRecords": "Nothing found - sorry",
					"info": "Página _PAGE_ de _PAGES_",
					"infoEmpty": "No records available",
					"infoFiltered": "(filtered from _MAX_ total records)",
					"paginate": {
						"first":      "Primero",
						"last":       "Último",
						"next":       "Siguiente",
						"previous":   "Anterior"
					},
					"search":         "Búsqueda Rápida:",
				}
			} );
		} );		
	</script>
 
	
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>