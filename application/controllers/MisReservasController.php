<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MisReservasController extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
        
		$this->load->helper("form");  	
		
        //llamo o incluyo el modelo
        $this->load->model("MisReservasModel");
     
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }

		// construye la pagina	
	public function ver($id_pers){
        if(is_numeric($id_pers)){
          $datos["ver"]=$this->MisReservasModel->ver($id_pers);
          $this->load->view("MisReservasView",$datos);
	
		}
	}
	
	public function mod($id_reserva){
        if(is_numeric($id_reserva)){
          $datos["mod"]=$this->MisReservasModel->mod($id_reserva);
          $this->load->view("AnulaReservaView",$datos);
          if($this->input->post("submit")){
                $mod=$this->MisReservasModel->mod(
                        $id_reserva,
						$this->input->post("submit"),
						$this->input->post("pers_nombre_completo"),
						$this->input->post("id_paciente"),
						$this->input->post("nombre"),
						$this->input->post("dia_fecha"),
						$this->input->post("hora"),
						$this->input->post("estado"),
						$this->input->post("nombre_reserva"),
						$this->input->post("nombre_paciente")
						
						);
                if($mod==true){
                    $this->session->set_flashdata('flag', 'true');
                }else{
                    $this->session->set_flashdata('flag', 'false');
                }
                // redirect(base_url('index.php/UsuariosController'));
		  redirect(base_url('index.php/MisReservasController/comprobante/' . $id_reserva));
            }
        }else{
            redirect(base_url()); 
        }
    }
	
		public function comprobante($id_reserva){
        if(is_numeric($id_reserva)){
          $datos["comprobante"]=$this->MisReservasModel->comprobante($id_reserva);
          $this->load->view("CompAnulaReservaView",$datos);
	
		}
	}
}
?>