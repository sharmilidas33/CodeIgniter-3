<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="blog-post">
                <?php if (!empty($blog) && !empty($blog->blogImage)): ?>
                    <div class="blog-image-wrap">
                        <img src="<?php echo base_url('uploads/' . $blog->blogImage); ?>" alt="Blog Image">
                    </div>
                <?php endif; ?>
                <div class="blog-content-wrap">
                    <?php if (!empty($blog)): ?>
                        <h2 class="blog-title"><?php echo $blog->blogTitle; ?></h2>
                        <p class="blog-description">
                            <?php echo $blog->blogBody; ?>
                        </p>
                        <div class="blog-meta">
                            <p>
                                <strong>Author:</strong> <?php echo $blog->userName; ?>
                            </p>
                            <p>
                                <strong>Published at:</strong> <?php echo date('M d, Y', strtotime($blog->blogDate)); ?>
                            </p>
                        </div>
                    <?php else: ?>
                        <p>Blog not found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa; /* Light background color */
        font-family: Arial, sans-serif; /* Specify a fallback font */
    }

    .container {
        max-width: 1200px; /* Increase max-width for a wider container */
        margin: 0 auto; /* Center align container */
        padding: 30px; /* Padding inside the container */
    }

    .blog-post {
        display: grid; /* Use grid for layout */
        grid-template-columns: 1fr 2fr; /* Two columns: image and content */
        background-color: #ffffff; /* White background for card */
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); /* Enhanced box shadow for depth */
        border-radius: 12px; /* Rounded corners */
        padding: 30px; /* Padding inside the container */
        margin-bottom: 30px; /* Space below the container */
    }

    .blog-image-wrap {
        grid-column: 1 / 2; /* Image spans first column */
        margin-bottom: 20px; /* Space below image */
    }

    .blog-image-wrap img {
        width: 100%; /* Ensure image spans full width */
        height: auto; /* Maintain aspect ratio */
        border-radius: 12px; /* Rounded corners on image */
    }

    .blog-content-wrap {
        grid-column: 2 / 3; /* Content spans second column */
        padding-left: 30px; /* Add space between image and content */
    }

    .blog-title {
        font-size: 2rem; /* Adjust title font size */
        font-weight: 600; /* Bold title */
        color: #333; /* Dark text color */
        margin-bottom: 10px; /* Space below title */
    }

    .blog-description {
        font-size: 1rem; /* Adjust description font size */
        line-height: 1.6; /* Line height for better readability */
        color: #666; /* Medium dark text color */
        margin-bottom: 15px; /* Space below description */
    }

    .blog-meta {
        font-size: 0.9rem; /* Meta information font size */
        color: #999; /* Lighter text color for meta */
    }

    .blog-meta p {
        margin-bottom: 5px; /* Space below each meta item */
    }

    .blog-meta strong {
        font-weight: 600; /* Make strong tags bold */
    }

    @media (max-width: 768px) {
        .blog-post {
            grid-template-columns: 1fr; /* Stack columns on smaller screens */
        }
        .blog-content-wrap {
            padding-left: 0; /* Remove left padding on smaller screens */
        }
    }
</style>
