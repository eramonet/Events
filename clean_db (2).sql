-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 04:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clean_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firebase_token` int(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `gender`, `status`, `image`, `password`, `firebase_token`, `category_id`, `vendor_id`, `remember_token`, `added_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'super_admin@gmail.com', NULL, NULL, '1', NULL, '$2y$10$ffMH7cEumL2i.s0gK9v9s.4gKEC3iJzqHt1uaWtEbx6CRC4L3XMdG', NULL, NULL, NULL, NULL, NULL, '2023-06-04 16:08:57', '2023-06-04 16:08:57', NULL),
(52, 'h_m', 'h_m@email.com', '01123236678', 'male', '1', 'wKeaAXlTV1PElgCHVAuwsU21bXPtTJ72g5pfsKvr.webp', '$2y$10$e51VuN5.ctFzSQV0yPaXA.rprYLDCjdtIQ5Zc9PECEMt.7Z7x9icO', NULL, 1, 7, NULL, 1, '2023-06-04 16:45:47', '2023-06-04 16:45:47', NULL),
(53, 'kitkat', 'kitkat@email.com', '01121234431', 'male', '1', 'eBNtzlJyQTHEguYRIPu2oi9dRRBOJhDK4xRxCFJu.webp', '$2y$10$H7WeATfzvoRXXnvD/5EEWuDKCoo/Xw2PFsCFu2o/06it3BvSsG5tK', NULL, 1, 8, NULL, 1, '2023-06-04 16:47:52', '2023-06-04 16:47:52', NULL),
(54, 'intercontinental', 'inter@email.com', '01198909976', 'male', '1', 'HKsWC0Po3P7ifgSPquXm7CRYqv48rg57pUo4dSsx.webp', '$2y$10$pegDHxQMrH0LQND4MrdIL.z7PpJjQOf5cIKwJacJGcoWtaTRBl6VS', NULL, 1, 9, NULL, 1, '2023-06-04 16:50:11', '2023-06-04 16:50:11', NULL),
(55, 'holidayinn', 'holidayinn@email.com', '01278675543', 'male', '1', 'Roqk8JYFzfxCzw7u4fLaHb6Fkol0oCICoZIRuUy6.webp', '$2y$10$HDdRFx4Pww1tKQTs0JcYA.vArhupetzNxZM210OZMBOK2R3o50iS.', NULL, 1, 10, NULL, 1, '2023-06-04 16:52:27', '2023-06-04 16:52:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_categories`
--

CREATE TABLE `admin_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_categories`
--

INSERT INTO `admin_categories` (`id`, `title_ar`, `title_en`, `details_ar`, `details_en`, `status`, `added_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'مدير', 'Manager', 'مدير', 'Manager', '1', NULL, NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(2, 'الموارد البشرية', 'HR', 'الموارد البشرية', 'HR', '1', NULL, NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(3, 'الحسابات', 'the accounts', 'الحسابات', 'the accounts', '1', NULL, NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(4, 'التسويق', 'Marketing', 'التسويق', 'Marketing', '1', NULL, NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(5, '', '', '', '', '1', NULL, NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(6, 'علاقات عامه', 'Public relations', 'علاقات عامه', 'Public relations', '1', NULL, NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `clicks` bigint(20) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_categories`
--

CREATE TABLE `ad_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emails` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faxes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_numbers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_latitude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_longitude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_light` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_explore_categories`
--

CREATE TABLE `assign_explore_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` int(11) NOT NULL,
  `type` enum('main','right','below') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `available_dates`
--

CREATE TABLE `available_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hall_id` bigint(20) UNSIGNED NOT NULL,
  `available_date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_dates`
--

INSERT INTO `available_dates` (`id`, `status`, `hall_id`, `available_date`, `time_from`, `time_to`, `created_at`, `updated_at`) VALUES
(1, 'active', 1, '2023-07-08', '22:28:00', '12:28:00', '2023-06-04 18:29:01', '2023-06-04 18:29:01'),
(2, 'active', 1, '2023-07-08', '12:29:00', '14:29:00', '2023-06-04 18:29:35', '2023-06-04 18:29:35'),
(3, 'active', 1, '2023-07-09', '22:29:00', '12:30:00', '2023-06-04 18:30:04', '2023-06-04 18:30:04'),
(4, 'active', 1, '2023-07-11', '22:30:00', '12:30:00', '2023-06-04 18:30:23', '2023-06-04 18:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `become_vendors`
--

CREATE TABLE `become_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_from` enum('web','ios','android') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','accepted','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `become_vendors`
--

INSERT INTO `become_vendors` (`id`, `name`, `email`, `phone_number`, `coment`, `sign_from`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Moses Kulas I', 'mnicolas@anderson.com', '(337) 500-5805', 'Sit quas voluptatibus maiores repellendus quos.', 'ios', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(2, 'Concepcion Berge', 'antwan55@heaney.biz', '820-736-7417', 'Debitis libero voluptatum vero.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(3, 'Albina Konopelski', 'fyost@yahoo.com', '+19203902507', 'Repellat est sunt quaerat temporibus debitis aut.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(4, 'Abraham Heathcote', 'mavis40@gmail.com', '+1-430-581-1327', 'Repudiandae ab provident enim enim et.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(5, 'Erwin Greenholt III', 'little.frederik@schowalter.com', '863-895-4222', 'Sed vel fugit mollitia similique saepe.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(6, 'Abigayle Denesik', 'irwin.gottlieb@lubowitz.com', '+1-857-621-2608', 'Nemo ea et corrupti nesciunt.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(7, 'Kevin Johnston', 'marielle54@hotmail.com', '1-703-585-2532', 'Sunt magni velit consequatur nam et.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(8, 'Alejandra Dach', 'gkertzmann@yahoo.com', '+1-843-785-5205', 'Provident alias eligendi voluptatem praesentium temporibus beatae voluptas.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(9, 'Loy Durgan PhD', 'jupton@hettinger.info', '1-234-796-6617', 'Ea repudiandae alias eos ab aut.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(10, 'Brisa O\'Hara', 'xlowe@gmail.com', '347.775.4006', 'Nobis eos qui ab repellendus.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(11, 'Paige Turcotte III', 'anderson.joel@hotmail.com', '(267) 921-1534', 'Occaecati sint sit deserunt et.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(12, 'Vergie Bashirian', 'verda.tremblay@cormier.biz', '925-685-8868', 'Et saepe voluptatem nostrum et.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(13, 'Dr. Jordy Daniel DDS', 'steuber.payton@schultz.com', '(678) 959-4084', 'Aut dolor sit nihil sit aut.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(14, 'Bertrand Davis', 'von.raul@hammes.com', '+1.629.832.3740', 'Pariatur quibusdam velit cum nam at.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(15, 'Dr. Krista Tromp', 'qrobel@kovacek.com', '(629) 649-4071', 'Soluta totam aut doloribus magni molestiae sit non.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(16, 'Miss Annette Ferry', 'goodwin.mayra@yahoo.com', '1-978-833-0302', 'Rerum omnis a qui quis numquam facilis.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(17, 'Brayan Fisher', 'hmckenzie@mayer.com', '281.500.8362', 'Est quaerat est est consequatur expedita assumenda.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(18, 'Ava Murray', 'preston.harber@reynolds.com', '651.423.1307', 'Quisquam autem quia et quaerat.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(19, 'Mr. Stan Ondricka Sr.', 'dubuque.cassie@yahoo.com', '+1 (531) 824-1673', 'Quos et eligendi nobis et illum.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(20, 'Jeremie Wuckert IV', 'mryan@kovacek.com', '930.561.1843', 'Et sunt qui eum saepe dolor esse voluptatem magnam.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(21, 'Edwina Fay', 'alexie.medhurst@gibson.com', '870-894-2097', 'Non fugit atque occaecati repudiandae mollitia deleniti laudantium.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(22, 'Maria Anderson', 'mayer.susie@rippin.com', '(919) 442-7083', 'Deleniti ipsam officiis qui deleniti est nam.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(23, 'Mr. Rosario Brown', 'johnston.earnest@bergnaum.com', '480-957-9175', 'Omnis et fugit mollitia.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(24, 'Mr. Florencio Abshire III', 'rusty88@yahoo.com', '+1 (478) 984-2512', 'Quae possimus maiores suscipit libero eum.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(25, 'Gwendolyn Sporer PhD', 'feil.zetta@christiansen.com', '(361) 394-7850', 'Architecto minima iure ut enim at ad enim.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(26, 'Betty Beier V', 'elwin26@gmail.com', '1-801-953-9524', 'Dolores qui laudantium velit voluptas delectus ipsam.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(27, 'Amari Konopelski', 'porn@aufderhar.com', '229.415.7769', 'Quasi nisi iusto aut eaque consequuntur exercitationem quia.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(28, 'Forest Hamill', 'isadore.zboncak@jacobi.com', '+1-949-362-2226', 'Sunt id veniam sapiente in.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(29, 'Isabelle Marvin', 'reichert.kaya@rath.com', '(810) 716-8181', 'Commodi in vel aperiam.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(30, 'Mr. Mathew Emmerich', 'hansen.marshall@abbott.org', '831-297-7649', 'Et id aspernatur sit accusantium autem.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(31, 'Ms. Donna Prohaska Sr.', 'ellsworth.schowalter@littel.biz', '1-312-217-8653', 'Aspernatur distinctio tempora fugit id asperiores soluta sed.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(32, 'Annamae Bauch', 'sparisian@ohara.net', '(786) 920-2930', 'Dolorem tempora commodi neque et earum.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(33, 'Claire Johns', 'jaqueline46@stroman.biz', '1-314-568-0865', 'Voluptatum est eum animi.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(34, 'Madelynn Doyle', 'leuschke.hassan@gmail.com', '+14352316437', 'Ut fugiat vel amet voluptatem.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(35, 'Branson Schmidt', 'gislason.braden@welch.com', '864.490.0251', 'Ducimus quia placeat facilis totam velit.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(36, 'Rusty Bauch', 'rosalia.runte@hotmail.com', '+1-928-731-6487', 'Natus ut sit id.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(37, 'Mr. Charles Stark', 'shanel.cummerata@hotmail.com', '+1-754-801-3513', 'Veritatis et ut cumque explicabo enim quisquam nihil eum.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(38, 'Macie Emard DDS', 'gerhold.velva@hotmail.com', '615-883-7084', 'Fuga consequatur impedit voluptatem.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(39, 'Miss Alexandrine Langosh', 'uoconnell@lindgren.com', '1-541-845-0156', 'Eum dolores velit saepe autem ullam corrupti neque qui.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(40, 'Hank Price I', 'heidenreich.kayden@becker.info', '567.219.6155', 'Omnis fuga id delectus dolorem error.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(41, 'Enrico White', 'gladys.franecki@lockman.com', '279.927.7234', 'Magnam sed officia laborum quis voluptas.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(42, 'Heather Windler', 'hjacobs@brown.com', '+18202037530', 'Sit placeat dolores ullam sunt non a tenetur.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(43, 'Prof. Lennie Schiller V', 'colleen36@mueller.biz', '678.757.3742', 'Aliquid voluptatem et ullam rem ut.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(44, 'Gino Nikolaus', 'kling.elyssa@yahoo.com', '1-820-709-5428', 'Voluptate a neque quibusdam minus velit ipsa ut.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(45, 'Alysson Vandervort', 'jonathon17@yahoo.com', '+1 (209) 744-9133', 'Nostrum corrupti fugit hic.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(46, 'Orin Waelchi', 'america86@boyle.com', '754.261.8189', 'Consequatur eos voluptatem aliquid vero.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(47, 'Prof. Donato Senger II', 'hilbert35@hotmail.com', '(539) 549-3973', 'Sunt qui eum eveniet sed vel.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(48, 'Prof. Dereck Wilkinson DVM', 'bartell.daniela@jaskolski.net', '+18437430993', 'Enim aperiam est id dolor.', 'ios', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(49, 'Dr. Wanda Sporer Sr.', 'dibbert.una@yahoo.com', '774-764-8116', 'Fugit corrupti eos dolores autem minima architecto labore expedita.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(50, 'Xzavier Dibbert', 'brisa.ortiz@yahoo.com', '1-386-250-9781', 'Ducimus repellendus est ut nihil nam.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(51, 'Emmitt Donnelly', 'kreiger.emmitt@hotmail.com', '1-630-607-0178', 'Voluptatibus pariatur et quos vitae ratione quis harum.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(52, 'Prof. Johnson Boyer III', 'rdonnelly@funk.net', '+1 (539) 613-0523', 'Et atque est culpa debitis vitae.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(53, 'Imogene Bednar', 'zgraham@feest.com', '+1.820.585.7187', 'Et ex dolorem modi incidunt ut modi.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(54, 'Lavinia Krajcik', 'gparker@gmail.com', '1-224-566-0165', 'Ut distinctio et exercitationem ipsam.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(55, 'Newton Balistreri', 'maddison.kirlin@hotmail.com', '+12528224312', 'Aut asperiores commodi tempora est tempora.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(56, 'Beaulah West', 'king.mack@schoen.net', '(281) 882-9417', 'Et voluptate optio non reprehenderit impedit officia.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(57, 'Rhoda Krajcik', 'sauer.oral@yahoo.com', '262-241-3603', 'Veritatis alias non dicta laudantium voluptatum minima laudantium iure.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(58, 'Dr. Remington Zieme', 'melissa20@kuhic.org', '1-484-250-8953', 'Aspernatur velit quia a qui corporis consequatur nihil.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(59, 'Francis Skiles', 'gutkowski.evalyn@jerde.net', '+1-251-697-1754', 'Consequuntur voluptate nihil nostrum praesentium quidem atque veritatis qui.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(60, 'Deon Dooley', 'breana.dare@hahn.com', '959.514.5576', 'Non nemo recusandae et velit accusantium aut nisi quia.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(61, 'Irma Weimann', 'odooley@macejkovic.net', '+1-539-672-4400', 'Possimus aut tempora praesentium harum provident.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(62, 'Mireya Hamill II', 'vhilpert@feeney.info', '+1-425-837-4656', 'Quis officiis esse eius voluptatum dolorem magnam.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(63, 'Mozelle Brekke', 'bahringer.clifton@murazik.com', '+1 (934) 862-9843', 'Dignissimos et fugit numquam maiores.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(64, 'Gianni Wilkinson', 'camden.cruickshank@rodriguez.com', '469.255.5228', 'Deserunt quaerat suscipit et consectetur non voluptas non.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(65, 'Deven Feeney', 'dejah.macejkovic@hotmail.com', '+1-224-214-9328', 'Voluptatem quaerat laboriosam ipsam quis dolores corrupti qui.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(66, 'Cameron Abbott', 'brekke.malcolm@gmail.com', '+1-678-664-2544', 'Omnis voluptate quisquam aut nemo.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(67, 'Miller Rippin I', 'nfahey@herzog.com', '737-287-4902', 'Ut corporis explicabo consequatur odio voluptate quidem quam illum.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(68, 'Rafaela Bruen V', 'hilpert.brendan@yahoo.com', '1-323-426-8706', 'Ipsum aliquam enim voluptas perferendis.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(69, 'Ozella Cassin IV', 'jenkins.darwin@powlowski.info', '562.681.3456', 'Nulla non et quam laborum enim nemo.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(70, 'Ulices Ondricka', 'kertzmann.ana@gmail.com', '(540) 519-6473', 'Quia et ut repellat mollitia et.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(71, 'Stanton Dare', 'kub.destiney@yahoo.com', '1-425-505-0874', 'Quod sit aliquid nihil veniam.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(72, 'Mrs. Colleen Friesen', 'kmcdermott@yahoo.com', '+19296419780', 'Optio ipsa animi eum qui facere dolore quod.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(73, 'Mr. Lawson Okuneva', 'emelia.carter@gmail.com', '(808) 740-5359', 'Quas veniam veritatis maxime quos.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(74, 'Ardith Durgan', 'kiehn.kennedy@mayer.com', '1-801-748-7339', 'Optio aut voluptates et facilis sit dolore.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(75, 'Rodrick Sauer III', 'bryce33@von.info', '781.734.6259', 'Culpa sunt ut eligendi voluptatibus suscipit non quos.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(76, 'Brionna Aufderhar', 'darrell.paucek@yahoo.com', '1-469-788-8698', 'Odio in numquam aliquid ipsa omnis deserunt.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(77, 'Etha Johnson', 'bogan.jerel@bahringer.org', '+18437840235', 'Iure saepe quod rerum.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(78, 'Prof. Brandy Hudson DDS', 'veda30@robel.net', '+1-319-425-1843', 'Et qui quia cum et iusto earum ipsum.', 'ios', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(79, 'Dr. Ila Klein', 'sipes.maximus@vandervort.com', '747-419-9278', 'Voluptatem qui delectus fugit iure provident.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(80, 'Javier Spinka', 'bauch.geovanni@hotmail.com', '+1-779-392-5556', 'Fugit modi eaque nihil id.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(81, 'Boyd Littel', 'ullrich.sierra@zieme.biz', '+1-901-574-8474', 'Ipsum et neque tenetur blanditiis harum corporis expedita.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(82, 'Santina Murray IV', 'sophia09@gmail.com', '(305) 820-0660', 'Dignissimos nam et omnis ut dignissimos est.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(83, 'Beulah Hintz', 'andrew69@konopelski.net', '+1 (815) 877-4897', 'Corporis omnis rem sit enim aliquid fugiat.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(84, 'Isidro Lesch', 'hagenes.dino@hodkiewicz.net', '915-702-5020', 'Hic perferendis aut eos voluptatem impedit.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(85, 'Callie Bernier I', 'colt17@gmail.com', '(817) 480-6622', 'Exercitationem nostrum consequatur sed id corporis.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(86, 'Jermaine Mosciski', 'retta.hudson@hotmail.com', '410-923-1433', 'Hic exercitationem quae dolore.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(87, 'Jackson Thompson II', 'juanita25@pfeffer.com', '214-532-7088', 'Non odio ut quia eveniet.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(88, 'Kenna Schoen PhD', 'green.isobel@yahoo.com', '+1-279-368-5299', 'Dolorum et explicabo ratione ut vero est nesciunt et.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(89, 'Dr. Fay Rippin MD', 'champlin.marcos@hotmail.com', '+1-229-817-9819', 'Deserunt non quia est at fuga quod.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(90, 'Jaquan Sawayn', 'llowe@yahoo.com', '+1.952.789.8743', 'Doloremque nam voluptate illo eligendi.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(91, 'Delbert Goldner', 'lkris@gmail.com', '1-775-778-2006', 'Possimus excepturi non omnis aut quis et est.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(92, 'Dillan McDermott', 'carmelo07@rohan.com', '(430) 793-0228', 'Consectetur in aut molestias sunt ea porro rerum consequatur.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(93, 'Juwan Farrell', 'ubeier@corkery.com', '747-229-7885', 'Sit officiis adipisci distinctio velit.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(94, 'Rosario Hyatt', 'jessy.marks@christiansen.com', '1-863-333-2474', 'Voluptate enim molestiae praesentium deserunt quo.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(95, 'Emily Schaden', 'ynolan@kreiger.org', '+1.534.534.3907', 'Quos commodi unde repellendus et.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(96, 'Keon Goodwin', 'shields.corbin@wunsch.org', '1-620-922-8985', 'Et laudantium et optio repellat laudantium hic.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(97, 'Dora Kiehn II', 'mlockman@yahoo.com', '1-417-681-8389', 'Dolor iure minus molestiae magni voluptatem repudiandae culpa quo.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(98, 'Stella Lueilwitz', 'cordelia55@fay.biz', '+1.458.644.8322', 'Sequi porro est autem incidunt illum.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(99, 'Katlynn O\'Keefe', 'hellen.marquardt@hotmail.com', '1-878-773-6931', 'Autem inventore occaecati ut perspiciatis.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(100, 'Mrs. Elsa Weber', 'jena.kris@hotmail.com', '+1-765-626-0546', 'Aperiam voluptate quo est excepturi praesentium.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(101, 'Lauryn Kuhlman', 'cruickshank.leonor@gmail.com', '1-520-652-7710', 'Et ratione ut alias impedit.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(102, 'Willard Lubowitz', 'conroy.dalton@hotmail.com', '(737) 550-7350', 'Nostrum maxime amet quisquam impedit voluptatem necessitatibus ab.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(103, 'Gordon Maggio', 'predovic.hyman@gmail.com', '(818) 216-1056', 'Harum minus ad quaerat voluptas in ut.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(104, 'Amanda Jast', 'renner.gardner@stehr.com', '847.473.9189', 'Vel sunt sed quo distinctio architecto assumenda animi.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(105, 'Annamae Shanahan', 'evalyn.vonrueden@shields.com', '484.690.5470', 'Inventore ullam qui repellendus quibusdam ut eos.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(106, 'Abel Langworth', 'imuller@bednar.com', '+15866849697', 'Distinctio quos perspiciatis id sit.', 'ios', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(107, 'Marilou Dibbert', 'yasmine.christiansen@anderson.com', '+13194028062', 'Architecto error et amet.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(108, 'Rhett Weissnat', 'tavares49@hotmail.com', '1-918-417-1693', 'Deleniti vero voluptatem quasi exercitationem saepe.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(109, 'Mr. Cyril Stiedemann Jr.', 'krystina32@morar.com', '707-541-7119', 'Rerum modi nesciunt quia suscipit.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(110, 'Ashly Haley', 'kilback.margarete@yahoo.com', '(463) 499-7299', 'Occaecati aliquid consequatur voluptas iste quibusdam eius.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(111, 'Santina Hickle', 'xgusikowski@gmail.com', '678-894-0167', 'Quam id quia totam labore ut harum nostrum laboriosam.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(112, 'Domenica Mosciski Sr.', 'norval15@beer.com', '+1.765.971.9848', 'Ea dolor et quisquam esse qui.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(113, 'Dr. Abraham Hirthe IV', 'marquardt.rickie@yahoo.com', '+1-310-492-9332', 'Ad enim ut consectetur.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(114, 'Drew Wyman', 'muhammad82@yahoo.com', '+17864363719', 'Qui ut provident incidunt explicabo nemo voluptatibus.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(115, 'Candida Mante', 'bogan.dillan@heaney.info', '+1-443-222-6191', 'Temporibus et at alias est similique laborum nisi repudiandae.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(116, 'Prof. Josue Dooley', 'johnpaul.zieme@williamson.biz', '+1 (719) 218-2284', 'Ad corporis non qui rerum et eligendi illum quibusdam.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(117, 'Dr. Frieda Jaskolski V', 'lola.jacobi@baumbach.com', '1-631-256-6907', 'Repudiandae veniam ducimus enim ut natus qui et.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(118, 'Adah Cassin', 'crooks.nicola@hotmail.com', '316-744-1780', 'Perspiciatis dolor ea deleniti assumenda accusamus natus.', 'ios', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(119, 'Santina Hartmann', 'kulas.cloyd@gmail.com', '908.968.6629', 'A vitae non aut laboriosam accusamus in maiores.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(120, 'Elyssa Jast', 'nikolaus.lyric@yahoo.com', '818-364-6332', 'Perferendis aut eligendi quidem aut doloremque mollitia atque.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(121, 'Elinore Upton', 'wkassulke@orn.com', '586-227-4679', 'Fugit culpa omnis fugiat officia officiis.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(122, 'Watson Hoeger', 'balistreri.maxwell@hotmail.com', '551.553.4260', 'Voluptatem pariatur odio voluptate assumenda animi quisquam.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(123, 'Miss Idell Effertz', 'abshire.tamia@pouros.com', '+1.786.783.9671', 'Sit iusto minima ut fugit doloribus minus.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(124, 'Mavis Carter V', 'laurie.monahan@gmail.com', '1-820-635-3083', 'Aut doloremque quibusdam voluptatem dolores et.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(125, 'Zane Beatty DDS', 'hartmann.zander@steuber.net', '(915) 309-9900', 'Eligendi ducimus voluptatem non voluptas.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(126, 'Prof. Brenna Crooks', 'julianne00@gmail.com', '404-634-0284', 'Sapiente quos rerum et aperiam rerum ut sint.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(127, 'Payton Terry', 'shahn@yahoo.com', '+1.570.839.0115', 'Qui ab aut voluptas molestiae molestias est at sequi.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(128, 'Kaitlyn Bergstrom', 'brooks84@hotmail.com', '620.596.6632', 'Dolore qui debitis et ut aut laudantium.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(129, 'Dr. Alphonso Marks', 'roman98@yahoo.com', '+1 (657) 955-6040', 'Est ducimus dolor aut.', 'ios', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(130, 'Dr. Reilly Satterfield II', 'guido.zboncak@price.com', '(248) 543-5442', 'Voluptatem cupiditate in rerum consequatur sint et.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(131, 'Cory Larson', 'makayla46@hackett.net', '+1.406.922.2277', 'Recusandae omnis consectetur enim sit velit provident dolor.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(132, 'Christopher Shanahan', 'tillman.moriah@mcclure.com', '551.228.7945', 'Et assumenda amet ipsam enim.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(133, 'Mallory Jaskolski', 'nlangworth@von.com', '(701) 701-9276', 'Necessitatibus nihil perspiciatis velit qui harum quo repellendus voluptatum.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(134, 'Arnaldo Larson', 'okozey@yahoo.com', '(678) 265-7884', 'Aut ratione quae minima molestiae sint.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(135, 'Chaim Pfeffer', 'yprosacco@hotmail.com', '+18578784073', 'Quo occaecati veniam impedit unde.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(136, 'Prof. Abdullah Cummings', 'zgrady@gutmann.biz', '+19065983654', 'Sunt qui qui delectus laborum.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(137, 'Louie Crist II', 'genesis23@nolan.org', '(714) 858-1427', 'Repellendus vel dolor voluptatem aut sapiente.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(138, 'Mrs. Brisa Luettgen', 'rashawn.predovic@yahoo.com', '480.401.4045', 'Quia quas placeat porro commodi et.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(139, 'Ladarius Marvin', 'marley.rodriguez@yahoo.com', '732.200.4004', 'Recusandae aspernatur ducimus quis.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(140, 'Dr. Rosemarie Mitchell DVM', 'dino71@gmail.com', '+1-872-727-4308', 'Voluptas molestiae et aut ducimus quia iure.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(141, 'Brannon Olson', 'leone.blanda@lakin.com', '202.276.6624', 'Tenetur alias ratione optio libero.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(142, 'Evans Goodwin', 'pouros.augusta@hotmail.com', '352-566-2045', 'Quidem ut optio necessitatibus velit ut.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(143, 'Marta Gusikowski DVM', 'joanny.blanda@predovic.com', '(820) 987-4692', 'Molestiae voluptatem tempore alias nisi rerum tenetur.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(144, 'Forest Hamill', 'zbruen@yahoo.com', '540.795.4593', 'Reiciendis libero exercitationem debitis nostrum deserunt ad.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(145, 'Delbert Kassulke', 'streich.ward@yahoo.com', '1-925-997-4619', 'Omnis et minus ut officia consequatur.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(146, 'Lula Kunze MD', 'kkovacek@gmail.com', '+1 (636) 465-9089', 'Quos et aut consequuntur temporibus veritatis alias.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(147, 'Janiya Grady', 'roberto35@gerlach.net', '786-246-3436', 'Vel dolor velit consequatur aut impedit molestiae.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(148, 'Prof. Aurelie Herman IV', 'donna.ryan@russel.org', '+1-936-381-3334', 'Quibusdam ut nulla perspiciatis dicta.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(149, 'Dorothy Fadel', 'vicky92@cruickshank.info', '215.458.9162', 'Enim eum ut illo iste.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(150, 'Daphney Kshlerin', 'ludie.legros@marvin.net', '+1-571-952-9573', 'Libero veritatis quis nobis sed sunt nostrum.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(151, 'Mr. Adolphus Haley', 'predovic.estella@hotmail.com', '(870) 313-8064', 'Tempora laborum sit dolorem fugit consequatur velit.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(152, 'Marlin Rempel', 'enid.effertz@yahoo.com', '480.295.3867', 'Ad tenetur ullam officia maxime.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(153, 'Fausto Harris', 'clifton74@hotmail.com', '906.741.3403', 'Est deserunt quia nulla sed beatae est.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(154, 'Carolyn Aufderhar', 'brett.torphy@luettgen.com', '(281) 791-9882', 'Vero accusantium minima doloribus accusamus in quia.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(155, 'Miss Eudora Streich Sr.', 'weissnat.nyasia@mcclure.org', '610-228-1787', 'Vel expedita sit omnis et sit quae atque.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(156, 'Alanis Zemlak', 'lhaley@yahoo.com', '+1-631-370-9043', 'Eum omnis non vero illo odit unde.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(157, 'Magdalena Considine', 'delaney.gorczany@becker.info', '(813) 207-9379', 'Hic vitae ducimus et cumque.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(158, 'Delilah Gerhold', 'esmeralda.krajcik@yahoo.com', '+1 (469) 724-5518', 'Esse hic dicta maxime dolorem eum sint.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(159, 'Wilfredo Kuvalis', 'alene.pagac@fisher.com', '336-319-8222', 'Fuga voluptate libero quibusdam ad sapiente voluptas.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(160, 'Prof. Alanna Berge DVM', 'dtromp@hudson.com', '+1-551-786-6678', 'Corporis molestiae fugit et nostrum asperiores quam.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(161, 'Gregorio Halvorson', 'nadia.ratke@hotmail.com', '458.599.4199', 'Velit ipsum expedita sunt voluptate sed minus vitae.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(162, 'Jaylen Williamson', 'clovis.schmidt@kling.net', '1-520-810-3272', 'Eveniet laboriosam voluptas inventore officia.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(163, 'Selena Sporer', 'zaria59@gmail.com', '+1 (463) 344-2031', 'Praesentium voluptatum laborum hic et necessitatibus est et.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(164, 'Maudie Waters', 'stark.king@yahoo.com', '716.808.3014', 'Mollitia aliquam non corrupti nam repellendus atque nobis.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(165, 'Emil Cremin IV', 'tconroy@batz.com', '+19188947575', 'Suscipit non unde saepe eum doloribus.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(166, 'Howard Douglas', 'dejon38@gmail.com', '760.815.2343', 'Itaque sunt exercitationem voluptatibus laboriosam.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(167, 'Hollis Beatty', 'becker.jordi@muller.com', '+1-209-845-0451', 'Fugiat ducimus nisi maxime saepe qui dicta.', 'ios', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(168, 'Prof. Glenda Stroman I', 'egoodwin@gmail.com', '(283) 637-0326', 'Assumenda aliquam repellendus culpa ut nobis.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(169, 'Miss Elnora Kilback MD', 'erunolfsdottir@crist.biz', '+1-570-413-5706', 'Atque necessitatibus sint eos.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(170, 'Kylie Harvey III', 'fnikolaus@langworth.com', '+1-928-919-8259', 'Dolorum architecto iusto nobis dicta qui.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(171, 'Kaela Bernier', 'amuller@hotmail.com', '283.232.4429', 'Et autem a reiciendis recusandae dolor voluptate.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(172, 'Prof. Daphney Stehr', 'nstehr@hotmail.com', '+1 (571) 293-3579', 'Qui quos culpa quo animi.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(173, 'Kasey Bosco', 'paris67@daniel.biz', '689.861.8884', 'Minima tenetur officia aut deserunt.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(174, 'Mr. Keanu Kuphal', 'breana16@brakus.net', '+1-920-694-1380', 'Necessitatibus delectus officiis et voluptatem sed.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(175, 'Dr. Dawson Marks', 'reichel.gus@yahoo.com', '+1.779.348.3892', 'Quidem ullam est est harum adipisci ipsam.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(176, 'Vicky Schuster', 'pat.bednar@yahoo.com', '(319) 641-0864', 'Nisi deleniti eos nemo commodi non dolores aut.', 'ios', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(177, 'Vincent Emmerich V', 'zkihn@stark.com', '+1.480.234.8867', 'Natus perspiciatis nisi nihil reiciendis quis.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(178, 'Ray Olson', 'mikel27@runolfsson.com', '+1 (380) 933-3016', 'Et impedit ut quas et accusantium enim ut.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(179, 'Jerald Little DDS', 'chelsea.johnston@gmail.com', '(240) 201-0799', 'Dolores rerum tenetur minus praesentium.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(180, 'Miss Daisha Hansen I', 'harvey84@gmail.com', '520-507-6758', 'Culpa saepe est qui rem tempora.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(181, 'Mortimer Jerde', 'margie10@yahoo.com', '+1-281-570-8858', 'Quia optio sed expedita et velit quo ab.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(182, 'Bette Gerlach Jr.', 'rory37@yahoo.com', '1-415-424-6737', 'Est ut nam soluta.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(183, 'Martine Klein', 'koch.lamar@yahoo.com', '+14432403340', 'Corporis libero sit vitae delectus deserunt delectus.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(184, 'Mr. Santino Rohan', 'trutherford@yahoo.com', '+1.689.950.0752', 'Earum enim qui laudantium et adipisci sed.', 'web', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(185, 'Prof. Marcelle Bartoletti MD', 'zokuneva@yahoo.com', '+1-386-631-3993', 'Tempore nam et similique eligendi eum magni provident mollitia.', 'android', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(186, 'Erika Roberts', 'isadore.hahn@hotmail.com', '+1-423-270-7623', 'Nihil necessitatibus at voluptas iure accusamus aliquam.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(187, 'Mr. Julius Beatty', 'fcruickshank@yahoo.com', '1-667-212-9381', 'Dolorem ex dignissimos minus expedita architecto.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(188, 'Johnnie Mitchell PhD', 'csmith@gmail.com', '1-310-229-1469', 'Illo voluptatum qui fugit quia est.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(189, 'Dana Wilkinson', 'kariane24@hirthe.info', '1-341-313-2295', 'Nam officia et laboriosam molestiae porro modi quia.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(190, 'Karlie Walker', 'raheem11@yahoo.com', '936-669-9262', 'Autem soluta similique eum sit.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(191, 'Darren Konopelski IV', 'kirsten.gorczany@yahoo.com', '260.528.6010', 'Id id a atque ex laboriosam et nesciunt dolorum.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(192, 'Joany Bartell', 'sauer.mariana@gmail.com', '(914) 289-0201', 'Maiores incidunt minima doloribus.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(193, 'Elisabeth Hand I', 'fjacobs@gmail.com', '830-473-1561', 'Asperiores rerum dolore numquam voluptatum.', 'web', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(194, 'Santos Farrell', 'edison67@yahoo.com', '(341) 816-2450', 'Non vel reprehenderit velit temporibus dolores incidunt.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(195, 'Dr. Solon Pacocha', 'xprohaska@stracke.biz', '+1-626-424-7811', 'Adipisci dicta repellendus et quibusdam consequatur consequuntur aut.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(196, 'Skylar Goyette', 'nolan.pinkie@adams.biz', '680-809-0716', 'Distinctio porro consequatur et officia ea error.', 'android', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(197, 'Sonya Grant', 'jaskolski.kraig@torp.com', '+16808925541', 'Et laboriosam est et repellendus veniam aut.', 'android', 'accepted', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(198, 'Ms. Michaela Vandervort III', 'shanna.jacobson@hotmail.com', '+1-938-458-6138', 'Temporibus et odit nulla eum esse distinctio quia.', 'ios', 'pending', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(199, 'Demond Rice', 'emmet.towne@luettgen.info', '937-632-0417', 'Et numquam officiis fuga a itaque explicabo dolores sint.', 'web', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40'),
(200, 'Angeline Krajcik DVM', 'muller.philip@hotmail.com', '1-310-882-0072', 'Itaque tenetur ex in.', 'ios', 'canceled', '2023-06-04 16:09:40', '2023-06-04 16:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `best_selleres`
--

CREATE TABLE `best_selleres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) DEFAULT 0,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `text_encomment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not accepted , 1=> accepted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `option_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 4, 1, 1, '2023-06-05 09:57:02', '2023-06-05 09:57:02'),
(8, 4, 2, 2, '2023-06-05 09:57:02', '2023-06-05 09:57:02'),
(9, 4, 6, 1, '2023-06-05 09:57:02', '2023-06-05 09:57:02'),
(10, 5, 1, 1, '2023-06-05 10:01:09', '2023-06-05 10:01:09'),
(11, 5, 2, 2, '2023-06-05 10:01:09', '2023-06-05 10:01:09'),
(12, 5, 6, 1, '2023-06-05 10:01:09', '2023-06-05 10:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `quantity`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, '501', 1, '2023-06-05 10:02:33', '2023-06-05 10:02:33'),
(2, 1, '501', 2, '2023-06-05 10:02:39', '2023-06-05 10:02:39'),
(3, 1, '501', 3, '2023-06-05 10:02:51', '2023-06-05 10:02:51'),
(4, 1, '501', 4, '2023-06-05 10:02:54', '2023-06-05 10:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `cart_halls`
--

CREATE TABLE `cart_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_halls`
--

INSERT INTO `cart_halls` (`id`, `user_id`, `hall_id`, `package_id`, `date`, `time_from`, `time_to`, `created_at`, `updated_at`) VALUES
(5, 501, 1, 3, '2013-07-01', '10:00:00', '12:00:00', '2023-06-05 10:58:34', '2023-06-05 10:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `cart_hall_options`
--

CREATE TABLE `cart_hall_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories_halls`
--

CREATE TABLE `categories_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_halls`
--

INSERT INTO `categories_halls` (`id`, `category_id`, `hall_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2023-06-04 17:36:52', '2023-06-04 17:36:52'),
(2, 3, 1, '2023-06-04 17:36:52', '2023-06-04 17:36:52'),
(3, 2, 1, '2023-06-04 17:36:52', '2023-06-04 17:36:52'),
(4, 1, 1, '2023-06-04 17:36:52', '2023-06-04 17:36:52'),
(5, 4, 2, '2023-06-04 17:38:35', '2023-06-04 17:38:35'),
(6, 3, 2, '2023-06-04 17:38:35', '2023-06-04 17:38:35'),
(7, 2, 2, '2023-06-04 17:38:35', '2023-06-04 17:38:35'),
(8, 1, 2, '2023-06-04 17:38:35', '2023-06-04 17:38:35'),
(9, 4, 3, '2023-06-04 18:33:59', '2023-06-04 18:33:59'),
(10, 3, 3, '2023-06-04 18:33:59', '2023-06-04 18:33:59'),
(11, 2, 3, '2023-06-04 18:33:59', '2023-06-04 18:33:59'),
(12, 1, 3, '2023-06-04 18:33:59', '2023-06-04 18:33:59'),
(13, 4, 4, '2023-06-04 18:36:11', '2023-06-04 18:36:11'),
(14, 3, 4, '2023-06-04 18:36:11', '2023-06-04 18:36:11'),
(15, 2, 4, '2023-06-04 18:36:11', '2023-06-04 18:36:11'),
(16, 1, 4, '2023-06-04 18:36:11', '2023-06-04 18:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `code` int(11) DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `image`, `title_ar`, `title_en`, `status`, `code`, `admin_id`, `country_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '', 'دبي', 'Dubai', '1', NULL, NULL, 3, '2023-06-04 16:08:56', '2023-06-04 16:08:56', NULL),
(6, '', 'ابوظبي', 'Abu Dhabi', '1', NULL, NULL, 3, '2023-06-04 16:08:56', '2023-06-04 16:08:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients_ads`
--

CREATE TABLE `clients_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_id` int(11) NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `clicks` int(11) NOT NULL DEFAULT 0,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `activation` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','in_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compare_lists`
--

CREATE TABLE `compare_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_message_replies`
--

CREATE TABLE `contact_message_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedIn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instegram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortcut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title_ar`, `title_en`, `shortcut`, `code`, `status`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'مصر', 'Egypt', 'EG', 20, '1', NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56', NULL),
(2, 'المملكه العربيه السعوديه', 'Kingdom of Saudi Arabia', 'KSA', 966, '1', NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56', NULL),
(3, 'الإمارات العربية المتحدة', 'United Arab Emirates', 'UAE', 971, '1', NULL, '2023-06-04 16:08:56', '2023-06-04 16:08:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `digital_cards`
--

CREATE TABLE `digital_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` double NOT NULL,
  `to` double NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_pages`
--

CREATE TABLE `dynamic_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) DEFAULT 0,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `explore_categories`
--

CREATE TABLE `explore_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fast_links`
--

CREATE TABLE `fast_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features_sections`
--

CREATE TABLE `features_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `find_us`
--

CREATE TABLE `find_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `first_advs`
--

CREATE TABLE `first_advs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_contact_us`
--

CREATE TABLE `footer_contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_main_sections`
--

CREATE TABLE `footer_main_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `big_title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_categories`
--

CREATE TABLE `f_a_q_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guests_capacity` bigint(20) DEFAULT NULL,
  `views` bigint(20) DEFAULT 0,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accept` enum('accepted','rejected','new') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `title_ar`, `title_en`, `guests_capacity`, `views`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `primary_image`, `status`, `admin_id`, `vendor_id`, `country_id`, `city_id`, `latitude`, `longitude`, `address_ar`, `address_en`, `rate`, `accept`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'قاعه الملكه', 'Queen Hall', 100, 0, 'قاعه-الملكه', 'queen-hall', '<p>قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.</p><p><br>&nbsp;</p>', '<p>hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.</p>', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'hgmZckKeKHBNkRpwVVcgldd6sI8SfmU6MH799MRa.jpg', '1', 9, 0, 1, 5, '123', '123', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', '0', 'accepted', '2023-06-04 17:36:52', '2023-06-04 18:48:58', NULL),
(2, 'قاعه السعاده', 'Happy Hall', 100, 0, 'قاعه-السعاده', 'happy-hall', '<p>قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.</p><p><br>&nbsp;</p>', '<p>hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.</p>', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'sAZjeiMtbnA9ZYw3z1cr56aMpUS8SYWTdyTBDpCx.jpg', '1', 9, 0, 1, 5, '123', '123', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', '0', 'accepted', '2023-06-04 17:38:35', '2023-06-04 18:49:03', NULL),
(3, 'قاعه الجمال', 'beaty hall', 100, 0, 'قاعه-الجمال', 'beaty-hall', '<p>قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.</p><p><br>&nbsp;</p>', '<p><strong>hall</strong>, a meeting place, entry, or passageway, ranging in size from a large reception room in a public <a href=\"https://www.britannica.com/technology/building\">building</a> to a corridor or <a href=\"https://www.britannica.com/dictionary/vestibule\">vestibule</a> of a house. For the <a href=\"https://www.britannica.com/topic/feudalism\">feudal</a> society of <a href=\"https://www.britannica.com/event/Middle-Ages\">medieval</a> Europe, the hall was the centre of all <a href=\"https://www.britannica.com/topic/secularism\">secular</a> activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.</p>', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'USjAi2AYWesw0OVYDLpVkzPc0SpEiLGMnd4MqTXE.jpg', '1', 10, 0, 1, 5, '1234', '1234', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', '0', 'accepted', '2023-06-04 18:33:59', '2023-06-04 18:48:54', NULL),
(4, 'قاعه السندس', 'El Sondos Hall', 100, 0, 'قاعه-السندس', 'el-sondos-hall', '<p>قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.</p><p><br>&nbsp;</p>', '<p><strong>hall</strong>, a meeting place, entry, or passageway, ranging in size from a large reception room in a public <a href=\"https://www.britannica.com/technology/building\">building</a> to a corridor or <a href=\"https://www.britannica.com/dictionary/vestibule\">vestibule</a> of a house. For the <a href=\"https://www.britannica.com/topic/feudalism\">feudal</a> society of <a href=\"https://www.britannica.com/event/Middle-Ages\">medieval</a> Europe, the hall was the centre of all <a href=\"https://www.britannica.com/topic/secularism\">secular</a> activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.</p>', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'CQNenGB8h8yDP8eg4SiIBDqbnivnTqMWrQFZPvC1.jpg', '1', 10, 0, 1, 5, '1234', '1234', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', '0', 'accepted', '2023-06-04 18:36:11', '2023-06-04 18:48:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hall_bookings`
--

CREATE TABLE `hall_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','success','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `packge_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `extra_guest` int(11) DEFAULT NULL,
  `promo_code_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall_bookings`
--

INSERT INTO `hall_bookings` (`id`, `status`, `date`, `time_from`, `time_to`, `packge_id`, `hall_id`, `user_id`, `vendor_id`, `total`, `extra_guest`, `promo_code_title`, `promo_code_value`, `promo_code_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'success', '2023-07-01', '10:00:00', '12:00:00', 7, 3, 501, 10, 0, 50, '', '', '', '2023-06-05 09:57:02', '2023-06-05 11:08:25', NULL),
(5, 'success', '2023-07-01', '10:00:00', '12:00:00', 3, 1, 501, 9, 0, 50, '', '', '', '2023-06-05 10:01:09', '2023-06-05 11:07:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hall_booking_taxes`
--

CREATE TABLE `hall_booking_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` int(11) NOT NULL,
  `tax_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hall_categories`
--

CREATE TABLE `hall_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall_categories`
--

INSERT INTO `hall_categories` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `image`, `status`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'اخري', 'other', 'اخري', 'other', 'اخري', 'other', 'اخري', 'other', 'اخري', 'other', NULL, '1', NULL, '2023-06-04 16:08:57', '2023-06-04 16:08:57', NULL),
(2, 'اعياد ميلاد', 'Birthdays', 'اعياد-ميلاد', 'birthdays', 'اعياد ميلاد', 'Birthdays', 'اعياد ميلاد', 'Birthdays', 'اعياد ميلاد', 'Birthdays', NULL, '1', NULL, '2023-06-04 16:08:57', '2023-06-04 16:08:57', NULL),
(3, 'خطوبة', 'engagement', 'خطوبة', 'engagement', 'خطوبة', 'engagement', 'خطوبة', 'engagement', 'خطوبة', 'engagement', NULL, '1', NULL, '2023-06-04 16:08:57', '2023-06-04 16:08:57', NULL),
(4, 'مؤتمرات', 'conferences', 'مؤتمرات', 'conferences', 'مؤتمرات', 'conferences', 'مؤتمرات', 'conferences', 'مؤتمرات', 'conferences', NULL, '1', NULL, '2023-06-04 16:08:57', '2023-06-04 16:08:57', NULL),
(5, 'حفلات خاصه', 'private parties', 'حفلات-خاصه', 'private-parties', 'حفلات خاصه', 'private parties', 'حفلات خاصه', 'private parties', 'حفلات خاصه', 'private parties', NULL, '1', NULL, '2023-06-04 16:08:57', '2023-06-04 16:08:57', NULL),
(6, 'زفاف', 'wedding', 'زفاف', 'wedding', 'زفاف', 'wedding', 'زفاف', 'wedding', 'زفاف', 'wedding', NULL, '1', NULL, '2023-06-04 16:08:57', '2023-06-04 16:08:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hall_media`
--

CREATE TABLE `hall_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall_media`
--

INSERT INTO `hall_media` (`id`, `image`, `hall_id`, `created_at`, `updated_at`) VALUES
(1, 'Qtqg8wUhwvqfQ8oC77KS7TQ0ruNbiaeZX8B6540Z.jpg', 1, '2023-06-04 17:36:52', '2023-06-04 17:36:52'),
(2, 'yiq5gPOLvADUlnVSM43aynY4BwZm6k0Y3ae7c6jh.jpg', 1, '2023-06-04 17:36:52', '2023-06-04 17:36:52'),
(3, 'drIRWac0hgWckNiAi4hpOB5w91wlshg4nqBBb5wj.jpg', 1, '2023-06-04 17:36:52', '2023-06-04 17:36:52'),
(4, 'Vktx3mqNZvFIsHdk3Mox1qiQwjb8eZ66qEJNFB20.jpg', 2, '2023-06-04 17:38:35', '2023-06-04 17:38:35'),
(5, 'jJUXB6dBNzJBcHAjNJcWEIweIpJXmisxiqNMrdbs.jpg', 2, '2023-06-04 17:38:35', '2023-06-04 17:38:35'),
(6, 'fK6UgcvzCWbBYBJ4sMbe20CsPPJSXSQKLERna92O.jpg', 2, '2023-06-04 17:38:35', '2023-06-04 17:38:35'),
(7, 'sft6yI9QOZpm9BRulDBA0szIZQcb44kwvPO7SgT1.jpg', 3, '2023-06-04 18:33:59', '2023-06-04 18:33:59'),
(8, 'vXgxL1IeFxaQ7Y1ihSeiHKG8L89oBUC7F3lhKDWm.jpg', 3, '2023-06-04 18:34:00', '2023-06-04 18:34:00'),
(9, 'TfBwl15DI7WnuMM6tIhAAb6sfqmn77PnkJArUJqK.jpg', 3, '2023-06-04 18:34:00', '2023-06-04 18:34:00'),
(10, '6nqSwGtAVg4IWvzfgoAdNVqh2rOp0WsdFnZ8MMI9.jpg', 3, '2023-06-04 18:34:00', '2023-06-04 18:34:00'),
(11, 'OmSRSdZ5lSVNAzfD0jqND3yHGQBYcWlkrBh4IrWH.jpg', 4, '2023-06-04 18:36:11', '2023-06-04 18:36:11'),
(12, 'PShJoRIJzz07nAPQNvkYaKlJzM8tygeyiVad9f6q.jpg', 4, '2023-06-04 18:36:12', '2023-06-04 18:36:12'),
(13, 'h5YJHcMHjCL3sXK6VFeH8rIw7qUdQJxg1tBjOjhV.jpg', 4, '2023-06-04 18:36:12', '2023-06-04 18:36:12'),
(14, 'VQeY44WJIgU6h14hsoRjuwgkdtyVaFHrAhQKwins.jpg', 4, '2023-06-04 18:36:12', '2023-06-04 18:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `hall_packages`
--

CREATE TABLE `hall_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hall_taxes`
--

CREATE TABLE `hall_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hint_sections`
--

CREATE TABLE `hint_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `small_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `clicks` bigint(20) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inqueries`
--

CREATE TABLE `inqueries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => new, 1=> replied, 2 => cancelled',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquery_replies`
--

CREATE TABLE `inquery_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquery_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_birthday_halls`
--

CREATE TABLE `latest_birthday_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `small_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_engagments_halls`
--

CREATE TABLE `latest_engagments_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `small_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_products`
--

CREATE TABLE `latest_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_wedding_halls`
--

CREATE TABLE `latest_wedding_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `small_title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_section_footers`
--

CREATE TABLE `main_section_footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_store_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_store_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_sliders`
--

CREATE TABLE `main_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_12_20_152219_create_countries_table', 1),
(10, '2022_12_20_152234_create_cities_table', 1),
(11, '2022_12_20_152254_create_regions_table', 1),
(12, '2022_12_21_102451_create_admin_categories_table', 1),
(13, '2022_12_21_102453_create_vendors_table', 1),
(14, '2022_12_21_102455_create_admins_table', 1),
(15, '2022_12_21_102456_create_hall_categories_table', 1),
(16, '2022_12_21_103616_laratrust_setup_tables', 1),
(17, '2022_12_22_084118_create_users_table', 1),
(18, '2022_12_22_084530_create_user_addresses_table', 1),
(19, '2022_12_22_084636_create_taxes_table', 1),
(20, '2022_12_22_084931_create_product_categories_table', 1),
(21, '2022_12_22_084947_create_products_table', 1),
(22, '2022_12_22_085007_create_product_details_table', 1),
(23, '2022_12_22_085007_create_product_media_table', 1),
(24, '2022_12_22_085008_product_products_with', 1),
(25, '2022_12_22_085008_product_tax', 1),
(26, '2022_12_22_085144_create_home_sliders_table', 1),
(27, '2022_12_22_085208_create_ad_categories_table', 1),
(28, '2022_12_22_085221_create_ads_table', 1),
(29, '2022_12_22_085320_create_carts_table', 1),
(30, '2022_12_22_085422_create_user_favorite_products_table', 1),
(31, '2022_12_22_085502_create_product_reviews_table', 1),
(32, '2022_12_22_085624_create_contact_messages_table', 1),
(33, '2022_12_22_085625_create_contact_message_replies_table', 1),
(34, '2022_12_22_085657_create_promo_codes_table', 1),
(35, '2022_12_22_085745_create_app_settings_table', 1),
(36, '2022_12_22_085816_create_shippings_table', 1),
(37, '2022_12_22_085817_create_orders_table', 1),
(38, '2022_12_22_085925_create_order_details_table', 1),
(39, '2022_12_22_100559_create_order_extra_fees_table', 1),
(40, '2022_12_22_100927_create_order_special_discounts_table', 1),
(41, '2023_01_09_102838_create_halls_table', 1),
(42, '2023_01_09_105346_create_hall_media_table', 1),
(43, '2023_01_09_121335_categories_halls', 1),
(44, '2023_01_12_102921_create_package_option_categories_table', 1),
(46, '2023_01_15_103724_create_packages_table', 1),
(47, '2023_01_15_111419_package_option', 1),
(48, '2023_01_15_121411_package_tax', 1),
(49, '2023_02_21_161355_create_blogs_table', 1),
(50, '2023_02_22_164143_create_dynamic_pages_table', 1),
(51, '2023_02_23_101906_create_f_a_q_categories_table', 1),
(52, '2023_02_23_102008_create_f_a_q_s_table', 1),
(53, '2023_03_19_165437_create_terms_and_conditions_table', 1),
(54, '2023_03_20_102311_create_contact_us_table', 1),
(55, '2023_03_20_135542_create_about_us_table', 1),
(56, '2023_03_20_143615_create_queries_requests_table', 1),
(57, '2023_03_22_110633_create_navbars_table', 1),
(58, '2023_03_22_121556_create_main_sliders_table', 1),
(59, '2023_03_22_135008_create_first_advs_table', 1),
(60, '2023_03_22_153921_create_second_advs_table', 1),
(61, '2023_03_22_163051_create_our_features_table', 1),
(62, '2023_03_26_104652_create_main_section_footers_table', 1),
(63, '2023_03_26_104718_create_my_account_section_footers_table', 1),
(64, '2023_03_26_104746_create_why_we_choose_footers_table', 1),
(65, '2023_03_26_104806_create_store_information_footers_table', 1),
(66, '2023_03_27_095558_create_product_top_advs_table', 1),
(67, '2023_03_27_103347_create_product_under_advs_table', 1),
(68, '2023_03_28_154954_create_colors_table', 1),
(69, '2023_03_28_191251_create_compare_lists_table', 1),
(70, '2023_03_29_112524_create_product_colors_table', 1),
(71, '2023_03_30_110236_create_blog_comments_table', 1),
(72, '2023_04_03_052534_create_sizes_table', 1),
(73, '2023_04_03_111031_create_vendor_infos_table', 1),
(74, '2023_04_03_113021_create_product_sizes_table', 1),
(75, '2023_04_05_103810_create_questions_and_requests_table', 1),
(76, '2023_04_05_133507_create_occasions_table', 1),
(77, '2023_04_05_134641_create_product_occasions_table', 1),
(78, '2023_04_05_143016_create_product_taxes_table', 1),
(79, '2023_04_06_134626_create_order_products_table', 1),
(80, '2023_04_06_135246_create_order_taxes_table', 1),
(81, '2023_04_11_095201_create_notifications_table', 1),
(82, '2023_04_11_152459_create_splashes_table', 1),
(83, '2023_04_17_151926_create_available_dates_table', 1),
(84, '2023_04_19_121505_create_hall_bookings_table', 1),
(85, '2023_04_19_123150_hall_taxes', 1),
(86, '2023_04_26_163741_create_with_draw_requests_table', 1),
(87, '2023_04_26_172857_create_digital_cards_table', 1),
(88, '2023_04_27_104812_create_become_vendors_table', 1),
(89, '2023_04_27_114716_create_with_draws_table', 1),
(90, '2023_04_30_110950_create_top_navbars_table', 1),
(91, '2023_04_30_115900_create_view_all_products_table', 1),
(92, '2023_04_30_134611_create_latest_wedding_halls_table', 1),
(93, '2023_04_30_143416_create_latest_products_table', 1),
(94, '2023_04_30_144959_create_explore_categories_table', 1),
(95, '2023_04_30_145514_create_best_selleres_table', 1),
(96, '2023_04_30_150227_create_shop_by_occasions_table', 1),
(97, '2023_04_30_150941_create_shop_by_brands_table', 1),
(98, '2023_04_30_160051_create_hint_sections_table', 1),
(99, '2023_05_01_135301_create_latest_engagments_halls_table', 1),
(100, '2023_05_01_141952_create_latest_birthday_halls_table', 1),
(101, '2023_05_01_150215_create_features_sections_table', 1),
(102, '2023_05_01_153003_create_news_sections_table', 1),
(103, '2023_05_01_154426_create_top_footers_table', 1),
(104, '2023_05_01_165044_create_footer_main_sections_table', 1),
(105, '2023_05_02_095112_create_terms_table', 1),
(106, '2023_05_02_100902_create_abouts_table', 1),
(107, '2023_05_02_101210_create_fast_links_table', 1),
(108, '2023_05_02_105230_create_find_us_table', 1),
(109, '2023_05_02_110204_create_faqs_table', 1),
(110, '2023_05_02_110759_create_footer_contact_us_table', 1),
(111, '2023_05_02_130619_create_brands_table', 1),
(112, '2023_05_02_130636_create_product_brands_table', 1),
(113, '2023_05_02_142137_create_outer_clients_table', 1),
(114, '2023_05_02_150540_create_advertisements_table', 1),
(115, '2023_05_02_151325_create_verifications_table', 1),
(116, '2023_05_02_154808_create_clients_ads_table', 1),
(117, '2023_05_09_101335_create_favourites_table', 1),
(118, '2023_05_10_094449_create_assign_explore_categories_table', 1),
(119, '2023_05_10_150049_create_wishlists_table', 1),
(120, '2023_05_14_090714_create_inqueries_table', 1),
(121, '2023_05_14_091045_create_inquery_replies_table', 1),
(122, '2023_05_29_105632_create_cart_halls_table', 1),
(123, '2023_05_29_110339_create_cart_hall_options_table', 1),
(124, '2023_05_29_132346_create_hall_packages_table', 1),
(125, '2023_05_29_152026_create_booking_details_table', 1),
(126, '2023_05_30_150748_create_rates_table', 1),
(127, '2023_05_31_154634_create_permission_users_table', 1),
(128, '2023_06_04_135841_create_hall_booking_taxes_table', 1),
(129, '2023_01_12_103022_create_package_options_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `my_account_section_footers`
--

CREATE TABLE `my_account_section_footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navbars`
--

CREATE TABLE `navbars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_us` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_sections`
--

CREATE TABLE `news_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_from` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `message_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `type`, `sent_from`, `sent_to`, `send_from`, `vendor_id`, `admin_id`, `title_en`, `desc_ar`, `desc_en`, `created_at`, `updated_at`, `deleted_at`, `message_id`) VALUES
(1, 501, NULL, NULL, 'تم حجز القاعة بنجاح', '', '', '', NULL, NULL, NULL, 'hall booked successfully', 'برجاء انتظار موافقة الادارة', 'please wait management acception', '2023-06-05 06:45:15', '2023-06-05 06:45:15', NULL, NULL),
(2, 501, NULL, NULL, 'تم حجز القاعة بنجاح', '', '', '', NULL, NULL, NULL, 'hall booked successfully', 'برجاء انتظار موافقة الادارة', 'please wait management acception', '2023-06-05 09:15:39', '2023-06-05 09:15:39', NULL, NULL),
(3, 501, NULL, NULL, 'تم حجز القاعة بنجاح', '', '', '', NULL, NULL, NULL, 'hall booked successfully', 'برجاء انتظار موافقة الادارة', 'please wait management acception', '2023-06-05 09:57:02', '2023-06-05 09:57:02', NULL, NULL),
(4, 501, NULL, NULL, 'تم حجز القاعة بنجاح', '', '', '', NULL, NULL, NULL, 'hall booked successfully', 'برجاء انتظار موافقة الادارة', 'please wait management acception', '2023-06-05 10:01:09', '2023-06-05 10:01:09', NULL, NULL),
(5, 3, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(6, 4, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(7, 5, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(8, 6, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(9, 7, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(10, 8, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(11, 9, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(12, 10, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(13, 12, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(14, 13, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(15, 17, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(16, 18, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(17, 23, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(18, 27, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(19, 28, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(20, 29, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(21, 30, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(22, 32, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(23, 37, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(24, 39, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(25, 40, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(26, 43, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(27, 48, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(28, 52, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(29, 53, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(30, 54, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(31, 56, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(32, 62, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(33, 64, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(34, 67, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(35, 70, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(36, 71, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(37, 73, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(38, 74, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(39, 75, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(40, 76, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(41, 79, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(42, 80, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(43, 83, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(44, 87, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(45, 88, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(46, 89, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(47, 93, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(48, 97, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(49, 98, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(50, 99, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(51, 100, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(52, 102, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(53, 103, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(54, 105, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(55, 107, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(56, 110, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(57, 111, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(58, 113, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(59, 114, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(60, 116, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(61, 121, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(62, 122, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(63, 123, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(64, 126, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(65, 127, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(66, 128, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(67, 131, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(68, 142, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(69, 143, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(70, 144, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(71, 145, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(72, 146, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(73, 147, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(74, 150, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(75, 151, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(76, 152, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(77, 153, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(78, 156, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(79, 157, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(80, 158, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(81, 160, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(82, 166, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(83, 171, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(84, 172, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(85, 174, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(86, 179, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(87, 188, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(88, 189, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(89, 190, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(90, 191, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(91, 193, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(92, 200, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(93, 201, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(94, 202, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(95, 205, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(96, 207, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(97, 209, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(98, 210, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(99, 212, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(100, 214, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(101, 219, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(102, 222, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(103, 224, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(104, 227, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(105, 232, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(106, 233, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(107, 235, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(108, 236, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(109, 237, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(110, 239, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(111, 246, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(112, 248, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(113, 249, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(114, 253, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(115, 257, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(116, 268, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(117, 270, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(118, 271, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(119, 272, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(120, 273, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(121, 274, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(122, 276, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(123, 277, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(124, 278, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(125, 283, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(126, 287, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(127, 291, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(128, 293, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(129, 294, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(130, 295, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(131, 296, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(132, 297, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(133, 301, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(134, 302, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(135, 303, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(136, 304, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(137, 307, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(138, 309, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(139, 312, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(140, 314, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(141, 318, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(142, 319, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(143, 320, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(144, 322, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(145, 324, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(146, 325, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(147, 326, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(148, 327, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(149, 329, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(150, 331, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(151, 332, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(152, 334, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(153, 335, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(154, 337, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(155, 338, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(156, 340, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(157, 341, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(158, 342, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(159, 343, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(160, 344, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(161, 345, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(162, 348, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(163, 352, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(164, 353, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(165, 354, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(166, 355, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(167, 356, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(168, 362, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(169, 363, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(170, 367, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(171, 368, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(172, 369, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(173, 370, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(174, 372, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(175, 373, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(176, 374, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(177, 375, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(178, 376, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(179, 378, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(180, 380, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(181, 385, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(182, 386, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(183, 387, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(184, 388, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:08', '2023-06-05 12:46:08', NULL, NULL),
(185, 390, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(186, 391, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(187, 393, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(188, 395, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(189, 396, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(190, 397, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(191, 398, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(192, 399, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(193, 400, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(194, 402, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(195, 404, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(196, 409, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(197, 410, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(198, 413, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(199, 414, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(200, 416, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(201, 417, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(202, 419, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(203, 420, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(204, 421, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(205, 422, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(206, 424, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(207, 426, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(208, 429, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(209, 430, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(210, 432, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(211, 434, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(212, 436, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(213, 439, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(214, 442, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(215, 444, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(216, 448, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(217, 452, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(218, 454, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(219, 455, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(220, 456, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL);
INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `type`, `sent_from`, `sent_to`, `send_from`, `vendor_id`, `admin_id`, `title_en`, `desc_ar`, `desc_en`, `created_at`, `updated_at`, `deleted_at`, `message_id`) VALUES
(221, 459, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(222, 460, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(223, 465, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(224, 466, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(225, 468, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(226, 470, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(227, 472, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(228, 474, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(229, 476, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(230, 478, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(231, 483, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(232, 484, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(233, 485, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(234, 486, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(235, 492, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(236, 495, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(237, 496, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(238, 499, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(239, 500, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL),
(240, 501, NULL, NULL, 'Reprehenderit nemo', 'One user or many users', '', '', 'Events', NULL, 1, 'Ea voluptas consecte', 'Non reiciendis ex an', 'Dolorum rerum rerum', '2023-06-05 12:46:09', '2023-06-05 12:46:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `primary_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_what` enum('product','hall','both') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occasions`
--

INSERT INTO `occasions` (`id`, `primary_image`, `icon`, `title_ar`, `title_en`, `country_id`, `city_id`, `region_id`, `description_ar`, `description_en`, `for_what`, `created_at`, `updated_at`) VALUES
(1, 'RQFSbvLVHseRH24lSSNE9txwOocMoVZqEMh9fVZV.jpg', 'qyzQJqlPk8fnz7nHKo2wZlCWlkMRuZfhnEweciCp.png', 'حفل زفاف', 'weddings', NULL, 5, 5, 'الزِفَاف أو العُرْس هو الحفل أو المرسم لإعلان بداية الزواج وتتعدد مراسمه حسب العادات والتقاليد والديانات إلا أن القاسم المشترك فيما بينها هو الإشهار والإعلان بما يتناسب مع ثقافة وعادات وتقاليد الشعوب.\r\n\r\nتدخل المراسم الدينية في صميم معظم الاحتفالات بالزفاف، فالزواج لا يتم في الهندوسية واليهودية والمسيحية إلا بمباركة رجال الدين.\r\n\r\nتختلف حفلات الزفاف من بلد لأخر ومن شعب لأخر. إلاّ أن القاسم المشترك هو إقامة وليمة طعام يُدعى إليها الأهل والأصدقاء، والموسيقى، والملبس الأنيق والبهجة التي تعم الناس احتفالاً ببدء تلك الحياة الزوجية الجديدة.\r\n\r\nوالقاسم المشترك في جميع هذه الحفلات أنها تتسم في بدايتها بقاسم ديني حتى ولو لم يكن الزوجان متدينان.\r\n\r\nوقد يتم إبدال أو إشراك المراسيم الدينية بمراسيم مدنية، أي عن طريق تسجيل الزواج في المحكمة أو في النظام القانوني للبلد المعين.', 'A wedding is a ceremony where two people are united in marriage. Wedding traditions and customs vary greatly between cultures, ethnic groups, religions, countries, and social classes. Most wedding ceremonies involve an exchange of marriage vows by a couple, presentation of a gift (offering, rings, symbolic item, flowers, money, dress), and a public proclamation of marriage by an authority figure or celebrant. Special wedding garments are often worn, and the ceremony is sometimes followed by a wedding reception. Music, poetry, prayers, or readings from religious texts or literature are also commonly incorporated into the ceremony, as well as superstitious customs.', 'both', '2023-06-04 16:35:26', '2023-06-04 16:35:26'),
(2, '1RY6SFrdln2p8J1xhtaq3JIpPScFFXvaZXOBurO9.jpg', 'mSpZXX1zuqjTzVuPt2lgLCktSF7ftrjQCBuKGsOg.png', 'مؤتمرات', 'conferences', NULL, 5, 5, 'المؤتمر هو اجتماع لاثنين أو أكثر من الخبراء لمناقشة وتبادل الآراء أو المعلومات الجديدة حول موضوع معين.\r\n\r\nيمكن استخدام المؤتمرات كشكل من أشكال صنع القرار الجماعي ، على الرغم من أن المناقشة ، وليس القرارات دائمًا ، هي الغرض الرئيسي للمؤتمرات.', 'A conference is a meeting of two or more experts to discuss and exchange opinions or new information about a particular topic.\r\n\r\nConferences can be used as a form of group decision-making, although discussion, not always decisions, are the main purpose of conferences.', 'both', '2023-06-04 16:38:01', '2023-06-04 16:38:01'),
(3, '4pjnOW4n4PaARVAN40rH7eqQmmkewIEVvUSRy6u3.jpg', 'BB0fTpuRIWBXgRIZiwXJ9RxSDvAgyyje77pAozOz.png', 'أعياد ميلاد', 'birthday', NULL, 6, 6, 'عيد الميلاد هو ذكرى ولادة شخص ، أو مجازيًا لمؤسسة. يتم الاحتفال بأعياد ميلاد الأشخاص في العديد من الثقافات ، غالبًا مع هدايا أعياد الميلاد أو بطاقات أعياد الميلاد أو حفلات أعياد الميلاد أو طقوس العبور.\r\n\r\nتحتفل العديد من الأديان بميلاد مؤسسيها أو الشخصيات الدينية بأعياد خاصة (مثل عيد الميلاد ، والمولد ، وعيد ميلاد بوذا ، وكريشنا جانماشتامي).\r\n\r\nهناك فرق بين تاريخ الميلاد وتاريخ الميلاد (المعروف أيضًا باسم تاريخ الميلاد): الأول ، باستثناء 29 فبراير ، يحدث كل عام (على سبيل المثال 15 يناير) ، بينما الأخير هو التاريخ الكامل لميلاد الشخص (على سبيل المثال 15 يناير) ، 2001).', 'A birthday is the anniversary of the birth of a person, or figuratively of an institution. Birthdays of people are celebrated in numerous cultures, often with birthday gifts, birthday cards, a birthday party, or a rite of passage.\r\n\r\nMany religions celebrate the birth of their founders or religious figures with special holidays (e.g. Christmas, Mawlid, Buddha\'s Birthday, and Krishna Janmashtami).\r\n\r\nThere is a distinction between birthday and birthdate (also known as date of birth): the former, except for February 29, occurs each year (e.g. January 15), while the latter is the complete date when a person was born (e.g. January 15, 2001).', 'both', '2023-06-04 16:39:56', '2023-06-04 16:39:56'),
(4, 'iSH4SVTSYzwbzBCaeAqGE6zgh3laZGo4Zm5ALEKx.jpg', 'FIT100bUheMY25odi0JjDPvUZ6qxEif6aWfo4rQ7.png', 'خطوبه', 'engagement', NULL, 5, 5, 'الخطبة أو الخطوبة هي الفترة الزمنية بين إعلان قبول طلب الزواج والزواج نفسه (الذي يبدأ عادة ولكن ليس دائمًا بزفاف). خلال هذه الفترة ، يُقال إن الزوجين خطيبان (من الفرنسيين) ، أو مخطوبة ، أو متعمد ، أو خطيب ، أو مخطوب للزواج ، أو مخطوبًا ببساطة. يمكن تسمية العرسان والعرائس المستقبليين بالخطيب (المؤنث) أو الخطيب (المذكر) ، أو المخطوبين ، أو الزوجة المستقبلة ، أو الزوج المستقبل ، على التوالي. تختلف مدة الخطوبة بشكل كبير ، وتعتمد إلى حد كبير على المعايير الثقافية أو على موافقة الأطراف المعنية.', 'An engagement or betrothal is the period of time between the declaration of acceptance of a marriage proposal and the marriage itself (which is typically but not always commenced with a wedding). During this period, a couple is said to be fiancés (from the French), betrothed, intended, affianced, engaged to be married, or simply engaged. Future brides and grooms may be called fiancée (feminine) or fiancé (masculine), the betrothed, a wife-to-be or husband-to-be, respectively. The duration of the courtship varies vastly, and is largely dependent on cultural norms or upon the agreement of the parties involved.', 'both', '2023-06-04 16:41:47', '2023-06-04 16:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_promo_code_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_promo_code_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_promo_code_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_from` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancelled_from` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `city_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `region_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_name`, `customer_email`, `customer_address`, `customer_phone`, `customer_promo_code_title`, `customer_promo_code_value`, `customer_promo_code_type`, `order_from`, `cancelled_from`, `payment_type`, `status`, `country_id`, `city_id`, `region_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '000000001', 'mostafagamal', 'mostafagamal@gmail.com', 'address', '01097253062', '', '', '', 'android', NULL, 'visa', 'delivered', 1, 5, 5, '2023-06-05 10:13:55', '2023-06-05 11:01:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) DEFAULT 0.00,
  `price` double(8,2) DEFAULT 0.00,
  `total_taxes` double(8,2) DEFAULT 0.00,
  `quantity` int(11) DEFAULT NULL,
  `product_title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_extra_fees`
--

CREATE TABLE `order_extra_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost` double(8,2) DEFAULT 0.00,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('new','inprogress','delivered','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `product_id`, `vendor_id`, `order_id`, `order_number`, `product_title`, `price`, `product_quantity`, `commission`, `taxes`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 7, 1, '000000001', 'Polo T-shirt', '1000', '1', '10', '0', 'delivered', '2023-06-05 10:13:55', '2023-06-05 10:32:19'),
(3, 2, 7, NULL, '000000001', 'cargo panatlon', '1200', '1', '10', '0', 'delivered', '2023-06-05 10:13:55', '2023-06-05 10:32:19'),
(4, 3, 8, NULL, '000000001', 'kitkat chocolate', '100', '1', '10', '0', 'delivered', '2023-06-05 10:13:55', '2023-06-05 11:01:58'),
(5, 4, 8, NULL, '000000001', 'Dairy Milk', '10', '1', '10', '0', 'delivered', '2023-06-05 10:13:55', '2023-06-05 11:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_special_discounts`
--

CREATE TABLE `order_special_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost` double(8,2) DEFAULT 0.00,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_taxes`
--

CREATE TABLE `order_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxe_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxe_percentage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_features`
--

CREATE TABLE `our_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outer_clients`
--

CREATE TABLE `outer_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photographer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_guest_price` int(11) DEFAULT NULL,
  `number_of_tables` int(11) DEFAULT NULL,
  `number_of_guests` int(11) DEFAULT NULL,
  `fake_price` double DEFAULT NULL,
  `real_price` double DEFAULT NULL,
  `views` bigint(20) DEFAULT 0,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meal_description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meal_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lighting_description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lighting_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sound_description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sound_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_of_the_day_description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_of_the_day_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flowers_description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flowers_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decoration_description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decoration_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `hall_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title_ar`, `title_en`, `photographer`, `extra_guest_price`, `number_of_tables`, `number_of_guests`, `fake_price`, `real_price`, `views`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `meal_description_ar`, `meal_description_en`, `lighting_description_ar`, `lighting_description_en`, `sound_description_ar`, `sound_description_en`, `plan_of_the_day_description_ar`, `plan_of_the_day_description_en`, `flowers_description_ar`, `flowers_description_en`, `decoration_description_ar`, `decoration_description_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `image`, `status`, `admin_id`, `hall_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'الباجكدج 1', 'package 1', 'yes', 100, 120, 123, NULL, 1000, 0, 'الباجكدج-1', 'package-1', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', '7UzixDqIKqhJxDosUTtOUiBZcRWIqRpc6wCrBpZK.jpg', '1', 9, 2, '2023-06-04 17:41:42', '2023-06-04 17:41:42', NULL),
(2, 'الباجكدج 2', 'package 2', 'yes', 400, 14, 600, NULL, 4000, 0, 'الباجكدج-2', 'package-2', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.\r\nقاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'ICGgHQppIGvAyPuGDGbgEChgaBK4boGNvtTyf7ji.jpg', '1', 9, 2, '2023-06-04 17:44:10', '2023-06-04 17:44:10', NULL),
(3, 'الباجكدج 3', 'package 3', 'yes', 300, 123, 100, NULL, 3000, 0, 'الباجكدج-3', 'package-3', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'HsfwzNNm60tF70SHAa34GWXtSAQLRNKJvUIldHmJ.jpg', '1', 9, 1, '2023-06-04 17:45:54', '2023-06-04 17:45:54', NULL),
(4, 'الباجكدج 4', 'package 4', 'yes', 800, 1234, 8000, NULL, 9000, 0, 'الباجكدج-4', 'package-4', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطهي والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'E9O4XNF2z7eM8XraIdCY7wuFJ4pN1Rqu4HambSuX.jpg', '1', 9, 1, '2023-06-04 17:47:31', '2023-06-04 17:47:31', NULL),
(5, 'العرض الاول', 'offer 1', 'yes', 123, 123, 123, NULL, 10000, 0, 'العرض-الاول', 'offer-1', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'KaiFFYKXdp0buJiCyPHoyMtU4v0QDmGmlzpPP7h6.jpg', '1', 10, 4, '2023-06-04 18:41:47', '2023-06-04 18:41:47', NULL),
(6, 'العرض الثانى', 'second offer', 'yes', 1000, 1234, 900, NULL, 90000, 0, 'العرض-الثانى', 'second-offer', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'MxUt6WPKZWG9kDwwpn5wQqmrLQVtZcZw2Psm0hPn.jpg', '1', 10, 4, '2023-06-04 18:43:45', '2023-06-04 18:43:45', NULL);
INSERT INTO `packages` (`id`, `title_ar`, `title_en`, `photographer`, `extra_guest_price`, `number_of_tables`, `number_of_guests`, `fake_price`, `real_price`, `views`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `meal_description_ar`, `meal_description_en`, `lighting_description_ar`, `lighting_description_en`, `sound_description_ar`, `sound_description_en`, `plan_of_the_day_description_ar`, `plan_of_the_day_description_en`, `flowers_description_ar`, `flowers_description_en`, `decoration_description_ar`, `decoration_description_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `image`, `status`, `admin_id`, `hall_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'العرض الثالث', 'third offet', 'yes', 1000, 1222, 1343, NULL, 10000, 0, 'العرض-الثالث', 'third-offet', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', '6vUvFpkuT95QL1hNTK2Kq33e792p5S65RDEEI7hR.jpg', '1', 10, 3, '2023-06-04 18:45:08', '2023-06-04 18:45:08', NULL),
(8, 'العرض الرابع', 'fourth', 'no', 17888, 190, 180, NULL, 1888, 0, 'العرض-الرابع', 'fourth', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'قاعة أو مكان اجتماع أو مدخل أو ممر يتراوح حجمه من غرفة استقبال كبيرة في مبنى عام إلى ممر أو دهليز منزل. بالنسبة للمجتمع الإقطاعي في أوروبا في العصور الوسطى ، كانت القاعة مركزًا لجميع الأنشطة العلمانية. في الأصل كانت تستخدم من قبل مجموعات كبيرة من الناس للطبخ والنوم ، وكذلك للأنشطة التي لا تزال تؤويها عند استخدامها كقاعة محكمة أو قاعة مأدبة أو مكان للترفيه.', 'hall, a meeting place, entry, or passageway, ranging in size from a large reception room in a public building to a corridor or vestibule of a house. For the feudal society of medieval Europe, the hall was the centre of all secular activities. Originally it was used by large groups of people for cooking and sleeping, as well as for the activities it still shelters when it is used as courtroom, banquet room, or place of entertainment.', 'QPLKyAnshHDaikOZNMIwPo40EWpmBCnaSJdLyKpM.jpg', '1', 10, 3, '2023-06-04 18:47:13', '2023-06-04 18:47:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_option`
--

CREATE TABLE `package_option` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_options`
--

CREATE TABLE `package_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `limitation` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_options`
--

INSERT INTO `package_options` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `price`, `limitation`, `quantity`, `image`, `status`, `admin_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'كراسي طويله', 'Long chairs', 'كراسي-طويله', 'long-chairs', 100, NULL, NULL, '4Wm2Psq5ybKwDs9usOMMIuAztWd3kc3KBEwvdQaI.jpg', '1', 1, 2, '2023-06-04 13:08:56', '2023-06-04 15:05:22', NULL),
(2, 'كراسي قصيره', 'Short chairs', 'كراسي-قصيره', 'short-chairs', 100, NULL, NULL, '8iO83mHElhmXu9ralkYOcbspZAWcLiOl6dbj78zx.jpg', '1', 1, 2, '2023-06-04 13:08:56', '2023-06-04 15:05:37', NULL),
(3, 'كراسي فاخره', 'Luxurious chairs', 'كراسي-فاخره', 'luxurious-chairs', 120, NULL, NULL, 'YFHh96c4p2GoZN9QsLbGU9nusklMOQLieJoPYww6.jpg', '1', 1, 2, '2023-06-04 13:08:56', '2023-06-04 15:05:55', NULL),
(4, 'طاولات كبيره', 'Big tables', 'طاولات-كبيره', 'big-tables', 200, NULL, NULL, 'nXnst2Je0A5vM8fLohXJbnNQpik9b6982SWR2u7y.jpg', '1', 1, 8, '2023-06-04 13:08:56', '2023-06-04 15:06:16', NULL),
(5, 'طاولات فاخره', 'Luxurious tables', 'طاولات-فاخره', 'luxurious-tables', 300, NULL, NULL, '5r7mfM091aIks6ILOqcwYyxH9K3WrSU4i1fM7O10.jpg', '1', 1, 1, '2023-06-04 13:08:56', '2023-06-04 15:06:30', NULL),
(6, 'بوكيه ورد', 'Bouquet', 'بوكيه-ورد', 'bouquet', 500, NULL, NULL, 'XlB0i6iVlQpusIJH8qAzf11nlsHXSeR4zT6BXCYB.jpg', '1', 1, 1, '2023-06-04 13:08:56', '2023-06-04 15:06:51', NULL),
(7, 'بيبسي', 'Pepsi', 'بيبسي', 'pepsi', 18, NULL, NULL, 'x1c3EoSUyWyffm97YMDczVwZRyYFqhYieBiVXecO.jpg', '1', 9, 9, '2023-06-04 15:07:51', '2023-06-04 15:07:51', NULL),
(8, 'سيفين اب', 'seven up', 'سيفين-اب', 'seven-up', 19, NULL, NULL, 'Of6k7deKZlD5KsA3JYxWFuxfUK3OM4OohYdIRerS.jpg', '1', 9, 9, '2023-06-04 15:08:57', '2023-06-04 15:08:57', NULL),
(9, 'فيروز اناناس', 'fayroz', 'فيروز-اناناس', 'fayroz', 25, NULL, NULL, 'KQxSBsmz2QNkaFlL1myudCm9FvdwqagdMwrVA1Qb.jpg', '1', 9, 9, '2023-06-04 15:10:00', '2023-06-04 15:10:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_option_categories`
--

CREATE TABLE `package_option_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` int(11) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_option_categories`
--

INSERT INTO `package_option_categories` (`id`, `hall_id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `image`, `status`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'زهور', 'flowers', 'زهور', 'flowers', 'CoLup0PLmLEXJyXR0bQPooOGFWpu0KGdgRkXwOln.jpg', '1', 1, '2023-06-04 16:08:56', '2023-06-04 17:58:55', NULL),
(2, 2, 'كراسي', 'Chairs', 'كراسي', 'chairs', '2ER9LjINlrP59UUqTYHAy5rjaLLWZF74RFNhzIbz.jpg', '1', 1, '2023-06-04 16:08:56', '2023-06-04 17:58:42', NULL),
(6, 2, 'العاب ناريه', 'firewall', 'العاب-ناريه', 'firewall', '6uYnialHeu3OxD1sDycjK7Ql4VqwiEaxf6VAtPHR.jpg', '1', 1, '2023-06-04 16:08:56', '2023-06-04 18:00:10', NULL),
(7, 1, 'ورود بيضاء', 'white flowers', 'ورود-بيضاء', 'white-flowers', '0usBRmUBq303pJw6tiPN0MOmJwUJ03QmG7R57k0f.jpg', '1', 1, '2023-06-04 18:02:05', '2023-06-04 18:02:06', NULL),
(8, 1, 'طاولات', 'tables', 'طاولات', 'tables', 'ggP1kL5Hl8uyhlTA4fs7inYtaTpbb7YdHByf8oUP.jpg', '1', 1, '2023-06-04 18:02:50', '2023-06-04 18:04:20', NULL),
(9, 1, 'مياه غاذيه', 'Carbonated water', 'مياه-غاذيه', 'carbonated-water', 'r1crQMqpSZqrgLxeNMNAhosBAy1ko3pGBuNWUO8D.jpg', '1', 1, '2023-06-04 18:04:09', '2023-06-04 18:04:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_tax`
--

CREATE TABLE `package_tax` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(2, 'users-read', 'Read Users', 'Read Users', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(3, 'users-update', 'Update Users', 'Update Users', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(5, 'system-admins-create', 'Create System-admins', 'Create System-admins', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(6, 'system-admins-read', 'Read System-admins', 'Read System-admins', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(7, 'system-admins-update', 'Update System-admins', 'Update System-admins', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(8, 'system-admins-delete', 'Delete System-admins', 'Delete System-admins', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(9, 'vendor-admins-create', 'Create Vendor-admins', 'Create Vendor-admins', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(10, 'vendor-admins-read', 'Read Vendor-admins', 'Read Vendor-admins', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(11, 'vendor-admins-update', 'Update Vendor-admins', 'Update Vendor-admins', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(12, 'vendor-admins-delete', 'Delete Vendor-admins', 'Delete Vendor-admins', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(13, 'admin-categories-create', 'Create Admin-categories', 'Create Admin-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(14, 'admin-categories-read', 'Read Admin-categories', 'Read Admin-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(15, 'admin-categories-update', 'Update Admin-categories', 'Update Admin-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(16, 'admin-categories-delete', 'Delete Admin-categories', 'Delete Admin-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(17, 'vendors-create', 'Create Vendors', 'Create Vendors', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(18, 'vendors-read', 'Read Vendors', 'Read Vendors', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(19, 'vendors-update', 'Update Vendors', 'Update Vendors', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(20, 'vendors-delete', 'Delete Vendors', 'Delete Vendors', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(21, 'halls-create', 'Create Halls', 'Create Halls', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(22, 'halls-read', 'Read Halls', 'Read Halls', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(23, 'halls-update', 'Update Halls', 'Update Halls', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(24, 'halls-delete', 'Delete Halls', 'Delete Halls', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(25, 'halls-categories-create', 'Create Halls-categories', 'Create Halls-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(26, 'halls-categories-read', 'Read Halls-categories', 'Read Halls-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(27, 'halls-categories-update', 'Update Halls-categories', 'Update Halls-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(28, 'halls-categories-delete', 'Delete Halls-categories', 'Delete Halls-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(29, 'packages-create', 'Create Packages', 'Create Packages', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(30, 'packages-read', 'Read Packages', 'Read Packages', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(31, 'packages-update', 'Update Packages', 'Update Packages', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(32, 'packages-delete', 'Delete Packages', 'Delete Packages', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(33, 'packages-options-categories-create', 'Create Packages-options-categories', 'Create Packages-options-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(34, 'packages-options-categories-read', 'Read Packages-options-categories', 'Read Packages-options-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(35, 'packages-options-categories-update', 'Update Packages-options-categories', 'Update Packages-options-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(36, 'packages-options-categories-delete', 'Delete Packages-options-categories', 'Delete Packages-options-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(37, 'packages-options-create', 'Create Packages-options', 'Create Packages-options', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(38, 'packages-options-read', 'Read Packages-options', 'Read Packages-options', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(39, 'packages-options-update', 'Update Packages-options', 'Update Packages-options', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(40, 'packages-options-delete', 'Delete Packages-options', 'Delete Packages-options', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(41, 'packages-available-dates-and-times-create', 'Create Packages-available-dates-and-times', 'Create Packages-available-dates-and-times', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(42, 'packages-available-dates-and-times-read', 'Read Packages-available-dates-and-times', 'Read Packages-available-dates-and-times', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(43, 'packages-available-dates-and-times-update', 'Update Packages-available-dates-and-times', 'Update Packages-available-dates-and-times', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(44, 'packages-available-dates-and-times-delete', 'Delete Packages-available-dates-and-times', 'Delete Packages-available-dates-and-times', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(45, 'bookings-create', 'Create Bookings', 'Create Bookings', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(46, 'bookings-read', 'Read Bookings', 'Read Bookings', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(47, 'bookings-update', 'Update Bookings', 'Update Bookings', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(48, 'bookings-delete', 'Delete Bookings', 'Delete Bookings', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(49, 'products-categories-create', 'Create Products-categories', 'Create Products-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(50, 'products-categories-read', 'Read Products-categories', 'Read Products-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(51, 'products-categories-update', 'Update Products-categories', 'Update Products-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(52, 'products-categories-delete', 'Delete Products-categories', 'Delete Products-categories', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(53, 'products-create', 'Create Products', 'Create Products', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(54, 'products-read', 'Read Products', 'Read Products', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(55, 'products-update', 'Update Products', 'Update Products', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(56, 'products-delete', 'Delete Products', 'Delete Products', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(57, 'products-reviews-create', 'Create Products-reviews', 'Create Products-reviews', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(58, 'products-reviews-read', 'Read Products-reviews', 'Read Products-reviews', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(59, 'products-reviews-update', 'Update Products-reviews', 'Update Products-reviews', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(60, 'products-reviews-delete', 'Delete Products-reviews', 'Delete Products-reviews', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(61, 'orders-create', 'Create Orders', 'Create Orders', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(62, 'orders-read', 'Read Orders', 'Read Orders', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(63, 'orders-update', 'Update Orders', 'Update Orders', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(64, 'orders-delete', 'Delete Orders', 'Delete Orders', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(65, 'taxes-create', 'Create Taxes', 'Create Taxes', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(66, 'taxes-read', 'Read Taxes', 'Read Taxes', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(67, 'taxes-update', 'Update Taxes', 'Update Taxes', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(68, 'taxes-delete', 'Delete Taxes', 'Delete Taxes', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(69, 'promo-codes-create', 'Create Promo-codes', 'Create Promo-codes', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(70, 'promo-codes-read', 'Read Promo-codes', 'Read Promo-codes', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(71, 'promo-codes-update', 'Update Promo-codes', 'Update Promo-codes', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(72, 'promo-codes-delete', 'Delete Promo-codes', 'Delete Promo-codes', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(73, 'shippings-create', 'Create Shippings', 'Create Shippings', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(74, 'shippings-read', 'Read Shippings', 'Read Shippings', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(75, 'shippings-update', 'Update Shippings', 'Update Shippings', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(76, 'shippings-delete', 'Delete Shippings', 'Delete Shippings', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(77, 'ads-categories-create', 'Create Ads-categories', 'Create Ads-categories', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(78, 'ads-categories-read', 'Read Ads-categories', 'Read Ads-categories', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(79, 'ads-categories-update', 'Update Ads-categories', 'Update Ads-categories', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(80, 'ads-categories-delete', 'Delete Ads-categories', 'Delete Ads-categories', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(81, 'ads-create', 'Create Ads', 'Create Ads', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(82, 'ads-read', 'Read Ads', 'Read Ads', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(83, 'ads-update', 'Update Ads', 'Update Ads', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(84, 'ads-delete', 'Delete Ads', 'Delete Ads', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(85, 'home-slider-create', 'Create Home-slider', 'Create Home-slider', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(86, 'home-slider-read', 'Read Home-slider', 'Read Home-slider', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(87, 'home-slider-update', 'Update Home-slider', 'Update Home-slider', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(88, 'home-slider-delete', 'Delete Home-slider', 'Delete Home-slider', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(89, 'countries-create', 'Create Countries', 'Create Countries', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(90, 'countries-read', 'Read Countries', 'Read Countries', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(91, 'countries-update', 'Update Countries', 'Update Countries', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(92, 'countries-delete', 'Delete Countries', 'Delete Countries', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(93, 'cities-create', 'Create Cities', 'Create Cities', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(94, 'cities-read', 'Read Cities', 'Read Cities', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(95, 'cities-update', 'Update Cities', 'Update Cities', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(96, 'cities-delete', 'Delete Cities', 'Delete Cities', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(97, 'regions-create', 'Create Regions', 'Create Regions', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(98, 'regions-read', 'Read Regions', 'Read Regions', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(99, 'regions-update', 'Update Regions', 'Update Regions', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(100, 'regions-delete', 'Delete Regions', 'Delete Regions', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(101, 'contacts-create', 'Create Contacts', 'Create Contacts', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(102, 'contacts-read', 'Read Contacts', 'Read Contacts', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(103, 'contacts-update', 'Update Contacts', 'Update Contacts', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(104, 'contacts-delete', 'Delete Contacts', 'Delete Contacts', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(105, 'pages-create', 'Create Pages', 'Create Pages', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(106, 'pages-read', 'Read Pages', 'Read Pages', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(107, 'pages-update', 'Update Pages', 'Update Pages', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(108, 'pages-delete', 'Delete Pages', 'Delete Pages', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(109, 'settings-create', 'Create Settings', 'Create Settings', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(110, 'settings-read', 'Read Settings', 'Read Settings', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(111, 'settings-update', 'Update Settings', 'Update Settings', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(112, 'settings-delete', 'Delete Settings', 'Delete Settings', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(113, 'reports-create', 'Create Reports', 'Create Reports', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(114, 'reports-read', 'Read Reports', 'Read Reports', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(115, 'reports-update', 'Update Reports', 'Update Reports', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(116, 'reports-delete', 'Delete Reports', 'Delete Reports', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(117, 'notifications-create', 'Create Notifications', 'Create Notifications', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(118, 'notifications-read', 'Read Notifications', 'Read Notifications', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(119, 'notifications-update', 'Update Notifications', 'Update Notifications', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(120, 'notifications-delete', 'Delete Notifications', 'Delete Notifications', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(121, 'area-read', 'Read Area', 'Read Area', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(122, 'colors-create', 'Create Colors', 'Create Colors', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(123, 'colors-read', 'Read Colors', 'Read Colors', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(124, 'colors-update', 'Update Colors', 'Update Colors', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(125, 'colors-delete', 'Delete Colors', 'Delete Colors', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(126, 'sizes-create', 'Create Sizes', 'Create Sizes', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(127, 'sizes-read', 'Read Sizes', 'Read Sizes', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(128, 'sizes-update', 'Update Sizes', 'Update Sizes', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(129, 'sizes-delete', 'Delete Sizes', 'Delete Sizes', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(130, 'shipping-create', 'Create Shipping', 'Create Shipping', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(131, 'shipping-read', 'Read Shipping', 'Read Shipping', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(132, 'shipping-update', 'Update Shipping', 'Update Shipping', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(133, 'shipping-delete', 'Delete Shipping', 'Delete Shipping', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(134, 'digital_cart-create', 'Create Digital_cart', 'Create Digital_cart', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(135, 'digital_cart-read', 'Read Digital_cart', 'Read Digital_cart', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(136, 'digital_cart-update', 'Update Digital_cart', 'Update Digital_cart', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(137, 'digital_cart-delete', 'Delete Digital_cart', 'Delete Digital_cart', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(138, 'become_vendor-create', 'Create Become_vendor', 'Create Become_vendor', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(139, 'become_vendor-read', 'Read Become_vendor', 'Read Become_vendor', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(140, 'become_vendor-update', 'Update Become_vendor', 'Update Become_vendor', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(141, 'become_vendor-delete', 'Delete Become_vendor', 'Delete Become_vendor', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(142, 'hall_request-create', 'Create Hall_request', 'Create Hall_request', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(143, 'hall_request-read', 'Read Hall_request', 'Read Hall_request', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(144, 'hall_request-update', 'Update Hall_request', 'Update Hall_request', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(145, 'hall_request-delete', 'Delete Hall_request', 'Delete Hall_request', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(146, 'product_request-create', 'Create Product_request', 'Create Product_request', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(147, 'product_request-read', 'Read Product_request', 'Read Product_request', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(148, 'product_request-update', 'Update Product_request', 'Update Product_request', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(149, 'product_request-delete', 'Delete Product_request', 'Delete Product_request', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(150, 'occasion-create', 'Create Occasion', 'Create Occasion', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(151, 'occasion-read', 'Read Occasion', 'Read Occasion', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(152, 'occasion-update', 'Update Occasion', 'Update Occasion', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(153, 'occasion-delete', 'Delete Occasion', 'Delete Occasion', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(154, 'with-darw-create', 'Create With-darw', 'Create With-darw', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(155, 'with-darw-read', 'Read With-darw', 'Read With-darw', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(156, 'with-darw-update', 'Update With-darw', 'Update With-darw', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(157, 'with-darw-delete', 'Delete With-darw', 'Delete With-darw', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(158, 'my-advertisements-read', 'Read My-advertisements', 'Read My-advertisements', '2023-06-04 16:08:57', '2023-06-04 16:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
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
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(53, 52, 'App\\Models\\Admin'),
(54, 52, 'App\\Models\\Admin'),
(55, 52, 'App\\Models\\Admin'),
(56, 52, 'App\\Models\\Admin'),
(62, 52, 'App\\Models\\Admin'),
(63, 52, 'App\\Models\\Admin'),
(64, 52, 'App\\Models\\Admin'),
(65, 52, 'App\\Models\\Admin'),
(66, 52, 'App\\Models\\Admin'),
(67, 52, 'App\\Models\\Admin'),
(68, 52, 'App\\Models\\Admin'),
(69, 52, 'App\\Models\\Admin'),
(70, 52, 'App\\Models\\Admin'),
(71, 52, 'App\\Models\\Admin'),
(72, 52, 'App\\Models\\Admin'),
(155, 52, 'App\\Models\\Admin'),
(53, 53, 'App\\Models\\Admin'),
(54, 53, 'App\\Models\\Admin'),
(55, 53, 'App\\Models\\Admin'),
(56, 53, 'App\\Models\\Admin'),
(62, 53, 'App\\Models\\Admin'),
(63, 53, 'App\\Models\\Admin'),
(64, 53, 'App\\Models\\Admin'),
(65, 53, 'App\\Models\\Admin'),
(66, 53, 'App\\Models\\Admin'),
(67, 53, 'App\\Models\\Admin'),
(68, 53, 'App\\Models\\Admin'),
(69, 53, 'App\\Models\\Admin'),
(70, 53, 'App\\Models\\Admin'),
(71, 53, 'App\\Models\\Admin'),
(72, 53, 'App\\Models\\Admin'),
(155, 53, 'App\\Models\\Admin'),
(21, 54, 'App\\Models\\Admin'),
(22, 54, 'App\\Models\\Admin'),
(23, 54, 'App\\Models\\Admin'),
(24, 54, 'App\\Models\\Admin'),
(25, 54, 'App\\Models\\Admin'),
(26, 54, 'App\\Models\\Admin'),
(27, 54, 'App\\Models\\Admin'),
(28, 54, 'App\\Models\\Admin'),
(29, 54, 'App\\Models\\Admin'),
(30, 54, 'App\\Models\\Admin'),
(31, 54, 'App\\Models\\Admin'),
(32, 54, 'App\\Models\\Admin'),
(33, 54, 'App\\Models\\Admin'),
(34, 54, 'App\\Models\\Admin'),
(35, 54, 'App\\Models\\Admin'),
(36, 54, 'App\\Models\\Admin'),
(37, 54, 'App\\Models\\Admin'),
(38, 54, 'App\\Models\\Admin'),
(39, 54, 'App\\Models\\Admin'),
(40, 54, 'App\\Models\\Admin'),
(41, 54, 'App\\Models\\Admin'),
(42, 54, 'App\\Models\\Admin'),
(43, 54, 'App\\Models\\Admin'),
(44, 54, 'App\\Models\\Admin'),
(45, 54, 'App\\Models\\Admin'),
(46, 54, 'App\\Models\\Admin'),
(47, 54, 'App\\Models\\Admin'),
(48, 54, 'App\\Models\\Admin'),
(65, 54, 'App\\Models\\Admin'),
(66, 54, 'App\\Models\\Admin'),
(67, 54, 'App\\Models\\Admin'),
(68, 54, 'App\\Models\\Admin'),
(69, 54, 'App\\Models\\Admin'),
(70, 54, 'App\\Models\\Admin'),
(71, 54, 'App\\Models\\Admin'),
(72, 54, 'App\\Models\\Admin'),
(142, 54, 'App\\Models\\Admin'),
(143, 54, 'App\\Models\\Admin'),
(145, 54, 'App\\Models\\Admin'),
(155, 54, 'App\\Models\\Admin'),
(21, 55, 'App\\Models\\Admin'),
(22, 55, 'App\\Models\\Admin'),
(23, 55, 'App\\Models\\Admin'),
(24, 55, 'App\\Models\\Admin'),
(25, 55, 'App\\Models\\Admin'),
(26, 55, 'App\\Models\\Admin'),
(27, 55, 'App\\Models\\Admin'),
(28, 55, 'App\\Models\\Admin'),
(29, 55, 'App\\Models\\Admin'),
(30, 55, 'App\\Models\\Admin'),
(31, 55, 'App\\Models\\Admin'),
(32, 55, 'App\\Models\\Admin'),
(33, 55, 'App\\Models\\Admin'),
(34, 55, 'App\\Models\\Admin'),
(35, 55, 'App\\Models\\Admin'),
(36, 55, 'App\\Models\\Admin'),
(37, 55, 'App\\Models\\Admin'),
(38, 55, 'App\\Models\\Admin'),
(39, 55, 'App\\Models\\Admin'),
(40, 55, 'App\\Models\\Admin'),
(41, 55, 'App\\Models\\Admin'),
(42, 55, 'App\\Models\\Admin'),
(43, 55, 'App\\Models\\Admin'),
(44, 55, 'App\\Models\\Admin'),
(45, 55, 'App\\Models\\Admin'),
(46, 55, 'App\\Models\\Admin'),
(47, 55, 'App\\Models\\Admin'),
(48, 55, 'App\\Models\\Admin'),
(65, 55, 'App\\Models\\Admin'),
(66, 55, 'App\\Models\\Admin'),
(67, 55, 'App\\Models\\Admin'),
(68, 55, 'App\\Models\\Admin'),
(69, 55, 'App\\Models\\Admin'),
(70, 55, 'App\\Models\\Admin'),
(71, 55, 'App\\Models\\Admin'),
(72, 55, 'App\\Models\\Admin'),
(142, 55, 'App\\Models\\Admin'),
(143, 55, 'App\\Models\\Admin'),
(145, 55, 'App\\Models\\Admin'),
(155, 55, 'App\\Models\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `permission_users`
--

CREATE TABLE `permission_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 501, 'access_token', 'd0947a8951151f2e14174ab5be00d053b24b353d8798722fafb1bdc1a3a5547e', '[\"*\"]', NULL, NULL, '2023-06-05 06:39:05', '2023-06-05 06:39:05'),
(2, 'App\\Models\\User', 501, 'access_token', '8bf07773222a352d48e68b7c08a6950aa3f5ddb280adc34750d921466455b534', '[\"*\"]', '2023-06-05 10:58:34', NULL, '2023-06-05 06:39:20', '2023-06-05 10:58:34'),
(3, 'App\\Models\\User', 501, 'access_token', '1244eab9e15dd8df1e990bb88f1543bec8dbd50bac98032318670c6a31b2cff1', '[\"*\"]', '2023-06-05 13:03:54', NULL, '2023-06-05 13:03:02', '2023-06-05 13:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extras_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extras_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limitation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fake_price` double(8,2) DEFAULT NULL,
  `real_price` double(8,2) DEFAULT NULL,
  `offer_end_at` date DEFAULT NULL,
  `stock` bigint(20) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `accept` enum('accepted','rejected','new') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `in_stock` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `primary_image`, `details_ar`, `details_en`, `features_ar`, `features_en`, `instructions_ar`, `instructions_en`, `summary_ar`, `summary_en`, `extras_ar`, `extras_en`, `model_number`, `limitation`, `fake_price`, `real_price`, `offer_end_at`, `stock`, `status`, `accept`, `in_stock`, `admin_id`, `category_id`, `vendor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'تيشيرت بولو', 'Polo T-shirt', 'تيشيرت-بولو', 'polo-t-shirt', 'قميص بولو أو قميص تنس أو قميص جولف أو قميص تشوكر [1] هو شكل من أشكال القميص ذو الياقة. عادة ما تكون قمصان البولو قصيرة الأكمام ولكن يمكن أن تكون طويلة ؛ تم استخدامها من قبل لاعبي البولو في الأصل في الهند عام 1859 وفي بريطانيا العظمى خلال عشرينيات القرن الماضي.\r\n\r\nعادة ما تكون قمصان البولو مصنوعة من القطن المحبوك (بدلاً من القماش المنسوج) ، وعادةً ما تكون محبوكة من البيكيه ، أو أقل شيوعًا من التريكو المتشابك (هذا الأخير يستخدم بشكل متكرر ، وإن لم يكن حصريًا ، مع بولو قطن بيما) ، أو باستخدام ألياف أخرى مثل الحرير ، صوف أو ألياف تركيبية أو مزيج من ألياف طبيعية وصناعية. يُطلق على نسخة بطول الفستان من القميص فستان بولو. [3]', 'A polo shirt, tennis shirt, golf shirt, or chukker shirt[1] is a form of shirt with a collar. Polo shirts are usually short sleeved but can be long; they were used by polo players originally in India in 1859 and in Great Britain during the 1920s.[2]\r\n\r\nPolo shirts are usually made of knitted cotton (rather than woven cloth), usually a piqué knit, or less commonly an interlock knit (the latter used frequently, though not exclusively, with pima cotton polos), or using other fibers such as silk, wool, synthetic fibers, or blends of natural and synthetic fibers. A dress-length version of the shirt is called a polo dress.[3]', 'قميص بولو أو قميص تنس أو قميص جولف أو قميص تشوكر [1] هو شكل من أشكال القميص ذو الياقة. عادة ما تكون قمصان البولو قصيرة الأكمام ولكن يمكن أن تكون طويلة ؛ تم استخدامها من قبل لاعبي البولو في الأصل في الهند عام 1859 وفي بريطانيا العظمى خلال عشرينيات القرن الماضي.\r\n\r\nعادة ما تكون قمصان البولو مصنوعة من القطن المحبوك (بدلاً من القماش المنسوج) ، وعادةً ما تكون محبوكة من البيكيه ، أو أقل شيوعًا من التريكو المتشابك (هذا الأخير يستخدم بشكل متكرر ، وإن لم يكن حصريًا ، مع بولو قطن بيما) ، أو باستخدام ألياف أخرى مثل الحرير ، صوف أو ألياف تركيبية أو مزيج من ألياف طبيعية وصناعية. يُطلق على نسخة بطول الفستان من القميص فستان بولو. [3]', 'A polo shirt, tennis shirt, golf shirt, or chukker shirt[1] is a form of shirt with a collar. Polo shirts are usually short sleeved but can be long; they were used by polo players originally in India in 1859 and in Great Britain during the 1920s.[2]\r\n\r\nPolo shirts are usually made of knitted cotton (rather than woven cloth), usually a piqué knit, or less commonly an interlock knit (the latter used frequently, though not exclusively, with pima cotton polos), or using other fibers such as silk, wool, synthetic fibers, or blends of natural and synthetic fibers. A dress-length version of the shirt is called a polo dress.[3]', 'cZIACUQEvzTTWOQy40RLbJ8vZJsxPjCUe27rgwvb.jpg', '<p>قميص بولو أو قميص تنس أو قميص جولف أو قميص تشوكر [1] هو شكل من أشكال القميص ذو الياقة. عادة ما تكون قمصان البولو قصيرة الأكمام ولكن يمكن أن تكون طويلة ؛ تم استخدامها من قبل لاعبي البولو في الأصل في الهند عام 1859 وفي بريطانيا العظمى خلال عشرينيات القرن الماضي.</p><p>عادة ما تكون قمصان البولو مصنوعة من القطن المحبوك (بدلاً من القماش المنسوج) ، وعادةً ما تكون محبوكة من البيكيه ، أو أقل شيوعًا من التريكو المتشابك (هذا الأخير يستخدم بشكل متكرر ، وإن لم يكن حصريًا ، مع بولو قطن بيما) ، أو باستخدام ألياف أخرى مثل الحرير ، صوف أو ألياف تركيبية أو مزيج من ألياف طبيعية وصناعية. يُطلق على نسخة بطول الفستان من القميص فستان بولو. [3]</p>', '<p>A <strong>polo shirt</strong>, <strong>tennis shirt</strong>, <strong>golf shirt</strong>, or <strong>chukker shirt</strong><a href=\"https://en.wikipedia.org/wiki/Polo_shirt#cite_note-1\">[1]</a> is a form of shirt with a collar. Polo shirts are usually short sleeved but can be long; they were used by <a href=\"https://en.wikipedia.org/wiki/Polo#Players\">polo players</a> originally in <a href=\"https://en.wikipedia.org/wiki/India\">India</a> in 1859 and in <a href=\"https://en.wikipedia.org/wiki/Great_Britain\">Great Britain</a> during the 1920s.<a href=\"https://en.wikipedia.org/wiki/Polo_shirt#cite_note-2\">[2]</a></p><p>Polo shirts are usually made of <a href=\"https://en.wikipedia.org/wiki/Knitted_fabric\">knitted</a> <a href=\"https://en.wikipedia.org/wiki/Cotton\">cotton</a> (rather than <a href=\"https://en.wikipedia.org/wiki/Woven\">woven</a> cloth), usually a <a href=\"https://en.wikipedia.org/wiki/Piqu%C3%A9_(weaving)\">piqué</a> knit, or less commonly an <a href=\"https://en.wikipedia.org/wiki/Jersey_(fabric)\">interlock</a> knit (the latter used frequently, though not exclusively, with <a href=\"https://en.wikipedia.org/wiki/Gossypium_barbadense\">pima cotton</a> polos), or using other fibers such as <a href=\"https://en.wikipedia.org/wiki/Silk\">silk</a>, <a href=\"https://en.wikipedia.org/wiki/Wool\">wool</a>, <a href=\"https://en.wikipedia.org/wiki/Synthetic_fiber\">synthetic fibers</a>, or blends of natural and synthetic fibers. A <a href=\"https://en.wikipedia.org/wiki/Dress\">dress</a>-length version of the shirt is called a <strong>polo dress</strong>.<a href=\"https://en.wikipedia.org/wiki/Polo_shirt#cite_note-3\">[3]</a></p>', 'قميص بولو أو قميص تنس أو قميص جولف أو قميص تشوكر [1] هو شكل من أشكال القميص ذو الياقة. عادة ما تكون قمصان البولو قصيرة الأكمام ولكن يمكن أن تكون طويلة ؛ تم استخدامها من قبل لاعبي البولو في الأصل في الهند عام 1859 وفي بريطانيا العظمى خلال عشرينيات القرن الماضي.\r\n\r\nعادة ما تكون قمصان البولو مصنوعة من القطن المحبوك (بدلاً من القماش المنسوج) ، وعادةً ما تكون محبوكة من البيكيه ، أو أقل شيوعًا من التريكو المتشابك (هذا الأخير يستخدم بشكل متكرر ، وإن لم يكن حصريًا ، مع بولو قطن بيما) ، أو باستخدام ألياف أخرى مثل الحرير ، صوف أو ألياف تركيبية أو مزيج من ألياف طبيعية وصناعية. يُطلق على نسخة بطول الفستان من القميص فستان بولو. [3]', 'A polo shirt, tennis shirt, golf shirt, or chukker shirt[1] is a form of shirt with a collar. Polo shirts are usually short sleeved but can be long; they were used by polo players originally in India in 1859 and in Great Britain during the 1920s.[2]\r\n\r\nPolo shirts are usually made of knitted cotton (rather than woven cloth), usually a piqué knit, or less commonly an interlock knit (the latter used frequently, though not exclusively, with pima cotton polos), or using other fibers such as silk, wool, synthetic fibers, or blends of natural and synthetic fibers. A dress-length version of the shirt is called a polo dress.[3]', 'قميص بولو أو قميص تنس أو قميص جولف أو قميص تشوكر [1] هو شكل من أشكال القميص ذو الياقة. عادة ما تكون قمصان البولو قصيرة الأكمام ولكن يمكن أن تكون طويلة ؛ تم استخدامها من قبل لاعبي البولو في الأصل في الهند عام 1859 وفي بريطانيا العظمى خلال عشرينيات القرن الماضي.\r\n\r\nعادة ما تكون قمصان البولو مصنوعة من القطن المحبوك (بدلاً من القماش المنسوج) ، وعادةً ما تكون محبوكة من البيكيه ، أو أقل شيوعًا من التريكو المتشابك (هذا الأخير يستخدم بشكل متكرر ، وإن لم يكن حصريًا ، مع بولو قطن بيما) ، أو باستخدام ألياف أخرى مثل الحرير ، صوف أو ألياف تركيبية أو مزيج من ألياف طبيعية وصناعية. يُطلق على نسخة بطول الفستان من القميص فستان بولو. [3]', 'A polo shirt, tennis shirt, golf shirt, or chukker shirt[1] is a form of shirt with a collar. Polo shirts are usually short sleeved but can be long; they were used by polo players originally in India in 1859 and in Great Britain during the 1920s.[2]\r\n\r\nPolo shirts are usually made of knitted cotton (rather than woven cloth), usually a piqué knit, or less commonly an interlock knit (the latter used frequently, though not exclusively, with pima cotton polos), or using other fibers such as silk, wool, synthetic fibers, or blends of natural and synthetic fibers. A dress-length version of the shirt is called a polo dress.[3]', 'قميص بولو أو قميص تنس أو قميص جولف أو قميص تشوكر [1] هو شكل من أشكال القميص ذو الياقة. عادة ما تكون قمصان البولو قصيرة الأكمام ولكن يمكن أن تكون طويلة ؛ تم استخدامها من قبل لاعبي البولو في الأصل في الهند عام 1859 وفي بريطانيا العظمى خلال عشرينيات القرن الماضي.\r\n\r\nعادة ما تكون قمصان البولو مصنوعة من القطن المحبوك (بدلاً من القماش المنسوج) ، وعادةً ما تكون محبوكة من البيكيه ، أو أقل شيوعًا من التريكو المتشابك (هذا الأخير يستخدم بشكل متكرر ، وإن لم يكن حصريًا ، مع بولو قطن بيما) ، أو باستخدام ألياف أخرى مثل الحرير ، صوف أو ألياف تركيبية أو مزيج من ألياف طبيعية وصناعية. يُطلق على نسخة بطول الفستان من القميص فستان بولو. [3]', 'A polo shirt, tennis shirt, golf shirt, or chukker shirt[1] is a form of shirt with a collar. Polo shirts are usually short sleeved but can be long; they were used by polo players originally in India in 1859 and in Great Britain during the 1920s.[2]\r\n\r\nPolo shirts are usually made of knitted cotton (rather than woven cloth), usually a piqué knit, or less commonly an interlock knit (the latter used frequently, though not exclusively, with pima cotton polos), or using other fibers such as silk, wool, synthetic fibers, or blends of natural and synthetic fibers. A dress-length version of the shirt is called a polo dress.[3]', 'قميص بولو أو قميص تنس أو قميص جولف أو قميص تشوكر [1] هو شكل من أشكال القميص ذو الياقة. عادة ما تكون قمصان البولو قصيرة الأكمام ولكن يمكن أن تكون طويلة ؛ تم استخدامها من قبل لاعبي البولو في الأصل في الهند عام 1859 وفي بريطانيا العظمى خلال عشرينيات القرن الماضي.\r\n\r\nعادة ما تكون قمصان البولو مصنوعة من القطن المحبوك (بدلاً من القماش المنسوج) ، وعادةً ما تكون محبوكة من البيكيه ، أو أقل شيوعًا من التريكو المتشابك (هذا الأخير يستخدم بشكل متكرر ، وإن لم يكن حصريًا ، مع بولو قطن بيما) ، أو باستخدام ألياف أخرى مثل الحرير ، صوف أو ألياف تركيبية أو مزيج من ألياف طبيعية وصناعية. يُطلق على نسخة بطول الفستان من القميص فستان بولو. [3]', 'A polo shirt, tennis shirt, golf shirt, or chukker shirt[1] is a form of shirt with a collar. Polo shirts are usually short sleeved but can be long; they were used by polo players originally in India in 1859 and in Great Britain during the 1920s.[2]\r\n\r\nPolo shirts are usually made of knitted cotton (rather than woven cloth), usually a piqué knit, or less commonly an interlock knit (the latter used frequently, though not exclusively, with pima cotton polos), or using other fibers such as silk, wool, synthetic fibers, or blends of natural and synthetic fibers. A dress-length version of the shirt is called a polo dress.[3]', 'm1', '12', 1100.00, 1000.00, '2023-07-08', 99, '1', 'accepted', '1', 7, 1, NULL, '2023-06-04 17:06:59', '2023-06-05 10:32:19', NULL),
(2, 'بناطيل الكارجو', 'cargo panatlon', 'بناطيل-الكارجو', 'cargo-panatlon', 'بنطال الحمولة مثل باقي السراويل العادية الخاكية ولكنه تم تصميمها من أجل أن تتناسب مع الأعمال الصعبة الخارجية . تتصف بأنها فضفاضة بحيث تسمح بحرية الحركة وتمت خياطتها بطريقة صعبة وحزام كبير وجيوب كثيرة إضافية .\r\n\r\nبنطال الحمولة مطوية من الجانبين من أجل زيادة السعة . تستخدم مثل هذا النوع في معارك القتال أو للصيد من أجل حمل الخرائط في الجيوب والبوصلات وباقي الأدوات .\r\n\r\nالبنطال مصنوع عادة من القماش الذي يهدف إلى إتاحة الفرصة للركبة والفخذ في الانثناء من دون احتكاك . أحيانا يتم وضع فتحة للتهوية عند الركبة .\r\n\r\nبنطال الحمولة يشبه سروال الحمولة . بعض الأنواع تكون قصيرة وبعضها طويلة حسب الأجواء والطقس . هذا النوع مفيد للمتنزهين والسياح العالميين .\r\n\r\nبدأ بنطال الحمولة في الانتشار اعتبارا من بدايات حقبة الثمانينات من القرن العشرين في أوروبا . بنطال الحمولة يحمل النظرة العسكرية بشكله المريح، الظل المعكوس، الاتساع في منطقة الحوض، وضيق عند الكاحل . الجيوب إما أن تكون عند منطقة الحوض أو/و على جانب الرجل عند الفخذ .', 'Cargo pants or cargo trousers, also sometimes called combat pants or combat trousers after their original purpose as military workwear,[1][2] are loosely cut pants originally designed for rough work environments and outdoor activities, distinguished by numerous large utility pockets for carrying tools.\r\n\r\nCargo shorts are a shorts version of the cargo pants, with the legs usually extending down to near-knee lengths.\r\n\r\nBoth cargo pants and shorts have since become popular as urban casual wear, since they are loose-fitting and quite convenient for carrying extra items during everyday foot trips or while cycling.', 'بنطال الحمولة مثل باقي السراويل العادية الخاكية ولكنه تم تصميمها من أجل أن تتناسب مع الأعمال الصعبة الخارجية . تتصف بأنها فضفاضة بحيث تسمح بحرية الحركة وتمت خياطتها بطريقة صعبة وحزام كبير وجيوب كثيرة إضافية .\r\n\r\nبنطال الحمولة مطوية من الجانبين من أجل زيادة السعة . تستخدم مثل هذا النوع في معارك القتال أو للصيد من أجل حمل الخرائط في الجيوب والبوصلات وباقي الأدوات .\r\n\r\nالبنطال مصنوع عادة من القماش الذي يهدف إلى إتاحة الفرصة للركبة والفخذ في الانثناء من دون احتكاك . أحيانا يتم وضع فتحة للتهوية عند الركبة .\r\n\r\nبنطال الحمولة يشبه سروال الحمولة . بعض الأنواع تكون قصيرة وبعضها طويلة حسب الأجواء والطقس . هذا النوع مفيد للمتنزهين والسياح العالميين .\r\n\r\nبدأ بنطال الحمولة في الانتشار اعتبارا من بدايات حقبة الثمانينات من القرن العشرين في أوروبا . بنطال الحمولة يحمل النظرة العسكرية بشكله المريح، الظل المعكوس، الاتساع في منطقة الحوض، وضيق عند الكاحل . الجيوب إما أن تكون عند منطقة الحوض أو/و على جانب الرجل عند الفخذ .', 'Cargo pants or cargo trousers, also sometimes called combat pants or combat trousers after their original purpose as military workwear,[1][2] are loosely cut pants originally designed for rough work environments and outdoor activities, distinguished by numerous large utility pockets for carrying tools.\r\n\r\nCargo shorts are a shorts version of the cargo pants, with the legs usually extending down to near-knee lengths.\r\n\r\nBoth cargo pants and shorts have since become popular as urban casual wear, since they are loose-fitting and quite convenient for carrying extra items during everyday foot trips or while cycling.', 'fxdBAvFMJbZtg5pZ9832E1xjq6X4fhB48P0C0abm.jpg', '<p><strong>بنطال الحمولة</strong> مثل باقي السراويل العادية الخاكية ولكنه تم تصميمها من أجل أن تتناسب مع الأعمال الصعبة الخارجية .<a href=\"https://ar.wikipedia.org/wiki/%D8%A8%D9%86%D8%B7%D8%A7%D9%84_%D8%AD%D9%85%D9%88%D9%84%D8%A9#cite_note-1\">[1]</a><a href=\"https://ar.wikipedia.org/wiki/%D8%A8%D9%86%D8%B7%D8%A7%D9%84_%D8%AD%D9%85%D9%88%D9%84%D8%A9#cite_note-2\">[2]</a> تتصف بأنها فضفاضة بحيث تسمح بحرية الحركة وتمت خياطتها بطريقة صعبة وحزام كبير وجيوب كثيرة إضافية .</p><p>بنطال الحمولة مطوية من الجانبين من أجل زيادة السعة . تستخدم مثل هذا النوع في معارك القتال أو للصيد من أجل حمل الخرائط في الجيوب <a href=\"https://ar.wikipedia.org/wiki/%D8%A8%D9%88%D8%B5%D9%84%D8%A9\">والبوصلات</a> وباقي الأدوات .</p><p><a href=\"https://ar.wikipedia.org/wiki/%D8%A8%D9%86%D8%B7%D8%A7%D9%84\">البنطال</a> مصنوع عادة من القماش الذي يهدف إلى إتاحة الفرصة للركبة والفخذ في الانثناء من دون احتكاك . أحيانا يتم وضع فتحة للتهوية عند <a href=\"https://ar.wikipedia.org/wiki/%D8%B1%D9%83%D8%A8%D8%A9\">الركبة</a> .</p><p>بنطال الحمولة يشبه سروال الحمولة . بعض الأنواع تكون قصيرة وبعضها طويلة حسب الأجواء والطقس . هذا النوع مفيد للمتنزهين والسياح العالميين .</p><p>بدأ بنطال الحمولة في الانتشار اعتبارا من بدايات حقبة الثمانينات من القرن العشرين في أوروبا . بنطال الحمولة يحمل النظرة العسكرية بشكله المريح، الظل المعكوس، الاتساع في منطقة الحوض، وضيق عند الكاحل . الجيوب إما أن تكون عند منطقة الحوض أو/و على جانب الرجل عند الفخذ .</p>', '<p><strong>Cargo pants</strong> or <strong>cargo trousers</strong>, also sometimes called <strong>combat pants</strong> or <strong>combat trousers</strong> after their original purpose as <a href=\"https://en.wikipedia.org/wiki/Combat_uniform\">military workwear</a>,<a href=\"https://en.wikipedia.org/wiki/Cargo_pants#cite_note-1\">[1]</a><a href=\"https://en.wikipedia.org/wiki/Cargo_pants#cite_note-Hancock2013-2\">[2]</a> are loosely cut <a href=\"https://en.wikipedia.org/wiki/Pants\">pants</a> originally designed for rough work environments and outdoor activities, distinguished by numerous large utility <a href=\"https://en.wikipedia.org/wiki/Pocket\">pockets</a> for carrying <a href=\"https://en.wikipedia.org/wiki/Tool\">tools</a>.</p><p><strong>Cargo shorts</strong> are a <a href=\"https://en.wikipedia.org/wiki/Shorts\">shorts</a> version of the cargo pants, with the legs usually extending down to near-<a href=\"https://en.wikipedia.org/wiki/Knee\">knee</a> lengths.</p><p>Both cargo pants and shorts have since become popular as <a href=\"https://en.wikipedia.org/wiki/Urban_culture\">urban</a> <a href=\"https://en.wikipedia.org/wiki/Casual_wear\">casual wear</a>, since they are loose-fitting and quite convenient for carrying extra items during everyday foot trips or while <a href=\"https://en.wikipedia.org/wiki/Cycling\">cycling</a>.</p>', 'بنطال الحمولة مثل باقي السراويل العادية الخاكية ولكنه تم تصميمها من أجل أن تتناسب مع الأعمال الصعبة الخارجية . تتصف بأنها فضفاضة بحيث تسمح بحرية الحركة وتمت خياطتها بطريقة صعبة وحزام كبير وجيوب كثيرة إضافية .\r\n\r\nبنطال الحمولة مطوية من الجانبين من أجل زيادة السعة . تستخدم مثل هذا النوع في معارك القتال أو للصيد من أجل حمل الخرائط في الجيوب والبوصلات وباقي الأدوات .\r\n\r\nالبنطال مصنوع عادة من القماش الذي يهدف إلى إتاحة الفرصة للركبة والفخذ في الانثناء من دون احتكاك . أحيانا يتم وضع فتحة للتهوية عند الركبة .\r\n\r\nبنطال الحمولة يشبه سروال الحمولة . بعض الأنواع تكون قصيرة وبعضها طويلة حسب الأجواء والطقس . هذا النوع مفيد للمتنزهين والسياح العالميين .\r\n\r\nبدأ بنطال الحمولة في الانتشار اعتبارا من بدايات حقبة الثمانينات من القرن العشرين في أوروبا . بنطال الحمولة يحمل النظرة العسكرية بشكله المريح، الظل المعكوس، الاتساع في منطقة الحوض، وضيق عند الكاحل . الجيوب إما أن تكون عند منطقة الحوض أو/و على جانب الرجل عند الفخذ .', 'Cargo pants or cargo trousers, also sometimes called combat pants or combat trousers after their original purpose as military workwear,[1][2] are loosely cut pants originally designed for rough work environments and outdoor activities, distinguished by numerous large utility pockets for carrying tools.\r\n\r\nCargo shorts are a shorts version of the cargo pants, with the legs usually extending down to near-knee lengths.\r\n\r\nBoth cargo pants and shorts have since become popular as urban casual wear, since they are loose-fitting and quite convenient for carrying extra items during everyday foot trips or while cycling.', 'بنطال الحمولة مثل باقي السراويل العادية الخاكية ولكنه تم تصميمها من أجل أن تتناسب مع الأعمال الصعبة الخارجية . تتصف بأنها فضفاضة بحيث تسمح بحرية الحركة وتمت خياطتها بطريقة صعبة وحزام كبير وجيوب كثيرة إضافية .\r\n\r\nبنطال الحمولة مطوية من الجانبين من أجل زيادة السعة . تستخدم مثل هذا النوع في معارك القتال أو للصيد من أجل حمل الخرائط في الجيوب والبوصلات وباقي الأدوات .\r\n\r\nالبنطال مصنوع عادة من القماش الذي يهدف إلى إتاحة الفرصة للركبة والفخذ في الانثناء من دون احتكاك . أحيانا يتم وضع فتحة للتهوية عند الركبة .\r\n\r\nبنطال الحمولة يشبه سروال الحمولة . بعض الأنواع تكون قصيرة وبعضها طويلة حسب الأجواء والطقس . هذا النوع مفيد للمتنزهين والسياح العالميين .\r\n\r\nبدأ بنطال الحمولة في الانتشار اعتبارا من بدايات حقبة الثمانينات من القرن العشرين في أوروبا . بنطال الحمولة يحمل النظرة العسكرية بشكله المريح، الظل المعكوس، الاتساع في منطقة الحوض، وضيق عند الكاحل . الجيوب إما أن تكون عند منطقة الحوض أو/و على جانب الرجل عند الفخذ .', 'Cargo pants or cargo trousers, also sometimes called combat pants or combat trousers after their original purpose as military workwear,[1][2] are loosely cut pants originally designed for rough work environments and outdoor activities, distinguished by numerous large utility pockets for carrying tools.\r\n\r\nCargo shorts are a shorts version of the cargo pants, with the legs usually extending down to near-knee lengths.\r\n\r\nBoth cargo pants and shorts have since become popular as urban casual wear, since they are loose-fitting and quite convenient for carrying extra items during everyday foot trips or while cycling.', 'بنطال الحمولة مثل باقي السراويل العادية الخاكية ولكنه تم تصميمها من أجل أن تتناسب مع الأعمال الصعبة الخارجية . تتصف بأنها فضفاضة بحيث تسمح بحرية الحركة وتمت خياطتها بطريقة صعبة وحزام كبير وجيوب كثيرة إضافية .\r\n\r\nبنطال الحمولة مطوية من الجانبين من أجل زيادة السعة . تستخدم مثل هذا النوع في معارك القتال أو للصيد من أجل حمل الخرائط في الجيوب والبوصلات وباقي الأدوات .\r\n\r\nالبنطال مصنوع عادة من القماش الذي يهدف إلى إتاحة الفرصة للركبة والفخذ في الانثناء من دون احتكاك . أحيانا يتم وضع فتحة للتهوية عند الركبة .\r\n\r\nبنطال الحمولة يشبه سروال الحمولة . بعض الأنواع تكون قصيرة وبعضها طويلة حسب الأجواء والطقس . هذا النوع مفيد للمتنزهين والسياح العالميين .\r\n\r\nبدأ بنطال الحمولة في الانتشار اعتبارا من بدايات حقبة الثمانينات من القرن العشرين في أوروبا . بنطال الحمولة يحمل النظرة العسكرية بشكله المريح، الظل المعكوس، الاتساع في منطقة الحوض، وضيق عند الكاحل . الجيوب إما أن تكون عند منطقة الحوض أو/و على جانب الرجل عند الفخذ .', 'Cargo pants or cargo trousers, also sometimes called combat pants or combat trousers after their original purpose as military workwear,[1][2] are loosely cut pants originally designed for rough work environments and outdoor activities, distinguished by numerous large utility pockets for carrying tools.\r\n\r\nCargo shorts are a shorts version of the cargo pants, with the legs usually extending down to near-knee lengths.\r\n\r\nBoth cargo pants and shorts have since become popular as urban casual wear, since they are loose-fitting and quite convenient for carrying extra items during everyday foot trips or while cycling.', 'بنطال الحمولة مثل باقي السراويل العادية الخاكية ولكنه تم تصميمها من أجل أن تتناسب مع الأعمال الصعبة الخارجية . تتصف بأنها فضفاضة بحيث تسمح بحرية الحركة وتمت خياطتها بطريقة صعبة وحزام كبير وجيوب كثيرة إضافية .\r\n\r\nبنطال الحمولة مطوية من الجانبين من أجل زيادة السعة . تستخدم مثل هذا النوع في معارك القتال أو للصيد من أجل حمل الخرائط في الجيوب والبوصلات وباقي الأدوات .\r\n\r\nالبنطال مصنوع عادة من القماش الذي يهدف إلى إتاحة الفرصة للركبة والفخذ في الانثناء من دون احتكاك . أحيانا يتم وضع فتحة للتهوية عند الركبة .\r\n\r\nبنطال الحمولة يشبه سروال الحمولة . بعض الأنواع تكون قصيرة وبعضها طويلة حسب الأجواء والطقس . هذا النوع مفيد للمتنزهين والسياح العالميين .\r\n\r\nبدأ بنطال الحمولة في الانتشار اعتبارا من بدايات حقبة الثمانينات من القرن العشرين في أوروبا . بنطال الحمولة يحمل النظرة العسكرية بشكله المريح، الظل المعكوس، الاتساع في منطقة الحوض، وضيق عند الكاحل . الجيوب إما أن تكون عند منطقة الحوض أو/و على جانب الرجل عند الفخذ .', 'Cargo pants or cargo trousers, also sometimes called combat pants or combat trousers after their original purpose as military workwear,[1][2] are loosely cut pants originally designed for rough work environments and outdoor activities, distinguished by numerous large utility pockets for carrying tools.\r\n\r\nCargo shorts are a shorts version of the cargo pants, with the legs usually extending down to near-knee lengths.\r\n\r\nBoth cargo pants and shorts have since become popular as urban casual wear, since they are loose-fitting and quite convenient for carrying extra items during everyday foot trips or while cycling.', 'm12', '12', 1300.00, 1200.00, '2023-07-08', 99, '1', 'accepted', '1', 7, 1, NULL, '2023-06-04 17:10:54', '2023-06-05 10:32:19', NULL),
(3, 'شيكولاته كيت كات', 'kitkat chocolate', 'شيكولاته-كيت-كات', 'kitkat-chocolate', 'كيت كات هي قالب شوكولاتة شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة بالشوكولاته، كان أول من انتجها هو مصنع راونتري في يورك، إنجلترا، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة نستله والتي استحوذت على راونتري في عام 1988، إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل شركة هيرشي. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من رقاقات البسكويت، التي تغطيها طبقة خارجية من الشوكولاته. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (بالإنجليزية: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.', 'Kit Kat (stylised as KitKat in various countries) is a chocolate-covered wafer bar confection created by Rowntree\'s of York, United Kingdom, and is now produced globally by Nestlé (which acquired Rowntree\'s in 1988),[1] except in the United States, where it is made under licence by the H. B. Reese Candy Company, a division of the Hershey Company (an agreement Rowntree\'s first made with Hershey in 1970).[2]\r\n\r\nThe standard bars consist of two or four pieces composed of three layers of wafer, separated and covered by an outer layer of chocolate. Each finger can be snapped from the bar separately. There are many flavours of Kit Kat, including milk, white, and dark chocolate.', 'كيت كات هي قالب شوكولاتة شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة بالشوكولاته، كان أول من انتجها هو مصنع راونتري في يورك، إنجلترا، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة نستله والتي استحوذت على راونتري في عام 1988، إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل شركة هيرشي. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من رقاقات البسكويت، التي تغطيها طبقة خارجية من الشوكولاته. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (بالإنجليزية: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.', 'Kit Kat (stylised as KitKat in various countries) is a chocolate-covered wafer bar confection created by Rowntree\'s of York, United Kingdom, and is now produced globally by Nestlé (which acquired Rowntree\'s in 1988),[1] except in the United States, where it is made under licence by the H. B. Reese Candy Company, a division of the Hershey Company (an agreement Rowntree\'s first made with Hershey in 1970).[2]\r\n\r\nThe standard bars consist of two or four pieces composed of three layers of wafer, separated and covered by an outer layer of chocolate. Each finger can be snapped from the bar separately. There are many flavours of Kit Kat, including milk, white, and dark chocolate.', 'MUOii4zI3MRYE21D1ZX1zFFBH1ZfUrmGsqnBjZFJ.jpg', '<p><strong>كيت كات</strong> هي قالب <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9\">شوكولاتة</a> شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9\">بالشوكولاته</a>، كان أول من انتجها هو مصنع <a href=\"https://ar.wikipedia.org/w/index.php?title=%D8%B1%D8%A7%D9%88%D9%86%D8%AA%D8%B1%D9%8A&amp;action=edit&amp;redlink=1\">راونتري</a> في <a href=\"https://ar.wikipedia.org/wiki/%D9%8A%D9%88%D8%B1%D9%83\">يورك</a>، <a href=\"https://ar.wikipedia.org/wiki/%D8%A5%D9%86%D8%AC%D9%84%D8%AA%D8%B1%D8%A7\">إنجلترا</a>، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة <a href=\"https://ar.wikipedia.org/wiki/%D9%86%D8%B3%D8%AA%D9%84%D9%87\">نستله</a> والتي استحوذت على راونتري في عام 1988،<a href=\"https://ar.wikipedia.org/wiki/%D9%83%D9%8A%D8%AA_%D9%83%D8%A7%D8%AA_(%D8%AD%D9%84%D9%88%D9%89)#cite_note-1\">[1]</a> إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D8%B1%D9%83%D8%A9_%D9%87%D9%8A%D8%B1%D8%B4%D9%8A\">شركة هيرشي</a>. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من <a href=\"https://ar.wikipedia.org/w/index.php?title=%D8%B1%D9%82%D8%A7%D9%82%D8%A9_(%D8%A8%D8%B3%D9%83%D9%88%D9%8A%D8%AA)&amp;action=edit&amp;redlink=1\">رقاقات البسكويت</a>، التي تغطيها طبقة خارجية من <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9\">الشوكولاته</a>. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (<a href=\"https://ar.wikipedia.org/wiki/%D8%A7%D9%84%D9%84%D8%BA%D8%A9_%D8%A7%D9%84%D8%A5%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9\">بالإنجليزية</a>: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.</p>', '<p><strong>Kit Kat</strong> (stylised as <strong>KitKat</strong> in various countries) is a <a href=\"https://en.wikipedia.org/wiki/Chocolate\">chocolate</a>-covered <a href=\"https://en.wikipedia.org/wiki/Wafer\">wafer</a> bar <a href=\"https://en.wikipedia.org/wiki/Confectionery\">confection</a> created by <a href=\"https://en.wikipedia.org/wiki/Rowntree%27s\">Rowntree\'s</a> of <a href=\"https://en.wikipedia.org/wiki/York\">York</a>, United Kingdom, and is now produced globally by <a href=\"https://en.wikipedia.org/wiki/Nestl%C3%A9\">Nestlé</a> (which acquired Rowntree\'s in 1988),<a href=\"https://en.wikipedia.org/wiki/Kit_Kat#cite_note-1\">[1]</a> except in the United States, where it is made under <a href=\"https://en.wikipedia.org/wiki/Licence\">licence</a> by the <a href=\"https://en.wikipedia.org/wiki/H._B._Reese\">H. B. Reese Candy Company</a>, a division of the <a href=\"https://en.wikipedia.org/wiki/The_Hershey_Company\">Hershey Company</a> (an agreement Rowntree\'s first made with Hershey in 1970).<a href=\"https://en.wikipedia.org/wiki/Kit_Kat#cite_note-NYTimes-2\">[2]</a></p><p>The standard bars consist of two or four pieces composed of three layers of wafer, separated and covered by an outer layer of chocolate. Each finger can be snapped from the bar separately. There are many flavours of Kit Kat, including milk, white, and <a href=\"https://en.wikipedia.org/wiki/Dark_chocolate\">dark chocolate</a>.</p>', 'كيت كات هي قالب شوكولاتة شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة بالشوكولاته، كان أول من انتجها هو مصنع راونتري في يورك، إنجلترا، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة نستله والتي استحوذت على راونتري في عام 1988، إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل شركة هيرشي. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من رقاقات البسكويت، التي تغطيها طبقة خارجية من الشوكولاته. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (بالإنجليزية: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.', 'Kit Kat (stylised as KitKat in various countries) is a chocolate-covered wafer bar confection created by Rowntree\'s of York, United Kingdom, and is now produced globally by Nestlé (which acquired Rowntree\'s in 1988),[1] except in the United States, where it is made under licence by the H. B. Reese Candy Company, a division of the Hershey Company (an agreement Rowntree\'s first made with Hershey in 1970).[2]\r\n\r\nThe standard bars consist of two or four pieces composed of three layers of wafer, separated and covered by an outer layer of chocolate. Each finger can be snapped from the bar separately. There are many flavours of Kit Kat, including milk, white, and dark chocolate.', 'كيت كات هي قالب شوكولاتة شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة بالشوكولاته، كان أول من انتجها هو مصنع راونتري في يورك، إنجلترا، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة نستله والتي استحوذت على راونتري في عام 1988، إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل شركة هيرشي. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من رقاقات البسكويت، التي تغطيها طبقة خارجية من الشوكولاته. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (بالإنجليزية: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.', 'Kit Kat (stylised as KitKat in various countries) is a chocolate-covered wafer bar confection created by Rowntree\'s of York, United Kingdom, and is now produced globally by Nestlé (which acquired Rowntree\'s in 1988),[1] except in the United States, where it is made under licence by the H. B. Reese Candy Company, a division of the Hershey Company (an agreement Rowntree\'s first made with Hershey in 1970).[2]\r\n\r\nThe standard bars consist of two or four pieces composed of three layers of wafer, separated and covered by an outer layer of chocolate. Each finger can be snapped from the bar separately. There are many flavours of Kit Kat, including milk, white, and dark chocolate.', 'كيت كات هي قالب شوكولاتة شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة بالشوكولاته، كان أول من انتجها هو مصنع راونتري في يورك، إنجلترا، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة نستله والتي استحوذت على راونتري في عام 1988، إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل شركة هيرشي. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من رقاقات البسكويت، التي تغطيها طبقة خارجية من الشوكولاته. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (بالإنجليزية: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.', 'Kit Kat (stylised as KitKat in various countries) is a chocolate-covered wafer bar confection created by Rowntree\'s of York, United Kingdom, and is now produced globally by Nestlé (which acquired Rowntree\'s in 1988),[1] except in the United States, where it is made under licence by the H. B. Reese Candy Company, a division of the Hershey Company (an agreement Rowntree\'s first made with Hershey in 1970).[2]\r\n\r\nThe standard bars consist of two or four pieces composed of three layers of wafer, separated and covered by an outer layer of chocolate. Each finger can be snapped from the bar separately. There are many flavours of Kit Kat, including milk, white, and dark chocolate.', 'كيت كات هي قالب شوكولاتة شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة بالشوكولاته، كان أول من انتجها هو مصنع راونتري في يورك، إنجلترا، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة نستله والتي استحوذت على راونتري في عام 1988، إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل شركة هيرشي. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من رقاقات البسكويت، التي تغطيها طبقة خارجية من الشوكولاته. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (بالإنجليزية: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.', 'Kit Kat (stylised as KitKat in various countries) is a chocolate-covered wafer bar confection created by Rowntree\'s of York, United Kingdom, and is now produced globally by Nestlé (which acquired Rowntree\'s in 1988),[1] except in the United States, where it is made under licence by the H. B. Reese Candy Company, a division of the Hershey Company (an agreement Rowntree\'s first made with Hershey in 1970).[2]\r\n\r\nThe standard bars consist of two or four pieces composed of three layers of wafer, separated and covered by an outer layer of chocolate. Each finger can be snapped from the bar separately. There are many flavours of Kit Kat, including milk, white, and dark chocolate.', 'm13', '12', 120.00, 100.00, '2023-07-05', 99, '1', 'accepted', '1', 8, 2, NULL, '2023-06-04 17:14:23', '2023-06-05 11:01:58', NULL),
(4, 'دايري ميلك', 'Dairy Milk', 'دايري-ميلك', 'dairy-milk', 'شوكلاته كادبوري بالحليب هي إحدى الشركات الحالية المتخصصة بالشوكولاتة بالحليب وتديرها كادبوري، ماعدا في الولايات المتحدة الأمريكية فيتم صنعها في شركة مونديلز العالمية. بدأت في المملكة المتحدة في عام 1905 وتحتوي على عدد من المنتجات فجميع منتجات شوكلاته كادبوري مصنوعة من حليب الشوكلاته الحصري.', 'Cadbury Dairy Milk is a British brand of milk chocolate manufactured by Cadbury. It was introduced in the United Kingdom in June 1905 and now consists of a number of products. Every product in the Dairy Milk line is made with exclusively milk chocolate. In 2014, Dairy Milk was ranked the best-selling chocolate bar in the UK.[1] It is manufactured and distributed by the Hershey Company in the United States under licence from Cadbury.[2] The chocolate is now available in many countries, including China, India, Sri Lanka, Pakistan, the Philippines, Indonesia, Kazakhstan and Bangladesh.', 'شوكلاته كادبوري بالحليب هي إحدى الشركات الحالية المتخصصة بالشوكولاتة بالحليب وتديرها كادبوري، ماعدا في الولايات المتحدة الأمريكية فيتم صنعها في شركة مونديلز العالمية. بدأت في المملكة المتحدة في عام 1905 وتحتوي على عدد من المنتجات فجميع منتجات شوكلاته كادبوري مصنوعة من حليب الشوكلاته الحصري.', 'Cadbury Dairy Milk is a British brand of milk chocolate manufactured by Cadbury. It was introduced in the United Kingdom in June 1905 and now consists of a number of products. Every product in the Dairy Milk line is made with exclusively milk chocolate. In 2014, Dairy Milk was ranked the best-selling chocolate bar in the UK.[1] It is manufactured and distributed by the Hershey Company in the United States under licence from Cadbury.[2] The chocolate is now available in many countries, including China, India, Sri Lanka, Pakistan, the Philippines, Indonesia, Kazakhstan and Bangladesh.', 'Cef8JnpOkzjhQ9GppbTM9Wd72fuNbyjbAozkte1c.jpg', '<p><strong>شوكلاته كادبوري بالحليب</strong> هي إحدى الشركات الحالية المتخصصة بالشوكولاتة بالحليب وتديرها كادبوري، ماعدا في <a href=\"https://ar.wikipedia.org/wiki/%D8%A7%D9%84%D9%88%D9%84%D8%A7%D9%8A%D8%A7%D8%AA_%D8%A7%D9%84%D9%85%D8%AA%D8%AD%D8%AF%D8%A9\">الولايات المتحدة الأمريكية</a> فيتم صنعها في شركة مونديلز العالمية.<a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9_%D9%83%D8%A7%D8%AF%D8%A8%D9%88%D8%B1%D9%8A_%D8%A8%D8%A7%D9%84%D8%AD%D9%84%D9%8A%D8%A8#cite_note-1\">[1]</a><a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9_%D9%83%D8%A7%D8%AF%D8%A8%D9%88%D8%B1%D9%8A_%D8%A8%D8%A7%D9%84%D8%AD%D9%84%D9%8A%D8%A8#cite_note-2\">[2]</a><a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9_%D9%83%D8%A7%D8%AF%D8%A8%D9%88%D8%B1%D9%8A_%D8%A8%D8%A7%D9%84%D8%AD%D9%84%D9%8A%D8%A8#cite_note-3\">[3]</a> بدأت في المملكة المتحدة في عام 1905 وتحتوي على عدد من المنتجات فجميع منتجات شوكلاته كادبوري مصنوعة من حليب الشوكلاته الحصري.</p>', '<p><strong>Cadbury Dairy Milk</strong> is a British brand of <a href=\"https://en.wikipedia.org/wiki/Types_of_chocolate\">milk chocolate</a> manufactured by <a href=\"https://en.wikipedia.org/wiki/Cadbury\">Cadbury</a>. It was introduced in the <a href=\"https://en.wikipedia.org/wiki/United_Kingdom_of_Great_Britain_and_Ireland\">United Kingdom</a> in June 1905 and now consists of a number of products. Every product in the Dairy Milk line is made with exclusively <a href=\"https://en.wikipedia.org/wiki/Milk_chocolate\">milk chocolate</a>. In 2014, Dairy Milk was ranked the best-selling <a href=\"https://en.wikipedia.org/wiki/Chocolate_bar\">chocolate bar</a> in the UK.<a href=\"https://en.wikipedia.org/wiki/Cadbury_Dairy_Milk#cite_note-best_sellimg-1\">[1]</a> It is manufactured and distributed by the <a href=\"https://en.wikipedia.org/wiki/The_Hershey_Company\">Hershey Company</a> in the United States under <a href=\"https://en.wikipedia.org/wiki/License\">licence</a> from Cadbury.<a href=\"https://en.wikipedia.org/wiki/Cadbury_Dairy_Milk#cite_note-NYTbestcandy-2\">[2]</a> The chocolate is now available in many countries, including <a href=\"https://en.wikipedia.org/wiki/China\">China</a>, <a href=\"https://en.wikipedia.org/wiki/India\">India</a>, <a href=\"https://en.wikipedia.org/wiki/Sri_Lanka\">Sri Lanka</a>, <a href=\"https://en.wikipedia.org/wiki/Pakistan\">Pakistan</a>, <a href=\"https://en.wikipedia.org/wiki/Philippines\">the Philippines</a>, <a href=\"https://en.wikipedia.org/wiki/Indonesia\">Indonesia</a>, <a href=\"https://en.wikipedia.org/wiki/Kazakhstan\">Kazakhstan</a> and <a href=\"https://en.wikipedia.org/wiki/Bangladesh\">Bangladesh</a>.</p>', 'شوكلاته كادبوري بالحليب هي إحدى الشركات الحالية المتخصصة بالشوكولاتة بالحليب وتديرها كادبوري، ماعدا في الولايات المتحدة الأمريكية فيتم صنعها في شركة مونديلز العالمية. بدأت في المملكة المتحدة في عام 1905 وتحتوي على عدد من المنتجات فجميع منتجات شوكلاته كادبوري مصنوعة من حليب الشوكلاته الحصري.', 'Cadbury Dairy Milk is a British brand of milk chocolate manufactured by Cadbury. It was introduced in the United Kingdom in June 1905 and now consists of a number of products. Every product in the Dairy Milk line is made with exclusively milk chocolate. In 2014, Dairy Milk was ranked the best-selling chocolate bar in the UK.[1] It is manufactured and distributed by the Hershey Company in the United States under licence from Cadbury.[2] The chocolate is now available in many countries, including China, India, Sri Lanka, Pakistan, the Philippines, Indonesia, Kazakhstan and Bangladesh.', 'شوكلاته كادبوري بالحليب هي إحدى الشركات الحالية المتخصصة بالشوكولاتة بالحليب وتديرها كادبوري، ماعدا في الولايات المتحدة الأمريكية فيتم صنعها في شركة مونديلز العالمية. بدأت في المملكة المتحدة في عام 1905 وتحتوي على عدد من المنتجات فجميع منتجات شوكلاته كادبوري مصنوعة من حليب الشوكلاته الحصري.', 'Cadbury Dairy Milk is a British brand of milk chocolate manufactured by Cadbury. It was introduced in the United Kingdom in June 1905 and now consists of a number of products. Every product in the Dairy Milk line is made with exclusively milk chocolate. In 2014, Dairy Milk was ranked the best-selling chocolate bar in the UK.[1] It is manufactured and distributed by the Hershey Company in the United States under licence from Cadbury.[2] The chocolate is now available in many countries, including China, India, Sri Lanka, Pakistan, the Philippines, Indonesia, Kazakhstan and Bangladesh.', 'شوكلاته كادبوري بالحليب هي إحدى الشركات الحالية المتخصصة بالشوكولاتة بالحليب وتديرها كادبوري، ماعدا في الولايات المتحدة الأمريكية فيتم صنعها في شركة مونديلز العالمية. بدأت في المملكة المتحدة في عام 1905 وتحتوي على عدد من المنتجات فجميع منتجات شوكلاته كادبوري مصنوعة من حليب الشوكلاته الحصري.', 'Cadbury Dairy Milk is a British brand of milk chocolate manufactured by Cadbury. It was introduced in the United Kingdom in June 1905 and now consists of a number of products. Every product in the Dairy Milk line is made with exclusively milk chocolate. In 2014, Dairy Milk was ranked the best-selling chocolate bar in the UK.[1] It is manufactured and distributed by the Hershey Company in the United States under licence from Cadbury.[2] The chocolate is now available in many countries, including China, India, Sri Lanka, Pakistan, the Philippines, Indonesia, Kazakhstan and Bangladesh.', 'شوكلاته كادبوري بالحليب هي إحدى الشركات الحالية المتخصصة بالشوكولاتة بالحليب وتديرها كادبوري، ماعدا في الولايات المتحدة الأمريكية فيتم صنعها في شركة مونديلز العالمية. بدأت في المملكة المتحدة في عام 1905 وتحتوي على عدد من المنتجات فجميع منتجات شوكلاته كادبوري مصنوعة من حليب الشوكلاته الحصري.', 'Cadbury Dairy Milk is a British brand of milk chocolate manufactured by Cadbury. It was introduced in the United Kingdom in June 1905 and now consists of a number of products. Every product in the Dairy Milk line is made with exclusively milk chocolate. In 2014, Dairy Milk was ranked the best-selling chocolate bar in the UK.[1] It is manufactured and distributed by the Hershey Company in the United States under licence from Cadbury.[2] The chocolate is now available in many countries, including China, India, Sri Lanka, Pakistan, the Philippines, Indonesia, Kazakhstan and Bangladesh.', 'm15', '12', 14.00, 10.00, '2023-07-08', 99, '1', 'accepted', '1', 8, 2, NULL, '2023-06-04 17:18:37', '2023-06-05 11:01:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `image`, `status`, `admin_id`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ملابس', 'clothes', 'ملابس', 'clothes', 'فى قلب الأقصر.. حملات مكثفة لمواجهة مخالفات الحنطور وردع الأطفال من قيادته.. وخطة لإحلال وتركيب حفاضات جديدة لخيول الحنطور لضمان خدمة أفضل للسائح والمواطن', 'The field of molecular phylogeography, which documents the history of spatial isolation and geographic expansion of populations, has developed.', 'فى قلب الأقصر.. حملات مكثفة لمواجهة مخالفات الحنطور وردع الأطفال من قيادته.. وخطة لإحلال وتركيب حفاضات جديدة لخيول الحنطور لضمان خدمة أفضل للسائح والمواطن', 'The field of molecular phylogeography, which documents the history of spatial isolation and geographic expansion of populations, has developed.', '1685901475.jpg', '1', 1, NULL, '2023-06-04 16:57:55', '2023-06-04 16:57:55', NULL),
(2, 'مأكولات', 'Foods', 'مأكولات', 'foods', 'فى قلب الأقصر.. حملات مكثفة لمواجهة مخالفات الحنطور وردع الأطفال من قيادته.. وخطة لإحلال وتركيب حفاضات جديدة لخيول الحنطور لضمان خدمة أفضل للسائح والمواطن', 'front violations of carriages and deter children from driving them.. And a plan to replace and install new diapers for carriage horses to ensure better service for tourists and citizens', 'فى قلب الأقصر.. حملات مكثفة لمواجهة مخالفات الحنطور وردع الأطفال من قيادته.. وخطة لإحلال وتركيب حفاضات جديدة لخيول الحنطور لضمان خدمة أفضل للسائح والمواطن', 'front violations of carriages and deter children from driving them.. And a plan to replace and install new diapers for carriage horses to ensure better service for tourists and citizens', '1685901544.jpg', '1', 1, NULL, '2023-06-04 16:59:04', '2023-06-04 16:59:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'f1ldAhLVsy6gCzTYBYmWDxBdX0sbupY5S129ulwr.jpg', 1, '2023-06-04 17:06:59', '2023-06-04 17:06:59'),
(2, 'AyswEe3Q4e4uyEDbQilvbBGiDtxBo2sqEhztoAaR.jpg', 1, '2023-06-04 17:06:59', '2023-06-04 17:06:59'),
(3, 'ARAv7mIhfwxhAaFpv2nDmHgbVYINcQ6x7pP5eISi.jpg', 1, '2023-06-04 17:06:59', '2023-06-04 17:06:59'),
(4, 'Y0mbAsG7ennC4eSbqoNJHWC6OCV9l5pCmLhC5ccn.jpg', 2, '2023-06-04 17:10:54', '2023-06-04 17:10:54'),
(5, 'kZszlU8bhXdgHIRIO0t8SgZ5Xkb8bDla8bTZwWFt.jpg', 2, '2023-06-04 17:10:54', '2023-06-04 17:10:54'),
(6, 'vVfMYgnXaFBCBzJ4ffBZt5FOXePAMNvnpcJvEWKO.jpg', 2, '2023-06-04 17:10:54', '2023-06-04 17:10:54'),
(7, 'SJ6wrZSJ9l0zlzQvl7YPH3M6g5ZPiVTrpkjRyQLD.jpg', 3, '2023-06-04 17:14:23', '2023-06-04 17:14:23'),
(8, 'YV9bO2k9CZ2GX8ubwrqrOQK9Q2YK3EGToJUUDIX8.jpg', 3, '2023-06-04 17:14:23', '2023-06-04 17:14:23'),
(9, 'PLBtvXANztcGo0VhfrId2bEEnZ88r1NzaY0qNMAS.jpg', 3, '2023-06-04 17:14:23', '2023-06-04 17:14:23'),
(10, 'F81bhj1kw4Fb8BsEILWXXn1ni7tg0nb5llgFHC6n.png', 3, '2023-06-04 17:14:23', '2023-06-04 17:14:23'),
(11, 'FGIqoJeIpKuDNjDxzfMZ3uZ5wH4o1b2kbxiWU1lI.jpg', 4, '2023-06-04 17:18:37', '2023-06-04 17:18:37'),
(12, 'nEv1GSGbf6l9L2xjFqMeauG056EAQfqZ342eHzaY.jpg', 4, '2023-06-04 17:18:37', '2023-06-04 17:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_occasions`
--

CREATE TABLE `product_occasions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `occasion_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_occasions`
--

INSERT INTO `product_occasions` (`id`, `occasion_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 2, NULL, NULL),
(5, 4, 2, NULL, NULL),
(6, 1, 3, NULL, NULL),
(7, 2, 3, NULL, NULL),
(8, 3, 3, NULL, NULL),
(9, 4, 3, NULL, NULL),
(10, 1, 4, NULL, NULL),
(11, 2, 4, NULL, NULL),
(12, 3, 4, NULL, NULL),
(13, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_products_with`
--

CREATE TABLE `product_products_with` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_with_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tax`
--

CREATE TABLE `product_tax` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_taxes`
--

CREATE TABLE `product_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_top_advs`
--

CREATE TABLE `product_top_advs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_under_advs`
--

CREATE TABLE `product_under_advs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` date NOT NULL,
  `value` double(8,2) NOT NULL,
  `maximum_times_of_use` int(11) NOT NULL DEFAULT 100,
  `count_of_use` int(11) NOT NULL DEFAULT 0,
  `dedicated_to` enum('all_users','females','males','spacial_user','spacial_product') COLLATE utf8mb4_unicode_ci DEFAULT 'all_users',
  `type` enum('percent','amount') COLLATE utf8mb4_unicode_ci DEFAULT 'amount',
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queries_requests`
--

CREATE TABLE `queries_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions_and_requests`
--

CREATE TABLE `questions_and_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `code` int(11) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `image`, `title_ar`, `title_en`, `status`, `code`, `country_id`, `city_id`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '1685898986.png', 'الاماره الاولى', 'Emara 1', '1', NULL, NULL, 5, 1, '2023-06-04 16:16:26', '2023-06-04 16:16:26', NULL),
(6, '1685899022.png', 'الاماره الثانيه', 'Emarah 2', '1', NULL, NULL, 6, 1, '2023-06-04 16:17:02', '2023-06-04 16:17:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super-admin', 'Super-admin', '2023-06-04 16:08:56', '2023-06-04 16:08:56'),
(2, 'admin', 'Admin', 'Admin', '2023-06-04 16:08:57', '2023-06-04 16:08:57'),
(3, 'vendor-admin', 'Vendor-admin', 'Vendor-admin', '2023-06-04 16:08:57', '2023-06-04 16:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\Admin'),
(2, 2, 'App\\Models\\Admin'),
(2, 3, 'App\\Models\\Admin'),
(2, 4, 'App\\Models\\Admin'),
(2, 5, 'App\\Models\\Admin'),
(2, 6, 'App\\Models\\Admin'),
(2, 7, 'App\\Models\\Admin'),
(2, 8, 'App\\Models\\Admin'),
(2, 9, 'App\\Models\\Admin'),
(2, 10, 'App\\Models\\Admin'),
(2, 11, 'App\\Models\\Admin'),
(2, 12, 'App\\Models\\Admin'),
(2, 13, 'App\\Models\\Admin'),
(2, 14, 'App\\Models\\Admin'),
(2, 15, 'App\\Models\\Admin'),
(2, 16, 'App\\Models\\Admin'),
(2, 17, 'App\\Models\\Admin'),
(2, 18, 'App\\Models\\Admin'),
(2, 19, 'App\\Models\\Admin'),
(2, 20, 'App\\Models\\Admin'),
(2, 21, 'App\\Models\\Admin'),
(2, 22, 'App\\Models\\Admin'),
(2, 23, 'App\\Models\\Admin'),
(2, 24, 'App\\Models\\Admin'),
(2, 25, 'App\\Models\\Admin'),
(2, 26, 'App\\Models\\Admin'),
(2, 27, 'App\\Models\\Admin'),
(2, 28, 'App\\Models\\Admin'),
(2, 29, 'App\\Models\\Admin'),
(2, 30, 'App\\Models\\Admin'),
(2, 31, 'App\\Models\\Admin'),
(2, 32, 'App\\Models\\Admin'),
(2, 33, 'App\\Models\\Admin'),
(2, 34, 'App\\Models\\Admin'),
(2, 35, 'App\\Models\\Admin'),
(2, 36, 'App\\Models\\Admin'),
(2, 37, 'App\\Models\\Admin'),
(2, 38, 'App\\Models\\Admin'),
(2, 39, 'App\\Models\\Admin'),
(2, 40, 'App\\Models\\Admin'),
(2, 41, 'App\\Models\\Admin'),
(2, 42, 'App\\Models\\Admin'),
(2, 43, 'App\\Models\\Admin'),
(2, 44, 'App\\Models\\Admin'),
(2, 45, 'App\\Models\\Admin'),
(2, 46, 'App\\Models\\Admin'),
(2, 47, 'App\\Models\\Admin'),
(2, 48, 'App\\Models\\Admin'),
(2, 49, 'App\\Models\\Admin'),
(2, 50, 'App\\Models\\Admin'),
(2, 51, 'App\\Models\\Admin'),
(3, 52, 'App\\Models\\Admin'),
(3, 53, 'App\\Models\\Admin'),
(3, 54, 'App\\Models\\Admin'),
(3, 55, 'App\\Models\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `second_advs`
--

CREATE TABLE `second_advs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost` double(8,2) NOT NULL,
  `text_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_by_brands`
--

CREATE TABLE `shop_by_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_by_occasions`
--

CREATE TABLE `shop_by_occasions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `splashes`
--

CREATE TABLE `splashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_information_footers`
--

CREATE TABLE `store_information_footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `percentage` double(8,2) NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term_and_condition_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_and_condition_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_footers`
--

CREATE TABLE `top_footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `apple_store_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_play_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_navbars`
--

CREATE TABLE `top_navbars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `lang` enum('en','ar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `fcm-token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `receive_email` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_from` enum('web','android','ios','mobile') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_status` tinyint(4) NOT NULL DEFAULT 0,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `phone`, `image`, `birth_date`, `lang`, `fcm-token`, `email_verified_at`, `gender`, `status`, `receive_email`, `google_id`, `facebook_id`, `apple_id`, `sign_from`, `password`, `country_id`, `city_id`, `region_id`, `verified_status`, `lat`, `lng`, `address`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chauncey Barton', NULL, NULL, 'annabel.deckow@rodriguez.com', '907.806.3093', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$Zzv8IDI.nvMgymxGvo3NAOzF2N03Gsobz/O4b54yxaMOqv29SoGlC', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-09 03:37:52', NULL, NULL),
(2, 'Amya Crist Sr.', NULL, NULL, 'kwindler@yahoo.com', '405-932-7179', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$W8czU8H7bI723bwjcyJl.Oj4LCW3Qg.i792BBYnMVDxoTlJVvI0Hu', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-19 23:27:49', NULL, NULL),
(3, 'Mr. Lennie Gerhold', NULL, NULL, 'oheathcote@yahoo.com', '+19073531667', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$WQ0QL0pJiPhVOoykIFJn3edgc2Bbp.VpuykUNf9mU0gSUwSCTn6pu', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-29 22:46:21', NULL, NULL),
(4, 'Dr. Lois Gaylord', NULL, NULL, 'elyse.hauck@hotmail.com', '+1.862.907.2386', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$1k07BbnXQQ02JKXcWuUPVuOyCFTFyGdw.8qZUlIap/OwD7pIZ1D9a', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-19 05:05:47', NULL, NULL),
(5, 'Litzy Roberts', NULL, NULL, 'chandler.brown@white.com', '1-272-726-2932', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$IooM2wMwEGgcmsE0/zMkfuDNmubFGzgKVi2/KSmzX3LcizweQ47dC', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-28 16:23:24', NULL, NULL),
(6, 'Antonetta Larkin III', NULL, NULL, 'trunolfsson@borer.com', '1-502-662-9277', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$2EjBVmuf5aqeoI1YAWoyh.hWHq4UC/lI6WEELOdZP2umhRhuAWPPi', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-22 23:33:39', NULL, NULL),
(7, 'Ms. Leola Hudson', NULL, NULL, 'vrippin@gmail.com', '+19803990352', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$XYM6FN2aUpXLHrOb4amcQ.wB1rH7fU4CPYu/YYcvSUknt9o04KnyG', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-07 00:45:39', NULL, NULL),
(8, 'Margaret Beer', NULL, NULL, 'kshlerin.ezequiel@gmail.com', '+1 (630) 699-3964', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$g8IxbWm82J377VU0RmdG1O8lkcmEulada3OD13UFXwdPDBFExiWvq', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-23 08:35:59', NULL, NULL),
(9, 'Lamont Vandervort', NULL, NULL, 'rosalind.rippin@gmail.com', '+1 (858) 537-3755', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$5EkrzvpKTQnpF6PUrc5OSugmzBXmzDpDB2v0Hc77yRAy.cm.RLz2K', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-28 11:59:26', NULL, NULL),
(10, 'Mr. Jermain Haley Sr.', NULL, NULL, 'brock41@fisher.biz', '603.469.0777', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$1SbDvlSntE0A9Jx8UgwLf.1abwkCd6I9uSX/Fvr2EpUGemSMCZUme', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-04 23:09:20', NULL, NULL),
(11, 'Prof. Mustafa Rolfson III', NULL, NULL, 'gcruickshank@gmail.com', '573.412.7577', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$upPMsGNWth6QD8Y9jLflSOIo7Hebafavo6B8dwuUMEVjvqISVbj6S', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-09 20:48:06', NULL, NULL),
(12, 'Dr. Sven Ryan II', NULL, NULL, 'ubaldo.cruickshank@wiza.org', '+18318362198', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$3SpIYyw/1B1zkZMKffCiaOs49kj2BehMbuLDdUcbq8r86zM4ofbM2', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-21 16:38:22', NULL, NULL),
(13, 'Kallie Bahringer', NULL, NULL, 'jfisher@hotmail.com', '312-406-5941', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$TNlFtfTpq9Y7e2wB752qLerm2Gh4YeBrYi5/0cyzKPTc776Ba1P/q', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-18 06:07:14', NULL, NULL),
(14, 'Ocie Kunze', NULL, NULL, 'marjory67@yahoo.com', '865.807.7545', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$Ad4wWnsfQ.dmo1VmoeifR.jDkHIPgQSSyOqDEDSqbvjih2i8eajh2', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-05 09:48:26', NULL, NULL),
(15, 'Vanessa VonRueden', NULL, NULL, 'kuhic.erna@wilderman.info', '(574) 797-1370', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$HKV396gD4ZblOHOOOus8e.7W6f.aGqZrBAwWnUA9c36UIxAogM/QC', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-05 22:00:28', NULL, NULL),
(16, 'Mr. Fabian Fritsch', NULL, NULL, 'haley.kohler@yahoo.com', '+19093534519', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$pyJEQICwZ1YlBofdJ8BQu.TSKuH9fWskFIxq0boBWRI.m9/bsKJWq', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-03 11:32:43', NULL, NULL),
(17, 'Francesca Hand', NULL, NULL, 'howe.emery@homenick.org', '1-563-595-5690', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$QLSbpelDLqkq7lCpUFDwF.ujhbbNRZKq8y6XYlWnK44NuOL96ox22', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-06 18:34:42', NULL, NULL),
(18, 'Anthony Gaylord', NULL, NULL, 'sthompson@hamill.com', '+1 (507) 993-5474', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$eNTHHreLN3atbfJX5jDV.unNfuKJo8vYgAuF876BC26TJhr3SEhPW', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-02-18 13:01:37', NULL, NULL),
(19, 'Leora Anderson', NULL, NULL, 'dare.eleonore@kemmer.com', '+1-804-205-3872', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$JBvk/DquwF4Ic9nTn5O2NuCDPn3Vn5.U/0jLkhs/syfChq6FUoXk2', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-12 15:09:16', NULL, NULL),
(20, 'Stephon Wisoky', NULL, NULL, 'genevieve.goldner@koelpin.info', '(920) 270-7515', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$X9hJRWpchOS4MMIjzS2IiubfY5peflm3Ib.LEcQNKbqsnYw1tkFV2', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-12 10:03:24', NULL, NULL),
(21, 'Miss Bria Schulist PhD', NULL, NULL, 'mavis57@gmail.com', '540-730-9841', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$aTH.eV8szC6tOHzJnNnQ1euhE1OvA8qLFhenwwN.p1J9Zi5YDqllu', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-14 22:44:06', NULL, NULL),
(22, 'Bobbie Ruecker Sr.', NULL, NULL, 'laron94@daugherty.com', '+14587973941', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$XLNqK.GjcOJcAK6nf0RrRuHUseNY3fBqX.OsiyPcGa5D9la879EKy', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-10 09:58:54', NULL, NULL),
(23, 'Mr. Edmond Littel Jr.', NULL, NULL, 'carolanne.keebler@hotmail.com', '(773) 370-7273', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$uOaKCFyt7kNOnL0lIBgoLeaAc5Y5mN/yjGo8tqdgiUItkpT9dCrs6', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-13 17:47:20', NULL, NULL),
(24, 'Cristian Walsh MD', NULL, NULL, 'tmcclure@gerlach.com', '1-804-566-5365', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$ESVVnAKbNx/CGhLMrg1zaeSkZVGoLh7haFMQ0gS7vxCoEPMhY0nai', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-16 22:50:48', NULL, NULL),
(25, 'Moriah Gorczany MD', NULL, NULL, 'brisa.krajcik@nader.info', '1-272-532-5558', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$2Zk73MA1NKLy76/I2ujeQuYIeOqGWFKTMn4izsq0k7XFlK5jxdofC', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-15 10:16:42', NULL, NULL),
(26, 'Blake Toy Sr.', NULL, NULL, 'ursula94@green.com', '+1 (774) 652-0062', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$VWHWCypG5n6RHzldU6D.yOFHXaIwRXQ/AYNL96eJe6OeBZsuTb1yC', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-18 10:14:23', NULL, NULL),
(27, 'Prof. Sienna Mohr PhD', NULL, NULL, 'iva95@mosciski.com', '251.526.8549', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$q8zMO1KcrH2YrqJo.OMnO.JV5JvIZMLNkcvLv4.rxX5mfOUiPsflG', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-23 02:24:22', NULL, NULL),
(28, 'Miss Cordie Muller', NULL, NULL, 'reilly.valerie@hotmail.com', '+16783217457', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$QnmwHZuLrcKNnw.JoqIboO/jzCNGUWP5zkouFHmYdU30epvvduvim', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-30 15:52:46', NULL, NULL),
(29, 'Florencio Zulauf', NULL, NULL, 'langosh.providenci@daniel.com', '+1.678.657.9391', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$dOZB4swYXdgxVr6PohLmje.8KGihgUN0IrbrACjdiMS/f1.gwR5VG', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-11 03:10:50', NULL, NULL),
(30, 'Dr. Kitty Carter', NULL, NULL, 'sincere28@yahoo.com', '832.851.3904', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$h/XqwEwpscz/m/1dW1oid.fTz.kaDFdGBGvGCgWp/ZhCrmFxBzEme', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-14 15:30:55', NULL, NULL),
(31, 'Dr. Joelle Will', NULL, NULL, 'deanna.satterfield@kilback.com', '+1 (629) 531-5842', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$O6IpxSVBDDB44cxOCWXvUuDaJz59TaXDeoz5ANDdlGmYyBj3ExIVy', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-27 22:20:48', NULL, NULL),
(32, 'Virginie Cummings', NULL, NULL, 'chaim.beer@mohr.com', '531-866-0204', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$tjq4lDlhoeDN.AAgXskaPOnK6F.vet41d9RwOUyPXLt9R9c27L51y', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-08 01:34:22', NULL, NULL),
(33, 'Nat Schowalter II', NULL, NULL, 'frances.wyman@hotmail.com', '+1-405-942-8956', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$/ouzm05lgePOnBXVzi2oJuVYxdjdGch0wcD9I6GH1H6n1SAYI7KES', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-21 23:50:34', NULL, NULL),
(34, 'Darby Swift', NULL, NULL, 'anna.boehm@gmail.com', '323.794.6149', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$Areg0nd7yllht1668WWT.um.0f84.PioOArr0KPArbRTsVAirAJXK', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-11 01:25:38', NULL, NULL),
(35, 'Emmett Zulauf III', NULL, NULL, 'altenwerth.asa@reinger.com', '+1.906.441.8772', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$YxELiabe2qbINICYRcadFO1XnSxal1QvbxULcKEje7Im7kLIbGJ8G', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-13 14:21:58', NULL, NULL),
(36, 'Prof. Manuela Wilkinson', NULL, NULL, 'runolfsdottir.akeem@hyatt.com', '903-292-4007', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$PX9tCq2QNRxDBmLB1gs1k.C9g5IKldIEZcxgDO9Os5tNhkBJYw1Ra', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-27 22:20:34', NULL, NULL),
(37, 'Mr. Emery Wisoky', NULL, NULL, 'priscilla.moen@hotmail.com', '+12128553436', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$FzGn.zT4Db5jdhuXJZN/C.E/rL3FSWD1XKhZV2wKFCohz9YRmYm1a', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-26 14:00:55', NULL, NULL),
(38, 'Mellie Nicolas PhD', NULL, NULL, 'dkutch@gmail.com', '+1-952-484-3330', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$kG/5DX/ZS5vorxHpVBKNnOabjD7lI06eUDmAn.aTe9fm.T4Y3J6Wi', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-31 02:06:12', NULL, NULL),
(39, 'Brandi Wehner', NULL, NULL, 'stephanie42@harber.com', '1-432-645-3522', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$98Fdgb/wRhbu0KYXVQ.WZeBouC/E10zhcCHqxnsX34FZ7pk.ZCvry', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-23 15:08:19', NULL, NULL),
(40, 'Fred Graham', NULL, NULL, 'berniece.feeney@rippin.com', '+1-430-930-2029', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$xc4pH95XuhQrk0SyX7LLke43ylDOTPWQ0w8hWbyIaJSTO202Y.h1a', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-22 03:32:36', NULL, NULL),
(41, 'Mr. Keeley Hill DDS', NULL, NULL, 'beatty.oran@gmail.com', '+1-563-201-1184', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$DXnKLLMq8W2RE4gJYPlAcuIlROFi9oLGhI2Cx0iLzV67Q0c7i1vVW', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-29 02:13:06', NULL, NULL),
(42, 'Karley Balistreri', NULL, NULL, 'tcruickshank@yahoo.com', '+1 (769) 731-9288', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$7N4mg6ZrDH7IYry67g188O4gC7anYcKQVQ8HsdcTgVMV.ng29RN2.', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-07 21:21:36', NULL, NULL),
(43, 'Susanna Johnston', NULL, NULL, 'sylvester43@pfeffer.com', '+1 (831) 634-4635', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$uGjAU8hmODZg1Ca4WQ6VSeE4f37lompeK6Ocy5V50ZjWsefkoCJ1i', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-06 20:13:51', NULL, NULL),
(44, 'Lyric Corkery', NULL, NULL, 'effertz.marlen@yahoo.com', '+1.828.870.5977', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$bPQKqlWBrYW1L54Ls.TzPeiKTpS4W9ZpQ.o8NZgZMGFKebNZkClY.', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-09 00:29:43', NULL, NULL),
(45, 'Ian Gaylord Sr.', NULL, NULL, 'memard@feest.com', '1-717-253-3996', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$iZOeVWEAz1lcsQmO2jhVtODYpvQF.U4lMODeSRHOk860M3XbNBjJK', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-16 20:57:49', NULL, NULL),
(46, 'Dr. Winfield Cruickshank II', NULL, NULL, 'jaiden86@gmail.com', '(347) 579-2562', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$XRbMAW/9yJH1Azm3sfpyRutFkaY38V1tfRmqCZb6P7rY9A1.rSB9q', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-17 07:20:30', NULL, NULL),
(47, 'Kari Dickinson', NULL, NULL, 'susan.wehner@hotmail.com', '(678) 335-9208', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$HblS7BuqM1No/fmEvZyYXeKMjdchknbXsp3pca.kVtbz64G4dRiqG', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-13 22:38:12', NULL, NULL),
(48, 'Markus Abbott', NULL, NULL, 'morris33@yahoo.com', '734.289.3837', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$1HySlLW6Ye4xOoHjpjDgWu7Yo4Wws4ghV216DwFdC9GxfawANHQSK', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-26 02:06:43', NULL, NULL),
(49, 'Prof. Damon Schumm', NULL, NULL, 'fritsch.rylee@christiansen.org', '(352) 988-6321', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$B30BWyazgueGNia9g6doXO9I7.rKW/5Nd.x2f36k5jSKG17qn86aC', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-23 02:53:04', NULL, NULL),
(50, 'Kayden Zemlak', NULL, NULL, 'nlesch@gmail.com', '820.793.3939', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$nZJOz96Jn8j2ti9ypMRvMemPI9mE06kRp1mQE1WUwc6iLHL3EEqe2', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-02 07:41:21', NULL, NULL),
(51, 'Virgil Lehner', NULL, NULL, 'schimmel.jaycee@ward.com', '(817) 633-6942', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$ghNI6loRJv7moQJziZxeiOK8lv8ApL6KlD9kX00eVC/usK.ZFM8cS', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-30 17:27:23', NULL, NULL),
(52, 'Randy Kessler', NULL, NULL, 'grant.halvorson@hammes.com', '+1.267.578.7302', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$evzYXP8VUgqW2.qPZxnd2OBWGkr9tYiK0gV0GGEWw242wNzqN3uRa', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-09 07:37:01', NULL, NULL),
(53, 'Ezekiel Schoen DDS', NULL, NULL, 'fkunze@gislason.info', '+1.907.368.6355', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$taHsNrAYOA0LKGYCoYPakuq68jG3Hr/MrUvXT4IV10p2MN5QmpOvC', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-21 18:01:46', NULL, NULL),
(54, 'Charles Dickinson', NULL, NULL, 'arnold.johns@osinski.com', '+1-562-226-3918', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$da6lTAOrvy0rEtjR9fMspujSMdsql76u1cF9mhXN8e8Te3Dt1.gS.', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-02 10:55:09', NULL, NULL),
(55, 'Agustina Kertzmann', NULL, NULL, 'tanya46@hand.com', '212.794.8797', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$.rj0LtutHdeCYc2ef1ihWO0fXN7540Xzsz1Du0cIvmVk4zNbkHysS', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-06 00:26:10', NULL, NULL),
(56, 'Sabrina Cremin', NULL, NULL, 'amie.heaney@koepp.com', '(747) 563-4325', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$ZhCZ.G7Um.NJOQvuSdx83.d40Nn6Ldv7Utyvw4tYCIzMqteNO66Se', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-24 02:22:39', NULL, NULL),
(57, 'Gerardo Reinger', NULL, NULL, 'hegmann.myra@sanford.biz', '+1.774.321.3804', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$9HMBQ7GSUXQ.TTYpiRwZu.1SAI13iaDRBzqwXw0Zqxu.AiKvwrQ9m', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-06 05:27:46', NULL, NULL),
(58, 'Scottie Cummings', NULL, NULL, 'tcasper@yahoo.com', '+1-747-683-9187', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$jdJ3i9q0RBqAtRuH0MtmE./1Hfmr28UabtqS0E/q3f1QTROVJWcGS', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-29 22:52:10', NULL, NULL),
(59, 'Dedric McLaughlin', NULL, NULL, 'wbreitenberg@yahoo.com', '+1 (928) 837-1747', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$5YNrHrnqEhlsxoA5.qTL.OThXp/tkljmWgahAIOUMzJyirNnOGeEW', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-16 06:46:56', NULL, NULL),
(60, 'Kole Robel', NULL, NULL, 'jamarcus.corkery@hilpert.com', '+1-772-891-7721', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$h2jqO/mnhMflTWLEA7Hhx.JUQcKuI8797H4wbLVXq493DaqqA2pRu', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-09 12:45:29', NULL, NULL),
(61, 'Marge McDermott', NULL, NULL, 'susanna33@gmail.com', '862-682-8218', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$TFpW7dtQPDi5Kf2ZMrRO9elE1864/./FKEY7r7JXD2Q9MXAoBxoVW', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-09 04:29:52', NULL, NULL),
(62, 'Prof. Maggie Stoltenberg', NULL, NULL, 'jenkins.oran@wiegand.com', '+18454991792', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$9sVCq6uQvTTQL8KxjpefVOnnb15HAN9s2CZoU4Xdmub3LSmwV3iRi', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-11 18:50:42', NULL, NULL),
(63, 'Gretchen Runolfsdottir', NULL, NULL, 'simone50@yahoo.com', '1-973-997-1681', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$/plrbaVyru.snQnE4rB2Tuszfz7DqLVbO/scsMLLvbB4tFe/J5pIe', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-21 12:53:46', NULL, NULL),
(64, 'Owen Brown', NULL, NULL, 'luettgen.francis@hotmail.com', '+1-480-200-3639', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$KFH2H22xA5jLVu5E1ux8NeEX5GJy2EgH//lwYrAt28EJ6YMsfSzdC', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-21 03:07:54', NULL, NULL),
(65, 'Gudrun Schimmel', NULL, NULL, 'kuhic.kirstin@boyer.com', '1-484-894-8511', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$TlVnxxwLdXx75bpDgSHzLePBru0p4sdewNkFojxBvqWeps5930UTG', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-02-24 23:29:09', NULL, NULL),
(66, 'Waylon Rogahn', NULL, NULL, 'tgraham@gmail.com', '949-625-3702', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$szk05cxFLOPe6oJMAOml1OyUE7IPnKldEj20HRFn5B1jAnfzVVkZC', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-09 14:14:19', NULL, NULL),
(67, 'Dawson Christiansen', NULL, NULL, 'maia.leuschke@yahoo.com', '(386) 527-3756', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$dmm9V6Mg7B3JjEmpdL9k0.gwWOSGPFF8ICN4nzpKINcys27mAVcvC', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-13 20:44:34', NULL, NULL),
(68, 'Taya Ankunding', NULL, NULL, 'berta48@hotmail.com', '802-358-4189', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$g8iutZlk3Tyo1stNb6fM8OvDtmzjJv9rA5afV.mdwC0rnvayS30Sy', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-27 15:11:28', NULL, NULL),
(69, 'Conrad Cormier', NULL, NULL, 'xklein@gmail.com', '385-844-9672', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$BFRCFD492MnP2EfvwXvtUeoyRW6T0MYY9FbNm8Dwhdo05AdsKvWQq', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-26 00:27:50', NULL, NULL),
(70, 'Carli Pfeffer', NULL, NULL, 'kautzer.alva@hotmail.com', '463-931-3273', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$FbkZAZIRUJd3R9gM5P2KeuFp/8XSsHP/lQpOlLCbJdPvQWpDVf8tO', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-01 03:51:00', NULL, NULL),
(71, 'Ms. Jennie Abbott', NULL, NULL, 'streich.katherine@gmail.com', '(701) 231-1682', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$2Kmaru0iia0FttQXgHieU.K5Kwnj5GiX2gM8KeVHquxAm.DnpyDqC', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-24 18:07:55', NULL, NULL),
(72, 'Prof. Stewart Douglas I', NULL, NULL, 'lbode@block.org', '561.835.6291', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$vqtWZ1b2tqIjnS74iGJRV.md0K5E0mv159m7GgjB/UUbKERB6sKlW', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-02 00:51:25', NULL, NULL),
(73, 'Camila Zieme', NULL, NULL, 'elwin.lindgren@yahoo.com', '+17579835424', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$JYl/XrQaluNGkoenF541m.IQ/dfKtJbiDQuqbVZYGpOVry27GFzJG', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-04 22:17:14', NULL, NULL),
(74, 'Mr. Mike Pagac DDS', NULL, NULL, 'rbogisich@mueller.com', '1-478-524-8910', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$wBLx7SaI52lxnckfSekMMuXDgQcJaNxbvUL6wN.f3UURIkQCRR1iC', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-02 20:37:50', NULL, NULL),
(75, 'Abe Berge', NULL, NULL, 'eryan@yahoo.com', '646-652-6771', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$VhDYbGMn2yVxY.9pvkTYHOd6mJ3tGbe/KQ3dkSXKIfCg8qBMLi2AO', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-05 11:54:37', NULL, NULL),
(76, 'Miss Annalise Koelpin I', NULL, NULL, 'emerald75@yahoo.com', '1-281-548-8711', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$G6eU8v1Yd4l7n0SyVHAOSe3YaROHFjLwEaK7lg61UbhuloxKbJP9q', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-27 09:16:41', NULL, NULL),
(77, 'Orie Kreiger DDS', NULL, NULL, 'briana.littel@gmail.com', '(681) 617-8189', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$TnvhJrlp4XTP2aBHGMQboe/HCeEnvXmYhEmkaT2cgc9RcDTyLzSN2', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-16 03:31:09', NULL, NULL),
(78, 'Mrs. Carley Hill', NULL, NULL, 'xbayer@yahoo.com', '1-352-272-5589', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$l/syZe/jCANXlQLkAzOmgeUgeexv3Ie8jsM9Nql2Guy5xxf6x4mq6', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-20 00:07:55', NULL, NULL),
(79, 'Ms. Litzy Roob MD', NULL, NULL, 'glen07@medhurst.biz', '+12403483740', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$8PJ7u/By8ef58WRqTM9kZeSxtLIEzugWUViRcL6hFwMRZMO8TDSgG', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-21 16:59:26', NULL, NULL),
(80, 'Paige Schuppe I', NULL, NULL, 'ekerluke@gmail.com', '(332) 397-7450', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$lJ2qROwYseuCZ/Q8kbgzU.j2hCNpsuSHrSCBT3YVEhKT3J7DlaYfe', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-01 00:51:11', NULL, NULL),
(81, 'Neal Walter', NULL, NULL, 'maya49@prohaska.com', '(661) 325-4856', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$YB0JPxHbzFBwubsw9RkGUe8IOS820onr/AVaKhUYqpFhnhSqNHd1G', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-10 10:33:03', NULL, NULL),
(82, 'Margarete Lesch', NULL, NULL, 'dborer@gmail.com', '+1.903.690.4363', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$140UahdRxHFtwa5L.nLj6ujXHImf3ZQOoxzhiQyOWrhSCH0Ln.Wju', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-08 09:46:17', NULL, NULL),
(83, 'Miss Ila Walter II', NULL, NULL, 'zkuhic@yahoo.com', '231.263.5509', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$SdQi.ZZSrnjC7Jqlyuv/jOkz3A9s2r/ITZphBTVBl/i9FELnv39c6', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-24 04:35:04', NULL, NULL),
(84, 'Mr. Cleo Schultz MD', NULL, NULL, 'fpadberg@mccullough.com', '(828) 838-5692', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$d3Ur26GQ0YdI.PpGDdr8Muz9qoFLT56q01/K6d5Rh/sR4kA3LiZ5m', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-05 03:16:29', NULL, NULL),
(85, 'Sim Kunde', NULL, NULL, 'herman.reinger@hotmail.com', '504-356-8554', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$UMIXsiXSoeFNQv1HIYG8XesO.n3/azQEssu9cIqnViMzE1mNfzOta', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-04 07:57:26', NULL, NULL),
(86, 'Margot Kuhic', NULL, NULL, 'zakary08@hotmail.com', '1-409-441-5054', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$gH6S8vId.cvUJWmYY0zdiOBfWtr9YHtgQAXCnM934ByVrtem6iaAa', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-15 22:53:12', NULL, NULL),
(87, 'Dr. Katrine Grimes', NULL, NULL, 'lamont.kutch@yahoo.com', '678.286.3357', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$P4SmDF1mCWuqImBa1LILCeghwRvg1pCHGZUwMZisXPYPYGvQ2OC/C', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-10 05:25:56', NULL, NULL),
(88, 'Vernie Rath', NULL, NULL, 'bergnaum.eunice@hotmail.com', '412.635.0775', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$HJM7rTQRxD/aJ/KoHDRDoO6Ops/luOaIzM7mlzUKusPOMxKdtMmIe', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-25 11:45:20', NULL, NULL),
(89, 'Koby Ankunding', NULL, NULL, 'thand@yahoo.com', '913-928-1164', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$HhSU4Ps9a8VxBj1l0JtGROoGJ3gc7t0n8C2VFrHlUL8xKsivXZ9Im', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-02 02:00:36', NULL, NULL),
(90, 'Tanner Kuvalis', NULL, NULL, 'litzy70@gmail.com', '+1 (210) 736-9997', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$WDJG5JtGFyWbQZWOHs.suuMSR1ACLeV5AhnfGh4rYcUeha8pX3DBq', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-01 12:42:53', NULL, NULL),
(91, 'Consuelo Ratke', NULL, NULL, 'dsauer@gmail.com', '(972) 567-1825', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$B9dDPJlcdxUvOcRWmx6PAePA4ILRkk/VaQsuFIndMZ7HtCZqr.zk2', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-23 03:24:49', NULL, NULL),
(92, 'Loy Batz', NULL, NULL, 'funk.easton@stamm.com', '(802) 577-0301', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$NFGDgqQhUNIqw.IqQFlqVOJa2Q/B5BSTXbOHW4IOHODroZ8DmMHA.', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-10 18:49:24', NULL, NULL),
(93, 'Miss Linnea Daniel IV', NULL, NULL, 'aleen25@yahoo.com', '+1.818.678.5439', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$WLd.MGA5xzXugshrZymh2.Kde3ucME0B1k4EWG/BDOlhXzcUuAPra', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-15 08:05:05', NULL, NULL),
(94, 'Ms. Alysa Metz', NULL, NULL, 'feil.silas@gmail.com', '1-972-234-0231', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$juQMo6TmEK3Q55BIu0/xH.kKc1hhCBZMatiC/OGEQgPBqxQMbFEu6', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-12 09:02:21', NULL, NULL),
(95, 'Dr. Carlotta Howell MD', NULL, NULL, 'janis93@ferry.info', '+1 (785) 641-7990', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$V.R3MT5PumMMMQAteTg6nuv7rl.v7q/VZbl0WUCE9PATObz07ppjS', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-04 12:09:47', NULL, NULL),
(96, 'Jayda Schuppe', NULL, NULL, 'mann.pietro@yahoo.com', '+1-661-907-4990', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$1acrd8dyEMLDYS3ZXyimkOwvgsWMkpWxMe4jNQhhPETJqxYbVlGD2', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-01 04:53:50', NULL, NULL),
(97, 'Bette Gerhold', NULL, NULL, 'kadin86@cummerata.biz', '478-241-2021', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$R50/py4GxyImRhX0ClQJbeqvB02JkiPgyCCZ.R7FrNog.SNYYlR22', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-03 01:15:14', NULL, NULL),
(98, 'Christ Cummings', NULL, NULL, 'homenick.anjali@gmail.com', '1-608-506-3814', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$hi0kFp9ODsxjEt36efcbeeQ8xDr3Ql8bU9E1IsA6g.M41O7Nxyvvy', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-05 10:23:58', NULL, NULL),
(99, 'Kimberly Reichert', NULL, NULL, 'bdooley@gmail.com', '+12628826420', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$yGxbp3ff5rg6/V5WxKV1.uhbGd9av1HhZEL6Q3O7Go4ChweJKzTde', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-22 06:09:22', NULL, NULL),
(100, 'Miss Madelynn Blick', NULL, NULL, 'greilly@murazik.com', '(937) 805-7958', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$rS41QP8.3VYL4Fd5AcUBv.bcpjo411SeY4BembQmJ/pIl.C8mk/Jm', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-30 02:51:43', NULL, NULL),
(101, 'Sibyl Swaniawski', NULL, NULL, 'rita.lang@gmail.com', '+18726287152', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$nbphHNj9vynPUUPBJ5pBreFpEqGrs5MBXl60RfkwKgWSbRRxNKH2u', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-16 00:29:49', NULL, NULL),
(102, 'Ulises Bednar', NULL, NULL, 'kaden.rath@hotmail.com', '201-535-6819', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$JOGaFwVCgau0LFuCbr88/Oc.nyawwFBFyWnRmcjn1wiDWYSoqN8Zy', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-08 00:48:18', NULL, NULL),
(103, 'Leland Bruen', NULL, NULL, 'dahlia.funk@connelly.com', '+1-704-412-8373', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$E6t8ijLYSOVD9WsRfi3rG.3XbV.3ZuY4Jdlp7ZxX48PcDqcZYs7H6', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-09 05:57:14', NULL, NULL),
(104, 'Dr. Jarod Bahringer', NULL, NULL, 'jdaugherty@gmail.com', '463.983.8529', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$YTcW4nGvjIZ5Pj6OMC36DudiMeMgO8eQydP279idpaqTlPsO1G0I2', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-11 05:29:38', NULL, NULL),
(105, 'Ms. Greta Price', NULL, NULL, 'cormier.jacklyn@kuhic.com', '479-946-0018', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$3cQ.MdprIqo0LUO.HQpbyeI4nZ9GflomUIRWatWHKvMFdC8.8TwXC', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-25 06:47:40', NULL, NULL),
(106, 'Mr. Omer Brakus DVM', NULL, NULL, 'harber.imelda@hotmail.com', '641-234-6320', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$tROpBfVTfdZSWEuW7h/CuOGDh8A60uTPyxmxruMFnxvXEjqwvAHyG', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-01 22:53:59', NULL, NULL),
(107, 'Antonietta Shanahan', NULL, NULL, 'stokes.ari@gmail.com', '763.581.9814', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$NDhQR3.amEwmSfmzguuoTuepnvdIL5ntsMbKl2YMY6Dl5Mqsi1EaC', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-30 05:07:33', NULL, NULL),
(108, 'Hermann Kling', NULL, NULL, 'pauline80@batz.info', '313.270.4796', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$L510GitV444krNx4rCr6hu2EWHy1i7o5W9Vpf9TBNXThQynbBU1L2', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-16 04:34:08', NULL, NULL),
(109, 'Krystina Kohler', NULL, NULL, 'cale.strosin@yahoo.com', '+1.717.216.6562', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$.HpzcicT05cRb0XQ.3zHFOL5bJFik0paOkUzlNvljU9ZXAdjwlYEa', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-13 14:05:04', NULL, NULL),
(110, 'Alia Marvin', NULL, NULL, 'lrodriguez@quigley.info', '+14246782570', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$yA6FWHJo6NS9ABZmCH8THe0.V/oKijhefJv.dDONX3OcRlgbs4GrC', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-31 10:46:27', NULL, NULL),
(111, 'Khalil King', NULL, NULL, 'daphnee52@hotmail.com', '1-442-853-5405', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$tAFEo0a0ZeBFsJQ2wNNX0exDCKSHbuN.6T/AxGOTCBILf2XZ0soGG', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-13 05:31:30', NULL, NULL),
(112, 'Annamae Doyle', NULL, NULL, 'loraine.beatty@larson.com', '228-731-0251', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$HuB5asK7R9XA6h5bipgQa.g0ApJC2y/NFkksFEPrT9ZCnZpmvKmT6', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-31 22:01:14', NULL, NULL),
(113, 'Ebony Goodwin', NULL, NULL, 'alena01@hotmail.com', '+1 (938) 259-5045', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$lM3OW18zsK3vJLaoHqGtWeu5vJnLUcjH8XG8CNpL6Hl0qK326gpIS', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-26 19:23:56', NULL, NULL),
(114, 'Dr. Gardner Zieme', NULL, NULL, 'bertrand.christiansen@schneider.org', '+1.937.688.5732', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$B.rGwB92a1ZNTa7NJ7rDRuxTQWi6lS342UBbXpfv4j6cBUpQh/GTm', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-26 07:04:28', NULL, NULL),
(115, 'Mrs. Delilah Schmeler', NULL, NULL, 'malachi03@yahoo.com', '(801) 304-4756', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$bqYyV2bHfpbWEczHmblPjehQvhv.kvWj.NLMtYlVLZyl4W.zLk9D6', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-18 00:27:04', NULL, NULL),
(116, 'Lelia Brakus', NULL, NULL, 'rkuhlman@corwin.org', '+1-878-349-5267', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$ORoLHkv/hAeCbjvcY6X0r.fu1JMmi8fOH19zhogbW5pmNBpx/3niC', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-02-05 00:25:10', NULL, NULL),
(117, 'Marques Schinner', NULL, NULL, 'clyde34@trantow.com', '+1-364-262-5787', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$5MkYHKVDMCb7c5YksYs4YuRn.jrEBICkfLORSwWaZdPuwQBIdfxCO', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-15 00:29:54', NULL, NULL),
(118, 'Marvin Leuschke', NULL, NULL, 'vivianne.murazik@kassulke.com', '1-929-946-1584', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$2QB/R9PlQ2KSDq3JTPX8Vu57LAXEVigSSSqCtIgyopFlX78wIK.oa', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-06 21:31:25', NULL, NULL),
(119, 'Salma Watsica', NULL, NULL, 'terry.malinda@steuber.com', '407-560-2828', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$WHGkmmhDki1STi.0.x7bauUnqjKEUYYMdUvE4ef6vfSob6kK3ELJC', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 22:08:01', NULL, NULL),
(120, 'Garett Jerde V', NULL, NULL, 'alanna.gaylord@jerde.com', '+1.715.727.8152', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$kju9BrohSel3hk3Ypt6bc.7XpLLJPip/IIlXISWdOYm13bV8TqKnS', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-23 11:26:14', NULL, NULL),
(121, 'Julian Hayes', NULL, NULL, 'acarroll@hammes.org', '850.327.8014', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$J./nq2GTMG07jfioQ1BUVusE0XMgj5b6dq0gWTmcxd8BAGSF1xGg6', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-24 04:01:55', NULL, NULL),
(122, 'Jerry Bartoletti PhD', NULL, NULL, 'fay.benedict@baumbach.net', '+1 (754) 468-7125', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$kFzAJ1aUp7hZHEsvX.IkXOBaq16Vx5L2plYuB37rAMHS3..7y5eRy', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-16 02:05:17', NULL, NULL),
(123, 'Delta Upton', NULL, NULL, 'kemmerich@williamson.com', '(570) 407-5175', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$rjBp8qr8IeJc/veiWZoeo.B8Vxhkm/mKf8ZT09asfpa1D5dSTZkoO', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-20 06:24:24', NULL, NULL),
(124, 'Jerod Kling', NULL, NULL, 'sporer.furman@gmail.com', '1-531-873-0131', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$VvH.7Y1q4UOFTONW23R6qe9sBaGPnDrYbJleheE/S9ja7ZO5dFfh2', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-24 22:20:07', NULL, NULL),
(125, 'Margie Stroman III', NULL, NULL, 'langworth.alvena@wolff.biz', '1-531-758-0431', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$qVboQfG7j69pgH66YtvBaukZp8Y6fvXHWt04ALKs1zebwoCz/J4hi', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-05 13:08:58', NULL, NULL),
(126, 'Ms. Anne Kris Sr.', NULL, NULL, 'lizzie43@yahoo.com', '1-586-822-8246', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$UeXBl.Wu9VXGM97EY30t/.RSCYCd.ZHQLsL6qPZCy5p0DGeLCV89C', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-19 12:19:16', NULL, NULL),
(127, 'Dr. Kelley Mayer', NULL, NULL, 'zelma.wiegand@bergstrom.com', '+1.832.299.3119', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$7q4WjOSSxBd/hAG6aVclzOjWHyMVAW6XUN9KbW./71ESaIXImhMQ6', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-30 17:42:40', NULL, NULL),
(128, 'Reva Hickle', NULL, NULL, 'merl11@schumm.org', '(331) 504-4949', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$dgES9.zmZBQqUHmbpaPKWuheA8/8kRSt8sWn1YyVCkOCpCznXoC6C', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-02 18:17:32', NULL, NULL),
(129, 'Dr. Max Moore', NULL, NULL, 'kkonopelski@stracke.com', '(435) 485-2416', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$Mjup/U47ZhD31PZQSzZBm.xbI916itokTgNAhsxR8OZAKESPhRPPm', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-04 20:15:09', NULL, NULL),
(130, 'Janice Buckridge', NULL, NULL, 'morar.casper@barrows.com', '802-744-4952', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$dmVRq/5jMEOWDiIfSNrP2ucOUjUS4YXzzcHO2CDHH8e/HBLHAtyQa', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-11 02:57:56', NULL, NULL),
(131, 'Norene Borer III', NULL, NULL, 'noemy.bashirian@dicki.com', '+1-567-771-2683', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$7/MMUilLPefhyM.v.XDuw.9YRmKojVGxtSSxJ72vc/CT.LVWLgZ/6', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-25 21:17:00', NULL, NULL),
(132, 'Jovani Greenfelder', NULL, NULL, 'pfeffer.elisha@gmail.com', '458-375-2189', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$0q3ZqxrGeSRcGFrKgbj.p.w1y3M/2wc0cf2KIIh.QEnIGgTkermDO', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-08 10:58:42', NULL, NULL),
(133, 'Lelia Collier', NULL, NULL, 'green74@hotmail.com', '+1.628.628.6828', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$sTwfRrtWLXUT2MzQfEbyu.c9UOSK2AbQ6aV2jtasfuqLSvwpX1HlO', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-20 17:07:28', NULL, NULL),
(134, 'Prof. Alexandro Hills IV', NULL, NULL, 'chickle@crist.org', '617.564.0854', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$yR0gPRsiuHkTjiF0TyeDGuzpGxtl4HlVHWH52iSOh9fq5J1h/83X2', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-03 18:00:41', NULL, NULL),
(135, 'Mrs. Kayli Cartwright DVM', NULL, NULL, 'raymundo73@gibson.com', '+1-952-767-2260', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$PgCmgoNCbzbj7DaMUu7iYOLnzwpZpC0W52gaWODpMYDdVjb.EksRS', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-27 21:24:37', NULL, NULL),
(136, 'Jerald Botsford', NULL, NULL, 'neal58@corkery.com', '+1-561-406-0796', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$ZBtAR7py4LxkGQNx5NJ.nu71Cy7JF8fMI/ww5ne6ehD3yi0.zNGgu', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-04 16:45:09', NULL, NULL),
(137, 'Violette Deckow', NULL, NULL, 'zkunze@reichel.info', '(586) 298-8353', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$/yGLMG17T8Oew01zgrtQ0ON97dBquJKXfhEcCZ.zCHhz/U22wznFK', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-10 09:42:33', NULL, NULL),
(138, 'Izabella Towne DDS', NULL, NULL, 'kristofer.dooley@yahoo.com', '737-248-2415', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$bOWbWsjAJgi8UeZUJxg0DeaqgDwLHxOpcfDaJAZesV2hFENTHEabu', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-14 09:03:03', NULL, NULL),
(139, 'Mr. Trent Toy', NULL, NULL, 'chauncey.emard@roberts.biz', '(234) 900-5397', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$xIL6Cf62vB/WJ6oc4nGjZOGJffgplZB4qJGIMw0lda8yHDnb0KMR6', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-22 04:10:36', NULL, NULL),
(140, 'Brandy Jast', NULL, NULL, 'assunta.mante@casper.biz', '+12815124908', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$6yFarCm8dbA5GQdP0VsFLOkZrpecGHWgbU1bGsdeEGXdZl.H7uF4G', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-24 22:37:15', NULL, NULL),
(141, 'Dustin Hessel', NULL, NULL, 'gorczany.annabell@zulauf.info', '+12764108287', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$4m1AK2Rfzf4SQe1P1qhAjO6vtuDlixgiZpyGE/Ja0817eqNpKiFri', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-24 12:49:05', NULL, NULL),
(142, 'Mr. Jerald Wiegand V', NULL, NULL, 'dkilback@hotmail.com', '+1 (304) 991-7118', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$mVx8YmOY5oyCVXYqobaAR.JrmNYtlitC2Zq6D8REUq.uQlx2yo7Q.', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-14 08:27:01', NULL, NULL),
(143, 'Mathilde Kozey', NULL, NULL, 'megane.morar@lehner.org', '1-352-683-9762', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$M2ZKVQOEbSmk/OSyobGkeeYG8Oi6pF30NR6KAygGFjXrTzj7qcBl6', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-09 00:53:10', NULL, NULL),
(144, 'Mrs. Bette Rutherford III', NULL, NULL, 'alessandra.cummings@gmail.com', '+1.832.340.0934', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$6OhQFiR1Nh7./cS2xJnmQuoh0/jv4voaYn4d115zjVxLCBR4hPU9W', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-27 14:26:49', NULL, NULL),
(145, 'Maybelle Erdman', NULL, NULL, 'domenica.klein@gmail.com', '1-740-744-1163', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$1O9VLoOAof/5eDxBjZDTMu9t90SN2YhRBPXsAjEHkZTJsqCID9ErS', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-02 11:21:49', NULL, NULL),
(146, 'Adrienne O\'Hara Jr.', NULL, NULL, 'abbey.crist@stiedemann.org', '(440) 697-9466', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$6CrMUgeh25VZBL0fILXpOOe.a0W7JAfd9E.Oau33amXNp1QiJANDm', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-22 16:26:04', NULL, NULL),
(147, 'Darius Beatty', NULL, NULL, 'lowe.marta@mclaughlin.com', '+1-772-653-8902', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$7a/OTd95NaGl0OIUF3/OP.X.HMolTdlqLFVjKU70YQ8A8twwNH7.e', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-15 12:53:23', NULL, NULL),
(148, 'Gino Runte', NULL, NULL, 'carroll.john@dooley.org', '+1 (646) 555-1993', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$WnU/jsKGqEvS7AaKsrC5E.JagMxHQhanPCUYkDBD0XnPH3h3bto32', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-06 22:18:15', NULL, NULL),
(149, 'Juvenal Schaefer', NULL, NULL, 'lillian20@hotmail.com', '(870) 932-6047', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$awC3KjgG.XimGn.IQKJOEuCI8PKDjllXgDnLrwaKH55Nnd42MHqce', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-30 07:33:32', NULL, NULL),
(150, 'Prof. Marcos Waelchi', NULL, NULL, 'tchamplin@hotmail.com', '1-386-360-2173', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$OWeb57ae/J9JeX6F.aqJ5OsdZVjyHpK2vicyGobq702fnHhSweLJ.', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-01 06:27:50', NULL, NULL),
(151, 'Berry Johns I', NULL, NULL, 'francis.wolf@yahoo.com', '1-225-310-7421', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$NR4bikMgeTXCUGsVRmmLH.XYofbCa.8jjY57Z16bp4B4BkLNmxl.q', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-31 23:40:21', NULL, NULL),
(152, 'Gaetano Hodkiewicz', NULL, NULL, 'aileen.murazik@yahoo.com', '+1 (754) 546-1128', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$.ztRi9emoNRZVTupSUpX4ebui77GMVUYvuwTXGRaiYeD6tBtgN.RC', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-04 03:51:51', NULL, NULL),
(153, 'Marcus Swift', NULL, NULL, 'beer.jarod@becker.biz', '+1 (540) 739-8383', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$Tvv40H5Do3FCVgWSG2bde.ypYtswD5FfZORuj3qkuXQB00rFM1Iku', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-24 02:35:20', NULL, NULL),
(154, 'Mireya Fritsch', NULL, NULL, 'kristin91@brakus.net', '+1 (857) 445-8735', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$KWvFf1GHI5gHQbCpERL0Ku9T5HFE7aJyM/RNH7Byo/JmkNlCzEOH6', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-08 20:52:30', NULL, NULL),
(155, 'Laney Franecki MD', NULL, NULL, 'patsy.nienow@hotmail.com', '860.904.4531', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$50Yj9mcIaVc6f8/2A4Et..KmUnvzuxe3QvfB8CuYQpklG2f/vYdJO', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-15 05:09:09', NULL, NULL),
(156, 'Tamia Glover', NULL, NULL, 'volkman.oran@koepp.com', '(830) 732-5103', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$Iwsegvwbft4rrqS45NDRr.fYxeCb4waG02plmE3hCKvYFbiT8muy.', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-27 18:08:18', NULL, NULL),
(157, 'Judd O\'Connell', NULL, NULL, 'darren88@gmail.com', '(518) 755-5800', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$pIOOZv.tGvwve1XbNGCIleggY0CWbkU8xka3Q5xi7UeJD7B6QOB3O', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-30 04:31:43', NULL, NULL),
(158, 'Okey Emard', NULL, NULL, 'augustine60@white.com', '1-651-645-4844', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$WDsE.r8OMPCPKiWrw80do.JaAVDK4Oz1.6N8saItZ216xj8S3D0lG', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-23 01:35:51', NULL, NULL),
(159, 'Izabella Greenholt', NULL, NULL, 'xmarvin@yahoo.com', '689-243-3084', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$kQ3qwkNSjYOpcwckGDwGheAOZj3kXqkgKkaQDJGT5GL3CfA70cn.O', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-03 16:44:40', NULL, NULL),
(160, 'Paul Smitham', NULL, NULL, 'tshanahan@dare.info', '1-347-509-2068', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$JnHvyb7t58rDHKt5UrkywOpGo7/GNEV0q4pcaf91xpuMXA/Cbl5RW', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-21 17:28:34', NULL, NULL),
(161, 'Lukas Rohan', NULL, NULL, 'robin.bruen@ebert.net', '+1.319.654.6393', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$MovjnLsh3nMLHWnMsthB5e8ymr3c58lDWJv988GEtcelp5OlT6ey.', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-05 21:36:07', NULL, NULL),
(162, 'Rachael Nader', NULL, NULL, 'kiehn.zakary@gmail.com', '(585) 522-2566', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$iUc9mDVIrU36P509/nuXTei7k/CVfYGRfrXFzzqwXwVCB6qahOkwi', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-28 11:39:36', NULL, NULL),
(163, 'Sam Frami', NULL, NULL, 'betty.oberbrunner@hotmail.com', '(786) 417-6384', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$RBh2yGo2Nybutv5yHa4iEeccY1K8hV9SLemdOV3JF4YTV.Sic4fSy', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-13 04:04:33', NULL, NULL),
(164, 'Micah Daniel', NULL, NULL, 'augustus.metz@predovic.net', '341.347.8139', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$qJ3MGTUfLNzKMdQdIAFIu.2BU8IktcL5tkaYmEa5Hk0w7s3w4qjPK', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-14 22:05:03', NULL, NULL),
(165, 'Kaelyn Sipes', NULL, NULL, 'ihirthe@parker.com', '+1-216-461-6766', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$31Fu3CGS4jt.OhGRzTmm.uxTPHBdHHL/VDoAJ6BMfP1YIAaLuGdEC', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-29 05:36:38', NULL, NULL),
(166, 'Ms. Marcella Stehr', NULL, NULL, 'terence61@willms.com', '(254) 505-1270', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$m8sgiP4dPZoGds2JJOoY9ep4dRUzcm2eEU9gmwdYsbRnCXe75xZ0G', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-29 03:46:33', NULL, NULL),
(167, 'Dejon Hintz', NULL, NULL, 'xquigley@yahoo.com', '1-872-718-2990', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$sqnqngADyIx0Y7BqjrFtjO18hv10N9eqXyQYUcgWxFZcrUqOZkM56', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-02 05:23:07', NULL, NULL),
(168, 'Ms. Elissa Schumm V', NULL, NULL, 'oleffler@bartell.com', '(251) 221-1082', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$cVLd3/UUgx2035drKdrvuu//fYJyfh9sRpAgZHkxl/61m52uhAqDu', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-16 15:56:40', NULL, NULL),
(169, 'Keira Cremin', NULL, NULL, 'carleton.kihn@cremin.net', '+1 (564) 596-7556', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$MzBnGzkzahq/WXfAGPFxJuTsKG2Nc.UK1DviE/k1XQTS2Ym.ANoIy', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-23 23:52:35', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `phone`, `image`, `birth_date`, `lang`, `fcm-token`, `email_verified_at`, `gender`, `status`, `receive_email`, `google_id`, `facebook_id`, `apple_id`, `sign_from`, `password`, `country_id`, `city_id`, `region_id`, `verified_status`, `lat`, `lng`, `address`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(170, 'Wilfredo Gorczany', NULL, NULL, 'hagenes.carolina@hotmail.com', '567-495-2239', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$jkLDGBpX5.1OR0FBLjaHAuxD6U/zKUIUnXSW/UfqQDnwWAg07ykzy', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-26 08:25:25', NULL, NULL),
(171, 'Mary Boyer', NULL, NULL, 'lucious83@wuckert.com', '+1-364-538-6824', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$CvVYrTJbYeX0PnIrFtdGHu7SoEsn5YfSqqysvwIFyx3hbLZv.g9mm', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-13 19:35:57', NULL, NULL),
(172, 'Garfield Turcotte', NULL, NULL, 'liana.wilderman@purdy.com', '234-953-8587', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$BasTKQtV4SLf8Qaw2GIsaOuB8vNehV0gtLt7AU/io4r/o/GUFkf1e', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-03 00:38:57', NULL, NULL),
(173, 'Abagail Reinger', NULL, NULL, 'mylene.marks@gmail.com', '(408) 531-1165', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$FgPGWtg4o71v7cdKnRD2k.CCurj6D7j.k/cYgdkxFRGljFEwCFGxm', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-10 16:11:09', NULL, NULL),
(174, 'Rebeca Trantow', NULL, NULL, 'amurray@yahoo.com', '413-263-1193', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$o4tLhYiegiLhqDw1sWRGVeQKuONFMO6tpb3p8IzEA9kcknKxW.uXm', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-23 23:09:42', NULL, NULL),
(175, 'Melvin Zieme V', NULL, NULL, 'conroy.viva@abernathy.com', '(231) 213-5497', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$1hs8IKUw1zITTlTPon/FYuiGQStSyHVIxcfaYmq4EluThlEZCgm.G', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-03 08:14:13', NULL, NULL),
(176, 'Mr. Jamie Hessel', NULL, NULL, 'lou19@hotmail.com', '+1-701-398-5989', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$zRcSDUb//geqYQL7B11EOOeeHoxXVv4IgBxXu9dqbolR5eW3q2Msu', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-24 03:22:18', NULL, NULL),
(177, 'Mrs. Maida Fadel I', NULL, NULL, 'oconner.johann@hotmail.com', '+1.475.615.4556', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$cR02ohu/mI61msisEZxss.l93onIWXXkY2RVaQwjbuV3dB7bwIL5u', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-14 11:26:40', NULL, NULL),
(178, 'Mr. Cleveland Satterfield', NULL, NULL, 'block.reese@hotmail.com', '1-951-717-2594', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$TSw17eoFxRQCQm3BMy8rw.IvhMBzBZ3EzPKWa.knyJ7Aixnplw3Em', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-15 06:45:28', NULL, NULL),
(179, 'Elinor O\'Conner', NULL, NULL, 'idell.kuphal@bosco.com', '(574) 915-6738', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$YymK8MlcoulUHr3PJwf1yOY1HQVJy5wx2IojRQCy2WD5.CBr54h9K', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-24 22:38:21', NULL, NULL),
(180, 'Roel Larkin', NULL, NULL, 'edyth80@hotmail.com', '843-798-3862', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$cq5ARw0xPTzIpZ85/.gm7OVeEYet.jnKxhScq6VuwCb.sWhVV/8OC', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-01 05:02:36', NULL, NULL),
(181, 'Edna Batz', NULL, NULL, 'liliane33@gmail.com', '+1-585-737-8769', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$Ptlo/22MIJ5AW.LgvAGpNuNYWzf2keAqJBusJH99oHp18f7h2PF3W', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-20 21:01:55', NULL, NULL),
(182, 'Mrs. Bethany Wolff', NULL, NULL, 'leannon.edwin@yahoo.com', '540-957-2468', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$2X1D/Ikams/q9p276iOCf.5mYHblNq9svEbmobSd7631aA0Gvg7m.', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-02 06:26:40', NULL, NULL),
(183, 'Prof. Jennyfer Dickens', NULL, NULL, 'tkertzmann@hotmail.com', '+1-573-417-2721', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$AdiK/eTB0pDqVuH5d8xWBeCjFBLnGf657khc/4HLCgryvoZL1uA3C', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-03 07:23:44', NULL, NULL),
(184, 'Prof. Ken D\'Amore', NULL, NULL, 'lockman.kaylee@hotmail.com', '+1.615.415.9322', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$8bRh.9Kcg.O821PDIg8YTeGZgDn7yE..veVTKcD4zQklMdpr7k/GS', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-10 15:01:16', NULL, NULL),
(185, 'Rosamond Bartell', NULL, NULL, 'bweber@yahoo.com', '(502) 589-1989', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$ChLJ./eX5X2f5Be1LvxYXu1MtyvrajRKWqg/HNPDmZWr10TvsHWha', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-25 15:06:36', NULL, NULL),
(186, 'Kamron Hermiston', NULL, NULL, 'brooks.glover@hotmail.com', '+1 (949) 675-4209', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$XvTMKZu8YI.FNxG2h3Qwue7XRDBydVFEmyhKd5WqV9E9KqvFjlx5u', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-04 15:57:46', NULL, NULL),
(187, 'Mazie Reynolds', NULL, NULL, 'alexandra.farrell@schaefer.org', '1-862-962-6855', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$f4nLavwQeTHYvkKavHXH.eSb5BZMZWb4Mi6Td1eSK1Koapd4lhNL6', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-29 04:25:16', NULL, NULL),
(188, 'Marilie Brekke', NULL, NULL, 'ptowne@bogan.com', '1-704-449-0581', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$56y3afdhZsdM15w4Vhi1H.tGBcb4NCghFQlm1K6PKIkqW8AmTb/Wa', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-07 07:59:36', NULL, NULL),
(189, 'Ivy Purdy', NULL, NULL, 'mgreenholt@rath.com', '+16179856182', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$AxhT1QwocvX4grVXPVG4iOJIiJN7RwNB4RnrFFDd8Ll0fDJNJjSdy', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-18 06:22:17', NULL, NULL),
(190, 'Conner Hauck', NULL, NULL, 'hackett.selena@ferry.com', '262-534-0430', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$tqcjTWQANkX/CVlnZkYLqeGLTZwDKRl4klpb1SFv/O9ibn64eY7Ce', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-02 23:29:39', NULL, NULL),
(191, 'Trevion Ullrich', NULL, NULL, 'torphy.retha@hotmail.com', '1-937-560-6907', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$bSmepcSWoEZyjmO5VIwPVeIhk59gsVH5fGcVyAB5wsaGASv96w.6u', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-28 20:09:52', NULL, NULL),
(192, 'Mr. Marlin Tremblay', NULL, NULL, 'angel93@yahoo.com', '+1.385.637.0490', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$LFolTyjVZrjftiJ4nkjW/eNcQ.dB.aoZ0Keu1LMx84zI32hUJEPla', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-30 02:23:44', NULL, NULL),
(193, 'Ms. Vicky Kuhn', NULL, NULL, 'annalise89@hotmail.com', '+1 (413) 903-4584', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$AgC.RqDse./sAyfU/Fo8aO5f7rnkyqV2AttLpC0zpdL2UBc0FuXDG', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-13 16:14:03', NULL, NULL),
(194, 'Joanie Bruen', NULL, NULL, 'briana25@yahoo.com', '(813) 580-9090', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$AiCW9eOT.VSafPX1Zg3L8ulqG.xNxUVFTeyvPN3eGX/NA3SEup/Qq', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-22 18:53:01', NULL, NULL),
(195, 'Myles Bogan', NULL, NULL, 'altenwerth.keven@hotmail.com', '931-664-8082', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$h748a1/U1JXD/h.CBDuPteB/hwBvbnEoOkuGxnd66kEpQR.1dO12e', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-02 08:45:40', NULL, NULL),
(196, 'Houston Bednar', NULL, NULL, 'winfield68@robel.com', '(520) 298-0234', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$AWs/Bv0yei.wuLqXy2K0NOg/f8bRhoUlrscIGGij9WugApKI86OkC', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-29 09:23:08', NULL, NULL),
(197, 'Parker Hickle MD', NULL, NULL, 'lveum@barrows.com', '520.653.0244', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$WodXN5I50TMmqP7h.oHKw.NWGG4WxG4auG5WuZdvGuTeFsOqj4qN.', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-16 19:07:50', NULL, NULL),
(198, 'Ahmad Hills', NULL, NULL, 'brosenbaum@becker.com', '(239) 427-1719', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$a6WtT.f7mexc2sV6tB8wd.BzdgfE8uPyNU31hu1bAz6BDR.AdrMVe', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-05 14:35:01', NULL, NULL),
(199, 'Zaria Willms', NULL, NULL, 'lauretta94@gmail.com', '815-899-7826', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$4VQUprr/N4naimCR7XTolu.0ipon.TrYv3u0WlyO1j.KML4OVGVDW', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-09 07:49:51', NULL, NULL),
(200, 'Brooklyn Cronin', NULL, NULL, 'raegan.kuhlman@predovic.org', '272.631.3723', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$vvSnlpq9ouCM7sneDbvzI.OMqK1FqtQTRtwgt112hUTuAYUneOtUO', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-10 15:12:22', NULL, NULL),
(201, 'Dr. Toni Cassin', NULL, NULL, 'faustino78@hotmail.com', '346-525-3438', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$g/UWIfNzv9O..GylD.QaseGpL11cQt4IT.eX2TBxvHRpWQtrm1Cly', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-05 11:52:02', NULL, NULL),
(202, 'Ramona Feil', NULL, NULL, 'lgibson@gmail.com', '(731) 913-7408', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$SLsfX3hdasRm6kWntPCyNOP11H0QgA65bkUcqxlE31ncM2DqqNUxC', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-12 11:30:13', NULL, NULL),
(203, 'Edna Keebler V', NULL, NULL, 'bsawayn@lang.org', '+1.832.580.3905', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$cLLxxPM3njyxfI9QvJ6ajOiR41OCPzkurUpBtO.NTaeGL0HfaIq2u', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-05 11:06:57', NULL, NULL),
(204, 'Jocelyn Deckow', NULL, NULL, 'ihand@bogan.com', '(985) 861-9442', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$OT8Gl5HTI/JvUl7QCVyuOurhsxtbhZ1TQbU1Q8OI.oc4ZWgEOSzJK', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-22 00:13:33', NULL, NULL),
(205, 'Aurelie Parker', NULL, NULL, 'barton.elise@leuschke.com', '930-627-0989', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$JkGe1NJtnWJ9wpGiq9rgauSZB6ix2eO/O1iRpjNDabgHaj4otbvlm', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-18 03:46:40', NULL, NULL),
(206, 'Mr. Elijah Schinner PhD', NULL, NULL, 'lourdes.becker@bauch.com', '+18048608424', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$W8.bxhtV6WBLuG5f6ugvfuDA4R3nNUohmqXdodRNakdYcaZzWSqdO', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-05 21:10:58', NULL, NULL),
(207, 'Ardith Harber', NULL, NULL, 'cassandre.metz@heller.com', '(442) 327-8273', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$FIUFlR5DqVMVhE81T60kqOedfYo3htAcxjcxrBoQqeYKKVssR7HHO', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-28 19:40:24', NULL, NULL),
(208, 'Beaulah Ferry', NULL, NULL, 'vrunolfsdottir@gmail.com', '781-321-6533', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$cJL2XJ7ro5igo45FAo5h1u./ZOxpaX.61A41IcRkt7P.3OH0U0oRS', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-24 16:50:55', NULL, NULL),
(209, 'Miss Theresia Rogahn', NULL, NULL, 'aschuster@langosh.biz', '+1-617-873-5966', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$0BosI6nR8UYnXX3S7y4laOtaWIKtkB6/DGUagn2BKgWPPRHunBeS.', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-22 06:49:44', NULL, NULL),
(210, 'Heather Dickens Jr.', NULL, NULL, 'lexi63@gmail.com', '878.249.1358', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$bh.pgc2dt6nIuzaX93/i/uilKjkpcYsvW.yIBjpSxHPMXLfZcho1C', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-03 19:56:06', NULL, NULL),
(211, 'Harvey Russel', NULL, NULL, 'tamia.crona@yahoo.com', '260-343-0432', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$kZOdM3H./NLviyrdJ37oQeIvhoAntVuDxd534PK9li96RV1fYJi5i', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-14 04:15:06', NULL, NULL),
(212, 'Jane Thiel', NULL, NULL, 'soledad46@bradtke.com', '+1-661-645-3342', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$OUEYFCMLgwxjN.UgV7gPMOIbtfUCSH/VR9Jt6W3xFJuxU4lmBJS7a', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-11 14:34:54', NULL, NULL),
(213, 'Laila Ankunding DVM', NULL, NULL, 'lueilwitz.emelie@gmail.com', '272.498.0886', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$8SckXUtowgkLVC/cp0f00.KMd03HOddrrAJA4d5o0pGQx3UIOCF32', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-21 12:15:47', NULL, NULL),
(214, 'Kenna Von', NULL, NULL, 'dkirlin@yahoo.com', '+1-786-408-5913', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$a2SrnYyanAUW2Mnyw9Yp9.zKyoj/qG07nu/2S7o1/9I2wiES/qf7e', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-16 12:30:20', NULL, NULL),
(215, 'Muriel Hudson', NULL, NULL, 'bill87@weimann.com', '+1.971.595.7857', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$sUGiakp0JZ.8eg9ZDL9RhO/BFvXWMrAnHje83BFwUnhQe4.BHHYES', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-16 11:15:03', NULL, NULL),
(216, 'Prof. Alden Gerlach', NULL, NULL, 'luettgen.weldon@leffler.biz', '(769) 479-6085', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$Rmk4jPCi3hsl8CcWFByYEe/cqVzAqZZ5R1bi994YZZhdwd0ojbK.W', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-09 21:10:38', NULL, NULL),
(217, 'Creola Gibson', NULL, NULL, 'sanford33@yahoo.com', '+1-757-679-0205', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$nNk/bxKLyy6rzB0aviu2CO/AIsAA1wPTzxlHOpC34JT4/5iYh7h8i', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-29 07:12:19', NULL, NULL),
(218, 'Sydnie Jast MD', NULL, NULL, 'wilkinson.fatima@braun.com', '971.488.1718', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$mpqzAflcdy1MFRniFs2XhOPFnk51incQXhgEBWiCq.1xItI1M8EuS', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-11 04:43:56', NULL, NULL),
(219, 'Mr. Owen Osinski DVM', NULL, NULL, 'dbrekke@gottlieb.net', '254-916-0798', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$/5FWOseVWEF4U9x.DI1Aw.6w0mI8EMhYw9PNNa2yLgXxJ65/MGNeO', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-05 13:20:33', NULL, NULL),
(220, 'Estevan Streich', NULL, NULL, 'willie.wisoky@gmail.com', '239-515-2495', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$XVz1vSeTeNfoi5VwsC2f.uhXacpIwFHcyWuPGrTxVX.n7YlPDFywe', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-27 03:11:13', NULL, NULL),
(221, 'Alexandre Swaniawski', NULL, NULL, 'wkihn@hotmail.com', '347.443.2471', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$7wcXIdOKyFv0ynJ8CbKQBOUKgu4pqiV4uutcdfL80.khJRzrs6LbG', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-08 23:16:54', NULL, NULL),
(222, 'Gage Sawayn Sr.', NULL, NULL, 'sallie.miller@torp.com', '940.626.8958', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$cbT5hTMUHykFNeMb/FhV6e1GiWSQeZdp4mvb0AhVLSxvZLZq0MQNK', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-27 13:18:22', NULL, NULL),
(223, 'Glenna Zulauf', NULL, NULL, 'joanne.cummings@hotmail.com', '+19252182626', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$6aKaa6lCLM7kEWk8pQc7EOX6fRoiKCGKwKQidp7vhLGHI5RhIXmwi', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-23 13:50:49', NULL, NULL),
(224, 'Tatum Hills IV', NULL, NULL, 'pete.powlowski@yahoo.com', '+14585947101', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$DOBUuu5/d8.hxIuANyVVhezVVnA2klbERvWZYApVPJIRhuhD8VF6W', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-10 02:15:49', NULL, NULL),
(225, 'Hans Ferry', NULL, NULL, 'oroob@mosciski.info', '513.734.7969', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$WILdy4CHAOCl6TJt0bZu1u4xh2vnYg/gdn8XV9WGtom5rB64xjFC2', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-30 14:11:45', NULL, NULL),
(226, 'Ms. Aniya Stehr Jr.', NULL, NULL, 'macejkovic.christelle@boehm.info', '(854) 375-5497', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$XgdThl2Ti/sWjMW8KUm44e4jLNXQSyvbfxA/.FpwVjZPx.XesLiey', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-17 17:22:19', NULL, NULL),
(227, 'Oral Kling', NULL, NULL, 'ivy07@satterfield.com', '1-973-709-4874', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$Ix/o0cqc4Zm0ctHfgfm.VutOPPYX32xBl51QAQfn5vdwO7hwv8OxK', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-23 03:38:41', NULL, NULL),
(228, 'Teresa Kovacek', NULL, NULL, 'marquardt.shane@koss.net', '+1-949-877-4524', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$d4yyHVNpnVaJwhjXqkkEouU.5HaA2yOIKC4NJzo0yajxtMmuTpTmi', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-11 10:47:54', NULL, NULL),
(229, 'Prof. Cali Smith MD', NULL, NULL, 'buster.cartwright@vonrueden.com', '1-217-971-7908', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$7EVENp2n71/wZVMz5ArpqOyFGbo7iPAVniOw46iWjzEqIH.DTezZC', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-03 18:47:20', NULL, NULL),
(230, 'Cody Daugherty', NULL, NULL, 'emmett.ryan@mosciski.biz', '+1.830.869.0170', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$cjm7QJIpXsI45Ur77O8QFOndNKL8vnZIhZGVCYu7zjGqlsFhNqwp6', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-20 00:00:50', NULL, NULL),
(231, 'Ms. Zola Wyman I', NULL, NULL, 'whuels@hotmail.com', '510.994.7875', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$4qgL5yUUM25kqjYUdgfBBe5u7WIvYlksk7x/g2qzjX9wlSkKiqgYi', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-15 20:20:56', NULL, NULL),
(232, 'Amos Oberbrunner', NULL, NULL, 'zboncak.floyd@hotmail.com', '+1 (563) 786-8007', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$tmEUyrBn8G0P2gXXc/F1K.W.fZuoBTEFxFPyhzf/.U3B9wRaoqv/G', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-02 21:36:26', NULL, NULL),
(233, 'Lourdes Bruen', NULL, NULL, 'erling47@yahoo.com', '(727) 893-3877', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$mBxlw9KD6F9H8cAWIFw9mOCUc7Ps1CTCEYZlRJ6Oy3eaUOkGODmX.', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-11 00:11:59', NULL, NULL),
(234, 'Maida Hamill', NULL, NULL, 'bette.orn@yahoo.com', '(559) 443-5032', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$HhDN5Kpicvq9fSKLYEI6C.YCCNjyIFPZg9aDg8jUcAOHgKZF6im.y', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-27 11:34:02', NULL, NULL),
(235, 'Prof. Arnaldo Wilkinson MD', NULL, NULL, 'jast.sincere@rohan.org', '+1-713-522-0811', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$6vmd3n7TmDr90LnmTTMYbe82ARP1yES6bWgPyoq3OHEsx8IsfFcBa', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 04:02:28', NULL, NULL),
(236, 'Elza Skiles', NULL, NULL, 'lempi38@bayer.com', '+1.484.717.2303', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$wrgZUBgEj.UTOEQPoal9H.F9hic39wQBOJauEvK7apIGsflsj20nS', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-06 08:22:21', NULL, NULL),
(237, 'Prof. Kristin Pacocha V', NULL, NULL, 'mertz.pedro@gmail.com', '+1.813.687.0824', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$2sdPnQxw7P8Ldr5d.vyu3ep7d1LB/.xNGfWO2JSmQlX2EPIa8UKAa', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-25 02:02:30', NULL, NULL),
(238, 'Prof. Viviane Towne', NULL, NULL, 'kiara19@gmail.com', '660.596.4161', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$o5ggOoRyg/kiGZIE.ramB.z4.z0oACiK1n49Y7jdhdZ/D8HLrB4Nq', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-24 19:39:14', NULL, NULL),
(239, 'Garnet Schneider', NULL, NULL, 'malinda.hackett@pacocha.com', '608.672.0262', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$mTOzQQXGQIQBPC9D/JZQM.ap7q66c8Cc8GDRaVL4/RZbhAOaktFWe', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-28 00:12:29', NULL, NULL),
(240, 'Miss Mabelle Swift', NULL, NULL, 'mcclure.lauryn@yundt.com', '1-531-488-4655', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$olxtJF4jZzG1Uns/sPcU5.yajBGrcMDoY3UPwaergvRCcjPRvWYz6', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-27 07:14:26', NULL, NULL),
(241, 'Lee Crooks', NULL, NULL, 'jayda10@hotmail.com', '+1-339-416-5924', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$pmEd/ltNDHwhlUdO8b65cOEhELduB8Wl40gcqROtGzuypAFrB6nry', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-04 19:10:41', NULL, NULL),
(242, 'Betsy Waters', NULL, NULL, 'gpfannerstill@farrell.com', '+1-930-202-8136', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$IAFV4yZwcyd7bbSzvVFVieqDRN9ejhC7xZewJVf0tOAPNsrXjZWjm', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-22 19:35:03', NULL, NULL),
(243, 'Prof. Enos Erdman', NULL, NULL, 'cleora93@hotmail.com', '+1-402-891-9705', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$EHFFMZKRR2/k6yWMhv2PIu80Z4xEbdlFDetio8dgemPEJ0LGePf8q', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-11 13:11:12', NULL, NULL),
(244, 'Dr. Javier Altenwerth', NULL, NULL, 'schiller.oral@mitchell.com', '309.748.7112', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$xkJOkS6iZQ4/RBvD8qyubei6SNuQElvsaJ0nDp9yqCcDbAfYTTdny', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-03 12:04:17', NULL, NULL),
(245, 'Guillermo Heaney', NULL, NULL, 'jazmyn.oconner@gaylord.com', '+1-539-671-3825', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$0MRwY/NKaZzp2KR/JNjmCuNhFH994H8GUeNoRlpwujPTeHKXRanoy', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-18 00:26:45', NULL, NULL),
(246, 'Jedediah Schulist', NULL, NULL, 'aniya95@yahoo.com', '+1-301-263-0794', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$V2cZaXlNEG9KrnJTRa.HF.wTQzpeqT283hkNg/Ulaav0A.1WHdBqq', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-13 21:02:26', NULL, NULL),
(247, 'Stewart Rau', NULL, NULL, 'dooley.laney@yahoo.com', '281.618.3414', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$TWTjOZcoi8X60GCHpCcoA.4.amPwCHODMSj0WQ9nnZrVvAwLoXRtu', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-12 08:08:48', NULL, NULL),
(248, 'Edwardo Schaden', NULL, NULL, 'eluettgen@harvey.info', '(361) 401-1800', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$gtaF/Q7F2iHf12vj47WGq.wounYqz2suBUU8n.4bqziLt77jwxZTS', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-13 07:17:44', NULL, NULL),
(249, 'Garret Klocko', NULL, NULL, 'jerrod.hodkiewicz@connelly.info', '930-993-1546', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$NHhaqIWMd825ggK4a3NWxOz5n4NNaZkJ.FFh7qspbBQBpkC0exY8C', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-08 16:31:33', NULL, NULL),
(250, 'Cassidy Buckridge', NULL, NULL, 'charity74@gmail.com', '925.723.8964', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$avnk5ysgQilQSbBGufwBU.uyN6ZHEK/zXXUWa/7tt40clOuUikhBi', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-18 18:09:48', NULL, NULL),
(251, 'Ferne Balistreri', NULL, NULL, 'vfarrell@bayer.net', '(463) 840-3353', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$VxFK/fNy/8DkIYPLchMT7ua69YHeI/ZNxZvFXrrWbwGWiB6o9zn2i', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-19 03:09:44', NULL, NULL),
(252, 'Jarred Yundt', NULL, NULL, 'towne.ulises@yahoo.com', '(228) 670-7722', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$fn4NLu9E9VASL1MrilAW5.r.pzoMPJsJiE9c.eJkv4JF7.aVu/0j.', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-02 02:10:45', NULL, NULL),
(253, 'Destinee Rice I', NULL, NULL, 'jeffry61@yahoo.com', '1-224-402-8458', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$Y8lLtgNZEfZnRUYd.KtbAOUHq4L4.UCYqZ7owBrGY3Xs7ghU7rZLy', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-12 10:44:13', NULL, NULL),
(254, 'Kyle Zboncak III', NULL, NULL, 'wilderman.avis@sanford.com', '+1.713.626.4018', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$JjfNJORgo9f73WPplsYfn.WTAVNPGHWRHum34plbT4kzw3HnUALfm', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-15 01:00:47', NULL, NULL),
(255, 'Kieran Volkman', NULL, NULL, 'cecil.hamill@treutel.net', '1-516-714-9045', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$QaAfYsxhUxyB3vAOSjC3t.C0/TDRqRpavIEvHEFIL4/9MIbehO8rC', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-02 14:24:55', NULL, NULL),
(256, 'Alessia Breitenberg', NULL, NULL, 'utillman@yahoo.com', '+1 (316) 912-3261', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$yJgIK.MHuH.ppk8dACpZUOzgN8mg6Txv0nd2Wvh.dawVsbQXsEJ8C', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-14 23:30:48', NULL, NULL),
(257, 'Maurice Metz', NULL, NULL, 'elsie.dare@hamill.com', '346.491.5731', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$myRKPt7kpXhSpmUwA8oLfOmfztrGdv1NLzzD..8I9SVj19pKWoB1e', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-04 18:16:46', NULL, NULL),
(258, 'Earl Reilly', NULL, NULL, 'adaugherty@balistreri.com', '+1 (820) 766-9692', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$uzLSvno9y2XGM5zDhcH96OkDHw5wV175O95HF2PU6Z4Wbl0x6oFwi', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-11 07:18:11', NULL, NULL),
(259, 'Rosamond Torphy', NULL, NULL, 'jschowalter@dubuque.org', '669-852-7355', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$ysFFnatnqBOta7C/7jYkwONEB1fCPQeuI3oeBo/8eQ7V/FdHxbW5.', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-27 09:11:05', NULL, NULL),
(260, 'Hilda Beer II', NULL, NULL, 'jade.johnston@yahoo.com', '520.356.7865', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$EIuCcELjvuFAXuRKnLfnQO3LSNqbues3UX3Yk45iaNK2//shiK0zS', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-01 16:03:43', NULL, NULL),
(261, 'Nicholaus Reilly', NULL, NULL, 'geovanny.lang@yahoo.com', '609-307-8181', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$Yt7KW7NfUpwxKtKmxtE5EOwehvGuEEU8kbGEkHk9080tBJ63RN7Bu', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-28 13:10:11', NULL, NULL),
(262, 'Prof. Marlon Collier', NULL, NULL, 'cleora.bednar@gmail.com', '1-978-230-3630', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$2gTI/UDBGwEsDBekQbVoZOBCxqO2SveLDhf06EOO8bp6/8z0k/k7K', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-31 19:36:20', NULL, NULL),
(263, 'Libbie Gerlach', NULL, NULL, 'amurphy@cole.org', '+1 (612) 405-2422', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$ouulGnUrc5mv4YnZfzR2QOwyrW3vsL4mlHcH2.SmiI8AQa3A9u82e', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-07 20:17:55', NULL, NULL),
(264, 'Delbert McGlynn', NULL, NULL, 'armstrong.coty@raynor.biz', '+1 (959) 906-1813', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$N4mD52OE9wgcAfaYXnEmsuS.5AYSbKoR9ocCuoeoilY0.ZAXakhWC', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-12 02:14:33', NULL, NULL),
(265, 'Maudie Wiza', NULL, NULL, 'brekke.pierre@hotmail.com', '+1 (715) 990-2252', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$/70qSyuSCHLvLzk676THTuoSQ6UL/3bfovA/zSzqUs.TQWY9b/0pq', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-30 14:11:34', NULL, NULL),
(266, 'Kade Kulas', NULL, NULL, 'torp.ronny@hotmail.com', '+1-260-653-3016', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$g.DbjXgjmRYJxrKd2cIu7.w8eq/YMDX91xwRCqFk4Fh8Hvp2HbOSG', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-14 20:06:52', NULL, NULL),
(267, 'Miss Celestine Schaefer', NULL, NULL, 'zoe27@yahoo.com', '785-586-3966', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$JOIdoG3SxsrTFKMxT9jkj.1m.OZOqqLI0F9My4NnccglSTi/8t2yK', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-12 03:45:47', NULL, NULL),
(268, 'Deron Ledner', NULL, NULL, 'tbeahan@hotmail.com', '+1-678-758-3317', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$9Km8ulTf5I6EkDvXjDCm2OTEaHRb8dKTZ7STirJxc7JiHQorC8m0u', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-30 09:23:16', NULL, NULL),
(269, 'Prof. Sheila Flatley', NULL, NULL, 'julio.predovic@turner.biz', '641-499-0381', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$rcbZcgHDzm9gHU3r5YVDqO5Yz/9OCOIU4tZt9RxIigsruI6MsQu.i', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-14 08:26:11', NULL, NULL),
(270, 'Jedidiah Brakus', NULL, NULL, 'kamron08@rutherford.com', '+1 (352) 602-8497', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$QbMoxnHDTWWt.PYSlWRZQOF52GIaprvI/06aMGwV1JilhwTFsPDAy', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-29 03:58:20', NULL, NULL),
(271, 'Therese Durgan DDS', NULL, NULL, 'mercedes66@kautzer.com', '1-818-294-5919', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$1MxSteSSZpSXcJoSmiZYMeWCUrg0.ZGXJ0cIR4XocnoOUrU9QEAie', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-25 12:46:13', NULL, NULL),
(272, 'Camylle Bins', NULL, NULL, 'gunner68@kohler.biz', '+1-320-947-3281', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$IwKhQorrBdX3Z3s4ZnX58.j.kpenaKAlJpc31SrWvI2o8yl/XiyKG', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-13 05:30:18', NULL, NULL),
(273, 'Doyle Lueilwitz IV', NULL, NULL, 'orn.mazie@gmail.com', '(323) 601-6011', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$qc2sl9sxgCqrL1LumThUN.3XIhdeBtIv4rXCXOMtTgw2RfRFOK5w.', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-12 04:32:11', NULL, NULL),
(274, 'Hailie Steuber', NULL, NULL, 'mhaley@gmail.com', '1-580-261-4375', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$IUyvG8moS8vsaGMxSR3JU.vp8TzyAJtoJeWIf5vamAxPUGjB0G3HG', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-12 17:59:36', NULL, NULL),
(275, 'Cristobal Hoppe', NULL, NULL, 'justus.gottlieb@jacobson.biz', '+1-364-768-9685', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$rEAHudMk9YlhDXHUqr23ou7O2WfoWpDJFE9p5hN1AFD0P.GAq0h8C', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-10 13:54:14', NULL, NULL),
(276, 'Sebastian Borer', NULL, NULL, 'humberto.wintheiser@yahoo.com', '765.418.2227', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$Um/M3LpCAqq.SkmHqj545.r6A4hr64QaNl7Mp5b8TVqZhixyWVGOi', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-21 09:16:54', NULL, NULL),
(277, 'Brook Donnelly', NULL, NULL, 'anderson25@kemmer.com', '+1-309-709-9818', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$e.t0IYbWFpT6leuTvwsGGOMGB/0ZPCGn.U2RI99AYl7NxciFkcHSu', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-04 21:14:20', NULL, NULL),
(278, 'Rosamond Ferry', NULL, NULL, 'trystan.terry@hettinger.org', '+1 (814) 381-5631', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$u6jfWviqGM55DxinE9g6Cuvws/pDoAQjDnwGlgC6b2FjFJBgtfACW', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-01 17:05:58', NULL, NULL),
(279, 'Trever Braun', NULL, NULL, 'qbauch@auer.com', '+1.806.380.6447', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$kqKca77DRt1I0QKTT55RiuBNSto5TMXKFRzIX3f0J37PQkR7YN.rq', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-12 06:19:05', NULL, NULL),
(280, 'Johnpaul Pagac', NULL, NULL, 'loyal.gerlach@yahoo.com', '234.316.6979', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$4pRdWBYWpPO5DtkX02OYa.xPG2DTHFPKVeLe7krERZqKyResFkQiS', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-23 01:55:11', NULL, NULL),
(281, 'Ms. Breanna Nienow DVM', NULL, NULL, 'jacey09@kuphal.biz', '+1-914-818-9378', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$gMFjy63bu4wO05A36HF9w.5Kgkf4JJVvH8GxfyFRDOIWos5cTKMCG', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-01 21:24:18', NULL, NULL),
(282, 'Prof. Jazlyn Zemlak MD', NULL, NULL, 'wcremin@gmail.com', '+1.320.789.0806', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$TxIYNp0bcyc1EY0OQ.pc8eNjVNgF7U7Z3HZpUSM/errUzxJq/uuvC', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-09 07:26:27', NULL, NULL),
(283, 'Ms. Bonita Hickle V', NULL, NULL, 'samantha.anderson@cummerata.com', '1-940-391-6739', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$q5PyZM2b9ZoH.yE9kD1d/utPfMXKN1sr7X6blBW40QGejyIfsjRtq', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-11 15:21:59', NULL, NULL),
(284, 'Gideon Stiedemann', NULL, NULL, 'mayer.zora@streich.com', '480-802-6984', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$DruAw1TJrbXXeY9BI514ceXYO4EmH7Fq3eti3ucEN8wSK5fhGm1Nq', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-10 04:04:12', NULL, NULL),
(285, 'Wilhelm Schoen', NULL, NULL, 'lenore60@schimmel.biz', '+1.475.325.8811', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$EHMQUb7hrAtDuBNAQVHDvet/lmw3j/hXEbqzEs8Sw4VHP4kkaPA32', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-04 14:37:04', NULL, NULL),
(286, 'Prof. Vicky Sporer', NULL, NULL, 'velda.emard@yahoo.com', '+1.929.796.1188', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$Aoi7XGsMj2ugbRokkbraieb1g9yilgZ/Mv10wiDBzuiaW97oO2oQy', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-02 08:36:33', NULL, NULL),
(287, 'Dr. Imani Cartwright', NULL, NULL, 'adrain.mckenzie@stehr.biz', '1-541-341-4172', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$ImqTFwZPBRZySXIwGzOVuOKf250oqmAc6Dh4ouf5c34ikT2Hok1VO', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-17 15:56:33', NULL, NULL),
(288, 'Ms. Norma Kautzer', NULL, NULL, 'keeley23@miller.org', '(623) 655-1890', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$mESc067JgKuzPT7h1EFuheitIWV4p5dLHOXJphNbuCX5CcHssyhNa', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-29 03:49:09', NULL, NULL),
(289, 'Mollie Willms II', NULL, NULL, 'rroberts@yahoo.com', '308-442-6433', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$eqkg8AfJ5ZsZUHmuJbm2NOHEV3Pew3sNLFMfiOUyCl6ABfL1YJo6i', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-02 22:29:01', NULL, NULL),
(290, 'Dana Altenwerth', NULL, NULL, 'wwillms@medhurst.org', '(586) 722-1695', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$UOfJtzVk/RPxYe1ziqE1xexKjrlXoU8H0KdN2scefoqS9cfSfULeq', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-03 09:03:14', NULL, NULL),
(291, 'Kane Hahn', NULL, NULL, 'turner66@yahoo.com', '1-262-318-3341', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$pIgqHk04Naq8fdlE.2wMNerctF3w8Ph2zKISUPtO0aS/21.kEJXWS', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-26 19:19:15', NULL, NULL),
(292, 'Malinda Weissnat', NULL, NULL, 'frank86@dibbert.org', '248.394.3241', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$XQK/VeTjyW0khFDtCPeh5OIGWLHUXpT3Zrc8mevEhcpZIEC1GOGT2', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-27 06:40:51', NULL, NULL),
(293, 'Shaniya Trantow', NULL, NULL, 'muller.coby@yahoo.com', '(534) 599-8191', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$qR7JoNycjr1Aa/NccGPuTuueeKIOy2chgyBmw.VWC/7a0UQarP5fq', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-12 07:06:19', NULL, NULL),
(294, 'Prof. Eusebio Rodriguez', NULL, NULL, 'cdoyle@gmail.com', '+1.551.514.8008', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$5h2kwmq5N1uqa4zOnwj6nepskfz89XqXdqrbDJJ/6HvzXTKhgpVY2', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-24 04:18:03', NULL, NULL),
(295, 'Jarrod Johnson', NULL, NULL, 'jones.gus@rutherford.com', '+1.580.216.2713', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$5c1Z1b7EGl2MMWrGuAjRDeZZvXAPuVuLRjsIG8j9MOHI0BMAEzb8e', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-06 15:29:14', NULL, NULL),
(296, 'Miss Yazmin Reynolds MD', NULL, NULL, 'jadon.littel@hotmail.com', '1-657-361-7528', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$4kSXROPazarWPORP9jxMuOqhRwCpitTboifN5eqYmCOtqc4NpYTCe', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 23:35:51', NULL, NULL),
(297, 'Theodore Walsh', NULL, NULL, 'xbrown@cartwright.com', '+1.252.398.6789', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$Y5nL4aOyoLZEX04x.Hr7.ut0/HJ/oNLosVMpeNNkpb8cV7zngVOEW', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-24 12:22:25', NULL, NULL),
(298, 'Isaac Walsh', NULL, NULL, 'shea.ondricka@schneider.com', '+1.220.204.2181', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$ckYfQzo6bl2sKGv/AIkEbujGzbF18Po5NFyUNHswm6d0fmdAkSXC2', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-17 08:05:24', NULL, NULL),
(299, 'Lizzie Tillman', NULL, NULL, 'cmohr@hotmail.com', '(640) 292-0489', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$bALbbzyC.1w6nn72dSYmR.fw21Gto8ALhjKu.5AFrisQkjJR0IeSm', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-13 17:00:23', NULL, NULL),
(300, 'Lori Quigley', NULL, NULL, 'fritsch.amelia@marks.com', '646-593-9935', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$zj/FeAZ5Vp08YsJ9C.K.YubWyqXe6/m4/paD8dB.JikZJK4x92Gbe', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-21 22:42:04', NULL, NULL),
(301, 'Dr. Grayce Schimmel', NULL, NULL, 'schulist.paris@armstrong.org', '(602) 452-0612', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$zG0N4uTBFgeV6SwscZjwuO36SozY7kr22YGJtz7S4E0f/adZqzIxK', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-12 05:16:46', NULL, NULL),
(302, 'Muhammad Wolff', NULL, NULL, 'lbernhard@kautzer.org', '(661) 256-1081', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$miUgqY5apqdeopbckXZf.OOgnzOulxlO8Rwzn6BWzj8/g2nKo4Pce', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-20 16:37:54', NULL, NULL),
(303, 'Julie Smitham', NULL, NULL, 'zena.klein@cole.com', '(936) 223-2621', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$vPae.ePdDPqx.c6bafEQRefYQ6z.kA2X3cfNVgB0oDNarxrUUEzx2', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-19 03:05:37', NULL, NULL),
(304, 'Jany Waters', NULL, NULL, 'aaliyah.wolf@treutel.org', '1-269-216-5732', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$QBVu0DQfpZqG.QDZuuk1meX4KTrM8TzzP8Og//mg8L7PeS2n8DWC.', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-22 14:01:19', NULL, NULL),
(305, 'Breanna Hahn', NULL, NULL, 'ihickle@hotmail.com', '1-872-475-1296', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$i20RDgnDxPh.bmsgsHkvm.5bKJbXNeKJW5HlkREUGIEHgLMupFLlS', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-22 02:47:13', NULL, NULL),
(306, 'Josephine Dickens', NULL, NULL, 'alfredo07@gmail.com', '475-473-2717', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$jAtFbo6HLtkfm4SCG0MfNedGD/hJyajcE68ji.ERoiqYO6fDcA59G', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-16 19:31:46', NULL, NULL),
(307, 'Lucio Johnston', NULL, NULL, 'maybell83@hermiston.com', '440-627-6113', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$jOgPFHDR91zZ.wCuPebi6ezIdWERhqLPHTBo3hTjZy3wPYUajtFN6', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-03 19:10:32', NULL, NULL),
(308, 'Rachael Eichmann MD', NULL, NULL, 'alene71@medhurst.com', '+1.202.205.0938', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$fSPPLltaJEu6Y0munIinTeRDSORntEgMaxnwLAiB3FtRTm36VvuTG', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-15 20:56:13', NULL, NULL),
(309, 'Hipolito Baumbach', NULL, NULL, 'daniella.mccullough@yahoo.com', '+16363035783', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$AaXM4DKGYoPE5vnRNXJYPuFUpgMxWG/Zb/Su90U4rzNYxeLGgNavO', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-21 04:22:27', NULL, NULL),
(310, 'Berniece Schaefer', NULL, NULL, 'jackie49@pacocha.com', '1-870-576-3991', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$/00zm85/sXExCPBz9PzN/OTsInBEKv5H6OOVA3yHjsu.wJaYUQgwq', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-27 12:23:33', NULL, NULL),
(311, 'Mr. Braulio Brekke', NULL, NULL, 'nrutherford@yahoo.com', '520-520-8189', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$LUiGapJGJ3fJQ/DMm2a/IOinnvPXQ4hY8gRlPV8pGbPomLlJvrK/6', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-26 11:14:42', NULL, NULL),
(312, 'Billie Adams PhD', NULL, NULL, 'king.river@yahoo.com', '478.777.1306', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$hnTdOGrj/c0GHiRtP5rWlee40MHKulZP.ZO7XWo/39KpUITbtPUHO', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-24 22:35:01', NULL, NULL),
(313, 'Priscilla Stanton', NULL, NULL, 'gregoria.treutel@mclaughlin.biz', '1-678-292-4679', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$8xg0qJVJAY3MY1YPAT3nGu5wWenvh9uL6nD6cwhhCUR6HpGD2UXDa', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-12 08:58:49', NULL, NULL),
(314, 'Major Weber', NULL, NULL, 'buckridge.terrell@hills.org', '239.244.3829', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$GufRhOkD19lhI/zhkcM4ie/P6vftp9zTQIq1BgSi9VksmhPtdAXES', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-11 19:31:23', NULL, NULL),
(315, 'Edmund Cole', NULL, NULL, 'alexandrea.gleason@dickens.com', '+1-712-523-6260', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$H4PN8U/ho6u.V7ef74kGWOrgMZmrUYDCvGRgtynVujQ7DBTGq847y', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-20 17:06:03', NULL, NULL),
(316, 'Guido Kulas', NULL, NULL, 'merlin51@hodkiewicz.com', '940.803.4558', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$vx.x6DgKVXJKRjDSLAcUsudGGQeY.QNnjxL.AnGoO4i2Ld4eEF6oa', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-14 13:06:55', NULL, NULL),
(317, 'Miss Dena Kshlerin', NULL, NULL, 'geraldine28@rolfson.com', '478-768-4868', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$ST.EWECX1HVFxK1mnLGMd.g0lgMPkTinjKQQ.XsUY/XVvDa3o/K8e', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-25 14:52:02', NULL, NULL),
(318, 'Claudia Murazik DVM', NULL, NULL, 'kira.keebler@champlin.biz', '+1.520.997.0397', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$OMn.SYms7uD7g4Xs6sw/juVHOYursuPIoAbJ2h/s6rphzfdLfWNvm', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-02 11:36:11', NULL, NULL),
(319, 'Dr. Rupert Ferry', NULL, NULL, 'trever77@bayer.com', '352-454-1658', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$ceQNQRBFAJmOx8UytW36YOXf/gblyquJecLZzE5vvOeSXTD9WufjK', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-22 03:22:19', NULL, NULL),
(320, 'Mr. Lincoln Aufderhar', NULL, NULL, 'heidenreich.verner@gmail.com', '1-314-690-6822', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$1kz/YqM9o7IHAQn3T3PW1eL6tfAlR8ustRD.JBaZz3E8yxoe.9O9e', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-27 04:58:17', NULL, NULL),
(321, 'Rhoda Nolan', NULL, NULL, 'hailey.kris@hotmail.com', '1-667-794-7789', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$fVatLtxpIKtfNH4CtRgiaOy5sKaYL2/zfkT2v9.DcV5f1d1lScMa6', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-23 12:17:05', NULL, NULL),
(322, 'Dr. Allison Schuppe', NULL, NULL, 'orn.ellsworth@hotmail.com', '+1-283-928-8343', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$p1qujY4C62DqPYaTvYDwnO2VRmVd8Dtfckd1DCdeHaIO1ylZWfaXe', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-31 12:42:58', NULL, NULL),
(323, 'Kyra Hane', NULL, NULL, 'mireille.lehner@gmail.com', '(301) 733-4928', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$AW0leuf8LuFgtYM2rleRJ.dtMYMC.xtCy2uDSF6IRN7TVGTPtP296', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-19 22:13:32', NULL, NULL),
(324, 'Prof. Amie Stoltenberg', NULL, NULL, 'lprice@yahoo.com', '1-743-914-0853', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$HA0eSRV/9Lsa88OfrzTLrOrcyuT8M4xTMYY1OoNnSR9XiDWqtTVD2', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-23 11:08:25', NULL, NULL),
(325, 'Kaitlyn Reynolds', NULL, NULL, 'laisha.olson@gmail.com', '+1-325-903-2652', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$r87HCTdmovHXnwT4.5COwuOZi44.8LakKJdQyFxU3Iq6I/QjU1D66', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-11 11:12:09', NULL, NULL),
(326, 'Prof. Gregg Conn', NULL, NULL, 'ajacobi@daniel.com', '(479) 663-2881', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$N.rAV1T9HEyttGSeRxF9FuvjEyTxHvo3Ef1eLFeX84WT.HudW1wR6', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-15 13:05:48', NULL, NULL),
(327, 'Prof. Berta Littel', NULL, NULL, 'alexys72@yahoo.com', '929.623.0054', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$cDIRY/t4SnBBum8oGl0gc.69r5pDVHh0iJW6G/LcX5HWYjVljif56', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-25 13:08:56', NULL, NULL),
(328, 'Frances Feest', NULL, NULL, 'pbahringer@rowe.com', '+16699260905', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$byer4s3puIu0CkCzdx29c.TY5s9YGlBNBUIQ8MoP2LmZTDEpPokoG', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-11 05:55:29', NULL, NULL),
(329, 'Mr. Wayne Dooley', NULL, NULL, 'dmorar@nienow.biz', '202.437.2533', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$SJIbaCVNBHY8RLY8RV/CSOOliqrL97hL52MK0UGUw.qrSBp9S9/3u', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-24 08:53:48', NULL, NULL),
(330, 'Katherine Treutel', NULL, NULL, 'shanahan.manley@sipes.com', '1-209-423-7031', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$F.UmOYjJPPblBZqMkTxT7OvwKCO8Snx3E6tU79Iax.RaPfx8k/EYq', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-22 06:19:49', NULL, NULL),
(331, 'Johnson Glover', NULL, NULL, 'grimes.jessy@pouros.info', '564-350-0582', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$kNMf6DdT.kYX9fwXLDPsL.RIlul6pFiyIWW/KCqsBAAUI9w7M5j2O', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-08 10:31:01', NULL, NULL),
(332, 'Miss Corine Lang', NULL, NULL, 'ashton.blick@predovic.com', '+1-986-957-5497', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$wKDKKCXA//mu9LzQbUX2veLrebzGf.1RZgk.ocosgIsaifM64KFAO', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-05 04:38:28', NULL, NULL),
(333, 'Soledad Bashirian', NULL, NULL, 'beatty.dion@lebsack.biz', '1-279-931-2098', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$HJKRREBE1SxFBbn6PXWvquAQhDVcYMIZRWCBRWTpLbl1c1BT68CXe', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-12 20:02:21', NULL, NULL),
(334, 'Golda Hermiston IV', NULL, NULL, 'henri.botsford@bradtke.com', '(364) 688-6830', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$eX9Mq3c1TpXzSsgW4xeM7.w/60QoJomM1YCoDpvwcfajSJ.DM3Zj2', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-03 22:41:00', NULL, NULL),
(335, 'Sandrine Kovacek', NULL, NULL, 'nmccullough@herzog.com', '934.885.9038', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$EnicHx.cWUR7BzsiVfaCm.ufqgGzsNW/xI1bgg5EghtWxyG0Ixhme', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-04 01:44:47', NULL, NULL),
(336, 'Dr. Joyce Kemmer', NULL, NULL, 'konopelski.alia@gmail.com', '1-502-756-8451', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$GJauDTevvfUEorM7eGdp9.1DvgVq0U1AzhUNZ1Veq0Q7Gn4AMrqmy', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-28 09:44:39', NULL, NULL),
(337, 'Golda Pacocha', NULL, NULL, 'bcole@hauck.com', '+1-281-792-3423', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$5uMLoON6FP5.RYyjZKiAPuIDjzF8.QQK9wA3qDFPjPzXbQheRAUve', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-10 20:42:39', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `phone`, `image`, `birth_date`, `lang`, `fcm-token`, `email_verified_at`, `gender`, `status`, `receive_email`, `google_id`, `facebook_id`, `apple_id`, `sign_from`, `password`, `country_id`, `city_id`, `region_id`, `verified_status`, `lat`, `lng`, `address`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(338, 'Anabelle Toy', NULL, NULL, 'vdach@osinski.com', '+17793077212', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$8if1lh5686CTm7p8E3WYCuYGyMCFe1ri09rKvL8YGX.slNh4ni1jK', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-17 11:22:03', NULL, NULL),
(339, 'Mr. Cristian Kunze', NULL, NULL, 'gsenger@yahoo.com', '+1.323.587.0129', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$52HQJqsHtD9omYosDoosk.iXXUk3e6TRFfMown.cWXRsgF8XQW3Ny', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-17 09:23:21', NULL, NULL),
(340, 'Dr. Bartholome Dooley', NULL, NULL, 'dawn.kassulke@gmail.com', '1-860-491-6280', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$EzIYnDs/afiQVxDuLEbpa.1RVKRx8JUsRpx.8cbkbvQFVYQp/NWLi', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-01 19:01:31', NULL, NULL),
(341, 'Darron Bailey', NULL, NULL, 'vickie27@jacobs.com', '254.367.0656', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$JSt3CLhZ1u/E..P32u/s2empx07lDRIMbx5a8xd6oMvOIirsLeAgq', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-13 02:45:51', NULL, NULL),
(342, 'Vinnie Lind Sr.', NULL, NULL, 'schaden.romaine@erdman.biz', '+1.534.742.4732', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$Df4LbPgP6tO8v0ya0Zagkey7F9zZLST18psD5kZXnJ551pQVP2Z6S', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-12 22:43:22', NULL, NULL),
(343, 'Henri Graham', NULL, NULL, 'saufderhar@hotmail.com', '1-920-574-6554', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$CnEi9dgxaorrHiP5Oqj85O7JvNfAGEPrtcJifsLJ4kL6XNTgqY15G', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-08 11:34:03', NULL, NULL),
(344, 'Kariane Pfannerstill', NULL, NULL, 'ilegros@schaefer.com', '+1 (712) 525-8028', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$mYlBp/pq9uvhA.dp.lR67e3zDuYg8HFgasGrxHB26le8p.lmbkF4C', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-28 18:36:14', NULL, NULL),
(345, 'Wilfredo Hegmann', NULL, NULL, 'nmosciski@gmail.com', '+14347603702', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$cRMJ.aCTpcOyZ.6fSFcVR.pYlNyd4Q/Gwyhj4pjJkS9uSdpl7Yn7.', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-10-14 23:59:34', NULL, NULL),
(346, 'Prof. Columbus Romaguera', NULL, NULL, 'oweber@stroman.biz', '+17546199311', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$uWFUhwbHyUUU1WG6.oSIeuCNdZ1tI2Zu1wlptFr6QofCOE59xVplS', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-18 09:09:29', NULL, NULL),
(347, 'Garrick Kertzmann', NULL, NULL, 'lenna53@abernathy.com', '(540) 410-2445', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$ZihRmJ/ncrE8.e/qtgQgMO51ZIWLSCtEVd7H7HCHzfG1rGioUwUuq', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-06 14:21:23', NULL, NULL),
(348, 'Gonzalo Crooks', NULL, NULL, 'ysauer@gmail.com', '+14757504647', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$tUDgMCHbR9AZ9/Y0zV07beBgMQH.dUcGafCXzGYTCqcgJHzPWtwb2', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-13 22:48:30', NULL, NULL),
(349, 'Josh Collins', NULL, NULL, 'brody.parker@hotmail.com', '(478) 714-7752', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$8kDfHY0ciCOdkSGOo17w/.DxPTvor8qlfyQaPX4OcDj2T0IeUuu2a', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-26 15:24:27', NULL, NULL),
(350, 'Antonetta Raynor', NULL, NULL, 'bartell.roma@kreiger.org', '(283) 857-8589', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$gWZdue2rNEjPsZEwifW8R.hWtc8tMwJQKfZdrrXCb1wL4k44fcDXO', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-12 19:16:34', NULL, NULL),
(351, 'Virginie Dickens', NULL, NULL, 'kaylin.ankunding@hotmail.com', '(779) 367-5310', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$l138YU1hJidUNYs9XzXxdOuVGDg0I12tEFljM.lc4zU/X02nJq23a', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-20 01:22:53', NULL, NULL),
(352, 'Leland Murphy', NULL, NULL, 'brandy88@hotmail.com', '+1-754-687-4326', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$2lHyQf5QD2rQ5eRGSiirquAw7.8NZLRacFGkZZyaBQEwSidc/j7k6', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-30 18:48:09', NULL, NULL),
(353, 'Donnell Marks', NULL, NULL, 'ottis38@yahoo.com', '1-347-203-1292', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$WsyB/0R4RAuD6e7Gt9CNFebc1SuWv8C0DddPMcS1OV09MSVW.Dgfa', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-19 00:40:59', NULL, NULL),
(354, 'Oren Hegmann', NULL, NULL, 'bwhite@gmail.com', '559.857.5391', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$OpSvxD5gyi.fwPXkE4cxIunhNw9TBuNPRjWcym6Lotz476dTlokay', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-20 10:18:28', NULL, NULL),
(355, 'Dr. Patsy Anderson', NULL, NULL, 'osbaldo73@lakin.com', '820.987.8175', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$wRYtSo0IOZKhUkCiFIwD.Om09JjgsqCD.CSm7mgnXkTyDjLHf8Dha', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-08 05:23:01', NULL, NULL),
(356, 'Rowan Gusikowski', NULL, NULL, 'wrau@gmail.com', '361.575.2154', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$pw/3M3aT.v0YYwr5T0XnPu1X3Ul4.rJjqt6JYrlbBagVFe7y0Vu/.', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-09 22:12:19', NULL, NULL),
(357, 'Dock Bashirian MD', NULL, NULL, 'vgreenfelder@yahoo.com', '+1-623-931-7802', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$s69C.tgJ4xkiSkFxgcafKuA8suZDcHNRY69SeOCUUru4amzWhoc6a', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-28 22:11:31', NULL, NULL),
(358, 'Devyn Ritchie', NULL, NULL, 'rebecca93@gerhold.com', '765-287-5553', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$eZ7.VPYkNk4sPirihh2sEOiqcKa.Acg0losC55utUHlpiextQNO0e', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-23 08:27:34', NULL, NULL),
(359, 'Ethel Block', NULL, NULL, 'kautzer.conner@vandervort.biz', '(904) 271-6869', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$3w4efaaisvZIBITxGb/TIePAtLJnhOTfX/vBTXZEyvZuHTOHk0MkS', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-11 13:26:11', NULL, NULL),
(360, 'Deontae Reilly', NULL, NULL, 'willms.kristian@gmail.com', '+15136131604', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$6DUKIF7uEqBbvh/dFp6FlO.mU7yQGO6MCLYrP0VjXEBDMroNh1ToK', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-26 21:34:06', NULL, NULL),
(361, 'Deon Schmidt', NULL, NULL, 'amparo99@thompson.net', '657-317-4547', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$b1ssC1XUrBjrZkxrUMlhmujjFFUsZijyhBpUVFIbkyHjyqJuko.KK', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-11 04:55:43', NULL, NULL),
(362, 'German Altenwerth', NULL, NULL, 'vbednar@quitzon.info', '1-203-344-8712', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$xUB3qRWmEdnqBOJ.vxp/2eQ4xK7i.ohC0ILLGTmi8jNvoageF/Dka', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-22 23:57:15', NULL, NULL),
(363, 'Raymundo Zieme IV', NULL, NULL, 'ernest98@gmail.com', '1-940-551-1789', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$1PCAsUd7Z2PIV92qRoc56.e8lNsqbRa/0/gBoQj4w8GudEv.iRwYO', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-21 13:14:19', NULL, NULL),
(364, 'Osbaldo Collins Sr.', NULL, NULL, 'rollin77@wisoky.com', '+1-410-885-5995', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$4iu0H3cTRSISmQ9XbsDfBOxHBuoA.ST22INuEJl91J8e5fQ4dp4A.', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-09 15:38:34', NULL, NULL),
(365, 'Davin Satterfield', NULL, NULL, 'stacy.jacobson@jaskolski.info', '1-346-499-3569', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$JU6ma5sXYDz6INvj/c8ny.wYlyFz8ZR9XWs.hZrlHdI9mR2U0d63S', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-26 15:52:51', NULL, NULL),
(366, 'Mr. Malcolm Bayer', NULL, NULL, 'schaefer.arely@graham.info', '+1.681.756.4418', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$3.J7nLmw5ipWJ99Fhezf5.feA1poiZk2PaUcUir/vd80EiNfYgESm', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-14 09:42:36', NULL, NULL),
(367, 'Karli Hayes', NULL, NULL, 'doyle.crystel@volkman.info', '+1-248-999-5054', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$hWAT2pJaL/SAFCikEp5YreUAypW48v3FTwVf7MUykjZqy4.pI3jZS', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-09 08:27:47', NULL, NULL),
(368, 'Mr. Deontae McGlynn', NULL, NULL, 'yundt.kaylee@yahoo.com', '+1 (831) 500-5468', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$yzDipH.fW1w4SxFwXs2sA.fDfFgzAiynekUh7rDQ7DSUBQO56ESIm', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-14 08:57:09', NULL, NULL),
(369, 'Odell O\'Conner V', NULL, NULL, 'letha.oberbrunner@erdman.info', '+13469123456', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$HYJg68V0XKNeo4aDazlv.OQIFr3PnYN6VAWn4UGi/UCqVo6/ZQDhG', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-06 15:06:48', NULL, NULL),
(370, 'Sean Turcotte', NULL, NULL, 'odell.miller@gmail.com', '785-723-1890', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$csDQesBLEtKmQ.q7ndurfuP.EQ0mCwJrBWKCdHqxtftJuB6vpELFG', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-01 08:40:30', NULL, NULL),
(371, 'Florine Wisoky', NULL, NULL, 'tfeeney@larson.org', '503-700-6123', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$KJllikteFJ.1ifdVPs5Lc./bWdrsKBSc8WLxaR2ht96fW82f4IweC', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-15 23:56:22', NULL, NULL),
(372, 'Markus West', NULL, NULL, 'jmclaughlin@yahoo.com', '+14076776798', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$mB/554zFiymTfrbgn6YVru5h8pyEitK9rypk1wPynXZXQmzFWkKZm', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-13 23:58:12', NULL, NULL),
(373, 'Gus Funk', NULL, NULL, 'skiehn@yahoo.com', '+1.308.562.9973', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$h02orOi76JbShd0ikMWRlOxgd3EiG1XEbt2hW.PQA2sUvgy7X5MdS', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-24 08:36:06', NULL, NULL),
(374, 'Stephania Bernhard', NULL, NULL, 'alia16@hotmail.com', '820-605-6116', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$GSWQaS2ZIFy/XTVt5V79EOtt3EWUX9XdASETRtR1gf1rsG7sxoec.', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-31 11:11:24', NULL, NULL),
(375, 'Peter McDermott', NULL, NULL, 'barrows.immanuel@gmail.com', '341.246.4565', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$2DZnoQMnANubskWHtVpFue38PGXAQlphuX1Fsyw9YJu/VQXTjQGJu', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-22 10:38:16', NULL, NULL),
(376, 'Sherwood McClure', NULL, NULL, 'linda.swaniawski@hotmail.com', '+1.785.998.1255', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$6CaVSt.M1CnfidrQ4AiluuRhYT.gcKLMZNOHpxx1jN2xsj9MTUmum', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-04 15:14:47', NULL, NULL),
(377, 'Cicero Rogahn DDS', NULL, NULL, 'dboyle@gmail.com', '+16504915666', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$mV6H9hmlmRWZWSc0NUeXJeyPazfY6FMgkTfg8wJHUCQwL67ctGRza', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-08 08:23:22', NULL, NULL),
(378, 'Gwen Metz', NULL, NULL, 'germaine44@walter.com', '512-543-1962', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$i6.h4Ais7MSQycjjvaOsAOaniR7jv.Lr09Q1XSStSkXp1pSh33wm6', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-08 08:52:17', NULL, NULL),
(379, 'Mr. Louisa Hirthe', NULL, NULL, 'linnie.blick@upton.com', '947-570-8292', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$1rXRXNxcKlE0U8dNkBlH1erizS0B.GVEuCnUkaGmcU1UybSP6X8tC', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-26 22:33:16', NULL, NULL),
(380, 'Oda Kessler V', NULL, NULL, 'camille.fisher@hotmail.com', '347.455.1046', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$pb5kInSdWCJSlDcyd5cgiOvmmEJcqiyAVSGwdGojjqA5Jkj7I.mhK', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-14 09:14:46', NULL, NULL),
(381, 'Lurline Jerde', NULL, NULL, 'rkessler@gmail.com', '1-240-373-8997', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$1fXv3zfuUEnCh/Z1qUOt2eZFq0qOx33yZez37Mj8t2QVtEp5jcsim', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-05 19:02:17', NULL, NULL),
(382, 'Lois Purdy', NULL, NULL, 'kward@hotmail.com', '+1-407-714-1107', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$FYYDA0SHULvzGjuvviQnN.1ngwcbS96AUk1Rf6MMKahzWbAAaWjTO', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-01 12:03:39', NULL, NULL),
(383, 'Jay Marvin', NULL, NULL, 'kshlerin.destin@gmail.com', '760-716-9257', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$o/N8ymL62W9TGZJlHd/CI.epdfQ90bfa/s5YyY3yNAdht0Y.v4PEW', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-10 03:10:21', NULL, NULL),
(384, 'Brycen Eichmann', NULL, NULL, 'zhammes@berge.info', '224-627-3734', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$J2iWC6COc.g3X0Wz.7JyT.p83S/gGRkqFzZ26ZrWRkzh.2WzMXo8a', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-06 18:59:36', NULL, NULL),
(385, 'Tracey Glover', NULL, NULL, 'kaela60@schinner.info', '563.223.1421', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$VI.m1Q4lVjpor7iAL9OIS.VEp7ra.uJ6KGbIl2YtCCZv0MO9e/llG', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-25 22:22:12', NULL, NULL),
(386, 'Dr. Elmo Rogahn I', NULL, NULL, 'patsy36@hotmail.com', '+1 (725) 813-8416', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$G1Jiro/Nw9LuiujpC8u5TOQoZXIas4onUw4wBE1kRQ7cFB/nI8rKG', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-04 12:17:54', NULL, NULL),
(387, 'Ashlee Maggio', NULL, NULL, 'jovan87@sawayn.org', '360.428.5334', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$VOCMiNul.uEOeH601Z3/8e.PRsxiirVsFuZ12XcvyNtJ/GiG8Gyxu', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-19 00:18:19', NULL, NULL),
(388, 'Consuelo Mann', NULL, NULL, 'kiel.turcotte@medhurst.info', '+1 (364) 504-3350', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$sFuUDju7AyjrHB0HV7pYaeGxkti1OwpLVAjJ/Q4mIaktMY54MgI16', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-05 15:36:30', NULL, NULL),
(389, 'Tyra Streich', NULL, NULL, 'bernice.kautzer@yahoo.com', '351-671-0326', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$1c2/8fvLCPKeyq3rtjLC2.NO/B4XYN/4Kbjbo4avBy/kRDfT.aNOS', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-29 16:18:52', NULL, NULL),
(390, 'Lloyd Hackett Jr.', NULL, NULL, 'rosalinda50@gmail.com', '1-347-902-2406', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$arpby0eMBOaco5e8qjIQfOHDZYLBrYInIUSSEmj/JesaFCGMCCyem', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-15 20:42:08', NULL, NULL),
(391, 'Ryleigh Ortiz', NULL, NULL, 'stefanie78@mitchell.org', '1-820-310-6969', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$x4YtllByCz/GcXptbnka/eGEfm8yR6HM.CZv6E60.XyX9ONW8gpVC', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-01 07:10:31', NULL, NULL),
(392, 'Prof. Jade Lind II', NULL, NULL, 'hansen.jimmie@altenwerth.info', '+1.614.386.5788', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$1.MML7l.cSnQbBUHuWJssOOKcIaeHtrgaRbsQyg77XLni7k1qb1E2', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-07 06:28:53', NULL, NULL),
(393, 'Dr. Lyda Jakubowski PhD', NULL, NULL, 'hellen.thompson@denesik.org', '(539) 563-3744', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$iJf9pucfBlKN65w2b/OhMufmvnhp2Xpuh1FHVqLspsT1jWhFPW4WK', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-11 14:31:15', NULL, NULL),
(394, 'Mr. Tyshawn Wunsch Sr.', NULL, NULL, 'dante52@gmail.com', '+1-564-663-3641', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$CZvMn9yOR8YV6bt22YgUo.DReom4PrhfAo0ubYc4KHkWwHPl2aHhW', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-07 05:14:33', NULL, NULL),
(395, 'Sonya Stehr', NULL, NULL, 'eleanora.kshlerin@yahoo.com', '+18134748852', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$bPp7DGue9tH72tWHEW8bw.7qVth.F2u659BPjGIbD35jAgi29rESq', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-15 03:42:22', NULL, NULL),
(396, 'Akeem Ryan', NULL, NULL, 'walton.wilkinson@gmail.com', '1-580-638-0042', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$hAw8qcpuE7kKDe9Sfe4CB.jnXEJEQpC3Dn7eSk6UbLFlbFWEq/9ri', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-13 07:29:49', NULL, NULL),
(397, 'Orin Hill', NULL, NULL, 'tromp.antonio@hotmail.com', '+1 (937) 478-5141', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$149OahufjrPdXSXDhNH8Au/jGgYXXOMWv28QovbVVoxTMBoE.8ORC', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-20 22:02:41', NULL, NULL),
(398, 'Hubert Herzog', NULL, NULL, 'dominic.roberts@hotmail.com', '+14849281857', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$lu.e8Y.CvsV5GNt3VA39he/j82tLFDlsyq0Bcs8bWL01rJhKeCYUG', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-15 08:09:52', NULL, NULL),
(399, 'Tyson Hoeger', NULL, NULL, 'lebert@hotmail.com', '+1-743-467-4781', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$RlmYA8d/WhVYXKF2Am6QbO7xkiWxcxjV0YiK9eQAKKcJD6dQDSMAW', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-23 05:00:07', NULL, NULL),
(400, 'Prof. Hermann Harvey I', NULL, NULL, 'gfay@collier.org', '1-731-489-3552', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$nMCbr5Pu12L6jdPlRTrYwuP8USjpzNMoP7k3Y/tUApcNTvpv/b94y', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-18 13:00:33', NULL, NULL),
(401, 'Prof. Drake Nicolas', NULL, NULL, 'conor23@glover.com', '458-515-0627', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$/E.7.r2Kwc5sSJcgOl.X8OaMt.armiGIKeEgxE70NrD2EPjNZCgq6', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-22 08:35:50', NULL, NULL),
(402, 'Fredy Hackett', NULL, NULL, 'nicolas.elda@bogan.com', '+1-678-287-6975', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$5N4Wjq7p6f/AKfh85OWih.0Fr8lYdUq9bmm8BRtS8WBIUIwUHVbsq', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-25 02:19:59', NULL, NULL),
(403, 'Godfrey Littel', NULL, NULL, 'flo.bartoletti@schinner.com', '(734) 978-9660', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$kvEdgAd6.brxtEH8oWJ/vuoAB2CeoWK5hr8ZpSZs6GgZoqhxHQ1OO', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-14 20:21:58', NULL, NULL),
(404, 'Dr. Corrine Schamberger DDS', NULL, NULL, 'buster.torp@fay.com', '(757) 451-4489', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$faOVmjrd3bft3/Eb3sxWu.J7L98Bsm9aMLsod53xrTe66MDqRfcG6', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-24 16:47:19', NULL, NULL),
(405, 'Vada Wyman MD', NULL, NULL, 'nader.jaclyn@bahringer.info', '(480) 771-4573', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$mHeG2y.bIrRohAriyl8dmOXI7g5qCUQ8eUvTXPC0PO9AiQ7qAWM8K', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-03 05:09:47', NULL, NULL),
(406, 'Robyn Lehner', NULL, NULL, 'yhaag@yahoo.com', '+1-651-583-6141', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$2InFFihUW1/voOyqkPpdHOi98PkAnICst35lvaM3jj8BBWJxAvWru', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-31 08:13:13', NULL, NULL),
(407, 'Dr. Humberto Boyle IV', NULL, NULL, 'rutherford.camille@dibbert.com', '1-321-666-0785', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$efU6UxtmCcsY8J/VU4R.MeH/1ghMaIM5G.LkYt8VSPS0B5UiIxSGG', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-22 23:01:11', NULL, NULL),
(408, 'Alessandro Kihn', NULL, NULL, 'olabadie@koelpin.com', '(610) 843-4554', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$AaYjlSazfirUpNYnVcGf0uqyMFZPaW0ch/3O17HixSk9yrBHaM4V6', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2020-08-07 12:04:16', NULL, NULL),
(409, 'Lilliana Tromp', NULL, NULL, 'vgoodwin@thiel.org', '+13602121412', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$XEuL6TQ9WKvlT6fX1oKyC.GnNH6PrWWjzbc3G9pjvAx92mjJyyKH.', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-19 15:59:45', NULL, NULL),
(410, 'Ignatius Fay MD', NULL, NULL, 'stowne@bradtke.com', '1-573-959-6528', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$UNr8FJ1tKE6ojg8mDeEjE.7VXebNpSDItBwuM2G1FBrcpTHx.erWW', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-01 06:22:30', NULL, NULL),
(411, 'Prof. Cyril Christiansen II', NULL, NULL, 'keagan89@fisher.biz', '820-225-5125', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$/9LXoAsFMtzqbMfTO/rakeYH6zeQANM5kRpKOXlSzDyBBDEGwnHH.', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-09 18:29:32', NULL, NULL),
(412, 'Mr. Paxton Bechtelar', NULL, NULL, 'stephania18@strosin.com', '1-878-931-5145', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$dmTGucY5KXW4CgxBbe/WSuG/M5o.ISUEALpR4vJ4.8HX1JJPg.pZi', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-25 22:34:11', NULL, NULL),
(413, 'Anika Langworth', NULL, NULL, 'jarret.kunde@gmail.com', '878-309-1654', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$ynroFK9dRVrRTGveih9Af.ysBLE5mUbolc5hRgJq20knB.i0jeTUG', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-06 15:31:35', NULL, NULL),
(414, 'Darrel Larkin Jr.', NULL, NULL, 'agustin71@yahoo.com', '1-628-668-3415', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$9nfs1ZaqUfptTUXXi8iz0uq9.db9ilMCK0V9LprXNr8Yibys/OU.K', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-07 01:27:39', NULL, NULL),
(415, 'Ms. Juliet Quigley MD', NULL, NULL, 'dillan96@welch.info', '325-608-4203', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$qey6tpGrfyqsJpmWVN/Qou2wSLqrpPmbL9H60pLPuVMNBCCDxTBA6', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-15 11:00:21', NULL, NULL),
(416, 'Ottilie Langosh', NULL, NULL, 'collier.holden@gmail.com', '+1.781.551.8325', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$LQ9Q4CB.ydetnLL0u50Kh.3DlMs7RwNNkMsfDoGDp7NmO2BRBKAm6', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-18 04:40:23', NULL, NULL),
(417, 'Dr. Dwight Abshire', NULL, NULL, 'rlittle@zemlak.org', '234-752-8338', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$JndNttMMxzVtwiuHyP3K3e31oWaY9qrfgl3f3A/lCJz8Mub/PLwTa', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-17 12:16:14', NULL, NULL),
(418, 'Mr. Johnny Oberbrunner', NULL, NULL, 'ellis69@raynor.info', '928-585-3812', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$wWrhxnZ3pYq6Yqt.71c4Tei5b1yI.gmMEAqL49KZjopyH/yBpRHb6', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-05 05:37:18', NULL, NULL),
(419, 'Kim Skiles', NULL, NULL, 'davis.amelia@hotmail.com', '541-417-9408', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$/gOQmOEllT4nCkURtyVUn.MoiC0etVrvHCUQHLH3emGFtqsSiG4.m', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-09 16:03:10', NULL, NULL),
(420, 'Retta Herman', NULL, NULL, 'regan.hauck@hotmail.com', '747.716.5297', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$xOqFEfDaxS9ty992hw3Ev.ZfJrwX7aC289.L2laPYhf0MlN9KaKAC', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-23 20:55:13', NULL, NULL),
(421, 'Johnathan Langosh', NULL, NULL, 'edach@balistreri.com', '+1-986-787-9146', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$HYUtYodxFxcKumgRPR126.4xAjEMl0qyKD5Tp77fHeDByMd6MFT2u', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-07 10:18:08', NULL, NULL),
(422, 'Felipe Hill', NULL, NULL, 'adelle.ward@hotmail.com', '1-737-881-5781', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$MvFdn8q.kfBUugaJcn69x.ETxruFwcTuc4OO1CMG0b1uEQx5YpJP6', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-08 03:53:25', NULL, NULL),
(423, 'Trevor Conroy', NULL, NULL, 'cdicki@hotmail.com', '+12086616525', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$yy9GQZX1aDm63ZmUFEB62OYXcO5E.UGnpxlNLtNMlxpu5t6DEcgZC', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-11 16:06:41', NULL, NULL),
(424, 'Marcelo Hahn II', NULL, NULL, 'serena16@gmail.com', '+1-564-776-7554', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$P3XXQST6meeSy02hPFNVvuuv8264dJ8h5Wmc3tnwaPgErsOIGiAm.', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-08 22:21:13', NULL, NULL),
(425, 'Lavern Abbott DVM', NULL, NULL, 'margaretta.wiegand@hotmail.com', '947.736.7008', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$4xkb0hocr9BW5wrSGp.sD.rfaedRE4g2FbI7gJFUPyUHp5g8rajM.', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-31 07:28:08', NULL, NULL),
(426, 'Meggie Block', NULL, NULL, 'fkeeling@effertz.com', '+1-401-842-0105', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$noMMCe2BPmet7XHb0EWy6ebaI8BdF6p1KgIcUZdfXgZNh9fb2hdXe', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-11 02:19:56', NULL, NULL),
(427, 'Prof. Margie Kuhlman', NULL, NULL, 'pagac.sabina@yahoo.com', '+18606474929', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$FMoPY62/ATZKiXuoVMP2V.fb4YAmhqKHtyZuUxPHmn89.qLOc45ZO', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-21 13:11:12', NULL, NULL),
(428, 'Roslyn Kunde', NULL, NULL, 'yrempel@hotmail.com', '270-597-8792', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$CHJl.jGghMsUCFv8GALng.A8qk16KZVcbz0Dz5mgmtGlVL35PZ7.W', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-11 08:16:47', NULL, NULL),
(429, 'Donnell Schaden', NULL, NULL, 'kassulke.sam@gmail.com', '+1.650.767.1510', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$aiNB/khb1BBuVuahRrV7ReF4RMp2HTTXVuZxIVNXkS6NSCfyaOPFq', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-18 05:10:55', NULL, NULL),
(430, 'Kali Emmerich', NULL, NULL, 'abbott.cheyenne@yahoo.com', '+1 (785) 729-0153', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$PRYFKbwbPkEEya.4ah0TA.H/HAtTGJnejAhW.V4Lc26JZAp8goEE.', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-12 13:00:13', NULL, NULL),
(431, 'Ricky Halvorson DDS', NULL, NULL, 'xbeer@krajcik.com', '1-820-382-1543', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$gcClm.X6Dk4AaQ/Wdrk8B.ViqMwqRdQBIwma8U10L2yPmjRfoiKwq', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-12 13:33:47', NULL, NULL),
(432, 'Savion Gerhold', NULL, NULL, 'schumm.casimer@balistreri.com', '+15802457931', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$PIkC8MSMnEX7u6IHaYK0sOHmvJ0BLJQeQisbsPP8e6ctY0q/yWkvu', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-14 17:17:21', NULL, NULL),
(433, 'Blanche Rau', NULL, NULL, 'herman.jesus@mann.net', '1-612-777-1893', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$W4m88X2MWzS5TMy2F6PPaeygVchvotBa2Kx780Y8bWJOUIKxJI9PC', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-13 00:14:53', NULL, NULL),
(434, 'Mr. Joey Strosin', NULL, NULL, 'beier.mable@kihn.info', '+1 (940) 872-8503', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$Y81u1FkfD.V8/DMvlrNwxejz6az5EPqr39nktY/6C5cXMaOfCkZUW', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-01 17:40:01', NULL, NULL),
(435, 'Prof. Joseph Stehr', NULL, NULL, 'arnulfo.rath@stehr.biz', '727-393-9723', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$ohdRA.WRm.4I0o1.Cu3JhODqBk/h9v7wxJdhXcJkAujd6mWpCKzga', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 07:22:02', NULL, NULL),
(436, 'Mabel Gleichner', NULL, NULL, 'pasquale23@lindgren.com', '+1.240.633.0446', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$BJKKbKR1F6BJWvCtGsU5yOrvtHue4CSFS1rNENO5mDOvy.sLdGN0a', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-21 07:03:13', NULL, NULL),
(437, 'Prof. Myles Grimes DDS', NULL, NULL, 'oorn@wehner.org', '+16017028557', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$o1SxvrMEh8MsfwO4HtFUruRZoZvg3DdTVy.m4H2xPxfL7rCItaRFy', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-05 21:45:58', NULL, NULL),
(438, 'Bell Johnston', NULL, NULL, 'alicia.jast@rogahn.org', '+1-848-854-0978', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$6MrXHlrXF4qvx3vfdMaRDOhT9kmB/W3tusJlj0jX10o2d9oYXxzAy', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-11-07 06:59:44', NULL, NULL),
(439, 'Alexandrea Aufderhar', NULL, NULL, 'edwardo74@eichmann.net', '+17857731488', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$kHY14WQDtGLkph6AJ3eoI.4di0wUJUhYLCnsVXwXudtPqjC4e/Lg2', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-09-30 17:21:22', NULL, NULL),
(440, 'Jamey Dach', NULL, NULL, 'luz.littel@kozey.biz', '443-986-3340', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$VFFwQ59r849ZImY0j4yoG.IlPzmtu6itKt7aDxPPVh6XQEjGc98T6', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-22 23:53:49', NULL, NULL),
(441, 'Allie Sporer Sr.', NULL, NULL, 'ygusikowski@stanton.com', '(361) 414-4700', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$Nsj/V3ZYtkQMK2x.8KMmH.T6r.aMdmN/cN.WMozaRi.PbxhAqz4Qa', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-04-29 19:41:24', NULL, NULL),
(442, 'Domenic Rogahn I', NULL, NULL, 'lgoyette@gmail.com', '1-531-898-1553', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$aIMJ.KauQAI73pzB2ScIUOG.ofj1TKuyrFVaLq7cENOfhDitCqV/a', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-20 13:17:57', NULL, NULL),
(443, 'Aileen Rutherford V', NULL, NULL, 'lora55@hintz.com', '1-678-608-3005', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$UA39gLhUCKxp3S74Deh7teLjAECDM4YSFhkY69MZXP.eH1fdZaAA2', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-15 20:50:10', NULL, NULL),
(444, 'Waldo Quigley III', NULL, NULL, 'veda45@kris.info', '267.796.4351', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$rzXW0914JvCVP5JIVPOCxOA0nCtb7HHz2LQPv5vvrUa9niA3QMf4u', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-09 04:31:47', NULL, NULL),
(445, 'Tania Dooley', NULL, NULL, 'valentine06@yahoo.com', '1-347-418-5600', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$MzmIXPQI.DmztlnkPDJ60.NscEkA7vHD16x9vqzCCLIRcc.8mgwJq', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-25 10:59:27', NULL, NULL),
(446, 'Rhett Lakin Jr.', NULL, NULL, 'henderson19@heaney.com', '1-424-848-9911', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$6HBa6xUThdZ4jjwzHocJDuSdTKmaIUE2rx2Uz0utbcA.5Shj/O3XC', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-09 22:58:34', NULL, NULL),
(447, 'Dr. Lionel Jenkins DDS', NULL, NULL, 'toni.schaden@hotmail.com', '+1-614-833-6185', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$GW8MET.eppJy1IoRxZZJderArPk3oIJbcMnmlrvaon2DoaDIM101W', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-04 21:51:01', NULL, NULL),
(448, 'Shane Boehm IV', NULL, NULL, 'max.bernier@treutel.com', '1-678-241-6161', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$aOrUJRwU8Vr23.88sqIm1OA0B8rKaM9vreTcDggjB/iHKgdDpThAa', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-14 14:44:58', NULL, NULL),
(449, 'Monique Leffler', NULL, NULL, 'hbednar@mayert.org', '1-828-240-6596', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$no3DZBB1sdJthmAnGklzFOoyaST9rLNoEjMzSdUXQ1Rdwm1uzgvMO', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-05 13:20:53', NULL, NULL),
(450, 'Kristina Kuhn', NULL, NULL, 'magnus.daniel@gmail.com', '+1-516-842-5794', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$LEOha/0SGU7YpPQeihodmOHHsjLwM457iqchfeHCzpHdw3cmPmpl2', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-27 16:38:48', NULL, NULL),
(451, 'Elyse Orn', NULL, NULL, 'runte.colten@mann.info', '+1 (952) 634-0642', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$HtLxahPhuCzcW.uuk5JOaO/TSuYvj03zJpR34KIZlvc2h8ktcSr3i', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-12-11 02:41:23', NULL, NULL),
(452, 'Charity Grant', NULL, NULL, 'jast.zaria@anderson.com', '346.227.3405', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$.HfcrlAx9kD5aG/WT56SXuHe1DLcPRI4nU87y/VqnHnxemp0oXzze', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-10-29 00:23:20', NULL, NULL),
(453, 'Ericka Grant', NULL, NULL, 'violet.fisher@yahoo.com', '(803) 878-3398', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$NHKnPH.No5XlFZeYiS8jJeckoDNJMAitU6R5pdA6ORbymghqB8iDC', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-17 21:00:42', NULL, NULL),
(454, 'Corene Kuhic', NULL, NULL, 'darby74@gmail.com', '+13253660264', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$ESUvMJkPBhVds/TXK/NP4u6J/OvndF.gDJMeIrQ5QPgl55TO1QOsa', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-04 16:11:13', NULL, NULL),
(455, 'Estell Christiansen', NULL, NULL, 'zpurdy@moen.net', '+1-585-530-1166', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$Y74JFcVGoveIZip4Pf5yUOZfuKrveRgZoiUtNamLxj8hCANev7GYi', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-16 12:56:49', NULL, NULL),
(456, 'Wyatt Little Jr.', NULL, NULL, 'novella.schowalter@stokes.biz', '(786) 768-5562', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$fGFvLZmPPRdAcGC8GChTMe8PtiRoWybDESJn7.kq.4FXLIIVUGkQa', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-18 04:42:33', NULL, NULL),
(457, 'Zoila Ernser', NULL, NULL, 'quentin97@yahoo.com', '(351) 397-9208', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$mlMl46U..RBYuRcin7wSeeU8WWwrmFjlMIWbeZebbyQNzT6/NliaK', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-25 02:32:38', NULL, NULL),
(458, 'Murl Von', NULL, NULL, 'pbins@gmail.com', '(847) 525-3367', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$lWLLX2wo9yEKY51ZimDAIuIIiq7Btp7qN4Ee2W5.5uFh4F5tWNNie', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-18 05:27:43', NULL, NULL),
(459, 'Beaulah Schamberger', NULL, NULL, 'ugerhold@braun.com', '+13647777758', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$tUPg9BGIiMxWJt08E.eUIe7YORPCQhg1yeo1/KEXQ4AeuzySXXUlu', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-08-04 12:38:49', NULL, NULL),
(460, 'Vickie Schuster', NULL, NULL, 'dudley54@quigley.org', '1-934-821-5734', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$LxCYfB2z.cRgHwcDzE8fIOP23VfM.mO1IpHkYXTlRT8cConoONj9G', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-24 17:29:31', NULL, NULL),
(461, 'Rex Thiel DVM', NULL, NULL, 'tshields@yahoo.com', '678.502.9053', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$IyIB6cfxhTRBmjR9XP96Fejd5hr3CP5cZu2eUItcBBvO7La6IGyr6', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-08 03:50:13', NULL, NULL),
(462, 'Nicola Schoen I', NULL, NULL, 'schneider.samir@zemlak.net', '(908) 637-2945', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$ZM2yuW2wQx2niVKW6lubHO6i3gM8FoWeShddDB7WnlL.7KMYPebUq', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-04 03:13:06', NULL, NULL),
(463, 'Prof. Cristian Grady DVM', NULL, NULL, 'bkshlerin@gmail.com', '628-743-3999', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$2zZnhTV85B/vSE7VSdOmVuA.KmO.aVgcq96TONljZ9a.VK2vGqz5e', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-17 01:38:33', NULL, NULL),
(464, 'Clare Eichmann', NULL, NULL, 'freida11@gmail.com', '1-810-367-5175', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$g3eSAvBJzjuT9WFTf0ghVuW644X0I71rfVPvXgHFITKnsFVYi27Be', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-01-22 17:10:55', NULL, NULL),
(465, 'Reese Ruecker', NULL, NULL, 'avery86@gmail.com', '630.767.0441', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$SX0ddWnoXNQu7huMldesxOIj41dctGs0EYYKDtsixe6lYCq6wHDES', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-21 20:18:39', NULL, NULL),
(466, 'Ulices Bauch', NULL, NULL, 'njohns@jones.com', '+1.425.904.6118', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$Y72k8NY8ClmQOKPW/aRrhujg7PBtM1dm5iWruSWt0NUUAeqkJf7c.', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-05-15 02:35:35', NULL, NULL),
(467, 'Garrick Bartoletti II', NULL, NULL, 'kdonnelly@medhurst.net', '+19163221010', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$LKZAV4FOHXjgS/dNWKN2hejCyS.GfITwW.YxGuYECkQeJpBTsPVgi', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-03 05:37:05', NULL, NULL),
(468, 'Miss Adelia Kshlerin Sr.', NULL, NULL, 'donnelly.athena@watsica.com', '+1.757.300.8506', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$YlatZqadixnwmj8Qp0KHd.dWMxvtYRE6c/Riv8MhWopnem7CyVNrm', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-09 09:41:28', NULL, NULL),
(469, 'Virgil Morar', NULL, NULL, 'muller.rashawn@hotmail.com', '+18708291692', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$BoDECu/GZGOiE3WzmI/5f.LUiJOkCo9m2rMmE7HzxosmmVRUu2nda', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-02-06 11:21:31', NULL, NULL),
(470, 'Carmela Murphy', NULL, NULL, 'howell.isobel@hotmail.com', '1-863-400-4591', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$nkbORM8k2xOvYyPC0Shh9uVtZPQQuNBKS/OOy7KUMUgRi04OoOW8i', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-13 13:49:34', NULL, NULL),
(471, 'Kayla Metz', NULL, NULL, 'khuels@stoltenberg.com', '640.627.2408', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$m7bEHNZ5wCF.deMy/v46WeqnBllzZg.KMfmRcT7y3SmN0AcnmhIVC', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2023-04-28 05:54:02', NULL, NULL),
(472, 'Trever Muller IV', NULL, NULL, 'okon.eugene@yahoo.com', '541-323-5729', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$ZdrCc5wSkO0rRq7Kd9ZrveXU7i1CVOuoI3iiL15LjDp4j7z7IPhsW', 3, 5, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-18 20:34:00', NULL, NULL),
(473, 'Eliane Shanahan', NULL, NULL, 'delfina.swaniawski@yahoo.com', '262.677.5113', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$H3V3Ov8p0F1JmDzHTnw0j.VFcYhWwCtktGCARBn//sGvoqgEYNVNK', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-27 04:51:23', NULL, NULL),
(474, 'Prof. Kiarra Brown IV', NULL, NULL, 'hamill.breanna@gmail.com', '1-469-913-9386', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$BgH21kuu/933ud2gAd3kPeOYE35IXCOGxyZlb5XcwwVqqvqX34iWG', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-28 14:00:54', NULL, NULL),
(475, 'Elvie Marks', NULL, NULL, 'xkuvalis@abshire.com', '+1-703-589-3894', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$SdRKV7SNBGE2qM0RC7nrCepPYUc5zTIjz1i.WGWlaKlJXZ1h3ykvW', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-10 07:20:54', NULL, NULL),
(476, 'Justyn Macejkovic', NULL, NULL, 'claudia47@yahoo.com', '(541) 852-5947', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$en3hWzfigXEjayWYvLor1eSCVHO7o1omWjqK/alBIlL0LI0QC9TIu', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-01 23:02:23', NULL, NULL),
(477, 'Prof. Patience Pfannerstill', NULL, NULL, 'pabbott@gmail.com', '+1-561-278-9998', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$uLJ0Qo8kWFJZtA3FVlbTOOGIheVeK92FjsIIzvTR4TiCqEqghGBN6', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-06-24 03:36:54', NULL, NULL),
(478, 'Vicente Gottlieb', NULL, NULL, 'margaret56@yahoo.com', '+1-520-435-2138', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$KNNX9vhepRWYlJDVh75qKOWq5DiCeQyZl0YAQjFE.RQThLSa8Q.Hi', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2021-09-25 14:57:18', NULL, NULL),
(479, 'Lacy Balistreri', NULL, NULL, 'myrtie72@gmail.com', '+1-732-200-3804', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$SWdM6DjAet108u5gQBqurOLxeNi7xXFS7orEQtJwROxa0NGt4LQrO', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-10-27 05:19:55', NULL, NULL),
(480, 'Estella Schroeder', NULL, NULL, 'oberbrunner.jacques@hotmail.com', '754-623-5067', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$IOcgLeY0U5CY.ilZCoQxmumFLP0Oa4OeBGFLqcy93mg0ioDvIM1CC', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-25 23:57:47', NULL, NULL),
(481, 'Alfreda Lind', NULL, NULL, 'gottlieb.jaylin@hotmail.com', '+1-347-463-5767', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$6wdNhSNB/mldm6FP3sDqn.c75gyT4/isp4PjswSH/vkeLJCwZ9reS', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2022-07-10 05:39:26', NULL, NULL),
(482, 'Prof. Marcelino Kohler IV', NULL, NULL, 'zroob@yahoo.com', '952.984.0455', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$HM3808VR3.fSytVXTnnMpuMrU8E34SN2APeCANtJk77Yw.23eQ7Y2', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-02-23 15:42:23', NULL, NULL),
(483, 'Maude Connelly', NULL, NULL, 'legros.percival@yahoo.com', '580.829.8157', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$p7j5psYuKLPL2eXpo6LAr.1R0mxBXy.LgLTVS0M4vCCkHVi7txNc6', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-01-08 12:44:39', NULL, NULL),
(484, 'Prof. Mitchell Fisher Jr.', NULL, NULL, 'schmeler.jesus@gmail.com', '1-913-984-5888', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$unQ8JqAIpGDn6i1CEnnLeOnYEyFa6GICbQCAJg8VP6tRm.rNvsEmi', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-19 00:57:47', NULL, NULL),
(485, 'Letha Wyman PhD', NULL, NULL, 'vgaylord@gmail.com', '+17192155556', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$MCEdkxXU90HKHbtsG66F8.dGoLIpn2h3zDcM374luyvxvREUwmaQe', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-18 09:52:46', NULL, NULL),
(486, 'Reanna Block', NULL, NULL, 'dewayne30@gmail.com', '1-951-969-5514', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$R3.A/BbC503wTDAO8BsQ2ea6vdqCCHYEBct.3CrG3wXKxZ0CpxWfK', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-05-19 17:30:14', NULL, NULL),
(487, 'Wilburn Sipes', NULL, NULL, 'cwolf@yahoo.com', '848-745-2218', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$MiltDwQZEMVQMVo6fz2/P.rO06OvoYcFEWAdrjfi2kM1QUjZD/0ie', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-15 11:57:34', NULL, NULL),
(488, 'Tressa Green', NULL, NULL, 'frederique.king@hotmail.com', '+1-608-587-0844', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$3LJrgb4JwLAnZTXqJoC0fuG9KwnfUntFzPFTy/7rPIe76/9FrfLpi', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-05-12 22:48:51', NULL, NULL),
(489, 'Kay Gorczany', NULL, NULL, 'wcronin@little.com', '+18705209543', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$lC1uJxR7XXm4H1kJX1KNPeEa1INjNxNUyEXw/ZJmZmpno3F1Zar/O', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-18 19:52:00', NULL, NULL),
(490, 'Bria Cassin', NULL, NULL, 'wwintheiser@hamill.com', '(810) 206-9802', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$.HZW6tCNtAdjJDxtjBNM3ekDEN/GcQsGQxTd11t5VSgrxNNkQbqUe', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-06-25 12:35:21', NULL, NULL),
(491, 'Noemie Zemlak', NULL, NULL, 'schinner.alden@kassulke.com', '(740) 845-9929', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$VsSazGcdLRbHjCMgXRhB8ugVKppHOdZ7NrbFmH8nHY5ekowndvDuq', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-01 04:04:18', NULL, NULL),
(492, 'Kayli Farrell', NULL, NULL, 'burley77@mccullough.info', '+1 (650) 832-5395', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$43qrprdvv8Vao3roDTuyXuf3HifEoTShPLOhol8mD1WVtXA3KAWKy', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, '2022-03-03 00:32:51', NULL, NULL),
(493, 'Angela Emmerich', NULL, NULL, 'jamie57@mohr.biz', '+1-602-608-1628', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'ios', '$2y$10$cFoSPHqVagoe86mWCo7FNuWWHm6Byf.P5ECf1HkSrAlcSrlgCZCii', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-16 08:53:28', NULL, NULL),
(494, 'Brown McKenzie', NULL, NULL, 'schamberger.rosalind@yahoo.com', '680-219-5436', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$b5a4LkrEVBZdtiW3iRNCR.jrTlkEuC54IYO736wSJJGeFgzWU9jjK', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-07 20:47:35', NULL, NULL),
(495, 'Susan Flatley', NULL, NULL, 'elody.funk@west.com', '332-480-3340', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$h3KMzWJdQq73Fyxx9.K2o.H8t0G1EH/y9cIHz9Bd./UjfnhD8B3Du', 3, 6, NULL, 0, NULL, NULL, NULL, NULL, '2023-03-19 04:39:53', NULL, NULL),
(496, 'Lauren Casper II', NULL, NULL, 'lowe.kendra@yahoo.com', '956-554-4407', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$xCvTmIhDmrRAgaPmyasZ4eIIktmjKX9v4XOBho7IeUFo8B6QfGATG', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-12-20 12:01:39', NULL, NULL),
(497, 'Cleve Zieme', NULL, NULL, 'robb97@hermann.org', '1-386-829-0764', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$6O9f5yjccoyImnKi95tkcuuChL1dOdeh1t0xvCRjNirDI1cmdtLNy', 1, 2, NULL, 0, NULL, NULL, NULL, NULL, '2020-11-26 17:59:30', NULL, NULL),
(498, 'Dell Rippin', NULL, NULL, 'albin.walter@mertz.com', '(386) 990-4459', NULL, NULL, 'en', NULL, NULL, 'female', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$evy73ztXCsJkl94bjFFeCOn5bAxpmjAVhKxT0sp.KLKgT8dfXUrfe', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-06-09 10:49:43', NULL, NULL),
(499, 'Prof. Blair O\'Hara', NULL, NULL, 'vdaugherty@bode.biz', '(352) 539-6276', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$/sdnxf40W8l3397duwXFI.v17Zb7Hirv4Ahgl0nmkPtv6ORA/oVBe', 2, 3, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-21 18:10:00', NULL, NULL),
(500, 'Clifton Wuckert', NULL, NULL, 'bell68@langworth.net', '616-274-4680', NULL, NULL, 'en', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'mobile', '$2y$10$KC7HT6LgQ94q1l3H4GDpK.kCjdDogbWdSra/cnqeD9bRg.O9mpQh6', 2, 4, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-13 07:50:36', NULL, NULL),
(501, 'mostafa gamal', 'mostafa', 'gamal', 'mostafagamal@gmail.com', '01097253063', NULL, '1992-10-21', 'en', 'test1', NULL, 'male', '1', '0', NULL, NULL, NULL, 'android', '$2y$10$XOQnEFuzewpEiSIvTZBH/uTTDbQBum9bFp31K1bpPXJeT7QHJ4zcq', 3, 5, 5, 1, '25.040645346242', '55.195865336201', 'address 1', NULL, '2023-06-05 06:38:46', '2023-06-05 06:39:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_favorite_products`
--

CREATE TABLE `user_favorite_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `can_add_products` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `can_add_halls` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `commission` double(8,2) NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `halls_count` int(11) DEFAULT NULL,
  `products_count` int(11) DEFAULT NULL,
  `vendor_admin` int(11) DEFAULT NULL,
  `type` enum('product','hall','product_hall') COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` enum('individual','company') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tax_Number` int(11) DEFAULT NULL,
  `commercial_registration_number` int(11) DEFAULT NULL,
  `Tax_Number_expiration_date` date DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `email`, `phone`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `can_add_products`, `can_add_halls`, `status`, `commission`, `admin_id`, `image`, `halls_count`, `products_count`, `vendor_admin`, `type`, `account`, `Tax_Number`, `commercial_registration_number`, `Tax_Number_expiration_date`, `country_id`, `city_id`, `region_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'hm@email.com', '01121238817', 'H&M', 'H&M', 'h-m', 'h-m', '<p><strong>إتش أند أم</strong> (H&amp;M أو Hennes &amp; Mauritz AB) هي شركة <a href=\"https://ar.wikipedia.org/wiki/%D8%A7%D9%84%D8%B3%D9%88%D9%8A%D8%AF\">سويدية</a> <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D8%B1%D9%83%D8%A9_%D9%85%D8%AA%D8%B9%D8%AF%D8%AF%D8%A9_%D8%A7%D9%84%D8%AC%D9%86%D8%B3%D9%8A%D8%A7%D8%AA\">متعددة الجنسيات</a> لبيع الملابس <a href=\"https://ar.wikipedia.org/wiki/%D8%AA%D8%AC%D8%A7%D8%B1%D8%A9_%D8%A7%D9%84%D8%AA%D8%AC%D8%B2%D8%A6%D8%A9\">بالتجزئة</a>، معروفة ب<a href=\"https://ar.wikipedia.org/wiki/%D9%85%D9%88%D8%B6%D8%A9_%D8%B3%D8%B1%D9%8A%D8%B9%D8%A9\">موضاتها السريعة</a> لأزياء الرجال والنساء والمراهقين والأطفال. تتواجد فروعها في 62 دولة بها أكثر من 4500 متجراً، ويعمل بها حوالي 132,000 شخص (عام 2015).<a href=\"https://ar.wikipedia.org/wiki/%D8%A5%D8%AA%D8%B4_%D8%A3%D9%86%D8%AF_%D8%A3%D9%85#cite_note-4\">[4]</a> ولدى الشركة مراكز <a href=\"https://ar.wikipedia.org/wiki/%D8%AA%D8%B3%D9%88%D9%82_%D8%B9%D8%A8%D8%B1_%D8%A7%D9%84%D8%A5%D9%86%D8%AA%D8%B1%D9%86%D8%AA\">تسوق عبر الانترنت</a> في 32 بلداً.</p>', '<p>The company was founded by <a href=\"https://en.wikipedia.org/wiki/Erling_Persson\">Erling Persson</a> in 1947 when he opened his first shop in <a href=\"https://en.wikipedia.org/wiki/V%C3%A4ster%C3%A5s\">Västerås</a>, Sweden.<a href=\"https://en.wikipedia.org/wiki/H%26M#cite_note-h&amp;m-12\">[10]</a> The shop, called Hennes (Swedish for \"hers\"), exclusively sold women\'s clothing. Another store opened in <a href=\"https://en.wikipedia.org/wiki/Norway\">Norway</a> in 1964.<a href=\"https://en.wikipedia.org/wiki/H%26M#cite_note-13\">[11]</a> In 1968, Persson acquired the hunting apparel retailer Mauritz Widforss in Stockholm, which led to the inclusion of a menswear collection in the product range, and the name changed to Hennes &amp; Mauritz.<a href=\"https://en.wikipedia.org/wiki/H%26M#cite_note-h&amp;m-12\">[10]</a></p>', 'إتش أند أم (H&M أو Hennes & Mauritz AB) هي شركة سويدية متعددة الجنسيات لبيع الملابس بالتجزئة، معروفة بموضاتها السريعة لأزياء الرجال والنساء والمراهقين والأطفال. تتواجد فروعها في 62 دولة بها أكثر من 4500 متجراً، ويعمل بها حوالي 132,000 شخص (عام 2015).[4] ولدى الشركة مراكز تسوق عبر الانترنت في 32 بلداً.', 'The company was founded by Erling Persson in 1947 when he opened his first shop in Västerås, Sweden.[10] The shop, called Hennes (Swedish for \"hers\"), exclusively sold women\'s clothing. Another store opened in Norway in 1964.[11] In 1968, Persson acquired the hunting apparel retailer Mauritz Widforss in Stockholm, which led to the inclusion of a menswear collection in the product range, and the name changed to Hennes & Mauritz.[10]', 'إتش أند أم (H&M أو Hennes & Mauritz AB) هي شركة سويدية متعددة الجنسيات لبيع الملابس بالتجزئة، معروفة بموضاتها السريعة لأزياء الرجال والنساء والمراهقين والأطفال. تتواجد فروعها في 62 دولة بها أكثر من 4500 متجراً، ويعمل بها حوالي 132,000 شخص (عام 2015).[4] ولدى الشركة مراكز تسوق عبر الانترنت في 32 بلداً.', 'The company was founded by Erling Persson in 1947 when he opened his first shop in Västerås, Sweden.[10] The shop, called Hennes (Swedish for \"hers\"), exclusively sold women\'s clothing. Another store opened in Norway in 1964.[11] In 1968, Persson acquired the hunting apparel retailer Mauritz Widforss in Stockholm, which led to the inclusion of a menswear collection in the product range, and the name changed to Hennes & Mauritz.[10]', '0', '0', '1', 10.00, 1, 'DansrmoKVOCk592IprnU4PiOhvesioGKVKWoV566.png', 10, 10, 10, 'product', 'individual', NULL, NULL, NULL, 1, 5, 5, NULL, '2023-06-04 16:20:14', '2023-06-04 16:20:14'),
(8, 'kitkat@email.com', '01121238810', 'kitkat', 'kitkat', 'kitkat', 'kitkat', '<p><strong>كيت كات</strong> هي قالب <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9\">شوكولاتة</a> شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9\">بالشوكولاته</a>، كان أول من انتجها هو مصنع <a href=\"https://ar.wikipedia.org/w/index.php?title=%D8%B1%D8%A7%D9%88%D9%86%D8%AA%D8%B1%D9%8A&amp;action=edit&amp;redlink=1\">راونتري</a> في <a href=\"https://ar.wikipedia.org/wiki/%D9%8A%D9%88%D8%B1%D9%83\">يورك</a>، <a href=\"https://ar.wikipedia.org/wiki/%D8%A5%D9%86%D8%AC%D9%84%D8%AA%D8%B1%D8%A7\">إنجلترا</a>، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة <a href=\"https://ar.wikipedia.org/wiki/%D9%86%D8%B3%D8%AA%D9%84%D9%87\">نستله</a> والتي استحوذت على راونتري في عام 1988،<a href=\"https://ar.wikipedia.org/wiki/%D9%83%D9%8A%D8%AA_%D9%83%D8%A7%D8%AA_(%D8%AD%D9%84%D9%88%D9%89)#cite_note-1\">[1]</a> إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D8%B1%D9%83%D8%A9_%D9%87%D9%8A%D8%B1%D8%B4%D9%8A\">شركة هيرشي</a>. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من <a href=\"https://ar.wikipedia.org/w/index.php?title=%D8%B1%D9%82%D8%A7%D9%82%D8%A9_(%D8%A8%D8%B3%D9%83%D9%88%D9%8A%D8%AA)&amp;action=edit&amp;redlink=1\">رقاقات البسكويت</a>، التي تغطيها طبقة خارجية من <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D9%88%D9%83%D9%88%D9%84%D8%A7%D8%AA%D8%A9\">الشوكولاته</a>. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (<a href=\"https://ar.wikipedia.org/wiki/%D8%A7%D9%84%D9%84%D8%BA%D8%A9_%D8%A7%D9%84%D8%A5%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9\">بالإنجليزية</a>: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.</p>', '<p><strong>Kit Kat</strong> (stylised as <strong>KitKat</strong> in various countries) is a <a href=\"https://en.wikipedia.org/wiki/Chocolate\">chocolate</a>-covered <a href=\"https://en.wikipedia.org/wiki/Wafer\">wafer</a> bar <a href=\"https://en.wikipedia.org/wiki/Confectionery\">confection</a> created by <a href=\"https://en.wikipedia.org/wiki/Rowntree%27s\">Rowntree\'s</a> of <a href=\"https://en.wikipedia.org/wiki/York\">York</a>, United Kingdom, and is now produced globally by <a href=\"https://en.wikipedia.org/wiki/Nestl%C3%A9\">Nestlé</a> (which acquired Rowntree\'s in 1988),<a href=\"https://en.wikipedia.org/wiki/Kit_Kat#cite_note-1\">[1]</a> except in the United States, where it is made under <a href=\"https://en.wikipedia.org/wiki/Licence\">licence</a> by the <a href=\"https://en.wikipedia.org/wiki/H._B._Reese\">H. B. Reese Candy Company</a>, a division of the <a href=\"https://en.wikipedia.org/wiki/The_Hershey_Company\">Hershey Company</a> (an agreement Rowntree\'s first made with Hershey in 1970).<a href=\"https://en.wikipedia.org/wiki/Kit_Kat#cite_note-NYTimes-2\">[2]</a></p>', 'كيت كات هي قالب شوكولاتة شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة بالشوكولاته، كان أول من انتجها هو مصنع راونتري في يورك، إنجلترا، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة نستله والتي استحوذت على راونتري في عام 1988، إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل شركة هيرشي. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من رقاقات البسكويت، التي تغطيها طبقة خارجية من الشوكولاته. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (بالإنجليزية: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.', 'Kit Kat (stylised as KitKat in various countries) is a chocolate-covered wafer bar confection created by Rowntree\'s of York, United Kingdom, and is now produced globally by Nestlé (which acquired Rowntree\'s in 1988),[1] except in the United States, where it is made under licence by the H. B. Reese Candy Company, a division of the Hershey Company (an agreement Rowntree\'s first made with Hershey in 1970).[2]', 'كيت كات هي قالب شوكولاتة شهير مصنوع من رقاقات بسكويت (ويفر) مغطاة بالشوكولاته، كان أول من انتجها هو مصنع راونتري في يورك، إنجلترا، ويتم الآن إنتاجها في جميع أنحاء العالم من قبل شركة نستله والتي استحوذت على راونتري في عام 1988، إلا في الولايات المتحدة حيث يتم إنتاجها بموجب ترخيص من قبل شركة هيرشي. يتكون كل قالب من أصابع مؤلفة من ثلاث طبقات من رقاقات البسكويت، التي تغطيها طبقة خارجية من الشوكولاته. تحتوي القوالب عادة على 2 أو 4 أصابع. قوالب كيت كات السميكة المكتنزة «شانكي» (بالإنجليزية: Chunky)‏ هي أيضاً قوالب رائجة عالمياً.', 'Kit Kat (stylised as KitKat in various countries) is a chocolate-covered wafer bar confection created by Rowntree\'s of York, United Kingdom, and is now produced globally by Nestlé (which acquired Rowntree\'s in 1988),[1] except in the United States, where it is made under licence by the H. B. Reese Candy Company, a division of the Hershey Company (an agreement Rowntree\'s first made with Hershey in 1970).[2]', '0', '0', '1', 10.00, 1, '6z9zTdBzSmueftBGil3BHRpRsGZbKxJZ17MnrOII.png', 10, 10, 10, 'product', 'individual', NULL, NULL, NULL, 1, 6, 6, NULL, '2023-06-04 16:23:51', '2023-06-04 16:23:52'),
(9, 'intercontinental@email.com', '01123454434', 'intercontinental', 'intercontinental', 'intercontinental', 'intercontinental', '<p><strong>مجموعة فنادق إنتركونتيننتال</strong> (<a href=\"https://ar.wikipedia.org/wiki/%D8%A7%D9%84%D9%84%D8%BA%D8%A9_%D8%A7%D9%84%D8%A5%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9\">بالإنجليزية</a>: InterContinental Hotels Group)‏ المعروفة أختصار بـ <strong>أي أتش جي</strong> (IHG)، ورسمياً <strong>فنادق إنتركونتيننتال</strong>، هي شركة فنادق بريطانية <a href=\"https://ar.wikipedia.org/wiki/%D8%B4%D8%B1%D9%83%D8%A9_%D9%85%D8%AA%D8%B9%D8%AF%D8%AF%D8%A9_%D8%A7%D9%84%D8%AC%D9%86%D8%B3%D9%8A%D8%A7%D8%AA\">متعددة الجنسيات</a>، تأسست في 15 أبريل 2003، ويقع مقرها الرئيسي في دنهام، في <a href=\"https://ar.wikipedia.org/wiki/%D8%A8%D8%A7%D9%83%D9%8A%D9%86%D8%BA%D9%87%D8%A7%D9%85%D8%B4%D9%8A%D8%B1\">باكينجهامشير</a>، <a href=\"https://ar.wikipedia.org/wiki/%D8%A7%D9%84%D9%85%D9%85%D9%84%D9%83%D8%A9_%D8%A7%D9%84%D9%85%D8%AA%D8%AD%D8%AF%D8%A9\">المملكة المتحدة</a>.</p><p>وهي أكبر شركة فنادق في العالم من حيث عدد الغرف، والذي بلغ عدد غرفها 687,000 غرفة في فبراير 2014، ولديها أكثر من 4,600 <a href=\"https://ar.wikipedia.org/wiki/%D9%81%D9%86%D8%AF%D9%82\">فندق</a> في أكثر من 100 دولة حول العالم.</p>', '<p><strong>InterContinental Hotels &amp; Resorts</strong> is a luxury hotel brand created in 1946 by <a href=\"https://en.wikipedia.org/wiki/Pan_American_World_Airways\">Pan Am</a> founder <a href=\"https://en.wikipedia.org/wiki/Juan_Trippe\">Juan Trippe</a>.<a href=\"https://en.wikipedia.org/wiki/InterContinental#cite_note-auto-1\">[1]</a> It has been part of UK-based <a href=\"https://en.wikipedia.org/wiki/IHG_Hotels_%26_Resorts\">InterContinental Hotels Group</a> since 1998.<a href=\"https://en.wikipedia.org/wiki/InterContinental#cite_note-auto-1\">[1]</a> As of January 2023, there were 208 InterContinental hotels worldwide, with 70,287 rooms.<a href=\"https://en.wikipedia.org/wiki/InterContinental#cite_note-2\">[2]</a></p>', 'مجموعة فنادق إنتركونتيننتال (بالإنجليزية: InterContinental Hotels Group)‏ المعروفة أختصار بـ أي أتش جي (IHG)، ورسمياً فنادق إنتركونتيننتال، هي شركة فنادق بريطانية متعددة الجنسيات، تأسست في 15 أبريل 2003، ويقع مقرها الرئيسي في دنهام، في باكينجهامشير، المملكة المتحدة.\r\n\r\nوهي أكبر شركة فنادق في العالم من حيث عدد الغرف، والذي بلغ عدد غرفها 687,000 غرفة في فبراير 2014، ولديها أكثر من 4,600 فندق في أكثر من 100 دولة حول العالم.', 'InterContinental Hotels & Resorts is a luxury hotel brand created in 1946 by Pan Am founder Juan Trippe.[1] It has been part of UK-based InterContinental Hotels Group since 1998.[1] As of January 2023, there were 208 InterContinental hotels worldwide, with 70,287 rooms.[2]', 'مجموعة فنادق إنتركونتيننتال (بالإنجليزية: InterContinental Hotels Group)‏ المعروفة أختصار بـ أي أتش جي (IHG)، ورسمياً فنادق إنتركونتيننتال، هي شركة فنادق بريطانية متعددة الجنسيات، تأسست في 15 أبريل 2003، ويقع مقرها الرئيسي في دنهام، في باكينجهامشير، المملكة المتحدة.\r\n\r\nوهي أكبر شركة فنادق في العالم من حيث عدد الغرف، والذي بلغ عدد غرفها 687,000 غرفة في فبراير 2014، ولديها أكثر من 4,600 فندق في أكثر من 100 دولة حول العالم.', 'InterContinental Hotels & Resorts is a luxury hotel brand created in 1946 by Pan Am founder Juan Trippe.[1] It has been part of UK-based InterContinental Hotels Group since 1998.[1] As of January 2023, there were 208 InterContinental hotels worldwide, with 70,287 rooms.[2]', '0', '0', '1', 10.00, 1, 'EWZt5hxbgc0x9vbnVxKSrBhOOBTVSAJQhVjWK1sG.jpg', 10, 10, 10, 'hall', 'individual', NULL, NULL, NULL, 1, 5, 5, NULL, '2023-06-04 16:30:48', '2023-06-04 16:30:48'),
(10, 'holiday_inn@email.com', '01128909987', 'Holiday Inn', 'Holiday Inn', 'holiday-inn', 'holiday-inn', '<p><strong>هوليداي إن اكسبرس</strong> هي سلسلة فنادق متوسطة السعر داخل أسرة <a href=\"https://ar.wikipedia.org/wiki/%D9%85%D8%AC%D9%85%D9%88%D8%B9%D8%A9_%D9%81%D9%86%D8%A7%D8%AF%D9%82_%D8%A5%D9%86%D8%AA%D8%B1%D9%83%D9%88%D9%86%D8%AA%D9%8A%D9%86%D9%86%D8%AA%D8%A7%D9%84\">مجموعة فنادق إنتركونتيننتال</a> من العلامات التجارية. كما <a href=\"https://ar.wikipedia.org/wiki/%D9%81%D9%86%D8%AF%D9%82\">فندق</a> «إكسبريس»، تركيزهم على تقديم خدمات محدودة وسعر معقول. تميل وسائل الراحة القياسية نحو الملائمة والعملية التي تلبي احتياجات المسافرين من رجال الأعمال والإقامة على المدى القصير. أُطلقت العلامة التجارية لأول مرة في <a href=\"https://ar.wikipedia.org/wiki/%D8%A7%D9%84%D9%88%D9%84%D8%A7%D9%8A%D8%A7%D8%AA_%D8%A7%D9%84%D9%85%D8%AA%D8%AD%D8%AF%D8%A9\">الولايات المتحدة</a> في عام 1991، مع أول موقع أوروبي في اسكتلندا في عام 1996، والآن هناك ما يقارب 2,200 فندق هوليداي إن إكسبريس في جميع أنحاء العالم.<a href=\"https://ar.wikipedia.org/wiki/%D9%87%D9%88%D9%84%D9%8A%D8%AF%D8%A7%D9%8A_%D8%A5%D9%86_%D8%A5%D9%83%D8%B3%D8%A8%D8%B1%D9%8A%D8%B3#cite_note-%D9%85%D9%88%D9%84%D8%AF_%D8%AA%D9%84%D9%82%D8%A7%D8%A6%D9%8A%D8%A72-1\">[1]</a> في أوروبا، الفنادق كانت معروفة بإكسبرس من هوليداي إن، <a href=\"https://ar.wikipedia.org/wiki/%D9%87%D9%88%D9%84%D9%8A%D8%AF%D8%A7%D9%8A_%D8%A5%D9%86_%D8%A5%D9%83%D8%B3%D8%A8%D8%B1%D9%8A%D8%B3#cite_note-%D9%85%D9%88%D9%84%D8%AF_%D8%AA%D9%84%D9%82%D8%A7%D8%A6%D9%8A%D8%A72-1\">[1]</a> ولكن هذا الاختلاف ألغي تدريجياً من خلال هوليداي إن غلوبال براند ريلانش التي تم الإعلان عنها في عام 2007.</p>', '<p><strong>Holiday Inn</strong> is an American chain of <a href=\"https://en.wikipedia.org/wiki/Hotel\">hotels</a> based in <a href=\"https://en.wikipedia.org/wiki/Atlanta\">Atlanta</a>, Georgia and a brand of <a href=\"https://en.wikipedia.org/wiki/IHG_Hotels_%26_Resorts\">IHG Hotels &amp; Resorts</a>. The chain was founded in 1952 by <a href=\"https://en.wikipedia.org/wiki/Kemmons_Wilson\">Kemmons Wilson</a>, who opened the first location in <a href=\"https://en.wikipedia.org/wiki/Memphis,_Tennessee\">Memphis, Tennessee</a> that year. The chain was a division of <a href=\"https://en.wikipedia.org/wiki/Bass_Brewery\">Bass Brewery</a> from 1988-2000, <a href=\"https://en.wikipedia.org/wiki/Six_Continents\">Six Continents</a> from 2000-03, and <a href=\"https://en.wikipedia.org/wiki/IHG_Hotels_%26_Resorts\">IHG Hotels &amp; Resorts</a> since 2003. It operates hotels under the names Holiday Inn, <a href=\"https://en.wikipedia.org/wiki/Holiday_Inn_Express\">Holiday Inn Express</a>, Holiday Inn Club Vacations, and Holiday Inn Resorts. As of 2018, Holiday Inn operates more than 1,100 locations.</p>', 'هوليداي إن اكسبرس هي سلسلة فنادق متوسطة السعر داخل أسرة مجموعة فنادق إنتركونتيننتال من العلامات التجارية. كما فندق «إكسبريس»، تركيزهم على تقديم خدمات محدودة وسعر معقول. تميل وسائل الراحة القياسية نحو الملائمة والعملية التي تلبي احتياجات المسافرين من رجال الأعمال والإقامة على المدى القصير. أُطلقت العلامة التجارية لأول مرة في الولايات المتحدة في عام 1991، مع أول موقع أوروبي في اسكتلندا في عام 1996، والآن هناك ما يقارب 2,200 فندق هوليداي إن إكسبريس في جميع أنحاء العالم. في أوروبا، الفنادق كانت معروفة بإكسبرس من هوليداي إن،  ولكن هذا الاختلاف ألغي تدريجياً من خلال هوليداي إن غلوبال براند ريلانش التي تم الإعلان عنها في عام 2007.', 'Holiday Inn is an American chain of hotels based in Atlanta, Georgia and a brand of IHG Hotels & Resorts. The chain was founded in 1952 by Kemmons Wilson, who opened the first location in Memphis, Tennessee that year. The chain was a division of Bass Brewery from 1988-2000, Six Continents from 2000-03, and IHG Hotels & Resorts since 2003. It operates hotels under the names Holiday Inn, Holiday Inn Express, Holiday Inn Club Vacations, and Holiday Inn Resorts. As of 2018, Holiday Inn operates more than 1,100 locations.', 'هوليداي إن اكسبرس هي سلسلة فنادق متوسطة السعر داخل أسرة مجموعة فنادق إنتركونتيننتال من العلامات التجارية. كما فندق «إكسبريس»، تركيزهم على تقديم خدمات محدودة وسعر معقول. تميل وسائل الراحة القياسية نحو الملائمة والعملية التي تلبي احتياجات المسافرين من رجال الأعمال والإقامة على المدى القصير. أُطلقت العلامة التجارية لأول مرة في الولايات المتحدة في عام 1991، مع أول موقع أوروبي في اسكتلندا في عام 1996، والآن هناك ما يقارب 2,200 فندق هوليداي إن إكسبريس في جميع أنحاء العالم. في أوروبا، الفنادق كانت معروفة بإكسبرس من هوليداي إن،  ولكن هذا الاختلاف ألغي تدريجياً من خلال هوليداي إن غلوبال براند ريلانش التي تم الإعلان عنها في عام 2007.', 'Holiday Inn is an American chain of hotels based in Atlanta, Georgia and a brand of IHG Hotels & Resorts. The chain was founded in 1952 by Kemmons Wilson, who opened the first location in Memphis, Tennessee that year. The chain was a division of Bass Brewery from 1988-2000, Six Continents from 2000-03, and IHG Hotels & Resorts since 2003. It operates hotels under the names Holiday Inn, Holiday Inn Express, Holiday Inn Club Vacations, and Holiday Inn Resorts. As of 2018, Holiday Inn operates more than 1,100 locations.', '0', '0', '1', 10.00, 1, '53C10TxQ4lTQ77MwMg0sSyxUgUpUdKOMVeqR3SOM.png', 10, 10, 10, 'hall', 'individual', NULL, NULL, NULL, 1, 6, 6, NULL, '2023-06-04 16:33:13', '2023-06-04 16:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_infos`
--

CREATE TABLE `vendor_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `side_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `view_all_products`
--

CREATE TABLE `view_all_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `why_we_choose_footers`
--

CREATE TABLE `why_we_choose_footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `with_draws`
--

CREATE TABLE `with_draws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `have` double NOT NULL,
  `our_commission` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `with_draws`
--

INSERT INTO `with_draws` (`id`, `vendor_name`, `vendor_phone`, `money_type`, `order_number`, `action_id`, `total`, `have`, `our_commission`, `created_at`, `updated_at`) VALUES
(3, 'H&M', '01121238817', 'Product Order', '000000001', 1, 2200, 1980, 220, '2023-06-05 10:32:19', '2023-06-05 10:32:19'),
(4, 'kitkat', '01121238810', 'Product Order', '000000001', 1, 110, 99, 11, '2023-06-05 11:01:58', '2023-06-05 11:01:58'),
(5, 'intercontinental', '01123454434', 'Hall Booking', NULL, 5, 18800, 16920, 1880, '2023-06-05 11:07:02', '2023-06-05 11:07:02'),
(6, 'Holiday Inn', '01128909987', 'Hall Booking', NULL, 4, 60800, 54720, 6080, '2023-06-05 11:08:25', '2023-06-05 11:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `with_draw_requests`
--

CREATE TABLE `with_draw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `with_draw_id` int(11) NOT NULL,
  `budget_before` double NOT NULL,
  `budget` double NOT NULL,
  `type` enum('from_admin','from_vendor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'from_admin',
  `status` enum('accepted','rejected','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD KEY `admins_category_id_foreign` (`category_id`);

--
-- Indexes for table `admin_categories`
--
ALTER TABLE `admin_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_categories_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `admin_categories_title_en_unique` (`title_en`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_category_id_foreign` (`category_id`),
  ADD KEY `ads_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_categories`
--
ALTER TABLE `ad_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad_categories_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `ad_categories_title_en_unique` (`title_en`),
  ADD KEY `ad_categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_explore_categories`
--
ALTER TABLE `assign_explore_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_dates`
--
ALTER TABLE `available_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_dates_hall_id_foreign` (`hall_id`);

--
-- Indexes for table `become_vendors`
--
ALTER TABLE `become_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_selleres`
--
ALTER TABLE `best_selleres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `blogs_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `blogs_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `blogs_slug_en_unique` (`slug_en`),
  ADD KEY `blogs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_details_option_id_foreign` (`option_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_halls`
--
ALTER TABLE `cart_halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_halls_user_id_foreign` (`user_id`),
  ADD KEY `cart_halls_hall_id_foreign` (`hall_id`),
  ADD KEY `cart_halls_package_id_foreign` (`package_id`);

--
-- Indexes for table `cart_hall_options`
--
ALTER TABLE `cart_hall_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_hall_options_cart_hall_id_foreign` (`cart_hall_id`),
  ADD KEY `cart_hall_options_option_id_foreign` (`option_id`);

--
-- Indexes for table `categories_halls`
--
ALTER TABLE `categories_halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `cities_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `cities_code_unique` (`code`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `clients_ads`
--
ALTER TABLE `clients_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare_lists`
--
ALTER TABLE `compare_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_message_replies`
--
ALTER TABLE `contact_message_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_message_replies_contact_id_foreign` (`contact_id`),
  ADD KEY `contact_message_replies_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `countries_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `countries_shortcut_unique` (`shortcut`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

--
-- Indexes for table `digital_cards`
--
ALTER TABLE `digital_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dynamic_pages_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `dynamic_pages_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `dynamic_pages_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `dynamic_pages_slug_en_unique` (`slug_en`),
  ADD KEY `dynamic_pages_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `explore_categories`
--
ALTER TABLE `explore_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fast_links`
--
ALTER TABLE `fast_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_hall_id_foreign` (`hall_id`),
  ADD KEY `favourites_product_id_foreign` (`product_id`);

--
-- Indexes for table `features_sections`
--
ALTER TABLE `features_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `find_us`
--
ALTER TABLE `find_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_advs`
--
ALTER TABLE `first_advs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_contact_us`
--
ALTER TABLE `footer_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_main_sections`
--
ALTER TABLE `footer_main_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_q_categories`
--
ALTER TABLE `f_a_q_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `f_a_q_categories_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `f_a_q_categories_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `f_a_q_categories_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `f_a_q_categories_slug_en_unique` (`slug_en`),
  ADD KEY `f_a_q_categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_a_q_s_admin_id_foreign` (`admin_id`),
  ADD KEY `f_a_q_s_category_id_foreign` (`category_id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `halls_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `halls_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `halls_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `halls_slug_en_unique` (`slug_en`),
  ADD KEY `halls_country_id_foreign` (`country_id`),
  ADD KEY `halls_city_id_foreign` (`city_id`);

--
-- Indexes for table `hall_bookings`
--
ALTER TABLE `hall_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall_booking_taxes`
--
ALTER TABLE `hall_booking_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall_categories`
--
ALTER TABLE `hall_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hall_categories_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `hall_categories_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `hall_categories_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `hall_categories_slug_en_unique` (`slug_en`),
  ADD KEY `hall_categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `hall_media`
--
ALTER TABLE `hall_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_media_hall_id_foreign` (`hall_id`);

--
-- Indexes for table `hall_packages`
--
ALTER TABLE `hall_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_packages_hall_id_foreign` (`hall_id`),
  ADD KEY `hall_packages_package_id_foreign` (`package_id`);

--
-- Indexes for table `hall_taxes`
--
ALTER TABLE `hall_taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_taxes_hall_id_foreign` (`hall_id`),
  ADD KEY `hall_taxes_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `hint_sections`
--
ALTER TABLE `hint_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_sliders_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `inqueries`
--
ALTER TABLE `inqueries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inqueries_user_id_foreign` (`user_id`);

--
-- Indexes for table `inquery_replies`
--
ALTER TABLE `inquery_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquery_replies_inquery_id_foreign` (`inquery_id`);

--
-- Indexes for table `latest_birthday_halls`
--
ALTER TABLE `latest_birthday_halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_engagments_halls`
--
ALTER TABLE `latest_engagments_halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_products`
--
ALTER TABLE `latest_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_wedding_halls`
--
ALTER TABLE `latest_wedding_halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_section_footers`
--
ALTER TABLE `main_section_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_sliders`
--
ALTER TABLE `main_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_account_section_footers`
--
ALTER TABLE `my_account_section_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbars`
--
ALTER TABLE `navbars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_sections`
--
ALTER TABLE `news_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `occasions_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `occasions_title_en_unique` (`title_en`),
  ADD KEY `occasions_country_id_foreign` (`country_id`),
  ADD KEY `occasions_city_id_foreign` (`city_id`),
  ADD KEY `occasions_region_id_foreign` (`region_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_country_id_foreign` (`country_id`),
  ADD KEY `orders_city_id_foreign` (`city_id`),
  ADD KEY `orders_region_id_foreign` (`region_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_extra_fees`
--
ALTER TABLE `order_extra_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_extra_fees_admin_id_foreign` (`admin_id`),
  ADD KEY `order_extra_fees_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_special_discounts`
--
ALTER TABLE `order_special_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_special_discounts_admin_id_foreign` (`admin_id`),
  ADD KEY `order_special_discounts_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_taxes`
--
ALTER TABLE `order_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_features`
--
ALTER TABLE `our_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outer_clients`
--
ALTER TABLE `outer_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `packages_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `packages_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `packages_slug_en_unique` (`slug_en`);

--
-- Indexes for table `package_option`
--
ALTER TABLE `package_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_option_package_id_foreign` (`package_id`),
  ADD KEY `package_option_option_id_foreign` (`option_id`);

--
-- Indexes for table `package_options`
--
ALTER TABLE `package_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_options_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `package_options_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `package_options_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `package_options_slug_en_unique` (`slug_en`);

--
-- Indexes for table `package_option_categories`
--
ALTER TABLE `package_option_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_option_categories_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `package_option_categories_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `package_option_categories_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `package_option_categories_slug_en_unique` (`slug_en`);

--
-- Indexes for table `package_tax`
--
ALTER TABLE `package_tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_tax_tax_id_foreign` (`tax_id`),
  ADD KEY `package_tax_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `permission_users`
--
ALTER TABLE `permission_users`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `products_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `products_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `products_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `products_slug_en_unique` (`slug_en`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_brands_brand_id_foreign` (`brand_id`),
  ADD KEY `product_brands_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `product_categories_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `product_categories_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `product_categories_slug_en_unique` (`slug_en`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_details_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `product_details_title_en_unique` (`title_en`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_media_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_occasions`
--
ALTER TABLE `product_occasions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_occasions_occasion_id_foreign` (`occasion_id`),
  ADD KEY `product_occasions_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_products_with`
--
ALTER TABLE `product_products_with`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_products_with_product_with_id_foreign` (`product_with_id`),
  ADD KEY `product_products_with_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_size_id_foreign` (`size_id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tax`
--
ALTER TABLE `product_tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tax_tax_id_foreign` (`tax_id`),
  ADD KEY `product_tax_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_taxes`
--
ALTER TABLE `product_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_top_advs`
--
ALTER TABLE `product_top_advs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_under_advs`
--
ALTER TABLE `product_under_advs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promo_codes_title_unique` (`title`);

--
-- Indexes for table `queries_requests`
--
ALTER TABLE `queries_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_and_requests`
--
ALTER TABLE `questions_and_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_user_id_foreign` (`user_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `regions_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `regions_code_unique` (`code`),
  ADD KEY `regions_country_id_foreign` (`country_id`),
  ADD KEY `regions_city_id_foreign` (`city_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `second_advs`
--
ALTER TABLE `second_advs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_admin_id_foreign` (`admin_id`),
  ADD KEY `shippings_city_id_foreign` (`city_id`);

--
-- Indexes for table `shop_by_brands`
--
ALTER TABLE `shop_by_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_by_occasions`
--
ALTER TABLE `shop_by_occasions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `splashes`
--
ALTER TABLE `splashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_information_footers`
--
ALTER TABLE `store_information_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taxes_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `taxes_title_en_unique` (`title_en`),
  ADD KEY `taxes_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_footers`
--
ALTER TABLE `top_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_navbars`
--
ALTER TABLE `top_navbars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_country_id_foreign` (`country_id`),
  ADD KEY `user_addresses_city_id_foreign` (`city_id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_favorite_products`
--
ALTER TABLE `user_favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_favorite_products_user_id_foreign` (`user_id`),
  ADD KEY `user_favorite_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`),
  ADD UNIQUE KEY `vendors_phone_unique` (`phone`),
  ADD UNIQUE KEY `vendors_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `vendors_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `vendors_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `vendors_slug_en_unique` (`slug_en`),
  ADD KEY `vendors_country_id_foreign` (`country_id`),
  ADD KEY `vendors_city_id_foreign` (`city_id`),
  ADD KEY `vendors_region_id_foreign` (`region_id`);

--
-- Indexes for table `vendor_infos`
--
ALTER TABLE `vendor_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_infos_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `view_all_products`
--
ALTER TABLE `view_all_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_we_choose_footers`
--
ALTER TABLE `why_we_choose_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_hall_id_foreign` (`hall_id`);

--
-- Indexes for table `with_draws`
--
ALTER TABLE `with_draws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `with_draw_requests`
--
ALTER TABLE `with_draw_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `admin_categories`
--
ALTER TABLE `admin_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_categories`
--
ALTER TABLE `ad_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_explore_categories`
--
ALTER TABLE `assign_explore_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `available_dates`
--
ALTER TABLE `available_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `become_vendors`
--
ALTER TABLE `become_vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `best_selleres`
--
ALTER TABLE `best_selleres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_halls`
--
ALTER TABLE `cart_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_hall_options`
--
ALTER TABLE `cart_hall_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories_halls`
--
ALTER TABLE `categories_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients_ads`
--
ALTER TABLE `clients_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compare_lists`
--
ALTER TABLE `compare_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_message_replies`
--
ALTER TABLE `contact_message_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `digital_cards`
--
ALTER TABLE `digital_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `explore_categories`
--
ALTER TABLE `explore_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fast_links`
--
ALTER TABLE `fast_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features_sections`
--
ALTER TABLE `features_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `find_us`
--
ALTER TABLE `find_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `first_advs`
--
ALTER TABLE `first_advs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_contact_us`
--
ALTER TABLE `footer_contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_main_sections`
--
ALTER TABLE `footer_main_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_categories`
--
ALTER TABLE `f_a_q_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hall_bookings`
--
ALTER TABLE `hall_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hall_booking_taxes`
--
ALTER TABLE `hall_booking_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hall_categories`
--
ALTER TABLE `hall_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hall_media`
--
ALTER TABLE `hall_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hall_packages`
--
ALTER TABLE `hall_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hall_taxes`
--
ALTER TABLE `hall_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hint_sections`
--
ALTER TABLE `hint_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inqueries`
--
ALTER TABLE `inqueries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquery_replies`
--
ALTER TABLE `inquery_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_birthday_halls`
--
ALTER TABLE `latest_birthday_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_engagments_halls`
--
ALTER TABLE `latest_engagments_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_products`
--
ALTER TABLE `latest_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_wedding_halls`
--
ALTER TABLE `latest_wedding_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_section_footers`
--
ALTER TABLE `main_section_footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_sliders`
--
ALTER TABLE `main_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `my_account_section_footers`
--
ALTER TABLE `my_account_section_footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_sections`
--
ALTER TABLE `news_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_extra_fees`
--
ALTER TABLE `order_extra_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_special_discounts`
--
ALTER TABLE `order_special_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_taxes`
--
ALTER TABLE `order_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_features`
--
ALTER TABLE `our_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outer_clients`
--
ALTER TABLE `outer_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `package_option`
--
ALTER TABLE `package_option`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_options`
--
ALTER TABLE `package_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_option_categories`
--
ALTER TABLE `package_option_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_tax`
--
ALTER TABLE `package_tax`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `permission_users`
--
ALTER TABLE `permission_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_occasions`
--
ALTER TABLE `product_occasions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_products_with`
--
ALTER TABLE `product_products_with`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tax`
--
ALTER TABLE `product_tax`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_taxes`
--
ALTER TABLE `product_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_top_advs`
--
ALTER TABLE `product_top_advs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_under_advs`
--
ALTER TABLE `product_under_advs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queries_requests`
--
ALTER TABLE `queries_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions_and_requests`
--
ALTER TABLE `questions_and_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `second_advs`
--
ALTER TABLE `second_advs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_by_brands`
--
ALTER TABLE `shop_by_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_by_occasions`
--
ALTER TABLE `shop_by_occasions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `splashes`
--
ALTER TABLE `splashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_information_footers`
--
ALTER TABLE `store_information_footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `top_footers`
--
ALTER TABLE `top_footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `top_navbars`
--
ALTER TABLE `top_navbars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_favorite_products`
--
ALTER TABLE `user_favorite_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendor_infos`
--
ALTER TABLE `vendor_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `view_all_products`
--
ALTER TABLE `view_all_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_we_choose_footers`
--
ALTER TABLE `why_we_choose_footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `with_draws`
--
ALTER TABLE `with_draws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `with_draw_requests`
--
ALTER TABLE `with_draw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `admin_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ad_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ad_categories`
--
ALTER TABLE `ad_categories`
  ADD CONSTRAINT `ad_categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `available_dates`
--
ALTER TABLE `available_dates`
  ADD CONSTRAINT `available_dates_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `package_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_halls`
--
ALTER TABLE `cart_halls`
  ADD CONSTRAINT `cart_halls_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_halls_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_halls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_hall_options`
--
ALTER TABLE `cart_hall_options`
  ADD CONSTRAINT `cart_hall_options_cart_hall_id_foreign` FOREIGN KEY (`cart_hall_id`) REFERENCES `cart_halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_hall_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `package_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD CONSTRAINT `contact_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_message_replies`
--
ALTER TABLE `contact_message_replies`
  ADD CONSTRAINT `contact_message_replies_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_message_replies_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact_messages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  ADD CONSTRAINT `dynamic_pages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `f_a_q_categories`
--
ALTER TABLE `f_a_q_categories`
  ADD CONSTRAINT `f_a_q_categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD CONSTRAINT `f_a_q_s_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `f_a_q_s_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `f_a_q_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `halls_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `halls_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `hall_categories`
--
ALTER TABLE `hall_categories`
  ADD CONSTRAINT `hall_categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `hall_media`
--
ALTER TABLE `hall_media`
  ADD CONSTRAINT `hall_media_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `hall_packages`
--
ALTER TABLE `hall_packages`
  ADD CONSTRAINT `hall_packages_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hall_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hall_taxes`
--
ALTER TABLE `hall_taxes`
  ADD CONSTRAINT `hall_taxes_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hall_taxes_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD CONSTRAINT `home_sliders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `inqueries`
--
ALTER TABLE `inqueries`
  ADD CONSTRAINT `inqueries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquery_replies`
--
ALTER TABLE `inquery_replies`
  ADD CONSTRAINT `inquery_replies_inquery_id_foreign` FOREIGN KEY (`inquery_id`) REFERENCES `inqueries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `occasions`
--
ALTER TABLE `occasions`
  ADD CONSTRAINT `occasions_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `occasions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `occasions_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_extra_fees`
--
ALTER TABLE `order_extra_fees`
  ADD CONSTRAINT `order_extra_fees_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_extra_fees_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_special_discounts`
--
ALTER TABLE `order_special_discounts`
  ADD CONSTRAINT `order_special_discounts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_special_discounts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_option`
--
ALTER TABLE `package_option`
  ADD CONSTRAINT `package_option_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `package_options` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `package_option_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `package_tax`
--
ALTER TABLE `package_tax`
  ADD CONSTRAINT `package_tax_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_tax_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD CONSTRAINT `product_brands_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_brands_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_media`
--
ALTER TABLE `product_media`
  ADD CONSTRAINT `product_media_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_occasions`
--
ALTER TABLE `product_occasions`
  ADD CONSTRAINT `product_occasions_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_occasions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_products_with`
--
ALTER TABLE `product_products_with`
  ADD CONSTRAINT `product_products_with_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_products_with_product_with_id_foreign` FOREIGN KEY (`product_with_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tax`
--
ALTER TABLE `product_tax`
  ADD CONSTRAINT `product_tax_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tax_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `regions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `shippings_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `taxes`
--
ALTER TABLE `taxes`
  ADD CONSTRAINT `taxes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_favorite_products`
--
ALTER TABLE `user_favorite_products`
  ADD CONSTRAINT `user_favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_favorite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `vendors_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `vendors_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `vendor_infos`
--
ALTER TABLE `vendor_infos`
  ADD CONSTRAINT `vendor_infos_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `verifications`
--
ALTER TABLE `verifications`
  ADD CONSTRAINT `verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
