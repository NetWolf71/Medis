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
		<h3>Cuentas de Usuarios</br></h3>
	</div>

	
	<span style="font-size:12px;">
		<div class="container-fluid">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<!-- Busqueda -->
					<form action="<?=base_url('index.php/UsuariosController/index');?>" method="get">
						<div class="panel panel-primary">
							<div class="panel-heading"><strong>Busqueda</strong></div>
							
							<div class="panel-body">
								<div class="container-fluid">
									<!-- Fila 1 -->
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_primer_nombre" >Primer Nombre</label>
												<input type="text" class="form-control" id="txt_primer_nombre" name="txt_primer_nombre" value="<?=$txt_primer_nombre;?>" placeholder="Primer Nombre" >
											</div>
										</div>
										
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_segundo_nombre" >Segundo Nombre</label>
												<input type="text" class="form-control" id="txt_segundo_nombre" name="txt_segundo_nombre" value="<?=$txt_segundo_nombre;?>" placeholder="Segundo Nombre" >
											</div>
										</div>
										
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_apellido_paterno" >Apellido Paterno</label>
												<input type="text" class="form-control" id="txt_apellido_paterno" name="txt_apellido_paterno" value="<?=$txt_apellido_paterno;?>" placeholder="Apellido Paterno" >
											</div>
										</div>
										
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_apellido_materno" >Apellido Materno</label>
												<input type="text" class="form-control" id="txt_apellido_materno" name="txt_apellido_materno" value="<?=$txt_apellido_materno;?>" placeholder="Apellido Materno" >
											</div>
										
										</div>
										
										<div class="col-md-2"> 
											<div class="form-group">
												<label for="txt_fecha_nacimiento" >Nacimiento</label>
												<input type="date" class="form-control" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento" value="<?=$txt_fecha_nacimiento;?>" placeholder="Fecha Nacimiento" >
											</div>
										</div>
										
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_cedula" >Cedula I.</label>
												<input type="text" class="form-control" id="txt_cedula" name="txt_cedula" value="<?=$txt_cedula;?>" placeholder="Cedula Identidad" >
											</div>
										</div>
									</div>
									<!-- Fila 1 -->
									
									
									<!-- Fila 2 -->
									<div class="row">
										<div class="col-md-1">
											<div class="form-group">
												<label for="cbo_vigencia" > Vigencia </label>
												<?php
													$options = array(
															'T'         => 'Todo',
															'S'         => 'Si',
															'N'         => 'No'
													);

													$shirts_on_sale = array('small', 'large');
													
													echo form_dropdown('cbo_vigencia', $options, $cbo_vigencia , 'class="form-control"');												
												?>
												
											</div>
										</div>
										
										<div class="col-md-1">
										</div>
										
										
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_email" > Email </label>
												<input type="text" class="form-control" id="txt_email" name="txt_email" value="<?=$txt_email;?>" placeholder="E-Mail" >
											</div>
										</div>
										
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_usuario" > Usuario </label>
												<input type="text" class="form-control" id="txt_usuario" name="txt_usuario" value="<?=$txt_usuario;?>" placeholder="Nombre Usuario"  >
											</div>
										</div>
										
										<div class="col-md-2">
											<div class="form-group">
												<label for="txt_password" > Password </label>
												<input type="text" class="form-control" id="txt_password" name="txt_password" value="<?=$txt_password;?>" placeholder="Passsword" >
											</div>
										</div>
										
									</div>
									<!-- Fila 2 -->
								</div>
							</div>
						
							<div class="panel-footer" align="right">
								<button class="btn btn-primary" type="Submit" >
									Buscar <em class="glyphicon glyphicon-search"></em>
								</button>
							</div>
						</div>
					</form>
					
					<a class="btn btn-sm btn-success" href=<?=base_url("index.php/UserNewController");?>>Agregar Nuevo Usuario &nbsp; <em class="glyphicon glyphicon-plus" ></em> </a>
				<!-- Busqueda -->
			</div>
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
						
						<span style="font-size:11px;">
							<table class="table table-hover table-bordered" id="tbl_datos">
								<thead>							
									<tr>
										<th>ID				 </th>
										<!-- <th>Tipo			 </th> -->
										<th>Nombre			 </th>
										<th>Segundo Nombre	 </th>
										<th>Apellido Paterno </th>
										<th>Apellido Materno </th>
										<th>Fecha Nacimiento </th>
										<th>Cedula. I		 </th>
										<th>Fecha Creacion	 </th>
										<th>Vigencia		 </th>
										<th>Email			 </th>
										<th>Usuario  		 </th>
										<th>Password 		 </th>
										<th>Acciones 		 </th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach($ver as $fila){
											$originalDate = $fila->fecha_nacimiento;
											$fnac = date("d/m/Y", strtotime($originalDate));
									?>
											<tr>	
												<td> <?=$fila->id_pers;?>			   </td>
												<!-- <td> <?=$fila->id_pers_tipo;?>		   </td>-->
												<td> <?=$fila->pers_name1;?>		   </td>
												<td> <?=$fila->pers_name2;?>		   </td>
												<td> <?=$fila->pers_lastname1;?>	   </td>
												<td> <?=$fila->pers_lastname2;?>	   </td>
												<td> <?=$fnac;?>	   </td>
												<td> <?=$fila->dni;?>				   </td>
												<td> <?=$fila->pers_fecha_creacion;?>  </td>
												<td> <?=$fila->pers_vigencia;?>	       </td>
												<td> <?=$fila->email;?>			       </td>
												<td> <?=$fila->pers_user;?>		       </td>
												<td> <?=$fila->pers_password;?>	       </td>
												
												<td align="center" style="white-space:nowrap;" >
													
														<button class="btn btn-sm btn-warning" type="button" onclick='window.location.href="<?=base_url("index.php/UsuariosController/mod/$fila->id_pers")?>";' >
															<em class="glyphicon glyphicon-pencil"></em>&nbsp;Modificar
														</button>
														<button class="btn btn-sm btn-danger" type="button" onclick='window.location.href="<?=base_url("index.php/UsuariosController/eliminar/$fila->id_pers")?>";'>
															<em class="glyphicon glyphicon-remove"></em>&nbsp;Eliminar
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