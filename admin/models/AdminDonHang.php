<?php

class AdminDonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDonHang()
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDetailDonHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, 
            trang_thai_don_hangs.ten_trang_thai, 
            tai_khoans.ho_ten, tai_khoans.so_dien_thoai, 
            tai_khoans.email, tai_khoans.dia_chi,
            phuong_thuc_thanh_toans.ten_phuong_thuc
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            WHERE don_hangs.id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh
            FROM chi_tiet_don_hangs
            INNER JOIN bien_the_sp ON chi_tiet_don_hangs.bien_the_id = bien_the_sp.id
            INNER JOIN san_phams ON bien_the_sp.sp_id = san_phams.id
            WHERE chi_tiet_don_hangs.don_hang_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $trang_thai_id, $ghi_chu)
    {
        try {

            $sql = 'UPDATE don_hangs
                        SET 
                            ten_nguoi_nhan = :ten_nguoi_nhan,
                            sdt_nguoi_nhan = :sdt_nguoi_nhan,
                            email_nguoi_nhan = :email_nguoi_nhan,
                            dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
                            ghi_chu = :ghi_chu,
                            trang_thai_id = :trang_thai_id
                        WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':trang_thai_id' => $trang_thai_id,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getDonHangFromKhachHang($id){
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            WHERE don_hangs.tai_khoan_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDonHangByStatus($trangThaiIds = []) {
        try {
            $sql = "SELECT dh.*, tt.ten_trang_thai 
                    FROM don_hangs dh 
                    JOIN trang_thai_don_hangs tt ON dh.trang_thai_id = tt.id";
            
            if (!empty($trangThaiIds)) {
                $placeholders = str_repeat('?,', count($trangThaiIds) - 1) . '?';
                $sql .= " WHERE dh.trang_thai_id IN ($placeholders)";
            }
            
            $sql .= " ORDER BY dh.ngay_dat DESC";
            
            $stmt = $this->conn->prepare($sql);
            
            if (!empty($trangThaiIds)) {
                $stmt->execute($trangThaiIds);
            } else {
                $stmt->execute();
            }
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy đơn hàng theo trạng thái: " . $e->getMessage());
            return [];
        }
    }
    public function updateTrangThaiDonHang($id, $trang_thai_id){
        try {
            $sql = 'UPDATE don_hangs SET trang_thai_id = :trang_thai_id WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id, ':trang_thai_id'=>$trang_thai_id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("Lỗi khi cập nhật trạng thái đơn hàng: " . $e->getMessage());
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
}