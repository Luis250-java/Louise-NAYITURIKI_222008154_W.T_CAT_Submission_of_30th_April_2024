-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 02:48 PM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
    'student_id' INT PRIMARY KEY,
    'first_name' VARCHAR(50),
    'last_name' VARCHAR(50),
    'reg_number' INT(50),
    'date_of_birth' DATE,
    'email' VARCHAR(100),
    'address' VARCHAR (100),
    'attendance_status' VARCHAR(100),
    'class_section' VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE Admins (
    'admin_id' INT PRIMARY KEY,
    'username' VARCHAR(50) UNIQUE,
    'password' VARCHAR(100),
    'first_name' VARCHAR(50),
    'last_name' VARCHAR(50),
    'email' VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE Teachers (
    'teacher_id' INT PRIMARY KEY,
    'first_name' VARCHAR(50),
    'last_name' VARCHAR(50),
    'date_of_birth' DATE,
    'email' VARCHAR(100),
    'teaching_experiment' INT,
    'subject_taught' VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE Courses (
    'course_id' INT PRIMARY KEY,
    'course_name' VARCHAR(100),
    'course_code' VARCHAR (20),
    'course_description' VRCHAR(100)’
    'teacher_id VARCHAR' (100),
   FOREIGN KEY (teacher_id) REFERENCES Teachers(teacher_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multimedias`
--

CREATE TABLE `multimedia` (
  `mid_id` INT NOT NULL,
  `user_id` INT DEFAULT NULL,
  `media_type` enum('image','video','audio') DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--


CREATE TABLE Attendance (
    'attendance_id' INT PRIMARY KEY,
    'student_id' INT,
    'course_id' INT,
    'attendance_date' DATE,
    'status' ENUM('Present', 'Absent'),
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE Departments (
    'department_id' INT PRIMARY KEY,
    'department_name' VARCHAR(100),
    'department_head' VARCHAR(100),
    'location VARCHAR'(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE UserAccounts (
    'user_id' INT PRIMARY KEY,
    'username' VARCHAR(50) UNIQUE,
    'email' VARCHAR(100) UNIQUE,
    'password' VARCHAR(128), 
    'registration_date' DATE,
    'role' VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;