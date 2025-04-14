<?php 
class AdminBaoCaoThongKe {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy tổng số sản phẩm
    public function getTotalProducts() {
        $sql = "SELECT COUNT(*) AS total FROM san_phams";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    // Lấy tổng số người dùng
    public function getTotalUsers() {
        $sql = "SELECT COUNT(*) AS total FROM tai_khoans";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    // Lấy tổng số đơn hàng
    public function getTotalOrders() {
        $sql = "SELECT COUNT(*) AS total FROM don_hangs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    // Lấy tổng doanh thu
    public function getTotalRevenue() {
        $sql = "SELECT SUM(tong_tien) AS total FROM don_hangs WHERE trang_thai_id = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }
}
?>