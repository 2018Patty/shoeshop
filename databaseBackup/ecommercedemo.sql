-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 03:51 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `email`, `password`, `address`, `gender`, `province`) VALUES
(1, 'Pattaraporn Warintarawej', 'pattaraporn.w@psu.ac.th', '123', 'มหาวิทยาลัยสงขลานครินทร์  วิทยาเขตสุราษฎร์ธานี คณะวิทยาศาสตร์และเทคโนโลยีอุตสาหกรรม  31 หมู่ 6', 'female', 'Surat Thani'),
(2, 'Peter Parker', 'pattaraporn.w@psu.ac.th', '456', 'มหาวิทยาลัยสงขลานครินทร์  วิทยาเขตสุราษฎร์ธานี คณะวิทยาศาสตร์และเทคโนโลยีอุตสาหกรรม  31 หมู่ 6', 'male', 'Bangkok'),
(3, 'Harry Porter', 'pattaraporn.w@psu.ac.th', '789', '15/43 หมู่ 2 ต.บางใบไม้', 'female', 'Surat Thani'),
(4, 'sfdsf', 'test@gmail.com', '123', 'sdfdsf', 'female', 'Surat Thani'),
(5, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `optiongroups`
--

CREATE TABLE `optiongroups` (
  `OptionGroupID` int(11) NOT NULL,
  `OptionGroupName` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `optiongroups`
--

INSERT INTO `optiongroups` (`OptionGroupID`, `OptionGroupName`) VALUES
(1, 'color'),
(2, 'size');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `OptionID` int(11) NOT NULL,
  `OptionGroupID` int(11) DEFAULT NULL,
  `OptionName` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`OptionID`, `OptionGroupID`, `OptionName`) VALUES
(1, 1, 'red'),
(2, 1, 'blue'),
(3, 1, 'green'),
(4, 2, 'S'),
(5, 2, 'M'),
(6, 2, 'L'),
(7, 2, 'XL'),
(8, 2, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `DetailID` int(11) NOT NULL,
  `DetailOrderID` int(11) NOT NULL,
  `DetailProductID` int(11) NOT NULL,
  `DetailName` varchar(250) COLLATE latin1_german2_ci NOT NULL,
  `DetailPrice` float NOT NULL,
  `DetailSKU` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `DetailQuantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`DetailID`, `DetailOrderID`, `DetailProductID`, `DetailName`, `DetailPrice`, `DetailSKU`, `DetailQuantity`) VALUES
(1, 1, 115, '', 3500, '', 2),
(2, 1, 117, '', 3500, '', 2),
(3, 2, 115, '', 3500, '', 2),
(4, 2, 117, '', 3500, '', 2),
(5, 3, 1, '', 9.99, '', 1),
(6, 3, 115, '', 3500, '', 2),
(7, 3, 117, '', 3500, '', 2),
(8, 4, 112, '', 3500, '', 2),
(9, 4, 115, '', 3500, '', 1),
(10, 5, 114, '', 3500, '', 1),
(11, 6, 114, '', 3500, '', 1),
(12, 7, 112, '', 3500, '', 2),
(13, 7, 115, '', 3500, '', 1),
(14, 8, 1, '', 9.99, '', 1),
(15, 9, 2, '', 179.99, '', 1),
(16, 10, 2, '', 179.99, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `OrderUserID` varchar(500) COLLATE latin1_german2_ci NOT NULL,
  `OrderAmount` float NOT NULL,
  `OrderShipName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `OrderShipAddress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `OrderShipAddress2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `OrderCity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `OrderState` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `OrderZip` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `OrderCountry` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `OrderPhone` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `OrderFax` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `OrderShipping` float NOT NULL,
  `OrderTax` float NOT NULL,
  `OrderEmail` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `OrderShipped` tinyint(1) NOT NULL DEFAULT 0,
  `OrderTrackingNumber` varchar(80) COLLATE latin1_german2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderUserID`, `OrderAmount`, `OrderShipName`, `OrderShipAddress`, `OrderShipAddress2`, `OrderCity`, `OrderState`, `OrderZip`, `OrderCountry`, `OrderPhone`, `OrderFax`, `OrderShipping`, `OrderTax`, `OrderEmail`, `OrderDate`, `OrderShipped`, `OrderTrackingNumber`) VALUES
(1, '0', 14000, ' ', '', '', '', 'Choose...', '', '', '', '', 0, 0, '', '2021-10-04 17:17:24', 0, NULL),
(2, '0', 14000, ' ', '', '', '', 'Choose...', '', '', '', '', 0, 0, '', '2021-10-04 17:18:02', 0, NULL),
(3, '0', 14010, ' ?????????', '15/43 ???? 2 ?.????????', '', '?????', 'Surat Thani', '84000', '', '0629749522', '', 0, 0, '', '2021-10-04 17:26:05', 0, NULL),
(4, '0', 10500, ' ?????????', '15/43 ???? 2 ?.????????', '', '?????', 'Surat Thani', '84000', '', '0629749522', '', 0, 0, '', '2021-10-04 17:30:37', 0, NULL),
(5, '0', 3500, '??????? ?????????', '15/43 ???? 2 ?.????????', '', '?????', 'Surat Thani', '84000', '', '0629749522', '', 0, 0, '', '2021-10-04 17:32:38', 0, NULL),
(6, '0', 3500, '??????? ?????????', '15/43 ???? 2 ?.????????', '', '?????', 'Surat Thani', '84000', '', '0629749522', '', 0, 0, '', '2021-10-04 17:34:13', 0, NULL),
(7, 'lisa', 10500, 'ภัทราพร Warintarawej', 'มหาวิทยาลัยสงขลานครินทร์  วิทยาเขตสุราษฎร์ธานี คณะวิทยาศาสตร์และเทคโนโลยีอุตสาหกรรม  31 หมู่ 6', 'ต.มะขามเตี้ย', 'อ.เมือง', 'Surat Thani', '84000', '', '0629749522', '', 0, 0, '', '2021-10-04 17:38:54', 0, NULL),
(8, 'lisa', 9.99, 'ภัทราพร วรินทรเวช', 'มหาวิทยาลัยสงขลานครินทร์  วิทยาเขตสุราษฎร์ธานี คณะวิทยาศาสตร์และเทคโนโลยีอุตสาหกรรม  31 หมู่ 6', 'ต.มะขามเตี้ย', 'อ.เมือง', 'Surat Thani', '84000', '', '0629749522', '', 0, 0, '', '2021-10-04 17:41:22', 0, NULL),
(9, 'test@gmail.com', 179.99, 'Pattaraporn Warintarawej', 'มหาวิทยาลัยสงขลานครินทร์  วิทยาเขตสุราษฎร์ธานี คณะวิทยาศาสตร์และเทคโนโลยีอุตสาหกรรม  31 หมู่ 6', '', 'อ.เมือง', 'Surat Thani', '84000', '', '', '', 0, 0, '', '2021-10-04 17:43:21', 0, NULL),
(10, 'lisa', 179.99, 'ภัทราพร วรินทรเวช', '15/43 หมู่ 2 ต.บางใบไม้', '', 'เมือง', 'Surat Thani', '84000', '', '0629749522', '', 0, 0, '', '2021-10-04 18:00:13', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Running'),
(2, 'Walking'),
(3, 'HIking'),
(4, 'Track and Trail'),
(5, 'Short Sleave'),
(6, 'Long Sleave');

-- --------------------------------------------------------

--
-- Table structure for table `productoptions`
--

CREATE TABLE `productoptions` (
  `ProductOptionID` int(10) UNSIGNED NOT NULL,
  `ProductID` int(10) UNSIGNED NOT NULL,
  `OptionID` int(10) UNSIGNED NOT NULL,
  `OptionPriceIncrement` double DEFAULT NULL,
  `OptionGroupID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `productoptions`
--

INSERT INTO `productoptions` (`ProductOptionID`, `ProductID`, `OptionID`, `OptionPriceIncrement`, `OptionGroupID`) VALUES
(1, 1, 1, 0, 1),
(2, 1, 2, 0, 1),
(3, 1, 3, 0, 1),
(4, 1, 4, 0, 2),
(5, 1, 5, 0, 2),
(6, 1, 6, 0, 2),
(7, 1, 7, 2, 2),
(8, 1, 8, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(12) NOT NULL,
  `ProductSKU` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `ProductName` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `ProductPrice` float NOT NULL,
  `ProductWeight` float NOT NULL,
  `ProductCartDesc` varchar(250) COLLATE latin1_german2_ci NOT NULL,
  `ProductShortDesc` varchar(1000) COLLATE latin1_german2_ci NOT NULL,
  `ProductLongDesc` text COLLATE latin1_german2_ci NOT NULL,
  `ProductThumb` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `ProductImage` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `ProductCategoryID` int(11) DEFAULT NULL,
  `ProductUpdateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ProductStock` float DEFAULT NULL,
  `ProductLive` tinyint(1) DEFAULT 0,
  `ProductUnlimited` tinyint(1) DEFAULT 1,
  `ProductLocation` varchar(250) COLLATE latin1_german2_ci DEFAULT NULL,
  `picProduct` varchar(100) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductSKU`, `ProductName`, `ProductPrice`, `ProductWeight`, `ProductCartDesc`, `ProductShortDesc`, `ProductLongDesc`, `ProductThumb`, `ProductImage`, `ProductCategoryID`, `ProductUpdateDate`, `ProductStock`, `ProductLive`, `ProductUnlimited`, `ProductLocation`, `picProduct`) VALUES
(1, '000-0001', 'Nike Air', 9.99, 3, 'Light Cotton T-Shirt', 'A rugged track and trail athletic shoe', 'A light cotton T-Shirt made with 100% real cotton.\r\n\r\nMade right here in the USA for over 15 years, this t-shirt is lightweight and durable.', '', '', 5, '2013-06-13 01:00:50', 100, 1, 0, NULL, 'h1.jpg'),
(2, '000-0004', 'Nike Air Force', 179.99, 8, 'Track and Trail', 'A rugged track and trail athletic shoe', 'A rugged track and trail athletic shoe', '', '', 4, '2013-07-25 19:04:36', NULL, 5, 1, NULL, 'h2.jpg'),
(112, '', 'Nike Air Force 1 07', 3500, 0, '', 'A rugged track and trail athletic shoe', '', '', '', 4, '2021-09-21 04:50:22', NULL, 10, 1, NULL, 'r2.jpg'),
(113, '', 'Nike Air Force 1 08', 2000, 0, '', 'A rugged track and trail athletic shoe', '', '', '', 5, '2021-09-21 04:51:13', NULL, 20, 1, NULL, 'h2.jpg'),
(114, '', 'Nike Air Force 1 09', 6000, 0, '', 'A rugged track and trail athletic shoe', '', '', '', 4, '2021-09-21 04:51:13', NULL, 5, 1, NULL, 'r4.jpg'),
(115, '', 'Nike Air Force 1 10', 7000, 0, '', 'A rugged track and trail athletic shoe', '', '', '', 5, '2021-09-21 04:51:13', NULL, 10, 1, NULL, 'r7.jpg'),
(116, '', 'Nike Air Force 1 11', 1900, 0, '', 'A rugged track and trail athletic shoe', '', '', '', 4, '2021-09-21 04:51:13', NULL, 10, 1, NULL, 'r2.jpg'),
(117, '', 'Nike Air Force 1 12', 2000, 0, '', 'A rugged track and trail athletic shoe', '', '', '', 5, '2021-09-21 04:51:13', NULL, 10, 1, NULL, 'r2.jpg'),
(118, '', 'Nike Air Force 1 13', 1300, 0, '', 'A rugged track and trail athletic shoe', '', '', '', 4, '2021-09-21 04:51:13', NULL, 1, 1, NULL, 'r2.jpg'),
(991, '', 'Test', 2000, 0, '', 'Test Product', '', '', '', NULL, '2021-09-27 09:55:12', NULL, 0, 1, NULL, 'w1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserEmail` varchar(500) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserPassword` varchar(500) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserFirstName` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserLastName` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserCity` varchar(90) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserState` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserZip` varchar(12) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserEmailVerified` tinyint(1) DEFAULT 0,
  `UserRegistrationDate` timestamp NULL DEFAULT current_timestamp(),
  `UserVerificationCode` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserIP` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserPhone` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserFax` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserCountry` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserAddress` varchar(100) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserAddress2` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `pic` varchar(100) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserEmail`, `UserPassword`, `UserFirstName`, `UserLastName`, `UserCity`, `UserState`, `UserZip`, `UserEmailVerified`, `UserRegistrationDate`, `UserVerificationCode`, `UserIP`, `UserPhone`, `UserFax`, `UserCountry`, `UserAddress`, `UserAddress2`, `pic`) VALUES
(1, 'test@gmail.com', '123', 'Nadech', 'Kugimiya', NULL, NULL, NULL, 0, '2020-10-16 02:49:57', NULL, NULL, '0991236547', NULL, NULL, NULL, NULL, 'nadech.jpg'),
(2, 'somchai', '456', 'Somchai', 'Jaidee', NULL, NULL, NULL, 0, '2021-09-13 10:55:46', NULL, NULL, '0991236547', NULL, NULL, NULL, NULL, 'somchai.jpg'),
(3, 'lisa', '123', 'Lalisa', 'Manpbal', 'Seoul', 'Korea', NULL, 0, '2021-09-14 03:59:28', NULL, NULL, '0991236547', NULL, NULL, NULL, NULL, 'lisa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `optiongroups`
--
ALTER TABLE `optiongroups`
  ADD PRIMARY KEY (`OptionGroupID`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`OptionID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `productoptions`
--
ALTER TABLE `productoptions`
  ADD PRIMARY KEY (`ProductOptionID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `optiongroups`
--
ALTER TABLE `optiongroups`
  MODIFY `OptionGroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `OptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productoptions`
--
ALTER TABLE `productoptions`
  MODIFY `ProductOptionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=992;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
