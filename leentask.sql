-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2018 at 02:08 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leentask`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `title`, `image`) VALUES
(1, '2018-11-16 17:40:14', '2018-11-16 17:40:14', 'Restaurants', 'public\\category/285bef1d1e70261.jpg'),
(2, '2018-11-16 17:40:25', '2018-11-16 17:40:25', 'Coffees', 'public\\category/585bef1d29b83dd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `created_at`, `updated_at`, `image_url`, `place_id`) VALUES
(1, '2018-11-18 10:48:53', '2018-11-18 10:48:53', 'public\\place_images/6305bf15fb4b75dd.jpg', 1),
(2, '2018-11-18 10:48:53', '2018-11-18 10:48:53', 'public\\place_images/5555bf15fb5393c2.jpg', 1),
(3, '2018-11-18 10:50:51', '2018-11-18 10:50:51', 'public\\place_images/4105bf1602bbbf7b.jpg', 2),
(4, '2018-11-18 10:50:51', '2018-11-18 10:50:51', 'public\\place_images/4685bf1602bdec2e.jpg', 2),
(5, '2018-11-18 10:51:48', '2018-11-18 10:51:48', 'public\\place_images/1925bf1606420e20.jpg', 3),
(6, '2018-11-18 10:51:48', '2018-11-18 10:51:48', 'public\\place_images/1235bf160642ab46.jpg', 3),
(7, '2018-11-18 10:53:23', '2018-11-18 10:53:23', 'public\\place_images/1695bf160c36f712.jpg', 4),
(8, '2018-11-18 10:53:23', '2018-11-18 10:53:23', 'public\\place_images/8255bf160c38c4c2.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2018_11_16_151602_create_categories_table', 1),
(8, '2018_11_16_152148_create_places_table', 1),
(9, '2018_11_16_194151_create_images_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `place_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_lat` float(10,6) NOT NULL,
  `place_lng` float(10,6) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` float(10,1) DEFAULT NULL,
  `open` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `place_id`, `created_at`, `updated_at`, `place_name`, `place_address`, `place_lat`, `place_lng`, `type`, `category_id`, `icon`, `rating`, `open`) VALUES
(1, 'ChIJCQw28NzB9xQRkhH4RS0_LbY', '2018-11-18 10:48:52', '2018-11-18 10:48:52', 'Planet restaurant&cafe', 'Madinet Mit Ghamr (Include Daqados), Mit Ghamr', 30.716778, 31.253422, 'restaurant', 1, 'https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png', 3.8, 1),
(2, 'ChIJxdV1v88iWBQR_Uk_VNK37Rw', '2018-11-18 10:50:51', '2018-11-18 10:50:51', 'Piazzini Restaurant', '224, North Teseen Street', 30.025551, 31.456928, 'restaurant', 1, 'https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png', 4.2, 1),
(3, 'ChIJTy1D1uojWBQR-7PRg9YiW70', '2018-11-18 10:51:48', '2018-11-18 10:51:48', 'Tao cairo', '11835 South Teseen', 30.025551, 31.456928, 'restaurant', 1, 'https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png', 4.0, 1),
(4, 'ChIJr2IRuPo8WBQRu4nxyp9v91k', '2018-11-18 10:53:23', '2018-11-18 10:53:23', 'McDonalds', 'Orouba Axis', 30.017277, 31.415388, 'restaurant', 1, 'https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png', 4.4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'osamanasr', 'os.ns2013@gmail.com', NULL, '$2y$10$47Dpr/En0dSEzIjMZYo9GOsc631DhUqh.Q5uBkqUFP/6cYO9.cB0.', 'v43f4D0uKPv95wg8D004O1xsxqR3nzexVu6w7Dvteq3GdJ3IRHsIp9jTnRW5', '2018-11-17 22:52:47', '2018-11-17 22:52:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_place_id_foreign` (`place_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
