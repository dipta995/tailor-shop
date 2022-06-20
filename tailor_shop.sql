-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 04:31 PM
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
  `name` varchar(255) NOT NULL,
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cloth_type`
--

INSERT INTO `cloth_type` (`id`, `name`, `soft_delete`) VALUES
(1, 'Chiffon', 1),
(2, 'Crepe', 0),
(3, 'Cotton', 0),
(4, 'Denim', 0),
(5, 'Satin', 1),
(6, 'Chiffon', 0),
(7, 'Satin', 0);

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
(1, 'Ayrin Supty', 'admin@gmail.com', '+8801300813663', '123456', 0, NULL, '2022-06-18 19:42:30', 0),
(2, 'Madonna Marquez', 'mypaxij@mailinator.com', '+8801815687984', 'Pa$$w0rd!', 2, NULL, '2022-06-20 06:06:06', 1),
(3, 'Hayes Castro', 'vejuja@mailinator.com', '+8801345678985', 'Pa$$w0rd!', 1, NULL, '2022-06-20 06:10:05', 0),
(4, 'Neve Phillips', 'dusenib@mailinator.com', '+8801644576879', 'Pa$$w0rd!', 2, NULL, '2022-06-20 08:52:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cloth`
--

CREATE TABLE `tbl_cloth` (
  `id` int(11) NOT NULL,
  `cloth_name` varchar(255) NOT NULL,
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

INSERT INTO `tbl_cloth` (`id`, `cloth_name`, `type`, `details`, `image`, `stock`, `color`, `brand`, `buying_price`, `selling_price`, `discount`, `created_at`, `soft_delete`) VALUES
(16, 'Dacey Reyes', 3, 'Enim cupiditate ad e', 'upload/383b714895.jpg', 'Voluptatum maxime ut', 'Nihil est pariatur ', 'Cupiditate molestiae', 289, 924, 49, '2022-06-19 13:16:04', 1),
(17, 'Zephr Wilder', 6, 'Et officiis non recu', 'upload/f4864369fa.jpg', 'Doloremque et qui do', 'Ut enim voluptatem ', 'Expedita aliquid lab', 355, 225, 77, '2022-06-19 13:19:43', 0),
(18, 'Melvin Ellis', 4, 'Magna sit ut nisi fa', 'upload/e9755f27c2.jpg', 'Voluptatibus officii', 'Dolorum a iure recus', 'Molestias aut odio e', 331, 85, 69, '2022-06-19 13:19:55', 0),
(20, 'Xenos Nunez', 3, 'Sed mollitia unde su', 'upload/dde4857335.jpg', 'Doloribus asperiores', 'Veniam voluptas exc', 'Fugiat aperiam reic', 829, 762, 26, '2022-06-19 13:20:26', 0),
(21, 'Julie Sanders', 2, 'Laboriosam ad in qu', 'upload/4bf22a3c41.jpg', 'Soluta impedit mole', 'Non duis et a saepe', 'Ullamco magna commod', 964, 452, 73, '2022-06-19 14:20:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_phone` varchar(255) NOT NULL,
  `cus_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_address`, `created_at`, `soft_delete`) VALUES
(1, 'Lilah Reeves', 'loxeq@mailinator.com', '+8801935667898', 'Ea animi perspiciat', '2022-06-19 11:25:26', 1),
(2, 'Echo Farrell', 'fesiv@mailinator.com', '+8801503487987', 'Elit qui est repreh', '2022-06-19 12:20:30', 1),
(3, 'Gavin Velazquez', 'dehos@mailinator.com', '+8801204587964', 'Itaque laborum excep', '2022-06-19 13:00:25', 1),
(4, 'Rina Kramer', 'rygaci@mailinator.com', '+8801456787945', 'Sit voluptate do ne', '2022-06-19 13:00:35', 0),
(5, 'Simon Houston', 'nipumatifi@mailinator.com', '+8801857687367', 'Animi omnis accusan', '2022-06-19 13:00:47', 0),
(6, 'Sloane Avery', 'hicaced@mailinator.com', '+8801245879876', 'Aut occaecat non non', '2022-06-19 13:18:33', 0),
(7, 'Yardley Levy', 'suvygamiw@mailinator.com', '+8801945769876', 'Sed id velit eos si', '2022-06-19 13:18:44', 0),
(8, 'Marsden Davenport', 'weme@mailinator.com', '+8801605634598', 'Laudantium consequu', '2022-06-19 13:18:55', 0),
(9, 'Colette Byrd', 'rutily@mailinator.com', '+8801696787667', 'Quidem in sit persp', '2022-06-19 14:05:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_measurement`
--

CREATE TABLE `tbl_measurement` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `measurement_for` varchar(255) NOT NULL,
  `measurement_details` text NOT NULL,
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_measurement`
--

INSERT INTO `tbl_measurement` (`id`, `cus_id`, `measurement_for`, `measurement_details`, `soft_delete`) VALUES
(8, 4, 'Facilis vel mollit v', 'Obcaecati mollit des', 1),
(9, 6, 'Et nostrud sit ipsa', 'Ut iusto quis in eni', 1),
(10, 9, 'Qui aspernatur lauda', 'Atque laudantium do', 1),
(11, 6, 'Officia voluptate ', 'Adipisci aut earum v', 0),
(12, 8, 'Quasi alias nihil vo', 'Quibusdam et quidem ', 1),
(13, 8, 'Ab fugiat corrupti ', 'Laudantium distinct', 0),
(14, 6, 'Ea et accusamus aspe', 'Consectetur architec', 0),
(15, 7, 'Dolor velit porro a', 'Aute nulla exercitat', 0);

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
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_measurement`
--
ALTER TABLE `tbl_measurement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloth_type`
--
ALTER TABLE `cloth_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_measurement`
--
ALTER TABLE `tbl_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
