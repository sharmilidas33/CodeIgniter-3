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
        $data['allStudents'] = $this->modCrud->getAllRecords();
        $this->load->view('allStudents', $data);
    }   

    public function editStudent($id = null){
        $value['studentRecord'] = $this->modCrud->checkStudent($id);
        if(count($value['studentRecord']) == 1){
            $this->load->view('editStudent', $value);
        } else {
            $this->session->set_flashdata('message', 'Data doesn\'t exist');
            redirect('crud/allStudents');
        }
    }

    public function updateStudent(){
        $userId = $this->input->post('id', true);
        $data['fullname'] = $this->input->post('fullname', true);
        $data['age'] = $this->input->post('age', true);
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $data['date'] = $this->input->post('date', true);
        
        // Echo the received data and exit the script
        // echo '<pre>';
        // echo 'User ID: ' . $userId . "\n";
        // print_r($data);
        // echo '</pre>';
        // exit;

        if (empty($data['fullname']) || empty($data['age']) || 
            empty($data['email']) || empty($data['password']) || empty($data['date']) || empty($userId))
        {
            $this->session->set_flashdata('message', 'Fill all the fields');
            redirect('crud/allStudents');
        } else {
            $myreturn = $this->modCrud->updateStudent($data, $userId);
            if($myreturn){
                $this->session->set_flashdata('message', 'Successfully updated the record.');
                redirect('crud/allStudents');
            } else {
                $this->session->set_flashdata('message', 'Something went wrong.');
                redirect('crud/allStudents');
            }
        }
    }

    public function deleteStudent($id= null){
        if(empty($id)){
            $this->session->set_flashdata('message', 'Data doesnt exist.');
            redirect('crud/allStudents');
        }
        else{
            $data= $this->modCrud->checkStudent($id);
            if(count($data)==1){
                $myreturn= $this->modCrud->deleteStudent($id);
                if($myreturn){
                    $this->session->set_flashdata('message', 'Record deleted.');
                    redirect('crud/allStudents');
                }
                else{
                    $this->session->set_flashdata('message', 'Something went wrong.');
                    redirect('crud/allStudents');
                }
            }
            else{
                $this->session->set_flashdata('message', 'Something went wrong.');
                redirect('crud/allStudents');
            }
        }
    }
}
