-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 06:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `admin_user_id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_dep_name` varchar(50) NOT NULL,
  `admin_marketing_des` varchar(50) NOT NULL,
  `admin_exhibitor_organization` varchar(50) NOT NULL,
  `admin_exhibitor_chief_executive` varchar(50) NOT NULL,
  `admin_exhibitors_designation` varchar(50) NOT NULL,
  `admin_exhibit_contact_executive` int(11) NOT NULL,
  `admin_exhibit_website` varchar(50) NOT NULL,
  `admin_contact` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_status` varchar(50) NOT NULL DEFAULT 'Enable',
  `admin_role` varchar(50) NOT NULL,
  `created_at` timestamp(5) NOT NULL DEFAULT current_timestamp(5),
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`admin_user_id`, `admin_email`, `admin_password`, `admin_name`, `admin_dep_name`, `admin_marketing_des`, `admin_exhibitor_organization`, `admin_exhibitor_chief_executive`, `admin_exhibitors_designation`, `admin_exhibit_contact_executive`, `admin_exhibit_website`, `admin_contact`, `admin_address`, `admin_status`, `admin_role`, `created_at`, `updated_at`) VALUES
(1, 'surya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', 0, '', '', '', 'Enable', 'Master', '2022-03-10 05:27:03.24899', ''),
(4, 'department@gmail.com', '123456', 'Department One', 'cs', '', '', '', '', 0, '', '123456780', '', 'Enable', '', '2022-03-10 05:27:03.24899', '21-03-2022 23:13 PM'),
(5, 'departmenttwo@gmail.com', '123456', 'Department Two', 'IT', '', '', '', '', 0, '', '1234567890', '', 'Enable', '', '2022-03-10 05:27:03.24899', '21-03-2022 23:13 PM'),
(24, 'sp9522385@gmail.commm', 'dfghjk', 'Dinesh kumar', 'CS', '', '', '', '', 0, '', '1234567890', 'Rajiv gali no 3 fazalpur mandavali nirman vihar new delhi,Delhi', 'Enable', 'Department', '2022-03-21 13:29:54.26044', ''),
(25, 'sp9522385@gmail.com', 'asxcacdc', 'Surya Pratap', 'CS', '', '', '', '', 0, '', '1234567890', 'Front of Aakashdeep hotel,sidhari azamgarh\r\nTiwaripura mau road sidhari', 'Enable', 'Department', '2022-03-21 13:30:21.25692', ''),
(26, 'department@gmail.com', '1234567', 'Department Admin', 'CS', '', '', '', '', 0, '', '1234567890', 'Department New Delhi', 'Enable', 'Department', '2022-03-21 18:40:28.87402', ''),
(29, 'sp9522385@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'surya', '', '', '', '', '', 0, '', '9876543210', '', 'Enable', 'Subadmin', '2022-03-25 04:47:23.20633', '25-03-2022 10:33 AM'),
(53, 'admin@axepertexhibits.comm', 'e10adc3949ba59abbe56e057f20f883e', 'Surya Pratap', '', 'Sales', '', '', '', 0, '', '1234567890', 'Front of Aakashdeep hotel,sidhari azamgarh\r\nTiwaripura mau road sidhari', 'Enable', 'Marketing', '2022-03-28 12:34:37.18658', ''),
(54, 'pratap@gmail.com', '3f088ebeda03513be71d34d214291986', 'Sp', '', '', '', '', '', 0, '', '234567890', '281 3, Shiv Shakti Industry, Sector 104', 'Enable', 'Subadmin', '2022-03-30 05:57:07.22733', ''),
(56, 'customer@gmail.co', '25f9e794323b453885f5181f1b624d0b', 'customer3', '', '', '', '', '', 0, '', '1234567890', '', 'Enable', 'Customer', '2022-03-30 07:43:02.86377', '31-03-2022 13:14 PM'),
(57, 'cust2@gmail.com', '3f088ebeda03513be71d34d214291986', 'cust2', '', '', '', '', '', 0, '', '1234567890', 'Front of Aakashdeep hotel,sidhari azamgarh', 'Enable', 'Customer', '2022-03-30 07:51:47.23329', ''),
(59, 'prataptest@gmail.com', '96e79218965eb72c92a549dd5a330112', '', '', '', 'test4', 'test3', 'test3', 123456789, 'https://themeforest.net/item/velzon-aspnet-core-ad', '1234567890', '', 'Enable', 'Exhibitor', '2022-03-30 12:20:58.85934', '30-03-2022 19:37 PM'),
(60, 'pratap12@gmail.com', '7fa8282ad93047a4d6fe6111c93b308a', '', '', '', 'test2', 'test2', 'test2', 123456789, 'https://themeforest.net/item/velzon-aspnet-core-ad', '1234567890', 'Front of Aakashdeep hotel,sidhari azamgarh', 'Enable', 'Exhibitor', '2022-03-30 13:35:10.61162', ''),
(63, 'caller@gmail.com', '594f803b380a41396ed63dca39503542', 'Surya prataps', '', '', '', '', '', 0, '', '0987654321', 'Vill Bhatpura Post Rasoolpur Distt Juanpur', 'Enable', 'Caller', '2022-03-31 11:45:16.74834', '31-03-2022 17:51 PM'),
(64, 'surya1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Surya pratap', '', 'Sales', '', '', '', 0, '', '1234567890', 'Vill Bhatpura Post Rasoolpur Distt Juanpur', 'Enable', 'Marketing', '2022-04-01 04:15:50.43159', ''),
(65, 'surya2@gmail.com', '96e79218965eb72c92a549dd5a330112', 'pratap', '', 'sales', '', '', '', 0, '', '1234567890', '281 3, Shiv Shakti Industry, Sector 104', 'Enable', 'Marketing', '2022-04-01 04:17:28.87824', '');

-- --------------------------------------------------------

--
-- Table structure for table `pms_admin_role`
--

CREATE TABLE `pms_admin_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `created_at` timestamp(5) NOT NULL DEFAULT current_timestamp(5),
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pms_admin_role`
--

INSERT INTO `pms_admin_role` (`role_id`, `role_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Master', '1', '2022-03-26 08:24:51.10723', ''),
(2, 'Subadmin', '1', '2022-03-26 08:24:51.11251', ''),
(3, 'Department', '1', '2022-03-26 08:24:51.11700', ''),
(4, 'Caller', '1', '2022-03-26 08:24:51.12435', ''),
(5, 'Exhibitor', '1', '2022-03-26 08:24:51.13190', ''),
(6, 'Marketing', '1', '2022-03-26 08:24:51.13615', ''),
(7, 'Customer', '1', '0000-00-00 00:00:00.00000', '');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `role_per_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `sidebar_subtree_id` int(11) NOT NULL,
  `can_view` enum('0','1') NOT NULL,
  `can_edit` enum('0','1') NOT NULL,
  `can_delete` enum('0','1') NOT NULL,
  `can_add` enum('0','1') NOT NULL,
  `can_change_pass` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`role_per_id`, `role_id`, `sidebar_subtree_id`, `can_view`, `can_edit`, `can_delete`, `can_add`, `can_change_pass`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '1', '1', '1', 0, '', ''),
(2, 2, 20, '1', '1', '0', '1', 0, '', ''),
(3, 2, 15, '1', '1', '0', '0', 0, '', ''),
(4, 6, 22, '1', '0', '1', '1', 0, '', ''),
(5, 2, 22, '1', '1', '0', '1', 0, '', ''),
(6, 2, 41, '1', '1', '0', '1', 1, '', ''),
(7, 2, 21, '1', '1', '1', '1', 0, '', ''),
(8, 6, 41, '1', '0', '0', '1', 0, '', ''),
(9, 6, 1, '1', '0', '1', '1', 0, '', ''),
(10, 5, 26, '1', '1', '1', '1', 0, '', ''),
(11, 5, 18, '1', '1', '1', '1', 0, '', ''),
(12, 5, 40, '1', '1', '1', '1', 0, '', ''),
(13, 5, 41, '1', '1', '1', '1', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_category` int(11) NOT NULL,
  `service_desc` text NOT NULL,
  `status` varchar(55) DEFAULT 'Enable',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `serv_cat_id` int(11) NOT NULL,
  `ser_cat_name` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'Enable',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`serv_cat_id`, `ser_cat_name`, `status`, `created_at`) VALUES
(1, 'Test five', 'Disable', '2022-03-31 05:42:24'),
(2, 'Test Two', 'Enable', '2022-03-31 05:42:46'),
(3, 'test three', 'Enable', '2022-03-31 05:50:08'),
(4, 'test four', 'Enable', '2022-03-31 05:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_group`
--

CREATE TABLE `sidebar_group` (
  `sidebar_id` int(11) NOT NULL,
  `sidebar_name` varchar(50) NOT NULL,
  `group_short_name` varchar(50) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>not active,1=>active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sidebar_group`
--

INSERT INTO `sidebar_group` (`sidebar_id`, `sidebar_name`, `group_short_name`, `is_active`, `created_at`) VALUES
(1, 'Access Management', 'access_management', '1', '2022-03-28 05:18:05'),
(2, 'Caller', 'caller', '1', '2022-03-28 05:18:05'),
(3, 'Marketing', 'marketing', '1', '2022-03-28 05:18:05'),
(4, 'Result Of Uploaded Data', 'result_data', '1', '2022-03-28 05:18:05'),
(5, 'Documents Of User', 'docs_user', '1', '2022-03-28 05:18:05'),
(6, 'Reporting Section', 'reporting_section', '1', '2022-03-28 05:18:05'),
(7, 'Finance Admin', 'finance', '1', '2022-03-28 06:44:46'),
(8, 'Task', 'task', '1', '2022-03-28 06:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_subtrees`
--

CREATE TABLE `sidebar_subtrees` (
  `subtree_id` int(11) NOT NULL,
  `sidebar_group_id` int(11) NOT NULL,
  `subtree_attr_name` varchar(50) NOT NULL,
  `short_name` varchar(55) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=> not active,1=>acive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sidebar_subtrees`
--

INSERT INTO `sidebar_subtrees` (`subtree_id`, `sidebar_group_id`, `subtree_attr_name`, `short_name`, `is_active`, `created_at`) VALUES
(1, 1, 'Subadmin', 'sub_admin', '1', '2022-03-28 05:31:22'),
(2, 1, 'Department Admin', 'department_admin', '1', '2022-03-28 06:17:30'),
(3, 2, 'Caller', 'caller', '1', '2022-03-28 06:17:56'),
(4, 2, 'Upload Data', 'upload_data', '1', '2022-03-28 06:19:15'),
(5, 2, 'Feedback List', 'feedback_list', '1', '2022-03-28 06:19:58'),
(6, 2, 'Work Alloted List', 'work_alloted_list', '1', '2022-03-28 06:20:19'),
(7, 2, 'Profile Management', 'caller_profile_management', '1', '2022-03-28 06:23:03'),
(8, 2, 'Payment for the form', 'caller_payment', '1', '2022-03-28 06:28:17'),
(9, 3, 'Marketing', 'marketing_admin', '1', '2022-03-28 06:29:07'),
(10, 3, 'Follow the lead', 'caller_follow_lead', '1', '2022-03-28 06:29:30'),
(11, 0, 'Operation Admin', 'operation_admin', '1', '2022-03-28 06:30:22'),
(12, 0, 'Designing Admin', 'designing_admin', '1', '2022-03-28 06:31:06'),
(13, 7, 'Finanace Admin', 'finance_admin', '1', '2022-03-28 06:31:20'),
(14, 7, 'Invoice', 'finance_invoice', '1', '2022-03-28 06:32:17'),
(15, 0, 'Change Password', 'change_password', '1', '2022-03-28 06:47:16'),
(16, 0, 'Payments', 'payments', '1', '2022-03-28 06:50:48'),
(17, 0, 'Expense Sheet', 'expense_sheet', '1', '2022-03-28 06:51:23'),
(18, 0, 'Services', 'services', '1', '2022-03-28 06:51:48'),
(19, 0, 'Setting Management', 'setting_management', '1', '2022-03-28 06:52:51'),
(20, 0, 'Create Events', 'create_events', '1', '2022-03-28 06:53:29'),
(21, 0, 'Create Calls', 'create_calls', '1', '2022-03-28 06:53:50'),
(22, 0, 'Exhibitors', 'exhibitors', '1', '2022-03-29 07:06:48'),
(23, 0, 'Payment Details', 'payment_details', '1', '2022-03-30 05:33:52'),
(24, 0, 'Change Status Of Form', 'change_status_form', '1', '2022-03-30 05:34:40'),
(25, 0, 'Manage Setting', 'manage_setting', '1', '2022-03-30 05:35:11'),
(26, 0, 'Task', 'task', '1', '2022-03-30 05:35:51'),
(27, 4, 'Not Intrested', 'notintrested', '1', '2022-03-30 05:38:55'),
(28, 4, 'Show Intrested', 'showintrest', '1', '2022-03-30 05:39:43'),
(29, 4, 'Later', 'laterintrest', '1', '2022-03-30 05:40:19'),
(30, 4, 'Confirm', 'confirmintrest', '1', '2022-03-30 05:40:50'),
(31, 5, 'Employee Documents', 'emp_docs', '1', '2022-03-30 05:41:42'),
(32, 5, 'Exhibitors documents', 'exhi_docs', '1', '2022-03-30 05:42:13'),
(33, 5, 'Subadmin Documents', 'sub_docs', '1', '2022-03-30 05:42:43'),
(34, 6, 'Clients', 'reporting_client', '1', '2022-03-30 05:46:03'),
(35, 6, 'Events', 'reporting_events', '1', '2022-03-30 05:46:28'),
(36, 6, 'Check Records', 'reporting_check_record', '1', '2022-03-30 05:47:03'),
(37, 6, 'Payments', 'reporting_payment', '1', '2022-03-30 05:47:31'),
(38, 4, 'Result Uploaded Data', 'result_uploaded_data', '1', '2022-03-30 06:16:59'),
(39, 5, 'Documents Of User', 'docs_user', '1', '2022-03-30 06:17:32'),
(40, 0, 'Invoice', 'invoice', '1', '2022-03-30 06:22:03'),
(41, 7, 'Customer', 'customer', '1', '2022-03-30 06:53:16'),
(60, 6, 'Reporting Section', 'reporting_section', '1', '2022-03-30 06:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `work_alloted_list`
--

CREATE TABLE `work_alloted_list` (
  `work_allot_id` int(11) NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `work` text NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'Peding',
  `created_at` timestamp(5) NOT NULL DEFAULT current_timestamp(5),
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `pms_admin_role`
--
ALTER TABLE `pms_admin_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`role_per_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`serv_cat_id`);

--
-- Indexes for table `sidebar_group`
--
ALTER TABLE `sidebar_group`
  ADD PRIMARY KEY (`sidebar_id`);

--
-- Indexes for table `sidebar_subtrees`
--
ALTER TABLE `sidebar_subtrees`
  ADD PRIMARY KEY (`subtree_id`);

--
-- Indexes for table `work_alloted_list`
--
ALTER TABLE `work_alloted_list`
  ADD PRIMARY KEY (`work_allot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `admin_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `pms_admin_role`
--
ALTER TABLE `pms_admin_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `role_per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `serv_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sidebar_group`
--
ALTER TABLE `sidebar_group`
  MODIFY `sidebar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sidebar_subtrees`
--
ALTER TABLE `sidebar_subtrees`
  MODIFY `subtree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `work_alloted_list`
--
ALTER TABLE `work_alloted_list`
  MODIFY `work_allot_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
