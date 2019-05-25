<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
	<style type="text/css">
		th{
			text-align: center;
			white-space:nowrap;
		}
	</style>

	<!--
	<div class="container-fluid" style= 'text-align:left'>
		<a class="btn btn-success" href=<?=base_url("index.php/UserNewController");?>>Agregar Nuevo Usuario</a>
	</div>
	-->
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<div class="container-fluid" style= 'text-align:left'>
<a class="btn btn-sm btn-success" href=<?=base_url("index.php/InstNewController")?>>Agregar Institución Médica</a>
</div>
<div class="container-fluid" style= 'text-align:center'>
	<h3>INSTITUCIONES MÉDICAS</br></h3>
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
					<div class="table-responsive" >				
						<span style="font-size:11px;">
							<table class="table table-hover table-bordered" id="tbl_datos">
								<thead>							
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Tipo Institución</th>
										<th>Dirección</th>
										<th>Comuna</th>
										<th>Región</th>
										<th>Ubicación</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
										<?php
											foreach($ver as $fila){
										?>
									<tr align="center">	
										<td><?= $fila->ID?></td>
										<td><?= $fila->NOMBRE?></td>
										<td><?= $fila->TIPO?></td>
										<td><?= $fila->DIRECCION?></td>
										<td><?= $fila->COMUNA?></td>
										<td><?= $fila->REGION?></td>
										<td><a href="<?= $fila->UBICACION?>" target="_blank">VER UBICACIÓN</a></td>
										
										<td align="center" style="white-space:nowrap;" >				
											<button class="btn btn-sm btn-warning" type="button" onclick='window.location.href="<?=base_url("index.php/InstitucionesController/mod/$fila->ID")?>";'  >
												<em class="glyphicon glyphicon-remove"></em> Modificar
											</button>
											<button class="btn btn-sm btn-danger" type="button" onclick='window.location.href="<?=base_url("index.php/InstitucionesController/eliminar/$fila->ID")?>";'>
												<em class="glyphicon glyphicon-plus"></em> Eliminar
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

<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>