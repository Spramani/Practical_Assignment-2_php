-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 04:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`categoryid`, `categoryname`) VALUES
(13, 'T-Shirt'),
(16, 'Shirts'),
(18, 'Ethinic Wear'),
(19, 'Jewellery');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `productid` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`productid`, `productname`, `categoryid`, `price`, `image`) VALUES
(38, 'T-Shirt(Hoodie)', 13, 499, 'upload/ad1.2.jpg'),
(39, 'Silk Saree', 18, 599, 'upload/ad2.1.jpg'),
(40, 'Lady T-Shirt', 13, 399, 'upload/ad2.2.jpg'),
(41, 'Allen Solly Shirt', 16, 599, 'upload/ad2.3.jpg'),
(42, 'Necklace', 19, 199, 'upload/ad1.1.jpg'),
(43, 'Fash necklace', 19, 199, 'upload/j1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `Firstname`, `Lastname`, `Username`, `Password`, `DOB`, `Role`) VALUES
(1, 'Trax', 'King', 'tk@admin.com', 'admin123', '05/12/1998', 'Admin'),
(2, 'Raj', 'Singh', 'raj@gmail.com', 'raj@123', '12/12/2000', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `tblproduct_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `tblcategory` (`categoryid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
