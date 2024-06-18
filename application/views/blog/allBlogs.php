<!-- All Blogs Section -->
<div class="container py-5">
    <h1 class="text-center mb-5 mt-4" style="color: #0a58ca; font-size: 1.8rem; font-weight: bold;">All Blogs</h1>
    
    <!-- Validation Errors and Flash Messages -->
    <?php echo validation_errors(); ?>
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-warning">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    <?php if(!empty($blog)): ?>
        <div class="row">
            <?php foreach($blog as $value): ?>
                <!-- Blog Post Start -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow">
                        <img src="<?php $value->blogImage?>" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #0a58ca; font-size: 1.3rem; font-weight: bold;">
                                <?php echo $value->blogTitle; ?>
                            </h5>
                            <p class="card-text">
                                <?php
                                $body = $value->blogBody;
                                if (str_word_count($body) > 100) {
                                    $words = explode(' ', $body);
                                    $excerpt = implode(' ', array_slice($words, 0, 100)) . '...';
                                } else {
                                    $excerpt = $body;
                                }
                                echo $excerpt;
                                ?>
                            </p>
                            <a href="<?php echo base_url('blog/readBlog/' . $value->blogId); ?>" class="btn btn-primary read-more-btn" style="color: #fff; background-color: #0a58ca;">Read More</a>
                            <p class="card-text" style="font-size: 0.9rem; color: #0a58ca;">
                                Posted on: <?php echo $value->blogDate; ?>
                                <br>Posted by: <?php echo $value->userName; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Blog Post -->
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Blogs not found.</p>
    <?php endif; ?>
</div>
<!-- End All Blogs Section -->
