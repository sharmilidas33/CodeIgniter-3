<!-- about section start -->
<div class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12 mb-4">
                <?php if (!empty($latestBlogs)): ?>
                    <div class="about_img"><img src="<?php echo base_url('uploads/' . $latestBlogs[0]->blogImage); ?>"></div>
                    <div class="like_icon"><img src="<?php echo base_url('assets/images/like-icon.png'); ?>"></div>
                    <p class="post_text">Post By: <?php echo date('m/d/Y', strtotime($latestBlogs[0]->blogDate)); ?></p>
                    <h2 class="most_text"><?php echo $latestBlogs[0]->blogTitle; ?></h2>
                    <p class="lorem_text"><?php echo substr($latestBlogs[0]->blogBody, 0, 150) . '...'; ?></p>
                    <div class="social_icon_main">
                        <div class="social_icon">
                            <ul>
                                <li><a href="#"><img src="<?php echo base_url('assets/images/fb-icon.png'); ?>"></a></li>
                                <li><a href="#"><img src="<?php echo base_url('assets/images/twitter-icon.png'); ?>"></a></li>
                                <li><a href="#"><img src="<?php echo base_url('assets/images/instagram-icon.png'); ?>"></a></li>
                            </ul>
                        </div>
                        <div class="read_bt"><a href="<?php echo base_url('home/fullBlog/' . $latestBlogs[0]->blogId); ?>">Read More</a></div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="image_5"><img src="<?= base_url('uploads/' . $content['about_image']) ?>"></div>
                <h1 class="about_taital">About Us</h1>
                <p class="about_text"><?= $content['about_us']?></p>
            </div>
        </div>
    </div>
</div>
<!-- about section end -->

<style>
   .about_section {
        padding-bottom: 50px; 
    }
</style>
