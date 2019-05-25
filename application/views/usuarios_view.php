<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>


<div class="container-fluid" style= 'text-align:left'>
<a class="btn btn-success" href=<?=base_url("index.php/UsernewController")?>>Agregar Nuevo Usuario</a>
</div>
<div class="container-fluid" style= 'text-align:center'>
	<h3>CUENTAS DE USUARIOS</br></h3>
</div>
<div class="container-fluid" style= 'text-align:center'>
	<div class="table-responsive" >				
		<table class="table table-hover table-bordered">
			<div class="row">
				<div class="col-md-12">				
					<tr>
						<td><p><strong>ID</strong></p></td>
						<td><p><strong>Nombre</strong></p></td>
						<td><p><strong>Segundo Nombre</strong></p></td>
						<td><p><strong>Apellido Paterno</strong></p></td>
						<td><p><strong>Apellido Materno</strong></p></td>
						<td><p><strong>Nombre de Usuario</strong></p></td>
						<td><p><strong>Password de Usuario</strong></p></td>
						<td><p><strong>Fecha Creación</strong></p></td>
						<td><p><strong>Vigencia</strong></p></td>
						<td><p><strong>Email</strong></p></td>
						<td><p><strong>Acciones</strong></p></td>
					</tr>
					<?php
						foreach($ver as $fila){
					?>
					<tr>	
						<td><p><small><?= $fila->id_pers?></small></p></td>
						<td><p><small><?= $fila->pers_name1?></small></p></td>
						<td><p><small><?= $fila->pers_name2?></small></p></td>
						<td><p><small><?= $fila->pers_lastname1?></small></p></td>
						<td><p><small><?= $fila->pers_lastname2?></small></p></td>
						<td><p><small><?= $fila->pers_user?></small></p></td>
						<td><p><small><?= $fila->pers_password?></small></p></td>
						<td><p><small><?= $fila->pers_fecha_creacion?></small></p></td>
						<td><p><small><?= $fila->pers_vigencia?></small></p></td>
						<td><p><small><?= $fila->email?></small></p></td>
						<td>
							<div class="btn-group btn-group-sm">
								<button class="btn btn-warning" type="button" onclick='window.location.href="<?=base_url("index.php/UsuariosController/mod/$fila->id_pers")?>";'  >
									<em class="glyphicon glyphicon-remove"></em> Modificar
								</button>
								<button class="btn btn-danger" type="button" onclick='window.location.href="<?=base_url("index.php/UsuariosController/eliminar/$fila->id_pers")?>";'>
									<em class="glyphicon glyphicon-plus"></em> Eliminar
								</button>
							</div>
						</td>
					</tr>
				</div>
			</div>
						<?php   
							}
						?>
		</table>
	</div>						
</div>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>