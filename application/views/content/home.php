<!-- banner section start --> 
<div class="container-fluid">
   <div class="banner_section layout_padding">
      <h1 class="banner_taital"><?= $content['banner_line']?></h1>
      <div class="image_main">
         <div class="container">
         <?php if ($isLoggedIn): ?>
            <img src="<?= base_url('uploads/' . $content['banner_image']) ?>" class="image_1">
         <?php else: ?>
            <img src="<?= base_url('assets/images/img-8.png') ?>" class="image_1">
         <?php endif; ?>
            <div class="contact_bt"><a href="<?php base_url('blog')?>"><?= $content['banner_button_name']?></a></div>
         </div>
      </div>
   </div>
</div>
<!-- banner section end -->


<!-- blog section start -->
<div class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <?php foreach ($latestBlogs as $blog): ?>
                <div class="col-lg-6 col-sm-12 mb-4 mt-4">
                    <div class="about_img"><img src="<?= base_url('uploads/' . $blog->blogImage); ?>"></div>
                    <p class="post_text mt-4">Posted On: <?= date('m/d/Y', strtotime($blog->blogDate)); ?></p>
                    <h2 class="most_text"><?= $blog->blogTitle; ?></h2>
                    <p class="lorem_text"><?= substr($blog->blogBody, 0, 150) . '...'; ?></p>
                    <div class="social_icon_main">
                        <div class="social_icon">
                            <ul>
                                <li><a href="<?= $content['facebook_link']?>"><img src="assets/images/fb-icon-1.png"></a></li>
                                <li><a href="<?= $content['twitter_link']?>"><img src="assets/images/twitter-icon-1.png"></a></li>
                                <li><a href="<?= $content['linkedin_link']?>"><img src="assets/images/linkedin-icon-1.png"></a></li>
                                <li><a href="<?= $content['instagram_link']?>"><img src="assets/images/instagram-icon-1.png"></a></li>
                            </ul>
                        </div>
                        <div class="read_bt"><a href="<?= base_url('home/fullBlog/' . $blog->blogId); ?>">Read More</a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- blog section end -->



<!-- contact section start -->
<div class="contact_section layout_padding" style="background-color: #4682b4;">
   <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
      <div class="row">
         <div class="col-md-12 d-flex justify-content-center">
            <div class="mail_section">
               <h1 class="contact_taital text-white">Contact us</h1>
               <input type="" class="email_text" placeholder="Name" name="Name">
               <input type="" class="email_text" placeholder="Phone" name="Phone">
               <input type="" class="email_text" placeholder="Email" name="Email">
               <textarea class="massage_text" placeholder="Message" rows="5" id="comment" name="Message"></textarea>
               <div class="send_bt"><a href="#">send</a></div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- contact section end -->

<style>
   .about_section {
        padding-bottom: 50px; 
    }
</style>