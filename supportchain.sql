-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2026 at 09:30 AM
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
-- Database: `supportchain`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `description`, `ip_address`, `user_agent`, `properties`, `created_at`, `updated_at`) VALUES
(1, NULL, 'AUTH REGISTER', 'New user Niranjan Kumar registered with Employee ID 123456.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 00:37:24', '2026-06-21 00:37:24'),
(2, NULL, 'POST Hierarchy', 'User Niranjan Kumar (niranjanyadav00862@gmail.com) performed POST request on \'hierarchy/update\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"user_id\":\"1\",\"reporting_to\":\"1\"}', '2026-06-21 02:27:45', '2026-06-21 02:27:45'),
(3, NULL, 'POST Hierarchy', 'User Niranjan Kumar (niranjanyadav00862@gmail.com) performed POST request on \'hierarchy/update\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"user_id\":\"3\",\"reporting_to\":\"1\"}', '2026-06-21 02:27:53', '2026-06-21 02:27:53'),
(4, NULL, 'AUTH LOGOUT', 'User Niranjan Kumar logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:29:10', '2026-06-21 02:29:10'),
(5, NULL, 'AUTH REGISTER', 'New user Niranjan Kumar yadav registered with Employee ID 1234567.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:31:01', '2026-06-21 02:31:01'),
(6, NULL, 'AUTH LOGOUT', 'User Niranjan Kumar yadav logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:31:48', '2026-06-21 02:31:48'),
(7, NULL, 'AUTH LOGIN', 'User Niranjan Kumar logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:32:48', '2026-06-21 02:32:48'),
(8, NULL, 'AUTH LOGOUT', 'User Niranjan Kumar logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:33:24', '2026-06-21 02:33:24'),
(9, NULL, 'AUTH LOGIN', 'User Niranjan Kumar logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:34:38', '2026-06-21 02:34:38'),
(10, NULL, 'AUTH LOGOUT', 'User Niranjan Kumar logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:39:55', '2026-06-21 02:39:55'),
(11, 1, 'AUTH LOGIN', 'User System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:41:38', '2026-06-21 02:41:38'),
(12, 1, 'AUTH LOGOUT', 'User System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:42:05', '2026-06-21 02:42:05'),
(13, 5, 'AUTH LOGIN', 'User David Miller (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:42:53', '2026-06-21 02:42:53'),
(14, 5, 'POST Tickets', 'User David Miller (Employee) (employee@supportchain.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"title\":\"TEST\",\"category_id\":\"1\",\"priority\":\"high\",\"description\":\"TEST first\",\"attachments\":[{}]}', '2026-06-21 02:44:05', '2026-06-21 02:44:05'),
(15, 5, 'TICKET CREATED', 'Ticket #TKT-20260621-24L5 created by David Miller (Employee).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:44:42', '2026-06-21 02:44:42'),
(16, 5, 'POST Tickets', 'User David Miller (Employee) (employee@supportchain.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"title\":\"test\",\"category_id\":\"2\",\"priority\":\"high\",\"description\":\"test\"}', '2026-06-21 02:44:53', '2026-06-21 02:44:53'),
(17, 1, 'AUTH LOGIN', 'User System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 02:47:29', '2026-06-21 02:47:29'),
(18, 1, 'POST Tickets', 'User System Admin (admin@supportchain.com) performed POST request on \'tickets/1/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"status\":\"in_progress\"}', '2026-06-21 02:48:22', '2026-06-21 02:48:22'),
(19, 1, 'POST Tickets', 'User System Admin (admin@supportchain.com) performed POST request on \'tickets/1/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"comment\":\"i solve this issu\"}', '2026-06-21 02:48:47', '2026-06-21 02:48:47'),
(20, 1, 'POST Tickets', 'User System Admin (admin@supportchain.com) performed POST request on \'tickets/1/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"comment\":\"csd\",\"is_internal\":\"1\"}', '2026-06-21 02:49:23', '2026-06-21 02:49:23'),
(21, 5, 'POST Notifications', 'User David Miller (Employee) (employee@supportchain.com) performed POST request on \'notifications/read-all\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '[]', '2026-06-21 02:55:10', '2026-06-21 02:55:10'),
(22, 1, 'AUTH LOGOUT', 'User System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 03:09:56', '2026-06-21 03:09:56'),
(23, 4, 'AUTH LOGIN', 'User Jane Smith (Team Lead) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 03:11:18', '2026-06-21 03:11:18'),
(24, 4, 'POST Tickets', 'User Jane Smith (Team Lead) (tl@supportchain.com) performed POST request on \'tickets/1/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"comment\":\"David Miller solve this issu plz check\"}', '2026-06-21 03:13:10', '2026-06-21 03:13:10'),
(25, 4, 'POST Notifications', 'User Jane Smith (Team Lead) (tl@supportchain.com) performed POST request on \'notifications/e426af59-c1c3-4fb9-b7cb-d4624025373e/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '[]', '2026-06-21 03:13:19', '2026-06-21 03:13:19'),
(26, 4, 'POST Tickets', 'User Jane Smith (Team Lead) (tl@supportchain.com) performed POST request on \'tickets/1/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '{\"status\":\"closed\"}', '2026-06-21 03:13:39', '2026-06-21 03:13:39'),
(27, 5, 'POST Notifications', 'User David Miller (Employee) (employee@supportchain.com) performed POST request on \'notifications/read-all\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '[]', '2026-06-21 03:14:27', '2026-06-21 03:14:27'),
(28, 4, 'AUTH LOGOUT', 'User Jane Smith (Team Lead) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 03:16:21', '2026-06-21 03:16:21'),
(29, 2, 'AUTH LOGIN', 'User Sarah Connor (HR Manager) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, '2026-06-21 03:17:02', '2026-06-21 03:17:02'),
(30, 1, 'AUTH LOGIN', 'User System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-21 21:28:39', '2026-06-21 21:28:39'),
(31, 1, 'AUTH LOGOUT', 'User System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-21 21:30:25', '2026-06-21 21:30:25'),
(32, 1, 'AUTH LOGIN', 'User System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 03:11:14', '2026-06-22 03:11:14'),
(33, 1, 'AUTH LOGOUT', 'User System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 03:11:50', '2026-06-22 03:11:50'),
(34, 1, 'AUTH LOGIN', 'User System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 03:45:36', '2026-06-22 03:45:36'),
(35, 4, 'AUTH LOGIN', 'User Jane Smith (Team Lead) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 04:18:00', '2026-06-22 04:18:00'),
(36, 4, 'PROFILE UPDATE', 'User Jane Smith (Team Lead) updated their profile details.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 04:21:35', '2026-06-22 04:21:35'),
(37, 4, 'PUT Profile', 'User Jane Smith (Team Lead) (tl@supportchain.com) performed PUT request on \'profile\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Jane Smith (Team Lead)\",\"email\":\"tl@supportchain.com\",\"phone\":\"+15550400\"}', '2026-06-22 04:21:35', '2026-06-22 04:21:35'),
(38, 4, 'AUTH LOGOUT', 'User Jane Smith (Team Lead) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 04:39:50', '2026-06-22 04:39:50'),
(39, 5, 'AUTH LOGIN', 'User David Miller (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 04:40:27', '2026-06-22 04:40:27'),
(40, 1, 'AUTH LOGOUT', 'User System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 04:52:57', '2026-06-22 04:52:57'),
(41, 1, 'AUTH LOGIN', 'User System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 20:10:04', '2026-06-22 20:10:04'),
(42, 1, 'AUTH LOGIN', 'User System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 21:35:41', '2026-06-22 21:35:41'),
(43, 5, 'AUTH LOGIN', 'User David Miller (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 22:19:34', '2026-06-22 22:19:34'),
(44, 5, 'AUTH LOGOUT', 'User David Miller (Employee) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-22 22:32:30', '2026-06-22 22:32:30'),
(45, 5, 'AUTH LOGIN', 'User David Miller (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 03:44:04', '2026-06-23 03:44:04'),
(46, 5, 'TICKET CREATED', 'Ticket #TKT-20260623-CTA1 created by David Miller (Employee).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 03:46:33', '2026-06-23 03:46:33'),
(47, 5, 'POST Tickets', 'User David Miller (Employee) (employee@supportchain.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"title\":\"hardware  issu\",\"category_id\":\"6\",\"priority\":\"high\",\"description\":\"today my system in not work\",\"attachments\":[{}]}', '2026-06-23 03:46:50', '2026-06-23 03:46:50'),
(48, 1, 'AUTH LOGOUT', 'User System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 03:48:56', '2026-06-23 03:48:56'),
(49, 4, 'AUTH LOGIN', 'User Jane Smith (Team Lead) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 03:49:08', '2026-06-23 03:49:08'),
(50, 4, 'POST Tickets', 'User Jane Smith (Team Lead) (tl@supportchain.com) performed POST request on \'tickets/2/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"comment\":\"i solve your issu\"}', '2026-06-23 03:49:46', '2026-06-23 03:49:46'),
(51, 4, 'POST Notifications', 'User Jane Smith (Team Lead) (tl@supportchain.com) performed POST request on \'notifications/4fb8194f-20a4-4938-b231-1f0fdffd381b/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 03:49:58', '2026-06-23 03:49:58'),
(52, 4, 'POST Tickets', 'User Jane Smith (Team Lead) (tl@supportchain.com) performed POST request on \'tickets/2/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"comment\":\"solve your issu thanyou\"}', '2026-06-23 03:51:06', '2026-06-23 03:51:06'),
(53, 4, 'POST Tickets', 'User Jane Smith (Team Lead) (tl@supportchain.com) performed POST request on \'tickets/2/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"closed\"}', '2026-06-23 03:51:09', '2026-06-23 03:51:09'),
(54, 5, 'AUTH LOGOUT', 'User David Miller (Employee) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 03:54:44', '2026-06-23 03:54:44'),
(55, 5, 'AUTH LOGIN', 'User David Miller (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 03:54:55', '2026-06-23 03:54:55'),
(56, 5, 'POST Notifications', 'User David Miller (Employee) (employee@supportchain.com) performed POST request on \'notifications/5851783a-4e5d-4382-b347-e8b9fe58b220/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 03:55:16', '2026-06-23 03:55:16'),
(57, 5, 'PROFILE UPDATE', 'User Raja (Employee) updated their profile details.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:03:31', '2026-06-23 04:03:31'),
(58, 5, 'PUT Profile', 'User Raja (Employee) (employee@supportchain.com) performed PUT request on \'profile\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Raja (Employee)\",\"email\":\"employee@supportchain.com\",\"phone\":\"+15550500\"}', '2026-06-23 04:03:31', '2026-06-23 04:03:31'),
(59, 4, 'PROFILE UPDATE', 'User Arpit Sir(Team Lead) updated their profile details.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:04:47', '2026-06-23 04:04:47'),
(60, 4, 'PUT Profile', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed PUT request on \'profile\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Arpit Sir(Team Lead)\",\"email\":\"tl@supportchain.com\",\"phone\":\"+15550400\"}', '2026-06-23 04:04:47', '2026-06-23 04:04:47'),
(61, 5, 'AUTH LOGOUT', 'User Raja (Employee) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:05:07', '2026-06-23 04:05:07'),
(62, 3, 'AUTH LOGIN', 'User John Doe (Project Manager) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:06:36', '2026-06-23 04:06:36'),
(63, 3, 'PROFILE UPDATE', 'User Gagandeep Sir (Project Manager) updated their profile details.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:07:03', '2026-06-23 04:07:03'),
(64, 3, 'PUT Profile', 'User Gagandeep Sir (Project Manager) (pm@supportchain.com) performed PUT request on \'profile\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Gagandeep Sir (Project Manager)\",\"email\":\"pm@supportchain.com\",\"phone\":\"+15550300\"}', '2026-06-23 04:07:04', '2026-06-23 04:07:04'),
(65, 3, 'AUTH LOGOUT', 'User Gagandeep Sir (Project Manager) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:07:11', '2026-06-23 04:07:11'),
(66, 4, 'AUTH LOGOUT', 'User Arpit Sir(Team Lead) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:07:19', '2026-06-23 04:07:19'),
(67, 1, 'AUTH LOGIN', 'User System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:07:44', '2026-06-23 04:07:44'),
(68, 1, 'PROFILE UPDATE', 'User Niranjan System Admin updated their profile details.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:08:14', '2026-06-23 04:08:14'),
(69, 1, 'PUT Profile', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'profile\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Niranjan System Admin\",\"email\":\"admin@supportchain.com\",\"phone\":\"+15550100\"}', '2026-06-23 04:08:14', '2026-06-23 04:08:14'),
(70, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/2/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"resolved\"}', '2026-06-23 04:10:48', '2026-06-23 04:10:48'),
(71, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/2/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"closed\"}', '2026-06-23 04:11:01', '2026-06-23 04:11:01'),
(72, 1, 'AUTH LOGOUT', 'User Niranjan System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:11:26', '2026-06-23 04:11:26'),
(73, 5, 'AUTH LOGIN', 'User Raja (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:11:46', '2026-06-23 04:11:46'),
(74, 5, 'POST Notifications', 'User Raja (Employee) (employee@supportchain.com) performed POST request on \'notifications/416059c3-dd80-412b-bba3-0bb1c1619d80/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 04:18:53', '2026-06-23 04:18:53'),
(75, 5, 'POST Notifications', 'User Raja (Employee) (employee@supportchain.com) performed POST request on \'notifications/3a43f67c-6121-4a9c-897e-5ab317f0f362/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 04:18:55', '2026-06-23 04:18:55'),
(76, 1, 'AUTH LOGIN', 'User Niranjan System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 04:44:54', '2026-06-23 04:44:54'),
(77, 1, 'AUTH LOGIN', 'User Niranjan System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 21:30:47', '2026-06-23 21:30:47'),
(78, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/6\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 21:32:19', '2026-06-23 21:32:19'),
(79, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/7\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 21:32:43', '2026-06-23 21:32:43'),
(80, NULL, 'AUTH REGISTER', 'New user Test registered with Employee ID EMP-000006.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 22:01:31', '2026-06-23 22:01:31'),
(81, NULL, 'AUTH LOGOUT', 'User Test logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 22:04:10', '2026-06-23 22:04:10'),
(82, NULL, 'AUTH LOGIN', 'User Test logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 22:04:37', '2026-06-23 22:04:37'),
(83, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/8\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 22:11:23', '2026-06-23 22:11:23'),
(84, NULL, 'AUTH REGISTER', 'New user Test registered with Employee ID EMP-000006.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 22:12:26', '2026-06-23 22:12:26'),
(85, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"5\"],\"status\":\"active\"}', '2026-06-23 22:17:40', '2026-06-23 22:17:40'),
(86, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"status\":\"active\"}', '2026-06-23 22:18:11', '2026-06-23 22:18:11'),
(87, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"status\":\"active\"}', '2026-06-23 22:18:14', '2026-06-23 22:18:14'),
(88, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"status\":\"active\"}', '2026-06-23 22:18:15', '2026-06-23 22:18:15'),
(89, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"status\":\"active\"}', '2026-06-23 22:18:16', '2026-06-23 22:18:16'),
(90, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"status\":\"inactive\"}', '2026-06-23 22:18:24', '2026-06-23 22:18:24'),
(91, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"status\":\"inactive\"}', '2026-06-23 22:18:29', '2026-06-23 22:18:29'),
(92, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"5\"],\"status\":\"inactive\"}', '2026-06-23 22:18:33', '2026-06-23 22:18:33'),
(93, NULL, 'AUTH LOGOUT', 'User Test logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 22:19:04', '2026-06-23 22:19:04'),
(94, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/9\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 22:39:13', '2026-06-23 22:39:13'),
(95, NULL, 'AUTH REGISTER', 'New user Test registered with Employee ID EMP-000007.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 22:39:59', '2026-06-23 22:39:59'),
(96, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/10\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-23 23:08:35', '2026-06-23 23:08:35'),
(97, NULL, 'AUTH REGISTER', 'New user Test registered with Employee ID EMP-000007.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 23:09:28', '2026-06-23 23:09:28'),
(98, NULL, 'AUTH LOGOUT', 'User Test logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 23:25:27', '2026-06-23 23:25:27'),
(99, NULL, 'AUTH LOGIN', 'User Test logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-23 23:25:56', '2026-06-23 23:25:56'),
(100, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"3\",\"5\"],\"status\":\"active\"}', '2026-06-24 01:10:40', '2026-06-24 01:10:40'),
(101, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"3\",\"5\"],\"status\":\"active\"}', '2026-06-24 01:10:41', '2026-06-24 01:10:41'),
(102, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"1\",\"3\",\"5\"],\"status\":\"active\"}', '2026-06-24 01:11:45', '2026-06-24 01:11:45'),
(103, NULL, 'AUTH LOGOUT', 'User Test logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 01:12:03', '2026-06-24 01:12:03'),
(104, NULL, 'AUTH LOGIN', 'User Test logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 01:12:24', '2026-06-24 01:12:24'),
(105, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"5\"],\"status\":\"active\"}', '2026-06-24 01:13:19', '2026-06-24 01:13:19'),
(106, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"1\",\"5\"],\"status\":\"active\"}', '2026-06-24 01:14:00', '2026-06-24 01:14:00'),
(107, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"1\"],\"status\":\"active\"}', '2026-06-24 01:28:05', '2026-06-24 01:28:05'),
(108, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/1\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Niranjan System Admin\",\"email\":\"admin@supportchain.com\",\"phone\":\"+15550100\",\"department_id\":\"1\",\"reporting_to\":null,\"roles\":[\"1\",\"5\"],\"status\":\"active\"}', '2026-06-24 01:29:49', '2026-06-24 01:29:49'),
(109, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/1\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Niranjan System Admin\",\"email\":\"admin@supportchain.com\",\"phone\":\"+15550100\",\"department_id\":\"1\",\"reporting_to\":null,\"roles\":[\"1\"],\"status\":\"active\"}', '2026-06-24 01:31:37', '2026-06-24 01:31:37'),
(110, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"5\"],\"status\":\"active\"}', '2026-06-24 01:31:59', '2026-06-24 01:31:59'),
(111, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"3\",\"5\"],\"status\":\"active\"}', '2026-06-24 01:50:22', '2026-06-24 01:50:22'),
(112, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"status\":\"active\"}', '2026-06-24 01:51:05', '2026-06-24 01:51:05'),
(113, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"5\"],\"status\":\"active\"}', '2026-06-24 01:51:11', '2026-06-24 01:51:11'),
(114, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"roles\":[\"5\"],\"status\":\"active\"}', '2026-06-24 01:51:13', '2026-06-24 01:51:13'),
(115, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"role_id\":\"1\",\"status\":\"active\"}', '2026-06-24 02:39:50', '2026-06-24 02:39:50'),
(116, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"role_id\":\"5\",\"status\":\"active\"}', '2026-06-24 02:41:26', '2026-06-24 02:41:26'),
(117, 1, 'POST Users', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'users\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Amish Singh8561\",\"email\":\"amishs82667@gmail.com\",\"phone\":null,\"department_id\":\"1\",\"reporting_to\":\"4\",\"role_id\":\"5\"}', '2026-06-24 02:45:45', '2026-06-24 02:45:45'),
(118, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/12\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-24 02:46:31', '2026-06-24 02:46:31'),
(119, 1, 'PUT Users', 'User Niranjan System Admin (admin@supportchain.com) performed PUT request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"name\":\"Test\",\"email\":\"test123@gmail.com\",\"phone\":\"12345633\",\"department_id\":\"8\",\"reporting_to\":null,\"role_id\":\"5\",\"status\":\"inactive\"}', '2026-06-24 02:46:39', '2026-06-24 02:46:39'),
(120, NULL, 'AUTH LOGOUT', 'User Test logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 02:46:48', '2026-06-24 02:46:48'),
(121, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/11\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-24 02:48:54', '2026-06-24 02:48:54'),
(122, NULL, 'AUTH REGISTER', 'New user Test registered with Employee ID EMP-000007.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 02:49:40', '2026-06-24 02:49:40'),
(123, NULL, 'AUTH LOGOUT', 'User Test logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 02:54:43', '2026-06-24 02:54:43'),
(124, NULL, 'AUTH LOGIN', 'User Test logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 04:37:16', '2026-06-24 04:37:16'),
(125, 1, 'AUTH LOGOUT', 'User Niranjan System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 20:10:07', '2026-06-24 20:10:07'),
(126, NULL, 'AUTH LOGIN', 'User Test logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 20:12:28', '2026-06-24 20:12:28'),
(127, NULL, 'AUTH LOGOUT', 'User Test logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 20:12:56', '2026-06-24 20:12:56'),
(128, NULL, 'AUTH REGISTER', 'New user raam registered with Employee ID EMP 34556.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 20:15:44', '2026-06-24 20:15:44'),
(129, 1, 'AUTH LOGIN', 'User Niranjan System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 20:17:07', '2026-06-24 20:17:07'),
(130, NULL, 'AUTH LOGOUT', 'User raam logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-24 23:38:48', '2026-06-24 23:38:48'),
(131, NULL, 'AUTH LOGIN', 'User raam logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 02:47:32', '2026-06-25 02:47:32'),
(132, NULL, 'AUTH LOGOUT', 'User raam logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 04:27:02', '2026-06-25 04:27:02'),
(133, 1, 'AUTH LOGIN', 'User Niranjan System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 19:31:56', '2026-06-25 19:31:56'),
(134, NULL, 'AUTH LOGIN', 'User raam logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 19:50:13', '2026-06-25 19:50:13'),
(135, NULL, 'TICKET CREATED', 'Ticket #TKT-20260626-4WMD created by raam.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 19:52:19', '2026-06-25 19:52:19'),
(136, NULL, 'POST Tickets', 'User raam (raam123@gmail.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"title\":\"Database login issue\",\"category_id\":\"2\",\"priority\":\"medium\",\"description\":\"Sir, there is a database login issue. Please help resolve it\"}', '2026-06-25 19:52:19', '2026-06-25 19:52:19'),
(137, 4, 'AUTH LOGIN', 'User Arpit Sir(Team Lead) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 19:58:26', '2026-06-25 19:58:26'),
(138, 4, 'AUTH LOGOUT', 'User Arpit Sir(Team Lead) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 19:59:02', '2026-06-25 19:59:02'),
(139, 2, 'AUTH LOGIN', 'User Sarah Connor (HR Manager) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 19:59:31', '2026-06-25 19:59:31'),
(140, 2, 'AUTH LOGOUT', 'User Sarah Connor (HR Manager) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 20:00:29', '2026-06-25 20:00:29'),
(141, 3, 'AUTH LOGIN', 'User Gagandeep Sir (Project Manager) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 20:01:01', '2026-06-25 20:01:01'),
(142, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/3/assign\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"assigned_to\":\"4\"}', '2026-06-25 20:04:56', '2026-06-25 20:04:56'),
(143, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/3/assign\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"assigned_to\":\"3\"}', '2026-06-25 20:09:23', '2026-06-25 20:09:23'),
(144, 3, 'POST Notifications', 'User Gagandeep Sir (Project Manager) (pm@supportchain.com) performed POST request on \'notifications/f8d4bae7-8267-4e9d-b151-27a62ad3b692/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:10:38', '2026-06-25 20:10:38'),
(145, 3, 'POST Tickets', 'User Gagandeep Sir (Project Manager) (pm@supportchain.com) performed POST request on \'tickets/3/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"comment\":\"Sir, please connect with our Team Leader regarding this issue.\"}', '2026-06-25 20:11:58', '2026-06-25 20:11:58'),
(146, 3, 'POST Tickets', 'User Gagandeep Sir (Project Manager) (pm@supportchain.com) performed POST request on \'tickets/3/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"comment\":\"Sir, please connect with our Team Leader regarding this issue.\"}', '2026-06-25 20:12:07', '2026-06-25 20:12:07'),
(147, 4, 'AUTH LOGIN', 'User Arpit Sir(Team Lead) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 20:16:20', '2026-06-25 20:16:20'),
(148, 4, 'POST Notifications', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'notifications/1095216b-72f2-4da9-a802-1d4b700b71e9/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:16:43', '2026-06-25 20:16:43'),
(149, 4, 'POST Tickets', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'tickets/3/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"comment\":\"Okay, Manager Sir. I am looking into the issue and will keep you updated.\"}', '2026-06-25 20:17:41', '2026-06-25 20:17:41'),
(150, 4, 'POST Tickets', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"resolved\"}', '2026-06-25 20:20:40', '2026-06-25 20:20:40'),
(151, NULL, 'POST Notifications', 'User raam (raam123@gmail.com) performed POST request on \'notifications/3b63a33a-81b7-4c68-aa84-74f835ca6f0e/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:21:03', '2026-06-25 20:21:03'),
(152, 3, 'POST Tickets', 'User Gagandeep Sir (Project Manager) (pm@supportchain.com) performed POST request on \'tickets/3/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"comment\":\"Okay Sir, please update the employee and change the ticket status accordingly.\"}', '2026-06-25 20:22:40', '2026-06-25 20:22:40'),
(153, 4, 'POST Tickets', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'tickets/3/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"comment\":\"Okay sir I update status .\"}', '2026-06-25 20:24:35', '2026-06-25 20:24:35'),
(154, 4, 'POST Tickets', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'tickets/3/assign\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"assigned_to\":\"3\"}', '2026-06-25 20:27:06', '2026-06-25 20:27:06'),
(155, 3, 'POST Notifications', 'User Gagandeep Sir (Project Manager) (pm@supportchain.com) performed POST request on \'notifications/95f0e5b6-c042-4cdd-8d67-1985ae541dde/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:28:14', '2026-06-25 20:28:14'),
(156, 3, 'POST Tickets', 'User Gagandeep Sir (Project Manager) (pm@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"closed\"}', '2026-06-25 20:28:38', '2026-06-25 20:28:38'),
(157, NULL, 'POST Notifications', 'User raam (raam123@gmail.com) performed POST request on \'notifications/5c4a58ba-f34f-4fed-8212-c6914e5479e3/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:29:01', '2026-06-25 20:29:01'),
(158, 4, 'AUTH LOGOUT', 'User Arpit Sir(Team Lead) logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 20:29:47', '2026-06-25 20:29:47');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `description`, `ip_address`, `user_agent`, `properties`, `created_at`, `updated_at`) VALUES
(159, 2, 'AUTH LOGIN', 'User Sarah Connor (HR Manager) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-25 20:30:20', '2026-06-25 20:30:20'),
(160, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/3/assign\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"assigned_to\":\"2\"}', '2026-06-25 20:31:29', '2026-06-25 20:31:29'),
(161, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/3/escalate\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"reason\":\"no\"}', '2026-06-25 20:31:44', '2026-06-25 20:31:44'),
(162, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"open\"}', '2026-06-25 20:31:57', '2026-06-25 20:31:57'),
(163, 1, 'POST Notifications', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'notifications/024cbabc-df32-4937-a1d2-8dffd1633bfe/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:32:09', '2026-06-25 20:32:09'),
(164, NULL, 'POST Notifications', 'User raam (raam123@gmail.com) performed POST request on \'notifications/4ebbcaa1-13d2-43d5-bf08-f25d3cf38a44/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:32:35', '2026-06-25 20:32:35'),
(165, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/3/assign\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"assigned_to\":\"2\"}', '2026-06-25 20:33:00', '2026-06-25 20:33:00'),
(166, 2, 'POST Tickets', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"reopened\"}', '2026-06-25 20:33:23', '2026-06-25 20:33:23'),
(167, 2, 'POST Notifications', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'notifications/24482fb5-6490-4dd2-bb2f-bb8863c15640/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:33:34', '2026-06-25 20:33:34'),
(168, 2, 'POST Notifications', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'notifications/afff7d1f-4b22-45b3-9e3d-95011535134e/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:33:37', '2026-06-25 20:33:37'),
(169, 2, 'POST Notifications', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'notifications/read-all\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:33:39', '2026-06-25 20:33:39'),
(170, NULL, 'POST Notifications', 'User raam (raam123@gmail.com) performed POST request on \'notifications/085a3a99-82d9-4fa4-bcc7-e169706e63f7/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:34:58', '2026-06-25 20:34:58'),
(171, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"in_progress\"}', '2026-06-25 20:35:54', '2026-06-25 20:35:54'),
(172, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"in_progress\"}', '2026-06-25 20:35:56', '2026-06-25 20:35:56'),
(173, 2, 'POST Tickets', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'tickets/2/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"open\"}', '2026-06-25 20:36:07', '2026-06-25 20:36:07'),
(174, 2, 'POST Tickets', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'tickets/2/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"closed\"}', '2026-06-25 20:37:46', '2026-06-25 20:37:46'),
(175, NULL, 'POST Notifications', 'User raam (raam123@gmail.com) performed POST request on \'notifications/read-all\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:38:12', '2026-06-25 20:38:12'),
(176, 2, 'POST Tickets', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"open\"}', '2026-06-25 20:39:05', '2026-06-25 20:39:05'),
(177, NULL, 'POST Notifications', 'User raam (raam123@gmail.com) performed POST request on \'notifications/5e8d096e-5fea-42ef-9e05-14936842a929/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 20:39:24', '2026-06-25 20:39:24'),
(178, 2, 'POST Tickets', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"closed\"}', '2026-06-25 21:13:47', '2026-06-25 21:13:47'),
(179, 2, 'POST Tickets', 'User Sarah Connor (HR Manager) (hr@supportchain.com) performed POST request on \'tickets/3/status\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"status\":\"closed\"}', '2026-06-25 21:13:49', '2026-06-25 21:13:49'),
(180, NULL, 'POST Notifications', 'User raam (raam123@gmail.com) performed POST request on \'notifications/read-all\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-25 21:14:10', '2026-06-25 21:14:10'),
(181, NULL, 'TICKET CREATED', 'Ticket #TKT-20260626-VOCX created by raam.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-26 03:22:20', '2026-06-26 03:22:20'),
(182, NULL, 'POST Tickets', 'User raam (raam123@gmail.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"title\":\"System not working\",\"category_id\":\"5\",\"priority\":\"high\",\"description\":\"My system is not working and its effecting to billing. we are getting lose.\",\"attachments\":[{}]}', '2026-06-26 03:22:20', '2026-06-26 03:22:20'),
(183, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/4/assign\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"assigned_to\":\"4\"}', '2026-06-26 03:28:24', '2026-06-26 03:28:24'),
(184, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/4/assign\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"assigned_to\":\"4\"}', '2026-06-26 03:28:26', '2026-06-26 03:28:26'),
(185, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/4/assign\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"assigned_to\":\"4\"}', '2026-06-26 03:28:29', '2026-06-26 03:28:29'),
(186, 1, 'POST Tickets', 'User Niranjan System Admin (admin@supportchain.com) performed POST request on \'tickets/4/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"comment\":\"efdf\"}', '2026-06-26 03:29:06', '2026-06-26 03:29:06'),
(187, 5, 'AUTH LOGIN', 'User Raja (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-28 20:56:46', '2026-06-28 20:56:46'),
(188, 5, 'POST Notifications', 'User Raja (Employee) (employee@supportchain.com) performed POST request on \'notifications/62944f3e-e8de-4426-aa51-fc391319e1dc/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-28 21:49:51', '2026-06-28 21:49:51'),
(189, 5, 'POST Notifications', 'User Raja (Employee) (employee@supportchain.com) performed POST request on \'notifications/217fee9d-2c14-4ade-8c2b-6b17d41dec88/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-28 21:49:53', '2026-06-28 21:49:53'),
(190, 5, 'AUTH LOGIN', 'User Raja (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-28 23:21:47', '2026-06-28 23:21:47'),
(191, 5, 'AUTH LOGIN', 'User Raja (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-29 21:09:52', '2026-06-29 21:09:52'),
(192, 5, 'TICKET CREATED', 'Ticket #TKT-20260630-EKB1 created by Raja (Employee).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-29 22:30:49', '2026-06-29 22:30:49'),
(193, 5, 'POST Tickets', 'User Raja (Employee) (employee@supportchain.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"title\":\"Test\",\"category_id\":\"3\",\"priority\":\"high\",\"assigned_to\":\"4\",\"description\":\"Test\"}', '2026-06-29 22:31:06', '2026-06-29 22:31:06'),
(194, 4, 'AUTH LOGIN', 'User Arpit Sir(Team Lead) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-06-29 22:32:35', '2026-06-29 22:32:35'),
(195, 4, 'POST Notifications', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'notifications/76de54c7-6682-4fc1-806d-e75e989c0ea8/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-29 22:32:49', '2026-06-29 22:32:49'),
(196, 4, 'POST Notifications', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'notifications/read-all\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-06-29 22:32:50', '2026-06-29 22:32:50'),
(197, 15, 'AUTH REGISTER', 'New user Niranjan Kumar registered with Employee ID 123213.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-01 02:17:00', '2026-07-01 02:17:00'),
(198, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/14\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-07-01 02:17:33', '2026-07-01 02:17:33'),
(199, 2, 'AUTH LOGIN', 'User Sarah Connor (HR Manager) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-01 02:20:16', '2026-07-01 02:20:16'),
(200, 5, 'AUTH LOGIN', 'User Raja (Employee) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-01 22:35:49', '2026-07-01 22:35:49'),
(201, 5, 'TICKET CREATED', 'Ticket #TKT-20260702-9DNA created by Raja (Employee).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-01 22:45:03', '2026-07-01 22:45:03'),
(202, 5, 'POST Tickets', 'User Raja (Employee) (employee@supportchain.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"title\":\"Teat02\\/07\\/20226\",\"category_id\":\"1\",\"priority\":\"high\",\"assigned_to\":\"4\",\"description\":\"jhi\"}', '2026-07-01 22:45:21', '2026-07-01 22:45:21'),
(203, 16, 'AUTH REGISTER', 'New user Amishs registered with Employee ID 123546.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-06 04:24:07', '2026-07-06 04:24:07'),
(204, 16, 'AUTH LOGOUT', 'User Amishs logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-06 04:24:18', '2026-07-06 04:24:18'),
(205, 16, 'AUTH LOGIN', 'User Amishs logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-06 04:29:03', '2026-07-06 04:29:03'),
(206, 1, 'DELETE Users', 'User Niranjan System Admin (admin@supportchain.com) performed DELETE request on \'users/13\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '[]', '2026-07-06 04:29:26', '2026-07-06 04:29:26'),
(207, 16, 'AUTH LOGIN', 'User Amishs logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-06 22:43:24', '2026-07-06 22:43:24'),
(208, 16, 'TICKET CREATED', 'Ticket #TKT-20260707-YPWL created by Amishs.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-06 22:45:24', '2026-07-06 22:45:24'),
(209, 16, 'POST Tickets', 'User Amishs (amishs82667@gmail.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '{\"title\":\"test\",\"category_id\":\"3\",\"priority\":\"high\",\"assigned_to\":\"4\",\"description\":\"test\",\"attachments\":[{}]}', '2026-07-06 22:45:41', '2026-07-06 22:45:41'),
(210, 16, 'AUTH LOGOUT', 'User Amishs logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', NULL, '2026-07-07 03:14:32', '2026-07-07 03:14:32'),
(211, 1, 'AUTH LOGOUT', 'User Niranjan System Admin logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-09 03:54:32', '2026-07-09 03:54:32'),
(212, 1, 'AUTH LOGIN', 'User Niranjan System Admin logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-09 03:56:09', '2026-07-09 03:56:09'),
(213, 16, 'AUTH LOGIN', 'User Amishs logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-09 03:57:21', '2026-07-09 03:57:21'),
(214, 16, 'POST Tickets', 'User Amishs (amishs82667@gmail.com) performed POST request on \'tickets/7/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '{\"comment\":\"hey\"}', '2026-07-09 03:58:35', '2026-07-09 03:58:35'),
(215, 4, 'AUTH LOGIN', 'User Arpit Sir(Team Lead) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-09 03:59:51', '2026-07-09 03:59:51'),
(216, 4, 'POST Notifications', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'notifications/2e883718-7a6b-48cf-8cd4-fbb71dd3418e/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '[]', '2026-07-09 04:01:17', '2026-07-09 04:01:17'),
(217, 4, 'POST Notifications', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'notifications/5c354e72-c756-4574-ab6b-9772ab5136ed/read\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '[]', '2026-07-09 04:01:18', '2026-07-09 04:01:18'),
(218, 4, 'POST Tickets', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'tickets/7/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '{\"comment\":\"yes\"}', '2026-07-09 04:01:43', '2026-07-09 04:01:43'),
(219, 17, 'AUTH REGISTER', 'New user Vibhor registered with Employee ID BASE123.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-10 03:43:56', '2026-07-10 03:43:56'),
(220, 17, 'PASSWORD CHANGE', 'User Vibhor changed their password.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-10 03:44:37', '2026-07-10 03:44:37'),
(221, 17, 'PUT Profile', 'User Vibhor (vibhor@gmail.com) performed PUT request on \'profile/password\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '{\"current_password\":\"Ut57zEw5iaJ3Rm8\",\"new_password\":\"Vibhu@123\",\"new_password_confirmation\":\"Vibhu@123\"}', '2026-07-10 03:44:37', '2026-07-10 03:44:37'),
(222, 17, 'PUT Profile', 'User Vibhor (vibhor@gmail.com) performed PUT request on \'profile/password\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '{\"current_password\":\"Ut57zEw5iaJ3Rm8\",\"new_password\":\"Vibhu@123\",\"new_password_confirmation\":\"Vibhu@123\"}', '2026-07-10 03:44:39', '2026-07-10 03:44:39'),
(223, 17, 'AUTH LOGOUT', 'User Vibhor logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-10 03:45:59', '2026-07-10 03:45:59'),
(224, 16, 'AUTH LOGIN', 'User Amishs logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-10 03:47:52', '2026-07-10 03:47:52'),
(225, 16, 'AUTH LOGOUT', 'User Amishs logged out of the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-10 03:48:50', '2026-07-10 03:48:50'),
(226, 16, 'AUTH LOGIN', 'User Amishs logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-10 03:49:14', '2026-07-10 03:49:14'),
(227, 16, 'TICKET CREATED', 'Ticket #TKT-20260710-1Y2A created by Amishs.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-10 03:51:24', '2026-07-10 03:51:24'),
(228, 16, 'POST Tickets', 'User Amishs (amishs82667@gmail.com) performed POST request on \'tickets\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '{\"title\":\"Bad Internet\",\"category_id\":\"3\",\"priority\":\"high\",\"assigned_to\":\"4\",\"description\":\"please fic this asap!\",\"attachments\":[{}]}', '2026-07-10 03:51:32', '2026-07-10 03:51:32'),
(229, 4, 'AUTH LOGIN', 'User Arpit Sir(Team Lead) logged into the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', NULL, '2026-07-10 03:53:55', '2026-07-10 03:53:55'),
(230, 4, 'POST Tickets', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'tickets/8/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '{\"comment\":\"I am checking i thi!\"}', '2026-07-10 03:54:39', '2026-07-10 03:54:39'),
(231, 4, 'POST Tickets', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'tickets/8/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '{\"comment\":\"I am checking i thi!\"}', '2026-07-10 03:54:46', '2026-07-10 03:54:46'),
(232, 4, 'POST Tickets', 'User Arpit Sir(Team Lead) (tl@supportchain.com) performed POST request on \'tickets/8/comment\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '{\"comment\":\"I am checking i thi!\"}', '2026-07-10 03:55:07', '2026-07-10 03:55:07');

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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'IT Support', 'Information Technology helpdesk support.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(2, 'Server & Infrastructure', 'System administration, server and network support.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(3, 'Network & Telecom', 'Corporate connectivity and network services.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(4, 'Software Dev', 'Software engineering, tools, and code operations.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(5, 'Hardware Admin', 'Physical hardware procurement, repairs, and support.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(6, 'Human Resources', 'Personnel management, leaves, benefits, and workplace complaints.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(7, 'Access Management', 'Account provisioning, active directory, and key cards.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(8, 'Operations', 'General business operations and team hierarchy.', '2026-06-21 00:33:40', '2026-06-21 00:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `department_users`
--

CREATE TABLE `department_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `is_head` tinyint(1) NOT NULL DEFAULT 0,
  `role_in_department` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `escalations`
--

CREATE TABLE `escalations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `old_assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `escalated_to` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `resolved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `hierarchies`
--

CREATE TABLE `hierarchies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reporting_to` bigint(20) UNSIGNED DEFAULT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'Employee',
  `depth` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hierarchies`
--

INSERT INTO `hierarchies` (`id`, `user_id`, `reporting_to`, `level`, `depth`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Project Manager', 1, '2026-06-21 02:27:53', '2026-06-21 02:27:53'),
(4, 1, NULL, 'Admin', 0, '2026-06-24 01:29:49', '2026-06-24 01:29:49');

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
(4, '2026_06_19_000002_create_roles_and_permissions_tables', 1),
(5, '2026_06_19_000003_create_ticket_categories_table', 1),
(6, '2026_06_19_000004_create_tickets_table', 1),
(7, '2026_06_19_000005_create_ticket_comments_table', 1),
(8, '2026_06_19_000006_create_escalations_table', 1),
(9, '2026_06_19_000007_create_activity_logs_table', 1),
(10, '2026_06_19_000008_create_settings_table', 1),
(11, '2026_06_19_000009_create_notifications_table', 1),
(12, '2026_06_21_100000_create_department_users_table', 1),
(13, '2026_06_21_100001_create_hierarchies_table', 1),
(14, '2026_06_21_100002_create_ticket_attachments_table', 1),
(15, '2026_06_21_110000_add_employee_id_and_role_id_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('024cbabc-df32-4937-a1d2-8dffd1633bfe', 'App\\Notifications\\TicketEscalatedNotification', 'App\\Models\\User', 1, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Urgent: Ticket #TKT-20260626-4WMD has been escalated to you.\",\"type\":\"ticket_escalated\"}', '2026-06-25 20:32:09', '2026-06-25 20:31:43', '2026-06-25 20:32:09'),
('085a3a99-82d9-4fa4-bcc7-e169706e63f7', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'reopened\'.\",\"type\":\"status_changed\"}', '2026-06-25 20:34:57', '2026-06-25 20:33:23', '2026-06-25 20:34:57'),
('1095216b-72f2-4da9-a802-1d4b700b71e9', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-25 20:16:43', '2026-06-25 20:04:43', '2026-06-25 20:16:43'),
('11c9bf92-c4f6-42bd-95cc-6cd4844bd4f0', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":4,\"ticket_number\":\"TKT-20260626-VOCX\",\"title\":\"System not working\",\"message\":\"Ticket #TKT-20260626-VOCX has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-29 22:32:50', '2026-06-26 03:28:26', '2026-06-29 22:32:50'),
('120667bb-88bd-4952-a820-42f6c33b21ac', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'closed\'.\",\"type\":\"status_changed\"}', '2026-06-25 21:14:10', '2026-06-25 21:13:48', '2026-06-25 21:14:10'),
('217fee9d-2c14-4ade-8c2b-6b17d41dec88', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 5, '{\"ticket_id\":2,\"ticket_number\":\"TKT-20260623-CTA1\",\"title\":\"hardware  issu\",\"message\":\"Ticket #TKT-20260623-CTA1 status changed from \'{\\\"id\\\":5,\\\"name\\\":\\\"Raja (Employee)\\\",\\\"email\\\":\\\"employee@supportchain.com\\\",\\\"employee_id\\\":\\\"EMP-000005\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":8,\\\"reporting_to\\\":4,\\\"phone\\\":\\\"+15550500\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-23T09:33:31.000000Z\\\"}\' to \'open\'.\",\"type\":\"status_changed\"}', '2026-06-28 21:49:52', '2026-06-25 20:36:07', '2026-06-28 21:49:52'),
('24482fb5-6490-4dd2-bb2f-bb8863c15640', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 2, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-25 20:33:34', '2026-06-25 20:33:00', '2026-06-25 20:33:34'),
('2e883718-7a6b-48cf-8cd4-fbb71dd3418e', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":7,\"ticket_number\":\"TKT-20260707-YPWL\",\"title\":\"test\",\"message\":\"Ticket #TKT-20260707-YPWL has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-07-09 04:01:17', '2026-07-06 22:45:28', '2026-07-09 04:01:17'),
('3a43f67c-6121-4a9c-897e-5ab317f0f362', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 5, '{\"ticket_id\":2,\"ticket_number\":\"TKT-20260623-CTA1\",\"title\":\"hardware  issu\",\"message\":\"Ticket #TKT-20260623-CTA1 status changed from \'{\\\"id\\\":5,\\\"name\\\":\\\"Raja (Employee)\\\",\\\"email\\\":\\\"employee@supportchain.com\\\",\\\"employee_id\\\":\\\"EMP-000005\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":8,\\\"reporting_to\\\":4,\\\"phone\\\":\\\"+15550500\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-23T09:33:31.000000Z\\\"}\' to \'resolved\'.\",\"type\":\"status_changed\"}', '2026-06-23 04:18:55', '2026-06-23 04:10:48', '2026-06-23 04:18:55'),
('3b63a33a-81b7-4c68-aa84-74f835ca6f0e', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'resolved\'.\",\"type\":\"status_changed\"}', '2026-06-25 20:21:03', '2026-06-25 20:20:40', '2026-06-25 20:21:03'),
('416059c3-dd80-412b-bba3-0bb1c1619d80', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 5, '{\"ticket_id\":2,\"ticket_number\":\"TKT-20260623-CTA1\",\"title\":\"hardware  issu\",\"message\":\"Ticket #TKT-20260623-CTA1 status changed from \'{\\\"id\\\":5,\\\"name\\\":\\\"Raja (Employee)\\\",\\\"email\\\":\\\"employee@supportchain.com\\\",\\\"employee_id\\\":\\\"EMP-000005\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":8,\\\"reporting_to\\\":4,\\\"phone\\\":\\\"+15550500\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-23T09:33:31.000000Z\\\"}\' to \'closed\'.\",\"type\":\"status_changed\"}', '2026-06-23 04:18:53', '2026-06-23 04:11:00', '2026-06-23 04:18:53'),
('4ebbcaa1-13d2-43d5-bf08-f25d3cf38a44', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'open\'.\",\"type\":\"status_changed\"}', '2026-06-25 20:32:35', '2026-06-25 20:31:57', '2026-06-25 20:32:35'),
('4fb8194f-20a4-4938-b231-1f0fdffd381b', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":2,\"ticket_number\":\"TKT-20260623-CTA1\",\"title\":\"hardware  issu\",\"message\":\"Ticket #TKT-20260623-CTA1 has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-23 03:49:58', '2026-06-23 03:46:36', '2026-06-23 03:49:58'),
('5851783a-4e5d-4382-b347-e8b9fe58b220', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 5, '{\"ticket_id\":2,\"ticket_number\":\"TKT-20260623-CTA1\",\"title\":\"hardware  issu\",\"message\":\"Ticket #TKT-20260623-CTA1 status changed from \'{\\\"id\\\":5,\\\"name\\\":\\\"David Miller (Employee)\\\",\\\"email\\\":\\\"employee@supportchain.com\\\",\\\"employee_id\\\":\\\"EMP-000005\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":8,\\\"reporting_to\\\":4,\\\"phone\\\":\\\"+15550500\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\"}\' to \'closed\'.\",\"type\":\"status_changed\"}', '2026-06-23 03:55:16', '2026-06-23 03:51:09', '2026-06-23 03:55:16'),
('5c354e72-c756-4574-ab6b-9772ab5136ed', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":6,\"ticket_number\":\"TKT-20260702-9DNA\",\"title\":\"Teat02\\/07\\/20226\",\"message\":\"Ticket #TKT-20260702-9DNA has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-07-09 04:01:18', '2026-07-01 22:45:06', '2026-07-09 04:01:18'),
('5c4a58ba-f34f-4fed-8212-c6914e5479e3', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'closed\'.\",\"type\":\"status_changed\"}', '2026-06-25 20:29:01', '2026-06-25 20:28:38', '2026-06-25 20:29:01'),
('5e8d096e-5fea-42ef-9e05-14936842a929', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'open\'.\",\"type\":\"status_changed\"}', '2026-06-25 20:39:24', '2026-06-25 20:39:05', '2026-06-25 20:39:24'),
('62944f3e-e8de-4426-aa51-fc391319e1dc', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 5, '{\"ticket_id\":2,\"ticket_number\":\"TKT-20260623-CTA1\",\"title\":\"hardware  issu\",\"message\":\"Ticket #TKT-20260623-CTA1 status changed from \'{\\\"id\\\":5,\\\"name\\\":\\\"Raja (Employee)\\\",\\\"email\\\":\\\"employee@supportchain.com\\\",\\\"employee_id\\\":\\\"EMP-000005\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":8,\\\"reporting_to\\\":4,\\\"phone\\\":\\\"+15550500\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-23T09:33:31.000000Z\\\"}\' to \'closed\'.\",\"type\":\"status_changed\"}', '2026-06-28 21:49:51', '2026-06-25 20:37:45', '2026-06-28 21:49:51'),
('76de54c7-6682-4fc1-806d-e75e989c0ea8', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":5,\"ticket_number\":\"TKT-20260630-EKB1\",\"title\":\"Test\",\"message\":\"Ticket #TKT-20260630-EKB1 has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-29 22:32:49', '2026-06-29 22:30:52', '2026-06-29 22:32:49'),
('8c2991ea-5705-4ce2-8ca8-d6c5c165ddfd', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'in_progress\'.\",\"type\":\"status_changed\"}', '2026-06-25 20:38:12', '2026-06-25 20:35:54', '2026-06-25 20:38:12'),
('944efc08-6086-424c-a9e0-72a7535d74a9', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 5, '{\"ticket_id\":1,\"ticket_number\":\"TKT-20260621-24L5\",\"title\":\"test\",\"message\":\"Ticket #TKT-20260621-24L5 status changed from \'{\\\"id\\\":5,\\\"name\\\":\\\"David Miller (Employee)\\\",\\\"email\\\":\\\"employee@supportchain.com\\\",\\\"employee_id\\\":\\\"EMP-000005\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":8,\\\"reporting_to\\\":4,\\\"phone\\\":\\\"+15550500\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\"}\' to \'in_progress\'.\",\"type\":\"status_changed\"}', '2026-06-21 02:55:10', '2026-06-21 02:48:22', '2026-06-21 02:55:10'),
('95f0e5b6-c042-4cdd-8d67-1985ae541dde', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 3, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-25 20:28:14', '2026-06-25 20:27:05', '2026-06-25 20:28:14'),
('a9298230-ef05-4101-8b63-9e6fdd8db54a', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'in_progress\'.\",\"type\":\"status_changed\"}', '2026-06-25 20:38:12', '2026-06-25 20:35:56', '2026-06-25 20:38:12'),
('afff7d1f-4b22-45b3-9e3d-95011535134e', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 2, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-25 20:33:37', '2026-06-25 20:31:29', '2026-06-25 20:33:37'),
('c32ab450-a388-4ef3-8f9f-9bce304afbff', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":4,\"ticket_number\":\"TKT-20260626-VOCX\",\"title\":\"System not working\",\"message\":\"Ticket #TKT-20260626-VOCX has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-29 22:32:50', '2026-06-26 03:28:05', '2026-06-29 22:32:50'),
('cc4281ca-0d44-48a5-8935-cdf2f72c0204', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 14, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD status changed from \'{\\\"id\\\":14,\\\"name\\\":\\\"raam\\\",\\\"email\\\":\\\"raam123@gmail.com\\\",\\\"employee_id\\\":\\\"EMP 34556\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":1,\\\"reporting_to\\\":null,\\\"phone\\\":\\\"123456789\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-25T01:45:44.000000Z\\\"}\' to \'closed\'.\",\"type\":\"status_changed\"}', '2026-06-25 21:14:10', '2026-06-25 21:13:42', '2026-06-25 21:14:10'),
('deb07b38-3a6d-430b-9173-c261edcf96eb', 'App\\Notifications\\TicketStatusChangedNotification', 'App\\Models\\User', 5, '{\"ticket_id\":1,\"ticket_number\":\"TKT-20260621-24L5\",\"title\":\"test\",\"message\":\"Ticket #TKT-20260621-24L5 status changed from \'{\\\"id\\\":5,\\\"name\\\":\\\"David Miller (Employee)\\\",\\\"email\\\":\\\"employee@supportchain.com\\\",\\\"employee_id\\\":\\\"EMP-000005\\\",\\\"role_id\\\":5,\\\"email_verified_at\\\":null,\\\"department_id\\\":8,\\\"reporting_to\\\":4,\\\"phone\\\":\\\"+15550500\\\",\\\"status\\\":\\\"active\\\",\\\"created_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\",\\\"updated_at\\\":\\\"2026-06-21T06:03:41.000000Z\\\"}\' to \'closed\'.\",\"type\":\"status_changed\"}', '2026-06-21 03:14:27', '2026-06-21 03:13:39', '2026-06-21 03:14:27'),
('e426af59-c1c3-4fb9-b7cb-d4624025373e', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":1,\"ticket_number\":\"TKT-20260621-24L5\",\"title\":\"test\",\"message\":\"Ticket #TKT-20260621-24L5 has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-21 03:13:19', '2026-06-21 02:44:44', '2026-06-21 03:13:19'),
('f5040af5-3d8c-4710-9936-995dd2807358', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":4,\"ticket_number\":\"TKT-20260626-VOCX\",\"title\":\"System not working\",\"message\":\"Ticket #TKT-20260626-VOCX has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-29 22:32:50', '2026-06-26 03:28:28', '2026-06-29 22:32:50'),
('f8d4bae7-8267-4e9d-b151-27a62ad3b692', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 3, '{\"ticket_id\":3,\"ticket_number\":\"TKT-20260626-4WMD\",\"title\":\"Database login issue\",\"message\":\"Ticket #TKT-20260626-4WMD has been assigned to you.\",\"type\":\"ticket_assigned\"}', '2026-06-25 20:10:38', '2026-06-25 20:09:23', '2026-06-25 20:10:38'),
('f9e4153e-1ce9-4fd2-860d-d4034d8b3d5d', 'App\\Notifications\\TicketAssignedNotification', 'App\\Models\\User', 4, '{\"ticket_id\":8,\"ticket_number\":\"TKT-20260710-1Y2A\",\"title\":\"Bad Internet\",\"message\":\"Ticket #TKT-20260710-1Y2A has been assigned to you.\",\"type\":\"ticket_assigned\"}', NULL, '2026-07-10 03:51:28', '2026-07-10 03:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('amishs82667@gmail.com', '9a50b4590fae7ed4caefc618b37d587c6e601812ce8cab490daaeb9be821bcce', '2026-07-06 04:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'manage_users', 'Manage user accounts and hierarchy', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(2, 'manage_departments', 'Create and modify company departments', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(3, 'manage_roles', 'Define roles and permissions', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(4, 'manage_settings', 'Modify system and SLA settings', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(5, 'view_reports', 'Access resolution and SLA analytics', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(6, 'view_activity_logs', 'Audit system logs and activities', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(7, 'create_ticket', 'Create new ticket requests', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(8, 'view_all_tickets', 'View all tickets in the system', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(9, 'view_assigned_tickets', 'View tickets assigned to self or team', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(10, 'view_own_tickets', 'View tickets raised by self', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(11, 'assign_ticket', 'Assign tickets to agents', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(12, 'close_ticket', 'Mark tickets as resolved/closed', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(13, 'reopen_ticket', 'Reopen closed tickets', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(14, 'comment_ticket', 'Add comments/replies to tickets', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(15, 'internal_note_ticket', 'Add private agent notes to tickets', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(16, 'escalate_ticket', 'Manually escalate tickets', '2026-06-21 00:33:40', '2026-06-21 00:33:40');

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
(5, 2),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(11, 1),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(13, 1),
(13, 3),
(13, 4),
(13, 5),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(15, 1),
(15, 3),
(15, 4),
(16, 1),
(16, 3),
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Full administrative access.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(2, 'HR', 'HR department manager and staff.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(3, 'Project Manager', 'Operations manager and supervisor.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(4, 'Team Lead', 'First-level supervisor and queue manager.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(5, 'Employee', 'Regular corporate employee.', '2026-06-21 00:33:40', '2026-06-21 00:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(15, 5),
(16, 5),
(17, 5);

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

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `description`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'SupportChain System Ltd.', 'general', 'Corporate Entity Display Name.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(2, 'escalation_enabled', '1', 'escalation', 'Enable/disable automated ticket escalation scheduler (1=Yes, 0=No).', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(3, 'escalation_hours', '4', 'escalation', 'Default elapsed hours of inactivity before escalating to the next level.', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(4, 'email_notifications_enabled', '1', 'notification', 'Fires outbound transactional emails (1=Yes, 0=No).', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(5, 'in_app_notifications_enabled', '1', 'notification', 'Stores notifications in database (1=Yes, 0=No).', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(6, 'system_email', 'no-reply@supportchain.com', 'email', 'Sender email address for alerts.', '2026-06-21 00:33:40', '2026-06-21 00:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `priority` varchar(255) NOT NULL DEFAULT 'medium',
  `status` varchar(255) NOT NULL DEFAULT 'open',
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `sla_deadline` timestamp NULL DEFAULT NULL,
  `escalated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_number`, `user_id`, `department_id`, `category_id`, `title`, `description`, `priority`, `status`, `assigned_to`, `sla_deadline`, `escalated_at`, `created_at`, `updated_at`) VALUES
(1, 'TKT-20260621-24L5', 5, 8, 2, 'test', 'test', 'high', 'closed', 4, '2026-06-21 06:44:42', NULL, '2026-06-21 02:44:42', '2026-06-21 03:13:38'),
(2, 'TKT-20260623-CTA1', 5, 8, 6, 'hardware  issu', 'today my system in not work', 'high', 'closed', 4, '2026-06-26 03:46:32', NULL, '2026-06-23 03:46:32', '2026-06-25 20:37:45'),
(5, 'TKT-20260630-EKB1', 5, 8, 3, 'Test', 'Test', 'high', 'open', 4, '2026-06-30 06:30:49', NULL, '2026-06-29 22:30:49', '2026-06-29 22:30:49'),
(6, 'TKT-20260702-9DNA', 5, 8, 1, 'Teat02/07/20226', 'jhi', 'high', 'open', 4, '2026-07-02 10:45:02', NULL, '2026-07-01 22:45:02', '2026-07-01 22:45:02'),
(7, 'TKT-20260707-YPWL', 16, 1, 3, 'test', 'test', 'high', 'open', 4, '2026-07-07 06:45:23', NULL, '2026-07-06 22:45:23', '2026-07-06 22:45:23'),
(8, 'TKT-20260710-1Y2A', 16, 1, 3, 'Bad Internet', 'please fic this asap!', 'high', 'open', 4, '2026-07-10 11:51:23', NULL, '2026-07-10 03:51:23', '2026-07-10 03:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachments`
--

CREATE TABLE `ticket_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL DEFAULT 0,
  `mime_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_attachments`
--

INSERT INTO `ticket_attachments` (`id`, `ticket_id`, `user_id`, `file_name`, `file_path`, `file_size`, `mime_type`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'image_0.jpg', 'attachments/Vy8DIDyqNVYoGTIAisVCbWNA8TPc71h5ZpaUcbyk.jpg', 2791601, 'image/jpeg', '2026-06-23 03:46:33', '2026-06-23 03:46:33'),
(3, 7, 16, 'Project Name_ Quiz System - Google Docs.pdf1.pdf', 'attachments/g21REo6egollhecOWferLQAO59dLc6cQqgpOQltJ.pdf', 5017262, 'application/pdf', '2026-07-06 22:45:24', '2026-07-06 22:45:24'),
(4, 8, 16, '13-countries.jpg', 'attachments/cpNBahqyyYmJSoEUcTugAcIDuga3PDEzj5spl2OL.jpg', 71286, 'image/jpeg', '2026-07-10 03:51:24', '2026-07-10 03:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sla_hours` int(11) NOT NULL DEFAULT 24,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `name`, `slug`, `description`, `sla_hours`, `status`, `created_at`, `updated_at`) VALUES
(1, 'System Issue', 'system-issue', 'Local OS, office tools, and utility software issues.', 12, 'active', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(2, 'Server Issue', 'server-issue', 'Server downtime, application server crashes, and access errors.', 4, 'active', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(3, 'Network Issue', 'network-issue', 'VPN, Wifi connectivity, ethernet routing, and firewall problems.', 8, 'active', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(4, 'Software Issue', 'software-issue', 'IDE installations, licensing requests, and custom tooling.', 24, 'active', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(5, 'Hardware Issue', 'hardware-issue', 'Laptop repair, peripheral replacement, screen fixes, and docks.', 48, 'active', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(6, 'HR Request', 'hr-request', 'Workplace inquiries, benefits, policy clarifications, and disputes.', 72, 'active', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(7, 'Leave Request', 'leave-request', 'Maternity, medical, or unpaid long leave approvals.', 48, 'active', '2026-06-21 00:33:40', '2026-06-21 00:33:40'),
(8, 'Access Request', 'access-request', 'Active directory, database permissions, server ssh keys, and ID cards.', 6, 'active', '2026-06-21 00:33:40', '2026-06-21 00:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `is_internal` tinyint(1) NOT NULL DEFAULT 0,
  `attachment_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_comments`
--

INSERT INTO `ticket_comments` (`id`, `ticket_id`, `user_id`, `comment`, `is_internal`, `attachment_path`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Status changed from OPEN to IN PROGRESS.', 0, NULL, '2026-06-21 02:48:22', '2026-06-21 02:48:22'),
(2, 1, 1, 'i solve this issu', 0, NULL, '2026-06-21 02:48:47', '2026-06-21 02:48:47'),
(3, 1, 1, 'csd', 1, NULL, '2026-06-21 02:49:23', '2026-06-21 02:49:23'),
(4, 1, 4, 'David Miller solve this issu plz check', 0, NULL, '2026-06-21 03:13:10', '2026-06-21 03:13:10'),
(5, 1, 4, 'Status changed from IN PROGRESS to CLOSED.', 0, NULL, '2026-06-21 03:13:38', '2026-06-21 03:13:38'),
(6, 2, 4, 'i solve your issu', 0, NULL, '2026-06-23 03:49:45', '2026-06-23 03:49:45'),
(7, 2, 4, 'solve your issu thanyou', 0, NULL, '2026-06-23 03:51:06', '2026-06-23 03:51:06'),
(8, 2, 4, 'Status changed from OPEN to CLOSED.', 0, NULL, '2026-06-23 03:51:09', '2026-06-23 03:51:09'),
(9, 2, 1, 'Status changed from CLOSED to RESOLVED.', 0, NULL, '2026-06-23 04:10:48', '2026-06-23 04:10:48'),
(10, 2, 1, 'Status changed from RESOLVED to CLOSED.', 0, NULL, '2026-06-23 04:11:00', '2026-06-23 04:11:00'),
(27, 2, 2, 'Status changed from CLOSED to OPEN.', 0, NULL, '2026-06-25 20:36:07', '2026-06-25 20:36:07'),
(28, 2, 2, 'Status changed from OPEN to CLOSED.', 0, NULL, '2026-06-25 20:37:45', '2026-06-25 20:37:45'),
(36, 7, 16, 'hey', 0, NULL, '2026-07-09 03:58:33', '2026-07-09 03:58:33'),
(37, 7, 4, 'yes', 0, NULL, '2026-07-09 04:01:43', '2026-07-09 04:01:43'),
(38, 8, 4, 'I am checking i thi!', 0, NULL, '2026-07-10 03:54:38', '2026-07-10 03:54:38'),
(39, 8, 4, 'I am checking i thi!', 0, NULL, '2026-07-10 03:54:46', '2026-07-10 03:54:46'),
(40, 8, 4, 'I am checking i thi!', 0, NULL, '2026-07-10 03:55:07', '2026-07-10 03:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reporting_to` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `employee_id`, `role_id`, `email_verified_at`, `password`, `department_id`, `reporting_to`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Niranjan System Admin', 'admin@supportchain.com', 'EMP-000001', 1, NULL, '$2y$12$lDfgirovEmGQjF78P39fM.twiw2.Ax6SEJuEmOZLylr0UnYfxl/Pa', 1, NULL, '+15550100', 'active', 'GUvp5KYSyjj0m0zlutUZe2ZtqKHHNd4Hr1LkyH7WQTm3pvqUnpLKMxz3c5Rb', '2026-06-21 00:33:40', '2026-06-23 04:08:14'),
(2, 'Sarah Connor (HR Manager)', 'hr@supportchain.com', 'EMP-000002', 2, NULL, '$2y$12$lDfgirovEmGQjF78P39fM.twiw2.Ax6SEJuEmOZLylr0UnYfxl/Pa', 6, NULL, '+15550200', 'active', 'WUTyyUMFLIkBPj8CmLFKaRGoqdXyE0TS0ImQSZPUJH60GmEiqQTsRjtfUDYp', '2026-06-21 00:33:41', '2026-06-21 00:33:41'),
(3, 'Gagandeep Sir (Project Manager)', 'pm@supportchain.com', 'EMP-000003', 3, NULL, '$2y$12$lDfgirovEmGQjF78P39fM.twiw2.Ax6SEJuEmOZLylr0UnYfxl/Pa', 8, 1, '+15550300', 'active', NULL, '2026-06-21 00:33:41', '2026-06-23 04:07:03'),
(4, 'Arpit Sir(Team Lead)', 'tl@supportchain.com', 'EMP-000004', 4, NULL, '$2y$12$lDfgirovEmGQjF78P39fM.twiw2.Ax6SEJuEmOZLylr0UnYfxl/Pa', 8, 3, '+15550400', 'active', 'V2opNTrOKq6agkyO4BIaDiKIeHAcmqeCAsAtC2muqDki0hHIkMs0KvtoD8vH', '2026-06-21 00:33:41', '2026-06-23 04:04:47'),
(5, 'Raja (Employee)', 'employee@supportchain.com', 'EMP-000005', 5, NULL, '$2y$12$lDfgirovEmGQjF78P39fM.twiw2.Ax6SEJuEmOZLylr0UnYfxl/Pa', 8, 4, '+15550500', 'active', '2KSeiwVSmWLc7xWAAQp8MDO23j4mmICciFDG37YkYR7wlShvhXsNpYAGNp1B', '2026-06-21 00:33:41', '2026-06-23 04:03:31'),
(15, 'Niranjan Kumar', 'kumar123@gmail.com', '123213', 5, NULL, '$2y$12$yKoLVuG.03M7nog0BFT8Iu7a1bsgYFoCryA9BwQKe4Py4MO2fZIQq', 1, NULL, '1234567896', 'active', NULL, '2026-07-01 02:17:00', '2026-07-01 02:17:00'),
(16, 'Amishs', 'amishs82667@gmail.com', '123546', 5, NULL, '$2y$12$r96Ej6YZEbm3ozYP8LM/9ejdCJQCyp1y2k2zzgZCo.MpXWY3VJBFy', 1, NULL, '63979523673', 'active', 'GFlco9mBO0y3oqW3Zd6qPusHRe5kFXu5U42P0JYunYUEmEzpPPaHjBx9zAJF', '2026-07-06 04:24:07', '2026-07-06 04:24:07'),
(17, 'Vibhor', 'vibhor@gmail.com', 'BASE123', 5, NULL, '$2y$12$stVdi7tZ/BSmoSaB5FaL2eP4/PyRHvEC.oA1WOitrlC12FQjzdLXG', 4, NULL, '9719837105', 'active', NULL, '2026-07-10 03:43:56', '2026-07-10 03:44:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `department_users`
--
ALTER TABLE `department_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_users_user_id_department_id_unique` (`user_id`,`department_id`),
  ADD KEY `department_users_department_id_foreign` (`department_id`);

--
-- Indexes for table `escalations`
--
ALTER TABLE `escalations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escalations_ticket_id_foreign` (`ticket_id`),
  ADD KEY `escalations_old_assigned_to_foreign` (`old_assigned_to`),
  ADD KEY `escalations_escalated_to_foreign` (`escalated_to`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hierarchies`
--
ALTER TABLE `hierarchies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hierarchies_user_id_unique` (`user_id`),
  ADD KEY `hierarchies_reporting_to_foreign` (`reporting_to`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_number_unique` (`ticket_number`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_department_id_foreign` (`department_id`),
  ADD KEY `tickets_category_id_foreign` (`category_id`),
  ADD KEY `tickets_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_attachments_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_attachments_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_categories_name_unique` (`name`),
  ADD UNIQUE KEY `ticket_categories_slug_unique` (`slug`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_comments_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_employee_id_unique` (`employee_id`),
  ADD KEY `users_department_id_foreign` (`department_id`),
  ADD KEY `users_reporting_to_foreign` (`reporting_to`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department_users`
--
ALTER TABLE `department_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escalations`
--
ALTER TABLE `escalations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hierarchies`
--
ALTER TABLE `hierarchies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `department_users`
--
ALTER TABLE `department_users`
  ADD CONSTRAINT `department_users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `escalations`
--
ALTER TABLE `escalations`
  ADD CONSTRAINT `escalations_escalated_to_foreign` FOREIGN KEY (`escalated_to`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `escalations_old_assigned_to_foreign` FOREIGN KEY (`old_assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `escalations_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hierarchies`
--
ALTER TABLE `hierarchies`
  ADD CONSTRAINT `hierarchies_reporting_to_foreign` FOREIGN KEY (`reporting_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `hierarchies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ticket_categories` (`id`),
  ADD CONSTRAINT `tickets_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD CONSTRAINT `ticket_attachments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD CONSTRAINT `ticket_comments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_reporting_to_foreign` FOREIGN KEY (`reporting_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
