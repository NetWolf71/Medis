<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container-fluid" style= 'text-align:center'>
	<br/><h3>INGRESAR NUEVO USUARIO</h3>
</div>

<div class="container-fluid" style= 'text-align:left'>
	<div class="table-responsive" >
		<form action="<?=base_url("index.php/UsuariosController/add");?>" method="post">
			<table class="table table-hover table-bordered">				
				<div class="row">
						<div class="col-md-12">
							<input type="hidden" name="ID" size="10" class="form-control" id="ID" disabled="disabled"/>
							<input type="hidden" name="pers_fecha_creacion" disabled="disabled" align="center"/>
							<input type="hidden" name="pers_vigencia" disabled="disabled" align="center"/>
							
							<tr>
								<td><label for="pers_name1">Nombre</label></td>
								<td><label for="pers_name2">Segundo Nombre</label></td>
								<td><label for="pers_lastname1">Apellido Paterno</label></td>
								<td><label for="pers_lastname2">Apellido Materno</label></td>
								<td><label for="pers_user">Nombre Usuario</label>	</td>
								<td><label for="pers_password">Password</label></td>
								<td><label for="email">Email</label></td>
							</tr>
							<tr>
								<td><input type="text" name="pers_name1" class="form-control" id="pers_name1"/></td>
								<td><input type="text" name="pers_name2" class="form-control" id="pers_name2"/></td>
								<td><input type="text" name="pers_lastname1" class="form-control" id="pers_lastname1" /></td>							
								<td><input type="text" name="pers_lastname2" class="form-control" id="pers_lastname2" /></td>
								<td><input type="text" name="pers_user" class="form-control" id="pers_user" /></td>
								<td><input type="password" name="pers_password" class="form-control" id="pers_password" /></td>
								<td><input type="email" name="email" class="form-control" id="email"/></td>
							</tr>
						</div>
				</div>			
			</table>
						<div class="jumbotron" style='text-align:center'>
						<input type="submit"  class="btn btn-md btn-success" name="submit" value="Ingresar Nuevo Usuario" style= 'text-align:center'/>
						<a class="btn btn-warning" href=<?=base_url("index.php/UsuariosController")?>>Volver a Usuarios</a></>
						</div>
		</form>
	</div>
</div>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>