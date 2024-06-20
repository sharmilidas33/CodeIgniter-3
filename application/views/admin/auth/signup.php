<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">
            <div class="card shadow-lg rounded-3">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4 font-weight-bold">Sign Up</h2>
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
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
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Already have an account? <a href="<?= base_url('signin') ?>">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
