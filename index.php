<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
// Route
$act = $_GET['act'] ?? '/';

match($act){
    
    '/' => (new HomeController())->home(), // route trang chủ
    
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),

    
    // Auth client login
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    // Auth client register
    'register' => (new HomeController())->formRegister(),
    
};