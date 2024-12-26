-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 05:42 AM
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
(23, 1, 'terre', '#ff8a65', 'Neutral', '2024-11-30 23:20:26', '2024-11-30 23:20:26'),
(24, 1, 'eryt', '#ffd54f', 'Neutral', '2024-11-30 23:20:32', '2024-11-30 23:20:32'),
(25, 1, 'rera', '#ffd54f', 'Neutral', '2024-11-30 23:20:37', '2024-11-30 23:20:37'),
(26, 1, 'trtrtr', '#ff8a65', 'Neutral', '2024-11-30 23:20:42', '2024-11-30 23:20:42'),
(27, 1, 'rretrtre', '#4fc3f7', 'Neutral', '2024-11-30 23:20:46', '2024-11-30 23:20:46'),
(28, 1, 'retretretr', '#ba68c8', 'Neutral', '2024-11-30 23:20:51', '2024-11-30 23:20:51'),
(29, 2, 'wgegre', '#ba68c8', 'Neutral', '2024-11-30 23:23:10', '2024-11-30 23:23:10'),
(30, 1, 'ffgrgr', '#ffd54f', 'Neutral', '2024-12-01 19:25:27', '2024-12-01 19:25:27'),
(31, 1, 'jhdjshkg', '#4fc3f7', 'Neutral', '2024-12-01 19:25:34', '2024-12-01 19:25:34');

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
(19, 6, 'neutral', '2024-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','admin','counselor') NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `registered_at`, `updated_at`, `is_active`) VALUES
(1, 'silvy', 'absrdgmrs@gmail.com', '$2y$10$rdBYKau8hsDZnGSisZ/ov.hOBD1TQi53VYH8TzXmOB.NnEbRaAF/q', 'student', '2024-11-20 10:46:20', '2024-11-20 10:46:20', 1),
(2, 'silvy2', 'silvy@gmail.com', '$2y$10$c5QvfF5foRseLKkgrXuTLu34cRjNHcxsjxh9ueqtPD2cl4rgP7Xau', 'student', '2024-11-29 09:11:47', '2024-11-29 09:11:47', 1),
(3, 'usertest', 'test@gmail.com', '$2y$10$6B4i3MAxUvIBI1oi0ymfBujsD4UePKL1yFZ5g3vop10MFVIHV/mRK', 'student', '2024-12-03 09:57:20', '2024-12-03 09:57:20', 1);

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
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mood_checkins`
--
ALTER TABLE `mood_checkins`
  MODIFY `checkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

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
