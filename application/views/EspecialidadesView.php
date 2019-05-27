<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<style type="text/css">
	th{
		text-align: center;
		white-space:nowrap;
	}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

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
		<thead>	
			<tr>
				<th>Código de Especialidad</th>
				<th>Nombre de Especialidad</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
				<?php
					if ($consulta) {
						foreach ($consulta->result() as $esp) {
				?>
			<tr>
				<td><?= $esp->id_especialidad; ?></td>
				<td><?= $esp->nombre ?></td>
				<td align="center" style="white-space:nowrap;">
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
		</tbody>
	</table>
</div>
</br></br></br>
<script type="text/javascript">
		$(document).ready(function() {
			$('#tbl_datos').DataTable( {
				"language": {
					"lengthMenu": "Mostrar _MENU_ &nbsp;registros",
					"zeroRecords": "Nothing found - sorry",
					"info": "Página _PAGE_ de _PAGES_",
					"infoEmpty": "No records available",
					"infoFiltered": "(filtered from _MAX_ total records)",
					"paginate": {
						"first":      "Primero",
						"last":       "Último",
						"next":       "Siguiente",
						"previous":   "Anterior"
					},
					"search":         "Búsqueda Rápida:",
				}
			} );
		} );		
	</script>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>