-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 03:29 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` int(11) NOT NULL,
  `ANAME` varchar(32) NOT NULL,
  `USERNAME` varchar(32) NOT NULL,
  `EMAIL_ID` varchar(32) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  `MOBILE_NO` varchar(16) NOT NULL,
  `ADMINREG_DATE` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `ANAME`, `USERNAME`, `EMAIL_ID`, `PASSWORD`, `MOBILE_NO`, `ADMINREG_DATE`) VALUES
(1, 'Manish', 'HH', 'manish@gmail.com', 'pass', '6361229187', '26-08-2021');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_NAME` varchar(32) NOT NULL,
  `CAT_CODE` varchar(32) NOT NULL,
  `POSTING_DATE` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CAT_ID`, `CAT_NAME`, `CAT_CODE`, `POSTING_DATE`) VALUES
(3, 'Bread', 'BD01', '2023-03-09'),
(2, 'Butter', 'BT01', '2023-03-09'),
(7, 'Ghee', 'GH01', '2023-03-09'),
(1, 'Milk', 'MK01', '2023-03-10'),
(4, 'Paneer', 'PN01', '2023-03-09'),
(8, 'Panner', 'PN01', '2023-03-19'),
(5, 'Soya', 'SY01', '2023-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `COMP_ID` int(11) NOT NULL,
  `COMP_NAME` varchar(32) NOT NULL,
  `POSTING_DATE` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`COMP_ID`, `COMP_NAME`, `POSTING_DATE`) VALUES
(1, 'Amul', '2023-03-14'),
(11, 'Ananda', '2023-03-19'),
(12, 'Gharwal', '2023-03-19'),
(2, 'Mother Diary', '2023-03-14'),
(4, 'Namaste India', '2023-03-14'),
(10, 'Paras', '2023-03-14'),
(3, 'Patanjali', '2023-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `INVOICE_NO` int(11) NOT NULL,
  `CUST_NAME` varchar(32) NOT NULL,
  `CUST_PHNO` varchar(16) NOT NULL,
  `PAYMENT_MODE` varchar(16) NOT NULL,
  `INVOICE_GEN_DATE` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`ID`, `P_ID`, `QUANTITY`, `INVOICE_NO`, `CUST_NAME`, `CUST_PHNO`, `PAYMENT_MODE`, `INVOICE_GEN_DATE`) VALUES
(1, 1, 1, 270491112, 'Anuj Kumar', '1425362541', 'cash', '2023-03-19'),
(2, 5, 1, 270491112, 'Anuj Kumar', '1425362541', 'cash', '2023-03-19'),
(3, 7, 1, 464760346, 'Rahul Kumar', '12345632145', 'cash', '2023-03-19'),
(4, 8, 1, 464760346, 'Rahul Kumar', '12345632145', 'cash', '2023-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_ID` int(11) NOT NULL,
  `PROD_NAME` varchar(32) NOT NULL,
  `PROD_PRICE` int(11) NOT NULL,
  `CAT_NAME` varchar(32) NOT NULL,
  `COMP_NAME` varchar(32) NOT NULL,
  `POSTING_DATE` varchar(16) NOT NULL,
  `UPDATION_DATE` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `PROD_NAME`, `PROD_PRICE`, `CAT_NAME`, `COMP_NAME`, `POSTING_DATE`, `UPDATION_DATE`) VALUES

(2, 'Toned milk 1ltr', 42, 'Milk', 'Amul', '2023-03-19', '2023-03-19'),
(3, 'Full Cream Milk 500ml', 26, 'Milk', 'Mother Diary', '2023-03-19', NULL),
(4, 'Full Cream Milk 1ltr', 50, 'Milk', 'Mother Diary', '2023-03-19', NULL),
(5, 'Butter 100mg', 46, 'Butter', 'Amul', '2023-03-19', NULL),
(6, 'Sandwich Bread', 30, 'Bread', 'Patanjali', '2023-03-19', '2023-03-19'),
(7, 'Ghee 500mg', 350, 'Ghee', 'Paras', '2023-03-19', NULL),
(8, 'Paneer 250gm', 80, 'Panner', 'Ananda', '2023-03-19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CAT_NAME`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`COMP_NAME`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `one` (`P_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_ID`,`PROD_NAME`),
  ADD KEY `two` (`COMP_NAME`),
  ADD KEY `three` (`CAT_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `one` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `three` FOREIGN KEY (`CAT_NAME`) REFERENCES `category` (`CAT_NAME`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `two` FOREIGN KEY (`COMP_NAME`) REFERENCES `company` (`COMP_NAME`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
