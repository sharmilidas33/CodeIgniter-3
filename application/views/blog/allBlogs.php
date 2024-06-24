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
            <?php
            // Function to safely truncate text
            if (!function_exists('truncate_text')) {
                function truncate_text($text, $limit) {
                    $text = strip_tags($text);
                    $words = explode(' ', $text);
                    if (count($words) > $limit) {
                        return implode(' ', array_slice($words, 0, $limit)) . '...';
                    }
                    return $text;
                }
            }
            ?>

            <?php foreach($blog as $value): ?>
                <!-- Blog Post Start -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow h-100"> <!-- Added 'h-100' class for equal height -->
                        <!-- Blog Image -->
                        <?php if (!empty($value->blogImage)): ?>
                            <img src="<?php echo base_url('uploads/' . $value->blogImage); ?>" class="card-img-top" alt="Blog Image">
                        <?php else: ?>
                            <!-- Placeholder image or default image -->
                            <img src="<?php echo base_url('assets/images/default-blog-image.jpg'); ?>" class="card-img-top" alt="Default Blog Image">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title" style="color: #0a58ca; font-size: 1.3rem; font-weight: bold;">
                                <?php echo htmlspecialchars($value->blogTitle); ?>
                            </h5>
                            <p class="card-text">
                                <?php echo truncate_text($value->blogBody, 20); ?>
                            </p>
                            <!-- Button to Full Blog Page -->
                            <a href="<?= base_url('home/fullBlog/' . $value->blogId); ?>" class="btn btn-info mt-auto">Read More</a>
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

<!-- Load necessary CSS and JS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
</style>
