-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 07:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', '1', '1', '1', '1'),
(2, 'Admin', '1', NULL, '1', '1'),
(3, 'User', NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_out`
--

CREATE TABLE `store_out` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `item` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `itemsoutvalue` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_stock`
--

CREATE TABLE `store_stock` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `item` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `rate` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `quantity_remaining` varchar(500) NOT NULL,
  `itemvalue` int(15) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_stock`
--

INSERT INTO `store_stock` (`id`, `date`, `item`, `quantity`, `rate`, `total`, `quantity_remaining`, `itemvalue`, `status`) VALUES
(1, '2022-03-14', 'PRECUT CHICKEN - 500 GM', '', '699', '3495', '5', 3495, '1'),
(2, '2022-03-14', '12 EGGS - ECONOMY PACK', '', '649', '32450', '50', 32450, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `Staffid` int(10) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Photo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(2, 1002, 'Admin', 'admin', 'Nikhil', 'Bhalerao', 9423979339, 'ndbhalerao91@gmail.com', 1, 'nikhil.png', '21232f297a57a5a743894a0e4a801fc3', '2022-03-15 10:18:39'),
(9, 1003, 'Admin', 'staff', 'Raghav', 'Jain', 9090909090, 'raghav@gmail.com', 1, 'pic_3.jpg', '25d55ad283aa400af464c76d713c07ad', '2022-03-15 10:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CategoryCode` varchar(50) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `CategoryCode`, `PostingDate`) VALUES
(1, 'EGGS', 'RKF-001', '2022-03-13 18:28:24'),
(2, 'CHICKEN', 'RKF-002', '2022-03-13 18:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyemail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyphone` text NOT NULL,
  `companyaddress` varchar(255) CHARACTER SET latin1 NOT NULL,
  `companylogo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `status` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `developer` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `regno`, `companyname`, `companyemail`, `country`, `companyphone`, `companyaddress`, `companylogo`, `status`, `developer`, `creationdate`) VALUES
(4, '3422232443223', 'RED COCKFARM', 'redcockfarm@gmail.com', 'India', '+919423979339', 'Maharashtra', 'poultrylogo.jpeg', '1', 'GRANT IKECHUKWU', '2021-02-02 12:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblitems`
--

CREATE TABLE `tblitems` (
  `id` int(11) NOT NULL,
  `item` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblitems`
--

INSERT INTO `tblitems` (`id`, `item`, `description`, `Creationdate`) VALUES
(1, 'PRECUT CHICKEN - 500 GM', 'Serving Weight/Egg: 900/500 gm It comes in ‘food-grade foil bag packaging with 900gm (Approx.) free-range KADAKNATH pre-cut chicken. Cooking Guidelines: Kadaknath chicken has lean meat with very low-fat content. Hence, it is best served in a curry or masa', '2022-03-13 18:36:52'),
(2, '12 EGGS - ECONOMY PACK', 'Serving Weight/Egg: 40-50g (Approx.) It comes in ‘food-grade paper pulp packaging with 12 free-range KADAKNATH eggs. High Protein | Low Fat | Low Cholesterol | Rich Iron Source Higher Levels of - 18 essential Amino Acids & Hormones, Vitamins B1, B2, B6, B', '2022-03-13 18:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `CustomerName` varchar(150) DEFAULT NULL,
  `CustomerContactNo` bigint(12) DEFAULT NULL,
  `PaymentMode` varchar(100) DEFAULT NULL,
  `InvoiceGenDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`id`, `ProductId`, `Quantity`, `InvoiceNumber`, `CustomerName`, `CustomerContactNo`, `PaymentMode`, `InvoiceGenDate`) VALUES
(1, 1, 10, 789218424, 'Suraj Jain', 9423979339, 'cash', '2022-03-13 18:38:29'),
(2, 2, 6, 789218424, 'Suraj Jain', 9423979339, 'cash', '2022-03-13 18:38:30'),
(3, 4, 10, 789218424, 'Suraj Jain', 9423979339, 'cash', '2022-03-13 18:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductImage` varchar(255) DEFAULT NULL,
  `ProductPrice` decimal(10,0) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `CategoryName`, `ProductName`, `ProductImage`, `ProductPrice`, `PostingDate`, `UpdationDate`) VALUES
(1, 'EGGS', 'WHOLE EGG POWDER (50 gm)', '714Ml7MS8wL._SL1500_.jpg', '499', '2022-03-13 18:29:45', NULL),
(2, 'EGGS', 'READY TO COOK - OMELET POWDER (50 gm)', 'fd.jpg', '299', '2022-03-13 18:34:00', NULL),
(3, 'CHICKEN', 'WHOLE CHICKEN - 900 GM', '71pfC4X8s1L._SX679_.jpg', '699', '2022-03-13 18:34:46', NULL),
(4, 'CHICKEN', 'PRECUT CHICKEN - 900 GM', 'WHOLE-CHICKEN---900-GM.jpg', '677', '2022-03-13 18:35:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_out`
--
ALTER TABLE `store_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_stock`
--
ALTER TABLE `store_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblitems`
--
ALTER TABLE `tblitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_out`
--
ALTER TABLE `store_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_stock`
--
ALTER TABLE `store_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblitems`
--
ALTER TABLE `tblitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
