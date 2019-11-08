<?php

class Admin_model {
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function countUser()
    {
        $conn = mysqli_connect("localhost", "root", "", "presensi");
        $check = mysqli_query($conn, "SELECT * FROM user");
        return mysqli_num_rows($check);
    }

    public function countStatus()
    {
        $conn = mysqli_connect("localhost", "root", "", "presensi");
        $check2 = mysqli_query($conn, "SELECT * FROM presensi WHERE kondisi = 0");
        return mysqli_num_rows($check2);
    }
}