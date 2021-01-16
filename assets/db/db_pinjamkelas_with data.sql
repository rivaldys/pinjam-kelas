-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 11:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pinjamkelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` varchar(10) NOT NULL,
  `peminjam` varchar(25) NOT NULL,
  `ruangan_dipinjam` varchar(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `waktu_pengajuan` datetime NOT NULL,
  `waktu_penyetujuan` datetime NOT NULL,
  `waktu_pembatalan` datetime NOT NULL,
  `waktu_pengembalian` datetime NOT NULL,
  `verifikasi_bp` varchar(5) NOT NULL,
  `verifikasi_kabag` varchar(5) NOT NULL,
  `status_pinjam` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `peminjam`, `ruangan_dipinjam`, `keterangan`, `waktu_pengajuan`, `waktu_penyetujuan`, `waktu_pembatalan`, `waktu_pengembalian`, `verifikasi_bp`, `verifikasi_kabag`, `status_pinjam`) VALUES
('DPK-00001', 'Bagian Umum', 'Kelas-01', 'Diskusi desain interior rumah', '2019-02-10 23:53:50', '2019-02-11 00:07:37', '0000-00-00 00:00:00', '2019-02-11 00:09:17', 'OK', 'OK', 'Selesai'),
('DPK-00002', 'Bagian Umum', 'Kelas-01', 'Rapat rutin', '2019-02-25 16:10:10', '2019-02-25 16:10:59', '0000-00-00 00:00:00', '2019-02-25 16:11:14', 'OK', 'OK', 'Selesai'),
('DPK-00003', 'Ahmad Rivaldy S', 'Kelas-02', 'Diskusi tentang web design', '2019-02-25 16:45:42', '2019-02-25 16:51:37', '0000-00-00 00:00:00', '2019-02-25 16:56:37', 'OK', 'OK', 'Selesai'),
('DPK-00004', 'Ahmad Rivaldy S', 'Kelas-01', 'Kegiatan UKM', '2019-03-15 21:34:54', '2019-03-15 21:36:58', '0000-00-00 00:00:00', '2019-03-15 21:39:00', 'OK', 'OK', 'Selesai'),
('DPK-00005', 'Ahmad Rivaldy S', 'Kelas-01', 'Mengerjakan tugas', '2019-03-22 08:50:09', '2019-03-22 08:52:07', '0000-00-00 00:00:00', '2019-03-22 10:21:20', 'OK', 'OK', 'Selesai'),
('DPK-00006', 'Ahmad Rivaldy S', 'Kelas-02', 'Untuk bimbingan', '2019-03-22 10:15:44', '2019-03-22 10:16:53', '0000-00-00 00:00:00', '2019-03-22 10:21:16', 'OK', 'OK', 'Selesai'),
('DPK-00007', 'Ahmad Rivaldy S', 'Kelas-02', 'meeting HIMA', '2019-03-22 10:21:39', '2019-03-22 10:23:02', '0000-00-00 00:00:00', '2019-04-13 16:13:24', 'OK', 'OK', 'Selesai'),
('DPK-00008', 'Bagian Umum', 'Kelas-01', 'Latihan gambar', '2019-04-13 17:54:46', '2019-04-13 17:55:37', '0000-00-00 00:00:00', '2019-04-13 17:59:29', 'OK', 'OK', 'Selesai'),
('DPK-00009', 'Ahmad Rivaldy S', 'Kelas-01', 'Mengulas film', '2019-05-08 20:16:21', '2019-05-08 21:34:22', '0000-00-00 00:00:00', '2019-05-08 21:55:56', 'OK', 'OK', 'Selesai'),
('DPK-00010', 'Ahmad Rivaldy S', 'Kelas-01', 'Bimbingan TA', '2019-05-08 21:57:47', '2019-05-08 22:21:35', '0000-00-00 00:00:00', '2019-05-08 22:29:29', 'OK', 'OK', 'Selesai'),
('DPK-00011', 'Ahmad Rivaldy S', 'Kelas-01', 'Mengerjakan laporan TA', '2019-06-17 15:03:16', '2019-06-17 15:05:35', '0000-00-00 00:00:00', '2019-06-17 15:07:10', 'OK', 'OK', 'Selesai'),
('DPK-00012', 'Ahmad Rivaldy S', 'Kelas-01', 'Mengulas teori web', '2019-06-19 13:12:58', '2019-06-19 13:15:25', '0000-00-00 00:00:00', '2019-06-19 13:18:18', 'OK', 'OK', 'Selesai'),
('DPK-00013', 'User', 'Kelas-01', 'Tes pengajuan peminjaman', '2019-06-27 16:05:41', '2019-06-27 16:18:56', '0000-00-00 00:00:00', '2019-06-27 16:20:07', 'OK', 'OK', 'Selesai'),
('DPK-00014', 'User', 'Kelas-02', 'Belajar pembuatan web', '2019-06-27 16:20:43', '2019-06-27 16:22:56', '0000-00-00 00:00:00', '2019-06-27 16:23:15', 'OK', 'OK', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(15) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `status`) VALUES
('R001', 'Kelas-01', 'Tersedia'),
('R002', 'Kelas-02', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tap`
--

CREATE TABLE `tb_tap` (
  `id` int(5) NOT NULL,
  `id_kartu` varchar(20) NOT NULL,
  `nama_ruangan` varchar(15) NOT NULL,
  `waktu_akses` datetime NOT NULL,
  `waktu_tutup` datetime NOT NULL,
  `status_akses` varchar(10) NOT NULL DEFAULT 'Dibuka'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tap`
--

INSERT INTO `tb_tap` (`id`, `id_kartu`, `nama_ruangan`, `waktu_akses`, `waktu_tutup`, `status_akses`) VALUES
(9, 'RFID-16950119', 'Ruang Kelas-01', '2019-02-27 01:26:01', '2019-02-27 01:26:14', 'Ditutup'),
(10, 'RFID-16950119', 'Ruang Kelas-01', '2019-02-27 01:26:32', '2019-02-27 01:26:48', 'Ditutup'),
(11, 'RFID-16950119', 'Ruang Kelas-01', '2019-02-27 01:27:51', '2019-02-27 01:28:03', 'Ditutup'),
(12, 'RFID-16950119', 'Ruang Kelas-01', '2019-02-27 09:52:05', '2019-02-27 09:52:34', 'Ditutup'),
(13, 'RFID-16950119', 'Ruang Kelas-01', '2019-02-27 10:12:08', '2019-02-27 10:12:16', 'Ditutup'),
(14, 'RFID-16950119', 'Ruang Kelas-01', '2019-02-27 10:14:15', '2019-02-27 10:14:31', 'Ditutup'),
(15, 'RFID-16950119', 'Ruang Kelas-01', '2019-02-27 10:17:39', '2019-02-27 10:18:10', 'Ditutup'),
(19, 'RFID-16950119', 'Ruang Kelas-01', '2019-02-28 08:58:39', '2019-02-28 08:59:02', 'Ditutup'),
(20, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-01 07:39:50', '2019-03-01 07:40:43', 'Ditutup'),
(21, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-01 07:52:38', '2019-03-01 07:57:25', 'Ditutup'),
(22, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-01 07:56:03', '2019-03-01 07:57:25', 'Ditutup'),
(23, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-01 07:57:17', '2019-03-01 07:57:25', 'Ditutup'),
(24, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-01 08:02:52', '2019-03-01 08:03:07', 'Ditutup'),
(25, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-01 08:06:27', '2019-03-01 08:07:25', 'Ditutup'),
(26, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-11 20:07:01', '2019-03-11 20:07:29', 'Ditutup'),
(27, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-11 20:16:23', '2019-03-11 20:17:04', 'Ditutup'),
(30, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-12 06:25:45', '2019-03-12 06:33:22', 'Ditutup'),
(31, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-12 06:32:18', '2019-03-12 06:33:22', 'Ditutup'),
(32, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-12 06:36:38', '2019-03-12 06:37:15', 'Ditutup'),
(33, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-12 06:38:54', '2019-03-12 06:40:12', 'Ditutup'),
(34, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-12 06:45:47', '2019-03-12 06:46:33', 'Ditutup'),
(35, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-15 21:37:16', '2019-03-15 21:42:09', 'Ditutup'),
(36, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-22 08:53:51', '2019-03-22 08:54:30', 'Ditutup'),
(37, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-22 09:04:10', '2019-03-22 09:04:34', 'Ditutup'),
(38, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-22 10:17:49', '2019-03-22 10:24:22', 'Ditutup'),
(39, 'RFID-16950119', 'Ruang Kelas-01', '2019-03-22 10:24:13', '2019-03-22 10:24:22', 'Ditutup'),
(40, 'RFID-16950119', 'Ruang Kelas-01', '2019-06-17 11:28:36', '2019-06-17 11:31:42', 'Ditutup'),
(41, 'RFID-16950119', 'Ruang Kelas-01', '2019-06-17 11:31:34', '2019-06-17 11:31:42', 'Ditutup'),
(42, 'RFID-16950119', 'Ruang Kelas-01', '2019-06-17 15:06:27', '2019-06-17 15:06:58', 'Ditutup'),
(43, 'RFID-16950119', 'Ruang Kelas-01', '2019-06-19 09:55:46', '2019-06-19 09:55:53', 'Ditutup'),
(44, 'RFID-16950119', 'Ruang Kelas-01', '2019-06-19 13:17:33', '2019-06-19 13:17:56', 'Ditutup');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(10) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `fullname`, `password`, `level`) VALUES
('aldy', 'Ahmad Rivaldy S', 'ae671ecd4ebee177c57dfbfbbf28cd83', 'Pengguna Ruangan'),
('biropend', 'Biro Pendidikan', '215e95f88936b204603dfcff01e9f614', 'Biro Pendidikan'),
('kabag', 'Kabag/Kaprodi', '215e95f88936b204603dfcff01e9f614', 'Kabag/Kaprodi'),
('umum', 'Bagian Umum', '215e95f88936b204603dfcff01e9f614', 'Bagian Umum'),
('user', 'User', 'ae671ecd4ebee177c57dfbfbbf28cd83', 'Pengguna Ruangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tb_tap`
--
ALTER TABLE `tb_tap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tap`
--
ALTER TABLE `tb_tap`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
