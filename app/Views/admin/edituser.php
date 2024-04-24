<?= $this->extend('layouts/navbar') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card mt-5">

        <div class="card-body">
            <h5 class="card-title center">Edit User</h5>

            <form method="post" action="/updateuser/<?= $datauser['id_user'] ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="none" value="<?= $datauser['username'] ?>">
                    <?php if (session()->getFlashdata('usernameError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('usernameError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="none" value="<?= $datauser['email'] ?>">
                    <?php if (session()->getFlashdata('emailError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('emailError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    <?php if (session()->getFlashdata('passwordError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('passwordError') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
                    <input type="password" name="confirm" class="form-control" id="exampleInputPassword1">
                    <?php if (session()->getFlashdata('confirmError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('confirmError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Role</label>
                    <select class="form-select form-select-lg mb-3" name="level" aria-label="Large select example">
                        <option value="1" <?php if ($datauser['level'] == 1) : ?> selected <?php endif; ?>>Subscriber</option>
                        <option value="2" <?php if ($datauser['level'] == 2) : ?> selected <?php endif; ?>>Author</option>
                        <option value="3" <?php if ($datauser['level'] == 3) : ?> selected <?php endif; ?>>Admin</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
            <a href="/login">Already have an account? Login</a>
        </div>
    </div>
</div>


<?= $this->endSection() ?>