<?php

class BlogAdmin extends CI_Controller{

    public function index(){
        $total_blogs = $this->modAdmin->findTotalBlogs();
        $data['total_blogs'] = $total_blogs;

        $latest_blogs = $this->modAdmin->fetchLatestBlogs(4);
        $data['latest_blogs'] = $latest_blogs;

        // Add a truncated version of blog description with 'Read more' link
        foreach ($latest_blogs as $blog) {
            // Create a truncated version of the blog description
            $blog->truncated_desc = $this->truncateWords($blog->blogBody, 30); // Adjust as per your requirement
            
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
    
        // Prepare data for view
        $data['latest_blogs'] = array();
        foreach ($blogs as $blog) {
            $truncated_desc = $this->truncateWords($blog->blogBody, 30); 
            $blog->truncated_desc = $truncated_desc . '';
            $data['latest_blogs'][] = $blog;
        }
    
        // Load view with data
        $this->load->view('admin/header/header');
        $this->load->view('admin/header/css');
        $this->load->view('admin/sideBar/sidebar');
        $this->load->view('admin/header/navbar');
        $this->load->view('admin/mainContent/allBlog', $data); // Pass $data to the view
        $this->load->view('admin/footerAdmin/footer');
        $this->load->view('admin/footerAdmin/js');
        $this->load->view('footer/endhtml');
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