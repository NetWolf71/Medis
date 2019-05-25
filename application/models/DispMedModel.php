<?php
class DispMedModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
 
	// carga la web inicial de horas disponibles
	public function ver($id_pers){

		
		$sql = "SELECT a.id_reserva,
					   a.id_pers,
					   u.pers_nombre_completo,
					   e.nombre,
					   a.dia_semana,
					   DATE_FORMAT(a.fecha,'%d-%m-%Y') fecha,
					   a.hora,
					   a.estado,
					   a.disponible,
					   a.nombre_reserva,
					   concat_ws(' ', a.dia_semana, DATE_FORMAT(a.fecha,'%d-%m-%Y')) dia_fecha
				  FROM agendas_disponibles a,usuarios u,especialidades e
				 WHERE a.id_pers='$id_pers'
				   AND a.fecha BETWEEN NOW() AND ( CURDATE() + INTERVAL 30 DAY )
				   AND a.id_pers=u.id_pers
				   AND u.id_especialidad=e.id_especialidad
				   AND a.estado != 'RESERVADA'
				   AND a.disponible='S';";
		
		//Hacemos una consulta
		$consulta = $this->db->query($sql);
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }

	// mod que agrega nombre de reserva y cambia estado a reservada
	
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
					   a.disponible,
					   a.nombre_reserva,
					   a.nombre_paciente,
					   concat_ws(' ', a.dia_semana, DATE_FORMAT(a.fecha,'%d-%m-%Y')) dia_fecha
				  FROM agendas_disponibles a,usuarios u,especialidades e
				 WHERE a.id_reserva='$id_reserva'
				   AND a.fecha BETWEEN NOW() AND ( CURDATE() + INTERVAL 30 DAY )
				   AND a.id_pers=u.id_pers
				   AND u.id_especialidad=e.id_especialidad
				   AND a.disponible='S';				
				");
				return $consulta->result();
			}else{
			  $consulta=$this->db->query("
				  UPDATE agendas_disponibles SET
				  id_paciente='$id_paciente',
				  estado='RESERVADA',
				  nombre_reserva=upper('$nombre_reserva'),
				  nombre_paciente=upper('$nombre_paciente')
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
					   u.pers_nombre_completo medico,
					   e.nombre especialidad,
					   z.pers_nombre_completo reservador,
					   concat_ws(' ', a.dia_semana, DATE_FORMAT(a.fecha,'%d-%m-%Y')) dia_fecha,
					   a.hora,
					   a.estado,
					   a.nombre_paciente			 
				  from agendas_disponibles a, usuarios u, usuarios z, especialidades e
				 where a.id_reserva='$id_reserva'
				   and u.id_especialidad=e.id_especialidad
				   and a.id_pers=u.id_pers
				   and a.id_paciente=z.id_pers;";
		
		//Hacemos una consulta
		$consulta = $this->db->query($sql);
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
	
	
    public function eliminar($id_pers){
       $consulta=$this->db->query("DELETE FROM usuarios WHERE id_pers=$id_pers");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
 
}
?>