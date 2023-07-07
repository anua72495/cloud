-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2023 at 06:04 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `UserName` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `Password`) VALUES
('a', 'a'),
('admin', 'admin'),
('cons', 'cons');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerId` varchar(20) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PinCode` varchar(6) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`CustomerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerId`, `CustomerName`, `Street`, `Address`, `City`, `PinCode`, `Mobile`, `Phone`, `EmailId`, `Password`) VALUES
('1', 'Arun', 'Big Street', '100, Opp K1 Theatre', 'Bhavani', '638203', '9898983434', '0424222333', 'softproms@gmail.com', 'aaa'),
('2', 'Radhika', 'Ramu st', '23, kamala complex', 'Erode', '645201', '8324873247', '0424222345', 'radhika@gmail.com', 'aAA'),
('3', 'Ganesh', 'Devagi st', '56, Moorthi complex', 'Erode', '654321', '9834782746', '0424222346', 'ganesh@gmail.com', 'aaa'),
('4', 'Saranya', 'Anna st', '35A, sri complex', 'Erode', '643522', '9832736533', '0424222346', 'saranya@gmail.com', 'aaa'),
('5', 'Nandhini', 'Anna st', '45, sri complex', 'Erode', '654234', '8763435612', '0424222346', 'nandhini@gmail.com', 'aaa'),
('6', 'KARTHIKA', 'ANNA ST', '35A, ANNA COMPLEX', 'ERODE', '643252', '9898987633', '0424222346', 'karthika@gmail.com', 'aaa'),
('7', 'Ramakrishnan', 'RR Lodge', '12, Sathy Road', 'Erode', '638001', '9090908981', '22556791', 'ramakrish1@gmail.com', 'aaa'),
('8', 'a', 'a', 'a', 'a', '908989', '9090898989', '343423', 'c@c.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `EnquiryId` int NOT NULL,
  `EnquiryDate` date NOT NULL,
  `ContactName` varchar(30) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `EnquiryDescription` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`EnquiryId`, `EnquiryDate`, `ContactName`, `Street`, `Address`, `City`, `Mobile`, `Phone`, `EmailId`, `EnquiryDescription`) VALUES
(1, '2023-04-30', 'Karthika', '35a, Anna st', 'Near Royal Theatre', 'Erode', '9898987633', '0424222346', 'karthi@gmail.com', 'Rate of the banaras saree'),
(2, '2023-04-30', 'Karthika', '35a, Anna st', 'Near Royal Theatre', '638203', '9898987633', '0424222346', 'karthi@gmail.com', 'Rate of the samutrika saree'),
(3, '2023-04-30', 'KARTHIKA&CO', 'ANNA ST', '35, Anna Complex', 'Erode', '9898987633', '0424222346', 'karthi@gmail.com', 'What is the discount % for banaras'),
(4, '2023-04-30', 'KARTHIKA&CO', 'ANNA ST', '100, Anna Complex', 'Erode', '9898987633', '2298756', 'karthi@gmail.com', 'What is the discount % for banaras saree');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `ItemCode` varchar(20) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Category` varchar(10) NOT NULL,
  `PurchaseRate` decimal(10,0) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`ItemCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemCode`, `ItemName`, `Description`, `Category`, `PurchaseRate`, `Photo`, `qty`) VALUES
('R1', 'Lehanka 1', 'Youthful appearance', 'Women Wear', '2000', '1.jpg', 99),
('R2', 'Lehanka 2', 'For Working Professionals', 'Women Wear', '5000', '2.jpg', 100),
('M3', 'Lehanka 3', 'For working', 'Women Wear', '1200', '3.jpg', 100),
('M4', 'Lehanka 4', 'For youths', 'Women Wear', '200', '4.jpg', 99),
('C1', 'Lehanka 5', 'For kids', 'Women Wear', '1500', '5.jpg', 100),
('W001', 'Tube top', 'For middle Age', 'Women Wear', '250', 'w1.jpg', 200);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `OrderNo` int NOT NULL,
  `OrderDate` date NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `ProductId` varchar(20) NOT NULL,
  `Quantity` double NOT NULL,
  `Price` double NOT NULL,
  `Total` double NOT NULL,
  `Approved` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderNo`, `OrderDate`, `UserName`, `ProductId`, `Quantity`, `Price`, `Total`, `Approved`) VALUES
(1, '2022-03-30', '1', 'R2', 2, 21000, 42000, 'Approved'),
(1, '2022-03-30', '1', 'R1', 1, 29000, 29000, 'Approved'),
(2, '2022-03-30', '1', 'R2', 2, 21000, 42000, 'Pending'),
(2, '2022-03-30', '1', 'R1', 1, 29000, 29000, 'Pending'),
(3, '2022-03-30', '1', 'M4', 1, 28000, 28000, 'Pending'),
(4, '2022-04-20', '1', 'R2', 1, 21000, 21000, 'Pending'),
(4, '2022-04-20', '1', 'M4', 1, 28000, 28000, 'Pending'),
(5, '2022-05-10', '1', 'R2', 2, 21000, 42000, 'Approved'),
(5, '2022-05-10', '1', 'BS', 1, 100, 100, 'Approved'),
(6, '2023-06-23', '1', 'R2', 1, 21000, 21000, 'Pending'),
(6, '2023-06-23', '1', 'R1', 1, 29000, 29000, 'Pending'),
(7, '2023-06-24', '1', 'R2', 2, 5000, 10000, 'Approved'),
(7, '2023-06-24', '1', 'M4', 1, 200, 200, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentNo` int NOT NULL,
  `PaymentDate` date NOT NULL,
  `SupplierId` varchar(20) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `PaymentMode` varchar(10) NOT NULL,
  `Details` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentNo`, `PaymentDate`, `SupplierId`, `Amount`, `PaymentMode`, `Details`) VALUES
(1, '2023-04-18', '1', '1000', 'Cash', 'Cash Paid'),
(1, '2023-04-18', '1', '1000', 'Cash', 'Cash Paid'),
(3, '2023-04-30', '2', '5000', 'Cash', 'Cash Pid'),
(4, '2023-04-30', '3', '7000', 'Cash', 'Cash Paid'),
(5, '2023-04-30', '1', '7800', 'Cash', 'Cash Paid'),
(6, '2022-03-11', '2', '100', 'Cash', '-'),
(7, '2022-05-10', '1', '10000', 'Cash', 'Paid'),
(8, '2023-06-23', '1', '1000', 'Cash', 'paid'),
(9, '2023-06-24', '1', '2500', 'Cheque', 'Ref No: 565654');

-- --------------------------------------------------------

--
-- Table structure for table `purchasemaster`
--

DROP TABLE IF EXISTS `purchasemaster`;
CREATE TABLE IF NOT EXISTS `purchasemaster` (
  `BillNo` int NOT NULL,
  `BillDate` date NOT NULL,
  `SupplierId` varchar(20) NOT NULL,
  `NetAmount` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasemaster`
--

INSERT INTO `purchasemaster` (`BillNo`, `BillDate`, `SupplierId`, `NetAmount`) VALUES
(1, '2023-04-18', '1', '676'),
(2, '2023-04-30', '2', '473'),
(3, '2023-04-30', '3', '676'),
(4, '2023-04-30', '4', '1014'),
(5, '2023-04-30', '3', '676'),
(6, '2022-03-11', '1', '3016000'),
(7, '2022-03-11', '1', '603200'),
(8, '2022-03-11', '1', '218400'),
(9, '2022-04-20', '1', '3016000'),
(10, '2022-05-02', '1', '20800'),
(11, '2022-05-02', '1', '3120'),
(12, '2022-05-10', '1', '276640'),
(13, '2023-06-24', '2', '104000');

-- --------------------------------------------------------

--
-- Table structure for table `purchasetrans`
--

DROP TABLE IF EXISTS `purchasetrans`;
CREATE TABLE IF NOT EXISTS `purchasetrans` (
  `BillNo` int NOT NULL,
  `SNo` int NOT NULL,
  `ItemCode` varchar(20) NOT NULL,
  `Quantity` int NOT NULL,
  `Rate` decimal(10,0) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Tax` decimal(10,0) NOT NULL,
  `TaxValue` decimal(10,0) NOT NULL,
  `Nettotal` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasetrans`
--

INSERT INTO `purchasetrans` (`BillNo`, `SNo`, `ItemCode`, `Quantity`, `Rate`, `Amount`, `Tax`, `TaxValue`, `Nettotal`) VALUES
(1, 1, 'R1', 10, '65', '650', '4', '26', '676'),
(2, 1, 'R2', 7, '65', '455', '4', '18', '473'),
(3, 1, 'R1', 10, '65', '650', '4', '26', '676'),
(4, 1, 'R1', 15, '65', '975', '4', '39', '1014'),
(5, 1, 'R1', 15, '65', '975', '4', '26', '676'),
(6, 1, 'R2', 100, '21000', '2100000', '4', '116000', '3016000'),
(7, 1, 'R1', 10, '29000', '290000', '4', '11600', '301600'),
(7, 2, 'R2', 10, '21000', '210000', '4', '11600', '301600'),
(8, 1, 'R2', 10, '21000', '210000', '4', '8400', '218400'),
(9, 1, 'R1', 100, '29000', '2900000', '4', '116000', '3016000'),
(10, 1, 'BS', 100, '100', '10000', '4', '400', '10400'),
(10, 1, 'BS', 100, '100', '10000', '4', '400', '10400'),
(11, 1, 'BS', 15, '100', '1500', '4', '60', '1560'),
(11, 2, 'BS', 15, '100', '1500', '4', '60', '1560'),
(12, 1, 'R2', 10, '21000', '210000', '4', '8400', '218400'),
(12, 2, 'M4', 2, '28000', '56000', '4', '2240', '58240'),
(13, 1, 'W001', 200, '250', '50000', '4', '2000', '52000'),
(13, 2, 'W001', 200, '250', '50000', '4', '2000', '52000');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `ReceiptNo` int NOT NULL,
  `ReceiptDate` date NOT NULL,
  `CustomerId` varchar(20) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `ReceiptMode` varchar(10) NOT NULL,
  `Details` varchar(200) NOT NULL,
  PRIMARY KEY (`ReceiptNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`ReceiptNo`, `ReceiptDate`, `CustomerId`, `Amount`, `ReceiptMode`, `Details`) VALUES
(1, '2023-04-18', '1', '2500', 'Cash', 'Cash Received'),
(2, '2023-04-18', '1', '2500', 'Cash', 'Cash Received'),
(3, '2023-04-30', '2', '8000', 'Cash', 'Cash Received'),
(4, '2023-04-30', '4', '80000', 'Cash', 'Cash Received'),
(5, '2023-04-30', '5', '80000', 'Cash', 'Cash Received'),
(6, '2022-03-11', '1', '1000', 'Cash', '-'),
(7, '2022-05-10', '1', '2000', 'Cheque', 'SBi.No. 234567');

-- --------------------------------------------------------

--
-- Table structure for table `salesmaster`
--

DROP TABLE IF EXISTS `salesmaster`;
CREATE TABLE IF NOT EXISTS `salesmaster` (
  `BillNo` int NOT NULL,
  `BillDate` date NOT NULL,
  `CustomerId` varchar(20) NOT NULL,
  `NetAmount` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesmaster`
--

INSERT INTO `salesmaster` (`BillNo`, `BillDate`, `CustomerId`, `NetAmount`) VALUES
(1, '2023-04-18', '1', '6760'),
(2, '2023-04-18', '1', '6760'),
(3, '2023-04-30', '2', '33800'),
(4, '2023-04-30', '3', '67600'),
(5, '2022-03-11', '1', '218400'),
(6, '2022-05-10', '1', '30160'),
(7, '2023-06-23', '1', '301600'),
(8, '2023-06-24', '1', '2600');

-- --------------------------------------------------------

--
-- Table structure for table `salestrans`
--

DROP TABLE IF EXISTS `salestrans`;
CREATE TABLE IF NOT EXISTS `salestrans` (
  `BillNo` int NOT NULL,
  `SNo` int NOT NULL,
  `ItemCode` varchar(20) NOT NULL,
  `Quantity` int NOT NULL,
  `Rate` decimal(10,0) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Tax` decimal(10,0) NOT NULL,
  `TaxValue` decimal(10,0) NOT NULL,
  `Nettotal` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salestrans`
--

INSERT INTO `salestrans` (`BillNo`, `SNo`, `ItemCode`, `Quantity`, `Rate`, `Amount`, `Tax`, `TaxValue`, `Nettotal`) VALUES
(1, 1, 'Saree1', 1, '6500', '6500', '4', '260', '6760'),
(2, 1, 'Saree1', 1, '6500', '6500', '4', '260', '6760'),
(3, 1, 'Saree2', 5, '6500', '32500', '4', '1300', '33800'),
(4, 1, 'Saree2', 10, '6500', '65000', '4', '2600', '67600'),
(5, 1, 'R2', 10, '21000', '210000', '4', '8400', '218400'),
(6, 1, 'R1', 1, '29000', '29000', '4', '1160', '30160'),
(7, 1, 'R1', 10, '29000', '290000', '4', '11600', '301600'),
(8, 1, 'W001', 10, '250', '2500', '4', '100', '2600');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `SupplierId` varchar(20) NOT NULL,
  `SupplierName` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PinCode` varchar(6) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`SupplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierId`, `SupplierName`, `Street`, `Address`, `City`, `PinCode`, `Mobile`, `Phone`, `EmailId`, `Password`) VALUES
('1', 'Suganthi Traders', '23, Big Street', 'Near K1 Theatre', 'Bhavani', '638203', '9898987676', '04256455543', 'suganthi@gmail.com', 'aaa'),
('2', 'KARTHIKA&CO', 'ANNA ST', 'NEAR ROYAL THEATER', 'ERODE', '638001', '9898987633', '0424222344', 'karthikaandco@gmail.com', ''),
('3', 'RADHA&CO', 'BHARATHI ST', '35, ANNA COLONY', 'ERODE', '638003', '9898767678', '042453434343', 'radhaandco@gmail.com', 'a'),
('4', 'Ram Traders', 'Big Street', '23, Near Royal Theatre', 'Erode', '638001', '9945345454', '3434343423', 'ramtraders@gmail.com', ''),
('5', 'Ram wood works and co', 'RR Lodge', '10, Sathy Road, Erode', 'Erode', '638001', '9878676778', '22556789', 'ramwoodworks@gmail.com', ''),
('6', 'a', 'a', 'a', 'a', '111111', '9090898989', '1212121212', 'a@a.com', ''),
('7', 'a', 'a', 'a', 'a', '909090', '7667676767', '3423423423', 'a@b.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

DROP TABLE IF EXISTS `test1`;
CREATE TABLE IF NOT EXISTS `test1` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`UserName`, `Password`) VALUES
('admin', 'admin'),
('swetha', 'swetha');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
