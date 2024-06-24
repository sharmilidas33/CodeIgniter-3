<!-- addBlog.php (View) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Blog</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Load TinyMCE with API Key -->
    <script src="https://cdn.tiny.cloud/1/fdijdc3eoduslvn30t1ufrhsk0j0u7iekdwloysjajkaygfy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#blogBody',  // Replace textarea ID with your textarea ID
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
</head>
<body>
<div class="container-fluid mt-4">
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-primary font-weight-bold">Add New Blog</h1>
        <a href="<?php echo base_url('BlogAdmin/index')?>" class="btn btn-primary"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to DashBoard</a>
    </div>

    <!-- Validation Errors and Flash Messages -->
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Add Blog Form -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?php echo base_url('BlogAdmin/addNewBlog'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="blogTitle" class="form-label">Blog Title</label>
                            <input type="text" class="form-control" id="blogTitle" name="blogTitle" placeholder="Enter blog title">
                        </div>
                        <div class="mb-3">
                            <label for="blogBody" class="form-label">Blog Description/Body</label>
                            <textarea class="form-control" id="blogBody" name="blogBody" rows="8" placeholder="Enter blog description/body"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="blogImage" class="form-label">Blog Image</label>
                            <input type="file" class="form-control" id="blogImage" name="blogImage">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Bootstrap JS and any other necessary JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
