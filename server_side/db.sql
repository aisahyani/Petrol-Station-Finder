-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 12:27 PM
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
(1, 'Admin', 'Admin Location', 'admin@admin.com', '0377276175', 'Shah Alam, Selangor', 'admin123');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ip_address` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_agent` varchar(255) NOT NULL,
  `coordinate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `contact`, `location`, `ip_address`, `date`, `user_agent`, `coordinate`) VALUES
(1, 'Noratiqah Binti Mohd Masduki', 'noratiqahmasduki@gmail.com', '011-23840350', '18, Jalan Sesenduk 4, Taman Meru Utama, 41050 Selangor.', '192.168.0.134', '2021-08-03 14:55:23', 'Dalvik/2.1.0 (Linux; U; Android 10; Android SDK built for x86 Build/QSR1.190920.001)', ' 3.128439 , 101.445198'),
(2, 'Noor Syafiqa Binti Mohamad Saad', 'syafiqapqa53@gmail.com', '017-4278798', 'Taman Cahaya Nilam, 34950 Bandar Baharu, Kedah.', ' 192.168.43.43', '2021-08-04 13:43:23', 'Dalvik/2.1.0 (Linux; U; Android 10; Android SDK built for x86 Build/QSR1.190920.001)', '5.1187 , 100.5271'),
(3, 'Nurul Amirah  Binti Zainal Aabidin', 'nrlmrah97@gmail.com', '013-9252166', 'Ppr Cochrane Perkasa, Jalan Nakhoda Yusuf, 55100 Kuala Lumpur.', '192.168.1.7', '2021-08-04 20:39:39', 'Dalvik/2.1.0 (Linux; U; Android 10; Android SDK built for x86 Build/QSR1.190920.001)', '3.135880 , 1101.725760'),
(4, 'Nur Fatin Najihah Binti Fakhri', 'fatin@gmail.com', '017-6645627', 'Jalan Kasturi, Bandar Sungai Buaya, 48000 Rawang.', '192.168.10.12', '2021-08-04 20:41:50', 'Dalvik/2.1.0 (Linux; U; Android 10; Android SDK built for x86 Build/QSR1.190920.001)', '3.407350, 101.572730'),
(5, 'Nurul Iylia Shiffa Binti Mohamad Saini', 'shiffaiylia@gmail.com', '016-7050941', 'Lorong Permata 3/2, Bandar Permata Lunas, 09600 Lunas, Kedah.', '192.168.8.101', '2021-08-04 20:44:59', 'Dalvik/2.1.0 (Linux; U; Android 10; Android SDK built for x86 Build/QSR1.190920.001)', '5.452592, 100.534538'),
(6, 'Nur Arin Dayana binti Yusri', 'arndy.97@gmail.com', '016-9308618', 'Jalan Ilmu 1/1, 40450 Shah Alam, Selangor.', '192.168.1.12', '2021-08-05 15:47:22', 'Dalvik/2.1.0 (Linux; U; Android 10; Android SDK built for x86 Build/QSR1.190920.001)', '3.0697, 101.5037');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
