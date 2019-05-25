<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container">
	<h4>MANTENEDOR DE ESPECIALIDADES</br></h4>
</div>
<div class="container">
	<br>
	<?= form_open("/EspecialidadesController/add_esp") ?>
	<?php 
		$nombre_esp = array(
			'name' => 'nombre',
			/*'placeholder' => 'Nombre especialidad',*/
			'class'=>'form-control'
		);
	?>
	<div class="form-group">
	<label>
		Nombre Especialidad:
		<?= form_input($nombre_esp) ?>
	</label>
	</div>
	<?php $atrib = array ('class'=>'btn btn-success'); ?>
	<?= form_submit('','Ingresar Nueva Especialidad', $atrib) ?>
	<?= form_close() ?>
	</br></br></br></br>
	<table class="table table-hover table-bordered" id="tbl_datos">
		<tr>
			<th>Código de Especialidad</th>
			<th>Nombre de Especialidad</th>
			<th colspan="2">Acciones</th>
		</tr>
		<tr>
		<?php
			if ($consulta) {
			foreach ($consulta->result() as $esp) { ?>
				<tr>
					<td><?= $esp->id_especialidad; ?></td>
					<td><?= $esp->nombre ?></td>
					<td style="white-space: nowrap;" >
					<button class="btn btn-sm btn-warning" type="button" onclick='window.location.href="<?=base_url('index.php/EspecialidadesController/editar/'.$esp->id_especialidad);?>";'  >
														<em class="glyphicon glyphicon-remove"></em> Modificar
												</button>
												<button class="btn btn-sm btn-danger" type="button" onclick='window.location.href="<?=base_url('index.php/EspecialidadesController/eliminar/'.$esp->id_especialidad);?>";'>
													<em class="glyphicon glyphicon-plus"></em> Eliminar
												</button>
				</tr>
			<?php }
		}else{
			echo "<tr>
					<td colspan='4'>No existen registros en esta tabla</td>
				</tr>";
		}
		?>
	</table>
</div>
</br></br></br>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>