<?= $this->extend('dashboard/template/dashboard'); ?>

<?= $this->section('page-content'); ?>
<?= $this->include('dashboard/template/layout/navbar'); ?>
<div class="container mt-5 csetting">
    <div class="row" align="center">
        <div class="col-12">
            <img src="<?= base_url(); ?>/assets/img/profile-img/<?= $user['profile_img']; ?>" width="140px" alt="Profile-IMG">
        </div>
        <div class="col-12">
            <h2><?= $user['name']; ?></h2>
            <small><?= $user['email']; ?></small>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-12">
            <div class="list-group list-group-flush">
                <button class="fw-bold list-group-item list-group-item-action" id="button_nw">
                    <i class="bi bi-sliders"></i> Setting Akun
                </button>
                <button class="fw-bold list-group-item list-group-item-action" id="info_button">
                    <i class="bi bi-info-circle"></i> information
                </button>
                <a href="#" class="fw-bold list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#delete" tabindex="-1" role="button" aria-disabled="true"><i class="bi bi-x-square"></i> Delete Account</a>
                <a href="#" class="fw-bold list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#logout" tabindex="-1" role="button" aria-disabled="true"><i class="bi bi-box-arrow-left"></i> Logout</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row text-center">
                            <div class="col">
                                <h4>Are you sure you want to logout?</h4>
                            </div>
                            <div class="col-12 pt-1 d-grid gap-2">
                                <a href="<?= base_url(); ?>logout" class="btn btn-outline-primary" width>Yes</a>
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row text-center">
                            <div class="col">
                                <h4>Are you sure you want to <span class="text-danger">delete</span> this account?</h4>
                            </div>
                            <form action="<?= base_url() . 'dashboard/' . $user['id']; ?>" method="post">
                                <div class="col-12 pt-1 d-grid gap-2">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-outline-danger" width>Yes</a>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast-container position-static">
            <div id="toast_nw" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= base_url() . 'assets/img/developer/profile-img4.png'; ?>" width="24px" class="rounded me-2" alt="...">
                    <strong class="me-auto">Miftakhuddin Falaki(Dev)</strong>
                    <small>Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Sorry this action can not be accessed. please Contact <a href="http://kikukeii.github.com/profile#contact" target="_blank" rel="noopener noreferrer"><b>Here</b></a>.
                </div>
            </div>

            <div id="info_toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= base_url() . 'assets/img/developer/profile-img4.png'; ?>" width="24px" class="rounded me-2" alt="...">
                    <strong class="me-auto">Miftakhuddin Falaki(Dev)</strong>
                    <small>Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <i class="bi bi-check-lg"></i> Registration form with email, name, password, and a profile picture upload. <br>
                    <i class="bi bi-check-lg"></i> A login page and landing page showing the submitted information. <br>
                    <i class="bi bi-check-lg"></i> A proper forgot password feature
                </div>
            </div>
        </div>
    </div>

    <script>
        const toastTrigger = document.getElementById('info_button')
        const toastTriggerNW = document.getElementById('button_nw')
        const toastContainer = document.getElementById('info_toast')
        const toastContainerNW = document.getElementById('toast_nw')

        if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastContainer)
            toastTrigger.addEventListener('click', () => {
                toastBootstrap.show()
            })
        }
        if (toastTriggerNW) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastContainerNW)
            toastTriggerNW.addEventListener('click', () => {
                toastBootstrap.show()
            })
        }
    </script>
</div>
<?= $this->endSection(); ?>