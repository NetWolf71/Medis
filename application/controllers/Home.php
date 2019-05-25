<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->helper('url');
		$this->load->library( array('form_validation') );
    $result = $this->db->get('usuarios');
    $data = array('consulta' =>$result);
	
	$this->form_validation->set_rules('txt_loginUser', 'Usuario', 'trim|required|callback_valida_usuario');
	$this->form_validation->set_rules('pass_loginUser', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			// error de validacion 
			$this->load->view('login',$data);
		}
		else
		{
			redirect('Inicio');
		}

	}
	
		function valida_usuario($user)
	{
		$this->load->model('modelLogin');
		// parametros en mayusculas
		$user 		= $this->input->post('txt_loginUser');
		$password 	= $this->input->post('pass_loginUser');
		
		
		if( $this->modelLogin->login_usuario( $user , $password) ){
			// credendiales ok
			return true;
		}else{
			// credenciales error / usuario no existe
			$this->form_validation->set_message('valida_usuario', 'Usuario o contraseña inválidos');
			return false;
		}
	}
}

