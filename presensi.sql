-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2019 pada 03.20
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `no_induk` varchar(9) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `kondisi` int(1) NOT NULL DEFAULT '0',
  `jam` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `no_induk`, `kode`, `kondisi`, `jam`, `tanggal`) VALUES
(1, '', 'c5dc0ecfa3c2bc', 1, '07:41:44', '2019-11-05'),
(3, '18.007671', 'c5dc0ecfb76c6a', 1, '10:31:24', '2019-11-05'),
(5, '18.007671', 'c5dc0ecfbd6861', 1, '10:31:24', '2019-11-05'),
(7, '18.007671', 'c5dc0ecfc87704', 1, '10:31:24', '2019-11-05'),
(9, '18.007671', 'c5dc0ecfd14538', 1, '10:31:24', '2019-11-05'),
(11, '18.007671', 'c5dc0ecfd778c6', 1, '10:31:25', '2019-11-05'),
(13, '18.007671', 'c5dc0ecfdd7f45', 1, '10:31:25', '2019-11-05'),
(15, '18.007671', 'c5dc0ecfe49235', 1, '10:31:25', '2019-11-05'),
(17, '18.007671', 'c5dc0ecfeb0c63', 1, '10:31:25', '2019-11-05'),
(19, '18.007671', 'c5dc0ecff27cc1', 1, '10:31:25', '2019-11-05'),
(21, '18.007671', 'c5dc0f13d3c18f', 1, '10:49:32', '2019-11-05'),
(23, '18.007671', 'c5dc0f13da303a', 1, '10:49:33', '2019-11-05'),
(25, '18.007671', 'c5dc0f13e0f9bd', 1, '10:49:33', '2019-11-05'),
(27, '18.007671', 'c5dc0f13e6c1f3', 1, '10:49:33', '2019-11-05'),
(29, '18.007671', 'c5dc0f13ee26a6', 1, '10:49:33', '2019-11-05'),
(31, '18.007671', 'c5dc0f13f63cd2', 1, '10:49:33', '2019-11-05'),
(33, '18.007671', 'c5dc0f13fdbce6', 1, '10:49:33', '2019-11-05'),
(35, '18.007671', 'c5dc0f14050211', 1, '10:49:33', '2019-11-05'),
(37, '18.007671', 'c5dc0f140bd297', 1, '10:49:33', '2019-11-05'),
(39, '18.007671', 'c5dc0f1412a319', 1, '10:49:33', '2019-11-05'),
(41, '18.007671', 'c5dc0f147ce833', 1, '01:48:49', '2019-11-05'),
(43, '18.007694', 'c5dc0f148f16ca', 1, '01:50:54', '2019-11-05'),
(45, '999999999', 'c5dc0f14975f19', 1, '07:55:11', '2019-11-05'),
(47, '999999999', 'c5dc0f149dd58a', 1, '07:57:41', '2019-11-05'),
(49, '999999999', 'c5dc0f14a4c449', 1, '07:58:38', '2019-11-05'),
(51, '999999999', 'c5dc0f14aafefd', 1, '08:02:47', '2019-11-05'),
(53, '999999999', 'c5dc0f14b1ed2a', 1, '08:06:17', '2019-11-05'),
(55, '18.007671', 'c5dc0f14b8bd28', 1, '07:18:30', '2019-11-06'),
(57, '18.007671', 'c5dc0f14bf331a', 1, '07:19:01', '2019-11-06'),
(59, '999999999', 'c5dc0f14c6bc3c', 1, '09:58:16', '2019-11-07'),
(61, '999999999', 'c5dc187b532301', 1, '10:30:02', '2019-11-07'),
(63, '999999999', 'c5dc187b59cb0f', 1, '11:20:26', '2019-11-07'),
(65, '18.007671', 'c5dc187b61c019', 0, '09:31:42', '2019-11-05'),
(67, '18.007671', 'c5dc187b68dc0f', 0, '09:31:42', '2019-11-05'),
(69, '18.007671', 'c5dc187b70d027', 0, '09:31:42', '2019-11-05'),
(71, '18.007671', 'c5dc187b77fcd5', 0, '09:31:42', '2019-11-05'),
(73, '18.007671', 'c5dc187b7eaf20', 0, '09:31:42', '2019-11-05'),
(75, '18.007671', 'c5dc187b85405f', 0, '09:31:42', '2019-11-05'),
(77, '18.007671', 'c5dc187b8afff1', 0, '09:31:42', '2019-11-05'),
(79, '18.007671', 'c5dc187b917a21', 0, '09:31:42', '2019-11-05'),
(80, '18.007671', 'c5dc187b917a21', 0, '09:31:42', '2019-11-05'),
(81, '18.007671', 'c5dc188b7155df', 0, '09:35:43', '2019-11-05'),
(82, '18.007671', 'c5dc188b7155df', 0, '09:35:43', '2019-11-05'),
(83, '18.007671', 'c5dc188b791ea6', 0, '09:35:44', '2019-11-05'),
(84, '18.007671', 'c5dc188b791ea6', 0, '09:35:44', '2019-11-05'),
(85, '18.007671', 'c5dc188b81efc2', 0, '09:35:44', '2019-11-05'),
(86, '18.007671', 'c5dc188b81efc2', 0, '09:35:44', '2019-11-05'),
(87, '18.007671', 'c5dc188b8a2e58', 0, '09:35:44', '2019-11-05'),
(88, '18.007671', 'c5dc188b8a2e58', 0, '09:35:44', '2019-11-05'),
(89, '18.007671', 'c5dc188b92ed65', 1, '08:26:10', '2019-11-07'),
(90, '18.007671', 'c5dc188b92ed65', 1, '08:26:10', '2019-11-07'),
(91, '18.007671', 'c5dc188b9b0401', 0, '09:35:44', '2019-11-05'),
(92, '18.007671', 'c5dc188b9b0401', 0, '09:35:44', '2019-11-05'),
(93, '18.007671', 'c5dc188ba3cbe9', 0, '09:35:44', '2019-11-05'),
(94, '18.007671', 'c5dc188ba3cbe9', 0, '09:35:44', '2019-11-05'),
(95, '18.007671', 'c5dc188bac57b0', 0, '09:35:44', '2019-11-05'),
(96, '18.007671', 'c5dc188bac57b0', 0, '09:35:44', '2019-11-05'),
(97, '18.007671', 'c5dc188bb4d3c5', 0, '09:35:44', '2019-11-05'),
(98, '18.007671', 'c5dc188bb4d3c5', 0, '09:35:44', '2019-11-05'),
(99, '18.007671', 'c5dc188bbca583', 0, '09:35:44', '2019-11-05'),
(100, '18.007671', 'c5dc188bbca583', 0, '09:35:44', '2019-11-05'),
(101, '18.007671', 'c5dc1893f24e1c', 0, '09:37:59', '2019-11-05'),
(102, '18.007671', 'c5dc1893f24e1c', 0, '09:37:59', '2019-11-05'),
(103, '18.007671', 'c5dc1893fde611', 0, '09:38:00', '2019-11-05'),
(104, '18.007671', 'c5dc1893fde611', 0, '09:38:00', '2019-11-05'),
(105, '18.007671', 'c5dc18940940d9', 0, '09:38:00', '2019-11-05'),
(106, '18.007671', 'c5dc18940940d9', 0, '09:38:00', '2019-11-05'),
(107, '18.007671', 'c5dc1894126c83', 0, '09:38:01', '2019-11-05'),
(108, '18.007671', 'c5dc1894126c83', 0, '09:38:01', '2019-11-05'),
(109, '18.007671', 'c5dc18941a8f82', 0, '09:38:01', '2019-11-05'),
(110, '18.007671', 'c5dc18941a8f82', 0, '09:38:01', '2019-11-05'),
(111, '18.007671', 'c5dc1894233d50', 0, '09:38:01', '2019-11-05'),
(112, '18.007671', 'c5dc1894233d50', 0, '09:38:01', '2019-11-05'),
(113, '18.007671', 'c5dc1894385c8c', 0, '09:38:01', '2019-11-05'),
(114, '18.007671', 'c5dc1894385c8c', 0, '09:38:01', '2019-11-05'),
(115, '18.007671', 'c5dc189440cd02', 0, '09:38:01', '2019-11-05'),
(116, '18.007671', 'c5dc189440cd02', 0, '09:38:01', '2019-11-05'),
(117, '18.007671', 'c5dc189448a227', 0, '09:38:01', '2019-11-05'),
(118, '18.007671', 'c5dc189448a227', 0, '09:38:01', '2019-11-05'),
(119, '18.007671', 'c5dc189451a564', 0, '09:38:01', '2019-11-05'),
(120, '18.007671', 'c5dc189451a564', 0, '09:38:01', '2019-11-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_induk` varchar(9) NOT NULL,
  `password` varchar(128) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `jml_terlambat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `no_induk`, `password`, `kategori`, `jml_terlambat`) VALUES
(1, 'Ahmad Nuhisya Adillaumam', '18.007671', '1q2w3e4r', 'siswa', 3),
(2, 'admin', '999999999', 'admin', 'admin', 3),
(3, 'Nur Cahyo Putro', '18.007694', 'cahyo', 'siswa', 100);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;