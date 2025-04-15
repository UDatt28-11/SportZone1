<?php 
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/danhMuc.php';
require_once './models/DonHang.php';

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/cartController.php';
require_once './controllers/CheckoutController.php';
require_once './controllers/DonHangController.php';

// Route
$act = $_GET['act'] ?? '/';

// Chỉ kiểm tra đăng nhập cho các route yêu cầu xác thực
$protectedRoutes = [
    'gio-hang', 
    'add-vao-gio-hang',
    'checkout',
    'process-payment',
    'order-confirmation',
    'thanh-toan-chuyen-khoan',
    'order-history',
    'don-hang',
    'huy-don-hang'
];

if (in_array($act, $protectedRoutes) && !isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . '?act=login');
    exit;
}

match($act) {
    '/' => (new HomeController())->home(), // route trang chủ
    
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'gio-hang' => (new HomeController())->formGioHang(),
    'lay-anh-theo-mau' => (new HomeController())->getListAnhTheoMau(),
    'lay-size-theo-mau' => (new HomeController())->getListSizeTheoMau(),
    'lay-thong-tin-bien-the' => (new HomeController())->layThongTinBienThe(),

    'add-vao-gio-hang' => (new CartController())->addToCart(),
    'update-gio-hang' => (new CartController())->updateQuantity(),
    'remove-gio-hang' => (new CartController())->removeItem(),

    // Các route mới cho thanh toán
    'checkout' => (new CheckoutController())->index(),
    'process-payment' => (new CheckoutController())->processPayment(),
    'order-confirmation' => require_once 'views/order-confirmation.php',
    'thanh-toan-chuyen-khoan' => require_once 'views/thanhToanChuyenKhoan.php',
    'order-history' => (new CheckoutController())->orderHistory(),

    // Auth client login
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout-client' => (new HomeController())->logout(),
    // Auth client register
    'register' => (new HomeController())->formRegister(),
    'resgister' => (new HomeController())->postRegister(),

    // Các route mới cho quản lý đơn hàng
    'don-hang' => (new DonHangController())->index(),
    'huy-don-hang' => (new DonHangController())->huyDonHang(),

    default => (new HomeController())->home()
};