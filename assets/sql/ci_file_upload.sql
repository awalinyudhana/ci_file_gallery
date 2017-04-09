-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2017 at 07:46 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 5.6.30-7+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_file_upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `title`, `description`) VALUES
(1, 'image', 'Kategori semua gambar'),
(2, 'document', 'kategori document baik doc atau docx');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `author` varchar(32) NOT NULL,
  `file` varchar(250) NOT NULL,
  `id_category` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `title`, `description`, `date_created`, `date_updated`, `author`, `file`, `id_category`, `status`) VALUES
(1, 'my Image', '<p>\r\n	Sample image</p>\r\n', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 'john a', '6eab8-anonymous-opgreece-no-army-can-stop-an-idea.jpg', 1, 1),
(4, 'Gambar Macan', '<p>\r\n	Gambar Macan mabuk</p>\r\n', '2017-04-19 00:00:00', '2017-04-26 00:00:00', '', 'e5708-25th-anniversary-of-ujung-kulon-park.png', 1, 1),
(5, 'Laporan test', '<p>\r\n	Laporan test beh</p>\r\n', '2014-03-12 00:00:00', '2017-04-26 00:00:00', 'mamat', '17a41-bab-2.doc', 2, 1),
(6, 'daglia', '<p>\r\n	dahlia murder</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'john', '906fb-bab-2.doc', 2, 1),
(7, 'tes', '<p>\r\n	testing bos</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'john', '21f3c-spaces.jpg', 1, 1),
(8, 'test 123', '<p>\r\n	test 123</p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'john', '7d4ae-bab-2.doc', 2, 1),
(9, 'test date', '<p>\r\n	tak ganti bos</p>\r\n', '2017-04-08 18:02:23', '2017-04-08 18:02:23', 'John', 'bf4b7-bab-2.doc', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
