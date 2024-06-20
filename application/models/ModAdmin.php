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
        // Fetch last 4 blogs ordered by blogId descending
        return $this->db
            ->select('blog.*, user.fullname as userName')
            ->from('blog')
            ->where('blog.blogStatus', 1) // Assuming blogStatus indicates active blogs
            ->join('user', 'user.id = blog.userId')
            ->order_by('blog.blogId', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }
}
