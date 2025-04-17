<?php
require_once 'models/SanPham.php';
require_once 'models/DanhMuc.php';

class DanhMucController {
    private $sanPhamModel;
    private $danhMucModel;

    public function __construct() {
        $this->sanPhamModel = new SanPham();
        $this->danhMucModel = new DanhMuc();
    }

    public function index() {
        try {
            // Lấy danh mục từ URL
            $idDanhMuc = isset($_GET['id']) ? $_GET['id'] : null;
            
            if (!$idDanhMuc) {
                throw new Exception("Không tìm thấy danh mục");
            }

            // Lấy thông tin danh mục
            $danhMuc = $this->danhMucModel->getDanhMucById($idDanhMuc);
            if (!$danhMuc) {
                throw new Exception("Danh mục không tồn tại");
            }

            // Lấy danh sách sản phẩm theo danh mục
            $sanPhams = $this->danhMucModel->getSanPhamByDanhMuc($idDanhMuc);

            // Lấy danh sách danh mục cho menu
            $listDanhMuc = $this->danhMucModel->getAllDanhMuc();

            // Hiển thị view
            require_once 'views/danhMuc.php';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL);
            exit();
        }
    }
} 