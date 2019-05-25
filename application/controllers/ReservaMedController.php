<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservaMedController extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
        $this->load->helper("form");  
         
        //llamo o incluyo el modelo
        $this->load->model("ReservaMedModel");
         
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }

	
	public function index(){
         
		$txt_nombre_completo  =  $this->input->get('txt_nombre_completo')  ;
		$txt_nombre_completo2 =  $this->input->get('txt_nombre_completo2')  ;
		$txt_cedula           =  $this->input->get('txt_cedula')           ;
		$txt_especialidad     =  $this->input->get('txt_especialidad')     ;
		
		
        //array asociativo con la llamada al metodo del modelo

		$data['txt_nombre_completo']  = $txt_nombre_completo  ;
		$data['txt_nombre_completo2']  = $txt_nombre_completo2;
		$data['txt_cedula']	          = $txt_cedula           ;
		$data['txt_especialidad']	  = $txt_especialidad     ;
		
		$result  = $this->ReservaMedModel->ver($data);
		
		$data["ver"] = $result ;
		
        //cargo la vista y le paso los datos
		$this->load->view("ReservaMedView",$data);
    }
	
    
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->MedicosModel->add(
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
						$this->input->post("pers_password"),
						$this->input->post("id_especialidad")
						);
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usuario añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url('index.php/MedicosController'));
    }
     
    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id_pers){
        if(is_numeric($id_pers)){
          $datos["mod"]=$this->MedicosModel->mod($id_pers);
          $this->load->view("MedModView",$datos);
          if($this->input->post("submit")){
                $mod=$this->MedicosModel->mod(
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
						$this->input->post("email"),
						$this->input->post("id_especialidad")						
						
						);
                if($mod==true){
                    $this->session->set_flashdata('correcto', 'Usuario modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Error al agregar usuario');
                }
                redirect(base_url('index.php/MedicosController'));
            }
        }else{
            redirect(base_url()); 
        }
    }
     
    //Controlador para eliminar
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