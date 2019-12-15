-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2019 at 01:28 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `home` text NOT NULL,
  `telephone` int(11) NOT NULL,
  `qr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `home`, `telephone`, `qr_id`) VALUES
(1, '98/43 ถนนวิรัชหงษ์หยก ตำบลวิชิต อำเภอเมือง จังหวัดภูเก็ต', 966353408, 12345689);

-- --------------------------------------------------------

--
-- Table structure for table `Map`
--

CREATE TABLE `Map` (
  `id` int(11) NOT NULL,
  `shop_name` tinytext NOT NULL,
  `adress` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Map`
--

INSERT INTO `Map` (`id`, `shop_name`, `adress`, `location`) VALUES
(1, 'ร้านยาตรีจักร', '58/34 Thanon Chao Fa, ตำบลตลาดเหนือ อำเภอเมืองภูเก็ต ภูเก็ต 83000', 'https://www.google.com/maps/place/%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%A2%E0%B8%B2%E0%B8%95%E0%B8%A3%E0%B8%B5%E0%B8%88%E0%B8%B1%E0%B8%81%E0%B8%A3/@7.8818303,98.3430301,13z/data=!4m8!1m2!2m1!1z4Lij4LmJ4Liy4LiZ4Lii4Liy!3m4!1s0x305031e1f49b15e9:0x31ca0c5c0e618e36!8m2!3d7.8766117!4d98.379737'),
(2, 'ร้านยาลันตาฟาร์มาซี1 Lanta Pharmacy 1', '29 หมู่6 ต.กะทู้. Kathu กะทู้ Kathu ภูเก็ต 83120', 'https://www.google.com/maps/place/%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%B2%E0%B8%9F%E0%B8%B2%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%B2%E0%B8%8B%E0%B8%B51+Lanta+Pharmacy+1/@7.8818303,98.3430301,13z/data=!4m8!1m2!2m1!1z4Lij4LmJ4Liy4LiZ4Lii4Liy!3m4!1s0x0:0x1169538dfdd8d6c6!8m2!3d7.9114386!4d98.333559'),
(3, 'ร้านยา ฟาร์มยา pharm-ya pharmacy', '3/45 ถนน เทพกระษัตรี ตำบลตลาดใหญ่ อำเภอเมืองภูเก็ต ภูเก็ต 83000', 'https://www.google.com/maps/place/%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%A2%E0%B8%B2+%E0%B8%9F%E0%B8%B2%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%A2%E0%B8%B2+pharm-ya+pharmacy/@7.8818303,98.3430301,13z/data=!4m8!1m2!2m1!1z4Lij4LmJ4Liy4LiZ4Lii4Liy!3m4!1s0x0:0x1d0f00cf0cf96e3e!8m2!3d7.9063165!4d98.390218');

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

CREATE TABLE `Notification` (
  `id` int(11) NOT NULL,
  `qr_id` bigint(20) NOT NULL,
  `notification` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Notification`
--

INSERT INTO `Notification` (`id`, `qr_id`, `notification`, `date`) VALUES
(1, 123456789, 'หมอนัด 1 ธันวาคม', '2019-12-15'),
(2, 123456789, 'ทดสอบ', '2019-12-15'),
(4, 123456789, 'ทดสอบ3', '2019-12-15'),
(6, 123456789, 'วันนี้วันอาทิตย์', '2019-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `profile_img` tinytext NOT NULL,
  `qr_id` bigint(255) NOT NULL,
  `id_card` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `user_name`, `profile_img`, `qr_id`, `id_card`) VALUES
(1, 'ศรชัย สมสกุล', 'db/user_pic/123456789.jpg', 123456789, 183990185619);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Map`
--
ALTER TABLE `Map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Map`
--
ALTER TABLE `Map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Notification`
--
ALTER TABLE `Notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
