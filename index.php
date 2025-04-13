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
require_once './controllers/cartController.php';
// Route
$act = $_GET['act'] ?? '/';
// var_dump($_SESSION['user_id']);
match($act){
    '/' => (new HomeController())->home(), // route trang chủ
    
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'gio-hang' => (new HomeController())->formGioHang(),
    'lay-anh-theo-mau' => (new HomeController())->getListAnhTheoMau(),
    'lay-size-theo-mau' => (new HomeController())->getListSizeTheoMau(),
    'lay-thong-tin-bien-the' =>(new HomeController())->layThongTinBienThe(),

    'add-vao-gio-hang' =>(new CartController())->add(),
    
    // Auth client login
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout-client' => (new HomeController())->logout(),
    // Auth client register
    'register' => (new HomeController())->formRegister(),
    'resgister' => (new HomeController())->postRegister()
    
};