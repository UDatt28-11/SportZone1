<?php
class HinhAnhSanPham {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getHinhAnhBySanPhamAndMau($sanPhamId, $mauId) {
        try {
            $sql = "SELECT link_hinh_anh 
                    FROM hinh_anh_san_phams 
                    WHERE id_san_pham = :san_pham_id AND mau_id = :mau_id 
                    LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $sanPhamId);
            $stmt->bindParam(':mau_id', $mauId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Lỗi lấy hình ảnh sản phẩm: " . $e->getMessage());
            return null;
        }
    }

    public function getHinhAnhBySanPham($sanPhamId) {
        try {
            $sql = "SELECT link_hinh_anh 
                    FROM hinh_anh_san_phams 
                    WHERE id_san_pham = :san_pham_id 
                    LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $sanPhamId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Lỗi lấy hình ảnh sản phẩm: " . $e->getMessage());
            return null;
        }
    }
}
?> 