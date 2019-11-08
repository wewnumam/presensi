<?php
    session_start();
    if (!isset($_SESSION['is_admin'])) {
        header("Location: login");
        exit;
        $_SESSION['msg'] = "You can't access admin page!";
    }
    $randIndex = array_rand($data['qrcode']);
    $kode = $data['qrcode'][$randIndex]['kode'];
    $kondisi = $data['qrcode'][$randIndex]['kondisi'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="card text-center">
    <?php if ($kondisi == 0): ?>
        <meta http-equiv="refresh" content="5">
        <img src="qrcode/<?= $kode;?>.png" alt="" srcset="">
        <br><br>
        <?= $kode;?>
    <?php else:?>
         <meta http-equiv="refresh" content="0">
    <?php endif;?>
    <h4 id="countdown"></h4>
    </div>
    </div>
    <script>
        var timeleft = 5;
        var timer = setInterval(function(){
            document.getElementById("countdown").innerHTML = "reload in " + timeleft + "s";
            timeleft -= 1;
        }, 1000);
    </script>
</html>