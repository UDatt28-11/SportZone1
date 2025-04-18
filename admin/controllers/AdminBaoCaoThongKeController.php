<?php
class AdminBaoCaoThongKeController {
    public $modelBaoCao;

    public function __construct() {
        $this->modelBaoCao = new AdminBaoCaoThongKe();
    }

    public function home() {
        // Lấy dữ liệu thống kê
        $totalProducts = $this->modelBaoCao->getTotalProducts();
        $totalUsers = $this->modelBaoCao->getTotalUsers();
        $totalOrders = $this->modelBaoCao->getTotalOrders();
        $totalRevenue = $this->modelBaoCao->getTotalRevenue();

        // Truyền dữ liệu vào view
        require_once './views/home.php';
    }
}
?>