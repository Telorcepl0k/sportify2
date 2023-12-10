
-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 16, 2018 at 05:30 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportify`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

-- Create the User table
CREATE TABLE `User` (
  `UserID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Height` int(11) DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL,
  `TargetWeight` int(11) DEFAULT NULL,
  `FitnessLevel` varchar(20) DEFAULT NULL,
  `FocusAreas` varchar(255) DEFAULT NULL,
  `Goal` varchar(50) DEFAULT NULL,
  `RegistrationDate` date DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the User table
INSERT INTO `User` (UserID, Username, Password, FirstName, LastName, Email, DateOfBirth, Gender, Height, Weight, TargetWeight, FitnessLevel, FocusAreas, Goal, RegistrationDate)
VALUES
  (1, 'john_doe', 'password123', 'John', 'Doe', 'john.doe@email.com', '1990-05-15', 'Male', 175, 75, 70, 'Intermediate', 'Cardio,Strength', 'Weight Loss', '2023-01-01'),
  (2, 'jane_smith', 'pass456', 'Jane', 'Smith', 'jane.smith@email.com', '1985-08-20', 'Female', 160, 60, 55, 'Beginner', 'Yoga', 'Flexibility', '2023-01-05'),
  (3, 'alex_jones', 'abc123', 'Alex', 'Jones', 'alex.jones@email.com', '1995-03-10', 'Male', 185, 80, 78, 'Advanced', 'Cardio,Strength,Yoga', 'Muscle Gain', '2023-01-10');

-- Create Student Table
CREATE TABLE `Student` (
  `StudentID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `StudentCode` varchar(20) NOT NULL,
  `IsCollegeStudent` boolean NOT NULL,
  PRIMARY KEY (`StudentID`),
  FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the Student table
INSERT INTO `Student` (StudentID, UserID, StudentCode, IsCollegeStudent)
VALUES
  (1, 1, 'STU123', true),
  (3, 2, 'STU789', false);  -- Assuming the third user is not a college student

-- Create Staff Table
CREATE TABLE `Staff` (
  `StaffID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `StaffCode` varchar(20) NOT NULL,
  `Position` varchar(50) NOT NULL,
  PRIMARY KEY (`StaffID`),
  FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the Staff table
INSERT INTO `Staff` (StaffID, UserID, StaffCode, Position)
VALUES
  (1, 3, 'STAFF001', 'lecturer');
  

-- --------------------------------------------------------

--
-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

-- Create the Equipment table
CREATE TABLE `Equipment` (
  `EquipmentID` int(11) unsigned NOT NULL,
  `EquipmentName` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EquipmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
-- Insert data into the Equipment table
INSERT INTO `Equipment` (EquipmentID, EquipmentName, Description)
VALUES
  (1, 'Treadmill', 'Cardio equipment for running or walking'),
  (2, 'Dumbbells', 'Weight training equipment for strength exercises'),
  (3, 'Yoga Mat', 'Mat for yoga and stretching exercises');

-- --------------------------------------------------------

--
-- Table structure for table `user_workout_log_equipment`
--

-- Create the User_Workout_Log_Equipment table with Duration column
CREATE TABLE `User_Workout_Log_Equipment` (
  `LogID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `EquipmentID` int(11) unsigned NOT NULL,
  `Duration` int(11) NOT NULL, -- Duration of using the equipment in minutes
  PRIMARY KEY (`LogID`),
  FOREIGN KEY (`EquipmentID`) REFERENCES `Equipment` (`EquipmentID`),
  FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the User_Workout_Log_Equipment table
INSERT INTO `User_Workout_Log_Equipment` (LogID, UserID, EquipmentID, Duration)
VALUES
  (1, 1, 1, 20), -- User 1 used Treadmill for 20 minutes in the first workout
  (2, 2, 2, 25), -- User 1 used Dumbbells for 25 minutes in the second workout
  (3, 3, 3, 30); -- User 2 used Yoga Mat for 30 minutes in the third workout
  

-- Table structure for table `workout program`
--

-- Create the WorkoutProgram table
CREATE TABLE `WorkoutProgram` (
  `ProgramID` int(11) unsigned NOT NULL,
  `ProgramName` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Goal` varchar(50) NOT NULL,
  PRIMARY KEY (`ProgramID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the WorkoutProgram table
INSERT INTO `WorkoutProgram` (ProgramID, ProgramName, Description, Duration, Goal)
VALUES
  (1, 'Cardio Blast', 'High-intensity cardio workout', 30, 'Weight Loss'),
  (2, 'Strength Training', 'Build muscle and strength', 45, 'Muscle Gain'),
  (3, 'Yoga Relaxation', 'Gentle yoga for relaxation', 60, 'Flexibility');


-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

-- Create the User_Workout_Registration table
CREATE TABLE `User_Workout_Registration` (
  `RegistrationID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `ProgramID` int(11) unsigned NOT NULL,
  `RegistrationDate` date NOT NULL,
  PRIMARY KEY (`RegistrationID`),
  FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  FOREIGN KEY (`ProgramID`) REFERENCES `WorkoutProgram` (`ProgramID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the User_Workout_Registration table
INSERT INTO `User_Workout_Registration` (RegistrationID, UserID, ProgramID, RegistrationDate)
VALUES
  (1, 1, 1, '2023-01-02'),
  (2, 1, 2, '2023-01-03'),
  (3, 2, 1, '2023-01-06');
  

-- --------------------------------------------------------

--
-- table structure for table `workout_log`
--
-- Create the User_Workout_Log table
CREATE TABLE `User_Workout_Log_Program` (
  `LogID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `ProgramID` int(11) unsigned NOT NULL,
  `Date` date NOT NULL,
  `Duration` int(11) NOT NULL,
  `CaloriesBurned` int(11) NOT NULL,
  `Completed` BOOLEAN NOT NULL,
  PRIMARY KEY (`LogID`),
  FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  FOREIGN KEY (`ProgramID`) REFERENCES `WorkoutProgram` (`ProgramID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the User_Workout_Log table
INSERT INTO `User_Workout_Log_Program` (LogID, UserID, ProgramID, Date, Duration, CaloriesBurned, Completed)
VALUES
  (1, 1, 1, '2023-01-02', 30, 300, true),
  (2, 1, 2, '2023-01-03', 45, 400, true),
  (3, 2, 1, '2023-01-06', 30, 320, true);
  


-- --------------------------------------------------------

--
-- Table structure for table `user_goals`
--

-- Create the User_Goals table
CREATE TABLE `User_Goals` (
  `GoalID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `GoalName` varchar(30) NOT NULL,
  `TargetValue` int(11) DEFAULT NULL,
  `Duration` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `Completed` BOOLEAN NOT NULL,
  PRIMARY KEY (`GoalID`),
  FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the User_Goals table
INSERT INTO `User_Goals` (GoalID, UserID, GoalName, TargetValue, Duration, StartDate, Completed)
VALUES
  (1, 1, 'Weight Loss', 5, 30, '2023-01-01', false),
  (2, 2, 'Muscle Gain', 3, 60, '2023-01-05', false),
  (3, 3, 'Flexibility', null, 30, '2023-01-10', false);

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_workout`
--

-- Create the Scheduled_Workouts table
CREATE TABLE `Scheduled_Workouts` (
  `ScheduleID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `ProgramID` int(11) unsigned NOT NULL,
  `ScheduledDate` date NOT NULL,
  `Completed` BOOLEAN NOT NULL,
  PRIMARY KEY (`ScheduleID`),
  FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  FOREIGN KEY (`ProgramID`) REFERENCES `WorkoutProgram` (`ProgramID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into the Scheduled_Workouts table
INSERT INTO `Scheduled_Workouts` (ScheduleID, UserID, ProgramID, ScheduledDate, Completed)
VALUES
  (1, 1, 1, '2023-01-03', false),
  (2, 2, 1, '2023-01-08', false),
  (3, 3, 2, '2023-01-14', false);


-- --------------------------------------------------------
-- Stand-in structure for view `user_details_view`
--
CREATE TABLE `user_details_view` (
    `UserID` int(11) unsigned,
    `Username` varchar(30),
    `FirstName` varchar(50),
    `LastName` varchar(50),
    `Email` varchar(255),
    `DateOfBirth` date,
    `Gender` varchar(10),
    `Height` int(11),
    `Weight` int(11),
    `TargetWeight` int(11),
    `FitnessLevel` varchar(20),
    `FocusAreas` varchar(255),
    `Goal` varchar(50),
    `RegistrationDate` date,
    `StudentCode` varchar(20),
    `IsCollegeStudent` boolean,
    `StaffCode` varchar(20),
    `Position` varchar(50),
    `WorkoutLogID` int(11),
    `WorkoutProgramID` int(11),
    `WorkoutDate` date,
    `WorkoutDuration` int(11),
    `CaloriesBurned` int(11),
    `EquipmentID` int(11),
    `EquipmentName` varchar(50)
);
-- Modify the User table definition
ALTER TABLE `User`
MODIFY COLUMN `UserID` int(11) unsigned NOT NULL AUTO_INCREMENT,
MODIFY COLUMN `Username` varchar(30) NOT NULL,
MODIFY COLUMN `Password` varchar(255) NOT NULL,
MODIFY COLUMN `FirstName` varchar(50) NOT NULL,
MODIFY COLUMN `LastName` varchar(50) NOT NULL,
MODIFY COLUMN `Email` varchar(255) NOT NULL,
MODIFY COLUMN `DateOfBirth` date DEFAULT NULL,
MODIFY COLUMN `Gender` varchar(10) DEFAULT NULL,
MODIFY COLUMN `Height` int(11) DEFAULT NULL,
MODIFY COLUMN `Weight` int(11) DEFAULT NULL,
MODIFY COLUMN `TargetWeight` int(11) DEFAULT NULL,
MODIFY COLUMN `FitnessLevel` varchar(20) DEFAULT NULL,
MODIFY COLUMN `FocusAreas` varchar(255) DEFAULT NULL,
MODIFY COLUMN `Goal` varchar(50) DEFAULT NULL,
MODIFY COLUMN `RegistrationDate` date DEFAULT NULL,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`UserID`);

-- Drop foreign key constraints
ALTER TABLE `scheduled_workouts` DROP FOREIGN KEY `scheduled_workouts_ibfk_1`;

-- Modify the User table definition

-- Recreate the foreign key constraints
ALTER TABLE `scheduled_workouts`
ADD CONSTRAINT `scheduled_workouts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

-- Add a new column for YouTube URL
ALTER TABLE `Equipment`
ADD COLUMN `YouTubeURL` varchar(255) DEFAULT NULL;







/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

