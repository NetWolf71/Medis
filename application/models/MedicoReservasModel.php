<?php
class MedicoReservasModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
 
	public function ver($id_pers){

		
		$sql = "select a.id_reserva,
					   u.pers_nombre_completo medico,
					   e.nombre especialidad,
					   z.pers_nombre_completo reservador,
					   concat_ws(' ', a.dia_semana, DATE_FORMAT(a.fecha,'%d-%m-%Y')) dia_fecha,
					   a.hora hora,
					   a.estado estado,
					   a.nombre_paciente nombre_paciente			 
				  from agendas_disponibles a, usuarios u, usuarios z, especialidades e
				 where a.id_pers='$id_pers'
				   and u.id_especialidad=e.id_especialidad
				   and a.id_pers=u.id_pers
				   and a.id_paciente=z.id_pers;";
		
		//Hacemos una consulta
		$consulta = $this->db->query($sql);
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }

}
?>