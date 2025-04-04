-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2025 at 04:47 PM
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
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 42, 3, 'Sản phẩm này còn hàng không shop', '2024-07-28', 2),
(2, 1, 3, 'Shop ơi rep tin nhắn em', '2024-07-28', 2),
(3, 37, 3, 'Ship hỏa tốc thì bao giờ có', '2024-07-27', 2),
(4, 37, 3, 'Shop ơi rep tin nhắn em', '2024-07-28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 36, '12345.00', 1, '12345.00'),
(2, 1, 37, '1234.00', 2, '123456.00'),
(3, 2, 36, '12345.00', 1, '12345.00'),
(4, 2, 33, '1234.00', 2, '123456.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(4, 3, 1, 3),
(5, 3, 34, 4),
(6, 3, 2, 4),
(7, 3, 36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(2, 'Yoga', 'Danh mục sản phẩm giày Yoga'),
(5, 'Giày thể thao', 'Giày Quốc Tế');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_nguoi_nhan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `dia_chi_nguoi_nhan` text COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_general_ci,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(1, 'DH-123', 3, 'Tạ Văn Định234', 'dinhtv7@fpt.edu.vn', '0987654321', '13 Trịnh Văn Bô, Hà Nội', '2024-07-19', '900000.00', 'Vui lòng cho chó vào giỏ', 1, 1),
(2, 'DH-124', 1, 'Tạ Văn Quyết111', 'dinhtv8@fpt.edu.vn', '0123456789', '13 Trịnh Văn Bô, Hà Nội, Việt Nam', '2024-07-19', '1000000.00', 'Ship nhanh không chó đói', 1, 9),
(3, 'DH9365', 3, 'Tạ trần bình1', 'binh1102@gmail.com', '0829998929', 'Số 1 Ba Đình', '2024-08-12', '38630264.00', '', 1, 1),
(4, 'DH1265', 3, 'Tạ trần bình1', 'binh1102@gmail.com', '0829998929', 'Số 1 Ba Đình', '2024-08-12', '38630264.00', '', 1, 1),
(5, 'DH-3853', 3, 'Tạ trần bình1', 'binh1102@gmail.com', '0829998929', 'Số 1 Ba Đình', '2024-08-12', '38630264.00', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(4, 35, './uploads/1720908621_z5617645685043_498a7a632f80e43e56eb0eaf612074e9.jpg'),
(28, 39, './uploads/1721057179z5550783400537_7b8dd570891f48acf52e343a14cbce75.jpg'),
(29, 39, './uploads/1721057179z5550783400601_4adbc42c6bb8a9cbdfbb15961721eb20.jpg'),
(30, 39, './uploads/1721057179z5553545947549_fe27cf0f6c8e943ebc7295844477c00a.jpg'),
(31, 40, './uploads/1721063929z5617645685043_498a7a632f80e43e56eb0eaf612074e9.jpg'),
(32, 40, './uploads/1721063929z5617645685043_498a7a632f80e43e56eb0eaf612074e9.jpg'),
(35, 40, './uploads/1721063917z5617645685043_498a7a632f80e43e56eb0eaf612074e9.jpg'),
(36, 40, './uploads/1721063945z5553545947549_fe27cf0f6c8e943ebc7295844477c00a.jpg'),
(39, 40, './uploads/1721063984z5550783400601_4adbc42c6bb8a9cbdfbb15961721eb20.jpg'),
(52, 41, './uploads/1743389448nike đen.webp'),
(53, 41, './uploads/1743389448nike đen2.webp'),
(57, 41, './uploads/174338962519.webp'),
(60, 44, './uploads/1743693290AIR+MAX+DN8 .3.png'),
(61, 44, './uploads/1743693290AIR+MAX+DN8.2.png'),
(62, 44, './uploads/1743693290AIR+MAX+DN8.png'),
(63, 45, './uploads/1743693976AIR+MAX+DN8+AMD+(GS).png'),
(64, 45, './uploads/1743693630AIR+MAX+DN8 .3.png'),
(65, 45, './uploads/1743693553AIR+MAX+DN8.png'),
(66, 46, './uploads/1743693648AIR+MAX+DN8 .3.png'),
(67, 46, './uploads/1743693648AIR+MAX+DN8+AMD+(GS).png'),
(68, 46, './uploads/1743693212AIR+MAX+DN8.png'),
(69, 42, './uploads/1743693602AIR+MAX+DN8+AMD+(GS).png'),
(70, 42, './uploads/1743693585AIR+MAX+DN8.png'),
(71, 42, './uploads/1743693602AIR+MAX+DN8.2.png');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` text COLLATE utf8mb4_general_ci,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text COLLATE utf8mb4_general_ci,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(41, 'Giày thể thao Nike', '15000.00', NULL, './uploads/174338944819.webp', 1000, 0, '2025-03-04', 'Nike là một trong những thương hiệu thể thao nổi tiếng nhất trên thế giới. Từ học sinh tiểu học cho đến các vận động viên chuyên nghiệp, không ai có thể phủ nhận sức hấp dẫn của Nike. Nếu bạn khảo sát xem có bao nhiêu người đã hoặc đang sở hữu các sản phẩm của Nike, thì con số này sẽ khiến bạn bất ngờ háo hức.', 1, 1),
(42, 'AIR+MAX+DN9', '1000000.00', '890000.00', './uploads/1743689460AIR+MAX+DN8.2.png', 100, 0, '2025-01-07', 'Nike bắt đầu hành trình khởi nghiệp từ năm 2017, khi thành lập một cửa hàng giày thể thao tại quận Tân Bình với tiêu chí mang đến cho khách hàng những đôi giày chất lượng, êm ái, thoải mái.', 5, 1),
(44, 'AIR+MAX+DN8', '1000000.00', '890000.00', './uploads/1743569761AIR+MAX+DN8.png', 1000, 0, '2025-04-02', 'Giày AIR+MAX+DN8', 5, 1),
(45, 'AIR+MAX+DN7', '3000000.00', '1999000.00', './uploads/1743689404AIR+MAX+DN8+AMD+(GS).png', 200, 0, '2025-04-16', 'Giày JORDAN+CMFT+ERA', 5, 1),
(46, 'AIR+MAX+DN6', '1200000.00', '999000.00', './uploads/1743689423AIR+MAX+DN8 .3.png', 200, 0, '2025-04-07', 'Giày NIKE+VOMERO+18 Việt', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `anh_dai_dien` text COLLATE utf8mb4_general_ci,
  `ngay_sinh` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `so_dien_thoai` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '1',
  `dia_chi` text COLLATE utf8mb4_general_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'Nguyễn Đức Anh', './uploads/174338944819.webp', '2004-09-28', 'anhnd120@fpt.edu.vn', '0829998923', 1, 'Số 1 Hà Nội', '$2y$10$knF8cMRUOMbAfZxHSad0SOU3Hc5gTZ3y8kR8SU.9EEKBb7XCDphBG', 1, 1),
(2, 'Tạ văn định', NULL, '2003-07-09', 'dinhtv7@gmail.com', '', 1, '', '$2y$10$ntoxTQE3bvDnyU1bkwdSIOA1oHiGcXZ.sx/ktZi3peyQOHtiQKpVi', 1, 1),
(3, 'Tạ trần bình1', './uploads/1723191077product-details-img4.jpg', '2004-10-01', 'binh1102@gmail.com', '0829998929', 2, 'Số 1 Ba Đình', '$2y$10$GFkpcB0SPAMeXqMf2weDC.TfCZr8cMJIKRnjK4VNmTMsbuqtBdCHO', 2, 1),
(4, 'Nguyễn Văn Mạnh1', NULL, '0000-00-00', 'jennifer.nienow@example.org', '', 1, '', '$2y$10$z2aKAIEMQpcgut54QvjoZ.EINVCFSlk6K/H04mCd.7lNkregVkjqK', 1, 1),
(5, 'Nguyễn Văn Minh 123', NULL, '0000-00-00', 'minh123@gmail.com', '0829998921', 1, '', '$2y$10$/umk.Ld/u3.MQ17dGOtKJesiJzuA0EqLtEOLxc1FN9ACNaPitXCH6', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
