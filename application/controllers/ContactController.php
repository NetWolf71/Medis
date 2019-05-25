<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelLogin');
		if(!$this->ModelLogin->valida_session()){ redirect('Home'); }
	}
		public function index ()
	{		$this->load->library('form_validation');
		$this->form_validation->set_rules('InputEmail','Email','required');
		$this->form_validation->set_rules('Subject','Email','required');
				if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('ContactView');
		}
		else
		{
		$this->load->library('email');
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'medis.rtscd.cl';
		$config['smtp_user'] = 'medis@medis.rtscd.cl';
		$config['smtp_pass'] = ')wY_sPbM3Q=@';
		$config['smtp_port'] = 587;
		$config['smtp_crypto'] = 'tls';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");		
		$mail = $this->input->post('InputEmail');
		$subject = $this->input->post('Subject');
				$this->email->from('medis@medis.rtscd.cl', 'Web Medis');
		$this->email->to('rrojas@scd.cl');
		$this->email->cc($mail);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();	
		$this->session->set_flashdata('result','true');
		$this->load->view('ContactView');
		}
	}
}

?>