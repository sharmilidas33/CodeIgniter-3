<?php

class Crud extends CI_Controller{

    public function index(){
        $this->load->view('student');
    }

    public function newUser(){
        $data['fullname'] = $this->input->post('fullname', true);
        $data['age'] = $this->input->post('age', true);
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $data['date'] = $this->input->post('date', true);

        if (empty($data['fullname']) || empty($data['age']) || 
            empty($data['email']) || empty($data['password']) || empty($data['date'])) 
        {
            $this->session->set_flashdata('message', 'Empty fields.');
            redirect('crud');
        } else {
            $value = $this->modCrud->addUser($data);
            if($value){
                $this->session->set_flashdata('message', 'Data Inserted Successfully');
                redirect('crud');
            } else {
                $this->session->set_flashdata('message', 'Data not inserted.');
                redirect('crud');
            }
        }
    }

    public function allStudents(){
        $data['allStudents']= $this->modCrud->getAllRecords();
        $this->load->view('allStudents',$data);
    }   

    public function editStudent($id= null){

        $value['studentRecord']= $this->modCrud->checkStudent($id);
        if(count($value)==1){
            $this->load->view('editStudent',$value);
        }
        else{
            $this->session->set_flashdata('message', 'Data doesnt exist');
                redirect('crud/allStudents');
        }
    }

    public function updateStudent(){
        $data['fullname']=$this->input->post('fullname',true);
        $data['age']=$this->input->post('age',true);
        $data['email']=$this->input->post('email',true);
        $data['password']=$this->input->post('password',true);
        $data['date']=$this->input->post('date',true);

        if (empty($data['fullname']) || empty($data['age']) || 
        empty($data['email']) || empty($data['password']) || empty($data['date']))
        {
            $this->session->set_flashdata('message', 'Fill all the fields');
                redirect('crud/updateStudent');
        }
        else
        {

        }
    }

}
