<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientesNewController extends CI_Controller
{
    public function __construct()
    {
        //llamamos al constructor de la clase padre
        parent::__construct();

        //llamo al helper url
        $this->load->helper("url");

        //llamo librerías de validación
        $this->load->library('form_validation');

        //llamo o incluyo el modelo
        $this->load->model("ClientesNewModel");
    }

    public function index()
    {
        $this->load->view("ClientNewView");
    }

    //Método para ingresar usuarios nuevos
    public function add()
    {

        //compruebo si se a enviado submit
        if ($this->input->post()) {
        $pass1 = $this->input->post("pers_password");
        $pass2 = $this->input->post("pers_password2");
        if ($pass1 == $pass2) {
            //llamo al metodo add
            $add = $this->ClientesNewModel->add(
                    $this->input->post("id_pers_tipo"),
                    $this->input->post("pers_name1"),
                    $this->input->post("pers_name2"),
                    $this->input->post("pers_lastname1"),
                    $this->input->post("pers_lastname2"),
                    $this->input->post("fecha_nacimiento"),
                    $this->input->post("rut"),
                    $this->input->post("pers_vigencia"),
                    $this->input->post("email"),
                    $this->input->post("pers_user"),
                    $this->input->post("pers_password")
            );
                if ($add == true)
                //redirecciono la pagina a la url por defecto
                {
                    redirect(base_url());
                } else {
                    $data['mensaje'] = 'error! Este email ya ha sido registrado';
                    $this->load->view('ClientNewView', $data);
                }

            } else {
                $data['mensaje'] = 'Las contraseñas no coinciden';
                $this->load->view('ClientNewView', $data);
            }
        }
    }//Fin método add
}