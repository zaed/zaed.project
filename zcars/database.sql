-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2012 at 10:16 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c7095656`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminsession`
--

CREATE TABLE IF NOT EXISTS `adminsession` (
  `sessionid` int(100) NOT NULL AUTO_INCREMENT,
  `userid` int(100) NOT NULL,
  `date/time` varchar(100) NOT NULL,
  PRIMARY KEY (`sessionid`,`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `adminsession`
--

INSERT INTO `adminsession` (`sessionid`, `userid`, `date/time`) VALUES
(11, 2, 'Tuesday 8th of May 2012 02:00:12 PM');

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE IF NOT EXISTS `adminuser` (
  `userid` int(100) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`userid`, `password`, `email`) VALUES
(2, 'password', 'my@email'),
(3, 'my', 'pass'),
(4, 'my@1', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cartid` varchar(100) NOT NULL,
  `productid` int(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unitsubtotal` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `cartid`, `productid`, `quantity`, `unitsubtotal`) VALUES
(7, '10.65.3.60', 1, '3', '12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(100) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(1, 'porsche'),
(2, 'ferrari');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `custid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`custid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `customerid`, `name`, `email`, `address`, `telephone`, `postcode`, `password`) VALUES
(1, '10.65.3.60', '11', '11@11', '343', 11, 'rety', '111');

-- --------------------------------------------------------

--
-- Table structure for table `customersession`
--

CREATE TABLE IF NOT EXISTS `customersession` (
  `sessionid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`sessionid`,`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `delid` int(11) NOT NULL AUTO_INCREMENT,
  `deliveryid` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `recipient` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  PRIMARY KEY (`delid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delid`, `deliveryid`, `address`, `recipient`, `postcode`, `telephone`) VALUES
(1, '10.65.3.60', '11', '11', '11', '11');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
  `paymentid` varchar(11) NOT NULL,
  `method` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `paymentid`, `method`, `type`, `amount`) VALUES
(1, '10.65.3.60', 'card', 'sales', '12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `unitprice` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `pname`, `pimage`, `unitprice`, `description`, `catid`) VALUES
(29, 'wheels', 'images/sus.jpg', '1000.00', 'test description', 1),
(30, 'headlights', 'images/hl.jpg', '10000.00', 'another category test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `saleorder`
--

CREATE TABLE IF NOT EXISTS `saleorder` (
  `orderid` int(100) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(100) NOT NULL DEFAULT '0',
  `deliveryid` varchar(100) NOT NULL DEFAULT '0',
  `paymentid` varchar(100) NOT NULL DEFAULT '0',
  `cartid` varchar(100) NOT NULL DEFAULT '0',
  `date/time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`orderid`,`customerid`,`deliveryid`,`paymentid`,`cartid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `saleorder`
--

INSERT INTO `saleorder` (`orderid`, `customerid`, `deliveryid`, `paymentid`, `cartid`, `date/time`, `status`) VALUES
(1, '10.65.3.60', '10.65.3.60', '10.65.3.60', '10.65.3.60', 'Tuesday 8th of May 2012 04:25:29 PM', 'in process');

-- --------------------------------------------------------

--
-- Table structure for table `takeaway`
--

CREATE TABLE IF NOT EXISTS `takeaway` (
  `takeawayid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`takeawayid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `takeaway`
--

INSERT INTO `takeaway` (`takeawayid`, `name`, `address`, `telephone`, `email`) VALUES
(1, 'freds', '', 0, ''),
(2, 'freds', 'house', 12345, 'eee@ggg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
