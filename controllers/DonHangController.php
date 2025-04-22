<?php
class DonHangController {
    private $donHangModel;
    private $sanPhamModel;
    

    public function __construct() {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }

        $this->donHangModel = new DonHang();
        $this->sanPhamModel = new SanPham();
        
        
    }

    public function index() {
        try {
            // Lấy danh sách đơn hàng của người dùng
            $userId = $_SESSION['user']['id'];
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
            // Kiểm tra và lấy ID đơn hàng
            $donHangId = isset($_GET['id']) ? intval($_GET['id']) : 0;
            
            if ($donHangId <= 0) {
                throw new Exception("Không tìm thấy đơn hàng");
            }

            // Lấy thông tin đơn hàng
            $donHang = $this->donHangModel->getDonHangById($donHangId);

            if (!$donHang) {
                throw new Exception("Đơn hàng không tồn tại");
            }
            
            // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
            if ($donHang['tai_khoan_id'] != $_SESSION['user_id']) {
                throw new Exception("Bạn không có quyền thực hiện thao tác này");
            }

            // Kiểm tra trạng thái đơn hàng
            if ($donHang['trang_thai_id'] != 1 && $donHang['trang_thai_id'] != 2) {
                throw new Exception("Không thể hủy đơn hàng ở trạng thái này");
            }

            // Hủy đơn hàng (cập nhật trạng thái thành 11 - Đã hủy)
            $result = $this->donHangModel->capNhatTrangThaiDonHang($donHangId, 11);

            if (!$result) {
                throw new Exception("Không thể hủy đơn hàng");
            }

            $_SESSION['success'] = "Đã hủy đơn hàng thành công";
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();

        } catch (Exception $e) {
            error_log("Error in DonHangController::huyDonHang(): " . $e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();
        }
    }

    public function yeuCauHuyDon() {
        // print_r($_SESSION['user_id']);die;
        try {
            // Kiểm tra và lấy ID đơn hàng
            $donHangId = isset($_GET['id']) ? intval($_GET['id']) : 0;
            
            if ($donHangId <= 0) {
                throw new Exception("Không tìm thấy đơn hàng");
            }

            // Lấy thông tin đơn hàng
            $donHang = $this->donHangModel->getDonHangById($donHangId);

            if (!$donHang) {
                throw new Exception("Đơn hàng không tồn tại");
            }

            // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
            if ($donHang['tai_khoan_id'] != $_SESSION['user_id']) {
                throw new Exception("Bạn không có quyền thực hiện thao tác này");
            }

            // Kiểm tra trạng thái đơn hàng
            if ($donHang['trang_thai_id'] != 1 && $donHang['trang_thai_id'] != 2) {
                throw new Exception("Không thể yêu cầu hủy đơn hàng ở trạng thái này");
            }

            // Cập nhật trạng thái đơn hàng thành "Đang yêu cầu hủy" (trạng thái 12)
            $result = $this->donHangModel->capNhatTrangThaiDonHang($donHangId, 12);

            if (!$result) {
                throw new Exception("Không thể cập nhật trạng thái đơn hàng");
            }

            $_SESSION['success'] = "Đã gửi yêu cầu hủy đơn hàng thành công. Vui lòng chờ xác nhận từ quản trị viên.";
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();

        } catch (Exception $e) {
            error_log("Error in DonHangController::yeuCauHuyDon(): " . $e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();
        }
    }
    public function thanhToanThanhCong() {
        // print_r($_SESSION['user_id']);die;
        try {
            // Kiểm tra và lấy ID đơn hàng
            $donHangId = isset($_GET['id_don_hang']) ? intval($_GET['id_don_hang']) : 0;
            
            if ($donHangId <= 0) {
                throw new Exception("Không tìm thấy đơn hàng");
            }

            // Lấy thông tin đơn hàng
            $donHang = $this->donHangModel->getDonHangById($donHangId);

            if (!$donHang) {
                throw new Exception("Đơn hàng không tồn tại");
            }
            
            // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
            if ($donHang['tai_khoan_id'] != $_SESSION['user_id']) {
                throw new Exception("Bạn không có quyền thực hiện thao tác này");
            }

            // Kiểm tra trạng thái đơn hàng
            if ($donHang['trang_thai_id'] != 2 && $donHang['trang_thai_id'] != 3) {
                throw new Exception("Không thể thanh toán đơn hàng ở trạng thái này");
            }

            $result = $this->donHangModel->capNhatTrangThaiDonHang($donHangId, 4);

            if (!$result) {
                throw new Exception("Không thể thanh toán đơn hàng");
            }

            $_SESSION['success'] = "Đã thanh toán đơn hàng thành công";
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();

        } catch (Exception $e) {
            error_log("Error in DonHangController::huyDonHang(): " . $e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();
        }
    }
    public function nhanHang() {
        // print_r($_SESSION['user_id']);die;
        try {
            // Kiểm tra và lấy ID đơn hàng
            $donHangId = isset($_GET['id_don_hang']) ? intval($_GET['id_don_hang']) : 0;
            
            if ($donHangId <= 0) {
                throw new Exception("Không tìm thấy đơn hàng");
            }

            // Lấy thông tin đơn hàng
            $donHang = $this->donHangModel->getDonHangById($donHangId);

            if (!$donHang) {
                throw new Exception("Đơn hàng không tồn tại");
            }
            
            // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
            if ($donHang['tai_khoan_id'] != $_SESSION['user_id']) {
                throw new Exception("Bạn không có quyền thực hiện thao tác này");
            }

            // Kiểm tra trạng thái đơn hàng
            if ($donHang['trang_thai_id'] != 7) {
                throw new Exception("Không thể xác nhận đơn hàng ở trạng thái này");
            }

            $result = $this->donHangModel->capNhatTrangThaiDonHang($donHangId, 8);

            if (!$result) {
                throw new Exception("Không thể xác nhận đơn hàng");
            }

            $_SESSION['success'] = "Đã xác nhận đơn hàng thành công";
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();

        } catch (Exception $e) {
            error_log("Error in DonHangController::huyDonHang(): " . $e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();
        }
    }
    public function hoanHang() {
        // print_r($_SESSION['user_id']);die;
        try {
            // Kiểm tra và lấy ID đơn hàng
            $donHangId = isset($_GET['id_don_hang']) ? intval($_GET['id_don_hang']) : 0;
            
            if ($donHangId <= 0) {
                throw new Exception("Không tìm thấy đơn hàng");
            }

            // Lấy thông tin đơn hàng
            $donHang = $this->donHangModel->getDonHangById($donHangId);

            if (!$donHang) {
                throw new Exception("Đơn hàng không tồn tại");
            }
            
            // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
            if ($donHang['tai_khoan_id'] != $_SESSION['user_id']) {
                throw new Exception("Bạn không có quyền thực hiện thao tác này");
            }

            // Kiểm tra trạng thái đơn hàng
            if ($donHang['trang_thai_id'] != 8) {
                throw new Exception("Không thể hoàn đơn hàng ở trạng thái này");
            }

            $result = $this->donHangModel->capNhatTrangThaiDonHang($donHangId, 10);

            if (!$result) {
                throw new Exception("Không thể hoàn đơn hàng");
            }

            $_SESSION['success'] = "Đã hoàn đơn hàng thành công";
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();

        } catch (Exception $e) {
            error_log("Error in DonHangController::huyDonHang(): " . $e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=don-hang');
            exit();
        }
    }
} 