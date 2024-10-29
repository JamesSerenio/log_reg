-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 03:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `log_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `password`) VALUES
(1, '', 'james', '', '$2y$10$3fz/9zF3aVoYdHzt7RNk0OmUB4vPxGIu2inPqMTY48JRAjoRtyck.'),
(2, 'James Serenio', 'admin', 'janereyes363@gmail.com', '$2y$10$GFGgZHek9..tMuz6qrUSROErKNmXBz1nDR3XjgCGp18/6lQb802zq'),
(3, '', 'james', 'janereyes363@gmail.com', '$2y$10$uWE1B7j54hIarrcb8GHBuO9/KoKGeR3b.0aj91r3LbG5/q4UojqGu'),
(4, 'James cleopas', 'admin', 'janereyes363@gmail.com', '$2y$10$K3IAd6Etpakq2YAHxicKw.ob3GA0sgGJbfcRfFfVZ/0/s3vJt7bwW'),
(5, 'James Serenio', 'james', '', '$2y$10$bZsPDELOjPugobK2Y3qBGuCX4DEmCJx0upbTEyu0uX/YgY8tQsufO'),
(6, 'James Serenio', 'james', 'janereyes363@gmail.com', '$2y$10$Dhv2hYyePKt3pPlctAXHGOJvLypfgsVEOPv5I8jmrOExfIZtfEmQK'),
(7, 'James cleopas', 'admin', 'janereyes363@gmail.com', '$2y$10$4ye9y0Z8lK8fVFI5f8mnzudAbvtYx9/gn626.5vz9foy3HNrSCQJa'),
(8, 'James manayaga', 'james23', 'janereyes363@gmail.com', '$2y$10$U2hFNclm7CujVAxkXcmfzOr9yrLp5qxs9LpaIIh/q2CttJY26j6KO'),
(9, '', 'james233', '', '$2y$10$U8Q.i0fzKSCn3yAYGILqH.D3q0q6R7bOfawjg6GmD.QacJv6D7H4m'),
(10, 'James cleopasss', 'admin', 'dwadaw@wadwa', '$2y$10$38Aa172Ct0Oivr7ILE4w9eMFB8MIkCiKFu3a4CvHTJKxPWyr434TK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
