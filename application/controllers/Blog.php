<?php

class Blog extends CI_Controller {

    public function index() {
        // Check if user is logged in
        $userId = $this->session->userdata('uId');
    
        // Initialize content and latestBlogs
        $content = [];
        $latestBlogs = [];
        $isLoggedIn = false;
    
        // Fetch content based on user login status
        if ($userId) {
            // User is logged in, check if their ID is in the appearance table
            $userAppearance = $this->modAdmin->getUserAppearance($userId);
    
            if ($userAppearance) {
                // User's appearance data exists, fetch personalized content
                $content = $this->modAdmin->getContentByUserId($userId);
                $isLoggedIn = true;
            } else {
                // User's appearance data does not exist, fetch default content
                $content = [
                    'logo_name' => 'BlogSpot',
                    'nav_items' => json_encode([
                        ['name' => 'Home', 'link' => base_url('Home')],
                        ['name' => 'About', 'link' => base_url('Home/about')],
                        ['name' => 'Blog', 'link' => base_url('/blog')],
                        ['name' => 'SignUp', 'link' => base_url('signup')],
                    ]),
                ];
            }
        } else {
            // User is not logged in, fetch default content
            $content = [
                'logo_name' => 'BlogSpot',
                'nav_items' => json_encode([
                    ['name' => 'Home', 'link' => base_url('Home')],
                    ['name' => 'About', 'link' => base_url('Home/about')],
                    ['name' => 'Blog', 'link' => base_url('/blog')],
                    ['name' => 'SignUp', 'link' => base_url('signup')],
                ]),
            ];
        }
    
        // Fetch latest blogs using modBlog->getAllBlogs()
        $latestBlogs = $this->modBlog->getAllBlogs();
    
        // Prepare data to pass to view
        $data['content'] = $content;
        $data['blog'] = $latestBlogs; // Use 'blog' key to pass blogs to the view
        $data['isLoggedIn'] = $isLoggedIn;
    
        // Load views
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation', $data); // Pass $data to navigation view
        $this->load->view('blog/allBlogs', $data); // Load allBlogs view with $data
        $this->load->view('footer/footer', $data);
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }    
        
    

    // public function newBlog() {
    //     $this->load->view('header/header');
    //     $this->load->view('header/css');
    //     $this->load->view('header/navigation');
    //     $this->load->view('blog/newBlog');
    //     $this->load->view('footer/footer');
    //     $this->load->view('footer/js');
    //     $this->load->view('footer/endhtml');
    // }

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
    
    // public function readBlog($blogId) {
    //     if ($this->session->userdata('uId')) {
    //         if (!empty($blogId)) {
    //             $data['blog'] = $this->modBlog->checkBlogById($blogId);
    //             if ($data['blog']) {
    //                 $this->load->view('header/header');
    //                 $this->load->view('header/css');
    //                 $this->load->view('header/navigation');
    //                 $this->load->view('blog/fullBlog', $data); 
    //                 $this->load->view('footer/footer');
    //                 $this->load->view('footer/js');
    //                 $this->load->view('footer/endhtml');
    //             } else {
    //                 $this->session->set_flashdata('message', 'Blog not available.');
    //                 redirect('blog/newBlog');
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', 'Blog not available.');
    //             redirect('blog/newBlog');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', 'Kindly login before, so that you can view this page.');
    //         redirect('blog/newBlog');
    //     }
    // }
    
}
