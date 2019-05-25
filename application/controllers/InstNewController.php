<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstNewController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelLogin');
		$this->load->model('ModelComboBoxes');

		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
	}
	
	public function index ()
	{
		$data['tipo_instituciones'] = $this->ModelComboBoxes->getTipoInstituciones();
		//$data['comunas'] = $this->ModelComboBoxes->getComunas();
		$data['regiones'] = $this->ModelComboBoxes->getRegiones();
		$this->load->view('InstNewView',$data);
	}
	
    public function fillComunas() {
        $id_region = $this->input->post('id_region');
        
        if($id_region){
            $this->load->model('ModelComboBoxes');
            $comunas = $this->ModelComboBoxes->getComunas($id_region);
            echo '<option value="0">Comunas</option>';
            foreach($comunas as $fila){
                echo '<option value="'. $fila->id_comuna .'">'. $fila->nombre_comuna .'</option>';
            }
        }  else {
            echo '<option value="0">Comunas</option>';
        }
    }
    
	public function cerrar_sesion () {
		$this->ModelLogin->close_session();
		redirect('Home');
	}
}

?>