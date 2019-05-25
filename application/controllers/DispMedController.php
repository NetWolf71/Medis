<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DispMedController extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
        $this->load->helper("form");  
         
        //llamo o incluyo el modelo
        $this->load->model("DispMedModel");
         
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }
    
	// Carga la web de inicio con horas disponibles 
	public function carga($id_pers){
        if(is_numeric($id_pers)){
          $datos["ver"]=$this->DispMedModel->ver($id_pers);
          $this->load->view("DispMedView",$datos);
	
		}
	}

	public function comprobante($id_reserva){
        if(is_numeric($id_reserva)){
          $datos["comprobante"]=$this->DispMedModel->comprobante($id_reserva);
          $this->load->view("CompReservaView",$datos);
	
		}
	}
	
	
	//controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id_reserva){
        if(is_numeric($id_reserva)){
          $datos["mod"]=$this->DispMedModel->mod($id_reserva);
          $this->load->view("ConfirmaReservaView",$datos);
          if($this->input->post("submit")){
                $mod=$this->DispMedModel->mod(
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
		  redirect(base_url('index.php/DispMedController/comprobante/' . $id_reserva));
            }
        }else{
            redirect(base_url()); 
        }
    }

    public function eliminar($id_pers){
        if(is_numeric($id_pers)){
          $eliminar=$this->MedicosModel->eliminar($id_pers);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Usuario eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Usuario eliminado correctamente');
          }
          redirect(base_url('index.php/MedicosController'));
        }else{
          redirect(base_url());
        }
    }
	
}
?>