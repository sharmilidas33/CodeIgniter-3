<?php

class ModHome extends CI_Model
{
    public function getAllRecords(){
        return $this->db->get('students'); //like select * from students.
    }

    public function getFunc(){
        return $this->db->get_where('students',array('id'=>2));
    }

    public function mixup(){
        $this->db->select('fullname,email,password,id');
        $this->db->from('students');
        // $this->db->where('id',2);
        $this->db->where(array('id'=>1,'fullname'=>'John Doe'));
        return $this->db->get();
    }

    public function myWhereIn(){
        $this->db->where_in('id',array(1,3,5));
        return $this->db->get('students');
    }

    public function myLike($name){
        $this->db->like('fullname',$name);
        return $this->db->get('students');
    }

    public function myOrderBy(){
        // $this->db->limit(1,4);
        $this->db->order_by('id','desc');
        return $this->db->get('students');
    }

    public function insertData($array){
        // $this->db->insert('students',$array);
        $this->db->insert_batch('students',$array);
    }

    public function updateData($array, $userId){
        $this->db->where('id',$userId);
        return $this->db->update('students',$array);
    }

    public function deleteData($id){
        $this->db->where('id',$id);
        return $this->db->delete('students');
    }

    public function myReturnId($array){
        $this->db->insert('students',$array);
        return $this->db->insert_id();
    }

    public function myLastQuery(){
        $this->db->get('students',array('id'=>6));
        return $this->db->last_query();
    }

    // public function myChaining(){
    //     return $this->db->select('*')
    //     ->from('students'),
    //     where('id',6),
    //     ->get('students');
    // }

    public function myagri(){
        $this->db->select_max('age');
        $this->db->select_min('age');
        $this->db->select_avg('age');
        $this->db->select_sum('age');
        return $this->db->get('students');
    }
}