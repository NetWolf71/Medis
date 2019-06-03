<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<h4>
				ACTUALIZAR FICHA PACIENTE
				<?php //echo $_SESSION['id_pers'];?>
			</h4>
		</div>
		<div class="col-md-8">
			<form action="" method="post">
				<input type="hidden" name="id_pers_medico_ficha" id="id_pers_medico_ficha" value="<?php echo $_SESSION['id_pers'];?>">
				<div class="form-group col-xs-2">
					 <?php foreach ($mod as $fila){ ?>
					 <input type="hidden" name="id_ficha" id="id_ficha" value="<?=$fila->id_ficha?>">
					<label for="rut">
						RUT
					</label>
					<input type="text" class="form-control" name="dni_paciente_ficha" id="dni_paciente_ficha" value="<?=$fila->dni_paciente_ficha?>">
				</div>
				<div class="form-group col-xs-4">
					 
					<label for="nombres">
						Nombres
					</label>
					<input type="text" class="form-control" name="nombres_ficha" id="nombres_ficha" value="<?=$fila->nombres_ficha?>">
				</div>
				<div class="form-group col-xs-3">
					 
					<label for="paterno">
						Paterno
					</label>
					<input type="text" class="form-control" name="paterno_ficha" id="paterno_ficha" value="<?=$fila->paterno_ficha?>">
				</div>
				<div class="form-group col-xs-3">
					 
					<label for="materno">
						Materno
					</label>
					<input type="text" class="form-control" name="materno_ficha" id="materno_ficha" value="<?=$fila->materno_ficha?>">
				</div>
				<div class="form-group col-xs-3">
					 
					<label for="fnac">
						Fecha Nac.
					</label>
					<input type="text" class="form-control" name="fecha_nac_ficha" id="fecha_nac_ficha" value="<?=$fila->fecha_nac_ficha?>">
				</div>
				<div class="form-group col-xs-2">
					 
					<label for="peso">
						Peso
					</label>
					<input type="text" class="form-control" name="peso_ficha" id="peso_ficha" value="<?=$fila->peso_ficha?>">
				</div>
				<div class="form-group col-xs-2">
					 
					<label for="estatura">
						Estatura
					</label>
					<input type="text" class="form-control" name="estatura_ficha" id="estatura_ficha" value="<?=$fila->estatura_ficha?>">
				</div>
				<div class="form-group col-xs-5">
					 
					<label for="dolencia_cron">
						Dolencias crónicas:
					</label>
					<input type="text" class="form-control" name="dolencia_cron_ficha" id="dolencia_cron_ficha" value="<?=$fila->dolencia_cron_ficha?>">
				</div>
				<div class="form-group col-xs-6">
					 
					<label for="alergia">
						Alergico a:
					</label> 
					<input type="text" class="form-control" name="alergia_ficha" id="alergia_ficha" value="<?=$fila->alergia_ficha?>">
				</div>
				<div class="form-group col-xs-6">
					 
					<label for="obs">
						Observaciones
					</label>
					<!-- <input type="textarea" class="form-control" name="obs" id="obs"> -->
					<textarea name="obs_ficha" id="obs_ficha" cols="55" rows="5"><?=$fila->obs_ficha?></textarea>
				</div>
				<?php } ?>
				<div class="form-group col-xs-6">
				<button type="submit" class="btn btn-primary">
					Actualizar datos paciente
				</button>
				<a class="btn btn-warning btn-md" href=<?=base_url("index.php/FichaController")?>>Volver a Fichas Médicas</a>
				</div>
			</form>
			<br>
			<?php
					if( isset($_SESSION['flag']) && $_SESSION['flag'] ){
						/*
							$_SESSION['flag'] == true 
								Significa que se actualizó exitosamente.
						*/ 
				?>
					<div class="container">
						<div class="alert alert-success alert-dismissible fade in">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								Se actualizó la ficha del paciente de manera exitosa.
						</div>
					</div>
				<?php
					}
				?>
		</div>
	</div>
</div>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>