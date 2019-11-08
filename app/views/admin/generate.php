<?php
    session_start();
    if (!isset($_SESSION['is_admin'])) {
        header("Location: login");
        exit;
    }
    $str = []; 
    include "phpqrcode/qrlib.php";

    if (isset($_POST['submit'])) {
        for ($i=0; $i < 10; $i++) { 
            $qrcode[$i] = $_POST[$i];
        }
    }
?>

<html lang="en">
<body>
    <div class="container">
    <br><br><br>
    <h3 class="text-center">Tambahkan data QR code</h3>
    <div class="card small">
    <form action="" method="post" class="mb-5">
        <?php for ($i=0; $i < 10; $i++): ?>
            <?php
                $str[$i] = uniqid();
                QRcode::png('http://localhost/presensi/public/input/c'.$str[$i], 'qrcode/c'.$str[$i].'.png', 'L', 4, 4);
                echo '<p class="text-center">'.$str[$i] . "</p>";  
            ?>
             <input type="hidden" name="<?= $i; ?>" id="<?= $i; ?>" class="" value="<?= 'c'.$str[$i];?>">
        <?php endfor;?>
        <input type="submit" name="submit" id="submit" class="btn btn-admin" value="submit">
    </form>
    </div>
    </div>
</body>
</html>