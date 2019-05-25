<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriasController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelLogin');

		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
	}
	
	public function index ()
	{
		$this->load->view('categorias_view');
	}
	
	public function cerrar_sesion () {
		$this->ModelLogin->close_session();
		redirect('Home');
	}
}

?>