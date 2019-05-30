<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaController extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
         
        //llamo o incluyo el modelo
        $this->load->model("FichaModel");
         
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }

	
	public function index(){
         
        //array asociativo con la llamada al metodo
        //del modelo
        $fichas["ver"] = $this->FichaModel->ver();
         
        //cargo la vista y le paso los datos
        $this->load->view("FichaView",$fichas);
    }
     
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->FichaModel->add(
						$this->input->post("id_pers_medico_ficha"),
						$this->input->post("dni_paciente_ficha"),
						$this->input->post("nombres_ficha"),
						$this->input->post("paterno_ficha"),
						$this->input->post("materno_ficha"),
						$this->input->post("fecha_nac_ficha"),
						$this->input->post("peso_ficha"),
						$this->input->post("estatura_ficha"),
						$this->input->post("dolencia_cron_ficha"),
						$this->input->post("alergia_ficha"),
						$this->input->post("obs_ficha")
						);
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Ficha creada correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Error al crear la ficha del paciente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url('index.php/FichaController'));
    }
     
    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id_ficha){
        if(is_numeric($id_ficha)){
          $datos["mod"]=$this->FichaModel->mod($id_pers);
          //$this->load->view("PasModView",$datos);
          if($this->input->post("submit")){
                $mod=$this->FichaModel->mod(
                        $id_ficha,
						$this->input->post("submit"),
                        $this->input->post("id_pers_medico_ficha"),
                        $this->input->post("dni_paciente_ficha"),
                        $this->input->post("nombres_ficha"),
                        $this->input->post("paterno_ficha"),
                        $this->input->post("materno_ficha"),
                        $this->input->post("fecha_nac_ficha"),
                        $this->input->post("peso_ficha"),
                        $this->input->post("estatura_ficha"),
                        $this->input->post("dolencia_cron_ficha"),
                        $this->input->post("alergia_ficha"),
                        $this->input->post("obs_ficha")
						);
                if($mod==true){
                    $this->session->set_flashdata('correcto', 'Ficha modificada correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Error al modificar la ficha del paciente');
                }
                redirect(base_url('index.php/FichaController'));
            }
        }else{
            redirect(base_url()); 
        }
    }
     
    //Controlador para eliminar
    public function eliminar($id_ficha){
        if(is_numeric($id_ficha)){
          $eliminar=$this->FichaModel->eliminar($id_ficha);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Ficha eliminada correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'No se pudo eliminar la ficha del paciente');
          }
          redirect(base_url('index.php/FichaController'));
        }else{
          redirect(base_url());
        }
    }
}
?>