<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './models/SanPham.php';

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
// Route
$act = $_GET['act'] ?? '/';
match($act){
    '/' => (new HomeController())->home(), // route trang chủ
    
};