<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MiCuentaController extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
        
		$this->load->helper("form");  	
		
        //llamo o incluyo el modelo
        $this->load->model("MiCuentaModel");
     
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }

		// construye la pagina	
	public function ver($id_pers){
        if(is_numeric($id_pers)){
          $datos["ver"]=$this->MiCuentaModel->ver($id_pers);
          $this->load->view("MiCuentaView",$datos);
	
		}
	}
	
}
?>