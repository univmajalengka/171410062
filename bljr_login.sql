-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 11:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bljr_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nim` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL COMMENT 'jenis kelamin',
  `prodi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`) VALUES
(1110010, 'vani', 'Ambon', '2019-05-02', 'P', 'Pertanian'),
(1110011, 'Gugun', 'Majalengka', '2019-05-01', 'L', 'Hukum'),
(1110012, 'Bebe', 'Majalengka', '1998-05-01', 'P', 'Avionic'),
(1110014, 'Naga', 'Medan', '1998-04-06', 'L', 'Informatika'),
(1110015, 'Jaka', 'Bandung', '1997-03-08', '', 'Mesin'),
(1110016, 'Sri', 'Sumedang', '1998-07-09', 'P', 'Informatika'),
(1110017, 'Dudung', 'Sumedang', '1998-05-06', 'L', 'Mesin'),
(1110018, 'Wiro', 'Jawa Tengah', '1997-04-02', 'L', 'Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `rak_buku` enum('rak1','rak2','rak3') NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `rak_buku`, `tgl_input`) VALUES
(1, 'Game', 'tantan', 'Informatika', '2018', '65786980826325', 3, 'rak1', '2019-05-13'),
(2, 'No Life', 'Ibnu', 'Gudang gading', '2014', '6332379900655', 4, 'rak2', '2019-05-01'),
(3, 'Mario', 'Dede', 'example', '2010', '988767653', 2, 'rak1', '2019-05-03'),
(4, 'Panduan Masak', 'Chef Juna', 'Masterchef', '2015', '6544532829387', 3, 'rak2', '2019-05-02'),
(5, 'Wiro sableng', 'Rahasia', 'Rahasia', '2015', '7866989076754', 6, 'rak2', '2019-06-03');

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_pinjam`
-- (See below for the actual view)
--
CREATE TABLE `data_pinjam` (
`tgl_pinjam` date
,`tgl_kembali` date
,`total_buku` int(4)
,`status` int(1)
,`nim` int(11)
,`id_pinjam` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `Status` enum('L','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `denda`, `Status`) VALUES
(1, 1000, 'L'),
(2, 2000, 'T'),
(3, 1000, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `terlambat` int(2) NOT NULL,
  `id_denda` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kembali`
--

INSERT INTO `kembali` (`id_kembali`, `id_pinjam`, `tgl_kembali`, `terlambat`, `id_denda`, `denda`) VALUES
(1, 2, '2019-06-03', 2, 2, 2000),
(2, 1, '2019-05-30', 1, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `nim` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_buku` int(4) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=belum kembali 2=sudah dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `tgl_pinjam`, `nim`, `tgl_kembali`, `total_buku`, `status`) VALUES
(1, '2019-05-27', 1110010, '2019-05-29', 2, 1),
(2, '2019-05-29', 1110011, '2019-05-31', 1, 1),
(3, '2019-06-01', 1110012, '2019-06-04', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'Asep', 'asep9@gmail.com', 'default.jpg', '$2y$10$7kqAox.35w7HYbi7XHTNTeD2G3PGMt0fO4igYXyxYJH6TbuDwD7/C', 2, 1, 1556881174),
(9, 'jaja', 'jajamiharja7@gmail.com', 'default.jpg', '$2y$10$3Xw0GfUHaFXj8TdgTcNAeeu97Oa6XzoaOhYcgXCKE24IyWGvmg/zO', 2, 1, 1556892381),
(10, 'admin', 'admin1@gmail.com', 'default.jpg', '$2y$10$CqtbxHG7HpVt5eFUybpHKuNLQPVV.cF.8CXBqKMaODTCfHGthujQ2', 2, 1, 1561036054);

-- --------------------------------------------------------

--
-- Structure for view `data_pinjam`
--
DROP TABLE IF EXISTS `data_pinjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_pinjam`  AS  select `pinjam`.`tgl_pinjam` AS `tgl_pinjam`,`pinjam`.`tgl_kembali` AS `tgl_kembali`,`pinjam`.`total_buku` AS `total_buku`,`pinjam`.`status` AS `status`,`anggota`.`nim` AS `nim`,`kembali`.`id_pinjam` AS `id_pinjam` from ((`pinjam` join `anggota` on((`anggota`.`nim` = `pinjam`.`nim`))) join `kembali` on((`kembali`.`id_pinjam` = `pinjam`.`id_pinjam`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_pinjam` (`id_pinjam`),
  ADD KEY `id_denda` (`id_denda`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110019;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kembali`
--
ALTER TABLE `kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kembali`
--
ALTER TABLE `kembali`
  ADD CONSTRAINT `kembali_ibfk_1` FOREIGN KEY (`id_denda`) REFERENCES `denda` (`id_denda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kembali_ibfk_2` FOREIGN KEY (`id_pinjam`) REFERENCES `pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `anggota` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
