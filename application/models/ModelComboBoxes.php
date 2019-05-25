<?php
class ModelComboBoxes extends CI_Model{
    	
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
	
    public function getEspecialidades() {
        $this->db->order_by('nombre', 'asc');
        $especialidades = $this->db->get('especialidades');
        
        if($especialidades->num_rows() > 0){
            return $especialidades->result();
        }
    }
    
        public function getRegiones() {
        $this->db->order_by('nombre_region', 'asc');
        $regiones = $this->db->get('regiones');
        
        if($regiones->num_rows() > 0){
            return $regiones->result();
        }
    }
        public function getComunas($id_region) {
        $this->db->where('id_region', $id_region);
        $this->db->order_by('nombre_comuna', 'asc');
        $comunas = $this->db->get('comunas');
        
        if($comunas->num_rows() > 0){
            return $comunas->result();
        }
    }
        
        
        public function getTipoInstituciones() {
        $this->db->order_by('nombre_tipo', 'asc');
        $tipo_instituciones = $this->db->get('tipo_instituciones');
        
        if($tipo_instituciones->num_rows() > 0){
            return $tipo_instituciones->result();
        }
    }
    
    public function getUsuarios($id_especialidad) {
        $this->db->where('id_especialidad', $id_especialidad);
        $this->db->order_by('pers_nombre_completo', 'asc');
        $usuarios = $this->db->get('usuarios');
        
        if($usuarios->num_rows() > 0){
            return $usuarios->result();
        }
    }
}