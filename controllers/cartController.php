<?php
class CartController {
    private $gioHangModel;
    private $userId;
    public $modelSanPham;

    public function __construct() {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '?act=login');
            exit;
        }
        $this->userId = $_SESSION['user_id'];
        $this->gioHangModel = new GioHang($this->userId);
        $this->modelSanPham = new SanPham();
    }

    public function index() {
        try {
            $cartItems = $this->gioHangModel->getGioHang();
            $totalPrice = $this->gioHangModel->getTongTien($this->userId);
            $totalQuantity = $this->gioHangModel->getSoLuongSanPham($this->userId);

            require_once 'views/gioHang.php';
        } catch(Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL);
            exit;
        }
    }

    public function addToCart() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Invalid request method');
            }

            $bienTheId = $_POST['bien_the_id'] ?? null;
            $soLuong = $_POST['so_luong'] ?? 1;

            if (!$bienTheId) {
                throw new Exception('Vui lòng chọn sản phẩm');
            }

            $result = $this->gioHangModel->themVaoGio($bienTheId, $soLuong);

            if ($result) {
                $_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
            }

            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'message' => 'Thêm vào giỏ hàng thành công',
                    'totalQuantity' => $this->gioHangModel->getSoLuongSanPham($this->userId)
                ]);
                exit;
            }

            header('Location: ' . BASE_URL . '?act=gio-hang');
            exit;
        } catch(Exception $e) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
                exit;
            }

            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=gio-hang');
            exit;
        }
    }

    public function updateQuantity() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Phương thức không hợp lệ');
            }

            if (!isset($_SESSION['user_id'])) {
                throw new Exception('Vui lòng đăng nhập để tiếp tục');
            }

            $user_id = $_SESSION['user_id'];

            // Xử lý xóa sản phẩm
            if (isset($_POST['remove'])) {
                $bienTheId = intval($_POST['remove']);
                $this->gioHangModel->xoaKhoiGio($bienTheId);
                $_SESSION['success'] = 'Xóa sản phẩm thành công';
                header('Location: ?act=gio-hang');
                exit;
            }

            // Xử lý cập nhật số lượng
            if (isset($_POST['update'])) {
                $soLuongData = $_POST['so_luong'] ?? [];
                foreach ($soLuongData as $bienTheId => $soLuong) {
                    $soLuong = intval($soLuong);
                    if ($soLuong > 0) {
                        $this->gioHangModel->updateSoLuong($bienTheId, $user_id, $soLuong);
                    }
                }
                $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
                header('Location: ?act=gio-hang');
                exit;
            }

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ?act=gio-hang');
            exit;
        }
    }
    
    public function removeItem() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Phương thức không hợp lệ');
            }

            if (!isset($_POST['bien_the_id'])) {
                throw new Exception('Thiếu thông tin sản phẩm');
            }

            $bienTheId = $_POST['bien_the_id'];
            $userId = $_SESSION['user_id'];

            // Xóa sản phẩm khỏi giỏ hàng
            $result = $this->gioHangModel->xoaKhoiGio($bienTheId);

            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                header('Content-Type: application/json');
                echo json_encode($result);
                exit;
            }

            // Nếu không phải AJAX request, chuyển hướng về trang giỏ hàng
            header('Location: ?act=gio-hang');
            exit;
        } catch (Exception $e) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
                exit;
            }

            $_SESSION['error'] = $e->getMessage();
            header('Location: ?act=gio-hang');
            exit;
        }
    }

    public function datHang() {
        try {
            if (!isset($_SESSION['user_id'])) {
                throw new Exception('Vui lòng đăng nhập để đặt hàng.');
            }

            $userId = $_SESSION['user_id'];
            $gioHang = $this->gioHangModel->getGioHang();

            if (empty($gioHang)) {
                throw new Exception('Giỏ hàng của bạn đang trống.');
            }

            // Lấy thông tin từ form đặt hàng
            $tenNguoiNhan = $_POST['ten_nguoi_nhan'] ?? '';
            $emailNguoiNhan = $_POST['email_nguoi_nhan'] ?? '';
            $sdtNguoiNhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $diaChiNguoiNhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghiChu = $_POST['ghi_chu'] ?? '';
            $phuongThucThanhToanId = intval($_POST['phuong_thuc_thanh_toan_id'] ?? 1);

            // Tính tổng tiền
            $tongTien = 0;
            foreach ($gioHang as $item) {
                $tongTien += $item['don_gia'] * $item['so_luong'];
            }

            // Tạo đơn hàng
            $donHangId = $this->gioHangModel->taoDonHang($userId, $tongTien, $tenNguoiNhan, $emailNguoiNhan, $sdtNguoiNhan, $diaChiNguoiNhan, $ghiChu, $phuongThucThanhToanId);

            // Lưu chi tiết đơn hàng
            foreach ($gioHang as $item) {
                $this->gioHangModel->luuChiTietDonHang($donHangId, $item['bien_the_id'], $item['so_luong'], $item['don_gia']);
            }

            // Xóa giỏ hàng
            $this->gioHangModel->xoaGioHang($userId);

            $_SESSION['success'] = 'Đặt hàng thành công!';
            header('Location: ?act=gio-hang');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ?act=gio-hang');
            exit;
        }
    }
}