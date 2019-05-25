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

<div class="container-fluid" style= 'text-align:center'>
	<h3>MIS HORAS RESERVADAS</br></h3>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
		</div>
			<div class="col-md-10">
				<div class="container-fluid"><hr/>
					<div class="table-responsive" >				
						<span style="font-size:11px;">
							<table class="table table-hover table-bordered" id="tbl_datos">
								<thead>							
									<tr>
										<td align="center"><p><strong>ID RESERVA</strong></p></td>
										<td align="center"><p><strong>NOMBRE MEDICO</strong></p></td>
										<td align="center"><p><strong>ESPECIALIDAD</strong></p></td>	
										<td align="center"><p><strong>RESERVADO POR</strong></p></td>	
										<td align="center"><p><strong>FECHA RESERVA</strong></p></td>
										<td align="center"><p><strong>HORA</strong></p></td>					
										<td align="center"><p><strong>ESTADO RESERVA</strong></p></td>
										<td align="center"><p><strong>NOMBRE PACIENTE</strong></p></td>
										<td align="center"><p><strong>ACCIÓN</strong></p></td>
									</tr>
								</thead>
								<tbody>
										<?php
											foreach($ver as $fila){
										?>
									<tr align="center">	
										<td><?=$fila->id_reserva?></td>
										<td><?=$fila->medico?></td>
										<td><?=$fila->especialidad?></td>
										<td><?=$fila->reservador?></td>
										<td><?=$fila->dia_fecha?></td>
										<td><?=$fila->hora?></td>
										<td><?=$fila->estado?></td>
										<td><?=$fila->nombre_paciente?></td>
										<td style="white-space: nowrap;" >
											<button class="btn btn-sm btn-danger" type="button" onclick='#")?>";'>
											<em class="glyphicon glyphicon-chevron-right"></em> Cancelar Atención
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