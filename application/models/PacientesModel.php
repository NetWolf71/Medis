<?php
class PacientesModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
 
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM usuarios where id_pers_tipo='4' order by id_pers asc;");
         
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
			'$pers_password');");
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
				id_pers_tipo='4',
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