<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class EspecialidadesModel extends CI_MODEL
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function nueva_esp($data)
    {
        $this->db->insert('especialidades', array('id_especialidad' => $data['id'], 'nombre' => $data['nombre']));
    }
    public function listar_esp()
    {
        /*//Hacemos una consulta
        $consulta=$this->db->query('SELECT * FROM especialidades');
        //Devolvemos el resultado de la consulta
        return $consulta;*/
        $query = $this->db->get('especialidades');
        if ($query->num_rows() > 0) {
            return $query;
        } 
        else {
            return false;
        }

    }
    public function mostrar_esp($id)
    {
        $this->db->where('id_especialidad', $id);
        $query = $this->db->get('especialidades');
        if ($query->num_rows() > 0) {
            return $query;
        } 
        else {
            return false;
        }

    }
    public function actualizar_esp($id, $data)
    {
        $datos = array(
            /*'id_especialidad' => $data['id_especialidad'],*/
            'nombre' => $data['nombre']
        );
        $this->db->where('id_especialidad', $id);
        $query = $this->db->update('especialidades', $datos);
    }
    public function eliminar_esp($id)
    {
        $this->db->delete('especialidades', array('id_especialidad' => $id));
    }
}
