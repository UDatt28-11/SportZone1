<?php
if (!isset($_GET['id'])) {
    header('Location: ' . BASE_URL);
    exit;
}

$donHangId = $_GET['id'];
$donHangModel = new DonHang();
$donHang = $donHangModel->getDonHangById($donHangId);

if (!$donHang) {
    header('Location: ' . BASE_URL);
    exit;
}
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
                                    <td><?php echo $donHang['ten_phuong_thuc_thanh_toan']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Tổng tiền</th>
                                    <td class="text-danger fw-bold"><?php echo number_format($donHang['tong_tien'], 0, ',', '.'); ?> VNĐ</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Trạng thái</th>
                                    <td>
                                        <span class="badge bg-<?php 
                                            echo $donHang['trang_thai'] == 'pending' ? 'warning' : 
                                                ($donHang['trang_thai'] == 'completed' ? 'success' : 'info'); 
                                        ?>">
                                            <?php 
                                            echo $donHang['trang_thai'] == 'pending' ? 'Chờ xử lý' : 
                                                ($donHang['trang_thai'] == 'completed' ? 'Hoàn thành' : 'Đang xử lý'); 
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($donHang['chi_tiet'] as $item): ?>
                                    <tr>
                                        <td><?php echo $item['ten_san_pham']; ?></td>
                                        <td><?php echo $item['so_luong']; ?></td>
                                        <td><?php echo number_format($item['don_gia'], 0, ',', '.'); ?> VNĐ</td>
                                        <td><?php echo number_format($item['thanh_tien'], 0, ',', '.'); ?> VNĐ</td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

                    <div class="mt-4 text-center">
                        <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">
                            <i class="fas fa-home"></i> Về trang chủ
                        </a>
                        <a href="<?php echo BASE_URL; ?>?act=order-history" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-history"></i> Xem lịch sử đơn hàng
                        </a>
                    </div>
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