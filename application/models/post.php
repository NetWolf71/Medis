<?php

class Post extends CI_Model{
    public function getPost(){
            return $this->db->get('usuarios');
          }
    public function getPostbyUser($user=''){
        $this->db->query("SELECT * FROM usuarios WHERE pers_user = '".$user."' LIMIT 10");
        
        return $result ->row();
    }
}