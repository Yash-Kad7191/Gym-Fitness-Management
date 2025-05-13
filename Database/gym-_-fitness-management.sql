-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 03:38 PM
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
-- Database: `gym-&-fitness-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcements` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `announcement_title`, `announcements`, `dt`) VALUES
(2, 'Covid-19', 'Due To Lockdown Gym Will Remain close for  Month', '2024-03-27 04:28:54'),
(6, 'A new class or program.', 'This could be a new fitness class, a personal training program, or a nutrition program. Be sure to include all the details, such as the date, time, and location of the class or program, as well as the cost and any prerequisites.\r\n', '2024-03-29 06:30:24'),
(7, 'A new member benefit.', 'This could be a discount on memberships, free personal training sessions, or access to new equipment. Be sure to explain the details of the benefit and how members can take advantage of it.', '2024-03-29 06:31:31'),
(8, 'An Event', 'Gym organized An event for tomorrow.', '2024-03-29 06:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `member_id`, `attendance_date`, `status`) VALUES
(5, 1, '2024-03-13', 'Present'),
(12, 4, '2024-03-29', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `username`, `password`, `gender`, `dob`, `mobile_no`, `address`, `email`, `joining_date`) VALUES
(1, 'Yash Kad ', 'Yash', 'Yash@123', 'Male', '2002-01-15', '8888888899', '', 'Yash@gmail.com', '2024-03-26 20:18:00'),
(2, 'Vinayak Keswad', 'vinayak', 'Vinayak@123', 'Male', '2023-04-24', '7878787878', 'MUlshi,pune.', 'Vinayak@gmail.com', '2024-03-27 11:00:39'),
(4, 'User2', 'User2', 'User2@123', 'Female', '2020-01-29', '1122334455', NULL, 'User2@gmail.com', '2024-03-29 05:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `plan_id`, `member_id`, `start_date`, `end_date`, `status`, `date_created`, `amount`) VALUES
(28, 3, 2, '2024-03-29', '2025-03-29', 'Active', '2024-03-29 03:18:36', 10000.00),
(29, 3, 4, '2024-03-29', '2025-03-29', 'Active', '2024-03-29 05:30:51', 10000.00),
(30, 3, 1, '2024-03-29', '2025-03-29', 'Active', '2024-03-29 07:09:37', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `validity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`plan_id`, `plan_name`, `amount`, `description`, `validity`) VALUES
(3, 'Vvip', 10000.00, '✅ Access to all Equipments<br />\n✅ locker<br />\n✅ Steam room<br />\n✅ PT Session Full Time', 12),
(6, 'Basic', 3000.00, '✅Access to all Equipments<br />\n locker<br />\n Steam room<br />\n PT Session Full Time', 2),
(7, 'Standard', 6000.00, '✅ Access to all Equipments<br />\r\n✅ locker<br />\r\n      Steam room<br />\r\n      PT Session Full Time', 5),
(8, 'Vip', 7500.00, '✅ Access to all Equipments<br />\r\n✅ locker<br />\r\n✅ Steam room<br />\r\n      PT Session Full Time', 8);

-- --------------------------------------------------------

--
-- Table structure for table `workout_plans`
--

CREATE TABLE `workout_plans` (
  `plan_id` int(11) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `description` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout_plans`
--

INSERT INTO `workout_plans` (`plan_id`, `day`, `description`, `dt`) VALUES
(20, 'Monday', 'CHEST\r\n\r\nPush-Up - 3sets *15reps\r\nIncline Bench Press - 3sets *15reps\r\nBench Press - 3sets *15reps\r\nDecline Bench Press - 3sets *15reps\r\nSeated Chest Fly - 3sets *15reps\r\n\r\nTRICEP\r\n\r\nBench Press (Close Grip) - 3sets *15reps\r\nOverhead Triceps Extension - 3sets *15reps\r\nSkull Crusher Barbell - 3sets *15reps\r\nTricep Pushdown Band - 3sets *15reps', '2024-03-29 06:23:18'),
(21, 'Tuesday', 'BACK:\r\n\r\nPull Up - 3 Sets x 15 Reps\r\nIncline Row Dumbbell - 3 Sets x 15 Reps\r\nLat Pulldown Cable - 3 Sets x 15 Reps\r\nSeated Row Cable - 3 Sets x 15 Reps\r\nBack Extension - 3 Sets x 15 Reps\r\n', '2024-03-29 06:23:38'),
(22, 'Wednesday', 'BICEPS:\r\n\r\nBicep Curl Dumbbell - 3 Sets x 15 Reps\r\nHammer Curl Dumbbell - 3 Sets x 15 Reps\r\nBicep Curl Barbell - 3 Sets x 15 Reps\r\nPreacher Curl Barbell - 3 Sets x 15 Reps\r\nReverse Curl Cable - 3 Sets x 15 Reps', '2024-03-29 06:23:47'),
(23, 'Thursday', 'LEG\r\n\r\nSquat Barbell - 3sets *15reps\r\nBackward Lunges Dumbbell - 3sets *15reps\r\nStep-up Dumbbell - 3sets *15reps\r\nLeg Extension Machine - 3sets *15reps\r\nLying Leg Curl Machine - 3sets *15reps\r\nLeg Press Machine - 3sets *15reps\r\nSeated Calf Raise - 3sets *15reps', '2024-03-29 06:24:00'),
(24, 'Friday', 'SHOULDER\r\n\r\nLateral Raise Dumbbell - 3sets *15reps\r\nOverhead Press Dumbbell- 3sets *15reps\r\nOverhead Press Barbell - 3sets *15reps\r\nFront Raise Plate - 3sets *15reps\r\n\r\nFOREARMS\r\n\r\nWrist Curl Dumbbell - 3sets *15reps\r\nReverse Wrist Curl Dumbbell - 3sets *15reps', '2024-03-29 06:24:22'),
(25, 'Saturday', 'CARDIO\r\n\r\nWarmup - 10 Min\r\nTreadmill Running - 30 Min\r\nCycling - 30 Min\r\nStretching - 5 Min\r\n', '2024-03-29 06:24:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `workout_plans`
--
ALTER TABLE `workout_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `workout_plans`
--
ALTER TABLE `workout_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plan` (`plan_id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
