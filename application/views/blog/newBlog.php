<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container{
            margin-top: 20px;
        }
        .create-blog-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }
        .create-blog-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .create-blog-header {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
            font-size: 2em;
            font-weight: 600;
        }
        .create-blog-form label {
            font-weight: 600;
            color: #555;
        }
        .create-blog-form .form-control, 
        .create-blog-form .form-select {
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }
        .create-blog-form .btn-primary {
            border-radius: 8px;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .create-blog-form .btn-primary:hover {
            background-color: #0056b3;
        }
        .create-blog-form .form-control:focus,
        .create-blog-form .form-select:focus {
            border-color: #007bff;
            box-shadow: none;
        }
    </style>
</head>
<body>

<!-- Create Blog Section Start -->
<div class="create-blog-section">
    <div class="container">
        <div class="create-blog-container">
            <h2 class="create-blog-header">Create Blog</h2>
            <form action="<?php echo site_url('blog/addBlog'); ?>" method="POST" enctype="multipart/form-data" class="create-blog-form">
                <?php echo validation_errors(); ?>
                <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-warning">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="blogTitle" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" id="blogTitle" name="blogTitle">
                </div>
                <div class="mb-3">
                    <label for="blogBody" class="form-label">Blog Body</label>
                    <textarea class="form-control" id="blogBody" name="blogBody" rows="6"></textarea>
                </div>
                <div class="mb-3">
                    <label for="blogImage" class="form-label">Blog Image</label>
                    <input type="file" class="form-control" id="blogImage" name="blogImage">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Create Blog Section End -->


<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
