<?php
class TaiKhoan{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function checkLogin($email, $mat_khau) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC); //  Quan trọng: Mảng kết hợp
    
            if (!$user || !password_verify($mat_khau, $user['mat_khau'])) {
                return "Sai email hoặc mật khẩu.";
            }
    
            // if ($user['chuc_vu_id'] != 2) {
            //     return "Tài khoản không có quyền đăng nhập.";
            // }
    
            if ($user['trang_thai'] != 1) {
                return "Tài khoản của bạn đã bị cấm.";
            }
    
            return $user; 
        } catch (Exception $e) {
            return "Lỗi hệ thống: " . $e->getMessage();
        }
    }
    public function getTaiKhoanFromEmail($email){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function registerUser($data) {
        try {
            // Kiểm tra email đã tồn tại chưa
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $data['email']]);
    
            if($stmt->fetch()) {
                return "Email đã tồn tại.";
            }
            // Tạo tài khoản mới
            $sql = "INSERT INTO tai_khoans 
                    (ho_ten, ngay_sinh, email, so_dien_thoai, gioi_tinh, dia_chi, mat_khau, chuc_vu_id, trang_thai) 
                    VALUES 
                    (:ho_ten, :ngay_sinh, :email, :so_dien_thoai, :gioi_tinh, :dia_chi, :mat_khau, 2, 1)";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $data['ho_ten'],
                ':ngay_sinh' => $data['ngay_sinh'],
                ':email' => $data['email'],
                ':so_dien_thoai' => $data['so_dien_thoai'],
                ':gioi_tinh' => $data['gioi_tinh'],
                ':dia_chi' => $data['dia_chi'],
                ':mat_khau' => $data['mat_khau']
            ]);
    
            // Trả về user mới tạo
            return [
                'id' => $this->conn->lastInsertId(),
                'ho_ten' => $data['ho_ten'],
                'email' => $data['email'],
                'chuc_vu_id' => 2,
                'trang_thai' => 1
            ];
        } catch (Exception $e) {
            return "Lỗi hệ thống: " . $e->getMessage();
        }
    }
    public function getUserById($userId) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Lỗi lấy thông tin người dùng: " . $e->getMessage());
            throw $e;
        }
    }
}
?>