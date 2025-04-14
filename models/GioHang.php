<?php
class GioHang{
    public $conn;
    private $cart_id;
    public function __construct($user_id){
        if (!$user_id) {
            $this->conn = null; // hoặc return;
            return;
        }
    
        $this->conn = connectDB(); // ⭐ rất quan trọng
        $this->kiemGioHang($user_id);
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
    public function getGioHang(){
        if (!$this->conn) return []; // hoặc throw một lỗi phù hợp
    
        $stmt = $this->conn->prepare("SELECT ctgh.*, sp.ten_san_pham, bt.don_gia
            FROM chi_tiet_gio_hangs ctgh
            JOIN bien_the_sp bt ON ctgh.bien_the_id = bt.id
            JOIN san_phams sp ON bt.sp_id = sp.id
            WHERE ctgh.gio_hang_id = ?");
        $stmt->execute([$this->cart_id]);
        return $stmt->fetchAll();
    }
    
}
?>