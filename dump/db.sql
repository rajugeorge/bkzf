-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 06:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

USE `symfony`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_diseases`
--

CREATE TABLE `category_diseases` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `category_diseases_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_diseases`
--

INSERT INTO `category_diseases` (`id`, `name`, `description`, `category_diseases_id`, `user_id`, `created_date`, `updated_date`, `isactive`) VALUES
(1, 'lung cancer', NULL, NULL, 1, '2021-04-28 08:23:14', '2021-04-28 08:23:14', 1),
(2, 'Non-small cell lung cancer', NULL, 1, 1, '2021-04-28 08:24:15', '2021-04-28 08:24:15', 1),
(3, 'Small cell lung cancer', NULL, 1, 1, '2021-04-28 08:24:58', '2021-04-28 08:24:58', 1),
(4, 'breast cancer', NULL, NULL, 1, '2021-04-28 08:31:28', '2021-04-28 08:31:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses_code_icd10`
--

CREATE TABLE `diagnoses_code_icd10` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `studies_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnoses_code_icd10`
--

INSERT INTO `diagnoses_code_icd10` (`id`, `code`, `studies_id`, `created_date`) VALUES
(11, 'test', 1, '2021-05-04 12:07:41'),
(14, 'test', 10, '2021-05-04 12:18:21'),
(15, 'test', 10, '2021-05-04 12:18:21'),
(16, 'ICD10-6', 11, '2021-05-05 05:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210423062127', '2021-04-23 10:48:55', 340),
('DoctrineMigrations\\Version20210426065948', '2021-04-26 12:36:34', 1314);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_locations`
--

CREATE TABLE `hospital_locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` text,
  `pin` int(11) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `university_hospitals_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_locations`
--

INSERT INTO `hospital_locations` (`id`, `name`, `description`, `email`, `phone`, `address`, `pin`, `latitude`, `longitude`, `university_hospitals_id`, `user_id`, `created_date`, `updated_date`, `isactive`) VALUES
(1, 'U1 Hospital Location 1', NULL, 'u1l1@bkzf.com', '3216549870', 'Rechts der Isar Munich', 123456, NULL, NULL, 1, 1, '2021-04-28 08:17:21', '2021-04-28 08:17:21', 1),
(2, 'U1 Hospital Location 2', NULL, 'u1l2@bkzf.com', '7896541230', 'Rechts der Isar Munich', 123456, NULL, NULL, 1, 1, '2021-04-28 08:18:19', '2021-04-28 08:18:19', 1),
(3, 'U2 Hospital Location 1', NULL, 'u2l1@bkzf.com', '8523697410', 'Rechts der Isar Munich', 123456, NULL, NULL, 2, 1, '2021-04-28 08:19:29', '2021-04-28 08:19:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutations`
--

CREATE TABLE `mutations` (
  `id` int(11) NOT NULL,
  `mutation` varchar(255) NOT NULL,
  `studies_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutations`
--

INSERT INTO `mutations` (`id`, `mutation`, `studies_id`, `created_date`) VALUES
(1, 'mutation1', 1, '2021-04-28 08:47:45'),
(2, 'mutation2', 2, '2021-04-28 08:47:45'),
(3, 'mutation3', 3, '2021-04-28 08:47:45'),
(4, 'mutation4', 4, '2021-04-28 08:47:45'),
(5, 'mutation5', 7, '2021-04-29 08:43:28'),
(6, 'mutation6', 7, '2021-04-29 08:43:28'),
(7, 'mutation5', 8, '2021-04-29 09:10:20'),
(8, 'mutation5', 9, '2021-05-03 10:21:21'),
(9, 'mutation 6', 10, '2021-05-04 12:01:22'),
(10, 'mutation1', 1, '2021-05-04 12:07:41'),
(11, 'mutation 6', 10, '2021-05-04 12:17:26'),
(12, 'mutation 6', 10, '2021-05-04 12:18:21'),
(13, 'mutation5', 11, '2021-05-05 05:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `queue_table`
--

CREATE TABLE `queue_table` (
  `id` int(11) NOT NULL,
  `studies_id` int(11) NOT NULL,
  `isrun` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue_table`
--

INSERT INTO `queue_table` (`id`, `studies_id`, `isrun`) VALUES
(1, 3, 0),
(2, 7, 0),
(3, 3, 0),
(4, 8, 0),
(5, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reference_studies`
--

CREATE TABLE `reference_studies` (
  `id` int(11) NOT NULL,
  `studies_id` int(11) NOT NULL,
  `parent_studies_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_studies`
--

INSERT INTO `reference_studies` (`id`, `studies_id`, `parent_studies_id`, `created_date`) VALUES
(1, 1, 4, '2021-04-28 08:40:19'),
(2, 2, 4, '2021-04-28 08:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `id` int(11) NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text,
  `study_phase_id` int(11) NOT NULL,
  `eudra_ct` varchar(100) DEFAULT NULL,
  `nct` varchar(100) DEFAULT NULL,
  `drks` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`id`, `short_title`, `title`, `description`, `study_phase_id`, `eudra_ct`, `nct`, `drks`, `user_id`, `created_date`, `isactive`, `updated_time`) VALUES
(1, 'NSCLC', 'Non-small cell lung cancer (NSCLC)', NULL, 1, 'EudraCT-1', 'NCT-1', 'DRKS-1', 1, '2021-04-28 08:36:19', 1, '2021-04-28 08:36:19'),
(2, 'SCLC', 'Small cell lung cancer (SCLC)', NULL, 2, 'EudraCT-2', 'NCT-2', 'DRKS-2', 1, '2021-04-28 08:36:19', 1, '2021-04-28 08:36:19'),
(3, 'BCMT', 'Breast cancer molecular types', NULL, 3, 'EudraCT-3', 'NCT-3', 'DRKS-3', 1, '2021-04-28 08:36:19', 1, '2021-04-28 08:36:19'),
(4, 'LC', 'Lung Cancer', NULL, 3, 'EudraCT-4', 'NCT-4', 'DRKS-4', 1, '2021-04-28 08:38:57', 1, '2021-04-28 08:38:57'),
(7, 'BCMT SUB', 'Breast cancer molecular types 1', NULL, 2, NULL, NULL, NULL, 1, '2021-04-29 08:43:27', 1, '2021-04-29 08:43:27'),
(8, 'BCMT SUB', 'Breast cancer molecular types 1', NULL, 3, NULL, NULL, NULL, 1, '2021-04-29 09:10:20', 1, '2021-04-29 09:10:20'),
(9, 'test', 'test', 'test', 2, NULL, NULL, NULL, 1, '2021-05-03 10:21:21', 1, '2021-05-03 10:21:21'),
(10, 'BCMT SUB 2', 'Breast cancer molecular types 2', NULL, 1, 'EudraCT-6', 'NCT-6', 'DRKS-6', 1, '2021-05-04 12:01:22', 1, '2021-05-04 12:01:22'),
(11, 'short title', 'Breast cancer molecular types 1', NULL, 2, 'EudraCT-5', 'NCT-5', 'DRKS-5', 1, '2021-05-05 05:12:15', 1, '2021-05-05 05:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `studies_json`
--

CREATE TABLE `studies_json` (
  `id` int(11) NOT NULL,
  `studies_id` int(11) NOT NULL,
  `json` longtext,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `creatred_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studies_json`
--

INSERT INTO `studies_json` (`id`, `studies_id`, `json`, `isactive`, `creatred_date`) VALUES
(1, 8, '{\"id\":8,\"shortTitle\":\"BCMT SUB\",\"title\":\"Breast cancer molecular types 1\",\"description\":null,\"eudraCt\":null,\"nct\":null,\"drks\":null,\"isactive\":true,\"studyPhase\":{\"id\":3,\"title\":\"3\",\"description\":null,\"isactive\":true},\"user\":{\"id\":1,\"firstname\":\"Firstname\",\"lastname\":\"Lastname\",\"email\":\"admin@bzkf.com\",\"username\":\"admin\",\"roles\":[\"ROLE_USER\"],\"salt\":null},\"diagnosesCodeIcd10\":[],\"mutations\":[{\"id\":7,\"mutation\":\"mutation5\",\"studiesId\":8,\"studies\":8}],\"categoryDiseases\":[{\"id\":1,\"name\":\"lung cancer\",\"description\":null,\"categoryDiseasesId\":null,\"userId\":1,\"isactive\":true},{\"id\":3,\"name\":\"Small cell lung cancer\",\"description\":null,\"categoryDiseasesId\":1,\"userId\":1,\"isactive\":true}],\"hospitalLocations\":[{\"id\":2,\"name\":\"U1 Hospital Location 2\",\"description\":null,\"email\":\"u1l2@bkzf.com\",\"phone\":\"7896541230\",\"address\":\"Rechts der Isar Munich\",\"pin\":123456,\"latitude\":null,\"longitude\":null,\"universityHospitalsId\":1,\"userId\":1,\"isactive\":true,\"universityHospitals\":{\"id\":1,\"name\":\"University1\",\"description\":null,\"email\":\"university@bkzf.com\",\"phone\":\"9876543210\",\"address\":\"Rechts der Isar Munich\",\"pin\":123456,\"latitude\":null,\"longitude\":null,\"userId\":1,\"isactive\":true}}]}', 1, '2021-05-05 06:42:08'),
(2, 10, '{\"id\":10,\"shortTitle\":\"BCMT SUB 2\",\"title\":\"Breast cancer molecular types 2\",\"description\":null,\"eudraCt\":\"EudraCT-6\",\"nct\":\"NCT-6\",\"drks\":\"DRKS-6\",\"isactive\":true,\"studyPhase\":{\"id\":1,\"title\":\"1\",\"description\":null,\"isactive\":true},\"user\":{\"id\":1,\"firstname\":\"Firstname\",\"lastname\":\"Lastname\",\"email\":\"admin@bzkf.com\",\"username\":\"admin\",\"roles\":[\"ROLE_USER\"],\"salt\":null},\"diagnosesCodeIcd10\":[{\"id\":14,\"code\":\"test\",\"studiesId\":10,\"studies\":10},{\"id\":15,\"code\":\"test\",\"studiesId\":10,\"studies\":10}],\"mutations\":[{\"id\":9,\"mutation\":\"mutation 6\",\"studiesId\":10,\"studies\":10},{\"id\":11,\"mutation\":\"mutation 6\",\"studiesId\":10,\"studies\":10},{\"id\":12,\"mutation\":\"mutation 6\",\"studiesId\":10,\"studies\":10}],\"categoryDiseases\":[{\"id\":1,\"name\":\"lung cancer\",\"description\":null,\"categoryDiseasesId\":null,\"userId\":1,\"isactive\":true},{\"id\":2,\"name\":\"Non-small cell lung cancer\",\"description\":null,\"categoryDiseasesId\":1,\"userId\":1,\"isactive\":true}],\"hospitalLocations\":[{\"id\":2,\"name\":\"U1 Hospital Location 2\",\"description\":null,\"email\":\"u1l2@bkzf.com\",\"phone\":\"7896541230\",\"address\":\"Rechts der Isar Munich\",\"pin\":123456,\"latitude\":null,\"longitude\":null,\"universityHospitalsId\":1,\"userId\":1,\"isactive\":true,\"universityHospitals\":{\"id\":1,\"name\":\"University1\",\"description\":null,\"email\":\"university@bkzf.com\",\"phone\":\"9876543210\",\"address\":\"Rechts der Isar Munich\",\"pin\":123456,\"latitude\":null,\"longitude\":null,\"userId\":1,\"isactive\":true}}]}', 1, '2021-05-05 11:05:43'),
(3, 3, '{\"id\":3,\"shortTitle\":\"BCMT\",\"title\":\"Breast cancer molecular types\",\"description\":null,\"eudraCt\":\"EudraCT-3\",\"nct\":\"NCT-3\",\"drks\":\"DRKS-3\",\"isactive\":true,\"studyPhase\":{\"id\":3,\"title\":\"3\",\"description\":null,\"isactive\":true},\"user\":{\"id\":1,\"firstname\":\"Firstname\",\"lastname\":\"Lastname\",\"email\":\"admin@bzkf.com\",\"username\":\"admin\",\"roles\":[\"ROLE_USER\"],\"salt\":null},\"diagnosesCodeIcd10\":[],\"mutations\":[{\"id\":3,\"mutation\":\"mutation3\",\"studiesId\":3,\"studies\":3}],\"categoryDiseases\":[{\"id\":4,\"name\":\"breast cancer\",\"description\":null,\"categoryDiseasesId\":null,\"userId\":1,\"isactive\":true}],\"hospitalLocations\":[{\"id\":1,\"name\":\"U1 Hospital Location 1\",\"description\":null,\"email\":\"u1l1@bkzf.com\",\"phone\":\"3216549870\",\"address\":\"Rechts der Isar Munich\",\"pin\":123456,\"latitude\":null,\"longitude\":null,\"universityHospitalsId\":1,\"userId\":1,\"isactive\":true,\"universityHospitals\":{\"id\":1,\"name\":\"University1\",\"description\":null,\"email\":\"university@bkzf.com\",\"phone\":\"9876543210\",\"address\":\"Rechts der Isar Munich\",\"pin\":123456,\"latitude\":null,\"longitude\":null,\"userId\":1,\"isactive\":true}}]}', 1, '2021-05-05 11:06:19'),
(4, 7, '{\"id\":7,\"shortTitle\":\"BCMT SUB\",\"title\":\"Breast cancer molecular types 1\",\"description\":null,\"eudraCt\":null,\"nct\":null,\"drks\":null,\"isactive\":true,\"studyPhase\":{\"id\":2,\"title\":\"2\",\"description\":null,\"isactive\":true},\"user\":{\"id\":1,\"firstname\":\"Firstname\",\"lastname\":\"Lastname\",\"email\":\"admin@bzkf.com\",\"username\":\"admin\",\"roles\":[\"ROLE_USER\"],\"salt\":null},\"diagnosesCodeIcd10\":[],\"mutations\":[{\"id\":5,\"mutation\":\"mutation5\",\"studiesId\":7,\"studies\":7},{\"id\":6,\"mutation\":\"mutation6\",\"studiesId\":7,\"studies\":7}],\"categoryDiseases\":[],\"hospitalLocations\":[{\"id\":2,\"name\":\"U1 Hospital Location 2\",\"description\":null,\"email\":\"u1l2@bkzf.com\",\"phone\":\"7896541230\",\"address\":\"Rechts der Isar Munich\",\"pin\":123456,\"latitude\":null,\"longitude\":null,\"universityHospitalsId\":1,\"userId\":1,\"isactive\":true,\"universityHospitals\":{\"id\":1,\"name\":\"University1\",\"description\":null,\"email\":\"university@bkzf.com\",\"phone\":\"9876543210\",\"address\":\"Rechts der Isar Munich\",\"pin\":123456,\"latitude\":null,\"longitude\":null,\"userId\":1,\"isactive\":true}}]}', 1, '2021-05-05 11:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `study_categories`
--

CREATE TABLE `study_categories` (
  `id` int(11) NOT NULL,
  `category_diseases_id` int(11) NOT NULL,
  `studies_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_categories`
--

INSERT INTO `study_categories` (`id`, `category_diseases_id`, `studies_id`, `created_date`) VALUES
(1, 1, 4, '2021-04-28 08:43:37'),
(2, 1, 1, '2021-04-28 08:43:37'),
(3, 2, 1, '2021-04-28 08:43:37'),
(4, 1, 2, '2021-04-28 08:43:37'),
(5, 3, 2, '2021-04-28 08:43:37'),
(6, 4, 3, '2021-04-28 08:43:38'),
(7, 1, 8, '2021-04-29 09:10:20'),
(8, 3, 8, '2021-04-29 09:10:20'),
(9, 1, 9, '2021-05-03 10:21:22'),
(10, 2, 9, '2021-05-03 10:21:22'),
(11, 1, 10, '2021-05-04 12:01:22'),
(12, 2, 10, '2021-05-04 12:01:22'),
(13, 1, 1, '2021-05-04 12:07:41'),
(14, 2, 1, '2021-05-04 12:07:41'),
(15, 1, 10, '2021-05-04 12:17:27'),
(16, 2, 10, '2021-05-04 12:17:27'),
(17, 1, 10, '2021-05-04 12:18:21'),
(18, 2, 10, '2021-05-04 12:18:21'),
(19, 1, 11, '2021-05-05 05:12:16'),
(20, 3, 11, '2021-05-05 05:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `study_locations`
--

CREATE TABLE `study_locations` (
  `id` int(11) NOT NULL,
  `studies_id` int(11) NOT NULL,
  `hospital_locations_id` int(11) NOT NULL,
  `status` enum('active','isplanning','closed') NOT NULL DEFAULT 'active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_locations`
--

INSERT INTO `study_locations` (`id`, `studies_id`, `hospital_locations_id`, `status`, `created_date`) VALUES
(1, 1, 1, 'active', '2021-04-28 08:37:32'),
(2, 1, 2, 'active', '2021-04-28 08:37:32'),
(3, 2, 3, 'active', '2021-04-28 08:37:32'),
(4, 3, 1, 'active', '2021-04-28 08:37:32'),
(5, 4, 1, 'active', '2021-04-28 08:39:26'),
(6, 7, 2, 'active', '2021-04-29 08:43:28'),
(7, 8, 2, 'active', '2021-04-29 09:10:20'),
(8, 9, 1, 'active', '2021-05-03 10:21:21'),
(9, 10, 2, 'active', '2021-05-04 12:01:22'),
(10, 1, 1, 'active', '2021-05-04 12:07:41'),
(11, 1, 2, 'active', '2021-05-04 12:07:41'),
(12, 10, 2, 'active', '2021-05-04 12:17:27'),
(13, 10, 2, 'active', '2021-05-04 12:18:21'),
(14, 11, 1, 'active', '2021-05-05 05:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `study_phase`
--

CREATE TABLE `study_phase` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_phase`
--

INSERT INTO `study_phase` (`id`, `title`, `description`, `created_date`, `updated_date`, `isactive`) VALUES
(1, '1', NULL, '2021-04-28 08:25:48', '2021-04-28 08:25:48', 1),
(2, '2', NULL, '2021-04-28 08:25:48', '2021-04-28 08:25:48', 1),
(3, '3', NULL, '2021-04-28 08:25:48', '2021-04-28 08:25:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `university_hospitals`
--

CREATE TABLE `university_hospitals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` text,
  `pin` int(11) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university_hospitals`
--

INSERT INTO `university_hospitals` (`id`, `name`, `description`, `email`, `phone`, `address`, `pin`, `latitude`, `longitude`, `user_id`, `created_date`, `updated_date`, `isactive`) VALUES
(1, 'University1', NULL, 'university@bkzf.com', '9876543210', 'Rechts der Isar Munich', 123456, NULL, NULL, 1, '2021-04-28 08:12:58', '2021-04-28 13:42:58', 1),
(2, 'University2', NULL, 'university2@bkzf.com', '9876543210', 'Rechts der Isar Munich', 123456, NULL, NULL, 1, '2021-04-28 08:14:05', '2021-04-28 13:44:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastlogin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `role`, `lastlogin`, `locale`) VALUES
(1, 'Firstname', 'Lastname', 'admin@bzkf.com', 'admin', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', 'ROLE_USER', '2021-04-27 10:52:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_diseases`
--
ALTER TABLE `category_diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses_code_icd10`
--
ALTER TABLE `diagnoses_code_icd10`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnoses_code_icd10_FK` (`studies_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `hospital_locations`
--
ALTER TABLE `hospital_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_locations_fk` (`university_hospitals_id`);

--
-- Indexes for table `mutations`
--
ALTER TABLE `mutations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutations_fk` (`studies_id`);

--
-- Indexes for table `queue_table`
--
ALTER TABLE `queue_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queue_table_fk` (`studies_id`);

--
-- Indexes for table `reference_studies`
--
ALTER TABLE `reference_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reference_studies_fk` (`studies_id`),
  ADD KEY `reference_studies_fk_1` (`parent_studies_id`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studies_fk` (`study_phase_id`),
  ADD KEY `studies_fk_1` (`user_id`);

--
-- Indexes for table `studies_json`
--
ALTER TABLE `studies_json`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studies_json_fk` (`studies_id`);

--
-- Indexes for table `study_categories`
--
ALTER TABLE `study_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_categories_fk` (`studies_id`),
  ADD KEY `study_categories_fk_1` (`category_diseases_id`);

--
-- Indexes for table `study_locations`
--
ALTER TABLE `study_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_locations_fk` (`studies_id`),
  ADD KEY `study_locations_fk_1` (`hospital_locations_id`);

--
-- Indexes for table `study_phase`
--
ALTER TABLE `study_phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_hospitals`
--
ALTER TABLE `university_hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_diseases`
--
ALTER TABLE `category_diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diagnoses_code_icd10`
--
ALTER TABLE `diagnoses_code_icd10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hospital_locations`
--
ALTER TABLE `hospital_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mutations`
--
ALTER TABLE `mutations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `queue_table`
--
ALTER TABLE `queue_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reference_studies`
--
ALTER TABLE `reference_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studies`
--
ALTER TABLE `studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `studies_json`
--
ALTER TABLE `studies_json`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `study_categories`
--
ALTER TABLE `study_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `study_locations`
--
ALTER TABLE `study_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `study_phase`
--
ALTER TABLE `study_phase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `university_hospitals`
--
ALTER TABLE `university_hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnoses_code_icd10`
--
ALTER TABLE `diagnoses_code_icd10`
  ADD CONSTRAINT `diagnoses_code_icd10_FK` FOREIGN KEY (`studies_id`) REFERENCES `studies` (`id`);

--
-- Constraints for table `hospital_locations`
--
ALTER TABLE `hospital_locations`
  ADD CONSTRAINT `hospital_locations_fk` FOREIGN KEY (`university_hospitals_id`) REFERENCES `university_hospitals` (`id`);

--
-- Constraints for table `mutations`
--
ALTER TABLE `mutations`
  ADD CONSTRAINT `mutations_fk` FOREIGN KEY (`studies_id`) REFERENCES `studies` (`id`);

--
-- Constraints for table `queue_table`
--
ALTER TABLE `queue_table`
  ADD CONSTRAINT `queue_table_fk` FOREIGN KEY (`studies_id`) REFERENCES `studies` (`id`);

--
-- Constraints for table `reference_studies`
--
ALTER TABLE `reference_studies`
  ADD CONSTRAINT `reference_studies_fk` FOREIGN KEY (`studies_id`) REFERENCES `studies` (`id`),
  ADD CONSTRAINT `reference_studies_fk_1` FOREIGN KEY (`parent_studies_id`) REFERENCES `studies` (`id`);

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_fk` FOREIGN KEY (`study_phase_id`) REFERENCES `study_phase` (`id`),
  ADD CONSTRAINT `studies_fk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `studies_json`
--
ALTER TABLE `studies_json`
  ADD CONSTRAINT `studies_json_fk` FOREIGN KEY (`studies_id`) REFERENCES `studies` (`id`);

--
-- Constraints for table `study_categories`
--
ALTER TABLE `study_categories`
  ADD CONSTRAINT `study_categories_fk` FOREIGN KEY (`studies_id`) REFERENCES `studies` (`id`),
  ADD CONSTRAINT `study_categories_fk_1` FOREIGN KEY (`category_diseases_id`) REFERENCES `category_diseases` (`id`);

--
-- Constraints for table `study_locations`
--
ALTER TABLE `study_locations`
  ADD CONSTRAINT `study_locations_fk` FOREIGN KEY (`studies_id`) REFERENCES `studies` (`id`),
  ADD CONSTRAINT `study_locations_fk_1` FOREIGN KEY (`hospital_locations_id`) REFERENCES `hospital_locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
