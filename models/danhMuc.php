<?php 

class DanhMuc {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc(){
        try {
            $sql = 'SELECT * FROM danh_mucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM danh_mucs ORDER BY ten_danh_muc ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in DanhMuc::getAll(): " . $e->getMessage());
            return [];
        }
    }

    public function getDanhMucById($id) {
        try {
            $sql = "SELECT * FROM danh_mucs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in DanhMuc::getDanhMucById(): " . $e->getMessage());
            return null;
        }
    }

    public function getSanPhamByDanhMuc($idDanhMuc) {
        try {
            $sql = "SELECT * FROM san_phams WHERE danh_muc_id = :danh_muc_id AND trang_thai = 1 ORDER BY ngay_nhap DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':danh_muc_id', $idDanhMuc, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in DanhMuc::getSanPhamByDanhMuc(): " . $e->getMessage());
            return [];
        }
    }

    public function getTotalSanPhamByDanhMuc($idDanhMuc) {
        try {
            $sql = "SELECT COUNT(*) as total FROM san_pham WHERE danh_muc_id = :danh_muc_id AND trang_thai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':danh_muc_id', $idDanhMuc, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            error_log("Error in DanhMuc::getTotalSanPhamByDanhMuc(): " . $e->getMessage());
            return 0;
        }
    }
}