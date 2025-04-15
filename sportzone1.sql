-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2025 at 02:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportzone1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bien_the_sp`
--

DROP TABLE IF EXISTS `bien_the_sp`;
CREATE TABLE IF NOT EXISTS `bien_the_sp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sp_id` int NOT NULL,
  `mau_id` int DEFAULT NULL,
  `size_id` int NOT NULL,
  `ton_kho` int NOT NULL DEFAULT '0',
  `don_gia` int NOT NULL DEFAULT '0',
  `trang_thai` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_sp_id_bien_the` (`sp_id`),
  KEY `fk_mau_id_bien_the` (`mau_id`),
  KEY `fk_size_id_bien_the` (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bien_the_sp`
--

INSERT INTO `bien_the_sp` (`id`, `sp_id`, `mau_id`, `size_id`, `ton_kho`, `don_gia`, `trang_thai`) VALUES
(7, 43, 3, 1, 0, 11, 0),
(8, 43, 3, 2, 0, 11, 0),
(9, 43, 3, 3, 5, 11, 0),
(12, 43, 3, 5, 0, 11, 0),
(13, 42, 4, 1, 0, 111, 1),
(14, 42, 4, 2, 0, 111, 1),
(15, 42, 4, 3, 0, 111, 1),
(16, 42, 4, 5, 0, 111, 1),
(25, 42, 2, 1, 411, 111432, 1),
(26, 42, 2, 2, 2, 1114324, 1),
(27, 42, 2, 3, 11, 11, 1),
(28, 42, 2, 5, 0, 11123, 1),
(29, 42, 3, 1, 0, 11111, 1),
(30, 42, 3, 2, 111, 111, 1),
(31, 42, 3, 3, 0, 111, 1),
(32, 42, 3, 5, 0, 111, 1),
(33, 44, 3, 1, 0, 111, 0),
(34, 44, 3, 2, 0, 111, 0),
(35, 44, 3, 3, 0, 111, 0),
(36, 44, 3, 5, 0, 111, 0);

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

DROP TABLE IF EXISTS `binh_luans`;
CREATE TABLE IF NOT EXISTS `binh_luans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_sp_id_binh_luan` (`san_pham_id`),
  KEY `fk_user_id_binh_luan` (`tai_khoan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

DROP TABLE IF EXISTS `chi_tiet_don_hangs`;
CREATE TABLE IF NOT EXISTS `chi_tiet_don_hangs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `don_hang_id` int DEFAULT NULL,
  `bien_the_id` int DEFAULT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_don_hang_id_chi_tiet_don_hang` (`don_hang_id`),
  KEY `fk_var_id_chi_tiet_don_hang` (`bien_the_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

DROP TABLE IF EXISTS `chi_tiet_gio_hangs`;
CREATE TABLE IF NOT EXISTS `chi_tiet_gio_hangs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gio_hang_id` int NOT NULL,
  `bien_the_id` int NOT NULL,
  `so_luong` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gio_hang_id_chi_tiet_gio_hang` (`gio_hang_id`),
  KEY `fk_var_id_chi_tiet_gio_hang` (`bien_the_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `bien_the_id`, `so_luong`) VALUES
(8, 3, 25, 8),
(9, 3, 27, 1),
(10, 3, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

DROP TABLE IF EXISTS `chuc_vus`;
CREATE TABLE IF NOT EXISTS `chuc_vus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_chuc_vu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'Quản trị viên'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

DROP TABLE IF EXISTS `danh_mucs`;
CREATE TABLE IF NOT EXISTS `danh_mucs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_danh_muc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Chó ta', 'Danh mục chó ta'),
(2, 'Mèo tây', 'Danh mục sản phẩm mèo tây'),
(5, 'Mèo ai cập', 'Mèo này không lông'),
(6, '1111', '111');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

DROP TABLE IF EXISTS `don_hangs`;
CREATE TABLE IF NOT EXISTS `don_hangs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ma_don_hang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dia_chi_nguoi_nhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tk_id_don_hang` (`tai_khoan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(1, 'DH-123', 3, 'Tạ Văn Định', 'dinhtv7@fpt.edu.vn', '0987654321', '13 Trịnh Văn Bô, Hà Nội', '2024-07-19', '900000.00', 'Vui lòng cho chó vào giỏ', 1, 2),
(2, 'DH-124', 1, 'Tạ Văn Quyết111', 'dinhtv8@fpt.edu.vn', '0123456789', '13 Trịnh Văn Bô, Hà Nội, Việt Nam', '2024-07-19', '1000000.00', 'Ship nhanh không chó đói', 1, 9),
(3, 'DH9365', 3, 'Tạ trần bình1', 'binh1102@gmail.com', '0829998929', 'Số 1 Ba Đình', '2024-08-12', '38630264.00', '', 1, 1),
(4, 'DH1265', 3, 'Tạ trần bình1', 'binh1102@gmail.com', '0829998929', 'Số 1 Ba Đình', '2024-08-12', '38630264.00', '', 1, 1),
(5, 'DH-3853', 3, 'Tạ trần bình1', 'binh1102@gmail.com', '0829998929', 'Số 1 Ba Đình', '2024-08-12', '38630264.00', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

DROP TABLE IF EXISTS `gio_hangs`;
CREATE TABLE IF NOT EXISTS `gio_hangs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tai_khoan_id` int DEFAULT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tk_id_gio_hang` (`tai_khoan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`, `ngay_tao`, `trang_thai`) VALUES
(3, 3, '2025-04-13 03:25:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

DROP TABLE IF EXISTS `hinh_anh_san_phams`;
CREATE TABLE IF NOT EXISTS `hinh_anh_san_phams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_san_pham` int NOT NULL,
  `mau_id` int NOT NULL,
  `link_hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `fk_mau_id_hinh_anh_sp` (`mau_id`),
  KEY `fk_sp_id_hinh_anh` (`id_san_pham`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `id_san_pham`, `mau_id`, `link_hinh_anh`) VALUES
(52, 42, 2, './uploads/1744453889novaflow.jpg'),
(53, 42, 3, './uploads/1744085355novaflow.jpg'),
(54, 42, 4, './uploads/1744085355novaflow2.png'),
(55, 42, 3, './uploads/17441720761051A064_103_SR_RT_GLB.webp'),
(57, 42, 4, './uploads/1744107112asicslogo.jpg'),
(58, 42, 2, './uploads/1744453889novaflow2.png'),
(59, 42, 2, './uploads/17442604771051A058_101_SR_RT_GLB.webp'),
(60, 42, 2, './uploads/17442604771051A064_103_SR_RT_GLB.webp'),
(63, 42, 2, './uploads/1744260477novaflow.jpg'),
(64, 42, 2, './uploads/1744260477novaflow2.png');

-- --------------------------------------------------------

--
-- Table structure for table `kich_co_sp`
--

DROP TABLE IF EXISTS `kich_co_sp`;
CREATE TABLE IF NOT EXISTS `kich_co_sp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kich_co` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kich_co_sp`
--

INSERT INTO `kich_co_sp` (`id`, `kich_co`) VALUES
(1, '37'),
(2, '37,5'),
(3, '38'),
(5, '38,5');

-- --------------------------------------------------------

--
-- Table structure for table `mau_sp`
--

DROP TABLE IF EXISTS `mau_sp`;
CREATE TABLE IF NOT EXISTS `mau_sp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mau_sac` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mau_sp`
--

INSERT INTO `mau_sp` (`id`, `mau_sac`) VALUES
(2, 'Blue'),
(3, 'Red'),
(4, 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

DROP TABLE IF EXISTS `phuong_thuc_thanh_toans`;
CREATE TABLE IF NOT EXISTS `phuong_thuc_thanh_toans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_phuong_thuc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(Thanh toán khi nhận hàng)'),
(2, 'Thanh toán VNPay');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

DROP TABLE IF EXISTS `san_phams`;
CREATE TABLE IF NOT EXISTS `san_phams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `danh_muc_id` int DEFAULT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_dm_id_san_pham` (`danh_muc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(42, 'nova flow', '111.00', '111.00', './uploads/1744453905novaflow.jpg', 11111111, 0, '2025-04-07 01:37:31', 'Constructed for basketball players looking for a energized cushioning, the NOVA FLOW™ basketball shoe is designed to promote responsive transitions, while delivering excellent comfort. The TRUSSTIC SYSTEM™ technology in the outsole improves stability and propulsion, allowing you to maintain speed when making fast cuts on court. The NOVA FLOW™ basketball shoe is layered with GEL™ technology based cushioning in the rearfoot for heightened shock absorption during harsh landings and abrupt stops. This shoe also incorporates strategic ventilation in for improved breathability. Lastly, the NOVA FLOW™ basketball shoe is made to deliver long-lasting comfort and a responsive energy return that helps athletes to shake defenders and drive towards the hoop.\r\n\r\nStyle #: 1063A028-105', 6, 1),
(43, 't', '111.00', '11.00', './uploads/1744512534novaflow.jpg', 11, 0, '2025-04-07 02:16:38', '1', 1, 1),
(44, 'test', '1111.00', '111.00', './uploads/17445123761051A058_101_SR_RT_GLB.webp', 111, 0, '2025-04-08 03:36:46', '11 cccc', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

DROP TABLE IF EXISTS `tai_khoans`;
CREATE TABLE IF NOT EXISTS `tai_khoans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anh_dai_dien` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `ngay_sinh` date NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '1',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'Nguyễn Đức Anh', NULL, '2004-09-28', 'anhnd120@fpt.edu.vn', '0829998923', 1, 'Số 1 Hà Nội', '$2y$10$n7scc2K8Upt./z6Hvvg/j.gJxIqvdJ/51gEBKnbjmof/aRBGwzIRa', 1, 1),
(2, 'Tạ văn định', NULL, '2003-07-09', 'dinhtv7@gmail.com', '', 1, '', '$2y$10$SqcG0ekjqlCg/qeMrcoj/.6RgSiOw1ByysRKufbPNcpI9MfdVHpNy', 1, 1),
(3, 'Tạ trần bình1', './uploads/1723191077product-details-img4.jpg', '2004-10-01', 'binh1102@gmail.com', '0829998929', 2, 'Số 1 Ba Đình', '$2y$10$n1ckmjxK/QklkfsSnY3YdeLV7vsADIydKBfOFv0Q5CFhZM2GEIeqS', 2, 1),
(4, 'Nguyễn Văn Mạnh1', NULL, '0000-00-00', 'jennifer.nienow@example.org', '', 1, '', '$2y$10$RUY3FB6x2kCUs5tHZgm.g.b2b9.4dCLqpUfk6Msvc6PnVS.UBzMyS', 1, 1),
(5, 'Nguyễn Văn Minh 123', NULL, '0000-00-00', 'minh123@gmail.com', '0829998921', 1, '', '$2y$10$bMq3qdO/0wDkPN2R7CMsOeXdt4MGF8LcSMEH4TQzLyu6svF.0ODSS', 1, 2),
(6, 'manhHung', NULL, '2005-04-06', 'manhHung@gmail.com', '0987654321', 1, 'HÀ NỘI', '$2y$10$wjUPxa4bM71EpdK25.QuT.gzDWwI/ztCHVSAguWuarSJMc5lgFqZm', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

DROP TABLE IF EXISTS `trang_thai_don_hangs`;
CREATE TABLE IF NOT EXISTS `trang_thai_don_hangs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_trang_thai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã Xác Nhận'),
(3, 'Chưa thanh toán'),
(4, 'Đã thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(7, 'Đã giao'),
(8, 'Đã nhận'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Hủy đơn');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bien_the_sp`
--
ALTER TABLE `bien_the_sp`
  ADD CONSTRAINT `fk_sp_id_bien_the` FOREIGN KEY (`sp_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `fk_sp_id_binh_luan` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id_binh_luan` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `fk_don_hang_id_chi_tiet_don_hang` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_var_id_chi_tiet_don_hang` FOREIGN KEY (`bien_the_id`) REFERENCES `bien_the_sp` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD CONSTRAINT `fk_gio_hang_id_chi_tiet_gio_hang` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_var_id_chi_tiet_gio_hang` FOREIGN KEY (`bien_the_id`) REFERENCES `bien_the_sp` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `fk_tk_id_don_hang` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `fk_tk_id_gio_hang` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `fk_mau_id_hinh_anh_sp` FOREIGN KEY (`mau_id`) REFERENCES `mau_sp` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sp_id_hinh_anh` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `fk_dm_id_san_pham` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
