<?php
class GioHang{
    public $conn;
    private $cart_id;
    public function __construct($user_id){
        if (!$user_id) {
            throw new Exception("Người dùng chưa đăng nhập.");
        }
        $this->conn = connectDB();
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
            $stmt = $this->conn->prepare("SELECT * FROM chi_tiet_gio_hangs WHERE gio_hang_id = ? AND bien_the_id = ?");
            $stmt->execute([$this->cart_id, $bienTheId]);
            $item = $stmt->fetch();

            if($item){
                $newQuantity = $item['so_luong'] + $sLuong;
                $stmt = $this->conn->prepare('UPDATE chi_tiet_gio_hangs SET so_luong = ? WHERE id = ?');
                $stmt->execute([$newQuantity, $item['id']]);
            }else{
                $stmt = $this->conn->prepare("INSERT INTO chi_tiet_gio_hangs(gio_hang_id, bien_the_id, so_luong) VALUES (?,?,?)");
                $stmt->execute([$this->cart_id, $bienTheId, $sLuong]);
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
    public function getGioHang(){
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