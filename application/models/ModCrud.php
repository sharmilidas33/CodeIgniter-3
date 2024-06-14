<?php

class ModCrud extends CI_Model{

    public function addUser($data){
        return $this->db->insert('students',$data);
    }

    public function getAllRecords(){
        $this->db->order_by('id','desc');
        return $this->db->get('students');
    }

    public function checkStudent($id){
        return $this->db->get_where('students',array('id'=>$id))->result_array();
    }

    public function updateStudent($data, $userId){
        $this->db->where('id', $userId);
        $result = $this->db->update('students', $data);
        
        // Debugging information
        if (!$result) {
            $error = $this->db->error();
            echo '<pre>';
            print_r($error);
            echo '</pre>';
            exit;
        }
        
        return $result;
    }

    public function deleteStudent($id){
        $this->db->where('id',$id);
        return $this->db->delete('students');
    }

}