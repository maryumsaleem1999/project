-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 02:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `correct_answer` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `qno`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`) VALUES
(9, 5, 'What is a correct way to add a comment in PHP?', '&lt;!--&hellip;--&gt;', '/*&hellip;*/', '*\\..\\*', '&lt;comment&gt;&hellip;&lt;/comment&gt;', 'b'),
(8, 3, 'The PHP syntax is most similar to:', 'Perl and C', 'VBscript', 'Javascript', 'none of these', 'a'),
(7, 2, 'How do you write \"Hello World\" in PHP?', 'echo \"Hello World\";', 'Document.Write(\"Hello World\");', '\"Hello World\";', 'none of these', 'a'),
(6, 1, 'What does PHP stand for?', 'Personal Hypertext Processor\r\n', 'Private Home Page', 'Personal Home Page', 'PHP: Hypertext Preprocessor', 'd'),
(5, 4, 'How do you get information from a form that is submitted using the &quot;get&quot; method?', '$_GET[];', 'Request.Form;', 'Request.QueryString;', 'none of these', 'a'),
(10, 6, 'When using the POST method, variables are displayed in the URL:', 'True', 'False', 'Can\'t say', 'none of these', 'b'),
(11, 7, ' Which of the following function is used to get the size of a file?', 'fopen()', 'fread()', 'fsize()', 'filesize()', 'd'),
(12, 8, 'Which of the following is used to delete a cookie?', 'setcookie()', '$_COOKIE variable', 'isset() function', 'none of the above', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `role_id`) VALUES
(1, 'admin', 1),
(2, 'teacher', 2),
(3, 'student', 3);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(255) NOT NULL,
  `semesters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semesters`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2'),
(3, 'Semester 3'),
(4, 'Semester 4'),
(5, 'Semester 5'),
(6, 'Semester 6'),
(7, 'Semester 8');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(255) NOT NULL,
  `teacher_name` text NOT NULL,
  `teacher_department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_department`) VALUES
(4, 'Sir Kashif', 'Bio '),
(9, ' Mam Sana', ' Computer Science'),
(10, ' Sir Kashif', ' Computer Science'),
(11, 'sir khalid', 'account'),
(12, ' Test', ' TEST');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

CREATE TABLE `teacher_courses` (
  `id` int(255) NOT NULL,
  `courses_heading` text NOT NULL,
  `courses_des` text NOT NULL,
  `courses_assign_teacher` int(100) NOT NULL,
  `semesters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_courses`
--

INSERT INTO `teacher_courses` (`id`, `courses_heading`, `courses_des`, `courses_assign_teacher`, `semesters`) VALUES
(4, 'Accounting', 'Accounting is a term that describes the process of consolidating financial information to make it clear and understandable for all stakeholders and shareholders', 4, 'semester 4'),
(8, 'Cloud Computing', 'Cloud computing is the on-demand availability of computer system resources, especially data storage and computing power.', 4, ''),
(11, 'Accounting', 'Account is a term that describes the process of consolidating financial information to make it...', 4, ''),
(18, 'Search Engine Optimization', 'Search engine optimization is the process of improving the quality and quantity of website traffic to a website or a web page from search engines. ', 8, ''),
(19, 'computer science', 'Accounting is a term that describes the process of consolidating financial information to make it clear and understandable for all stakeholders and shareholders', 4, ''),
(20, 'Accounting', 'the complex emotional or psychological interaction between people. \"their affair was triggered by intense sexual chemistry\"', 4, ''),
(29, 'Search Engine Optimization', 'the complex emotional or psychological interaction between people. \"their affair was triggered by intense sexual chemistry\"', 11, ''),
(30, 'Search Engine Optimization', 'the complex emotional or psychological interaction between people. \"their affair was triggered by intense sexual chemistry\"', 11, ''),
(31, 'Search Engine Optimization', 'Cloud computing is the on-demand availability of computer system resources, especially data storage and computing power.', 8, 'Semester 5'),
(32, 'Course 1', 'Test', 11, 'Semester 3'),
(33, 'Course 2', 'dsfsdjfsicpsdmcsmcsldmcslmclsdmcsdf', 9, 'Semester 1'),
(34, 'Course 3', 'huhijjoklkkkhjujg', 10, 'Semester 3'),
(35, 'Course 4', 'khkjlkl;l;kh', 10, 'Semester 4'),
(36, 'Course 5', '*Items Available Every Day*', 11, 'Semester 1'),
(37, 'Course 5', 'kjkhkjkjklkl', 10, 'Semester 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `played_on` varchar(225) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `played_on`, `score`) VALUES
(78, 'hemant@vv.com', '2017-07-31 06:52:45', 0),
(68, 'admin@gmail.com', '2017-07-31 05:01:43', 0),
(77, 'root@gmail.com', '2017-07-31 06:52:09', 1),
(70, 'anirban@gmail.com', '2017-07-31 05:58:32', 3),
(76, 'john@gmail.com', '2017-07-31 06:51:41', 1),
(72, 'local@gmail.com', '2017-07-31 06:01:27', 3),
(75, 'dfgh@fgg.nn', '2017-07-31 06:43:01', 0),
(74, 'vishal@gmail.com', '2017-07-31 06:35:35', 6),
(79, 'rupesh@dffd.cvvc', '2017-07-31 06:53:37', 5),
(80, 'hello@gmail.com', '2017-07-31 06:58:18', 5),
(81, 'maryumangel3@gmail.com', '2022-08-05 21:27:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `name`, `department`) VALUES
(1, 1, 'drkhalid', '', '81dc9bdb52d04dc20036dbd8313ed055', 'Dr khalid', ''),
(2, 3, 'maryum', '', 'e2fc714c4727ee9395f324cd2e7f331f', 'Maryum Saleem', ''),
(4, 2, 'Sirkashif', '', '202cb962ac59075b964b07152d234b70', 'Sir Kashif', ''),
(7, 2, 'mamuzma', '', '827ccb0eea8a706c4c34a16891f84e7b', 'Maam Uzma', ''),
(10, 2, 'teacher_2', 'teacher2@abc.com', '202cb962ac59075b964b07152d234b70', 'Teacher 2', ''),
(11, 2, 'teacher_3', 'teacher3@abc.com', '202cb962ac59075b964b07152d234b70', 'Teacher 3', 'CS'),
(12, 2, 'teacher_4', 'teacher4@abc.com', '202cb962ac59075b964b07152d234b70', 'Teacher 4', 'Comm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
