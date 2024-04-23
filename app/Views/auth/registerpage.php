<?= $this->extend('layouts/navbar') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card mt-5">

        <div class="card-body">
            <h5 class="card-title center">Register</h5>

            <form method="post" action="/auth/valid_register">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="none" value="<?= old('username') ?>">
                    <?php if (session()->getFlashdata('usernameError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('usernameError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="none" value="<?= old('email') ?>">
                    <?php if (session()->getFlashdata('emailError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('emailError') ?>
                        </div>
                    <?php else : ?>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?= old('password') ?>">
                    <?php if (session()->getFlashdata('passwordError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('passwordError') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm" class="form-control" id="exampleInputPassword1" value="<?= old('confirm') ?>">
                    <?php if (session()->getFlashdata('confirmError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('confirmError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

            </form>
            <a href="/login">Already have an account? Login</a>
        </div>
    </div>
</div>


<?= $this->endSection() ?>