<?php
    session_start();
    if (!isset($_SESSION['is_admin'])) {
        header("Location: login");
        exit;
    }
?>

<html lang="en">
<body>
    <div class="container">
        <br><br><br>
        <h3 class="text-center">Daftar User</h3>
        <table>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>No Induk</th>
                <th>Jumlah Keterlambatan</th>
            </tr>
            <?php $i = 1; foreach($data['user'] as $u): ?>
                <tr>
                <td><?= $i++;?></td>
                <td><?= $u['nama'];?></td>
                <td><?= $u['no_induk'];?></td>
                <td><?= $u['jml_terlambat'];?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>