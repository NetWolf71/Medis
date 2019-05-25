<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuscarHoraController extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('ModelLogin');

	}
    public function index(){
        $this->load->model('ModelComboBoxes');
        $data['especialidades'] = $this->ModelComboBoxes->getEspecialidades();
        
        $this->load->view('viewComboBoxes', $data);
    }
}

?>