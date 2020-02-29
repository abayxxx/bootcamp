-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 29, 2020 at 05:23 PM
-- Server version: 5.6.38
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `provkab`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten_tb`
--

CREATE TABLE `kabupaten_tb` (
  `id_kab` int(11) NOT NULL,
  `nama_kab` varchar(255) NOT NULL,
  `prov_id` int(11) NOT NULL,
  `kab_resmi` date NOT NULL,
  `photo_kab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabupaten_tb`
--

INSERT INTO `kabupaten_tb` (`id_kab`, `nama_kab`, `prov_id`, `kab_resmi`, `photo_kab`) VALUES
(5, 'Kabupaten Aceh Barat Daya', 5, '2002-04-10', '5e5a623110e96.png'),
(6, 'Bandung Barat', 8, '2007-01-02', '5e5a71f2ad239.png');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi_tb`
--

CREATE TABLE `provinsi_tb` (
  `id_prov` int(11) NOT NULL,
  `nama_prov` varchar(255) NOT NULL,
  `prov_resmi` date NOT NULL,
  `photo_prov` varchar(255) NOT NULL,
  `pulau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinsi_tb`
--

INSERT INTO `provinsi_tb` (`id_prov`, `nama_prov`, `prov_resmi`, `photo_prov`, `pulau`) VALUES
(5, 'Aceh', '1959-02-07', '5e5a705300229.png', 'Sumatra'),
(6, 'Bengkulu', '1968-11-18', '5e5a5f2ad027f.png', 'Sumatra'),
(7, 'Jakarta', '1961-08-28', '5e5a6009e73d5.png', 'Jawa'),
(8, 'Jawa Barat', '1950-07-04', '5e5a60736e88d.png', 'Jawa'),
(9, 'Kalimantan Barat', '1956-12-07', '5e5a60c60a673.png', 'Kalimantan'),
(10, 'Kalimantan Tengah', '1958-07-02', '5e5a61202485d.png', 'Kalimantan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabupaten_tb`
--
ALTER TABLE `kabupaten_tb`
  ADD PRIMARY KEY (`id_kab`),
  ADD KEY `kabupaten_tb` (`prov_id`);

--
-- Indexes for table `provinsi_tb`
--
ALTER TABLE `provinsi_tb`
  ADD PRIMARY KEY (`id_prov`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabupaten_tb`
--
ALTER TABLE `kabupaten_tb`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinsi_tb`
--
ALTER TABLE `provinsi_tb`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabupaten_tb`
--
ALTER TABLE `kabupaten_tb`
  ADD CONSTRAINT `kabupaten_tb` FOREIGN KEY (`prov_id`) REFERENCES `provinsi_tb` (`id_prov`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
