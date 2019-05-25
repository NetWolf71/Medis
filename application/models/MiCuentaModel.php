<?php
class MiCuentaModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
 
	public function ver($id_pers){

		
		$sql = "SELECT u.id_pers,
					   u.pers_fecha_creacion fecha_alta,
					   u.pers_nombre_completo nombre_completo,
					   u.pers_user usuario,
					   u.pers_vigencia vigencia,
		  			   t.pers_tipo_nombre tipo_usuario
				  FROM usuarios u, tipo_usuario t 
				 WHERE u.id_pers='$id_pers'  
				   AND u.id_pers_tipo=t.id_pers_tipo;";
		
		//Hacemos una consulta
		$consulta = $this->db->query($sql);
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
}
?>