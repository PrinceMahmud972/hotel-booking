-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 08:23 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Soton chondro shill', 'soton@example.com', '0171000000', 'a Room', 'this is test message', 0, '2022-04-23 08:17:32', '2022-04-23 08:22:04'),
(3, 'test', 'admin@example.com', '01729673492', 'other', 'eee', 1, '2022-04-23 08:21:41', '2022-04-23 08:22:13');

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
(40, '2014_10_12_000000_create_users_table', 1),
(41, '2014_10_12_100000_create_password_resets_table', 1),
(42, '2019_08_19_000000_create_failed_jobs_table', 1),
(43, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(44, '2022_04_13_094406_create_expneses_table', 1),
(45, '2022_04_16_081229_create_room_types_table', 1),
(46, '2022_04_16_081740_create_rooms_table', 1),
(47, '2022_04_18_040729_create_room_type_images_table', 1),
(48, '2022_04_19_115028_create_bookings_table', 1),
(51, '2022_04_23_123731_create_contacts_table', 2),
(52, '2022_04_23_142731_create_services_table', 3),
(53, '2022_04_24_091445_create_sliders_table', 4);

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
(1, 1, 'Room 101', 'Manager', '2022-04-23 06:28:08', '2022-04-23 06:28:08'),
(2, 2, 'Room 102', 'Manager', '2022-04-23 06:28:16', '2022-04-23 06:28:16'),
(3, 3, 'Room 103', 'Manager', '2022-04-23 06:28:25', '2022-04-23 06:28:25'),
(4, 4, 'Room 104', 'Manager', '2022-04-23 06:28:36', '2022-04-23 06:28:36'),
(5, 5, 'Room 105', 'Manager', '2022-04-23 06:28:46', '2022-04-23 06:28:46');

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
(1, 'Double bedroom', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '4500', 'Admin', '2022-04-23 06:23:06', '2022-04-23 09:49:42'),
(2, 'King Size Bedroom', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '2000', 'Admin', '2022-04-23 06:25:19', '2022-04-23 09:49:30'),
(3, 'Single room', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '1500', 'Admin', '2022-04-23 06:25:56', '2022-04-23 09:49:11'),
(4, 'Family Room', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '5000', 'Admin', '2022-04-23 06:26:39', '2022-04-23 09:48:54'),
(5, 'Honeymoon Suite', 'A modern hotel room in Star Hotel\r\nNunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.\r\n\r\n Incl. breakfast\r\n Private balcony\r\n Sea view\r\n Free Wi-Fi\r\n Incl. breakfast\r\n Bathroom', '4200', 'Admin', '2022-04-23 06:27:45', '2022-04-23 09:46:36');

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
(7, 5, 'upload/images/roomTypeImage/1730892063463911.jpeg', 'Honeymoon Suite', '2022-04-23 09:48:25', '2022-04-23 09:48:25'),
(8, 4, 'upload/images/roomTypeImage/1730892094445409.jpg', 'Family Room', '2022-04-23 09:48:56', '2022-04-23 09:48:56'),
(9, 3, 'upload/images/roomTypeImage/1730892111948696.jpg', 'Single room', '2022-04-23 09:49:13', '2022-04-23 09:49:13'),
(10, 2, 'upload/images/roomTypeImage/1730892131802332.jpg', 'King Size Bedroom', '2022-04-23 09:49:30', '2022-04-23 09:49:30'),
(11, 1, 'upload/images/roomTypeImage/1730892144061789.jpg', 'Double bedroom', '2022-04-23 09:49:42', '2022-04-23 09:49:42'),
(12, 1, 'upload/images/roomTypeImage/1730892181901267.jpg', 'Double bedroom', '2022-04-23 09:50:20', '2022-04-23 09:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_icon`, `service_title`, `service_desc`, `created_at`, `updated_at`) VALUES
(1, 'fa fa-glass fa-lg', 'Beverages included', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum.', '2022-04-23 08:53:11', '2022-04-23 09:04:32'),
(2, 'fa fa-credit-card fa-lg', 'Stay First, Pay After!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum.', '2022-04-23 09:08:53', '2022-04-23 09:08:53'),
(3, 'fa fa-cutlery fa-lg', '24 Hour Restaurant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum.', '2022-04-23 09:09:35', '2022-04-23 09:09:35'),
(4, 'fa fa-tint fa-lg', 'Spa Included!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum.', '2022-04-23 09:10:11', '2022-04-23 09:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `slider_title`, `slider_short_desc`, `created_at`, `updated_at`) VALUES
(2, 'upload/images/slider/1730962713100679.jpg', 'Double Room', '2000 BDT - a night this summer', '2022-04-24 04:07:44', '2022-04-24 05:00:20'),
(4, 'upload/images/slider/1730964519414371.jpg', 'Family Room', '3000 BDT - a night this summer', '2022-04-24 05:00:05', '2022-04-24 05:00:05');

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
(1, 'Admin', 'admin@example.com', '$2y$10$Pm79BB/QkqK8tqb42A4yq.lRvk32jtnKkSj.MY3YNUTu.U5FfLMQC', '01729673492', 'uttara', '1548759658', 'avatar.png', '1', NULL, NULL, '2022-04-23 06:19:25', '2022-04-23 06:19:25'),
(2, 'Manager', 'manager@example.com', '$2y$10$/hmrsI/vHf53D8Isi5EhHuV4EHYq9Y28Jd0F7xqER9Rs6A88gLI2W', '01939673492', 'Dhaka', '1348759658', 'avatar.png', '2', NULL, NULL, '2022-04-23 06:20:53', '2022-04-23 06:20:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expneses`
--
ALTER TABLE `expneses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_type_images`
--
ALTER TABLE `room_type_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
