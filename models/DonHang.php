<?php
class DonHang {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getDonHangByUserId($userId) {
        try {
            $sql = "SELECT dh.*, pttt.ten_phuong_thuc, ttdh.ten_trang_thai
                    FROM don_hangs dh
                    LEFT JOIN phuong_thuc_thanh_toans pttt ON dh.phuong_thuc_thanh_toan_id = pttt.id
                    LEFT JOIN trang_thai_don_hangs ttdh ON dh.trang_thai_id = ttdh.id
                    WHERE dh.tai_khoan_id = :user_id
                    ORDER BY dh.ngay_dat DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Debug output
            error_log("SQL Query: " . $sql);
            error_log("User ID: " . $userId);
            error_log("Result: " . print_r($result, true));
            
            return $result;
        } catch (Exception $e) {
            error_log("Lỗi lấy danh sách đơn hàng: " . $e->getMessage());
            error_log("SQL Error: " . print_r($stmt->errorInfo(), true));
            return false;
        }
    }

    public function getChiTietDonHang($donHangId) {
        try {
            $sql = "SELECT ctdh.*, sp.ten_san_pham, sp.gia_san_pham as gia,
                           bt.sp_id, bt.mau_id, bt.size_id, ms.mau_sac, kc.kich_co
                    FROM chi_tiet_don_hangs ctdh
                    JOIN bien_the_sp bt ON ctdh.bien_the_id = bt.id
                    JOIN san_phams sp ON bt.sp_id = sp.id
                    LEFT JOIN mau_sp ms ON bt.mau_id = ms.id
                    LEFT JOIN kich_co_sp kc ON bt.size_id = kc.id
                    WHERE ctdh.don_hang_id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $donHangId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Debug output
            error_log("SQL Query: " . $sql);
            error_log("Order ID: " . $donHangId);
            error_log("Result: " . print_r($result, true));
            
            return $result;
        } catch (Exception $e) {
            error_log("Lỗi lấy chi tiết đơn hàng: " . $e->getMessage());
            error_log("SQL Error: " . print_r($stmt->errorInfo(), true));
            return false;
        }
    }

    public function getDonHangById($donHangId) {
        try {
            $sql = "SELECT dh.*, pttt.ten_phuong_thuc, ttdh.ten_trang_thai
                    FROM don_hangs dh
                    LEFT JOIN phuong_thuc_thanh_toans pttt ON dh.phuong_thuc_thanh_toan_id = pttt.id
                    LEFT JOIN trang_thai_don_hangs ttdh ON dh.trang_thai_id = ttdh.id
                    WHERE dh.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $donHangId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in DonHang::getDonHangById(): " . $e->getMessage());
            return null;
        }
    }

    public function capNhatTrangThaiDonHang($donHangId, $trangThai) {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_id = :trang_thai WHERE id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':trang_thai', $trangThai);
            $stmt->bindParam(':don_hang_id', $donHangId);
            
            if (!$stmt->execute()) {
                throw new Exception("Không thể cập nhật trạng thái đơn hàng");
            }
            
            return true;
        } catch (Exception $e) {
            error_log("Lỗi cập nhật trạng thái đơn hàng: " . $e->getMessage());
            throw $e;
        }
    }

    public function huyDonHang($donHangId) {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_id = 11 WHERE id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $donHangId);
            
            if (!$stmt->execute()) {
                throw new Exception("Không thể hủy đơn hàng");
            }
            
            return true;
        } catch (Exception $e) {
            error_log("Lỗi hủy đơn hàng: " . $e->getMessage());
            throw $e;
        }
    }
}
?> 