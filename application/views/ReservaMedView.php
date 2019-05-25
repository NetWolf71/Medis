<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
	
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	<div class="container-fluid" style= 'text-align:center'>
		<h4>Búsqueda por Médico o especialidad</br></h4>
	</div>

	
	<span style="font-size:11px;">
		<div class="container-fluid">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<!-- Busqueda -->
					<form action="<?=base_url('index.php/ReservaMedController/index');?>" method="get">
						<div class="panel panel-danger">
							<div class="panel-heading"><strong>Ingresa datos del médico</strong></div>
							
							<div class="panel-body">
								<div class="container-fluid">
									<!-- Fila 1 -->
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_nombre_completo" > Nombre </label>
												<input type="text" class="form-control" id="txt_nombre_completo" name="txt_nombre_completo" value="<?=$txt_nombre_completo;?>" placeholder="Nombre" >
											</div>
										</div><div class="col-md-2">
											<div class="form-group">
												<label for="txt_nombre_completo2" > Apellido </label>
												<input type="text" class="form-control" id="txt_nombre_completo2" name="txt_nombre_completo2" value="<?=$txt_nombre_completo2;?>" placeholder="Apellido" >
											</div>
										</div>
																				
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_cedula" >Cedula Identidad.</label>
												<input type="text" class="form-control" id="txt_cedula" name="txt_cedula" value="<?=$txt_cedula;?>" placeholder="Ejemplo 99999999-9" >
											</div>
										</div>
									
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_especialidad" > Especialidad </label>
												<input type="text" class="form-control" id="txt_especialidad" name="txt_especialidad" value="<?=$txt_especialidad;?>" placeholder="Especialidad" >
											</div>
										</div>									
									</div>
								</div>
							</div>
							<div class="panel-footer" align="right">
								<button class="btn btn-sm btn-danger" type="Submit" >
									Buscar <em class="glyphicon glyphicon-search"></em>
								</button>
								<button class="btn btn-sm btn-danger" type="button" title="Limpiar" onclick="javascript:limpiar();">
									Limpiar Búsqueda <em class="glyphicon glyphicon-refresh"></em>
								</button>
							</div>
						</div>
					</form>
				</div>
					
				<!-- Busqueda -->
			<div class="col-md-1">
			</div>
		</div>
	</span>
	
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
					<div class="table-responsive" >				
						
						<span style="font-size:11px;" align="center">
							<table class="table table-hover table-bordered" id="tbl_datos">
								<thead>							
										<tr>
											<th>ID</th>
											<th>NOMBRE DEL MÉDICO</th>
											<th>RUT</th>
											<th>ESPECIALIDAD</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach($ver as $fila){
										?>
											<tr>	
												<td> <?=$fila->id_pers;?>			   </td>
												<td> <?=$fila->pers_nombre_completo;?> </td>
												<td> <?=$fila->dni;?>                  </td>
												<td> <?=$fila->nombre;?> 			   </td>
												<td style="white-space: nowrap;" >
													<button class="btn btn-xs btn-success" type="button" onclick='window.location.href="<?=base_url("index.php/DispMedController/carga/$fila->id_pers")?>";'  >
															<em class="glyphicon glyphicon-chevron-right"></em> Ver Disponibilidad
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
	
	<script type="text/javascript">
	function limpiar() {
	/* Text Boxes */
	$('#txt_nombre_completo').val('');
	$('#txt_nombre_completo2').val('');
	$('#txt_cedula').val('');
	$('#txt_especialidad').val('');
	
    }
	
	</script>
	
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>