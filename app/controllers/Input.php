<?php

class Input extends Controller {

    public function index()
    {
        session_start();

        if (!$_SESSION['login']) {
            header("Location: ". BASEURL ."/login");
            exit;
        }
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        $this->model('Presensi_model')->update($url[1], $_SESSION['no_induk']);

        echo "<p style='text-align: center;'>url get : " . $url[1] . "</p>";
        echo "<p style='text-align: center;'>no induk : " . $_SESSION['no_induk'] . "</p>";
    }

}