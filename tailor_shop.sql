-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 10:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailor_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cloth_type`
--

CREATE TABLE `cloth_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cloth_type`
--

INSERT INTO `cloth_type` (`id`, `name`) VALUES
(1, 'Chiffon'),
(2, 'Crepe'),
(3, 'Cotton'),
(4, 'Denim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(11) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `phone`, `password`, `role`, `salary`, `created_at`, `soft_delete`) VALUES
(1, '', 'admin@gmail.com', '', '12345', 0, NULL, '2022-06-18 19:42:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cloth`
--

CREATE TABLE `tbl_cloth` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cloth`
--

INSERT INTO `tbl_cloth` (`id`, `name`, `details`, `image`, `price`, `discount`) VALUES
(1, 'Charity Blanchard', 'Magna et rerum venia', 'upload/7b03f53b0c.jpg', 518, 67),
(2, 'Ruth Chapman', 'Vel dignissimos aper', 'upload/b328f219e7.jpg', 125, 56),
(3, 'Mark Marshall', 'Accusantium voluptas', 'upload/4cfe5c2415.jpg', 446, 63),
(4, 'Ferdinand Bean', 'Dolore eiusmod conse', 'upload/bcf58a9562.jpg', 386, 38),
(5, 'Virginia Pena', 'Et pariatur Incidun', 'upload/25d4aa673d.jpg', 712, 32),
(6, 'Armando Dunn', 'Cum laboris officiis', 'upload/7acce0a02a.jpg', 634, 9),
(8, 'Claire Erickson', 'Magna aspernatur et ', 'upload/e6152a3bf2.jpg', 361, 61);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloth_type`
--
ALTER TABLE `cloth_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloth_type`
--
ALTER TABLE `cloth_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
