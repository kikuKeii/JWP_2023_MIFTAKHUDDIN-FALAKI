<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= base_url() . 'assets/img/favicon/apple-icon-152x152.png' ?>">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/aos/aos.css">
    <title><?= $title; ?></title>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <?= $this->include('dashboard/template/layout/header'); ?>
    <?= $this->renderSection('page-content'); ?>

    <div class="container mt-5 mb-5">
        <!-- MarginButton -->
        <br><br>
    </div>


</body>
<script src="<?= base_url(); ?>assets/aos/aos.js"></script>
<script>
    AOS.init();
</script>

</html>