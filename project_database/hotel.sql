-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 12:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` tinyint(4) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkin_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `customer_name`, `customer_phone`, `checkin_date`, `checkout_date`, `booking_status`, `created_at`, `updated_at`) VALUES
(3, 11, NULL, '01729673492', '2022-04-21T14:03', '2022-04-22T14:03', 0, '2022-04-21 08:04:03', '2022-04-21 08:04:03'),
(4, 4, 'Md. Rabbi', '01600750001', '2022-04-22T14:05', '2022-04-23T14:05', 1, '2022-04-21 08:05:40', '2022-04-21 09:20:15'),
(5, 12, NULL, '01552487654', '2022-04-21T14:04', '2022-04-22T14:06', 0, '2022-04-21 08:06:10', '2022-04-21 08:06:10'),
(6, 6, 'Mr. XXX', '01422487654', '2022-04-22T14:05', '2022-04-23T14:06', 1, '2022-04-21 08:06:44', '2022-04-21 09:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `expneses`
--

CREATE TABLE `expneses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` date NOT NULL,
  `prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2022_04_13_094406_create_expneses_table', 2),
(32, '2022_04_16_081229_create_room_types_table', 3),
(33, '2022_04_16_081740_create_rooms_table', 3),
(34, '2022_04_18_040729_create_room_type_images_table', 4),
(39, '2022_04_19_115028_create_bookings_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` tinyint(4) NOT NULL,
  `room_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type_id`, `room_title`, `prepared_by`, `created_at`, `updated_at`) VALUES
(11, 13, 'Room 101', 'Admin', '2022-04-21 08:01:05', '2022-04-21 08:01:05'),
(12, 14, 'Room 102', 'Admin', '2022-04-21 08:01:22', '2022-04-21 08:01:22'),
(13, 15, 'Room 103', 'Admin', '2022-04-21 08:02:40', '2022-04-21 08:02:40'),
(14, 16, 'Room 104', 'Admin', '2022-04-21 08:02:51', '2022-04-21 08:02:51'),
(15, 17, 'Room 105', 'Admin', '2022-04-21 08:03:01', '2022-04-21 08:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `room_type_title`, `room_type_details`, `room_type_price`, `prepared_by`, `created_at`, `updated_at`) VALUES
(13, 'Double bedroom', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '1000', 'Admin', '2022-04-21 07:56:37', '2022-04-21 07:56:37'),
(14, 'King Size Bedroom', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '3000', 'Admin', '2022-04-21 07:57:44', '2022-04-21 07:57:44'),
(15, 'Single room', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '1500', 'Admin', '2022-04-21 07:58:22', '2022-04-21 07:58:22'),
(16, 'Honeymoon Suite', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '5000', 'Admin', '2022-04-21 07:58:59', '2022-04-21 07:58:59'),
(17, 'Family Room', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '4000', 'Admin', '2022-04-21 08:00:26', '2022-04-21 08:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `room_type_images`
--

CREATE TABLE `room_type_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` tinyint(4) NOT NULL,
  `img_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_type_images`
--

INSERT INTO `room_type_images` (`id`, `room_type_id`, `img_src`, `img_alt`, `created_at`, `updated_at`) VALUES
(25, 13, 'upload/images/roomTypeImage/1730703836051960.jpg', 'Double bedroom', '2022-04-21 07:56:38', '2022-04-21 07:56:38'),
(26, 14, 'upload/images/roomTypeImage/1730703906297413.jpeg', 'King Size Bedroom', '2022-04-21 07:57:44', '2022-04-21 07:57:44'),
(27, 15, 'upload/images/roomTypeImage/1730703945648221.jpg', 'Single room', '2022-04-21 07:58:23', '2022-04-21 07:58:23'),
(28, 16, 'upload/images/roomTypeImage/1730703984178379.jpg', 'Honeymoon Suite', '2022-04-21 07:59:00', '2022-04-21 07:59:00'),
(29, 17, 'upload/images/roomTypeImage/1730704075626792.jpg', 'Family Room', '2022-04-21 08:00:26', '2022-04-21 08:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `nid`, `image`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'manager@example.com', '$2y$10$WS7ARZDJpMbVTi6OFm7/w.sJPv4/5ZLewNcOq5fwB3PhyFcJCvq8O', '0176651263', 'uttara, NO: 6 Sector', '1512165465', 'avatar.png', '2', NULL, 'dTCxoXKPLVjySbbbaMiLKHHYyPLTy3UyIdtdogMhB7ytoCvBttAxb4awKAbc', '2022-04-13 03:07:24', '2022-04-13 03:07:24'),
(2, 'Admin', 'admin@example.com', '$2y$10$V8jFDzgweZsoaOMUrqs2leC3KJ4NJ3/DLiZbCXttFk.fVYjRnFFoe', '0171000000', 'uttara', '5254443', 'avatar.png', '1', NULL, NULL, '2022-04-14 03:44:40', '2022-04-14 03:44:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expneses`
--
ALTER TABLE `expneses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type_images`
--
ALTER TABLE `room_type_images`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expneses`
--
ALTER TABLE `expneses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `room_type_images`
--
ALTER TABLE `room_type_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
