-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2018 at 03:14 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zmeter`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `msn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `nic`, `tel`, `msn`) VALUES
(6, 'Priyantha', '972392039V', 756228669, 795743);

-- --------------------------------------------------------

--
-- Table structure for table `dailyrepairs`
--

CREATE TABLE `dailyrepairs` (
  `id` int(11) NOT NULL,
  `adddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fixeddate` datetime NOT NULL,
  `warrenty` varchar(10) NOT NULL,
  `sn` int(11) NOT NULL,
  `cusname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `fault` varchar(100) NOT NULL,
  `received` varchar(100) NOT NULL,
  `handover` varchar(100) NOT NULL,
  `replacement` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyrepairs`
--

INSERT INTO `dailyrepairs` (`id`, `adddate`, `fixeddate`, `warrenty`, `sn`, `cusname`, `phone`, `fault`, `received`, `handover`, `replacement`, `price`) VALUES
(1, '2018-08-31 19:54:31', '2017-05-12 00:00:00', 'no', 111111, 'Sahan Dinuka', 756228669, 'No Power', 'Vindya', 'Gimhani', 'Diods,Link / Path', 200),
(2, '2018-08-31 20:27:55', '2016-06-23 00:00:00', 'no', 707123, 'Gunasena', 384900181, 'Taxi Light', 'Gimhani', 'Gimhani', 'Transistors, Resistors', 250),
(3, '2018-09-03 20:58:37', '2015-12-23 00:00:00', 'No', 134578, 'Zameer', 3564435, 'Taxi', 'Vindya', 'no', 'diod', 120);

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `place` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `name`, `phone`, `place`, `position`) VALUES
(1, 'Lion', 123456789, 'Piliyandala', 'Dealer'),
(2, 'Maligawatta', 123456789, 'Maligawatta', 'Branch'),
(3, 'Kottawa', 123456789, 'Kottawa', 'Branch'),
(4, 'Prasara', 123456789, 'Panadura', 'Dealer');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`) VALUES
(1, 'Production'),
(2, 'Office');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `msn` int(11) NOT NULL,
  `ssn` int(11) NOT NULL,
  `stype` varchar(50) NOT NULL,
  `saledate` date NOT NULL,
  `wperiod` int(11) NOT NULL,
  `place` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `msn`, `ssn`, `stype`, `saledate`, `wperiod`, `place`) VALUES
(17, 534075, 4567, '3 Hole', '2018-09-11', 365, 'Maligawatta'),
(18, 534075, 4566, '3 Hole', '2018-09-11', 183, 'Maligawatta'),
(19, 353476, 4732, '3 Hole', '2018-09-11', 183, 'Maligawatta'),
(20, 474777, 66879, '4 Hole', '2018-09-05', 183, 'Lion'),
(21, 474777, 66879, '4 Hole', '2018-09-13', 183, 'Maligawatta'),
(22, 353476, 4732, '3 Hole', '2018-08-06', 183, 'Maligawatta');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `section`) VALUES
(1, 'Sahan', 'sahan@zmeterpro.com', '1f6d49fe0b92e98346e1374f77ed934f5a772f10', 'production'),
(14, 'Tharindu', 'tharindu@zmeterpro.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'production'),
(16, 'Madusha', 'madusha@zmeterpro.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Production');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`,`msn`);

--
-- Indexes for table `dailyrepairs`
--
ALTER TABLE `dailyrepairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dailyrepairs`
--
ALTER TABLE `dailyrepairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
