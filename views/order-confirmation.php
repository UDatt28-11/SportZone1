<?php require_once 'layout/header.php'; ?>
<?php require_once './views/layout/menu.php'; ?>
<br><br><br><br>
<?php

require_once __DIR__ . '/../models/HinhAnhSanPham.php';

if (!isset($_GET['id'])) {
    header('Location: ' . BASE_URL);
    exit;
}

$donHangId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$donHangId) {
    $_SESSION['error'] = "ID đơn hàng không hợp lệ.";
    header('Location: ' . BASE_URL);
    exit;
}

$donHangModel = new DonHang();
$donHang = $donHangModel->getDonHangById($donHangId);

if (!$donHang || !is_array($donHang)) {
    $_SESSION['error'] = "Không tìm thấy đơn hàng.";
    header('Location: ' . BASE_URL);
    exit;
}

// Lấy chi tiết đơn hàng
$chiTiet = $donHangModel->getChiTietDonHang($donHang['id']);
if ($chiTiet === false) {
    throw new Exception("Không thể lấy chi tiết đơn hàng #" . $donHang['id']);
}
$donHang['chi_tiet'] = $chiTiet;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Đặt hàng thành công!</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        <h5 class="alert-heading">Cảm ơn bạn đã đặt hàng!</h5>
                        <p>Mã đơn hàng của bạn là: <strong>#<?php echo $donHang['ma_don_hang']; ?></strong></p>
                    </div>

                    <div class="order-details">
                        <h5 class="mb-3">Thông tin đơn hàng</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="bg-light">Ngày đặt hàng</th>
                                    <td><?php echo date('d/m/Y H:i', strtotime($donHang['ngay_dat'])); ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Tên người nhận</th>
                                    <td><?php echo $donHang['ten_nguoi_nhan']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Email</th>
                                    <td><?php echo $donHang['email_nguoi_nhan']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Số điện thoại</th>
                                    <td><?php echo $donHang['sdt_nguoi_nhan']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Địa chỉ nhận hàng</th>
                                    <td><?php echo $donHang['dia_chi_nguoi_nhan']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Phương thức thanh toán</th>
                                    <td><?php echo $donHang['ten_phuong_thuc']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Tổng tiền</th>
                                    <td class="text-danger fw-bold"><?php echo number_format($donHang['tong_tien'], 0, ',', '.'); ?> VNĐ</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Trạng thái</th>
                                    <td>
                                        <span class="badge bg-<?php 
                                            echo $donHang['trang_thai_id'] == '3' ? 'warning' : 
                                                ($donHang['trang_thai_id'] == '4' ? 'success' : 'info'); 
                                        ?>">
                                            <?php 
                                            echo $donHang['trang_thai_id'] == '3' ? 'Chờ xử lý' : 
                                                ($donHang['trang_thai_id'] == '4' ? 'Hoàn thành' : 'Đang xử lý'); 
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5 class="mb-3">Chi tiết đơn hàng</h5>
                        <div class="table-responsive">
                            
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <?php foreach ($donHang['chi_tiet'] as $chiTiet): ?>
                                <?php
                                    $hinhAnh = (new HinhAnhSanPham())->getHinhAnhBySanPhamAndMau($chiTiet['sp_id'], $chiTiet['mau_id']);
                                ?>
                                <div class="bg-gray-50 rounded-lg p-3 shadow-sm">
                                    <img src="<?= BASE_URL . ($hinhAnh ? $hinhAnh['link_hinh_anh'] : 'uploads/default.jpg')  ?>" 
                                        alt="<?= $chiTiet['ten_san_pham'] ?>" class="w-full h-40 object-cover rounded mb-3">
                                    <h4 class="font-medium text-gray-800"><?= $chiTiet['ten_san_pham'] ?></h4>
                                    <div class="text-sm text-gray-600">
                                        <p>Số lượng: <?= $chiTiet['so_luong'] ?></p>
                                        <?php if ($chiTiet['mau_sac']): ?><p>Màu: <?= $chiTiet['mau_sac'] ?></p><?php endif; ?>
                                        <?php if ($chiTiet['kich_co']): ?><p>Size: <?= $chiTiet['kich_co'] ?></p><?php endif; ?>
                                    </div>
                                    <div class="text-right mt-2 text-sm text-gray-800">
                                        <p class="font-semibold"><?= number_format($chiTiet['don_gia'], 0, ',', '.') ?>đ</p>
                                        <p class="text-xs text-gray-500">Thành tiền: <?= number_format($chiTiet['don_gia'] * $chiTiet['so_luong'], 0, ',', '.') ?>đ</p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                                
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> 
                            <strong>Lưu ý:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Bạn có thể theo dõi trạng thái đơn hàng trong phần "Lịch sử đơn hàng"</li>
                                <li>Nếu có bất kỳ thắc mắc nào, vui lòng liên hệ hotline: 1900 1234</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6 text-center space-x-3">
                        <a href="<?= BASE_URL ?>" 
                        class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 text-sm font-medium rounded-lg hover:bg-blue-50 transition">
                            <i class="fas fa-home mr-2"></i> Về trang chủ
                        </a>
                        <a href="<?= BASE_URL ?>?act=don-hang" 
                        class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 text-sm font-medium rounded-lg hover:bg-blue-50 transition">
                            <i class="fas fa-history mr-2"></i> Xem lịch sử đơn hàng
                        </a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.order-details {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
}
.table th {
    width: 30%;
}
</style>
<?php require_once 'layout/footer.php'; ?> 