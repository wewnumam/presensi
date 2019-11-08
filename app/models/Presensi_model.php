<?php

class Presensi_model {
    private $table = 'presensi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        
    }

    public function getQRCode()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * FROM user');
        return $this->db->resultSet();
    }

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        $conn = mysqli_connect("localhost", "root", "", "presensi");
        date_default_timezone_set('Asia/Jakarta');
        
        $no_induk = '18.007671';
        $kode = $data;
        $status = 0;
        $jam = date("h:i:sa");
        $tanggal = date("Y-m-d");
        
        $check = mysqli_query($conn, "SELECT * FROM presensi");
        $total = mysqli_num_rows($check);
        // $checkrows = mysqli_num_rows($check);

        // if (mysqli_num_rows($check) > 0) {  
            // insert Data
            $query = "INSERT INTO `presensi` (`id`, `no_induk`, `kode`, `kondisi`, `jam`, `tanggal`) VALUES
                (NULL,'$no_induk', '$kode', '$status', '$jam', '$tanggal')
            ";
            mysqli_query($conn, $query);

            for ($i=2; $i < $total; $i+=2) { 
                $query2 = "DELETE FROM `presensi` WHERE `id` = $i";
                mysqli_query($conn, $query2);
            }
    
            if (!mysqli_query($conn, $query)) {
                echo mysqli_error($conn);
                mysqli_close($conn);
            } else {
                return mysqli_affected_rows($conn);
            }
        // }

        
    }

    public function update($code, $no_induk)
    {
        $conn = mysqli_connect("localhost", "root", "", "presensi");
        date_default_timezone_set('Asia/Jakarta');
        $jam = date("h:i:sa");
        $tanggal = date("Y-m-d");

        foreach ($this->getQRCode() as $c) { 
            if ($c['kode'] == $code) {
                if ($c['kondisi'] == '0') {
                    echo "<p style='color: green; text-align: center; margin-top: 20px;'>proses presensi berhasil </p>";
                    $query = "UPDATE presensi SET no_induk = '$no_induk', kondisi = '1', jam = '$jam', tanggal = '$tanggal' WHERE kode = '$code'";
                    mysqli_query($conn, $query);
                    if (date("H") != '6') {
                        foreach ($this->getAllUser() as $user) {
                            if ($user['no_induk'] == $no_induk) {
                                $sum = $user['jml_terlambat'] + 1;
                                $query = "UPDATE user SET jml_terlambat= $sum WHERE no_induk = '$no_induk'";
                                mysqli_query($conn, $query);
                            }
                        }
                    }
                    return mysqli_affected_rows($conn);
                } else {
                    echo "<p style='color: red; text-align: center; margin-top: 20px;'>kode tidak tersedia atau kode telah terisi </p>";
                }

            }
        }

    }

}