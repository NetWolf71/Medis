<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>

<div class="container-fluid" style='text-align:center'>
   </br><h3>MODIFICAR INSTITUCIÓN MÉDICA</h3>
</div>

<div class="container-fluid" style= 'text-align:left'>
	<div class="table-responsive" >
        <form action="" method="POST">
			<table class="table table-hover table-bordered">				
				<div class="row">
					<div class="col-md-12">
						<?php if(empty($mod)){
							redirect(base_url('index.php/InstitucionesController'));
						}else{
							foreach ($mod as $fila){ ?>
						
						<tr>					
						<td align="center"><p><strong>ID</strong></p></td>
						<td align="center"><p><strong>Nombre Institucion</strong></p></td>
						<td align="center"><p><strong>Tipo Institucion</strong></p></td>	
						<td align="center"><p><strong>Sucursal</strong></p></td>
						<td align="center"><p><strong>Dirección</strong></p></td>					
						<td align="center"><p><strong>Región</strong></p></td>
						<td align="center"><p><strong>Ciudad/Comuna</strong></p></td>
						<td align="center"><p><strong>Ubicación</strong></p></td>
						</tr>
						<tr>
							<td><input type="text" name="id_institucion" class="form-control" size="3" maxlength="5" style="text-align:center" readonly="readonly" value="<?=$fila->id_institucion?>"/></td>
							<td><input type="text" name="nombre_institucion" class="form-control"  size="3"  readonly="readonly" style="text-align:center" maxlength="5" value="<?=$fila->nombre_institucion?>"/></td>
																		<td>
												<select id="id_tipo_inst" name="id_tipo_inst" class="form-control">
													<option value="" selected="selected">Tipo Institución</option>
														<?php 
															foreach ($tipo_instituciones as $i) {
															echo '<option value="'. $i->id_tipo_inst .'">'. $i->nombre_tipo .'</option>';
															}
														?>
												</select>
											</td>
							<td><input type="text" name="sucursal" class="form-control"  size="15"  readonly="readonly" style="text-align:center" maxlength="10" value="<?=$fila->sucursal?>"/></td>
							<td><input type="text" name="direccion" class="form-control" style="text-align:center" value="<?=$fila->direccion?>"/></td>
							<td>
												<select id="id_region" name="id_region" class="form-control">
													<option value="" selected="selected">Seleccionar Región</option>
														<?php 
															foreach ($regiones as $i) {
															echo '<option value="'. $i->id_region .'">'. $i->nombre_region .'</option>';
															}
														?>
												</select>
											</td>
											<td>
												<select id="id_comuna" name="id_comuna" class="form-control">
													<option value="" selected="selected">Seleccionar Comuna</option>
														<?php 
															foreach ($comunas as $i) {
															echo '<option value="'. $i->id_comuna .'">'. $i->nombre_comuna .'</option>';
															}
														?>
												</select>
													<script type="text/javascript">   
														$(document).ready(function() {                       
															$("#id_region").change(function() {
																$("#id_region option:selected").each(function() {
																	id_region = $('#id_region').val();
																	$.post("<?php echo base_url(); ?>index.php/InstNewController/fillComunas", {
																		id_region : id_region
																	}, function(data) {
																		$("#id_comuna").html(data);
																	});
																});
															});
														});
													</script>
											</td>
							<td><input type="text" name="url_maps" class="form-control" style="text-align:center" value="<?=$fila->url_maps?>"/></td>
						</tr>	
						<?php } ?>
						
					</div>
				</div>
			</table>
			<div class="jumbotron" style= 'text-align:center'>
				<input type="submit" class="btn btn-md btn-success" name="submit" value="Confirmar Modificación" style= 'text-align:center'/>
				<a class="btn btn-warning btn-md" href=<?=base_url("index.php/InstitucionesController")?>>Volver a Instituciones</a>
			</div>
		</form><br/>
	<?php } //fin else?>
	</div>
</div>

<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>