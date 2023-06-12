<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() . 'assets/img/favicon/apple-icon-152x152.png' ?>">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container fixed-top">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom bg-white">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none link-dark">
                <img src="<?= base_url() . 'assets/img/favicon/apple-icon-152x152.png' ?>" width="30px">
                <span class="fs-4 fw-bold">Home</span>
            </a>

            <ul class="nav nav-pills fw-bold">
                <li class="nav-item"><a href="#" class="nav-link link-dark" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="<?= url_title($cek_login, '-', true); ?>" class="nav-link link-dark"><?= $cek_login; ?></a></li>
            </ul>
        </header>
    </div>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="<?= base_url(); ?>assets/img/home/1-home.png" width="400" alt="" srcset="">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Dibangun dengan Codeigneter 4</h1>
                <p class="lead">Code dapat dengan mudah diubah karena website dibagun dengan Codeigneter 4 yang ramah akan pengguna baru.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="/register" class="btn btn-dark btn-lg px-4 me-md-2">Register</a>
                    <a href="/login" class=" btn btn-outline-dark btn-lg px-4">Login</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-3">
                <h2>User guide</h2>
                <ol class="list-group list-group-numbered list-group-flush">
                    <li class=" list-group-item">Server Requirements</li>
                    <li class="list-group-item">Installation</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>1. Server Requirements</h4>
                <p class="ps-4">See server requirements <a href="https://codeigniter.com/user_guide/intro/requirements.html" target="_blank" rel="noopener noreferrer">here</a>.</p>
                <br>
                <h4>2. Installation</h4>
                <div class="ps-4">
                    If the vendor folder is not there, please run "composer install".
                    <br>
                    The next step is to import table to database. <br>
                    <div class="ps-3">
                        <h4> 2.1. With composer</h4>
                        Create one new database. Then run "php spark migrate". <br>
                        <h4>2.2. Manually </h4>
                        Create one new database. then import sql.sql<br><br>
                    </div>

                    Run "php spark serve" to run the web application<br><br>

                    the next step is to configure the .env file<br><br>

                    open .env file change app.baseURL according to CodeIgniter development server. Example http://localhost:8080<br><br>

                    The next step is to change the database configuration in the .env file to:<br><br>
                    database.default.hostname = localhost<br>
                    database.default.database = # database name to create<br>
                    database.default.username = root #username<br>
                    database. default. password = #password<br>
                    database.default.DBDriver = MySQLi<br>
                    database. default. DBPrefix =<br>
                    database.default.port = 3306<br>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="welcomeToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="<?= base_url() . 'assets/img/developer/profile-img4.png'; ?>" width="24px" class="rounded me-2" alt="...">
                <strong class="me-auto">Miftakhuddin Falaki(Dev)</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Welcome~
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script>
        const toastTrigger = document.getElementById('download')
        const toastTrigger2 = document.getElementById('download2')
        const toastTrigger3 = document.getElementById('download3')
        const toastDownload = document.getElementById('downloadToast')
        const welToast = document.getElementById('welcomeToast')
        const welcome = document.querySelector('html')

        if (toastTrigger || toastTrigger2 || toastTrigger3) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastDownload)
            toastTrigger.addEventListener('click', () => {
                toastBootstrap.show()
            })
            toastTrigger2.addEventListener('click', () => {
                toastBootstrap.show()
            })
            toastTrigger3.addEventListener('click', () => {
                toastBootstrap.show()
            })
        }
        if (welcome !== null) {
            const toastBootstrap2 = bootstrap.Toast.getOrCreateInstance(welToast)
            toastBootstrap2.show()
        }
    </script>
</body>

</html>