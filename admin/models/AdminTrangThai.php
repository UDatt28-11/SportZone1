<?php

class TrangThai
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTrangThai()
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs ORDER BY id ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy danh sách trạng thái: " . $e->getMessage());
            return [];
        }
    }

    public function getTrangThaiById($id)
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy thông tin trạng thái: " . $e->getMessage());
            return null;
        }
    }

    public function addTrangThai($tenTrangThai, $moTa = '')
    {
        try {
            $sql = "INSERT INTO trang_thai_don_hangs (ten_trang_thai, mo_ta) VALUES (:ten_trang_thai, :mo_ta)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_trang_thai' => $tenTrangThai,
                ':mo_ta' => $moTa
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi khi thêm trạng thái: " . $e->getMessage());
            return false;
        }
    }

    public function updateTrangThai($id, $tenTrangThai, $moTa = '')
    {
        try {
            $sql = "UPDATE trang_thai_don_hangs SET ten_trang_thai = :ten_trang_thai, mo_ta = :mo_ta WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten_trang_thai' => $tenTrangThai,
                ':mo_ta' => $moTa
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi khi cập nhật trạng thái: " . $e->getMessage());
            return false;
        }
    }

    public function deleteTrangThai($id)
    {
        try {
            // Kiểm tra xem trạng thái có đang được sử dụng không
            $sqlCheck = "SELECT COUNT(*) FROM don_hangs WHERE trang_thai_id = :id";
            $stmtCheck = $this->conn->prepare($sqlCheck);
            $stmtCheck->execute([':id' => $id]);
            $count = $stmtCheck->fetchColumn();

            if ($count > 0) {
                return false; // Không thể xóa vì đang có đơn hàng sử dụng
            }

            $sql = "DELETE FROM trang_thai_don_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi khi xóa trạng thái: " . $e->getMessage());
            return false;
        }
    }

    public function getTrangThaiByDonHang($donHangId)
    {
        try {
            $sql = "SELECT tt.* FROM trang_thai_don_hangs tt 
                    JOIN don_hangs dh ON tt.id = dh.trang_thai_id 
                    WHERE dh.id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':don_hang_id' => $donHangId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy trạng thái đơn hàng: " . $e->getMessage());
            return null;
        }
    }
}
