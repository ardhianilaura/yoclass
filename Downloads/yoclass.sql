-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 03:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoclass`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pnilai` ()  BEGIN
SELECT nama_siswa as Nama, mapel, nilai as Nilai, ket_nilai(nilai) as Keterangan FROM nilai JOIN siswa ON nilai.siswa_id=siswa.siswa_id JOIN mata_pelajaran ON nilai.mapel_id=mata_pelajaran.mapel_id WHERE nilai_id = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `psiswa` (`nis` VARCHAR(50))  BEGIN
SELECT siswa_id as nis, nama_siswa as nama, kelas FROM siswa JOIN kelas ON siswa.kelas_id=kelas.kelas_id WHERE siswa_id = 4;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fnilai` (`nilai` INT) RETURNS VARCHAR(30) CHARSET utf8mb4 BEGIN
DECLARE ket VARCHAR(30);
IF nilai >= 75 THEN
SET ket = 'LULUS';
ELSEIF nilai < 75 THEN
SET ket = 'TIDAK LULUS';
END IF;
RETURN ket;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `ket_nilai` (`nilai` INT) RETURNS VARCHAR(30) CHARSET utf8mb4 BEGIN
DECLARE ket VARCHAR(30);
IF nilai >= 75 THEN
SET ket = 'LULUS';
ELSEIF nilai < 75 THEN
SET ket = 'TIDAK LULUS';
END IF;
RETURN ket;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `poto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `nama_lengkap`, `no_hp`, `level`, `poto`) VALUES
(1, 'ardhiani', '680e89809965ec41e64dc7e447f175ab', 'ardhiani@gmail.com', 'Ardhiani Laura', '083752665452', 'admin', 'poto-1.jpg'),
(3, 'leetaeyong', '576fcac020be0cb079bce75b692d2157', 'leetaeyong@gmail.com', 'Lee Taeyong', '086542667533', 'user', 'poto-1.jpg'),
(4, 'jaehyun', 'd9e7f4d9a1f8c4bbcc08aca77e1efa37', 'jaehyun@gmail.com', 'Jung Jaehyun', '08645343456', 'user', 'poto-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `dsiswa`
--

CREATE TABLE `dsiswa` (
  `dsiswa_id` int(11) NOT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL,
  `aksi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsiswa`
--

INSERT INTO `dsiswa` (`dsiswa_id`, `nama_siswa`, `nis`, `alamat`, `tgl_ubah`, `aksi`) VALUES
(1, 'Na jaemin', '721888', 'Wonogiri', '2020-04-27 08:00:00', 'update'),
(2, 'Huang Xuxi', '723672', 'Cilandak', '2020-04-27 08:14:09', 'tambah'),
(3, 'Lee Jeno', '382771', 'Buah Batu', '2020-04-27 08:23:24', 'delete'),
(4, 'Huang Xuxi', '723672', 'Cilandak', '2020-04-27 09:08:07', 'update'),
(5, 'Park Jisung', '242526', 'Bojongsoang', '2020-04-27 09:49:47', 'update'),
(6, 'Zhong Chenle', '112233', 'Bojongsoang', '2020-04-28 09:57:01', 'update'),
(7, 'Park Jisung', '242526', 'Buah Batu', '2020-04-28 09:57:10', 'update'),
(8, 'Kim Jungwoo', '283763', 'Cikarang', '2020-04-28 09:57:15', 'update'),
(9, 'Huang Renjun', '678901', 'Kelapa Sawit', '2020-04-28 09:57:21', 'update'),
(10, 'Nana Jaemin', '721888', 'Wonogiri', '2020-04-28 09:57:31', 'update'),
(11, 'Huang Xuxi', '723672', 'Cilandak', '2020-04-28 09:57:37', 'update'),
(12, 'Kim Jungwoo', '283763', 'Cikarang', '2020-04-28 09:57:46', 'update'),
(13, 'ju', '667', 'Jakarta hguyfyu', '2020-04-28 11:29:55', 'tambah'),
(14, 'ju', '667', 'Jakarta hguyfyu', '2020-04-28 11:30:29', 'update'),
(15, 'jug', '667', 'Jakarta hguyfyu', '2020-04-28 11:30:33', 'delete'),
(16, 'Alya', '7787', 'Mangga Dua', '2020-04-28 11:48:57', 'tambah'),
(17, 'Alya', '7787', 'Mangga Dua', '2020-04-28 11:49:24', 'update'),
(18, 'Alya Putri', '7787', 'Mangga Dua', '2020-04-28 11:49:32', 'delete'),
(19, 'Alya', '2427', 'Bojongsoang', '2020-04-28 12:00:56', 'tambah'),
(20, 'Alya', '2427', 'Bojongsoang', '2020-04-28 12:01:23', 'update'),
(21, 'Alya Putri', '2427', 'Bojongsoang', '2020-04-28 12:01:32', 'delete'),
(22, 'Ardhiani Laura', '5744', 'Solo', '2020-05-07 15:53:40', 'tambah'),
(23, 'Ardhiani Laura', '5744', 'Solo', '2020-05-07 15:54:08', 'update'),
(24, 'Ardhiani', '5744', 'Solo', '2020-05-07 15:54:12', 'delete'),
(26, 'Zhong Chenle', '112233', 'Bojongsoang', '2021-03-25 18:42:48', 'delete'),
(27, 'Park Jisung', '242526', 'Buah Batu', '2021-03-25 18:42:50', 'delete'),
(28, 'Kim Jungwoo', '283763', 'Cikarang', '2021-03-25 18:42:53', 'delete'),
(29, 'Huang Renjun', '678901', 'Kelapa Sawit', '2021-03-25 18:42:56', 'delete'),
(30, 'Nana Jaemin', '721888', 'Wonogiri', '2021-03-25 18:42:59', 'delete'),
(31, 'Huang Xuxi', '723672', 'Cilandak', '2021-03-25 18:43:01', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nama_guru` varchar(255) DEFAULT NULL,
  `nik` varchar(11) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nama_guru`, `nik`, `alamat`, `jenis_kelamin`, `no_hp`, `foto`, `admin_id`) VALUES
('Lee Taeyong', '8263727', 'Bojongsoang', 'Laki-laki', '086542667533', 'poto-1.jpg', 3),
('Jung Jaehyun', '88645789', 'Mangga Dua', 'Laki-laki', '08645343456', 'poto-4.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `hubungi_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`identitas_id`, `nama_website`, `alamat`, `email`, `telp`) VALUES
(1, 'SISTEM PENILAIAN SISWA', 'Jl. Maron - Girimarto, Girimarto, Wonogiri, Randujulu, Girimarto, Kabupaten Wonogiri, Jawa Tengah 57683', 'smatonation@gmail.com', '083276718616');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kelas`) VALUES
('BB', '10'),
('IPS 1', '10'),
('IPS 2', '10'),
('MIPA 1', '10'),
('MIPA 2', '10'),
('MIPA 3', '10');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(15) NOT NULL,
  `mapel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `mapel`) VALUES
('BI', 'Bahasa Indonesia'),
('BIng', 'Bahasa Inggris'),
('BJ', 'Bahasa Jawa'),
('MTK', 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `kkm` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kode_mapel` varchar(255) DEFAULT NULL,
  `kode_kelas` varchar(255) DEFAULT NULL,
  `nik` varchar(11) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nis` varchar(20) NOT NULL,
  `tahun_akademik` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `poto` varchar(50) DEFAULT NULL,
  `kode_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `after_siswa_tambah` AFTER INSERT ON `siswa` FOR EACH ROW BEGIN
INSERT INTO dsiswa
SET aksi = 'tambah',
nama_siswa = NEW.nama_siswa,
nis = NEW.nis,
alamat = NEW.alamat,
tgl_ubah = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_siswa_delete` BEFORE DELETE ON `siswa` FOR EACH ROW BEGIN
INSERT INTO dsiswa
SET aksi = 'delete',
nama_siswa = OLD.nama_siswa,
nis = OLD.nis,
alamat = OLD.alamat,
tgl_ubah = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_siswa_update` BEFORE UPDATE ON `siswa` FOR EACH ROW BEGIN
INSERT INTO dsiswa
SET aksi = 'update',
nama_siswa = OLD.nama_siswa,
nis = OLD.nis,
alamat = OLD.alamat,
tgl_ubah = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tentang_sekolah`
--

CREATE TABLE `tentang_sekolah` (
  `tentang_sekolah_id` int(11) NOT NULL,
  `Profil` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang_sekolah`
--

INSERT INTO `tentang_sekolah` (`tentang_sekolah_id`, `Profil`, `visi`, `misi`) VALUES
(1, 'Alamat : Jalan Maron, Girimarto, Wonogiri, Jawa Tengah\r\n\r\nEmail : smagirimarto@yahoo.co.id\r\n\r\nNo Telp : 085100301407', 'Yang dimaksud dengan visi adalah gambaran masa depan yang diinginkan oleh sekolah. Visi merupakan sumber arahan dalam melaksanakan kegiatan belajar mengajar di sekolah agar sekolah dapat menjamin kelangsungan hidup dan perkembangannya. Di SMA NEGERI 1 GIR', 'Yang dimaksud dengan misi adalah tindakan atau usaha untuk mewujudkan / merealisasikan visi yang telah ditentukan. Dengan kata lain bahwa misi adalah bentuk layanan sekolah dalam memenuhi tuntutan yang dituangkan dalam visi. Sedangkan misi di SMA NEGERI 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `dsiswa`
--
ALTER TABLE `dsiswa`
  ADD PRIMARY KEY (`dsiswa_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`hubungi_id`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `nik` (`nik`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `tentang_sekolah`
--
ALTER TABLE `tentang_sekolah`
  ADD PRIMARY KEY (`tentang_sekolah_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dsiswa`
--
ALTER TABLE `dsiswa`
  MODIFY `dsiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `hubungi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tentang_sekolah`
--
ALTER TABLE `tentang_sekolah`
  MODIFY `tentang_sekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `guru` (`nik`),
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
