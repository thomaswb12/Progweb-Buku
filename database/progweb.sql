-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 06:17 PM
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
('DD000001', 'Naruto Vol. 42', '2018-04-20', 56, 500, 'Soft', 'Kehidupan Naruto sebagai Genin pun dimulai dengan terbentuknya Tim 7 yang beranggotakan Naruto, Sasuke Uchiha dan Sakura Haruno, dengan Kakashi Hatake sebagai guru mereka. Saat menjalankan tes dengan Kakashi, Naruto, Sasuke dan Sakura nyaris tidak lulus. Karena melihat kekompakan tim antara Naruto dan Sasuke maka Kakashi pun meluluskan mereka, dengan alasan yang pernah dikatakan temannya yaitu Obito dari klan Uchiha, \"Orang yang tidak taat pada peraturan adalah sampah tetapi orang yang membiarkan temannya menderita lebih hina daripada sampah!\" Misi Naruto dan kawan-kawan dimulai, yaitu melindungi Tazuna dan arsitek lainnya selama pembangunan jembatan di negeri Air berlangsung. Naruto, Sakura, Sasuke dan Kakashi berhadapan dengan dua ninja kuat pelarian dari negeri kabut yaitu Haku dan Zabuza yang dikirim oleh seorang gangster kaya raya untuk menghentikan pembangunan jembatan oleh penduduk negeri Air yang miskin. Pertarungan sengit terjadi, Haku hendak menyerang Naruto tetapi malah terkena Sasuke yang melindungi Naruto. Mengira Sasuke tewas, Naruto marah serta segel chakra Kyuubi terbuka, sehingga chakra merah pun keluar membuat Haku kewalahan. Kakashi yang hendak menghabisi Zabuza dengan jurus Raikiri mengenai Haku yang melindungi Zabuza. Karena terharu atas pengorbanan Haku dan merasa dikhianati oleh pihak gangster yang malah mencoba membunuhnya, Zabuza pun mengamuk dan membunuh ketua gangster dengan kunai kecil di mulutnya.', 8, 15, 15, 'AA000001', 'BB000001', 'remaja', 'CC000001', 2, 'images\\buku\\Naruto_Volume_42_Indonesia.jpg', 0, 'Ya'),
('DD000002', 'Naruto Vol. 4', '2018-05-01', 50, 100, 'Soft', 'Sasuke gugur saat melindungi Naruto…!! Saat itu, terjadi keanehan pada diri Naurto!! Haku yang terkena pukulan kemarahan pun menyadari hal tersebut. Sementara itu, pertarungan antara Zabuza vs Kakashi semakin sengit, siapakah yang menang? Inilah babak akhir dari pergolakan di Negara Nami!!\r\n', 8, 15, 2512, 'AA000001', 'BB000001', 'remaja', 'CC000001', 0, 'images\\buku\\Naruto_Volume_4_Indonesia.jpg', 0, 'Tidak'),
('DD000003', 'Doraemon Vol. 2', '2018-04-03', 50, 50, 'Soft', '\r\nKumpulan cerita tentang Nilai Nol dan Pergi dari Rumah\r\n', 8, 15, 1, 'AA000001', 'BB000001', 'anak-anak', 'CC000002', 4, 'images\\buku\\Doraemon_Volume_2_Indonesia.jpg', 3, 'Ya');

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
-- Table structure for table `detailpengembalian`
--

CREATE TABLE `detailpengembalian` (
  `idEksBuku` char(16) NOT NULL,
  `harga` double NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date DEFAULT NULL,
  `tanggalAturanKembali` date DEFAULT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `idTransaksi` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailpengembalian`
--

INSERT INTO `detailpengembalian` (`idEksBuku`, `harga`, `tanggalPinjam`, `tanggalKembali`, `tanggalAturanKembali`, `denda`, `idTransaksi`) VALUES
('asd', 8000, '2018-05-08', '2018-05-08', '2018-05-15', 0, 'P000001'),
('asd', 8000, '2018-05-08', '2018-05-08', '2018-05-15', 0, 'P000002'),
('asd', 8000, '2018-05-08', '2018-05-08', '2018-05-15', 0, 'P000003'),
('asde', 8000, '2018-05-08', '2018-05-08', '2018-05-15', 0, 'P000003'),
('asd', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000004'),
('asde', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000004'),
('asd', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000005'),
('asd', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000006'),
('asde', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000006'),
('asd', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000007'),
('asde', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000008'),
('asd', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000009'),
('asde', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000010'),
('asd', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000011'),
('asde', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000011'),
('asd', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000012'),
('asde', 8000, '2018-05-11', '2018-05-11', '2018-05-18', 0, 'P000013'),
('asd', 8000, '2018-05-11', '2018-05-20', '2018-05-18', 1000, 'P000014');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `idEksBuku` char(16) NOT NULL,
  `harga` double NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date DEFAULT NULL,
  `tanggalAturanKembali` date DEFAULT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `idTransaksi` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`idEksBuku`, `harga`, `tanggalPinjam`, `tanggalKembali`, `tanggalAturanKembali`, `denda`, `idTransaksi`) VALUES
('asd', 8000, '2018-05-08', NULL, '2018-05-15', 0, 'T000001'),
('asd', 8000, '2018-05-08', NULL, '2018-05-15', 0, 'T000002'),
('asd', 8000, '2018-05-08', NULL, '2018-05-15', 0, 'T000003'),
('asde', 8000, '2018-05-08', NULL, '2018-05-15', 0, 'T000003'),
('asd', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000004'),
('asde', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000004'),
('asd', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000005'),
('asd', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000006'),
('asde', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000006'),
('asd', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000007'),
('asde', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000008'),
('asd', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000009'),
('asde', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000010'),
('asd', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000011'),
('asde', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000011'),
('asd', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000012'),
('asde', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000013'),
('asd', 8000, '2018-05-11', NULL, '2018-05-18', 0, 'T000014'),
('asde', 8000, '2018-05-14', NULL, '2018-05-21', 0, 'T000015'),
('DD000003KK000001', 5000, '2018-05-14', NULL, '2018-05-21', 0, 'T000017');

--
-- Triggers `detailtransaksi`
--
DELIMITER $$
CREATE TRIGGER `Insert_eksBuku` AFTER INSERT ON `detailtransaksi` FOR EACH ROW BEGIN

	update eksbuku set Status = "Dipinjam" where idEksBuku = NEW.idEksBuku;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dummydetailpengembalian`
--

CREATE TABLE `dummydetailpengembalian` (
  `idEksBuku` char(16) NOT NULL,
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
  `idEksBuku` char(16) NOT NULL,
  `harga` double NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date DEFAULT NULL,
  `tanggalAturanKembali` date DEFAULT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `idTransaksi` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dummypengembalian`
--

CREATE TABLE `dummypengembalian` (
  `idTransaksi` char(16) NOT NULL,
  `tanggalTransaksi` datetime NOT NULL,
  `idMember` char(8) NOT NULL,
  `idKaryawan` char(8) NOT NULL,
  `totalDenda` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dummytransaksi`
--

CREATE TABLE `dummytransaksi` (
  `idTransaksi` char(16) NOT NULL,
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
('asde', 'DD000001', 'Dipinjam', '2018-04-21'),
('DD000003KK000001', 'DD000003', 'Dipinjam', '2018-05-13'),
('DD000003KK000002', 'DD000003', 'Tersedia', '2018-05-14'),
('DD000003KK000003', 'DD000003', 'Tersedia', '2018-05-14'),
('DD000003KK000004', 'DD000003', 'Tersedia', '2018-05-14');

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
    DECLARE P2 INT;
    SELECT COUNT(eksbuku.idEksBuku) INTO P1 FROM eksbuku WHERE idBuku=NEW.idBuku AND eksbuku.Status = "Tersedia";
    IF(NEW.Status = "Dipinjam") then 
    	SELECT b.DiPinjam INTO P2 FROM eksbuku as e, buku as b WHERE e.idBuku = b.idBuku and e.idEksbuku = NEW.idEksbuku and NEW.Status = "Dipinjam";
	    UPDATE buku set buku.Available = P1,buku.DiPinjam = (P2+1) WHERE buku.idBuku = NEW.idBuku;    	
    END IF;
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

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idGenre`, `namaGenre`) VALUES
('GG000001', 'Action'),
('GG000002', 'Romance'),
('GG000003', 'Fantasi'),
('GG000004', 'Comedy'),
('GG000005', 'Thriller'),
('GG000006', 'Horor'),
('GG000007', 'Sci-Fi');

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
  `gaji` double DEFAULT '0',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatankaryawan`
--

INSERT INTO `jabatankaryawan` (`idJabatan`, `namaJabatan`, `gaji`, `keterangan`) VALUES
('HRDD', 'HRD', 8500000, 'HRD mengurusi bagian kepegawaian beserta jabatannya'),
('KSRR', 'Kasir', 5000000, 'Melayani member dalam transaksi dan pendaftaran member'),
('MNGR', 'Manager', 9000000, 'Manager mengurusi bagian daftar peminjaman dan laporan keuangan');

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
('HRDD0001', 'Dika Adrianus', 'dika@gmail.com', '082766478882', 'HRDD', 'dda29d2a069f67bfaa0f505b7bc837c0181b39888926a126e9d707828d12b4b4', ''),
('KSRR0001', 'Kirana amarinda', 'kirana@ti.ukdw.ac.id', '087874532112', 'KSRR', '2678cc3e16e93cf29052a41193271b5ecf05d9c6cebe7b42288652d65458a457', ''),
('MNGR0001', 'Anna Melianna', 'anna@gmail.com', '085763828029', 'MNGR', '55579b557896d0ce1764c47fed644f9b35f58bad620674af23f356d80ed0c503', '');

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
('M000001', 'Thomas Widiarya', 'asdsa', '2018-05-23', '0', '123456789789', '1234567897894561', 'Wanita', 'asdasd@gmail.com'),
('M000002', 'Sylvia Putri R. G.', 'ahgshgnnj', '1998-02-07', '0', '085828763665', '3300101010', 'Wanita', 'sylvia@gmail.com'),
('M000003', 'Resha Tepozz', 'paling tepoz', '2018-05-05', '0', '085828763665', '123', 'Pria', 'tepoz@gmail.com');

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
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `idTransaksi` char(16) NOT NULL,
  `tanggalTransaksi` datetime NOT NULL,
  `idMember` char(8) NOT NULL,
  `idKaryawan` char(8) NOT NULL,
  `totalDenda` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`idTransaksi`, `tanggalTransaksi`, `idMember`, `idKaryawan`, `totalDenda`) VALUES
('P000001', '2018-05-08 00:00:00', 'M000001', 'KSRR0001', 0),
('P000002', '2018-05-08 00:01:00', 'M000001', 'KSRR0001', 0),
('P000003', '2018-05-08 00:02:00', 'M000001', 'KSRR0001', 0),
('P000004', '2018-05-11 00:02:00', 'M000001', 'KSRR0001', 0),
('P000005', '2018-05-11 00:03:00', 'M000001', 'KSRR0001', 0),
('P000006', '2018-05-11 00:04:00', 'M000001', 'KSRR0001', 0),
('P000007', '2018-05-11 00:07:00', 'M000001', 'KSRR0001', 0),
('P000008', '2018-05-11 00:08:00', 'M000001', 'KSRR0001', 0),
('P000009', '2018-05-11 00:09:00', 'M000001', 'KSRR0001', 0),
('P000010', '2018-05-11 00:10:00', 'M000001', 'KSRR0001', 0),
('P000011', '2018-05-11 00:11:00', 'M000001', 'KSRR0001', 0),
('P000012', '2018-05-11 00:12:00', 'M000001', 'KSRR0001', 0),
('P000013', '2018-05-11 00:13:00', 'M000001', 'KSRR0001', 0),
('P000014', '2018-05-11 00:14:00', 'M000001', 'KSRR0001', 1000);

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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `tanggalTransaksi`, `idMember`, `idKaryawan`, `total`) VALUES
('T000001', '2018-05-08 00:09:20', 'm000001', 'KSRR0001', 8000),
('T000002', '2018-05-08 00:11:42', 'm000001', 'KSRR0001', 8000),
('T000003', '2018-05-08 00:27:32', 'm000001', 'KSRR0001', 16000),
('T000004', '2018-05-11 00:01:32', 'm000001', 'KSRR0001', 16000),
('T000005', '2018-05-11 00:27:00', 'm000001', 'KSRR0001', 8000),
('T000006', '2018-05-11 00:29:01', 'm000001', 'KSRR0001', 16000),
('T000007', '2018-05-11 00:31:34', 'm000001', 'KSRR0001', 8000),
('T000008', '2018-05-11 00:31:55', 'm000001', 'KSRR0001', 8000),
('T000009', '2018-05-11 00:33:16', 'm000001', 'KSRR0001', 8000),
('T000010', '2018-05-11 00:34:20', 'm000001', 'KSRR0001', 8000),
('T000011', '2018-05-11 00:36:03', 'm000001', 'KSRR0001', 16000),
('T000012', '2018-05-11 00:37:28', 'm000001', 'KSRR0001', 8000),
('T000013', '2018-05-11 00:44:43', 'm000001', 'KSRR0001', 8000),
('T000014', '2018-05-11 00:48:05', 'm000001', 'KSRR0001', 8000),
('T000015', '2018-05-14 15:24:07', 'm000001', 'KSRR0001', 8000),
('T000017', '2018-05-14 23:16:05', 'M000002', 'KSRR0001', 5000);

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
-- Indexes for table `detailpengembalian`
--
ALTER TABLE `detailpengembalian`
  ADD KEY `fk_pengembaian_ideksBuku` (`idEksBuku`),
  ADD KEY `fk_foreign_idtransPengembalian` (`idTransaksi`);

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
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `fk_pegawai` (`idKaryawan`),
  ADD KEY `fk_foreign_memberPengembalian` (`idMember`);

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
-- Constraints for table `detailpengembalian`
--
ALTER TABLE `detailpengembalian`
  ADD CONSTRAINT `fk_foreign_idtransPengembalian` FOREIGN KEY (`idTransaksi`) REFERENCES `pengembalian` (`idTransaksi`),
  ADD CONSTRAINT `fk_pengembaian_ideksBuku` FOREIGN KEY (`idEksBuku`) REFERENCES `eksbuku` (`idEksBuku`);

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `FK_idTran` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`),
  ADD CONSTRAINT `fk_foreign_ideksbuku` FOREIGN KEY (`idEksBuku`) REFERENCES `eksbuku` (`idEksBuku`);

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
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `fk_foreign_memberPengembalian` FOREIGN KEY (`idMember`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`idKaryawan`);

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
