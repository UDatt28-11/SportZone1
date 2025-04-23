<?php
if (!isset($_SESSION['payment_info'])) {
    header('Location: ' . BASE_URL);
    exit;
}

$paymentInfo = $_SESSION['payment_info'];
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Thông tin chuyển khoản</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        <h5 class="alert-heading">Đơn hàng #<?php echo $paymentInfo['order_id']; ?> đã được tạo thành công!</h5>
                        <p>Vui lòng chuyển khoản theo thông tin bên dưới để hoàn tất đơn hàng.</p>
                    </div>

                    <div class="payment-info">
                        <h5 class="mb-3">Thông tin ngân hàng</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="bg-light">Ngân hàng</th>
                                    <td><?php echo $paymentInfo['bank_name']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Số tài khoản</th>
                                    <td><?php echo $paymentInfo['account_number']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Chủ tài khoản</th>
                                    <td><?php echo $paymentInfo['account_name']; ?></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Số tiền</th>
                                    <td class="text-danger fw-bold"><?php echo number_format($paymentInfo['amount'], 0, ',', '.'); ?> VNĐ</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Nội dung chuyển khoản</th>
                                    <td>Thanh toan don hang #<?php echo $paymentInfo['order_id']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5 class="mb-3">Hướng dẫn thanh toán</h5>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Đăng nhập vào ứng dụng ngân hàng của bạn</li>
                            <li class="list-group-item">Chọn chức năng chuyển tiền</li>
                            <li class="list-group-item">Nhập thông tin chuyển khoản như bảng trên</li>
                            <li class="list-group-item">Nhập nội dung chuyển khoản chính xác</li>
                            <li class="list-group-item">Kiểm tra lại thông tin và xác nhận giao dịch</li>
                        </ol>
                    </div>

                    <div class="mt-4">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> 
                            <strong>Lưu ý:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Vui lòng chuyển khoản đúng số tiền và nội dung như trên</li>
                                <li>Đơn hàng sẽ được xử lý sau khi chúng tôi nhận được thanh toán</li>
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
.payment-info {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
}
.table th {
    width: 30%;
}
</style> 