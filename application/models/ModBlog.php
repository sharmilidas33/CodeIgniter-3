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
            ->result();
    }    


    public function getBlogById($blogId) {
        return $this->db
            ->select('blog.*, user.fullname as userName') // Selecting user.fullname as userName
            ->from('blog')
            ->where('blog.blogId', $blogId)
            ->join('user', 'user.id = blog.userId') // Assuming user.id relates to blog.userId
            ->get()
            ->row(); // Assuming you expect only one row
    }

    


}
