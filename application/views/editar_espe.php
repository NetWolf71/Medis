<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container">
<?= form_open("/EspecialidadesController/actualizar/".$id_especialidad) ?>
<?php
	$cod_espe = array(
		'name' => 'id_espe',
		'class'=>'form-control',
		'placeholder' => 'Id Especialidad',
		'disabled' => 'disabled',
		'value' => $especialidad->result()[0]->id_especialidad
	);
	$nombre_espe = array(
		'name' => 'nombre_espe',
		'class'=>'form-control',
		'placeholder' => 'Nombre Especialidad',
		'value' => $especialidad->result()[0]->nombre
	);
?>
<?= form_label('Código Especialidad: ', 'id_espe') ?>
<?= form_input($cod_espe); ?>
<?= form_label('Nombre Especialidad: ', 'nombre_espe') ?>
<?= form_input($nombre_espe); ?>
<?php $atrib = array ('class'=>'btn btn-success'); ?>
</br>
<?= form_submit('','Actualizar Especialidad', $atrib) ?>
<?= form_close() ?>
</div>
</br></br></br>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>
