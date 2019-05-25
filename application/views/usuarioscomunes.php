<?php
// Inicio HTML
$this->load->view('sis_header');
?>
<div class="container">
	<h4>MANTENEDOR DE USUARIOS COMUNES</br></h4>
</div>
<div class="container">
	</br></br></br></br>
	<table class="table table-striped">
		<tr>
			<th>Rut</th>
			<th>Primer Nombre</th>
			<th>Segundo Nombre</th>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
			<th>Password</th>
			<th>Fecha de Creación</th>
			<th>Vigencia</th>
			<th>Tipo</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th colspan="2">Acciones</th>
		</tr>
		<tr>
		<?php
if ($consulta) {
    foreach ($consulta->result() as $cli) {?>
				<tr>
					<td><?=$cli->pers_rut;?></td>
					<td><?=$cli->pers_name1;?></td>
					<td><?=$cli->pers_name2;?></td>
					<td><?=$cli->pers_lastname1;?></td>
					<td><?=$cli->pers_lastname2;?></td>
					<td><?=$cli->pers_password;?></td>
					<td><?=$cli->pers_fecha_creacion;?></td>
					<td><?=$cli->pers_vigencia;?></td>
					<td><?=$cli->pers_tipo;?></td>
					<td><?=$cli->email;?></td>
					<td><?=$cli->telefono;?></td>
					<td><a href="<?=base_url('index.php/ClientesController/editar/' . $cli->id_pers);?>">Editar</a></td>
					<td><a href="<?=base_url('index.php/ClientesController/eliminar/' . $cli->id_pers);?>">Eliminar</a></td>
				</tr>
			<?php }
} else {
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