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

        $data['user_name'] = $this->session->userdata('user_name'); 

        foreach ($latest_blogs as $blog) {
            $blog->truncated_desc = $this->truncateWords($blog->blogBody, 30);
            
        }

        $this->load->view('admin/header/header');
        $this->load->view('admin/header/css');
        $this->load->view('admin/sideBar/sidebar');
        $this->load->view('admin/header/navbar',$data);
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
        $this->load->library('upload');
    
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
    
            // File upload configurations
            $config['upload_path'] = './uploads/'; // Specify your upload directory
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Allowed file types
            $config['max_size'] = 2048; // Maximum file size in KB
            $config['encrypt_name'] = TRUE; // Encrypt the file name
            $this->upload->initialize($config);
    
            // Upload Blog Image
            if ($this->upload->do_upload('blogImage')) {
                $data['blogImage'] = $this->upload->data('file_name');
            } else {
                $data['blogImage'] = ''; 
            }
    
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
            $this->load->library('upload');
    
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
    
                // Check if a new image was uploaded
                if (!empty($_FILES['blogImage']['name'])) {
                    // File upload configurations
                    $config['upload_path'] = './uploads/'; // Specify your upload directory
                    $config['allowed_types'] = 'gif|jpg|png'; // Allowed file types
                    $config['max_size'] = 2048; // Maximum file size in KB
                    $config['encrypt_name'] = TRUE; // Encrypt the file name
                    $this->upload->initialize($config);
    
                    // Upload Blog Image
                    if ($this->upload->do_upload('blogImage')) {
                        $data['blogImage'] = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('BlogAdmin/editBlog/'.$blogId);
                    }
                }
    
                // Update the blog record
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
    
    public function appearance(){

        $this->load->view('admin/header/header');
        $this->load->view('admin/header/css');
        $this->load->view('admin/sideBar/sidebar');
        $this->load->view('admin/header/navbar');
        $this->load->view('admin/mainContent/appearance');
        $this->load->view('admin/footerAdmin/footer');
        $this->load->view('admin/footerAdmin/js');
        $this->load->view('footer/endhtml');
    }

    public function addContent() {
        $this->load->library('form_validation');
        $this->load->library('upload');
    
        $this->form_validation->set_rules('logo_name', 'Logo Name', 'trim');
        $this->form_validation->set_rules('nav_items', 'Navigation Items');
        $this->form_validation->set_rules('banner_line', 'Banner Line', 'trim');
        $this->form_validation->set_rules('banner_button_name', 'Banner Button Name', 'trim');
        $this->form_validation->set_rules('about_us', 'About Us', 'trim');
        $this->form_validation->set_rules('facebook_link', 'Facebook Link', 'trim|valid_url');
        $this->form_validation->set_rules('linkedin_link', 'LinkedIn Link', 'trim|valid_url');
        $this->form_validation->set_rules('instagram_link', 'Instagram Link', 'trim|valid_url');
        $this->form_validation->set_rules('twitter_link', 'Twitter Link', 'trim|valid_url');
        $this->form_validation->set_rules('footer_email', 'Footer Email', 'trim|valid_email');
        $this->form_validation->set_rules('footer_number', 'Footer Number', 'trim');
    
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
            // Validation passed, proceed to handle form data
    
            // Collect form data
            $logoName = $this->input->post('logo_name');
            $navItems = $this->input->post('nav_items'); 
            $bannerLine = $this->input->post('banner_line');
            $bannerButtonName = $this->input->post('banner_button_name');
            $aboutUs = $this->input->post('about_us');
            $facebookLink = $this->input->post('facebook_link');
            $linkedinLink = $this->input->post('linkedin_link');
            $instagramLink = $this->input->post('instagram_link');
            $twitterLink = $this->input->post('twitter_link');
            $footerEmail = $this->input->post('footer_email');
            $footerNumber = $this->input->post('footer_number');
    
            // File upload configurations
            $config['upload_path'] = './uploads/'; // Specify your upload directory
            $config['allowed_types'] = 'gif|jpg|png'; // Allowed file types
            $config['max_size'] = 2048; // Maximum file size in KB
            $config['encrypt_name'] = TRUE; // Encrypt the file name
            $this->upload->initialize($config);
    
            // Upload Banner Image
            if ($this->upload->do_upload('banner_image')) {
                $bannerImage = $this->upload->data('file_name');
            } else {
                $bannerImage = ''; 
            }
    
            // Upload About Image
            if ($this->upload->do_upload('about_image_1')) {
                $aboutImage = $this->upload->data('file_name');
            } else {
                $aboutImage = ''; 
            }
    
            // Prepare data for insertion
            $content = [
                'logo_name' => $logoName,
                'nav_items' => json_encode($navItems), 
                'banner_line' => $bannerLine,
                'banner_image' => $bannerImage,
                'banner_button_name' => $bannerButtonName,
                'about_us' => $aboutUs,
                'about_image' => $aboutImage,
                'facebook_link' => $facebookLink,
                'linkedin_link' => $linkedinLink,
                'instagram_link' => $instagramLink,
                'twitter_link' => $twitterLink,
                'footer_email' => $footerEmail,
                'footer_number' => $footerNumber
            ];
    
            // Display the collected data (for debugging purposes)
            // echo "<pre>";
            // print_r($content);
            // echo "</pre>";
    
            // Insert into database using model method

            $inserted = $this->modAdmin->insertAppearanceData($content);
    
            if ($inserted) {
                $this->session->set_flashdata('message', 'Data Submitted Successfully');
                redirect('BlogAdmin/appearance/success');
                // echo "Data inserted successfully.";
            } else {
                $this->session->set_flashdata('message', 'Error in data submission.');
                echo "Failed to insert data.";
            }
        }
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