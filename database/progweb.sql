-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2018 at 08:52 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idBuku` char(8) NOT NULL,
  `judulBuku` varchar(255) NOT NULL,
  `tanggalTerbit` date NOT NULL,
  `jumlahHalaman` int(11) NOT NULL,
  `beratBuku` double NOT NULL,
  `jenisCover` enum('Soft','Hard') DEFAULT NULL,
  `sinopsis` text NOT NULL,
  `panjang` double NOT NULL,
  `lebar` double NOT NULL,
  `Dipinjam` int(11) NOT NULL DEFAULT '0',
  `idPenerbit` char(8) NOT NULL,
  `idPenulis` char(8) NOT NULL,
  `Rating` enum('anak-anak','remaja','dewasa','semua umur') NOT NULL,
  `idRak` char(8) NOT NULL,
  `jumlahEksemplar` int(11) NOT NULL DEFAULT '0',
  `Location` text NOT NULL,
  `Available` int(11) NOT NULL DEFAULT '0',
  `specialEdition` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idBuku`, `judulBuku`, `tanggalTerbit`, `jumlahHalaman`, `beratBuku`, `jenisCover`, `sinopsis`, `panjang`, `lebar`, `Dipinjam`, `idPenerbit`, `idPenulis`, `Rating`, `idRak`, `jumlahEksemplar`, `Location`, `Available`, `specialEdition`) VALUES
('DD000001', 'Naruto Vol. 42', '2018-04-20', 56, 500, 'Soft', 'Kehidupan Naruto sebagai Genin pun dimulai dengan terbentuknya Tim 7 yang beranggotakan Naruto, Sasuke Uchiha dan Sakura Haruno, dengan Kakashi Hatake sebagai guru mereka. Saat menjalankan tes dengan Kakashi, Naruto, Sasuke dan Sakura nyaris tidak lulus. Karena melihat kekompakan tim antara Naruto dan Sasuke maka Kakashi pun meluluskan mereka, dengan alasan yang pernah dikatakan temannya yaitu Obito dari klan Uchiha, \"Orang yang tidak taat pada peraturan adalah sampah tetapi orang yang membiarkan temannya menderita lebih hina daripada sampah!\" Misi Naruto dan kawan-kawan dimulai, yaitu melindungi Tazuna dan arsitek lainnya selama pembangunan jembatan di negeri Air berlangsung. Naruto, Sakura, Sasuke dan Kakashi berhadapan dengan dua ninja kuat pelarian dari negeri kabut yaitu Haku dan Zabuza yang dikirim oleh seorang gangster kaya raya untuk menghentikan pembangunan jembatan oleh penduduk negeri Air yang miskin. Pertarungan sengit terjadi, Haku hendak menyerang Naruto tetapi malah terkena Sasuke yang melindungi Naruto. Mengira Sasuke tewas, Naruto marah serta segel chakra Kyuubi terbuka, sehingga chakra merah pun keluar membuat Haku kewalahan. Kakashi yang hendak menghabisi Zabuza dengan jurus Raikiri mengenai Haku yang melindungi Zabuza. Karena terharu atas pengorbanan Haku dan merasa dikhianati oleh pihak gangster yang malah mencoba membunuhnya, Zabuza pun mengamuk dan membunuh ketua gangster dengan kunai kecil di mulutnya.', 8, 15, 27340, 'AA000001', 'BB000001', 'remaja', 'CC000001', 2, 'images\\buku\\Naruto_Volume_42_Indonesia.jpg', 0, 'Ya'),
('DD000002', 'Naruto Vol. 4', '2018-05-01', 50, 100, 'Soft', 'Sasuke gugur saat melindungi Naruto…!! Saat itu, terjadi keanehan pada diri Naurto!! Haku yang terkena pukulan kemarahan pun menyadari hal tersebut. Sementara itu, pertarungan antara Zabuza vs Kakashi semakin sengit, siapakah yang menang? Inilah babak akhir dari pergolakan di Negara Nami!!\r\n', 8, 15, 2512, 'AA000001', 'BB000001', 'remaja', 'CC000001', 0, 'images\\buku\\Naruto_Volume_4_Indonesia.jpg', 0, 'Tidak'),
('DD000003', 'Doraemon Vol. 2', '2018-04-03', 50, 50, 'Soft', '\r\nKumpulan cerita tentang Nilai Nol dan Pergi dari Rumah\r\n', 8, 15, 0, 'AA000001', 'BB000001', 'anak-anak', 'CC000002', 0, 'images\\buku\\Doraemon_Volume_2_Indonesia.jpg', 0, 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `contoh`
--

CREATE TABLE `contoh` (
  `idbuku` char(8) NOT NULL,
  `ideks` char(16) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contoh`
--

INSERT INTO `contoh` (`idbuku`, `ideks`, `total`) VALUES
('DD000001', 'asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `idEksBuku` char(8) NOT NULL,
  `harga` double NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date DEFAULT NULL,
  `tanggalAturanKembali` date DEFAULT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `idTransaksi` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dummydetailtransaksi`
--

CREATE TABLE `dummydetailtransaksi` (
  `idEksBuku` char(8) NOT NULL,
  `harga` double NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date DEFAULT NULL,
  `tanggalAturanKembali` date DEFAULT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `idTransaksi` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummydetailtransaksi`
--

INSERT INTO `dummydetailtransaksi` (`idEksBuku`, `harga`, `tanggalPinjam`, `tanggalKembali`, `tanggalAturanKembali`, `denda`, `idTransaksi`) VALUES
('asde', 0, '2018-05-06', NULL, '2018-05-13', 0, 'T000001');

--
-- Triggers `dummydetailtransaksi`
--
DELIMITER $$
CREATE TRIGGER `DELETE_TABLE` AFTER DELETE ON `dummydetailtransaksi` FOR EACH ROW BEGIN
    UPDATE buku set eksbuku.Status = "Tersedia" WHERE 		eksbuku.idEksBuku = OLD.idEksBuku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `INSERT_BARU` AFTER INSERT ON `dummydetailtransaksi` FOR EACH ROW BEGIN
    UPDATE eksbuku set eksbuku.Status = "Dipinjam" WHERE eksbuku.idEksBuku = NEW.idEksBuku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dummytransaksi`
--

CREATE TABLE `dummytransaksi` (
  `idTransaksi` char(8) NOT NULL,
  `tanggalTransaksi` datetime NOT NULL,
  `idMember` char(8) NOT NULL,
  `idKaryawan` char(8) NOT NULL,
  `total` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eksbuku`
--

CREATE TABLE `eksbuku` (
  `idEksBuku` char(16) NOT NULL,
  `idBuku` char(8) NOT NULL,
  `Status` enum('Tersedia','Dipinjam') DEFAULT 'Tersedia',
  `tanggalTiba` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eksbuku`
--

INSERT INTO `eksbuku` (`idEksBuku`, `idBuku`, `Status`, `tanggalTiba`) VALUES
('asd', 'DD000001', 'Dipinjam', '2018-04-21'),
('asde', 'DD000001', 'Dipinjam', '2018-04-21');

--
-- Triggers `eksbuku`
--
DELIMITER $$
CREATE TRIGGER `triger_after_delete` AFTER DELETE ON `eksbuku` FOR EACH ROW BEGIN
	DECLARE P1 INT;
    DECLARE P2 INT;
    SELECT COUNT(eksbuku.idEksBuku) INTO P1 FROM eksbuku WHERE idBuku = OLD.idBuku;
    SELECT COUNT(eksbuku.idEksBuku) INTO P2 FROM eksbuku WHERE idBuku = OLD.idBuku AND eksbuku.Status = "Tersedia";
    UPDATE buku set buku.jumlahEksemplar = p1, buku.Available = p2  WHERE buku.idBuku = OLD.idBuku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `triger_after_insert` AFTER INSERT ON `eksbuku` FOR EACH ROW BEGIN
	DECLARE P1 INT;
    SELECT COUNT(eksbuku.idEksBuku) INTO P1 FROM eksbuku WHERE idBuku=NEW.idBuku;
    UPDATE buku set buku.jumlahEksemplar = p1 WHERE buku.idBuku = NEW.idBuku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `triger_after_update` AFTER UPDATE ON `eksbuku` FOR EACH ROW BEGIN
	DECLARE P1 INT;
    SELECT COUNT(eksbuku.idEksBuku) INTO P1 FROM eksbuku WHERE idBuku=NEW.idBuku AND eksbuku.Status = "Tersedia";
    UPDATE buku set buku.Available = p1 WHERE buku.idBuku = NEW.idBuku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `idGenre` char(8) NOT NULL,
  `namaGenre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genrebuku`
--

CREATE TABLE `genrebuku` (
  `id GenreBuku` char(8) NOT NULL,
  `idGenre` char(8) NOT NULL,
  `idBuku` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatankaryawan`
--

CREATE TABLE `jabatankaryawan` (
  `idJabatan` char(4) NOT NULL,
  `namaJabatan` varchar(50) NOT NULL,
  `gaji` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatankaryawan`
--

INSERT INTO `jabatankaryawan` (`idJabatan`, `namaJabatan`, `gaji`) VALUES
('KSRR', 'Kasir', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` char(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `noTelp` varchar(12) NOT NULL,
  `idJabatan` char(4) NOT NULL,
  `pass` char(64) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `nama`, `email`, `noTelp`, `idJabatan`, `pass`, `foto`) VALUES
('KSRR0001', 'Kirana amarinda', 'kirana@ti.ukdw.ac.id', '087874532112', 'KSRR', '2678cc3e16e93cf29052a41193271b5ecf05d9c6cebe7b42288652d65458a457', '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` char(8) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `birtday` date NOT NULL,
  `saldo` decimal(10,0) DEFAULT '0',
  `noTelp` char(12) NOT NULL,
  `idIdentitas` char(16) NOT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `alamat`, `birtday`, `saldo`, `noTelp`, `idIdentitas`, `gender`, `email`) VALUES
('M000001', 'Thomas Widiarya', 'asdsa', '2018-05-23', '0', '123456789789', '1234567897894561', 'Pria', 'asdasd@gmail.com'),
('M000002', 'Sylvia Putri R. G.', 'ahgshg', '1998-02-07', '0', '085828763665', '3300101010', 'Wanita', 'sylvia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `idPenerbit` char(8) NOT NULL,
  `NamaPenerbit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`idPenerbit`, `NamaPenerbit`) VALUES
('AA000001', 'GRAMEDIA');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `idPenulis` char(8) NOT NULL,
  `namaPenulis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`idPenulis`, `namaPenulis`) VALUES
('BB000001', 'Masashi Kishimoto');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `idRak` char(8) NOT NULL,
  `namaRak` varchar(100) NOT NULL,
  `tanggalRak` date NOT NULL,
  `Abjad` enum('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`idRak`, `namaRak`, `tanggalRak`, `Abjad`) VALUES
('CC000001', 'N1', '2018-04-22', 'N'),
('CC000002', 'D1', '2018-05-03', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` char(8) NOT NULL,
  `tanggalTransaksi` datetime NOT NULL,
  `idMember` char(8) NOT NULL,
  `idKaryawan` char(8) NOT NULL,
  `total` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idBuku`),
  ADD KEY `fk_buku1` (`idPenerbit`),
  ADD KEY `fk_buku2` (`idPenulis`),
  ADD KEY `fk_buku3` (`idRak`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD KEY `FK_Det2` (`idEksBuku`),
  ADD KEY `FK_DET3` (`idTransaksi`);

--
-- Indexes for table `eksbuku`
--
ALTER TABLE `eksbuku`
  ADD PRIMARY KEY (`idEksBuku`),
  ADD KEY `FK_eks1` (`idBuku`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`);

--
-- Indexes for table `genrebuku`
--
ALTER TABLE `genrebuku`
  ADD PRIMARY KEY (`idGenre`,`idBuku`,`id GenreBuku`) USING BTREE,
  ADD KEY `FK_genn2` (`idBuku`);

--
-- Indexes for table `jabatankaryawan`
--
ALTER TABLE `jabatankaryawan`
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`),
  ADD KEY `FK_Karyawan` (`idJabatan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`idPenerbit`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`idPenulis`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`idRak`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `FK_1` (`idMember`),
  ADD KEY `FK_2` (`idKaryawan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku1` FOREIGN KEY (`idPenerbit`) REFERENCES `penerbit` (`idPenerbit`),
  ADD CONSTRAINT `fk_buku2` FOREIGN KEY (`idPenulis`) REFERENCES `penulis` (`idPenulis`),
  ADD CONSTRAINT `fk_buku3` FOREIGN KEY (`idRak`) REFERENCES `rak` (`idRak`);

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `FK_Det2` FOREIGN KEY (`idEksBuku`) REFERENCES `eksbuku` (`idEksBuku`),
  ADD CONSTRAINT `FK_idTran` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`);

--
-- Constraints for table `eksbuku`
--
ALTER TABLE `eksbuku`
  ADD CONSTRAINT `FK_eks1` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`);

--
-- Constraints for table `genrebuku`
--
ALTER TABLE `genrebuku`
  ADD CONSTRAINT `FK_genn1` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `FK_genn2` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_Karyawan` FOREIGN KEY (`idJabatan`) REFERENCES `jabatankaryawan` (`idJabatan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`idMember`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`idKaryawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
