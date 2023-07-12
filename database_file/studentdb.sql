-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 09:16 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `Course_Name` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `Course_Name`, `Price`) VALUES
(6, 'Grade 9', 4000000),
(7, 'Grade 10', 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `coursedetail`
--

CREATE TABLE `coursedetail` (
  `CourseID` int(11) NOT NULL,
  `ScheduleNO` varchar(20) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `LectureID` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursedetail`
--

INSERT INTO `coursedetail` (`CourseID`, `ScheduleNO`, `RoomID`, `LectureID`, `SubjectID`) VALUES
(6, 'SCH-000001', 4, 3, 10),
(6, 'SCH-000001', 4, 3, 10),
(6, 'SCH-000002', 4, 3, 10),
(6, 'SCH-000002', 4, 3, 10),
(6, 'SCH-000002', 4, 3, 10),
(6, 'SCH-000003', 4, 3, 10),
(6, 'SCH-000003', 4, 3, 10),
(6, 'SCH-000003', 4, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lectureid` int(11) NOT NULL,
  `lecturename` varchar(30) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `lectureprofile` text NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lectureid`, `lecturename`, `qualification`, `lectureprofile`, `phonenumber`, `address`, `startdate`, `email`, `password`) VALUES
(4, 'Daw Bar Bar', 'MGDECES', 'images/correction_pen.PNG', '09446464646', '\r\n		No 12 bar bar nyar nyar Street Yangon			', '0000-00-00', 'b@gmail.com', 'qwer');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` int(11) NOT NULL,
  `RoomNumber` varchar(10) NOT NULL,
  `Available_space` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomNumber`, `Available_space`) VALUES
(3, 'Room 3', '50'),
(4, 'Room 4', '50');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleNo` varchar(20) NOT NULL,
  `ScheduleDate` date NOT NULL,
  `OpenDate` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleNo`, `ScheduleDate`, `OpenDate`, `Time`, `Description`) VALUES
('SCH-000001', '0000-00-00', '2020-07-01', '7am to 12 pm', 'dfsfdsddfssdd'),
('SCH-000002', '0000-00-00', '2020-06-21', '7am to 12 pm', 'dsdsfsdfsd'),
('SCH-000003', '0000-00-00', '2020-06-04', '7am to 12 pm', 'ftfuy');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `StudentName` varchar(30) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Nrc_no` varchar(30) NOT NULL,
  `DateofBirth` date NOT NULL,
  `Qualification` varchar(30) NOT NULL,
  `ParentName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `StudentProfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentName`, `Gender`, `Nrc_no`, `DateofBirth`, `Qualification`, `ParentName`, `Email`, `Password`, `PhoneNumber`, `Address`, `StudentProfile`) VALUES
(2, 'Mike', 'Male', '465465465456', '0000-00-00', 'Grade 9', 'Mr John', 'mike@gmal.com', 'qwer', '0454545198', '', 'images/FB_IMG_1577374207537.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` int(11) NOT NULL,
  `SubjectName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `SubjectName`) VALUES
(10, 'English'),
(11, 'Chemistry'),
(12, 'Physics'),
(13, 'Maths');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD UNIQUE KEY `CourseID` (`CourseID`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lectureid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lectureid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
