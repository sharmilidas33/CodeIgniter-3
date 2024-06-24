<!-- footer section start -->
<div class="footer_section layout_padding">
   <div class="container">
      <div class="footer_logo text-lg text-white fw-bold custom-large-text"><?= isset($content['logo_name']) ? $content['logo_name'] : 'BlogSpot' ?></div>
      <div class="footer_menu">
         <ul>
            <li><a href="<?= base_url('Home') ?>">Home</a></li>
            <li><a href="<?= base_url('Home/about') ?>">About</a></li>
            <li><a href="<?= base_url('blog') ?>">Blog</a></li>
            <li><a href="<?= base_url('features') ?>">Features</a></li>
            <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
         </ul>
      </div>
      <div class="contact_menu">
         <ul>
            <!-- Uncomment and add appropriate icons if needed -->
            <!-- <li><a href="#"><img src="assets/images/call-icon.png"></a></li> -->
            <li><a href="#">Email : <?= isset($content['footer_email']) ? $content['footer_email'] : 'contact@example.com' ?></a></li>
            <!-- <li><a href="#"><img src="assets/images/mail-icon.png"></a></li> -->
            <li><a href="#">Call : <?= isset($content['footer_number']) ? $content['footer_number'] : '123-456-7890' ?></a></li>
         </ul>
      </div>
   </div>
</div>
<!-- footer section end -->

<!-- copyright section start -->
<div class="copyright_section">
   <div class="container">
      <p class="copyright_text">Copyright 2020 All Right Reserved By. <a href="https://html.design">Free html Templates</a></p>
   </div>
</div>
<!-- copyright section end -->

<style>
   .custom-large-text {
      font-size: 4rem; /* Adjust the size as needed */
   }
</style>
