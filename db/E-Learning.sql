-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2018 at 12:07 PM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `E-Learning`
--
CREATE DATABASE IF NOT EXISTS `E-Learning` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `E-Learning`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` char(40) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `created_on`, `modified_on`) VALUES
(1, 'Joni sanjaya', 'admin@elearning.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2018-10-23 04:38:54', '2018-11-27 01:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(10) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `benar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `jawaban`
--

TRUNCATE TABLE `jawaban`;
--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `jawaban`, `benar`) VALUES
(7, 13, 'jhskjdfhksjdfh', 1),
(8, 13, 'sdjhfksdjhf ', 0),
(9, 13, 'sjdfhskjdfh', 0),
(10, 14, 'jdsfkjsdhf', 0),
(11, 14, 'kjshksjhf', 1),
(12, 14, 'kjsdhgksjh', 0),
(13, 15, 'kjshfkjshdfk', 0),
(14, 15, 'kshdfkshfgb', 0),
(15, 15, 'kshgkhg', 1),
(241, 31, '2', 1),
(242, 31, '11', 0),
(243, 31, '1', 0),
(244, 31, '4', 0),
(245, 31, '-2', 0),
(246, 32, '2', 1),
(247, 32, '0', 0),
(248, 32, '1', 0),
(249, 32, '21', 0),
(250, 32, '12', 0),
(251, 33, '21', 1),
(252, 33, '20', 0),
(253, 33, '1', 0),
(254, 33, '0', 0),
(255, 33, '7', 0),
(256, 34, '2', 0),
(257, 34, '7', 1),
(258, 34, '16', 0),
(259, 34, '61', 0),
(260, 34, '5', 0),
(261, 35, '10', 0),
(262, 35, '1', 0),
(263, 35, '0', 1),
(264, 35, '100', 0),
(265, 35, '3', 0),
(266, 36, '0', 0),
(267, 36, '1', 1),
(268, 36, '7', 0),
(269, 36, '210', 0),
(270, 36, '21', 0),
(271, 37, '-35', 0),
(272, 37, '-5', 0),
(273, 37, '2', 0),
(274, 37, '-2', 1),
(275, 37, '4', 0),
(276, 38, '1.2', 0),
(277, 38, '2', 1),
(278, 38, '12', 0),
(279, 38, '0.2', 0),
(280, 38, '5', 0),
(281, 39, '30', 0),
(282, 39, '21', 0),
(283, 39, '9', 1),
(284, 39, '19', 0),
(285, 39, '90', 0),
(286, 40, '13', 0),
(287, 40, '90', 0),
(288, 40, '14', 1),
(289, 40, '95', 0),
(290, 40, '59', 0),
(291, 41, '50', 0),
(292, 41, '10.05', 0),
(293, 41, '10.5', 0),
(294, 41, '5', 1),
(295, 41, '10', 0),
(296, 42, '10', 0),
(297, 42, '109', 0),
(298, 42, '938', 0),
(299, 42, '1', 1),
(300, 42, '9', 0),
(301, 43, '1', 0),
(302, 43, '20', 0),
(303, 43, '100', 0),
(304, 43, '0', 0),
(305, 43, '-20', 1),
(306, 44, '5', 0),
(307, 44, '3', 0),
(308, 44, '2', 0),
(309, 44, '12', 0),
(310, 44, '10', 1),
(311, 45, '10', 0),
(312, 45, '8', 0),
(313, 45, '7', 0),
(314, 45, '15', 0),
(315, 45, '4*4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id_matpel` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nama_matpel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `matpel`
--

TRUNCATE TABLE `matpel`;
--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id_matpel`, `nama_matpel`) VALUES
(0000000012, 'Matematika'),
(0000000011, 'Pendidikan Agama Islam');

--
-- Triggers `matpel`
--
DELIMITER $$
CREATE TRIGGER `get_id_matpel` AFTER INSERT ON `matpel` FOR EACH ROW BEGIN
DECLARE x INT;
SET x = NEW.id_matpel;
SET @id_matpel = x;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `benar` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `nilai`
--

TRUNCATE TABLE `nilai`;
--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_user`, `id_soal`, `benar`, `salah`, `nilai`, `tanggal`) VALUES
(1, 1, 13, 5, 0, 100, '2018-11-16 08:03:50'),
(2, 1, 13, 5, 0, 100, '2018-11-16 08:12:02'),
(3, 1, 13, 3, 2, 60, '2018-11-23 06:27:39'),
(6, 1, 13, 4, 1, 80, '2018-11-25 05:08:35'),
(7, 1, 13, 4, 1, 80, '2018-11-25 05:08:40'),
(8, 1, 13, 4, 1, 80, '2018-11-25 05:08:41'),
(9, 1, 13, 4, 1, 80, '2018-11-25 05:08:43'),
(10, 1, 13, 5, 0, 100, '2018-11-25 05:08:46'),
(11, 1, 13, 5, 0, 100, '2018-11-25 05:09:46'),
(12, 1, 13, 5, 0, 100, '2018-11-25 05:11:00'),
(13, 1, 11, 1, 0, 100, '2018-11-26 10:20:48'),
(14, 2, 13, 5, 0, 100, '2018-11-27 04:59:48'),
(15, 2, 13, 5, 0, 100, '2018-11-27 05:01:44'),
(16, 2, 13, 5, 0, 100, '2018-11-27 05:02:45'),
(17, 2, 13, 4, 1, 80, '2018-11-27 05:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jenis` enum('easy','medium','hard') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `pertanyaan`
--

TRUNCATE TABLE `pertanyaan`;
--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_soal`, `pertanyaan`, `jenis`) VALUES
(13, 11, 'asdjhaksjdh', 'easy'),
(14, 11, 'jsdhfksjdh', 'medium'),
(15, 11, 'jksvhsljdkhf', 'hard'),
(31, 13, '1 + 1 = ...', 'easy'),
(32, 13, '2*1 = ...', 'medium'),
(33, 13, '21^1 = ...', 'hard'),
(34, 13, '1 + 6 = ...', 'easy'),
(35, 13, '1*0 = ...', 'medium'),
(36, 13, '21^0 = ...', 'hard'),
(37, 13, '3 - 5 = ...', 'easy'),
(38, 13, '4/2 = ...', 'medium'),
(39, 13, '3^3 = ...', 'hard'),
(40, 13, '9 + 5 = ...', 'easy'),
(41, 13, '10*0.5 = ..', 'medium'),
(42, 13, '2^0 = ...', 'hard'),
(43, 13, '-10 + (-10) = ...', 'easy'),
(44, 13, '100/10 = ...', 'medium'),
(45, 13, '4^2 = ..', 'hard');

--
-- Triggers `pertanyaan`
--
DELIMITER $$
CREATE TRIGGER `get_id_pertanyaan` AFTER INSERT ON `pertanyaan` FOR EACH ROW BEGIN
DECLARE x INT;
SET x = NEW.id_pertanyaan;
SET @id_pertanyaan = x;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `nama_soal` varchar(100) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_matpel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `soal`
--

TRUNCATE TABLE `soal`;
--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `nama_soal`, `tanggal_upload`, `tanggal_update`, `id_matpel`) VALUES
(11, 'Korupsi', '2018-11-06 09:03:34', '0000-00-00 00:00:00', 11),
(13, 'Test AI', '2018-11-13 03:28:16', '0000-00-00 00:00:00', 12);

--
-- Triggers `soal`
--
DELIMITER $$
CREATE TRIGGER `get_id_soal` AFTER INSERT ON `soal` FOR EACH ROW BEGIN
DECLARE x INT;
SET x = NEW.id_soal;
SET @id_soal = x;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` char(40) NOT NULL,
  `telepon` char(13) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `telepon`, `jk`, `alamat`, `created_on`, `modified_on`) VALUES
(1, 'Muhammad Bagus Zulmi', 'mbaguszulmi@gmail.com', 'bfd3715e8ca9a78482f8ebf0feba83ea622072bf', '089682056995', 'Laki-Laki', 'Surabaya', '2018-11-23 06:59:22', '2018-11-26 23:41:01'),
(2, 'Muhammad Fajar Ali Shodiq', 'fajarshodiq@gmail.com', '7594c841617c1e7a9d6c0814c16512f85146b2b4', '089765432321', 'Laki-Laki', 'Jl. Candi', '2018-11-27 02:29:15', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id_matpel`),
  ADD UNIQUE KEY `nama_matpel` (`nama_matpel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;
--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id_matpel` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
