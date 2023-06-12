<?= $this->extend('auth/layout') ?>
<?= $this->section('main') ?>

<main class="form-signin w-100 m-auto">
    <form action="<?= base_url() . 'register'; ?>" method="post" enctype="multipart/form-data">
        <div class="text-center fw-bold pt-5">
            <i class="bi bi-door-open fs-2"></i>
            <h1 class="h3 mb-3">Register</h1>
        </div>
        <?= csrf_field() ?>

        <div class="form-floating">
            <input name="name" type="text" class="form-control <?= (validation_show_error('name')) ? 'is-invalid' : '' ?>" id="floatingName" placeholder="Name" value="<?= old('name') ?>">
            <label for="floatingName">Name</label>
        </div>
        <div class="text-danger pb-1">
            <small><?= validation_show_error('name') ?></small>
        </div>
        <div class="form-floating">
            <input name="email" type="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="floatingEmail" placeholder="name@example.com" value="<?= old('email') ?>">
            <label for="floatingEmail">Email address</label>
        </div>
        <div class="text-danger pb-1">
            <small><?= validation_show_error('email'); ?></small>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : '' ?>" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="text-danger pb-1">
            <small><?= validation_show_error('password'); ?></small>
        </div>
        <div class="form-floating">
            <input name="pass_confirm" type="password" class="form-control <?= (validation_show_error('pass_confirm')) ? 'is-invalid' : '' ?>" id="floatingConfirmPassword" placeholder="Password">
            <label for="floatingConfirmPassword">Confirm Password</label>
        </div>
        <div class="text-danger pb-1">
            <small><?= validation_show_error('pass_confirm'); ?></small>
        </div>
        <div>
            <label for="formFileLg" class="form-label">Upload your image</label>
            <input name="img_profile" class="form-control form-control-lg" id="formFileLg" type="file">
        </div>
        <div class="text-danger pb-1">
            <small><?= validation_show_error('img_profile'); ?></small>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        <hr>
        <a href="<?= base_url() . 'login'; ?>" class="btn btn-outline-secondary w-100 py-2">Login</a>
        <p class="mt-5 mb-3 text-body-secondary">© 2023–<?= date('Y'); ?></p>
    </form>
</main>
<?= $this->endSection() ?>