-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 01:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
(1, 'Iylia Shiffa', 'Nurul Iylia Shiffa', 'shiffaiylia@gmail.com', '0123456789', 'Malaysia', '373737'),
(2, 'Admin', 'Admin Princess Shoes', 'admin@gmail.com', '0123456789', 'admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
(1, 'Iylia Shiffa', 'Nurul Iylia Shiffa', 'shiffaiylia@gmail.com', '0123456789', 'Malaysia', '171717');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `postcode` text NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `lng` decimal(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `address`, `tel`, `district`, `state`, `postcode`, `lat`, `lng`) VALUES
(1, 'SALAM Shah Alam Specialist Hospital', ' 2, Jalan Nelayan 19/B, Seksyen 19, 40300 Shah Alam, Selangor', '03-55434000', 'Shah Alam', 'Selangor', '40300', '3.052190', '101.534798'),
(2, 'Klinik Pakar Hospital Shah Alam', 'Jalan Hospital, Seksyen 7, 40000 Shah Alam, Selangor', '03-55263000', 'Shah Alam', 'Selangor', '40000', '3.073680', '101.496680'),
(3, 'AVISENA Specialist Hospital', '4, Jalan Ikhtisas, Seksyen 14, 40000 Shah Alam, Selangor', '03-55151888', 'Shah Alam', 'Selangor', '40000', '3.080840', '101.509600'),
(4, 'KPJ Selangor Specialist Hospital', 'Jalan Singa 20/1, Seksyen 20, 40300 Shah Alam, Selangor', '03-55431111', 'Shah Alam', 'Selangor', '40300', '3.053120', '101.537630'),
(5, 'Pusat Kesihatan, UiTM Shah Alam', '1, Jalan Bijak 1/22, UiTM, 40450 Shah Alam, Selangor', '03-55443833', 'Shah Alam', 'Selangor', '40450', '3.065170', '101.495070'),
(6, 'Columbia Asia Extended Care Hospital', 'Lot 2, Jalan Baung 17/22, Seksyen 17, 40200 Shah Alam, Selangor', '03-55417833', 'Shah Alam', 'Selangor', '40200', '3.047550', '101.504750'),
(7, 'MSU Medical Centre', 'MSU Medical Centre, Jalan Boling Padang 13/64, Seksyen 13, 40100 Shah Alam, Selangor', '03-55262600', 'Shah Alam', 'Selangor', '40100', '3.076480', '101.550970'),
(8, 'Hospital Umra', 'No. 12, 18, Jalan Bola Tampar 13/14, Seksyen 13, 40100 Shah Alam, Selangor', '03-55184319', 'Shah Alam', 'Selangor', '40100', '3.082250', '101.539680'),
(9, 'Columbia Asia Hospital - Bukit Rimau', '3, Persiaran Anggerik Eria Bukit Rimau, Seksyen 32, 40460 Shah Alam, Selangor', '03-51259999', 'Shah Alam', 'Selangor', '40460', '2.999570', '101.529457'),
(10, 'Ara Damansara Medical Centre', ' Lot 2, Jalan Lapangan Terbang Subang, Seksyen U2, 40150 Shah Alam, Selangor', '03-56391212', 'Shah Alam', 'Selangor', '40150', '3.114940', '101.565080'),
(11, 'Hania Clinic Medical & Surgery', '10, Jalan Boling Padang G 13/G, Seksyen 13, 40100 Shah Alam, Selangor', '019-2165921', 'Shah Alam', 'Selangor', '40100', '3.076250', '101.550460'),
(12, 'Klinik Dr Bazilah Shah Alam (Klinik Kulit / Skin Clinic)', 'R-02-01, Emira, Jalan Akuatika 13/64A, Seksyen 13, 40100 Shah Alam, Selangor', '03-50357359', 'Shah Alam', 'Selangor', '40100', '3.089980', '101.544800'),
(13, 'Poliklinik Johan', 'Blok 3, 48G, Jalan Pahat G 15/G, Seksyen 15, 40000 Shah Alam, Selangor', '03-58828798', 'Shah Alam', 'Selangor', '40000', '3.063840', '101.526980'),
(14, 'Klinik Pergigian Maju Shah Alam ', 'Ground Floor, No 23, Jalan Malung 17/19, Section 17, 40200 Shah Alam, Selangor', '03-55454033', 'Shah Alam', 'Selangor', '40200', '3.046110', '101.504120'),
(15, 'Klinik Glenmarie', '27, Jalan Peniaga U1/34, Hicom-glenmarie Industrial Park, 40150 Shah Alam, Selangor', '03-58798576', 'Shah Alam', 'Selangor', '40150', '3.081910', '101.560370');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
