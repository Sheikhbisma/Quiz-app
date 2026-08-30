-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2026 at 02:45 PM
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
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_quiz`
--

CREATE TABLE `add_quiz` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_quiz`
--

INSERT INTO `add_quiz` (`id`, `quiz_name`, `category_id`, `created_at`, `updated_at`) VALUES
(23, 'html-css-fundamentals', 12, '2026-08-02 11:17:34', '2026-08-02 11:17:34'),
(24, 'javascript-essentials', 12, '2026-08-02 11:21:28', '2026-08-02 11:21:28'),
(25, 'world-geography', 13, '2026-08-02 11:28:04', '2026-08-02 11:28:04'),
(26, 'science-nature', 13, '2026-08-02 11:30:15', '2026-08-02 11:30:15'),
(27, 'relational-databases', 14, '2026-08-02 11:33:01', '2026-08-02 11:33:01'),
(28, 'mysql-laravel-migrations', 14, '2026-08-02 11:35:13', '2026-08-02 11:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'bisma', 'bisma123', 'admin', '2026-02-19 21:06:39', '2026-02-19 21:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `creator`, `created_at`, `updated_at`) VALUES
(12, 'web-development-basics', 'bisma', '2026-08-02 11:16:27', '2026-08-02 11:16:27'),
(13, 'general-knowledge', 'bisma', '2026-08-02 11:16:45', '2026-08-02 11:16:45'),
(14, 'database-sql', 'bisma', '2026-08-02 11:16:59', '2026-08-02 11:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

CREATE TABLE `mcqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mcqs` varchar(500) NOT NULL,
  `Option_A` varchar(500) NOT NULL,
  `Option_B` varchar(500) NOT NULL,
  `Option_C` varchar(500) NOT NULL,
  `Option_D` varchar(500) NOT NULL,
  `Correct_Answer` varchar(10) NOT NULL,
  `description` text DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`id`, `mcqs`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Correct_Answer`, `description`, `admin_id`, `category_id`, `quiz_id`, `created_at`, `updated_at`) VALUES
(24, 'What does HTML stand for?', 'Hyper Text Markup Language', 'High Tech Modern Language', 'Hyper Transfer Markup Language', 'Home Tool Markup Language', 'A', NULL, 1, 12, 23, '2026-08-02 11:18:45', '2026-08-02 11:18:45'),
(25, 'What is CSS primarily used for?', 'Managing databases', 'Styling and designing web pages', 'Handling server-side logic', 'Writing application algorithms', 'B', NULL, 1, 12, 23, '2026-08-02 11:19:34', '2026-08-02 11:19:34'),
(26, 'Which HTML tag is used for the largest heading?', '<h6>', '<head>', '<h1>', '<heading>', 'C', NULL, 1, 12, 23, '2026-08-02 11:20:39', '2026-08-02 11:20:39'),
(27, 'What is the modern way to declare variables in JavaScript?', 'v', 'variable', 'let / const', 'int', 'C', NULL, 1, 12, 24, '2026-08-02 11:22:10', '2026-08-02 11:22:10'),
(28, 'Which of the following is NOT a JavaScript data type?', 'String', 'Boolean', 'Undefined', 'Float', 'D', NULL, 1, 12, 24, '2026-08-02 11:22:47', '2026-08-02 11:22:47'),
(29, 'Which function is used to print output to the console?', 'console.log()', 'print()', 'echo()', 'document.write()', 'A', NULL, 1, 12, 24, '2026-08-02 11:27:43', '2026-08-02 11:27:43'),
(30, 'What is the largest continent in the world?', 'Asia', 'Africa', 'Europe', 'Antarctica', 'A', NULL, 1, 13, 25, '2026-08-02 11:28:39', '2026-08-02 11:28:39'),
(31, 'Which city is the most populous in Pakistan?', 'Lahore', 'Karachi', 'Faisalabad', 'Islamabad', 'B', NULL, 1, 13, 25, '2026-08-02 11:29:15', '2026-08-02 11:29:15'),
(32, 'In which country is the Eiffel Tower located?', 'Italy', 'France', 'Germany', 'Spain', 'B', NULL, 1, 13, 25, '2026-08-02 11:29:58', '2026-08-02 11:29:58'),
(33, 'What is the longest bone in the human body?', 'Skull', 'Femur', 'Spine', 'Ribcage', 'B', NULL, 1, 13, 26, '2026-08-02 11:31:28', '2026-08-02 11:31:28'),
(34, 'What is the chemical formula for water?', 'H2O', 'CO2', 'O2', 'NaCl', 'A', NULL, 1, 13, 26, '2026-08-02 11:32:10', '2026-08-02 11:32:10'),
(35, 'Which vitamin do we get primarily from sunlight?', 'Vitamin A', 'Vitamin C', 'Vitamin D', 'Vitamin E', 'D', NULL, 1, 13, 26, '2026-08-02 11:32:40', '2026-08-02 11:32:40'),
(36, 'What does SQL stand for?', 'Simple Query Language', 'equential Query Logic', 'Standard Question Language', 'Structured Query Language', 'D', NULL, 1, 14, 27, '2026-08-02 11:33:42', '2026-08-02 11:33:42'),
(37, 'Which SQL statement is used to retrieve data from a database?', 'INSERT', 'UPDATE', 'SELECT', 'DELETE', 'C', NULL, 1, 14, 27, '2026-08-02 11:34:20', '2026-08-02 11:34:20'),
(38, 'Which constraint is used to uniquely identify each record in a table?', 'Foreign Key', 'Primary Key', 'Index', 'Unique Key', 'B', NULL, 1, 14, 27, '2026-08-02 11:35:01', '2026-08-02 11:35:01'),
(39, 'What is used in Laravel to build and modify database tables?', 'Raw SQL files', 'Migrations', 'Models only', 'Controllers', 'B', NULL, 1, 14, 28, '2026-08-02 11:35:50', '2026-08-02 11:35:50'),
(40, 'In Laravel Eloquent, what represents a database table?', 'Model', 'View', 'Route', 'Middleware', 'A', NULL, 1, 14, 28, '2026-08-02 11:36:27', '2026-08-02 11:36:27'),
(41, 'Which MySQL statement is used to modify existing data in a table?', 'UPDATE', 'MODIFY', 'CHANGE', 'ALTER', 'A', NULL, 1, 14, 28, '2026-08-02 11:37:04', '2026-08-02 11:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `mcqs_records`
--

CREATE TABLE `mcqs_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `mcq_id` bigint(20) UNSIGNED NOT NULL,
  `selected_answer` varchar(20) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_16_202136_create_admin_login_table', 1),
(5, '2026_02_17_114646_create_categories_table', 1),
(6, '2026_02_17_201441_create_add_quiz_table', 1),
(7, '2026_02_19_160224_create_mcqs_table', 1),
(8, '2026_03_08_231641_create_usersdetails_table', 2),
(9, '2026_03_16_152711_create_records_table', 3),
(10, '2026_03_16_163025_create_mcqs_records_table', 4),
(11, '2026_03_28_083455_create_reset_password_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'bismasheikh2006@gmail.com', 'oYJFQppp8alaUWWFMQcO9mFKrYCBtjJoO6tBL824Q6saSYfoUBU5a6Q87vadba8d', '2026-03-28 05:48:11', '2026-03-28 05:48:11'),
(2, 'bismasheikh2006@gmail.com', '3pgIsGkGzy1G084Lb1AmStqpPb3beWawaKVEpfwMfDm479diVHH4vEaHDro7KNbG', '2026-03-28 05:58:40', '2026-03-28 05:58:40'),
(3, 'bismasheikh2006@gmail.com', '2wWiEZx8LJPI3HuciMogYLeEBxd7V1KuHw8A1A2UgoIGWBJGj8f6bZvNkxb40E0J', '2026-03-28 06:17:34', '2026-03-28 06:17:34'),
(4, 'bismasheikh2006@gmail.com', 'Mb1FyUoHHa00XY8784bkc5sTIUq5SJxL6w0MLYomD0IEl0mFfCkZoj16KEsG0YLz', '2026-04-02 11:57:10', '2026-04-02 11:57:10'),
(5, 'bismasheikh2006@gmail.com', 'wtyw9OknnESSuTLEGWTwnX68xCvHBTxbbwFC8KO42HrB6V23ZIngy34xqh3MHOry', '2026-04-02 12:04:58', '2026-04-02 12:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ezYVWeYd1qeZzs95Nb64tzRLfs65vmgyHv4WBUbb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.131.0 Chrome/148.0.7778.280 Electron/42.7.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmRmb1lsRmVGR2ZGbUtNOUpWcDFiYkFLcjQ0ZjRBS1NSQUx1SlZxSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1785668916),
('Fn2q66Xu6IpZcORSd2BKbNLrAGnCC4tVPoWy9guQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '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', 1785670624);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usersdetails`
--

CREATE TABLE `usersdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `active` tinyint(11) NOT NULL DEFAULT 1,
  `token` varchar(100) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usersdetails`
--

INSERT INTO `usersdetails` (`id`, `username`, `useremail`, `userpassword`, `active`, `token`, `is_verified`, `created_at`, `updated_at`) VALUES
(16, 'Ashna', 'ashna123@gmail.com', '$2y$12$TqwAW0NoazyKf5eEyeiIEOjiy.2fYy9fuYwWTJwivWbiTc.JUMqaO', 1, '', 0, '2026-03-09 17:46:34', '2026-03-09 17:46:34'),
(17, 'bareera', 'bareerasheikh123@gmail.com', '$2y$12$zqRP7ldRUeTq..kHR.LZsO9jEzMRcgbkNmAEIW94ao9bEGBWWI3SS', 1, '', 0, '2026-03-09 17:47:14', '2026-03-09 17:47:14'),
(30, 'sawera', 'syedasaweranoorhussainshah27@gmail.com', '$2y$12$tfopAlpTY0SZ0/fsN9xPc.TsQXhLtCFyCrEQhlme7M/Nr5VhCtePS', 1, 'NvTZ8cqn4hKq4iPHdgSyiEUMmUDURsHoL7nQ6ow6WqwPEH2zfcrw408AFZhFh9V6', 0, '2026-03-28 02:44:54', '2026-03-28 02:44:54'),
(31, 'bisma', 'bismasheikh2006@gmail.com', '$2y$12$l4UF77L8dscJMa9cBj86xuBBpgfPT5RuW0citjTlkNsz2zbr61RYi', 1, 'nF5P4aFw1MeOQVyjh2ynwBdYPJfjGwWoPsKQfJruduBiSGLryU7vhi8O1GDEwKzf', 1, '2026-04-02 11:37:45', '2026-04-02 12:05:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_quiz`
--
ALTER TABLE `add_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_quiz_category_id_foreign` (`category_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mcqs_admin_id_foreign` (`admin_id`),
  ADD KEY `mcqs_category_id_foreign` (`category_id`),
  ADD KEY `mcqs_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `mcqs_records`
--
ALTER TABLE `mcqs_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mcqs_records_mcq_id_foreign` (`mcq_id`),
  ADD KEY `mcqs_records_record_id_foreign` (`record_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_quiz_id_foreign` (`quiz_id`),
  ADD KEY `records_user_id_foreign` (`user_id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usersdetails`
--
ALTER TABLE `usersdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useremail` (`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_quiz`
--
ALTER TABLE `add_quiz`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcqs`
--
ALTER TABLE `mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mcqs_records`
--
ALTER TABLE `mcqs_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersdetails`
--
ALTER TABLE `usersdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_quiz`
--
ALTER TABLE `add_quiz`
  ADD CONSTRAINT `add_quiz_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD CONSTRAINT `mcqs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mcqs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mcqs_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `add_quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mcqs_records`
--
ALTER TABLE `mcqs_records`
  ADD CONSTRAINT `mcqs_records_mcq_id_foreign` FOREIGN KEY (`mcq_id`) REFERENCES `mcqs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mcqs_records_record_id_foreign` FOREIGN KEY (`record_id`) REFERENCES `records` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `add_quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usersdetails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
