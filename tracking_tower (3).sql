-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 02:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_tower`
--

-- --------------------------------------------------------

--
-- Table structure for table `circle_office`
--

CREATE TABLE `circle_office` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circle_office`
--

INSERT INTO `circle_office` (`id`, `name`) VALUES
(1, 'Golaghat Rev. Circle'),
(2, 'Bokakhat Rev. Circle'),
(3, 'Khumtai Rev. Circle'),
(4, 'Sarupathar Rev. Circle'),
(5, 'Morongi Rev. Circle'),
(6, 'Dergaon Rev. Circle');

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

CREATE TABLE `company_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `details` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_master`
--

INSERT INTO `company_master` (`id`, `name`, `status`, `details`) VALUES
(1, 'Reliance Jio infocomm Ltd.', 0, '2nd Floor, Bijay Crescent bldg, Rukminigaon G.S Road,  Guwahati-781022'),
(2, 'Bharti Infratel Ltd.', 0, '6th Floor, Bijay Crescent bldg, Rukminigaon G.S Road,  Guwahati-781022');

-- --------------------------------------------------------

--
-- Table structure for table `master_application`
--

CREATE TABLE `master_application` (
  `id` int(11) NOT NULL,
  `site_id` varchar(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `owner_address` varchar(400) NOT NULL,
  `dagno` int(11) NOT NULL,
  `pattano` int(11) NOT NULL,
  `lattitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `dd_no` varchar(50) DEFAULT NULL,
  `dd_date` date DEFAULT NULL,
  `dd_status` int(11) NOT NULL DEFAULT '1',
  `dd_remarks` varchar(600) DEFAULT NULL,
  `remarks` varchar(999) DEFAULT NULL,
  `receivedon` date NOT NULL,
  `curr_status` int(11) NOT NULL DEFAULT '0',
  `year` int(11) DEFAULT NULL,
  `plot_type` varchar(50) DEFAULT NULL,
  `tower_type` varchar(5) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `validity` date DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_application`
--

INSERT INTO `master_application` (`id`, `site_id`, `company_id`, `co_id`, `owner_name`, `owner_address`, `dagno`, `pattano`, `lattitude`, `longitude`, `dd_no`, `dd_date`, `dd_status`, `dd_remarks`, `remarks`, `receivedon`, `curr_status`, `year`, `plot_type`, `tower_type`, `length`, `width`, `validity`, `is_delete`) VALUES
(1, 'GOLA09', 2, 1, 'MRS. LAKHIMI BORDOLOI', 'W/o Lt. Dimbodhar ordoloi, Golaghat, Vill-Bongain, P/O Golaghat, P/S Golaghat -785621', 3408, 1200, '26.51172', '93.98605', '219791', '2018-10-04', 2, NULL, 'Old Application missing. Re-send duplicate copy. DD deposit not clear', '2019-07-08', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(2, 'BOAT-RIL-9008', 1, 2, 'NA', 'Anup Saikia ; S/O. Lt. Bhadreswar Saikia ; Ward No.2 ; Mohmaiki Gaon ; P.O. Bokakhat ; P.S. Bokakhat ; Dist. Golaghat ; Pin. 785612 ; Ph.No. 9854061127 / 8404006802.', 0, 0, '26.632019', '93.603614', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(3, 'BOAT-RIL-9015', 1, 2, 'NA', 'Sri Sri Gomotha Mahora Satra ; Satradhikar ; Sri. Gautam Goswami, S/O. Lt. Atul Ch. Goswami ; Gumutha Mahora Satra, Mohura Borpothar, P.O. Goria Borpothar, P.S. Kamargaon, DIST. Golaghat, PIN.785619 ; PH.NO.9859309213 / 9101934375.', 0, 0, '26.667066', '93.784355', '0', '1970-01-01', 2, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(4, 'BOAT-RIL-9016', 1, 2, 'NA', 'Site Add. Dipanju Sarmah ; S/O. Lt. Prafulla Sarmah ; Vill. Kakochang ; Kakochang Waterfalls Road ; Opp. Kakochang L.P. School ; P.O. Bokakhat ; P.S. Bokakhat ; Dist. Golaghat ; Pin 785612 ; Ph. 9435154318 ; 7002144066.', 723, 17, '26.589471', '93.613062', '990105', '2019-03-11', 1, NULL, '', '1970-01-01', 8, 2019, 'Open Plot', 'GBT', 15, 15, '2038-12-09', 0),
(5, 'BOAT-RIL-9018', 1, 2, 'NA', 'Ananda Ram Saikia ; S/O. Late Indreswar Saikia ; Vill. Kandhulimari ; P.O. Borjuri ; P.S. Bokakhat ; Pin. 785612 ; Dist. Golaghat ; Ph. No. 9365804430, 9706281583.', 0, 0, '26.654695', '93.560976', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(6, 'BOAT-RIL-9019', 1, 2, 'NA', 'Mrs. Shasiprabha Das ;  W/O. Lt. Kamal Ch. Das ; Ward No. 3 ; P.O. Bokakhat ; P.S. Bokakhat ; Dist. Golaghat ; Pin. 785612 ; Ph. No. 9864796386 / 8135030075.', 0, 0, '26.642882', '93.603227', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(7, 'BOAT-RIL-9020', 1, 2, 'NA', 'Pangkaj Saikia @ Pankaj Saikia ; S/O. Lt.  Nabin Saikia ; Vill. Bokakhat ward No. 01 ; Opp. Bokakhat Block ; P.O. Bokakha ; P.S. Bokakhat ; Pin. 785612 ; Ph. No. 9085724307 / 9365368360.', 0, 0, '26.641731', '93.590532', '0', '1970-01-01', 2, NULL, 'MISSING', '2018-12-26', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(8, 'BOAT-RIL-9021', 1, 2, 'NA', 'Madhav Pegu ; S/O. Sri Dharmeswar Pegu ; Vill. Amtenga Balijan ; P.O. Balijan ; P.S. Bokakhat ; Pin. 785612 ; Ph. No. 6001054755.', 0, 0, '26.623071', '93.592427', '0', '1970-01-01', 2, NULL, 'MISSING', '2018-12-19', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(9, 'BOAT-RIL-9022', 1, 2, 'NA', 'Chan Bahadur Chetry ; S/O. Late Bhim Bahadur Chetry ; Vill. Bokakhat Bagan (Ikorajan) ; P.O. Bokakhat ; P.S. Bokakhat ; Dist. Golaghat ; Pin. 785612 ; Ph. No. 8638104710 / 8723048426.', 83, 75, '26.651958', '93.630926', '0', '1970-01-01', 2, NULL, '', '1970-01-01', 8, 2019, 'Open Plot', 'GBT', 10, 10, '2038-12-16', 0),
(10, 'BRPH-RIL-9001', 1, 4, 'NA', 'Nirmal Kanti Dey ; S/O. Late Rajendra  Kumar Dey ; Vill. Singimari ; P.O. Barpathar ; P.S. Barpathar ; Pin. 785602 ; Dist. Golaghat ; Ph. No. 9436404182 / 8471996803. ', 0, 0, '26.270862', '93.889044', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(11, 'DERG-RIL-9008', 1, 6, 'NA', 'Rajen Taid ( Rajen Pegu )? ; S/O. Late Bamun Pegu ; Vill. Dani Chapori ; P.O. Dani Chapori ; P.S. Dani Chapori ; Dist. Golaghat ; Pin.785614 ; Ph.No.9401140772', 0, 0, '26.744553', '93.934659', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(12, 'DERG-RIL-9009', 1, 6, 'NA', 'Gopi Kanta Pasung ; S/O. Lt. Dutiram Pasung ; Bahguri; Near Bahguri High SchooL ; P.O. Bahguri ; P.S. Dergaon ; Pin. 785614 ; Dist. Golaghat ; Ph.No.9132106478 (TAPAN PACHUNG/SON) / 9613640351(BABUK PACHUNG/SON).', 0, 0, '26.7562', '93.964262', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(13, 'DERG-RIL-9014', 1, 6, 'NA', 'Jiten Saikia ; S/O. Lt. Boluram Saikia ; Vill. Dayangia (Dadhara Ahom Gaon) ; Near Dayangia Namghar Gate ; P.O. Dadhara ; P.S. Dergaon ; Pin. 785614 ; Dist. Golaghat ; Ph.No.9613430942 (Manoj Saikia/Son) / 9859130063(Wife).', 0, 0, '26.682515', '93.952651', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(14, 'DERG-RIL-9016', 1, 6, 'NA', 'Dambarudhar Borah ; S/O. Lt. Sarulara Borah ;  Vill. Bhakatiya ; P.O. Dergaon ; P.S. Dergaon ; Sub. Div. Golaghat ; Dist. Golaghat ; Pin. 785614 ; Ph.No. 8812808939 / 7002323202.', 0, 0, '26.696316', '94.012753', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(15, 'DERG-RIL-9018', 1, 6, 'NA', 'Attorney holder :- Mr. Lakhya jit Dutta Ramesh Dutta ; S/O. ; (Mr. Ramesh Dutta ; S/O. Lt. Harendra Nath Dutta)? ; Pohuchowa (Chumoni Gaon) ; P.O. Moheema ; P.S. Dergaon ; Pin. 785626 ; Dist. Golaghat ; Ph.No.7399199263 (LAKHYAJIT DUTTA/SON)/ 8876904795.', 0, 0, '26.626194', '94.048517', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(16, 'DERG-RIL-9021', 1, 6, 'NA', 'Mrs Joyanti Baruah ; W/O.? Lt. Dhirendra Nath Baruah ; Ward No.10 ; Near Dergaon ASTC ; NH37 ; P.O. Dergaon ; P.S.Dergaon ; Pin. 785614 ; Dist. Golaghat ; Ph.No.7086678130 / 7002289160.', 0, 0, '26.711055', '93.968041', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(17, 'DERG-RIL-9022', 1, 6, 'NA', 'Horeswar Nagbongshi ; S/O. Late Latul Nagbongshi ; Vill. Sital Pathar ; Near Kakodonga Block ; P.O. Dergaon ; P.S. Dergaon ; Dist. Golaghat ; Pin. 785614 ; Ph. No. 9859309397 / 9101582435.', 0, 0, '26.728421', '94.027683', '114764', '2015-04-11', 1, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(18, 'DERG-RIL-9023', 1, 6, 'NA', 'Rupjyoti Boruah ; S/O. Late Probin Boruah ; Vill. Khanikar Gaon ; Near Khanikar Charali ; P.O. Missamora ; P.S. Dergaon ; Dist. Golaghat ; Pin. 785618 ; Ph. No. 9577862669 / 9401848331.', 0, 0, '26.635275', '93.951246', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(19, 'DERG-RIL-9024', 1, 6, 'NA', 'Battalion Training Centre, Dergaon, (BTC Unit Fund) ; Police Training Complex ; P.O. Dergaon ; P.S. Dergaon ; Pin. 785614 ; Dist. Golaghat ; Dist. Golaghat ; Pin. 785614 ; Represented by Commandant Sh. Abu sufian(IPS) / (BTC)-7002506277.', 0, 0, '26.71719', '93.988565', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(20, 'DERG-RIL-9025', 1, 6, 'NA', 'Toseswar Boruah ; ( Son:-Susanta Baruah) ; S/O.  Lt. Pran Nath Boruah ; Ward No. 3 ; Dergaon Town ; P.O. Dergaon ; P.S. Dergaon ; Dist. Golagaht ; Pin. 785614 ; Ph. No. 6000584985 / 9957117672.', 0, 0, '26.721143', '93.96847', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(21, 'DERG-RIL-9027', 1, 6, 'NA', 'Aboni Kumar Thakur ; S/O. Lt. Surendra Nath Thakurr ; Vill. Seuzpur ; Dergaon Ward-9 ; Pandit HemChamda Goswami Road ; Near Bapuji Mandir ; P.O. Dergaon ; P.S. Dergaon ; Dist. Golaghat ; Pin. 785614 ; Ph. No. 9101215171 / 7086501771.', 0, 0, '26.7001117', '93.974008', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(22, 'DERG-RIL-9029', 1, 6, 'NA', 'Biman Pao ; S/O.  Lt. Jayaram Pao ; Vill.  Nabhoga ; P.O. Nabhanga ; P.S. Dergaon ; Dist. Golaghat ; Pin. 785614 ; Ph. No. 9365684447.', 0, 0, '26.726422', '93.918891', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(23, 'DERG-RIL-9030', 1, 6, 'NA', 'Harihar Sahu ; S/O. Lt. Damodar Sahu ;  Vill. Dadhora Ahom Gaon ; Near NH-37 ; P.O. Dadhora ; P.S. Dergaon ; Dist. Golaghat ; Pin. 785614 ; Ph. No. 9365619103 / 8486006637.', 0, 0, '26.684568', '93.932097', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(24, 'GOAT-RIL-0002', 1, 1, 'NOZIBUR RAHMAN', 'Shantipur, Near Islamia Maktab, PO+PS-Golaghat, Dist: Golaghat, Pin. 785621 , Ph.No.9435073826.', 976, 1193, '26.52037', '93.964712', '114772', '2019-05-14', 1, NULL, 'Old Matter', '2019-07-08', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(25, 'GOAT-RIL-0009', 1, 1, 'NA', 'Mrs. Ritu Kaur ; W/O. Jaswant Singh ; Ward No. 6 ; Krishna Nagar ;  P.O. Golaghat ; P.S. Golaghat ; Dist. Golaghat  ; Pin. 785621 ; Ph. No.  9508654906 / 8761907811.', 0, 0, '26.503335', '93.968392', '114731', '2019-05-14', 1, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(26, 'GOAT-RIL-0013', 1, 1, 'NA', 'Deepjyoti Singha ; S/O. Late Pratap Singha ; Behind Golaghat Distric Court ; Gangadhar Barthakur Path ; Ward No. 8 ; P.O. Golaghat ; P.S. Golaghat ; Dist. Golaghat ; Pin. 785621 ; Ph. No. 8974177395 / 9774258551 / 6900997951.', 0, 0, '26.515238', '93.970165', '114813', '2019-05-14', 1, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(27, 'GOAT-RIL-0015', 1, 1, 'NA', 'Mrs Punya Dutta ; W/O. Late Biren Dutta ; House No-297 ; Bipin Phukan Nagar ; P.O. Golaghat ; P.S. Golaghat ; Dist. Golaghat ; Pin. 785621 ; Ph. No. 8761065756 / 9101786853.', 0, 0, '26.525443', '93.966443', '114712', '2019-05-14', 1, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(28, 'GOAT-RIL-0016', 1, 1, 'NA', 'Rajib Gohain ; S/O. Sri Bhabendra Nath Gohain ; Vill. Naba Nagar ; Bengenakhowa ; P.O. Golaghat ; P.S. Golaghat ; Pin. 785621 ; Dist. Golaghat ; Ph. No. 9101313088 / 9854016767.', 1127, 218, '26.497533', '93.973813', '990105', '2019-03-11', 1, 'Valid', '', '2019-05-27', 8, 2019, 'Open Plot', 'GBT', 15, 15, '2039-03-24', 0),
(29, 'GOAT-RIL-9108', 1, 1, 'MR. JITEN KURMI ', 'S/O. Late Meghu Kurmi ; Vill. Jerpai Gaon ; Opp. Airtel Tower ; P.O. Giladhari ; P.S. Giladhari ; Dist. Golaghat ; Pin. 785603 ; Ph.No. 7399732410.', 370, 74, '26.423812', '94.056379', '903378', '2018-06-27', 2, NULL, '', '2018-06-29', 8, 2019, 'Open Plot', 'GBT', 20, 20, '2038-02-05', 0),
(30, 'GOAT-RIL-9115', 1, 1, 'NA', 'Bhuban Saikia ; S/O. Late Ratneshwar Saikia ; Vill. Chakardhara Dagaon ; P.O. Borpatharua ; P.S. Golaghat ; Golaghat Jamuguri road ; Dist. Golaghat ; Pin. 785621 ; Ph.No. 7002323450.', 0, 0, '26.471887', '93.976566', '0', '1970-01-01', 2, NULL, '', '2018-11-26', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(31, 'GOAT-RIL-9116', 1, 1, 'NA', 'Buduram Saikia ; S/O. Punaram Saikia ; Vill. 2 No. Tirual ; P.O._Furkating ; P.S. Golaghat ; Pin. 785610 ; Ph. No. 9954981838 / 9401864330.', 0, 0, '26.472797', '94.012877', '114616', '2019-05-14', 1, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(32, 'GOAT-RIL-9117', 1, 1, 'NA', 'Pushpendra Gogoi, @ Bhimkanta Gogoi  ; S/O. Lt. Thireswar Gogoi ; Vill. Bogorijang ; P.O. Polibor ; P.S. Golaghat ; Pin. 785621 ; Dist. Golaghat ; Ph. No. 9101343628. ', 0, 0, '26.5579', '93.970042', '114724', '2019-05-14', 1, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(33, 'GOAT-RIL-9119', 1, 1, 'SONTIRAM BORAH', 'S/O. Lt. Deheswar Borah ; Vill. Habial Gaon ; P.O. Ganakpukhuri ; P.S. Dhekial ; Dist. Golaghat ; Pin. 785622 ; Ph. No. 9101816124 / 9531253730.', 3, 528, '26.624532', '93.965176', '157698', '2018-12-21', 2, NULL, 'Dag No. and Patta. No miss match', '2019-01-02', 8, 2019, 'Open Plot', 'GBT', 15, 15, '2038-12-02', 0),
(34, 'GOAT-RIL-9121', 1, 1, 'DIP DUARAH ', 'S/O. Lt. Ananda Duara ; Vill. Kotiatoli ; P.O. Athabari ; P.S. Kamarbandha ; Dist. Golaghat  ; Pin. 785625 ; Ph. No. 9678921029 / 6000896561.', 69, 262, '26.571053', '94.032572', '990050', '2019-03-11', 1, NULL, '', '2019-03-26', 8, 2019, 'Open Plot', 'GBT', 15, 15, '2038-02-14', 0),
(35, 'GOAT-RIL-9122', 1, 1, 'NA', 'Nomal Chandra Gogoi , ( Son:-Biren Gogoi ) ; S/O. Late Gatiram Gogoi ; Vill. Barphukankhat ; P.O. Bamborahi ; P.S. Golaghat ; Pin. 785702 ; Ph. No. 7002215735 / 9435119739.', 0, 0, '26.49422', '94.008067', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 4, 0, '', '', 0, 0, '0000-00-00', 0),
(36, 'GOAT-RIL-9123', 1, 1, 'NA', 'Ujjal Barbora ; S/O. Bishwa Barbora ; Vill. Nugura ; P.O. Nugura ; P.S. Golaghat ; Dist. Golaghat ; Pin. 785621 ; Ph. No. 7837876280 / 8822438868.', 0, 0, '26.404774', '93.963091', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 4, 0, '', '', 0, 0, '0000-00-00', 0),
(37, 'GOAT-RIL-9126', 1, 1, 'NA', 'Debeswar Tamuly ; S/O. Lt. Jeuram Tamuly ; Vill. Bosakumar ; P.O. Na pamua ; P.S. Kamarbandha ; Pin. 785625 ; Dist. Golaghat ; Ph. No. 9531254440.', 0, 0, '26.496742', '94.088789', '0', '1970-01-01', 2, NULL, '', '2018-12-12', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(38, 'GOAT-RIL-9127', 1, 1, 'GOUTAM SAIKIA', 'S/O. Sri Hiren Saikia ; Vill. Bokotialgaon ; P.O. Salikihat ; P.S. Kamarbandha ; Dist. Golaghat ; Pin. 785621 ; Ph. No. 9678660571 / 7896729082.', 1, 256, '26.502479', '94.0484', '988810', '2019-02-20', 2, NULL, '', '2019-02-27', 8, 2019, 'Open Plot', 'GBT', 15, 15, '2039-01-23', 0),
(39, 'GOAT-RIL-9128', 1, 1, 'JABULAL GANJU', 'S/O. Suchinath Ganju ; Vill. Julapathar ; P.O. Baruahgaon ; P.S. Giladhari ; Dist. Golaghat ; Pin. 785610 ; Ph. No. 9365031831.', 715, 397, '26.426381', '94.020746', '988800', '2019-02-20', 2, NULL, '', '2019-02-27', 8, 2019, 'Open Plot', 'GBT', 15, 15, '2039-01-20', 0),
(40, 'KUMT-RIL-9004', 1, 3, 'NA', 'Ilman Tanti ; S/O. Late Keshob Tanti ; Hautaly Bazar ; Vill.24 No. Hautaly. ; P.O.Hautaly? ; P.S. Kamargaon ; Pin. 785621 ; Dist. Golaghat ; Ph.No.9859288981 / 7002487668', 0, 0, '26.572767', '93.893221', '0', '1970-01-01', 2, NULL, '', '2017-10-13', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(41, 'KUMT-RIL-9011', 1, 3, 'NA', 'Traylukya Nath ; S/O. Lt. Nandeshwar Nath ; Vill. Hautley Nath Gaon ; P.O.? Moukhowa ; P.S. Khumtai ; Dist. Golaghat ; Pin. 785621 ; Ph. No. 9531270469 / 9365194005.', 0, 0, '26.593892', '93.890023', '0', '1970-01-01', 2, NULL, '', '2018-12-19', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(42, 'KUMT-RIL-9014', 1, 3, 'DHIREN GOGOI ', 'S/O. Lt. Debaram Gogoi ; Vill. Baruah Gaon ; P.O. Kachopathar ; P.S. Kamargaon ; Dist. Golaghat ; Pin. 785617 ; Ph. No. 9435727730 / 9101705230 / 9854821995.', 741, 206, '26.63538', '93.800679', '470640', '2019-01-17', 2, 'Send to Revalidate', '', '2019-02-15', 8, 0, 'Open Plot', 'GBT', 15, 15, '2039-01-11', 0),
(43, 'KUMT-RIL-9015', 1, 3, 'JOGEN BORA ', 'S/O. Lt. Gunindra Bora ; Vill. Bongaon ; Near Bongaon Tiniali ; P.O. Bongaon ; P.S. Dergaon ; Dist. Golaghat ; Pin. 785611 ; Ph. No. 9957931286 / 8812985582.', 858, 240, '26.662768', '93.834757', '470636', '2019-01-17', 2, 'Send to re validation', '', '2019-02-16', 8, 0, 'Open Plot', 'GBT', 15, 15, '2039-01-10', 0),
(44, 'KZRG-RIL-9001', 1, 2, 'NA', 'Ritumoni Borah, (D/O. Mrs Sabitri Borah) ; W/O. Late Jatin Borah ; Vill. Halowa NC Gaon ; Bogorijuri ; No. 1 Kohora ; P.O. Kaziranga National Park ; P.S. Bokakhat ; Pin. 785609 ; Ph. No.  9864710993 / 9435154076.', 0, 0, '26.585474', '93.410883', '989561', '2019-03-01', 1, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(45, 'MRNI-RIL-0002', 1, 2, 'NA', 'Numaligarh Refinery Ltd. ; Authorized Representative Shri Samir Kundu ; NRL TOWNSHIP ; P.O. KANAIGHAT ; P.S. NUMALIGARH ; PIN. 785699 ; DIST. Golaghat ; PH.No. 9435152119 (Mani Pranjal Saikia).', 0, 0, '26.596446', '93.756002', '678698', '1970-01-01', 2, NULL, '', '1970-01-01', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(46, 'MRNI-RIL-9012', 1, 5, 'HIREN BORA', 'S/O. Late Mohendra Bora ; Vill. Kathkatia ; P.O. Morangi ; P.S. Golaghat ; Pin. 785621 ; Dist. Golaghat ; Ph. No.  9401346686 / 9678835471.', 173, 71, '26.490568', '93.923305', '470629', '2019-01-17', 2, 'Send to re-validate', '', '2017-02-16', 8, 0, 'Open Plot', 'GBT', 15, 15, '2039-01-06', 0),
(47, 'MRNI-RIL-9013', 1, 5, 'NA', 'Mr. Faijur Rahman,S/O- Late Chan Mahammad,  Vill- No. 3 Fallangani, Kuwani Sensuwa Path, PO- Fallangani, PS- Bogijan (out post) - Dist-Golaghat- 785702, State-Assam', 0, 0, '26.485521', '93.870053', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(48, 'MRNI-RIL-9014', 1, 5, 'NA', 'Ghanakanta Saikia ; S/O. Lt. Nali Saikia ; Vill. Ponka ; P.O. Kanaighat ; P.S. Golaghat ; Pin. 785621 ; Dist. Golaghat ; Ph. No.7002262497. ', 0, 0, '26.584565', '93.768388', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(49, 'MRNI-RIL-9015', 1, 5, 'NA', 'THE DOLAGURI TEA COMPANY PRIVATE ; ( Reg. Office:-TS Corporate office at H.N.-54, Rukminigaon, Dist-Kamrup (M), Guwahati, Pin-781022) ; Authorized signatory Mr. Sanjay Joshi (Manager) ; S/O. Late R.B. Joshi ; Vill. Dolaguri Bagan gaon ; P.O. Dholaguri ; P.S. Bishnupur ; Dist. Golaghat ; Pin. 785613 ; Ph. No. 7002205596 ; Mail id:- dolaguriteaestate@gmail.com.', 0, 0, '26.528655', '93.850037', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(50, 'SPTR-RIL-9024', 1, 4, 'NA', 'Bijit Boro ; C/O. Sri Kulai Boro ; Vill. Bongaon ; Naojan Forest ; P.O. Naojan ; P.S. Sarupathar ; Pin.785604 ; Dist. Golaghat ; Ph.No. 9577755278', 0, 0, '26.134325', '93.880333', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(51, 'SPTR-RIL-9033', 1, 4, 'NA', 'Mahendra Ghimire ; S/O. Shiv Lal Ghimire ; Vill. Sangpool ; Near Sangpool Tea Factory ; P.O. Bapathar ; P.S. Borpathar ; Pin. 785602 ; Dist. Golaghat ; Ph. No. 9707715980.', 0, 0, '26.324299', '93.928356', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(52, 'SPTR-RIL-9042', 1, 4, 'NA', 'Biswajit Sen ; S/O. Lt. Jyotirmoy Sen ( Wife:- Smt. Mompi Sen ) ; Vill. Senmati ; P.O. Borpathar ; P.S. Borpathar ; Pin. 785602 ; Dist. Golaghat ; Ph. No. 7002100568.', 0, 0, '26.282036', '93.884451', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(53, 'SPTR-RIL-9043', 1, 4, 'NA', 'Mr. Manash Dutta, S/O- Ananda Dutta, Vill: Borpathar, Ward no.2, P.O: & P.S:Borpathar, Dist. Golaghat, Pin: 785602 State-Assam', 0, 0, '26.277664', '93.904331', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(54, 'SPTR-RIL-9044', 1, 4, 'NA', 'Sital Baruah ; S/O. Lt. Keshav Baruah ; Vill. Hajari gaon ; P.O. Borpathar ; P.S. Borpathar ; Dist. Golaghat ; Pin. 785602 ; Ph.No. 7002649678.', 0, 0, '26.261726', '93.914833', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(55, 'SPTR-RIL-9045', 1, 4, 'NA', 'Dulu Bordoloi ; S/O. Sri Prasanu Bordoloi ; Upper Langtha ; P.O.Upper Langtha ; P.S. Borpathar ; Pin. 785602 ; Dist. Golaghat ; Ph. No. 8638197041.', 0, 0, '26.246574', '93.956272', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 7, 0, '', '', 0, 0, '0000-00-00', 0),
(56, 'SPTR-RIL-9046', 1, 4, 'NA', 'Debojit Sarmah ; S/O. Lt. Upen Sarmah ; Borsapori ; P.O. Mirigaon ; P.S. Borpathar ;  Pin. 785602 ; Dist. Golaghat ; Ph.No.9365689818.', 0, 0, '26.279008', '93.944582', '0', '0000-00-00', 2, NULL, '', '0000-00-00', 2, 0, '', '', 0, 0, '0000-00-00', 0),
(57, 'UASH02', 2, 5, 'DHURBAJYOTI DUTTA', 'S/o Krashna Kanta Dutta, P-O- Latekujan, P.S- Numaligarh', 33, 3, '26.55073', '93.81733', 'N344180699576352', '2019-12-07', 1, 'By NEFT', '', '2018-11-20', 8, 0, 'Open Plot', 'GBT', 15, 13, '2038-08-28', 0),
(58, 'UASQ30', 2, 5, 'NARNDRA NATH DUTTA', 'Vill- Hatimar Putta, PO Letekujan. P.S Numaligarh, Dist.- Golaghat-785613', 33, 18, '26.54897', '93.80383', 'NO2147483647', '2019-01-24', 1, 'Payment of Rs 10000 by other mode', '', '2019-02-28', 8, 0, 'Open Plot', 'GBT', 15, 13, '2038-12-17', 0),
(59, 'GOAT-RIL-9104', 1, 1, 'MERAPANI SECTOR COMMANDANT', 'Ratanpur CRPF camp, Vill- Ratanpur, Sisupani, PO- Ratanpur, PS-Merapani, Pin-785705, Landmark-Ratanpur health centre, Golaghat ; Ph.No. 9435478935, 7086771160', 0, 0, '26.249529', '94.043344', '678695', '2018-07-06', 2, 'DD Send for Revalidation', '', '2018-07-16', 8, NULL, 'Open Plot', 'GBT', 20, 20, '2038-07-11', 0),
(60, 'GOAT-RIL-9105', 1, 1, 'MERAPANI SECTOR COMMANDANT', 'Seed Firm CRPF camp, Vill- near Vellowguri (Jaipur), P.O- Merapani, PS- Merapani, Pin-785705, Golaghat. Ph.No. 9435478935 / 7086771160.', 0, 0, '26.28608', '94.072791', '678694', '2018-07-06', 2, 'DD Send for revalidation', '', '2018-07-16', 8, NULL, 'Open Plot', 'GBT', 20, 20, '2038-07-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `file_no` varchar(50) NOT NULL,
  `file_date` date NOT NULL,
  `old_file` varchar(40) NOT NULL,
  `old_date` date NOT NULL,
  `rem_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `file_no`, `file_date`, `old_file`, `old_date`, `rem_no`) VALUES
(1, 'GMJ/03/2017/333', '2019-07-16', 'GMJ.03/2017/102', '2018-04-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `site_id` varchar(30) NOT NULL,
  `status` varchar(500) DEFAULT NULL,
  `file` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_id`, `status`, `file`) VALUES
(1, 'GOAT-RIL-9121', '', 2),
(2, 'GOAT-RIL-9122', '', 2),
(3, 'GOAT-RIL-9123', '', 2),
(4, 'GOAT-RIL-9127', '', 2),
(5, 'GOAT-RIL-9128', '', 2),
(6, 'BOAT-RIL-9018', '', 2),
(7, 'BOAT-RIL-9019', '', 2),
(8, 'KZRG-RIL-9001', '', 2),
(9, 'MRNI-RIL-9012 ', '', 2),
(10, 'MRNI-RIL-9013,', '', 2),
(11, 'UASQ30', '', 2),
(12, 'UASH02', '', 2),
(13, 'KUMT-RIL-9014  ', '', 2),
(14, 'KUMT-RIL-9015', '', 2),
(15, 'DERG-RIL-9025', '', 2),
(16, ' DERG-RIL-9027 ', '', 2),
(17, 'NAKG-9001', '', 2),
(18, 'UAS770', '', 2),
(19, 'UASQ02', '', 2),
(20, 'UAN195', '', 2),
(21, 'UAS999', '', 2),
(22, 'AMGGN1', '', 2),
(23, 'BOAT-RIL-9009', '', 2),
(24, 'GOAT-9105', '', 2),
(25, 'GOAT-RIL-9108', '', 2),
(26, 'GOAT-RIL-9104', '', 2),
(27, 'GOAT-RIL-9101', '', 2),
(28, 'MRNI-RIL-0002', '', 2),
(29, 'DERG-RIL-9016', '', 2),
(30, 'KUMT-RIL-9013', 'Get NOC', 2),
(31, 'GOAT-RIL-0016', '', 2),
(32, 'DERG-RIL-9023', '', 2),
(33, 'DERG-RIL-9029', '', 2),
(34, 'KUMT-RIL-9012', 'Get NOC', 2),
(35, 'DERG-RIL-9022', '', 2),
(36, 'SPTR-RIL-9043', '', 2),
(37, 'GOAT-RIL-9117', '', 2),
(38, 'GOAT-RIL-0009', '', 2),
(39, 'GOAT-RIL-9116', '', 2),
(40, 'BRPH-RIL-9001', '', 2),
(41, 'DRGN12', '', 2),
(42, 'GOAT-RIL-0013', '', 2),
(43, 'GOAT-RIL-0015', '', 2),
(44, 'BOAT-RIL-9015', '', 1),
(45, 'BOAT-RIL-9008', '', 1),
(46, 'GOAT-RIL-0007', '', 1),
(47, 'GOAT-RIL-9111', '', 1),
(48, 'GOAT-RIL-9107', '', 1),
(49, 'DERG-RIL-9014', '', 1),
(50, 'MZBT-RIL9013', '', 1),
(51, 'DERG-RIL-9009', '', 1),
(52, 'DERG-RIL-9018', '', 1),
(53, 'SPTR-RIL-9045', '', 3),
(54, 'UASH02', '', 3),
(55, 'MRNI-RIL-9015', '', 3),
(56, 'SPTR-RIL-9042', '', 3),
(57, 'GOAT-RIL-9115', '', 3),
(58, 'MRNI-RIL-0002', '', 3),
(59, 'GOAT-RIL-9108', '', 3),
(60, 'GOAT-RIL-9104', '', 3),
(61, 'GOAT-RIL-9101', '', 3),
(62, 'DERG-RIL-9016', '', 3),
(63, 'GOAT-9105', '', 3),
(64, 'AMGGN1', '', 3),
(65, 'GOAT-RIL-0007', '', 3),
(66, 'GOAT-RIL-9107', '', 3),
(67, 'GOAT-RIL-9111', '', 3),
(68, 'SPTR-RIL-9029', '', 3),
(69, 'GOAT-RIL-9109', '', 3),
(70, 'MHKI-RIL-9002', '', 3),
(71, 'DERG-RIL-9017', '', 3),
(72, 'GOAT-RIL-9110', '', 3),
(73, 'BOAT-RIL-9009', '', 3),
(74, 'GOAT-RIL-9106', '', 3),
(75, 'BOAT-RIL-9013', '', 3),
(76, 'KUMT-RIL-9009', '', 3),
(77, 'KUMT-RIL-9008', '', 3),
(78, 'BOAT-RIL-9012', '', 3),
(79, 'KUMT-RIL-9005', '', 3),
(80, 'GOAT-RIL-9105', '', 3),
(81, 'GOAT-RIL-9104', '', 3),
(82, 'GOAT-RIL-9101', '', 3),
(83, 'SPTR-RIL-9025', '', 3),
(84, 'DERG-RIL-9019', 'Get NOC', 4),
(85, 'STPR-RIL-9092', 'Get NOC', 4),
(86, 'STPR-RIL-9025', 'Get NOC', 4),
(87, 'GOAT-RIL-9119', 'Get NOC', 4),
(88, 'GOAT-RIL-9125', 'Send To Co', 5),
(89, 'GOAT-RIL-9112', 'Send To Co', 5),
(90, 'GOAT-RIL-9124', 'Send To Co', 5),
(91, 'GOAT-RIL-0014', 'Send To Co', 5),
(92, 'MRNI-RIL-9014', 'Send To Co', 5),
(93, 'KUMT-RIL-9016', 'Send To Co', 5),
(94, 'DERG-RIL-9024', 'Send To Co', 5),
(95, 'DERG-RIL-9030', 'Send To Co', 5),
(96, 'SPTR-RIL-9046', 'Send To Co', 5),
(97, 'BOAT-RIL-9022', 'Send To Co', 5),
(98, 'BOAT-RIL-9016', 'Send To Co', 5);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `curr_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `curr_status`) VALUES
(1, 'In DC office'),
(2, 'Sent to Circle Office'),
(3, 'Report received from Circle Office.'),
(4, 'Report received from C.O but issue in the application.'),
(5, 'Send to wrong C.O. Proceed for correction'),
(6, 'Application is in C.O but issue in the application.'),
(7, 'Is in DC Office but documents missing / miss match'),
(8, 'NOC Provided'),
(9, 'Revert Back'),
(10, 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `app_status` int(11) NOT NULL,
  `fileno` varchar(40) DEFAULT NULL,
  `file_date` date DEFAULT NULL,
  `remarks` varchar(999) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`id`, `app_id`, `app_status`, `fileno`, `file_date`, `remarks`, `is_delete`, `updated_on`) VALUES
(1, 1, 1, NULL, NULL, 'Old Application missing. Re-send duplicate copy. DD deposit not clear', 0, '2019-07-09 13:31:33'),
(2, 2, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(3, 3, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(4, 4, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(5, 5, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(6, 6, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(7, 7, 1, 'NA', '0000-00-00', 'MISSING', 0, '2019-07-09 13:31:33'),
(8, 8, 1, 'NA', '0000-00-00', 'MISSING', 0, '2019-07-09 13:31:33'),
(9, 9, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(10, 10, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(11, 11, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(12, 12, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(13, 13, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(14, 14, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(15, 15, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(16, 16, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(17, 17, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(18, 18, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(19, 19, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(20, 20, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(21, 21, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(22, 22, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(23, 23, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(24, 24, 1, 'NA', '0000-00-00', 'Old Matter', 0, '2019-07-09 13:31:33'),
(25, 25, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(26, 26, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(27, 27, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(28, 28, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(29, 29, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(30, 30, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(31, 31, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(32, 32, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(33, 33, 1, 'NA', '0000-00-00', 'Dag No. and Patta. No miss match', 0, '2019-07-09 13:31:33'),
(34, 34, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(35, 35, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(36, 36, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(37, 37, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(38, 38, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(39, 39, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(40, 40, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(41, 41, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(42, 42, 1, 'KRC.02/2014/206', '1970-01-01', '', 0, '2019-07-09 13:31:33'),
(43, 43, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(44, 44, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(45, 45, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(46, 46, 1, 'NA', '0000-00-00', '', 0, '2019-07-09 13:31:33'),
(47, 47, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(48, 48, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(49, 49, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(50, 50, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(51, 51, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(52, 52, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(53, 53, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(54, 54, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(55, 55, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(56, 56, 1, 'NA', '0000-00-00', 'NA', 0, '2019-07-09 13:31:33'),
(57, 2, 2, 'GMJ.03/2017/104', '2018-04-04', 'OLD APPLICATION NOT GET REPLY FROM CO', 0, '2019-07-09 13:31:33'),
(58, 3, 2, 'GMJ.03/2017/104', '2018-04-04', 'OLD APPLICATION NOT GETTING FROM CO', 0, '2019-07-09 13:31:33'),
(59, 4, 8, 'GMJ/3/2017/162', '2019-06-11', '', 0, '2019-07-09 13:31:33'),
(60, 5, 2, 'GMJ. 03/2017/147', '2019-05-28', 'DD Status is Invalid', 0, '2019-07-09 13:52:29'),
(61, 6, 2, 'GMJ. 03/2017/147', '2019-05-28', 'DD status in Invalid and resend to the Company', 0, '2019-07-09 13:54:09'),
(62, 9, 8, 'GMJ.3/2017/161', '2019-06-11', '', 0, '2019-07-09 13:56:23'),
(63, 44, 2, 'GMJ. 03/2017/147', '2019-05-28', '', 0, '2019-07-09 13:57:06'),
(64, 7, 7, '', '1970-01-01', '', 0, '2019-07-09 14:02:22'),
(65, 8, 7, '', '1970-01-01', '', 0, '2019-07-09 14:02:29'),
(66, 25, 2, 'GMJ. 03/2017/158', '2019-06-10', '', 0, '2019-07-09 14:05:06'),
(67, 26, 2, 'GMJ. 01/2019/pt-1/1', '2019-07-05', '', 0, '2019-07-09 14:26:47'),
(68, 27, 2, 'GMJ. 01/2019/pt-1/1', '2019-07-05', '', 0, '2019-07-09 14:27:21'),
(69, 28, 2, 'GMJ. 01/2019/pt-1/1', '2019-07-05', '', 0, '2019-07-09 14:27:59'),
(70, 29, 2, 'GMJ. 03/2017/154', '2019-06-04', '', 0, '2019-07-09 14:29:23'),
(71, 29, 3, 'GC/371', '2019-06-17', '', 0, '2019-07-09 14:29:51'),
(72, 30, 7, '', '1970-01-01', '', 0, '2019-07-09 14:33:56'),
(73, 31, 2, 'GMJ. 01/2019/pt-1/1', '2019-07-05', '', 0, '2019-07-09 14:35:25'),
(74, 32, 2, 'GMJ. 03/2017/158', '2019-06-10', '', 0, '2019-07-09 14:35:58'),
(75, 33, 2, 'GMJ/3/2017/426', '2019-02-08', '', 0, '2019-07-09 15:01:57'),
(76, 33, 3, 'GC/350', '2019-06-10', '', 0, '2019-07-09 15:06:47'),
(77, 34, 2, 'GMJ. 03/2017/146', '2019-05-28', '', 0, '2019-07-09 15:07:28'),
(78, 34, 3, 'GC/350', '2019-06-10', '', 0, '2019-07-09 15:08:00'),
(79, 35, 2, 'GMJ. 03/2017/146', '2019-05-28', '', 0, '2019-07-09 15:09:32'),
(80, 35, 4, 'GC/350', '1970-01-01', 'Land Issue. Dag No. Patta No Not matching. Petition filed in DC office', 0, '2019-07-09 15:10:52'),
(81, 36, 2, 'GMJ. 03/2017/146', '2019-05-28', '', 0, '2019-07-09 15:11:42'),
(82, 36, 3, 'GC/350', '2019-06-10', '', 0, '2019-07-09 15:12:10'),
(83, 37, 7, '', '1970-01-01', '', 0, '2019-07-09 15:35:29'),
(84, 38, 2, 'GMJ. 03/2017/146', '2019-05-28', '', 0, '2019-07-09 15:48:33'),
(85, 38, 3, 'GC/350', '2019-06-10', '', 0, '2019-07-09 15:49:08'),
(86, 39, 2, 'GMJ. 03/2017/146', '2019-05-28', '', 0, '2019-07-09 15:50:07'),
(87, 39, 3, 'GC/350', '2019-06-10', '', 0, '2019-07-09 15:50:28'),
(88, 28, 3, 'GC/371', '2019-06-17', '', 0, '2019-07-09 15:54:45'),
(89, 40, 7, '', '1970-01-01', '', 0, '2019-07-09 15:56:13'),
(90, 41, 7, '', '1970-01-01', '', 0, '2019-07-09 15:57:09'),
(91, 42, 2, 'GMJ. 03/2017/149', '2019-05-28', '', 0, '2019-07-09 15:57:55'),
(92, 42, 3, 'KRC.02/2014/206', '1970-01-01', '', 0, '2019-07-09 15:58:12'),
(93, 43, 2, 'GMJ. 03/2017/149', '2019-05-28', '', 0, '2019-07-09 15:58:33'),
(94, 43, 3, 'KRC.02/2014/214', '2019-06-13', '', 0, '2019-07-09 15:58:52'),
(95, 10, 2, 'GMJ. 01/2019/pt-1/3', '2019-07-05', '', 0, '2019-07-09 16:07:42'),
(96, 53, 2, 'GMJ. 03/2017/160', '2019-06-10', '', 0, '2019-07-09 16:08:16'),
(97, 50, 7, '', '1970-01-01', '', 0, '2019-07-09 16:08:46'),
(98, 51, 7, '', '1970-01-01', '', 0, '2019-07-09 16:09:02'),
(99, 52, 7, '', '1970-01-01', '', 0, '2019-07-09 16:09:14'),
(100, 54, 7, '', '1970-01-01', '', 0, '2019-07-09 16:09:29'),
(101, 55, 7, '', '1970-01-01', '', 0, '2019-07-09 16:09:36'),
(102, 56, 2, 'GMJ/3/2017/430', '2019-02-08', '', 0, '2019-07-09 17:20:14'),
(103, 49, 7, '', '1970-01-01', '', 0, '2019-07-09 17:21:43'),
(104, 45, 2, 'GMJ. 01/2019/pt-1/4', '2019-07-05', '', 0, '2019-07-09 17:23:49'),
(105, 46, 2, 'GMJ. 03/2017/148', '2019-05-28', '', 0, '2019-07-09 17:24:39'),
(106, 47, 2, 'GMJ. 03/2017/148', '2019-05-28', '', 0, '2019-07-09 17:25:00'),
(107, 48, 2, 'GMJ/3/2017/428', '2019-02-08', '', 0, '2019-07-09 17:26:02'),
(108, 11, 7, '', '1970-01-01', '', 0, '2019-07-09 17:27:34'),
(109, 16, 7, '', '1970-01-01', '', 0, '2019-07-09 17:27:47'),
(110, 12, 2, 'GMJ.03/2017/102', '2018-04-03', '', 0, '2019-07-09 17:29:42'),
(111, 13, 2, 'GMJ.03/2017/102', '2018-04-03', 'FILE SERIAL NO NOT MENTIONED IN THE DRAFT', 0, '2019-07-09 17:30:33'),
(112, 15, 2, 'GMJ.03/2017/102', '2018-04-03', 'SERIAL NO NOT MENTION IN THE FILE', 0, '2019-07-09 17:31:28'),
(113, 14, 2, 'GMJ. 03/2017/155', '2019-06-04', '', 0, '2019-07-09 17:32:13'),
(114, 17, 2, 'GMJ. 03/2017/159', '2019-06-10', '', 0, '2019-07-09 17:32:49'),
(115, 18, 2, 'GMJ. 03/2017/155', '2019-06-04', '', 0, '2019-07-09 17:33:27'),
(116, 20, 2, 'GMJ. 03/2017/150', '2019-05-28', '', 0, '2019-07-09 17:33:50'),
(117, 19, 2, 'GMJ/3/2017/431', '2019-02-08', '', 0, '2019-07-09 17:34:40'),
(118, 23, 2, 'GMJ/3/2017/431', '2019-02-08', '', 0, '2019-07-09 17:35:19'),
(119, 21, 2, 'GMJ. 03/2017/155', '2019-06-04', '', 0, '2019-07-09 17:36:41'),
(120, 22, 2, 'GMJ. 03/2017/155', '2019-06-04', '', 0, '2019-07-09 17:37:14'),
(121, 46, 3, 'MRC/7/2018/231', '2019-07-08', '', 0, '2019-07-11 13:24:54'),
(122, 57, 1, NULL, NULL, '', 0, '2019-07-11 15:42:28'),
(123, 57, 2, 'GMJ/03/2017/148', '2019-05-28', '', 0, '2019-07-11 15:43:07'),
(124, 57, 3, 'MRC/7/232', '2019-07-08', '', 0, '2019-07-11 15:43:50'),
(125, 58, 1, NULL, NULL, '', 0, '2019-07-11 15:52:35'),
(126, 58, 2, 'GMJ/03/2017/148', '2019-05-28', '', 0, '2019-07-11 15:53:08'),
(127, 58, 3, 'MRC/7/2018/233', '2019-07-08', '', 0, '2019-07-11 15:54:04'),
(128, 24, 2, 'GMJ.01/2019/pt-1/5', '2019-07-15', '', 0, '2019-07-15 11:23:32'),
(129, 1, 2, 'GMJ.01/2019/pt-1/5', '2019-07-15', '', 0, '2019-07-15 11:23:49'),
(130, 33, 8, 'GMJ.01/2019/pt-1/6', '2019-07-16', '', 0, '2019-07-15 13:37:00'),
(131, 39, 8, 'GMJ.01/2019/pt-1/7', '2019-07-16', '', 0, '2019-07-15 13:38:36'),
(132, 38, 8, 'GMJ.01/2019/pt-1/8', '2019-07-16', '', 0, '2019-07-15 13:40:00'),
(133, 34, 8, 'GMJ.01/2019/pt-1/9', '2019-07-16', '', 0, '2019-07-15 13:41:13'),
(134, 29, 8, 'GMJ.01/2019/pt-1/10', '2019-07-16', '', 0, '2019-07-15 13:46:19'),
(135, 28, 8, 'GMJ.01/2019/pt-1/11', '2019-07-15', '', 0, '2019-07-15 13:47:35'),
(136, 36, 4, 'GC/350', '1970-01-01', 'Dag No. not matching with LM report', 0, '2019-07-15 13:49:08'),
(137, 42, 8, 'GMJ.01/2019/pt-1/12', '2019-07-16', '', 0, '2019-07-15 15:49:23'),
(138, 43, 8, 'GMJ.01/2019/pt-1/13', '2019-07-16', '', 0, '2019-07-15 15:49:35'),
(139, 46, 8, 'GMJ.01/2019/pt-1/14', '2019-07-16', '', 0, '2019-07-15 16:08:25'),
(140, 58, 8, 'GMJ.01/2019/pt-1/16', '2019-07-16', '', 0, '2019-07-15 16:08:45'),
(141, 57, 8, 'GMJ.01/2019/pt-1/15', '2019-07-16', '', 0, '2019-07-15 16:21:47'),
(142, 59, 1, NULL, NULL, '', 0, '2019-07-16 10:11:22'),
(143, 60, 1, NULL, NULL, '', 0, '2019-07-16 10:13:33'),
(144, 59, 2, 'GMJ/03/2017/154', '2019-06-04', '', 0, '2019-07-16 10:17:55'),
(145, 60, 2, 'GMJ/03/2017/154', '2019-06-04', '', 0, '2019-07-16 10:18:10'),
(146, 59, 3, 'GC/371', '2019-06-15', '', 0, '2019-07-16 10:18:40'),
(147, 60, 3, 'GC/371', '2019-06-15', '', 0, '2019-07-16 10:19:02'),
(148, 59, 8, 'GMJ.01/2019/pt-1/17', '2019-07-16', '', 0, '2019-07-16 10:19:37'),
(149, 60, 8, 'GMJ.01/2019/pt-1/18', '2019-07-16', '', 0, '2019-07-16 10:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '2',
  `is_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `password`, `type`, `is_delete`) VALUES
(1, 'Rituraj', 'admin', '123admin', 1, 0),
(2, 'Ayushman', 'ayushman', '123pass', 2, 0),
(3, 'Jack', 'jack', '123jack', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `circle_office`
--
ALTER TABLE `circle_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_master`
--
ALTER TABLE `company_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_application`
--
ALTER TABLE `master_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
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
-- AUTO_INCREMENT for table `circle_office`
--
ALTER TABLE `circle_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_application`
--
ALTER TABLE `master_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
