<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichaNewController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelLogin');

		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
	}
	
	public function index ()
	{
		$this->load->view('FichaNewView');
		
		/*$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('myform');
		}
		else
		{
				$this->load->view('formsuccess');
		}*/
	}
}

?>