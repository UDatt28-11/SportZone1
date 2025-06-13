<?php
class CheckoutController {
    private $gioHangModel;
    private $userId;
    private $modelSanPham;

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
            // Lấy thông tin giỏ hàng
            $gioHang = $this->gioHangModel->getGioHang();
            if (empty($gioHang)) {
                $_SESSION['error'] = 'Giỏ hàng của bạn đang trống.';
                header('Location: ' . BASE_URL . '?act=gio-hang');
                exit;
            }

            // Lấy thông tin người dùng
            $userModel = new TaiKhoan();
            $userInfo = $userModel->getUserById($this->userId);

            // Lấy danh sách phương thức thanh toán
            $phuongThucThanhToan = [
                ['id' => 1, 'ten' => 'Thanh toán khi nhận hàng (COD)'],
                ['id' => 2, 'ten' => 'Chuyển khoản ngân hàng'],
            ];

            // Tính tổng tiền
            $tongTien = $this->gioHangModel->getTongTien();

            require_once 'views/checkout.php';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=gio-hang');
            exit;
        }
    }

    public function processPayment() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Phương thức không hợp lệ');
            }

            // Validate dữ liệu
            $requiredFields = ['ten_nguoi_nhan', 'email_nguoi_nhan', 'sdt_nguoi_nhan', 'dia_chi_nguoi_nhan', 'phuong_thuc_thanh_toan_id'];
            foreach ($requiredFields as $field) {
                if (empty($_POST[$field])) {
                    throw new Exception('Vui lòng điền đầy đủ thông tin');
                }
            }

            // Lấy thông tin từ form
            $tenNguoiNhan = $_POST['ten_nguoi_nhan'];
            $emailNguoiNhan = $_POST['email_nguoi_nhan'];
            $sdtNguoiNhan = $_POST['sdt_nguoi_nhan'];
            $diaChiNguoiNhan = $_POST['dia_chi_nguoi_nhan'];
            $ghiChu = $_POST['ghi_chu'] ?? '';
            $phuongThucThanhToanId = intval($_POST['phuong_thuc_thanh_toan_id']);

            // Lấy thông tin giỏ hàng
            $gioHang = $this->gioHangModel->getGioHang();
            if (empty($gioHang)) {
                throw new Exception('Giỏ hàng của bạn đang trống');
            }

            // Tính tổng tiền
            $tongTien = $this->gioHangModel->getTongTien();

            // Tạo đơn hàng
            $donHangId = $this->gioHangModel->taoDonHang(
                $this->userId,
                $tongTien,
                $tenNguoiNhan,
                $emailNguoiNhan,
                $sdtNguoiNhan,
                $diaChiNguoiNhan,
                $ghiChu,
                $phuongThucThanhToanId
            );

            // Lưu chi tiết đơn hàng
            foreach ($gioHang as $item) {
                $this->gioHangModel->luuChiTietDonHang(
                    $donHangId,
                    $item['bien_the_id'],
                    $item['so_luong'],
                    $item['don_gia']
                );
            }

            // Xử lý thanh toán
            switch ($phuongThucThanhToanId) {
                case 1: // Thanh toán khi nhận hàng
                    $this->gioHangModel->capNhatTrangThaiDonHang($donHangId, '1');
                    $_SESSION['success'] = 'Đặt hàng thành công! Bạn sẽ thanh toán khi nhận hàng.';
                    header('Location: ' . BASE_URL . '?act=order-confirmation&id=' . $donHangId);
                    break;

                case 2: // Chuyển khoản ngân hàng
                    $this->gioHangModel->capNhatTrangThaiDonHang($donHangId, '1');
                    $_SESSION['success'] = 'Đặt hàng thành công! Vui lòng kiểm tra tài khoản ngân hàng của bạn để hoàn tất thanh toán.';
                    header('Location: ' . BASE_URL . '?act=order-confirmation&id=' . $donHangId);
                    break;


                default:
                    throw new Exception('Phương thức thanh toán không hợp lệ');
            }

            // Xóa giỏ hàng
            $this->gioHangModel->xoaGioHang($this->userId);
            exit;

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=checkout');
            exit;
        }
    }
}
?> 