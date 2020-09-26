-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 04:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_dw`
--

-- --------------------------------------------------------

--
-- Table structure for table `importir_tb`
--

CREATE TABLE `importir_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` longtext NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `importir_tb`
--

INSERT INTO `importir_tb` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha', 'Jakarta', '(021) 6620144', '2020-09-26 08:07:08', '2020-09-26 08:07:08'),
(2, 'Honda', 'Jakarta', ' (021) 3905570', '2020-09-26 08:07:08', '2020-09-26 08:07:08'),
(3, 'Kawasaki', 'Jakarta', '(021) 79192612', '2020-09-26 08:07:08', '2020-09-26 06:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `produk_tb`
--

CREATE TABLE `produk_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `importir_id` int(2) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `qty` int(5) NOT NULL,
  `price` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_tb`
--

INSERT INTO `produk_tb` (`id`, `name`, `importir_id`, `photo`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(4, 'Honda CMX 500 Rebel', 2, 'honda-cmx-500-rebel.jpg', 75, '147000000', '2020-09-26 08:06:24', '2020-09-26 07:23:20'),
(5, 'Honda Beat Street', 2, 'honda-beat-street.jpg', 20, '16255000', '2020-09-26 08:06:24', '2020-09-26 07:20:44'),
(6, 'Kawasaki D-Tracker 150', 3, 'kawasaki-d-tracker-150.jpg', 20, '33400000', '2020-09-26 08:06:24', '2020-09-26 07:19:45'),
(7, 'Kawasaki W175', 3, 'kawasaki-w175.png', 30, '30700000', '2020-09-26 08:06:24', '2020-09-26 07:16:05'),
(8, 'FreeGo', 1, 'freego.png', 89, '19275000', '2020-09-26 04:02:15', '2020-09-26 04:02:15'),
(9, 'Xride 125', 1, 'xride-125.png', 101, '18690000', '2020-09-26 04:43:33', '2020-09-26 07:13:28'),
(10, 'Mio M3 125 AKS SSS', 1, 'mio-m3-125-aks-sss.png', 21, '17270000', '2020-09-26 04:46:51', '2020-09-26 04:46:51'),
(11, 'Fino Grande Tubeless & Ban Lebar 125 Blue Core', 1, 'fino-grande-tubeless-ban-lebar-125-blue-core.png', 44, '19895000', '2020-09-26 04:48:41', '2020-09-26 04:48:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `importir_tb`
--
ALTER TABLE `importir_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_tb`
--
ALTER TABLE `produk_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `importir_id` (`importir_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `importir_tb`
--
ALTER TABLE `importir_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk_tb`
--
ALTER TABLE `produk_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk_tb`
--
ALTER TABLE `produk_tb`
  ADD CONSTRAINT `produk_tb_ibfk_1` FOREIGN KEY (`importir_id`) REFERENCES `importir_tb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
