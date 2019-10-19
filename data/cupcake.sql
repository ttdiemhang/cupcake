-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 07:15 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cupcake`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `date_order` date NOT NULL,
  `total` double NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-09-03', 20000, '', NULL, NULL),
(2, 4, '2019-09-28', 450000, 'a', '2019-09-28 09:41:30', '2019-09-28 09:41:30'),
(3, 5, '2019-09-28', 450000, 'a', '2019-09-28 09:42:51', '2019-09-28 09:42:51'),
(4, 13, '2019-09-28', 150000, 'a', '2019-09-28 09:50:20', '2019-09-28 09:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bill` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 16, '2', 320000, NULL, NULL),
(2, 2, 2, '2', 150000, '2019-09-28 09:41:30', '2019-09-28 09:41:30'),
(3, 2, 3, '1', 150000, '2019-09-28 09:41:30', '2019-09-28 09:41:30'),
(4, 3, 2, '2', 150000, '2019-09-28 09:42:51', '2019-09-28 09:42:51'),
(5, 3, 3, '1', 150000, '2019-09-28 09:42:51', '2019-09-28 09:42:51'),
(6, 4, 2, '1', 150000, '2019-09-28 09:50:20', '2019-09-28 09:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Hằng', 'Nữ', 'hang@gmail.com', 'Dà Nẵng', '0123456789', 'Xin chào', NULL, NULL),
(4, 'Đỗ Thị Thiên Ngân 1', 'on', 'abc@gmail.com', 'a', '12222222222222222222', 'a', '2019-09-28 09:41:30', '2019-09-28 09:41:30'),
(5, 'Đỗ Thị Thiên Ngân 1', 'on', 'abc@gmail.com', 'a', '12222222222222222222', 'a', '2019-09-28 09:42:51', '2019-09-28 09:42:51'),
(13, 'test', 'on', 'test1@gmail.com', 'b', '12222222222222222222', 'a', '2019-09-28 09:50:20', '2019-09-28 09:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_09_17_181815_create_customer_table', 1),
(3, '2019_09_17_182018_create_bills_table', 1),
(4, '2019_09_17_182528_create_bill_detail_table', 1),
(5, '2019_09_17_182655_create_products_table', 1),
(6, '2019_09_17_182724_create_type_products_table', 1),
(7, '2019_09_17_182823_create_news_table', 1),
(8, '2019_09_17_184628_add_fk_bills_table', 1),
(9, '2019_09_17_184855_add_fk_bill_detail_table', 1),
(10, '2019_09_17_185018_add_fk_products_table', 1),
(11, '2019_09_24_184258_create_slide_table', 2),
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_06_11_145812_create_tbl_admin_table', 1),
(22, '2019_06_17_161852_create_tbl_category_product', 1),
(23, '2019_06_19_152045_create_tbl_brand_product', 1),
(24, '2019_06_19_155204_create_tbl_product', 1),
(25, '2019_08_17_030852_tbl_customer', 1),
(26, '2019_08_17_044054_tbl_shipping', 2),
(30, '2019_08_28_142718_tbl_payment', 3),
(31, '2019_08_28_142750_tbl_order', 3),
(32, '2019_08_28_142810_tbl_order_details', 3),
(33, '2019_09_28_163032_create_roles_table', 4),
(34, '2019_09_28_163210_create_role_users_table', 4),
(35, '2019_09_28_163333_add_fk_role_user_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `promotion_price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `new` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `created_at`, `updated_at`, `new`) VALUES
(2, 'Bánh CupCake Dâu', 1, 'Bánh CupCake Dâu thơm ngon', 150000.00, 120000.00, 'ckdau.jpg', 'Cái', NULL, NULL, 1),
(3, 'Bánh CupCake Sầu Riêng', 1, '', 150000.00, 0.00, 'cksr.jpg', 'Cái', NULL, NULL, 1),
(4, 'Bánh CupCake Dừa', 1, '', 150000.00, 120000.00, 'ckdua.jpg', 'Cái', NULL, NULL, 1),
(5, 'Bánh CupCake Socola', 1, '', 150000.00, 120000.00, 'ckscl.jpg', 'Cái', NULL, NULL, 0),
(6, 'Bánh CupCake Bơ - Phômai', 1, '', 150000.00, 120000.00, 'ckbo.jpg', 'Cái', NULL, NULL, 0),
(7, 'BÁNH LƯỠI MÈO', 4, '', 28000.00, 26000.00, 'ckluoimeo.jpg', 'grams', NULL, NULL, 1),
(8, 'CIGARETTES', 4, '', 35000.00, 0.00, 'ck2.jpg', 'grams', NULL, NULL, 1),
(9, 'COCONUT - DỪA', 4, '', 28000.00, 0.00, 'ckccnutdua.jpg', 'grams', NULL, NULL, 0),
(10, 'RAISIN NHO', 4, '', 25000.00, 23000.00, 'ckraisinnho.jpg', 'grams', NULL, NULL, 1),
(11, 'PALMIER', 4, '', 30000.00, 0.00, 'ck1.jpg', 'grams', NULL, NULL, 0),
(12, 'STRAWBERRY CAKE', 2, '', 275000.00, 0.00, 'snck.jpg', 'Cái', NULL, NULL, 1),
(13, 'TIRAMISU XÙ', 2, '', 200000.00, 0.00, 'snxu.jpg', 'Cái', NULL, NULL, 1),
(14, 'MOIST CHOCOLATE FOUR LOVE', 2, '', 300000.00, 280000.00, 'snscl.jpg', 'Cái', NULL, NULL, 0),
(15, 'CARAMEN CHOCOLATE CAKE', 2, '', 280000.00, 0.00, 'sncrm.jpg', 'Cái', NULL, NULL, 0),
(16, 'ANGEL KITTY CAKE', 2, '', 320000.00, 0.00, 'snkt.jpg', 'Cái', NULL, NULL, 1),
(17, 'PETIT MOUSSE CHANH LEO', 5, '', 5000.00, 0.00, 'mncl.jpg', 'Cái', NULL, NULL, 1),
(18, 'TIRAMISU CAKE PIECE', 5, '', 32000.00, 0.00, 'mnck.jpg', 'Cái', NULL, NULL, 1),
(19, 'LIGHT CHEESE CAKE', 5, '', 75000.00, 70000.00, 'mnl.jpg', 'Cái', NULL, NULL, 0),
(20, 'MOKA CAKE PIECE', 5, '', 32000.00, 0.00, 'mnmk.jpg', 'Cái', NULL, NULL, 0),
(21, 'BÁNH SUKEM', 5, '', 4500.00, 0.00, 'mnsk.jpg', 'Cái', NULL, NULL, 0),
(22, 'BÁNH NHO KHOAI', 6, '', 15000.00, 0.00, 'bmn.jpg', 'Cái', NULL, NULL, 1),
(23, 'PAIN CHOCOLATE', 6, '', 15000.00, 0.00, 'bmp.jpg', 'Cái', NULL, NULL, 0),
(24, 'PATESO MINI', 6, '', 6000.00, 0.00, 'bmmn.jpg', 'Cái', NULL, NULL, 0),
(25, 'SỪNG BÒ', 6, '', 12000.00, 0.00, 'bmsb.jpg', 'Cái', NULL, NULL, 0),
(26, 'PIZZA MINI', 6, '', 6000.00, 6000.00, 'bmpz.jpg', 'Cái', NULL, NULL, 0),
(27, 'BÁNH MÌ BAGUETTE', 7, '', 9000.00, 0.00, 'bmba.jpg', 'Cái', NULL, NULL, 1),
(28, 'BÁNH MÌ ĐEN', 7, '', 15000.00, 0.00, 'bmd.jpg', 'Cái', NULL, NULL, 0),
(29, 'BÁNH MÌ VỪNG', 7, '', 1000.00, 0.00, 'bmv.jpg', 'Cái', NULL, NULL, 0),
(30, 'BÁNH MỲ CHUỘT', 7, '', 2000.00, 0.00, 'bmc.jpg', 'Cái', NULL, NULL, 1),
(31, 'BÁNH MỲ GỐI', 7, '', 11000.00, 0.00, 'bmg.jp', 'Cái', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'editor', NULL, NULL),
(3, 'member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, '', 'bn1.jpg', NULL, NULL),
(2, '', 'bn2.jpg', NULL, NULL),
(3, '', 'bn5.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Cup Cake', '', '', NULL, NULL),
(2, 'Bánh Sinh Nhật', '', '', NULL, NULL),
(4, 'COOKIES', '', '', NULL, NULL),
(5, 'MINI CAKE', '', '', NULL, NULL),
(6, 'Bánh Mặn', '', '', NULL, NULL),
(7, 'Bánh Mỳ', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '1111111', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_id_customer_foreign` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_id_bill_foreign` (`id_bill`),
  ADD KEY `bill_detail_id_product_foreign` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD KEY `role_users_user_id_foreign` (`user_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
