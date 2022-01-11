-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 02:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eexams`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `question_id` int(4) NOT NULL,
  `mark` int(4) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `title`, `question_id`, `mark`, `datecreated`) VALUES
(5, 'Answer one to test', 5, 10, '2018-07-23 15:41:02'),
(6, 'answer two to test', 5, 0, '2018-07-23 15:41:02'),
(7, 'answer three close to right', 5, 5, '2018-07-23 15:41:02'),
(8, 'Language C#', 6, 20, '2018-07-24 18:09:54'),
(9, 'Language HTML', 6, 0, '2018-07-24 18:09:54'),
(10, 'Language SQL', 6, 0, '2018-07-24 18:09:54'),
(11, 'Language XML', 6, 0, '2018-07-24 18:09:54'),
(12, 'Language HTML', 2, 0, '2018-07-24 18:09:54'),
(13, 'Language SQL', 2, 0, '2018-07-24 18:09:54'),
(14, 'Language XML', 2, 0, '2018-07-24 18:09:54'),
(15, 'Answer one correct', 1, 10, '2022-01-11 13:29:14'),
(16, 'Answer two not correct', 1, 0, '2022-01-11 13:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `title` varchar(30) NOT NULL,
  `allowed_time` int(4) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `user_id`, `title`, `allowed_time`, `datecreated`) VALUES
(1, 3, 'Math Test L4', 45, '2018-07-01 07:05:55'),
(2, 3, 'Math Test L2', 30, '2018-07-01 07:05:55'),
(3, 5, 'physics test', 60, '2018-07-22 16:41:20'),
(5, 5, 'new test test', 50, '2018-07-23 05:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `exam_id` int(4) NOT NULL,
  `question_type` int(4) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `exam_id`, `question_type`, `datecreated`) VALUES
(1, 'this question one', 3, 1, '2018-07-23 05:33:12'),
(2, 'this question two', 3, 0, '2018-07-23 05:33:12'),
(5, 'which of following is not a programming language?', 3, 1, '2018-07-23 15:21:32'),
(6, 'which of following is a programming language?', 5, 0, '2018-07-24 18:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `students_log`
--

CREATE TABLE `students_log` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `exam_id` int(4) NOT NULL,
  `total_mark` int(4) NOT NULL,
  `time_taken` int(4) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_log`
--

INSERT INTO `students_log` (`id`, `user_id`, `exam_id`, `total_mark`, `time_taken`, `datecreated`) VALUES
(1, 2, 2, 0, 195, '2022-01-11 13:24:35'),
(2, 2, 1, 0, 2, '2022-01-11 13:25:00'),
(3, 2, 3, 0, 101, '2022-01-11 13:26:47'),
(4, 2, 3, 15, 43, '2022-01-11 13:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image_path` varchar(128) NOT NULL,
  `admin` int(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_address`, `user_name`, `password`, `image_path`, `admin`, `date_created`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 0, '2018-04-12 09:21:43'),
(2, 'Test', 'Test', 'user@user.com', 'user', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 3, '2018-04-22 09:35:13'),
(3, 'Tutor', 'Tutor', 'asdsada@ads.sada', 'tutor', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, '2018-06-30 18:12:17'),
(4, 'Tutor1', 'Tutor1', 'mm@mm.ss', 'tutor1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, '2018-06-30 18:20:38'),
(5, 'Tutor2', 'Tutor2', 'ahmad@ahmad.com', 'tutor2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 1, '2018-07-22 16:33:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_log`
--
ALTER TABLE `students_log`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students_log`
--
ALTER TABLE `students_log`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
