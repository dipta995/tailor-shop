-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 09:06 AM
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
(4, 'Denim'),
(5, 'Satin');

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
  `type` int(11) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cloth`
--

INSERT INTO `tbl_cloth` (`id`, `name`, `type`, `details`, `image`, `stock`, `color`, `brand`, `buying_price`, `selling_price`, `discount`, `created_at`, `soft_delete`) VALUES
(10, 'Kessie Howell', 1, 'Assumenda recusandae', 'upload/579346dbb2.jpg', 'Atque fugiat vitae e', 'Maiores vero est ev', 'Cupidatat sunt sint', 983, 564, 38, '2022-06-19 06:54:23', 0),
(11, 'Debra Santana', 3, 'Eum soluta accusanti', 'upload/99ee2c3ebf.jpg', 'Sed molestiae labore', 'Harum ullam quibusda', 'Ut in qui quis in as', 626, 535, 90, '2022-06-19 06:55:02', 0),
(12, 'Cora Finley', 3, 'Rerum omnis enim tot', 'upload/8610a06cb3.jpg', 'Quae eu rerum sit au', 'Sint aspernatur repu', 'Ad et dolor est aut ', 422, 984, 44, '2022-06-19 06:55:34', 0),
(13, 'Alexander Clayton', 4, 'Ipsum voluptatum fa', 'upload/8e32339aa7.jpg', 'Optio sint cupidit', 'Mollit accusamus off', 'Quos sint quibusdam ', 611, 490, 60, '2022-06-19 06:55:52', 0),
(14, 'Channing Gray', 5, 'Aliqua Laboriosam ', 'upload/24dd67d30d.jpg', 'Cumque eos accusamus', 'Quis atque saepe in ', 'Velit aspernatur lab', 167, 99, 66, '2022-06-19 06:57:42', 0),
(15, 'Lucian Hewitt', 2, 'Cumque beatae ut ut ', 'upload/c59dbcb80a.jpg', 'Rerum repudiandae et', 'Cillum dolore alias ', 'Enim et temporibus q', 99, 884, 20, '2022-06-19 06:59:40', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
