-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2017 at 02:09 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminUser` varchar(30) NOT NULL,
  `AdminPass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminUser`, `AdminPass`) VALUES
('a', 'a'),
('b', 'b'),
('c', 'c'),
('d', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE IF NOT EXISTS `agency` (
  `AgencyId` varchar(20) NOT NULL,
  `AgencyName` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PinCode` varchar(10) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `EMailId` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`AgencyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`AgencyId`, `AgencyName`, `Street`, `Address`, `City`, `PinCode`, `Phone`, `Mobile`, `EMailId`, `Password`) VALUES
('1', 'a', 's', 'ad', 'c', '121212', '56565656', '5656565656', 'a@a.com', 'a'),
('10', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', ''),
('11', 'a', 'a', 'a', 'a', 'a', 'a', '8998989898', 'a', 'ty'),
('12', '', 'erode', 'erdoe', '1111111', '638001', '1111111111', '1111111111', 'a@gmail.com', '1111111'),
('2', 'Bharath', 'ASB', 'erode', 'erode', '638003', '042465989', '9898989898', 'a@gmail.com', '123456'),
('3', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
('4', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', ''),
('5', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', ''),
('6', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '11'),
('7', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
('8', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', ''),
('9', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerCode` varchar(10) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `DateOfCreation` date NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PinCode` varchar(10) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `EMailId` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`CustomerCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerCode`, `CustomerName`, `DateOfCreation`, `Street`, `Address`, `City`, `PinCode`, `Phone`, `Mobile`, `EMailId`, `Password`) VALUES
('10', 'a', '2017-09-20', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', '44'),
('1010', 'Senthil', '2010-03-08', 'VOC ', 'Erode', 'Erode', '638001', '', '9812763456', 'a@a.com', '123'),
('11', 'GOWDHAM', '2010-01-29', 'VOC', 'PARANGIPETTAI', 'CHIDAMBARAM', '608502', '04144253456', '9894686168', 'GOWDHAM@LIVE.COM', 'aa'),
('12', 'ms', '2009-10-10', 'voc street', 'erode', 'erode', '608502', '04241234', '9629551590', 'mgm@gmail.com', 'mgm'),
('14', 'ms', '2009-10-10', 'voc street', 'erode', 'erode', '608502', '04241234', '9629551590', 'ms@gmail.com', 'mgm'),
('15', 'a111111', '2017-09-25', 'aa', 'aa', 'aaaa', '638001', '9999999999', '9999999999', 'a@gmail.com', '111111'),
('32', 'a', '2017-09-20', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', ''),
('38', 'a', '2017-09-20', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', ''),
('5', 'e', '2017-09-16', '', 'ee', 'e', '334344', '34', '8989898989', 'a@a.com', 'a'),
('58', 'a', '2017-09-20', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', '22'),
('6', 'f', '2017-09-17', '', 'f', 'c', '121212', '213234', '6767676767', 'a@a.com', 'a'),
('60', 'a', '2017-09-20', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', ''),
('7', 'c', '2017-09-17', '', 's', 's', '121212', '56565656', '5656565656', 'a@a.com', 'a'),
('8', 'Siva', '2017-09-17', '', 'erode', 'ERODE', '638003', '04245689', '9865326598', 'a@gmail.com', 'aaaaaa'),
('9', 'a', '2017-09-20', '', 'a', 'a', 'a', 'a', 'a', 'aa', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `MaterialId` varchar(10) NOT NULL,
  `MaterialName` varchar(50) NOT NULL,
  `Category` varchar(200) NOT NULL,
  `SalesRate` decimal(10,0) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `AgencyId` varchar(20) NOT NULL,
  PRIMARY KEY (`MaterialId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`MaterialId`, `MaterialName`, `Category`, `SalesRate`, `Image`, `AgencyId`) VALUES
('', '', '', '0', 'Winter.jpg', '1'),
('1', 'Brick-Red', 'Brick', '25', '', '1'),
('10', 'steel', 'steels', '234', '', '11'),
('11', 'cement', 'cements', '345', '', '11'),
('12', 'aa', 'aa', '12', '', '1'),
('13', 'aa', 'aa', '12', '', '1'),
('14', 'aa', 'aa', '12', '', '1'),
('15', 'aa', 'aa', '12', '', '1'),
('16', 'aa', 'aa', '12', '', '1'),
('17', 'aa', 'aa', '12', '', '1'),
('18', 'aa', 'aa', '12', '', '1'),
('19', 'aa', 'aa', '12', '', '1'),
('2', 'Brick-Hollow', 'Brick', '30', '', '1'),
('20', 'aa', 'aa', '12', '', '1'),
('22', 'a', 'a', '0', 'lung1.bmp', '1'),
('23', 'a', 'a', '24', 'lung2.bmp', '1'),
('24', 'aa', 'a', '0', 'lung2.bmp.pdf', '1'),
('25', 'aaaa', 'a', '0', 'Microsoft Visual Basic.pdf', '1'),
('26', 'a', 'aa', '0', '1111.txt', '1'),
('3', 'Cement', 'a', '245', '', '2'),
('4', 'Soil-Fine', 'Soil', '100', '', '1'),
('5', 'a', 'a', '0', '', '1'),
('6', 'a', 'a', '0', '', '1'),
('7', 'a', 'a', '0', '', '1'),
('8', 'a', 'a', '0', '', '1'),
('9', 'a', 'a', '0', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OrderId` int(11) NOT NULL,
  `DateOfOrder` date NOT NULL,
  `CustomerCode` varchar(20) NOT NULL,
  `AgencyId` varchar(20) NOT NULL,
  `MaterialId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `StockId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `DateOfOrder`, `CustomerCode`, `AgencyId`, `MaterialId`, `Quantity`, `Rate`, `Amount`, `Status`, `StockId`) VALUES
(1, '2017-09-17', '7', '1', 1, 10, 100, 1000, 'Reject', 3),
(2, '2017-09-25', '10', '1', 1, 2, 25, 50, 'Pending', 1),
(2, '2017-09-25', '10', '1', 1, 2, 25, 50, 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `StockId` int(11) NOT NULL,
  `StockDate` date NOT NULL,
  `MaterialId` varchar(20) NOT NULL,
  `Quantity` decimal(10,0) NOT NULL,
  `Rate` decimal(10,0) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Available` decimal(10,0) NOT NULL,
  `AgencyId` varchar(20) NOT NULL,
  PRIMARY KEY (`StockId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`StockId`, `StockDate`, `MaterialId`, `Quantity`, `Rate`, `Amount`, `Description`, `Available`, `AgencyId`) VALUES
(1, '2017-09-17', '1', '5000', '25', '125000', 'fine', '4000', '1'),
(2, '2017-09-17', '2', '34', '3456', '117504', 'aa', '34', '2'),
(3, '2017-09-17', '1', '1000', '100', '100000', '-', '990', '1'),
(4, '2017-09-20', '1', '24', '34', '816', '122', '24', '1'),
(5, '2017-09-20', '1', '345', '234', '80730', 'aa', '345', '1'),
(6, '2017-09-20', '1', '45', '67', '3015', 'a', '45', '1'),
(7, '2017-09-20', '1', '8989', '898', '8072122', 'a', '8989', '1'),
(8, '2017-09-20', '11', '34', '567', '19278', 'nil', '34', '11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
