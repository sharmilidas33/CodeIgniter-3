<!-- Single Blog Page -->
<div class="container py-5">
    <?php if(isset($blog) && !empty($blog)): ?>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm">
                    <img src="assets/images/sample-blog.jpg" class="card-img-top" alt="Blog Image">
                    <div class="card-body">
                        <h1 class="card-title text-primary fw-bold">
                            <?php echo $blog->blogTitle; ?>
                        </h1>
                        <p class="card-text">
                            <?php echo $blog->blogBody; ?>
                        </p>
                        <p class="card-text mt-2 text-secondary" style="font-size: 0.9rem;">
                            Posted on: <?php echo $blog->blogDate; ?><br>
                            Posted by: <?php echo $blog->userName; ?>
                        </p>
                        <a href="<?php echo base_url('blog'); ?>" class="btn btn-primary mt-3">Back to All Blogs</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center">Blog not found.</p>
    <?php endif; ?>
</div>
<!-- End Single Blog Page -->

<style>
    .card-title {
        font-size: 2rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
    }

    .btn-primary {
        color: #fff;
        background-color: #0a58ca;
        border: none;
    }

    .btn-primary:hover {
        background-color: #004bb5;
    }
</style>
