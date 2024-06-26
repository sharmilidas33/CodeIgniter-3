<?php

class SignIn extends CI_Controller {

    public function index() {
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/auth/signin');
            $this->load->view('admin/footerAdmin/js');
            $this->load->view('footer/endhtml');
    }

    public function checkUser() {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['email'] = $this->input->post('email', TRUE);
            $data['password'] = hash('md5', $this->input->post('password', TRUE));
            
            $this->load->model('modAuth'); 
            
            $var = $this->modAuth->checkUserwithPassword($data);

            if (!empty($var) && count($var) === 1) {
                $sessValue = array(
                    'uId' => $var[0]['id'],
                    'email' => $var[0]['email'],
                    'fullname' => $var[0]['fullname']
                );
                
                $this->session->set_userdata($sessValue);
                
                if ($this->session->userdata('uId')) {
                    redirect('BlogAdmin/index');
                } else {
                    $this->session->set_flashdata('message', 'Invalid email or password.');
                    redirect('signin');
                }
            } else {
                $this->session->set_flashdata('message', 'Invalid email or password.');
                redirect('signin');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata(array('uId', 'email', 'fullname'));
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'Logged out Successfully.');
        redirect('signin');
    }
}
