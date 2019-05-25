<?php
class ReservaMedModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
 
    public function ver($filtros){
        
		$txt_nombre_completo		= $filtros['txt_nombre_completo'];
		$txt_nombre_completo2		= $filtros['txt_nombre_completo2'];
		$txt_cedula           		= $filtros['txt_cedula'];
		$txt_especialidad      		= $filtros['txt_especialidad'];
		
		
		$params = array();
		
		$sql = "SELECT u.id_pers,
					   u.pers_nombre_completo,
					   u.dni,
					   e.nombre
					   FROM usuarios u,especialidades e where u.id_pers_tipo='2'
					   AND u.id_especialidad=e.id_especialidad " ;
		
		if($txt_nombre_completo){
			$txt_nombre_completo = '%' . $txt_nombre_completo . '%';
			$sql .= "and pers_nombre_completo like ? ";
			array_push($params , $txt_nombre_completo );
			
		}		
		
		if($txt_nombre_completo2){
			$txt_nombre_completo2 = '%' . $txt_nombre_completo2 . '%';
			$sql .= "and pers_nombre_completo like ? ";
			array_push($params , $txt_nombre_completo2 );
		}
				
		if($txt_cedula){
			$txt_cedula = '%' . $txt_cedula . '%';
			$sql .= "and dni like ? ";
			array_push($params , $txt_cedula );
		}
		
		if($txt_especialidad){
			$txt_especialidad='%' . $txt_especialidad . '%';
			$sql .= "and nombre like ? ";
			array_push($params , $txt_especialidad );
		}
		
		//Hacemos una consulta
		$consulta = $this->db->query($sql , $params);
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }

    public function add(
		$id_pers_tipo,
		$pers_name1,
		$pers_name2,
		$pers_lastname1,
		$pers_lastname2,
		$fecha_nacimiento,
		$dni,
		$pers_vigencia,
		$email,
		$pers_user,
		$pers_password,
		$id_especialidad)
		{
        $consulta=$this->db->query(
		"SELECT email FROM usuarios WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
			$pers_nombre_completo=$pers_name1.' '.$pers_name2.' '.$pers_lastname1.' '.$pers_lastname2;
            $consulta=$this->db->query(
			"INSERT INTO usuarios VALUES (
			 NULL,
			'$pers_name1',
			'$pers_name2',
			'$pers_lastname1',
			'$pers_lastname2',
			'$fecha_nacimiento',
			'$dni',
			 now(),
			'S',
			'$id_pers_tipo',
			'$email',
			'$pers_user',
			'$pers_password',
			'$id_especialidad',
			'$pers_nombre_completo'
			);");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
     
    public function mod(
	$id_pers,
	$modificar="NULL",
	$id_pers_tipo="NULL",
	$pers_fecha_creacion="NULL",
	$pers_user="NULL",
	$pers_password="NULL",
	$pers_name1="NULL",
	$pers_name2="NULL",
	$pers_lastname1="NULL",
	$pers_lastname2="NULL",
	$dni="NULL",
	$fecha_nacimiento="NULL",
	$pers_vigencia="NULL",
	$email="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM usuarios WHERE id_pers=$id_pers");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE usuarios SET 
				id_pers_tipo='2',
				pers_fecha_creacion='$pers_fecha_creacion',
				pers_user='$pers_user',
				pers_password='$pers_password',
				pers_name1='$pers_name1',
				pers_name2='$pers_name2',
				pers_lastname1='$pers_lastname1',
				pers_lastname2='$pers_lastname2',
				dni='$dni',
				fecha_nacimiento='$fecha_nacimiento',
				pers_vigencia='$pers_vigencia',
				email='$email'
			  WHERE id_pers=$id_pers;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
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