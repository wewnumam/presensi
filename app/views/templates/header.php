<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Halaman <?= $data['judul']; ?></title>
    <!-- <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css"> -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body>

<div class="container">
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="<?= BASEURL; ?>">QR Code</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= BASEURL; ?>/admin">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= BASEURL; ?>/admin/userlist">User List</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="<?= BASEURL; ?>/admin/generate">Generate Code</a>
  </li>
</ul>
</div>

</body>
</html>