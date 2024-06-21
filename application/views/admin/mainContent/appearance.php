<div class="container mt-4">

<!-- For Validation -->
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    
<form method="post" action="<?php echo site_url('BlogAdmin/addContent'); ?>" enctype="multipart/form-data">
        <!-- Logo and Navigation Items Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Header</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="logo_name" class="form-label">Logo Name</label>
                    <input type="text" class="form-control" id="logo_name" name="logo_name" value=""   >
                </div>

                <div id="navItemsContainer">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="nav_items[0][name]" placeholder="Name"   >
                        <input type="url" class="form-control" name="nav_items[0][link]" placeholder="Link"   >
                        <button type="button" class="btn btn-danger remove-nav-item">Remove</button>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="nav_items[1][name]" placeholder="Name"   >
                        <input type="url" class="form-control" name="nav_items[1][link]" placeholder="Link"   >
                        <button type="button" class="btn btn-danger remove-nav-item">Remove</button>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="nav_items[2][name]" placeholder="Name"   >
                        <input type="url" class="form-control" name="nav_items[2][link]" placeholder="Link"   >
                        <button type="button" class="btn btn-danger remove-nav-item">Remove</button>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="nav_items[3][name]" placeholder="Name"   >
                        <input type="url" class="form-control" name="nav_items[3][link]" placeholder="Link"   >
                        <button type="button" class="btn btn-danger remove-nav-item">Remove</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Home Banner Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Home Banner</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="banner_line" class="form-label">Banner Line</label>
                    <input type="text" class="form-control" id="banner_line" name="banner_line" value=""   >
                </div>

                <div class="mb-3">
                    <label for="banner_image" class="form-label">Banner Image</label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image">
                    <img src="" alt="Banner Image" class="img-thumbnail mt-2" width="200">
                </div>

                <div class="mb-3">
                    <label for="banner_button_name" class="form-label">Button Name</label>
                    <input type="text" class="form-control" id="banner_button_name" name="banner_button_name" value=""   >
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">About Us</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="about_us" class="form-label">About Us Paragraph</label>
                    <textarea class="form-control" id="about_us" name="about_us" rows="4"   ></textarea>
                </div>

                <div class="mb-3">
                    <label for="about_image_1" class="form-label">About Image</label>
                    <input type="file" class="form-control" id="about_image_1" name="about_image_1">
                    <img src="" alt="About Image 1" class="img-thumbnail mt-2" width="200">
                </div>
            </div>
        </div>

        <!-- Social Links Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Social Links</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="facebook_link" class="form-label">Facebook</label>
                    <input type="url" class="form-control" id="facebook_link" name="facebook_link" placeholder="Facebook URL"   >
                </div>
                <div class="mb-3">
                    <label for="linkedin_link" class="form-label">LinkedIn</label>
                    <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" placeholder="LinkedIn URL"   >
                </div>
                <div class="mb-3">
                    <label for="instagram_link" class="form-label">Instagram</label>
                    <input type="url" class="form-control" id="instagram_link" name="instagram_link" placeholder="Instagram URL"   >
                </div>
                <div class="mb-3">
                    <label for="twitter_link" class="form-label">Twitter</label>
                    <input type="url" class="form-control" id="twitter_link" name="twitter_link" placeholder="Twitter URL"   >
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Footer</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="footer_email" class="form-label">Footer Email</label>
                    <input type="email" class="form-control" id="footer_email" name="footer_email" placeholder="Footer Email"   >
                </div>
                <div class="mb-3">
                    <label for="footer_number" class="form-label">Footer Number</label>
                    <input type="tel" class="form-control" id="footer_number" name="footer_number" placeholder="Footer Number"   >
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Save All Sections</button>
        </div>
    </form>
</div>
