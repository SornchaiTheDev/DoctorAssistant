-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 05:52 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `home` text NOT NULL,
  `telephone` int(11) NOT NULL,
  `symptome` text NOT NULL,
  `qr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `home`, `telephone`, `symptome`, `qr_id`) VALUES
(2, 'ถังขยะ', 887614130, 'ไอเล็กน้อย ตัวอุ่นๆ อาการปกติดี', 990627106),
(3, 'Earth', 817884212, '', 2114703845),
(4, 'Earth', 2147483647, '', 953535137),
(5, '435', 4364, '', 79704070),
(6, 'Earth', 2147483647, '', 191519549),
(7, 'sadasd', 0, '', 1373970423),
(8, 'safsafsafasfsafs', 0, '', 1710248465),
(9, 'safsafsafasfsafs', 0, '', 1410699156),
(10, 'dsadsa', 51065084, '', 1516388712),
(11, '2342', 34, '', 2019919903),
(12, '423423432', 4234234, '', 517009344),
(13, '35235', 235235, '', 1841667458),
(14, '4234234', 234234, '', 831445255),
(15, '523523', 5235523, '', 1898263010),
(16, '235235', 235235, '', 478655515),
(17, '363463', 6436436, '', 2057364692),
(18, '45', 456546, '', 1548299412),
(19, 'ใจเรา', 2147483647, '', 1271012299),
(20, '1112', 21212121, '', 1465763897),
(21, '15151', 151515, '', 85811958),
(22, '123123', 123123, '', 1831732717),
(23, '98/43 ถนนวิรัชหงษ์หยก ตำบลวิชิต อำเภอเมือง จังหวัดภูเก็ต', 966353408, '', 1489907328),
(24, '32185156151', 15115151, '', 1643163780),
(25, '32185156151', 15115151, '', 1251904791),
(26, '231312', 123123, '', 900468666),
(27, 'awr', 0, '', 189578948),
(28, '456456', 4564564, '', 1298483241),
(29, '6546546165', 2147483647, '', 974478828),
(30, '1511611', 51511, '', 426954908),
(31, '1515155', 551551, '', 779910623),
(32, '515151', 55155151, '', 471793475),
(33, '51515151', 5151515, '', 119708349),
(34, '98/43 ถนนวิรัชหงษ์หยก ตำบลวิชิต อำเภอเมือง จังหวัดภูเก็ต', 902401701, '', 1030910921),
(35, '351351351', 531351, '', 2027258799),
(36, '131131', 13113131, '', 2024667429),
(37, '6853465', 2147483647, '', 1464037143),
(38, '131113', 1313, '', 9531091);

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `shop_name` tinytext NOT NULL,
  `adress` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `shop_name`, `adress`, `location`) VALUES
(1, 'ร้านยาตรีจักร', '58/34 Thanon Chao Fa, ตำบลตลาดเหนือ อำเภอเมืองภูเก็ต ภูเก็ต 83000', 'https://www.google.com/maps/place/%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%A2%E0%B8%B2%E0%B8%95%E0%B8%A3%E0%B8%B5%E0%B8%88%E0%B8%B1%E0%B8%81%E0%B8%A3/@7.8818303,98.3430301,13z/data=!4m8!1m2!2m1!1z4Lij4LmJ4Liy4LiZ4Lii4Liy!3m4!1s0x305031e1f49b15e9:0x31ca0c5c0e618e36!8m2!3d7.8766117!4d98.379737'),
(2, 'ร้านยาลันตาฟาร์มาซี1 Lanta Pharmacy 1', '29 หมู่6 ต.กะทู้. Kathu กะทู้ Kathu ภูเก็ต 83120', 'https://www.google.com/maps/place/%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%B2%E0%B8%9F%E0%B8%B2%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%B2%E0%B8%8B%E0%B8%B51+Lanta+Pharmacy+1/@7.8818303,98.3430301,13z/data=!4m8!1m2!2m1!1z4Lij4LmJ4Liy4LiZ4Lii4Liy!3m4!1s0x0:0x1169538dfdd8d6c6!8m2!3d7.9114386!4d98.333559'),
(3, 'ร้านยา ฟาร์มยา pharm-ya pharmacy', '3/45 ถนน เทพกระษัตรี ตำบลตลาดใหญ่ อำเภอเมืองภูเก็ต ภูเก็ต 83000', 'https://www.google.com/maps/place/%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%A2%E0%B8%B2+%E0%B8%9F%E0%B8%B2%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%A2%E0%B8%B2+pharm-ya+pharmacy/@7.8818303,98.3430301,13z/data=!4m8!1m2!2m1!1z4Lij4LmJ4Liy4LiZ4Lii4Liy!3m4!1s0x0:0x1d0f00cf0cf96e3e!8m2!3d7.9063165!4d98.390218');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(11) NOT NULL,
  `asdasdx` int(11) NOT NULL,
  `asdasds` int(11) NOT NULL,
  `asdasd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `qr_id` bigint(20) NOT NULL,
  `notification` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `qr_id`, `notification`, `date`) VALUES
(1, 123456789, 'asdsadsad', '2019-12-16'),
(2, 1234567890, 'asdasdsad', '2019-12-16'),
(3, 123456789, 'sadfsdfsgdsg', '2019-12-16'),
(4, 1030910921, 'asdasdsad', '2019-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `pill`
--

CREATE TABLE `pill` (
  `id` int(11) NOT NULL,
  `pill_name` varchar(20) NOT NULL,
  `detail` text NOT NULL,
  `time` text NOT NULL,
  `pill_id` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pill`
--

INSERT INTO `pill` (`id`, `pill_name`, `detail`, `time`, `pill_id`) VALUES
(1, 'test1', 'test', 'test', 370451911),
(2, 'มดแดง', 'test', 'test', 324577164);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `profile_img` tinytext NOT NULL,
  `qr_id` bigint(255) NOT NULL,
  `id_card` bigint(20) NOT NULL,
  `birthday` date NOT NULL,
  `creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `profile_img`, `qr_id`, `id_card`, `birthday`, `creation`) VALUES
(2, 'นายศรชัย สมสกุล', 'db/user_pic/123456789.jpg', 990627106, 1839901785619, '2020-01-01', '2019-12-04'),
(3, 'demo1', 'db/user_pic/normal_user.png', 2114703845, 12152185625, '0000-00-00', '0000-00-00'),
(4, 'demo2', 'db/user_pic/normal_user.png', 953535137, 122562237496, '0000-00-00', '0000-00-00'),
(5, 'demo3', 'db/user_pic/normal_user.png', 79704070, 1468545684, '0000-00-00', '0000-00-00'),
(6, 'demo4', 'db/user_pic/normal_user.png', 191519549, 1545453164654646, '0000-00-00', '0000-00-00'),
(7, 'asd', 'db/user_pic/normal_user.png', 1373970423, 0, '0000-00-00', '0000-00-00'),
(8, 'demo1', 'db/user_pic/normal_user.png', 1710248465, 9223372036854775807, '0000-00-00', '0000-00-00'),
(9, 'demo1', 'db/user_pic/normal_user.png', 1410699156, 9223372036854775807, '0000-00-00', '0000-00-00'),
(10, 'asdsadsa', 'db/user_pic/normal_user.png', 1516388712, 616416584684684, '0000-00-00', '0000-00-00'),
(11, '21423423', 'db/user_pic/normal_user.png', 2019919903, 432423423, '0000-00-00', '0000-00-00'),
(12, '324', 'db/user_pic/normal_user.png', 517009344, 23432423, '0000-00-00', '0000-00-00'),
(13, '23423', 'db/user_pic/normal_user.png', 1841667458, 5252, '0000-00-00', '0000-00-00'),
(14, '324234', 'db/user_pic/normal_user.png', 831445255, 23423423, '0000-00-00', '0000-00-00'),
(15, '2352352523', 'db/user_pic/normal_user.png', 1898263010, 523523, '0000-00-00', '0000-00-00'),
(16, '2342', '../../db/user_pic/Beautiful-beach-sea-waves-foam-top-view_2880x1800.jpg', 478655515, 35235235, '0000-00-00', '0000-00-00'),
(17, '346346', 'db/user_picBeautiful-beach-sea-waves-foam-top-view_2880x1800.jpg', 2057364692, 346346, '0000-00-00', '0000-00-00'),
(18, '235546456', 'db/user_pic/old-wooden-texture-background-vintage_55716-1138.jpg', 1548299412, 546456546, '0000-00-00', '0000-00-00'),
(19, 'มดแดง', 'db/user_pic/profile2.jpg', 1271012299, 18746121501256, '0000-00-00', '0000-00-00'),
(20, 'test', 'db/user_pic/old-wooden-texture-background-vintage_55716-1138.jpg', 1465763897, 1839901862565, '0000-00-00', '0000-00-00'),
(21, '115151', 'db/user_pic/Beautiful-beach-sea-waves-foam-top-view_2880x1800.jpg', 85811958, 15151515, '0000-00-00', '0000-00-00'),
(22, '213123', 'db/user_pic/123456789.jpg', 1831732717, 123123, '0000-00-00', '0000-00-00'),
(23, 'ศรชัย สมสกุล', 'db/user_pic/123456789.jpg', 1489907328, 1839901785619, '0000-00-00', '0000-00-00'),
(24, '1213', 'db/user_pic/normal_user.png', 1251904791, 4211211, '0000-00-00', '0000-00-00'),
(25, 'asfas', 'db/user_pic/normal_user.png', 900468666, 1213, '2019-12-24', '2019-12-31'),
(26, 'awrawr', 'db/user_pic/normal_user.png', 189578948, 353454353, '2019-02-01', '2019-12-31'),
(27, '445645', 'db/user_pic/123456789.jpg', 1298483241, 6456456, '6456-04-05', '2019-12-31'),
(28, '65216551511', 'db/user_pic/normal_user.png', 974478828, 6516516156, '2019-12-05', '2019-12-31'),
(29, '321351515155151515', 'db/user_pic/normal_user.png', 426954908, 15151511515, '0156-05-11', '2019-12-31'),
(30, '655151', 'db/user_pic/normal_user.png', 779910623, 51515151, '1515-05-15', '2019-12-31'),
(32, '151', 'db/user_pic/normal_user.png', 471793475, 515151, '0151-05-15', '2019-12-31'),
(33, '1515', 'db/user_pic/normal_user.png', 119708349, 5151515, '1515-12-05', '2019-12-31'),
(34, 'เชาวนะ สมสกุล', 'db/user_pic/80049454_1399569816884895_706770657064517632_o.jpg', 1030910921, 123456789000, '2517-12-01', '2019-12-31'),
(35, '2021321', 'db/user_pic/normal_user.png', 2027258799, 1231231321313135, '2510-12-05', '2020-01-04'),
(36, 'asdas', 'db/user_pic/normal_user.png', 2024667429, 131534315464, '0000-00-00', '2020-01-04'),
(37, '651515', 'db/user_pic/', 1464037143, 5515, '6222-02-22', '2020-01-04'),
(38, '16513546565', 'db/user_pic/Beautiful-beach-sea-waves-foam-top-view_2880x1800.jpg', 9531091, 4156741, '0000-00-00', '2020-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `user_pill`
--

CREATE TABLE `user_pill` (
  `id` int(11) NOT NULL,
  `symptome` text NOT NULL,
  `pill` text NOT NULL,
  `qr_id` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_pill`
--

INSERT INTO `user_pill` (`id`, `symptome`, `pill`, `qr_id`) VALUES
(1, 'yyyy', 'test1,มดแดง', 990627106);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pill`
--
ALTER TABLE `pill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pill`
--
ALTER TABLE `user_pill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pill`
--
ALTER TABLE `pill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_pill`
--
ALTER TABLE `user_pill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
