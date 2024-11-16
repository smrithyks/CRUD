-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_details`
--

CREATE TABLE `agent_details` (
  `id` int(11) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `agent_code` varchar(100) NOT NULL,
  `leader_code` varchar(100) NOT NULL,
  `pin_code` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent_details`
--

INSERT INTO `agent_details` (`id`, `agent_name`, `branch_code`, `agent_code`, `leader_code`, `pin_code`) VALUES
(1, 'BEENA GEORGE	ELLUMPURAM \nAgent Code', '78R', 'LIC0724578R', '208039', '685587');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_files`
--

CREATE TABLE `pdf_files` (
  `id` int(11) NOT NULL,
  `pdf_name` varchar(255) NOT NULL,
  `pdf_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pdf_files`
--

INSERT INTO `pdf_files` (`id`, `pdf_name`, `pdf_path`) VALUES
(1, '1731756928_pdf', 'C:/xampp/htdocs/webinfo/uploads/pdfs/1731756928_pdf.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `policy_details`
--

CREATE TABLE `policy_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `ph_name` varchar(255) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `policy_no` varchar(50) NOT NULL,
  `pin_tm` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `risk_date` date NOT NULL,
  `cbo` varchar(50) NOT NULL,
  `adj_date` date NOT NULL,
  `premium` varchar(50) NOT NULL,
  `commission` varchar(50) NOT NULL,
  `pdf_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy_details`
--

INSERT INTO `policy_details` (`id`, `user_id`, `agent_id`, `ph_name`, `short_name`, `policy_no`, `pin_tm`, `due_date`, `risk_date`, `cbo`, `adj_date`, `premium`, `commission`, `pdf_id`) VALUES
(3, 1, 0, 'DEF', 'D', '324', '355', '2024-11-22', '2024-11-21', '466', '2024-11-30', '2000', '500', 0),
(2, 1, 0, 'ABC', 'A', '344', '234', '2024-11-19', '2024-11-20', '133', '2024-11-30', '1000', '200', 0),
(4, 1, 0, 'Aravind Kumar Krishna', 'Aravind K. K.', '466', '7890', '2024-11-29', '2024-11-30', '112', '2024-11-28', '5000', '1000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'testuser', '$2y$10$uxdQcp729KR/UL/nE42jK.pJuzQCouzQj.oFta9dEpFd0ocTu/QJe', 'testuser@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_details`
--
ALTER TABLE `agent_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_files`
--
ALTER TABLE `pdf_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_details`
--
ALTER TABLE `policy_details`
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
-- AUTO_INCREMENT for table `agent_details`
--
ALTER TABLE `agent_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pdf_files`
--
ALTER TABLE `pdf_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `policy_details`
--
ALTER TABLE `policy_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
