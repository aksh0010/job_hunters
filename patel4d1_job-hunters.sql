-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2023 at 11:31 PM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patel4d1_job-hunters`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT '"In progess"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`app_id`, `jobseeker_id`, `job_id`, `date`, `status`) VALUES
(4, 1, 17, '2023-04-14', '\"In progess\"'),
(6, 1, 13, '2023-04-14', '\"In progess\"'),
(7, 1, 15, '2023-04-14', '\"In progess\"'),
(8, 1, 1, '2023-04-14', '\"In progess\"'),
(9, 1, 2, '2023-04-14', '\"In progess\"'),
(10, 1, 14, '2023-04-14', '\"In progess\"'),
(11, 1, 6, '2023-04-14', '\"In progess\"'),
(12, 1, 6, '2023-04-14', '\"In progess\"'),
(13, 1, 6, '2023-04-14', '\"In progess\"'),
(14, 1, 6, '2023-04-14', '\"In progess\"'),
(15, 1, 16, '2023-04-14', '\"In progess\"');

-- --------------------------------------------------------

--
-- Table structure for table `hr_account`
--

CREATE TABLE `hr_account` (
  `hr_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL DEFAULT 'M',
  `age` int(100) NOT NULL,
  `company` text NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_account`
--

INSERT INTO `hr_account` (`hr_id`, `fname`, `lname`, `email`, `contact`, `gender`, `age`, `company`, `password`) VALUES
(7, 'HR', 'HR', 'hr1@gmail.com', '22', 'M', 23, 'CIBC', '0'),
(8, 'HR2', 'HR2', 'hr2@gmail.com', '22', 'M', 23, 'CIBC', '0'),
(9, 'HR3', 'HR3', 'hr3@gmail.com', '22', 'M', 23, 'CIBC', '0'),
(10, 'HR4', 'HR4', 'hr4@gmail.com', '22', 'M', 23, 'CIBC', '0'),
(11, '', 'aksh', 'aksh', '298', 'M', 23, 'CIBC', 'aksh'),
(12, 'Aksh', 'Patel', 'admin', 'M', '2', 0, '1203', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `hr_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `available_positions` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `appliance_received` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `hr_id`, `title`, `location`, `salary`, `description`, `available_positions`, `status`, `appliance_received`) VALUES
(1, 7, 'Developer', 'Windsor', '40000', 'Developer role available  at CIBC toronto', 1, 1, 2),
(2, 7, 'application', 'Windsor', '40000', 'Application role available  at CIBC toronto', 1, 1, 2),
(6, 7, 'Manager', 'Windsor, Ontario', '50000', 'This is project manager job with RBC', 1, 1, 0),
(13, 12, 'Medical Instrument CLeaner', 'TORONTO, Ontario', '35000', 'You will be disinfecting the medical instruments.', 1, 1, 0),
(14, 7, 'Business Analyst', 'BC', '50000', 'Highly motivated BA', 1, 1, 0),
(15, 12, 'Manager', 'Hamilton', '56000', 'Manager for Lenskart ', 2, 1, 0),
(16, 12, 'Project Manager', 'Hamilton', '56000', 'Responsibilities\n\nManage mechanical contracting projects from pre-construction phase until completion\nManage projects and effectively influence, negotiate, and communicate with internal and external stakeholders including owners, architects, engineers, subcontractors, suppliers, and project team members\nExecute projects throughout various stages including feasibility studies, preliminary design, detailed design, construction, commissioning, and closeout\nEstablish and maintain project schedules and budgets, and manage overall project delivery\nEnsure contractor compliance of life safety/OSHA requirements are met on all job sites to minimize risk\nManage submittal process, change order negotiations, and contract compliance\nWork with Controller on monitoring and reporting on project costs to establish percentage of completion\nProcess and send out project invoicing and statutory declarations; work with accounting department to monitor outstanding receivables\nCommunicate with contractors/owners regarding outstanding billables/receivables\nEstablish effective relationships and strive for a collaborative team environment with coworkers\nQualifications and Requirements', 2, 1, 0),
(17, 12, 'Business Analyst', 'Hamilton', '56000', 'JOB SUMMARY:\n\nThe Business Development Representative is responsible for promoting D2L Products and Services, establishing customer relationships, and providing qualified, motivated leads to the Sales teams. As a key member of the sales team, the successful candidate will have in-depth knowledge of the company’s solutions, competition, and a keen interest in the eLearning industry. The primary market focus is the education and corporate sectors.\n\nWe are looking for an energetic, polished individual with exceptional communication skills and a talent for relationship building. The successful candidate will gain expertise in accurately capturing and qualifying leads, effectively managing a sales pipeline, and achieving quarterly revenue targets.\n\nThis Business Development Representative provides a challenging career opportunity as well as career advancement within D2L.', 2, 1, 0),
(18, 12, 'Application Developer', '23232', '2323', 'What you will learn and contribute to\n\n\nKanata is a major R&D site in this international team with development in key areas of all products. We have a wealth of growth opportunities which include:\n\nEmbedded platform OS/driver (64-bit SMP)\nLinux (Yocto, KVM, QEMU, libvirt, python3)\nData path (including proprietary network processor, 3rd party, and virtualized)\nControl plane protocols (IP/MPLS)\nOAM (CFM, EFM, TWAMP, Performance Monitoring)\nTiming (PTP, NTP, SyncE, SETS, BITS, and GNSS)\nPHY and Optics (Ethernet PHY, MAC, SerDes, Clock Recovery, 100/400G Optical Transceivers)\nDeep Packet Inspection (Application Assurance)\nManagement interfaces (SNMP, NETCONF, YANG)\nNetwork Function Virtualization (VSR)\nAs part of the team, you will:\n\nBe exposed to our way of developing great code.\nGet mentored by top notch software developers who take pride in areas of code they own.\nWork hand in hand with our verification team and delivering quality software.', 2323, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_account`
--

CREATE TABLE `jobseeker_account` (
  `jobseeker_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `gender` varchar(1) NOT NULL DEFAULT 'M',
  `age` int(100) NOT NULL,
  `email_preference` tinyint(1) NOT NULL DEFAULT 0,
  `total_applications` int(11) NOT NULL DEFAULT 0,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_account`
--

INSERT INTO `jobseeker_account` (`jobseeker_id`, `fname`, `lname`, `email`, `contact`, `gender`, `age`, `email_preference`, `total_applications`, `password`) VALUES
(1, 'Aksh', 'Patel', 'job', '2269754190', 'M', 23, 0, 0, 'job');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `jobseeker_id` (`jobseeker_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `hr_account`
--
ALTER TABLE `hr_account`
  ADD PRIMARY KEY (`hr_id`),
  ADD UNIQUE KEY `hr_email_index` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `hr_id_foreign_key` (`hr_id`);

--
-- Indexes for table `jobseeker_account`
--
ALTER TABLE `jobseeker_account`
  ADD PRIMARY KEY (`jobseeker_id`),
  ADD UNIQUE KEY `email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hr_account`
--
ALTER TABLE `hr_account`
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jobseeker_account`
--
ALTER TABLE `jobseeker_account`
  MODIFY `jobseeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `job_id` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `jobseeker_id` FOREIGN KEY (`jobseeker_id`) REFERENCES `jobseeker_account` (`jobseeker_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `hr_id_foreign_key` FOREIGN KEY (`hr_id`) REFERENCES `hr_account` (`hr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
