<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PacientesController extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
         
        //llamo o incluyo el modelo
        $this->load->model("PacientesModel");
         
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }

	
	public function index(){
         
        //array asociativo con la llamada al metodo
        //del modelo
        $pacientes["ver"] = $this->PacientesModel->ver();
         
        //cargo la vista y le paso los datos
        $this->load->view("PacientesView",$pacientes);
    }
     
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->PacientesModel->add(
						$this->input->post("id_pers_tipo"),
						$this->input->post("pers_name1"),
						$this->input->post("pers_name2"),
						$this->input->post("pers_lastname1"),
						$this->input->post("pers_lastname2"),
						$this->input->post("fecha_nacimiento"),
						$this->input->post("dni"),
						$this->input->post("pers_vigencia"),
						$this->input->post("email"),
						$this->input->post("pers_user"),
						$this->input->post("pers_password")
						);
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Paciente añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Error al agregar paciente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url('index.php/PacientesController'));
    }
     
    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id_pers){
        if(is_numeric($id_pers)){
          $datos["mod"]=$this->PacientesModel->mod($id_pers);
          $this->load->view("PasModView",$datos);
          if($this->input->post("submit")){
                $mod=$this->PacientesModel->mod(
                        $id_pers,
						$this->input->post("submit"),
						$this->input->post("id_pers_tipo"),
						$this->input->post("pers_fecha_creacion"),
						$this->input->post("pers_user"),
						$this->input->post("pers_password"),
						$this->input->post("pers_name1"),
						$this->input->post("pers_name2"),
						$this->input->post("pers_lastname1"),
						$this->input->post("pers_lastname2"),
						$this->input->post("dni"),
						$this->input->post("fecha_nacimiento"),
						$this->input->post("pers_vigencia"),
						$this->input->post("email")
						
						);
                if($mod==true){
                    $this->session->set_flashdata('correcto', 'Paciente modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Error al agregar paciente');
                }
                redirect(base_url('index.php/PacientesController'));
            }
        }else{
            redirect(base_url()); 
        }
    }
     
    //Controlador para eliminar
    public function eliminar($id_pers){
        if(is_numeric($id_pers)){
          $eliminar=$this->PacientesModel->eliminar($id_pers);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Paciente eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Paciente eliminado correctamente');
          }
          redirect(base_url('index.php/PacientesController'));
        }else{
          redirect(base_url());
        }
    }
}
?>