<?php

class BlogAdmin extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('uId')) {
            $this->session->set_flashdata('message', 'You need to be logged in to access this page.');
            redirect('signin');
        }
        
        $this->load->library('pagination');
    }
    
    public function index(){
        $total_blogs = $this->modAdmin->findTotalBlogs();
        $data['total_blogs'] = $total_blogs;

        $latest_blogs = $this->modAdmin->fetchLatestBlogs(4);
        $data['latest_blogs'] = $latest_blogs;

        foreach ($latest_blogs as $blog) {
            $blog->truncated_desc = $this->truncateWords($blog->blogBody, 30);
            
        }

        $this->load->view('admin/header/header');
        $this->load->view('admin/header/css');
        $this->load->view('admin/sideBar/sidebar');
        $this->load->view('admin/header/navbar');
        $this->load->view('admin/mainContent/body',$data);
        $this->load->view('admin/footerAdmin/footer');
        $this->load->view('admin/footerAdmin/js');
        $this->load->view('footer/endhtml');
    }

    public function viewBlogs() {
        $blogs = $this->modAdmin->listBlogs();
    
        $data['latest_blogs'] = array();
        foreach ($blogs as $blog) {
            $truncated_desc = $this->truncateWords($blog->blogBody, 30); 
            $blog->truncated_desc = $truncated_desc . '';
            $data['latest_blogs'][] = $blog;
        }

        $this->load->view('admin/header/header');
        $this->load->view('admin/header/css');
        $this->load->view('admin/sideBar/sidebar');
        $this->load->view('admin/header/navbar');
        $this->load->view('admin/mainContent/allBlog', $data); 
        $this->load->view('admin/footerAdmin/footer');
        $this->load->view('admin/footerAdmin/js');
        $this->load->view('footer/endhtml');
    }
    
    public function addNewBlog() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('blogTitle', 'Blog Title', 'trim|required');
        $this->form_validation->set_rules('blogBody', 'Blog Body', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/sideBar/sidebar');
            $this->load->view('admin/header/navbar');
            $this->load->view('admin/mainContent/addBlog'); 
            $this->load->view('admin/footerAdmin/footer');
            $this->load->view('admin/footerAdmin/js');
            $this->load->view('footer/endhtml');
        } else {
            $data['blogTitle'] = $this->input->post('blogTitle', TRUE);
            $data['blogBody'] = $this->input->post('blogBody', TRUE);
            $data['blogDate'] = date('Y-m-d');
            $data['userId'] = $this->session->userdata('uId');
            $data['blogStatus'] = 1;
            
            $checkBlog = $this->modAdmin->checkBlog($data);
            if ($checkBlog->num_rows() > 0) {
                $this->session->set_flashdata('message', 'Your blog already exists!');
                redirect('BlogAdmin/addNewBlog'); 
            } else {
                $cblog = $this->modAdmin->addBlog($data);
                if ($cblog) {
                    $this->session->set_flashdata('message', 'Blog Created.');
                    redirect('BlogAdmin/viewBlogs'); 
                } else {
                    $this->session->set_flashdata('message', 'Failed to create blog. Try again!');
                    redirect('BlogAdmin/addNewBlog'); 
                }
            }
        }
    }

    public function editBlog($blogId = NULL) {
        if ($this->input->post()) {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('blogTitle', 'Blog Title', 'trim|required');
            $this->form_validation->set_rules('blogBody', 'Blog Body', 'trim|required');
    
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header/header');
                $this->load->view('admin/header/css');
                $this->load->view('admin/sideBar/sidebar');
                $this->load->view('admin/header/navbar');
                $this->load->view('admin/mainContent/editBlog');
                $this->load->view('admin/footerAdmin/footer');
                $this->load->view('admin/footerAdmin/js');
                $this->load->view('footer/endhtml');
            } else {
                $data['blogTitle'] = $this->input->post('blogTitle', TRUE);
                $data['blogBody'] = $this->input->post('blogBody', TRUE);
                $blogId = $this->input->post('blogId');
    
                $this->modAdmin->updateTheBlog($blogId, $data);
                $this->session->set_flashdata('message', 'Blog updated successfully.');
                redirect('BlogAdmin/viewBlogs');
            }
        } else {
            if ($blogId) {
                $blog = $this->db->get_where('blog', array('blogId' => $blogId))->row();
                if ($blog) {
                    $data['blog'] = $blog;
                    $this->load->view('admin/header/header');
                    $this->load->view('admin/header/css');
                    $this->load->view('admin/sideBar/sidebar');
                    $this->load->view('admin/header/navbar');
                    $this->load->view('admin/mainContent/editBlog', $data); 
                    $this->load->view('admin/footerAdmin/footer');
                    $this->load->view('admin/footerAdmin/js');
                    $this->load->view('footer/endhtml');
                } else {
                    $this->session->set_flashdata('message', 'Blog not found.');
                    redirect('BlogAdmin/viewBlogs');
                }
            } else {
                $this->session->set_flashdata('message', 'Invalid blog ID.');
                redirect('BlogAdmin/viewBlogs');
            }
        }
    }    


    public function deleteBlog($blogId) {
        // Check if the blogId is provided
        if (!$blogId) {
            $this->session->set_flashdata('message', 'Invalid blog ID.');
            redirect('BlogAdmin/viewBlogs');
            return;
        }
    
        // Attempt to delete the blog
        $isDeleted = $this->modAdmin->deleteTheBlog($blogId);
    
        // Set flash messages based on the result
        if ($isDeleted) {
            $this->session->set_flashdata('message', 'Blog deleted successfully.');
        } else {
            $this->session->set_flashdata('message', 'Unable to delete the blog.');
        }
    
        // Redirect back to the blogs listing
        redirect('BlogAdmin/viewBlogs');
    }
    

    public function totalBlogs(){
        $total_blogs = $this->modAdmin->findTotalBlogs();
        // echo "Total number of blogs: " . $total_blogs;
        return $total_blogs;
    }

    public function listLatestBlogs() {
        $latest_blogs = $this->modAdmin->fetchLatestBlogs(4); 

        foreach ($latest_blogs as $blog) {
            echo 'Title: ' . $blog->blogTitle . '<br>';
            echo 'Content: ' . $blog->blogBody . '<br>';
            echo 'Author: ' . $blog->userName . '<br><br>';
        }
    }

    // Helper function to truncate words
    private function truncateWords($text, $limit) {
        $words = explode(" ", $text);
        if (count($words) > $limit) {
            return implode(" ", array_slice($words, 0, $limit)) . '...';
        } else {
            return $text;
        }
    }
}