-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 09:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwleaalz_learnwell_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_registration`
--

CREATE TABLE `new_registration` (
  `sr_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `altr_contact_no` varchar(500) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `total_fees` int(50) NOT NULL,
  `discount` int(20) NOT NULL,
  `total_fees_collected` int(50) NOT NULL,
  `payable_amt` int(20) NOT NULL,
  `total_fees_remaining` int(50) NOT NULL,
  `first_installment` int(50) NOT NULL,
  `1st_installment_date` date NOT NULL,
  `second_installment` int(50) NOT NULL,
  `2nd_installment_date` date NOT NULL,
  `third_installment` int(50) NOT NULL,
  `3rd_installment_date` date NOT NULL,
  `reminder_date` date NOT NULL,
  `batch_time` varchar(10) NOT NULL,
  `trainer_name` varchar(20) NOT NULL,
  `batch_type` varchar(8) NOT NULL,
  `mode_of_payment` varchar(20) NOT NULL,
  `mode_of_payment2` varchar(20) NOT NULL,
  `mode_of_payment3` varchar(20) NOT NULL,
  `payment_note1` varchar(256) NOT NULL,
  `payment_note2` varchar(256) NOT NULL,
  `payment_note3` varchar(256) NOT NULL,
  `profit_per` int(11) NOT NULL,
  `mentors_amount` int(11) NOT NULL,
  `mentors_profit` int(11) NOT NULL,
  `gap_no_gap` varchar(200) NOT NULL,
  `placed_not_placed` varchar(200) NOT NULL,
  `current_working_status` varchar(200) NOT NULL,
  `degree_passout_year` varchar(200) NOT NULL,
  `degree_name` varchar(200) NOT NULL,
  `pg_degree_passout_year` varchar(200) NOT NULL,
  `pg_degree_name` varchar(200) NOT NULL,
  `stud_prtl_id` int(11) NOT NULL,
  `progress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_registration`
--
ALTER TABLE `new_registration`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_registration`
--
ALTER TABLE `new_registration`
  MODIFY `sr_no` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
