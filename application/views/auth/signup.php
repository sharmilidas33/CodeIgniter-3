<div class="container">
    <div class="row">
        <div class="form-group">
            <?php echo validation_errors(); ?>
            <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-warning">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6 offset-md-3 py-4">
            <h2 class="mb-4">Sign Up</h2>
            <form action="<?= site_url('signUp/newUser') ?>" method="post">
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullname"  >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp"  >
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"  >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="confirm_password"  >
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-4">Submit</button>
            </form>
        </div>
    </div>
</div>
