-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 04:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_people`
--

CREATE TABLE `assign_people` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_people`
--

INSERT INTO `assign_people` (`id`, `user_id`, `project_id`, `assigned_by`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 2, NULL, NULL),
(7, 12, 10, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_tasks`
--

CREATE TABLE `assign_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `taskName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taskCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dueDate` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_tasks`
--

INSERT INTO `assign_tasks` (`id`, `taskName`, `taskCode`, `project_id`, `user_id`, `assigned_by`, `description`, `dueDate`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(5, 'UI Development', 'T1001', 2, 4, 'Anower Hossain', 'rgt', '2018-11-30', 'In Progress', 'High', NULL, NULL),
(6, 'delete module change', 'T1002', 5, 5, 'Anower Hossain', 'fh', '2018-11-30', 'In Progress', 'High', NULL, NULL),
(10, 'Image Color Change', 'T1003', 10, 4, 'Anower Hossain', 'test', '2018-12-31', 'Completed', 'High', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commented_by` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `project_id`, `task_id`, `user_id`, `commented_by`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 4, 'Hello ', '2018-11-24 01:35:59', '2018-11-24 01:35:59'),
(2, 2, 5, 4, 4, 'hi!!', '2018-11-24 02:23:07', '2018-11-24 02:23:07'),
(3, 6, 7, 8, 9, 'hi!!!!!!!!!', '2018-12-05 14:33:22', '2018-12-05 14:33:22'),
(5, 10, 10, 4, 4, 'test!!', '2018-12-11 23:08:39', '2018-12-11 23:08:39');

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
(1, '2018_10_21_212721_create_users_table', 1),
(2, '2018_10_31_070726_create_projects_table', 1),
(3, '2018_11_09_102929_create_assign_people_table', 1),
(4, '2018_11_10_070235_create_assign_tasks_table', 1),
(5, '2018_11_16_173115_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `uploadDocument` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectName`, `codeName`, `description`, `startDate`, `endDate`, `duration`, `uploadDocument`, `status`, `created_at`, `updated_at`) VALUES
(2, 'School Management System', 'P1001', 'freg', '2018-11-24', '2018-11-30', 6, NULL, 'Started', NULL, NULL),
(7, 'ShuffleHex', 'P1006', 'Shuffke Hex Is An .............', '2018-12-07', '2019-09-28', 21, NULL, 'Started', NULL, NULL),
(10, 'TEST', 'P1007', 'test', '2018-12-12', '2018-12-27', 15, NULL, 'Started', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `dateOfBirth`, `designation`, `status`, `gender`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, '	VICTOR STANY ROZARIO', 'Admin', '123456', 'stany@aiub.edu', '2018-11-15', 'Admin', 'Active', 'Male', 'images/profilePicture/stany20181123162410.jpg', '1990-11-22 18:00:00', '2018-11-22 18:00:00'),
(2, 'Anower Hossain', 'anower', '123456', 'anower.hasan@gmail.com', '1993-12-07', 'Project Manager', 'Active', 'male', 'images/profilePicture/anower20181123162634.jpg', NULL, NULL),
(3, 'Maeesha Akhand', 'maesha', '123456', 'maesha@gmail.com', '1993-04-18', 'Team Lead', 'Active', 'female', 'images/profilePicture/27540077_10213411371471882_6752128172786968506_n20181123163119.jpg', NULL, NULL),
(4, 'Alvi Haque', 'alvi', '123456', 'alvi@gmail.com', '1995-06-23', 'Developer', 'Active', 'male', 'images/profilePicture/alvi20181123163408.jpg', NULL, NULL),
(5, 'Tonmoy Billah', 'tonmoy', '123456', 'tonmoy@gmail.com', '1994-04-16', 'UX Engineer', 'Active', 'male', 'images/profilePicture/tonmoy20181123163548.jpg', NULL, NULL),
(9, 'alamgir hossain', 'alamgir', '123456', 'alamgir@gmail.com', '2018-12-14', 'Project Manager', 'Active', 'male', NULL, NULL, NULL),
(10, 'Borhan tipu', 'tipu', '123456', 't.rashid727@gmail.com', '1995-12-13', 'Project Manager', 'Active', 'male', NULL, NULL, NULL),
(12, 'hasan', 'hasan', '123456', 'hasan@gmail.com', '1994-12-13', 'Project Manager', 'Active', 'male', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_people`
--
ALTER TABLE `assign_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_tasks`
--
ALTER TABLE `assign_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `assign_people`
--
ALTER TABLE `assign_people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assign_tasks`
--
ALTER TABLE `assign_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
