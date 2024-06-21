<?php

class ModAdmin extends CI_Model{

    public function findTotalBlogs(){
        $this->db->select('COUNT(*) as total_blogs');
        $query = $this->db->get('blog'); 
        return $query->row()->total_blogs;
    }

    public function listBlogs(){
        return $this->db
            ->select('blog.*, user.fullname as userName')
            ->from('blog')
            ->where('blog.blogStatus', 1)
            ->join('user', 'user.id = blog.userId')
            ->get()
            ->result();
    }

    public function fetchLatestBlogs($limit = 4) {
        return $this->db
            ->select('blog.*, user.fullname as userName')
            ->from('blog')
            ->where('blog.blogStatus', 1)
            ->join('user', 'user.id = blog.userId')
            ->order_by('blog.blogId', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }

    public function checkBlog($data) {
        $this->db->where('blogTitle', $data['blogTitle']);
        return $this->db->get('blog');
    }

    public function addBlog($data) {
        return $this->db->insert('blog', $data);
    }

    public function updateTheBlog($blogId, $data) {
        $this->db->where('blogId', $blogId);
        $result = $this->db->update('blog', $data);
        
        // Debugging information
        if (!$result) {
            $error = $this->db->error();
            echo '<pre>';
            print_r($error);
            echo '</pre>';
            exit;
        }
        
        return $result;
    }    

    public function deleteTheBlog($blogId){
        $this->db->where('blogId',$blogId);
        return $this->db->delete('blog');
    }

    public function insertAppearanceData($content) {
        // Prepare data for insertion
        $data = [
            'userId' => $this->session->userdata('uId'), // Assuming userId is retrieved from session
            'created_at' => date('Y-m-d H:i:s'), // Current timestamp
            'content' => json_encode($content) // Encode $content array to JSON format
        ];
    
        // Insert data into the appearance table
        $this->db->insert('appearance', $data);
    
        // Check for insertion success
        return $this->db->insert_id(); // Return the ID of the inserted row if needed
    }
    

}
