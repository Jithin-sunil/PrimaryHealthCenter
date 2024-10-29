-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 03:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_contact`) VALUES
(3, 'Devika', 'devika@gmail.com', '123456', '9778041634');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `booking_fordate` varchar(50) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `booking_token` varchar(50) NOT NULL,
  `phc_id` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_fordate`, `subcategory_id`, `booking_token`, `phc_id`, `sc_id`, `user_id`, `booking_status`) VALUES
(2, '2024-09-26', '2024-10-03', 2, '', 1, 0, 1, ''),
(4, '2024-09-26', '2024-10-09', 2, '', 0, 2, 1, ''),
(5, '2024-10-18', '2024-10-30', 5, '', 1, 0, 1, ''),
(6, '2024-10-18', '2024-11-01', 4, '', 0, 2, 1, ''),
(7, '2024-10-18', '2024-10-30', 0, '', 1, 0, 1, ''),
(8, '2024-10-18', '2024-10-30', 0, '', 0, 0, 1, ''),
(9, '2024-10-18', '2024-10-23', 2, '', 1, 0, 1, ''),
(10, '2024-10-18', '2024-10-23', 2, '', 1, 0, 1, ''),
(11, '2024-10-18', '2024-10-23', 2, '', 1, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Vaccination for infants and children'),
(2, 'Vaccination for Adolscents'),
(3, 'Vaccination for Pregnant Women'),
(4, 'Vaccination for Adults'),
(5, 'Special vaccination programs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college`
--

CREATE TABLE `tbl_college` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_content` varchar(50) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_reply` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_date` varchar(50) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(5, 'Kasargod'),
(6, 'Kannur'),
(7, 'Wayanad'),
(8, 'Kozhikode'),
(9, 'Malappuram'),
(11, 'Palakkad'),
(12, 'Thrissur'),
(13, 'Ernakulam'),
(14, 'Idukki'),
(15, 'Kottayam'),
(16, 'Alappuzha'),
(17, 'Pathanamthitta'),
(18, 'Kollam'),
(19, 'Thiruvananthapuram'),
(20, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dmo`
--

CREATE TABLE `tbl_dmo` (
  `dmo_id` int(11) NOT NULL,
  `dmo_name` varchar(50) NOT NULL,
  `dmo_email` varchar(50) NOT NULL,
  `dmo_contact` varchar(50) NOT NULL,
  `dmo_password` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dmo`
--

INSERT INTO `tbl_dmo` (`dmo_id`, `dmo_name`, `dmo_email`, `dmo_contact`, `dmo_password`, `district_id`) VALUES
(1, 'Dr.A.V Ramadas', 'dmohksd@gmail.com', '9946105497', 'dmohks999', 5),
(2, 'Dr.R.Ramesh', 'dmo.kannur@gmail.com', '0497-2700244', 'dmo04', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employe`
--

CREATE TABLE `tbl_employe` (
  `employe_id` int(11) NOT NULL,
  `employe_name` varchar(50) NOT NULL,
  `employe_gender` varchar(50) NOT NULL,
  `employe_contact` varchar(50) NOT NULL,
  `employe_email` varchar(50) NOT NULL,
  `employe_department` varchar(50) NOT NULL,
  `employe_salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_title` varchar(50) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_date` varchar(50) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `feedback_reply` varchar(100) NOT NULL,
  `feedback_status` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panchayat`
--

CREATE TABLE `tbl_panchayat` (
  `panchayat_id` int(11) NOT NULL,
  `panchayat_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_panchayat`
--

INSERT INTO `tbl_panchayat` (`panchayat_id`, `panchayat_name`, `district_id`) VALUES
(13, 'kumbla', 5),
(14, 'Manjeshwar', 5),
(16, 'Payyannur', 6),
(17, 'Taliparamba', 6),
(18, 'Vythiri', 7),
(19, 'Meppadi', 7),
(20, 'Balussery', 8),
(21, 'Perambra', 8),
(22, 'Areekode', 9),
(23, 'Kottakkal', 9),
(24, 'Alathur', 11),
(25, 'Chittur', 11),
(26, 'Kodakara', 12),
(27, 'Koratty', 12),
(28, 'Angamaly', 13),
(29, 'Kothamangalam', 13),
(30, 'Adimali', 14),
(31, 'Kattappana', 14),
(32, 'Aymanam', 15),
(33, 'Kanjirappally', 15),
(34, 'Cherthala', 16),
(35, 'Edathua', 16),
(36, 'Adoor', 17),
(37, 'Chengannur', 17),
(38, 'Ayoor', 18),
(39, 'Kottarakara', 18),
(40, 'Neyyattinkara', 19),
(41, 'Kochuveli', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phc`
--

CREATE TABLE `tbl_phc` (
  `phc_id` int(11) NOT NULL,
  `phc_email` varchar(50) NOT NULL,
  `phc_contact` varchar(50) NOT NULL,
  `phc_password` varchar(50) NOT NULL,
  `phc_address` varchar(100) NOT NULL,
  `phc_photo` varchar(11) NOT NULL,
  `panchayat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phc`
--

INSERT INTO `tbl_phc` (`phc_id`, `phc_email`, `phc_contact`, `phc_password`, `phc_address`, `phc_photo`, `panchayat_id`) VALUES
(1, 'tnqkumbla321@gmail.com', '7560356266', 'kumblaphc321', ' Edapally - Panvel Highway, Kumbla (Kumble), Kumbla-671321 ', '', 13),
(2, 'phcmanjeshwar323@gmail.com', '6282493546', 'mannnjeshwar323', 'PW45+96W, Angadipadavu, Hosangadi-Anekallu Rd, Manjeshwar, Kerala 671323', '', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scvaccination`
--

CREATE TABLE `tbl_scvaccination` (
  `vc_id` int(11) NOT NULL,
  `vc_date` varchar(50) NOT NULL,
  `vc_starttime` varchar(50) NOT NULL,
  `vc_endtime` varchar(50) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `phc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_std`
--

CREATE TABLE `tbl_std` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `visit_count` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_details` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `subcategory_details`) VALUES
(2, ' BCG(Bacillous Calmette Guerin)  ', 1, ' For tuberculosis(Given at birth or as early as possible until  1 year of age)'),
(3, ' OPV(Oral Polio Vaccine)', 1, ' For Polio(at birth,6,10,and 14 weeks)'),
(4, ' Hepatitis B', 1, ' For Hepatitis B(at birth,6,10,and 14 weeks) '),
(5, ' Pentavalent Vaccine(DPT-HepB-Hib', 1, '  For diphtheria, pertussis, tetanus, hepatitis B, and Haemophilus influenzae type B (at 6, 10, and 14 weeks)\r\n'),
(6, ' Rotavirus Vaccine', 1, '\r\n  For rotavirus diarrhea (at 6, 10, and 14 weeks)\r\n'),
(7, ' IPV (Inactivated Polio Vaccine)', 1, ' For polio (at 6 and 14 weeks)\r\n'),
(8, ' Measles and Rubella (MR) Vaccine', 1, ' For measles and rubella (first dose at 9-12 months; second dose at 16-24 months)\r\n'),
(9, 'JE (Japanese Encephalitis) Vaccine (in endemic areas)', 1, 'For Japanese encephalitis (9 months and 16-24 months) '),
(10, ' DPT Booster', 1, '  For diphtheria, pertussis, and tetanus (at 16-24 months and 5-6 years)\r\n'),
(11, ' Typhoid Conjugate Vaccine (TCV)', 1, ' For typhoid fever (9-12 months)\r\n'),
(12, ' Td Vaccine (Tetanus and Diphtheria)', 2, ' At 10 and 16 years\r\n'),
(13, ' Td (Tetanus and Diphtheria)', 3, '2 doses during pregnancy (or a booster dose if vaccinated in the past)\r\n'),
(14, ' COVID-19 Vaccines', 4, '(as per guidelines, including first, second, and booster doses)\r\n'),
(15, ' Influenza Vaccine', 4, '\r\n  For high-risk groups like healthcare workers, elderly, or those with chronic illnesses (if applicable in specific programs)\r\n'),
(16, ' Hepatitis B Vaccine', 4, ' For adults at risk of hepatitis B infection\r\n'),
(17, ' COVID-19 Vaccination', 5, ' Following national and state guidelines for different age groups, including booster doses.\r\n'),
(18, ' Vaccination for Travelers', 5, '\r\n Based on specific diseases prevalent in certain regions (yellow fever, cholera, etc.).\r\n'),
(19, ' Vaccination for Occupational Risks ', 5, '\r\n  Healthcare workers may receive additional vaccines like Hepatitis B, Rabies (if exposed), etc.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcenter`
--

CREATE TABLE `tbl_subcenter` (
  `sc_id` int(11) NOT NULL,
  `sc_email` varchar(50) NOT NULL,
  `sc_contact` varchar(50) NOT NULL,
  `sc_password` varchar(50) NOT NULL,
  `sc_address` varchar(100) NOT NULL,
  `sc_photo` varchar(200) NOT NULL,
  `village_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcenter`
--

INSERT INTO `tbl_subcenter` (`sc_id`, `sc_email`, `sc_contact`, `sc_password`, `sc_address`, `sc_photo`, `village_id`) VALUES
(2, 'scarikkady321@gmail.com', '8676432325', 'scarikkady321', 'Arikkady, Kasaragod District,kerala 671321', 'IMG-20240926-WA0004.jpg', 8),
(3, 'scpaivalike322@gmail.com', '', 'scpaivalike322', 'Paivalike,Kasargod Kerala 671322', 'IMG-20240926-WA0006.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_dob` varchar(50) NOT NULL,
  `village_id` int(11) NOT NULL,
  `user_address` text NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_gender`, `user_dob`, `village_id`, `user_address`, `user_password`, `user_photo`) VALUES
(1, 'Jithin', 'jithin@gmail.com', '85899966875', 'Male', '2023-11-28', 8, 'Home', 'Q1q2q3q4*', 'IMG-20240926-WA0007.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_village`
--

CREATE TABLE `tbl_village` (
  `village_id` int(11) NOT NULL,
  `village_name` varchar(50) NOT NULL,
  `panchayat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_village`
--

INSERT INTO `tbl_village` (`village_id`, `village_name`, `panchayat_id`) VALUES
(8, 'Arikkady', 13),
(9, 'Paivalike', 14),
(10, '', 0),
(11, 'Vellur', 16),
(12, 'Pariyaram', 17),
(13, 'Pozhuthana', 18),
(14, 'Puthumala', 19),
(15, 'Naduvannur', 20),
(16, 'Cheruvannur', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_college`
--
ALTER TABLE `tbl_college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_dmo`
--
ALTER TABLE `tbl_dmo`
  ADD PRIMARY KEY (`dmo_id`);

--
-- Indexes for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  ADD PRIMARY KEY (`employe_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_panchayat`
--
ALTER TABLE `tbl_panchayat`
  ADD PRIMARY KEY (`panchayat_id`);

--
-- Indexes for table `tbl_phc`
--
ALTER TABLE `tbl_phc`
  ADD PRIMARY KEY (`phc_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_scvaccination`
--
ALTER TABLE `tbl_scvaccination`
  ADD PRIMARY KEY (`vc_id`);

--
-- Indexes for table `tbl_std`
--
ALTER TABLE `tbl_std`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_subcenter`
--
ALTER TABLE `tbl_subcenter`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_village`
--
ALTER TABLE `tbl_village`
  ADD PRIMARY KEY (`village_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_college`
--
ALTER TABLE `tbl_college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_dmo`
--
ALTER TABLE `tbl_dmo`
  MODIFY `dmo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  MODIFY `employe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_panchayat`
--
ALTER TABLE `tbl_panchayat`
  MODIFY `panchayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_phc`
--
ALTER TABLE `tbl_phc`
  MODIFY `phc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_scvaccination`
--
ALTER TABLE `tbl_scvaccination`
  MODIFY `vc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_std`
--
ALTER TABLE `tbl_std`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_subcenter`
--
ALTER TABLE `tbl_subcenter`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_village`
--
ALTER TABLE `tbl_village`
  MODIFY `village_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
