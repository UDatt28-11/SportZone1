<?php
class GioHang{
    public $conn;
    private $cart_id;
    private $userId;
    private $cache = [];

    public function __construct($userId) {
        if (!$userId) {
            throw new Exception("Người dùng chưa đăng nhập.");
        }
    
        $this->conn = connectDB();
        $this->userId = $userId; // 👈 thêm dòng này
        $this->kiemGioHang($userId);
    }
    
    public function kiemGioHang($user_id){
        try{
            $sql = "SELECT * FROM gio_hangs WHERE tai_khoan_id = ? AND trang_thai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$user_id]);
            $cart = $stmt->fetch();

            if($cart){
                $this->cart_id = $cart['id'];
            }else{
                $stmt = $this->conn->prepare('INSERT INTO gio_hangs (tai_khoan_id) VALUES (?)');
                $stmt->execute([$user_id]);
                $this->cart_id = $this->conn->lastInsertId();
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function themVaoGio($bienTheId, $sLuong){
        try{
            // Kiểm tra số lượng tồn kho
            $stmt = $this->conn->prepare("SELECT ton_kho FROM bien_the_sp WHERE id = ?");
            $stmt->execute([$bienTheId]);
            $tonKho = $stmt->fetchColumn();

            if ($tonKho < $sLuong) {
                throw new Exception("Số lượng sản phẩm vượt quá tồn kho");
            }

            // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
            $stmt = $this->conn->prepare("SELECT * FROM chi_tiet_gio_hangs WHERE gio_hang_id = ? AND bien_the_id = ?");
            $stmt->execute([$this->cart_id, $bienTheId]);
            $item = $stmt->fetch();

            if($item){
                // Cập nhật số lượng nếu sản phẩm đã có trong giỏ
                $newQuantity = $item['so_luong'] + $sLuong;
                
                // Kiểm tra tổng số lượng không vượt quá tồn kho
                if ($newQuantity > $tonKho) {
                    throw new Exception("Số lượng sản phẩm vượt quá tồn kho");
                }

                $stmt = $this->conn->prepare('UPDATE chi_tiet_gio_hangs SET so_luong = ? WHERE id = ?');
                $stmt->execute([$newQuantity, $item['id']]);
            } else {
                // Thêm mới sản phẩm vào giỏ
                $stmt = $this->conn->prepare("INSERT INTO chi_tiet_gio_hangs(gio_hang_id, bien_the_id, so_luong) VALUES (?,?,?)");
                $stmt->execute([$this->cart_id, $bienTheId, $sLuong]);
            }

            return true;
        } catch(Exception $e){
            throw $e;
        }
    }
    public function getGioHang() {
        // Kiểm tra cache trước
        if (isset($this->cache['gioHang'])) {
            return $this->cache['gioHang'];
        }

        if (!$this->conn) {
            throw new Exception("Không thể kết nối cơ sở dữ liệu");
        }

        $stmt = $this->conn->prepare("SELECT ctgh.*, sp.ten_san_pham, bt.ton_kho , bt.don_gia
            FROM chi_tiet_gio_hangs ctgh
            JOIN bien_the_sp bt ON ctgh.bien_the_id = bt.id
            JOIN san_phams sp ON bt.sp_id = sp.id
            WHERE ctgh.gio_hang_id = ?");
        $stmt->execute([$this->cart_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Lưu vào cache
        $this->cache['gioHang'] = $result;

        return $result;
    }
    
    public function updateSoLuong($bienTheId, $userId, $soLuong) {
        try {
            // Lấy số lượng tồn kho của biến thể
            $stmt = $this->conn->prepare("SELECT ton_kho FROM bien_the_sp WHERE id = ?");
            $stmt->execute([$bienTheId]);
            $tonKho = $stmt->fetchColumn();

            if ($tonKho === false) {
                throw new Exception("Không tìm thấy thông tin tồn kho cho sản phẩm.");
            }

            // Kiểm tra nếu số lượng yêu cầu vượt quá tồn kho
            if ($soLuong > $tonKho) {
                throw new Exception("Số lượng yêu cầu vượt quá tồn kho. Chỉ còn $tonKho sản phẩm.");
            }

            // Cập nhật số lượng trong giỏ hàng
            $sql = "UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong 
                    WHERE bien_the_id = :bien_the_id 
                      AND gio_hang_id = (SELECT id FROM gio_hangs WHERE tai_khoan_id = :user_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':so_luong' => $soLuong,
                ':bien_the_id' => $bienTheId,
                ':user_id' => $userId
            ]);

            // Xóa cache để đảm bảo dữ liệu mới nhất
            unset($this->cache['gioHang']);
            unset($this->cache['tongTien']);
            unset($this->cache['tongSoLuong']);

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function getTongTien() {
        if (isset($this->cache['tongTien'])) {
            return $this->cache['tongTien'];
        }

        $sql = "SELECT SUM(ctgh.so_luong * bt.don_gia) as tong_tien 
                FROM chi_tiet_gio_hangs ctgh
                JOIN bien_the_sp bt ON ctgh.bien_the_id = bt.id 
                WHERE ctgh.gio_hang_id = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->cart_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $tongTien = $row['tong_tien'] ?? 0;
        $this->cache['tongTien'] = $tongTien;
        
        return $tongTien;
    }
    
    public function getSoLuongSanPham() {
        if (isset($this->cache['tongSoLuong'])) {
            return $this->cache['tongSoLuong'];
        }

        $sql = "SELECT SUM(ctgh.so_luong) as tong_so_luong 
                FROM chi_tiet_gio_hangs ctgh
                WHERE ctgh.gio_hang_id = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->cart_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $tongSoLuong = $row['tong_so_luong'] ?? 0;
        $this->cache['tongSoLuong'] = $tongSoLuong;
        
        return $tongSoLuong;
    }
    
    public function xoaKhoiGio($bienTheId) {
        $sql = "DELETE FROM chi_tiet_gio_hangs 
                WHERE bien_the_id = :bien_the_id 
                  AND gio_hang_id = :gio_hang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':bien_the_id' => $bienTheId,
            ':gio_hang_id' => $this->cart_id
        ]);
    }

    public function xoaGioHang($userId) {
        $sql = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = (SELECT id FROM gio_hangs WHERE tai_khoan_id = ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
    }

    public function taoDonHang($userId, $tongTien, $tenNguoiNhan, $emailNguoiNhan, $sdtNguoiNhan, $diaChiNguoiNhan, $ghiChu, $phuongThucThanhToanId) {
        $sql = "INSERT INTO don_hangs (ma_don_hang, tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, tong_tien, ghi_chu, phuong_thuc_thanh_toan_id, trang_thai_id) 
                VALUES (:ma_don_hang, :tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, NOW(), :tong_tien, :ghi_chu, :phuong_thuc_thanh_toan_id, 1)";
        $stmt = $this->conn->prepare($sql);
        $maDonHang = 'DH-' . time(); // Tạo mã đơn hàng duy nhất
        $stmt->execute([
            ':ma_don_hang' => $maDonHang,
            ':tai_khoan_id' => $userId,
            ':ten_nguoi_nhan' => $tenNguoiNhan,
            ':email_nguoi_nhan' => $emailNguoiNhan,
            ':sdt_nguoi_nhan' => $sdtNguoiNhan,
            ':dia_chi_nguoi_nhan' => $diaChiNguoiNhan,
            ':tong_tien' => $tongTien,
            ':ghi_chu' => $ghiChu,
            ':phuong_thuc_thanh_toan_id' => $phuongThucThanhToanId
        ]);
        return $this->conn->lastInsertId();
    }

    public function luuChiTietDonHang($donHangId, $bienTheId, $soLuong, $donGia) {
        $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id, bien_the_id, so_luong, don_gia, thanh_tien) 
                VALUES (:don_hang_id, :bien_the_id, :so_luong, :don_gia, :thanh_tien)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':don_hang_id' => $donHangId,
            ':bien_the_id' => $bienTheId,
            ':so_luong' => $soLuong,
            ':don_gia' => $donGia,
            ':thanh_tien' => $soLuong * $donGia
        ]);
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
}
?>