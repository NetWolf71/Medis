<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CalendarioController extends CI_Controller {

     function __construct() 
	 { 
     
		parent::__Construct();
		$this->load->helper('url');
		$this->load->model('ModelLogin');
		$this->load->helper('form');
	if (!$this->ModelLogin->valida_session()){redirect('Home');}
    }

function index($message=NULL){

  $this->load->view('CalendarioCitas_view');

}

public function cerrar_sesion () {
		$this->ModelLogin->close_session();
		redirect('Home');
	}

	function verify_date(){

        $date =  $this->input->post('CalendarioController');  
        
         $error = '<p class="error">La fecha: '.$date. ' es incorrecta</p>';
         $success = '<p class="success">La fecha: '.$date. ' es correcta</p>';
        
         $array  = explode('/',$date); 
    
 if(3===sizeof($array)){ // el tamaño del arreglo no puede ser mayor o menor a tres
        
        $day = $array[0];
        $month = $array[1];
        $year = $array[2];
        
    if (!checkdate($month, $day, $year)) { // validamos que la fecha sea correcta
               
                $this->index($error);
                
    }else{
        
         $this->index($success);
        
    } // fin
        
}else{
    
    $this->index($error);
    
    }  
}
    
}