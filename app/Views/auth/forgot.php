<?= $this->extend('auth/layout') ?>
<?= $this->section('main') ?>

<main class="form-signin w-100 m-auto">
    <form action="<?= base_url() . 'forgot'; ?>" method="post">
        <div class="text-center fw-bold">
            <h1 class="h3 mb-3">Forget Password</h1>
        </div>
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-info">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <?= csrf_field() ?>
        <div class="form-floating">
            <input name="email" type="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="floatingEmail" placeholder="name@example.com" value="<?= old('email') ?>">
            <label for="floatingEmail">Email address</label>
        </div>
        <div class="text-danger pb-1">
            <small><?= validation_show_error('email'); ?></small>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Get Token</button>

        <hr>
        <a href="<?= base_url() . 'register'; ?>" class="btn btn-outline-secondary w-100 py-2">Register</a>
        <p class="mt-5 mb-3 text-body-secondary text-center">© 2023–<?= date('Y'); ?></p>
    </form>
</main>
<?= $this->endSection() ?>