<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presensi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
    <script src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
    <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="">
                <h1 class="title is-4">PRESENSI</h1>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="<?= base_url('') ?>">
                    Home
                </a>
                <a class="navbar-item" href="<?= base_url('logs') ?>">
                    Logs
                </a>
                <a class="navbar-item" href="<?= base_url('admin') ?>">
                    Admin
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <?php if($this->session->has_userdata('username')): ?>
                    <div class="buttons">
                        <a class="button is-light">
                            <?= $this->session->username ?>
                        </a>
                        <a class="button is-danger" href="<?= base_url('user/logout') ?>">
                            <strong>Logout</strong>
                        </a>
                    </div>
                    <?php else: ?>
                    <div class="buttons">
                        <a class="button is-primary" href="<?= base_url('user/login') ?>">
                            Login
                        </a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        </div>
    </nav>