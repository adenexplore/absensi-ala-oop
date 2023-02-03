-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 03:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi_rpl`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `query_absen`
-- (See below for the actual view)
--
CREATE TABLE `query_absen` (
`nis` varchar(8)
,`nama` varchar(100)
,`jk` varchar(1)
,`id_rayon` int(2)
,`id_rombel` int(2)
,`foto` varchar(100)
,`tgl_lahir` varchar(10)
,`rayon` varchar(15)
,`rombel` varchar(10)
,`hadir` int(1)
,`sakit` int(1)
,`ijin` int(1)
,`alpa` int(1)
,`tgl_absen` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `query_siswa`
-- (See below for the actual view)
--
CREATE TABLE `query_siswa` (
`nis` varchar(8)
,`nama` varchar(100)
,`jk` varchar(1)
,`id_rayon` int(2)
,`id_rombel` int(2)
,`foto` varchar(100)
,`tgl_lahir` varchar(10)
,`rayon` varchar(15)
,`rombel` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `nis` varchar(8) NOT NULL,
  `hadir` int(1) NOT NULL,
  `sakit` int(1) NOT NULL,
  `ijin` int(1) NOT NULL,
  `alpa` int(1) NOT NULL,
  `tgl_absen` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`nis`, `hadir`, `sakit`, `ijin`, `alpa`, `tgl_absen`) VALUES
('7893274', 0, 1, 0, 0, '2021-09-30'),
('78472839', 0, 1, 0, 0, '2021-09-30'),
('7893274', 1, 0, 0, 0, '2021-10-01'),
('78472839', 1, 0, 0, 0, '2021-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rayon`
--

CREATE TABLE `tbl_rayon` (
  `id_rayon` int(2) NOT NULL,
  `rayon` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rayon`
--

INSERT INTO `tbl_rayon` (`id_rayon`, `rayon`) VALUES
(12, 'cib 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rombel`
--

CREATE TABLE `tbl_rombel` (
  `id_rombel` int(2) NOT NULL,
  `rombel` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rombel`
--

INSERT INTO `tbl_rombel` (`id_rombel`, `rombel`) VALUES
(10, 'rpl XI-3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` varchar(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `id_rayon` int(2) NOT NULL,
  `id_rombel` int(2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama`, `jk`, `id_rayon`, `id_rombel`, `foto`, `tgl_lahir`) VALUES
('98887777', 'Dani', 'L', 12, 10, '20210512_053757.jpg', '01-01-1989'),
('12007623', 'ADEN AHMAD RIFAI', 'L', 1, 1, '20201224_063854.jpg', '22/1/2004');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`) VALUES
('12007623', 'ADEN AHMAD RIFAI');

-- --------------------------------------------------------

--
-- Structure for view `query_absen`
--
DROP TABLE IF EXISTS `query_absen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `query_absen`  AS  select `query_siswa`.`nis` AS `nis`,`query_siswa`.`nama` AS `nama`,`query_siswa`.`jk` AS `jk`,`query_siswa`.`id_rayon` AS `id_rayon`,`query_siswa`.`id_rombel` AS `id_rombel`,`query_siswa`.`foto` AS `foto`,`query_siswa`.`tgl_lahir` AS `tgl_lahir`,`query_siswa`.`rayon` AS `rayon`,`query_siswa`.`rombel` AS `rombel`,`tbl_absen`.`hadir` AS `hadir`,`tbl_absen`.`sakit` AS `sakit`,`tbl_absen`.`ijin` AS `ijin`,`tbl_absen`.`alpa` AS `alpa`,`tbl_absen`.`tgl_absen` AS `tgl_absen` from (`query_siswa` join `tbl_absen` on(`query_siswa`.`nis` = `tbl_absen`.`nis`)) ;

-- --------------------------------------------------------

--
-- Structure for view `query_siswa`
--
DROP TABLE IF EXISTS `query_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `query_siswa`  AS  select `tbl_siswa`.`nis` AS `nis`,`tbl_siswa`.`nama` AS `nama`,`tbl_siswa`.`jk` AS `jk`,`tbl_siswa`.`id_rayon` AS `id_rayon`,`tbl_siswa`.`id_rombel` AS `id_rombel`,`tbl_siswa`.`foto` AS `foto`,`tbl_siswa`.`tgl_lahir` AS `tgl_lahir`,`tbl_rayon`.`rayon` AS `rayon`,`tbl_rombel`.`rombel` AS `rombel` from ((`tbl_siswa` join `tbl_rayon` on(`tbl_siswa`.`id_rayon` = `tbl_rayon`.`id_rayon`)) join `tbl_rombel` on(`tbl_siswa`.`id_rombel` = `tbl_rombel`.`id_rombel`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_rayon`
--
ALTER TABLE `tbl_rayon`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Indexes for table `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_rayon`
--
ALTER TABLE `tbl_rayon`
  MODIFY `id_rayon` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  MODIFY `id_rombel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
