-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2025 at 08:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `product_id`, `customer_id`, `quantity`, `price`) VALUES
(1, 6, 1, 1, 1200),
(2, 9, 1, 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `full_name`, `email`, `password`, `contact`, `address`, `username`) VALUES
(1, 'Nischal Shakya', 'nischalshakya55@gmail.com', '$2y$10$5QdlLWTPjy8JABHx2d4Vs.Xe1S6MppYDlRSdESrKgxKRwPgL7UnN6', '9840151590', 'Kumaripati, lalipur,nepal', 'nischal55');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int NOT NULL,
  `Category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `Category_name`) VALUES
(1, 'Sunglasses'),
(2, 'Reading Glasses'),
(3, 'Contact Lenses'),
(4, 'Computer Glasses'),
(5, 'Power Glasses');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` int NOT NULL,
  `isfeatured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_one` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_title`, `product_category`, `isfeatured`, `quantity`, `description`, `product_image_one`, `product_image_two`, `product_image_three`, `product_price`) VALUES
(4, 'John Jacobs Mid Gunmetal', 1, '1', 2, '<p>UV protection</p>', 'uploads/products/6784cc80ad70c0.72841108-product_three_2.webp', 'uploads/products/6784cc80ad71a2.50425505-product_three_1.webp', 'uploads/products/6784cc80ad71b4.37750917-product_three_3.webp', 5400),
(6, 'Hooper Light Gray Wafer', 1, '0', 2, '<p>UV protected</p>', 'uploads/products/67855241180648.77500010-product-5-1.webp', 'uploads/products/67855241180829.34174223-product-5-2.webp', 'uploads/products/67855241180865.25030956-product-5-3.webp', 3200),
(7, 'Pink Transparent Full Rim Cat Eye', 5, '0', 4, '<p>Light weight</p>', 'uploads/products/67865c858a7c10.74381579-product-6-1.webp', 'uploads/products/67865c858a7d63.14362726-product-6-2.webp', 'uploads/products/67865c858a7d79.07341260-product-6-3.webp', 750),
(8, 'Full Rim Wayfarer', 1, '0', 4, '<p>UV protection</p>', 'uploads/products/67865d56638bb3.75665380-product-7-1.webp', 'uploads/products/67865d56638cc0.82978508-product-7-2.webp', 'uploads/products/67865d56638cd3.98204144-product-7-3.webp', 4000),
(9, 'Black Full Rim Wayfarer', 1, '0', 6, '<p>UV Protection</p>', 'uploads/products/67865dde345be8.43212579-product-8-1.webp', 'uploads/products/67865dde345c98.32174306-product-8-2.webp', 'uploads/products/67865dde345ca0.45679735-product-8-3.webp', 1500),
(10, 'Gray Transparent Full Rim Square', 5, '1', 5, '<p>Lightweight</p>', 'uploads/products/678df25abd0002.48425726-6784c13a1b5ad5.29163292-product_one_2.webp', 'uploads/products/678df25abd0105.05055248-6784c13a1b5ba4.41520196-product_one-3.webp', 'uploads/products/678df25abd0121.62113529-6784c12453aa76.61816687-product_one_1.webp', 1200),
(11, 'Metal Frame ', 5, '1', 4, '<p>Lightweight</p>', 'uploads/products/678df2bedd7094.27230537-6784caa17ef4d8.89654791-product_two_1.webp', 'uploads/products/678df2bedd7225.26187914-6784caa17ef612.72969472-product_two_2.webp', 'uploads/products/678df2bedd7243.00817371-6784caa17ef620.28074178-product_two_3.webp', 1200),
(12, 'Ladies Sunglasses Brown Shade', 1, '0', 3, '<p>UV protected</p>', 'uploads/products/678df359afb968.55506291-678551975d1336.64920644-product-4-1.webp', 'uploads/products/678df359afbcd6.22522046-678551975d1445.12671049-product-4-2.webp', 'uploads/products/678df359afbd05.24070825-678551975d1463.61239445-product-4-3.webp', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$P05pUpdXniUAZ7V7r1ed9OmovYGFy7vxe4rvdsDk29cf/IFCo9N8y', 'nischalshakya55@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
