<?php
require_once 'models/SanPham.php';

class SearchController {
    private $sanPhamModel;

    public function __construct() {
        $this->sanPhamModel = new SanPham();
    }

    public function search() {
        try {
            $keyword = $_GET['keyword'] ?? '';
            
            if (empty($keyword)) {
                throw new Exception("Vui lòng nhập từ khóa tìm kiếm");
            }

            $sanPhams = $this->sanPhamModel->searchSanPham($keyword);
            
            // Lấy danh sách danh mục cho menu
            $danhMucModel = new DanhMuc();
            $listDanhMuc = $danhMucModel->getAll();

            // Hiển thị view
            require_once 'views/search.php';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL);
            exit();
        }
    }
} 