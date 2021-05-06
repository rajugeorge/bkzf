-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 12:20 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `queue_table`
--

CREATE TABLE `queue_table` (
  `id` int(11) NOT NULL,
  `studies_id` int(11) NOT NULL,
  `isrun` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

INSERT INTO `user` VALUES(1, 'Firstname', 'Lastname', 'admin@bzkf.com', 'admin', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', 'ROLE_USER', '2021-04-27 10:52:53', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnoses_code_icd10`
--
ALTER TABLE `diagnoses_code_icd10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_locations`
--
ALTER TABLE `hospital_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutations`
--
ALTER TABLE `mutations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queue_table`
--
ALTER TABLE `queue_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reference_studies`
--
ALTER TABLE `reference_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studies`
--
ALTER TABLE `studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studies_json`
--
ALTER TABLE `studies_json`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_categories`
--
ALTER TABLE `study_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_locations`
--
ALTER TABLE `study_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_phase`
--
ALTER TABLE `study_phase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_hospitals`
--
ALTER TABLE `university_hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
