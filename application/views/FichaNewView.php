<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<h4>
				INGRESAR NUEVO PACIENTE
				<?php //echo $_SESSION['id_pers'];?>
			</h4>
		</div>
		<div class="col-md-8">
			<form role="form" action="<?=base_url("index.php/FichaController/add");?>" method="post">
				<input type="hidden" name="id_pers_medico_ficha" id="id_pers_medico_ficha" value="<?php echo $_SESSION['id_pers'];?>">
				<div class="form-group col-xs-2">
					 
					<label for="rut">
						RUT
					</label>
					<input type="text" class="form-control" name="dni_paciente_ficha" id="dni_paciente_ficha" placeholder="12345678-9">
				</div>
				<div class="form-group col-xs-4">
					 
					<label for="nombres">
						Nombres
					</label>
					<input type="text" class="form-control" name="nombres_ficha" id="nombres_ficha">
				</div>
				<div class="form-group col-xs-3">
					 
					<label for="paterno">
						Paterno
					</label>
					<input type="text" class="form-control" name="paterno_ficha" id="paterno_ficha">
				</div>
				<div class="form-group col-xs-3">
					 
					<label for="materno">
						Materno
					</label>
					<input type="text" class="form-control" name="materno_ficha" id="materno_ficha">
				</div>
				<div class="form-group col-xs-3">
					 
					<label for="fnac">
						Fecha Nac.
					</label>
					<input type="date" class="form-control" name="fecha_nac_ficha" id="fecha_nac_ficha">
				</div>
				<div class="form-group col-xs-2">
					 
					<label for="peso">
						Peso
					</label>
					<input type="text" class="form-control" name="peso_ficha" id="peso_ficha" placeholder="ej: 65kg">
				</div>
				<div class="form-group col-xs-2">
					 
					<label for="estatura">
						Estatura
					</label>
					<input type="text" class="form-control" name="estatura_ficha" id="estatura_ficha" placeholder="ej: 170cms">
				</div>
				<div class="form-group col-xs-5">
					 
					<label for="dolencia_cron">
						Dolencias crónicas:
					</label>
					<input type="text" class="form-control" name="dolencia_cron_ficha" id="dolencia_cron_ficha" placeholder="separe con comas">
				</div>
				<div class="form-group col-xs-6">
					 
					<label for="alergia">
						Alergico a:
					</label> 
					<input type="text" class="form-control" name="alergia_ficha" id="alergia_ficha" placeholder="separe con comas">
				</div>
				<div class="form-group col-xs-6">
					 
					<label for="obs">
						Observaciones
					</label>
					<!-- <input type="textarea" class="form-control" name="obs" id="obs"> -->
					<textarea name="obs_ficha" id="obs_ficha" cols="55" rows="5"></textarea>
				</div>
				<div class="form-group col-xs-6">
				<button type="submit" class="btn btn-primary">
					Crear ficha
				</button>
				</div>
			</form>
			<br>
		</div>
	</div>
</div>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>