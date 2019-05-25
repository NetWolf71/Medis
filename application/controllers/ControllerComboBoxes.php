<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerComboBoxes extends CI_Controller{

	public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
         
        //llamo o incluyo el modelo
        $this->load->model("ModelComboBoxes");
         
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }
	
    public function fillCiudades() {
        $id_especialidad = $this->input->post('id_especialidad');
        
        if($id_especialidad){
            $this->load->model('ModelComboBoxes');
            $usuarios = $this->ModelComboBoxes->getUsuarios($id_especialidad);
            echo '<option value="0">Medicos</option>';
            foreach($usuarios as $fila){
                echo '<option value="'. $fila->id_pers .'">'. $fila->pers_nombre_completo .'</option>';
            }
        }  else {
            echo '<option value="0">Medicos</option>';
        }
    }
    
    public function hacerAlgo() {
        $id_especialidad = $this->input->post('id_especialidad');
        $id_pers = $this->input->post('id_pers');
        
        echo 'id_especialidad = '. $id_especialidad. '; id_pers = '. $id_pers;
    }
} 