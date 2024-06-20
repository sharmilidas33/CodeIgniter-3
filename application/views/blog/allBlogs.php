<!-- All Blogs Section -->
<div class="container py-2">
    <h1 class="text-center mb-5" style="color: #0a58ca; font-size: 1.8rem; font-weight: bold;">All Blogs</h1>
    
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
                        <!-- Blog Image -->
                        <!-- <img src="<?php // echo $value->blogImage ?>" class="card-img-top" alt="Blog Image"> -->

                        <div class="card-body">
                            <h5 class="card-title" style="color: #0a58ca; font-size: 1.3rem; font-weight: bold;">
                                <?php echo $value->blogTitle; ?>
                            </h5>
                            <p class="card-text">
                                <?php
                                $body = $value->blogBody;
                                // Truncate the body to 20-30 words
                                $words = explode(' ', $body);
                                $excerpt = implode(' ', array_slice($words, 0, 20)) . '...';
                                echo $excerpt;
                                ?>
                            </p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn read-more-btn font-weight-bold text-info" data-toggle="modal" data-target="#blogModal_<?php echo $value->blogId; ?>">Read More</button>
                            <!-- <p class="card-text" style="font-size: 0.9rem; color: #0a58ca;">
                                Posted on: <?php //echo $value->blogDate; ?>
                                <br>Posted by: <?php //echo $value->userName; ?>
                            </p> -->
                        </div>
                    </div>
                </div>
                <!-- End Blog Post -->

                <!-- Modal for each blog -->
                <div class="modal fade" id="blogModal_<?php echo $value->blogId; ?>" tabindex="-1" role="dialog" aria-labelledby="blogModalLabel_<?php echo $value->blogId; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="blogModalLabel_<?php echo $value->blogId; ?>"><?php echo $value->blogTitle; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Description:</strong> <?php echo $value->blogBody; ?></p>
                                <p><strong>Author:</strong> <?php echo $value->userName; ?></p>
                                <p><strong>Published at:</strong> <?php echo date('M d, Y', strtotime($value->blogDate)); ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Blogs not found.</p>
    <?php endif; ?>
</div>
<!-- End All Blogs Section -->
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
        background-color: #f8f9fa;
        line-height: 1.6;
    }

    .card {
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        margin-bottom: 10px;
    }

    .card-text {
        color: #666;
    }

    .read-more-btn {
        margin-top: 10px;
    }

    /* Modal Style */
    .modal-content {
        background-color: #fff;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        background-color: #0a58ca;
        color: #fff;
        border-bottom: none;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #ffff;
    }

    .modal-body {
        color: #333;
    }

    .modal-footer {
        border-top: none;
    }
</style>
