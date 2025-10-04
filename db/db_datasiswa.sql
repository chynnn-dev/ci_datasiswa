-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2025 at 01:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_datasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `NIS` int NOT NULL,
  `nama` varchar(75) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tahun_masuk` year NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `status` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`NIS`, `nama`, `jurusan`, `alamat`, `tahun_masuk`, `asal_sekolah`, `no_telepon`, `status`, `foto`) VALUES
(240105064, 'Vania Putri Rahayu', 'Teknik Informatika', 'Kebumen', 2024, 'SMAN 1 Gombong', '081435481657', 'Mahasiswa', 'IMG_0524.JPG'),
(240105087, 'Cantika Kenzie', 'Teknik Informatika', 'Kudus', 2024, 'SMAN 1 Kudus', '084657292465', 'Mahasiswa', 'Cantika_Kenzie.jpg'),
(240306158, 'Kirana Ayu', 'JREM', 'Jambi', 2024, 'SMKN 1 Jambi', '086435242684', 'Mahasiswa', 'Kirana_Ayu.jpg'),
(240306160, 'Setya Arum Prabawati', 'Jurusan Komputer dan Bisnis', 'Kebumen', 2024, 'SMAN 1 Klirong', '0895337153658', 'Mahasiswa', 'WhatsApp Image 2025-07-02 at 23.29.19_dd2229de.jpg'),
(240306161, 'Fajar Mahardika', 'Komputer dan Bisnis', 'cilacap', 2024, '1', '07', 'Mahasiswa', 'WhatsApp Image 2025-09-03 at 11.44.25_aef960f8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `NIS` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240306162;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
