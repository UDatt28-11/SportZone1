<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file models
require_once './models/SanPham.php';
require_once './models/datHang.php';
require_once './models/danhMuc.php';

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/datHangController.php';
require_once './controllers/gioHangController.php';

// Route
$act = $_GET['act'] ?? '/';

match($act){
    
    '/' => (new HomeController())->home(), // route trang chủ
    
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'danh-muc' => (new HomeController())->DanhMuc(), // route GetProductsByCategory
    'dat-hang' => (new DonHangController())->formDatHang(), // route trang đặt hàng
    'gio-hang' => (new GioHangController())->formGioHang(), // route trang giỏ hàng

    // Người dùng
    // 'login' => (new HomeController())->formLogin(),
    // 'check-login' => (new HomeController())->postLogin(),
    //Test nhánh 
};

