-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2011 at 01:48 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `fas_admin`
--


CREATE TABLE IF NOT EXISTS `fas_admin` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FieldName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FieldPass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fas_admin`
--

INSERT INTO `fas_admin` (`ID`, `FieldName`, `FieldPass`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3'),
(2, 'Huyvan', 'bdc4fb776026b4aa3668e91df135323f');

-- --------------------------------------------------------

--
-- Table structure for table `fas_adv`
--

CREATE TABLE IF NOT EXISTS `fas_adv` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FieldLink` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Place` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fas_adv`
--

INSERT INTO `fas_adv` (`ID`, `Image`, `FieldLink`, `Place`) VALUES
(1, 'Image/Adv/red-coral.png', '#', 'Right'),
(2, 'Image/Adv/red-coral.png', '#', 'Right'),
(3, 'Image/Adv/red-coral.png', '#', 'Left'),
(4, 'Image/Adv/red-coral.png', '#', 'Left');

-- --------------------------------------------------------

--
-- Table structure for table `fas_bill`
--

CREATE TABLE IF NOT EXISTS `fas_bill` (
  `BillID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ExtraInfo` text COLLATE utf8_unicode_ci NOT NULL,
  `DateOrder` date NOT NULL,
  `DateDelivery` date NOT NULL,
  `Status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`BillID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `fas_bill`
--

INSERT INTO `fas_bill` (`BillID`, `Name`, `Email`, `Phone`, `Address`, `ExtraInfo`, `DateOrder`, `DateDelivery`, `Status`) VALUES
(13, 'Nguyễn Huy Văn', 'huyvan73@yahoo.com', '013566446', 'dsadad', '2.21.12.21', '2011-06-15', '2011-06-15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fas_bill_detail`
--

CREATE TABLE IF NOT EXISTS `fas_bill_detail` (
  `ProdID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `BillID` int(10) unsigned NOT NULL,
  `Price` double unsigned NOT NULL,
  `Quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ProdID`,`BillID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fas_bill_detail`
--

INSERT INTO `fas_bill_detail` (`ProdID`, `BillID`, `Price`, `Quantity`) VALUES
('01223367', 13, 600000, 3),
('01223365', 13, 1200000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fas_cate_prod`
--

CREATE TABLE IF NOT EXISTS `fas_cate_prod` (
  `CateID` int(10) NOT NULL AUTO_INCREMENT,
  `CateName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Choice` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CateID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `fas_cate_prod`
--

INSERT INTO `fas_cate_prod` (`CateID`, `CateName`, `Choice`) VALUES
(9, 'Thể thao', '1'),
(8, 'Phụ kiện', '1'),
(7, 'Thời trang', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fas_contact`
--

CREATE TABLE IF NOT EXISTS `fas_contact` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Header` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fas_contact`
--

INSERT INTO `fas_contact` (`ID`, `Name`, `Email`, `Phone`, `Header`, `Content`, `Date`) VALUES
(3, 'Nguyễn Huy Văn', 'huyvan73@yahoo.com', '013566446', 'Cầm cố sim số đẹp', 'sađsads', '2011-06-05'),
(4, 'Nguyễn Huy Văn', 'anhsangnhan', '013566446', 'Select * from fas_contact', 'sađá', '2011-06-05'),
(5, 'Nguyễn Huy Văn', 'huyvan73@yahoo.com', '013566446', 'Delete from fas_contact', 'dsađấ', '2011-06-05'),
(7, 'Nguyễn Huy Văn', 'huyvan73@yahoo.com', '013566446', 'Cầm cố sim số đẹp', 'asdaad', '2011-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `fas_countonline`
--

CREATE TABLE IF NOT EXISTS `fas_countonline` (
  `Ipid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Ipid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fas_countonline`
--

INSERT INTO `fas_countonline` (`Ipid`, `Ip`, `Quantity`) VALUES
(1, '127.0.0.1', 36);

-- --------------------------------------------------------

--
-- Table structure for table `fas_extra_info`
--

CREATE TABLE IF NOT EXISTS `fas_extra_info` (
  `InfoID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ModuleID` int(10) unsigned NOT NULL,
  `InfoHead` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `InfoSummary` text COLLATE utf8_unicode_ci NOT NULL,
  `InfoContent` text COLLATE utf8_unicode_ci NOT NULL,
  `InfoDate` datetime NOT NULL,
  `InfoImage` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Slide` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`InfoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `fas_extra_info`
--

INSERT INTO `fas_extra_info` (`InfoID`, `ModuleID`, `InfoHead`, `InfoSummary`, `InfoContent`, `InfoDate`, `InfoImage`, `Slide`) VALUES
(11, 3, 'Lorem ipsum dolor sit amet', 'tortor. Pellentesque vel mauris. Phasellus dictum rutrum lectus. Vestibulum a risus at orci egestas condimentum. Morbi in turpis vel ante feugiat placerat. Vestibulum justo lacus, pulvinar at, gravida quis, condimentum et, pede. Suspendisse sit amet turpis in mauris porttitor pulvinar. Phasellus odio lacus, volutpat at, ullamcorper sit amet, elementum nec, sapien. Fusce orci sem, venenatis a, pellentesque sit amet, elementum quis, orci. Ut vulputate dolor id lectus. Curabitur non neque. Quisque libero.\r\n', '<p>\r\n	e, dignissim id, euismod vitae, tortor. Pellentesque vel mauris. Phasellus dictum rutrum lectus. Vestibulum a risus at orci egestas condimentum. Morbi in turpis vel ante feugiat placerat. Vestibulum justo lacus, pulvinar at, gravida quis, condimentum et, pede. Suspendisse sit amet turpis in mauris porttitor pulvinar. Phasellus odio lacus, volutpat at, ullamcorper sit amet, elementum nec, sapien. Fusce orci sem, venenatis a, pellentesque sit amet, elementum quis, orci. Ut vulputate dolor id lectus. Curabitur non neque. Quisque libero.<br />\r\n	<br />\r\n	Integer molestie, mi tincidunt rutrum convallis, tellus justo fringilla orci, vitae iaculis turpis nunc a lorem. Sed tortor dui, imperdiet eu, volutpat vestibulum, posuere vel, urna. Cras sed pede in arcu consequat vehicula. Nunc eget neque et diam rutrum egestas. Nam interdum justo quis ligula. Vestibulum fringilla placerat leo. Proin rutrum. Nunc ullamcorper lectus sit amet diam. Duis congue ligula a mauris. Etiam nonummy odio ut leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi rhoncus, erat ut accumsan euismod, erat diam egestas lacus, pulvinar placerat justo augue eget augue. Etiam dui elit, elementum facilisis, auctor in, feugiat non, nibh. Donec diam ipsum, interdum eget, auctor in, bibendum id, turpis. Cras dapibus, diam sit amet mattis interdum, turpis neque pellentesque turpis, et rhoncus velit mi in nisi. Ut ullamcorper convallis turpis. Donec ligula risus, imperdiet vel, auctor quis, dapibus at, orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos.<br />\r\n	<br />\r\n	Nunc eleifend nulla vel orci. Donec sollicitudin. Phasellus urna. Sed sit amet nisi tincidunt quam porta placerat. Phasellus sit amet metus et neque tincidunt porta. Mauris lorem lorem, faucibus sit amet, lobortis non, eleifend eget, massa. Duis odio massa, condimentum sed, fringilla quis, tincidunt quis, mi. Proin et diam. Fusce tortor metus, imperdiet at, vestibulum sed, feugiat et, erat. Cras in tortor. Integer a dui.<br />\r\n	<br />\r\n	Donec nibh leo, tristique vel, vehicula vitae, commodo sed, augue. Suspendisse mi libero, egestas at, faucibus at, eleifend nec, eros. Aliquam posuere ipsum sit amet nunc. Pellentesque orci lacus, commodo tincidunt, eleifend ut, egestas in, ligula. Suspendisse lacus nibh, congue et, auctor accumsan, porta non, metus. Integer tempus ligula ut mauris. Donec sollicitudin, sapien in luctus adipiscing, risus urna pharetra nisl, in vehicula dui mauris in lectus. Sed eget nunc. Nulla a tellus. Proin tristique viverra urna. Donec ac velit. Vestibulum ipsum ligula, placerat mollis, fermentum vitae, consectetuer id, libero. Vivamus orci. Donec lacus leo, lacinia a, sodales egestas, rutrum sed, elit. Suspendisse adipiscing. Nulla facilisi. Quisque in libero vel turpis semper consequat.<br />\r\n	<br />\r\n	Vivamus massa velit, aliquet et, tempor sit amet, commodo ut, turpis. Quisque et augue. Mauris a tortor. Nulla ultricies. Mauris consectetuer, nibh at hendrerit vehicula, arcu erat commodo nisl, ac facilisis justo risus vitae sem. Duis fermentum eros ut nulla. Aliquam a elit. Nullam commodo erat vel nulla mollis fringilla. Aenean quam enim, tincidunt vel, eleifend quis, pulvinar sed, odio. Integer placerat ipsum ac dolor. Nunc sodales tellus id ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nullam vel metus. Aliquam tincidunt, sapien et gravida dignissim, risus enim nonummy purus, non semper eros lectus at velit. Aliquam ac dui. Aliquam sem quam, tempus ut, lobortis id, aliquet et, eros. Sed euismod scelerisque augue. Proin semper, leo non pulvinar pretium, eros tortor placerat tortor, non interdum lectus est eget pede. Vivamus convallis.<br />\r\n	<br />\r\n	Sed sit amet dui et turpis interdum porta. Ut metus lectus, fermentum eu, volutpat in, consequat non, erat. Suspendisse quam pede, eleifend pretium, semper vitae, laoreet ac, ipsum. Proin orci. Ut nonummy rutrum turpis. Curabitur nec massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer eu nibh laoreet eros condimentum hendrerit. Etiam quis erat. In tempus arcu quis justo. Morbi dolor eros, pharetra at, adipiscing nec, dictum sed, purus. Cras nulla. Pellentesque pede ante, porttitor sed, sollicitudin id, tempor adipiscing, justo. Praesent quam ligula, tempor at, hendrerit nec, pulvinar id, sem.<br />\r\n	<br />\r\n	Ut eros. Donec quis purus et dolor faucibus mollis. Maecenas accumsan. Mauris volutpat, orci non consequat v</p>\r\n', '2011-06-14 15:39:13', 'Image/News/Anh2.png', '0'),
(10, 3, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus qu', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh.</p>\r\n', '2011-06-14 15:37:28', 'Image/News/Anh2.png', '0'),
(3, 6, 'Lorem ipsum dolor sit amet', 'consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula                               ', 'consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula                               sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet                               ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo.                               Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at,                               lacus. Maecenas at nibh...', '2011-06-03 15:14:13', 'Image/News/1.jpg', '1'),
(4, 6, 'Lorem ipsum dolor sit amet', 'consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo.   ', 'consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh...\r\n', '2011-06-14 14:48:47', 'Image/News/4.jpg', '1'),
(5, 6, 'Lorem ipsum dolor sit amet', 'consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in ', 'consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula                               sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet                               ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo.                               Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at,                               lacus. Maecenas at nibh...', '2011-06-16 15:16:13', 'Image/News/2.jpg', '1'),
(6, 6, 'Lorem ipsum dolor sit amet', 'consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula                               ', '<p>\r\n	<span style="font-size:20px;">I</span>nteger interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh...</p>\r\n', '2011-06-14 14:47:43', 'Image/News/5.jpg', '1'),
(9, 6, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh.<br />\r\n	<br />\r\n	Nullam tellus pede, eleifend posuere, dignissim id, euismod vitae, tortor. Pellentesque vel mauris. Phasellus dictum rutrum lectus. Vestibulum a risus at orci egestas condimentum. Morbi in turpis vel ante feugiat placerat. Vestibulum justo lacus, pulvinar at, gravida quis, condimentum et, pede. Suspendisse sit amet turpis in mauris porttitor pulvinar. Phasellus odio lacus, volutpat at, ullamcorper sit amet, elementum nec, sapien. Fusce orci sem, venenatis a, pellentesque sit amet, elementum quis, orci. Ut vulputate dolor id lectus. Curabitur non neque. Quisque libero.<br />\r\n	<br />\r\n	Integer molestie, mi tincidunt rutrum convallis, tellus justo fringilla orci, vitae iaculis turpis nunc a lorem. Sed tortor dui, imperdiet eu, volutpat vestibulum, posuere vel, urna. Cras sed pede in arcu consequat vehicula. Nunc eget neque et diam rutrum egestas. Nam interdum justo quis ligula. Vestibulum fringilla placerat leo. Proin rutrum. Nunc ullamcorper lectus sit amet diam. Duis congue ligula a mauris. Etiam nonummy odio ut leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi rhoncus, erat ut accumsan euismod, erat diam egestas lacus, pulvinar placerat justo augue eget augue. Etiam dui elit, elementum facilisis, auctor in, feugiat non, nibh. Donec diam ipsum, interdum eget, auctor in, bibendum id, turpis. Cras dapibus, diam sit amet mattis interdum, turpis neque pellentesque turpis, et rhoncus velit mi in nisi. Ut ullamcorper convallis turpis. Donec ligula risus, imperdiet vel, auctor quis, dapibus at, orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos.<br />\r\n	<br />\r\n	Nunc eleifend nulla vel orci. Donec sollicitudin. Phasellus urna. Sed sit amet nisi tincidunt quam porta placerat. Phasellus sit amet metus et neque tincidunt porta. Mauris lorem lorem, faucibus sit amet, lobortis non, eleifend eget, massa. Duis odio massa, condimentum sed, fringilla quis, tincidunt quis, mi. Proin et diam. Fusce tortor metus, imperdiet at, vestibulum sed, feugiat et, erat. Cras in tortor. Integer a dui.</p>\r\n', '2011-06-14 15:03:18', 'Image/News/3.jpg', '1'),
(8, 6, 'Lorem ipsum dolor sit amet', ' consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo.', ' consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula                               sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet                               ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo.                               Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at,                               lacus. Maecenas at nibh...', '2011-06-03 15:15:44', 'Image/News/6.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fas_introduction`
--

CREATE TABLE IF NOT EXISTS `fas_introduction` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `Contact` text COLLATE utf8_unicode_ci NOT NULL,
  `ContentPayment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fas_introduction`
--

INSERT INTO `fas_introduction` (`ID`, `Content`, `Contact`, `ContentPayment`) VALUES
(1, '<p>\r\n	&aacute;&aacute;dsđ&acirc;sd</p>\r\n', '<p>\r\n	HElLLLOOOĐASADS</p>\r\n', '<p>\r\n	Nội dung thanh to&aacute;n</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `fas_link`
--

CREATE TABLE IF NOT EXISTS `fas_link` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FieldName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fas_link`
--

INSERT INTO `fas_link` (`ID`, `FieldName`, `Link`) VALUES
(1, 'Trang chủ', 'index.php'),
(2, 'Sản phẩm mới', 'San pham moi.php'),
(3, 'Giới thiệu', 'Gioi thieu.php'),
(4, 'Liên hệ', 'Lien he.php'),
(5, 'Giỏ hàng', 'Gio hang.php'),
(6, 'Sản phẩm', 'San pham.php'),
(7, 'Kinh nghiệm', 'Kinh nghiem.php'),
(8, 'Tin tức', 'Tin tuc.php');

-- --------------------------------------------------------

--
-- Table structure for table `fas_mark`
--

CREATE TABLE IF NOT EXISTS `fas_mark` (
  `MarkID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID` int(10) unsigned NOT NULL,
  `Rank` int(10) unsigned NOT NULL,
  `ProdID` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MarkID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `fas_mark`
--

INSERT INTO `fas_mark` (`MarkID`, `ID`, `Rank`, `ProdID`) VALUES
(15, 36, 5, '01223365');

-- --------------------------------------------------------

--
-- Table structure for table `fas_menubot`
--

CREATE TABLE IF NOT EXISTS `fas_menubot` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `FieldName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FieldLink` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fas_menubot`
--

INSERT INTO `fas_menubot` (`ID`, `FieldName`, `FieldLink`) VALUES
(1, 'Trang chủ', 'index.php'),
(2, 'Sản phẩm', 'San pham.php'),
(3, 'Giỏ hàng', 'Gio hang.php'),
(4, 'Liên hệ', 'Lien he.php'),
(6, 'Giới thiệu', 'Gioi thieu.php');

-- --------------------------------------------------------

--
-- Table structure for table `fas_menutop`
--

CREATE TABLE IF NOT EXISTS `fas_menutop` (
  `TopID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FieldName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FieldLink` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TopID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `fas_menutop`
--

INSERT INTO `fas_menutop` (`TopID`, `FieldName`, `FieldLink`) VALUES
(1, 'Trang chủ', 'index.php'),
(2, 'Sản phẩm mới', 'San pham moi.php'),
(3, 'Sản phẩm', 'San pham.php'),
(4, 'Liên hệ', 'Lien he.php'),
(11, 'Kinh nghiệm', 'Kinh nghiem.php'),
(10, 'Giỏ hàng', 'Gio hang.php'),
(9, 'Tin tức', 'Tin tuc.php');

-- --------------------------------------------------------

--
-- Table structure for table `fas_mod`
--

CREATE TABLE IF NOT EXISTS `fas_mod` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FieldName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FieldPass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fas_mod`
--


-- --------------------------------------------------------

--
-- Table structure for table `fas_module`
--

CREATE TABLE IF NOT EXISTS `fas_module` (
  `ModuleID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ModuleName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Style` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Display` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ModuleID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `fas_module`
--

INSERT INTO `fas_module` (`ModuleID`, `ModuleName`, `Style`, `Display`, `Quantity`) VALUES
(2, 'Sản phẩm chính', 'Style1', 'Main', 6),
(3, 'Kinh nghiệm', 'Style2', 'All', 0),
(6, 'Tin tức', 'Style2', 'All', 0),
(7, 'Sản phẩm mới', 'Style2', 'All', 0),
(8, 'Giới thiệu', 'Style2', 'All', 0),
(9, 'Liên hệ', 'Style2', 'All', 0),
(10, 'Giỏ hàng', 'Style2', 'All', 0),
(11, 'Quảng cáo', 'Style2', 'All', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fas_online`
--

CREATE TABLE IF NOT EXISTS `fas_online` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `YahooName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fas_online`
--

INSERT INTO `fas_online` (`ID`, `YahooName`, `Name`, `Phone`) VALUES
(1, 'congluc.4ever_tl', 'Kinh doanh 1', '0914141414'),
(2, 'huyvan73', 'Kỹ thuật', '0989887386');

-- --------------------------------------------------------

--
-- Table structure for table `fas_product`
--

CREATE TABLE IF NOT EXISTS `fas_product` (
  `ProdID` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ProdName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProdColor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProdPrice` double NOT NULL,
  `Inventory` int(10) unsigned NOT NULL,
  `ProcName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TypeID` int(10) unsigned NOT NULL,
  `CateID` int(10) unsigned NOT NULL,
  `Newest` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `MainProd` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `Mark` int(10) NOT NULL,
  `DateAdd` date NOT NULL,
  `Material` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProdSize` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `ProdImage` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ProdID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fas_product`
--

INSERT INTO `fas_product` (`ProdID`, `ProdName`, `ProdColor`, `ProdPrice`, `Inventory`, `ProcName`, `TypeID`, `CateID`, `Newest`, `MainProd`, `Mark`, `DateAdd`, `Material`, `ProdSize`, `Description`, `ProdImage`) VALUES
('01223365', 'Sản phẩm 1', 'Đỏ', 1200000, 1, '', 15, 7, '1', '1', 5, '2011-06-14', '', '', '', 'Image/Product/Anh2.png'),
('01223366', 'Sản phẩm 2', '', 500000, 4, '', 14, 8, '1', '1', 0, '2011-06-13', '', 'M,XL', '', 'Image/Product/Anh2.png'),
('0122338', 'Sản phẩm 4', 'Đỏ', 5000000, 5, '', 12, 8, '1', '1', 0, '2011-06-13', '', '', '', 'Image/Product/Anh1.png'),
('01223368', 'Sản phẩm 5', '', 1200000, 5, '', 16, 9, '1', '1', 0, '2011-06-13', '', '', '', 'Image/Product/Anh2.png'),
('01223369', 'Sản phẩm 6', '', 1200000, 2, '', 15, 7, '1', '1', 0, '2011-06-13', '', '', '', 'Image/Product/Anh2.png'),
('01223367', 'Sản phẩm 3', 'Đỏ', 600000, 24, '', 13, 8, '1', '1', 0, '2011-06-14', '', '', '', 'Image/Product/Anh2.png');

-- --------------------------------------------------------

--
-- Table structure for table `fas_reviews`
--

CREATE TABLE IF NOT EXISTS `fas_reviews` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `ProdID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fas_reviews`
--

INSERT INTO `fas_reviews` (`ID`, `Name`, `Email`, `Date`, `Content`, `ProdID`) VALUES
(8, 'dsadsadá', 'huyvan73@yahoo.com', '2011-06-15', 'dsađâsdá', '01223365');

-- --------------------------------------------------------

--
-- Table structure for table `fas_session`
--

CREATE TABLE IF NOT EXISTS `fas_session` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Session_Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(10) unsigned NOT NULL,
  `ProdID` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Mark` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `fas_session`
--

INSERT INTO `fas_session` (`ID`, `Session_Name`, `Time`, `Quantity`, `ProdID`, `Mark`) VALUES
(38, '21bir5ge8bji1986hkon5dgmt4', '1309085634', 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fas_typeprod`
--

CREATE TABLE IF NOT EXISTS `fas_typeprod` (
  `TypeID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CateID` int(11) NOT NULL,
  `TypeName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `fas_typeprod`
--

INSERT INTO `fas_typeprod` (`TypeID`, `CateID`, `TypeName`) VALUES
(16, 9, 'Vợt tennis'),
(15, 7, 'Giày - dép'),
(14, 8, 'Kính'),
(13, 8, 'Thắt lưng'),
(12, 8, 'Vòng'),
(11, 7, 'Váy'),
(10, 7, 'Quần - Áo'),
(17, 9, 'Áo thể thao');
