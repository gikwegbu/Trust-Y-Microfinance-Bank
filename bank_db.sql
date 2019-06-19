-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2018 at 05:29 PM
-- Server version: 5.1.67-andiunpam
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `gender`, `dob`, `relationship`, `department`, `address`, `mobile`, `login_id`, `pwd`, `lastlogin`) VALUES
(1, 'Test_admin', 'M', '1994-01-01', 'unmarried', 'developer', 'Aba', '0803600000', 'admin', 'control', '2018-03-07 10:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE IF NOT EXISTS `atm` (
  `id` int(10) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `account_no` int(10) NOT NULL,
  `atm_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id`, `cust_name`, `account_no`, `atm_status`) VALUES
(16, 'James', 42, 'ISSUED'),
(17, 'Mike Ekele', 3, 'ISSUED'),
(0, 'Jane', 12, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary1`
--

CREATE TABLE IF NOT EXISTS `beneficiary1` (
  `id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `reciever_id` int(10) NOT NULL,
  `reciever_name` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `reciever_acc` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beneficiary1`
--

INSERT INTO `beneficiary1` (`id`, `sender_id`, `sender_name`, `reciever_id`, `reciever_name`, `status`, `reciever_acc`) VALUES
(3, 6, 'test customer', 3, 'mike', 'ACTIVE', 22385447),
(5, 6, 'test customer', 1, 'James', 'PENDING', 22356234),
(6, 6, 'test customer', 2, 'jane', 'ACTIVE', 22859963),
(8, 3, 'Mike Ekele', 5, 'Nneoma Justin', 'ACTIVE', 2254478);

-- --------------------------------------------------------

--
-- Table structure for table `cheque_book`
--

CREATE TABLE IF NOT EXISTS `cheque_book` (
  `id` int(10) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `account_no` int(10) NOT NULL,
  `cheque_book_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cheque_book`
--

INSERT INTO `cheque_book` (`id`, `cust_name`, `account_no`, `cheque_book_status`) VALUES
(9, 'Mike Ekele', 3, 'ISSUED'),
(0, 'Jane', 12, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `nominee` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `acc_status` varchar(255) NOT NULL,
  `acc_no` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `other_names` varchar(150) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `state_of_origin` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `home_town` varchar(255) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `tribe` varchar(255) NOT NULL,
  `next_of_kin` varchar(255) NOT NULL,
  `next_of_kin_mobile` varchar(255) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `mothers_maiden_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `office_recommendation` varchar(255) DEFAULT NULL,
  `passport` varchar(255) NOT NULL,
  `reg_form` varchar(255) DEFAULT NULL,
  `date_reg` datetime NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `gender`, `dob`, `nominee`, `account`, `address`, `mobile`, `email`, `password`, `branch`, `branch_code`, `last_login`, `acc_status`, `acc_no`, `surname`, `other_names`, `office_address`, `state_of_origin`, `lga`, `home_town`, `nationality`, `tribe`, `next_of_kin`, `next_of_kin_mobile`, `ref_no`, `mothers_maiden_name`, `office_recommendation`, `passport`, `reg_form`, `date_reg`) VALUES
(16, 'Mike', 'M', '1983-03-18', 'jane', 'savings', 'mikes Address', '0812523580', 'mike@gmail.com', 'ad42cbb33da9cac6e155d2b979d5f956998e1d7f', 'ABA', 'K421A', NULL, 'ACTIVE', '2234632', 'Odi', '', 'helens office', 'Abia', 'Umuahia North', 'Bende', 'Nigerian', 'Ibo', 'emeka ojimonu', '08134532245', '556-883-964', 'nnenba', 'any office', '../uploads/1521408269127.0.0.1girl.jpg', '../uploads/1521408269127.0.0.1IMG-20180314-WA0015.jpg', '2018-03-19 04:24:29'),
(17, 'Helen', 'F', '1983-03-18', 'jake', 'savings', 'Helens Address', '0812523580', 'helennice2@gmail.com', 'ad42cbb33da9cac6e155d2b979d5f956998e1d7f', 'ABA', 'K421A', NULL, 'ACTIVE', '2234632', 'Nice', '', 'helens office', 'Abia', 'Umuahia North', 'Bende', 'Nigerian', 'Ibo', 'emeka ojimonu', '08134532245', '556-883-964', 'nnenba', 'any office', '../uploads/1521408601127.0.0.1IMG_20180318_181701_876.jpg', '../uploads/1521408602127.0.0.1IMG-20180314-WA0015.jpg', '2018-03-19 04:30:02'),
(18, 'Helen', 'F', '1983-03-18', 'jake', 'savings', 'Helens Address', '0812523580', 'helennice3@gmail.com', 'ad42cbb33da9cac6e155d2b979d5f956998e1d7f', 'ABA', 'K421A', NULL, 'ACTIVE', '2234632', 'Nice', '', 'helens office', 'Abia', 'Umuahia North', 'Bende', 'Nigerian', 'Ibo', 'emeka ojimonu', '08134532245', '556-883-964', 'nnenba', 'any office', '../uploads/1521408778127.0.0.1IMG_20180318_181701_876.jpg', '../uploads/1521408778127.0.0.1IMG-20180314-WA0015.jpg', '2018-03-19 04:32:58'),
(19, 'Helen', 'F', '1983-03-18', 'jake', 'savings', 'Helens Address', '0812523580', 'helennice3@gmail.com', 'ad42cbb33da9cac6e155d2b979d5f956998e1d7f', 'ABA', 'K421A', NULL, 'ACTIVE', '2234632', 'Nice', '', 'helens office', 'Abia', 'Umuahia North', 'Bende', 'Nigerian', 'Ibo', 'emeka ojimonu', '08134532245', '556-883-964', 'nnenba', 'any office', '../uploads/1521408915127.0.0.1IMG_20180318_181701_876.jpg', '../uploads/1521408915127.0.0.1IMG-20180314-WA0015.jpg', '2018-03-19 04:35:15'),
(20, 'ifeanyi', 'M', '1987-03-18', 'lucky', 'savings', 'ana''s Address', '0812527580', 'ifeanyi@gmail.com', 'ad42cbb33da9cac6e155d2b979d5f956998e1d7f', 'ABA', 'K421A', NULL, 'ACTIVE', '2234632', 'ana', '', 'helens office', 'Abia', 'Umuahia North', 'Bende', 'Nigerian', 'Ibo', 'emeka ojimonu', '08134532245', '556-883-964', 'nnenba', 'any office', '../uploads/1521409062127.0.0.1IMG_20180318_181701_876.jpg', '../uploads/1521409062127.0.0.1IMG-20180314-WA0015.jpg', '2018-03-19 04:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(225) NOT NULL,
  `loan_type` varchar(225) NOT NULL,
  `amount` bigint(200) NOT NULL,
  `date issued` date NOT NULL,
  `expiry date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `passbook1`
--

CREATE TABLE IF NOT EXISTS `passbook1` (
  `transactionid` int(5) NOT NULL AUTO_INCREMENT,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passbook1`
--

INSERT INTO `passbook1` (`transactionid`, `transactiondate`, `name`, `branch`, `branch_code`, `credit`, `debit`, `amount`, `narration`) VALUES
(1, '2018-03-19', 'Helen Nice', 'ABA', 'K421A', 65000, 0, 65000.00, 'Account Open');

-- --------------------------------------------------------

--
-- Table structure for table `passbook17`
--

CREATE TABLE IF NOT EXISTS `passbook17` (
  `transactionid` int(5) NOT NULL AUTO_INCREMENT,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passbook17`
--

INSERT INTO `passbook17` (`transactionid`, `transactiondate`, `name`, `branch`, `branch_code`, `credit`, `debit`, `amount`, `narration`) VALUES
(1, '2018-03-19', 'Helen Nice', 'ABA', 'K421A', 65000, 0, 65000.00, 'Account Open');

-- --------------------------------------------------------

--
-- Table structure for table `passbook18`
--

CREATE TABLE IF NOT EXISTS `passbook18` (
  `transactionid` int(5) NOT NULL AUTO_INCREMENT,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passbook18`
--

INSERT INTO `passbook18` (`transactionid`, `transactiondate`, `name`, `branch`, `branch_code`, `credit`, `debit`, `amount`, `narration`) VALUES
(1, '2018-03-19', 'Helen Nice', 'ABA', 'K421A', 65000, 0, 65000.00, 'Account Open');

-- --------------------------------------------------------

--
-- Table structure for table `passbook19`
--

CREATE TABLE IF NOT EXISTS `passbook19` (
  `transactionid` int(5) NOT NULL AUTO_INCREMENT,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passbook19`
--

INSERT INTO `passbook19` (`transactionid`, `transactiondate`, `name`, `branch`, `branch_code`, `credit`, `debit`, `amount`, `narration`) VALUES
(1, '2018-03-19', 'Helen Nice', 'ABA', 'K421A', 65000, 0, 65000.00, 'Account Open');

-- --------------------------------------------------------

--
-- Table structure for table `passbook20`
--

CREATE TABLE IF NOT EXISTS `passbook20` (
  `transactionid` int(5) NOT NULL AUTO_INCREMENT,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passbook20`
--

INSERT INTO `passbook20` (`transactionid`, `transactiondate`, `name`, `branch`, `branch_code`, `credit`, `debit`, `amount`, `narration`) VALUES
(1, '2018-03-19', 'Helen Nice', 'ABA', 'K421A', 65000, 0, 65000.00, 'Account Open');

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE IF NOT EXISTS `signatures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `signature` text COLLATE utf8_unicode_ci NOT NULL,
  `sig_hash` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(46) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `sig_hash2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature2` text COLLATE utf8_unicode_ci,
  `signator2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `sign_img` tinyblob,
  `sign2_img` tinyblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`id`, `signator`, `signature`, `sig_hash`, `ip`, `created`, `sig_hash2`, `signature2`, `signator2`, `narration`, `date`, `sign_img`, `sign2_img`) VALUES
(15, '20', '[{"lx":73,"ly":18,"mx":73,"my":17},{"lx":73,"ly":17,"mx":73,"my":18},{"lx":72,"ly":18,"mx":73,"my":17},{"lx":71,"ly":19,"mx":72,"my":18},{"lx":70,"ly":21,"mx":71,"my":19},{"lx":68,"ly":23,"mx":70,"my":21},{"lx":66,"ly":25,"mx":68,"my":23},{"lx":67,"ly":28,"mx":66,"my":25},{"lx":67,"ly":29,"mx":67,"my":28},{"lx":67,"ly":30,"mx":67,"my":29},{"lx":67,"ly":32,"mx":67,"my":30},{"lx":68,"ly":31,"mx":67,"my":32},{"lx":69,"ly":31,"mx":68,"my":31},{"lx":71,"ly":31,"mx":69,"my":31},{"lx":73,"ly":31,"mx":71,"my":31},{"lx":76,"ly":31,"mx":73,"my":31},{"lx":78,"ly":31,"mx":76,"my":31},{"lx":80,"ly":31,"mx":78,"my":31},{"lx":81,"ly":31,"mx":80,"my":31},{"lx":83,"ly":31,"mx":81,"my":31},{"lx":84,"ly":32,"mx":83,"my":31},{"lx":86,"ly":34,"mx":84,"my":32},{"lx":88,"ly":35,"mx":86,"my":34},{"lx":89,"ly":37,"mx":88,"my":35},{"lx":91,"ly":39,"mx":89,"my":37},{"lx":93,"ly":40,"mx":91,"my":39},{"lx":96,"ly":40,"mx":93,"my":40},{"lx":100,"ly":40,"mx":96,"my":40},{"lx":104,"ly":40,"mx":100,"my":40},{"lx":108,"ly":40,"mx":104,"my":40},{"lx":112,"ly":40,"mx":108,"my":40},{"lx":115,"ly":40,"mx":112,"my":40},{"lx":116,"ly":40,"mx":115,"my":40},{"lx":118,"ly":40,"mx":116,"my":40},{"lx":119,"ly":40,"mx":118,"my":40},{"lx":121,"ly":40,"mx":119,"my":40},{"lx":122,"ly":40,"mx":121,"my":40},{"lx":124,"ly":41,"mx":122,"my":40},{"lx":127,"ly":42,"mx":124,"my":41},{"lx":132,"ly":42,"mx":127,"my":42},{"lx":136,"ly":42,"mx":132,"my":42},{"lx":143,"ly":41,"mx":136,"my":42},{"lx":150,"ly":40,"mx":143,"my":41},{"lx":157,"ly":38,"mx":150,"my":40},{"lx":163,"ly":36,"mx":157,"my":38},{"lx":166,"ly":35,"mx":163,"my":36},{"lx":167,"ly":33,"mx":166,"my":35},{"lx":167,"ly":32,"mx":167,"my":33},{"lx":165,"ly":31,"mx":167,"my":32},{"lx":163,"ly":29,"mx":165,"my":31},{"lx":157,"ly":26,"mx":163,"my":29},{"lx":149,"ly":23,"mx":157,"my":26},{"lx":139,"ly":20,"mx":149,"my":23},{"lx":129,"ly":17,"mx":139,"my":20},{"lx":120,"ly":13,"mx":129,"my":17},{"lx":112,"ly":10,"mx":120,"my":13},{"lx":106,"ly":5,"mx":112,"my":10},{"lx":101,"ly":0,"mx":106,"my":5},{"lx":96,"ly":-5,"mx":101,"my":0},{"lx":93,"ly":-7,"mx":96,"my":-5},{"lx":91,"ly":-7,"mx":93,"my":-7},{"lx":90,"ly":-6,"mx":91,"my":-7},{"lx":87,"ly":-3,"mx":90,"my":-6},{"lx":85,"ly":0,"mx":87,"my":-3},{"lx":82,"ly":8,"mx":85,"my":0},{"lx":78,"ly":17,"mx":82,"my":8},{"lx":75,"ly":29,"mx":78,"my":17},{"lx":74,"ly":41,"mx":75,"my":29},{"lx":73,"ly":50,"mx":74,"my":41},{"lx":73,"ly":56,"mx":73,"my":50},{"lx":73,"ly":60,"mx":73,"my":56},{"lx":73,"ly":63,"mx":73,"my":60},{"lx":73,"ly":64,"mx":73,"my":63},{"lx":72,"ly":62,"mx":73,"my":64},{"lx":70,"ly":60,"mx":72,"my":62},{"lx":69,"ly":56,"mx":70,"my":60},{"lx":67,"ly":53,"mx":69,"my":56},{"lx":65,"ly":48,"mx":67,"my":53},{"lx":65,"ly":45,"mx":65,"my":48},{"lx":65,"ly":44,"mx":65,"my":45},{"lx":66,"ly":41,"mx":65,"my":44},{"lx":70,"ly":38,"mx":66,"my":41},{"lx":76,"ly":35,"mx":70,"my":38},{"lx":85,"ly":33,"mx":76,"my":35},{"lx":96,"ly":32,"mx":85,"my":33},{"lx":110,"ly":31,"mx":96,"my":32},{"lx":128,"ly":31,"mx":110,"my":31},{"lx":136,"ly":31,"mx":128,"my":31},{"lx":174,"ly":31,"mx":136,"my":31}]', '3040b3d3848e9c09199daa521f8239fcc1bbfba6', '127.0.0.1', 1521409071, '3c864193a06f8b9d9d21aabd2438d6cbfa67e1ce', '[{"lx":118,"ly":9,"mx":118,"my":8},{"lx":118,"ly":8,"mx":118,"my":9},{"lx":117,"ly":8,"mx":118,"my":8},{"lx":115,"ly":8,"mx":117,"my":8},{"lx":110,"ly":9,"mx":115,"my":8},{"lx":102,"ly":11,"mx":110,"my":9},{"lx":93,"ly":13,"mx":102,"my":11},{"lx":80,"ly":19,"mx":93,"my":13},{"lx":68,"ly":26,"mx":80,"my":19},{"lx":57,"ly":33,"mx":68,"my":26},{"lx":50,"ly":38,"mx":57,"my":33},{"lx":45,"ly":43,"mx":50,"my":38},{"lx":44,"ly":46,"mx":45,"my":43},{"lx":43,"ly":48,"mx":44,"my":46},{"lx":44,"ly":50,"mx":43,"my":48},{"lx":50,"ly":51,"mx":44,"my":50},{"lx":61,"ly":50,"mx":50,"my":51},{"lx":78,"ly":47,"mx":61,"my":50},{"lx":94,"ly":41,"mx":78,"my":47},{"lx":107,"ly":35,"mx":94,"my":41},{"lx":116,"ly":30,"mx":107,"my":35},{"lx":122,"ly":27,"mx":116,"my":30},{"lx":125,"ly":25,"mx":122,"my":27},{"lx":126,"ly":23,"mx":125,"my":25},{"lx":127,"ly":22,"mx":126,"my":23},{"lx":127,"ly":23,"mx":127,"my":22},{"lx":127,"ly":26,"mx":127,"my":23},{"lx":126,"ly":29,"mx":127,"my":26},{"lx":125,"ly":32,"mx":126,"my":29},{"lx":125,"ly":35,"mx":125,"my":32},{"lx":125,"ly":37,"mx":125,"my":35},{"lx":127,"ly":40,"mx":125,"my":37},{"lx":132,"ly":42,"mx":127,"my":40},{"lx":137,"ly":43,"mx":132,"my":42},{"lx":141,"ly":42,"mx":137,"my":43},{"lx":146,"ly":38,"mx":141,"my":42},{"lx":149,"ly":32,"mx":146,"my":38},{"lx":150,"ly":27,"mx":149,"my":32},{"lx":149,"ly":22,"mx":150,"my":27},{"lx":144,"ly":17,"mx":149,"my":22},{"lx":139,"ly":14,"mx":144,"my":17},{"lx":133,"ly":12,"mx":139,"my":14},{"lx":126,"ly":11,"mx":133,"my":12},{"lx":116,"ly":16,"mx":126,"my":11},{"lx":105,"ly":24,"mx":116,"my":16},{"lx":95,"ly":32,"mx":105,"my":24},{"lx":89,"ly":38,"mx":95,"my":32},{"lx":84,"ly":43,"mx":89,"my":38},{"lx":79,"ly":45,"mx":84,"my":43},{"lx":73,"ly":46,"mx":79,"my":45},{"lx":67,"ly":46,"mx":73,"my":46},{"lx":58,"ly":42,"mx":67,"my":46},{"lx":52,"ly":37,"mx":58,"my":42},{"lx":49,"ly":34,"mx":52,"my":37},{"lx":50,"ly":31,"mx":49,"my":34},{"lx":63,"ly":21,"mx":50,"my":31},{"lx":89,"ly":11,"mx":63,"my":21},{"lx":114,"ly":5,"mx":89,"my":11},{"lx":132,"ly":1,"mx":114,"my":5},{"lx":146,"ly":1,"mx":132,"my":1},{"lx":155,"ly":1,"mx":146,"my":1},{"lx":162,"ly":2,"mx":155,"my":1},{"lx":166,"ly":3,"mx":162,"my":2},{"lx":168,"ly":3,"mx":166,"my":3},{"lx":168,"ly":4,"mx":168,"my":3},{"lx":165,"ly":5,"mx":168,"my":4},{"lx":156,"ly":6,"mx":165,"my":5},{"lx":146,"ly":8,"mx":156,"my":6},{"lx":138,"ly":10,"mx":146,"my":8},{"lx":133,"ly":11,"mx":138,"my":10},{"lx":131,"ly":12,"mx":133,"my":11},{"lx":131,"ly":13,"mx":131,"my":12},{"lx":134,"ly":14,"mx":131,"my":13},{"lx":141,"ly":17,"mx":134,"my":14},{"lx":151,"ly":20,"mx":141,"my":17},{"lx":164,"ly":27,"mx":151,"my":20},{"lx":177,"ly":33,"mx":164,"my":27},{"lx":197,"ly":43,"mx":177,"my":33}]', 'admin', 'ACCOUNT OPENING', '2018-03-19 04:37:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `gender` char(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `dob`, `relationship`, `department`, `doj`, `address`, `mobile`, `email`, `pwd`, `gender`, `last_login`) VALUES
(7, 'Emeka Kenneth', '1989-04-27', 'married', 'revenue', '2018-01-18', '18 Enugu  uku street ', '08155625262', 'emekaken@yahoo.com', 'emekaken', 'M', '2018-03-15 03:24:00'),
(9, 'Ngozi Obinna', '2018-03-23', 'married', 'revenue', '2013-03-10', '44 ekenna street', '0816500000', 'ngozi@gmail.com', '671bonny', 'F', '2018-03-10 23:49:15'),
(10, 'new staff', '1978-02-28', 'married', 'property aquisition', '2018-03-02', 'new staff address', 'o81443455', 'newstaff@gmail.com', 'newstaff@g26jQsG&nh*&#8v', 'F', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
