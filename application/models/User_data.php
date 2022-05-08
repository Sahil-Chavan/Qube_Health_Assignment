<?php

class User_data extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_user($userno){
       
        $query = $this->db->get_where('user',array('userno'=>$userno));
        return $query->result_array();
    }

    public function user_exists($usern)
        {
        // $this->db->where('userno',$usern);
        // $query = $this->db->get('roles');
        $query = $this->db->get_where('user',array('userno'=>$usern));
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}


?>