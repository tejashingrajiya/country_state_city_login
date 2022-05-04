-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2022 at 06:39 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cityname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stateid` bigint(20) UNSIGNED NOT NULL,
  `countryid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `cityname`, `stateid`, `countryid`, `created_at`, `updated_at`) VALUES
(1, 'Surry', 5, 2, NULL, NULL),
(2, 'Miami', 2, 4, NULL, NULL),
(3, 'Patna', 1, 1, NULL, NULL),
(4, 'Panjim', 6, 1, NULL, NULL),
(5, 'Torronto', 4, 2, NULL, NULL),
(6, 'Florida City', 2, 4, NULL, NULL),
(7, 'Montrial', 8, 2, NULL, NULL),
(8, 'Azamgadh', 7, 1, NULL, NULL),
(9, 'Lahor', 3, 3, NULL, NULL),
(10, 'Florida City', 5, 2, NULL, NULL),
(11, 'Prayag Raj', 7, 1, NULL, NULL),
(12, 'Kitchener', 4, 2, NULL, NULL),
(13, 'Karachi', 3, 3, NULL, NULL),
(14, 'Brampton', 4, 2, NULL, NULL),
(15, 'Bhagalpur', 1, 1, NULL, NULL),
(16, 'Gaya', 1, 1, NULL, NULL),
(17, 'Allahabad', 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'India', NULL, NULL),
(2, 'Canada', NULL, NULL),
(3, 'Pakistan', NULL, NULL),
(4, 'USA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `it_offices`
--

DROP TABLE IF EXISTS `it_offices`;
CREATE TABLE IF NOT EXISTS `it_offices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `office_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_nopad_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=dec8;

--
-- Dumping data for table `it_offices`
--

INSERT INTO `it_offices` (`id`, `office_id`, `name`) VALUES
(2, 12, 'moh');

-- --------------------------------------------------------

--
-- Table structure for table `php_basic`
--

DROP TABLE IF EXISTS `php_basic`;
CREATE TABLE IF NOT EXISTS `php_basic` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET cp850 COLLATE cp850_general_nopad_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `php_basic`
--

INSERT INTO `php_basic` (`id`, `name`, `email`) VALUES
(1, 'name', 'email'),
(2, 'tej', 'tej@gm.cm'),
(4, 'nityanand', 'nitya@nityanand.com'),
(53, 'tejas', 'calsse@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf16 COLLATE utf16_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=dec8;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `name`, `address`) VALUES
(1, 'tejas', 'ddddddddddd'),
(2, 'raj', 'Weekend Address,Near Delhi Public School,Silent Zone Road,'),
(3, 'ratnesh', 'The Address by Vacanza Developers, Near Celebrity green, Abhva road, Vesu'),
(4, 'device', ' Velocity Business Hub, 12th and 13th Floor Near Madhuvan Circle, LP Savani Rd,');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `statename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `statename`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bihar', NULL, NULL),
(2, 4, 'Florida', NULL, NULL),
(3, 3, 'Punjab', NULL, NULL),
(4, 2, 'Ontario', NULL, NULL),
(5, 2, 'British Colambia', NULL, NULL),
(6, 1, 'Goa', NULL, NULL),
(7, 1, 'UP', NULL, NULL),
(8, 2, 'Quebic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(222) CHARACTER SET armscii8 DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET armscii8 DEFAULT NULL,
  `education` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `username` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `number` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `Conform_Password` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `country_name` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `state_name` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `city_name` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `uploadfile` varchar(225) CHARACTER SET armscii8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `education`, `username`, `email`, `number`, `Password`, `Conform_Password`, `country_name`, `state_name`, `city_name`, `uploadfile`) VALUES
(2, 'admin', 'admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'admin', 'admin', 'male', 'MCA,ME,MSC,Phd', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(57, 'admin', 'admin', 'male', 'BSC', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(58, 'admin', 'admin', 'male', 'BSC', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(59, 'admin', 'admin', 'male', 'BE', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(72, 'admin', 'admin', 'male', 'Array', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(73, 'admin', 'admin', 'male', 'Array', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(74, 'admin', 'admin', 'male', 'Array', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(75, 'admin', 'admin', 'male', 'Array', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(86, 'admin', 'admin', 'male', '12th | BCA', 'admin', 'admin@admin.com', '1234567891', 'educationclass', 'educationclass', NULL, NULL, NULL, NULL),
(87, 'admin', 'admin', 'male', '12thBCABEMCAMEMSC', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(88, 'admin', 'admin', 'male', '12th,BCA,BE,BSC,Phd', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', NULL, NULL, NULL, NULL),
(89, 'admin', 'admin', 'male', '10th,MSC,Phd', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', '2', '1', '4', NULL),
(92, 'admin', 'admin', 'male', 'BCA , BE , BSC , MCA', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', ' 3', ' 3', '13', NULL),
(93, 'admin', 'admin', 'male', '10th , 12th , BCA , BE', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', ' 1', ' 2', '2', NULL),
(94, 'admin', 'admin', 'male', 'BCA , BE , BSC', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', ' 2', ' 4', '14', NULL),
(105, 'admin', 'admin', 'male', '10th,12th,BCA', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', '2', '4', '5', NULL),
(106, 'admin', 'admin', 'male', '10th , 12th , BCA , BE , BSC', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', ' 1', ' 1', '3', NULL),
(107, 'admin', 'admin', 'male', '10th,12th,BCA', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', '2', '5', '1', NULL),
(108, 'admin', 'admin', 'male', '12th,BCA,ME,Phd', 'admin', 'admin@admin.com', '1234567891', 'Registration_Form', 'Registration_Form', '1', '1', '16', NULL),
(150, 'admin', 'admin', 'male', '12th,BCA', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', '1', '1', '15', NULL),
(151, 'admin', 'admin', 'male', '12th,BCA,BE', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', '1', '1', '3', ''),
(155, 'admin', 'user', 'female', '', 'user', 'admin@admin.com', '1234567891', '1234567891', '1234567891', '3', '3', '9', 'Chrysanthemum.jpg'),
(158, 'user', 'admin', 'female', '', 'admin', 'admin@admin.com', '1234567891', '1234567891', '1234567891', '2', '4', '12', 'Penguins.jpg'),
(159, 'user', 'admin', 'Other', 'MSC,Phd', '', 'admin@admin.com', '1234567891', '1234567891', '1234567891', '1', '1', '3', 'Chrysanthemum.jpg'),
(162, 'user', 'user', 'female', '12th , BCA , BE , BSC', 'user', 'user@user.com', '1234567891', '1234567891', '1234567891', '4', '2', '2', 'Tulips.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
