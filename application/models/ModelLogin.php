<?php
class ModelLogin extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
	/*
		login_usuario : valida contra la BD si las credenciales del usuario estan 'OK'
						en el caso favorable aÃ±ade a la session los datos del usuario.
	*/
	function login_usuario($pers_user , $pers_password){
		$sql = "select
		u.id_pers,
		u.pers_name1,
		u.pers_name2,
		u.pers_lastname1,
		u.pers_lastname2,
		u.pers_user,
		u.pers_password,
		u.pers_vigencia,
		t.pers_tipo_nombre
		from usuarios u, tipo_usuario t
		where u.pers_vigencia = 'S'
		and u.id_pers_tipo=t.id_pers_tipo
		and u.pers_user = ?
		and u.pers_password = ?; ";
		
		$rs = $this->db->query( $sql, array($pers_user , $pers_password) );
		
		if( $rs->num_rows() == 1 ){
			$this->set_session($rs->result());
			return true;
		}else{
			return false;
		}
	}
	
	
	function set_session($rs){
		$result = $rs[0];
		
		$datos_usuario = array(
        'id_pers'	  			=> $result->id_pers,
        'pers_name1'  			=> $result->pers_name1 ,
        'pers_name2'   			=> $result->pers_name2 ,
        'pers_lastname1' 		=> $result->pers_lastname1 , 
        'pers_lastname2' 		=> $result->pers_lastname2 , 
        'pers_user' 			=> $result->pers_user , 
        'pers_password' 		=> $result->pers_password ,
        'pers_vigencia' 		=> $result->pers_vigencia ,
        'pers_tipo_nombre' 		=> $result->pers_tipo_nombre
		);

		$this->session->set_userdata($datos_usuario);
	}
	
	
	function close_session(){
		unset(
			$_SESSION['id_pers'],	
			$_SESSION['pers_name1'],	
			$_SESSION['pers_name2'],  
			$_SESSION['pers_lastname1'],	
			$_SESSION['pers_lastname2'],	
			$_SESSION['pers_user'],	
			$_SESSION['pers_password'],	
			$_SESSION['pers_vigencia'],	
			$_SESSION['pers_tipo_nombre']
		);
	}
	
	function valida_session(){
		
		if( !isset($_SESSION['pers_user'])  ){
			return false;
		}else{
			return true;
		}
	}
	
}
?>