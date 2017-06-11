-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2017 at 08:25 AM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `montessori`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
  `assistant_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` datetime NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assistant`
--

INSERT INTO `assistant` (`assistant_id`, `first_name`, `last_name`, `birth_date`, `phone`, `email`, `teacher_id`) VALUES
(1, 'Lucy', 'Ball', '1992-11-25 00:00:00', '5555555555', 'lucyfurr@gmail.com', 1),
(2, 'Gabby', 'Dominguez', '1990-11-06 00:00:00', '1111111111', 'kingdomhearts12@gmail.com', 2),
(3, 'Melinda', 'Tuft', '1992-08-11 00:00:00', '2222222222', 'belinda@gmail.com', 3),
(5, 'TEST', 'TEST', '0000-00-00 00:00:00', '555', 'TEST', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `classroom_id` int(11) NOT NULL,
  `classroom_number` int(11) DEFAULT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `aid_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`classroom_id`, `classroom_number`, `lead_id`, `aid_id`) VALUES
(1, 211, 1, 1),
(2, 212, 2, 2),
(3, 213, 3, 3),
(4, 35, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `name`, `description`, `type_id`) VALUES
(1, 'The Pink Tower', 'The students manipulate pink symmetric blocks to learn their numbers', 4),
(2, 'Visual Sense', 'The children learn to distinguish between colors and shades', 2),
(3, 'Care of Self', 'The children learn about taking care of themselves through daily activities', 1),
(7, 'Number Rods', 'Concrete quantity', 4),
(8, 'Dry Pouring', 'Prelimanary exercise', 1),
(9, 'Knobbed Cylinder Blocks', 'Visual Sense', 2),
(10, 'Sand Paper Letters', 'Written Language', 3),
(11, 'Sound Games', 'Spoken language', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` datetime DEFAULT NULL,
  `age_group` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `birth_date`, `age_group`, `classroom_id`) VALUES
(1, 'Teeg', 'Turkey', '2000-12-17 00:00:00', 1, 1),
(2, 'Logan', 'Brown', '2002-09-24 00:00:00', 1, 2),
(3, 'Julia', 'Brown', '2002-09-24 00:00:00', 1, 2),
(4, 'Johnny', 'Rotten', '2004-06-06 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_lesson`
--

CREATE TABLE `student_lesson` (
  `s_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_lesson`
--

INSERT INTO `student_lesson` (`s_id`, `l_id`) VALUES
(1, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `type`) VALUES
(1, 'Practical Life'),
(2, 'Sensorial'),
(3, 'Language'),
(4, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` datetime NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `classroom_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `first_name`, `last_name`, `birth_date`, `phone`, `email`, `classroom_id`) VALUES
(1, 'Alyssa', 'Zander', '1989-02-17 00:00:00', '5555551234', 'aazanderr@gmail.com', 1),
(2, 'Rosanne', 'Forrester', '1968-06-03 00:00:00', '1234567890', 'rosannef@gmail.com', 2),
(3, 'Jenna', 'Wild', '1980-03-25 00:00:00', '6666666666', 'crazygurl1234@gmail.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`assistant_id`),
  ADD UNIQUE KEY `assistant_id_UNIQUE` (`assistant_id`),
  ADD KEY `teacher_id_idx` (`teacher_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`classroom_id`),
  ADD UNIQUE KEY `classroom_id_UNIQUE` (`classroom_id`),
  ADD KEY `teacher_id_idx` (`lead_id`),
  ADD KEY `lead_id_idx` (`lead_id`),
  ADD KEY `t_id_idx` (`lead_id`),
  ADD KEY `aid_id_idx` (`aid_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `type_id_idx` (`type_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id_UNIQUE` (`student_id`),
  ADD KEY `c_id_idx` (`classroom_id`);

--
-- Indexes for table `student_lesson`
--
ALTER TABLE `student_lesson`
  ADD PRIMARY KEY (`s_id`,`l_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_id_UNIQUE` (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_id_UNIQUE` (`teacher_id`),
  ADD KEY `classroom_id_idx` (`classroom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistant`
--
ALTER TABLE `assistant`
  MODIFY `assistant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assistant`
--
ALTER TABLE `assistant`
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `aid_id` FOREIGN KEY (`aid_id`) REFERENCES `assistant` (`assistant_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `lead_id` FOREIGN KEY (`lead_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`classroom_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_lesson`
--
ALTER TABLE `student_lesson`
  ADD CONSTRAINT `l_id` FOREIGN KEY (`l_id`) REFERENCES `lesson` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s_id` FOREIGN KEY (`s_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `classroom_id` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`classroom_id`) ON DELETE SET NULL ON UPDATE CASCADE;
