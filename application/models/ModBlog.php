<?php

class modBlog extends CI_Model {

    public function checkBlog($data) {
        return $this->db->get_where('blog', array(
            'blogTitle' => $data['blogTitle']
        ));
    }

    public function addBlog($data) {
        return $this->db->insert('blog', $data);
    }

    public function getAllBlogs() {
        return $this->db
            ->select('blog.*, user.fullname as userName')
            ->from('blog')
            ->where('blog.blogStatus', 1)
            ->join('user', 'user.id = blog.userId')
            ->get()
            ->result(); // Assuming you want to return an array of objects
    }
    
    public function checkBlogById($bId) {
        $query = $this->db
            ->select('blog.*, user.fullname as userName')
            ->from('blog')
            ->where('blog.blogStatus', 1)
            ->where('blog.blogId', $bId)
            ->join('user', 'user.id = blog.userId')
            ->get();
    
        return $query->row(); // Return a single row object
    }
    


}
