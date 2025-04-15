<?php
class DonHangController {
    private $donHangModel;
    private $sanPhamModel;

    public function __construct() {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_client'])) {
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }

        $this->donHangModel = new DonHang();
        $this->sanPhamModel = new SanPham();
    }

    public function index() {
        try {
            // Lấy danh sách đơn hàng của người dùng
            $userId = $_SESSION['user_client']['id'];
            $donHangList = $this->donHangModel->getDonHangByUserId($userId);
            // echo '<pre>';
            // print_r($donHangList);
            // echo '</pre>';

            if ($donHangList === false) {
                throw new Exception("Không thể lấy danh sách đơn hàng");
            }

            // Lấy thông tin chi tiết cho mỗi đơn hàng
            foreach ($donHangList as &$donHang) {
                $chiTiet = $this->donHangModel->getChiTietDonHang($donHang['id']);
                if ($chiTiet === false) {
                    throw new Exception("Không thể lấy chi tiết đơn hàng #" . $donHang['id']);
                }
                $donHang['chi_tiet'] = $chiTiet;
            }

            // Hiển thị view
            require_once 'views/donHang.php';
        } catch (Exception $e) {
            error_log("Error in DonHangController::index(): " . $e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL);
            exit();
        }
    }

    public function huyDonHang() {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu thông tin đơn hàng');
            }

            $donHangId = $_GET['id'];
            $userId = $_SESSION['user_client']['id'];
            
            // Kiểm tra xem đơn hàng có thuộc về người dùng này không
            $donHang = $this->donHangModel->getDonHangById($donHangId);
            if (!$donHang || $donHang['id_tai_khoan'] != $userId) {
                throw new Exception('Không tìm thấy đơn hàng');
            }

            // Kiểm tra trạng thái đơn hàng có thể hủy không
            if (!in_array($donHang['trang_thai'], ['pending', 'pending_payment'])) {
                throw new Exception('Không thể hủy đơn hàng ở trạng thái này');
            }

            // Hủy đơn hàng
            if (!$this->donHangModel->huyDonHang($donHangId)) {
                throw new Exception('Không thể hủy đơn hàng');
            }
            
            $_SESSION['success'] = 'Đã hủy đơn hàng thành công';
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();
        } catch(Exception $e) {
            error_log("Error in DonHangController::huyDonHang(): " . $e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();
        }
    }
} 