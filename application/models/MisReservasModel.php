<?php
class MisReservasModel extends CI_Model {
	
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
				 where a.id_paciente='$id_pers'
				   and u.id_especialidad=e.id_especialidad
				   and a.id_pers=u.id_pers
				   and a.id_paciente=z.id_pers;";
		
		//Hacemos una consulta
		$consulta = $this->db->query($sql);
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
	
	public function mod(
		$id_reserva,
		$modificar="NULL",
		$pers_nombre_completo="NULL",
		$id_paciente="NULL",
		$nombre="NULL",
		$dia_fecha="NULL",
		$hora="NULL",
		$estado="NULL",
		$nombre_reserva="NULL",
		$nombre_paciente="NULL"		
		){
			if($modificar=="NULL"){
				$consulta=$this->db->query("
				SELECT a.id_reserva,
					   a.id_pers,
					   a.id_paciente,
					   u.pers_nombre_completo,
					   e.nombre,
					   a.dia_semana,
					   DATE_FORMAT(a.fecha,'%d-%m-%Y') fecha,
					   a.hora,
					   a.estado,
					   z.pers_nombre_completo reservador,
					   a.disponible,
					   a.nombre_reserva,
					   a.nombre_paciente paciente,
					   concat_ws(' ', a.dia_semana, DATE_FORMAT(a.fecha,'%d-%m-%Y')) dia_fecha
				  FROM agendas_disponibles a,usuarios u,especialidades e, usuarios z
				 WHERE a.id_reserva='$id_reserva'
				   AND a.fecha BETWEEN NOW() AND ( CURDATE() + INTERVAL 7 DAY )
				   AND a.id_pers=u.id_pers
				   AND a.id_paciente=z.id_pers
				   AND u.id_especialidad=e.id_especialidad
				   AND a.disponible='S';				
				");
				return $consulta->result();
			}else{
			  $consulta=$this->db->query("
				  UPDATE agendas_disponibles SET
				  id_paciente=null,
				  estado='DISPONIBLE',
				  nombre_reserva=null,
				  nombre_paciente=null				  
				  WHERE id_reserva=$id_reserva;
					  ");
			  if($consulta==true){
				  return true;
			  }else{
				  return false;
			  }
			}
		}
		
	public function comprobante($id_reserva){
		
		$sql = "select a.id_reserva,
					   concat_ws(' ', a.dia_semana, DATE_FORMAT(a.fecha,'%d-%m-%Y')) dia_fecha,
					   a.hora,
					   a.estado,
					   a.nombre_paciente			 
				  from agendas_disponibles a
				 where a.id_reserva='$id_reserva'";
		
		//Hacemos una consulta
		$consulta = $this->db->query($sql);
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }

}
?>