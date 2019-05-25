<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container-fluid" style= 'text-align:center'>
	<br/><h4>INGRESAR NUEVA INSTITUCIÓN</h4>
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

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
		</div>
			<div class="col-md-10">
				<form action="<?=base_url("index.php/InstitucionesController/add");?>" method="post">
					<div class="container-fluid">
						<div class="table-responsive" >				
							<span style="font-size:11px;">
								<table class="table table-hover table-bordered" id="tbl_datos">
									<thead>	
										<tr align="center">
											<td><label for="nombre_institucion">Nombre Institución</label></td>
											<td><label for="id_tipo_inst">Tipo Institucion</label></td>
											<td><label for="sucursal">Sucursal</label></td>
											<td><label for="direccion">Dirección</label></td>
											<td><label for="id_comuna">Región</label></td>
											<td><label for="id_region">Ciudad/Comuna</label></td>
											<td><label for="url_maps">Ubicación</label></td>
										</tr>
					
										<tr align="center">
									
											<td><input type="text" name="nombre_institucion" class="form-control" id="nombre_institucion" style="text-transform:uppercase;text-align:center"/></td>
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
											<td><input type="text" name="sucursal" class="form-control" id="sucursal" style="text-transform:uppercase;text-align:center"/></td>
											<td><input type="text" name="direccion" class="form-control" id="direccion" style="text-transform:uppercase;text-align:center"/></td>	
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
											<td><input type="url" name="url_maps" class="form-control" id="url_maps" style="text-transform:uppercase;text-align:center"/></td>	
										</tr>
									</thead>
								</table>
							</span>	
						</div>
					</div>			
			
						<div class="jumbotron" style='text-align:center'>
						<input type="submit"  class="btn btn-sm btn-success" name="submit" value="Ingresar Nueva Institución" style= 'text-align:center'/>
						<a class="btn btn-sm btn-warning" href=<?=base_url("index.php/InstitucionesController")?>>Volver a Instituciones</a></>
						</div>
				</form>
			</div>
	</div>
</div>	
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>