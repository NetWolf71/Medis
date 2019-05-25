<?php
class InstitucionesModel extends CI_Model {
	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
 
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query(
		
		"SELECT i.id_institucion ID,
				i.nombre_institucion NOMBRE,
				t.nombre_tipo TIPO,
				i.direccion DIRECCION,
				c.nombre_comuna COMUNA,
				r.nombre_region REGION,
				i.url_maps UBICACION
		   FROM instituciones i, tipo_instituciones t, comunas c, regiones r
		  where i.id_tipo_inst=t.id_tipo_inst
		    and i.id_comuna=c.id_comuna
		    and i.id_region=r.id_region;");
			
			
		
	/*	"SELECT i.id_institucion ID,
				i.nombre_institucion NOMBRE,
				i.id_tipo_inst TIPO,
				i.direccion DIRECCION,
				i.id_comuna COMUNA,
				i.id_region REGION,
				i.url_maps UBICACION
		   FROM instituciones i ;");  */
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }

    public function add(
		$nombre_institucion,
		$id_tipo_inst,
		$sucursal,
		$direccion,
		$id_comuna,
		$id_region,
		$url_maps)
		{
        $consulta=$this->db->query(
		"SELECT nombre_institucion FROM instituciones WHERE nombre_institucion LIKE '$nombre_institucion'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query(
			"INSERT INTO instituciones VALUES (
			 NULL,
			'$nombre_institucion',
			'$id_tipo_inst',
			'$sucursal',
			'$direccion',
			'$id_comuna',
			'$id_region',
			'$url_maps');");
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
	$id_institucion,
	$modificar="NULL",
	$nombre_institucion="NULL",
	$id_tipo_inst="NULL",
	$sucursal="NULL",
	$direccion="NULL",
	$id_comuna="NULL",
	$id_region="NULL",
	$url_maps="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM instituciones WHERE id_institucion=$id_institucion");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE instituciones SET 
				nombre_institucion='$nombre_institucion',
				id_tipo_inst='$id_tipo_inst'
				sucursal='$sucursal',
				direccion='$direccion',
				id_comuna='$id_comuna',
				id_region='$id_region',
				url_maps='$url_maps'
				WHERE id_institucion=$id_institucion;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($id_institucion){
       $consulta=$this->db->query("DELETE FROM instituciones WHERE id_institucion=$id_institucion");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
}
?>