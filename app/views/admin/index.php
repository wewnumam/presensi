<?php
    session_start();
    if (!isset($_SESSION['is_admin'])) {
        header("Location: login");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<div class="container">
    <div class="card">
    <p class="text-center">jumlah user: <?= $data['countUser'];?></p>
    <p class="text-center">kode tersedia: <?= $data['countStatus'];?></p>
    </div>
</div>
</body>
</html>