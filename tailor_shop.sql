-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Aug 26, 2022 at 07:57 PM
=======
-- Generation Time: Jun 27, 2022 at 03:30 PM
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_job_status` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_phone` varchar(255) NOT NULL,
  `emp_image` varchar(255) NOT NULL,
  `emp_salary` int(11) NOT NULL,
  `create_emp` timestamp NOT NULL DEFAULT current_timestamp(),
  `emp_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`emp_id`, `emp_name`, `emp_job_status`, `emp_email`, `emp_phone`, `emp_image`, `emp_salary`, `create_emp`, `emp_address`) VALUES
(5, 'Noelle Lucas', 'Manager', 'cifumipas@mailinator.com', '+8801835676897', 'img/4208683367.jpg', 12000, '2022-06-25 13:14:26', 'Fuga Pariatur Et e'),
(6, 'Perry Carr', 'Tailor', 'fitiryv@mailinator.com', '+8801765678987', 'img/0bdd8c39cd.png', 10000, '2022-06-25 13:48:59', 'Nisi voluptatem Eos'),
(7, 'Amber Hudson', 'Cleaner', 'sibiqe@mailinator.com', '+8801203476859', 'img/3dc8ad064b.png', 10000, '2022-06-26 13:11:41', 'Vitae ducimus eu qu'),
(8, 'Denise Hansen', 'Tailor', 'fowunonil@mailinator.com', '+8801545769876', 'img/5831275e36.png', 10000, '2022-06-26 13:32:51', 'Fugit cum sit dolor');

-- --------------------------------------------------------

--
-- Table structure for table `salary_table`
--

CREATE TABLE `salary_table` (
  `salary_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `pay_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_table`
--

INSERT INTO `salary_table` (`salary_id`, `emp_id`, `month`, `salary`, `year`, `pay_at`) VALUES
(7, 6, 'June', 10000, 2022, '2022-06-25 15:01:02'),
(8, 5, 'February', 10000, 2022, '2022-06-26 16:50:39'),
(9, 5, 'June', 10000, 2022, '2022-06-26 16:51:28'),
(10, 7, 'June', 10000, 2022, '2022-06-27 13:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

<<<<<<< HEAD
INSERT INTO `tbl_admin` (`id`, `name`, `email`, `phone`, `password`, `role`, `salary`, `created_at`, `soft_delete`) VALUES
(1, 'Ayrin Supty', 'admin@gmail.com', '+8801300813663', '123456', 0, NULL, '2022-06-18 19:42:30', 0),
(2, 'Madonna Marquez', 'mypaxij@mailinator.com', '+8801815687984', 'Pa$$w0rd!', 2, NULL, '2022-06-20 06:06:06', 1),
(3, 'Hayes Castro', 'vejuja@mailinator.com', '+8801345678985', 'Pa$$w0rd!', 1, NULL, '2022-06-20 06:10:05', 0),
(4, 'Neve Phillips', 'dusenib@mailinator.com', '+8801644576879', 'Pa$$w0rd!', 2, NULL, '2022-06-20 08:52:37', 0),
(5, 'Vance Bernard', 'qobisecyxa@mailinator.com', '+8801892345678', 'Eos qui impedit ex', 2, NULL, '2022-08-20 07:27:01', 0);
=======
INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `role`, `created_at`, `soft_delete`) VALUES
(6, 'Supty', 'Ahmed', 'supty@gmail.com', '+8801300813663', '123456', 0, '2022-06-26 16:21:37', 0),
(7, 'Dipta', 'Dey', 'dipta@gmail.com', '+8801236587987', '123456', 1, '2022-06-26 16:27:45', 0),
(8, 'Ayesha', 'Snigdha', 'snigdha@gmail.com', '+8801704576898', '123456', 2, '2022-06-26 20:51:30', 0);
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `cloth_id` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` float(10,2) NOT NULL,
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
<<<<<<< HEAD
(16, 'Dacey Reyes', 3, 'Enim cupiditate ad e', 'upload/383b714895.jpg', '100', 'Nihil est pariatur ', 'Cupiditate molestiae', 289, 924, 10, '2022-06-19 13:16:04', 1),
(17, 'Zephr Wilder', 6, 'Et officiis non recu', 'upload/f4864369fa.jpg', '118.88', 'Ut enim voluptatem ', 'Expedita aliquid lab', 355, 500, 15, '2022-06-19 13:19:43', 0),
(18, 'Melvin Ellis', 4, 'Magna sit ut nisi fa', 'upload/e9755f27c2.jpg', '100.00', 'Dolorum a iure recus', 'Molestias aut odio e', 331, 850, 10, '2022-06-19 13:19:55', 0),
(20, 'Xenos Nunez', 3, 'Sed mollitia unde su', 'upload/dde4857335.jpg', '110', 'Veniam voluptas exc', 'Fugiat aperiam reic', 829, 1000, 5, '2022-06-19 13:20:26', 0),
(21, 'Julie Sanders', 2, 'Laboriosam ad in qu', 'upload/4bf22a3c41.jpg', '0', 'Non duis et a saepe', 'Ullamco magna commod', 300, 452, 10, '2022-06-19 14:20:03', 0);
=======
(16, 'Dacey Reyes', 3, 'Enim cupiditate ad e', 'upload/383b714895.jpg', 'Voluptatum maxime ut', 'Nihil est pariatur ', 'Cupiditate molestiae', 289, 924, 49, '2022-06-19 13:16:04', 1),
(17, 'Zephr Wilder', 6, 'Et officiis non recu', 'upload/f4864369fa.jpg', 'Doloremque et qui do', '#ab83b9', 'Expedita aliquid lab', 355, 225, 77, '2022-06-19 13:19:43', 0),
(18, 'Melvin Ellis', 4, 'Magna sit ut nisi fa', 'upload/e9755f27c2.jpg', 'Voluptatibus officii', '#b7b9f0', 'Molestias aut odio e', 331, 85, 69, '2022-06-19 13:19:55', 0),
(20, 'Xenos Nunez', 3, 'Sed mollitia unde su', 'upload/dde4857335.jpg', 'Doloribus asperiores', '#ffffff', 'Fugiat aperiam reic', 829, 762, 26, '2022-06-19 13:20:26', 0),
(21, 'Julie Sanders', 2, 'Laboriosam ad in qu', 'upload/4bf22a3c41.jpg', 'Soluta impedit mole', '#c82d2d', 'Ullamco magna commod', 964, 452, 73, '2022-06-19 14:20:03', 0);
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

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
(8, 'Marsden Davenport', 'weme@mailinator.com', '+8801605634598', 'Laudantium consequu', '2022-06-19 13:18:55', 1),
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
<<<<<<< HEAD
(8, 4, 'Facilis vel mollit v', 'Obcaecati mollit des', 1),
(9, 6, 'Et nostrud sit ipsa', 'Ut iusto quis in eni', 1),
(10, 9, 'Qui aspernatur lauda', 'Atque laudantium do', 1),
(11, 6, 'Officia voluptate ', 'Adipisci aut earum v', 0),
(12, 8, 'Quasi alias nihil vo', 'Quibusdam et quidem ', 1),
(13, 8, 'Ab fugiat corrupti ', 'Laudantium distinct', 0),
(14, 6, 'Ea et accusamus aspe', 'Consectetur architec', 0),
(15, 7, 'Dolor velit porro a', 'Aute nulla exercitat', 0),
(16, 6, 'Pant', 'long:32 ft ', 0);
=======
(17, 5, 'Exercitation sed mol', 'Recusandae Quia exp', 0),
(18, 7, 'Dolorum dolorum duis', 'Magnam sed unde ut p', 0),
(19, 5, 'Cupidatat incidunt ', 'Quas qui illum qui ', 0),
(20, 7, 'Voluptatem suscipit ', 'Ipsum cum obcaecati', 0),
(21, 9, 'Autem qui saepe cupi', 'Cupiditate vel offic', 0),
(22, 4, 'Dicta dignissimos de', 'Ea voluptates dolore', 0),
(23, 8, 'Dolore voluptatem fu', 'Soluta nisi facere r', 0),
(24, 6, 'Iure cillum ea in di', 'In et amet fugiat e', 0),
(25, 8, 'Quos provident quo ', 'Sit earum accusamus', 0),
(26, 5, 'Shirt', 'Esse voluptatibus el', 0),
(27, 5, 'Pant', 'Consectetur blanditi', 0),
(28, 4, 'Dress', 'Nisi nobis asperiore', 0);
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `cloth_id` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` float(10,2) NOT NULL,
  `slip_no` varchar(255) DEFAULT NULL,
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

<<<<<<< HEAD
INSERT INTO `tbl_order` (`id`, `owner_id`, `cus_id`, `mes_id`, `cloth_id`, `buying_price`, `selling_price`, `charge`, `discount`, `quantity`, `slip_no`, `soft_delete`) VALUES
(1, 4, 9, 15, 20, 965, 688, 36, 0, 239.00, '1655912424', 0),
(2, 4, 8, 15, 20, 37, 774, 59, 0, 857.00, '1655912424', 0),
(3, 4, 5, 11, 20, 221, 914, 44, 0, 957.00, '1655912424', 0),
(4, 6, 9, 15, 20, 965, 688, 36, 0, 239.00, '1655912465', 0),
(5, 6, 8, 15, 20, 37, 774, 59, 0, 857.00, '1655912465', 0),
(6, 6, 5, 11, 20, 221, 914, 44, 0, 957.00, '1655912465', 0),
(7, 6, 9, 15, 20, 965, 688, 36, 0, 239.00, '1655912503', 0),
(8, 6, 8, 15, 20, 37, 774, 59, 0, 857.00, '1655912503', 0),
(9, 6, 5, 11, 20, 221, 914, 44, 0, 957.00, '1655912503', 0),
(10, 5, 9, 15, 20, 965, 688, 36, 0, 239.00, '1655912640', 0),
(11, 5, 8, 15, 20, 37, 774, 59, 0, 857.00, '1655912640', 0),
(12, 5, 5, 11, 20, 221, 914, 44, 0, 957.00, '1655912640', 0),
(13, 4, 4, 8, 17, 355, 500, 123, 15, 1.12, '1661536255', 0);
=======
INSERT INTO `tbl_order` (`id`, `owner_id`, `cus_id`, `mes_id`, `cloth_id`, `buying_price`, `selling_price`, `charge`, `quantity`, `slip_no`, `soft_delete`) VALUES
(58, 8, 8, 25, 20, 540, 495, 71, 464.00, '1655998893', 1),
(59, 8, 8, 23, 17, 678, 785, 65, 457.00, '1655998893', 1),
(60, 5, 5, 26, 18, 835, 33, 30, 48.80, '1655999369', 1),
(61, 9, 9, 21, 18, 890, 821, 94, 513.00, '1656062858', 1),
(62, 4, 5, 27, 18, 270, 306, 6, 861.00, '1656068939', 0),
(63, 4, 4, 28, 18, 950, 240, 94, 995.00, '1656068939', 0);
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slip`
--

CREATE TABLE `tbl_slip` (
  `id` int(11) NOT NULL,
  `slip_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_at` varchar(50) NOT NULL,
  `delivery_at` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slip`
--

INSERT INTO `tbl_slip` (`id`, `slip_no`, `customer_id`, `order_at`, `delivery_at`, `status`, `soft_delete`) VALUES
<<<<<<< HEAD
(1, 1655912424, 4, '2022-06-22', '2022-06-30', 0, 0),
(2, 1655912465, 6, '2022-06-22', '2022-06-23', 0, 0),
(3, 1655912503, 6, '2022-06-22', '2022-06-24', 0, 0),
(4, 1655912640, 5, '2022-06-22', '2022-07-02', 0, 0),
(5, 1661536255, 4, '2022-08-26', '2022-09-09', 0, 0);
=======
(10, 1655998893, 8, '2022-06-23', '2022-07-07', 0, 0),
(11, 1655999369, 5, '2022-06-23', '2022-07-09', 0, 0),
(12, 1656062858, 9, '2022-06-24', '2022-07-09', 0, 0),
(13, 1656068939, 4, '2022-06-24', '2022-07-09', 0, 0);
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloth_type`
--
ALTER TABLE `cloth_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `salary_table`
--
ALTER TABLE `salary_table`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
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
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slip`
--
ALTER TABLE `tbl_slip`
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
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary_table`
--
ALTER TABLE `salary_table`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

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
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d

--
-- AUTO_INCREMENT for table `tbl_slip`
--
ALTER TABLE `tbl_slip`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
>>>>>>> cdb4b2e256810c43b4a84624c20790e51790276d
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
