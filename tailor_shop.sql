-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 08:57 AM
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

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `role`, `created_at`, `soft_delete`) VALUES
(6, 'Supty', 'Ahmed', 'supty@gmail.com', '+8801300813663', '123456', 0, '2022-06-26 16:21:37', 0),
(7, 'Dipta', 'Dey', 'dipta@gmail.com', '+8801236587987', '123456', 1, '2022-06-26 16:27:45', 0),
(8, 'Ayesha', 'Snigdha', 'snigdha@gmail.com', '+8801704576898', '123456', 0, '2022-06-26 20:51:30', 1);

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
(16, 'Dacey Reyes', 3, 'Enim cupiditate ad e', 'upload/383b714895.jpg', '100', 'Nihil est pariatur ', 'Cupiditate molestiae', 289, 924, 10, '2022-06-19 13:16:04', 1),
(17, 'Australian Chiffon', 6, 'High quality australian chiffon fabric', 'upload/f4864369fa.jpg', '43.88', '#a46a6a', 'Zaraa', 355, 500, 10, '2022-06-19 13:19:43', 0),
(18, 'Denim Jeans', 4, 'High quality denim fabric', 'upload/e9755f27c2.jpg', '29.10', '#3e5ca3', 'Amber', 330, 500, 10, '2022-06-19 13:19:55', 0),
(20, 'China Cotton', 3, 'Soft cotton fabric', 'upload/dde4857335.jpg', '87.50', '#decece', 'Deshi', 800, 1000, 5, '2022-06-19 13:20:26', 0),
(21, 'China Crepe', 2, 'Soft China Crepe', 'upload/4bf22a3c41.jpg', '91.5', '#d3a7a7', 'H&M', 300, 500, 10, '2022-06-19 14:20:03', 0);

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
(4, 'Rina', 'rina@gmail.com', '+8801456787945', 'Dhaka', '2022-06-19 13:00:35', 0),
(5, 'Kamal', 'kamal@gmail.com', '+8801857687367', 'Narayanganj', '2022-06-19 13:00:47', 0),
(6, 'Mukta', 'mukta@gmail.com', '+8801245879876', 'Demra, Dhaka', '2022-06-19 13:18:33', 0),
(7, 'Rabby', 'rabby@gmail.com', '+8801945769876', '1234 NW Bobcat Lane', '2022-06-19 13:18:44', 0),
(9, 'Ruby', 'ruby@gmail.com', '+8801696787667', '90210 Broadway Blvd.\r\nNashville, TN 37011-5678', '2022-06-19 14:05:53', 0);

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
(11, 6, 'Kamiz', 'body 34 height 44', 0),
(12, 8, 'Quasi alias nihil vo', 'Quibusdam et quidem ', 1),
(13, 8, 'Ab fugiat corrupti ', 'Laudantium distinct', 0),
(14, 6, 'Salwar', 'height 38', 0),
(15, 7, 'Shirt', 'full sleeve, 44 long', 0),
(16, 5, 'Pant', 'long 32  ', 0);

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

INSERT INTO `tbl_order` (`id`, `owner_id`, `cus_id`, `mes_id`, `cloth_id`, `buying_price`, `selling_price`, `charge`, `discount`, `quantity`, `slip_no`, `soft_delete`) VALUES
(63, 5, 5, 16, 18, 330, 500, 200, 10, 1.50, '1662921655', 0),
(64, 5, 6, 11, 20, 800, 1000, 150, 5, 2.50, '1662921655', 0),
(65, 5, 6, 14, 21, 300, 500, 150, 10, 3.50, '1662921655', 0),
(66, 7, 7, 15, 17, 355, 500, 200, 10, 2.50, '1662922019', 0),
(67, 6, 6, 11, 20, 800, 1000, 300, 5, 3.50, '1662922179', 0),
(68, 6, 6, 14, 21, 300, 500, 250, 10, 2.50, '1662922179', 0),
(69, 7, 7, 15, 20, 800, 1000, 200, 5, 3.00, '1662925195', 0),
(70, 6, 6, 11, 20, 800, 1000, 300, 5, 3.00, '1662925400', 0);

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
(42, 1662921655, 5, '2022-09-11', '2022-09-19', 0, 0),
(43, 1662922019, 7, '2022-09-11', '2022-09-20', 0, 0),
(44, 1662922179, 6, '2022-09-11', '2022-09-22', 0, 0),
(45, 1662925195, 7, '2022-09-11', '2022-09-15', 0, 0),
(46, 1662925400, 6, '2022-09-11', '2022-09-27', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_slip`
--
ALTER TABLE `tbl_slip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
