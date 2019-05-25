<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		 <div class="panel panel-default">
			<div class="panel-heading"><h4>RESERVA DE HORAS</h4></div>
			<div class="panel-body">
			<p align='justify'> ¡Ingresa aquí a la reserva de horas! Conoce la disponibilidad de nuestros doctores y profesionales 
				de la salud, nuestras especialidades y los diferentes convenios con Isapres. </p>
				<br/>	
					Elija reserva de hora por apellido de profesional o área de atención:
				<br/><br/>
				<?= form_open(base_url().'index.php/ControllerComboBoxes/hacerAlgo'); ?>
				<select id="id_especialidad" name="id_especialidad">
                <option value="0">Especialidades</option>
                <?php 
                    foreach ($especialidades as $i) {
                        echo '<option value="'. $i->id_especialidad .'">'. $i->nombre .'</option>';
                    }?>
				</select><br/><br/>
            <select id="id_pers" name="id_pers">
                <option value="0">Medicos</option>
            </select><br/><br/>
            <button class="btn btn-success" >Aceptar</button>

			</form><br/><br/>
			</div>
			</div>
	<script type="text/javascript">   
	$(document).ready(function() {                       
		$("#id_especialidad").change(function() {
			$("#id_especialidad option:selected").each(function() {
				id_especialidad = $('#id_especialidad').val();
				$.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillCiudades", {
					id_especialidad : id_especialidad
				}, function(data) {
					$("#id_pers").html(data);
				});
			});
		});
	});
	</script>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
		
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>