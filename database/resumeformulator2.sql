-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 10:08 PM
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
-- Database: `resumeformulator2`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `educ_level` varchar(250) NOT NULL,
  `some_desc` varchar(250) NOT NULL,
  `started` varchar(250) NOT NULL,
  `ended` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `resume_id`, `school_name`, `educ_level`, `some_desc`, `started`, `ended`) VALUES
(1, 1, 'Tayabas Western Academy', 'High School', '', '2015', '2019'),
(2, 1, 'Tayabas Western Academy', 'Senior High School', '', '2019', '2021'),
(3, 1, 'Manuel S. Enverga University Foundation - Candelaria, Inc.', 'College', '', 'Currently Pursuing', 'Currently Pursuing'),
(4, 4, 'Manuel S. Enverga University Foundation - Candelaria, Inc.', '3rd Yr. College', '', '2023', '2024'),
(5, 4, 'Tayabas Western Academy', 'Senior High School', '', '2019', '2021'),
(6, 4, 'Tayabas Western Academy', 'High School', '', '2015', '2019'),
(7, 5, 'Tayabas Western Academy', 'High School', '', '2015', '2019'),
(8, 5, 'Tayabas Western Academy', 'Senior High School', '', '2019', '2021'),
(9, 5, 'Manuel S. Enverga University Foundation - Candelaria, Inc.', '3rd Yr. College', '', '2023', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `position` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `job_desc` text NOT NULL,
  `started` varchar(250) NOT NULL,
  `ended` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `resume_id`, `position`, `company`, `job_desc`, `started`, `ended`) VALUES
(1, 1, 'Commissioner', 'Self', 'Helped developed system for IT/CS/CoE ', 'Currently Pursuing', 'Currently Pursuing'),
(2, 1, 'Associate Software Engineer', 'Accenture', 'We developed embedded systems', '2020', '2021'),
(3, 4, 'Associate Software Engineer', 'Canva', 'We make Canva better', '2021', '2023'),
(4, 4, 'AI Engineer', 'Meta', 'We make Facebook and Messenger AI much better', '2023', '2024'),
(5, 5, 'AI Engineer', 'Meta', 'We develop AI', '2023', '2024'),
(6, 5, 'Graphics Designer', 'Canva', 'We develop ready to use templates', '2022', '2023'),
(7, 5, 'Product Manager', 'Apple', 'We ensure Apple products are quality', '2023', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `birthdate` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `nationality` varchar(250) NOT NULL,
  `contact_no` varchar(16) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `municipality` varchar(250) NOT NULL,
  `barangay` varchar(250) NOT NULL,
  `street` varchar(250) NOT NULL,
  `house_no` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `updated_at` int(20) NOT NULL,
  `resume_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `surname`, `firstname`, `middlename`, `age`, `birthdate`, `gender`, `nationality`, `contact_no`, `email_id`, `province`, `municipality`, `barangay`, `street`, `house_no`, `slug`, `updated_at`, `resume_title`) VALUES
(1, 1, 'Rovero', 'Gil', 'R.', '', '', '', '', '09123123123', 'gilcxx20@gmail.com', 'Quezon, Province', 'Candelaria', 'Barangay Poblacion', 'Ramos Street', '395.', '5i3h4t11eo9spkl7', 1713982354, 'Internship for Canva'),
(4, 2, 'Gil', 'Rovero', '', '21 years old', '', '', 'Filipino', '09123123123', 'test123123123@gmail.com', 'Quezon, Province', 'Candelaria', 'Barangay Poblacion', 'Ramos Street', '395', 'q4tz2232ix8v50h5', 1715712404, 'Canva Apple Software Engineer'),
(5, 2, 'Rovero', 'Gil', 'Ramos', '21', 'September 8, 2002', 'Male', 'Filipino', '09123123123', 'test123123123@gmail.com', 'Quezon, Province', 'Candelaria', 'Barangay Poblacion', 'Ramos Street', '395', '5s07lm813tfh2k4u', 1715714644, 'Microsoft Internship');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `resume_id`, `skill`) VALUES
(1, 1, 'Known Programming Langauges - Rust, C++, C#, Java, Dart'),
(2, 1, 'Basic knowledge in PHP'),
(3, 1, 'SvelteKit'),
(4, 1, 'Rust Tauri'),
(5, 4, 'Known Programming Langauges - Rust, C++, C#, Java, Dart'),
(6, 4, 'Developed eCommerce App with C# Blazor Web Assembly'),
(7, 4, 'Developed GPS'),
(8, 5, 'Basic knowledge in JavaScript'),
(9, 5, 'Known Programming Langauges - Rust, C++, C#, Java, Dart'),
(10, 5, 'Keyboard typer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `confirmpw` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email_id`, `password`, `confirmpw`) VALUES
(1, 'Gil Rovero', 'gil123', 'gil123@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', '46f94c8de14fb36680850768ff1b7f2a'),
(2, 'Gil Rovero', 'heal123', 'heal123@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', '46f94c8de14fb36680850768ff1b7f2a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
