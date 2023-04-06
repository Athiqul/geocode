-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 10:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `above_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(3) UNSIGNED NOT NULL,
  `div_id` int(5) UNSIGNED NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `bn_name` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lot` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `div_id`, `en_name`, `bn_name`, `lat`, `lot`, `website`) VALUES
(1, 1, 'Narsingdi', 'নরসিংদী', '', '', ''),
(2, 1, 'Gazipur', 'গাজীপুর', '', '', ''),
(3, 1, 'Shariatpur', 'শরীয়তপুর', '', '', ''),
(4, 1, 'Narayanganj', 'নারায়ণগঞ্জ', '', '', ''),
(5, 1, 'Tangail', 'টাঙ্গাইল', '', '', ''),
(6, 1, 'Kishoreganj', 'কিশোরগঞ্জ', '', '', ''),
(7, 1, 'Manikganj', 'মানিকগঞ্জ', '', '', ''),
(8, 1, 'Dhaka', 'ঢাকা', '', '', ''),
(9, 1, 'Munshiganj', 'মুন্সিগঞ্জ', '', '', ''),
(10, 1, 'Rajbari', 'রাজবাড়ী', '', '', ''),
(11, 1, 'Madaripur', 'মাদারীপুর', '', '', ''),
(12, 1, 'Gopalganj', 'গোপালগঞ্জ', '', '', ''),
(13, 1, 'Faridpur', 'ফরিদপুর', '', '', ''),
(14, 2, 'Comilla', 'কুমিল্লা', '', '', ''),
(15, 2, 'Feni', 'ফেনী', '', '', ''),
(16, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '', '', ''),
(17, 2, 'Rangamati', 'রাঙ্গামাটি', '', '', ''),
(18, 2, 'Noakhali', 'নোয়াখালী', '', '', ''),
(19, 2, 'Chandpur', 'চাঁদপুর', '', '', ''),
(20, 2, 'Lakshmipur', 'লক্ষ্মীপুর', '', '', ''),
(21, 2, 'Chittagong', 'চট্টগ্রাম', '', '', ''),
(22, 2, 'Coxsbazar', 'কক্সবাজার', '', '', ''),
(23, 2, 'Khagrachhari', 'খাগড়াছড়ি', '', '', ''),
(24, 2, 'Bandarban', 'বান্দরবান', '', '', ''),
(25, 3, 'Sirajganj', 'সিরাজগঞ্জ', '', '', ''),
(26, 3, 'Pabna', 'পাবনা', '', '', ''),
(27, 3, 'Bogra', 'বগুড়া', '', '', ''),
(28, 3, 'Rajshahi', 'রাজশাহী', '', '', ''),
(29, 3, 'Natore', 'নাটোর', '', '', ''),
(30, 3, 'Joypurhat', 'জয়পুরহাট', '', '', ''),
(31, 3, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '', '', ''),
(32, 3, 'Naogaon', 'নওগাঁ', '', '', ''),
(33, 4, 'Jessore', 'যশোর', '', '', ''),
(34, 4, 'Satkhira', 'সাতক্ষীরা', '', '', ''),
(35, 4, 'Meherpur', 'মেহেরপুর', '', '', ''),
(36, 4, 'Narail', 'নড়াইল', '', '', ''),
(37, 4, 'Chuadanga', 'চুয়াডাঙ্গা', '', '', ''),
(38, 4, 'Kushtia', 'কুষ্টিয়া', '', '', ''),
(39, 4, 'Magura', 'মাগুরা', '', '', ''),
(40, 4, 'Khulna', 'খুলনা', '', '', ''),
(41, 4, 'Bagerhat', 'বাগেরহাট', '', '', ''),
(42, 4, 'Jhenaidah', 'ঝিনাইদহ', '', '', ''),
(43, 5, 'Jhalakathi', 'ঝালকাঠি', '', '', ''),
(44, 5, 'Patuakhali', 'পটুয়াখালী', '', '', ''),
(45, 5, 'Pirojpur', 'পিরোজপুর', '', '', ''),
(46, 5, 'Barisal', 'বরিশাল', '', '', ''),
(47, 5, 'Bhola', 'ভোলা', '', '', ''),
(48, 5, 'Barguna', 'বরগুনা', '', '', ''),
(49, 6, 'Panchagarh', 'পঞ্চগড়', '', '', ''),
(50, 6, 'Dinajpur', 'দিনাজপুর', '', '', ''),
(51, 6, 'Lalmonirhat', 'লালমনিরহাট', '', '', ''),
(52, 6, 'Nilphamari', 'নীলফামারী', '', '', ''),
(53, 6, 'Gaibandha', 'গাইবান্ধা', '', '', ''),
(54, 6, 'Thakurgaon', 'ঠাকুরগাঁও', '', '', ''),
(55, 6, 'Rangpur', 'রংপুর', '', '', ''),
(56, 6, 'Kurigram', 'কুড়িগ্রাম', '', '', ''),
(57, 7, 'Sylhet', 'সিলেট', '', '', ''),
(58, 7, 'Moulvibazar', 'মৌলভীবাজার', '', '', ''),
(59, 7, 'Habiganj', 'হবিগঞ্জ', '', '', ''),
(60, 7, 'Sunamganj', 'সুনামগঞ্জ', '', '', ''),
(61, 8, 'Sherpur', 'শেরপুর', '', '', ''),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '', '', ''),
(63, 8, 'Jamalpur', 'জামালপুর', '', '', ''),
(64, 8, 'Netrokona', 'নেত্রকোণা', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_div_id_foreign` (`div_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_div_id_foreign` FOREIGN KEY (`div_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
