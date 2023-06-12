<?= $this->extend('auth/layout') ?>
<?= $this->section('main') ?>

<main class="form-signin w-100 m-auto">
    <form action="<?= base_url() . 'forgot/new-password'; ?>" method="post">
        <div class="text-center fw-bold">
            <h1 class="h3 mb-3">New Passoword</h1>
        </div>
        <?= csrf_field() ?>
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-info">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <?php if (old('email')) : ?>
            <div class="form-floating">
                <input name="email" type="text" readonly class="form-control" id="floatingEmail" placeholder="token" value="<?= old('email'); ?>">
                <label for="floatingEmail">Email</label>
            </div>
        <?php else : ?>
            <div class="alert alert-info" role="alert">
                Season has reset please regenerate token <a href="<?= base_url() . 'forgot'; ?>">here</a>.
            </div>
        <?php endif ?>
        <div class="form-floating">
            <input name="token" type="text" class="form-control <?= (validation_show_error('token')) ? 'is-invalid' : '' ?>" id="floatingToken" placeholder="token">
            <label for="floatingToken">Token</label>
        </div>
        <div class="text-danger pb-1">
            <small><?= validation_show_error('password'); ?></small>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : '' ?>" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">New Password</label>
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
        <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2023–<?= date('Y'); ?></p>
    </form>
</main>
<?= $this->endSection() ?>