-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2013 at 04:06 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `camdosim`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`ID`, `title`, `desc`) VALUES
(1, 'Giới thiệu', '<p style="text-align:left"><span style="color:#ff0000"><strong><img alt="" class="box" src="http://localhost/camdosim/upload/images/Hydrangeas.jpg" style="float:left; height:230px; margin-bottom:0px; margin-top:0px; width:307px" title="box" />Lorem ipsum dolor sit amet</strong></span>, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh. Nullam tellus pede, eleifend posuere, dignissim id, <span style="background-color:#ffff00">euismod vitae, tortor. Pellentesque&nbsp;<img alt="blush" src="http://localhost/camdosim/sub/public/style/ckeditor/plugins/smiley/images/embarrassed_smile.gif" style="height:20px; width:20px" title="blush" /></span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`ID`, `title`, `desc`, `alias`, `date_created`, `created_by_id`, `date_updated`, `updated_by_id`) VALUES
(1, 'Vietcombank', 'Ngân hàng ngoại thương', 'VCB', '2013-05-16 00:00:00', 1, NULL, NULL),
(2, 'Techcombank', '', 'Techcombank', '2013-05-13 20:34:47', 1, NULL, NULL),
(3, 'Vietinbank', 'Ngân hàng Công thương', 'vietinbank', '2013-05-12 09:18:46', 1, '2013-05-29 14:25:32', 1),
(4, 'Agribank', 'Ngân hàng nông nghiệp và phát triển nông thôn', 'Agribank', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `contact_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `bank_account` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_branch` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `banner` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `yahoo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `facebook` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `keywords` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `page_number` int(11) DEFAULT NULL,
  `file_upload` text CHARACTER SET utf8,
  `max_size_upload` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Cấu hình chung website' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`ID`, `site_title`, `desc`, `contact_name`, `contact_email`, `contact_phone`, `contact_address`, `lng`, `lat`, `bank_account`, `bank_id`, `bank_branch`, `logo`, `banner`, `yahoo`, `facebook`, `keywords`, `page_number`, `file_upload`, `max_size_upload`) VALUES
(1, 'Camdosim.vn - Cầm đồ trực tuyến', '', 'Nguyễn Đình Huy,Nguyễn Huy Văn', 'thienbinh_1102@yahoo.com,huyvan73@yahoo.com', '0979239999,0989887386', '81 Nghĩa Dũng, Phúc Xá, Hà Nội', 105.848229, 21.047346, 'A00231A03213', 4, 'Hà Nội', 'Lighthouse_1368778699.jpg', 'banner.jpg', 'thienbinh_1102,huyvan73', 'http://www.facebook.com/chetruyen?fref=ts', '', 3, NULL, 26);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `is_potential` tinyint(4) DEFAULT '0' COMMENT 'Tiềm năng',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Khách hàng' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `code`, `name`, `email`, `phone`, `address`, `date_created`, `created_by_id`, `date_updated`, `updated_by_id`, `is_potential`) VALUES
(1, 'KH00001', 'camdosim', 'huyvan73@yahoo.com', NULL, NULL, '2013-05-15 12:54:26', 0, NULL, NULL, 0),
(2, 'KH00002', 'camdosim', 'huyvan73@yahoo.com', NULL, NULL, '2013-05-26 22:28:26', 0, NULL, NULL, 0),
(3, 'KH00003', 'huyvan', 'huyvan73@yahoo.com782251', '123421', NULL, '2013-05-28 17:42:12', 0, NULL, NULL, 0),
(8, 'KH00004', 'camdosim', 'muoicon1994@yahoo.comm', '01656071195', NULL, '2013-05-31 16:30:14', 1, NULL, NULL, 0),
(9, 'KH00009', 'dẤDA', 'quocanh31101986@yahoo.com', '01656071195', NULL, '2013-05-31 16:37:21', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_bank_account`
--

CREATE TABLE IF NOT EXISTS `customer_bank_account` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `account_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_branch` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `account_number_UNIQUE` (`account_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer_bank_account`
--

INSERT INTO `customer_bank_account` (`ID`, `cus_id`, `bank_id`, `account_number`, `bank_branch`) VALUES
(1, 1, 1, '109328113', 'Hà Nội'),
(2, 1, 2, '65424432', 'Hà Nội'),
(5, 8, 1, 'adsd', 'dsaaa'),
(6, 8, 4, 'aaaassss', '13sadsa'),
(7, 9, 3, 'dsad', 'dsadas');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE IF NOT EXISTS `customer_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Thông tin khác của khách hàng' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`ID`, `customer_id`, `type`, `value`) VALUES
(1, 1, 1, 'abc'),
(2, 8, 1, 'g.everest_nd'),
(3, 8, 2, 'adsa'),
(4, 9, 1, 'aadđ'),
(5, 9, 2, 'á11231');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info_type`
--

CREATE TABLE IF NOT EXISTS `customer_info_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(20) NOT NULL,
  `required` tinyint(4) DEFAULT '0',
  `constraints` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer_info_type`
--

INSERT INTO `customer_info_type` (`ID`, `title`, `alias`, `required`, `constraints`) VALUES
(1, 'yahoo', 'yahoo', 0, NULL),
(2, 'Giá trị', 'gia_tri', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_messages`
--

CREATE TABLE IF NOT EXISTS `customer_messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `customer_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer_messages`
--

INSERT INTO `customer_messages` (`ID`, `title`, `content`, `customer_id`, `date_created`, `is_read`) VALUES
(1, 'AADSADD', 'asdad', 1, '2013-05-15 12:54:26', 1),
(2, 'AADSADD', 'ádsa', 2, '2013-05-26 22:28:26', 1),
(3, 'AADSADD', 'DSADSADs', 1, '2013-05-28 17:41:05', 1),
(4, 'RE:AADSADD', 'dấdas', 3, '2013-05-28 17:42:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `roles` text COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_datas`
--

CREATE TABLE IF NOT EXISTS `group_datas` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `module` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên bảng',
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `summary` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `group_datas`
--

INSERT INTO `group_datas` (`ID`, `title`, `rel_id`, `content`, `module`, `date_created`, `created_by_id`, `date_updated`, `updated_by_id`, `summary`) VALUES
(4, 'Ảnh 7', 10, '<p><span style="color:rgb(90, 90, 90); font-family:arial,helvetica,sans-serif; font-size:12px">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...</span></p>\r\n', 'services', '2013-05-21 12:36:12', 1, NULL, NULL, '12231'),
(5, 'Tin tức mới', 5, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...</p>\r\n', 'news', '2013-05-21 15:02:07', 1, NULL, NULL, '21dsadasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `time_login` datetime DEFAULT NULL,
  `ip_login` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `time_logout` datetime DEFAULT NULL,
  `browser` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `origin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `origin_link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng tin tức' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `title`, `summary`, `category_id`, `content`, `origin`, `origin_link`, `thumb`, `keywords`, `date_created`, `created_by_id`, `date_updated`, `updated_by_id`) VALUES
(1, 'Bản tin số 1', NULL, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh. Nullam tellus pede, eleifend posuere, dignissim id, euismod vitae, tortor. Pellentesque vel mauris.', 'vnexpress', 'vnexpress.net', 'Desert.jpg', NULL, '2013-05-13 19:41:40', 1, NULL, NULL),
(2, 'Bản tin 2', NULL, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh. Nullam tellus pede, eleifend posuere, dignissim id, euismod vitae, tortor. Pellentesque vel mauris.', 'dantri', 'dantri.com', 'Hydrangeas.jpg', NULL, '2013-05-13 20:34:47', 1, NULL, NULL),
(3, 'Bản tin số 3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lect', 1, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh. Nullam tellus pede, eleifend posuere, dignissim id, euismod vitae, tortor. Pellentesque vel mauris.</p>\r\n', 'thethao', 'thethao.vn', '1024-1~1.JPG', 'ada,ads, asda, sadsa12', '2013-05-13 06:36:21', 1, '2013-05-21 15:11:37', 1),
(5, 'Tin tức mới', '21dsadasdsa', 1, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...</p>\r\n', 'ADA', 'dsadsad', '0102_1~1.JPG', 'ada,ads, asda, sadsa', '2013-05-21 15:02:07', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE IF NOT EXISTS `news_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Nhóm tin - loại tin' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`ID`, `title`, `thumb`, `created_by_id`, `date_created`, `updated_by_id`, `date_updated`) VALUES
(1, 'Nhóm tin 1', NULL, 1, '2013-05-13 00:00:00', NULL, NULL),
(2, 'Nhóm tin 2', NULL, 1, '2013-05-21 14:39:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_files`
--

CREATE TABLE IF NOT EXISTS `news_files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filepath` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `date_uploaded` datetime DEFAULT NULL,
  `uploaded_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `desc` text,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Các loại thanh toán' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_type` int(11) NOT NULL COMMENT 'Loại sản phẩm (Có phân cấp)',
  `price` float DEFAULT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `is_refund` tinyint(4) DEFAULT '0' COMMENT 'Hoàn trả',
  `refund_period` int(11) DEFAULT NULL COMMENT 'Thời hạn hoàn trả',
  `refund_period_unit` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Đơn vị thời hạn (Ngày - tháng)',
  `is_warranty` tinyint(4) DEFAULT '1' COMMENT 'Bảo hành',
  `warranty_desc` text COLLATE utf8_unicode_ci,
  `warranty_period` int(11) DEFAULT NULL,
  `warranty_period_unit` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `out_stock` tinyint(4) DEFAULT '0',
  `is_deleted` tinyint(4) DEFAULT '0',
  `amount` int(11) DEFAULT NULL,
  `manufacturer` int(11) DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `keywords` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_bills`
--

CREATE TABLE IF NOT EXISTS `product_bills` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(15) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `is_payment` tinyint(4) DEFAULT '0',
  `payment` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `ship_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_type` enum('0','1','2','3') DEFAULT '0',
  `ship_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_email` varchar(100) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `code_UNIQUE` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Hóa đơn' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_bill_detail`
--

CREATE TABLE IF NOT EXISTS `product_bill_detail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Thông tin nhóm sản phẩm (Sản phẩm đặc trưng, sản phẩm nổi bậ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_category_mapping`
--

CREATE TABLE IF NOT EXISTS `product_category_mapping` (
  `ID` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Mapping sản phẩm và nhóm sản phẩm';

-- --------------------------------------------------------

--
-- Table structure for table `product_files`
--

CREATE TABLE IF NOT EXISTS `product_files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `filepath` varchar(45) DEFAULT NULL,
  `mime` varchar(45) DEFAULT NULL,
  `type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `date_uploaded` datetime DEFAULT NULL,
  `uploaded_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_manufacturers`
--

CREATE TABLE IF NOT EXISTS `product_manufacturers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Nhà sản xuất - Cung ứng' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_properties`
--

CREATE TABLE IF NOT EXISTS `product_properties` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `required` tinyint(4) DEFAULT '0',
  `constraints` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Thuộc tính sản phẩm' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_property_mapping`
--

CREATE TABLE IF NOT EXISTS `product_property_mapping` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Mapping sản phẩm - thuộc tính' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_property_type`
--

CREATE TABLE IF NOT EXISTS `product_property_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Mapping thuộc tính vào loại sản phẩm' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE IF NOT EXISTS `product_types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Loại sản phẩm' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT '0',
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Dịch vụ ' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ID`, `title`, `summary`, `desc`, `date_created`, `created_by_id`, `date_updated`, `updated_by_id`, `thumb`, `category_id`, `keywords`) VALUES
(10, 'Ảnh 7', '12231', '<p><span style="color:rgb(90, 90, 90); font-family:arial,helvetica,sans-serif; font-size:12px">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu ...</span></p>\r\n', '2013-05-21 12:36:11', 1, NULL, NULL, '0111_800.JPG', 2, 'ada,ads, asda, sadsa');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE IF NOT EXISTS `service_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Nhóm dịch vụ' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`ID`, `title`, `thumb`, `created_by_id`, `parent_id`, `date_created`, `updated_by_id`, `date_updated`) VALUES
(1, 'Cate 1', NULL, 1, NULL, '2013-05-12 09:35:23', 1, '2013-05-21 14:35:41'),
(2, 'Cate 2', NULL, 1, NULL, '2013-05-12 10:38:32', NULL, NULL),
(8, 'Cate234', NULL, 1, NULL, '2013-05-21 14:25:32', 1, '2013-05-21 14:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `service_customer`
--

CREATE TABLE IF NOT EXISTS `service_customer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `updated_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_files`
--

CREATE TABLE IF NOT EXISTS `service_files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `filepath` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `date_uploaded` datetime DEFAULT NULL,
  `uploaded_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Slide show ảnh' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`ID`, `title`, `summary`, `link`, `image`, `active`) VALUES
(3, 'Ảnh 3', NULL, 'javascript:;', 'Lighthouse.jpg', 1),
(4, 'Ảnh 4', '', 'javascript:;', 'Penguins.jpg', 1),
(5, 'Ảnh 5', NULL, 'javascript:;', 'Tulips.jpg', 1),
(10, 'ADSAD', '', 'javascript:;', 'Koala.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by_id` datetime DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT '0',
  `deleted` tinyint(4) DEFAULT '0',
  `ip_access` text COLLATE utf8_unicode_ci,
  `is_admin` tinyint(4) DEFAULT '0',
  `roles` text COLLATE utf8_unicode_ci,
  `group_id` int(11) DEFAULT NULL,
  `inherit_role` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `date_created`, `created_by_id`, `date_updated`, `updated_by_id`, `email`, `phone`, `active`, `deleted`, `ip_access`, `is_admin`, `roles`, `group_id`, `inherit_role`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '2013-05-14 00:00:00', NULL, NULL, NULL, 'huyvan73@yahoo.com', '0989887386', 1, 0, NULL, 1, 'SYSTEM_MANAGE_ALL', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE IF NOT EXISTS `user_files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `filename` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `filepath` varchar(400) DEFAULT NULL,
  `mime` varchar(45) DEFAULT NULL,
  `type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_uploaded` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_type`
--

CREATE TABLE IF NOT EXISTS `user_info_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(4) DEFAULT '0',
  `constraints` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`ID`, `ip`, `count`) VALUES
(1, '127.0.0.1', 36);

-- --------------------------------------------------------

--
-- Table structure for table `visitors_online`
--

CREATE TABLE IF NOT EXISTS `visitors_online` (
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `time` bigint(20) DEFAULT NULL,
  `browser` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ip`,`browser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitors_online`
--

INSERT INTO `visitors_online` (`ip`, `user_id`, `time`, `browser`) VALUES
('127.0.0.1', 0, 1370245733, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
