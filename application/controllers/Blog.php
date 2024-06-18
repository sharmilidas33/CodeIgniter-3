<?php

class Blog extends CI_Controller {

    public function index() {
        $data['blog'] = $this->modBlog->getAllBlogs();
    
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation');
        $this->load->view('blog/allBlogs', $data); // Pass $data to the view
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }
    

    public function newBlog() {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation');
        $this->load->view('blog/newBlog');
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }

    public function addBlog() {
        $data['blogTitle'] = $this->input->post('blogTitle', TRUE);
        $data['blogBody'] = $this->input->post('blogBody', TRUE);
        $data['blogDate'] = date('Y-m-d');
        $data['userId'] = $this->session->userdata('uId');
        $data['blogStatus'] = 1; 
    
        if (empty($data['blogTitle']) || empty($data['blogBody']) || empty($data['blogDate'])) {
            echo "Please fill in all the fields";
        } else {
            $checkBlog = $this->modBlog->checkBlog($data);
            if ($checkBlog->num_rows() > 0) {
                $this->session->set_flashdata('message', 'Your blog already exists!');
                redirect('blog/newBlog');
            } else {
                $cblog = $this->modBlog->addBlog($data);
                if ($cblog) {
                    // Successfully added blog, set flash message
                    $this->session->set_flashdata('message', 'Blog Created.');
                    redirect('blog/index');
                } else {
                    // Failed to add blog, set error flash message
                    $this->session->set_flashdata('message', 'Failed to create blog. Try again!');
                    redirect('blog/newBlog');
                }
            }
        }
    }
    
    public function readBlog($blogId) {
        if ($this->session->userdata('uId')) {
            if (!empty($blogId)) {
                $data['blog'] = $this->modBlog->checkBlogById($blogId);
                if ($data['blog']) {
                    $this->load->view('header/header');
                    $this->load->view('header/css');
                    $this->load->view('header/navigation');
                    $this->load->view('blog/fullBlog', $data); // Pass $data to the view
                    $this->load->view('footer/footer');
                    $this->load->view('footer/js');
                    $this->load->view('footer/endhtml');
                } else {
                    $this->session->set_flashdata('message', 'Blog not available.');
                    redirect('blog/newBlog');
                }
            } else {
                $this->session->set_flashdata('message', 'Blog not available.');
                redirect('blog/newBlog');
            }
        } else {
            $this->session->set_flashdata('message', 'Kindly login before, so that you can view this page.');
            redirect('blog/newBlog');
        }
    }
    
}
