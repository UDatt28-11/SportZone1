<?php
class AdminTaiKhoan{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllTaiKhoan($chuc_vu_id){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id'=>$chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id ){
        try {
            $sql = 'INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id)
                    VALUES (:ho_ten, :email, :password, :chuc_vu_id)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':password' => $password,
                ':chuc_vu_id' => $chuc_vu_id,
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getDetailTaiKhoan($id){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai){
            // var_dump($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);die();
        try {
            $sql = 'UPDATE tai_khoans SET
                    ho_ten = :ho_ten,
                    email = :email,
                    so_dien_thoai = :so_dien_thoai, 
                    trang_thai = :trang_thai
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':trang_thai' => $trang_thai,
                ':id' => $quan_tri_id,

            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }   
public function resetPassword($id, $mat_khau){
        try {
            $sql = 'UPDATE tai_khoans SET mat_khau = :mat_khau WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateKhachHang(
                    $khach_hang_id,
                    $ho_ten,
                    $email,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $so_dien_thoai,
                    $trang_thai){
        // var_dump($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);die();
    try {
        $sql = 'UPDATE tai_khoans SET
                ho_ten = :ho_ten,
                email = :email,
                ngay_sinh = :ngay_sinh,
                gioi_tinh = :gioi_tinh,
                dia_chi = :dia_chi,
                so_dien_thoai = :so_dien_thoai, 
                trang_thai = :trang_thai
                WHERE id = :id';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':email' => $email,
            ':ngay_sinh' => $ngay_sinh,
            ':gioi_tinh' => $gioi_tinh,
            ':dia_chi' => $dia_chi,
            ':so_dien_thoai' => $so_dien_thoai,
            ':trang_thai' => $trang_thai,
            ':id' =>  $khach_hang_id,
        ]);
             return true;
         } catch (Exception $e) {
             echo "lỗi" . $e->getMessage();
         }
       }  

       public function checkLogin($email, $mat_khau){
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $user = $stmt->fetch();
            // password verify sử lý check mật khẩu 
            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
            // if ($user && $mat_khau) {
                if ($user['chuc_vu_id'] == 1) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                         // Trường hợp đăng nhập thành công
                    }else{
                        return "Tài khoản bị cấm";
                    }
                }else{
                    return "Tài khoản không có quyền đăng nhập";
                }
            }else{
                return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
            }
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }
    
    public function getTaiKhoanFormEmail($email){
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

    public function updateAvatar($id, $avatarPath) {
        try {
            $sql = 'UPDATE tai_khoans SET anh_dai_dien = :anh_dai_dien WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':anh_dai_dien', $avatarPath);
            $stmt->bindParam(':id', $id);
    
            // Kiểm tra việc thực thi
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception('Cập nhật ảnh đại diện thất bại.');
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
}