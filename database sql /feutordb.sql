-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2024 at 11:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feutordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(1, 'feuradmin', 'feutor24');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `firstname`, `lastname`, `email`, `password`, `created_at`) VALUES
(1, 'REIZSA', 'MARTINEZ', 'reizsakaryllmartinez1230@gmail.com', '$2y$10$qeKNVUUrbJmRqjxEZhGK1Obw12efBkeh7iFgO75rJ9nnFRJR4N0j.', '2024-02-27 16:34:25'),
(2, 'kendall', 'jenner', 'kendalljenner@gmail.com', '$2y$10$qCHTE2o0qWrPsSn5nOmj3uU/VPqZTvwmIB9eWsjAQJdXZuFzvtsVm', '2024-02-27 16:37:24'),
(3, 'lhy', 'red', 'lhyred@gmail.com', '$2y$10$X0QCm6byZnYe0ne2kfc1SeSGFhhjGQ1DTOmrrcanUCXZZ23BA9r9K', '2024-02-27 16:54:16'),
(4, 'leng', 'leng', 'leng@gmail.com', '$2y$10$.j5E0Tb7bMqsXotdV3eCkOg.DjPohsDV02lEIsFeOovEoUssh29dm', '2024-03-06 13:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `category`, `semester`) VALUES
(9, 'Programming', 'College', '1st semester'),
(15, 'Mathematics', 'High School', '1st semester'),
(16, 'Physics', 'High School', '2nd semester'),
(17, 'Biology', 'High School', '1st semester'),
(18, 'Chemistry', 'High School', '2nd semester'),
(19, 'History', 'Senior High School', '1st semester'),
(20, 'Geography', 'Senior High School', '2nd semester'),
(21, 'Literature', 'Senior High School', '1st semester'),
(22, 'Economics', 'Senior High School', '2nd semester'),
(23, 'Computer Science', 'College', '1st semester'),
(24, 'Statistics', 'College', '2nd semester');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload`
--

CREATE TABLE `tb_upload` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_upload`
--

INSERT INTO `tb_upload` (`id`, `name`, `image`) VALUES
(1, 'REIZSA KARYLL NMN MARTINEZ', '65e5e12fad382.png'),
(2, 'REIZSA KARYLL NMN MARTINEZ', '65e5e12fad382.png'),
(3, 'Monica Geller', '65e5e222081d5.png'),
(4, 'Monica Geller', '65e5e222081d5.png'),
(5, 'mnm,m', '65e5efe0a3db5.png'),
(6, 'mnm,m', '65e5efe0a3db5.png'),
(7, 'xxzz', '65e6b6fc3625c.png'),
(8, 'xxzz', '65e6b6fc3625c.png'),
(9, 'REIZSA KARYLL NMN MARTINEZ', '65e6b824a6229.png'),
(10, 'REIZSA KARYLL NMN MARTINEZ', '65e6b824a6229.png'),
(11, 'dsadsasd', '65e6b84eb6dc2.png'),
(12, 'dsadsasd', '65e6b84eb6dc2.png'),
(13, 'kendall jenner', '65e8139f09b88.png'),
(14, 'kendall jenner', '65e8139f09b88.png'),
(15, 'kendall jenner', '65e82f17c2cf3.png'),
(16, 'kendall jenner', '65e82f17c2cf3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutorID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `degreeProgram` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `gdriveLink` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `approvalStatus` enum('Pending','Approved','Declined') NOT NULL DEFAULT 'Pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `profilePicture` varchar(255) DEFAULT NULL,
  `subjectExpertise` varchar(255) DEFAULT NULL,
  `availableDaysTime` varchar(255) DEFAULT NULL,
  `teachingMode` varchar(50) DEFAULT NULL,
  `ratePerHour` decimal(10,2) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutorID`, `firstName`, `lastName`, `email`, `degreeProgram`, `year`, `gdriveLink`, `password`, `approvalStatus`, `created_at`, `profilePicture`, `subjectExpertise`, `availableDaysTime`, `teachingMode`, `ratePerHour`, `bio`) VALUES
(7, 'mico', 'mer', 'mico@gmail.com', 'BSIT', '4', 'https://drive.google.com/drive/u/0/', '$2y$10$ut8.SOQ/qmzIlR3e9GZDuuao2GVLloVFwQE4VSVk.naa9FnOSnIte', 'Approved', '2024-03-02 23:08:17', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Monica', 'Geller', 'missreirei@gmail.com', 'BSIT', '1', 'https://drive.google.com/drive/u/0/', '$2y$10$zT6kxug9Fpg/OI315Sf4M.IW8moSwSj61MkIEZEO6kcyvHMQkTlcu', 'Approved', '2024-03-02 23:16:40', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'aika', 'men', 'aika@gmail.com', 'High School', '10', 'https://drive.google.com/drive/u/0/', '$2y$10$Kn6uZW259Xws29VJZTqaMezi7fpTsHUsIF/bJSKkwML1H8dOgocH6', 'Declined', '2024-03-02 23:21:22', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'ysa', 'jenner', 'ysajenner@gmail.com', 'Senior High School', 'Grade 9', 'https://drive.google.com/drive/u/0/', '$2y$10$G1OhZ/VUqNUiMsD/f1w5C.buHaN3e4WPo0ZFm0PF.qt2cfhzFQDF.', 'Pending', '2024-03-06 14:01:57', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Toni', 'jenner', 'torofam@gmail.com', 'BSBA', '1', 'https://drive.google.com/drive/u/0/', '$2y$10$qto/AfzXOtTgXK0eEDJAT.iWzUJe4PelGAL7ugvNXyU.1d7LyZeny', 'Approved', '2024-03-06 14:02:38', 'img/058da7bfaa50eb8a76636048b5e03c6a.png', 'Mathematics', 'Tuesday - 3:00pm - 5:00pm', 'Online', '213.00', 'whahahah');

-- --------------------------------------------------------

--
-- Table structure for table `tutorprofile`
--

CREATE TABLE `tutorprofile` (
  `tutorProfileID` int(11) NOT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `profilePicture` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `subjectExpertise` varchar(255) DEFAULT NULL,
  `degreeProgram` varchar(255) DEFAULT NULL,
  `availableDaysTime` varchar(255) DEFAULT NULL,
  `teachingMode` varchar(255) DEFAULT NULL,
  `ratePerHour` decimal(10,2) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorprofile`
--

INSERT INTO `tutorprofile` (`tutorProfileID`, `tutorID`, `profilePicture`, `firstName`, `lastName`, `subjectExpertise`, `degreeProgram`, `availableDaysTime`, `teachingMode`, `ratePerHour`, `bio`) VALUES
(6, 11, 'img/42ff645a1b4c55079b38d5cf67248702.png', 'kendall', 'jenner', 'Mathematics', 'BSBA', 'Mon - 3:00pm - 4:00pm', 'Both', '211.00', 'rise and shine'),
(7, 11, 'img/51e5170582d55f8b7cd8c94749954a27.png', 'Toni', 'jenner', 'Physics', 'BSBA', 'Mon - 3:00pm - 4:00pm', 'Both', '2111.00', 'hehe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_upload`
--
ALTER TABLE `tb_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutorID`);

--
-- Indexes for table `tutorprofile`
--
ALTER TABLE `tutorprofile`
  ADD PRIMARY KEY (`tutorProfileID`),
  ADD KEY `tutorID` (`tutorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_upload`
--
ALTER TABLE `tb_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tutorprofile`
--
ALTER TABLE `tutorprofile`
  MODIFY `tutorProfileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tutorprofile`
--
ALTER TABLE `tutorprofile`
  ADD CONSTRAINT `tutorprofile_ibfk_1` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`tutorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
