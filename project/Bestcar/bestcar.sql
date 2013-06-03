-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2010 at 02:26 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bestcar`
--
CREATE DATABASE `bestcar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bestcar`;
-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE IF NOT EXISTS `chitiethoadon` (
  `MaHD` int(10) unsigned NOT NULL,
  `MaSP` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gia` double unsigned DEFAULT NULL,
  `Soluong` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`MaHD`,`MaSP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHD`, `MaSP`, `Gia`, `Soluong`) VALUES
(37, 'SP0001', 260000, 1),
(32, 'SP0001', 260000, 1),
(35, 'SP0001', 260000, 1),
(34, 'SP0001', 260000, 1),
(34, 'SP0002', 1263660, 4),
(34, 'SP0003', 750000, 3),
(34, 'SP0006', 36500, 7),
(36, 'SP0001', 260000, 2),
(38, 'SP0001', 260000, 1),
(38, 'SP0004', 164000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
  `MaHD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MaTV` int(10) unsigned NOT NULL,
  `HotenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Dienthoai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ngaydat` datetime NOT NULL,
  `Ngaygiao` date NOT NULL,
  `PTTT` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangthaiGH` enum('1','0') COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiachiGH` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHD`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaTV`, `HotenKH`, `Dienthoai`, `Email`, `Ngaydat`, `Ngaygiao`, `PTTT`, `TrangthaiGH`, `DiachiGH`) VALUES
(37, 9, 'Nguyễn Huy Văn', '0909888888', 'vannguyenhuy73@gmail.com', '2010-12-07 00:19:11', '2010-12-14', 'style1', '0', 'Hà Nội'),
(34, 1, 'Nguyễn Huy Văn', '0989887386', 'huyvan73@yahoo.com', '2010-12-03 10:12:24', '2010-12-10', 'style1', '1', 'Hà Nội'),
(32, 1, 'Nguyễn Huy Văn', '0989887386', 'huyvan73@yahoo.com', '2010-12-03 09:53:00', '2010-12-10', 'style1', '1', 'Hà Nội'),
(35, 1, 'Nguyễn Huy Văn', '0989887386', 'huyvan73@yahoo.com', '2010-12-03 10:23:04', '2010-12-10', 'style1', '1', 'Hà Nội'),
(36, 1, 'Nguyễn Huy Văn', '0989887386', 'huyvan73@yahoo.com', '2010-12-03 11:39:49', '2010-12-10', 'style1', '0', 'Hà Nội'),
(38, 1, 'Nguyễn Huy Văn', '0989887386', 'huyvan73@yahoo.com', '2010-12-07 22:35:57', '2010-12-14', 'style1', '0', 'Yên Viên - Gia Lâm - Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE IF NOT EXISTS `loaisp` (
  `MaLSP` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenLSP` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLSP`),
  UNIQUE KEY `TenLSP` (`TenLSP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`MaLSP`, `TenLSP`) VALUES
('LSP0001', 'SportCar'),
('LSP0002', 'LuxuryCar'),
('LSP0003', 'Sedan'),
('LSP0004', 'Convertible'),
('LSP0005', 'SUV'),
('LSP0006', 'Coupe'),
('LSP0007', 'Compact'),
('LSP0008', 'Minivan');

-- --------------------------------------------------------

--
-- Table structure for table `loaitt`
--

CREATE TABLE IF NOT EXISTS `loaitt` (
  `MaLTT` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TenLTT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLTT`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `loaitt`
--

INSERT INTO `loaitt` (`MaLTT`, `TenLTT`) VALUES
(2, 'Thế giới xe'),
(3, 'Thị trường xe '),
(6, 'Công nghệ xe'),
(7, 'Khuyến mãi'),
(8, 'Người đẹp và  xe'),
(10, 'Tư vấn kĩ thuật');

-- --------------------------------------------------------

--
-- Table structure for table `nhacc`
--

CREATE TABLE IF NOT EXISTS `nhacc` (
  `MaNCC` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenNCC` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaNCC`),
  UNIQUE KEY `TenNCC` (`TenNCC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhacc`
--

INSERT INTO `nhacc` (`MaNCC`, `TenNCC`) VALUES
('NCC0001', 'Porsche'),
('NCC0002', 'Mercedes'),
('NCC0003', 'Ferrari'),
('NCC0006', 'Toyota'),
('NCC0004', 'Honda'),
('NCC0005', 'Lamborghini'),
('NCC0007', 'Lexus'),
('NCC0008', 'Suzuki'),
('NCC0009', 'Audi'),
('NCC0010', 'BMW'),
('NCC0011', 'Chevrolet'),
('NCC0012', 'Ford'),
('NCC0013', 'Fiat'),
('NCC0014', 'Hyundai'),
('NCC0015', 'Mazda'),
('NCC0016', 'RollRoyce');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `MaAnh` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MaTT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenAnh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaAnh`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`MaAnh`, `MaTT`, `TenAnh`) VALUES
(2, 'TT0002', '2.jpg'),
(3, 'TT0002', '3.jpg'),
(27, 'Mã tin tức', '1.jpg'),
(11, 'TT0002', '7.jpg'),
(6, 'TT0002', '4.jpg'),
(7, 'TT0002', '5.jpg'),
(8, 'TT0002', '6.jpg'),
(32, 'Mã tin tức', '6.jpg'),
(31, 'Mã tin tức', '5.jpg'),
(30, 'Mã tin tức', '4.jpg'),
(29, 'Mã tin tức', '3.jpg'),
(28, 'Mã tin tức', '2.jpg'),
(33, 'Mã tin tức', '7.jpg'),
(34, 'Mã tin tức', '8.jpg'),
(35, 'Mã tin tức', '9.jpg'),
(36, 'Mã tin tức', '10.jpg'),
(37, 'TT0005', '001.jpg'),
(38, 'TT0005', '002.jpg'),
(39, 'TT0005', '003.jpg'),
(40, 'TT0005', '004.jpg'),
(41, 'TT0005', '005.jpg'),
(42, 'TT0005', '006.jpg'),
(43, 'TT0005', '007.jpg'),
(44, 'TT0005', '8.jpg'),
(45, 'TT0005', '9.jpg'),
(46, 'TT0005', '10.jpg'),
(47, 'TT0005', '001.jpg'),
(48, 'TT0005', '002.jpg'),
(49, 'TT0005', '003.jpg'),
(50, 'TT0005', '004.jpg'),
(51, 'TT0005', '005.jpg'),
(52, 'TT0005', '006.jpg'),
(53, 'TT0005', '007.jpg'),
(54, 'TT0005', '8.jpg'),
(55, 'TT0005', '9.jpg'),
(56, 'TT0005', '10.jpg'),
(57, 'TT0006', 'hyundai-azera-2.jpg'),
(58, 'TT0007', 'Ford khuyen mai.jpg'),
(59, 'TT0008', 'vnm_2010_307570.jpg'),
(60, 'TT0008', 'vnm_2010_307571.jpg'),
(61, 'TT0008', 'vnm_2010_307572.jpg'),
(62, 'TT0008', 'vnm_2010_307573.jpg'),
(63, 'TT0008', 'vnm_2010_307574.jpg'),
(64, 'TT0008', 'vnm_2010_307575.jpg'),
(65, 'TT0008', 'vnm_2010_307576.jpg'),
(66, 'TT0008', 'vnm_2010_307577.jpg'),
(67, 'TT0009', 'chan da.jpg'),
(68, 'TT0009', 'chan da (1).jpg'),
(69, 'TT0009', 'chan da (2).jpg'),
(70, 'TT0009', 'chan da (3).jpg'),
(71, 'TT0009', 'chan da (4).jpg'),
(72, 'TT0009', 'chan da (5).jpg'),
(73, 'TT0009', 'chan da (6).jpg'),
(74, 'TT0009', 'chan da (7).jpg'),
(75, 'TT0009', 'chan da (8).jpg'),
(76, 'TT0009', 'chan da (9).jpg'),
(77, 'TT0009', 'chan da (10).jpg'),
(78, 'TT0009', 'chan da (11).jpg'),
(79, 'TT0009', 'chan da (12).jpg'),
(80, 'TT0009', 'chan da (13).jpg'),
(81, 'TT0009', 'chan da (14).jpg'),
(82, 'TT0009', 'chan da (15).jpg'),
(83, 'TT0009', 'chan da (16).jpg'),
(84, 'TT0009', 'chan da (17).jpg'),
(85, 'TT0009', 'chan da.jpg'),
(86, 'TT0009', 'chan da (1).jpg'),
(87, 'TT0009', 'chan da (2).jpg'),
(88, 'TT0009', 'chan da (3).jpg'),
(89, 'TT0009', 'chan da (4).jpg'),
(90, 'TT0009', 'chan da (5).jpg'),
(91, 'TT0009', 'chan da (6).jpg'),
(92, 'TT0009', 'chan da (7).jpg'),
(93, 'TT0009', 'chan da (8).jpg'),
(94, 'TT0009', 'chan da (9).jpg'),
(95, 'TT0009', 'chan da (10).jpg'),
(96, 'TT0009', 'chan da (11).jpg'),
(97, 'TT0009', 'chan da (12).jpg'),
(98, 'TT0009', 'chan da (13).jpg'),
(99, 'TT0009', 'chan da (14).jpg'),
(100, 'TT0009', 'chan da (15).jpg'),
(101, 'TT0009', 'chan da (16).jpg'),
(102, 'TT0009', 'chan da (17).jpg'),
(103, 'TT0010', 'Nhapkhau.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `MaSP` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gia` double unsigned NOT NULL,
  `Trangthai` enum('1','0') NOT NULL,
  `MaLSP` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaNCC` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Mausac` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `isBestBuy` enum('1','0') NOT NULL,
  `isNew` enum('1','0') NOT NULL,
  `isVip` enum('1','0') NOT NULL,
  `isSale` enum('1','0') NOT NULL,
  `GiaKM` double unsigned NOT NULL,
  `Mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngaynhap` date NOT NULL,
  `Picture` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaSP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Gia`, `Trangthai`, `MaLSP`, `MaNCC`, `Mausac`, `isBestBuy`, `isNew`, `isVip`, `isSale`, `GiaKM`, `Mota`, `Ngaynhap`, `Picture`) VALUES
('SP0001', 'Porseche 911 Carreira 4s', 260000, '1', 'LSP0001', 'NCC0001', 'Đỏ', '0', '1', '1', '0', 0, '4 Trims:Coupe, S Coupe, <br />\r\nCabriolet, S Cabriolet. <br />\r\nSố cửa: 2 or 4. <br />\r\nKiểu xe:Luxury Sports car or convertible sports car. <br />\r\nNhiên liệu:Ethanol Full:64L.<br />\r\nĐộng cơ:Rear Engine<br />\r\nHộp số:6.<br />\r\nDung tích xylanh:3.5 L.<br />\r\nCông suất cực đại:385 hp.<br />\r\nMomen xoắn cực đại: 310 lb-ft.<br />\r\n0-60 mph: 4.5 se', '2010-11-10', 'porsche911.jpg'),
('SP0002', 'Mercedes-Benz SLR', 1263660, '1', 'LSP0001', 'NCC0002', 'Trắng bạc', '0', '1', '1', '0', 0, 'Số cửa: 2.<br />\r\nĐộng cơ: 5.4L 617 hp V8. <br />\r\nKiểu: luxury Sport.<br />\r\nDung tích xy lanh (cc): 5439.<br />\r\nCông suất cực đại: 617 HP.<br />\r\nHộp số: Tự động 5 cấp.<br />\r\nNhiên liệu: Xăng', '2010-11-10', 'Mercedes-BenzSLR.jpg'),
('SP0003', 'Ferrari 458 Italia', 750000, '1', 'LSP0001', 'NCC0003', 'Đỏ', '0', '1', '1', '0', 0, 'Động cơ V8 4.5 lít. <br />\r\nCông suất 570 HP. <br />\r\nMô men xoắn cực đại 400lb-ft. <br />\r\n0-100km/h: 3.4s.<br />\r\nTốc độ tối đa 325km/h.<br />\r\nHộp số: số tay 7 cấp. <br />\r\nNhiên liệu: Ethenol. <br />\r\nMức tiêu thụ nhiên liệu 13,7L/100km. ', '2010-11-10', 'ferrari458italia.jpg'),
('SP0004', 'Audi Q7', 164000, '1', 'LSP0003', 'NCC0009', 'Trắng', '1', '1', '1', '0', 0, 'Loại động cơ 	3.6L 	3.6L 	4.2L<br />\r\nKiểu 	V6, 24Valves / DOHC 	V6, 24Valves / DOHC 	V8, 32 Van / DOHC<br />\r\nDung tích xy lanh (cc) 	3597 	3597 	4163<br />\r\nTỷ số nén 	12.0:1 	12.0:1 	12.5:1<br />\r\nCông suất cực đại 	280 @ 6200 RPM 	280 @ 6200 RPM 	350 @ 6800 RPM<br />\r\nMomen xoắn cực đại (Nm) 	266 @ 2750 RPM 	266 @ 2750 RPM 	325 @ 3500 RPM<br />\r\nĐường kính x hành trình piston (mm) 	89 x 97 	89 x 97 	85 x 93', '2010-12-08', 'AudiQ7.jpg'),
('SP0006', 'Honda CIvic', 36500, '0', 'LSP0006', 'NCC0004', 'Trắng', '1', '1', '0', '1', 0.16, 'Số cửa 	4, Số chỗ ngồi:5.<br /><br /><br />\r\nLoại động cơ 1.8L, <br /><br /><br />\r\nKiểu 4 xi lanh thẳng hàng, SOHC, i-VTEC. <br /><br /><br />\r\nDung tích xy lanh (cc) 	1799.<br /><br /><br />\r\nCông suất cực đại 103 / 6300 (kw/rpm),<br /><br /><br />\r\nMomen xoắn cực đại (Nm) 174/4300 (Nm/rpm),<br /><br /><br />\r\nHộp số 5 số tự động,<br /><br /><br />\r\nLoại nhiên liệu Xăng 		', '2010-08-17', 'HondaCivic.jpg'),
('SP0005', 'FORD FOCUS 1.8 MT', 27800, '1', 'LSP0007', 'NCC0012', 'Nhiều màu', '0', '0', '0', '0', 0, 'Trọng lượng không tải: 	1295 kg<br />\r\nTrọng lượng toàn tải: 	1295 kg<br />\r\nDung tích động cơ: 	1798 cc<br />\r\nKiểu động cơ: 	Xăng 1.8L Duratec-16Van<br />\r\nDung tích thùng nhiên liệu: 	55 lít<br />\r\nThể tích khoang chứa đồ: 	450 lít<br />\r\nDài * Rộng * Cao: 	4481 * 1477 * 1839 (mm)<br />\r\nCông suất cực đại: 	130/6000 Mã lực/vph<br />\r\nHộp số: 	Số sàn<br />\r\nNhiên liệu: 	Xăng<br />\r\nMomel xoắn cực đại: 	165/4000 Nm/vph<br />\r\nTốc độ tối đa: 	160 Km/h<br />\r\nChiều cao gầm xe: 	<br />\r\nHệ thống treo trước: 	Độc lập Macpherson<br />\r\nHệ thống treo sau: 	Đa liên kết<br />\r\nCỡ lốp /áp suất lốp (kg/cm2): 	195/65R15<br />\r\nLượng xăng tiêu thụ khi đi trong thành phố: 	8<br />\r\nLượng xăng tiêu thụ khi đi trên xa lộ: 	9<br />\r\nKiểu vỏ và mâm: 	195/65R15', '2010-12-07', 'FordFocus1.8MT.jpg'),
('SP0007', 'Odyssey Touring', 40505, '1', 'LSP0008', 'NCC0004', 'Nhiều màu', '1', '0', '0', '1', 0.03, 'Trọng lượng không tải: 	1717 kg<br /><br />\r\nTrọng lượng toàn tải: 	1717 kg<br /><br />\r\nDung tích động cơ: 	3471 cc<br /><br />\r\nKiểu động cơ: 	V6, 24 van SOHC<br /><br />\r\nDung tích thùng nhiên liệu: 	79 lít<br /><br />\r\nThể tích khoang chứa đồ: 	1087 lít<br /><br />\r\nDài * Rộng * Cao: 	4951 * 1889 * 1715 (mm)<br /><br />\r\nCông suất cực đại: 	244/5750 Mã lực/vph<br /><br />\r\nHộp số: 	Số tự động 5 cấp<br /><br />\r\nNhiên liệu: 	Xăng<br /><br />\r\nMomel xoắn cực đại: 	332/4900 Nm/vph<br /><br />\r\nTốc độ tối đa: 	n/a Km/h<br /><br />\r\nChiều cao gầm xe: 	N/A<br /><br />\r\nHệ thống treo trước: 	n/a<br /><br />\r\nHệ thống treo sau: 	n/a<br /><br />\r\nCỡ lốp /áp suất lốp (kg/cm2): 	235 / 60 R17 102T<br /><br />\r\nLượng xăng tiêu thụ khi đi trong thành phố: 	13.8 lít/100km<br /><br />\r\nLượng xăng tiêu thụ khi đi trên xa lộ: 	9.4 lít/100km<br /><br />\r\nKiểu vỏ và mâm: 	n/a', '2010-12-07', '2011-Honda-Odyssey-Touring-Elit-121.jpg'),
('SP0008', 'GS 450h', 63050, '1', 'LSP0002', 'NCC0007', 'Trắng', '0', '1', '1', '0', 0, 'Trọng lượng không tải: 	1680 kg<br /><br />\r\nTrọng lượng toàn tải: 	2120 kg<br /><br />\r\nDung tích động cơ: 	3500 cc<br /><br />\r\nKiểu động cơ: 	3.5L V6 DOHC 24 van<br /><br />\r\nDung tích thùng nhiên liệu: 	68 lít<br /><br />\r\nThể tích khoang chứa đồ: 	360 lít<br /><br />\r\nDài * Rộng * Cao: 	4825 * 1820 * 1425 (mm)<br /><br />\r\nCông suất cực đại: 	n/a Mã lực/vph<br /><br />\r\nHộp số: 	Số tự động vô cấp CVT<br /><br />\r\nNhiên liệu: 	Xăng<br /><br />\r\nMomel xoắn cực đại: 	362/4800 Nm/vph<br /><br />\r\nTốc độ tối đa: 	n/a Km/h<br /><br />\r\nChiều cao gầm xe: 	N/A<br /><br />\r\nHệ thống treo trước: 	Độc lập<br /><br />\r\nHệ thống treo sau: 	Độc lập<br /><br />\r\nCỡ lốp /áp suất lốp (kg/cm2): 	P245/40R18<br /><br />\r\nLượng xăng tiêu thụ khi đi trong thành phố: 	8.7 lít/100km<br /><br />\r\nLượng xăng tiêu thụ khi đi trên xa lộ: 	7.8 lít/100km<br /><br />\r\nKiểu vỏ và mâm: 	n/a', '2010-12-07', 'LexusGS450h.jpg'),
('SP0009', 'BMW M6', 270000, '1', 'LSP0004', 'NCC0010', 'Xanh lam', '0', '1', '1', '0', 0, 'Động cơ: 5.0 lít V10<br />\r\nCông suất cực đại 507 HP<br />\r\nMô-men xoắn cực đại 520Nm<br />\r\nkhả năng tăng tốc từ 0 – 100 km/h: 4,7 giây<br />\r\nVận tốc tối đa: 340km/h<br />\r\nTốc độ vòng tua cực đại: 8.250 vòng/phút<br />\r\nSố tự động 7 cấp.', '2010-01-01', '2006_bmw_m6_cabriolet_01_m.jpg'),
('SP0010', 'Audi S6 5.2 Quattro', 99500, '0', 'LSP0003', 'NCC0009', 'Bạc', '1', '0', '1', '0', 0, 'Trọng lượng không tải: 	2035 kg<br />\r\nTrọng lượng toàn tải: 	N/A<br />\r\nDung tích động cơ: 	5200 cc<br />\r\nKiểu động cơ: 	5.2L V10 DOHC 40 van<br />\r\nDung tích thùng nhiên liệu: 	80 lít<br />\r\nThể tích khoang chứa đồ: 	546 lít<br />\r\nDài * Rộng * Cao: 	4938 * 1859 * 1442 (mm)<br />\r\nCông suất cực đại: 	435/6800 Mã lực/vph<br />\r\nHộp số: 	Số tự động 6 cấp<br />\r\nNhiên liệu: 	Xăng<br />\r\nMomel xoắn cực đại: 	540/3000 Nm/vph<br />\r\nTốc độ tối đa: 	250 Km/h<br />\r\nChiều cao gầm xe: 	N/A<br />\r\nHệ thống treo trước: 	Độc lập<br />\r\nHệ thống treo sau: 	Độc lập<br />\r\nCỡ lốp /áp suất lốp (kg/cm2): 	265/35R19<br />\r\nLượng xăng tiêu thụ khi đi trong thành phố: 	15.2 lít/100km<br />\r\nLượng xăng tiêu thụ khi đi trên xa lộ: 	10.4 lít/100km<br />\r\nKiểu vỏ và mâm: 	n/a', '2010-05-04', 'AudiS6Quatro.jpg'),
('SP0011', 'Lamborghini Murcielago RGT', 1230000, '1', 'LSP0001', 'NCC0001', 'Đen', '0', '1', '1', '0', 0, 'Chassis<br />\r\nBrakes F/R:	n.a.<br />\r\nTires F-R:	n.a.<br />\r\nDriveline:	Rear Wheel Drive<br />\r\n<br />\r\nEngine<br />\r\nType:	V12<br />\r\nDisplacement cu in (cc):	366 (6000)<br />\r\nPower bhp (kW) at RPM:	n.a.<br />\r\nTorque lb-ft (Nm) at RPM:	n.a.<br />\r\nRedline at RPM:	n.a.<br />\r\n<br />\r\nExterior<br />\r\nLength × Width × Height in:	n.a.<br />\r\nWeight lb (kg):	2425 (1100)<br />\r\n<br />\r\nPerformance<br />\r\nAcceleration 0-62 mph s:	n.a.<br />\r\nTop Speed mph (km/h):	n.a.<br />\r\nFuel Economy EPA city/highway mpg (l/100 km):', '2010-12-08', 'Lamborghini-Murcielago_RGT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
  `MaTV` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TenDN` varchar(50) NOT NULL,
  `Matkhau` varchar(50) NOT NULL,
  `Hoten` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Diachi` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Gioitinh` enum('Nam','Nữ') DEFAULT NULL,
  `Ngaysinh` date NOT NULL,
  `Quyen` varchar(10) NOT NULL,
  `NgayDK` date NOT NULL,
  PRIMARY KEY (`MaTV`),
  UNIQUE KEY `TenDN` (`TenDN`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`MaTV`, `TenDN`, `Matkhau`, `Hoten`, `Email`, `Diachi`, `Phone`, `Gioitinh`, `Ngaysinh`, `Quyen`, `NgayDK`) VALUES
(1, 'Admin', 'admin', 'Nguyễn Huy Văn', 'huyvan73@yahoo.com', 'Yên Viên - Gia Lâm - Hà Nội', '0989887386', 'Nam', '1986-03-07', '1', '2010-10-10'),
(9, 'huyvan', '8782251', 'Nguyễn Huy Văn', 'vannguyenhuy73@gmail.com', 'Hà Nội', '0909888888', 'Nam', '1985-10-17', '0', '2010-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE IF NOT EXISTS `tintuc` (
  `MaTT` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tieude` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tomtat` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Copyright` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngaytao` date NOT NULL,
  `MaLTT` int(10) unsigned NOT NULL,
  `Picture` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaTT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`MaTT`, `Tieude`, `Tomtat`, `Noidung`, `Copyright`, `Ngaytao`, `MaLTT`, `Picture`) VALUES
('TT0001', 'Toyota Corolla 2011 ra mắt tại Mỹ', 'Toyota vừa trình lành phiên bản nâng cấp của chiếc Corolla 2011 dành cho thị trường Bắc Mỹ nhân triển lãm Los Angeles.', '<br /><br />\r\nThay đổi ngoại thất so với phiên bản cũ bao gồm ba đơ xốc trước, lưới tản nhiệt mới, lưới cửa hút gió, đèn pha, nắp khoang hành lý, chỗ gắn biển số, đèn hậu kết hợp, ba đơ xóc sau và kính chiếu hậu. Corolla mới chỉ có một lựa chọn động cơ duy nhất là loại 4 xi lanh DOHC 1.8L với công nghệ Dual Variable Valve Timing (VVT-i), cho công suất 132hp và mô men xoắn 173Nm. Hộp số có hai loại bao gồm số sàn 5 cấp và số tự động 4 cấp. Corolla mới có mức tiêu thụ nhiên liệu chỉ 8,4L/100km trong thành phố và 6,72L/100km đường trường khi sử dụng hộp số sàn. Corolla 2011 có hai cấp trang bị là LE và S. <br />\r\nCả hai model đều có trang bị tiêu chuẩn hệ thống Star Safety System với điều khiển cân bằng và chống trượt. Corolla S trông thể thao hơn với mâm đúc 16”. Corolla mới sẽ có mặt trên thị trường Mỹ từ tháng 12/2010. ', 'vnexpress.net', '2010-11-20', 2, 'toyotaCorolla.jpg'),
('TT0002', 'Bất ngờ với hình ảnh của Infiniti G37 và người đẹp', '(thegioioto) Hãng xe xứ sở mặt trời mọc một lần nữa làm điên đảo ống kính của nhiếp ảnh gia với cuộc gặp gỡ bất ngờ của Infiniti và kiều nữ!', '', 'Thegioioto.com', '2010-11-22', 8, '1.jpg'),
('TT0003', 'Đã có giá Kia Optima 2011 Sedan', '(24h) - Hãng Kia vừa cho biết, những chiếc sedan tầm trung Kia Optima 2011 sẽ được chuyển tới các đại lý của họ trong tuần tới. Bên cạnh đó, hãng này cũng quyết định công bố mức giá chi tiết cho dòng sedan này với giá khởi điểm là 19.690 USD (đã bao gồm cả phí vận chuyển 695 USD).', 'Như vậy, những chiếc Kia <br /><br />\r\nOptima 2011 sẽ có giá ngang bằng với chiếc Sebring sedan của Chrysler mà đã được đổi tên thành 200 và có giá khởi điểm là 19.995 USD. Nhà sản xuất hy vọng cả 3 bản trim LX, EX và SX mới sẽ là ứng cử viên nặng ký trong phân khúc sedan cỡ trung.<br /><br /><br />\r\nĐã có giá Kia Optima 2011 Sedan, Ô tô - Xe máy, Co gia Kia Optima 2011 Sedan, cong bo gia Kia Optima 2011 Sedan, gia Kia Optima 2011 Sedan, Kia Optima 2011 Sedan, Kia, Optima 2011 Sedan, Optima EX, Optima LX, Optima SX<br /><br /><br />\r\nCông bố giá Kia Optima 2011 Sedan<br /><br /><br />\r\nVề sức mạnh, cũng giống như Hyunda Sonata, phiên bản mới Kia Optima 2011 có 3 lựa chọn động cơ Theta II phun nhiên liệu trực tiếp; động cơ 2.4 lít GDI 4 xi-lanh, cho công suất 200 mã lực, đi cùng hộp số tự động hoặc sàn 6 cấp, động cơ 2.0 lít twin-scroll turbo công suất 274 mã lực, kết hợp với hộp số tự động 6 cấp.<br /><br />\r\n<br />\r\nOptima Hybrid là phiên bản hybrid đầu tiên của Kia sử dụng kết hợp một động cơ xăng 2.4 lít Atkinson Cycle với một mô-tơ điện 30kW, cho công suất kết hợp đạt 209 mã lực tại 6.000 vòng/phút và mô-men xoắn 195 lb-ft.<br /><br />\r\n<br />\r\nĐể tránh nhầm lẫn, nhà sản xuất đã liệt kê chi phí vận chuyển là 695 USD và phí xử lý trong tất cả các giá được đề cập dưới đây. Mô hình 2.4 lít có sẵn ở hai bản LX và EX. Phiên bản LX sử dụng một hộp số tay sáu cấp có mức giá bán lẻ là 19.690 USD.<br /><br /><br />\r\nVề nội thất, so với phiên bản xe hiện tại, Optima 2011 có nội thất sang trọng hơn với những thiết bị tiêu chuẩn như sóng vệ tinh Sirius, kết nối MP3, hỗ trợ kết nối Wireless, Bluetooth và hệ thống UVO mới của Kia.<br /><br /><br />\r\nVề tính năng tiêu chuẩn bao gồm 6 túi khí, hệ thống âm thanh AM/FM/CD/MP3/Sat, cửa sổ khóa điện, hệ thống ống xả kép mạ crôm, giắc cắm USB, cổng kết nối âm thanh cho máy nghe nhạc MP3 và kết nối Bluetooth…<br /><br /><br />\r\nPhiên bản LX sử dụng hộp số tự đông 6 cấp sẽ có giá khởi điểm 21.190 USD, có bánh xe hợp kim, hệ thống kiểm soát hành trình và hệ thống tiết kiệm nhiên liệu.<br /><br /><br />\r\nTiếp đến là phiên bản Optima EX cũng được trang bị động cơ 2.4 lít với mức giá khởi điểm 23.190 USD. Ngoài các tính năng tiêu chuẩn ra, phiên bản Optima EX còn bao gồm bánh xe hợp kim 17 inch, đèn sương mù, ghế da trang trí chỗ ngồi, hệ thống điều chỉnh ghế, camera chiếu hậu, khởi động bằng nút bấm với chìa khóa thông minh, hệ thống điều hòa không khí tự động 2 vùng, vô lăng và cần số bọc da, gương chiếu hậu tự mờ tích hợp Homelink và la bàn, bộ điều chỉnh ánh sáng tự động, cửa và ghế người lái chạy bằng điện, hộc đựng đồ chiếu sáng bên trong, thảm trải sàn và nắm cửa bằng chrome.<br /><br /><br />\r\nPhiên bản Optima EX cũng có sẵn với động cơ 2.0 lít với giá khởi điểm 25.190 USD. Với phiên bản này, khách hàng sẽ được sở hữu hệ thống phanh đĩa phía trước lớn hơn, lưới tản nhiệt độc đáo, nội thất bọc gỗ và kim loại.<br /><br /><br />\r\nCuối cũng là mô hình hàng đầu trong dòng Optima chính là phiên bản SX trang bị động cơ 2.0 lít với giá khởi điểm 26.690 USD. Ngoài những tính năng của bản tiêu chuẩn, SX còn được trang bị bánh xe hợp kim 18 inch, bộ ghế bọc da màu đen cùng tông với trim nội thất, bảng đồng hồ Supervision, màn hình LCD, bảng điều khiển trung tâm, cần gạt số trên vô lăng, bàn đạp và ốp bảo vệ cửa bằng kim loại.', '24h.com', '2010-11-22', 2, 'oto-2011-Kia-Optima-1.jpg'),
('TT0004', 'Phép mầu của hệ thống treo chủ động', 'Một trong những yếu tố tăng độ tự tin cho người ngồi sau vô-lăng là sự cân bằng và chắc chắn của hệ thống treo khi xe vào cua. Giờ đây, hệ thống treo chủ động thế hệ mới đã can thiệp và hiệu quả đạt được thật khó tin.', 'Dường như từ trước đến nay mọi người đều cho rằng một hệ thống treo đích thực chỉ hoạt động tốt trong khuôn khổ thông thường đã được được nhà chế tạo định sẵn. Bất kì ý định nào can thiệp vào chuyển động của nó sẽ làm sai lệch sự vận hành của hệ thống. Nếu như bạn từng lái chiếc xe Lancia Thema 8.32 với hệ thống treo chủ động và trải nghiệm sự ì ạch của nó thì bạn lại càng đồng tình với ‎ý kiến này.<br />\r\n<br />\r\nMặt khác, cũng có thể bạn ủng hộ quan điểm rằng công nghệ mới sẽ từng bước cải tiến hệ thống treo, để có thể đáp ứng một cách chính xác với điều kiện vận hành vào từng thời điểm nhất định. Thực chất thì các hệ thống treo đã được cải tiến phần nào từ khi Thema ra đời và đến nay đã có những bước tiến vượt bậc, thậm chí nó có thể làm hài lòng những lái xe khó tính nhất. Đơn cử như trường hợp của chiếc xe Jaguar XFR. Ngay khi chuyển sang chế độ Sport, và điều đầu tiên mà bạn có thể cảm nhận được là hệ thống treo chủ động Bilsteins tạo cảm giác rất cứng, dấu hiệu cho thấy nó đã phản hồi với lựa chọn của bạn. Rồi sau đó, nó tự động nhún xuống chút xíu, và điều đó có nghĩa là nó đã hoạt động chuẩn xác.<br />\r\n<br />\r\nTuy nhiên, cho dù những hệ thống giảm xóc này có thích ứng với điều kiện vận hành tốt tới mức nào đi chăng nữa thì nó vẫn thể hiện tính bị động. Nguyên nhân là do nó luôn phải chờ đợi cho đến khi có chướng ngại xảy ra (như ổ gà, những chỗ lồi lõm…) rồi mới phản ứng. Nên chăng hệ thống treo này, bằng một cách nào đó, cần chủ động và định liệu được những gì sẽ xảy ra phía trước để giữ cho xe được cân bằng?<br />\r\n<br />\r\nCác nhà chế tạo xe cũng như những kỹ sư chuyên về hệ thống treo đã phải thử nghiệm trong rất nhiều năm với ý tưởng này. Nhưng để chiếc xe tự nhận biết được những gì phía trước trên bề mặt phần đường mà nó chuẩn bị lăn bánh tới là điều không hề đơn giản chút nào. Theo quan điểm của hãng Mercedez-Benz, nếu không dùng hệ thống cảm biến để quét mặt đường phía trước thì việc này không thể thực hiển nổi. Tuy nhiên, kiểm soát chuyển động xoay tròn và rung lắc ở các mạn sườn do các thanh chống vặn xe tạo ra lại là một vấn đề khác, bởi những lực này được sinh ra từ xung lực bên trong xe.<br />\r\n<br />\r\nChúng ta đã được kiểm chứng điều này trên nhiều chiếc xe Land Rover và BMW, khi thanh chống vặn được tách làm đôi và các mô-tơ phụ truyền lực cần thiết tới hai phần của thanh chống vặn để định vị các bánh xe ở vị trí thích hợp, giúp thân xe được cân bằng. Chúng ta cũng đã thấy điều này trên hệ thống treo của chiếc Citroen Xantia Activa với các thanh chống vặn được thay thế bởi những búa thủy lực điện tử có thể tùy biến độ dài để có được kết quả tương tự. Tuy nhiên, những hệ thống này khá đơn giản, phản ứng chậm với lực đẩy tương đương nhau cho cả trước và sau xe.<br />\r\n<br />\r\nGiờ đây hãng BWI – cung cấp các hệ thống kiểm soát chống vặn xe cho Land Rover – đã phát triển một phiên bản thông minh hơn. Phiên bản này có hai kênh thông tin để tách biệt các chức năng phía trước và phía sau tạo ra những khả năng kì diệu để tạo sự cân bằng cho xe khi đang vận hành. Ý tưởng ở đây là khi ở tốc độ thấp thì thanh phía sau được cài đặt với độ cứng lớn hơn so với thanh phía trước, nhờ đó mà tăng truyền trọng lượng ra bánh sau giúp cho xe vững hơn, từ đó cải thiện sự cân bằng khi tăng tốc.<br />\r\n<br />\r\nSự cân bằng này có thể thích ứng nhanh chóng để chế áp rung chấn bất chợt do thừa hay thiếu lái, trì hoãn việc kích hoạt của các hệ thống ổn định khác và khi đặt ở chế độ Sport thì độ cứng của thanh chống lật phía sau được tăng cường. Khi vào cua với lực quán tính ly tâm khoảng trên 0,6G, hệ thống này kiểm soát để tăng lực của thanh chống vặn xe, nếu không người lái sẽ không thể cảm nhận được chiếc xe đang làm gì – vấn đề mắc phải trước đây của Xantia Activa. Khi không có thông tin của các cảm biến, các bộ phận cấu thành của hệ thống chống vặn lại trở về trạng thái hoạt động tự do, giúp cho hệ thống treo trở nên mềm và êm ái bình thường.<br />\r\n<br />\r\nTheo ý kiến của một số chuyên gia, sản phẩm này không chỉ dành riêng cho dòng xe SUV mà còn thích hợp với các loại xe thông thường. Hệ thống này cũng có thể đóng vai trò như một hệ thống kiểm soát độ bám. Sản phẩm công nghệ cao chủ chốt khác của BWI là hệ thống giảm xóc MagneRide (từng là thương hiệu của Delphi) được các hãng Ferrari, Audi và nhiều nhà sản xuất ôtô khác của Mỹ sử dụng. Kỹ sư trưởng Oliver Raynauld khẳng định rằng, hệ thống này phát huy công năng tốt nhất khi chính BWI giúp nhà sản xuất xe kiểm soát việc căn chỉnh. Raynauld cho biết: “Việc lắp đặt và căn chỉnh hệ thống trên Ferrari California không tốt, nhưng trên 458 Italia thì được thực hiện rất tốt do chúng tôi có mặt ở đó. Audi R8 cũng là một trường hợp như vậy”.<br />\r\n<br />\r\nHệ thống MagneRide hoạt động thế nào?<br />\r\n<br />\r\nMagneRide hoạt động bằng cách thay đổi dòng điện trong một cuộn điện chạy xung quanh thân giảm xóc. Điện trường thay đổi làm thay đổi trạng thái lỏng của dầu giảm xóc khiến cho những phân tử có thể nhiễm từ co lại hoặc không. Phần cứng được thiết kể đơn giản nhưng dòng từ xoáy trong cuộn điện có thể tạo ra phản ứng trì hoãn việc kích hoạt các hệ thống ổn định khác 20-30 lần trong một giây. Hiện tại, đã có một phiên bản mới với hai cuộn điện lắp ngược chiều nhau để loại bỏ những dòng điện từ xoáy cho một giảm xóc.<br />\r\n<br />\r\nVới cải tiến đó, hệ thống có thể phản ứng nhanh và chính xác, để có thể triệt tiêu những giao động rung lắc mạnh của một bánh xe. Điều này khiến cho nó trở thành trang bị lý tưởng đối với những chiếc xe SUV cồng kềnh. Và khi MagneRide cùng hệ thống kiểm soát chống vặn xe hiện đại phối hợp với nhau, chúng sẽ cho phép chiếc Range Rover Sport có thể vào cua với một lực quán tính ly tâm lên tới khoảng 1G.', 'autonet.com.vn', '2010-11-25', 6, '01.jpg'),
('TT0005', 'Xe hơi và người đẹp Đông, Tây', 'Sự bốc lửa, phóng khoáng là nét đặc trưng của người mẫu phương Tây khi đứng cạnh những chiếc xe. Trong khi đó, người đẹp phương Đông lại xuất hiện bằng vẻ thiết tha, thùy mị nhưng ẩn chứa sức sống mãnh liệt. Đó dường như là hai mặt đối lập của vấn đề "cái đẹp".', '', 'vnexpress.net', '2010-12-07', 8, '5_1_150_100.jpg'),
('TT0006', 'Hyundai Azera 2012 lộ diện', 'Mẫu sedan thế hệ mới của hãng xe Hàn Quốc xuất hiện với những hình ảnh đầu tiên. Nằm giữa hai dòng Sonata và Genesis sedan, Azera mang ngôn ngữ thiết kế "điêu khắc dòng chảy" và chỉ sử dụng động cơ V6.', 'Hyundai từng giới thiệu một số ảnh dựng trên máy tính, nhằm hâm nóng sự quan tâm của người hâm mộ, trước khi chịu tung ra hình ảnh thực của Azera thế hệ mới. Azera 2012 có ngoại hình khá cuốn hút. Lưới tản nhiệt rộng với 4 thanh ngang, cụm đèn pha kéo dài, hốc hút gió góc cạnh với đèn sương mù, hai đường gân nổi khỏe khoắn trên nắp ca-pô.<br />\r\n<br />\r\nTuy nhiên, Hyundai vẫn chưa chịu cho biết thông tin cụ thể về mẫu sedan này. Chỉ một số chi tiết nhỏ từng được hé lộ trong lần trả lời phỏng vấn của John Krafcik, Giám đốc điều hành Hyundai Bắc Mỹ với tờ Autonews: "Chúng tôi đã thay đổi mọi thứ. Azera là xe dẫn động cầu trước, ngược lại với Genesis dẫn động cầu sau. Vì thế Azera rất thích hợp với những nơi có tuyết. Nó sẽ khiến nhiều người ngạc nhiên". Theo tờ Autoevolution, Azera thế hệ mới dự kiến chỉ trang bị động cơ V6, với gói trang thiết bị hoàn toàn khác biệt so với Sonata, mẫu sedan hạng trung với tùy chọn động cơ 4 xi-lanh.', 'vnexpress.net', '2010-11-25', 2, 'hyundai-azera-1.jpg'),
('TT0007', 'Khuyến mãi đặc biệt dành cho Ford Everest', 'Ford Everest dành khuyến mại cực lớn cho khách hàng với giá xe ưu đãi và tặng 100% bảo hiểm vật chất của công ty bảo hiểm dầu khí Việt Nam (PVI)', '', 'ford.com.vn', '2010-11-25', 7, 'fordEveretKM.jpg'),
('TT0008', 'Mẫu xe thứ hai của Renault tới Hà Nội', 'Ngày 23/11, mẫu sedan (xe du lịch) hạng trung Renault Fluence đã chính thức xuất hiện tại Hà Nội với giá bán gần 1 tỷ đồng. Đây là mẫu xe thứ hai và là mẫu sedan đầu tiên của Renault được nhập khẩu và phân phối chính hãng tại Việt Nam.', '', 'vnmedia.vn', '2010-11-25', 3, '4667.gif.jpg'),
('TT0009', 'Người đẹp xế hộp chân dài miên man', 'Với đôi chân dài và thân hình gợi cảm, các cô gái đẹp tỏa sắc trong những triển lãm xe hơi.', '', 'Ngoisao.net', '2010-11-25', 8, '4524.gif.jpg'),
('TT0010', 'Trái chiều ôtô nhập khẩu', 'Đã có 4.600 ôtô nguyên chiếc nhập khẩu trong tháng 10/2010, đạt giá trị kim ngạch 80 triệu USD', 'Báo cáo từ Tổng cục Thống kê cho biết, đã có 4.600 ôtô nguyên chiếc nhập khẩu trong tháng 10/2010, đạt giá trị kim ngạch 80 triệu USD.<br />\r\n<br />\r\nSo với tháng 9, kim ngạch nhập khẩu ôtô nguyên chiếc tháng 10 đã giảm 400 chiếc về lượng và 15 triệu USD về giá trị.<br />\r\n<br />\r\nCũng theo Tổng cục Thống kê, cộng dồn 10 tháng đầu năm, tổng kim ngạch nhập khẩu ôtô nguyên chiếc đã đạt 41.600 chiếc về lượng và 764 triệu USD về giá trị.<br />\r\n<br />\r\nƯớc tính trong tháng 11 sẽ có khoảng 4.000 ôtô nguyên chiếc được nhập khẩu về nước, đạt giá trị kim ngạch khoảng 72 triệu USD.<br />\r\n<br />\r\nNếu con số ước tính này sát với con số thực hiện sau khi đã có thống kê đầy đủ, kim ngạch nhập khẩu ôtô nguyên chiếc tháng 11 sẽ giảm mạnh cả về lượng lẫn giá trị so với tháng 10.<br />\r\n<br />\r\nCộng dồn 11 tháng đầu năm, kim ngạch nhập khẩu ôtô nguyên chiếc ước đạt khoảng 46.000 chiếc về lượng và 836 triệu USD về giá trị.<br />\r\n<br />\r\nNhư vậy, lượng ôtô nguyên chiếc nhập khẩu trong tháng 10 và có thể là cả tháng 11 đã đi trái với “thông lệ” hằng năm là trong các tháng quý 4 thường tăng khá mạnh so với các tháng trước đó.<br />\r\n<br />\r\nThậm chí nếu so với cùng kỳ năm trước, kim ngạch nhập khẩu ôtô nguyên chiếc tháng 10 và 11 còn sụt giảm ở mức rất mạnh.<br />\r\n<br />\r\nCụ thể, nếu tạm coi con số ước tính của tháng 11 là con số thực hiện, kim ngạch nhập khẩu ôtô nguyên chiếc tháng 11/2010 chưa bằng một nửa so với cùng kỳ năm trước. Tháng 11/2009, lượng ôtô nguyên chiếc nhập khẩu đạt đến 11.500 chiếc (cao hơn 7.500 chiếc) trong khi giá trị kim ngạch đạt 159 triệu USD (cao hơn 87 triệu USD).<br />\r\n<br />\r\nCòn so 11 tháng đầu năm, kim ngạch 2010 cũng giảm đến 34,2% về lượng và 22,4% về giá trị so với cùng kỳ 2009.<br />\r\n<br />\r\nMặc dù kim ngạch nhập khẩu ôtô nguyên chiếc 2 tháng đầu quý 4 giảm mạnh so với cả cùng kỳ năm trước lẫn các tháng liền trước song cũng đã không nằm ngoài dự báo của nhiều người.<br />\r\n<br />\r\nGiới phân tích cho rằng, với chính sách hạn chế nhập siêu và đặc biệt là trong bối cảnh giá USD tăng mạnh trong thời gian qua, việc thị trường ôtô “ngoại” ảm đạm tương ứng với kim ngạch nhập khẩu giảm là điều khó tránh khỏi. Và nếu thị trường ngoại hối chưa thể “hạ nhiệt” thì tháng cuối năm, thậm chí cả tháng 1/2011 (giáp Tết nguyên đán), kim ngạch nhập khẩu ôtô nguyên chiếc sẽ còn tiếp tục giảm sâu cho dù nhu cầu mua sắm của người dân có tăng lên.', 'vneconomy.vn', '2010-11-25', 3, '4671.gif.jpg'),
('TT0011', 'Ford mở thêm 40 đại lý bán xe tại Trung Quốc', 'Hôm thứ 4 vừa qua, Ford đã chính thức khai trương 40 đại lý bán xe mới tại Trung Quốc- thị trường ô tô sôi động và tiềm năng bậc nhất thế giới hiện nay, nâng tổng số đại lý lên con số 340.', '', 'thegioioto.com.vn', '2010-11-25', 3, 'Untitled-1 copymh.jpg'),
('TT0012', 'Nguyên nhân xe bị lắc', '(thegioioto) Lắc, rung và kêu cọt kẹt thường là vấn đề của những chiếc xe cũ. Tuy nhiên, không phải xe mới không mắc phải những vấn đề này. Phát hiện nguyên nhân để khắc phục là cách bạn tiết kiệm tiền bạc và thời gian.', 'Phổ biến nhất là lốp mòn không đồng đều nguyên nhân khiến xe bị rung lắc khi di chuyển.<br />\r\n<br />\r\nMột trong những nguyên nhân chính khiến xe lắc đến từ bộ lốp. Dù công nghệ sản xuất ngày nay đã tiến bộ hơn nhiều nhưng lốp vẫn cần phải tiến hành chỉnh cân bằng động.<br />\r\n<br />\r\nĐể đảm bảo cần bằng, thợ sửa xe đặt những mảnh kim loại đối diện với "điểm nặng", tức có phân bố trọng lượng cao hơn mức trung bình trên lốp. Nếu không tiến hành xử lý những điểm bất đối xứng như thế này, lốp sẽ mòn nhanh hơn. Đồng thời hệ thống lái và treo cũng bị ảnh hưởng.<br />\r\nNếu "điểm nặng" nằm giữa lốp thì khi xuống dốc, tài xế có thể thấy xe nảy lên. Trong trường hợp điểm nặng ở hai bên mặt, lốp được xếp vào loại mất cân bằng động.<br />\r\n<br />\r\nĐiều này khiến xe lắc khi chạy. Vì thế, bạn phải nhờ thợ kỹ thuật đo độ lệch và gắn thêm miếng kim loại để tạo câng bằng.<br />\r\n<br />\r\nHệ thống treo hiện đại ngày càng nhẹ hơn nên tài xế cảm nhận tốt điều kiện mặt đường. Tuy nhiên, chúng lại có nhược điểm là dễ truyền những rung động từ lốp xe tới ca-bin. Dấu hiệu xe mất cân bằng xuất hiện khi vận tốc đạt trên 50 km/h và bắt đầu rõ ở 80 km/h.<br />\r\n<br />\r\nNếu hiện tượng rung xuất phát từ tay lái thì bạn nên kiểm tra lốp trước. Trong trường hợp chúng xuất phát từ ghế, hãy kiểm tra lốp sau.<br />\r\n<br />\r\nDây đai phía dưới ta-lông lốp bị hỏng cũng khiến xe rung nhưng chỉ xuất hiện ở tốc độ thấp, 30-50 km/h. Khi đi nhanh xe không còn rung nữa. Giải pháp cho sự cố kiểu này chỉ là thay lốp mới.<br />\r\n<br />\r\nSự biến đổi lực xuyên tâm ở lốp là nguyên nhân khó xác định nhất. Loại lốp tốt có độ cứng đồng đều ở hai bên thành. Tuy nhiên, có những sản phẩm mà độ cứng không đều, gây ra rung khi di chuyển.<br />\r\n<br />\r\nMột số garage có máy đo độ cứng nhưng giá khá đắt nên không được phổ biến. Trong khi đó, giải pháp duy nhất là thay lốp mới có chất lượng đảm bảo hơn.<br />\r\n<br />\r\nNhững nguyên nhân khác<br />\r\n<br />\r\nVành bị cong hay trục hỏng cũng khiến xe bị rung, lắc. Các hãng xe khuyến cáo mức độ cong không được quá 0,8 mm và vành hợp kim sắt có thể kéo lại. Nhưng với vành đúc họp kim nhôm, bạn bắt buộc phải thay mới.<br />\r\n<br />\r\nNếu xe bị rung khi phanh, thì đó là dấu hiệu tang trống bị hay má phanh bị biến dạng.<br />\r\n<br />\r\nKhớp nối các-đăng bị mòn hay mất trên hệ dẫn động cầu sau cũng khiến xe rung. Nếu tiếp tục sử dụng khớp nối bị mòn, có thể ảnh hưởng tới hộp số hoặc vi sai.<br />\r\n<br />\r\nKhớp nối trục trước của hệ dẫn động cầu trước cũng có thể bị mòn và tạo rung. Nếu quá trình chuyển số ở hộp số tự động phát ra tiếng kêu "keng" thì nguyên nhân có thể do các khớp nối trục trước bị mòn. Ngoài ra còn dấu hiệu khác là tiếng gõ nhẹ khi rẽ.', 'vnexpress.net', '2010-12-03', 10, 'Tuvan1.jpg'),
('TT0013', 'Kinh nghiệm kéo dài tuổi thọ xe', 'Kinh nghiệm chia sẻ từ “người thật, việc thật” thường có tính tin cậy cao. ', 'Ông Irv Gordon, người từng lập kỷ lục thế giới về quãng đường sử dụng một chiếc xe dài nhất, đã chia sẻ những bí quyết cơ bản giúp tăng độ bền cho ô tô.<br />\r\n<br />\r\n <br />\r\nChiếc Volvo P1800 đời 1966 màu đỏ anh đào của ông Irv Gordon hiện vẫn còn dùng được dù đã chạy hơn 4,5 triệu km (2,8 triệu dặm).<br />\r\nÔng Gordon, năm nay đã 70 tuổi, từng là một giáo viên nhưng đã nghỉ hưu từ cách đây hơn 10 năm. Người vợ đã qua đời, giờ đây cuộc sống của ông là những chuyến đi. Mong muốn của ông là giữ cho chiếc xe tiếp tục đồng hành với mình lập mốc 3 triệu dặm (hơn 4,8 triệu km) vào năm ông 73 tuổi.<br />\r\n<br />\r\n <br />\r\n<br />\r\nÔng Gordon mua chiếc Volvo P1800 đời 1966 mới 100% với giá 4.150 USD - gần bằng số tiền lương dạy học cả năm của ông. “Tôi chưa bao giờ đặt ra mục tiêu lái xe hàng triệu dặm, nhưng tôi yêu chiếc xe, đến nay vẫn vậy, và tôi thích lái nó. Vậy thì có lý do gì để từ bỏ?” - ông Gordon nói.<br />\r\n<br />\r\n <br />\r\n<br />\r\nKhi được hỏi về bí quyết giữ xe bền như vậy, ông cho biết “Chẳng có công thức bí mật gì để một chiếc xe chạy bền như vậy. Những kiến thức thông thường thôi. Đọc quyển hướng dẫn sử dụng, và làm đúng theo những gì trong đó nói. Nó do những người có kinh nghiệm và hiểu biết soạn ra.”<br />\r\n<br />\r\n <br />\r\n<br />\r\nÔng Gordon chưa bao giờ để quá hạn thay dầu hay các chất lỏng khác, quên đảo lốp, dầu nhờn... tất cả đều theo cuốn hướng dẫn sử dụng. Khi dừng xe để bơm xăng, ông không quên kiểm tra mức chất lỏng, áp suất lốp.<br />\r\n<br />\r\n <br />\r\n<br />\r\nÔng Gordon không dùng dầu tổng hợp, mà chỉ dùng các sản phẩm có nguồn gốc từ dầu mỏ.<br />\r\n<br />\r\n <br />\r\n<br />\r\nChiếc Volvo của ông thuộc loại “thô sơ” - không điều hoà, không vô lăng trợ lực, không phanh điện, không cửa sổ điện, dùng hộp số sàn và một động cơ đơn giản. Chiếc xe không có nhiều trang bị hiện đại và phức tạp nên cũng không có nhiều thứ để hỏng. Hỏng hóc của xe có thể sửa dễ dàng, theo ông Gordon.<br />\r\n<br />\r\n <br />\r\n<br />\r\nNói như vậy không có nghĩa là những công nghệ hiện đại trên xe tân kỳ là không cần thiết và phiền phức. Công nghệ hiện đại đem lại nhiều tiện ích, ví dụ như ngày nay một chiếc bugi có thể dễ dàng đồng hành cùng xe trên quãng đường 150.000km, trong khi ông Gordon phải mang hẳn một hộp bugi dự phòng theo xe. Tuy nhiên, cũng không thể phủ nhận rằng tính phức tạp của ô tô hiện đại cũng chính là nhược điểm.<br />\r\n<b>Bí quyết kéo dài tuổi thọ xe</b><br />\r\n<br />\r\nNăm 1998, Kỷ lục thế giới Guinness đã công bố chiếc Volvo P1800 đời 1966 của ông Irv Gordon là xe chạy quãng đường dài nhất với một người chủ bình thường (không làm dịch vụ vận tải) - 1,69 triệu dặm (hơn 2,7 triệu km).<br />\r\n<br />\r\n <br />\r\n<br />\r\nÔng Gordon đã chia sẻ một số kinh nghiệm cơ bản để giữ độ bền cho xe:<br />\r\n<br />\r\n <br />\r\n<br />\r\n1. Dùng chiếc xe mà bạn yêu thích. “Nếu bạn không thích chiếc xe, bạn sẽ không bao giờ muốn đi xa với nó,” ông Gordon giải thích.<br />\r\n<br />\r\n <br />\r\n<br />\r\n2. Thay dầu và lọc dầu thường xuyên. “Nếu có hình thức bảo dưỡng nào giúp kéo dài tuổi thọ động cơ xe, thì chính là nó.”<br />\r\n<br />\r\n <br />\r\n3. Dùng phụ tùng chính hãng. “Hãy dùng đồ chính hãng. Tôi tin vào việc giữ cho chiếc Volvo của tôi luôn là một chiếc Volvo đúng nghĩa.”<br />\r\n4. Chỉ dùng dầu của một hãng. “Việc dùng dầu của một hãng đảm bảo sự đồng nhất về chất lượng.”<br />\r\n<br />\r\n <br />\r\n<br />\r\n5. Dành ra vài phút mỗi tuần để kiểm tra dưới nắp ca-pô. Không cần nhiều kiến thức kỹ thuật xe hơi để biết các mức chất lỏng thế nào là thấp, hay phát hiện các dây đai và ống cao su có dấu hiệu hỏng. “Cũng đừng quên kiểm tra xem các đầu cực ắc quy còn chặt không, có nguy cơ bị ăn mòn không.”<br />\r\n<br />\r\n <br />\r\n<br />\r\n6. Rửa xe thường xuyên. Cần rửa kỹ cả gầm xe. Một chiếc xe sạch sẽ cho bạn cơ hội phát hiện các vết xước nhỏ dễ hơn để sớm khắc phục.<br />\r\n<br />\r\n <br />\r\n<br />\r\n7. Đánh sáp ít nhất 2 lần/năm. “Việc đánh sáp (waxing) không chỉ giúp xe bạn trông bóng bẩy hơn, mà còn giúp tạo lớp bảo vệ lớp sơn xe khỏi quá trình ôxy hoá và han gỉ,” ông Gordon giải thích.<br />\r\n<br />\r\n <br />\r\n<br />\r\n8. Xây dựng mối quan hệ tốt với xưởng dịch vụ và thợ sửa xe. “Nếu biết bạn là một khách hàng nghiêm túc và thường xuyên, họ sẽ cho bạn những lời khuyên và sự giúp đỡ hữu ích khi cần thiết.”<br />\r\n<br />\r\n <br />\r\n<br />\r\n9. Mua xăng ở trạm đông khách. “Nếu không đông khách, trạm có thể phải lưu trữ xăng trong thời gian dài.”<br />\r\n<br />\r\n <br />\r\n<br />\r\n10. Khi xe bạn có tiếng kêu lạ, hãy chú ý. “Đừng bật đài để át đi tiếng kêu khó chịu từ xe. Nếu tiếng kêu là dấu hiệu có sự hỏng hóc, hãy sớm mang xe đi kiểm tra.”', 'dantri.com.vn', '2010-12-03', 10, 'Knghiem1.jpg'),
('TT0014', 'Ferrari triệu hồi siêu xe 458 Italia', 'Khoảng 1.200 chiếc 458 Italia trên toàn thế giới sẽ được mời tới đại lý Ferrari để kiểm tra và thay thế chất dính mà trong một số trường hợp có thể nóng chảy và gây cháy. ', 'Quyết định được đưa ra sau khi có tới 4 chiếc 458 Italia cháy ở Mỹ, Thụy Sĩ, Trung Quốc và Pháp. <br /><br />\r\nFerrari cho biết sẽ thông báo để chủ nhân của 1.248 chiếc 458 Italia, sản xuất trước tháng 7/2010, tới đại lý để kiểm tra và khắc phục sự cố. Giá khởi điểm của siêu xe này là 253.000 USD.<br /><br />\r\n<br /><br />\r\nTại Việt Nam, 458 Italia cũng đang được giới chơi xe ưa chuộng và 2 chiếc đã cập cảng. Một ở Sài Gòn và một tại Hà Nội.<br /><br />\r\n<br /><br />\r\n458 Italia trình làng tháng 7/2009 để thay thế chiếc F430. Ferrari hãnh diện tuyên bố siêu xe mới là tổng hòa của phong cách, sự sáng tạo tinh tế, niềm đam mê và công nghệ hàng đầu.<br /><br />\r\n<br /><br />\r\nĐiểm đầu tiên hãng siêu xe Italy nhấn mạnh là kỹ thuật tăng lực ép xuống với những chi tiết độc, như hốc gió cũng có cánh gió. Theo tính toán, khi đi với vận tốc 200 km/h, lực ép xuống mặt đường của 458 Italia là 140 kg.', 'vnexpress.net', '2010-12-04', 2, 'ferrariChay.jpg'),
('TT0015', 'Một số lưu ý khi mua xe mới', 'ới hầu hết mọi người, mua ô tô là một quyết định tài chính lớn, chỉ sau mua nhà, nên cần cân nhắc kỹ lưỡng mọi mặt để tránh hối tiếc về sau.', 'Sau khi đã xác định được loại xe phù hợp nhất với nhu cầu và khả năng tài chính, bạn sẽ quan tâm tới màu sắc, và cuối cùng là đi vào chi tiết.<br />\r\nĐể không bị rối và bỏ sót những yếu tố quan trọng khi đi mua xe mới, hãy tham khảo danh sách sau:<br />\r\n <br />\r\nTrang bị tiêu chuẩn<br />\r\n<br />\r\nTất cả các chuyên gia đều nhất trí rằng trước khi bước vào đại lý, bạn nên lập một danh sách những trang bị mà bạn kỳ vọng chiếc xe định mua sẽ có, như ghế da, cửa sổ trời.... Kế đến, hãy tìm chiếc xe được trang bị tiêu chuẩn nhiều thứ trong danh sách của bạn.<br />\r\n<br />\r\nNhưng trang bị tiêu chuẩn được xem như thiết yếu hiện nay gồm: hệ thống chống bó cứng phanh (ABS), hệ thống ổn định thân xe điện tử (ESC), túi khí trước và bên, điều hoà nhiệt độ, công nghệ Bluetooth, dàn âm thanh kết nối iPod, cửa sổ và khoá cửa ra vào điều khiển điện.<br />\r\n<br />\r\nTuy nhiên, bạn cũng cần lưu ý rằng không phải cứ có đủ những trang thiết bị trên là có thể yên tâm. Hãy xem xét cả yếu tố chất lượng của chúng. Ví dụ, hệ thống điều khiển dàn âm thanh nếu làm bằng nhựa mỏng thì sẽ mau hỏng vì đây là bộ phận có thể bạn sẽ dùng hàng ngày.<br />\r\nTrang bị tuỳ chọn<br />\r\n<br />\r\nSẽ khó có mẫu xe nào có đủ những trang bị mà bạn mong muốn dưới dạng tiêu chuẩn. Nếu muốn có đủ, bạn phải chi thêm tiền cho trang bị tuỳ chọn. Đến khâu này, bạn nên tỉnh táo, vì nếu sa đà thì tổng số tiền mua xe có thể đội lên rất nhiều.<br />\r\n<br />\r\nThông thường, việc chi thêm tiền cho những trang bị tuỳ chọn là cách kinh tế nhất để chiếc xe có đủ tính năng bạn mong muốn (thay vì chọn dòng xe cao cấp hơn, với những trang bị tiêu chuẩn đầy đủ hơn). Tuy nhiên, vấn đề là nhiều gói chỉ có 1-2 trang bị bạn cần, đi kèm nhiều trang bị bạn không cần. Ví dụ, bạn muốn xe phải xe cửa nóc, và nhân viên bán hàng gợi ý bạn chọn gói Open Air Package giá 1.500 USD, trong khi tất cả những gì bạn cần trong gói đó chỉ là cửa nóc. Một chiếc cửa nóc có giá chỉ khoảng 900 USD. Nếu rơi vào những trường hợp như thế này, bạn nên chọn mọt trang bị tuỳ chọn, thay vì cả gói.<br />\r\n<br />\r\nNhưng không phải trong trường hợp nào, mua lẻ từng trang bị tuỳ chọn cũng có lợi. Do đó, hãy thử làm vài phép tính, nếu cộng các tuỳ chọn mua lẻ vào mà giá cao hơn một gói thì tất nhiên là bạn nên mua cả gói dù có thừa ra vài trang bị không thật cần thiết.<br />\r\nKhả năng giữ giá của xe<br />\r\n<br />\r\nKhi đi mua xe mới, ít người đặt nặng việc tính toán giá trị xe sau vài năm sử dụng. Tuy nhiên, đây là yêu tố đáng để cân nhắc, vì gần như chắc chắn là bạn sẽ không giữ chiếc xe lại mãi mãi. Lựa chọn của bạn bây giờ có thể ảnh hưởng tới giá trị xe khi bạn cần bán.<br />\r\n<br />\r\nTổt nhất bạn nên tính toán giá trị tương đối sau 5 năm nữa của chiếc xe bạn định mua bây giờ bằng các công cụ trực tuyến như Kelley Blue Book. Đây hiện là một trong những nguồn đáng tin cậy nhất trong việc định giá xe mới và cũ của người tiêu dùng Mỹ. Tất nhiên, mỗi thị trường còn có những yếu tố khác nhau, như thị hiếu, nhưng đây có thể là một căn cứ.<br />\r\n<br />\r\nBạn cũng nên lưu ý rằng những chiếc xe có tính “xanh”, như động cơ hybrid và một số công nghệ tiết kiệm năng lượng, có thể giúp xe bạn giữ giá hơn sau vài năm sử dụng. Tuy nhiên, xe ứng dụng công nghệ “xanh” lại thường có giá bán và chi phí bảo dưỡng cao hơn các xe truyền thống. Vì vậy, bạn cần có những tính toán cụ thể để đưa ra quyết định sáng suốt.<br />\r\nBạn có thể yêu xe?<br />\r\n<br />\r\nĐừng nghĩ điều này không quan trọng. Bạn nên chọn chiếc xe có thể đem đến cho bạn cảm giác hứng thú khi ngồi sau vô-lăng. Đừng để bản thân lâm vào tình cảnh lái xe đơn thuần như một phương tiện di chuyển phải có để phục vụ cuộc sống và “cau có” mỗi lần phải rút hầu bao chi tiền cho xe. Hãy để chiếc xe là người bạn đồng hành, là thứ khiến cuộc sống của bạn trở nên dễ chịu hơn, khiến bạn thấy hào hứng mỗi ngày cuối tuần với những kế hoạch đi chơi, dã ngoại cùng gia đình, bạn bè.<br />\r\n<br />\r\nĐây là yếu tố được nhiều người đặc biệt quan tâm khi đi mua xe mới. Nhưng đừng bỏ qua một chiếc xe mình đã rất ưng sau khi cân nhắc các yếu tố trên chỉ vì nó có mức tiêu thụ nhiên liệu trung bình cao hơn xe khác một chút.<br />\r\n<br />\r\nThực tế thì mức chênh lệch chi phí nhiên liệu mỗi năm của một chiếc xe có mức tiêu thụ trung bình 10,7 lít/100km đường cao tốc - 14,7 lít/100km đường phố (trung bình 13,1 lít/100km) so với xe tiêu thụ 9,8 - 13,8 lít/100km (trung bình 12,4 lít/100km) chỉ là khoảng 122 USD/năm (2,5 triệu/năm) - theo tính toán của trang fueleconomy.gov.<br />\r\nDo đó, trừ phi sự chênh lệch là quá lớn (5-6 lít/100km), đừng quá đặt nặng yếu tố này mà bỏ qua chiếc xe mình yêu thích.<br />\r\n <br />\r\nXếp hạng an toàn<br />\r\n<br />\r\nAn toàn là một vấn đề lớn đối với mọi loại và hạng xe. Dù các xe cỡ lớn và nặng thì thường an toàn hơn, nhưng sự phát triển công nghệ đã giúp những chiếc xe nhỏ an toàn hơn trước nhiều. Mọi thứ, từ các hệ thống hạn chế chấn thương thụ động đơn giản cho tới túi khí trước/bên và hệ thống ngăn chặn va chạm công nghệ cao đều được đưa vào tính điểm an toàn cho xe.<br />\r\n<br />\r\nVì thế, bạn cần tìm hiểu thông tin về xếp hạng an toàn của các xe được đăng tải trên những trang web uy tín như nhtsa.gov, iihs.org, consumerreports.com, hay safercar.gov.<br />\r\nBảo hành<br />\r\n<br />\r\nChế độ bảo hành tốt sẽ đem đến cảm giác an tâm cho người mua xe. Các nhà sản xuất đưa ra thời hạn bảo hành là 3 năm/60.000km đến 10 năm/160.000km.<br />\r\n<br />\r\nTuy nhiên, không phải danh mục bảo hành nào cũng như nhau. Động cơ là bộ phận đáng chú ý nhất. Ngoài ra, các nhà sản xuất cũng đưa ra chế độ bảo hành cho dàn âm thanh, sơn ngoại thất, điều hoà, pin... Nhìn chung, thời hạn và danh mục bảo hành càng dài càng tốt.<br />\r\nMức tiêu thụ nhiên liệu', 'dantri.com.vn', '2010-12-05', 10, 'checklist-011110-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ykien`
--

CREATE TABLE IF NOT EXISTS `ykien` (
  `MaYK` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `Ngaygui` date NOT NULL,
  `Diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Dienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaYK`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ykien`
--

INSERT INTO `ykien` (`MaYK`, `TenKH`, `Email`, `Noidung`, `Ngaygui`, `Diachi`, `Dienthoai`) VALUES
(3, 'Nguyễn Huy Văn', 'huyvan73@yahoo.com', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer interdum sem ac magna. Integer in lectus sed ligula commodo commodo. In molestie, neque et porta lobortis, ligula sem auctor mauris, a luctus lacus quam sit amet augue. Aliquam eu felis. Nullam vel erat. Phasellus erat nibh, nonummy sit amet, lobortis quis, imperdiet ornare, dolor. Nunc odio. Nulla eros neque, egestas ut, auctor eu, luctus vitae, nisi. Aenean malesuada leo a nunc. Etiam fermentum neque in justo. Aliquam erat volutpat. Aenean tellus eros, consectetuer ut, hendrerit ut, rutrum at, nunc. Integer dolor odio, posuere nec, molestie at, tincidunt at, lacus. Maecenas at nibh.', '2010-12-03', 'Shijima Tokio JaPan', '0909888888');
