<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MedNewController extends CI_Controller {

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
		$data['especialidades'] = $this->ModelComboBoxes->getEspecialidades();
		$this->load->view('MedNewView',$data);
	}
	
	public function cerrar_sesion () {
		$this->ModelLogin->close_session();
		redirect('Home');
	}
}

?>