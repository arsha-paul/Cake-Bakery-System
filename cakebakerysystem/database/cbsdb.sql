-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 10:49 AM
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
-- Database: `cbsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 7894561238, 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-04-05 07:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblbaker`
--

CREATE TABLE `tblbaker` (
  `bname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobno` bigint(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbaker`
--

INSERT INTO `tblbaker` (`bname`, `email`, `mobno`, `password`) VALUES
('Rakesh', 'r@gmail.com', 4444444444, 'cbs@4444'),
('Sithara', 's@gmail.com', 2222222222, 'cbs@2222');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(5) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(3, 'Eggless Cake', '2019-04-05 10:36:01'),
(4, 'Kids Cake', '2019-04-05 10:36:25'),
(5, 'Photo Cake', '2019-04-05 10:36:35'),
(6, 'Premium Cake', '2019-04-05 10:36:47'),
(7, 'Cup Cake', '2019-04-05 10:43:13'),
(8, 'First Birthday Cake', '2019-04-05 10:43:45'),
(9, 'Midnight Cake', '2019-04-24 05:43:08'),
(10, 'First Anniversary Cake', '2019-05-06 16:36:16'),
(12, 'abc', '2021-07-16 12:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblcdetails`
--

CREATE TABLE `tblcdetails` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcdetails`
--

INSERT INTO `tblcdetails` (`id`, `cid`, `status`, `email`) VALUES
(7, 3, 4, 'r@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustorder`
--

CREATE TABLE `tblcustorder` (
  `cid` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `flavour` varchar(30) NOT NULL,
  `shape` varchar(30) NOT NULL,
  `layer` varchar(30) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `writing` varchar(100) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `weight` varchar(30) NOT NULL,
  `ddate` date NOT NULL,
  `odate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `price` int(11) DEFAULT 0,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustorder`
--

INSERT INTO `tblcustorder` (`cid`, `category`, `flavour`, `shape`, `layer`, `image`, `writing`, `quantity`, `weight`, `ddate`, `odate`, `status`, `price`, `userid`) VALUES
(3, 'Kids Cake', 'Chocolate', 'Rectangle', 'Three Tier', NULL, 'hhhh', 2, '500 gm', '2022-10-11', '2022-10-08 18:49:45', 1, 1000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tblfood`
--

CREATE TABLE `tblfood` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `ItemName` varchar(120) DEFAULT NULL,
  `ItemPrice` varchar(120) DEFAULT NULL,
  `ItemDes` varchar(500) DEFAULT NULL,
  `Image` varchar(120) DEFAULT NULL,
  `ItemQty` varchar(120) DEFAULT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`ID`, `CategoryName`, `ItemName`, `ItemPrice`, `ItemDes`, `Image`, `ItemQty`, `Weight`, `CreationDate`) VALUES
(1, 'Eggless Cake', 'Black Forest Cake', '20', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '1d60fc8c392da1803c14cfb6727dae14.jpg', '1 pcs', '500 gm', '2021-07-07 11:59:35'),
(2, 'Eggless Cake', 'Tom And Jerry Birthday Cake', '15', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '7816ec6d8e570a5511550cce1dc2aaee.jpg', '1', '2 kg', '2021-07-07 13:00:49'),
(3, 'Eggless Cake', 'Irish Coffee Cake', '19', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '66a6f0dc19c2a2257b8a9691abd9b015.jpg', '1', '2 kg', '2021-07-07 13:02:46'),
(4, 'Kids Cake', 'Happier Mickey N Minnie Cake', '50', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '897e767e9e8d96288b5db4fbb4e30c5a.jpg', '1', '3 kg', '2021-07-09 05:18:29'),
(5, 'Photo Cake', 'Photo Cake For Kid', '120', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '6f50cca00399837edf75d3b8d7998932.jpg', '1', '4 kg', '2021-07-09 05:20:05'),
(6, 'Premium Cake', 'Indulging Pineapple Cake', '55', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '812dc257444fc21da4c01aabe3dfedc8jpeg', '1', '2 kg', '2021-07-09 05:21:30'),
(7, 'Premium Cake', 'Fantastic Chocolate Cake', '25', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', '1', '1.5 kg', '2021-07-09 05:22:45'),
(8, 'Cup Cake', '4 Chocolate Cupcake', '20', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '51f2e276b44316f2202402e5075579a5.jpg', '4 pcs', '500 gm', '2021-07-09 05:24:51'),
(9, 'First Birthday Cake', 'Jungle Theme Cake', '100', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', 'bb0248cc8639e76969a01523158357f5jpeg', '1', '4 kg', '2021-07-09 05:27:25'),
(10, 'First Birthday Cake', 'Farm Cake', '58', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', 'e6f0ef529bb9dd0807c98112739b5f36.jpg', '1', '3 kg', '2021-07-09 05:30:05'),
(11, 'Midnight Cake', 'Love Harbinger Cake', '50', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '00f943a85103630af16dbe2f7aff194bjpeg', '1', '2 kg', '2021-07-09 05:32:02'),
(12, 'Midnight Cake', 'Choco Gem Fusion Cake', '25', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '1e6ae4ada992769567b71815f124fac5.jpg', '1', '1.5 kg', '2021-07-09 05:33:28'),
(13, 'First Anniversary Cake', 'Delicious Anniversary Poster Cake', '50', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '88374bcd74aa4b4f14257d9ec926965a.jpg', '1', '2 kg', '2021-07-09 05:36:02'),
(14, 'First Anniversary Cake', 'Anniversary Fusion Red Velvet And Chocolate Cake', '90', 'This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', 'efc1a80c391be252d7d777a437f86870.jpg', '1', '2 kg', '2021-07-09 05:37:26'),
(15, 'Photo Cake', 'Photo Cake Custom', '20', '                                                    This is for testing purposes.  This is for testing purposes.  This is for testing purposes. This is for testing purposes.  This is for testing purposes.  This is for testing purposes.', '00f943a85103630af16dbe2f7aff194bjpeg', '1', '1 kg', '2021-07-16 12:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodtracking`
--

CREATE TABLE `tblfoodtracking` (
  `ID` int(10) NOT NULL,
  `OrderId` char(50) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `status` char(50) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblorderaddresses`
--

CREATE TABLE `tblorderaddresses` (
  `ID` int(11) NOT NULL,
  `UserId` char(100) DEFAULT NULL,
  `Ordernumber` char(100) DEFAULT NULL,
  `Flatnobuldngno` varchar(255) DEFAULT NULL,
  `StreetName` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Landmark` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `OrderFinalStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `ID` int(11) NOT NULL,
  `UserId` char(10) DEFAULT NULL,
  `FoodId` char(10) DEFAULT NULL,
  `IsOrderPlaced` int(11) DEFAULT NULL,
  `OrderNumber` char(100) DEFAULT NULL,
  `CashonDelivery` varchar(100) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<p class=\"MsoNormal\"><span style=\"font-size: 11.5pt; line-height: 115%; font-family: Roboto; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">We provide you a trustworthy and convenient platform\r\nto choose best gift for your family, friends etc. for every occasion like\r\nbirthdays, anniversaries, marriage, love, farewell and many more. We offer wide\r\nrange of products in various categories like cakes, egg-less cakes, drawing\r\ncakes, 3D cakes, photo cakes, collectibles, chocolates, bouquet, flowers bunch,\r\nsoft toys, greeting cards, candles, photo frames, handicrafts etc. We also\r\ncustomize gifts according to customer wish.</span></p>', NULL, NULL, '2021-07-16 06:44:44'),
(2, 'contactus', 'Contact Us', '                #xxxxxxxxxxxxxxxx<div>xxxxxxxxxxxxxxxxxxx</div>', 'abc@gmail.com', 9999999999, '2022-10-06 05:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscriber`
--

CREATE TABLE `tblsubscriber` (
  `ID` int(5) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `DateofSub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(9, 'Yedu', 'v.s', 'yedu.india@gmail.com', 8907320444, '198c4e83d2c85af35e7f29d1e5fa6500', '2022-10-08 09:02:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbaker`
--
ALTER TABLE `tblbaker`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tblcdetails`
--
ALTER TABLE `tblcdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcustorder`
--
ALTER TABLE `tblcustorder`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblfood`
--
ALTER TABLE `tblfood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfoodtracking`
--
ALTER TABLE `tblfoodtracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`Ordernumber`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`FoodId`,`OrderNumber`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcdetails`
--
ALTER TABLE `tblcdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcustorder`
--
ALTER TABLE `tblcustorder`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblfood`
--
ALTER TABLE `tblfood`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblfoodtracking`
--
ALTER TABLE `tblfoodtracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
