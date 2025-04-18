<?php 

class AdminDanhMuc {
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

    public function insertDanhMuc($ten_danh_muc, $mo_ta, $hinh_anh){
        try {
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc, mo_ta, hinh_anh)
                    VALUES (:ten_danh_muc, :mo_ta, :hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDetailDanhMuc($id){
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateDanhMuc($id, $ten_danh_muc, $mo_ta, $hinh_anh){
        try {
            $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta, hinh_anh = :hinh_anh WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function destroyDanhMuc($id){
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function hasProducts($id) {
        try {
            $sql = 'SELECT COUNT(*) as product_count FROM san_phams WHERE danh_muc_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            $result = $stmt->fetch();
            return $result['product_count'] > 0; // Trả về true nếu có sản phẩm
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}