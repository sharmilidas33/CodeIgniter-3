<!-- editBlog.php (View) -->
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-primary font-weight-bold">Edit Blog</h1>
        <a href="<?php echo base_url('BlogAdmin/index')?>" class="btn btn-primary"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Dashboard</a>
    </div>

    <!-- Validation Errors and Flash Messages -->
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Edit Blog Form -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?php echo base_url('BlogAdmin/editBlog'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="blogId" value="<?= $blog->blogId ?>">
                        <div class="mb-3">
                            <label for="blogTitle" class="form-label">Blog Title</label>
                            <input type="text" class="form-control" id="blogTitle" name="blogTitle" placeholder="Enter blog title" value="<?= $blog->blogTitle ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="blogBody" class="form-label">Blog Description/Body</label>
                            <textarea class="form-control" id="blogBody" name="blogBody" rows="8" placeholder="Enter blog description/body" required><?= $blog->blogBody ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="blogImage" class="form-label">Blog Image</label>
                            <input type="file" class="form-control" id="blogImage" name="blogImage">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
