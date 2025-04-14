<?php
class DonHang {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function taoDonHang($data) {
        try {
            $this->conn->beginTransaction();

            // Thêm đơn hàng
            $sql = "INSERT INTO don_hangs (ma_don_hang, ten_nguoi_nhan, sdt_nguoi_nhan, email_nguoi_nhan, dia_chi_nguoi_nhan, tong_tien, phuong_thuc_thanh_toan_id)
                    VALUES (:ma_don_hang, :ten_nguoi_nhan, :sdt_nguoi_nhan, :email_nguoi_nhan, :dia_chi_nguoi_nhan, :tong_tien, :trang_thai_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma_don_hang' => $data['ma_don_hang'],
                ':ten_nguoi_nhan' => $data['ten_nguoi_nhan'],
                ':sdt_nguoi_nhan' => $data['sdt_nguoi_nhan'],
                ':email_nguoi_nhan' => $data['email_nguoi_nhan'],
                ':dia_chi_nguoi_nhan' => $data['dia_chi_nguoi_nhan'],
                ':tong_tien' => $data['tong_tien'],
                ':trang_thai_id' => 1
            ]);

            $donHangId = $this->conn->lastInsertId();

            // Thêm chi tiết đơn hàng
            foreach ($data['chi_tiet'] as $chiTiet) {
                $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, so_luong, don_gia, thanh_tien)
                        VALUES (:don_hang_id, :san_pham_id, :so_luong, :don_gia, :thanh_tien)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':don_hang_id' => $donHangId,
                    ':san_pham_id' => $chiTiet['san_pham_id'],
                    ':so_luong' => $chiTiet['so_luong'],
                    ':don_gia' => $chiTiet['don_gia'],
                    ':thanh_tien' => $chiTiet['thanh_tien']
                ]);
            }

            $this->conn->commit();
            return $donHangId;
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>