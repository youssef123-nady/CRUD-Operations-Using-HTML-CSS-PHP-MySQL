-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 08:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(60,0) NOT NULL,
  `private` decimal(30,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `private`) VALUES
(1, 'غراء بنتا بنفسجي', 45, 38.00),
(2, 'غراء بنتا رصاصي', 55, 48.00),
(3, 'غراء بنتا حمراء', 65, 60.00),
(4, 'غراء 777', 35, 24.00),
(5, 'مفصله سندوتش 5سم', 4, 2.50),
(6, 'متر سلك ازرق', 35, 24.00),
(7, 'متر سلك مجلفن', 35, 24.00),
(8, 'متر سلك بيج', 35, 25.00),
(9, 'متر سلك 1.25 متر بيج', 45, 38.00),
(10, 'طقم سرير 15 تقيل', 85, 73.00),
(11, 'طقم سرير 15سم وسط', 55, 45.50),
(12, 'كانه حديد GK', 4, 2.40),
(13, 'كالون حجره ايطالي', 135, 115.00),
(14, 'كالون حجره تركي', 135, 125.00),
(15, 'كالون سلندر اهرام', 325, 310.00),
(16, 'كالون اشاره اهرام فولاز', 125, 107.00),
(17, 'مفصله مطبخ عدله باكم ', 30, 16.50),
(18, 'طقم اوكرا 505 اشاره', 125, 107.00),
(19, 'طقم اوكرا 505 حجره', 125, 96.50),
(20, 'كيلو مسمار عادي	', 55, 42.00),
(21, 'turbo طقم عجل', 115, 105.00),
(22, 'tigger طقم عجل', 110, 100.00),
(23, 'كالون حجره اهرام', 120, 105.00),
(24, 'كالون اهرام فل', 480, 445.00),
(25, 'لفه سلك ازرق شركه الحمد', 720, 560.00),
(26, 'لفه سلك صلب مجلفن', 525, 475.00),
(27, 'umx طقم تجميع دولاب ', 7, 5.20),
(28, 'مفصله 14سم', 14, 9.20),
(29, 'مسمار هوا 5 سم', 160, 150.00),
(30, 'سيخ دولاب دفن ', 50, 40.00),
(31, 'مسمار سن صاج مستورد', 120, 100.00),
(32, 'مسمار سن صاج نصار ', 100, 80.00),
(33, 'مسمار سن صاج مستورد دهبي - فضي', 120, 100.00),
(34, 'مسمار بصموله 10م', 5, 3.00),
(35, 'طقم سلم كبير عموله', 80, 65.00),
(36, 'طقم سلم صغيرعموله', 60, 50.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
