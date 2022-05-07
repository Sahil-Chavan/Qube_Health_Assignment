<?php

class User_data extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_post($userno=FALSE){
        if($userno=== FALSE){
            $query = $this->db->get('user');
            return $query->result_array();
        }
        $query = $this->db->get_where('user',array('userno'=>$userno));
        return $query->row_array();
    }
}


?>