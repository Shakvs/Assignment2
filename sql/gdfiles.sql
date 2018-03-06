-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 11:11 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `googledrivefilesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `gdfiles`
--

CREATE TABLE `gdfiles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `downloadurl` text NOT NULL,
  `mimetype` varchar(200) NOT NULL,
  `size` decimal(10,0) NOT NULL,
  `gdfileid` varchar(200) NOT NULL,
  `gdparentid` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gdfiles`
--

INSERT INTO `gdfiles` (`id`, `name`, `downloadurl`, `mimetype`, `size`, `gdfileid`, `gdparentid`) VALUES
(1, 'Ezeads_database_designs.pdf', 'https://drive.google.com/file/d/1RjOhAHwRnMrTYDd4bnbr9LarQqd_ZRTy/view?usp=drivesdk', 'application/pdf', '332', '1RjOhAHwRnMrTYDd4bnbr9LarQqd_ZRTy', NULL),
(2, 'Original Design_export_3.pdf', 'https://drive.google.com/file/d/1JXG8GBwLj-4Xfm8z1jOJ--7yUjCST_zR/view?usp=drivesdk', 'application/pdf', '218', '1JXG8GBwLj-4Xfm8z1jOJ--7yUjCST_zR', NULL),
(3, 'EZEADS-Adserver', 'https://drive.google.com/drive/folders/1kjvkPrnX1Hpzf5bXE9ynuuH96fdzD8vc', 'application/vnd.google-apps.folder', '0', '1kjvkPrnX1Hpzf5bXE9ynuuH96fdzD8vc', NULL),
(4, 'Product Roadmap - EZEControl', 'https://docs.google.com/spreadsheets/d/1k0Dnod_O8n_u71qjT0iXhnwcnS1dElrHzK5_rDMIaf4/edit?usp=drivesdk', 'application/vnd.google-apps.spreadsheet', '0', '1k0Dnod_O8n_u71qjT0iXhnwcnS1dElrHzK5_rDMIaf4', NULL),
(5, 'EZELicense', 'https://docs.google.com/document/d/1FLXhc-GHDSUBJ9qTHyCZ2swBwCHi7-gqgE30cIRyECk/edit?usp=drivesdk', 'application/vnd.google-apps.document', '0', '1FLXhc-GHDSUBJ9qTHyCZ2swBwCHi7-gqgE30cIRyECk', NULL),
(6, 'pdo_odbc_forge.php', 'https://drive.google.com/file/d/0B0tqGJmQN4Apd0l5VjRabWtoX3c/view?usp=drivesdk', 'application/x-httpd-php', '2', '0B0tqGJmQN4Apd0l5VjRabWtoX3c', NULL),
(7, 'pdo_odbc_driver.php', 'https://drive.google.com/file/d/0B0tqGJmQN4Apc1hIcUdEZ3MtY0k/view?usp=drivesdk', 'application/x-httpd-php', '7', '0B0tqGJmQN4Apc1hIcUdEZ3MtY0k', NULL),
(8, 'pdo_sqlsrv_forge.php', 'https://drive.google.com/file/d/0B0tqGJmQN4ApcnVQT2FGWWxyMDA/view?usp=drivesdk', 'application/x-httpd-php', '4', '0B0tqGJmQN4ApcnVQT2FGWWxyMDA', NULL),
(9, 'pdo_sqlite_driver.php', 'https://drive.google.com/file/d/0B0tqGJmQN4ApZHg5eWZSeGQ1ZzA/view?usp=drivesdk', 'application/x-httpd-php', '6', '0B0tqGJmQN4ApZHg5eWZSeGQ1ZzA', NULL),
(10, 'pdo_sqlite_forge.php', 'https://drive.google.com/file/d/0B0tqGJmQN4ApWjVBay10RWhRWVk/view?usp=drivesdk', 'application/x-httpd-php', '6', '0B0tqGJmQN4ApWjVBay10RWhRWVk', NULL),
(11, 'pdo_sqlsrv_driver.php', 'https://drive.google.com/file/d/0B0tqGJmQN4ApUURfcmVGOXhjSnc/view?usp=drivesdk', 'application/x-httpd-php', '11', '0B0tqGJmQN4ApUURfcmVGOXhjSnc', NULL),
(12, 'pdo_pgsql_forge.php', 'https://drive.google.com/file/d/0B0tqGJmQN4ApRlF3d1ZXMEMxUzg/view?usp=drivesdk', 'application/x-httpd-php', '6', '0B0tqGJmQN4ApRlF3d1ZXMEMxUzg', NULL),
(13, 'pdo_pgsql_driver.php', 'https://drive.google.com/file/d/0B0tqGJmQN4ApRVI3RC1yMUxoaGM/view?usp=drivesdk', 'application/x-httpd-php', '9', '0B0tqGJmQN4ApRVI3RC1yMUxoaGM', NULL),
(14, 'pdo_oci_forge.php', 'https://drive.google.com/file/d/0B0tqGJmQN4ApUS1DSUJ2N2NraFE/view?usp=drivesdk', 'application/x-httpd-php', '4', '0B0tqGJmQN4ApUS1DSUJ2N2NraFE', NULL),
(15, 'pdo_mysql_forge.php', 'https://drive.google.com/file/d/0B0tqGJmQN4ApdnhHRFpHWnlNWWc/view?usp=drivesdk', 'application/x-httpd-php', '6', '0B0tqGJmQN4ApdnhHRFpHWnlNWWc', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gdfiles`
--
ALTER TABLE `gdfiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gdfileid` (`gdfileid`),
  ADD KEY `name` (`name`),
  ADD KEY `mimetype` (`mimetype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gdfiles`
--
ALTER TABLE `gdfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
