<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body class="text-center">
    <div class="container">

<?php
    echo '<br><br>';
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "presensi");

    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username dengan id
        $result  = mysqli_query($conn, "SELECT no_induk FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        // cek cookie
        if ($key === hash('sha256', $row['no_induk'])) {
            $_SESSION['login'] = true;
        }
    }

    if (isset($_SESSION["login"])) {
        echo "You have entered! <br>";
    }

    if (isset($_POST["login"])) {
        $no_induk = $_POST["no_induk"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE no_induk = '$no_induk'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if ($password == $row["password"]) {
                // set session
                $_SESSION["login"] = true;
                $_SESSION["no_induk"] = $no_induk;
                if (isset($_POST["remember"])) {
                    // buat cookie
                    setcookie('id', $row['id'], time() + 60);
                    setcookie('key', hash('sha256', $row['no_induk']), time() + 60);
                }

                if ($no_induk == "999999999" && $password == "admin") {
                    $_SESSION['is_admin'] = true;
                    header("Location: admin");
                    exit;
                }
            } else {
                echo "Wrong password! <br>";
            }
        } else {
            echo "Account doesn't exist! <br>";
        }

        $error = true;
    }

    if (isset($_POST["logout"])) {
        $_SESSION = [];
        session_unset();
        session_destroy();

        setcookie('id', '', time() - 3600);
        setcookie('key', '', time() - 3600);


        echo "You have come out! <br>";
    }

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
?>
    <?php if (!isset($_SESSION["login"])): ?>
    <form action="" method="post" class="card">
        <h3>Login</h3>
        <input type="text" name="no_induk" id="no_induk" class="input" placeholder="no induk">
        <input type="password" name="password" id="password" class="input" placeholder="password"><br><br>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">ingat saya</label>
        <input type="submit" name="login" id="login" class="btn" value="login">
    </form>
    <?php else: ?>
    <?= "You have entered! <br>";?>
    <form action="" method="post" class="card">
        <h3>Logout</h3>
        <input type="submit" name="logout" id="logout" class="btn" value="logout">
    </form>
    <?php endif; ?>
    <br>
    </div>
</body>
</html>