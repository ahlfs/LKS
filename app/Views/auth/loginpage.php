<?= $this->extend('layouts/navbar') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card mt-5">

        <div class="card-body">
            <h5 class="card-title center">Login</h5>

            <?php if(isset($successmessage)) : ?>
            <div class="alert alert-success" role="alert"><?= $successmessage ?></div>
            <?php endif; ?>

            <?php if(isset($failmessage)) : ?>
            <div class="alert alert-danger" role="alert"><?= $failmessage ?></div>
            <?php endif; ?>

            <form method="post" action="/auth/valid_login">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="none" value="<?= old('username') ?>">
                    <?php if (session()->getFlashdata('confirmError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('confirmError') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?= old('password') ?>">
                    <?php if (session()->getFlashdata('confirmError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('confirmError') ?>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
               
                    

            </form>
            <a href="/register">Don't have an account? Register</a>
        </div>
    </div>
</div>


<?= $this->endSection() ?>