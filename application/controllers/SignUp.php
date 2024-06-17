<?php

class SignUp extends CI_Controller {

    public function index() {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation');
        $this->load->view('auth/signup');
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }

    public function newUser() {
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['fullname'] = $this->input->post('fullname', TRUE);
            $data['email'] = $this->input->post('email', TRUE);
            $data['password'] = hash('md5', $this->input->post('password', TRUE));
            $data['eLink'] = random_string('alnum', 15);

            $this->load->model('modAuth'); 

            $return = $this->modAuth->checkUser($data['email']);
            if ($return->num_rows() > 0) {
                $this->session->set_flashdata('message', 'Email already exists.');
                redirect('signup');
            } else {
                $result = $this->modAuth->addUser($data);
                if ($result) {
                    if($this->sendEmaiTolUser($data)){
                        $this->session->set_flashdata('message', 'Form submitted successfully and Account Created, visit your email address to activate the account.');
                        redirect('signup');
                    }
                    else{
                        $this->session->set_flashdata('message', 'Form submitted successfully but email not sent');
                        redirect('signup');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Some error occurred!');
                    $this->index();
                }
            }
        }
    }

    public function confirm($link=null){
        if(isset($link) && !empty($link)){
            $linkValue= $this->modAuth->checkLink($link);
            if($linkValue->num_rows()===1){
                $data['status']=1;
                $data['eLink']= $link.'ok';
                $linkReturn= $this->modAuth->activateTheAccount($link);

                if($linkReturn){
                    $this->session->set_flashdata('message', 'Account sucessfully updated.');
                    redirect('signup');
                }
                else{
                    $this->session->set_flashdata('message', 'Some error occurred!');
                    redirect('signup');
                }
            }
            else{
                $this->session->set_flashdata('message', 'The link has expired.');
                redirect('signup');
            }
        }
        else{
            $this->session->set_flashdata('message', 'Check the email address and try again.');
            redirect('signup');
        }
    }

    public function sendEmaiTolUser($data) {
        $config = array(
            'useragent' => 'CodeIgniter',
            'protocol' => 'smtp',
            'smtp_host' => 'localhost',
            'smtp_user' => 'CI3@sharmili.in',
            'smtp_pass' => 'sharmili123',
            'smtp_port' => 25,
            'smtp_timeout' => 60,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'newline' => "\r\n",
            'crlf' => "\r\n",
        );
    
        $message = '<strong>' . $data['fullname'] . '</strong>' . anchor(site_url('signup/confirm/' . $data['eLink']), 'Activate the link', 'class="myclass"');
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('CI3@sharmili.in');
        $this->email->to($data['email']);
        $this->email->subject('Activate your account');
        $this->email->message($message);
    
        if ($this->email->send()) {
            return TRUE;
        } else {
            log_message('error', $this->email->print_debugger());
            return FALSE;
        }
    }    
}
