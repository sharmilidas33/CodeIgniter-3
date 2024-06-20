<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">
            <div class="card shadow-lg rounded-3">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">Sign In</h2>
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('signIn/checkUser') ?>" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Don't have an account yet? <a href="<?= base_url('signup') ?>">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
