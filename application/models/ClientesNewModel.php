<?php
class ClientesNewModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
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
			'$pers_password',
			 NULL,
			 NULL);");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
?>