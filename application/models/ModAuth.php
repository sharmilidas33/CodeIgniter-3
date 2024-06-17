<?php

class modAuth extends CI_Model {

    public function checkUser($email) {
        return $this->db->get_where('user', array('email' => $email));
    }

    public function addUser($data) {
        return $this->db->insert('user', $data);
    }

    public function checkLink($link){
        $this->db->get_where('user',array('eLink'=>$link));
    }

    public function activateTheAccount($data, $link){
        $this->db->where('eLink',$link);
        return $this->db->update('user', $data);
    }

    public function checkUserwithPassword($data){
        return $this->db->get_where('user', $data)->result_array();
    }
}
