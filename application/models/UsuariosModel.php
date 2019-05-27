<?php
class UsuariosModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
 
    public function ver($filtros){
		
		$txt_primer_nombre    = $filtros['txt_primer_nombre'];
		$txt_segundo_nombre   = $filtros['txt_segundo_nombre'];
		$txt_apellido_paterno = $filtros['txt_apellido_paterno'];
		$txt_apellido_materno = $filtros['txt_apellido_materno'];
		$txt_fecha_nacimiento = $filtros['txt_fecha_nacimiento'];
		$txt_cedula           = $filtros['txt_cedula'];
		$cbo_vigencia         = $filtros['cbo_vigencia'];
		$txt_email            = $filtros['txt_email'];
		$txt_usuario          = $filtros['txt_usuario'];
		$txt_password         = $filtros['txt_password'];
		
		$params = array();
		
		//Hacemos una consulta
		
		$sql = "SELECT id_pers , pers_name1,pers_name2,pers_lastname1,pers_lastname2,fecha_nacimiento,dni,
				pers_fecha_creacion,pers_vigencia,id_pers_tipo,email,pers_user,pers_password, id_especialidad, pers_nombre_completo 
				FROM usuarios where id_pers_tipo='4' ";
		
		
		if($txt_primer_nombre){
			$sql .= "and pers_name1 like ? ";
			array_push($params , $txt_primer_nombre );
		}
		
		if($txt_segundo_nombre){
			$sql .= "and pers_name2 like ? ";
			array_push($params , $txt_segundo_nombre );
		}
		
		if($txt_apellido_paterno){
			$sql .= "and pers_lastname1 like ? ";
			array_push($params , $txt_apellido_paterno );
		}
		
		if($txt_apellido_materno){
			$sql .= "and pers_lastname2 like ? ";
			array_push($params , $txt_apellido_materno );
		}
		
		if($txt_fecha_nacimiento){
			$sql .= "and fecha_nacimiento like ? ";
			array_push($params , $txt_fecha_nacimiento );
		}
		
		if($txt_cedula){
			$sql .= "and dni like ? ";
			array_push($params , $txt_cedula );
		}
		
		if($cbo_vigencia){
			if($cbo_vigencia != 'T'){
				$sql .= "and pers_vigencia like ? ";
				array_push($params , $cbo_vigencia );
			}
		}
		
		if($txt_email){
			$sql .= "and email like ? ";
			array_push($params , $txt_email );
		}
		
		
		if($txt_usuario){
			$sql .= "and pers_user like ? ";
			array_push($params , $txt_usuario );
		}
		
		if($txt_password){
			$sql .= "and pers_password like ? ";
			array_push($params , $txt_password );
		}
		
		
		$sql .= "order by id_pers asc ;" ;
		
		
		$consulta = $this->db->query( $sql , $params );
         
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
		$pers_password)
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
			 NULL,
			'$pers_nombre_completo');");
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
				id_pers_tipo='3',
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