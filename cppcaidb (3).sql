-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 09:11 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cppcaidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exams`
--

CREATE TABLE IF NOT EXISTS `tbl_exams` (
  `exam_id` int(10) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(10) NOT NULL,
  `exam_description` varchar(1000) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_items`
--

CREATE TABLE IF NOT EXISTS `tbl_exam_items` (
  `exam_item_id` int(10) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(10) NOT NULL,
  `lesson_sub_id` int(10) NOT NULL,
  `lesson_question` longtext NOT NULL,
  `lesson_answer` longtext NOT NULL,
  `lesson_choice1` longtext NOT NULL,
  `lesson_choice2` longtext NOT NULL,
  `lesson_choice3` longtext NOT NULL,
  `lesson_choice4` longtext NOT NULL,
  PRIMARY KEY (`exam_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_exam_items`
--

INSERT INTO `tbl_exam_items` (`exam_item_id`, `lesson_id`, `lesson_sub_id`, `lesson_question`, `lesson_answer`, `lesson_choice1`, `lesson_choice2`, `lesson_choice3`, `lesson_choice4`) VALUES
(1, 5, 17, 'AÂ _____Â is a group of data elements grouped together under one name. ', 'structure', 'array', 'structure', 'class', 'object'),
(2, 5, 17, '_____Â can be a set of valid identifiers for objects that have the type of this structure. ', 'object name', 'structure name', 'object name', 'member', 'structure type'),
(3, 5, 17, 'The member operator in structure in C++ is _____.', 'dot(.)', 'comma(,)', 'exclamation(!)', 'dot(.)', 'dollar($)'),
(4, 5, 17, '"Assuming we have the ff. structure definiton such as struct Student{     string name;     string course;     int age; }; How can you declare a variable that is of Student type,  inside the main(), with object named  as studRec1, we code it as _____."', 'Student studRec1;', 'Student.studRec1;', 'Student studRec1;', 'studRec1.Student;', 'studRec1 Student;'),
(5, 5, 17, '"Assuming we have the ff. structure definiton such as struct Student{     string name;     string course;     int age; } studRec1; How can you assign ""APPDEV"" to the course member of studRec1 variable of the structure Student?"', 'studRec1.course = "APPDEV";', 'Student.course = "APPDEV";', 'course.Student ="APPDEV";', 'studRec1.course = "APPDEV";', 'course.studRec1="APPDEV";'),
(6, 5, 17, '"Consider the ff. line of code: struct Student{     string name;     string course;     int age; } studRec1;  int main(){     Student studRec2;           studRec1.age = 41;      studRec2.name = ""Lance""; } How do you read the statement studRec1.age = 41?"', 'both of the preceding answers are correct', '41 is assigned to the age member of studRec1', 'studRec1''s age become 41', 'both of the preceding answers are correct', 'neither of the first two choices is incorrect'),
(7, 5, 17, '"Assuming we have the ff. structure definiton such as struct Student{     string name;     string course;     int age; } studRec1,studRec2;  The studRec1.course and studRec2.course is the same type as the member _____."', 'course', 'name', 'age', 'course', 'all of the choices are correct'),
(8, 5, 17, '"Assuming we have the ff. structure definiton such as struct Student{     string name;     string course;     int age; }studRec1; What are the member in the structure Student?"', 'all of the choices are correct', 'name', 'age', 'course', 'all of the choices are correct'),
(9, 5, 17, 'You read the member operator in C++ structure as _____.', 'member of', 'member of', 'part of', 'become', 'none of the choices'),
(10, 5, 17, '"_______ 10. Assuming we have the following structure declaration/definition struct Triangle{       int base;       int height; };  How can you declare a variable named sample1 of type Triangle and initialize its data member  to 13 and 27 respectively?  "', 'Triangle sample = {13,27};', 'Triangle sample = (13,27);', 'Triangle sample = (27,13);', 'Triangle sample = {13,27};', 'Triangle sample = {27,13};'),
(11, 5, 18, 'The C++ language comes with several predefined classes. Two of these are the input class _____ and the output class _____. ', 'istream , ostream', 'istream , ostream', 'string', 'conio', 'none of the choices'),
(12, 5, 18, 'The standard input stream in an istream class object is _____.', 'cin', 'c out', 'c in', 'cout', 'cin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lessons_chapters`
--

CREATE TABLE IF NOT EXISTS `tbl_lessons_chapters` (
  `lesson_id` int(10) NOT NULL AUTO_INCREMENT,
  `lesson_description` varchar(400) NOT NULL,
  `lesson_chapter` varchar(100) NOT NULL,
  PRIMARY KEY (`lesson_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_lessons_chapters`
--

INSERT INTO `tbl_lessons_chapters` (`lesson_id`, `lesson_description`, `lesson_chapter`) VALUES
(1, 'Introduction to C++', '1'),
(2, 'Control Structures', '2'),
(3, 'Functions', '3'),
(4, 'Array', '4'),
(5, 'Using Structures and Classes in C++', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lessons_sub_chapters`
--

CREATE TABLE IF NOT EXISTS `tbl_lessons_sub_chapters` (
  `lesson_sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(10) NOT NULL,
  `lesson_sub_description` varchar(1000) NOT NULL,
  `lesson_chapter` varchar(1000) NOT NULL,
  `video_url` varchar(1000) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`lesson_sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_lessons_sub_chapters`
--

INSERT INTO `tbl_lessons_sub_chapters` (`lesson_sub_id`, `lesson_id`, `lesson_sub_description`, `lesson_chapter`, `video_url`, `content`) VALUES
(1, 1, 'Brief History of C++', '1', '', 'JLfsJIjkpy.html'),
(2, 1, 'C++ Environment (IDE)', '1', '', 'zR7J3iGdok.html'),
(3, 1, 'General Structure/Format of C++', '1', '', ''),
(4, 1, 'Data Types in C++', '1', '', ''),
(5, 1, 'Variables and Constants', '1', '', ''),
(6, 1, 'Operators in C++', '1', '', ''),
(7, 1, 'C++ Basic Input/Output Commands', '1', '', ''),
(8, 2, 'Sequential Control Structures', '2', '', ''),
(9, 2, 'Decision Control Structures', '2', '', ''),
(10, 2, 'Repetition Control Structures or Loopings', '2', '', ''),
(11, 2, 'Using Branching Statements', '2', '', ''),
(12, 3, 'Predefined Functions', '3', '', ''),
(13, 3, 'User-Defined Functions', '3', '', ''),
(14, 4, 'Declaring and Referencing an Array', '4', '', ''),
(15, 4, 'One-Dimensional Array', '4', '', ''),
(16, 4, 'Two-Dimensional Array', '4', '', ''),
(17, 5, 'Structure', '5', '', ''),
(18, 5, 'The string Class: An Introduction to Classes and Objects', '5', '', ''),
(19, 5, 'Programmer-Defined Classes and Objects', '5', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_results`
--

CREATE TABLE IF NOT EXISTS `tbl_results` (
  `result_id` int(10) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(10) NOT NULL,
  `result_date` datetime NOT NULL,
  `result_score` varchar(10) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tally`
--

CREATE TABLE IF NOT EXISTS `tbl_tally` (
  `tally_id` int(10) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(10) NOT NULL,
  `lesson_sub_id` int(10) NOT NULL,
  `exam_item_id` int(10) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  PRIMARY KEY (`tally_id`),
  UNIQUE KEY `lesson_id` (`lesson_id`),
  UNIQUE KEY `lesson_id_2` (`lesson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `created_at`, `edited_at`, `deleted_at`) VALUES
(1, 'ianadmin', '63d2556fc4c87a79e8508e56f5a122bf95032d03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'admin', '55c3b5386c486feb662a0785f340938f518d547f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
