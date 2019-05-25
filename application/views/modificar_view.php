<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>

<div class="container-fluid" style='text-align:center'>
   </br><h3>MODIFICAR USUARIO</h3>
</div>

<div class="container-fluid" style= 'text-align:left'>
	<div class="table-responsive" >
        <form action="" method="POST">
			<table class="table table-hover table-bordered">				
				<div class="row">
					<div class="col-md-12">
						<?php foreach ($mod as $fila){ ?>
						<tr>
							<td><label>Nombre Usuario</label></td>
							<td><label>Password Usuario</label></td>
							<td><label>Nombre 1</label></td>
							<td><label>Nombre 2</label></td>
							<td><label>Apellido Paterno</label></td>
							<td><label>Apellido Materno</label></td>
							<td><label>email</label></td>
						</tr>
						<tr>
							<td><input type="text" name="pers_user" class="form-control" readonly="readonly" value="<?=$fila->pers_user?>"/></td>
							<td><input type="password" name="pers_password" class="form-control" value="<?=$fila->pers_password?>"/></td>
							<td><input type="text" name="pers_name1" class="form-control" value="<?=$fila->pers_name1?>"/></td>
							<td><input type="text"  name="pers_name2" class="form-control" value="<?=$fila->pers_name2?>"/></td>
							<td><input type="text" name="pers_lastname1" class="form-control" value="<?=$fila->pers_lastname1?>"/></td>
							<td><input type="text" name="pers_lastname2" class="form-control" value="<?=$fila->pers_lastname2?>"/></td>
							<td><input type="email" name="email" class="form-control" value="<?=$fila->email?>"/></td>	
						</tr>	
						<?php } ?>
						
					</div>
				</div>
			</table>
			<div class="jumbotron" style= 'text-align:center'>
				<input type="submit" class="btn btn-md btn-success" name="submit" value="Confirmar Modificación" style= 'text-align:center'/>
				<a class="btn btn-warning btn-md" href=<?=base_url("index.php/UsuariosController")?>>Volver a Usuarios</a>
			</div>
		</form><br/>
	</div>
</div>

<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>