-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 27, 2021 lúc 12:28 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `ID` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `TenNguoiNhan` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TongTien` decimal(15,4) NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp(),
  `DiaChiGiao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `PTTT` tinyint(1) NOT NULL DEFAULT 0,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`ID`, `MaKH`, `TenNguoiNhan`, `TongTien`, `NgayTao`, `DiaChiGiao`, `SDT`, `GhiChu`, `PTTT`, `TrangThai`) VALUES
(17, 7, 'Chu Minh Hiệp', '200000.0000', '2021-04-19 08:39:05', 'Ba Vì ', '0346765899', '                ', 0, 0),
(18, 7, 'Chu Minh Hiệp', '147000.0000', '2021-04-23 09:08:52', 'Ba Vì ', '0346765899', '                ', 0, 0),
(19, 7, 'Chu Minh Hiệp', '300000.0000', '2021-04-23 09:18:57', 'Ba Vì ', '0346765899', '                ', 0, 0),
(20, 7, 'Chu Minh Hiệp', '300000.0000', '2021-04-23 09:20:26', 'Ba Vì ', '0346765899', '                ', 0, 0),
(21, 7, 'Chu Minh Hiệp', '147000.0000', '2021-04-23 09:21:36', 'Ba Vì ', '0346765899', '                ', 0, 1),
(23, 7, 'Chu Minh Hiệp', '570000.0000', '2021-04-25 21:19:06', 'Ba Vì ', '0346765899', '                ', 0, 1),
(24, 7, 'Chu Minh Hiệp', '900000.0000', '2021-06-23 08:07:04', 'Ba Vì ', '0346765899', '                ', 0, 0),
(25, 7, 'Chu Minh Hiệp', '80850000.0000', '2021-07-21 12:25:05', 'Ba Vì ', '0346765899', '                ', 0, 1),
(26, 7, 'Thế Anh', '2550000.0000', '2021-07-26 17:20:22', 'Ba Vì ', '0346765899', '                ', 0, 0),
(27, 7, 'Thế Anh', '2550000.0000', '2021-07-26 17:20:42', 'Ba Vì ', '0346765899', '                ', 0, 0),
(28, 7, 'Thế Anh11', '1300000.0000', '2021-07-27 10:26:08', 'Hà Nội', '0346765899', 'Note        ', 0, 0),
(29, 7, 'Thế Anh11', '3850000.0000', '2021-07-27 11:10:34', 'Ba Vì ', '0346765899', '                ', 0, 0),
(30, 7, 'Thế Anh11', '1300000.0000', '2021-07-27 11:12:53', 'Ba Vì ', '0346765899', '                ', 0, 0),
(31, 7, 'Thế Anh', '5150000.0000', '2021-07-27 17:10:31', 'Hà Nội', '0346765899', '                ', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `TenDanhMuc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 1,
  `Slug` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ParentID` int(11) NOT NULL DEFAULT 0,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID`, `TenDanhMuc`, `TrangThai`, `Slug`, `ParentID`, `NgayTao`) VALUES
(24, 'Lụa Hà Đông', 1, 'lua-ha-dong', 0, '2021-07-21 16:48:34'),
(25, 'Làng Đồng Bát Tràng', 1, 'lang-dong-bat-trang', 0, '2021-07-21 16:48:49'),
(26, 'Tàu Thuyền Mô Hình', 1, 'tau-thuyen-mo-hinh', 0, '2021-07-21 16:49:03'),
(27, 'Bình Trà Bát Tràng', 1, 'binh-tra-bat-trang', 0, '2021-07-21 16:49:22'),
(28, 'Thư Pháp Việt Nam', 1, 'thu-phap-viet-nam', 0, '2021-07-21 16:49:33'),
(29, 'Sơn Mài Việt Nam', 1, 'son-mai-viet-nam', 0, '2021-07-21 16:49:45'),
(31, 'Gốm Sứ Bát Tràng', 1, 'gom-su-bat-trang', 0, '2021-07-21 16:50:11'),
(34, 'Vải Áo Dài Lụa', 1, 'vai-ao-dai-lua', 24, '2021-07-21 16:53:33'),
(35, 'Khăn Choàng Cổ', 1, 'khan-choang-co', 24, '2021-07-21 16:53:42'),
(37, 'Khăn trải bàn - Vỏ gối tựa', 1, 'khan-trai-ban-vo-goi-tua', 24, '2021-07-21 16:54:19'),
(42, 'Lọ Hoa', 1, 'lo-hoa', 31, '2021-07-21 16:58:05'),
(44, 'Bộ Bình Trà', 1, 'bo-binh-tra', 31, '2021-07-21 16:58:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `ID_SP` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdKhachHang` int(11) NOT NULL,
  `TrangThai` bit(1) NOT NULL DEFAULT b'1',
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `TenKh` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp(),
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID`, `TenKh`, `SDT`, `Email`, `DiaChi`, `NgayTao`, `MatKhau`, `TrangThai`) VALUES
(7, 'Thế Anh', '0346765899', 'theanh@gmail.com', 'Hà Nội', '2021-04-17 22:54:21', '202cb962ac59075b964b07152d234b70', 1),
(8, 'Ngô Thế Tuấn', '0344010786', 'ngothetuan27082001@gmail.com', 'Hà Nội', '2021-04-23 10:12:17', 'e10adc3949ba59abbe56e057f20f883e', 1),
(9, 'chu minh hiep', '0394599501', 'chuminhhiep0211@gmail.com', 'Ba Vì ', '2021-06-21 22:47:24', 'e10adc3949ba59abbe56e057f20f883e', 1),
(10, 'chu minh hiep', '(+84) 987827', 'chuminhhiep0211@gmail.com', 'Ba Vì ', '2021-06-21 22:47:56', '25f9e794323b453885f5181f1b624d0b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailedproducts`
--

CREATE TABLE `detailedproducts` (
  `ID` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 0,
  `GiaBan` decimal(15,4) NOT NULL,
  `GiaNhap` decimal(15,4) NOT NULL,
  `GiamGia` tinyint(4) NOT NULL DEFAULT 0,
  `LoaiSize` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MaSP` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 1,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detailedproducts`
--

INSERT INTO `detailedproducts` (`ID`, `SoLuong`, `GiaBan`, `GiaNhap`, `GiamGia`, `LoaiSize`, `MaSP`, `TrangThai`, `NgayTao`) VALUES
(33, 15, '200000.0000', '100000.0000', 0, 'Loại 1', 'quyt_01', 1, '2021-04-12 23:02:02'),
(34, 18, '300000.0000', '200000.0000', 0, 'Loại 2', 'quyt_01', 1, '2021-04-12 23:02:02'),
(35, 1000, '200000.0000', '100000.0000', 0, 'Loại 1', '000100234325', 1, '2021-04-13 20:49:57'),
(36, 100, '250000.0000', '200000.0000', 0, 'Loại 2', '000100234325', 1, '2021-04-13 20:49:57'),
(37, 5, '2000000.0000', '1200000.0000', 0, 'Loại 1', 'le000001', 1, '2021-04-22 22:10:11'),
(49, 1, '700000.0000', '0.0000', 0, 'Bộ', 'CBBT02', 1, '2021-07-21 17:04:23'),
(50, 5, '900.0000', '357.0000', 0, 'Bộ', 'TS565', 1, '2021-07-21 17:13:18'),
(51, 1, '1200000.0000', '100000.0000', 0, 'Bộ', 'LPT03', 1, '2021-07-21 21:08:15'),
(52, 10, '1300000.0000', '1000000.0000', 0, 'M vải', 'LHD53', 1, '2021-07-21 21:11:46'),
(53, 0, '1700000.0000', '0.0000', 0, 'Hộp', 'TB60', 1, '2021-07-22 21:25:38'),
(54, 1, '438000.0000', '0.0000', 0, 'Hộp', 'KLTB05', 1, '2021-07-25 16:55:26'),
(55, 1, '300000.0000', '0.0000', 0, 'Hộp', 'KLTB03', 1, '2021-07-25 16:58:27'),
(56, 1, '7000000.0000', '0.0000', 0, 'Hộp', 'TB18', 1, '2021-07-25 17:02:42'),
(57, 1, '2550000.0000', '0.0000', 0, 'Hộp', 'TB01', 1, '2021-07-25 17:05:42'),
(58, 6, '1300000.0000', '0.0000', 0, 'Hộp', 'MNV', 1, '2021-07-25 17:13:46'),
(59, 0, '0.0000', '0.0000', 0, '', 'SMTT001', 1, '2021-07-25 17:15:47'),
(60, 2, '720000.0000', '0.0000', 0, 'Hộp', 'SMMT01', 1, '2021-07-25 17:22:25'),
(61, 1, '2000000.0000', '0.0000', 0, 'Hộp', 'SMA360', 1, '2021-07-25 17:24:00'),
(62, 1, '200000.0000', '0.0000', 0, 'Hộp', 'LHGM1515', 1, '2021-07-25 17:31:32'),
(63, 1, '150000.0000', '0.0000', 0, 'Lọ', 'LHG600', 1, '2021-07-25 17:33:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailsbill`
--

CREATE TABLE `detailsbill` (
  `ID` int(11) NOT NULL,
  `MaSPCT` int(11) NOT NULL,
  `Ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaBan` decimal(15,4) NOT NULL,
  `GiamGia` tinyint(4) NOT NULL,
  `ThanhTien` decimal(15,4) NOT NULL,
  `SoLuongMua` int(11) NOT NULL,
  `IdBill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detailsbill`
--

INSERT INTO `detailsbill` (`ID`, `MaSPCT`, `Ten`, `GiaBan`, `GiamGia`, `ThanhTien`, `SoLuongMua`, `IdBill`) VALUES
(8, 31, 'Táo Envy Mỹ ( Loại 1 : (300.000 / kg) )', '200000.0000', 0, '200000.0000', 1, 17),
(9, 41, 'Cherry Vàng ( Cherry Vàng L2 ( 147.000 VND/k )', '147000.0000', 0, '147000.0000', 1, 18),
(10, 40, ' Cherry Chile (  Cherry Chile L1 ( 300.000VND/ )', '300000.0000', 0, '300000.0000', 1, 19),
(11, 40, ' Cherry Chile (  Cherry Chile L1 ( 300.000VND/ )', '300000.0000', 0, '300000.0000', 1, 20),
(12, 41, 'Cherry Vàng ( Cherry Vàng L2 ( 147.000 VND/k )', '147000.0000', 0, '147000.0000', 1, 21),
(14, 42, 'Nho rượu Nhật Bản ( Nho rượu Nhật Bản L1 (570.000 ', '570000.0000', 0, '570000.0000', 1, 23),
(15, 40, ' Cherry Chile (  Cherry Chile L1 ( 300.000VND/ )', '300000.0000', 0, '900000.0000', 3, 24),
(16, 47, 'Lê má hồng Bỉ ( Lê má hồng Bỉ L4 ( 450.000 VND )', '450000.0000', 0, '14850000.0000', 33, 25),
(17, 38, 'Cherry Mỹ ( Táo Envy Newzealand size 100 - )', '2000000.0000', 0, '66000000.0000', 33, 25),
(18, 57, 'Mô hình tàu thuyền chở hàng France II gỗ tự nhiên ', '2550000.0000', 0, '2550000.0000', 1, 26),
(19, 57, 'Mô hình tàu thuyền chở hàng France II gỗ tự nhiên ', '2550000.0000', 0, '2550000.0000', 1, 27),
(20, 58, '   Bộ tranh sơn mài Mai Lan Cúc Trúc cẩn nổi ( Hộp', '1300000.0000', 0, '1300000.0000', 1, 28),
(21, 58, '   Bộ tranh sơn mài Mai Lan Cúc Trúc cẩn nổi ( Hộp', '1300000.0000', 0, '1300000.0000', 1, 29),
(22, 57, 'Mô hình tàu thuyền chở hàng France II gỗ tự nhiên ', '2550000.0000', 0, '2550000.0000', 1, 29),
(23, 58, '   Bộ tranh sơn mài Mai Lan Cúc Trúc cẩn nổi ( Hộp', '1300000.0000', 0, '1300000.0000', 1, 30),
(24, 58, '   Bộ tranh sơn mài Mai Lan Cúc Trúc cẩn nổi ( Hộp', '1300000.0000', 0, '1300000.0000', 1, 31),
(25, 57, 'Mô hình tàu thuyền chở hàng France II gỗ tự nhiên ', '2550000.0000', 0, '2550000.0000', 1, 31),
(26, 52, 'Lụa Áo Dài Hà Đông Họa Tiết Hoa Vàng ( M vải )', '1300000.0000', 0, '1300000.0000', 1, 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `TieuDe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0,
  `NoiBat` tinyint(1) NOT NULL DEFAULT 0,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`ID`, `TieuDe`, `MoTa`, `slug`, `image`, `NoiDung`, `TrangThai`, `NoiBat`, `NgayTao`) VALUES
(12, 'Một số mặt hàng thủ công mỹ nghệ Việt Nam xuất khẩu', 'Ngành nghề truyền thống là những ngành nghề tiểu thủ công nghiệp đã xuất hiện từ lâu trong lịch sử phát triển kinh tế của nước ta còn tồn tại cho đến ngày nay, bao gôm cả ngành nghề mà phương pháp sản xuất được cải tiến hoặc sử dụng những máy móc hiện đại', 'mot-so-mat-hang-thu-cong-my-nghe-viet-nam-xuat-khau', 'lang-nghe-vietnam_56.jpg', '<p>Ng&agrave;nh nghề truyền thống&nbsp;l&agrave; những ng&agrave;nh nghề tiểu thủ c&ocirc;ng nghiệp đ&atilde; xuất hiện từ l&acirc;u trong lịch sử ph&aacute;t triển kinh tế của nước ta c&ograve;n tồn tại cho đến ng&agrave;y nay, bao g&ocirc;m cả ng&agrave;nh nghề m&agrave; phương ph&aacute;p sản xuất được cải tiến hoặc sử dụng những m&aacute;y m&oacute;c hiện đại để hỗ trợ cho sản xuất nhưng vẫn tu&acirc;n thủ c&ocirc;ng nghệ truyền thống.</p>\r\n\r\n<p>Như vậy từ c&aacute;c định nghĩa tr&ecirc;n ta c&oacute; thể hiểu cụ thể về h&agrave;ng thủ c&ocirc;ng mỹ nghệ như sau: sản phẩm thủ c&ocirc;ng mỹ nghệ l&agrave; những sản phẩm mang t&iacute;nh truyền thống v&agrave; độc đ&aacute;o của từng v&ugrave;ng, c&oacute; gi&aacute; trị chất lượng cao, vừa l&agrave; h&agrave;ng ho&aacute;, vừa l&agrave; sản phẩm văn ho&aacute;, nghệ thuật, mỹ thuật, thậm ch&iacute; c&oacute; thể trở th&agrave;nh di sản văn ho&aacute; của d&acirc;n tộc, mang bản sắc văn ho&aacute; của v&ugrave;ng l&atilde;nh thổ hay quốc gia sản xuất ra ch&uacute;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://vinh-cat.com.vn/wp-content/uploads/2018/10/lang-nghe-vietnam.jpg\" style=\"height:400px; width:600px\" /></p>\r\n\r\n<p>H&agrave;ng thủ c&ocirc;ng mỹ nghệ bao gồm c&aacute;c nh&oacute;m h&agrave;ng sau:</p>\r\n\r\n<ol>\r\n	<li>Nh&oacute;m sản phẩm từ gỗ (gỗ mỹ nghệ)</li>\r\n	<li>Nh&oacute;m h&agrave;ng m&acirc;y tre đan</li>\r\n	<li>Nh&oacute;m sản phẩm gốm sứ mỹ nghệ</li>\r\n	<li>Nh&oacute;m h&agrave;ng th&ecirc;u</li>\r\n</ol>\r\n\r\n<h2>Một số mặt h&agrave;ng việt nam xuất khẩu</h2>\r\n\r\n<h3>Đồ gỗ nội thất v&agrave; Mỹ nghệ xuất khẩu</h3>\r\n\r\n<p>Nghề l&agrave;m đồ gỗ mỹ nghệ đ&atilde; c&oacute; ở Việt Nam từ l&acirc;u v&agrave; đ&atilde; đạt đến tr&igrave;nh độ kh&aacute; cao. Sau một thời gian mai một, từ đầu những năm 80, nghề l&agrave;m đồ gỗ mỹ nghệ lại được ph&aacute;t triển mạnh mẽ vừa phục vụ nhu cầu trong nước, vừa để xuất khẩu. C&aacute;c mặt h&agrave;ng gỗ mỹ nghệ chủ yếu l&agrave; tượng gỗ, b&agrave;n ghế, tủ, sập (giường)&hellip;</p>\r\n\r\n<p>C&aacute;c c&ocirc;ng ty gỗ mỹ nghệ trong cả nước với đội ngũ nghệ nh&acirc;n v&agrave; thợ l&agrave;nh nghề đ&atilde; tạo ra nhiều sản phẩm vừa c&oacute; gi&aacute; trị sử dụng, vừa c&oacute; gi&aacute; trị nghệ thuật.</p>\r\n\r\n<p><img alt=\"đồ gỗ mỹ nghệ\" src=\"https://vinh-cat.com.vn/wp-content/uploads/2018/10/%C4%91%E1%BB%93-g%E1%BB%97-m%E1%BB%B9-ngh%E1%BB%87.jpg\" style=\"height:400px; width:600px\" /></p>\r\n\r\n<h3>M&acirc;y tre đan Việt Nam xuất khẩu</h3>\r\n\r\n<p>C&acirc;y tre, c&acirc;y song v&agrave; c&acirc;y m&acirc;y l&agrave; đặc sản của xứ sở Việt Nam nhiệt đới. Ba loại c&acirc;y n&agrave;y trở th&agrave;nh nguồn nguy&ecirc;n liệu v&ocirc; tận của những người thợ thủ c&ocirc;ng l&agrave;m h&agrave;ng m&acirc;y tre đan. H&agrave;ng m&acirc;y tre đan Việt Nam đ&atilde; c&oacute; mặt ở Hội chợ Pari năm 1931. Đến nay, hơn 200 mặt h&agrave;ng n&agrave;y đ&atilde; đi khắp năm ch&acirc;u, được kh&aacute;ch h&agrave;ng ưa chuộng. Với b&agrave;n tay kh&eacute;o l&eacute;o của những người thợ, những th&acirc;n c&acirc;y tưởng như v&ocirc; dụng đ&atilde; trở th&agrave;nh những đĩa b&agrave;y hoa quả, lẵng hoa, b&aacute;t hoa, l&agrave;n, giỏ, khay, lọ hoa, chao đ&egrave;n, bộ salon tủ s&aacute;ch&hellip;</p>\r\n\r\n<p>Ưu điểm của h&agrave;ng m&acirc;y tre đan l&agrave;: nhẹ, bền, kh&ocirc;ng mọt.</p>\r\n\r\n<p><img alt=\"mây tre đan\" src=\"https://vinh-cat.com.vn/wp-content/uploads/2018/10/lang-nghe-may-tre-dan.jpg\" style=\"height:450px; width:600px\" /></p>\r\n', 1, 1, '2021-07-22 16:42:20'),
(13, 'VinaHandicrafts tại hội chợ LifeStyle Vietnam 2019 ', 'Hội chợ LifeStyle Vietnam 2019 là hội chợ chuyên ngành do Hiệp hội Xuất khẩu hàng Thủ công mỹ nghệ Việt Nam (VIETCRAFT)  chủ trì thực hiện, được tổ chức thường niên vào các ngày từ 17 đến 21 tháng 4 tại Trung tâm Hội chợ và Triển lãm Sài Gòn, số 799 Nguyễ', 'vinahandicrafts-tai-hoi-cho-lifestyle-vietnam-2019', '21602cabaec4623b11cc82fc1e8c7f58fe02-4653_6_98.jpg', '<p>Hội chợ LifeStyle Vietnam 2019 l&agrave; hội chợ chuy&ecirc;n ng&agrave;nh do Hiệp hội Xuất khẩu h&agrave;ng Thủ c&ocirc;ng mỹ nghệ Việt Nam (VIETCRAFT) &nbsp;chủ tr&igrave; thực hiện, được tổ chức thường ni&ecirc;n v&agrave;o c&aacute;c ng&agrave;y từ 17 đến 21 th&aacute;ng 4 tại Trung t&acirc;m Hội chợ v&agrave; Triển l&atilde;m S&agrave;i G&ograve;n, số 799 Nguyễn Văn Linh, quận 7, th&agrave;nh phố Hồ Ch&iacute; Minh.<br />\r\nLifeStyle Vietnam 2019, với qui m&ocirc; dự kiến l&ecirc;n đến 1000&nbsp; gian h&agrave;ng với sự tham gia của 500 nh&agrave; xuất khẩu Việt Nam v&agrave; c&aacute;c nước tr&ecirc;n thế giới. B&ecirc;n cạnh c&aacute;c nh&oacute;m h&agrave;ng truyền thống như h&agrave;ng thủ c&ocirc;ng mỹ nghệ v&agrave; trang tr&iacute; nội thất, h&agrave;ng b&agrave;n ghế trong nh&agrave; v&agrave; ngo&agrave;i trời, h&agrave;ng trang sức, h&agrave;ng đồ chơi&hellip;. LifeStyle Vietnam 2019 sẽ mở rộng th&ecirc;m c&aacute;c nh&oacute;m h&agrave;ng&nbsp; Dệt may gia dụng, h&agrave;ng da giầy, t&uacute;i x&aacute;ch, h&agrave;ng gia dụng kim kh&iacute; v&agrave; h&agrave;ng nhựa, h&agrave;ng nh&agrave; bếp&hellip;</p>\r\n\r\n<p><strong>Lifestyle Vietnam 2019</strong>&nbsp;kỳ vọng thu h&uacute;t khoảng 2.000 nh&agrave; nhập khẩu từ c&aacute;c quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ tr&ecirc;n thế giới v&agrave; 15.000 kh&aacute;ch h&agrave;ng Việt Nam đến thăm quan v&agrave; giao dịch tại Hội chợ.</p>\r\n\r\n<p>Trong 5 ng&agrave;y diễn ra hội chợ,&nbsp;<strong>VinaHandicrafts</strong>&nbsp;đ&atilde; cử đại diện tham dự tại hội chợ, nhằm quảng b&aacute; sản phẩm&nbsp;<a href=\"http://vinahandicrafts.com/\"><strong>thủ c&ocirc;ng mỹ nghệ</strong></a>&nbsp;l&agrave;m từ&nbsp;<strong>nguy&ecirc;n liệu c&oacute;i, lục b&igrave;nh</strong>&nbsp;mang t&iacute;nh ứng dụng cao v&agrave; bắt kịp với xu thế của thị trường, đến với thị trường trong nước v&agrave; quốc tế như c&aacute;c loại hộp c&oacute;i,&nbsp;<a href=\"http://vinahandicrafts.com/product-catergory/san-pham-coi/tui-coi-vi-coi-cap-coi/\"><strong>t&uacute;i c&oacute;i</strong></a>, giỏ c&oacute;i, hộp b&egrave;o,&nbsp;<a href=\"http://vinahandicrafts.com/product-catergory/san-pham-beo/hop-beo-gio-beo-ro-beo-vi-vi/\"><strong>giỏ b&egrave;o</strong></a>, t&uacute;i lục b&igrave;nh,&hellip;!</p>\r\n\r\n<p><a href=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/02fc221bf07a16244f6b.jpg\"><img alt=\"VinaHandicrafts tại hội chợ Lifestyle Vietnam 2019\" src=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/02fc221bf07a16244f6b.jpg\" /></a></p>\r\n\r\n<p><a href=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/423390e94388a5d6fc99.jpg\"><img alt=\"VinaHandicrafts tại hội chợ Lifestyle Vietnam 2019\" src=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/423390e94388a5d6fc99.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/9d58b7be65df8381dace.jpg\"><img alt=\"VinaHandicrafts tại hội chợ Lifestyle Vietnam 2019\" src=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/9d58b7be65df8381dace.jpg\" /></a>&nbsp;<a href=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/91cf3a29e8480e165759.jpg\"><img alt=\"91cf3a29e8480e165759\" src=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/91cf3a29e8480e165759.jpg\" /></a>&nbsp;<a href=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/881b66318a506c0e3541.jpg\"><img alt=\"881b66318a506c0e3541\" src=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/881b66318a506c0e3541.jpg\" /></a>&nbsp;<a href=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/eb2ed3003f61d93f8070.jpg\"><img alt=\"eb2ed3003f61d93f8070\" src=\"http://vinahandicrafts.com/wp-content/uploads/2019/10/eb2ed3003f61d93f8070.jpg\" /></a></p>\r\n', 1, 1, '2021-07-22 16:45:23'),
(14, 'Quảng bá hàng thủ công mỹ nghệ Việt Nam tại Ấn Độ', 'Quảng bá hàng thủ công mỹ nghệ Việt Nam tại Ấn Độ', 'quang-ba-hang-thu-cong-my-nghe-viet-nam-tai-an-do', 'bv3_66.jpg', '<table border=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"https://file1.dangcongsan.vn/data/0/images/2019/12/25/hanhts/a525122019.jpg?dpi=150&amp;quality=100&amp;w=680\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Gian h&agrave;ng Việt Nam tại Hội chợ IIMTF . (Ảnh: TTXVN)&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>IIMTF &nbsp;thu h&uacute;t gần 1.000 nh&agrave; triển l&atilde;m thuộc 21 bang v&agrave; v&ugrave;ng l&atilde;nh thổ của Ấn Độ c&ugrave;ng nhiều doanh nghiệp đến từ khoảng 20 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ như Ai Cập, Thổ Nhĩ Kỳ, C&aacute;c tiểu vương quốc Arab thống nhất (UAE), Afghanistan, Nepal, Bangladesh, Sri Lanka, Hong Kong, Th&aacute;i Lan, Malaysia, Indonesia, Trung Quốc v&agrave; Việt Nam&hellip;&nbsp;</p>\r\n\r\n<p>Hội chợ tập trung quảng b&aacute; c&aacute;c sản phẩm đổi mới s&aacute;ng tạo, h&agrave;ng thủ c&ocirc;ng mỹ nghệ, điện tử, nội thất, h&agrave;ng nhập khẩu, lương thực - thực phẩm, &ocirc; t&ocirc;, gi&aacute;o dục v&agrave; c&ocirc;ng nghệ th&ocirc;ng tin&hellip; Trong khu&ocirc;n khổ hội chợ, c&aacute;c buổi giao thương, kết nối, hội nghị, hội thảo chia sẻ kinh nghiệm v&agrave; trao đổi cơ hội hợp t&aacute;c kinh doanh cũng sẽ được tổ chức. Hội chợ dự kiến thu h&uacute;t khoảng 800.000 lượt kh&aacute;ch tham quan. Đ&acirc;y l&agrave; cơ hội tốt để c&aacute;c doanh nghiệp Việt Nam gặp gỡ kh&aacute;ch h&agrave;ng, t&igrave;m kiếm cơ hội đầu tư, kinh doanh.&nbsp;</p>\r\n\r\n<p>Theo số liệu của Tổng cục Hải quan Việt Nam, tổng kim ngạch xuất nhập khẩu h&agrave;ng h&oacute;a giữa Việt Nam - Ấn Độ trong 11 th&aacute;ng đầu năm 2019 đạt 10,30 tỷ USD, tăng 3,6 % so với 9,94 tỷ USD c&ugrave;ng kỳ năm trước. Trong đ&oacute;, Việt Nam xuất khẩu 6,25 tỷ USD, tăng 2% v&agrave; nhập khẩu 4,05 tỷ USD, tăng 6,4% so với c&ugrave;ng kỳ năm 2018. T&iacute;nh lũy kế 11 th&aacute;ng, thặng dư thương mại của Việt Nam với Ấn Độ đạt 2,2 tỷ USD. Trong đ&oacute;, xuất khẩu sản phẩm thủ c&ocirc;ng mỹ nghệ, m&acirc;y tre, c&oacute;i, thảm sang Ấn Độ lần đầu ti&ecirc;n vượt 10 triệu USD, đạt 11,85 triệu USD, tăng 134,7 % so với c&ugrave;ng kỳ năm trước. Tuy kim ngạch c&ograve;n khi&ecirc;m tốn nhưng đ&acirc;y l&agrave; ng&agrave;nh giải quyết c&ocirc;ng ăn việc l&agrave;m, sử dụng nhiều lao động ở v&ugrave;ng n&ocirc;ng th&ocirc;n./.</p>\r\n\r\n<p><em>Theo TTXVN</em></p>\r\n', 1, 1, '2021-07-22 16:46:48'),
(15, 'Hàng thủ công mỹ nghệ Việt đẹp như mơ nhờ thay đổi thiết kế', 'Dự án Phát triển thiết kế và xây dựng thương hiệu bền vững cho ngành thủ công mỹ nghệ Việt Nam do Hiệp hội Xuất khẩu hàng thủ công mỹ nghệ Việt Nam (Vietcraft) triển khai với tổng giá trị hơn 554.000 euro, do Dự án hỗ trợ chính sách thương mại và đầu tư c', 'hang-thu-cong-my-nghe-viet-dep-nhu-mo-nho-thay-doi-thiet-ke', '6syuc-2201_14_83.jpg', '<p>Dự &aacute;n nhằm mục ti&ecirc;u n&acirc;ng cao năng lực của c&aacute;c doanh nghiệp vừa v&agrave; nhỏ đ&aacute;p ứng c&aacute;c ti&ecirc;u chuẩn tiếp cận thị trường ch&acirc;u &Acirc;u th&ocirc;ng qua thiết kế v&agrave; x&acirc;y dựng thương hiệu bền vững cho sản phẩm thủ c&ocirc;ng mỹ nghệ.<br />\r\n<br />\r\nC&ugrave;ng ngắm những mẫu thiết kế ti&ecirc;u biểu, kết quả của dự &aacute;n &yacute; nghĩa n&agrave;y:</p>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/48/IMG8560.JPG\" style=\"height:376px; width:501px\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/49/IMG8574.JPG\" style=\"height:466px; width:350px\" /></p>\r\n\r\n			<p>Những mẫu thiết kế n&agrave;y được sự hỗ trợ thực hiện của Trường Thiết kế Lund Thụy Điển.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/50/IMG8562.JPG\" style=\"height:375px; width:500px\" /></p>\r\n\r\n			<p>&Ocirc;ng L&ecirc; B&aacute; Ngọc, Tổng thư k&yacute; Vietcraft cho biết: Người ti&ecirc;u d&ugrave;ng thế giới ng&agrave;y c&agrave;ng quan t&acirc;m đến sản phẩm c&oacute; yếu tố bền vững. Tại thị trường EU, xu hướng n&agrave;y đ&atilde; tăng l&ecirc;n 40,5% trong giai đoạn 2012 - 2016.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/52/IMG8565.JPG\" style=\"height:376px; width:502px\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/52/IMG8578.JPG\" style=\"height:371px; width:501px\" /></p>\r\n\r\n			<p>Th&ocirc;ng qua dự &aacute;n, kinh nghiệm về sản xuất gốm, chạm khắc gỗ, m&acirc;y tre... của c&aacute;c nước ch&acirc;u &Acirc;u được đưa về Việt Nam.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/54/IMG8569.JPG\" style=\"height:375px; width:500px\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/54/IMG8573.JPG\" style=\"height:375px; width:500px\" /></p>\r\n\r\n			<p>Người ti&ecirc;u d&ugrave;ng tỏ ra th&iacute;ch th&uacute; với những mẫu thiết kế s&aacute;ng tạo, hiện đại.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/56/IMG8566.JPG\" style=\"height:375px; width:500px\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/56/IMG8577.JPG\" style=\"height:375px; width:500px\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"10\" style=\"width:150px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"https://cdnmedia.baotintuc.vn/2017/04/29/00/56/IMG8570.JPG\" style=\"height:375px; width:500px\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Theo c&aacute;c chuy&ecirc;n gia, bất cập lớn nhất của ng&agrave;nh h&agrave;ng thủ c&ocirc;ng mỹ nghệ hiện nay vẫn l&agrave; thiết kế mẫu m&atilde; sản phẩm. V&igrave; thế, h&agrave;ng h&oacute;a kh&oacute; xuất khẩu được sang nước ngo&agrave;i. C&oacute; tới 90% sản phẩm thủ c&ocirc;ng mỹ nghệ Việt Nam dựa tr&ecirc;n thiết kế của kh&aacute;ch h&agrave;ng nước ngo&agrave;i.</p>\r\n', 1, 1, '2021-07-22 17:08:22'),
(16, 'Đồ thủ công mỹ nghệ tại Nhật Bản', 'Nói đến đồ thủ công mỹ nghệ tại Nhật Bản, chúng ta không thể không nhắc đến vùng đất Tohoku. Đây là một trong những vùng đất nổi tiếng với ngành nghề thủ công mỹ nghệ từ xa xưa tại đất nước Nhật Bản. Những đồ thủ công mỹ nghệ tại Nhật Bản từ đây được làm ', 'do-thu-cong-my-nghe-tai-nhat-ban', 'bv5_47.png', '<p>I. Một số đồ thủ c&ocirc;ng mỹ nghệ nổi tiếng tại Nhật Bản</p>\r\n\r\n<p>N&oacute;i đến đồ thủ c&ocirc;ng mỹ nghệ tại Nhật Bản, ch&uacute;ng ta kh&ocirc;ng thể kh&ocirc;ng nhắc đến v&ugrave;ng đất Tohoku. Đ&acirc;y l&agrave; một trong những v&ugrave;ng đất nổi tiếng với ng&agrave;nh nghề thủ c&ocirc;ng mỹ nghệ từ xa xưa tại đất nước Nhật Bản. Những&nbsp;đồ thủ c&ocirc;ng mỹ nghệ tại Nhật Bản&nbsp;từ đ&acirc;y được l&agrave;m ra một c&aacute;ch tỷ mỉ v&agrave; ho&agrave;n mỹ, ch&uacute;ng tuy l&agrave; những đồ vật nhỏ b&eacute; nhưng chứa đựng nhiều &yacute; nghĩa về văn h&oacute;a v&agrave; con người Nhật. Một số m&oacute;n đồ thủ c&ocirc;ng mỹ nghệ nổi tiếng như: Magewappa, Nến họa tiết, B&uacute;p b&ecirc; Kokeshi, H&igrave;nh th&ecirc;u Kogin-zashi, Đồ sơn m&agrave;i Tsugaru, Vải nhuộm Nambu&hellip;</p>\r\n\r\n<p><img alt=\"Tư vấn mua đồ thủ công mỹ nghệ tại Nhật Bản\" src=\"https://anhduongtours.vn/wp-content/uploads/2018/04/mua-do-thu-cong-my-nghe-tai-nhat-ban-2.png\" style=\"height:360px; width:640px\" /></p>\r\n\r\n<p><em>Đồ thủ c&ocirc;ng mỹ nghệ tại Nhật Bản</em></p>\r\n\r\n<h3>1. Đồ thủ c&ocirc;ng mỹ nghệ tại Nhật Bản &ndash; B&uacute;p b&ecirc; Kokeshi</h3>\r\n\r\n<p>Nếu muốn&nbsp;mua đồ thủ c&ocirc;ng mỹ nghệ tại Nhật Bản, sự lựa chọn đầu ti&ecirc;n kh&ocirc;ng thể bỏ qua l&agrave; B&uacute;p b&ecirc; Kokeshi. Nguồn g&oacute;c của loại b&uacute;p b&ecirc; n&agrave;y c&oacute; từ rất l&acirc;u đời đến nỗi người ta kh&ocirc;ng thể biết được ch&iacute;nh x&aacute;c lịch sử ra đời của ch&uacute;ng.</p>\r\n\r\n<p>Với những h&igrave;nh th&ugrave; đ&aacute;ng y&ecirc;u v&agrave; họa tiết được vẽ thủ c&ocirc;ng, B&uacute;p b&ecirc; Kokeshi lu&ocirc;n c&oacute; khu&ocirc;n mặt hiền dịu đ&aacute;ng y&ecirc;u, nh&igrave;n qua v&ocirc; c&ugrave;ng đơn giản nhưng từng họa tiết tr&ecirc;n ch&uacute;ng lại sống động v&ocirc; c&ugrave;ng. Th&acirc;n b&uacute;p b&ecirc; được l&agrave;m từ gỗ m&agrave;i nhẵn. Ng&agrave;y nay, ch&uacute;ng được cải c&aacute;ch nhiều hơn với những bộ trang phục kimono hay một số kiểu d&aacute;ng lạ mặt kh&aacute;c nhau được b&agrave;y b&aacute;n nhiều nơi tại c&aacute;c cửa h&agrave;ng lưu niệm ở Nhật.</p>\r\n\r\n<p><img alt=\"Búp bê Kokeshi\" src=\"https://anhduongtours.vn/wp-content/uploads/2018/04/mua-do-thu-cong-my-nghe-tai-nhat-ban-3.png\" style=\"height:426px; width:640px\" /></p>\r\n\r\n<p><em>B&uacute;p b&ecirc; Kokeshi</em></p>\r\n\r\n<h3>2. Magewappa&ndash; Đồ thủ c&ocirc;ng mỹ nghệ tinh xảo</h3>\r\n\r\n<p>Magewappa giống như đồ gốm ở Việt Nam với c&ocirc;ng dụng d&ugrave;ng để b&agrave;y v&agrave; trang tr&iacute; thức ăn. Tuy nhi&ecirc;n, Magewappa kh&ocirc;ng được l&agrave;m từ đất nung m&agrave; được l&agrave;m từ gỗ được uốn cong.</p>\r\n\r\n<p>Du kh&aacute;ch c&oacute; thể dễ d&agrave;ng bắt gặp những&nbsp;đồ thủ c&ocirc;ng mỹ nghệ tại Nhật bản&nbsp;như Magewappa được b&agrave;y tr&iacute; trong c&aacute;c nh&agrave; h&agrave;ng truyền thống đến hiện đại. Những đĩa thức ăn c&oacute; h&igrave;nh th&ugrave; lạ mắt v&agrave; uốn lượn được b&agrave;y tr&ecirc;n đ&oacute; l&agrave; m&oacute;n sushi truyền thống đẹp mắt.</p>\r\n\r\n<p>Kh&oacute; c&oacute; thể tưởng tượng ra khi kh&ocirc;ng được tận mắt chứng kiến những nghệ nh&acirc;n tỷ mỉ đến mức n&agrave;o khi l&agrave;m thứ đồ n&agrave;y. Magewappa c&oacute; xuất xứ từ Akita, một nơi nằm trong 6 quận của TP. Tohohku. Ch&uacute;ng được l&agrave;m bằng gỗ b&aacute;ch hoặc gỗ tuyết t&ugrave;ng ng&acirc;m nước hoặc b&agrave;o mỏng, sau đ&oacute; uốn th&agrave;nh đĩa, hộp cơm, gi&aacute; hấp&hellip;. Những đồ vật n&agrave;y d&ugrave; được rửa đi nhưng vẫn giữ được m&ugrave;i gỗ thơm v&agrave; v&acirc;n gỗ tạo n&ecirc;n n&eacute;t độc đ&aacute;o ri&ecirc;ng cho m&oacute;n ăn.</p>\r\n\r\n<h3>3. Nến họa tiết&nbsp;cũng l&agrave; một trong những đồ thủ c&ocirc;ng mỹ nghệ tại Nhật Bản</h3>\r\n\r\n<p>Được sử dụng từ những nguy&ecirc;n liệu 100% từ thi&ecirc;n nhi&ecirc;n, nến họa tiết sở hữu n&eacute;t độc đ&aacute;o của văn h&oacute;a Nhật Bản từ xa xưa trong những cung đ&igrave;nh cổ. Nến được l&agrave;m từ nhiều lớp s&aacute;p gh&eacute;p lại, sau đ&oacute; được c&aacute;c nghệ nh&acirc;n trực tiếp vẽ l&ecirc;n những họa tiết đặc trưng dọc th&acirc;n nến như cảnh lễ hội, hoa anh đ&agrave;o v&agrave; một số loại hoa kh&aacute;c&hellip;</p>\r\n\r\n<p>Sử dụng nến họa tiết mang lại cảm gi&aacute;c sang trọng m&agrave; cổ k&iacute;nh, ch&uacute;ng thường hay được sử dụng v&agrave;o những&nbsp;<strong>lễ hội m&ugrave;a xu&acirc;n Nhật Bản.</strong></p>\r\n\r\n<p><img alt=\"Nến họa tiết tại Nhật\" src=\"https://anhduongtours.vn/wp-content/uploads/2018/04/mua-do-thu-cong-my-nghe-tai-nhat-ban-4.png\" style=\"height:393px; width:640px\" /></p>\r\n\r\n<p><em>Nến họa tiết tại Nhật</em></p>\r\n\r\n<h3>4. H&igrave;nh th&ecirc;u Kogin-zashi</h3>\r\n\r\n<p>H&igrave;nh th&ecirc;u Kogin-zashi l&agrave; một mẫu h&igrave;nh th&ecirc;u h&igrave;nh học được tỉ mỉ th&ecirc;u tr&ecirc;n nền vải lanh nhuộm tr&agrave;m. Người ta t&igrave;m thấy những h&igrave;nh th&ecirc;u n&agrave;y từ thời Edo v&agrave; thấy được đ&acirc;y ch&iacute;nh l&agrave; th&agrave;nh quả của sự cần c&ugrave;, s&aacute;ng tạo của con người thời bấy giờ với mục đ&iacute;ch chống lại c&aacute;i lạnh gi&aacute; của m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<p>Ngo&agrave;i 4 m&oacute;n đồ thủ c&ocirc;ng mỹ nghệ nổi tiếng kể tr&ecirc;n, du kh&aacute;ch cũng c&oacute; thể lựa chọn Đồ sơn m&agrave;i Tsugaru, Vải nhuộm Nambu&hellip;v&ocirc; c&ugrave;ng đ&aacute;ng y&ecirc;u để l&agrave;m qu&agrave; lưu niệm mang về Việt Nam mỗi dịp đi du lich tại Nhật Bản.</p>\r\n', 1, 1, '2021-07-22 17:09:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `MaSP` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `TenSp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `DonViTinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `XuatXu` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChiTiet` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `AnhChinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ListAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiBat` tinyint(1) NOT NULL DEFAULT 0,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 1,
  `NgayTao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`MaSP`, `CategoryID`, `TenSp`, `Slug`, `DonViTinh`, `XuatXu`, `MoTa`, `ChiTiet`, `AnhChinh`, `ListAnh`, `NoiBat`, `TrangThai`, `NgayTao`) VALUES
('CBBT02', 31, 'Bộ combo bình trà viền chỉ vàng vẽ hoa sen', 'bo-combo-binh-tra-vien-chi-vang-ve-hoa-sen', '', ' Bát Tràng Việt Nam', 'Bộ combo bình trà viền chỉ vàng vẽ hoa sen', '<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>Bộ b&igrave;nh tr&agrave;: 01 b&igrave;nh + 06 t&aacute;ch + 07 đĩa l&oacute;t + phụ kiện (gạt t&agrave;n thuốc, hũ tăm, hũ đựng tr&agrave;)</p>\r\n\r\n<p>Xuất xứ sản phẩm: B&aacute;t Tr&agrave;ng Việt Nam</p>\r\n\r\n<p>K&iacute;ch thước sản phẩm: 540ml</p>\r\n\r\n<p>Khối lượng sản phẩm: 3200g</p>\r\n\r\n<p>Đ&oacute;ng g&oacute;i: Hộp b&igrave;nh tr&agrave;</p>\r\n', 'binhtra_44.jpg', '', 1, 1, '2021-07-21 17:04:23'),
('KLTB03', 37, 'Khăn trải bàn thêu hoa sen', 'khan-trai-ban-theu-hoa-sen', 'Bộ', 'Làng Vạn Phúc', 'Hoa sen trong phong thủy:\r\nTượng trưng cho sự thanh cao, thoát tục và hoàn mỹ vì sống trong bùn nhưng không hề bị ảnh hưởng. Hoa sen giúp con người có thể tịnh tâm, làm cho không gian trong căn nhà trở nên ấm áp, yên bình hơn.\r\n \r\nVới ý nghĩa thanh lọc, H', '<p><strong><a href=\"https://tuonggohungthinh.vn/\">Hoa sen trong phong thủy</a>:</strong></p>\r\n\r\n<p>Tượng trưng cho&nbsp;<em>sự thanh cao, tho&aacute;t tục v&agrave; ho&agrave;n mỹ&nbsp;</em>v&igrave; sống trong b&ugrave;n nhưng kh&ocirc;ng hề bị ảnh hưởng. Hoa sen gi&uacute;p con người c&oacute; thể&nbsp;<em>tịnh t&acirc;m, l&agrave;m cho kh&ocirc;ng gian trong căn nh&agrave; trở n&ecirc;n ấm &aacute;p, y&ecirc;n b&igrave;nh hơn</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với &yacute; nghĩa thanh lọc, Hoa sen gi&uacute;p điều h&ograve;a kh&iacute; vượng, tăng cường năng lượng tốt v&agrave; ngăn chặn những điều xấu, gi&uacute;p cho gia chủ tr&aacute;nh ưu phiền để tĩnh t&acirc;m an hưởng hạnh ph&uacute;c.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;Bằng đường kim, mũi chỉ đi&ecirc;u luyện, c&aacute;c nghệ nh&acirc;n đ&atilde; dệt n&ecirc;n h&igrave;nh ảnh&nbsp;chiếc<a href=\"https://hadongsilkvietnam.com/khan-lua-23/\"><strong>&nbsp;k</strong></a><strong><a href=\"https://hadongsilkvietnam.com/khan-lua-23/\">hăn trải b&agrave;n th&ecirc;u hoa sen</a>&nbsp;</strong>mang đậm n&eacute;t độc đ&aacute;o<img alt=\"\" src=\"https://hadongsilkvietnam.com/www/uploads/images/san-pham/khan%20trai%20ban%20%26%20vo%20goi/khan-trai-ban-2-1.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sản phẩm &nbsp;c&oacute; thể sử dụng để l&agrave;m&nbsp;<em>qu&agrave; tặng cho bạn b&egrave;, đối t&aacute;c, đặc biệt l&agrave; du kh&aacute;ch nước ngo&agrave;i. Đ&acirc;y sẽ l&agrave; m&oacute;n qu&agrave; nhiều &yacute; nghĩa v&agrave; l&agrave; kỷ vật gắn kết văn h&oacute;a Việt Nam với thế giới</em></p>\r\n', 'khan-trai-ban-2-1_10.png', '', 1, 1, '2021-07-25 16:58:27'),
('KLTB05', 37, ' Bộ khăn lụa trải bàn thêu trúc ', 'bo-khan-lua-trai-ban-theu-truc', 'Bộ', 'Làng Vạn Phúc', 'Bằng đường kim, mũi chỉ điêu luyện, các nghệ nhân đã dệt nên hình ảnh chiếc khăn trải bàn thêu lá trúc mang đậm nét độc đáo\r\n Sản phẩm  có thể sử dụng để làm quà tặng cho bạn bè, đối tác, đặc biệt là du khách nước ngoài. Đây sẽ là món quà nhiều ý nghĩa và', '', 'khan-lua-trai-ban-mnv-kiltb05_compressed_73.png', '', 0, 1, '2021-07-25 16:55:26'),
('LHD53', 34, 'Lụa Áo Dài Hà Đông Họa Tiết Hoa Vàng', 'lua-ao-dai-ha-dong-hoa-tiet-hoa-vang', 'Mét', 'Hà Đông - Hà Nội', 'Lụa Hà Đông (Vạn Phúc) là làng lụa nổi tiếng lâu đời ở Việt Nam. Nhắc đến người con gái Việt Nam người ta luôn gắn liền với hình ảnh những tà áo dài lụa mềm mại, thướt tha. Nào có mấy ai cưỡng lại được vẻ kiều diễm của cô gái ấy khi mặc trên người chiếc á', '<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>1 vải may &aacute;o d&agrave;i + 1 vải may quần</p>\r\n\r\n<p><strong>Xuất xứ sản phẩm:</strong>&nbsp;Lụa H&agrave; Đ&ocirc;ng - Việt Nam</p>\r\n\r\n<p><strong>K&iacute;ch thước sản phẩm:</strong></p>\r\n\r\n<p>01 vải may &aacute;o d&agrave;i 3.5x0.9 (m)</p>\r\n\r\n<p>01 vải may quần d&agrave;i 2.2x0.9 (m)</p>\r\n\r\n<p><strong>Khối lượng sản phẩm:</strong>&nbsp;700g</p>\r\n\r\n<p><strong>Đ&oacute;ng g&oacute;i:</strong>&nbsp;Hộp &aacute;o d&agrave;i</p>\r\n', 'lua-ha-dong-MNV-LHD53_compressed_2.jpg', '', 1, 1, '2021-07-21 21:11:45'),
('LHG600', 42, 'Lọ hoa men rạn vẽ hoa cẩm tú cầu ', 'lo-hoa-men-ran-ve-hoa-cam-tu-cau', 'Lọ', ' Bát Tràng Việt Nam', 'Sản phẩm được nung trong lò gas với nhiệt độ trên 1100 độC, bề mặt ngoài của sản phẩm không tráng men mà được xử lý để sơn mài theo tiêu chuẩn sơn mài truyền thống của làng nghề Hạ Thái - Hà Nội, được dùng làm đồ trang trí nội thất hoặc cắm hoa tươi.', '', 'IMG_9969_80.jpg', '', 0, 1, '2021-07-25 17:33:33'),
('LHGM1515', 42, 'Vò tròn đủ màu', 'vo-tron-du-mau', 'Hộp', 'Bát Tràng', 'Gốm sứ Bát Tràng nói chung và lọ hoa Bát Tràng nói riêng đã dần tạo nên thương hiệu của một làng nghề gốm nổi tiếng ngàn năm của Việt Nam. Không chỉ đơn thuần là mẫu mã đẹp, đa dạng mà còn là chất lượng với độ cứng và sự chịu nhiệt cao cùng những đôi bàn ', '', 'mau-cam-MNV-LHGM1515_74.jpg', '', 0, 1, '2021-07-25 17:31:32'),
('LPT03', 34, 'Lụa áo dài Hà Đông Satin ', 'lua-ao-dai-ha-dong-satin', 'Kg', 'Hà Đông - Hà Nội', 'Bộ sản phẩm bao gồm:\r\n\r\n1 vải may áo dài + 1 vải may quần\r\n\r\nXuất xứ sản phẩm: Lụa Hà Đông - Việt Nam\r\n\r\nKích thước sản phẩm: 01 vải may áo dài 3.5x0.9 (m) 01 vải may quần dài 2.2x0.9 (m)\r\n\r\nKhối lượng sản phẩm: 700g\r\n\r\nĐóng gói: Hộp áo dài', '<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>1 vải may &aacute;o d&agrave;i + 1 vải may quần</p>\r\n\r\n<p><strong>Xuất xứ sản phẩm:</strong>&nbsp;Lụa H&agrave; Đ&ocirc;ng - Việt Nam</p>\r\n\r\n<p><strong>K&iacute;ch thước sản phẩm:</strong>&nbsp;01 vải may &aacute;o d&agrave;i 3.5x0.9 (m) 01 vải may quần d&agrave;i 2.2x0.9 (m)</p>\r\n\r\n<p><strong>Khối lượng sản phẩm:</strong>&nbsp;700g</p>\r\n\r\n<p><strong>Đ&oacute;ng g&oacute;i:</strong>&nbsp;Hộp &aacute;o d&agrave;i</p>\r\n', 'nhung-tam-vai-lua-tinh-te_48.jpg', '', 1, 1, '2021-07-21 21:08:15'),
('MNV', 29, '   Bộ tranh sơn mài Mai Lan Cúc Trúc cẩn nổi', 'bo-tranh-son-mai-mai-lan-cuc-truc-can-noi', 'Hộp', 'Sơn mài Việt Nam', ' TRANH SƠN MÀI MAI LAN CÚC TRÚC - TRANH TỨ QUÝ \r\n\r\nBộ tranh sơn mài gồm 4 tấm ghép lại, kích thước mỗi tấm: 30x60 (cm), mỗi chi tiết được cẩn nổi phù hợp treo ở các không gian như phòng khách, phòng làm việc, phòng ngủ...\r\n\r\nTranh sơn mài tứ quý tuân theo', '<p><em><strong>Tranh sơn m&agrave;i</strong></em> Tứ qu&yacute; thuộc loại tranh bốn bức vẽ cảnh bốn m&ugrave;a: xu&acirc;n, hạ, thu, đ&ocirc;ng. Người treo tranh tứ qu&yacute; kh&ocirc;ng chỉ l&agrave; để trang tr&iacute; m&agrave; c&ograve;n mang nhiều &yacute; nghĩa mong cầu may mắn, ph&uacute; qu&yacute;, sung t&uacute;c v&agrave; mang cả những yếu tố phong thủy trong đ&oacute;. Mỗi bức tranh l&agrave; một lo&agrave;i c&acirc;y, lo&agrave;i hoa tương ứng đại diện cho một m&ugrave;a trong năm.</p>\r\n\r\n<p><img alt=\"Tranh sơn mài mai lan\" src=\"http://tranhsonmaivn.com/www/uploads/images/san-pham/tan-gia-phong-thuy/tranh-son-mai-mai-lan-cuc-truc-mnv--2_compressed.jpg\" /></p>\r\n\r\n<p>Với &yacute; nghĩa mong cầu may mắn, ph&uacute; qu&yacute;, sung t&uacute;c v&agrave; mang cả những yếu tố phong thủy trong đ&oacute;, tranh tứ qu&yacute; th&iacute;ch hợp để l&agrave;m qu&agrave; tặng, trang tr&iacute; nh&agrave; cửa&hellip;. thể hiện tinh thần kh&iacute; kh&aacute;i, h&agrave;o sảng của gia chủ.</p>\r\n\r\n<p>Tranh được họa h&igrave;nh tr&ecirc;n chất liệu sơn m&agrave;i mang lại độ s&aacute;ng b&oacute;ng tinh tế trong họa tiết. Chất liệu sơn m&agrave;i dễ lau sạch, kh&ocirc;ng b&aacute;m bẩn, ố m&agrave;u n&ecirc;n chất lượng tranh rất bền bỉ.</p>\r\n\r\n<p>T&ugrave;ng C&uacute; Tr&uacute;c Mai đắp nổi ( đắp nổi ph&ugrave; đi&ecirc;u): được nghệ nh&acirc;n tạo trước một lớp keo chuy&ecirc;n dụng đặc biệt trong sơn m&agrave;i để tạo h&igrave;nh, sau khi để kh&ocirc; tầm 1 hay 2 ng&agrave;y mới bắt đầu vẽ l&ecirc;n, tạo m&agrave;u sắc cho sinh động. Thường h&agrave;ng đắp nổi được Kh&aacute;ch h&agrave;ng mua nhiều v&igrave; mẫu lu&ocirc;n đẹp, v&agrave;ng đồng sang trọng bắt mắt, tạo h&igrave;nh v&agrave; tạo khối nh&igrave;n c&aacute;c chiều rất h&agrave;i h&ograve;a, sang trọng. Gi&aacute; tranh đắp nổi thường cao hơn c&aacute;c loại kh&aacute;c. C&aacute;c tranh sơn m&agrave;i mẫu đắp nổi thường được kh&aacute;ch y&ecirc;u th&iacute;ch l&agrave; m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng, thuận buồm xu&ocirc;i gi&oacute;, cảnh đồng qu&ecirc;, hoa sen, Ph&uacute;c Lộc Thọ.</p>\r\n\r\n<p><img src=\"https://lh6.googleusercontent.com/pHteC46L77vmd4RR9Nv3j9Ti-nui8RWXMflySZ63n396bRYZ4IbIGZ92CfeR1WjQlSkBChiLNku4Mf4aThdulyIDh0nMCoosvLI3ktki45CnDbD0iDjUA-uAWVHwvbaVSEon7PZQ\" style=\"height:193px; width:292px\" /><img src=\"https://lh6.googleusercontent.com/E_ua1mWem8j3LRQBGw9-Wleynx-r6Lwllk30C0hLZM5hOdiezlLdj06Gw4o--ydDd8O2bR40wEAcVnpbU-Ib53Ol1oOmY1C0Ez0l3UUfXtvndZl8WJhX80FX7GfEFdRQk_MCDWwl\" style=\"height:193px; width:295px\" /></p>\r\n\r\n<p>Đặc th&ugrave; của sản phẩm mỹ nghệ l&agrave; sản xuất thủ c&ocirc;ng ( Kh&ocirc;ng sản xuất c&ocirc;ng nghiệp đại tr&agrave;) v&igrave; vậy sản phẩm l&agrave; t&aacute;c phẩm từ ch&iacute;nh b&agrave;n tay của nghệ nh&acirc;n ( v&iacute; dụ: vẽ, chạm trổ c&aacute;c họa tiết tr&ecirc;n sản phẩm) v&agrave; c&oacute; sự kh&aacute;c nhau lớn giữa c&aacute;c nghệ nh&acirc;n v&agrave; c&aacute;c xưởng sản xuất.</p>\r\n\r\n<p>Mỗi sản phẩm được chế t&aacute;c bởi b&agrave;n tay nghệ nh&acirc;n kh&ocirc;ng phải sản phẩm n&agrave;o cũng giống hệt nhau như sản xuất d&acirc;y chuyền bằng m&aacute;y m&oacute;c. Ngo&agrave;i ra c&ograve;n hiện tượng h&agrave;ng nh&aacute;i hoặc thợ l&agrave;m kh&ocirc;ng chuy&ecirc;n l&agrave;m h&agrave;ng dỏm, h&agrave;ng k&eacute;m chất lượng. V&igrave; vậy, kh&aacute;ch h&agrave;ng cần phải chọn nơi cung cấp uy t&iacute;n v&agrave; am hiểu l&agrave;ng nghề để lựa chọn cho m&igrave;nh sản phẩm ph&ugrave; hợp v&agrave; chất lượng nhất.</p>\r\n', 'tranh-son-mai-mai-lan-cuc-truc-mnv-3_compressed_28.jpg', '', 1, 1, '2021-07-25 17:13:45'),
('SMA360', 29, 'Bộ tranh Cửu Ngư (4 tấm)', 'bo-tranh-cuu-ngu-4-tam', 'Hộp', '', '\"Tranh sơn mài Cửu Ngư\"  còn gọi là tranh Cá chép hoa sen là sản phẩm sơn mài truyền thống, màu sắc rực rỡ sinh động mang ý nghĩa phát tài, sinh lộc, may mắn, thành đạt trong kinh doanh.\r\n\r\n- Hoa sen biểu tượng của sự thanh khiết, liêm chính, trong sạch.\r', '<p><strong>Tranh&nbsp;Cửu Ngư l&agrave; tranh phong thủy</strong>&nbsp;được người mua l&agrave;m qu&agrave; tặng tranh t&acirc;n gia, tranh trang tr&iacute; hợp tuổi,...&nbsp;đ&acirc;y l&agrave; m&oacute;n qu&agrave; v&ocirc; c&ugrave;ng&nbsp;&yacute; nghĩa với gia chủ, với mong muốn gia đ&igrave;nh thuận bề trong kinh doanh, cuộc sống đầy đủ, dư dật.</p>\r\n\r\n<p>Nếu bạn d&ugrave;ng bức tranh phong thủy&nbsp;n&agrave;y để&nbsp;trang tr&iacute; trong nh&agrave; th&igrave; n&ecirc;n lưu &yacute; treo ở những nơi ph&ugrave; hợp với phong thủy của căn nh&agrave;, mang lại&nbsp;<strong>kh&ocirc;ng kh&iacute; tươi mới&nbsp;</strong>cho căn nh&agrave; v&agrave; cũng l&agrave;&nbsp;<strong>sức mạnh tinh thần</strong>&nbsp;cho mọi người với hy vọng&nbsp;<strong>hướng đến những điều tốt đẹp.</strong></p>\r\n\r\n<p>K&iacute;ch thước: 60x120 (cm) - mỗi tấm k&iacute;ch thước 30x60 cm</p>\r\n\r\n<p><img alt=\"\" src=\"http://tranhsonmaivn.com/www/uploads/images/san-pham/Tranh-son-mai/tranhsonmai-cuungu.jpg\" /></p>\r\n\r\n<p><strong>Tranh sơn m&agrave;i</strong>&nbsp;nước ta bắt nguồn từ nghề sơn ta truyền thống, qua sự thử nghiệm, ứng dụng của c&aacute;c nghệ nh&acirc;n trường Cao đẳng Mỹ thuật Đ&ocirc;ng Dương,&nbsp;<strong>tranh sơn m&agrave;i&nbsp;</strong>Việt Nam c&oacute; sự chuyển hướng độc đ&aacute;o, tinh tế tr&ecirc;n bề&nbsp;mặt v&agrave; m&agrave;u sắc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Nghệ thuật sơn m&agrave;i</strong>&nbsp;trong tranh cửu ngư thường sử dụng đắp nổi đồng để l&agrave;m bức tranh trở n&ecirc;n đầy đầy đặn như &yacute; nghĩa dồi d&agrave;o v&agrave; sang trọng từ &aacute;nh v&agrave;ng của sắc đồng thể hiện sự thịnh vượng.</p>\r\n\r\n<p><strong>Tranh sơn m&agrave;i&nbsp;</strong>tu&acirc;n thủ chặt chẽ quy tr&igrave;nh v&agrave; kỹ thuật từ kh&acirc;u l&agrave;m v&oacute;c cho đến kh&acirc;u thể hiện, tạo n&ecirc;n những họa phẩm sơn m&agrave;i đậm bản sắc Việt m&agrave; kh&ocirc;ng một quốc gia n&agrave;o c&oacute; được. Sơn l&agrave; vẽ tranh bằng chất liệu sơn ta, m&agrave;i l&agrave; m&agrave;i bề mặt để lộ ra những mảng m&agrave;u b&ecirc;n trong như mong muốn, chứa đựng cả yếu tố ngẫu nhi&ecirc;n, bất ngờ tạo n&ecirc;n sự độc đ&aacute;o của một t&aacute;c phẩm hội họa ri&ecirc;ng biệt v&agrave; duy nhất. Do đ&oacute; c&oacute; thể n&oacute;i&nbsp;<strong>tranh sơn m&agrave;i</strong>&nbsp;l&agrave; quốc họa Việt Nam.&nbsp;</p>\r\n\r\n<p>Như vậy, việc lưu giữ v&agrave; trang tr&iacute;<strong>&nbsp;tranh sơn m&agrave;i&nbsp;</strong>kh&ocirc;ng chỉ l&agrave; n&eacute;t đẹp m&agrave; c&ograve;n l&agrave; c&aacute;ch để thể hiện l&ograve;ng tự h&agrave;o d&acirc;n tộc của ch&uacute;ng ta.&nbsp; &nbsp;</p>\r\n\r\n<p>Mỹ Nghệ Việt cung cấp đầy đủ c&aacute;c loại tranh phong thủy, tranh t&acirc;n gia, tranh trang tr&iacute; hợp tuổi.</p>\r\n', 'tranhsonmai-cuungu_51.jpg', '', 0, 1, '2021-07-25 17:24:00'),
('SMMT01', 29, 'Tranh sơn mài Phong cảnh Đồng quê Cao cấp', 'tranh-son-mai-phong-canh-dong-que-cao-cap', 'Hộp', 'Sơn mài Việt Nam', 'Đồng quê Việt Nam luôn là nguồn cảm hứng bất tận của những người nghệ sĩ yêu quê hương. Những cánh đồng lúa bạt ngàn, những con người lao động chân chất nhưng cần cù chịu thương chịu khó.... là những nét đẹp của đất nước trong mắt nhân dân và bạn bè quốc ', '<p>C&aacute;c&nbsp;<strong>bức tranh&nbsp;</strong><strong>phong cảnh l&agrave;ng qu&ecirc; Việt Nam</strong>&nbsp;với những h&igrave;nh ảnh quen thuộc như gốc đa giếng nước, cậu b&eacute; chăn tr&acirc;u thổi s&aacute;o,&hellip;Những h&igrave;nh ảnh của l&agrave;ng qu&ecirc; vừa mộc mạc, giản dị lại vừa thể hiện vẻ đẹp thơ mộng, y&ecirc;n b&igrave;nh của l&agrave;ng qu&ecirc; Việt Nam. Những h&igrave;nh ảnh từ tranh l&agrave;ng qu&ecirc;&nbsp;n&agrave;y gợi nhớ cho ch&uacute;ng ta nỗi nhớ nhung mam m&aacute;c về sự y&ecirc;n b&igrave;nh kh&ocirc;ng thể phai nh&ograve;a trong t&acirc;m thức mỗi người d&acirc;n Việt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>X&atilde; hội ng&agrave;y c&agrave;ng hiện đại, những h&igrave;nh ảnh quen thuộc của phong cảnh&nbsp;l&agrave;ng qu&ecirc; Việt Nam dần được thay thể bởi những khu c&ocirc;ng nghiệp với những nh&agrave; m&aacute;y, m&aacute;y m&oacute;c hiện đại,&hellip;khiến bạn kh&ocirc;ng được ngắm những h&igrave;nh ảnh đẹp của qu&ecirc; hương th&acirc;n thương ng&agrave;y xưa nữa. Ch&iacute;nh v&igrave; thế, bằng những n&eacute;t vẽ tinh tế, c&aacute;c họa sĩ đ&atilde; s&aacute;ng tạo n&ecirc;n những bức tranh phong cảnh l&agrave;ng qu&ecirc; Việt Nam để gi&uacute;p bạn c&oacute; thể lại được thấy những h&igrave;nh ảnh th&acirc;n thuộc của tuổi thơ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://tranhsonmaivn.com/www/uploads/images/smtt01-1.jpg\" /></p>\r\n\r\n<ul>\r\n	<li>Những bức&nbsp;<strong>tranh phong cảnh l&agrave;ng qu&ecirc;</strong>&nbsp;sẽ mang lại cho bạn cảm gi&aacute;c y&ecirc;n b&igrave;nh v&agrave; thoải m&aacute;i.</li>\r\n	<li>&nbsp;</li>\r\n	<li>Kh&ocirc;ng chỉ thế, ch&uacute;ng cũng khiến cho kh&ocirc;ng gian căn ph&ograve;ng của bạn trở n&ecirc;n tươi mới v&agrave; độc đ&aacute;o hơn.</li>\r\n	<li>&nbsp;</li>\r\n	<li>Nếu bạn l&agrave; người xa qu&ecirc; đ&atilde; nhiều năm th&igrave;&nbsp;<strong>bức tranh phong cảnh l&agrave;ng qu&ecirc;</strong>&nbsp;sẽ gi&uacute;p bạn vơi đi phần n&agrave;o nỗi nhớ về qu&ecirc; nh&agrave; th&acirc;n thương với những h&igrave;nh ảnh th&acirc;n thuộc được t&aacute;i hiện lại một c&aacute;ch ch&acirc;n thực, tinh tế.</li>\r\n	<li>&nbsp;</li>\r\n	<li>Kh&ocirc;ng chỉ thế, n&oacute; c&ograve;n gi&uacute;p cho những người gốc th&agrave;nh thị c&oacute; thể hiểu hơn về cuộc sống của người d&acirc;n Việt xưa khi những h&igrave;nh ảnh của l&agrave;ng qu&ecirc; dần được thay thế bởi những khu đ&ocirc; thị, khu c&ocirc;ng nghiệp hiện đại.</li>\r\n	<li>&nbsp;</li>\r\n	<li>C&aacute;c bức tranh phong cảnh l&agrave;ng qu&ecirc; nếu được trang tr&iacute; ở ph&ograve;ng kh&aacute;ch sẽ l&agrave;m cho kh&ocirc;ng gian nơi đ&acirc;y trở n&ecirc;n v&ocirc; c&ugrave;ng độc đ&aacute;o v&agrave; sang trọng.</li>\r\n	<li>&nbsp;</li>\r\n	<li>C&aacute;c&nbsp;<strong>bức tranh phong cảnh l&agrave;ng qu&ecirc;</strong>&nbsp;cũng được nhiều người lựa chọn để l&agrave;m qu&agrave; cho người th&acirc;n hoặc bạn b&egrave; đang sinh sống ở nước ngo&agrave;i để gi&uacute;p họ vơi đi nỗi nhớ qu&ecirc; nh&agrave; qua những h&igrave;nh ảnh th&acirc;n thuộc của l&agrave;ng qu&ecirc;.</li>\r\n</ul>\r\n\r\n<p>.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://tranhsonmaivn.com/www/uploads/images/smtt01-1c.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tranh sơn m&agrave;i l&agrave;ng qu&ecirc; Việt Nam được c&aacute;c nghệ nh&acirc;n thực hiện một c&aacute;ch tỉ mỉ qua nhiều giai đoạn mới c&oacute; thể cho ra một sản phẩm ho&agrave;n mỹ đến vậy</p>\r\n\r\n<p><strong>Tranh sơn m&agrave;i</strong>&nbsp;nước ta bắt nguồn từ nghề sơn ta truyền thống, qua sự thử nghiệm, ứng dụng của c&aacute;c nghệ nh&acirc;n trường Cao đẳng Mỹ thuật Đ&ocirc;ng Dương,&nbsp;<strong>tranh sơn m&agrave;i</strong>&nbsp;Việt Nam c&oacute; sự chuyển hướng độc đ&aacute;o, tinh tế tr&ecirc;n bề&nbsp;mặt v&agrave; m&agrave;u sắc.</p>\r\n', 'smtt01-1_46.jpg', '', 0, 1, '2021-07-25 17:22:25'),
('SMTT001', 29, 'Tranh sơn mài Hoa hiện đại', 'tranh-son-mai-hoa-hien-dai', 'Hộp', 'Sơn mài Việt Nam', 'Tranh trang trí phòng khách hiện đại, tranh trang trí phòng ngủ, tranh trang trí tường, tranh trang trí nội thất gia đình.\r\n \r\nTranh ảnh làm nên sự sinh động của ngôi nhà. Thông thường, tranh được treo theo quy tắc hài hòa, cân đối với mảng tường, giữa cá', '<p><strong>K&iacute;ch thước: 120x60cm</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"http://tranhsonmaivn.com/www/uploads/images/h7-1.jpg\" /></strong></p>\r\n\r\n<p>Để cho ra những sản phẩm&nbsp;tranh trang tr&iacute; ph&ograve;ng kh&aacute;ch hiện đại, tranh trang tr&iacute; ph&ograve;ng ngủ, tranh trang tr&iacute; tường, tranh trang tr&iacute; nội thất gia đ&igrave;nh. Nghệ nh&acirc;n phải mất&nbsp;từ 45-60 ng&agrave;y mới ho&agrave;n thiện xong bức tranh Sơn M&agrave;i, c&oacute; thể cho ch&uacute;ng ta thấy kh&ocirc;ng chỉ y&ecirc;u l&agrave; c&oacute; thể l&agrave;m m&agrave; c&ograve;n li&ecirc;n qu&aacute;n đến t&iacute;nh ki&ecirc;n nhẫn của con người y&ecirc;u c&aacute;i đẹp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>5 v&iacute; dụ cụ thể dưới&nbsp;đ&acirc;y l&agrave; những gợi &yacute; nho nhỏ cho bạn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Số lẻ</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bỏ qua nguy&ecirc;n tắc đối xứng trong một số trường hợp, bạn treo tranh với số lẻ c&oacute; thể tạo một sự th&uacute; vị về mặt thị gi&aacute;c. Bạn c&oacute; thể sắp xếp những bức tranh lẻ tr&ecirc;n một mảng tường nhất định v&agrave; tạo sự c&acirc;n đối tr&ecirc;n một vật g&igrave; đ&oacute; (chẳng hạn những bức tranh nằm c&acirc;n đối tr&ecirc;n chiều ngang kệ tủ hay vừa đủ chiều d&agrave;i của l&ograve; sưởi giả. C&oacute; thể &aacute;p dụng trường hợp n&agrave;y với những chiếc đĩa, khay treo...)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Theo chiều thẳng đứng</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong những mảng tường nhỏ hẹp, bạn vẫn c&oacute; thể trang ho&agrave;ng bằng v&agrave;i bức tranh nhỏ. Chẳng hạn, v&agrave;i bức gốm gắn tr&ecirc;n tường theo chiều dọc để tạo một kh&ocirc;ng gian xinh xắn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Treo x&ocirc;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Những bức tranh theo t&ocirc;ng m&agrave;u nh&atilde; được l&agrave;m cho cho sinh động hơn nhờ c&aacute;ch b&agrave;i tr&iacute; s&aacute;ng tạo. Những bức tranh&nbsp;thoạt nh&igrave;n c&oacute; vẻ như được treo một c&aacute;ch x&ocirc; lệch song ch&uacute;ng lại mang một trật tự nhất định, tạo ra cảm gi&aacute;c mới lạ v&agrave; ph&oacute;ng kho&aacute;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Chuyển động theo bậc cầu thang</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cầu thang cũng l&agrave; một địa điểm th&iacute;ch hợp để treo tranh, tuy nhi&ecirc;n để tạo hiệu quả thị gi&aacute;c, cầu thang phải đủ rộng, v&agrave; khoảng c&aacute;ch của c&aacute;c bức tranh c&acirc;n đối, theo chiều đi l&ecirc;n của c&aacute;c bậc thanh, đồng thời khổ của tranh kh&ocirc;ng n&ecirc;n qu&aacute; lớn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>G&oacute;c nhỏ nghệ thuật</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Những ảnh đ&oacute;ng khung được b&agrave;y ngẫu nhi&ecirc;n tr&ecirc;n gi&aacute; c&ugrave;ng v&agrave;i đồ trang tr&iacute; nhỏ đơn giản lại c&oacute; thể l&agrave;m cho căn ph&ograve;ng &ldquo;art&rdquo; hẳn l&ecirc;n, cho d&ugrave; đ&oacute; chỉ l&agrave; những tấm thiệp, những bức ảnh đen trắng&hellip;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tại đ&acirc;y ch&uacute;ng t&ocirc;i cung cấp đầy đủ c&aacute;c loại tranh trang tr&iacute; ph&ograve;ng kh&aacute;ch hiện đại, tranh trang tr&iacute; ph&ograve;ng ngủ, tranh trang tr&iacute; tường, tranh trang tr&iacute; nội thất gia đ&igrave;nh.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch c&oacute; thể xem th&ecirc;m nhiều sản phẩm li&ecirc;n quan&nbsp;kh&aacute;c&nbsp;<a href=\"http://tranhsonmaivn.com/tranh-hien-dai-4/\"><strong>TẠI Đ&Acirc;Y</strong></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>SẢN PHẨM QU&Agrave; TẶNG ĐẬM Đ&Agrave; BẢN SẮC</p>\r\n\r\n<p>Sản phẩm tranh sơn m&agrave;i c&ugrave;ng với những sản phẩm kh&aacute;c&nbsp;của ch&uacute;ng t&ocirc;i nhiều năm qua được sử dụng l&agrave;m&nbsp;qu&agrave; tặng th&acirc;n thuộc cho c&aacute;c tổ chức, t&ocirc;ng c&ocirc;ng ty, tập đo&agrave;n v&agrave; thương hiệu trong v&agrave; ngo&agrave;i nước như: Tập đo&agrave;n&nbsp;<strong>FPT</strong>, Ng&acirc;n h&agrave;ng&nbsp;<strong>Vietcombank</strong>, Ng&acirc;n h&agrave;ng&nbsp;<strong>BIDV</strong>, Ng&acirc;n h&agrave;ng&nbsp;<strong>OCB</strong>, Trường Đại học&nbsp;<strong>Hutech</strong>, Gạch&nbsp;<strong>Đồng T&acirc;m Long An</strong>, Thương hiệu xe&nbsp;<strong>Mercesdes</strong>, Thương hiệu xe&nbsp;<strong>Toyota</strong>, Trung t&acirc;m hội nghị&nbsp;<strong>Gem Center</strong>. Mỹ Nghệ Việt l&agrave; đơn vị&nbsp;đ&atilde;&nbsp;thực hiện được những đơn h&agrave;ng lớn tr&ecirc;n&nbsp;<strong>10.000 phần qu&agrave; tặng</strong>&nbsp;cho c&aacute;c c&ocirc;ng ty lớn.&nbsp;Q&uacute;y kh&aacute;ch c&oacute; thể trải nghiệm c&aacute;c dịch vụ qu&agrave; tặng doanh nghiệp m&agrave; ch&uacute;ng t&ocirc;i đ&atilde; thực hiện tại:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'h7_62.jpg', '', 0, 1, '2021-07-25 17:15:47'),
('TB01', 26, 'Mô hình tàu thuyền chở hàng France II gỗ tự nhiên', 'mo-hinh-tau-thuyen-cho-hang-france-ii-go-tu-nhien', 'Hộp', 'Việt Nam', 'France II được làm thủ công (bằng tay) với kỹ thuật như kỹ thuật đóng thuyền thật. Thân tàu làm bằng gỗ, buồm vải, dây dù, các chi tiết chạm trổ như mỏ neo được làm bằng kim loại, bảng tên và chân đế làm bằng đồng thau.\r\nKhi mua thuyền, bạn nên đặc biệt c', '<p>Ở trung t&acirc;m chiếc thuyền l&agrave; ph&ograve;ng ch&iacute;nh&nbsp;gồm 3 tầng, y như cấu tr&uacute;c thật, c&aacute;c khung &ocirc; cửa sổ được thiết kế bằng đồng, lan can l&agrave;m đến từng chi tiết nhỏ cũng l&agrave;m từ đồng bao bọc xung quanh, ngo&agrave;i ra&nbsp;c&aacute;c chi tiết trang tr&iacute; với c&aacute;c họa tiết ng&ocirc;i sao, v&ograve;ng tr&ograve;n c&aacute;c h&igrave;nh dạng kh&aacute;c đều được l&agrave;m từ đồng, v&ocirc; c&ugrave;ng sang trọng v&agrave; chắc chắn. C&aacute;c thợ l&agrave;m thuyền rất kh&eacute;o l&eacute;o trong việc kết hợp m&agrave;u sắc gỗ l&agrave;m cho chi ti&ecirc;t sản phẩm trở n&ecirc;n thật hơn v&agrave; sống động hơn.</p>\r\n\r\n<p>Cầu thang gỗ l&agrave;m th&agrave;nh nhiều bậc bắt l&ecirc;n c&aacute;c trạm của con thuyền.&nbsp;D&acirc;y d&ugrave; căng buồm được&nbsp;đan nối nhau nh&igrave;n rất chắc chắn, tạo độ vững chắc để c&aacute;nh buồm vươn l&ecirc;n thẳng tắp.</p>\r\n\r\n<p>Phần đu&ocirc;i thuyền c&oacute; b&aacute;nh v&ocirc; lăng đồng, c&oacute; thể xoay qua lại được, tr&ocirc;ng rất giống thật.&nbsp;Đ&acirc;y l&agrave; tổng quan về con thuyền chở h&agrave;ng France II, nh&igrave;n cực k&igrave; sang trọng, đầy đủ c&aacute;c bộ phận, v&ocirc; v&ugrave;ng chắc chắn v&agrave; tinh xảo.</p>\r\n', 'viptt5_54.jpg', 'IMG_7620_22.jpg', 1, 1, '2021-07-25 17:05:41'),
('TB18', 26, 'Mô hình tàu thuyền chở hàng France', 'mo-hinh-tau-thuyen-cho-hang-france', 'Hộp', 'Việt Nam', 'France II được làm thủ công (bằng tay) với kỹ thuật như kỹ thuật đóng thuyền thật. Thân tàu làm bằng gỗ, buồm vải, dây dù, các chi tiết chạm trổ như mỏ neo được làm bằng kim loại, bảng tên và chân đế làm bằng đồng thau.\r\nKhi mua thuyền, bạn nên đặc biệt c', '<p><strong>Lịch sử</strong></p>\r\n\r\n<p>The France II được mệnh danh l&agrave; con t&agrave;u chở h&agrave;ng thanh lịch nhất thế giới. T&agrave;u được trang bị nhiều nội thất gỗ tuyệt đẹp. Boong t&agrave;u được ốp gỗ, sảnh chờ trang tr&iacute; với một chiếc piano đắt đỏ, 7 cabin xa hoa cho kh&aacute;ch, một thư viện, một buồng tối để xem phim, v&agrave; đầy đủ thiết bị kh&aacute;m chữa bệnh.</p>\r\n\r\n<p><strong>France II - T&agrave;u chở h&agrave;ng thanh lịch nhất lịch sử</strong></p>\r\n\r\n<p>Được đ&oacute;ng tại những xưởng t&agrave;u dọc bờ s&ocirc;ng Garonne thơ mộng của xứ Bordeaux, dưới sự chỉ đạo của thiết kế trưởng t&agrave;i hoa Gustave Leverne (1861&ndash;1940), The France II đ&atilde; ra đời v&agrave; trở th&agrave;nh một t&aacute;c phẩm tuyệt đẹp của ng&agrave;nh t&agrave;u biển.</p>\r\n\r\n<p>Ban đầu The France II được đ&oacute;ng để d&ugrave;ng l&agrave;m t&agrave;u thương mại chuy&ecirc;n vận chuyển quặng nickel, n&oacute; l&agrave; chiếc t&agrave;u biển thứ hai của nước Ph&aacute;p được mang t&ecirc;n gọi của quốc gia n&agrave;y v&agrave; đồng thời cũng l&agrave; con t&agrave;u thương mại lớn thứ hai tr&ecirc;n thế giới tại thời điểm được đ&oacute;ng.</p>\r\n\r\n<p>The France II được trang bị hai động cơ diesel Schneider 950 m&atilde; lực. Thủy thủ đo&agrave;n của t&agrave;u l&ecirc;n đến hơn 40 th&agrave;nh vi&ecirc;n bao gồm thuyền trưởng, thuyền ph&oacute;, thủy thủ, đầu bếp, thợ mộc, thợ đ&oacute;ng t&agrave;u&hellip;</p>\r\n\r\n<p>Nhưng điểm đặc biệt nhất của The France II nằm ở chỗ n&oacute; được mệnh danh l&agrave; con t&agrave;u chở h&agrave;ng thanh lịch nhất thế giới. Mặc d&ugrave; l&agrave; t&agrave;u chở h&agrave;ng, nhưng The France II c&ograve;n chở được h&agrave;nh kh&aacute;ch với chất lượng dịch vụ thật sự cao cấp v&agrave; sang trọng. Con t&agrave;u được trang bị nhiều nội thất gỗ tuyệt đẹp. Boong t&agrave;u được ốp gỗ, sảnh chờ trang tr&iacute; với một chiếc piano (v&agrave;o thời đ&oacute; piano l&agrave; m&oacute;n đồ nội thất rất xa xỉ), 7 cabin xa hoa cho kh&aacute;ch, một thư viện, một buồng tối để&nbsp;xem phim, v&agrave; đầy đủ thiết bị kh&aacute;m chữa bệnh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nếu chỉ nh&igrave;n v&agrave;o kiểu d&aacute;ng b&ecirc;n ngo&agrave;i của The france II th&ocirc;i cũng c&oacute; thể nhận thấy t&iacute;nh nghệ thuật v&agrave; sự l&atilde;ng mạn đặc trưng của nước Ph&aacute;p. Th&acirc;n t&agrave;u mảnh mai, phần đu&ocirc;i t&agrave;u được k&eacute;o d&agrave;i thanh tho&aacute;t, 5 cột buồm rất cao tạo n&ecirc;n vẻ ngo&agrave;i tao nh&atilde; v&agrave; qu&yacute; tộc.</p>\r\n\r\n<p>Tuy nhi&ecirc;n về cuối đời th&igrave; The France II lại c&oacute; một kết cục buồn. V&agrave;o đ&ecirc;m 12 th&aacute;ng 7 năm 1992, The France II bị mắc cạn tại vịnh Teremba khi đang chở đầy quặng chrom từ Pouembout. Chuyến mắc cạn n&agrave;y đ&atilde; l&agrave;m thất tho&aacute;t một lượng quặng rất lớn v&agrave; cuối c&ugrave;ng th&igrave; chủ t&agrave;u đ&atilde; quyết định kh&ocirc;ng chi đồng n&agrave;o để k&eacute;o t&agrave;u về.</p>\r\n\r\n<p>Thật ra th&igrave; nguy&ecirc;n nh&acirc;n ch&iacute;nh nằm ở chỗ k&iacute;ch cỡ qu&aacute; &ldquo;khủng&rdquo; của The France II (nhất l&agrave; do cột buồm qu&aacute; cao) khiến người ta chẳng thể t&igrave;m được con t&agrave;u k&eacute;o n&agrave;o vừa với n&oacute;. C&oacute; thể n&oacute;i những yếu tố l&agrave;m n&ecirc;n vẻ đẹp của The France II đ&atilde; khiến n&oacute; kh&ocirc;ng thể cứu nổi. V&agrave; thế l&agrave; con t&agrave;u cứ l&ecirc;nh đ&ecirc;nh mục rữa tr&ecirc;n biển cho đến năm 1994, một chiếc m&aacute;y bay n&eacute;m bom của Mỹ đ&atilde; n&eacute;m tan t&agrave;nh những g&igrave; c&ograve;n s&oacute;t lại của n&oacute; trong một buổi tập trận.</p>\r\n', 'tb18_71.jpg', 'tauthuyenmohinh-tb18-4_13.jpg', 0, 1, '2021-07-25 17:02:42'),
('TB60', 26, 'Mô Hình Tàu Thuyền Thailan', 'mo-hinh-tau-thuyen-thailan', 'Hộp', 'Việt Nam', 'Bộ sản phẩm bao gồm:\r\n\r\n01 mô hình tàu thuyền\r\n\r\nXuất xứ sản phẩm: Việt Nam\r\n\r\nKích thước sản phẩm: Thân 60 cm\r\n\r\nKhối lượng sản phẩm: 3000g\r\n\r\nĐóng gói: Hộp sản phẩm', '<p><strong><a href=\"http://tauthuyenmohinh.com/tau-cho-hang-9/\" target=\"_blank\">M&ocirc; h&igrave;nh t&agrave;u thuyền chở h&agrave;ng</a></strong>&nbsp;Thailand Được l&agrave;m thủ c&ocirc;ng (bằng tay) với kỹ thuật như kỹ thuật đ&oacute;ng thuyền thật.&nbsp;Th&acirc;n t&agrave;u&nbsp;l&agrave;m bằng gỗ, buồm vải, d&acirc;y d&ugrave;, c&aacute;c&nbsp;chi tiết chạm trổ như mỏ neo được l&agrave;m bằng kim loại, bảng t&ecirc;n v&agrave; ch&acirc;n đế l&agrave;m&nbsp;bằng đồng thau.</p>\r\n\r\n<p>Khi mua thuyền, bạn n&ecirc;n đặc biệt ch&uacute; trọng c&aacute;c chi tiết b&ecirc;n tr&ecirc;n bề mặt thuyền, tr&aacute;nh trường hợp chọn m&ocirc; h&igrave;nh thuyền với bề mặt gỗ trơn tru m&agrave; kh&ocirc;ng c&oacute; c&aacute;c chi tiết phụ, sẽ l&agrave;m mất gi&aacute; trị chiếc thuyền. Nếu quan s&aacute;t kĩ lưỡng, c&oacute; thể thấy t&agrave;u thuyền m&ocirc; h&igrave;nh tại Mỹ Nghệ Việt được l&agrave;m rất tỉ mỉ đến từng chi tiết nhỏ như m&ocirc; h&igrave;nh thật.</p>\r\n\r\n<p>V&igrave; được tạo n&ecirc;n dựa v&agrave;o m&ocirc; h&igrave;nh thật, cho n&ecirc;n t&agrave;u Th&aacute;i Lan cẩm&nbsp;c&oacute; đầy đủ c&aacute;c bộ phận tr&ecirc;n t&agrave;u.&nbsp;Quan s&aacute;t h&igrave;nh ảnh, c&oacute; thể thấy được từng chi tiết được l&agrave;m kh&ocirc;ng hề sơ s&agrave;i như những h&agrave;ng đ&oacute;ng thuyền kh&aacute;c.</p>\r\n', 'tau_59.jpg', '', 1, 1, '2021-07-22 21:25:38'),
('TS565', 44, 'Bộ Ấm chén Bát Tràng men hỏa biến nhị ẩm', 'bo-am-chen-bat-trang-men-hoa-bien-nhi-am', '', ' Bát Tràng Việt Nam', 'Bộ Ấm chén Bát Tràng men hỏa biến nhị ẩm MNV-TS565', '<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>01 b&igrave;nh tr&agrave; + 02 t&aacute;ch + 02 dĩa l&oacute;t</p>\r\n\r\n<p><strong>Xuất xứ sản phẩm:</strong>&nbsp;B&aacute;t Tr&agrave;ng Việt Nam</p>\r\n\r\n<p><strong>K&iacute;ch thước sản phẩm:</strong>&nbsp;350ml</p>\r\n\r\n<p><strong>Khối lượng sản phẩm:</strong>&nbsp;1000gr</p>\r\n\r\n<p><strong>Đ&oacute;ng g&oacute;i:</strong>&nbsp;Hộp Sản Phẩm</p>\r\n', 'ts565-10_result_compressed_37.jpg', '', 1, 1, '2021-07-21 17:13:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `ID` int(11) NOT NULL,
  `TieuDe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LinkAnh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `STT` tinyint(4) NOT NULL DEFAULT 0,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`ID`, `TieuDe`, `LinkAnh`, `STT`, `TrangThai`, `NgayTao`) VALUES
(18, 'banner1', 'banner_1_85.jpg', 0, 1, '2021-07-26 08:26:24'),
(19, 'banner2', 'photo-1497218770144-3fea6dbc33fe_13.jpg', 1, 1, '2021-07-26 08:27:42'),
(20, 'banner3', 'photo-1589051079002-b140a970f568_100.jpg', 2, 1, '2021-07-26 08:28:05'),
(21, 'banner4', 'photo-1616706161242-f1d591350d1c_56.jpg', 4, 1, '2021-07-26 08:28:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `HoTen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp(),
  `TaiKhoan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID`, `HoTen`, `DiaChi`, `SoDienThoai`, `NgayTao`, `TaiKhoan`, `MatKhau`, `TrangThai`) VALUES
(3, 'TA', 'Ha Noi', '0123456', '2021-04-08 23:45:54', 'admin', '8d8b9c1c86762caedc51846d55014f09', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `detailedproducts`
--
ALTER TABLE `detailedproducts`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `detailsbill`
--
ALTER TABLE `detailsbill`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`MaSP`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `detailedproducts`
--
ALTER TABLE `detailedproducts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `detailsbill`
--
ALTER TABLE `detailsbill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
