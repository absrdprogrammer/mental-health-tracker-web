-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 05:11 AM
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
  `status` enum('pending','confirmed','canceled','finished') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `psychologist_id`, `booking_date`, `booking_time`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(67, 2, 9, '2025-01-09', '16:15:00', 'confirmed', NULL, '2025-01-07 06:15:28', '2025-01-07 06:18:07'),
(69, 14, 8, '2025-01-01', '09:25:00', 'finished', NULL, '2025-01-07 09:22:45', '2025-01-17 09:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `journal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `color` varchar(7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`journal_id`, `user_id`, `content`, `color`, `created_at`, `updated_at`) VALUES
(35, 1, 'jkjk', '#ff8a65', '2024-12-05 16:55:08', '2024-12-05 16:55:08'),
(36, 1, 'defe', '#ffd54f', '2025-01-01 06:34:22', '2025-01-01 06:34:22'),
(39, 2, 'Today, I am very happy', '#ffd54f', '2025-01-07 06:53:59', '2025-01-07 06:54:08'),
(40, 12, 'test', '#ffd54f', '2025-01-07 08:13:07', '2025-01-07 08:13:07');

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
(19, 1, 'sfesfrerewr', '#ba68c8', '2024-12-02 09:55:44', '2024-12-02 09:55:44'),
(20, 2, 'dfsfef', '#f472b6', '2025-01-07 13:25:25', '2025-01-07 13:25:25'),
(21, 12, 'hii', '#3b82f6', '2025-01-07 15:13:35', '2025-01-07 15:13:35'),
(22, 14, 'Semangat ya', '#ffd54f', '2025-01-07 16:21:16', '2025-01-07 16:21:16');

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
(29, 9, 'happy', '2025-01-03'),
(30, 2, 'neutral', '2025-01-04'),
(32, 10, 'happy', '2025-01-04'),
(33, 2, 'neutral', '2025-01-05'),
(34, 2, 'neutral', '2025-01-06'),
(35, 7, 'happy', '2025-01-07'),
(37, 12, 'neutral', '2025-01-07'),
(39, 14, 'happy', '2025-01-07'),
(41, 2, 'happy', '2025-03-10'),
(42, 2, 'happy', '2025-05-11'),
(43, 2, 'happy', '2025-06-15');

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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `clinic_location` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psikolog`
--

INSERT INTO `psikolog` (`id`, `email`, `full_name`, `dob`, `gender`, `password`, `photo`, `certificate`, `created_at`, `updated_at`, `clinic_location`, `is_active`) VALUES
(8, 'ardiansyah@gmail.com', 'Dr. Ardiansyah Rahman', '1992-01-16', 'male', '$2y$10$.zBuWnDiTiQi6HY8mWcQwe.W/Zw1MI67.8PHVDONRGXxSL/NwTAUm', '1736229834_psikolog-male.jpg', '1736229834_agegender.pdf', '2025-01-07 06:03:54', '2025-01-07 13:08:44', 'Jl. Merdeka No. 10, Bekasi Barat, Bekasi, Jawa Barat', 1),
(9, 'livia@gmail.com', 'Dr. Livia Salsabila', '1996-01-30', 'female', '$2y$10$iUDKrRzXahq6wLcW3zLCxeNDksd2zkihId4wJ7OsEYLUbFndgnMnS', '1736229953_female-psikolog.jpg', '1736229953_agegender.pdf', '2025-01-07 06:05:53', '2025-01-07 13:08:50', 'Jl. Raya Cikarang No. 55, Cikarang, Bekasi, Jawa Barat', 1),
(10, 'nadya@gmail.com', 'Dr. Nadya Amalia', '1995-01-07', 'female', '$2y$10$Qz8SJBMq4CJICys9SXYWZu2rE6VcJhJY.TsppOIyQuL8oGa0yGW76', '1736230025_female-psikolog-2.jpg', '1736230025_agegender.pdf', '2025-01-07 06:07:05', '2025-01-07 16:30:06', 'Jl. Prof. Dr. Moestopo No. 12, Bekasi Utara, Bekasi, Jawa Barat', 1),
(11, 'sofia@gmail.com', 'Dr. Sofia Widya', '1997-01-23', 'female', '$2y$10$vSJQiTyAR3jowoUCW11qyOZ1M.Fav02f.FoLeMFoGftNhNKxCswDi', '1736241964_female-psikolog-3.jpg', '1736241964_agegender.pdf', '2025-01-07 09:26:04', '2025-01-07 16:30:42', 'Jl. Pahlawan No. 45, Bekasi Selatan, Bekasi, Jawa Barat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(10) DEFAULT 1,
  `dob` date NOT NULL,
  `gender` enum('Perempuan','Laki-laki') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `role`, `created_at`, `updated_at`, `is_active`, `dob`, `gender`) VALUES
(1, 'silvy', 'absrdgmrs@gmail.com', '$2y$10$rdBYKau8hsDZnGSisZ/ov.hOBD1TQi53VYH8TzXmOB.NnEbRaAF/q', 'user', '2024-11-20 17:46:20', '2024-12-25 03:38:20', 1, '0000-00-00', ''),
(2, 'silvy2', 'silvy@gmail.com', '$2y$10$c5QvfF5foRseLKkgrXuTLu34cRjNHcxsjxh9ueqtPD2cl4rgP7Xau', 'user', '2024-11-29 16:11:47', '2024-12-25 03:38:20', 1, '0000-00-00', ''),
(3, 'usertest', 'test@gmail.com', '$2y$10$6B4i3MAxUvIBI1oi0ymfBujsD4UePKL1yFZ5g3vop10MFVIHV/mRK', 'user', '2024-12-03 16:57:20', '2024-12-25 03:38:20', 1, '0000-00-00', ''),
(7, 'silvy123', 'silvy123@gmail.com', '$2y$10$iwgUfqkkh0Fo891nv25NB.65xqtc8LZ.kmNNUy/oWfJioyJIl0RI.', 'user', '2025-01-03 10:02:52', '2025-01-03 03:02:52', 1, '0000-00-00', ''),
(8, 'Silvy', 'silvyadm@gmail.com', '$2y$10$wGF6Ow2LY8LMp4DzlRxHwuFoMS1j0gY9v9dlg3d1Nvm/Oox7ZbTmC', 'user', '2025-01-03 16:37:20', '2025-01-03 09:37:20', 1, '2025-01-14', ''),
(9, 'Silvy', 'silvyy@gmail.com', '$2y$10$JqGT8QXOd6WFF8GmIRxmgOcvS92SZwq.59EvtjB/im3fVDOLVToXS', 'user', '2025-01-03 17:48:15', '2025-01-03 10:48:15', 1, '2003-01-10', ''),
(10, 'Silvy Indah Cahyani', 'admin123@gmail.com', '$2y$10$rgDrf3KkZGieoPD0Qbrd3uI6swfKLrq0oP1Povy2LJQwbiuk/7Uyu', 'user', '2025-01-04 19:34:20', '2025-01-04 12:34:20', 1, '2025-01-21', ''),
(11, 'admin 1', 'admin1@gmail.com', '$2y$10$R5dzM6WVAL1lSbdUH9eGb./vPToO4x3Hj.8Llefk7VuDjtGBDW39e', 'admin', '2025-01-06 21:49:31', '2025-01-06 14:49:31', 1, '0000-00-00', ''),
(12, 'rahma sayidah', 'rahma@gmail.com', '$2y$10$waCHlxOzt9WXZgSGYtAOWeBy91URbUsMkcwReiAzpepVa./tj/jpO', 'user', '2025-01-07 15:12:10', '2025-01-07 08:12:10', 1, '2002-01-09', ''),
(13, 'admin2', 'admin2@gmail.com', '$2y$10$K/oeVHWXBW70HtQa.2f46O3CZvXzXA2uhQ6zwjVbhU9gBV7yCGq4K', 'admin', '2025-01-07 15:15:33', '2025-01-07 08:15:33', 1, '0000-00-00', 'Perempuan'),
(14, 'Asya Herawati', 'asya@gmail.com', '$2y$10$5h3nWlymrYp.Oh1W.4o8MOu4YZ7je5eRjji3zjbMMOC6DNo499MTm', 'user', '2025-01-07 16:18:25', '2025-01-07 09:18:25', 1, '2004-01-14', '');

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
  ADD KEY `fk_psychologist_id` (`psychologist_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mood_checkins`
--
ALTER TABLE `mood_checkins`
  MODIFY `checkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `psikolog`
--
ALTER TABLE `psikolog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `fk_psychologist_id` FOREIGN KEY (`psychologist_id`) REFERENCES `psikolog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_booking_status` ON SCHEDULE EVERY 1 SECOND STARTS '2025-01-06 08:12:31' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE bookings
    SET status = 'finished'
    WHERE status = 'confirmed'
      AND CONCAT(booking_date, ' ', booking_time) <= NOW();
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
