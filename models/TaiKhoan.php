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
            $user = $stmt->fetch(PDO::FETCH_ASSOC); // 👈 Quan trọng: Mảng kết hợp
    
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
    
    
}
?>