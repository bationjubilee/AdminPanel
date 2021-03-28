-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 10:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangaydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_id` int(10) NOT NULL,
  `add_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `add_desc`) VALUES
(1, 'sitio man-ibay, apos kahoy'),
(2, 'sitio lantawon, apos kahoy'),
(3, 'sitio mantalyok, apos kahoy'),
(4, 'sitio rosario, apos kahoy'),
(5, 'sitio san roque, apos kahoy'),
(6, 'sitio quiapo, apos kahoy'),
(7, 'sitio impakibel, apos kahoy');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `Compl_ID` int(100) NOT NULL,
  `SMS_ID` int(11) DEFAULT NULL,
  `res_id` int(11) DEFAULT NULL,
  `Status_ID` int(11) DEFAULT NULL,
  `schedule_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `incharge`
--

CREATE TABLE `incharge` (
  `inCharge_ID` int(50) NOT NULL,
  `inCharge_person` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `res_id` int(5) NOT NULL,
  `res_Fname` varchar(50) NOT NULL,
  `res_Lname` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` char(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mobile_no` bigint(30) NOT NULL,
  `add_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`res_id`, `res_Fname`, `res_Lname`, `age`, `gender`, `status`, `mobile_no`, `add_id`) VALUES
(1, 'Jubilee', 'Bation', 23, 'f', 'single', 9977430719, 1),
(2, 'Mary Joy', 'Bailio', 22, 'f', 'single', 9982499234234, 5),
(3, 'Aipaj Mark', 'Bation', 19, 'male', 'widowed', 8987968676575, 2),
(4, 'Threcia', 'Laurente', 34, 'female', 'widowed', 4563535325, 4),
(5, 'Kristelle', 'Catapang', 45, 'female', 'married', 32422423432, 3),
(6, 'Meriel Kim', 'Bation', 21, 'male', 'married', 32421241231, 5),
(7, 'Ruda', 'Quilicot', 35, 'Female', 'Married', 99774307192, 4);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_ID` int(11) NOT NULL,
  `schedule_date` date DEFAULT NULL,
  `incharge_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `SMS_ID` int(100) NOT NULL,
  `MobileNo` bigint(100) NOT NULL,
  `Message` varchar(1000) DEFAULT NULL,
  `SMS_Keyword_ID` int(50) NOT NULL,
  `SMS_Date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `res_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`SMS_ID`, `MobileNo`, `Message`, `SMS_Keyword_ID`, `SMS_Date`, `res_id`) VALUES
(3, 9982499234234, 'Land Problems\r\nakong ireklamo si joy bailio\r\nnga gapataka lang tukod sa iyang balay\r\ndadto sa among tugkaran', 2, '2021-03-13 03:07:04.629277', 2),
(4, 4563535325, 'VAWC\r\nakong ireklamo si jill nga \r\ngikulata akong anak nga nisulod sa ilang balay\r\ngikuha lang among iro.', 4, '2021-03-13 03:09:52.747426', 4),
(9, 9977430719, 'VAWC\r\nako si belay akong ireklamo akong\r\nsilingan na si aipaj gikulata akong\r\nmanghod na si kim', 4, '2021-03-15 10:47:26.399297', 1),
(10, 9977430719, 'akong ireklamo si jill sa iyang mga basura\r\nna pataka ug labay bisan asa.', 0, '2021-03-15 10:50:10.698858', 1),
(15, 9977430719, 'Environment\r\nakong ireklamo si threcia nga\r\nsigeg paaso sa ilang balay\r\ngipangssunog ang mg basura.', 5, '2021-03-15 12:03:35.785544', 1),
(17, 9977430719, 'Peace and Order\r\nakong ireklamo si joy nga sige \r\nug patukar sa ilang videoki matag gabii\r\ngrabi kabanha maglisod mig katulog.', 1, '2021-03-15 12:07:31.869260', 1),
(18, 9977430719, 'ako si joy akong ireklamo si belay\r\nsa iyang baboy tangkalan na perti na\r\nkau ka baho bisan mangaon mi among\r\ngakasimhotan ug daghan nasad langaw.', 0, '2021-03-15 12:09:09.686210', 1),
(19, 9977430719, 'Environment\r\nakong ireklamo si jill gapangawat ug kamunggay sa among tugkaran.', 5, '2021-03-16 04:49:04.251730', 1),
(20, 9977430719, 'ako si belay akong ireklamo si joy\r\nbecause she is always punching me\r\nand I think it will fall into VAWC category.', 4, '2021-03-17 02:39:31.993433', 1),
(21, 994424565554, 'Land Problems\r\nakong ireklamo si joy kay gapataka\r\nug tukod sa iyang tangkalan diri sa among\r\ntapad na lote na panag iya sa akong manghod\r\nug kaning akong reklamo may kalabutan sad sa\r\nHealth and Sanitation kay baho iyang tangkalan', 2, '2021-03-17 02:54:10.858439', 0),
(22, 9977430719, 'akong ireklamo si joy kalabutan sa Land Problems\r\nkay gibaligya niya ang yuta sa akong inahan nga igo lang namo\r\ngipa puy an sa iyaha.', 2, '2021-03-17 22:35:05.729707', 1),
(23, 9977430719, 'VAWC\r\nireklamo nako si joy kay gisumbag ko', 4, '2021-03-17 23:46:49.062018', 1),
(24, 9977430719, 'Environment\r\nhello this is jubilee i want to report joy\r\nfor her tangkalan nga makadaut sa katilingban', 5, '2021-03-18 00:01:36.777599', 1),
(25, 9977430719, 'Environment\r\nmessage here', 5, '2021-03-18 00:03:28.531226', 1),
(26, 4563535325, 'Land Problems\r\naong ireklamo si belay sa iyang gi squat nga lote\r\nsa akong magulang nga dugay ng nabakante kay tua\r\nsa abroad  ug karon si jubilee bation na ang gabuot-buot\r\nnga gapanag iya.', 2, '2021-03-22 02:26:15.135641', 4),
(27, 32422423432, 'Health and Sanitation\r\nakong ireklamo ang bakery ni joy bailio nga grabi ka hugaw\r\nwalay saktong hinlo ang mga gamit ug iyang mga trabahante walay\r\nproper hygiene, lood kau ipalit ug bread product sa ilaha.', 3, '2021-03-22 02:29:10.577826', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sms_inbox`
--

CREATE TABLE `sms_inbox` (
  `inbox_id` int(10) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `sms_content` varchar(500) NOT NULL,
  `SMS_Date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_inbox`
--

INSERT INTO `sms_inbox` (`inbox_id`, `mobile_no`, `sms_content`, `SMS_Date`) VALUES
(1, 9977430719, 'Land Problems\r\nakong ireklamo si joy bailio kay nangawat ug yuta isa ka sako sa mong tugkaran.', '2021-02-17 12:07:05.090997'),
(8, 992654884548454854, 'VAWC\r\n\"ako ay isang kriminal\"', '2021-03-03 18:31:07.163755'),
(9, 992654884548454854, 'VAWC\r\n\"ako ay isang kriminal\"', '2021-03-03 19:38:32.834478'),
(12, 9656565444, 'Environment\r\nhello ako si belay ireklamo si joy', '2021-03-12 22:32:51.832973'),
(13, 2069595484, 'Environment\r\nako si jill kiatan kaau', '2021-03-12 22:43:14.350721'),
(14, 2069595484, 'Environment\r\nako si jill kiatan kaau', '2021-03-12 22:43:14.356014'),
(15, 1649845848544, 'Environment\r\nhello ako buday', '2021-03-12 22:44:43.012283'),
(16, 4946548494, 'VAWC\r\nAKO SI BELAY GWAPA KAAYO SUPER', '2021-03-12 22:46:35.663066'),
(27, 22648484548404, 'hjfdffdk\r\nfdfkjf dofndfdij fjdovidv dvfvf', '2021-03-12 23:45:33.621524'),
(28, 9982499234234, 'Land Problems\r\nakong ireklamo si joy bailio\r\nnga gapataka lang tukod sa iyang balay\r\ndadto sa among tugkaran', '2021-03-13 03:07:04.735138'),
(29, 4563535325, 'VAWC\r\nakong ireklamo si jill nga \r\ngikulata akong anak nga nisulod sa ilang balay\r\ngikuha lang among iro.', '2021-03-13 03:09:52.830165');

-- --------------------------------------------------------

--
-- Table structure for table `sms_keyword`
--

CREATE TABLE `sms_keyword` (
  `SMS_Keyword_ID` int(20) NOT NULL,
  `Keyword_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_keyword`
--

INSERT INTO `sms_keyword` (`SMS_Keyword_ID`, `Keyword_desc`) VALUES
(0, 'Uncategorized'),
(1, 'Peace and Order'),
(2, 'Land Problems'),
(3, 'Health and Sanitation'),
(4, 'VAWC'),
(5, 'Environment');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Status_ID` int(10) NOT NULL,
  `Status_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 87.0.4280.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'Windows 10', '2021-01-23 21:50:32'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 87.0.4280.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'Windows 10', '2021-01-24 07:45:03'),
(3, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 87.0.4280.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'Windows 10', '2021-01-24 08:27:34'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-28 03:37:52'),
(5, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-28 09:45:15'),
(6, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-28 11:24:59'),
(7, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-28 11:52:10'),
(8, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-28 11:52:36'),
(9, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-28 13:10:16'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-28 13:18:04'),
(11, 10, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Joy Bailio\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-28 13:19:00'),
(12, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:14:57'),
(13, 10, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Joy Bailio\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:15:15'),
(14, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:20:02'),
(15, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:21:07'),
(16, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:24:50'),
(17, 10, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Joy Bailio\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:25:04'),
(18, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:25:43'),
(19, 10, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Joy Bailio\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:26:00'),
(20, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-01 23:27:44'),
(21, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-02 01:41:18'),
(22, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-03 02:59:54'),
(23, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-04 17:08:44'),
(24, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-04 22:37:34'),
(25, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-04 22:38:17'),
(26, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-04 22:42:20'),
(27, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-04 22:50:19'),
(28, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-04 22:55:18'),
(29, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 'Windows 10', '2021-02-10 05:34:54'),
(30, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 10', '2021-02-15 22:08:03'),
(31, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 10', '2021-02-22 15:17:34'),
(32, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 10', '2021-02-24 22:17:50'),
(33, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 88.0.4324.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'Windows 10', '2021-02-25 01:35:08'),
(34, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-13 01:53:02'),
(35, 10, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Joy Bailio\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-13 01:53:31'),
(36, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-13 01:54:32'),
(37, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-13 20:48:30'),
(38, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-14 03:30:21'),
(39, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-15 16:32:15'),
(40, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-15 22:36:38'),
(41, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-16 04:35:57'),
(42, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-16 21:42:48'),
(43, 10, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Joy Bailio\"}', '::1', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-17 03:02:52'),
(44, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-17 22:44:17'),
(45, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-20 09:03:09'),
(46, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-20 18:21:34'),
(47, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-21 23:23:48'),
(48, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-21 23:23:49'),
(49, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-22 05:07:09'),
(50, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-23 13:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` bigint(20) NOT NULL DEFAULT 1,
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@example.com', '$2y$10$4..vAqg3ht4c2oWmqlCDMehQmS4EPL8uE0SDqVB0VuJPTvG34Oaui', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2021-02-04 15:38:01'),
(2, 'manager@example.com', '$2y$10$quODe6vkNma30rcxbAHbYuKYAZQqUaflBgc4YpV9/90ywd.5Koklm', 'Manager', '9890098900', 2, 0, 1, '2016-12-09 17:49:56', 1, '2018-01-12 07:22:11'),
(3, 'employee@example.com', '$2y$10$UYsH1G7MkDg1cutOdgl2Q.ZbXjyX.CSjsdgQKvGzAgl60RXZxpB5u', 'Employee', '9890098900', 3, 0, 1, '2016-12-09 17:50:22', 3, '2018-01-04 07:58:28'),
(9, 'jubileebation23@gmail.com', '$2y$10$.5Q.Fl9yl.65JesoIKgYZeBNG7M.fGx6hOn66fazY53j0X7jhVShi', 'Jubilee Bation', '2325454346', 2, 0, 1, '2021-01-24 00:46:52', NULL, NULL),
(10, 'joyjoy@gmail.com', '$2y$10$izHkVRstBH9nZ9rnnQssBO8OxF7XuqlZXtHTRXhkK1LVDtFFFK./C', 'Joy Bailio', '424234234343243', 2, 0, 1, '2021-01-28 03:15:52', 1, '2021-02-22 08:26:49'),
(11, 'caliv19@gmail.com', '$2y$10$yw74Zl07ZiyQ50d3b1AJLexH5Se7YDACBGh30TPB2fZdbf2IMNDO.', 'Vinz Caliv Calamba', '4242342343', 2, 0, 1, '2021-02-22 08:26:17', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`Compl_ID`),
  ADD KEY `res_id` (`res_id`),
  ADD KEY `Status_ID` (`Status_ID`),
  ADD KEY `schedule_ID` (`schedule_ID`);

--
-- Indexes for table `incharge`
--
ALTER TABLE `incharge`
  ADD PRIMARY KEY (`inCharge_ID`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `add_id` (`add_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_ID`),
  ADD KEY `incharge_ID` (`incharge_ID`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`SMS_ID`),
  ADD KEY `SMS_Keyword_ID` (`SMS_Keyword_ID`) USING BTREE,
  ADD KEY `res_id` (`res_id`);

--
-- Indexes for table `sms_inbox`
--
ALTER TABLE `sms_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `sms_keyword`
--
ALTER TABLE `sms_keyword`
  ADD PRIMARY KEY (`SMS_Keyword_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_ID`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `Compl_ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incharge`
--
ALTER TABLE `incharge`
  MODIFY `inCharge_ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `res_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `SMS_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sms_inbox`
--
ALTER TABLE `sms_inbox`
  MODIFY `inbox_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `resident` (`res_id`),
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`Status_ID`),
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`schedule_ID`) REFERENCES `schedule` (`schedule_ID`);

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`add_id`) REFERENCES `address` (`add_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`incharge_ID`) REFERENCES `incharge` (`inCharge_ID`);

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_ibfk_1` FOREIGN KEY (`SMS_Keyword_ID`) REFERENCES `sms_keyword` (`SMS_Keyword_ID`),
  ADD CONSTRAINT `sms_ibfk_2` FOREIGN KEY (`res_id`) REFERENCES `resident` (`res_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
