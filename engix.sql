-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 06:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameEn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameAr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryNameAr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryNameEn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCategoryAr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subCategoryEn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryNameAr`, `categoryNameEn`, `subCategoryAr`, `subCategoryEn`, `created_at`, `updated_at`) VALUES
(1, 'خدمات الحلول البرمجيه', 'Software solutions services', 'تطبيقات التجارة الإلكترونيه', 'E-commerce applications', '2023-01-25 00:31:44', '2023-01-25 00:31:44'),
(2, 'خدمات الحلول البرمجيه', 'Software solutions services', 'تصميم وتطوير المواقع', 'Website design and development', '2023-01-25 00:35:31', '2023-01-25 00:35:31'),
(3, 'خدمات الحلول البرمجيه', 'Software solutions services', 'وتطبيقات التجارة الإلكترونيه', 'E-commerce applications', '2023-01-25 00:37:15', '2023-01-25 00:37:15'),
(4, 'خدمات الحلول البرمجيه', 'Software solutions services', 'إستضافة السيرفرات', 'Hosting servers', '2023-01-25 00:37:34', '2023-01-25 00:37:34');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` blob NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537383934322e706e67, 1, '2023-01-25 00:49:02', '2023-01-25 00:49:02'),
(2, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393030312e706e67, 1, '2023-01-25 00:50:01', '2023-01-25 00:50:01'),
(3, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393031312e706e67, 2, '2023-01-25 00:50:11', '2023-01-25 00:50:11'),
(4, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393031372e706e67, 2, '2023-01-25 00:50:17', '2023-01-25 00:50:17'),
(5, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393033302e706e67, 3, '2023-01-25 00:50:30', '2023-01-25 00:50:30'),
(6, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393034382e706e67, 3, '2023-01-25 00:50:49', '2023-01-25 00:50:49'),
(7, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393038352e706e67, 4, '2023-01-25 00:51:25', '2023-01-25 00:51:25'),
(8, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393039312e706e67, 4, '2023-01-25 00:51:31', '2023-01-25 00:51:31'),
(9, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393130302e706e67, 5, '2023-01-25 00:51:40', '2023-01-25 00:51:40'),
(10, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393130362e706e67, 5, '2023-01-25 00:51:46', '2023-01-25 00:51:46'),
(11, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393131342e706e67, 6, '2023-01-25 00:51:54', '2023-01-25 00:51:54'),
(12, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393132312e706e67, 6, '2023-01-25 00:52:01', '2023-01-25 00:52:01'),
(13, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393133312e706e67, 7, '2023-01-25 00:52:11', '2023-01-25 00:52:11'),
(14, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393133392e706e67, 7, '2023-01-25 00:52:19', '2023-01-25 00:52:19'),
(15, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393136352e706e67, 8, '2023-01-25 00:52:45', '2023-01-25 00:52:45'),
(16, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f70726f64756374732f496d616765313637343537393137312e706e67, 8, '2023-01-25 00:52:51', '2023-01-25 00:52:51');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_19_024246_create_admins_table', 1),
(6, '2023_01_19_051522_create_categories_table', 1),
(7, '2023_01_19_055220_create_products_table', 1),
(8, '2023_01_22_101646_create_images_table', 1),
(9, '2023_01_22_190543_create_suppliers_table', 1),
(10, '2023_01_24_133228_create_sliders_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameEn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameAr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionAr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionEn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nameEn`, `nameAr`, `descriptionAr`, `descriptionEn`, `price`, `amount`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'product1', 'منتج 1', 'وصف المنتج 1', 'description product 1', 15.00, 15, 1, '2023-01-25 00:39:13', '2023-01-25 00:39:13'),
(2, 'product2', 'منتج 2', 'وصف المنتج 2', 'description product 2', 15.00, 15, 1, '2023-01-25 00:39:32', '2023-01-25 00:39:32'),
(3, 'product3', 'منتج 3', 'وصف المنتج 3', 'description product 3', 15.00, 15, 2, '2023-01-25 00:39:51', '2023-01-25 00:39:51'),
(4, 'product4', 'منتج 4', 'وصف المنتج 4', 'description product 3', 15.00, 15, 2, '2023-01-25 00:40:12', '2023-01-25 00:40:12'),
(5, 'product5', 'منتج 5', 'وصف المنتج 5', 'description product 5', 15.00, 15, 3, '2023-01-25 00:40:54', '2023-01-25 00:40:54'),
(6, 'product6', 'منتج 6', 'وصف المنتج 5', 'description product 6', 15.00, 15, 3, '2023-01-25 00:41:08', '2023-01-25 00:41:08'),
(7, 'product7', 'منتج 7', 'وصف المنتج 7', 'description product 7', 15.00, 15, 4, '2023-01-25 00:41:26', '2023-01-25 00:41:26'),
(8, 'product8', 'منتج 8', 'وصف المنتج 5', 'description product 8', 15.00, 15, 4, '2023-01-25 00:41:46', '2023-01-25 00:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f736c696465722f496d616765313637343537393538392e706e67, '2023-01-25 00:59:49', '2023-01-25 00:59:49'),
(2, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f736c696465722f496d616765313637343537393630322e706e67, '2023-01-25 01:00:02', '2023-01-25 01:00:02'),
(3, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f736c696465722f496d616765313637343537393631352e706e67, '2023-01-25 01:00:15', '2023-01-25 01:00:15'),
(4, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f736c696465722f496d616765313637343537393633332e706e67, '2023-01-25 01:00:33', '2023-01-25 01:00:33'),
(5, 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f736c696465722f496d616765313637343537393634322e706e67, '2023-01-25 01:00:43', '2023-01-25 01:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameAr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameEn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nameAr`, `nameEn`, `image`, `created_at`, `updated_at`) VALUES
(1, 'الموردين1', 'supplisers1', 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f737570706c697365722f496d616765313637343537393833362e706e67, '2023-01-25 01:03:56', '2023-01-25 01:03:56'),
(2, 'الموردين2', 'supplisers2', 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f737570706c697365722f496d616765313637343537393835312e706e67, '2023-01-25 01:04:12', '2023-01-25 01:04:12'),
(3, 'الموردين3', 'supplisers3', 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f737570706c697365722f496d616765313637343537393836342e706e67, '2023-01-25 01:04:24', '2023-01-25 01:04:24'),
(4, 'الموردين4', 'supplisers4', 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f737570706c697365722f496d616765313637343537393837392e706e67, '2023-01-25 01:04:39', '2023-01-25 01:04:39'),
(5, 'الموردين5', 'supplisers5', 0x687474703a2f2f3132372e302e302e313a383030302f696d616765732f737570706c697365722f496d616765313637343537393839322e706e67, '2023-01-25 01:04:52', '2023-01-25 01:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
