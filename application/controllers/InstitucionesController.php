<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstitucionesController extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
        
		$this->load->helper("form");  	
		
        //llamo o incluyo el modelo
        $this->load->model("InstitucionesModel");
		$this->load->model('ModelComboBoxes');
		
         
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }

	
	public function index(){
         
        //array asociativo con la llamada al metodo
        //del modelo
        $instituciones["ver"] = $this->InstitucionesModel->ver();
         
        //cargo la vista y le paso los datos
        $this->load->view("InstitucionesView",$instituciones);
    }
     
    //controlador para añadir
    public function add(){
 
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->InstitucionesModel->add(
						$this->input->post("nombre_institucion"),
						$this->input->post("id_tipo_inst"),
						$this->input->post("sucursal"),
						$this->input->post("direccion"),
						$this->input->post("id_comuna"),
						$this->input->post("id_region"),
						$this->input->post("url_maps")
						);
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Institución añadida correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Error el agregar Institución');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url('index.php/InstitucionesController'));
    }
     
    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id_institucion){
        if(is_numeric($id_institucion)){
          $datos["mod"]=$this->InstitucionesModel->mod($id_institucion);
          $this->load->view("InstModView",$datos);
          if($this->input->post("submit")){
			  

                $mod=$this->InstitucionesModel->mod(
                        $id_institucion,
						$this->input->post("submit"),
						$this->input->post("nombre_institucion"),
						$this->input->post("id_tipo_inst"),
						$this->input->post("sucursal"),
						$this->input->post("direccion"),
						$this->input->post("id_comuna"),
						$this->input->post("id_region"),
						$this->input->post("url_maps"));
                if($mod==true){
                    $this->session->set_flashdata('correcto', 'Institución modificada correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Error al agregar Institución');
                }
                redirect(base_url('index.php/InstitucionController'));
            }
        }else{
            redirect(base_url()); 
        }
    }
     
    //Controlador para eliminar
    public function eliminar($id_institucion){
        if(is_numeric($id_institucion)){
          $eliminar=$this->InstitucionesModel->eliminar($id_institucion);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Institucion eliminada correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Error al eliminar institución');
          }
          redirect(base_url('index.php/InstitucionesController'));
        }else{
          redirect(base_url());
        }
    }
}
?>