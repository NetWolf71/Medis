<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
        $this->load->helper("form");  
         
        //llamo o incluyo el modelo
        $this->load->model("UsuariosModel");
         
        $this->load->model('ModelLogin');
		
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
		//cargo la libreria de sesiones
        $this->load->library("session");
    }

	
	public function index(){		
		
		$txt_primer_nombre    =  $this->input->get('txt_primer_nombre')    ;
		$txt_segundo_nombre   =  $this->input->get('txt_segundo_nombre')   ;
		$txt_apellido_paterno =  $this->input->get('txt_apellido_paterno') ;
		$txt_apellido_materno =  $this->input->get('txt_apellido_materno') ;
		$txt_fecha_nacimiento =  $this->input->get('txt_fecha_nacimiento') ;
		$txt_cedula           =  $this->input->get('txt_cedula')           ;
		$cbo_vigencia         =  $this->input->get('cbo_vigencia')         ;
		$txt_email            =  $this->input->get('txt_email')            ;
		$txt_usuario          =  $this->input->get('txt_usuario')          ;
		$txt_password         =  $this->input->get('txt_password')         ;
		
		
		
		
        //array asociativo con la llamada al metodo del modelo
		$data['txt_primer_nombre']    = $txt_primer_nombre    ;
		$data['txt_segundo_nombre']   = $txt_segundo_nombre   ;
		$data['txt_apellido_paterno'] = $txt_apellido_paterno ;
		$data['txt_apellido_materno'] = $txt_apellido_materno ;
		$data['txt_fecha_nacimiento'] = $txt_fecha_nacimiento ;
		$data['txt_cedula']	          = $txt_cedula           ;
		$data['cbo_vigencia']		  = $cbo_vigencia         ;
		$data['txt_email']			  = $txt_email            ;
		$data['txt_usuario']		  = $txt_usuario          ;
		$data['txt_password']		  = $txt_password         ;
		
		$result  = $this->UsuariosModel->ver($data);
		
		$data["ver"] = $result ;
		
        //cargo la vista y le paso los datos
        $this->load->view("UsuariosView",$data);
    }
	
	
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->UsuariosModel->add(
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
            $this->session->set_flashdata('flag', 'true');
        }else{
            $this->session->set_flashdata('flag', 'false');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url('index.php/UserNewController'));
    }
     
    
	
	
	
	//controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id_pers=null){
        if(is_numeric($id_pers)){
          $datos["mod"]=$this->UsuariosModel->mod($id_pers);
          //var_dump($datos["mod"]);
          $this->load->view("UserModView",$datos);
          if($this->input->post("submit")){
                $mod=$this->UsuariosModel->mod(
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
                    $this->session->set_flashdata('flag', 'true');
                }else{
                    $this->session->set_flashdata('flag', 'false');
                }
                // redirect(base_url('index.php/UsuariosController'));
                redirect(base_url('index.php/UsuariosController/mod/' . $id_pers));
            }
        }else{
            redirect(base_url('index.php/UsuariosController')); 
        }
    }
    
	
	
    //Controlador para eliminar
    public function eliminar($id_pers){
        if(is_numeric($id_pers)){
          $eliminar=$this->UsuariosModel->eliminar($id_pers);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Usuario eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Usuario eliminado correctamente');
          }
          redirect(base_url('index.php/UsuariosController'));
        }else{
          redirect(base_url());
        }
    }
}
?>