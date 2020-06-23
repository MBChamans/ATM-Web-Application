-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 11:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atmwebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `akshay`
--

CREATE TABLE `akshay` (
  `transid` int(5) UNSIGNED NOT NULL,
  `description` tinytext NOT NULL,
  `balance` int(10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` tinytext DEFAULT NULL,
  `amount` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akshay`
--

INSERT INTO `akshay` (`transid`, `description`, `balance`, `ts`, `type`, `amount`) VALUES
(1, 'ATMW', 110000, '2020-06-15 21:14:39', 'debit', 25000),
(2, 'ATMW', 0, '2020-06-15 21:16:21', 'debit', 110000);

-- --------------------------------------------------------

--
-- Table structure for table `aniket`
--

CREATE TABLE `aniket` (
  `transid` int(5) UNSIGNED NOT NULL,
  `description` tinytext NOT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `balance` int(10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` tinytext DEFAULT NULL,
  `amount` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `customers`
-- (See below for the actual view)
--
CREATE TABLE `customers` (
`cardno` decimal(20,0)
,`pin` int(11)
,`accountno` decimal(20,0)
,`fn` varchar(30)
,`balance` int(11)
,`bank` tinytext
,`ln` tinytext
);

-- --------------------------------------------------------

--
-- Table structure for table `hdfc`
--

CREATE TABLE `hdfc` (
  `cardno` bigint(16) NOT NULL,
  `pin` int(4) NOT NULL,
  `accountno` bigint(12) NOT NULL,
  `fn` varchar(30) NOT NULL,
  `balance` int(10) NOT NULL,
  `bank` tinytext DEFAULT NULL,
  `ln` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hdfc`
--

INSERT INTO `hdfc` (`cardno`, `pin`, `accountno`, `fn`, `balance`, `bank`, `ln`) VALUES
(3530111333300000, 3155, 121223233434, 'Aditi ', 4000000, 'hdfc', 'Hemane'),
(5610591081018250, 1999, 112233445566, 'Sushant ', 10000, 'hdfc', 'Kulkarni'),
(6011000990139424, 2018, 111122223333, 'Rishi ', 200000, 'hdfc', 'Pandya');

-- --------------------------------------------------------

--
-- Table structure for table `icici`
--

CREATE TABLE `icici` (
  `cardno` bigint(16) UNSIGNED NOT NULL,
  `pin` int(4) NOT NULL,
  `accountno` bigint(12) UNSIGNED NOT NULL,
  `fn` varchar(30) NOT NULL,
  `balance` int(10) NOT NULL,
  `bank` tinytext DEFAULT NULL,
  `ln` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icici`
--

INSERT INTO `icici` (`cardno`, `pin`, `accountno`, `fn`, `balance`, `bank`, `ln`) VALUES
(3566002020360505, 1312, 998877665544, 'Sheffin ', 15000, 'icici', 'Shajit'),
(5105105105105100, 3141, 202098987676, 'Ankit ', 40000000, 'icici', 'Katre'),
(5555555555554444, 9090, 101023234545, 'Viraj ', 300000, 'icici', 'Chogle');

-- --------------------------------------------------------

--
-- Table structure for table `prathmesh`
--

CREATE TABLE `prathmesh` (
  `transid` int(5) UNSIGNED NOT NULL,
  `description` tinytext NOT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `balance` int(10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` tinytext DEFAULT NULL,
  `amount` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rishi`
--

CREATE TABLE `rishi` (
  `transid` int(5) UNSIGNED NOT NULL,
  `description` tinytext NOT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `balance` int(10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` tinytext DEFAULT NULL,
  `amount` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sbi`
--

CREATE TABLE `sbi` (
  `cardno` bigint(16) UNSIGNED NOT NULL,
  `pin` int(4) NOT NULL,
  `accountno` bigint(12) UNSIGNED NOT NULL,
  `fn` varchar(30) NOT NULL,
  `balance` int(10) NOT NULL,
  `bank` tinytext DEFAULT NULL,
  `ln` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sbi`
--

INSERT INTO `sbi` (`cardno`, `pin`, `accountno`, `fn`, `balance`, `bank`, `ln`) VALUES
(4012888888881881, 1506, 276534987622, 'Akshay ', 0, 'sbi', 'Mohite'),
(5019717010103742, 1106, 151516161717, 'Aniket ', 250000, 'sbi', 'Shinde'),
(6331101999990016, 3107, 989876765454, 'Prathmesh ', 40000, 'sbi', 'Gawande');

-- --------------------------------------------------------

--
-- Table structure for table `shefin`
--

CREATE TABLE `shefin` (
  `transid` int(5) UNSIGNED NOT NULL,
  `description` tinytext NOT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `balance` int(10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` tinytext DEFAULT NULL,
  `amount` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sushant`
--

CREATE TABLE `sushant` (
  `transid` int(5) UNSIGNED NOT NULL,
  `description` tinytext NOT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `balance` int(10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` tinytext DEFAULT NULL,
  `amount` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `customers`
--
DROP TABLE IF EXISTS `customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customers`  AS  select `sbi`.`cardno` AS `cardno`,`sbi`.`pin` AS `pin`,`sbi`.`accountno` AS `accountno`,`sbi`.`fn` AS `fn`,`sbi`.`balance` AS `balance`,`sbi`.`bank` AS `bank`,`sbi`.`ln` AS `ln` from `sbi` union all select `icici`.`cardno` AS `cardno`,`icici`.`pin` AS `pin`,`icici`.`accountno` AS `accountno`,`icici`.`fn` AS `fn`,`icici`.`balance` AS `balance`,`icici`.`bank` AS `bank`,`icici`.`ln` AS `ln` from `icici` union all select `hdfc`.`cardno` AS `cardno`,`hdfc`.`pin` AS `pin`,`hdfc`.`accountno` AS `accountno`,`hdfc`.`fn` AS `fn`,`hdfc`.`balance` AS `balance`,`hdfc`.`bank` AS `bank`,`hdfc`.`ln` AS `ln` from `hdfc` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akshay`
--
ALTER TABLE `akshay`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `aniket`
--
ALTER TABLE `aniket`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `hdfc`
--
ALTER TABLE `hdfc`
  ADD PRIMARY KEY (`cardno`);

--
-- Indexes for table `icici`
--
ALTER TABLE `icici`
  ADD PRIMARY KEY (`cardno`);

--
-- Indexes for table `prathmesh`
--
ALTER TABLE `prathmesh`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `rishi`
--
ALTER TABLE `rishi`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `sbi`
--
ALTER TABLE `sbi`
  ADD PRIMARY KEY (`cardno`);

--
-- Indexes for table `shefin`
--
ALTER TABLE `shefin`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `sushant`
--
ALTER TABLE `sushant`
  ADD PRIMARY KEY (`transid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akshay`
--
ALTER TABLE `akshay`
  MODIFY `transid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aniket`
--
ALTER TABLE `aniket`
  MODIFY `transid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prathmesh`
--
ALTER TABLE `prathmesh`
  MODIFY `transid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rishi`
--
ALTER TABLE `rishi`
  MODIFY `transid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shefin`
--
ALTER TABLE `shefin`
  MODIFY `transid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sushant`
--
ALTER TABLE `sushant`
  MODIFY `transid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
