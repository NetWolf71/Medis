<?php
class FichaModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
 
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM ficha order by id_ficha asc;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }

    public function add(
				$id_pers_medico_ficha,
				$dni_paciente_ficha,
				$nombres_ficha,
				$paterno_ficha,
				$materno_ficha,
				$fecha_nac_ficha,
				$peso_ficha,
				$estatura_ficha,
				$dolencia_cron_ficha,
				$alergia_ficha,
				$obs_ficha
			)
		{
        $consulta=$this->db->query(
		"SELECT dni_paciente_ficha FROM ficha WHERE dni_paciente_ficha LIKE '$dni_paciente_ficha'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query(
			"INSERT INTO ficha VALUES (
			 NULL,
				'$id_pers_medico_ficha',
				'$dni_paciente_ficha',
				'$nombres_ficha',
				'$paterno_ficha',
				'$materno_ficha',
				'$fecha_nac_ficha',
				'$peso_ficha',
				'$estatura_ficha',
				'$dolencia_cron_ficha',
				'$alergia_ficha',
				'$obs_ficha'
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
			$id_ficha,
			$id_pers_medico_ficha="NULL",
			$dni_paciente_ficha="NULL",
			$nombres_ficha="NULL",
			$paterno_ficha="NULL",
			$materno_ficha="NULL",
			$fecha_nac_ficha="NULL",
			$peso_ficha="NULL",
			$estatura_ficha="NULL",
			$dolencia_cron_ficha="NULL",
			$alergia_ficha="NULL",
			$obs_ficha="NULL"
	){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM ficha WHERE id_ficha=$id_ficha");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE ficha SET 
				id_pers_medico_ficha='$id_pers_medico_ficha',
				dni_paciente_ficha='$dni_paciente_ficha',
				nombres_ficha='$nombres_ficha',
				paterno_ficha='$paterno_ficha',
				materno_ficha='$materno_ficha',
				fecha_nac_ficha='$fecha_nac_ficha',
				peso_ficha='$peso_ficha',
				estatura_ficha='$estatura_ficha',
				dolencia_cron_ficha='$dolencia_cron_ficha',
				alergia_ficha='$alergia_ficha',
				obs_ficha='$obs_ficha',
			  WHERE id_ficha=$id_ficha;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($id_ficha){
       $consulta=$this->db->query("DELETE FROM ficha WHERE id_ficha=$id_ficha");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
 
}
?>