<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>

<div class="container-fluid" style='text-align:center'>
   </br><h3>MODIFICAR MEDICO</h3>
</div>

<div class="container-fluid" style= 'text-align:left'>
	<div class="table-responsive" >
        <form action="" method="POST">
			<table class="table table-hover table-bordered">				
				<div class="row">
					<div class="col-md-12">
						<?php foreach ($mod as $fila){ ?>
						<tr>
						<td align="center"><p><strong>ID</strong></p></td>
						<td align="center"><p><strong>Tipo</strong></p></td>
						<td align="center"><p><strong>Fecha Creacion</strong></p></td>	
						<td align="center"><p><strong>Usuario</strong></p></td>
						<td align="center"><p><strong>Password</strong></p></td>					
						<td align="center"><p><strong>Nombre</strong></p></td>
						<td align="center"><p><strong>Segundo Nombre</strong></p></td>
						<td align="center"><p><strong>Apellido Paterno</strong></p></td>
						<td align="center"><p><strong>Apellido Materno</strong></p></td>
						<td align="center"><p><strong>Cedula/DNI</strong></p></td>
						<td align="center"><p><strong>Fecha Nacimiento</strong></p></td>
						<td align="center"><p><strong>Vigencia</strong></p></td>
						<td align="center"><p><strong>Email</strong></p></td>
						</tr>
						<tr>
							<td><input type="text" name="id_pers" class="form-control" size="3" maxlength="5" style="text-align:center" readonly="readonly" value="<?=$fila->id_pers?>"/></td>
							<td><input type="text" name="id_pers_tipo" class="form-control"  size="3"  readonly="readonly" style="text-align:center" maxlength="5" value="<?=$fila->id_pers_tipo?>"/></td>
							<td><input type="date" name="pers_fecha_creacion" class="form-control"   readonly="readonly" style="text-align:center" size="12" value="<?=$fila->pers_fecha_creacion?>"/></td>
							<td><input type="text" name="pers_user" class="form-control"  size="15"  readonly="readonly" style="text-align:center" maxlength="10" value="<?=$fila->pers_user?>"/></td>
							<td><input type="password" name="pers_password" class="form-control" style="text-align:center" value="<?=$fila->pers_password?>"/></td>
							<td><input type="text" name="pers_name1" class="form-control" style="text-align:center" value="<?=$fila->pers_name1?>"/></td>
							<td><input type="text"  name="pers_name2" class="form-control" style="text-align:center" value="<?=$fila->pers_name2?>"/></td>
							<td><input type="text" name="pers_lastname1" class="form-control" style="text-align:center" value="<?=$fila->pers_lastname1?>"/></td>
							<td><input type="text" name="pers_lastname2" class="form-control" style="text-align:center" value="<?=$fila->pers_lastname2?>"/></td>
							<td><input type="text" name="dni" class="form-control" style="text-align:center" value="<?=$fila->dni?>"/></td>
							<td><input type="date" name="fecha_nacimiento" class="form-control" style="text-align:center" value="<?=$fila->fecha_nacimiento?>"/></td>
							<td><input type="text" name="pers_vigencia" class="form-control" size="2" style="text-align:center" value="<?=$fila->pers_vigencia?>"/></td>
							<td><input type="email" name="email" class="form-control" size="40" style="text-align:center" readonly="readonly" value="<?=$fila->email?>"/></td>	
						</tr>	
						<?php } ?>
						
					</div>
				</div>
			</table>
			<div class="container-fluid" style= 'text-align:right'>
				<input type="submit" class="btn btn-sm btn-success" name="submit" value="Confirmar Modificación" style= 'text-align:center'/>
				<a class="btn btn-warning btn-sm" href=<?=base_url("index.php/MedicosController")?>>Volver a Médicos</a>
				
				<?php
					$result=$this->MedicosModel->valagen($fila->id_pers);
					if (!$result){
						?>
				<a class="btn btn-danger btn-sm" href=<?=base_url("index.php/MedicosController/agen/".$fila->id_pers)?>>Generar Agenda</a>
				<?php
				}
				?>
				
			</div>
		</form><br/>
	</div>
</div>

<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>