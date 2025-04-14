<?php
class DonHangController {
    public $modelDonHang;

    public function __construct() {
        $this->modelDonHang = new DonHang();
    }
    public function formDatHang()
    {
        // Hàm này dùng để hiển thị form nhập
        require_once './views/datHang.php';
    }

    public function datHang() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ma_don_hang' => 'DH' . time(),
                'ten_nguoi_nhan' => $_POST['ten_nguoi_nhan'],
                'sdt_nguoi_nhan' => $_POST['sdt_nguoi_nhan'],
                'email_nguoi_nhan' => $_POST['email_nguoi_nhan'],
                'dia_chi_nguoi_nhan' => $_POST['dia_chi_nguoi_nhan'],
                'tong_tien' => $_POST['tong_tien'],
                'chi_tiet' => json_decode($_POST['chi_tiet'], true)
            ];

            $donHangId = $this->modelDonHang->taoDonHang($data);

            if ($donHangId) {
                header("Location: " . BASE_URL . "?act=don-hang-thanh-cong&id=" . $donHangId);
                exit();
            } else {
                echo "Đặt hàng thất bại!";
            }
        }
    }
}
?>