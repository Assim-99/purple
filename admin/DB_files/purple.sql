-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 04:55 PM
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
-- Database: `purple`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'apple'),
(2, 'oppo'),
(3, 'hp'),
(4, 'h&m'),
(5, 'dfdf'),
(6, 'adsads'),
(7, 'adsd'),
(8, 'asdas'),
(9, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`product_id`, `image`) VALUES
(22, '1732106959267thumb_image1.jpg--1732106959231thumb_image3.jpg--'),
(25, '1732450994458thumb_image6.jpg--'),
(26, '1732451013458thumb_image9.jpg--'),
(28, '1733574427763apple-watch.jpg--1733574427400beats-headphone.jpg--'),
(29, '1733575133650beats-headphone.jpg--'),
(30, '173357514155ball.jpeg--');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pr` int(11) NOT NULL,
  `date_reg` date NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `name`, `email`, `password`, `pr`, `date_reg`, `profile_image`, `phone`) VALUES
(15, 'smsm_smsm', 'Assim Elkahky', 'assim@yahoo.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 1, '2024-11-20', '173427792810face18.jpg', '0214578056'),
(16, 'wuliquron', 'Rinah Burke', 'punur@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 3, '2024-11-27', '17327098032face9.jpg', '0'),
(17, 'hoxinosy', 'Kato Noble', 'qumymyxyhu@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 3, '2024-11-27', '173270984366face13.jpg', '0'),
(18, 'jyzygkjhkjhkhj', 'Adrian Lindsay', 'vuzu@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 3, '2024-11-27', '173270988874173270986096face25.jpg', '0'),
(19, 'jyzygkjhkjhkhj', 'Adrian Lindsay', 'vuzu@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 3, '2024-11-27', 'th.jpg', '0'),
(21, 'omar_omar', 'Neil Garrison', 'omar@yahoo.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 2, '2024-11-27', 'face19.jpg', '024242'),
(23, 'dytecafftfggffg', 'Winifred Moss', 'vanon@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 2, '2024-12-14', 'th.jpg', ''),
(24, 'nuladyssssss', 'Yetta Lowery', 'zupamebih@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 3, '2024-12-14', 'th.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `pr`
--

CREATE TABLE `pr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`id`, `name`) VALUES
(1, 'woner'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `brand`, `stock`) VALUES
(22, 'Ezra Allison', 524, 4, 95),
(25, 'Dorothy Reynolds', 150, 1, 34),
(26, 'Roth Patton', 215, 2, 80),
(28, 'Inga Bowen', 167, 3, 71),
(29, 'Palmer Parks', 658, 3, 95),
(30, 'Uriah Cooke', 346, 2, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pr` (`pr`);

--
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`brand`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`pr`) REFERENCES `pr` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
