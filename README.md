# Sistem Presensi Sederhana Dengan Kode QR
Sistem presensi berbasis web dengan kode qr. Didesain semudah mungkin untuk pengguna.

## Alur
1. Pertama, user harus login menggunakan gawai di website yang tersedia dan mengaktifkan checkbox “ingat saya” agar user tidak perlu login lagi.
2. Kemudian, user membuka aplikasi QR Scanner di gawai dan memindai qr code yang telah disediakan oleh sekolah. 
3. Hasil pindaian tadi berupa link menuju website dengan kode inputan. User hanya perlu meuju link tersebut.
4. Jika terdapat pesan “proses presensi berhasil” maka presensi telah dilakukan.


## Fitur
- login, logout dan remember me
- generate QR Code
- Time based
- url database insert
- validation code
- admin

## Pembuatan
* [PHP](https://www.php.net/) - PHP build with MVC structure
* [MySQL](https://mariadb.org/) - Open source relational database
* [phpqrcode](https://github.com/t0k4rt/phpqrcode) - PHP implementation of QR Code 2-D barcode generator

## Halaman
- login
- logout
- input
- admin (user, code generator, QR Code, Statistics)

