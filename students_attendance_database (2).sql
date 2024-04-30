-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 02:39 PM
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
-- Database: `students attendance database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'Andre34', '340', 'Andre', 'Andre34', 'andrerutayisire@gmail'),
(3, 'jeanine12', '677', 'Jeanine', 'UWIMANA', 'uwimanajeanine@gmail.com'),
(4, 'jeannette34', '567', 'Jeannette', 'UWERA', 'uwerajeannette@gmail.com'),
(5, 'Agnes', '800', 'Agnes', 'Agnes', 'angesuwimana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_name` varchar(250) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `status` enum('Present','Absent') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `student_name`, `course_id`, `attendance_date`, `status`) VALUES
(1, 1, 'NAYITURIKI Louise', 1, '2024-04-23', 'Present'),
(2, 2, 'INGABIRE Pascaline', 3, '2024-04-20', 'Absent'),
(3, 3, 'MANZI Huguet', 4, '2024-04-10', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `class_section` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `course_id`, `teacher_id`, `class_section`) VALUES
(1, 'class of math', 3, 3, 'A'),
(2, 'Class of economics', 1, 1, 'B'),
(3, 'Class of IT', 4, 2, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `course_description` varchar(100) DEFAULT NULL,
  `teacher_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_code`, `course_description`, `teacher_id`) VALUES
(1, 'Economics', '009', 'Principles of Economics', '1'),
(3, 'Mathematics', '490', 'Integrals', '3'),
(4, 'InformationTechnology', '440', 'Html', '2'),
(5, 'Business', '400', 'Introduction to business reserch', '1'),
(6, 'English', '409', 'Meeting and report', '2');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `department_head` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_head`, `location`) VALUES
(1, 'BIT', 'John KAMALI', 'HUYE'),
(2, 'IT', 'Jeanne UMUTONI', 'KIGALI'),
(3, 'Mathematics and computer science', 'Elye MANZI', 'RUKARA');

-- --------------------------------------------------------

--
-- Table structure for table `multimedias`
--

CREATE TABLE `multimedias` (
  `mid_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `media_type` varchar(10) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multimedias`
--

INSERT INTO `multimedias` (`mid_id`, `user_id`, `media_type`, `location`, `upload_date`) VALUES
(17, 1, 'Audio', 'C:/Xampp/htdocs/phpcat/audio/Audio 1.mp3', '0000-00-00 00:00:00'),
(18, 1, 'audio', 'C:/Xampp/htdocs/phpcat/audio/My audio.mp3', '2024-04-27 07:41:51'),
(20, 1, 'audio', 'C:/Xampp/htdocs/phpcat/audio/my video 2.mp3', '2024-04-27 07:42:39'),
(22, 1, 'image', 'C:/Xampp/htdocs/phpcat/images/att 4.webp', '2024-04-27 08:21:55'),
(23, 1, 'image', 'C:/Xampp/htdocs/phpcat/images/att 8.jpg', '2024-04-27 08:22:35'),
(24, 1, 'image', 'C:/Xampp/htdocs/phpcat/images/Att.webp', '2024-04-27 08:23:09'),
(25, 1, 'image', 'C:/Xampp/htdocs/phpcat/images/My logo.png', '2024-04-28 08:49:37'),
(26, 1, 'image', 'C:/Xampp/htdocs/phpcat/images/My logo1.png', '2024-04-28 08:50:01'),
(27, 1, 'video', 'C:/Xampp/htdocs/phpcat/Videos/6630ce57a25fd_My video 1.mp4', '2024-04-30 10:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `reg_number` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Class_section` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `reg_number`, `date_of_birth`, `email`, `Address`, `Class_section`) VALUES
(1, 'Louise', 'NAYITURIKI', 222008154, '2003-04-06', 'nayiturikiluis4@gmail.com', 'Rubavu', 'A'),
(2, 'Pascaline', 'INGABIRE', 222003456, '2003-05-16', 'ingabirepaccy@gmail.com', 'Huye', 'A'),
(3, 'Huguet', 'MANZI', 222007986, '2002-09-25', 'manzihuguet@gmail.com', 'Kigali', 'B'),
(4, 'Kevin', 'SHEMA', 222001456, '2002-12-24', 'kevinshema@gmail.com', 'Rubavu', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `teaching_experience` int(11) DEFAULT NULL,
  `subject_taught` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `first_name`, `last_name`, `date_of_birth`, `email`, `teaching_experience`, `subject_taught`) VALUES
(1, 'Alice', 'KAMIKAZI', '1980-07-07', 'alicekami@gmail.com', 15, 'economics'),
(2, 'James', 'HIGIRO', '1983-09-19', 'jameshigiro@gmail.com', 10, 'Information system'),
(3, 'Charles', 'KAMANZI', '1970-03-27', 'kamanzicharles@gmail.com', 20, 'Mathematematics');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`user_id`, `username`, `email`, `password`, `registration_date`, `role`) VALUES
(1, 'lulu3', 'nayiturikiluis4@gmail.com', '$2y$10$nUJTr4UXH2ZQzYyXcLhiR.00bHoQTrM3/B2uBHe4iaa9H7LmHEzxG', '2024-04-27', 'student'),
(2, 'Andre34', 'andrerutayisire@gmail', '$2y$10$fm5VQJKBe6JnLt4vm82EoO2hS14fm96JYtjWN1UY57asuIx/IJZT2', '2024-04-27', 'admin'),
(3, 'Alice250', 'alicekami@gmail.com', '$2y$10$uOoV6jyXNV6/OjYja5SdAuZEUXotzLl97hPYyw6wmBv2N5kT5g7K.', '2024-04-27', 'teacher'),
(4, 'femi', 'femikarry@gmail.com', '$2y$10$Cg5VmosIl1bfNWY52g4bQOqtLsxE2IUmt6kYjtZTsVTvQ2IdZ2qHS', '2024-04-27', 'student'),
(5, 'Alexis1', 'alexiskalis@gmail', '$2y$10$RQWbwx6EL8iU4Ht0re3H4er8y3ZpzJquxTcEE3POXckiyZyXNZahq', '2024-04-27', 'admin'),
(6, 'Anne', 'annemarie@gmail.com', '$2y$10$qXdhc0bQhj0viG4yGzshxOdz2g2jomKug3xn.3aZMF8Xv64TSEUWu', '2024-04-27', 'teacher'),
(7, 'keke', 'kevinshema@gmail.com', '$2y$10$eKf/De24YauFz2Zwejl9/e8iySM7YMLusEwgWUoOmiSXo7sfgLTGe', '2024-04-27', 'student'),
(8, 'Kayitesi89', 'kayitesi@gmail.com', '$2y$10$ASA3JtBk9GYL4sCEfK.MSOTwnWhpt7kw1GIqoofiHOCyw2uJtqeXe', '2024-04-27', 'admin'),
(9, 'aime', 'aine@gmail.com', '$2y$10$NUBgjHUktA0xL2HzWjgxH.Nus4Qqzv3giAzbqpQrexQkwBQbnoneW', '2024-04-27', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `multimedias`
--
ALTER TABLE `multimedias`
  ADD PRIMARY KEY (`mid_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multimedias`
--
ALTER TABLE `multimedias`
  MODIFY `mid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
