<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
// Route
$act = $_GET['act'] ?? '/';

match($act){
    
    '/' => (new HomeController())->home(), // route trang chủ
    
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'them-gio-hang' =>(new HomeController())->addGioHang(),
    'gio-hang' =>(new HomeController())->gioHang(),


    
    // Auth client login
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout-client' => (new HomeController())->logout(),
    // Auth client register
    'register' => (new HomeController())->formRegister(),
    
};