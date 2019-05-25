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
								<div class="panel panel-info">
									<div class="panel-heading"><strong><h4>Detalle de Cuenta</h4></strong></div>
										<table class="table table-hover" id="tbl_datos">
											<thead>							
									<tr>
										<td align="center"><p><strong>ID USUARIO</strong></p></td>
										<td align="center"><p><strong>FECHA ALTA EN MEDIS</strong></p></td>
										<td align="center"><p><strong>NOMBRE COMPLETO</strong></p></td>	
										<td align="center"><p><strong>USUARIO MEDIS</strong></p></td>	
										<td align="center"><p><strong>ESTADO VIGENCIA</strong></p></td>
										<td align="center"><p><strong>PERFIL DE USUARIO</strong></p></td>					
									</tr>
								</thead>
								<tbody>
										<?php
											foreach($ver as $fila){
										?>
									<tr align="center">	
										<td><?=$fila->id_pers?></td>
										<td><?=$fila->fecha_alta?></td>
										<td><?=$fila->nombre_completo?></td>
										<td><?=$fila->usuario?></td>
										<td><?=$fila->vigencia?></td>
										<td><?=$fila->tipo_usuario?></td>
									</tr>
										<?php   
											}
										?>
								</tbody>	
							</table>
							<div class="panel-footer" align="right"></div>
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
	


<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>