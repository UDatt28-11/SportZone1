<?php
// session_start();
//Require file common
require_once '../commons/env.php'; // Khai báo biến môi trường  
require_once '../commons/function.php'; // Hàm hỗ trợ   

//Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php'; 
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/mauSacControlor.php';
require_once './controllers/kichCoController.php'; 

require_once './controllers/AdminDonHangController.php';

//Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/adminMauSac.php';
require_once './models/adminKichCo.php';

require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php'; // Quản lý tài khoản admin
//Require toàn bộ file Models

require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminDonHang.php';


//Router
$act = $_GET['act'] ?? 'san-pham';

if ($act !== 'login-admin'  && $act !== 'check-login-admin' && $act !== 'logout-admin') {
  checkLoginAdmin();
}

// Để đảm bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match($act){
    // route trang chủ
    '/' => (new AdminBaoCaoThongKeController())->home(),
    // route danh mục
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // route sản phẩm
    'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),
    'chi-tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),


    //route Màu sắc
    'list-mau-sac' => (new MauSacController())->danhSachMauSac(),
    'form-them-mau-sac' => (new MauSacController())->formAddMauSac(),
    'them-mau-sac' => (new MauSacController())->postAddMauSac(),
    'form-sua-mau-sac' => (new MauSacController())->formEditMauSac(),
    'sua-mau-sac' => (new MauSacController())->postEditMauSac(),
    'xoa-mau-sac' => (new MauSacController())->deleteMauSac(),

    //route Kích cỡ
    'list-kich-co' => (new KichCoController())->danhSachKichCo(),
    'form-them-kich-co' => (new KichCoController())->formAddKichCo(),
    'them-kich-co' => (new KichCoController())->postAddKichCo(),
    'form-sua-kich-co' => (new KichCoController())->formEditKichCo(),
    'sua-kich-co' => (new KichCoController())->postEditKichCo(),
    'xoa-kich-co' => (new KichCoController())->deleteKichCo(),




      // route bình luận
      'update-trang-thai-binh-luan' => (new AdminSanPhamController())->updateTrangThaiBinhLuan(),

    // route đon hàng

    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),
    // 'xoa-don-hang' => (new AdminDonHangController())->deleteDonHang(),

    // route tài khoản
    'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' => (new AdminTaiKhoanController())->postAddTaiKhoan(),
    'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),

    // route quản lý tài khoản khách hàng(quản trị viên)
    'sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditCaNhanQuanTri(),
    'form-sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->formEditCaNhanQuanTri(),
    'sua-mat-khau-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditMatKhauCaNhan(),

    // route reset password
    'reset-password' => (new AdminTaiKhoanController())->resetPassword(),
    
    // route khách hàng
    'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
    'form-sua-khach-hang' => (new AdminTaiKhoanController())->formEditKhachHang(),
    'sua-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->detailKhachHang(),
    
    // Route Auth
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),
    default => $act,
};