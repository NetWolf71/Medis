<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container-fluid" style= 'text-align:center'>
	<br/><h3>INGRESAR NUEVO PACIENTE</h3>
</div>

<div class="container-fluid" style= 'text-align:left'>
	<div class="table-responsive" >
		<form action="<?=base_url("index.php/FichaController/add");?>" method="post">
			<table class="table table-hover table-bordered">				
				<div class="row">
				<div class="col-md-12">					
					<tr align="center">
					<td><label for="id_pers_tipo">Tipo Usuario</label></td>
					<td><label for="pers_name1">Nombre</label></td>
					<td><label for="pers_name2">Segundo Nombre</label></td>
					<td><label for="pers_lastname1">Apellido Paterno</label></td>
					<td><label for="pers_lastname2">Apellido Materno</label></td>
					<td><label for="fecha_nacimiento">Fecha Nacimiento</label></td>
					<td><label for="dni">Cedula I.</label></td>
					<td><label for="email">Email</label></td>
					<td><label for="pers_user">Usuario Medis</label></td>
					<td><label for="pers_password">Password</label></td>
					</tr>
				<tr align="center">
					<td><input type="text" name="id_pers_tipo" class="form-control" style="text-transform:uppercase;text-align:center" size="3" value="4" readonly="readonly" id="id_pers_tipo"/></td>				
					<td><input type="text" name="pers_name1" class="form-control" id="pers_name1" style="text-transform:uppercase;text-align:center"/></td>
					<td><input type="text" name="pers_name2" class="form-control" id="pers_name2" style="text-transform:uppercase;text-align:center"/></td>
					<td><input type="text" name="pers_lastname1" class="form-control" id="pers_lastname1" style="text-transform:uppercase;text-align:center"/></td>							
					<td><input type="text" name="pers_lastname2" class="form-control" id="pers_lastname2" style="text-transform:uppercase;text-align:center"/></td>
					<td><input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" style="text-transform:uppercase;text-align:center"/></td>
					<td><input type="text" name="dni" class="form-control" id="dni" style="text-transform:uppercase;text-align:center"/></td>
					<td><input type="email" name="email" size="25" class="form-control" id="email" style="text-transform:uppercase;text-align:center"/></td>
					<td><input type="text" name="pers_user" class="form-control" id="pers_user" style="text-transform:uppercase;text-align:center"/></td>
					<td><input type="password" name="pers_password" class="form-control" id="pers_password" style="text-align:center"/></td>								
				</tr>
				</div>
				</div>			
			</table>
						<div class="jumbotron" style='text-align:center'>
						<input type="submit"  class="btn btn-md btn-success" name="submit" value="Ingresar Nuevo Paciente" style= 'text-align:center'/>
						<a class="btn btn-warning" href=<?=base_url("index.php/PacientesController")?>>Volver a Pacientes</a></>
						</div>
		</form>
	</div>
</div>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>