-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 03:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mindful_matters`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `psychologist_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `status` enum('pending','confirmed','canceled') DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `psychologist_id`, `booking_date`, `booking_time`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(4, 8, 1, '2025-01-15', '20:56:00', 'confirmed', NULL, '2025-01-03 09:56:19', '2025-01-03 15:34:50'),
(5, 9, 1, '2025-01-16', '22:41:00', 'confirmed', NULL, '2025-01-03 15:36:09', '2025-01-03 15:49:07'),
(6, 2, 1, '2025-01-15', '22:58:00', 'canceled', 'tidak bisa', '2025-01-03 15:54:15', '2025-01-03 15:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `journal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `color` varchar(7) NOT NULL,
  `sentiment` enum('Positive','Neutral','Negative') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`journal_id`, `user_id`, `content`, `color`, `sentiment`, `created_at`, `updated_at`) VALUES
(29, 2, 'wgegre', '#ba68c8', 'Neutral', '2024-11-30 23:23:10', '2024-11-30 23:23:10'),
(35, 1, 'jkjk', '#ff8a65', 'Neutral', '2024-12-05 16:55:08', '2024-12-05 16:55:08'),
(36, 1, 'defe', '#ffd54f', 'Neutral', '2025-01-01 06:34:22', '2025-01-01 06:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `color` varchar(7) DEFAULT '#ffffff',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_id`, `content`, `color`, `created_at`, `updated_at`) VALUES
(9, 1, 'This is a test message for card display.', '#4fc3f7', '2024-12-02 10:48:55', '2024-12-02 10:48:55'),
(10, 1, 'Another journal entry to check the style.', '#ffd54f', '2024-12-02 10:48:55', '2024-12-02 10:48:55'),
(11, 1, 'Feeling a little down today, but pushing through.', '#ff8a65', '2024-12-02 10:48:55', '2024-12-02 10:48:55'),
(12, 1, 'Excited for the new challenges ahead!', '#ba68c8', '2024-12-02 10:48:55', '2024-12-02 10:48:55'),
(13, 1, 'hjfhjgf', '#ffd54f', '2024-12-02 05:41:47', '2024-12-02 05:41:47'),
(14, 1, 'tretret', '#ba68c8', '2024-12-02 09:54:35', '2024-12-02 09:54:35'),
(15, 1, 'frtretret', '#ba68c8', '2024-12-02 09:54:43', '2024-12-02 09:54:43'),
(16, 1, 'dsfsdfds', '#ffd54f', '2024-12-02 09:54:51', '2024-12-02 09:54:51'),
(17, 1, 'sfdsffr', '#3b82f6', '2024-12-02 09:54:59', '2024-12-02 09:54:59'),
(18, 1, 'fesfre', '#ba68c8', '2024-12-02 09:55:13', '2024-12-02 09:55:13'),
(19, 1, 'sfesfrerewr', '#ba68c8', '2024-12-02 09:55:44', '2024-12-02 09:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `mood_checkins`
--

CREATE TABLE `mood_checkins` (
  `checkin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mood` enum('sad','neutral','happy') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mood_checkins`
--

INSERT INTO `mood_checkins` (`checkin_id`, `user_id`, `mood`, `date`) VALUES
(1, 1, 'sad', '2024-12-01'),
(2, 2, 'happy', '2024-12-01'),
(3, 3, 'neutral', '2024-12-01'),
(4, 1, 'sad', '2024-12-02'),
(5, 2, 'neutral', '2024-12-02'),
(6, 3, 'happy', '2024-12-02'),
(7, 1, 'happy', '2024-12-03'),
(8, 2, 'sad', '2024-12-03'),
(9, 3, 'neutral', '2024-12-03'),
(10, 1, 'neutral', '2024-12-04'),
(11, 4, 'sad', '2024-12-01'),
(12, 5, 'sad', '2024-12-01'),
(13, 6, 'sad', '2024-12-01'),
(14, 4, 'sad', '2024-12-02'),
(15, 5, 'neutral', '2024-12-02'),
(16, 6, 'neutral', '2024-12-02'),
(17, 4, 'happy', '2024-12-03'),
(18, 5, 'happy', '2024-12-03'),
(19, 6, 'neutral', '2024-12-03'),
(20, 1, 'sad', '2025-01-03'),
(25, 7, 'sad', '2025-01-03'),
(28, 8, 'neutral', '2025-01-03'),
(29, 9, 'happy', '2025-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `psikolog`
--

CREATE TABLE `psikolog` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psikolog`
--

INSERT INTO `psikolog` (`id`, `email`, `full_name`, `dob`, `gender`, `password`, `photo`, `certificate`, `created_at`, `updated_at`) VALUES
(1, 'psikolog4@gmail.com', 'psikolog', '2025-01-07', 'Laki-laki', '$2y$10$iZIwhZaeGmcqPSj3uq.NLu9Ynym3pU1u0KN4ko9SiKJ.QjDnnrs2y', '1735886235_GWQESVnWwAAjxhA.jpeg', '1735886235_esp32_schematic_example.pdf', '2025-01-03 06:37:15', '2025-01-03 16:15:55'),
(2, 'psikolog7@gmail.com', 'psikolog7', '2025-01-28', 'Laki-laki', '$2y$10$eHUWbfm7BRIumR.mLA/j2uGJn6ae9KxGPH0mT/KchLDkzQFRw4.q6', '1735887749_GXaD1YdbwAINyGq.jpeg', '1735887749_esp32_schematic_example.pdf', '2025-01-03 07:02:29', '2025-01-03 16:15:55'),
(3, 'psikolog8@gmail.com', 'psikolog8', '2025-01-14', 'Laki-laki', '$2y$10$KFqhPwo0YKrlbmlejS5BM.O4uJLy0jE42yFgWAa0c2kCfQdUpUCfu', '1735894279_Screenshot_(1).png', '1735894279_esp32_schematic_example.pdf', '2025-01-03 08:51:19', '2025-01-03 16:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','psikolog') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(10) DEFAULT 1,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `role`, `created_at`, `updated_at`, `is_active`, `dob`, `gender`) VALUES
(1, 'silvy', 'absrdgmrs@gmail.com', '$2y$10$rdBYKau8hsDZnGSisZ/ov.hOBD1TQi53VYH8TzXmOB.NnEbRaAF/q', 'user', '2024-11-20 17:46:20', '2024-12-25 03:38:20', 1, '0000-00-00', 'male'),
(2, 'silvy2', 'silvy@gmail.com', '$2y$10$c5QvfF5foRseLKkgrXuTLu34cRjNHcxsjxh9ueqtPD2cl4rgP7Xau', 'user', '2024-11-29 16:11:47', '2024-12-25 03:38:20', 1, '0000-00-00', 'male'),
(3, 'usertest', 'test@gmail.com', '$2y$10$6B4i3MAxUvIBI1oi0ymfBujsD4UePKL1yFZ5g3vop10MFVIHV/mRK', 'user', '2024-12-03 16:57:20', '2024-12-25 03:38:20', 1, '0000-00-00', 'male'),
(7, 'silvy123', 'silvy123@gmail.com', '$2y$10$iwgUfqkkh0Fo891nv25NB.65xqtc8LZ.kmNNUy/oWfJioyJIl0RI.', 'user', '2025-01-03 10:02:52', '2025-01-03 03:02:52', 1, '0000-00-00', 'male'),
(8, 'Silvy', 'silvyadm@gmail.com', '$2y$10$wGF6Ow2LY8LMp4DzlRxHwuFoMS1j0gY9v9dlg3d1Nvm/Oox7ZbTmC', 'user', '2025-01-03 16:37:20', '2025-01-03 09:37:20', 1, '2025-01-14', 'female'),
(9, 'Silvy', 'silvyy@gmail.com', '$2y$10$JqGT8QXOd6WFF8GmIRxmgOcvS92SZwq.59EvtjB/im3fVDOLVToXS', 'user', '2025-01-03 17:48:15', '2025-01-03 10:48:15', 1, '2003-01-10', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `psychologist_id` (`psychologist_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mood_checkins`
--
ALTER TABLE `mood_checkins`
  ADD PRIMARY KEY (`checkin_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`date`),
  ADD UNIQUE KEY `unique_user_date` (`user_id`,`date`);

--
-- Indexes for table `psikolog`
--
ALTER TABLE `psikolog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mood_checkins`
--
ALTER TABLE `mood_checkins`
  MODIFY `checkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `psikolog`
--
ALTER TABLE `psikolog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`psychologist_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
