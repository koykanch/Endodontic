-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2017 at 07:10 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `dentalstudent_info`
--

CREATE TABLE `dentalstudent_info` (
  `student_code` char(9) NOT NULL COMMENT 'รหัสนักศึกษา',
  `student_name` char(100) NOT NULL COMMENT 'ชื่อนักศึกษา',
  `student_timebegin` date NOT NULL COMMENT 'ช่วงเวลาที่อยู่รักษาผู้ป่วย',
  `student_timeend` date NOT NULL COMMENT 'ช่วงเวลาที่หยุดรักษาผู้ป่วย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentalstudent_info`
--

INSERT INTO `dentalstudent_info` (`student_code`, `student_name`, `student_timebegin`, `student_timeend`) VALUES
('540910016', 'Chayanit Upanun', '2017-01-15', '2017-02-28'),
('560910015', 'Chonsiri Vechpanich', '2017-01-15', '2017-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `dental_his`
--

CREATE TABLE `dental_his` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `chief_complaint` text COMMENT 'อาการที่เป็นสาเหตุให้มาพบแพทย์',
  `his_of_presentill` text COMMENT 'ประวัติของการป่วยในปัจจุบัน',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dental_member`
--

CREATE TABLE `dental_member` (
  `username` char(9) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` text NOT NULL COMMENT 'รหัสผ่านเข้าใช้งานระบบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dental_member`
--

INSERT INTO `dental_member` (`username`, `password`) VALUES
('00003', 'e8f5fb8a8510c55c2747f3f91b058e0f'),
('00004', 'e007cf6c849f975d465a5afa1b0d1f38'),
('540910016', '73f7634ab3f381fb40995f93740b3f8a'),
('560910015', 'af032fbcb07ffc7bd2569d86ae4ce1f5');

-- --------------------------------------------------------

--
-- Table structure for table `dentist_info`
--

CREATE TABLE `dentist_info` (
  `dentId` char(9) NOT NULL COMMENT 'รหัสทันตแพทย์',
  `dent_name` char(100) NOT NULL COMMENT 'ชื่อของทันตแพทย์',
  `status` bit(1) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dentist_info`
--

INSERT INTO `dentist_info` (`dentId`, `dent_name`, `status`) VALUES
('00003', 'yoona lim', b'1'),
('00004', 'kanyanat chiangtha', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `dent_hardcopy`
--

CREATE TABLE `dent_hardcopy` (
  `HN` int(11) NOT NULL,
  `hard_Date` datetime NOT NULL,
  `student_code` char(9) DEFAULT NULL COMMENT AS `รหัสนักศึกษา`,
  `dentId` char(9) DEFAULT NULL COMMENT AS `รหัสทันตแพทย์`,
  `hardcopyData` longblob,
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dent_login`
--

CREATE TABLE `dent_login` (
  `Seq_no` int(11) NOT NULL,
  `username` char(9) NOT NULL,
  `login_time` datetime NOT NULL COMMENT 'เวลาที่เข้าใช้งานระบบ',
  `logout_time` datetime DEFAULT NULL COMMENT AS `เวลาออกจากระบบ`
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dent_login`
--

INSERT INTO `dent_login` (`Seq_no`, `username`, `login_time`, `logout_time`) VALUES
(1, '00004', '2017-03-01 12:57:50', '2017-03-01 12:57:54'),
(2, '00004', '2017-03-01 12:58:21', '2017-03-01 12:58:35'),
(3, '00004', '2017-03-01 13:10:29', '2017-03-01 15:10:15'),
(4, '560910015', '2017-03-02 01:42:15', '2017-03-02 01:45:53'),
(5, '540910016', '2017-03-02 01:46:14', '2017-03-05 02:11:31'),
(6, '00004', '2017-03-03 12:13:22', '2017-03-03 12:18:35'),
(7, '00004', '2017-03-03 12:36:11', '2017-03-03 13:02:59'),
(8, '560910015', '2017-03-03 13:03:18', '2017-03-03 13:15:23'),
(9, '560910015', '2017-03-03 13:42:41', '2017-03-03 13:42:53'),
(10, '560910015', '2017-03-03 13:45:35', '2017-03-03 13:57:59'),
(11, '00004', '2017-03-03 13:58:26', '2017-03-03 14:17:19'),
(12, '00004', '2017-03-03 14:29:29', '2017-03-03 14:29:44'),
(13, '560910015', '2017-03-03 14:29:56', '2017-03-03 14:56:46'),
(14, '00004', '2017-03-03 14:57:03', '2017-03-05 01:13:43'),
(15, '00004', '2017-03-05 01:13:27', '2017-03-05 01:13:43'),
(16, '540910016', '2017-03-05 01:17:40', '2017-03-05 02:11:31'),
(17, '560910015', '2017-03-05 02:11:42', '2017-03-05 02:21:26'),
(18, '00004', '2017-03-05 14:13:32', '2017-03-05 14:36:19'),
(19, '540910016', '2017-03-05 14:36:54', '2017-03-11 03:30:20'),
(20, '540910016', '2017-03-07 13:33:43', '2017-03-11 03:30:20'),
(21, '540910016', '2017-03-11 02:14:53', '2017-03-11 03:30:20'),
(22, '00004', '2017-03-12 14:45:10', '2017-03-12 14:57:42'),
(23, '00004', '2017-03-13 12:37:36', '2017-03-13 12:43:54'),
(24, '00004', '2017-03-13 13:15:02', '2017-03-13 14:10:12'),
(25, '00004', '2017-03-14 00:14:07', '2017-03-14 01:14:44'),
(26, '00004', '2017-03-16 11:06:25', '2017-03-16 14:20:03'),
(27, '00004', '2017-03-17 13:30:11', '2017-03-18 14:07:58'),
(28, '00004', '2017-03-18 00:25:10', '2017-03-18 14:07:58'),
(29, '00004', '2017-03-18 12:36:59', '2017-03-18 14:07:58'),
(30, '00004', '2017-03-19 01:23:48', '2017-03-19 02:42:14'),
(31, '00004', '2017-03-20 14:26:16', '2017-03-20 14:28:13'),
(32, '00004', '2017-03-21 01:14:54', '2017-03-21 02:37:32'),
(33, '00004', '2017-03-21 11:34:26', '2017-03-21 12:16:43'),
(34, '00004', '2017-03-21 12:45:52', '2017-03-21 14:40:23'),
(35, '00004', '2017-03-21 13:33:26', '2017-03-21 14:40:23'),
(36, '540910016', '2017-03-21 14:40:50', NULL),
(37, '00004', '2017-03-21 18:14:23', '2017-03-22 16:00:42'),
(38, '00004', '2017-03-22 00:54:23', '2017-03-22 16:00:42'),
(39, '00004', '2017-03-22 11:05:47', '2017-03-22 16:00:42'),
(40, '00004', '2017-03-22 20:52:46', '2017-03-24 07:12:07'),
(41, '00004', '2017-03-23 02:11:10', '2017-03-24 07:12:07'),
(42, '00004', '2017-03-23 03:19:16', '2017-03-24 07:12:07'),
(43, '00004', '2017-03-23 20:20:53', '2017-03-24 07:12:07'),
(44, '00004', '2017-03-24 04:36:30', '2017-03-24 07:12:07'),
(45, '00004', '2017-03-24 13:04:43', '2017-03-24 13:28:14'),
(46, '00004', '2017-03-24 14:26:34', NULL),
(47, '00004', '2017-03-25 01:05:17', NULL),
(48, '00004', '2017-03-26 14:09:38', NULL),
(49, '00004', '2017-03-27 01:22:04', NULL),
(50, '00004', '2017-03-27 12:38:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `duration_id` char(2) NOT NULL COMMENT 'รหัสระยะเวลาที่มีอาการ',
  `duration_detail` char(50) NOT NULL COMMENT 'รายละเอียดระยะเวลาที่มีอาการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`duration_id`, `duration_detail`) VALUES
('01', 'seconds'),
('02', 'minutes'),
('03', 'hours'),
('04', 'intermittent'),
('05', 'constant');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `HN` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `exam_tooth` char(2) NOT NULL,
  `exam_EPT` int(11) NOT NULL COMMENT 'ทดสอบด้วยกระแสไฟฟ้า',
  `exam_cold` char(10) NOT NULL COMMENT 'ทดสอบด้วยความเย็น',
  `exam_heat` char(10) NOT NULL COMMENT 'ทดสอบด้วยความร้อน',
  `exam_perc` char(10) NOT NULL COMMENT 'ทดสอบด้วยการเคาะฟัน',
  `exam_palp` char(10) NOT NULL COMMENT 'ทดสอบด้วยการคลาฟัน',
  `exam_mobility` char(1) NOT NULL COMMENT 'ทดสอบการโยกของฟัน',
  `exam_perioMB` char(3) NOT NULL COMMENT 'ทดสอบฝั่ง MB โดยใช้อุปกรณ์มีหน่วยเป็นมิลลิเมตร (mm)',
  `exam_perioB` char(3) NOT NULL COMMENT 'ทดสอบฝั่ง B โดยใช้อุปกรณ์มีหน่วยเป็นมิลลิเมตร (mm)',
  `exam_perioDB` char(3) NOT NULL COMMENT 'ทดสอบฝั่ง DB โดยใช้อุปกรณ์มีหน่วยเป็นมิลลิเมตร (mm)',
  `exam_perioML` char(3) NOT NULL COMMENT 'ทดสอบฝั่ง ML โดยใช้อุปกรณ์มีหน่วยเป็นมิลลิเมตร (mm)',
  `exam_perioL` char(3) NOT NULL COMMENT 'ทดสอบฝั่ง L โดยใช้อุปกรณ์มีหน่วยเป็นมิลลิเมตร (mm)',
  `exam_perioDL` char(3) NOT NULL COMMENT 'ทดสอบฝั่ง DL โดยใช้อุปกรณ์มีหน่วยเป็นมิลลิเมตร (mm)',
  `spectest_id` char(2) DEFAULT NULL COMMENT AS `การทดสอบพิเศษ`,
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `extra_facial`
--

CREATE TABLE `extra_facial` (
  `facialswell_id` char(2) NOT NULL COMMENT 'รหัสตาแหน่งที่บวม',
  `facialswell_detail` char(50) NOT NULL COMMENT 'รายละเอียดตาแหน่งที่บวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `extra_facial`
--

INSERT INTO `extra_facial` (`facialswell_id`, `facialswell_detail`) VALUES
('01', 'aaaa'),
('02', 'bbbb');

-- --------------------------------------------------------

--
-- Table structure for table `extra_lymphnode`
--

CREATE TABLE `extra_lymphnode` (
  `lymphnode_id` char(2) NOT NULL COMMENT 'รหัสตาแหน่งที่บวม',
  `lymphnode_detail` char(50) NOT NULL COMMENT 'รายละเอียดตาแหน่งที่บวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `extra_lymphnode`
--

INSERT INTO `extra_lymphnode` (`lymphnode_id`, `lymphnode_detail`) VALUES
('01', 'lymphnodeaaa'),
('02', 'lymphnodebbb');

-- --------------------------------------------------------

--
-- Table structure for table `extra_sinus`
--

CREATE TABLE `extra_sinus` (
  `sinustract_id` char(2) NOT NULL COMMENT 'รหัสตาแหน่งรูหนองนอกปาก',
  `sinustract_detail` char(50) NOT NULL COMMENT 'รายละเอียดตาแหน่งรูหนองนอกปาก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `extra_sinus`
--

INSERT INTO `extra_sinus` (`sinustract_id`, `sinustract_detail`) VALUES
('01', 'sinusaaa'),
('02', 'sinusbbb');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` char(2) NOT NULL COMMENT 'รหัสตาแหน่งที่มีอาการ',
  `location_detail` char(50) NOT NULL COMMENT 'รายละเอียดตาแหน่งที่มีอาการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_detail`) VALUES
('01', 'localized'),
('02', 'diffused');

-- --------------------------------------------------------

--
-- Table structure for table `medical_his`
--

CREATE TABLE `medical_his` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `none` bit(1) DEFAULT NULL COMMENT AS `ผู้ป่วยไม่มีประวัติการเป็นโรค`,
  `cardiovascular` bit(1) DEFAULT NULL COMMENT AS `ผู้ป่วยเป็นโรคหัวใจ`,
  `pulmonary` bit(1) DEFAULT NULL COMMENT AS `ผู้ป่วยเป็นโรคปอด`,
  `gastrointestinal` bit(1) DEFAULT NULL COMMENT AS `ผู้ป่วยเป็นโรคระบบทางเดินอาหาร`,
  `hematologis` bit(1) DEFAULT NULL COMMENT AS `ผู้ป่วยเป็นโรคระบบโลหิต`,
  `Neurologic` bit(1) DEFAULT NULL COMMENT AS `ผู้ป่วยเป็นโรคทางระบบประสาท`,
  `allergic` char(100) DEFAULT NULL COMMENT AS `โรคภูมิแพ้`,
  `blood_pres1` int(3) DEFAULT NULL COMMENT AS `ความดันโลหิต`,
  `blood_pres2` int(3) DEFAULT NULL,
  `Other` text COMMENT 'อื่น ๆ',
  `taking_med` text COMMENT 'ยาที่ทาน',
  `personal_doc` char(100) DEFAULT NULL COMMENT AS `แพทย์ส่วนตัว`,
  `Tel` char(100) DEFAULT NULL COMMENT AS `เบอร์โทร`,
  `remark` text COMMENT 'หมายเหตุ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `object_symptom`
--

CREATE TABLE `object_symptom` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `ext_facialswelling` bit(1) DEFAULT NULL COMMENT AS `มีอาการบวมบริเวณใบหน้า`,
  `ext_lymphnode` bit(1) DEFAULT NULL COMMENT AS `บวมบริเวณใต้ขากรรไกรล่าง`,
  `ext_sinustract` bit(1) DEFAULT NULL COMMENT AS `มีรูเปิดทางนอกปาก`,
  `ext_other` text COMMENT 'อื่น ๆ',
  `intra_swellsoftOrfirm` bit(1) DEFAULT NULL COMMENT AS `อาการบวมในช่องปาก`,
  `intra_swellarea` char(3) DEFAULT NULL COMMENT AS `พื้นที่อาการบวมในช่องปาก`,
  `intra_sinustract` char(3) DEFAULT NULL COMMENT AS `รูเปิดหนองในปาก`,
  `tooth_caries` bit(1) DEFAULT NULL COMMENT AS `ฟันผุ`,
  `tooth_restoration` char(50) DEFAULT NULL COMMENT AS `การอุดฟัน`,
  `tooth_pulpexposure` bit(1) DEFAULT NULL COMMENT AS `เนื้อเยื่อฟันขยายตัว`,
  `tooth_pulppolyp` bit(1) DEFAULT NULL COMMENT AS `ฟันผุถึงโพรงประสาทฟัน`,
  `tooth_fracture` char(50) DEFAULT NULL COMMENT AS `ตาแหน่งแตกหักของฟัน`,
  `tooth_crown` char(50) DEFAULT NULL COMMENT AS `การเปลี่ยนสีของฟัน`,
  `tooth_open` bit(1) DEFAULT NULL COMMENT AS `เปิดฟันเพื่อเจาะหนอง`,
  `tooth_temp` bit(1) DEFAULT NULL COMMENT AS `ครอบฟันชั่วคราว`,
  `tooth_other` text COMMENT 'อื่น ๆ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pain_character`
--

CREATE TABLE `pain_character` (
  `painchar_id` char(2) NOT NULL COMMENT 'รหัสลักษณะการปวดของอาการ',
  `painchar_detail` char(50) NOT NULL COMMENT 'รายละเอียดลักษณะการปวดของอาการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pain_character`
--

INSERT INTO `pain_character` (`painchar_id`, `painchar_detail`) VALUES
('01', 'dull'),
('02', 'sharp'),
('03', 'throbbing');

-- --------------------------------------------------------

--
-- Table structure for table `pain_intensity`
--

CREATE TABLE `pain_intensity` (
  `paininten_id` char(2) NOT NULL COMMENT 'รหัสระดับความเจ็บปวด',
  `paininten_detail` char(50) NOT NULL COMMENT 'รายละเอียดระดับความเจ็บปวด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pain_intensity`
--

INSERT INTO `pain_intensity` (`paininten_id`, `paininten_detail`) VALUES
('01', 'none'),
('02', 'mild'),
('03', 'moderate'),
('04', 'severe');

-- --------------------------------------------------------

--
-- Table structure for table `patients_info`
--

CREATE TABLE `patients_info` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `patientName` char(100) NOT NULL COMMENT 'ชื่อของผู้ป่วยทางทันตกรรม',
  `gender` char(1) NOT NULL COMMENT 'เพศ',
  `birthdate` date NOT NULL COMMENT 'วันเกิด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients_info`
--

INSERT INTO `patients_info` (`HN`, `patientName`, `gender`, `birthdate`) VALUES
(5, 'Jame Smith', 'F', '1998-02-17'),
(6, 'Taylor Sm', 'F', '1994-01-17'),
(7, 'a', 'm', '2017-03-18'),
(8, 'b', 'm', '2017-03-01'),
(9, 'c', 'F', '2009-01-14'),
(10, 'd', 'm', '2017-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `patients_xray`
--

CREATE TABLE `patients_xray` (
  `Seq_no` int(11) NOT NULL COMMENT 'รหัสภาพรังสีวิทยาฟัน',
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` date NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `xrayData` longblob NOT NULL COMMENT 'เก็บไฟล์ในรูปแบบไบนารี',
  `xray_datetime` datetime NOT NULL COMMENT 'วันเวลาที่บันทึกภาพรังสีวิทยาฟัน',
  `edit_date` datetime DEFAULT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periradicular_diagnosis`
--

CREATE TABLE `periradicular_diagnosis` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `Normal` bit(1) NOT NULL COMMENT 'ปกติ',
  `sympOrasympt_apical` char(1) NOT NULL COMMENT 'เนื้อเยื่อรอบปลายรากอักเสบแบบมีอาการ',
  `acuteOrchronic_apical` char(1) NOT NULL COMMENT 'การบวมของปลายรากฟัน',
  `other` text NOT NULL COMMENT 'อื่น ๆ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pulpal_diagnosis`
--

CREATE TABLE `pulpal_diagnosis` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `normal` bit(1) NOT NULL COMMENT 'วินิจฉัยว่าไม่เป็นโรค',
  `ReverOrIrreversiblepulp` char(1) NOT NULL COMMENT 'การอักเสบของเนื้อเยื่อ',
  `Irreversible_sympOrasymp` char(1) NOT NULL COMMENT 'รูปแบบการอักเสบของเนื้อเยื่อที่ผันกลับไม่ได้',
  `pulp_necrosis` bit(1) NOT NULL COMMENT 'วินิจฉัยเนื้อเยื่อตาย',
  `prev_initiat` bit(1) NOT NULL COMMENT 'มีการรักษาที่เริ่มต้นก่อนหน้านี้',
  `prev_treated` bit(1) NOT NULL COMMENT 'การรักษาที่ได้รับก่อนหน้านี้',
  `prev_treated_improper` bit(1) NOT NULL COMMENT 'ได้รับการรักษาที่ไม่ถูกต้อง',
  `prev_treated_incomplete` bit(1) NOT NULL COMMENT 'ได้รับการรักษาแต่ไม่สาเร็จ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radiograph_alveolar`
--

CREATE TABLE `radiograph_alveolar` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `bone_normal` bit(1) DEFAULT NULL COMMENT AS `ปกติ`,
  `bone_genOrlocal` char(1) DEFAULT NULL COMMENT AS `การละลายตัวของกระดูกวงกว้าง`,
  `bone_other` text COMMENT 'อื่น ๆ',
  `remark` text COMMENT 'หมายเหตุ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radiograph_crown`
--

CREATE TABLE `radiograph_crown` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `crown_normal` bit(1) DEFAULT NULL COMMENT AS `ส่วนตัวฟันปกติ`,
  `crown_caries` bit(1) DEFAULT NULL COMMENT AS `สถานะฟันผุ`,
  `crown_cariesarea` char(2) DEFAULT NULL COMMENT AS `ฟันผุที่ตาแหน่งไหน`,
  `crown_cariesdepth` char(3) DEFAULT NULL COMMENT AS `ขนาดความลึกของฟันผุ`,
  `crown_restoration` bit(1) DEFAULT NULL COMMENT AS `มีวัสดุอุดฟัน`,
  `crown_fracture` bit(1) DEFAULT NULL COMMENT AS `การแตกหักของฟัน`,
  `crown_other` text COMMENT 'อื่น ๆ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radiograph_perirad`
--

CREATE TABLE `radiograph_perirad` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `perirad_normal` bit(1) DEFAULT NULL COMMENT AS `ส่วนปลายรากฟันปกติ`,
  `perirad_wideningPDL` bit(1) DEFAULT NULL COMMENT AS `มีการขยายตัวของปลายรากฟัน`,
  `perirad_lossoflam` bit(1) DEFAULT NULL COMMENT AS `มีบางส่วนของปลายรากฟันสูญหายไป`,
  `perirad_periapical1` char(3) DEFAULT NULL COMMENT AS `มีรอยโรคที่ปลายรากฟันมีหน่วยเป็นมิลลิเมตร (mm)`,
  `perirad_periapical2` char(3) DEFAULT NULL,
  `perirad_lateral1` char(3) DEFAULT NULL COMMENT AS `มีถุงหนองที่เจาะปลายรากฟัน มีหน่วยเป็นมิลลิเมตร (mm)`,
  `perirad_lateral2` char(3) DEFAULT NULL,
  `perirad_resorption` bit(1) DEFAULT NULL COMMENT AS `มีการละลายที่ปลายรากฟัน`,
  `perirad_openapex` char(3) DEFAULT NULL COMMENT AS `การปิดของปลายรากฟัน`,
  `perirad_osteos` bit(1) DEFAULT NULL COMMENT AS `เห็นกระดูกขาว ๆ ที่ปลายรากฟัน`,
  `perirad_hyper` bit(1) DEFAULT NULL COMMENT AS `เห็นกระดูกขาว ๆ ที่ส่วนอื่น ๆ ของฟัน`,
  `perirad_other` text COMMENT 'อื่น ๆ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radiograph_pulpcanal`
--

CREATE TABLE `radiograph_pulpcanal` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `pulpcan_normal` bit(1) DEFAULT NULL COMMENT AS `คลองรากฟันปกติ`,
  `pulpcan_calPartOrComp` char(1) DEFAULT NULL COMMENT AS `การตีบตันของคลองรากฟัน`,
  `pulpcan_resorption` bit(1) DEFAULT NULL COMMENT AS `มีการละลายของคลองรากฟัน`,
  `pulpcan_perforation` bit(1) DEFAULT NULL COMMENT AS `มีการเจาะคลองรากฟัน`,
  `pulpcan_previousRCT` bit(1) DEFAULT NULL COMMENT AS `มีการรักษารากฟันมาก่อน`,
  `pulpcan_broken` bit(1) DEFAULT NULL COMMENT AS `มีการแตกหักของคลองรากฟัน`,
  `pulpcan_other` text COMMENT 'อื่น ๆ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radiograph_pulpcham`
--

CREATE TABLE `radiograph_pulpcham` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `pulpcham_normal` bit(1) NOT NULL COMMENT 'เนื้อเยื่อในโพรงฟันปกติ',
  `pulpcham_calPartOrComp` char(1) DEFAULT NULL COMMENT AS `การตีบตันของเนื้อเยื่อ`,
  `pulpcham_pulpstone` bit(1) NOT NULL COMMENT 'มีหินข้างในเนื้อเยื่อ',
  `pulpcham_resorption` bit(1) NOT NULL COMMENT 'มีการละลายตัวของเนื้อเยื่อ',
  `pulpcham_other` text NOT NULL COMMENT 'อื่น ๆ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radiograph_root`
--

CREATE TABLE `radiograph_root` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `root_normal` bit(1) NOT NULL COMMENT 'รากฟันปกติ',
  `root_caries` bit(1) NOT NULL COMMENT 'มีการผุใกล้รากฟัน',
  `root_curvature` bit(1) NOT NULL COMMENT 'รากฟันมีลักษณะโค้ง',
  `root_extresorption` bit(1) NOT NULL COMMENT 'มีการละลายตัวของรากฟัน',
  `root_fracture` bit(1) NOT NULL COMMENT 'มีการแตกหักของรากฟัน',
  `root_other` text NOT NULL COMMENT 'อื่น ๆ',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `special_test`
--

CREATE TABLE `special_test` (
  `spectest_id` char(2) NOT NULL COMMENT 'รหัสการทดสอบฟันแบบพิเศษ',
  `spectest_detail` char(50) NOT NULL COMMENT 'รายละเอียดการทดสอบฟันแบบพิเศษ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `special_test`
--

INSERT INTO `special_test` (`spectest_id`, `spectest_detail`) VALUES
('01', 'illumination test'),
('02', 'dye test'),
('03', 'anes test');

-- --------------------------------------------------------

--
-- Table structure for table `stimulation_required`
--

CREATE TABLE `stimulation_required` (
  `stimulation_id` char(2) NOT NULL,
  `stimulation_detail` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stimulation_required`
--

INSERT INTO `stimulation_required` (`stimulation_id`, `stimulation_detail`) VALUES
('01', 'hot'),
('02', 'cold'),
('03', 'biting');

-- --------------------------------------------------------

--
-- Table structure for table `subject_symptom`
--

CREATE TABLE `subject_symptom` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `paininten_id` char(2) NOT NULL COMMENT 'ระดับความเจ็บปวด',
  `painchar_id` char(2) NOT NULL COMMENT 'ลักษณะของการเจ็บปวด',
  `duration_id` char(2) NOT NULL COMMENT 'ระยะเวลาของการเจ็บปวด',
  `locat_locOrdiff` char(2) DEFAULT NULL COMMENT AS `ตาแหน่งที่เจ็บ (จากัด/กระจาย)`,
  `onset_spontaneous` bit(1) NOT NULL COMMENT 'สาเหตุของการปวด',
  `stimulation_id` char(2) DEFAULT NULL COMMENT AS `รหัสสาเหตุของการปวด`,
  `onset_other` text,
  `locat_radiating` char(50) DEFAULT NULL COMMENT AS `ตาแหน่งที่เจ็บแบบแผ่กระจาย`,
  `locat_referred` char(50) DEFAULT NULL COMMENT AS `ตาแหน่งที่ได้รับผลกระทบ`,
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_plan`
--

CREATE TABLE `treatment_plan` (
  `HN` int(11) NOT NULL COMMENT 'รหัสผู้ป่วย',
  `Date` datetime NOT NULL COMMENT 'วันที่บันทึกแบบฟอร์ม',
  `no_treatment` bit(1) NOT NULL COMMENT 'ไม่ทาการรักษา',
  `Pulpotomy` bit(1) NOT NULL COMMENT 'รักษาโพรงประสาทฟัน',
  `pulp_partOrfull` char(1) DEFAULT NULL COMMENT AS `การรักษาโพรงประสาทฟัน`,
  `pulpectomy` bit(1) NOT NULL COMMENT 'รักษารากฟัน',
  `non_sur_root` bit(1) NOT NULL COMMENT 'รักษาคลองรากฟันแบบไม่ผ่าตัด',
  `non_sur_retreat` bit(1) NOT NULL COMMENT 'การรักษาแบบไม่ผ่าตัด',
  `apexification` bit(1) NOT NULL COMMENT 'สร้างเนื้อเยื่อแข็งที่ปลายรากฟัน',
  `intentionalRCT` bit(1) NOT NULL COMMENT 'รักษารากฟัน',
  `sur_root` bit(1) NOT NULL COMMENT 'รักษารากฟันด้วยการผ่าตัด',
  `perio_consult` bit(1) NOT NULL COMMENT 'การปรึกษา',
  `treat_other` text NOT NULL COMMENT 'อื่น ๆ',
  `plan_for_final` text NOT NULL COMMENT 'วางแผนขั้นต่อไป',
  `pre_op_treat_caries` bit(1) NOT NULL COMMENT 'เตรียมวัสดุอุดฟัน',
  `pre_op_treat_dam` bit(1) NOT NULL COMMENT 'เตรียมแผ่นยางอนามัย',
  `pre_op_treat_other` text NOT NULL,
  `Anest_reqOrnotreq` bit(1) NOT NULL COMMENT 'การให้ยาระงับความรู้สึก',
  `date_treatment` date NOT NULL,
  `edit_by` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dentalstudent_info`
--
ALTER TABLE `dentalstudent_info`
  ADD PRIMARY KEY (`student_code`);

--
-- Indexes for table `dental_his`
--
ALTER TABLE `dental_his`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `dental_his_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `dental_member`
--
ALTER TABLE `dental_member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dentist_info`
--
ALTER TABLE `dentist_info`
  ADD PRIMARY KEY (`dentId`);

--
-- Indexes for table `dent_hardcopy`
--
ALTER TABLE `dent_hardcopy`
  ADD PRIMARY KEY (`HN`,`hard_Date`),
  ADD KEY `student_code` (`student_code`,`dentId`),
  ADD KEY `hard_Date` (`hard_Date`),
  ADD KEY `dent_hardcopy_ibfk_3` (`dentId`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `dent_login`
--
ALTER TABLE `dent_login`
  ADD PRIMARY KEY (`Seq_no`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`duration_id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`HN`,`Date`,`exam_tooth`),
  ADD KEY `spectest_id` (`spectest_id`),
  ADD KEY `Date` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `extra_facial`
--
ALTER TABLE `extra_facial`
  ADD PRIMARY KEY (`facialswell_id`);

--
-- Indexes for table `extra_lymphnode`
--
ALTER TABLE `extra_lymphnode`
  ADD PRIMARY KEY (`lymphnode_id`);

--
-- Indexes for table `extra_sinus`
--
ALTER TABLE `extra_sinus`
  ADD PRIMARY KEY (`sinustract_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `medical_his`
--
ALTER TABLE `medical_his`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `medical_his_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `object_symptom`
--
ALTER TABLE `object_symptom`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `object_symptom_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `pain_character`
--
ALTER TABLE `pain_character`
  ADD PRIMARY KEY (`painchar_id`);

--
-- Indexes for table `pain_intensity`
--
ALTER TABLE `pain_intensity`
  ADD PRIMARY KEY (`paininten_id`);

--
-- Indexes for table `patients_info`
--
ALTER TABLE `patients_info`
  ADD PRIMARY KEY (`HN`);

--
-- Indexes for table `patients_xray`
--
ALTER TABLE `patients_xray`
  ADD PRIMARY KEY (`Seq_no`,`HN`),
  ADD KEY `patients_xray_ibfk_1` (`HN`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `periradicular_diagnosis`
--
ALTER TABLE `periradicular_diagnosis`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `periradicular_diagnosis_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `pulpal_diagnosis`
--
ALTER TABLE `pulpal_diagnosis`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `pulpal_diagnosis_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `radiograph_alveolar`
--
ALTER TABLE `radiograph_alveolar`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `radiograph_alveolar_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `radiograph_crown`
--
ALTER TABLE `radiograph_crown`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `radiograph_crown_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `radiograph_perirad`
--
ALTER TABLE `radiograph_perirad`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `radiograph_perirad_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `radiograph_pulpcanal`
--
ALTER TABLE `radiograph_pulpcanal`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `radiograph_pulpcanal_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `radiograph_pulpcham`
--
ALTER TABLE `radiograph_pulpcham`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `radiograph_pulpcham_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `radiograph_root`
--
ALTER TABLE `radiograph_root`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `radiograph_root_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `special_test`
--
ALTER TABLE `special_test`
  ADD PRIMARY KEY (`spectest_id`);

--
-- Indexes for table `stimulation_required`
--
ALTER TABLE `stimulation_required`
  ADD PRIMARY KEY (`stimulation_id`);

--
-- Indexes for table `subject_symptom`
--
ALTER TABLE `subject_symptom`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `paininten_id` (`paininten_id`,`painchar_id`,`duration_id`,`locat_locOrdiff`),
  ADD KEY `subject_symptom_ibfk_4` (`painchar_id`),
  ADD KEY `subject_symptom_ibfk_5` (`duration_id`),
  ADD KEY `subject_symptom_ibfk_6` (`locat_locOrdiff`),
  ADD KEY `stimulation_id` (`stimulation_id`),
  ADD KEY `subject_symptom_ibfk_7` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- Indexes for table `treatment_plan`
--
ALTER TABLE `treatment_plan`
  ADD PRIMARY KEY (`HN`,`Date`),
  ADD KEY `treatment_plan_ibfk_2` (`Date`),
  ADD KEY `edit_by` (`edit_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dental_his`
--
ALTER TABLE `dental_his`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dent_hardcopy`
--
ALTER TABLE `dent_hardcopy`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dent_login`
--
ALTER TABLE `dent_login`
  MODIFY `Seq_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `medical_his`
--
ALTER TABLE `medical_his`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `object_symptom`
--
ALTER TABLE `object_symptom`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patients_info`
--
ALTER TABLE `patients_info`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `patients_xray`
--
ALTER TABLE `patients_xray`
  MODIFY `Seq_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสภาพรังสีวิทยาฟัน', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `periradicular_diagnosis`
--
ALTER TABLE `periradicular_diagnosis`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pulpal_diagnosis`
--
ALTER TABLE `pulpal_diagnosis`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `radiograph_alveolar`
--
ALTER TABLE `radiograph_alveolar`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `radiograph_crown`
--
ALTER TABLE `radiograph_crown`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `radiograph_perirad`
--
ALTER TABLE `radiograph_perirad`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `radiograph_pulpcanal`
--
ALTER TABLE `radiograph_pulpcanal`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `radiograph_pulpcham`
--
ALTER TABLE `radiograph_pulpcham`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `radiograph_root`
--
ALTER TABLE `radiograph_root`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subject_symptom`
--
ALTER TABLE `subject_symptom`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `treatment_plan`
--
ALTER TABLE `treatment_plan`
  MODIFY `HN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ป่วย', AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dental_his`
--
ALTER TABLE `dental_his`
  ADD CONSTRAINT `dental_his_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dental_his_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dental_his_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dent_hardcopy`
--
ALTER TABLE `dent_hardcopy`
  ADD CONSTRAINT `dent_hardcopy_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `patients_info` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dent_hardcopy_ibfk_2` FOREIGN KEY (`student_code`) REFERENCES `dentalstudent_info` (`student_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dent_hardcopy_ibfk_3` FOREIGN KEY (`dentId`) REFERENCES `dentist_info` (`dentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dent_hardcopy_ibfk_4` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examination`
--
ALTER TABLE `examination`
  ADD CONSTRAINT `examination_ibfk_3` FOREIGN KEY (`spectest_id`) REFERENCES `special_test` (`spectest_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_ibfk_4` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_ibfk_5` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_ibfk_6` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_his`
--
ALTER TABLE `medical_his`
  ADD CONSTRAINT `medical_his_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medical_his_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medical_his_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `object_symptom`
--
ALTER TABLE `object_symptom`
  ADD CONSTRAINT `object_symptom_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `object_symptom_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `object_symptom_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patients_xray`
--
ALTER TABLE `patients_xray`
  ADD CONSTRAINT `patients_xray_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patients_xray_ibfk_2` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `periradicular_diagnosis`
--
ALTER TABLE `periradicular_diagnosis`
  ADD CONSTRAINT `periradicular_diagnosis_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `periradicular_diagnosis_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `periradicular_diagnosis_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pulpal_diagnosis`
--
ALTER TABLE `pulpal_diagnosis`
  ADD CONSTRAINT `pulpal_diagnosis_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pulpal_diagnosis_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pulpal_diagnosis_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radiograph_alveolar`
--
ALTER TABLE `radiograph_alveolar`
  ADD CONSTRAINT `radiograph_alveolar_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_alveolar_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_alveolar_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radiograph_crown`
--
ALTER TABLE `radiograph_crown`
  ADD CONSTRAINT `radiograph_crown_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_crown_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_crown_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radiograph_perirad`
--
ALTER TABLE `radiograph_perirad`
  ADD CONSTRAINT `radiograph_perirad_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_perirad_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_perirad_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radiograph_pulpcanal`
--
ALTER TABLE `radiograph_pulpcanal`
  ADD CONSTRAINT `radiograph_pulpcanal_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_pulpcanal_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_pulpcanal_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radiograph_pulpcham`
--
ALTER TABLE `radiograph_pulpcham`
  ADD CONSTRAINT `radiograph_pulpcham_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_pulpcham_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_pulpcham_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radiograph_root`
--
ALTER TABLE `radiograph_root`
  ADD CONSTRAINT `radiograph_root_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_root_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiograph_root_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_symptom`
--
ALTER TABLE `subject_symptom`
  ADD CONSTRAINT `subject_symptom_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_symptom_ibfk_3` FOREIGN KEY (`paininten_id`) REFERENCES `pain_intensity` (`paininten_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_symptom_ibfk_4` FOREIGN KEY (`painchar_id`) REFERENCES `pain_character` (`painchar_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_symptom_ibfk_5` FOREIGN KEY (`duration_id`) REFERENCES `duration` (`duration_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_symptom_ibfk_6` FOREIGN KEY (`locat_locOrdiff`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_symptom_ibfk_7` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_symptom_ibfk_8` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment_plan`
--
ALTER TABLE `treatment_plan`
  ADD CONSTRAINT `treatment_plan_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `dent_hardcopy` (`HN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_plan_ibfk_2` FOREIGN KEY (`Date`) REFERENCES `dent_hardcopy` (`hard_Date`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_plan_ibfk_3` FOREIGN KEY (`edit_by`) REFERENCES `dental_member` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
