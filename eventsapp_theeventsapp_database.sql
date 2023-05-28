-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2023 at 09:51 AM
-- Server version: 8.0.33-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventsapp_theeventsapp_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `text_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `text_en`, `text_ar`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firebase_token` int DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `gender`, `status`, `image`, `password`, `firebase_token`, `category_id`, `vendor_id`, `remember_token`, `added_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'super_admin@gmail.com', '01025323205', 'male', '1', NULL, '$2y$10$/ajvSwHoWo00n7dsUcL9pe1/ym6/G5BzJr9b3Bojd7H0O1lcNRYjO', NULL, 1, NULL, 'YKQjlIOrHDHwwVG5lyB1ios1UkjFQN0eJmjA1SNW0O2fOwVlq6s6pjcR98tm', NULL, '2023-04-27 14:06:03', '2023-05-03 08:26:58', NULL),
(2, 'King Feest DVM', 'pfeffer.kennith@kessler.biz', '+1-501-242-2426', 'female', '1', NULL, '$2y$10$sXlQ.pFBiooNAwleDqp84.lZy/f/sCvMh0H7X.yPl7oH6ry295Csi', NULL, 6, NULL, NULL, NULL, '2022-10-18 14:13:00', '2023-04-27 14:06:03', NULL),
(3, 'Sage Lehner', 'walker.hills@conroy.org', '+1-980-918-4126', 'female', '1', NULL, '$2y$10$SgoXrxvpKIOUePPEDU0ZjO02IOLwfu4BhcvLgfteItQ/MWFdIJE6a', NULL, 6, NULL, NULL, NULL, '2022-04-16 11:33:48', '2023-04-27 14:06:03', NULL),
(4, 'Donna Nitzsche Sr.', 'ybalistreri@greenholt.org', '1-928-501-9401', 'female', '1', NULL, '$2y$10$ZJWYYfW.bFa0CywymGTpkOuMIQDjzYv556hXkwln6RCcavole5ZSK', NULL, 4, NULL, NULL, NULL, '2021-03-05 08:55:26', '2023-04-27 14:06:03', NULL),
(5, 'Talia Douglas', 'cummings.breana@gmail.com', '629-655-8821', 'female', '1', NULL, '$2y$10$TWc7YjGDB9lR9PPfawFt/.AuF1GgA5HUUc5Rnhdi4bblMkWH4IqTK', NULL, 4, NULL, NULL, NULL, '2021-10-04 13:08:43', '2023-04-27 14:06:03', NULL),
(6, 'Berneice Schaefer', 'wolf.leatha@gmail.com', '+1 (641) 382-4992', 'male', '1', NULL, '$2y$10$U30sOoik5Kg38rclG9xD9.PCkv9yXXcTCSzXcdVVeBY7wOtNtyQTa', NULL, 5, NULL, NULL, NULL, '2022-06-17 08:33:59', '2023-04-27 14:06:03', NULL),
(7, 'Mr. Henderson Bins', 'gjast@gmail.com', '(743) 587-4737', 'female', '1', NULL, '$2y$10$XrXnyEQ3.4PG63A6vvceDO4qSz8FMwoDjIJMQ4QIWdjzMtJ4.kqfu', NULL, 6, NULL, NULL, NULL, '2020-10-15 10:51:55', '2023-04-27 14:06:03', NULL),
(8, 'Prof. Deshaun Schroeder', 'dasia04@goodwin.org', '281.822.3356', 'female', '1', NULL, '$2y$10$nClem0pKikjZgsPn0pyRN.4QyuLNPySmT5tIV16CR7UZlYl2BrVOm', NULL, 4, NULL, NULL, NULL, '2021-08-30 02:55:54', '2023-04-27 14:06:03', NULL),
(9, 'Marisol Berge', 'enrico92@cremin.com', '719.772.7739', 'male', '1', NULL, '$2y$10$Q4UdRm0hgFHA3qCDdy4aP.kSIjaoZYpRAbaoPOUArIyoIiGyC2wnK', NULL, 5, NULL, NULL, NULL, '2021-06-15 08:56:27', '2023-04-27 14:06:04', NULL),
(10, 'Dr. Rigoberto Fisher DVM', 'qkuhn@mclaughlin.com', '+12343847273', 'female', '1', NULL, '$2y$10$kniJaukEfCdIjsFStVHaguBQVEwehMz.rM9TJh8UBlHfgl42E.g1q', NULL, 1, NULL, NULL, NULL, '2022-06-04 14:12:05', '2023-04-27 14:06:04', NULL),
(11, 'Katelyn Herzog III', 'kaley52@hudson.biz', '1-279-989-1527', 'male', '1', NULL, '$2y$10$qkuIeATUbQ9JUOwjoWEU/.hBaXZkARBI9gEBRGA.cUxjrxBqBzXR6', NULL, 6, NULL, NULL, NULL, '2021-08-03 19:49:58', '2023-04-27 14:06:04', NULL),
(12, 'Kathryne Windler', 'brekke.meagan@yahoo.com', '+12313583879', 'female', '1', NULL, '$2y$10$syBQv2Oh84eegr8GPnxOL.PhD3iP5k/cqKLJ4raRy2sjv9x6B5GHe', NULL, 4, NULL, NULL, NULL, '2021-02-25 18:07:47', '2023-04-27 14:06:04', NULL),
(13, 'Claudie Hegmann', 'johnston.ismael@fay.biz', '561.355.6659', 'male', '1', NULL, '$2y$10$qu8iiJyNdz5YZnDNxT4EW.9.oPgr3qnSFxe9HIQ3/Z5IaAr/W0kOy', NULL, 5, NULL, NULL, NULL, '2020-06-21 07:45:43', '2023-04-27 14:06:04', NULL),
(14, 'Hermann Abbott', 'stanton.xander@hotmail.com', '+17273806029', 'female', '1', NULL, '$2y$10$554UKXDj.z0KnvcrTTWN3e42zVqep3fVzQHluXvaAeKRacHZwLMzi', NULL, 6, NULL, NULL, NULL, '2023-03-27 19:10:44', '2023-04-27 14:06:04', NULL),
(15, 'Dr. Maynard Gorczany II', 'ollie40@jacobson.info', '1-229-218-9826', 'female', '1', NULL, '$2y$10$ZFOMWe4BkaPA5xrJrC7QfebTJoreWoCO2MIf5NSOnBP4VXWVoUuXe', NULL, 6, NULL, NULL, NULL, '2022-01-21 14:28:56', '2023-04-27 14:06:04', NULL),
(16, 'Larissa Towne', 'ora.hand@johnson.com', '+1 (623) 239-8614', 'female', '1', NULL, '$2y$10$b/PA0OLOT067FVjvclBy5OovnoA3e90RjSAtYyXpk1FAArZy0S3Au', NULL, 1, NULL, NULL, NULL, '2021-02-05 20:36:40', '2023-04-27 14:06:04', NULL),
(17, 'Miss Gwen Mayert IV', 'qkunze@hotmail.com', '424.716.0835', 'male', '1', NULL, '$2y$10$UJnuJKgxM6kjZdEahrst4.D8eNxrXnY8LcSyNLsajgZPBaY2MTguO', NULL, 3, NULL, NULL, NULL, '2020-07-17 07:49:44', '2023-04-27 14:06:04', NULL),
(18, 'Prof. Arely Grimes MD', 'cbayer@hotmail.com', '1-330-883-6589', 'male', '1', NULL, '$2y$10$u2CAnDTNmnYTHI1tCQx.pOqSOeeWTjCFm31gTHpRna6vuDVfkUq/W', NULL, 2, NULL, NULL, NULL, '2020-11-27 05:17:09', '2023-04-27 14:06:04', NULL),
(19, 'Viola Hegmann', 'geraldine.dicki@kuvalis.com', '(458) 691-6722', 'female', '1', NULL, '$2y$10$/1sHMXD88sAY3aq9fd9jG.fTSAIRbBZC6u1uP14afmmdgpmuAjXeO', NULL, 5, NULL, NULL, NULL, '2020-10-25 12:30:34', '2023-04-27 14:06:04', NULL),
(20, 'Stella McLaughlin', 'hoeger.eda@gmail.com', '1-312-290-2570', 'female', '1', NULL, '$2y$10$Qu52LcluO1vFV5y61my6DO65FENjQkVILOtutd6vkt2g6uqzScTgW', NULL, 4, NULL, NULL, NULL, '2022-12-11 23:08:40', '2023-04-27 14:06:04', NULL),
(21, 'Lloyd Rodriguez', 'lincoln25@gleason.com', '+1-534-473-5934', 'female', '1', NULL, '$2y$10$.fe/PSHCiPR.g/dNp3/GfefK5NZ5cuYf93t2ftsVuMEGoG7g0v1SG', NULL, 6, NULL, NULL, NULL, '2022-04-15 13:25:04', '2023-04-27 14:06:04', NULL),
(22, 'Dr. Octavia Wintheiser I', 'odessa.durgan@hotmail.com', '(208) 906-7209', 'male', '1', NULL, '$2y$10$0QEQH2wxLf1y/nKqwedTfeRvHc7i3a/9nYM4kL1IrucIfBi1pym8u', NULL, 5, NULL, NULL, NULL, '2020-09-11 23:54:38', '2023-04-27 14:06:04', NULL),
(23, 'Prof. Micheal Ondricka DDS', 'ureinger@funk.info', '+1 (505) 412-4959', 'female', '1', NULL, '$2y$10$0yKgJryxIGmnKJlMd9.JDu2edbdX4XIfySHjc31MG6YzIIKrTwud.', NULL, 5, NULL, NULL, NULL, '2023-02-01 20:01:39', '2023-04-27 14:06:05', NULL),
(24, 'Maureen Fritsch', 'craig36@hotmail.com', '(458) 640-6975', 'female', '1', NULL, '$2y$10$mhj4tbXwZkCuP9lOLgWg7O0pyVeH6U26Xb4ESJ4IILnJqaE4Ypaha', NULL, 5, NULL, NULL, NULL, '2021-05-08 01:36:53', '2023-04-27 14:06:05', NULL),
(25, 'Mrs. Esmeralda Kiehn', 'xzieme@kirlin.com', '+1-610-662-2744', 'male', '1', NULL, '$2y$10$dY78bQwwyVKSypuXdOSLLetiAXVXH.asM48n6tOhu57g36R7WlyjC', NULL, 1, NULL, NULL, NULL, '2022-05-16 20:10:50', '2023-04-27 14:06:05', NULL),
(26, 'Jimmy Zboncak', 'sipes.lorenza@nader.biz', '386-747-1767', 'male', '1', NULL, '$2y$10$k8gFAE/C/btAFheTABl6AeSq/9c6vkmLtRErxnXrcdr7NFyyqo8mC', NULL, 3, NULL, NULL, NULL, '2021-02-08 19:46:20', '2023-04-27 14:06:05', NULL),
(27, 'Maybelle McKenzie', 'rene96@romaguera.com', '+19208708049', 'male', '1', NULL, '$2y$10$sxLv/5FzCFLs1WnV67/IaODFRRX7Wvzg8tu5nFIyTqjUGoEVut6nS', NULL, 4, NULL, NULL, NULL, '2021-09-04 10:05:14', '2023-04-27 14:06:05', NULL),
(28, 'Diamond Bernhard', 'era67@gibson.com', '+1 (321) 978-5680', 'female', '1', NULL, '$2y$10$6lJ07gMCQRcTlm0Iyca87OyEAu7mL0lBjn.RIU26OdsJDKsrSquE.', NULL, 5, NULL, NULL, NULL, '2021-03-20 23:23:53', '2023-04-27 14:06:05', NULL),
(29, 'Dr. Noah Feil I', 'lnikolaus@yahoo.com', '1-747-351-7316', 'female', '1', NULL, '$2y$10$9FoIxjCwca.lRWKjXUbekerSDr271bMuCI/PDXkhouAa4OdoDuJda', NULL, 4, NULL, NULL, NULL, '2020-05-23 09:25:00', '2023-04-27 14:06:05', NULL),
(30, 'Prof. Jeramy Morissette', 'cooper.haley@gmail.com', '580.994.2285', 'female', '1', NULL, '$2y$10$ST57nU4AuUL.0nXZtg7gN.uHCWrwZx52wnD/N73ASLP1v4XwoOSGS', NULL, 2, NULL, NULL, NULL, '2021-03-05 10:40:01', '2023-04-27 14:06:05', NULL),
(31, 'Lorine Swaniawski', 'lambert.abshire@adams.com', '1-743-823-6558', 'male', '1', NULL, '$2y$10$KTqc6vu6Epu2BHaY67tYe.4LIRE9hQSVeHWfuLwD5AKwvlp4uFjga', NULL, 5, NULL, NULL, NULL, '2022-07-28 09:02:51', '2023-04-27 14:06:05', NULL),
(32, 'Alexandrine Swaniawski MD', 'bradly25@windler.org', '732-556-0881', 'male', '1', NULL, '$2y$10$/nw6qsk1y5ri7k5xzUID9eUTBzAEP62JnAGSvq13UTdhbQ1NczCC2', NULL, 6, NULL, NULL, NULL, '2022-04-07 01:38:08', '2023-04-27 14:06:05', NULL),
(33, 'Jay Bashirian', 'wkutch@purdy.com', '+1-405-616-6134', 'female', '1', NULL, '$2y$10$fygKU...hjvIdE2/dCeLk.UpHVbCH/Z7AVw1Zh2HFMoGbGriUVYF6', NULL, 1, NULL, NULL, NULL, '2022-08-12 17:29:30', '2023-04-27 14:06:05', NULL),
(34, 'Lennie Runte', 'nikita.auer@medhurst.com', '+1-680-751-0544', 'female', '1', NULL, '$2y$10$5bGot3W4MoNcoalsclJphOdsENpyLGsKJNT9sr7radEzaSmOeb8NO', NULL, 6, NULL, NULL, NULL, '2021-09-14 08:59:56', '2023-04-27 14:06:05', NULL),
(35, 'Mr. Erin Braun', 'alockman@yahoo.com', '(719) 341-0059', 'male', '1', NULL, '$2y$10$/b2GQ2YwVUNRedxNb8AkreEDuHslzJJsQK9kX1O4FdGZXkRPeAKjK', NULL, 5, NULL, NULL, NULL, '2022-09-13 12:23:21', '2023-04-27 14:06:05', NULL),
(36, 'Taylor Sawayn', 'rollin15@rau.com', '734-586-7660', 'female', '1', NULL, '$2y$10$4dWk8p/YLjbabVeMRriXuOo3NWmsrR6tkTrBurdWUTEj1sZKGVVSy', NULL, 3, NULL, NULL, NULL, '2022-12-23 14:29:44', '2023-04-27 14:06:05', NULL),
(37, 'Barry Dickinson', 'ena49@hansen.biz', '+1-479-537-1937', 'female', '1', NULL, '$2y$10$LBmL1jtT4GI0XgEnBV0Oi.2MtrL5sFjCU6JK9iy2kfHpgnBeJJjhe', NULL, 1, NULL, NULL, NULL, '2021-04-12 17:20:59', '2023-04-27 14:06:06', NULL),
(38, 'Dr. Curt Reichel I', 'vladimir64@rogahn.com', '(512) 216-2473', 'female', '1', NULL, '$2y$10$M7yc332BKYvBZoK/8ov7CePBNGzY.Of1I9tcvBx4IlmIwwSxkaY3a', NULL, 6, NULL, NULL, NULL, '2022-05-20 14:31:28', '2023-04-27 14:06:06', NULL),
(39, 'Verona Hartmann IV', 'doris20@gmail.com', '+1 (316) 636-9091', 'female', '1', NULL, '$2y$10$1tLJD9fHkkjKb3njVqf4GuHEFMtQxf/479UWeuHg3yMKVbqxPm59y', NULL, 1, NULL, NULL, NULL, '2021-05-15 16:00:47', '2023-04-27 14:06:06', NULL),
(40, 'Clara Bechtelar', 'lschneider@wintheiser.com', '412-271-2927', 'male', '1', NULL, '$2y$10$43xoMXhZLbUePrfWIKhs6.dgRjq35STDa4t8ga3R3tsdMoEKuJjiq', NULL, 3, NULL, NULL, NULL, '2021-07-01 19:48:05', '2023-04-27 14:06:06', NULL),
(41, 'Adah Abshire', 'mohr.giovanny@hotmail.com', '847.320.8394', 'male', '1', NULL, '$2y$10$Ddqpj4maKrEzZrgE3.eD7ufKc0pC9dfU9CAyfpACTfyCdQlOGqMUq', NULL, 3, NULL, NULL, NULL, '2021-02-23 13:02:08', '2023-04-27 14:06:06', NULL),
(42, 'Mr. Deron Jakubowski', 'toy.eleonore@gmail.com', '+1 (689) 363-7020', 'male', '1', NULL, '$2y$10$2f.0MvlaZJuepdz2Vhn2Z.Rsj4v53KtV6kKMRH9ADA01WtszfpaNq', NULL, 6, NULL, NULL, NULL, '2022-11-25 09:29:09', '2023-04-27 14:06:06', NULL),
(43, 'Prof. Kristoffer Eichmann DVM', 'ian.lowe@powlowski.com', '458-709-0105', 'female', '1', NULL, '$2y$10$OPA/DCxidIobpNuRS/WY7uqXaerKjn55oCpzxQUVv8.I19LCEL11K', NULL, 1, NULL, NULL, NULL, '2021-12-12 08:44:41', '2023-04-27 14:06:06', NULL),
(44, 'Lucienne Hegmann', 'kyleigh.kunze@gmail.com', '737.747.8450', 'female', '1', NULL, '$2y$10$vqOfK1YuEZvXgUn5qD/P2u6NxxyyZE78qAkas47AJsBNjDgzqPFne', NULL, 2, NULL, NULL, NULL, '2022-01-02 22:37:22', '2023-04-27 14:06:06', NULL),
(45, 'Camron Russel', 'dane.rath@franecki.info', '682-789-8866', 'female', '1', NULL, '$2y$10$2o4Eng7hU7Zkn2rM5MWY3.zwyd1qYRTUMKfHniF0zJ0/udLff6KdO', NULL, 6, NULL, NULL, NULL, '2021-07-12 19:04:41', '2023-04-27 14:06:06', NULL),
(46, 'Orlo Franecki DVM', 'fatima53@osinski.info', '(580) 288-0011', 'male', '1', NULL, '$2y$10$.JeT8yhghN6s7Do3rFMQGeVDmsxh9hmMc05fBKRtrQcjIWpGpbzKq', NULL, 4, NULL, NULL, NULL, '2020-08-28 17:22:28', '2023-04-27 14:06:06', NULL),
(47, 'Olen Lebsack', 'mcglynn.shawna@collier.com', '+19899983065', 'male', '1', NULL, '$2y$10$w0aKmd9gmLvRNkaGV.Q/r.0BqWZsyGaH07sMBGY0S2Ji0xbQzIc3C', NULL, 5, NULL, NULL, NULL, '2022-09-13 18:25:42', '2023-04-27 14:06:06', NULL),
(48, 'Eveline Williamson', 'lexie.wisozk@yahoo.com', '662-979-0689', 'male', '1', NULL, '$2y$10$avR9GUracPN3PsrQ2R.cD.xni3eed6vAl0wgG/ur9.V7xFLJC06fi', NULL, 5, NULL, NULL, NULL, '2021-10-20 22:42:25', '2023-04-27 14:06:06', NULL),
(49, 'Charlotte Wilkinson', 'ophelia92@schultz.com', '1-757-700-9214', 'female', '1', NULL, '$2y$10$pTRPKecQ1NxxDSNww65hPeHnyoB5t0gBPX6UHJ8RWyOlXZsUbipba', NULL, 6, NULL, NULL, NULL, '2021-04-21 02:04:02', '2023-04-27 14:06:06', NULL),
(50, 'Eden Smitham', 'fstehr@grimes.com', '+1-484-495-5813', 'female', '1', NULL, '$2y$10$DDJV2HakgZBRAl/m3JFgoOmOp7MexotWNItwJCJuulqeu/Ks4GYgW', NULL, 3, NULL, NULL, NULL, '2020-05-28 07:30:37', '2023-04-27 14:06:06', NULL),
(51, 'Mazie Schowalter', 'daren.huels@gaylord.com', '+1.540.667.6749', 'female', '1', NULL, '$2y$10$BqDPg7G.BqzoKkIUJgAlw.NH4ApgQeND6Z87wZLxJE7rTllcAVajy', NULL, 1, NULL, NULL, NULL, '2022-01-14 15:11:09', '2023-04-27 14:06:07', NULL),
(52, 'kemommom', 'k@test.com', '261161616', 'male', '1', 'jaaqPD111AWZRDJ9UIBIWwqApbNwuPmhyFoxG09U.jpg', '$2y$10$fxe/QcwOduxNHqO203CZueiKVOwtRSmA1LEVK8FRiQMZnXGYkpyuS', NULL, 1, 7, 'IOCcJkNwVYmgSOvk7gKyIsgEPS3v11BIZAViHZc3m8cLcLKjPkd62S2eYrgh', 1, '2023-04-27 14:22:23', '2023-05-22 20:17:13', NULL),
(53, 'mostafa', 'mostafa@email.com', '01025323276', 'male', '1', 'ejIK63sFft0QH6KqAF0XZjWpM0KA9eLBv61w1Wxb.jpg', '$2y$10$cV6HSXl5f/Odw/XIOOdqX.b/L.ohvFHsLlN5Vgs2Tj78IJGOqbImS', NULL, 1, 7, NULL, 1, '2023-05-17 06:36:57', '2023-05-17 06:36:57', NULL),
(54, 'A KFC', 'a_kfc@gmail.com', '01652567734', 'male', '1', 'OmoI1b60xENRsw23WkuStu10zqDdunvijn2xeOXQ.png', '$2y$10$AKDkp36KXiiT2cpA.jM2VeJ2zCmvo3lZw6axgNleRGkwYcwEeisDO', NULL, 1, 9, NULL, 1, '2023-05-18 09:15:16', '2023-05-18 09:15:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_categories`
--

CREATE TABLE `admin_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_categories`
--

INSERT INTO `admin_categories` (`id`, `title_ar`, `title_en`, `details_ar`, `details_en`, `status`, `added_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'مدير', 'Manager', 'مدير', 'Manager', '1', NULL, NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01'),
(2, 'الموارد البشرية', 'HR', 'الموارد البشرية', 'HR', '1', NULL, NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01'),
(3, 'الحسابات', 'the accounts', 'الحسابات', 'the accounts', '1', NULL, NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01'),
(4, 'التسويق', 'Marketing', 'التسويق', 'Marketing', '1', NULL, NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01'),
(5, '', '', '', '', '1', NULL, NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01'),
(6, 'علاقات عامه', 'Public relations', 'علاقات عامه', 'Public relations', '1', NULL, NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `views` bigint NOT NULL DEFAULT '0',
  `clicks` bigint NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `name`, `image`, `title_ar`, `title_en`, `description_ar`, `description_en`, `link`, `created_at`, `updated_at`) VALUES
(1, 'amr', '202305041533Rectangle 304.png', 'تيست', 'test', 'hfdhgddgf', 'fgdgghd', 'https://www.google.com.eg/?hl=ar', '2023-05-04 12:33:34', '2023-05-04 12:33:34'),
(2, 'ddffdsa', '202305041555MasterCard.webp', 'تيست 3', 'test', 'hfdhgddgf', 'fgdgghd', 'https://www.google.com.eg/?hl=ar', '2023-05-04 12:55:37', '2023-05-04 12:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `ad_categories`
--

CREATE TABLE `ad_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slogan_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `summary_ar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `summary_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emails` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `faxes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone_numbers` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `map_latitude` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `map_longitude` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `instagram_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `twitter_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `youtube_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tiktok_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `linkedin_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pinterest_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_light` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `title_ar`, `title_en`, `nickname_ar`, `nickname_en`, `slogan_ar`, `slogan_en`, `summary_ar`, `summary_en`, `emails`, `faxes`, `phone_numbers`, `address_ar`, `address_en`, `map_latitude`, `map_longitude`, `facebook_link`, `instagram_link`, `twitter_link`, `youtube_link`, `tiktok_link`, `linkedin_link`, `pinterest_link`, `keywords_ar`, `keywords_en`, `description_ar`, `description_en`, `status`, `logo`, `logo_light`, `youtube_video_link`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2023-05-01 09:02:31', '2023-05-01 09:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `assign_explore_categories`
--

CREATE TABLE `assign_explore_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` int NOT NULL,
  `type` enum('main','right','below') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'right',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_explore_categories`
--

INSERT INTO `assign_explore_categories` (`id`, `category`, `type`, `created_at`, `updated_at`) VALUES
(1, 4, 'main', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(2, 17, 'right', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(3, 5, 'right', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(4, 8, 'right', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(5, 9, 'right', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(6, 12, 'right', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(7, 15, 'right', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(8, 17, 'below', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(9, 7, 'below', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(10, 8, 'below', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(11, 10, 'below', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(12, 11, 'below', '2023-05-10 10:14:53', '2023-05-10 10:14:53'),
(13, 13, 'below', '2023-05-10 10:14:53', '2023-05-10 10:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `available_dates`
--

CREATE TABLE `available_dates` (
  `id` bigint UNSIGNED NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hall_id` bigint UNSIGNED NOT NULL,
  `available_date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `become_vendors`
--

CREATE TABLE `become_vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sign_from` enum('web','ios','android') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','accepted','canceled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `become_vendors`
--

INSERT INTO `become_vendors` (`id`, `name`, `email`, `phone_number`, `coment`, `sign_from`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Maude Rodriguez', 'jfay@gmail.com', '(660) 872-6639', 'Cum mollitia ut perspiciatis totam molestiae voluptates.', 'ios', 'accepted', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(2, 'Dr. Bertrand Williamson', 'walter.price@hotmail.com', '+1 (678) 835-3578', 'Et laudantium deleniti id laborum consequuntur.', 'android', 'accepted', '2023-04-27 14:05:59', '2023-05-01 08:56:17'),
(3, 'Frederik Cremin MD', 'ona77@gmail.com', '361.605.4766', 'Est aspernatur aut porro sit.', 'android', 'canceled', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(4, 'Joaquin Gusikowski', 'jhintz@hotmail.com', '+1.270.915.1196', 'Atque numquam aliquam aut non quas unde.', 'ios', 'accepted', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(5, 'Porter Jenkins', 'daphnee.wunsch@gmail.com', '+16575718132', 'Aut soluta sunt aut quam a.', 'android', 'accepted', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(6, 'Erin Kassulke', 'hkulas@nicolas.com', '1-240-605-8713', 'Eum tempora eos assumenda quasi dignissimos vitae nihil.', 'web', 'accepted', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(7, 'Yasmeen Jones MD', 'sporer.jalen@stroman.com', '973-766-8756', 'Sint voluptate in nobis.', 'ios', 'accepted', '2023-04-27 14:05:59', '2023-05-01 08:56:22'),
(8, 'Aaron Schowalter', 'manuel25@hotmail.com', '1-929-362-2603', 'Similique repellat odit tenetur id expedita eum.', 'android', 'accepted', '2023-04-27 14:05:59', '2023-05-01 09:57:18'),
(9, 'Prof. Philip Lang Sr.', 'urban40@kozey.com', '+16082320160', 'Amet saepe nihil rerum necessitatibus.', 'ios', 'accepted', '2023-04-27 14:05:59', '2023-05-18 11:32:32'),
(10, 'Yvette Gerhold', 'zboncak.kelly@witting.com', '(941) 533-5308', 'Corrupti et itaque officiis cupiditate eum.', 'android', 'accepted', '2023-04-27 14:05:59', '2023-05-21 09:22:37'),
(11, 'Victoria Labadie', 'gfeeney@yahoo.com', '+1-480-934-2617', 'Occaecati ut iusto commodi porro.', 'android', 'accepted', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(12, 'Tania Gibson', 'lura75@gmail.com', '(417) 409-5686', 'Quis aperiam placeat sed dolorem aut suscipit.', 'android', 'canceled', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(13, 'Linwood Kshlerin', 'johann.becker@gmail.com', '(269) 294-7222', 'Sint et fuga incidunt unde libero corporis.', 'web', 'canceled', '2023-04-27 14:05:59', '2023-05-21 09:29:07'),
(14, 'Abraham Larkin', 'koss.nestor@wuckert.com', '781.203.3162', 'Et dolores qui officia ipsum dicta.', 'android', 'canceled', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(15, 'Laron Hauck', 'rowe.loyal@hotmail.com', '+1.304.851.7221', 'Odio nisi eum iure voluptatem et iste.', 'android', 'canceled', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(16, 'Hassie Watsica DVM', 'xmarks@pfannerstill.com', '1-573-299-6109', 'Aut dolore minima est suscipit natus.', 'web', 'canceled', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(17, 'Lazaro Johnston', 'russell27@hotmail.com', '+1.313.776.7389', 'Accusamus dolor aut non.', 'ios', 'canceled', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(18, 'Cassandra Toy', 'vbreitenberg@hotmail.com', '1-210-752-3321', 'Rerum reprehenderit harum aut explicabo quis sequi est.', 'android', 'accepted', '2023-04-27 14:05:59', '2023-05-21 09:29:13'),
(19, 'Pearlie Lemke', 'kgibson@hauck.com', '910-838-7358', 'Sed sit voluptatibus quidem dolorem ea voluptas est.', 'web', 'accepted', '2023-04-27 14:05:59', '2023-05-22 14:44:18'),
(20, 'Miss Dorris Schinner MD', 'murazik.myrtis@reichert.com', '(332) 800-6203', 'Aperiam voluptatem quas odio qui laudantium vero reprehenderit.', 'web', 'accepted', '2023-04-27 14:05:59', '2023-05-22 14:45:55'),
(21, 'Chadrick Durgan', 'hodkiewicz.jamie@rath.net', '424-591-1774', 'Aut eaque sed consequatur excepturi est repudiandae autem aut.', 'web', 'accepted', '2023-04-27 14:05:59', '2023-04-27 14:05:59'),
(22, 'Prof. Kristian Medhurst', 'cloyd73@halvorson.com', '229-631-8124', 'Eum ipsa voluptatem nihil dolor quisquam et.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(23, 'Brant Schmidt', 'mathew31@connelly.net', '551.491.8390', 'Laudantium expedita quos debitis aliquid eius.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(24, 'Ms. Maya Rolfson II', 'gwhite@wiegand.com', '+1-567-985-2905', 'Amet mollitia saepe consequatur commodi nihil aperiam.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-05-22 17:49:09'),
(25, 'Kiley Schmitt', 'chanel41@hotmail.com', '(440) 437-8165', 'Quis quia sunt eos.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(26, 'Rosalee Harris', 'shea21@tromp.net', '430-776-5506', 'Rerum molestias et omnis illo voluptatem.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(27, 'Dr. Geovanni Graham V', 'elegros@oconnell.org', '1-629-550-2576', 'Ut atque ut non est totam.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-05-22 19:31:56'),
(28, 'Destini Bailey PhD', 'schiller.lisa@kuhlman.net', '+1-360-746-8231', 'Qui et recusandae ut sit et incidunt.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(29, 'Ms. Kenya Jenkins', 'gmiller@yahoo.com', '430-886-1229', 'Rerum qui sit cumque consequatur in.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(30, 'Dr. Courtney Hoeger V', 'zlegros@gmail.com', '858-795-7781', 'Quia rerum nostrum quidem odio.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(31, 'Prof. Raymundo Stoltenberg I', 'emard.aurelie@gmail.com', '+1.934.715.4321', 'Voluptas eos ipsam fugit dolorem praesentium.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(32, 'Kyleigh Lubowitz', 'hweimann@hand.com', '385.935.6346', 'Dolorem quod omnis et est veritatis.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(33, 'Elinor Vandervort Sr.', 'treutel.wilson@mosciski.com', '+1-813-202-0498', 'Quisquam suscipit molestiae pariatur quia.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(34, 'Jamir Lind MD', 'tstark@hotmail.com', '+14639811787', 'Eligendi qui aut enim et necessitatibus et.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(35, 'Amira Parker MD', 'kwalter@bosco.com', '(580) 786-0571', 'Eveniet temporibus quo aspernatur iste dolor ipsa et perferendis.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(36, 'Arielle Hane', 'zlabadie@hotmail.com', '269.509.1657', 'Et quia at et atque praesentium.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(37, 'Prof. Jermaine Bahringer Sr.', 'adaline92@crist.info', '(608) 889-5220', 'Et iusto ut nam qui et est voluptatum.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(38, 'Misael Hintz', 'funk.destini@oreilly.net', '+1-239-459-0968', 'Asperiores aut quis nihil nam ullam cum.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(39, 'Ike Beer', 'john81@yahoo.com', '+13648997491', 'Amet iure explicabo ut nihil accusamus sunt quaerat et.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(40, 'Fernando Ortiz', 'braun.carlotta@hotmail.com', '+1-205-651-7866', 'Repudiandae sapiente illo fuga est totam quia id.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(41, 'Naomi Hintz', 'jermain30@buckridge.com', '1-854-352-9094', 'Nostrum ex aperiam consequatur quia.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(42, 'Aniyah Pouros', 'jovani.haley@altenwerth.info', '+1 (678) 606-5560', 'Porro et omnis praesentium.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(43, 'Henry Sporer PhD', 'grady43@yahoo.com', '341.674.9798', 'Placeat placeat delectus sit tempore.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(44, 'Raoul Nitzsche', 'cmorar@hotmail.com', '1-848-245-3147', 'Vitae possimus facere corporis molestiae laboriosam excepturi.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(45, 'Joany Stracke', 'dewayne47@hotmail.com', '+1 (315) 632-0001', 'Vero provident fugit debitis neque.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(46, 'Tavares Wintheiser', 'gusikowski.bailee@hamill.com', '+13473718082', 'Illum et in laudantium voluptas enim vitae.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(47, 'Rosalyn Toy DDS', 'hlarkin@schaden.com', '+17543725265', 'Omnis nemo dolores quia et et sunt et.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(48, 'Brielle Runte IV', 'mstiedemann@zemlak.com', '814-216-4814', 'Praesentium iure nulla recusandae unde.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(49, 'Keely Herzog', 'wyatt22@mante.org', '+1-678-736-8811', 'Voluptatem et est libero eum quibusdam pariatur quod.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(50, 'Tania Bernier', 'lambert26@farrell.com', '+1-417-824-7713', 'Aut esse ut amet architecto.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(51, 'Fleta Fisher', 'miller.jast@parisian.net', '(785) 806-1412', 'Ducimus iste vero rerum minus consectetur corporis.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(52, 'Dr. Marilou Thiel', 'amani.parker@hotmail.com', '(925) 341-6452', 'Corporis ipsum sint pariatur aliquid.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(53, 'Mikel Kassulke', 'karson.mills@hotmail.com', '+1.351.686.4061', 'Ipsam repudiandae quis praesentium enim placeat et molestiae.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(54, 'Bonnie Wilkinson', 'edwin31@gmail.com', '(279) 923-9294', 'Sint dolorum modi et ducimus nihil dolores est facilis.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(55, 'Dr. Hilario Rempel PhD', 'mitchell.giovanny@hotmail.com', '325-718-2947', 'Et error quos vero eius tempora occaecati impedit dolores.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(56, 'Caterina Corkery', 'xfahey@gmail.com', '(864) 539-9196', 'Et deleniti quia ut nihil.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(57, 'Ms. Faye Prosacco', 'lisette.gusikowski@hotmail.com', '+1 (941) 647-5952', 'Harum molestias vel minima qui.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(58, 'Leta Hessel', 'barrows.helen@will.biz', '(443) 380-0377', 'Non sint qui et repudiandae qui.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(59, 'Sierra Altenwerth', 'abbey.jacobs@gmail.com', '(408) 509-5778', 'Aliquam architecto iure quia rerum quasi.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(60, 'Vance Swaniawski IV', 'ivy.larkin@hill.info', '+1.872.882.7108', 'Ad impedit aut ut et quis optio ipsam ea.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(61, 'Dr. Granville Hodkiewicz', 'frobel@gmail.com', '+1-303-896-4259', 'Excepturi ullam necessitatibus blanditiis sunt repellat sed ut.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(62, 'Dr. Sherwood Wolff', 'abuckridge@gmail.com', '878.964.5165', 'Ex quaerat voluptatibus ullam quidem corrupti consectetur qui.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(63, 'Alvena McLaughlin PhD', 'skyla37@davis.info', '+19185192921', 'Accusamus aut eius eaque nobis.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(64, 'Mr. Arlo Spinka', 'adele.bogisich@mann.info', '+1-754-553-5721', 'Vero repudiandae beatae ipsam saepe maiores inventore ut.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(65, 'Corene Terry', 'aric.bergnaum@kuhic.com', '828-621-6823', 'Rerum rerum dolorem consequatur impedit.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(66, 'Dr. Zackery Christiansen II', 'jade58@yahoo.com', '+1-773-905-9092', 'Vel voluptas minima consectetur.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(67, 'Bobby Gleichner Jr.', 'elody.feest@mckenzie.com', '(253) 564-1238', 'Sed doloribus ut nihil quisquam quia.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(68, 'Oran Kuhlman', 'whansen@hotmail.com', '979-271-6263', 'Minus eligendi voluptas dolor quidem.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(69, 'Karley Carroll V', 'fmosciski@leannon.com', '586-890-5036', 'Enim quia qui ipsum eligendi quia.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(70, 'Burley Pacocha', 'amanda65@hotmail.com', '(484) 486-9539', 'Ab vel minima quasi tempore et incidunt non.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(71, 'Glenda Kovacek', 'terry.lesly@gorczany.org', '+1-310-766-3976', 'Cupiditate et facere nemo aliquam.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(72, 'Melvin Parisian', 'sedrick82@yahoo.com', '+13072057681', 'Corporis quia et earum animi exercitationem voluptatem sint.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(73, 'Mrs. Sarah Bernhard', 'lindgren.arnoldo@hotmail.com', '+1 (458) 541-0102', 'Beatae rerum soluta odit esse.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(74, 'Dolly DuBuque', 'kamren50@bradtke.com', '1-346-226-4503', 'Ut non molestias quod inventore nihil eum repellendus.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(75, 'Prof. Skye Keeling III', 'may60@hotmail.com', '770.847.3644', 'Et modi libero molestias quos quae sit iure.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(76, 'Savannah Legros DDS', 'zkirlin@kozey.info', '(563) 441-3912', 'Ex qui ipsa vel ipsa doloremque.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(77, 'Zack Erdman', 'aaufderhar@yahoo.com', '(872) 331-1377', 'Dolores ut ducimus nesciunt repudiandae quos dolore inventore.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(78, 'Dr. Cody Hill PhD', 'destin86@yahoo.com', '(678) 717-0756', 'Sapiente sed officia nesciunt.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(79, 'Mrs. Lisette Nikolaus', 'lia.jenkins@pacocha.com', '+1 (607) 482-1331', 'At ea velit qui quam voluptas.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(80, 'William Kovacek', 'tillman00@hotmail.com', '+17206790548', 'Quos deserunt cupiditate minus voluptas omnis.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(81, 'Kari Rohan', 'ledner.kaia@reichel.com', '+18125562307', 'Officia totam sequi vero nesciunt tempora perferendis libero.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(82, 'Prof. Eda O\'Conner V', 'uconnelly@pollich.com', '1-614-760-6163', 'Quis fuga sit nesciunt labore non est.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(83, 'Tony Emmerich', 'juston94@roberts.info', '331-480-5824', 'Unde neque ex repellendus at dolorem odio nemo.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(84, 'Leilani Bednar', 'helena06@yahoo.com', '952.797.8666', 'Dolorem officia beatae nihil voluptatibus.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(85, 'Gladys Becker', 'rempel.maggie@langosh.info', '520-353-6270', 'Ipsam mollitia est ab magnam consectetur voluptas voluptas.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(86, 'Prof. Manley Haley', 'gwindler@gmail.com', '253.756.9300', 'Et iure quod fugiat necessitatibus aspernatur non eum.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(87, 'Chanelle Kiehn', 'evert.jenkins@hotmail.com', '(575) 504-0898', 'Error assumenda libero aut ratione voluptatum numquam sequi.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(88, 'Dr. Moshe Kessler Sr.', 'gulgowski.easton@yahoo.com', '+1-224-285-0502', 'Facere quis facere ullam quia accusamus sed.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(89, 'Dangelo Yost DDS', 'eldred.terry@johnson.biz', '+1 (361) 958-0880', 'Nostrum veniam eligendi quos tempore omnis quod aliquid.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(90, 'Hershel Wolf', 'bogisich.jordi@roob.biz', '+1-276-551-4180', 'Nemo qui consectetur modi voluptate blanditiis fugiat provident.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(91, 'May Larkin', 'abbigail13@metz.com', '701.368.5464', 'Dolor ut rerum maxime voluptas.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(92, 'Dr. Berry Donnelly', 'eeffertz@yahoo.com', '360.445.2520', 'Temporibus ea commodi fugit quidem natus qui.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(93, 'Lue Jacobson', 'mckenna.sipes@rippin.com', '+15029271156', 'Sint nisi veritatis unde quia odit doloremque aut.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(94, 'Dr. Leland Leffler', 'lehner.nora@sporer.biz', '1-251-946-6343', 'Provident sit qui similique et.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(95, 'Antwan Runolfsdottir', 'dorthy.white@heathcote.net', '+16512677642', 'Sint necessitatibus aut quasi vel expedita itaque quis.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(96, 'Prof. Donald Gusikowski MD', 'willms.lyla@blanda.com', '+1-402-608-9869', 'Dicta suscipit est delectus quo.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(97, 'Naomi Wyman', 'hilario.mann@olson.com', '(929) 844-5722', 'Dolor sed magni labore consectetur doloribus.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(98, 'Clemens Gulgowski I', 'meggie.braun@gmail.com', '+1 (469) 353-9062', 'Repellendus non vero iure dolores rerum magnam.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(99, 'Meagan Bradtke I', 'klocko.marquise@mueller.info', '+1 (484) 931-1059', 'Et reprehenderit earum nam dignissimos amet.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(100, 'Jeffry King V', 'conner28@yahoo.com', '704-796-9565', 'Distinctio laudantium doloribus consequatur officiis ut et occaecati.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(101, 'Merritt Thompson', 'wilkinson.terrill@hotmail.com', '+1 (216) 846-0127', 'Ut dignissimos aut quia voluptatum sunt repellendus.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(102, 'Zakary Heaney', 'schmitt.kevon@zieme.com', '+1-737-340-1391', 'Blanditiis et reprehenderit quaerat consequatur qui repellendus inventore numquam.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(103, 'Hailie Emard', 'oma41@grady.org', '+1-321-685-1368', 'Voluptatem et voluptas rem molestiae delectus saepe.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(104, 'Gerardo Rippin', 'tracey23@yahoo.com', '602.835.5556', 'Ipsa qui voluptatem ut et possimus quaerat ea aut.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(105, 'Mr. Bernard Champlin', 'marlee.hamill@hotmail.com', '1-980-395-3801', 'Harum earum eos reiciendis doloremque quibusdam totam.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(106, 'Ofelia Wilkinson Jr.', 'qabshire@yahoo.com', '+1.646.224.1050', 'Quis quae dolorem ipsum sequi provident.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(107, 'Mrs. Mary Oberbrunner', 'lucius.altenwerth@ratke.com', '1-234-617-1724', 'Id et eum sit quaerat consequatur.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(108, 'Olaf Romaguera', 'fkemmer@nitzsche.com', '+14123509658', 'Dolores sed consequatur nihil enim dolore eos.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(109, 'Neha Cremin', 'delilah.dickens@sporer.com', '+1-240-489-7284', 'Amet tempore ut voluptas optio est recusandae.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(110, 'Wilfredo Conroy', 'sanford.hilton@kuphal.com', '424.746.6771', 'Ut rerum in ea.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(111, 'Trinity Pfannerstill MD', 'jayda05@stroman.com', '862.920.4161', 'Omnis est id eos ratione illum.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(112, 'Margarita Huel', 'imogene.keebler@murphy.info', '216.473.0071', 'Eaque consequatur et beatae asperiores.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(113, 'Annabell Homenick', 'shemar.quitzon@morissette.com', '+1-903-276-4594', 'Est iusto eos et odio est.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(114, 'Pearl Pagac', 'herminio50@yahoo.com', '1-843-280-6062', 'Dolore ut sit amet eius iste molestiae.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(115, 'Prof. Mitchel Mosciski MD', 'jullrich@yahoo.com', '+1.802.479.9798', 'Possimus sapiente sit in iure dicta molestiae animi.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(116, 'Olaf Osinski', 'weber.godfrey@pagac.info', '(680) 993-0957', 'Qui optio deserunt deleniti vitae.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(117, 'Dr. Dora Larson', 'makenzie.padberg@langosh.com', '+1-530-302-3026', 'Ut dolor dolores molestiae in modi.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(118, 'Prof. Marcelle O\'Connell Jr.', 'bettye.littel@lemke.com', '845-526-7229', 'Recusandae nisi quibusdam qui.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(119, 'Eveline Pouros', 'salvador.gleason@gmail.com', '1-712-994-6151', 'Odio cumque nemo eum qui dolores inventore voluptatem.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(120, 'Peter Davis', 'kara.torp@barton.com', '(267) 560-6924', 'Eligendi ut quis ut aperiam dolor.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(121, 'Ulices Block', 'toby44@yahoo.com', '651.533.9452', 'Similique ea omnis voluptate tempore officiis ex.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(122, 'Alaina Lang', 'ervin.schneider@hotmail.com', '986-289-3689', 'Ipsum rerum amet ut alias labore omnis sed.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(123, 'Robin Osinski', 'jeromy.wiza@yahoo.com', '531-694-1384', 'Ut vitae a eveniet ut dolores quis.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(124, 'Halle Leffler', 'anabel.koepp@hotmail.com', '+1-631-464-7001', 'Dolores error mollitia perspiciatis laboriosam error dolor velit cum.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(125, 'Florence Torp PhD', 'jmayer@hotmail.com', '1-504-691-7795', 'Quisquam quo sed consequuntur numquam et.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(126, 'Johanna Keeling', 'mshanahan@gmail.com', '351-757-0065', 'Doloremque consequatur voluptatem tempora sit.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(127, 'Amelia Lakin', 'floyd.schmeler@hotmail.com', '+1.984.609.3660', 'Ipsam dolores optio excepturi voluptatem.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(128, 'Stefanie Douglas', 'ywilliamson@gmail.com', '(559) 318-8712', 'Eius illo ut velit ut veniam.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(129, 'Florida Cassin', 'jerome.crooks@adams.com', '+1 (878) 201-6629', 'Nulla et accusantium voluptatem voluptatem quis in possimus.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(130, 'Orville Deckow', 'tomasa55@yahoo.com', '+1-434-913-6994', 'Fugiat dolore cupiditate sunt qui.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(131, 'America Hintz', 'howell.lora@stiedemann.info', '1-706-333-1483', 'Ea laudantium facilis enim et.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(132, 'Lacy Howell', 'obayer@roob.com', '351.406.1841', 'Quidem sequi fugiat ut.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(133, 'Marta Considine', 'orrin96@yahoo.com', '1-773-696-0157', 'Repudiandae a provident placeat nam quasi doloremque.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(134, 'Prof. Albina Wiegand V', 'lavonne.heidenreich@king.com', '678-461-0292', 'Ut eos magni perferendis commodi qui rerum dolor.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(135, 'Annabell Buckridge', 'anastasia.mcclure@romaguera.com', '+1-870-607-8123', 'Architecto minima numquam cum sint cum sit sed.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(136, 'Moses Kuhn', 'jermain04@johns.com', '+1-813-701-0154', 'Qui sunt cum nisi molestiae nam quisquam.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(137, 'Alize Beatty', 'noah29@skiles.com', '539.926.4440', 'Tempora quia voluptas sint vitae quae.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(138, 'Destany Witting PhD', 'maria26@schaefer.net', '(267) 534-7775', 'Blanditiis suscipit dicta doloribus possimus animi beatae repudiandae.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(139, 'Jaden Casper', 'elta86@jakubowski.com', '680.618.8576', 'Id voluptatem quas est sequi quis.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(140, 'Sandy Bauch', 'abshire.brett@yahoo.com', '1-918-927-0625', 'Omnis beatae molestias quia dolorem aperiam voluptates.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(141, 'Jennings Kovacek', 'carleton.spencer@kling.com', '870.741.9258', 'Dignissimos officiis et molestiae.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(142, 'Jayce Kuvalis', 'trinity.grant@cremin.info', '(419) 617-4102', 'Eius sunt numquam velit aut.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(143, 'Ettie Hettinger IV', 'godfrey.dare@gmail.com', '1-878-939-7171', 'Incidunt commodi sed soluta commodi.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(144, 'Ollie Schmitt', 'vicenta62@gmail.com', '+16148878481', 'Recusandae sed non pariatur ut.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(145, 'Gabriella Oberbrunner', 'liam.bartell@gmail.com', '1-701-385-3525', 'Harum voluptatem repellat dolore itaque voluptas optio.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(146, 'Ms. Karolann Schneider V', 'katrina.lehner@walker.com', '+1-231-205-6729', 'Ut ex odit ut et ut dolor laudantium.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(147, 'Mr. Javonte Aufderhar V', 'tskiles@gmail.com', '+1-765-263-2637', 'Repudiandae veritatis omnis et autem voluptas.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(148, 'Joannie Flatley', 'koch.maureen@hotmail.com', '1-484-651-9659', 'Expedita sed aperiam beatae voluptatibus eveniet officia est.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(149, 'Elian Parker', 'crona.khalid@yahoo.com', '1-830-427-6006', 'Ut alias sunt qui quia corrupti ipsa at.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(150, 'Michael Murphy DDS', 'denesik.leopold@boyle.com', '(928) 418-0596', 'Et et veritatis est aut voluptatem vel voluptate.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(151, 'Mr. Ramiro Graham', 'rory17@gmail.com', '1-972-683-1511', 'Facilis nihil molestiae sed deleniti at sit rem.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(152, 'Ms. Hannah Lockman', 'welch.kenna@yahoo.com', '+1-561-682-4354', 'Est quis nesciunt maxime totam animi.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(153, 'Julio Lakin', 'hallie70@hotmail.com', '+13527305981', 'Ipsum id fugit provident accusamus ipsa maiores minima.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(154, 'Raul Franecki', 'adriel88@damore.com', '+1-754-974-2915', 'Vel consequatur enim ipsam amet.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(155, 'Raymundo Bernhard MD', 'haag.sheridan@hotmail.com', '+1 (302) 558-3180', 'Aspernatur tempora ducimus eaque eum ut quae voluptatem.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(156, 'Emiliano Wintheiser PhD', 'alverta.cummings@hotmail.com', '+1-719-653-9879', 'Reprehenderit repudiandae nam minus quibusdam repellendus.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(157, 'Miss Meggie Walker', 'orn.iliana@shanahan.com', '+13015730544', 'Architecto asperiores perspiciatis blanditiis tempore cumque repellat in.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(158, 'Mr. Terence Olson', 'caesar02@jacobson.biz', '+1 (937) 214-8635', 'Ut libero voluptatem odio quaerat quia.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(159, 'Aubree Kulas', 'wilma.kassulke@gmail.com', '+1.405.903.5078', 'Praesentium vel atque nisi.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(160, 'Prof. Ted Flatley', 'uhahn@keeling.com', '1-916-874-0031', 'Recusandae explicabo illum iusto optio.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(161, 'Trevor Cruickshank', 'augustine.mcdermott@ritchie.com', '567-780-9099', 'Expedita beatae nobis enim repellat.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(162, 'Gretchen Rippin', 'rusty.littel@satterfield.com', '+1.231.388.3298', 'Quia sint maxime et esse.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(163, 'Dr. Gene Auer', 'osbaldo.stehr@yahoo.com', '+1-629-894-0509', 'Est at officiis molestiae magnam vitae qui.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(164, 'Arnulfo Cole PhD', 'xboyer@gmail.com', '+1-617-608-9009', 'Eligendi blanditiis expedita dolorum.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(165, 'Anita Mante', 'koelpin.francesca@rolfson.info', '(352) 725-7695', 'Unde sit sit sequi.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(166, 'Prof. Emiliano Jakubowski', 'clair36@hotmail.com', '+17034920231', 'Optio magnam optio omnis id tempore suscipit.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(167, 'Danika Orn II', 'rodrick.kuhn@hotmail.com', '+1-623-456-3857', 'Beatae vero non ut.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(168, 'Oran Lesch V', 'leila.fritsch@wiza.com', '1-843-207-3195', 'Velit voluptatem soluta laborum doloribus dolorem dolorum.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(169, 'Prof. Barry Marvin', 'rau.lacey@gmail.com', '+1.646.636.6101', 'Autem aut maiores non ea minima vitae consectetur.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(170, 'Grayson Bashirian', 'caterina.toy@gmail.com', '+1-808-772-7022', 'Officiis laudantium qui impedit voluptatem quo accusantium.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(171, 'Julia Predovic', 'schneider.nayeli@cartwright.info', '732-924-7866', 'Voluptatem rerum incidunt occaecati pariatur dolorem odio.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(172, 'Josiane Feil', 'clint.thiel@yahoo.com', '(213) 958-3393', 'Et quibusdam accusantium est consectetur vel.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(173, 'Theodore Schmidt', 'nicolas.maxie@yahoo.com', '559.239.9433', 'Eum ut sit similique libero saepe quaerat.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(174, 'Haven Lind', 'jolson@gmail.com', '+1-443-230-9697', 'Voluptas reprehenderit occaecati nemo.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(175, 'Brendon Bashirian', 'nader.mona@hotmail.com', '1-209-545-7925', 'Voluptatibus sapiente molestiae aut reprehenderit aliquid nisi accusamus ducimus.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(176, 'Miracle Rohan PhD', 'mcclure.barney@hotmail.com', '(570) 435-5783', 'Sed earum consectetur ipsa sint nihil est alias.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(177, 'Amely Thiel', 'laurie12@kemmer.com', '(478) 852-5675', 'Et repudiandae sit esse et.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(178, 'Adella Crist', 'rachael59@bernier.org', '440.764.6907', 'Voluptatem ut et eos nemo qui.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(179, 'Monroe Langworth', 'smith.jarrett@feeney.com', '+1-502-307-2240', 'Dolorem quo vero aperiam quod dolore laboriosam deserunt.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(180, 'Deontae Schinner', 'margarete.lindgren@wyman.info', '601.226.8064', 'Aut laboriosam numquam aliquam deleniti beatae quia.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(181, 'Augustine Abernathy', 'nmuller@hotmail.com', '267-977-6368', 'Quia dolores aut cum.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(182, 'Mr. Cary Rippin', 'jayden63@wuckert.com', '(305) 821-4612', 'Necessitatibus illum est sit sapiente minima quia ipsum.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(183, 'Keyon McClure', 'goyette.percy@keebler.net', '1-458-862-4875', 'Suscipit qui est accusantium quisquam et tempora qui.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(184, 'Dr. Cory Becker Jr.', 'luella.feest@prohaska.biz', '534.920.0738', 'Eum porro ut eos nostrum iusto quos.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(185, 'Lilly Nienow', 'gunnar.hilpert@dooley.com', '+1.906.237.8969', 'Recusandae quia asperiores nihil ea.', 'ios', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(186, 'Kelvin Reynolds', 'dolly33@emard.org', '+16306953000', 'Dolorem aut velit pariatur explicabo ea cumque.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(187, 'Narciso Wisoky', 'kavon.graham@schuster.com', '1-928-432-3356', 'Praesentium suscipit maiores impedit perferendis et quaerat adipisci.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(188, 'Erna Oberbrunner III', 'nicklaus77@jast.com', '+1-228-940-9701', 'Cum reiciendis et corrupti.', 'web', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(189, 'Mrs. Teagan Waters II', 'uprice@yahoo.com', '1-262-869-6759', 'Adipisci labore ad sint est culpa eum.', 'web', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(190, 'Max Mueller', 'camryn.ullrich@goldner.org', '+1-970-408-5332', 'Repudiandae dolor illo consequatur maxime cumque tempora autem corrupti.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(191, 'Lenna Corwin', 'elbert84@wunsch.org', '+1.430.506.3263', 'Aliquam quisquam nihil ullam et.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(192, 'Savanna Cummerata MD', 'gwillms@yahoo.com', '1-708-664-5616', 'Delectus et enim voluptatem assumenda commodi in velit voluptatem.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(193, 'Gail Nicolas V', 'jschowalter@quitzon.com', '959-726-5172', 'Qui ut praesentium non neque veniam architecto.', 'ios', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(194, 'Mr. Carol Fay', 'roob.jody@hotmail.com', '+1-220-665-3077', 'Debitis architecto incidunt et eos.', 'ios', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(195, 'Raquel Kozey', 'ahmed43@gmail.com', '+1-870-437-2791', 'Debitis illo numquam in consequuntur.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(196, 'Ms. Margot Emmerich IV', 'julia22@hyatt.com', '+1 (930) 872-0862', 'Dolores quidem quia qui.', 'web', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(197, 'Mara Krajcik', 'reilly.corine@hartmann.org', '769-512-4472', 'Aliquid aperiam dolores sapiente id molestiae laborum.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(198, 'Prof. Vidal Hartmann', 'alanna.boyle@abshire.biz', '1-458-392-3501', 'Necessitatibus odio nulla laboriosam laudantium.', 'android', 'canceled', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(199, 'Verona Bailey Jr.', 'elena.lubowitz@hotmail.com', '+1.703.498.7125', 'Quas dolores perferendis culpa porro quasi qui dolor.', 'android', 'pending', '2023-04-27 14:06:00', '2023-04-27 14:06:00'),
(200, 'Prof. Simone Muller PhD', 'qcronin@yahoo.com', '1-425-825-7092', 'Distinctio temporibus explicabo explicabo sunt repellat porro.', 'android', 'accepted', '2023-04-27 14:06:00', '2023-04-27 14:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `best_selleres`
--

CREATE TABLE `best_selleres` (
  `id` bigint UNSIGNED NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `best_selleres`
--

INSERT INTO `best_selleres` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'this is best sellers', 'this is best sellers', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `logo`, `name_en`, `name_ar`, `created_at`, `updated_at`) VALUES
(1, 'default.png', 'brand 1', 'براند 1', NULL, NULL),
(2, 'default.png', 'brand 2', 'براند 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `user_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `quantity`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(19, 2, '127.0.0.1', 3, '2023-05-11 13:47:00', '2023-05-11 13:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories_halls`
--

CREATE TABLE `categories_halls` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `hall_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_halls`
--

INSERT INTO `categories_halls` (`id`, `category_id`, `hall_id`, `created_at`, `updated_at`) VALUES
(20, 5, 2, '2023-05-07 13:50:47', '2023-05-07 13:50:47'),
(21, 4, 2, '2023-05-07 13:50:47', '2023-05-07 13:50:47'),
(22, 3, 2, '2023-05-07 13:50:47', '2023-05-07 13:50:47'),
(23, 2, 2, '2023-05-07 13:50:47', '2023-05-07 13:50:47'),
(24, 2, 1, '2023-05-07 13:51:09', '2023-05-07 13:51:09'),
(25, 2, 3, '2023-05-07 14:01:32', '2023-05-07 14:01:32'),
(26, 6, 3, '2023-05-07 14:01:32', '2023-05-07 14:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `code` int DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title_ar`, `title_en`, `status`, `code`, `admin_id`, `country_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'القاهره', 'Cairo', '1', NULL, NULL, 1, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(2, 'الاسكندريه', 'Alexandria', '1', NULL, NULL, 1, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(3, 'جده', 'Jeddah', '1', NULL, NULL, 2, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(4, 'الرياض', 'Riyadh', '1', NULL, NULL, 2, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(5, 'دبي', 'Dubai', '1', NULL, NULL, 3, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(6, 'ابوظبي', 'Abu Dhabi', '1', NULL, NULL, 3, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients_ads`
--

CREATE TABLE `clients_ads` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` int NOT NULL,
  `client_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_id` int NOT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `clicks` int NOT NULL DEFAULT '0',
  `from` date NOT NULL,
  `to` date NOT NULL,
  `activation` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','in_active') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients_ads`
--

INSERT INTO `clients_ads` (`id`, `client_id`, `client_type`, `ad_id`, `location`, `views`, `clicks`, `from`, `to`, `activation`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'outer', 1, 'Sub Home 1', 0, 0, '2023-05-02', '2023-06-01', 'yes', 'active', '2023-05-04 16:35:56', '2023-05-04 16:35:56'),
(3, 1, 'outer', 1, 'Sub Home 2', 0, 0, '2023-04-12', '2023-06-08', 'yes', 'active', '2023-05-04 16:36:11', '2023-05-04 16:36:11'),
(4, 1, 'outer', 1, 'In Mobile App Home', 0, 0, '2023-04-12', '2023-06-08', 'yes', 'active', '2023-05-04 16:36:11', '2023-05-04 16:36:11'),
(5, 1, 'outer', 2, 'Main Home', 0, 0, '2023-05-09', '2023-05-26', 'yes', 'active', '2023-05-04 16:55:55', '2023-05-04 16:55:55'),
(6, 2, 'outer', 1, 'In Mobile App Home', 0, 0, '2023-05-01', '2023-06-09', 'yes', 'active', '2023-05-21 21:13:19', '2023-05-21 21:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `name_ar`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Crimson', 'قرمزي', '#dc143c', NULL, '2023-05-22 15:43:31'),
(2, 'Coral', 'مرجان', '#FF7F50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seen` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `message`, `seen`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'testing', 'testing@gmail.com', NULL, 'testing', '1', 508, '2023-05-04 09:47:03', '2023-05-21 09:23:36', NULL),
(2, 'testing', 'testing@gmail.com', NULL, 'testing', '1', 508, '2023-05-04 09:47:17', '2023-05-22 13:11:09', NULL),
(3, 'testing', 'testing@gmail.com', NULL, 'testing', '1', 508, '2023-05-04 09:48:48', '2023-05-22 14:43:41', NULL),
(4, 'testing', 'testing@gmail.com', NULL, 'testing', '1', NULL, '2023-05-04 09:49:05', '2023-05-22 17:12:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_message_replies`
--

CREATE TABLE `contact_message_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact_id` bigint UNSIGNED DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortcut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title_ar`, `title_en`, `shortcut`, `code`, `status`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'مصر', 'Egypt', 'EG', 20, '1', NULL, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(2, 'المملكه العربيه السعوديه', 'Kingdom of Saudi Arabia', 'KSA', 966, '1', NULL, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(3, 'الإمارات العربية المتحدة', 'United Arab Emirates', 'UAE', 971, '1', NULL, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `digital_cards`
--

CREATE TABLE `digital_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `from` double NOT NULL,
  `to` double NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `digital_cards`
--

INSERT INTO `digital_cards` (`id`, `from`, `to`, `type`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 50, 'bronze', 'bronze.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20'),
(2, 50, 150, 'silver', 'silver.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20'),
(3, 150, 500, 'gold', 'gold.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20'),
(4, 500, 1250, 'platinum', 'platinum.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20'),
(5, 1250, 4000, 'platinum*', 'platinum_plus.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20'),
(6, 4000, 7000, 'platinum**', 'platinum_plus_plus.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20'),
(7, 7000, 10000, 'titanum', 'titinum.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20'),
(8, 10000, 15000, 'titanum*', 'titanum_plus.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20'),
(9, 15000, 20000, 'titanum**', 'titnum_plus_plus.jpg', '2023-05-01 08:29:20', '2023-05-01 08:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `explore_categories`
--

CREATE TABLE `explore_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explore_categories`
--

INSERT INTO `explore_categories` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'this is explore category', 'this is explore category', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_ar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question_en`, `question_ar`, `answer_en`, `answer_ar`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?\r\n', 'ما هو \"لوريم إيبسوم\" ؟\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\n\n', NULL, NULL),
(2, 'Why do we use it?\n', 'ما فائدته ؟\n', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\n\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fast_links`
--

CREATE TABLE `fast_links` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fast_links`
--

INSERT INTO `fast_links` (`id`, `name_en`, `name_ar`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Blog', 'Blog', 'https://www.google.com/search?q=loram+epsom&oq=lo&aqs=chrome.2.69i60j69i59l2j69i57j69i60l4.1667j0j7&sourceid=chrome&ie=UTF-8', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(2, 'About Us', 'About Us', 'https://www.google.com/search?q=loram+epsom&oq=lo&aqs=chrome.2.69i60j69i59l2j69i57j69i60l4.1667j0j7&sourceid=chrome&ie=UTF-8', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(3, 'Contact Us', 'Contact Us', 'https://www.google.com/search?q=loram+epsom&oq=lo&aqs=chrome.2.69i60j69i59l2j69i57j69i60l4.1667j0j7&sourceid=chrome&ie=UTF-8', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `features_sections`
--

CREATE TABLE `features_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features_sections`
--

INSERT INTO `features_sections` (`id`, `icon`, `title_en`, `title_ar`, `description_ar`, `description_en`, `created_at`, `updated_at`) VALUES
(1, '1.png', 'Wide Selection 1', 'Wide Selection 1', 'А huge number of products for your celebration day 1', 'А huge number of products for your celebration day 1', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(2, '2.png', 'Wide Selection 2', 'Wide Selection 2', 'А huge number of products for your celebration day 2', 'А huge number of products for your celebration day 2', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(3, '3.png', 'Wide Selection 3', 'Wide Selection 3', 'А huge number of products for your celebration day 3', 'А huge number of products for your celebration day 3', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(4, '4.png', 'Wide Selection 4', 'Wide Selection 4', 'А huge number of products for your celebration day 4', 'А huge number of products for your celebration day 4', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `find_us`
--

CREATE TABLE `find_us` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `find_us`
--

INSERT INTO `find_us` (`id`, `name_en`, `name_ar`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'Facebook', 'https://fontawesome.com/v4/icon/plus', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(2, 'Twitter', 'Twitter', 'https://fontawesome.com/v4/icon/plus', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(3, 'Instagram', 'Instagram', 'https://fontawesome.com/v4/icon/plus', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `footer_contact_us`
--

CREATE TABLE `footer_contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_contact_us`
--

INSERT INTO `footer_contact_us` (`id`, `phone`, `email`, `address_en`, `address_ar`, `created_at`, `updated_at`) VALUES
(1, '01121238817', 'info@events-app.com', 'Abu Dabhi - Emirates', 'Abu Dabhi - Emirates', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `footer_main_sections`
--

CREATE TABLE `footer_main_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `big_title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_main_sections`
--

INSERT INTO `footer_main_sections` (`id`, `big_title_ar`, `big_title_en`, `small_title_ar`, `small_title_en`, `created_at`, `updated_at`) VALUES
(1, 'Newsletter', 'Newsletter', 'Don’t miss our significant news and season sales. Subscribe!', 'Don’t miss our significant news and season sales. Subscribe!', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guests_capacity` bigint DEFAULT NULL,
  `views` bigint DEFAULT '0',
  `slug_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `summary_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `primary_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_id` bigint UNSIGNED DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accept` enum('new','accepted','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `email`, `phone`, `title_ar`, `title_en`, `guests_capacity`, `views`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `primary_image`, `status`, `admin_id`, `vendor_id`, `country_id`, `city_id`, `latitude`, `longitude`, `address_ar`, `address_en`, `rate`, `accept`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'woxudonix@mailinator.com', '+1 (668) 757-7504', 'القاعه الثانيه', 'Second Hall', 92, 0, 'القاعه-الثانيه', 'second-hall', '<p>vdvdas</p>', '<p>ffsd</p>', 'Cillum esse ipsa ni', 'Et aliquip perferend', 'Quibusdam alias cons', 'Deserunt sint veniam', 'pJ1m3fAF7AfhUP23mBjNNiLyCSYnVlR3HfVOpWlz.jpg', '1', 1, 7, 3, 5, '75', '45', 'Magnam est repellen', 'Aut optio quam sed', '0', 'accepted', '2023-04-27 16:12:36', '2023-05-21 09:26:58', NULL),
(2, 'fecelo@mailinator.com', '+1 (528) 469-8328', 'القاعه الاولى', 'first Hall', 76, 0, 'القاعه-الاولى', 'first-hall', '<p>fgfsf</p>', '<p>sfsf</p>', 'Eveniet cumque reru', 'Praesentium quis qui', 'Voluptas quis illum', 'Nobis atque rerum nu', 'oTalOCDStGC8hbuwaGR349HS11yufNxgkT0D6zET.png', '1', 1, 7, 2, 3, '63', '86', 'Exercitationem iste', 'Iure autem qui eaque', '0', 'accepted', '2023-05-07 09:03:39', '2023-05-22 20:08:31', NULL),
(3, 'zahomipyd@mailinator.com', '+1 (621) 952-7292', 'Soluta labore corpor', 'Numquam ad libero ob', 45, 0, 'soluta-labore-corpor', 'numquam-ad-libero-ob', '<p>wfsfd</p>', '<p>sggdsd</p>', 'Nihil commodo conseq', 'Ullam dolor tempore', 'Inventore nobis comm', 'Laborum Ut cum duis', NULL, '1', 1, 7, 1, 1, '62', '62', 'Iure qui ad id harum', 'Iure dolorem tempor', '0', 'new', '2023-05-07 14:00:49', '2023-05-07 14:01:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hall_bookings`
--

CREATE TABLE `hall_bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `status` enum('success','cancelled','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `packge_id` bigint UNSIGNED NOT NULL,
  `hall_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `extra_guest` int DEFAULT NULL,
  `accept` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall_bookings`
--

INSERT INTO `hall_bookings` (`id`, `status`, `date`, `time_from`, `time_to`, `packge_id`, `hall_id`, `user_id`, `vendor_id`, `total`, `extra_guest`, `accept`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'success', '2023-06-12', '08:00:00', '11:23:03', 1, 1, 514, 52, 42788, 55, NULL, '2023-04-27 16:16:42', '2023-05-22 20:10:27', NULL),
(2, 'pending', '2023-05-23', '08:00:00', '11:42:53', 1, 1, 514, 52, 25643, 55, NULL, '2023-04-27 16:16:42', '2023-05-22 17:33:18', NULL),
(3, 'pending', '2023-06-10', '08:00:00', '09:54:36', 1, 1, 514, 52, 13382, 55, NULL, '2023-04-27 16:16:42', '2023-05-22 17:08:33', NULL),
(4, 'pending', '2023-05-28', '08:00:00', '09:11:39', 1, 1, 514, 52, 13564, 55, NULL, '2023-04-27 16:16:42', '2023-04-27 16:16:42', NULL),
(5, 'success', '2023-05-07', '08:00:00', '08:17:03', 1, 1, 514, 52, 20079, 55, NULL, '2023-04-27 16:16:43', '2023-05-22 19:43:10', NULL),
(6, 'cancelled', '2023-05-14', '08:00:00', '10:31:21', 1, 1, 514, 6, 20178, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(7, 'cancelled', '2023-06-27', '08:00:00', '10:13:36', 1, 1, 514, 3, 16669, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(8, 'success', '2023-06-16', '08:00:00', '08:27:48', 1, 1, 514, 6, 13758, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(9, 'cancelled', '2023-06-15', '08:00:00', '10:47:14', 1, 1, 514, 3, 33718, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(10, 'success', '2023-06-25', '08:00:00', '11:22:19', 1, 1, 514, 2, 42550, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(11, 'cancelled', '2023-05-31', '08:00:00', '08:17:27', 1, 1, 514, 3, 14355, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(12, 'cancelled', '2023-05-20', '08:00:00', '11:32:07', 1, 1, 514, 1, 30962, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(13, 'success', '2023-06-06', '08:00:00', '08:21:46', 1, 1, 514, 4, 19892, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(14, 'success', '2023-06-23', '08:00:00', '11:16:27', 1, 1, 514, 2, 10253, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(15, 'success', '2023-06-09', '08:00:00', '09:43:52', 1, 1, 514, 6, 11454, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(16, 'cancelled', '2023-06-19', '08:00:00', '11:50:44', 1, 1, 514, 3, 24440, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(17, 'cancelled', '2023-06-19', '08:00:00', '08:22:09', 1, 1, 514, 4, 24062, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(18, 'cancelled', '2023-06-12', '08:00:00', '10:11:47', 1, 1, 514, 1, 21241, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(19, 'cancelled', '2023-05-17', '08:00:00', '11:39:37', 1, 1, 514, 5, 34833, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(20, 'cancelled', '2023-06-11', '08:00:00', '11:07:07', 1, 1, 514, 5, 10720, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(21, 'success', '2023-05-18', '08:00:00', '08:46:36', 1, 1, 514, 2, 33654, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(22, 'cancelled', '2023-06-14', '08:00:00', '08:41:18', 1, 1, 514, 6, 23178, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(23, 'cancelled', '2023-06-25', '08:00:00', '08:48:45', 1, 1, 514, 1, 14047, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(24, 'cancelled', '2023-05-24', '08:00:00', '09:56:48', 1, 1, 514, 5, 33285, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(25, 'cancelled', '2023-05-31', '08:00:00', '08:22:22', 1, 1, 514, 2, 13459, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(26, 'cancelled', '2023-05-27', '08:00:00', '09:45:25', 1, 1, 514, 2, 10587, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(27, 'success', '2023-05-31', '08:00:00', '10:42:49', 1, 1, 514, 3, 44340, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(28, 'cancelled', '2023-05-31', '08:00:00', '08:42:51', 1, 1, 514, 5, 44783, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(29, 'success', '2023-06-23', '08:00:00', '10:48:22', 1, 1, 514, 4, 27715, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(30, 'success', '2023-05-18', '08:00:00', '08:11:15', 1, 1, 514, 4, 41116, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(31, 'success', '2023-05-25', '08:00:00', '10:40:48', 1, 1, 514, 4, 6461, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(32, 'success', '2023-06-24', '08:00:00', '11:32:39', 1, 1, 514, 6, 38798, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(33, 'success', '2023-06-19', '08:00:00', '08:11:16', 1, 1, 514, 6, 21595, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(34, 'success', '2023-05-07', '08:00:00', '10:29:44', 1, 1, 514, 3, 41709, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(35, 'cancelled', '2023-05-26', '08:00:00', '08:19:48', 1, 1, 514, 3, 32751, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(36, 'success', '2023-05-05', '08:00:00', '10:07:32', 1, 1, 514, 4, 32889, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(37, 'success', '2023-05-23', '08:00:00', '08:55:55', 1, 1, 514, 1, 12552, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(38, 'cancelled', '2023-06-03', '08:00:00', '08:03:59', 1, 1, 514, 3, 7464, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(39, 'success', '2023-06-01', '08:00:00', '09:51:13', 1, 1, 514, 1, 17354, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL),
(40, 'success', '2023-05-07', '08:00:00', '09:08:12', 1, 1, 514, 6, 46464, 55, NULL, '2023-04-27 16:16:43', '2023-04-27 16:16:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hall_categories`
--

CREATE TABLE `hall_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `summary_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall_categories`
--

INSERT INTO `hall_categories` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `image`, `status`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'اخري', 'other', 'اخري', 'other', 'اخري', 'other', 'اخري', 'other', 'اخري', 'other', NULL, '1', NULL, '2023-04-27 18:06:03', '2023-04-27 18:06:03', NULL),
(2, 'اعياد ميلاد', 'Birthdays', 'اعياد-ميلاد', 'birthdays', 'اعياد ميلاد', 'Birthdays', 'اعياد ميلاد', 'Birthdays', 'اعياد ميلاد', 'Birthdays', NULL, '1', NULL, '2023-04-27 18:06:03', '2023-04-27 18:06:03', NULL),
(3, 'خطوبة', 'engagement', 'خطوبة', 'engagement', 'خطوبة', 'engagement', 'خطوبة', 'engagement', 'خطوبة', 'engagement', NULL, '1', NULL, '2023-04-27 18:06:03', '2023-04-27 18:06:03', NULL),
(4, 'مؤتمرات', 'conferences', 'مؤتمرات', 'conferences', 'مؤتمرات', 'conferences', 'مؤتمرات', 'conferences', 'مؤتمرات', 'conferences', NULL, '1', NULL, '2023-04-27 18:06:03', '2023-04-27 18:06:03', NULL),
(5, 'حفلات خاصه', 'private parties', 'حفلات-خاصه', 'private-parties', 'حفلات خاصه', 'private parties', 'حفلات خاصه', 'private parties', 'حفلات خاصه', 'private parties', NULL, '1', NULL, '2023-04-27 18:06:03', '2023-04-27 18:06:03', NULL),
(6, 'زفاف', 'wedding', 'زفاف', 'wedding', 'زفاف', 'wedding', 'زفاف', 'wedding', 'زفاف', 'wedding', NULL, '1', NULL, '2023-04-27 18:06:03', '2023-04-27 18:06:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hall_media`
--

CREATE TABLE `hall_media` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hall_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall_media`
--

INSERT INTO `hall_media` (`id`, `image`, `hall_id`, `created_at`, `updated_at`) VALUES
(1, 'AIMdvSyWCBIKWb8DDn0M7CWH92dkmmBALsdDUCDP.png', 2, '2023-05-07 09:03:39', '2023-05-07 09:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `hall_taxes`
--

CREATE TABLE `hall_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `hall_id` bigint UNSIGNED DEFAULT NULL,
  `tax_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hint_sections`
--

CREATE TABLE `hint_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `small_text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hint_sections`
--

INSERT INTO `hint_sections` (`id`, `small_text_en`, `small_text_ar`, `base_text_en`, `base_text_ar`, `short_description_en`, `short_description_ar`, `full_description_en`, `full_description_ar`, `video`, `created_at`, `updated_at`) VALUES
(1, 'find your beauty', 'find your beauty', 'we work hard for your happy moment', 'we work hard for your happy moment', 'We know that this is the best day of your life and it should be unforgettable.', 'We know that this is the best day of your life and it should be unforgettable.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.youtube.com/watch?v=I9AP55xefbY', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `views` bigint NOT NULL DEFAULT '0',
  `clicks` bigint NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_birthday_halls`
--

CREATE TABLE `latest_birthday_halls` (
  `id` bigint UNSIGNED NOT NULL,
  `small_text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latest_birthday_halls`
--

INSERT INTO `latest_birthday_halls` (`id`, `small_text_ar`, `small_text_en`, `big_text_ar`, `big_text_en`, `created_at`, `updated_at`) VALUES
(1, 'this is LATEST Birthday HALLS', 'this is LATEST Birthday HALLS', 'this is LATEST Birthday HALLS Details', 'this is LATEST Birthday HALLS Details', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `latest_engagments_halls`
--

CREATE TABLE `latest_engagments_halls` (
  `id` bigint UNSIGNED NOT NULL,
  `small_text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latest_engagments_halls`
--

INSERT INTO `latest_engagments_halls` (`id`, `small_text_ar`, `small_text_en`, `big_text_ar`, `big_text_en`, `created_at`, `updated_at`) VALUES
(1, 'this is LATEST ENGAGMENTS HALLS', 'this is LATEST ENGAGMENTS HALLS', 'this is LATEST ENGAGMENTS HALLS Details', 'this is LATEST ENGAGMENTS HALLS Details', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `latest_products`
--

CREATE TABLE `latest_products` (
  `id` bigint UNSIGNED NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latest_products`
--

INSERT INTO `latest_products` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'this is latest products', 'هنا اخر المنتجات', '2023-05-04 12:47:38', '2023-05-07 13:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `latest_wedding_halls`
--

CREATE TABLE `latest_wedding_halls` (
  `id` bigint UNSIGNED NOT NULL,
  `small_title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latest_wedding_halls`
--

INSERT INTO `latest_wedding_halls` (`id`, `small_title_en`, `small_title_ar`, `big_title_en`, `big_title_ar`, `created_at`, `updated_at`) VALUES
(1, 'title', 'العنوان', 'this is latest wedding halls', 'هنا اخر صالات للزفاف', '2023-05-04 12:47:38', '2023-05-07 13:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
(24, '2022_12_22_085144_create_home_sliders_table', 1),
(25, '2022_12_22_085208_create_ad_categories_table', 1),
(26, '2022_12_22_085221_create_ads_table', 1),
(28, '2022_12_22_085422_create_user_favorite_products_table', 1),
(29, '2022_12_22_085502_create_product_reviews_table', 1),
(30, '2022_12_22_085624_create_contact_messages_table', 1),
(31, '2022_12_22_085625_create_contact_message_replies_table', 1),
(32, '2022_12_22_085657_create_promo_codes_table', 1),
(33, '2022_12_22_085745_create_app_settings_table', 1),
(34, '2022_12_22_085816_create_shippings_table', 1),
(35, '2022_12_22_085817_create_orders_table', 1),
(36, '2022_12_22_085925_create_order_details_table', 1),
(37, '2022_12_22_100559_create_order_extra_fees_table', 1),
(38, '2022_12_22_100927_create_order_special_discounts_table', 1),
(39, '2023_01_09_102838_create_halls_table', 1),
(40, '2023_01_09_105346_create_hall_media_table', 1),
(42, '2023_01_12_102921_create_package_option_categories_table', 1),
(43, '2023_01_12_103022_create_package_options_table', 1),
(44, '2023_01_15_103724_create_packages_table', 1),
(45, '2023_01_15_111419_package_option', 1),
(46, '2023_01_15_121411_package_tax', 1),
(47, '2023_03_28_154954_create_colors_table', 1),
(48, '2023_03_29_112524_create_product_colors_table', 1),
(49, '2023_04_03_052534_create_sizes_table', 1),
(50, '2023_04_03_113021_create_product_sizes_table', 1),
(51, '2023_04_05_133507_create_occasions_table', 1),
(52, '2023_04_05_134641_create_product_occasions_table', 1),
(53, '2023_04_05_143016_create_product_taxes_table', 1),
(54, '2023_04_06_134626_create_order_products_table', 1),
(55, '2023_04_06_135246_create_order_taxes_table', 1),
(56, '2023_04_11_095201_create_notifications_table', 1),
(57, '2023_04_17_151926_create_available_dates_table', 1),
(58, '2023_04_19_121505_create_hall_bookings_table', 1),
(59, '2023_04_26_163741_create_with_draw_requests_table', 1),
(60, '2023_04_26_172857_create_digital_cards_table', 1),
(61, '2023_04_27_104812_create_become_vendors_table', 1),
(62, '2022_12_22_085008_product_products_with', 2),
(63, '2023_04_19_123150_hall_taxes', 2),
(64, '2023_04_27_114716_create_with_draws_table', 2),
(65, '2023_05_02_150540_create_advertisements_table', 3),
(66, '2023_05_02_142137_create_outer_clients_table', 4),
(67, '2023_05_02_154808_create_clients_ads_table', 5),
(68, '2023_04_30_134611_create_latest_wedding_halls_table', 6),
(69, '2023_04_30_110950_create_top_navbars_table', 7),
(70, '2023_04_30_115900_create_view_all_products_table', 8),
(71, '2023_04_30_143416_create_latest_products_table', 9),
(72, '2023_04_30_144959_create_explore_categories_table', 10),
(73, '2023_04_30_145514_create_best_selleres_table', 11),
(74, '2023_04_30_150227_create_shop_by_occasions_table', 12),
(75, '2023_04_30_150941_create_shop_by_brands_table', 13),
(76, '2023_04_30_160051_create_hint_sections_table', 14),
(77, '2023_05_01_135301_create_latest_engagments_halls_table', 15),
(78, '2023_05_01_141952_create_latest_birthday_halls_table', 16),
(79, '2023_05_01_150215_create_features_sections_table', 17),
(80, '2023_05_01_153003_create_news_sections_table', 18),
(81, '2023_05_01_154426_create_top_footers_table', 19),
(82, '2023_05_01_165044_create_footer_main_sections_table', 20),
(83, '2023_05_02_101210_create_fast_links_table', 21),
(84, '2023_05_02_105230_create_find_us_table', 22),
(85, '2023_05_02_110759_create_footer_contact_us_table', 23),
(87, '2023_01_09_121335_categories_halls', 24),
(88, '2022_12_22_085320_create_carts_table', 25),
(90, '2023_05_10_094449_create_assign_explore_categories_table', 26),
(92, '2023_05_10_150049_create_wishlists_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `news_sections`
--

CREATE TABLE `news_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_sections`
--

INSERT INTO `news_sections` (`id`, `title_ar`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'this is news section', 'this is news section', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `code_id` bigint UNSIGNED DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `vendor_id`, `title_en`, `desc_ar`, `desc_en`, `message_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(2, 2, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(3, 3, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(4, 4, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(5, 5, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(6, 6, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(7, 7, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(8, 8, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(9, 9, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(10, 10, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(11, 11, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(12, 12, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(13, 13, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(14, 14, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(15, 15, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(16, 16, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(17, 17, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(18, 18, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(19, 19, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(20, 20, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(21, 21, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(22, 22, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(23, 23, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(24, 24, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(25, 25, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(26, 26, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(27, 27, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(28, 28, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(29, 29, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(30, 30, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(31, 31, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(32, 32, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(33, 33, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(34, 34, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(35, 35, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(36, 36, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(37, 37, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(38, 38, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(39, 39, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(40, 40, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(41, 41, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(42, 42, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(43, 43, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(44, 44, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(45, 45, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(46, 46, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(47, 47, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(48, 48, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(49, 49, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(50, 50, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(51, 51, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(52, 52, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(53, 53, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(54, 54, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(55, 55, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(56, 56, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(57, 57, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(58, 58, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(59, 59, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(60, 60, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(61, 61, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(62, 62, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(63, 63, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(64, 64, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(65, 65, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(66, 66, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(67, 67, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(68, 68, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(69, 69, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(70, 70, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(71, 71, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(72, 72, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(73, 73, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(74, 74, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(75, 75, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(76, 76, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(77, 77, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(78, 78, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(79, 79, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(80, 80, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(81, 81, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(82, 82, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(83, 83, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(84, 84, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(85, 85, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(86, 86, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(87, 87, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(88, 88, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(89, 89, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(90, 90, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(91, 91, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(92, 92, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(93, 93, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(94, 94, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(95, 95, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(96, 96, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(97, 97, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(98, 98, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(99, 99, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(100, 100, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(101, 101, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(102, 102, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(103, 103, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(104, 104, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(105, 105, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(106, 106, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(107, 107, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(108, 108, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(109, 109, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(110, 110, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(111, 111, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(112, 112, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(113, 113, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(114, 114, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(115, 115, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(116, 116, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(117, 117, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(118, 118, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(119, 119, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(120, 120, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(121, 121, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(122, 122, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(123, 123, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(124, 124, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(125, 125, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(126, 126, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(127, 127, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(128, 128, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(129, 129, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(130, 130, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(131, 131, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(132, 132, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(133, 133, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(134, 134, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(135, 135, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(136, 136, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(137, 137, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(138, 138, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(139, 139, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(140, 140, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(141, 141, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(142, 142, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(143, 143, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(144, 144, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(145, 145, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(146, 146, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(147, 147, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(148, 148, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(149, 149, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(150, 150, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(151, 151, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(152, 152, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(153, 153, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(154, 154, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(155, 155, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(156, 156, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(157, 157, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(158, 158, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(159, 159, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(160, 160, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(161, 161, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(162, 162, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(163, 163, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(164, 164, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(165, 165, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(166, 166, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(167, 167, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(168, 168, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(169, 169, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(170, 170, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(171, 171, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(172, 172, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(173, 173, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(174, 174, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(175, 175, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(176, 176, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(177, 177, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(178, 178, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(179, 179, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(180, 180, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(181, 181, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(182, 182, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(183, 183, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(184, 184, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(185, 185, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(186, 186, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(187, 187, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(188, 188, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(189, 189, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(190, 190, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(191, 191, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(192, 192, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(193, 193, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(194, 194, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(195, 195, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(196, 196, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(197, 197, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(198, 198, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(199, 199, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(200, 200, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(201, 201, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(202, 202, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(203, 203, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(204, 204, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(205, 205, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(206, 206, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(207, 207, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(208, 208, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(209, 209, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(210, 210, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(211, 211, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(212, 212, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(213, 213, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(214, 214, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(215, 215, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(216, 216, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(217, 217, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(218, 218, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(219, 219, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(220, 220, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(221, 221, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(222, 222, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(223, 223, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(224, 224, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(225, 225, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(226, 226, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(227, 227, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(228, 228, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(229, 229, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(230, 230, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(231, 231, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(232, 232, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(233, 233, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(234, 234, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(235, 235, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(236, 236, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(237, 237, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(238, 238, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(239, 239, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(240, 240, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(241, 241, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(242, 242, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(243, 243, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(244, 244, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(245, 245, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(246, 246, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(247, 247, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(248, 248, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(249, 249, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(250, 250, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(251, 251, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(252, 252, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(253, 253, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(254, 254, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(255, 255, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(256, 256, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(257, 257, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(258, 258, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(259, 259, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(260, 260, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(261, 261, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(262, 262, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(263, 263, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(264, 264, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(265, 265, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(266, 266, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(267, 267, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(268, 268, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(269, 269, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(270, 270, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(271, 271, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(272, 272, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(273, 273, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(274, 274, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(275, 275, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(276, 276, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(277, 277, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(278, 278, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(279, 279, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL);
INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `vendor_id`, `title_en`, `desc_ar`, `desc_en`, `message_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(280, 280, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(281, 281, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(282, 282, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(283, 283, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(284, 284, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(285, 285, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(286, 286, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(287, 287, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(288, 288, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(289, 289, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(290, 290, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(291, 291, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(292, 292, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(293, 293, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(294, 294, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(295, 295, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(296, 296, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(297, 297, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(298, 298, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(299, 299, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(300, 300, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(301, 301, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(302, 302, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(303, 303, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(304, 304, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(305, 305, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(306, 306, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(307, 307, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(308, 308, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(309, 309, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(310, 310, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(311, 311, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(312, 312, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(313, 313, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(314, 314, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(315, 315, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(316, 316, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(317, 317, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(318, 318, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(319, 319, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(320, 320, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(321, 321, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(322, 322, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(323, 323, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(324, 324, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(325, 325, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(326, 326, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(327, 327, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(328, 328, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(329, 329, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(330, 330, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(331, 331, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(332, 332, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(333, 333, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(334, 334, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(335, 335, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(336, 336, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(337, 337, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(338, 338, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(339, 339, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(340, 340, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(341, 341, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(342, 342, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(343, 343, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(344, 344, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(345, 345, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(346, 346, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(347, 347, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(348, 348, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(349, 349, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(350, 350, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(351, 351, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(352, 352, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(353, 353, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(354, 354, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(355, 355, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(356, 356, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(357, 357, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(358, 358, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(359, 359, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(360, 360, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(361, 361, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(362, 362, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(363, 363, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(364, 364, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(365, 365, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(366, 366, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(367, 367, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(368, 368, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(369, 369, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(370, 370, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(371, 371, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(372, 372, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(373, 373, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(374, 374, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(375, 375, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(376, 376, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(377, 377, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(378, 378, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(379, 379, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(380, 380, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(381, 381, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(382, 382, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(383, 383, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(384, 384, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(385, 385, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(386, 386, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(387, 387, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(388, 388, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(389, 389, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(390, 390, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(391, 391, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(392, 392, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(393, 393, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(394, 394, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(395, 395, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(396, 396, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(397, 397, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(398, 398, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(399, 399, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(400, 400, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(401, 401, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(402, 402, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(403, 403, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(404, 404, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(405, 405, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(406, 406, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(407, 407, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(408, 408, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(409, 409, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(410, 410, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(411, 411, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(412, 412, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(413, 413, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(414, 414, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(415, 415, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(416, 416, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(417, 417, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(418, 418, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(419, 419, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(420, 420, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(421, 421, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(422, 422, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(423, 423, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(424, 424, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(425, 425, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(426, 426, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(427, 427, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(428, 428, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(429, 429, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(430, 430, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(431, 431, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(432, 432, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(433, 433, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(434, 434, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(435, 435, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(436, 436, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(437, 437, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(438, 438, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(439, 439, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(440, 440, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(441, 441, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(442, 442, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(443, 443, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(444, 444, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(445, 445, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(446, 446, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(447, 447, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(448, 448, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(449, 449, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(450, 450, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(451, 451, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(452, 452, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(453, 453, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(454, 454, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(455, 455, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:08', '2023-05-01 10:01:08', NULL),
(456, 456, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(457, 457, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(458, 458, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(459, 459, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(460, 460, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(461, 461, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(462, 462, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(463, 463, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(464, 464, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(465, 465, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(466, 466, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(467, 467, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(468, 468, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(469, 469, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(470, 470, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(471, 471, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(472, 472, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(473, 473, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(474, 474, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(475, 475, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(476, 476, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(477, 477, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(478, 478, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(479, 479, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(480, 480, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(481, 481, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(482, 482, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(483, 483, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(484, 484, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(485, 485, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(486, 486, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(487, 487, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(488, 488, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(489, 489, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(490, 490, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(491, 491, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(492, 492, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(493, 493, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(494, 494, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(495, 495, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(496, 496, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(497, 497, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(498, 498, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(499, 499, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(500, 500, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(501, 501, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:01:09', '2023-05-01 10:01:09', NULL),
(502, 1, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(503, 2, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(504, 3, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(505, 4, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(506, 5, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(507, 6, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(508, 7, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(509, 8, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(510, 9, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(511, 10, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(512, 11, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(513, 12, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(514, 13, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(515, 14, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(516, 15, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(517, 16, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(518, 17, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(519, 18, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(520, 19, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(521, 20, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(522, 21, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(523, 22, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(524, 23, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(525, 24, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(526, 25, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(527, 26, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(528, 27, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(529, 28, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(530, 29, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(531, 30, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(532, 31, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(533, 32, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(534, 33, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(535, 34, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(536, 35, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(537, 36, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(538, 37, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(539, 38, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(540, 39, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(541, 40, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(542, 41, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(543, 42, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(544, 43, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(545, 44, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(546, 45, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(547, 46, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(548, 47, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(549, 48, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(550, 49, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(551, 50, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(552, 51, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(553, 52, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(554, 53, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(555, 54, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(556, 55, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(557, 56, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL);
INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `vendor_id`, `title_en`, `desc_ar`, `desc_en`, `message_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(558, 57, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(559, 58, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(560, 59, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(561, 60, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(562, 61, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(563, 62, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(564, 63, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(565, 64, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(566, 65, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(567, 66, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(568, 67, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(569, 68, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(570, 69, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(571, 70, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(572, 71, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(573, 72, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(574, 73, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(575, 74, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(576, 75, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(577, 76, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(578, 77, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(579, 78, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(580, 79, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(581, 80, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(582, 81, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(583, 82, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(584, 83, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(585, 84, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(586, 85, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(587, 86, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(588, 87, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(589, 88, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(590, 89, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(591, 90, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(592, 91, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(593, 92, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(594, 93, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(595, 94, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(596, 95, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(597, 96, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(598, 97, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(599, 98, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(600, 99, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(601, 100, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(602, 101, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(603, 102, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(604, 103, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(605, 104, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(606, 105, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(607, 106, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(608, 107, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(609, 108, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(610, 109, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(611, 110, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(612, 111, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(613, 112, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(614, 113, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(615, 114, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(616, 115, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(617, 116, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(618, 117, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(619, 118, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(620, 119, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(621, 120, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(622, 121, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(623, 122, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(624, 123, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(625, 124, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(626, 125, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(627, 126, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(628, 127, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(629, 128, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(630, 129, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(631, 130, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(632, 131, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(633, 132, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(634, 133, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(635, 134, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(636, 135, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(637, 136, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(638, 137, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(639, 138, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(640, 139, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(641, 140, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(642, 141, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(643, 142, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(644, 143, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(645, 144, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(646, 145, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(647, 146, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(648, 147, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(649, 148, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(650, 149, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(651, 150, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(652, 151, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(653, 152, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(654, 153, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(655, 154, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(656, 155, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(657, 156, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(658, 157, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(659, 158, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(660, 159, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(661, 160, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(662, 161, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(663, 162, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(664, 163, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(665, 164, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(666, 165, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(667, 166, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(668, 167, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(669, 168, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(670, 169, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(671, 170, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(672, 171, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(673, 172, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(674, 173, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(675, 174, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(676, 175, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(677, 176, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(678, 177, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(679, 178, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(680, 179, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(681, 180, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(682, 181, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(683, 182, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(684, 183, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(685, 184, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(686, 185, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(687, 186, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(688, 187, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(689, 188, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(690, 189, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(691, 190, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(692, 191, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(693, 192, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(694, 193, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(695, 194, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(696, 195, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(697, 196, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(698, 197, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(699, 198, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(700, 199, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(701, 200, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(702, 201, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(703, 202, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(704, 203, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(705, 204, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(706, 205, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(707, 206, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(708, 207, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(709, 208, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(710, 209, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(711, 210, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(712, 211, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(713, 212, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(714, 213, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(715, 214, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(716, 215, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(717, 216, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(718, 217, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(719, 218, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(720, 219, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(721, 220, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(722, 221, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(723, 222, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(724, 223, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(725, 224, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(726, 225, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(727, 226, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(728, 227, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(729, 228, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(730, 229, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(731, 230, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(732, 231, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(733, 232, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(734, 233, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(735, 234, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(736, 235, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(737, 236, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(738, 237, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(739, 238, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(740, 239, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(741, 240, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(742, 241, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(743, 242, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(744, 243, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(745, 244, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(746, 245, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(747, 246, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(748, 247, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(749, 248, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(750, 249, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(751, 250, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(752, 251, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(753, 252, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(754, 253, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(755, 254, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(756, 255, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(757, 256, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(758, 257, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(759, 258, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(760, 259, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(761, 260, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(762, 261, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(763, 262, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(764, 263, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(765, 264, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(766, 265, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(767, 266, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(768, 267, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(769, 268, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(770, 269, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(771, 270, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(772, 271, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(773, 272, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(774, 273, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(775, 274, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(776, 275, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(777, 276, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(778, 277, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(779, 278, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(780, 279, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(781, 280, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(782, 281, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(783, 282, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(784, 283, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(785, 284, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(786, 285, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(787, 286, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(788, 287, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(789, 288, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(790, 289, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(791, 290, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(792, 291, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(793, 292, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(794, 293, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(795, 294, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(796, 295, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(797, 296, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(798, 297, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(799, 298, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(800, 299, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(801, 300, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(802, 301, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(803, 302, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(804, 303, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(805, 304, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(806, 305, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(807, 306, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(808, 307, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(809, 308, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(810, 309, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(811, 310, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(812, 311, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(813, 312, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(814, 313, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(815, 314, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(816, 315, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(817, 316, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(818, 317, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(819, 318, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(820, 319, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(821, 320, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(822, 321, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(823, 322, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(824, 323, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(825, 324, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(826, 325, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(827, 326, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(828, 327, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(829, 328, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(830, 329, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(831, 330, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(832, 331, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(833, 332, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(834, 333, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(835, 334, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL);
INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `vendor_id`, `title_en`, `desc_ar`, `desc_en`, `message_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(836, 335, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(837, 336, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(838, 337, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(839, 338, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(840, 339, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(841, 340, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(842, 341, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(843, 342, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(844, 343, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(845, 344, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(846, 345, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(847, 346, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(848, 347, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(849, 348, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(850, 349, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(851, 350, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(852, 351, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(853, 352, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(854, 353, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(855, 354, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(856, 355, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(857, 356, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(858, 357, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(859, 358, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(860, 359, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(861, 360, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(862, 361, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(863, 362, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(864, 363, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(865, 364, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(866, 365, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(867, 366, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(868, 367, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(869, 368, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(870, 369, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(871, 370, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(872, 371, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(873, 372, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(874, 373, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(875, 374, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(876, 375, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(877, 376, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(878, 377, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(879, 378, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(880, 379, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(881, 380, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(882, 381, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(883, 382, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(884, 383, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(885, 384, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(886, 385, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(887, 386, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(888, 387, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(889, 388, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(890, 389, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(891, 390, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(892, 391, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(893, 392, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(894, 393, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(895, 394, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(896, 395, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(897, 396, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(898, 397, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(899, 398, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(900, 399, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(901, 400, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(902, 401, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(903, 402, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(904, 403, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(905, 404, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(906, 405, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(907, 406, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(908, 407, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(909, 408, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(910, 409, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(911, 410, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(912, 411, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(913, 412, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(914, 413, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(915, 414, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(916, 415, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(917, 416, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(918, 417, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(919, 418, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(920, 419, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(921, 420, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(922, 421, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(923, 422, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(924, 423, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(925, 424, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(926, 425, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(927, 426, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(928, 427, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(929, 428, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(930, 429, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(931, 430, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(932, 431, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(933, 432, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(934, 433, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(935, 434, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(936, 435, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(937, 436, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(938, 437, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(939, 438, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(940, 439, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(941, 440, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(942, 441, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(943, 442, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(944, 443, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(945, 444, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(946, 445, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(947, 446, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(948, 447, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(949, 448, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(950, 449, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(951, 450, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(952, 451, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(953, 452, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(954, 453, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(955, 454, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(956, 455, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(957, 456, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(958, 457, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(959, 458, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(960, 459, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(961, 460, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(962, 461, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(963, 462, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(964, 463, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(965, 464, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(966, 465, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(967, 466, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(968, 467, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(969, 468, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(970, 469, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(971, 470, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(972, 471, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(973, 472, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(974, 473, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(975, 474, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(976, 475, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(977, 476, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(978, 477, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(979, 478, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(980, 479, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(981, 480, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(982, 481, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(983, 482, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(984, 483, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(985, 484, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(986, 485, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(987, 486, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(988, 487, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(989, 488, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(990, 489, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(991, 490, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(992, 491, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(993, 492, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(994, 493, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(995, 494, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(996, 495, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(997, 496, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(998, 497, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(999, 498, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(1000, 499, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(1001, 500, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:45', '2023-05-01 10:02:45', NULL),
(1002, 501, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:02:46', '2023-05-01 10:02:46', NULL),
(1003, 1, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1004, 2, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1005, 3, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1006, 4, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1007, 5, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1008, 6, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1009, 7, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1010, 8, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1011, 9, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1012, 10, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1013, 11, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1014, 12, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1015, 13, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1016, 14, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1017, 15, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1018, 16, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1019, 17, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1020, 18, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1021, 19, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1022, 20, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1023, 21, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1024, 22, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1025, 23, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1026, 24, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1027, 25, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1028, 26, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1029, 27, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1030, 28, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1031, 29, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1032, 30, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1033, 31, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1034, 32, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1035, 33, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1036, 34, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1037, 35, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1038, 36, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1039, 37, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1040, 38, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1041, 39, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1042, 40, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1043, 41, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1044, 42, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1045, 43, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1046, 44, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1047, 45, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1048, 46, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1049, 47, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1050, 48, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1051, 49, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1052, 50, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1053, 51, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1054, 52, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1055, 53, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1056, 54, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1057, 55, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1058, 56, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1059, 57, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1060, 58, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1061, 59, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1062, 60, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1063, 61, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1064, 62, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1065, 63, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1066, 64, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1067, 65, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1068, 66, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1069, 67, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1070, 68, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1071, 69, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1072, 70, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1073, 71, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1074, 72, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1075, 73, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1076, 74, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1077, 75, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1078, 76, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1079, 77, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1080, 78, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1081, 79, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1082, 80, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1083, 81, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1084, 82, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1085, 83, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1086, 84, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1087, 85, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1088, 86, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1089, 87, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1090, 88, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1091, 89, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1092, 90, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1093, 91, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1094, 92, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1095, 93, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1096, 94, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1097, 95, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1098, 96, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1099, 97, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1100, 98, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1101, 99, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1102, 100, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1103, 101, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1104, 102, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1105, 103, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1106, 104, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1107, 105, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1108, 106, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1109, 107, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1110, 108, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1111, 109, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1112, 110, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1113, 111, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL);
INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `vendor_id`, `title_en`, `desc_ar`, `desc_en`, `message_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1114, 112, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1115, 113, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1116, 114, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1117, 115, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1118, 116, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1119, 117, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1120, 118, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1121, 119, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1122, 120, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1123, 121, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1124, 122, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1125, 123, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1126, 124, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1127, 125, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1128, 126, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1129, 127, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1130, 128, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1131, 129, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1132, 130, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1133, 131, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1134, 132, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1135, 133, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1136, 134, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1137, 135, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1138, 136, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1139, 137, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1140, 138, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1141, 139, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1142, 140, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1143, 141, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1144, 142, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1145, 143, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1146, 144, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1147, 145, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1148, 146, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1149, 147, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1150, 148, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1151, 149, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1152, 150, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1153, 151, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1154, 152, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1155, 153, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1156, 154, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1157, 155, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1158, 156, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1159, 157, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1160, 158, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1161, 159, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1162, 160, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1163, 161, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1164, 162, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1165, 163, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1166, 164, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1167, 165, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1168, 166, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1169, 167, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1170, 168, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1171, 169, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1172, 170, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1173, 171, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1174, 172, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1175, 173, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1176, 174, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1177, 175, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1178, 176, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1179, 177, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1180, 178, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1181, 179, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1182, 180, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1183, 181, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1184, 182, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1185, 183, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1186, 184, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1187, 185, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1188, 186, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1189, 187, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1190, 188, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1191, 189, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1192, 190, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1193, 191, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1194, 192, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1195, 193, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1196, 194, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1197, 195, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1198, 196, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1199, 197, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1200, 198, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1201, 199, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1202, 200, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1203, 201, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1204, 202, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1205, 203, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1206, 204, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1207, 205, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1208, 206, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1209, 207, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1210, 208, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1211, 209, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1212, 210, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1213, 211, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1214, 212, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1215, 213, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1216, 214, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1217, 215, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1218, 216, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1219, 217, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1220, 218, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1221, 219, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1222, 220, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1223, 221, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1224, 222, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1225, 223, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1226, 224, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1227, 225, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1228, 226, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1229, 227, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1230, 228, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1231, 229, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1232, 230, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1233, 231, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1234, 232, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1235, 233, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1236, 234, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1237, 235, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1238, 236, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1239, 237, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1240, 238, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1241, 239, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1242, 240, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1243, 241, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1244, 242, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1245, 243, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1246, 244, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1247, 245, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1248, 246, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1249, 247, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1250, 248, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1251, 249, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1252, 250, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1253, 251, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1254, 252, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1255, 253, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1256, 254, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1257, 255, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1258, 256, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1259, 257, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1260, 258, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1261, 259, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1262, 260, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1263, 261, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1264, 262, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1265, 263, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1266, 264, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1267, 265, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1268, 266, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1269, 267, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1270, 268, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1271, 269, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1272, 270, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1273, 271, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1274, 272, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1275, 273, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1276, 274, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1277, 275, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1278, 276, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1279, 277, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1280, 278, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1281, 279, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1282, 280, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1283, 281, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1284, 282, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1285, 283, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1286, 284, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1287, 285, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1288, 286, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1289, 287, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1290, 288, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1291, 289, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1292, 290, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1293, 291, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1294, 292, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1295, 293, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1296, 294, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1297, 295, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1298, 296, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1299, 297, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1300, 298, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1301, 299, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1302, 300, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1303, 301, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1304, 302, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1305, 303, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1306, 304, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1307, 305, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1308, 306, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1309, 307, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1310, 308, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1311, 309, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1312, 310, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1313, 311, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1314, 312, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1315, 313, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1316, 314, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1317, 315, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1318, 316, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1319, 317, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1320, 318, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1321, 319, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1322, 320, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1323, 321, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1324, 322, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1325, 323, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1326, 324, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1327, 325, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1328, 326, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1329, 327, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1330, 328, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1331, 329, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1332, 330, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:39', '2023-05-01 10:03:39', NULL),
(1333, 331, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1334, 332, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1335, 333, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1336, 334, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1337, 335, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1338, 336, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1339, 337, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1340, 338, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1341, 339, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1342, 340, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1343, 341, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1344, 342, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1345, 343, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1346, 344, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1347, 345, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1348, 346, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1349, 347, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1350, 348, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1351, 349, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1352, 350, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1353, 351, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1354, 352, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1355, 353, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1356, 354, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1357, 355, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1358, 356, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1359, 357, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1360, 358, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1361, 359, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1362, 360, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1363, 361, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1364, 362, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1365, 363, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1366, 364, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1367, 365, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1368, 366, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1369, 367, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1370, 368, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1371, 369, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1372, 370, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1373, 371, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1374, 372, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1375, 373, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1376, 374, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1377, 375, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1378, 376, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1379, 377, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1380, 378, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1381, 379, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1382, 380, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1383, 381, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1384, 382, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1385, 383, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1386, 384, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1387, 385, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1388, 386, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1389, 387, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL);
INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `vendor_id`, `title_en`, `desc_ar`, `desc_en`, `message_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1390, 388, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1391, 389, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1392, 390, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1393, 391, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1394, 392, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1395, 393, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1396, 394, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1397, 395, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1398, 396, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1399, 397, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1400, 398, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1401, 399, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1402, 400, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1403, 401, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1404, 402, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1405, 403, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1406, 404, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1407, 405, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1408, 406, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1409, 407, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1410, 408, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1411, 409, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1412, 410, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1413, 411, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1414, 412, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1415, 413, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1416, 414, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1417, 415, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1418, 416, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1419, 417, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1420, 418, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1421, 419, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1422, 420, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1423, 421, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1424, 422, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1425, 423, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1426, 424, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1427, 425, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1428, 426, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1429, 427, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1430, 428, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1431, 429, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1432, 430, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1433, 431, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1434, 432, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1435, 433, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1436, 434, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1437, 435, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1438, 436, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1439, 437, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1440, 438, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1441, 439, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1442, 440, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1443, 441, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1444, 442, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1445, 443, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1446, 444, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1447, 445, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1448, 446, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1449, 447, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1450, 448, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1451, 449, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1452, 450, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1453, 451, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1454, 452, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1455, 453, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1456, 454, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1457, 455, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1458, 456, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1459, 457, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1460, 458, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1461, 459, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1462, 460, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1463, 461, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1464, 462, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1465, 463, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1466, 464, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1467, 465, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1468, 466, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1469, 467, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1470, 468, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1471, 469, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1472, 470, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1473, 471, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1474, 472, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1475, 473, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1476, 474, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1477, 475, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1478, 476, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1479, 477, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1480, 478, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1481, 479, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1482, 480, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1483, 481, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1484, 482, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1485, 483, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1486, 484, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1487, 485, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1488, 486, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1489, 487, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1490, 488, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1491, 489, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1492, 490, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1493, 491, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1494, 492, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1495, 493, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1496, 494, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1497, 495, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1498, 496, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1499, 497, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1500, 498, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1501, 499, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1502, 500, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1503, 501, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:03:40', '2023-05-01 10:03:40', NULL),
(1504, 1, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1505, 2, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1506, 3, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1507, 4, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1508, 5, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1509, 6, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1510, 7, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1511, 8, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1512, 9, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1513, 10, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1514, 11, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1515, 12, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1516, 13, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1517, 14, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1518, 15, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1519, 16, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1520, 17, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1521, 18, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1522, 19, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1523, 20, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1524, 21, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1525, 22, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1526, 23, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1527, 24, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1528, 25, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1529, 26, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1530, 27, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1531, 28, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1532, 29, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1533, 30, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1534, 31, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1535, 32, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1536, 33, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1537, 34, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1538, 35, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1539, 36, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1540, 37, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1541, 38, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1542, 39, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1543, 40, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1544, 41, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1545, 42, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1546, 43, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1547, 44, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1548, 45, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1549, 46, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1550, 47, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1551, 48, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1552, 49, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1553, 50, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1554, 51, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1555, 52, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1556, 53, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1557, 54, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1558, 55, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1559, 56, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1560, 57, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1561, 58, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1562, 59, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1563, 60, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1564, 61, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1565, 62, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1566, 63, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1567, 64, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1568, 65, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1569, 66, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1570, 67, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1571, 68, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1572, 69, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1573, 70, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1574, 71, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1575, 72, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1576, 73, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1577, 74, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1578, 75, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1579, 76, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1580, 77, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1581, 78, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1582, 79, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1583, 80, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1584, 81, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1585, 82, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1586, 83, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1587, 84, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1588, 85, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1589, 86, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1590, 87, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1591, 88, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1592, 89, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1593, 90, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1594, 91, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1595, 92, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1596, 93, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1597, 94, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1598, 95, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1599, 96, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1600, 97, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1601, 98, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1602, 99, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1603, 100, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1604, 101, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1605, 102, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1606, 103, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1607, 104, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1608, 105, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1609, 106, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1610, 107, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1611, 108, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1612, 109, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1613, 110, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1614, 111, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1615, 112, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1616, 113, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1617, 114, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1618, 115, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1619, 116, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1620, 117, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1621, 118, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1622, 119, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1623, 120, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1624, 121, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1625, 122, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1626, 123, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1627, 124, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1628, 125, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1629, 126, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1630, 127, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1631, 128, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1632, 129, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1633, 130, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1634, 131, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1635, 132, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1636, 133, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1637, 134, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1638, 135, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1639, 136, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1640, 137, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1641, 138, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1642, 139, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1643, 140, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1644, 141, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1645, 142, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1646, 143, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1647, 144, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1648, 145, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1649, 146, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1650, 147, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1651, 148, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1652, 149, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1653, 150, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1654, 151, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1655, 152, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1656, 153, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1657, 154, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1658, 155, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1659, 156, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1660, 157, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1661, 158, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1662, 159, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1663, 160, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1664, 161, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1665, 162, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1666, 163, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL);
INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `vendor_id`, `title_en`, `desc_ar`, `desc_en`, `message_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1667, 164, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1668, 165, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1669, 166, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1670, 167, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1671, 168, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1672, 169, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1673, 170, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1674, 171, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1675, 172, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1676, 173, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1677, 174, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1678, 175, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1679, 176, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1680, 177, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1681, 178, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1682, 179, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1683, 180, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1684, 181, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1685, 182, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1686, 183, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1687, 184, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1688, 185, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1689, 186, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1690, 187, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1691, 188, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1692, 189, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1693, 190, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1694, 191, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1695, 192, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1696, 193, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1697, 194, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1698, 195, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1699, 196, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1700, 197, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1701, 198, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1702, 199, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1703, 200, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1704, 201, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1705, 202, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1706, 203, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1707, 204, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1708, 205, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1709, 206, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1710, 207, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1711, 208, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1712, 209, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1713, 210, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1714, 211, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1715, 212, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1716, 213, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1717, 214, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1718, 215, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1719, 216, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1720, 217, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1721, 218, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1722, 219, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1723, 220, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1724, 221, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1725, 222, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1726, 223, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1727, 224, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1728, 225, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1729, 226, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1730, 227, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1731, 228, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1732, 229, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1733, 230, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1734, 231, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1735, 232, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1736, 233, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1737, 234, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1738, 235, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1739, 236, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1740, 237, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1741, 238, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1742, 239, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1743, 240, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1744, 241, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1745, 242, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1746, 243, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1747, 244, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1748, 245, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1749, 246, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1750, 247, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1751, 248, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1752, 249, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1753, 250, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1754, 251, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1755, 252, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1756, 253, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1757, 254, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1758, 255, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1759, 256, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1760, 257, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1761, 258, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1762, 259, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1763, 260, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1764, 261, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1765, 262, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1766, 263, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1767, 264, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1768, 265, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1769, 266, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1770, 267, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1771, 268, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1772, 269, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1773, 270, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1774, 271, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1775, 272, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1776, 273, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1777, 274, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1778, 275, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1779, 276, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1780, 277, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1781, 278, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1782, 279, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1783, 280, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1784, 281, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1785, 282, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1786, 283, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1787, 284, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1788, 285, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1789, 286, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1790, 287, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1791, 288, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1792, 289, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1793, 290, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1794, 291, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1795, 292, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1796, 293, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1797, 294, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1798, 295, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1799, 296, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1800, 297, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1801, 298, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1802, 299, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1803, 300, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1804, 301, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1805, 302, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1806, 303, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1807, 304, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1808, 305, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1809, 306, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1810, 307, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1811, 308, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1812, 309, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1813, 310, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1814, 311, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1815, 312, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1816, 313, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1817, 314, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1818, 315, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1819, 316, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1820, 317, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1821, 318, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1822, 319, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1823, 320, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1824, 321, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1825, 322, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1826, 323, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1827, 324, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1828, 325, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1829, 326, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1830, 327, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1831, 328, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1832, 329, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1833, 330, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1834, 331, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1835, 332, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1836, 333, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1837, 334, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1838, 335, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1839, 336, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1840, 337, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1841, 338, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1842, 339, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1843, 340, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1844, 341, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1845, 342, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1846, 343, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1847, 344, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1848, 345, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1849, 346, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1850, 347, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1851, 348, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1852, 349, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1853, 350, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1854, 351, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1855, 352, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1856, 353, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1857, 354, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1858, 355, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1859, 356, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1860, 357, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1861, 358, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1862, 359, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1863, 360, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1864, 361, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1865, 362, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1866, 363, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1867, 364, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1868, 365, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1869, 366, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1870, 367, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1871, 368, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1872, 369, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1873, 370, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1874, 371, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1875, 372, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1876, 373, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1877, 374, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1878, 375, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1879, 376, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1880, 377, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1881, 378, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1882, 379, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1883, 380, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1884, 381, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1885, 382, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1886, 383, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1887, 384, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1888, 385, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1889, 386, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1890, 387, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1891, 388, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1892, 389, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1893, 390, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1894, 391, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1895, 392, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1896, 393, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1897, 394, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1898, 395, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1899, 396, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1900, 397, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1901, 398, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1902, 399, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1903, 400, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1904, 401, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1905, 402, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1906, 403, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1907, 404, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1908, 405, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1909, 406, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1910, 407, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1911, 408, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1912, 409, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1913, 410, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1914, 411, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1915, 412, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1916, 413, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1917, 414, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1918, 415, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1919, 416, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1920, 417, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1921, 418, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1922, 419, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1923, 420, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1924, 421, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1925, 422, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1926, 423, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1927, 424, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1928, 425, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1929, 426, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1930, 427, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1931, 428, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1932, 429, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1933, 430, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1934, 431, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1935, 432, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1936, 433, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1937, 434, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1938, 435, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1939, 436, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1940, 437, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1941, 438, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1942, 439, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL);
INSERT INTO `notifications` (`id`, `user_id`, `order_id`, `code_id`, `title_ar`, `vendor_id`, `title_en`, `desc_ar`, `desc_en`, `message_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1943, 440, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1944, 441, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1945, 442, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1946, 443, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1947, 444, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1948, 445, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1949, 446, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1950, 447, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1951, 448, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1952, 449, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1953, 450, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1954, 451, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1955, 452, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1956, 453, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1957, 454, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1958, 455, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1959, 456, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1960, 457, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1961, 458, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1962, 459, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1963, 460, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1964, 461, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1965, 462, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1966, 463, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1967, 464, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1968, 465, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1969, 466, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1970, 467, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1971, 468, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1972, 469, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1973, 470, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1974, 471, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1975, 472, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1976, 473, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1977, 474, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1978, 475, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1979, 476, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1980, 477, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1981, 478, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1982, 479, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1983, 480, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1984, 481, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1985, 482, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1986, 483, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1987, 484, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1988, 485, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1989, 486, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1990, 487, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1991, 488, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1992, 489, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1993, 490, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1994, 491, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1995, 492, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1996, 493, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1997, 494, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1998, 495, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(1999, 496, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(2000, 497, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(2001, 498, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(2002, 499, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(2003, 500, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(2004, 501, NULL, NULL, 'Dicta inventore sequ', NULL, 'Quis culpa cupidita', 'Eaque non natus quia', 'Ut fugit quia quis', NULL, '2023-05-01 10:04:28', '2023-05-01 10:04:28', NULL),
(2005, 508, NULL, NULL, 'لديك رسالة تواصل جديدة', NULL, 'you have new contacts message', 'لديك رسالة تواصل جديدة', 'you have new contacts message', 3, '2023-05-04 09:48:48', '2023-05-04 09:48:48', NULL),
(2006, NULL, NULL, NULL, 'لديك رسالة تواصل جديدة', NULL, 'you have new contacts message', 'لديك رسالة تواصل جديدة', 'you have new contacts message', 5, '2023-05-04 09:49:35', '2023-05-04 09:49:35', NULL),
(2007, 514, NULL, NULL, 'Ratione saepe id ut', NULL, 'Debitis qui est dolo', 'Dolorem voluptatem e', 'Tempora aut maiores', NULL, '2023-05-22 17:54:23', '2023-05-22 17:54:23', NULL),
(2008, NULL, NULL, NULL, 'cv cv cv', 52, 'c cv', 'cv c cv', 'cv cv', NULL, '2023-05-22 19:37:38', '2023-05-22 19:37:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` bigint UNSIGNED NOT NULL,
  `primary_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `region_id` bigint UNSIGNED DEFAULT NULL,
  `rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occasions`
--

INSERT INTO `occasions` (`id`, `primary_image`, `title_ar`, `title_en`, `country_id`, `city_id`, `region_id`, `rate`, `description_ar`, `description_en`, `created_at`, `updated_at`) VALUES
(2, 'Woiw2tps6UKK2AvblpYn2HiYXKS9iYs4rl5Ls4fT.png', 'حفل زفاف', 'wedding', 3, 5, 5, '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-05-07 07:59:06', '2023-05-07 08:28:49'),
(3, 'alUcGx2d9zSPbOoirRGywPvJC0Ib3XIXDIass9qW.png', 'مؤتمرات', 'confrence', 3, 6, 6, '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-05-07 08:00:04', '2023-05-07 08:29:02'),
(4, 'YScEPmYNF6OTpjXSOexzC2pkWoHxD6ZOtD5wVaIa.png', 'خطوبه', 'Engagement2', 3, 6, 6, '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-05-07 08:00:39', '2023-05-07 08:28:13'),
(5, 'T1CU2M3OSFAfXdxnZzpHqnTLyc1KeWwvg2b85SPw.png', 'اعياد ميلاد', 'Birthday', 3, 6, 6, '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-05-07 08:01:08', '2023-05-07 08:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` int NOT NULL DEFAULT '1',
  `city_id` int NOT NULL DEFAULT '1',
  `region_id` int NOT NULL DEFAULT '1',
  `order_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_promo_code_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `customer_promo_code_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `customer_promo_code_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_total_price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_taxes_price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_fees` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_from` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancelled_from` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `country_id`, `city_id`, `region_id`, `order_number`, `customer_name`, `customer_email`, `customer_address`, `customer_phone`, `customer_promo_code_title`, `customer_promo_code_value`, `customer_promo_code_type`, `product_total_price`, `total_taxes_price`, `shipping_fees`, `order_from`, `cancelled_from`, `payment_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'order_1', 'mostafa', 'mostafa@gmail.com', 'xyz', '01121238892', NULL, NULL, NULL, '9780', '0', '0', 'web', NULL, 'visa', 'pending', '2023-05-01 11:58:54', '2023-05-22 17:42:16', NULL),
(2, 1, 1, 1, 'order_2', 'mostafa', 'mostafa@gmail.com', 'xyz', '01121238892', NULL, NULL, NULL, '9780', '0', '0', 'web', NULL, 'visa', 'pending', '2023-05-02 11:58:54', '2023-05-17 12:05:33', NULL),
(3, 1, 1, 1, 'order_3', 'mostafa', 'mostafa@gmail.com', 'xyz', '01121238892', NULL, NULL, NULL, '9780', '0', '0', 'web', NULL, 'visa', 'pending', '2023-05-01 11:58:54', '2023-05-17 12:05:42', NULL),
(4, 1, 1, 1, 'order_4', 'mostafa', 'mostafa@gmail.com', 'xyz', '01121238892', NULL, NULL, NULL, '4680', '0', '0', 'web', NULL, 'visa', 'delivered', '2023-05-02 21:00:00', '2023-05-22 20:05:31', NULL),
(5, 1, 1, 1, 'order_5', 'mostafa', 'mostafa@gmail.com', 'xyz', '01121238892', NULL, NULL, NULL, '10000', '0', '0', 'web', NULL, 'visa', 'delivered', '2023-05-03 21:00:00', '2023-05-22 19:45:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `total` double(8,2) DEFAULT '0.00',
  `price` double(8,2) DEFAULT '0.00',
  `total_taxes` double(8,2) DEFAULT '0.00',
  `quantity` int DEFAULT NULL,
  `product_title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_extra_fees`
--

CREATE TABLE `order_extra_fees` (
  `id` bigint UNSIGNED NOT NULL,
  `cost` double(8,2) DEFAULT '0.00',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `order_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `product_id`, `vendor_id`, `order_number`, `product_title`, `price`, `product_quantity`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'order_1', 'Molestiae nostrum au', '978', '10', 1, '2023-04-27 16:40:48', '2023-04-27 16:40:48'),
(2, 1, 7, 'order_2', 'Molestiae nostrum au', '978', '10', 2, '2023-04-27 16:40:49', '2023-04-27 16:40:49'),
(3, 1, 7, 'order_3', 'Molestiae nostrum au', '978', '10', 3, '2023-04-27 16:40:51', '2023-04-27 16:40:51'),
(4, 2, 7, 'order_4', 'Quis et ad rerum lab', '468', '10', 4, '2023-04-27 16:43:13', '2023-04-27 16:43:13'),
(5, 3, 7, 'order_5', 'Molestiae nostrum au', '10000', '1', 5, '2023-04-27 16:40:48', '2023-04-27 16:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_special_discounts`
--

CREATE TABLE `order_special_discounts` (
  `id` bigint UNSIGNED NOT NULL,
  `cost` double(8,2) DEFAULT '0.00',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_taxes`
--

CREATE TABLE `order_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxe_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxe_percentage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outer_clients`
--

CREATE TABLE `outer_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outer_clients`
--

INSERT INTO `outer_clients` (`id`, `image`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '202305041533Rectangle 304.png', 'mostafa', '01097253062', 'xyzM', '2023-05-04 12:33:05', '2023-05-04 12:33:05'),
(2, '2023052117134AeQVVTQ6B4ibZ17UCnbSKu4zcSq861yrjxMuEzt.jpg', 'Amr Amr', '01025323209', 'fucuzyfo@mailinator.com', '2023-05-21 21:13:02', '2023-05-21 21:13:02'),
(3, '202305221611logo-social.jpg', 'e-RAMO', '01011559674', 'Nasr city', '2023-05-22 20:11:50', '2023-05-22 20:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_guest_price` int DEFAULT NULL,
  `number_of_tables` int DEFAULT NULL,
  `number_of_guests` int DEFAULT NULL,
  `fake_price` double DEFAULT NULL,
  `real_price` double DEFAULT NULL,
  `views` bigint DEFAULT '0',
  `slug_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_ar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `summary_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meal_description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meal_description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lighting_description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lighting_description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sound_description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sound_description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `plan_of_the_day_description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `plan_of_the_day_description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `flowers_description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `flowers_description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `decoration_description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `decoration_description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_id` bigint UNSIGNED DEFAULT NULL,
  `hall_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title_ar`, `title_en`, `extra_guest_price`, `number_of_tables`, `number_of_guests`, `fake_price`, `real_price`, `views`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `meal_description_ar`, `meal_description_en`, `lighting_description_ar`, `lighting_description_en`, `sound_description_ar`, `sound_description_en`, `plan_of_the_day_description_ar`, `plan_of_the_day_description_en`, `flowers_description_ar`, `flowers_description_en`, `decoration_description_ar`, `decoration_description_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `image`, `status`, `admin_id`, `vendor_id`, `hall_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aliquip at qui id au', 'Elit a delectus qu', 141, 282, 848, 586, 64, 0, 'aliquip-at-qui-id-au', 'elit-a-delectus-qu', 'Eu nulla consequaturxc', 'Nostrud aut et ea ex', 'Eum adipisicing sapi', 'Consectetur aut lore', 'Perferendis repellen', 'Aut consectetur est', 'Odit repudiandae vel', 'Fugiat aliquid volup', 'Quam deserunt aliqua', 'Doloribus sunt excep', 'Qui sint impedit n', 'Deserunt veritatis q', 'Ad consequat Maiore', 'Laborum Similique c', 'Ut sunt nulla qui la', 'Error nulla cupidita', 'Et irure aliquam in', 'Tempore alias id am', '5y5bCJt8nx3GF1tm2qMwiKWBEHOXsDFobgjUHc4d.jpg', '1', 52, 6, 1, 3, '2023-04-27 16:16:30', '2023-04-27 16:16:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_option`
--

CREATE TABLE `package_option` (
  `id` bigint UNSIGNED NOT NULL,
  `price` double DEFAULT NULL,
  `package_id` bigint UNSIGNED DEFAULT NULL,
  `option_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_option`
--

INSERT INTO `package_option` (`id`, `price`, `package_id`, `option_id`) VALUES
(1, 835, 1, 1),
(2, 696, 1, 2),
(3, 423, 1, 3),
(4, 73, 1, 6),
(5, 697, 1, 4),
(6, 17, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `package_options`
--

CREATE TABLE `package_options` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `limitation` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_options`
--

INSERT INTO `package_options` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `image`, `status`, `admin_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `quantity`, `price`, `limitation`) VALUES
(1, 'كراسي طويله', 'Long chairs', 'كراسي-طويله', 'long-chairs', NULL, '1', NULL, 2, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL, 5, 100, 0),
(2, 'كراسي قصيره', 'Short chairs', 'كراسي-قصيره', 'short-chairs', NULL, '1', NULL, 2, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL, 1, 100, 0),
(3, 'كراسي فاخره', 'Luxurious chairs', 'كراسي-فاخره', 'luxurious-chairs', NULL, '1', NULL, 2, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL, 1, 100, 0),
(4, 'طاولات كبيره', 'Big tables', 'طاولات-كبيره', 'big-tables', NULL, '1', NULL, 4, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL, 5, 100, 0),
(5, 'طاولات فاخره', 'Luxurious tables', 'طاولات-فاخره', 'luxurious-tables', NULL, '1', NULL, 4, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL, 1, 100, 0),
(6, 'بوكيه ورد', 'Bouquet', 'بوكيه-ورد', 'bouquet', NULL, '1', NULL, 3, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL, 2, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `package_option_categories`
--

CREATE TABLE `package_option_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_option_categories`
--

INSERT INTO `package_option_categories` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `image`, `status`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'زهور', 'flowers', 'زهور', 'flowers', NULL, '1', NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL),
(2, 'كراسي', 'Chairs', 'كراسي', 'chairs', NULL, '1', NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL),
(3, 'زينة', 'decoration', 'زينة', 'decoration', NULL, '1', NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL),
(4, 'طاولات', 'tables', 'طاولات', 'tables', NULL, '1', NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL),
(5, 'حلوي', 'Dessert', 'حلوي', 'dessert', NULL, '1', NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL),
(6, 'كوافير', 'Hairdresser', 'كوافير', 'hairdresser', NULL, '1', NULL, '2023-04-27 14:06:01', '2023-04-27 14:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_tax`
--

CREATE TABLE `package_tax` (
  `id` bigint UNSIGNED NOT NULL,
  `tax_id` bigint UNSIGNED DEFAULT NULL,
  `package_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(2, 'users-read', 'Read Users', 'Read Users', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(3, 'users-update', 'Update Users', 'Update Users', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(5, 'system-admins-create', 'Create System-admins', 'Create System-admins', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(6, 'system-admins-read', 'Read System-admins', 'Read System-admins', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(7, 'system-admins-update', 'Update System-admins', 'Update System-admins', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(8, 'system-admins-delete', 'Delete System-admins', 'Delete System-admins', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(9, 'vendor-admins-create', 'Create Vendor-admins', 'Create Vendor-admins', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(10, 'vendor-admins-read', 'Read Vendor-admins', 'Read Vendor-admins', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(11, 'vendor-admins-update', 'Update Vendor-admins', 'Update Vendor-admins', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(12, 'vendor-admins-delete', 'Delete Vendor-admins', 'Delete Vendor-admins', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(13, 'admin-categories-create', 'Create Admin-categories', 'Create Admin-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(14, 'admin-categories-read', 'Read Admin-categories', 'Read Admin-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(15, 'admin-categories-update', 'Update Admin-categories', 'Update Admin-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(16, 'admin-categories-delete', 'Delete Admin-categories', 'Delete Admin-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(17, 'vendors-create', 'Create Vendors', 'Create Vendors', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(18, 'vendors-read', 'Read Vendors', 'Read Vendors', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(19, 'vendors-update', 'Update Vendors', 'Update Vendors', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(20, 'vendors-delete', 'Delete Vendors', 'Delete Vendors', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(21, 'halls-create', 'Create Halls', 'Create Halls', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(22, 'halls-read', 'Read Halls', 'Read Halls', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(23, 'halls-update', 'Update Halls', 'Update Halls', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(24, 'halls-delete', 'Delete Halls', 'Delete Halls', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(25, 'halls-categories-create', 'Create Halls-categories', 'Create Halls-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(26, 'halls-categories-read', 'Read Halls-categories', 'Read Halls-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(27, 'halls-categories-update', 'Update Halls-categories', 'Update Halls-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(28, 'halls-categories-delete', 'Delete Halls-categories', 'Delete Halls-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(29, 'packages-create', 'Create Packages', 'Create Packages', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(30, 'packages-read', 'Read Packages', 'Read Packages', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(31, 'packages-update', 'Update Packages', 'Update Packages', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(32, 'packages-delete', 'Delete Packages', 'Delete Packages', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(33, 'packages-options-categories-create', 'Create Packages-options-categories', 'Create Packages-options-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(34, 'packages-options-categories-read', 'Read Packages-options-categories', 'Read Packages-options-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(35, 'packages-options-categories-update', 'Update Packages-options-categories', 'Update Packages-options-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(36, 'packages-options-categories-delete', 'Delete Packages-options-categories', 'Delete Packages-options-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(37, 'packages-options-create', 'Create Packages-options', 'Create Packages-options', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(38, 'packages-options-read', 'Read Packages-options', 'Read Packages-options', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(39, 'packages-options-update', 'Update Packages-options', 'Update Packages-options', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(40, 'packages-options-delete', 'Delete Packages-options', 'Delete Packages-options', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(41, 'packages-available-dates-and-times-create', 'Create Packages-available-dates-and-times', 'Create Packages-available-dates-and-times', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(42, 'packages-available-dates-and-times-read', 'Read Packages-available-dates-and-times', 'Read Packages-available-dates-and-times', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(43, 'packages-available-dates-and-times-update', 'Update Packages-available-dates-and-times', 'Update Packages-available-dates-and-times', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(44, 'packages-available-dates-and-times-delete', 'Delete Packages-available-dates-and-times', 'Delete Packages-available-dates-and-times', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(45, 'bookings-create', 'Create Bookings', 'Create Bookings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(46, 'bookings-read', 'Read Bookings', 'Read Bookings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(47, 'bookings-update', 'Update Bookings', 'Update Bookings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(48, 'bookings-delete', 'Delete Bookings', 'Delete Bookings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(49, 'products-categories-create', 'Create Products-categories', 'Create Products-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(50, 'products-categories-read', 'Read Products-categories', 'Read Products-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(51, 'products-categories-update', 'Update Products-categories', 'Update Products-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(52, 'products-categories-delete', 'Delete Products-categories', 'Delete Products-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(53, 'products-create', 'Create Products', 'Create Products', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(54, 'products-read', 'Read Products', 'Read Products', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(55, 'products-update', 'Update Products', 'Update Products', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(56, 'products-delete', 'Delete Products', 'Delete Products', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(57, 'products-reviews-create', 'Create Products-reviews', 'Create Products-reviews', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(58, 'products-reviews-read', 'Read Products-reviews', 'Read Products-reviews', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(59, 'products-reviews-update', 'Update Products-reviews', 'Update Products-reviews', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(60, 'products-reviews-delete', 'Delete Products-reviews', 'Delete Products-reviews', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(61, 'orders-create', 'Create Orders', 'Create Orders', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(62, 'orders-read', 'Read Orders', 'Read Orders', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(63, 'orders-update', 'Update Orders', 'Update Orders', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(64, 'orders-delete', 'Delete Orders', 'Delete Orders', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(65, 'taxes-create', 'Create Taxes', 'Create Taxes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(66, 'taxes-read', 'Read Taxes', 'Read Taxes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(67, 'taxes-update', 'Update Taxes', 'Update Taxes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(68, 'taxes-delete', 'Delete Taxes', 'Delete Taxes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(69, 'promo-codes-create', 'Create Promo-codes', 'Create Promo-codes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(70, 'promo-codes-read', 'Read Promo-codes', 'Read Promo-codes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(71, 'promo-codes-update', 'Update Promo-codes', 'Update Promo-codes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(72, 'promo-codes-delete', 'Delete Promo-codes', 'Delete Promo-codes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(73, 'shippings-create', 'Create Shippings', 'Create Shippings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(74, 'shippings-read', 'Read Shippings', 'Read Shippings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(75, 'shippings-update', 'Update Shippings', 'Update Shippings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(76, 'shippings-delete', 'Delete Shippings', 'Delete Shippings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(77, 'ads-categories-create', 'Create Ads-categories', 'Create Ads-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(78, 'ads-categories-read', 'Read Ads-categories', 'Read Ads-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(79, 'ads-categories-update', 'Update Ads-categories', 'Update Ads-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(80, 'ads-categories-delete', 'Delete Ads-categories', 'Delete Ads-categories', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(81, 'ads-create', 'Create Ads', 'Create Ads', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(82, 'ads-read', 'Read Ads', 'Read Ads', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(83, 'ads-update', 'Update Ads', 'Update Ads', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(84, 'ads-delete', 'Delete Ads', 'Delete Ads', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(85, 'home-slider-create', 'Create Home-slider', 'Create Home-slider', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(86, 'home-slider-read', 'Read Home-slider', 'Read Home-slider', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(87, 'home-slider-update', 'Update Home-slider', 'Update Home-slider', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(88, 'home-slider-delete', 'Delete Home-slider', 'Delete Home-slider', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(89, 'countries-create', 'Create Countries', 'Create Countries', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(90, 'countries-read', 'Read Countries', 'Read Countries', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(91, 'countries-update', 'Update Countries', 'Update Countries', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(92, 'countries-delete', 'Delete Countries', 'Delete Countries', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(93, 'cities-create', 'Create Cities', 'Create Cities', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(94, 'cities-read', 'Read Cities', 'Read Cities', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(95, 'cities-update', 'Update Cities', 'Update Cities', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(96, 'cities-delete', 'Delete Cities', 'Delete Cities', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(97, 'regions-create', 'Create Regions', 'Create Regions', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(98, 'regions-read', 'Read Regions', 'Read Regions', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(99, 'regions-update', 'Update Regions', 'Update Regions', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(100, 'regions-delete', 'Delete Regions', 'Delete Regions', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(101, 'contacts-create', 'Create Contacts', 'Create Contacts', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(102, 'contacts-read', 'Read Contacts', 'Read Contacts', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(103, 'contacts-update', 'Update Contacts', 'Update Contacts', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(104, 'contacts-delete', 'Delete Contacts', 'Delete Contacts', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(105, 'pages-create', 'Create Pages', 'Create Pages', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(106, 'pages-read', 'Read Pages', 'Read Pages', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(107, 'pages-update', 'Update Pages', 'Update Pages', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(108, 'pages-delete', 'Delete Pages', 'Delete Pages', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(109, 'settings-create', 'Create Settings', 'Create Settings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(110, 'settings-read', 'Read Settings', 'Read Settings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(111, 'settings-update', 'Update Settings', 'Update Settings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(112, 'settings-delete', 'Delete Settings', 'Delete Settings', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(113, 'reports-create', 'Create Reports', 'Create Reports', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(114, 'reports-read', 'Read Reports', 'Read Reports', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(115, 'reports-update', 'Update Reports', 'Update Reports', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(116, 'reports-delete', 'Delete Reports', 'Delete Reports', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(117, 'notifications-create', 'Create Notifications', 'Create Notifications', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(118, 'notifications-read', 'Read Notifications', 'Read Notifications', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(119, 'notifications-update', 'Update Notifications', 'Update Notifications', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(120, 'notifications-delete', 'Delete Notifications', 'Delete Notifications', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(121, 'area-read', 'Read Area', 'Read Area', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(122, 'colors-create', 'Create Colors', 'Create Colors', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(123, 'colors-read', 'Read Colors', 'Read Colors', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(124, 'colors-update', 'Update Colors', 'Update Colors', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(125, 'colors-delete', 'Delete Colors', 'Delete Colors', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(126, 'sizes-create', 'Create Sizes', 'Create Sizes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(127, 'sizes-read', 'Read Sizes', 'Read Sizes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(128, 'sizes-update', 'Update Sizes', 'Update Sizes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(129, 'sizes-delete', 'Delete Sizes', 'Delete Sizes', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(130, 'shipping-create', 'Create Shipping', 'Create Shipping', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(131, 'shipping-read', 'Read Shipping', 'Read Shipping', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(132, 'shipping-update', 'Update Shipping', 'Update Shipping', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(133, 'shipping-delete', 'Delete Shipping', 'Delete Shipping', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(134, 'digital_cart-create', 'Create Digital_cart', 'Create Digital_cart', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(135, 'digital_cart-read', 'Read Digital_cart', 'Read Digital_cart', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(136, 'digital_cart-update', 'Update Digital_cart', 'Update Digital_cart', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(137, 'digital_cart-delete', 'Delete Digital_cart', 'Delete Digital_cart', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(138, 'become_vendor-create', 'Create Become_vendor', 'Create Become_vendor', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(139, 'become_vendor-read', 'Read Become_vendor', 'Read Become_vendor', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(140, 'become_vendor-update', 'Update Become_vendor', 'Update Become_vendor', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(141, 'become_vendor-delete', 'Delete Become_vendor', 'Delete Become_vendor', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(142, 'hall_request-create', 'Create Hall_request', 'Create Hall_request', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(143, 'hall_request-read', 'Read Hall_request', 'Read Hall_request', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(144, 'hall_request-update', 'Update Hall_request', 'Update Hall_request', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(145, 'hall_request-delete', 'Delete Hall_request', 'Delete Hall_request', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(146, 'product_request-create', 'Create Product_request', 'Create Product_request', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(147, 'product_request-read', 'Read Product_request', 'Read Product_request', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(148, 'product_request-update', 'Update Product_request', 'Update Product_request', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(149, 'product_request-delete', 'Delete Product_request', 'Delete Product_request', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(150, 'occasion-create', 'Create Occasion', 'Create Occasion', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(151, 'occasion-read', 'Read Occasion', 'Read Occasion', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(152, 'occasion-update', 'Update Occasion', 'Update Occasion', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(153, 'occasion-delete', 'Delete Occasion', 'Delete Occasion', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(154, 'with-darw-create', 'Create With-darw', 'Create With-darw', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(155, 'with-darw-read', 'Read With-darw', 'Read With-darw', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(156, 'with-darw-update', 'Update With-darw', 'Update With-darw', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(157, 'with-darw-delete', 'Delete With-darw', 'Delete With-darw', '2023-05-05 15:20:16', '2023-05-05 15:20:16'),
(158, 'my-advertisements-read', 'Read My-advertisements', 'Read My-advertisements', '2023-05-05 15:20:16', '2023-05-05 15:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
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
  `permission_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(9, 52, 'App\\Models\\Admin'),
(9, 54, 'App\\Models\\Admin'),
(10, 52, 'App\\Models\\Admin'),
(10, 54, 'App\\Models\\Admin'),
(11, 52, 'App\\Models\\Admin'),
(11, 54, 'App\\Models\\Admin'),
(12, 52, 'App\\Models\\Admin'),
(12, 54, 'App\\Models\\Admin'),
(21, 52, 'App\\Models\\Admin'),
(21, 53, 'App\\Models\\Admin'),
(22, 52, 'App\\Models\\Admin'),
(22, 53, 'App\\Models\\Admin'),
(23, 52, 'App\\Models\\Admin'),
(23, 53, 'App\\Models\\Admin'),
(24, 52, 'App\\Models\\Admin'),
(24, 53, 'App\\Models\\Admin'),
(25, 52, 'App\\Models\\Admin'),
(26, 52, 'App\\Models\\Admin'),
(27, 52, 'App\\Models\\Admin'),
(28, 52, 'App\\Models\\Admin'),
(29, 52, 'App\\Models\\Admin'),
(30, 52, 'App\\Models\\Admin'),
(31, 52, 'App\\Models\\Admin'),
(32, 52, 'App\\Models\\Admin'),
(33, 52, 'App\\Models\\Admin'),
(34, 52, 'App\\Models\\Admin'),
(35, 52, 'App\\Models\\Admin'),
(36, 52, 'App\\Models\\Admin'),
(37, 52, 'App\\Models\\Admin'),
(38, 52, 'App\\Models\\Admin'),
(39, 52, 'App\\Models\\Admin'),
(40, 52, 'App\\Models\\Admin'),
(41, 52, 'App\\Models\\Admin'),
(42, 52, 'App\\Models\\Admin'),
(43, 52, 'App\\Models\\Admin'),
(44, 52, 'App\\Models\\Admin'),
(45, 52, 'App\\Models\\Admin'),
(46, 52, 'App\\Models\\Admin'),
(47, 52, 'App\\Models\\Admin'),
(48, 52, 'App\\Models\\Admin'),
(49, 52, 'App\\Models\\Admin'),
(50, 52, 'App\\Models\\Admin'),
(51, 52, 'App\\Models\\Admin'),
(52, 52, 'App\\Models\\Admin'),
(53, 52, 'App\\Models\\Admin'),
(53, 54, 'App\\Models\\Admin'),
(54, 52, 'App\\Models\\Admin'),
(54, 54, 'App\\Models\\Admin'),
(55, 52, 'App\\Models\\Admin'),
(55, 54, 'App\\Models\\Admin'),
(56, 52, 'App\\Models\\Admin'),
(56, 54, 'App\\Models\\Admin'),
(62, 52, 'App\\Models\\Admin'),
(62, 54, 'App\\Models\\Admin'),
(63, 52, 'App\\Models\\Admin'),
(63, 54, 'App\\Models\\Admin'),
(64, 52, 'App\\Models\\Admin'),
(64, 54, 'App\\Models\\Admin'),
(65, 52, 'App\\Models\\Admin'),
(66, 52, 'App\\Models\\Admin'),
(67, 52, 'App\\Models\\Admin'),
(68, 52, 'App\\Models\\Admin'),
(73, 52, 'App\\Models\\Admin'),
(74, 52, 'App\\Models\\Admin'),
(75, 52, 'App\\Models\\Admin'),
(76, 52, 'App\\Models\\Admin'),
(93, 52, 'App\\Models\\Admin'),
(94, 52, 'App\\Models\\Admin'),
(95, 52, 'App\\Models\\Admin'),
(96, 52, 'App\\Models\\Admin'),
(114, 52, 'App\\Models\\Admin'),
(155, 52, 'App\\Models\\Admin'),
(155, 53, 'App\\Models\\Admin'),
(155, 54, 'App\\Models\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 501, 'MyAuthApp', 'e139d6aa1f752f292e1232da810f9d032d1af7a7d91b2a6786eeb589e8c27f27', '[\"*\"]', '2023-04-27 16:43:12', NULL, '2023-04-27 16:37:53', '2023-04-27 16:43:12'),
(2, 'App\\Models\\User', 503, 'access_token', '85169d9715827e18d14b77d0935177530a574db39d7e71b10629df488e9ffb28', '[\"*\"]', '2023-05-03 09:54:39', NULL, '2023-05-03 09:49:41', '2023-05-03 09:54:39'),
(3, 'App\\Models\\User', 508, 'access_token', '0276a7ee45c91310854d9be28cfaeead9cdff1e74db395a3dec0b434daceddc0', '[\"*\"]', '2023-05-04 09:48:48', NULL, '2023-05-04 09:41:41', '2023-05-04 09:48:48'),
(4, 'App\\Models\\User', 508, 'access_token', '18762d1ef2bcf233c7dcb283385038db525658a6e7839557ccd8dd717f13d422', '[\"*\"]', NULL, NULL, '2023-05-04 12:28:50', '2023-05-04 12:28:50'),
(5, 'App\\Models\\User', 508, 'access_token', '310a9dda442a06f0febe457025fc26c9de21d7d94f41463e88dab32874cf96d4', '[\"*\"]', NULL, NULL, '2023-05-04 12:50:56', '2023-05-04 12:50:56'),
(6, 'App\\Models\\User', 508, 'access_token', '14b60e1bce296c2851e1a8a8735aae14c6b8ca26f5544c816a02510c924793dc', '[\"*\"]', NULL, NULL, '2023-05-04 12:59:24', '2023-05-04 12:59:24'),
(7, 'App\\Models\\User', 508, 'access_token', '1b8ba360698fb1f4336857fcf86f363774f34490ea5cd5b4b4e0ecc1cdde42c4', '[\"*\"]', NULL, NULL, '2023-05-04 13:09:22', '2023-05-04 13:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `primary_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `features_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `features_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `instructions_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `instructions_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `summary_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `summary_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `extras_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `extras_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fake_price` double(8,2) DEFAULT NULL,
  `real_price` double(8,2) DEFAULT NULL,
  `purchase_price` double(8,2) DEFAULT NULL,
  `stock` bigint DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `in_stock` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `accept` enum('rejected','accepted','new') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `primary_image`, `details_ar`, `details_en`, `features_ar`, `features_en`, `instructions_ar`, `instructions_en`, `summary_ar`, `summary_en`, `extras_ar`, `extras_en`, `fake_price`, `real_price`, `purchase_price`, `stock`, `status`, `in_stock`, `admin_id`, `category_id`, `accept`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Eum rerum voluptate', 'Molestiae nostrum au', 'eum-rerum-voluptate', 'molestiae-nostrum-au', 'Officia voluptatem', 'Id quae laudantium', 'Modi et iure et saep', 'Ratione dolorum lore', 'SzwmTVW6zEwy29pOMDlJM3aPMuulZAncZOBzzna6.jpg', '<p>dvvsdf</p>', '<p>fggf</p>', 'Cupiditate deserunt', 'Earum consequatur ma', 'Obcaecati reprehende', 'Temporibus dignissim', 'Ut optio in sint ut', 'Dolor reprehenderit', 'Veritatis minus quas', 'Error similique volu', 500.00, 1000.00, 917.00, -21, '1', '1', 52, 2, 'accepted', '2023-04-27 16:40:01', '2023-05-22 19:45:48', NULL),
(2, 'Quis debitis cupidit', 'Quis et ad rerum lab', 'quis-debitis-cupidit', 'quis-et-ad-rerum-lab', 'Occaecat itaque ut s', 'Qui cillum perspicia', 'Et laborum nulla vol', 'At exercitationem ev', 'cD2yJWHbxdTKAQZaLQX32kp5rTfCZSw5ynyR9Pmt.jpg', '<p>vdvdvs</p>', '<p>vfvf</p>', 'Sint similique culp', 'Voluptatem alias la', 'Quia ut hic ad tempo', 'Exercitationem deser', 'Nulla voluptatem vol', 'Assumenda error cumq', 'Autem fugit unde te', 'Amet eum provident', 816.00, 468.00, 122.00, -26, '0', '1', 52, 2, 'new', '2023-04-27 16:42:50', '2023-05-22 20:05:31', NULL),
(3, 'المنتج 2', 'product 2', 'المنتج-2', 'product-2', 'Exercitationem ullam', 'Libero dignissimos a', 'Ut qui temporibus co', 'Sapiente cum molliti', 'tEpBriTx0hLAMNYBIMqwur7kaoCmRHKuVQyKX3KW.jpg', '<p>dfsfffdfsfd</p>', '<p>dfsfffdfsfd</p>', 'Impedit nemo ut ear', 'Quidem accusantium o', 'Rerum deserunt volup', 'Pariatur In aperiam', 'Facere quisquam saep', 'Sed adipisicing dolo', 'Ut eveniet quam err', 'Facere molestiae qua', 730.00, 684.00, 656.00, 72, '1', '1', 52, 2, 'accepted', '2023-05-08 07:39:59', '2023-05-22 20:02:56', NULL),
(4, 'عربي عربي', 'english english', 'عربي-عربي', 'english-english', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dgfdfg', '/tmp/phpX5KnMA', '<p>fdgdfgdfg</p>', '<p>dgdgd</p>', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dfgdgf', 'dgfdfg', 'dgdfg', 'dfgdfg', 1500.00, 1000.00, 1000.00, 100, '1', '1', 1, 18, 'new', '2023-05-22 20:01:42', '2023-05-22 20:01:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `image`, `status`, `admin_id`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dolorem iusto impedi', 'Dolor cumque quisqua', 'dolorem-iusto-impedi', 'dolor-cumque-quisqua', 'Qui sapiente quia qu', 'Autem ea lorem et co', 'Aut earum qui atque', 'Ut adipisicing vero', 'C:\\xampp\\tmp\\phpBA5F.tmp', '1', 1, NULL, '2023-04-27 16:38:48', '2023-05-10 08:03:08', '2023-05-10 08:03:08'),
(2, 'شوكالاته', 'Chocalate', 'شوكالاته', 'chocalate', 'Ad ab at aute ducimu', 'Ut voluptatem Vel p', 'Et quis cupiditate p', 'Culpa officia beata', 'C:\\xampp\\tmp\\phpE902.tmp', '1', 1, 1, '2023-04-27 16:39:00', '2023-05-08 07:09:06', NULL),
(3, 'شوكلاته اخرى', 'Chocalate 2', 'شوكلاته-اخرى', 'chocalate-2', 'dfsfffdfsfd', 'dfsfffdfsfd', 'dfsfffdfsfd', 'dfsfffdfsfd', '1683535002.jpg', '1', 1, 1, '2023-05-08 07:36:42', '2023-05-08 07:36:42', NULL),
(4, 'القسم الاول', 'category 1', 'القسم-الاول', 'category-1', 'updated', 'updated', 'updated', 'updated', '1683706034.jpg', '1', 1, NULL, '2023-05-10 07:07:14', '2023-05-10 07:07:14', NULL),
(5, 'القسم 1 يمين', 'right category 1', 'القسم-1-يمين', 'right-category-1', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(6, 'القسم 3 يمين', 'right category 3', 'القسم-3-يمين', 'right-category-3', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(7, 'القسم 2 يمين', 'right category 2', 'القسم-2-يمين', 'right-category-2', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(8, 'القسم 4 يمين', 'right category 4', 'القسم-4-يمين', 'right-category-4', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(9, 'القسم 5 يمين', 'right category 5', 'القسم-5-يمين', 'right-category-5', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(10, 'القسم 6 يمين', 'right category 6', 'القسم-6-يمين', 'right-category-6', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(11, 'القسم 1 شمال', 'left category 1', 'القسم-1-شمال', 'left-category-1', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(12, 'القسم 2 شمال', 'left category 2', 'القسم-2-شمال', 'left-category-2', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(13, 'القسم 3 شمال', 'left category 3', 'القسم-3-شمال', 'left-category-3', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(14, 'القسم 4 شمال', 'left category 4', 'القسم-4-شمال', 'left-category-4', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(15, 'القسم 5 شمال', 'left category 5', 'القسم-5-شمال', 'left-category-5', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(16, 'القسم 6 شمال', 'left category 6', 'القسم-6-شمال', 'left-category-6', 'main_category', 'main_category', 'main_category', 'main_category', '1683709363.jpg', '1', 1, NULL, '2023-05-10 08:02:43', '2023-05-10 08:02:43', NULL),
(17, 'Reprehenderit quasi', 'Ea velit cumque aut', 'reprehenderit-quasi', 'ea-velit-cumque-aut', 'Aliquam quam id ad c', 'Quas temporibus quos', 'Optio rerum at exce', 'Aliqua Voluptas vol', '1683717274.jpg', '0', 1, NULL, '2023-05-10 10:14:34', '2023-05-10 10:14:34', NULL),
(18, 'عربي عربي', 'engluish', 'عربي-عربي', 'engluish', 'عربيعربي', 'english english english', 'عربيعربي', 'english english english', '1684760259.jpg', '1', 1, 4, '2023-05-22 19:57:39', '2023-05-22 19:57:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `color_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_occasions`
--

CREATE TABLE `product_occasions` (
  `id` bigint UNSIGNED NOT NULL,
  `occasion_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_occasions`
--

INSERT INTO `product_occasions` (`id`, `occasion_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_products_with`
--

CREATE TABLE `product_products_with` (
  `id` bigint UNSIGNED NOT NULL,
  `product_with_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rating` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_taxes`
--

CREATE TABLE `product_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `tax_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_taxes`
--

INSERT INTO `product_taxes` (`id`, `tax_id`, `product_id`) VALUES
(2, 1, 2),
(4, 2, 2),
(5, 2, 3),
(6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` date NOT NULL,
  `value` double(8,2) NOT NULL,
  `maximum_times_of_use` int NOT NULL DEFAULT '100',
  `count_of_use` int NOT NULL DEFAULT '0',
  `dedicated_to` enum('all_users','females','males','spacial_user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'all_users',
  `type` enum('percent','amount') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'amount',
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `code` int DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `title_ar`, `title_en`, `status`, `code`, `country_id`, `city_id`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'التجمع الخامس', '5th Settlement', '1', NULL, 1, 1, NULL, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(2, 'مدينه نصر', 'Nasr City', '1', NULL, 1, 1, NULL, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(3, 'العالمين', 'Alameen', '1', NULL, 1, 2, NULL, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(4, 'العجمي', 'Agami', '1', NULL, 1, 2, NULL, '2023-04-27 14:06:00', '2023-04-27 14:06:00', NULL),
(5, 'تيست 1', 'test 1', '1', NULL, 3, 5, NULL, NULL, NULL, NULL),
(6, 'تيست 2', 'test 2', '1', NULL, 3, 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super-admin', 'Super-admin', '2023-04-27 14:06:01', '2023-04-27 14:06:01'),
(2, 'admin', 'Admin', 'Admin', '2023-04-27 14:06:03', '2023-04-27 14:06:03'),
(3, 'vendor-admin', 'Vendor-admin', 'Vendor-admin', '2023-04-27 14:06:03', '2023-04-27 14:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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
(3, 54, 'App\\Models\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `cost` double(8,2) NOT NULL,
  `text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `cost`, `text_ar`, `text_en`, `status`, `city_id`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 100.00, 'التوصيل الاول', 'first shipping', '1', 5, 1, '2023-05-09 08:41:47', '2023-05-09 08:41:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_by_brands`
--

CREATE TABLE `shop_by_brands` (
  `id` bigint UNSIGNED NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_by_brands`
--

INSERT INTO `shop_by_brands` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'Life is filled with occasions and Floward has them covered', 'Life is filled with occasions and Floward has them covered', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `shop_by_occasions`
--

CREATE TABLE `shop_by_occasions` (
  `id` bigint UNSIGNED NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_by_occasions`
--

INSERT INTO `shop_by_occasions` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'Life is filled with occasions and Floward has them covered', 'Life is filled with occasions and Floward has them covered', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `percentage` double(8,2) NOT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `title_ar`, `title_en`, `status`, `percentage`, `admin_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ضريبة القيمه المضافة', 'added value', '1', 10.00, 1, '2023-05-01 10:22:00', '2023-05-09 09:56:43', NULL),
(2, 'Quia eaque eum velit', 'Architecto in irure', '1', 50.00, 1, '2023-05-09 10:45:52', '2023-05-09 10:45:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint UNSIGNED NOT NULL,
  `text_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `text_en`, `text_ar`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `top_footers`
--

CREATE TABLE `top_footers` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apple_store_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_play_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `top_footers`
--

INSERT INTO `top_footers` (`id`, `image`, `big_text_en`, `big_text_ar`, `small_text_en`, `small_text_ar`, `apple_store_link`, `google_play_link`, `created_at`, `updated_at`) VALUES
(1, 'footer.png', 'Discover EVENTS NEW APP', 'Discover EVENTS NEW APP', 'Download Android And IPhone Applications Via The Links.', 'Download Android And IPhone Applications Via The Links.', 'https://www.youtube.com/watch?v=-SMiRILKZuc', 'https://www.youtube.com/watch?v=-SMiRILKZuc', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `top_navbars`
--

CREATE TABLE `top_navbars` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `top_navbars`
--

INSERT INTO `top_navbars` (`id`, `title_ar`, `title_en`, `created_at`, `updated_at`) VALUES
(1, '30٪ خصم على جميع المنتجات أدخل الرمز: joolie2020', '30% off on all products enter code: joolie2020', '2023-05-04 12:47:37', '2023-05-04 12:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `fcm-token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `receive_email` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `google_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_from` enum('web','android','ios','mobile') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` enum('en','ar') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `verified_status` tinyint NOT NULL DEFAULT '0',
  `fname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` bigint DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image`, `birth_date`, `fcm-token`, `email_verified_at`, `gender`, `status`, `receive_email`, `google_id`, `facebook_id`, `apple_id`, `sign_from`, `password`, `country_id`, `city_id`, `remember_token`, `lang`, `verified_status`, `fname`, `lname`, `region_id`, `address`, `lat`, `lng`, `created_at`, `updated_at`, `deleted_at`) VALUES
(514, 'mostafa gamal', 'mostafagamalsaid475@gmail.com', '01121238817', '202305081500photo-1535713875002-d1d0cf377fde.jpg', '2023-05-01', NULL, NULL, 'male', '1', '0', NULL, NULL, NULL, 'web', '$2y$10$TrQ1B7AbFdl.3hTaBwnHnOW8kZHOnsr9CAgufLTE4faHehuD/1zAG', 3, 5, NULL, 'ar', 0, 'mostafa', 'gamal', 6, '60 naggeb mawad 1', '123', '123', '2023-05-08 12:00:05', '2023-05-08 12:00:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_favorite_products`
--

CREATE TABLE `user_favorite_products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_ar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `summary_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `can_add_products` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `can_add_halls` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `commission` double(8,2) NOT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `halls_count` int DEFAULT NULL,
  `products_count` int DEFAULT NULL,
  `type` enum('product','hall','product_hall') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` enum('individual','company') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tax_Number` int DEFAULT NULL,
  `commercial_registration_number` int DEFAULT NULL,
  `Tax_Number_expiration_date` date DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `region_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_admin` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `email`, `phone`, `title_ar`, `title_en`, `slug_ar`, `slug_en`, `summary_ar`, `summary_en`, `description_ar`, `description_en`, `keywords_ar`, `keywords_en`, `can_add_products`, `can_add_halls`, `status`, `commission`, `admin_id`, `image`, `halls_count`, `products_count`, `type`, `account`, `Tax_Number`, `commercial_registration_number`, `Tax_Number_expiration_date`, `country_id`, `city_id`, `region_id`, `vendor_admin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'k@test.com', '+1 (612) 538-7279', 'JBL', 'JBL', 'jbl', 'jbl', '<p>dadfssfd</p>', '<p>fsfgf</p>', 'Consequuntur sunt ob', 'Dolore in neque qui', 'Vero dolor non optio', 'Veniam est a verit', '1', '1', '1', 50.00, 52, 'YnvH0KKxhzYxiaxG3Y1JZYOB5SRb546Ip2TBaU8y.png', 53, 3, 'product', 'individual', NULL, NULL, NULL, 3, 5, 1, 52, NULL, '2023-05-10 10:49:23', '2023-05-22 19:39:48'),
(9, 'kfc@gmail.com', '01987654435', 'KFC', 'KFC', 'kfc', 'kfc', '<p>xKFC</p>', '<p>KFC</p>', 'KFC', 'KFC', 'KFC', 'KFC', '1', '0', '1', 10.00, 54, 'IA4YdlgEgxfHP9SwALmovqmYEr6iUF4NtELAuGWr.png', 0, 12, 'product', 'individual', NULL, NULL, NULL, 1, 1, 1, 54, NULL, '2023-05-18 09:12:24', '2023-05-18 09:12:24'),
(10, 'info@interconteninla.com', '011187644778', 'فندق الانتركونتينتل', 'Intercontenintal', 'فندق-الانتركونتينتل', 'intercontenintal', '<p>عربي عربي عربي عربي عربي عربي&nbsp;</p>', '<p>english english english english english&nbsp;</p>', 'عربي عربيعربيعربيعربي', 'english english english', 'عربيعربيعربي', 'english english english', '1', '1', '1', 10.00, 1, NULL, 50, 100, 'product_hall', 'company', 123456, 123456789, '2023-07-28', 3, 5, 5, 2, NULL, '2023-05-22 19:56:56', '2023-05-22 19:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(3, 504, '8205', '2023-05-03 10:00:17', '2023-05-03 10:00:17'),
(4, 505, '2670', '2023-05-03 10:00:34', '2023-05-03 10:00:34'),
(5, 506, '6898', '2023-05-03 10:01:22', '2023-05-03 10:01:22'),
(6, 507, '1121', '2023-05-03 14:52:10', '2023-05-03 14:52:10'),
(7, 507, '7592', '2023-05-03 14:53:59', '2023-05-03 14:53:59'),
(8, 507, '8666', '2023-05-03 14:56:41', '2023-05-03 14:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `view_all_products`
--

CREATE TABLE `view_all_products` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `view_all_products`
--

INSERT INTO `view_all_products` (`id`, `icon`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'icons8-deliver-food-50 1.png', 'texttext texttext texttext', 'texttext texttext texttext', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(2, 'reward-symbol-in-a-circle-svgrepo-com 1.png', 'texttext texttext texttext', 'texttext texttext texttext', '2023-05-04 12:47:38', '2023-05-04 12:47:38'),
(3, 'icons8-flower-bouquet-50 1.png', 'texttext texttext texttext', 'texttext texttext texttext', '2023-05-04 12:47:38', '2023-05-04 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `with_draws`
--

CREATE TABLE `with_draws` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total` double NOT NULL,
  `have` double NOT NULL,
  `our_commission` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `with_draws`
--

INSERT INTO `with_draws` (`id`, `vendor_name`, `vendor_phone`, `total`, `have`, `our_commission`, `created_at`, `updated_at`) VALUES
(19, 'k@test.com', '+1 (612) 538-7279', 18638, 9319, 9319, '2023-05-22 19:43:10', '2023-05-22 20:10:27'),
(20, 'k@test.com', '261161616', 14680, 7340, 7340, '2023-05-22 19:45:48', '2023-05-22 20:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `with_draw_requests`
--

CREATE TABLE `with_draw_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` int NOT NULL,
  `budget` double NOT NULL,
  `type` enum('from_admin','from_vendor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'from_admin',
  `status` enum('accepted','rejected','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `with_draw_requests`
--

INSERT INTO `with_draw_requests` (`id`, `vendor_id`, `budget`, `type`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(79, 7, 660, 'from_vendor', 'rejected', '1', '2023-05-22 19:50:02', '2023-05-22 19:51:10'),
(80, 7, 1000, 'from_vendor', 'pending', '2', '2023-05-22 19:50:13', '2023-05-22 19:50:13'),
(81, 7, 1500, 'from_vendor', 'pending', '3', '2023-05-22 19:50:20', '2023-05-22 19:50:20'),
(82, 7, 660, 'from_vendor', 'accepted', NULL, '2023-05-22 19:51:38', '2023-05-22 19:51:51'),
(83, 7, 660, 'from_admin', 'accepted', NULL, '2023-05-22 19:51:51', '2023-05-22 19:51:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
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
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `halls_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `halls_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `halls_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `halls_slug_en_unique` (`slug_en`),
  ADD UNIQUE KEY `halls_email_unique` (`email`),
  ADD UNIQUE KEY `halls_phone_unique` (`phone`),
  ADD KEY `halls_admin_id_foreign` (`admin_id`),
  ADD KEY `halls_vendor_id_foreign` (`vendor_id`),
  ADD KEY `halls_country_id_foreign` (`country_id`),
  ADD KEY `halls_city_id_foreign` (`city_id`);

--
-- Indexes for table `hall_bookings`
--
ALTER TABLE `hall_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_bookings_packge_id_foreign` (`packge_id`),
  ADD KEY `hall_bookings_hall_id_foreign` (`hall_id`),
  ADD KEY `hall_bookings_user_id_foreign` (`user_id`),
  ADD KEY `hall_bookings_vendor_id_foreign` (`vendor_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `packages_slug_en_unique` (`slug_en`),
  ADD KEY `packages_admin_id_foreign` (`admin_id`),
  ADD KEY `packages_vendor_id_foreign` (`vendor_id`),
  ADD KEY `packages_hall_id_foreign` (`hall_id`),
  ADD KEY `packages_category_id_foreign` (`category_id`);

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
  ADD UNIQUE KEY `package_options_slug_en_unique` (`slug_en`),
  ADD KEY `package_options_admin_id_foreign` (`admin_id`),
  ADD KEY `package_options_category_id_foreign` (`category_id`);

--
-- Indexes for table `package_option_categories`
--
ALTER TABLE `package_option_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_option_categories_title_ar_unique` (`title_ar`),
  ADD UNIQUE KEY `package_option_categories_title_en_unique` (`title_en`),
  ADD UNIQUE KEY `package_option_categories_slug_ar_unique` (`slug_ar`),
  ADD UNIQUE KEY `package_option_categories_slug_en_unique` (`slug_en`),
  ADD KEY `package_option_categories_admin_id_foreign` (`admin_id`);

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
  ADD UNIQUE KEY `products_slug_en_unique` (`slug_en`),
  ADD KEY `products_admin_id_foreign` (`admin_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
  ADD UNIQUE KEY `product_categories_slug_en_unique` (`slug_en`),
  ADD KEY `product_categories_admin_id_foreign` (`admin_id`),
  ADD KEY `product_categories_parent_id_foreign` (`parent_id`);

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
-- Indexes for table `product_taxes`
--
ALTER TABLE `product_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promo_codes_title_unique` (`title`),
  ADD KEY `promo_codes_admin_id_foreign` (`admin_id`);

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
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `admin_categories`
--
ALTER TABLE `admin_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_categories`
--
ALTER TABLE `ad_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign_explore_categories`
--
ALTER TABLE `assign_explore_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `available_dates`
--
ALTER TABLE `available_dates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `become_vendors`
--
ALTER TABLE `become_vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `best_selleres`
--
ALTER TABLE `best_selleres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories_halls`
--
ALTER TABLE `categories_halls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients_ads`
--
ALTER TABLE `clients_ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_message_replies`
--
ALTER TABLE `contact_message_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `digital_cards`
--
ALTER TABLE `digital_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `explore_categories`
--
ALTER TABLE `explore_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fast_links`
--
ALTER TABLE `fast_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features_sections`
--
ALTER TABLE `features_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `find_us`
--
ALTER TABLE `find_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footer_contact_us`
--
ALTER TABLE `footer_contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_main_sections`
--
ALTER TABLE `footer_main_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hall_bookings`
--
ALTER TABLE `hall_bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hall_categories`
--
ALTER TABLE `hall_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hall_media`
--
ALTER TABLE `hall_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hall_taxes`
--
ALTER TABLE `hall_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hint_sections`
--
ALTER TABLE `hint_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_birthday_halls`
--
ALTER TABLE `latest_birthday_halls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `latest_engagments_halls`
--
ALTER TABLE `latest_engagments_halls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `latest_products`
--
ALTER TABLE `latest_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `latest_wedding_halls`
--
ALTER TABLE `latest_wedding_halls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `news_sections`
--
ALTER TABLE `news_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2009;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_extra_fees`
--
ALTER TABLE `order_extra_fees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_special_discounts`
--
ALTER TABLE `order_special_discounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_taxes`
--
ALTER TABLE `order_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outer_clients`
--
ALTER TABLE `outer_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_option`
--
ALTER TABLE `package_option`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_options`
--
ALTER TABLE `package_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_option_categories`
--
ALTER TABLE `package_option_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_tax`
--
ALTER TABLE `package_tax`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_occasions`
--
ALTER TABLE `product_occasions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_products_with`
--
ALTER TABLE `product_products_with`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_taxes`
--
ALTER TABLE `product_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop_by_brands`
--
ALTER TABLE `shop_by_brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop_by_occasions`
--
ALTER TABLE `shop_by_occasions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `top_footers`
--
ALTER TABLE `top_footers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `top_navbars`
--
ALTER TABLE `top_navbars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_favorite_products`
--
ALTER TABLE `user_favorite_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `view_all_products`
--
ALTER TABLE `view_all_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `with_draws`
--
ALTER TABLE `with_draws`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `with_draw_requests`
--
ALTER TABLE `with_draw_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
