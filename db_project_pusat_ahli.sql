-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for project_pusat_ahli
CREATE DATABASE IF NOT EXISTS `project_pusat_ahli` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `project_pusat_ahli`;

-- Dumping structure for table project_pusat_ahli.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_06_07_050156_create_permission_tables', 2),
	(6, '2022_06_07_050223_create_posts_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.model_has_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(1, 'App\\Models\\User', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.permissions: ~45 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'home.index', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(2, 'register.show', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(3, 'register.perform', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(4, 'login.show', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(5, 'login.perform', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(6, 'logout.perform', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(7, 'users.index', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(8, 'users.create', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(9, 'users.store', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(10, 'users.show', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(11, 'users.edit', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(12, 'users.update', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(13, 'users.destroy', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(14, 'posts.index', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(15, 'posts.create', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(16, 'posts.store', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(17, 'posts.show', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(18, 'posts.edit', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(19, 'posts.update', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(20, 'posts.destroy', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(21, 'roles.index', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(22, 'roles.create', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(23, 'roles.store', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(24, 'roles.show', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(25, 'roles.edit', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(26, 'roles.update', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(27, 'roles.destroy', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(28, 'permissions.index', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(29, 'permissions.create', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(30, 'permissions.store', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(31, 'permissions.show', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(32, 'permissions.edit', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(33, 'permissions.update', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(34, 'permissions.destroy', 'web', '2022-06-07 05:24:35', '2022-06-07 05:24:35'),
	(35, 'rooms.index', 'web', '2022-06-25 11:28:24', '2022-06-25 11:28:24'),
	(36, 'rooms.show', 'web', '2022-06-25 11:39:03', '2022-06-25 11:39:03'),
	(37, 'rooms.create', 'web', '2022-06-25 11:39:09', '2022-06-25 11:39:09'),
	(38, 'rooms.store', 'web', '2022-06-25 11:39:18', '2022-06-25 11:39:18'),
	(39, 'rooms.edit', 'web', '2022-06-25 11:39:23', '2022-06-25 11:39:23'),
	(40, 'rooms.update', 'web', '2022-06-25 11:40:26', '2022-06-25 11:40:26'),
	(41, 'rooms.destroy', 'web', '2022-06-25 11:40:53', '2022-06-25 11:40:53'),
	(42, 'transactions.index', 'web', '2022-06-25 15:28:42', '2022-06-25 15:28:42'),
	(43, 'transactions.show', 'web', '2022-06-25 15:28:53', '2022-06-25 15:28:53'),
	(44, 'transactions.create', 'web', '2022-06-25 15:28:58', '2022-06-25 15:28:58'),
	(45, 'transactions.store', 'web', '2022-06-25 15:29:01', '2022-06-25 15:29:01'),
	(46, 'transactions.edit', 'web', '2022-06-25 15:29:04', '2022-06-25 15:29:04'),
	(47, 'transactions.update', 'web', '2022-06-25 15:29:08', '2022-06-25 15:29:08'),
	(48, 'transactions.destroy', 'web', '2022-06-25 15:29:29', '2022-06-25 15:29:29'),
	(49, 'transactions.getRoom', 'web', '2022-06-25 23:04:41', '2022-06-25 23:04:41'),
	(50, 'transactions.print', 'web', '2022-06-26 06:48:22', '2022-06-26 06:48:22');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `body`, `created_at`, `updated_at`) VALUES
	(1, 1, 'tes', 'testing', 'hahaha', '2022-06-07 06:39:01', '2022-06-07 06:39:01');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2022-06-07 05:25:16', '2022-06-07 05:25:16'),
	(2, 'kasir', 'web', '2022-06-10 09:01:36', '2022-06-10 09:01:36');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.role_has_permissions: ~83 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 2),
	(2, 1),
	(2, 2),
	(3, 1),
	(3, 2),
	(4, 1),
	(4, 2),
	(5, 1),
	(5, 2),
	(6, 1),
	(6, 2),
	(7, 1),
	(7, 2),
	(8, 1),
	(8, 2),
	(9, 1),
	(9, 2),
	(10, 1),
	(10, 2),
	(11, 1),
	(11, 2),
	(12, 1),
	(12, 2),
	(13, 1),
	(13, 2),
	(14, 1),
	(14, 2),
	(15, 1),
	(15, 2),
	(16, 1),
	(16, 2),
	(17, 1),
	(17, 2),
	(18, 1),
	(18, 2),
	(19, 1),
	(19, 2),
	(20, 1),
	(20, 2),
	(21, 1),
	(21, 2),
	(22, 1),
	(22, 2),
	(23, 1),
	(23, 2),
	(24, 1),
	(24, 2),
	(25, 1),
	(25, 2),
	(26, 1),
	(26, 2),
	(27, 1),
	(27, 2),
	(28, 1),
	(28, 2),
	(29, 1),
	(29, 2),
	(30, 1),
	(30, 2),
	(31, 1),
	(31, 2),
	(32, 1),
	(32, 2),
	(33, 1),
	(33, 2),
	(34, 1),
	(34, 2),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` varchar(6) DEFAULT 'KOSONG',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `rooms_name_unique` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table project_pusat_ahli.rooms: ~14 rows (approximately)
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`id`, `code`, `name`, `desc`, `price`, `status`, `created_at`, `updated_at`) VALUES
	(13, 'KMR220625120529', 'KAMAR NOMER 3', 'testing Hi Admin Kadin, tetap fokus dan selesaikan ya! Hi Admin Kadin, tetap fokus dan selesaikan ya!Hi Admin Kadin, tetap fokus dan selesaikan ya!Hi Admin Kadin, tetap fokus dan selesaikan ya!Hi Admin Kadin, tetap fokus dan selesaikan ya!Hi Admin Kadin, tetap fokus dan selesaikan ya!Hi Admin Kadin, tetap fokus dan selesaikan ya!Hi Admin Kadin, tetap fokus dan selesaikan ya!', 100001, 'KOSONG', '2022-06-25 12:05:29', '2022-06-26 03:21:04'),
	(14, 'KMR220626032153', 'KAMAR NOMER 4', 'testing', 80000, 'KOSONG', '2022-06-26 03:21:53', '2022-06-26 03:21:53'),
	(15, 'KMR220626032158', 'KAMAR NOMER 5', 'testing', 80000, 'KOSONG', '2022-06-26 03:21:58', '2022-06-26 03:21:58'),
	(16, 'KMR220626032201', 'KAMAR NOMER 6', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:01', '2022-06-26 03:22:01'),
	(17, 'KMR220626032205', 'KAMAR NOMER 7', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:05', '2022-06-26 03:22:05'),
	(18, 'KMR220626032208', 'KAMAR NOMER 8', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:08', '2022-06-26 03:22:08'),
	(19, 'KMR220626032211', 'KAMAR NOMER 9', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:11', '2022-06-26 03:22:11'),
	(20, 'KMR220626032214', 'KAMAR NOMER 10', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:14', '2022-06-26 03:22:14'),
	(21, 'KMR220626032225', 'KAMAR NOMER 11', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:25', '2022-06-26 03:22:31'),
	(22, 'KMR220626032236', 'KAMAR NOMER 12', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:36', '2022-06-26 03:22:36'),
	(23, 'KMR220626032238', 'KAMAR NOMER 13', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:38', '2022-06-26 03:22:38'),
	(24, 'KMR220626032242', 'KAMAR NOMER 14', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:42', '2022-06-26 03:22:42'),
	(25, 'KMR220626032248', 'KAMAR NOMER 15', 'testing', 80000, 'KOSONG', '2022-06-26 03:22:48', '2022-06-26 06:38:41'),
	(26, 'KMR220626032302', 'KAMAR NOMER 16', 'testing', 80000, 'ISI', '2022-06-26 03:23:02', '2022-06-26 06:38:58');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `room_id` bigint(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(15) NOT NULL DEFAULT '',
  `price` bigint(50) NOT NULL,
  `discount` bigint(50) NOT NULL DEFAULT 0,
  `total` bigint(50) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table project_pusat_ahli.transactions: ~2 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `room_id`, `code`, `date`, `customer_name`, `customer_phone`, `price`, `discount`, `total`, `note`, `created_at`, `updated_at`) VALUES
	(13, 26, 'TRS220626034738', '2022-06-26', 'NANDA NURMALA', '95701239090', 80000, 0, 80000, 'testing', '2022-06-26 03:47:38', '2022-06-26 06:38:58');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table project_pusat_ahli.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project_pusat_ahli.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `url_img`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Kadin', 'admin@gmail.com', 'admin', 'img-users/20220626054854.jpg', NULL, '$2y$10$u5JQphKk6o5WplqC/HsoWuqUpACNZDv/SDTRnuGlmgXQQpom49L/a', NULL, '2022-06-07 05:25:16', '2022-06-26 05:48:54'),
	(2, 'aditya', 'adityagumay68@gmail.com', 'aditia', 'img-users/noimage.jpg', NULL, '$2y$10$YBefs/aVnQfnjCn.a16oweoKxYto30nJS97b3exj/upkdLqgfC2c.', NULL, '2022-06-07 05:27:33', '2022-06-26 04:45:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
