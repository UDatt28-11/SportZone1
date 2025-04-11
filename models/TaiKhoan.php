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
    
            if ($user['chuc_vu_id'] != 2) {
                return "Tài khoản không có quyền đăng nhập.";
            }
    
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
    public function registerUser($email, $mat_khau) {
        try {
            // Kiểm tra email đã tồn tại chưa
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
    
            if ($stmt->fetch()) {
                return "Email đã tồn tại.";
            }
    
            // Mã hóa mật khẩu
            $hashedPassword = password_hash($mat_khau, PASSWORD_BCRYPT);
    
            // Tạo tài khoản mới
            $sql = "INSERT INTO tai_khoans (email, mat_khau, chuc_vu_id, trang_thai) 
                    VALUES (:email, :mat_khau, 2, 1)"; // 2: Khách hàng, 1: Đang hoạt động
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':mat_khau' => $hashedPassword
            ]);
    
            // Trả về user mới tạo
            return [
                'id' => $this->conn->lastInsertId(),
                'email' => $email,
                'chuc_vu_id' => 2,
                'trang_thai' => 1
            ];
        } catch (Exception $e) {
            return "Lỗi hệ thống: " . $e->getMessage();
        }
    }
    
    
}
?>