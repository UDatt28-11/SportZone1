<?php


// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}


// Thêm file 
function uploadFile($file, $folderUpload) {
    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = time() . '_' . basename($file['name']);
        $targetPath = '../uploads/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Trả về đường dẫn tương đối từ thư mục gốc
            return './uploads/' . $fileName;
        } else {
            return null; // Upload thất bại
        }
    }
    return null; // Không có file hợp lệ
}

// Xóa file 
function deleteFile($file){
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

// Xóa session sau khi load trang 
function deleteSessionError(){
    if (isset($_SESSION['flash'])) {
        // Hủy session sau khi đã tải trang 
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
    }
}

// Upload - update album ảnh

function uploadFileAlbum($file, $folderUpload, $key){
    $pathStorage = $folderUpload . time() . $file['name'][$key];

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}


// format date 
function formatDate($date){
    return date("d-m-Y", strtotime($date));
}

function checkLoginAdmin(){
    if (!isset($_SESSION['user'])) {
        header("Location: " . BASE_URL . '?act=login');
        exit();
    }
}

function formatPrice($price){
    return number_format($price, 0, ',', '.');
}
// Debug
require_once __DIR__ . '/../models/danhMuc.php';
require_once __DIR__ . '/../models/GioHang.php';
require_once __DIR__ . '/../models/SanPham.php';

// Khai báo biến toàn cục
$listDanhMuc = [];
$listSanPham = [];
$soLuongHangTrongGio = 0;

function initSanPham() {
    global $listSanPham;
    $sanPhamModel = new SanPham();
    $listSanPham = $sanPhamModel->getAllSanPham();
    return $listSanPham;
}

function initDanhMuc() {
    global $listDanhMuc;
    $danhMucModel = new DanhMuc();
    $listDanhMuc = $danhMucModel->getAll();
    return $listDanhMuc;
}

function initSoLuongHangTrongGio() {
    global $soLuongHangTrongGio;
    if (isset($_SESSION['user_id'])) {
        $gioHangModel = new GioHang($_SESSION['user_id']);
        $listGioHang = $gioHangModel->getGioHang();
        $soLuongHangTrongGio = count($listGioHang);
        return $soLuongHangTrongGio;
    }
    return 0;
}

// Gọi các hàm khởi tạo
