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

<div class="container-fluid" style= 'text-align:left'>
<a class="btn btn-sm btn-success" href=<?=base_url("index.php/FichaNewController")?>>Crear Nuevo Paciente</a>
</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<div class="container-fluid" style= 'text-align:center'>
	<h3>FICHAS DE PACIENTES</br></h3>
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
										<th>ID Ficha</th>
										<th>Rut Paciente</th>
										<th>Apellido Paterno</th>
										<th>Apellido Materno</th>
										<th>Nombres</th>
										<th>Fecha Nacimiento</th>
										<th>Edad</th>
										<th>Peso</th>			
										<th>Estatura</th>
										<th>Preexistencias</th>
										<th>Alergias</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach($ver as $fila){
									?>
									<tr>	
										<td><?= $fila->id_ficha?></td>
										<td><?= $fila->dni_paciente_ficha?></td>
										<td><?= $fila->paterno_ficha?></td>
										<td><?= $fila->materno_ficha?></td>
										<td><?= $fila->nombres_ficha?></td>
										<td><?= $fila->fecha_nac_ficha?></td>
										<td><?php //echo $edad ?></td>
										<td><?= $fila->peso_ficha?></td>
										<td><?= $fila->estatura_ficha?></td>
										<td><?= $fila->dolencia_cron_ficha?></td>
										<td><?= $fila->alergia_ficha?></td>
										<td align="center" style="white-space:nowrap;" >

											<button class="btn btn-sm btn-warning" type="button" onclick='window.location.href="<?=base_url("index.php/FichaController/mod/$fila->id_pers")?>";'  >
												<em class="glyphicon glyphicon-remove"></em> Modificar
											</button>
											<button class="btn btn-sm btn-danger" type="button" onclick='window.location.href="<?=base_url("index.php/FichaController/eliminar/$fila->id_pers")?>";'>
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