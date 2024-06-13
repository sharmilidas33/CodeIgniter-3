<?php

class ModCrud extends CI_Model{

    public function addUser($data){
        return $this->db->insert('students',$data);
    }

    public function getAllRecords(){
        return $this->db->get('students');
    }

    public function checkStudent($id){
        return $this->db->get_where('students',array('id'=>$id))->result_array();
    }

}