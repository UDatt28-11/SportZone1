<?php
if (empty($gioHang)) {
    header('Location: ' . BASE_URL . '?act=gio-hang');
    exit;
}
?>

<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<br><br><br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Thông tin thanh toán</h4>
                </div>
                <div class="row card-body">
                    <form action="<?php echo BASE_URL; ?>?act=process-payment" method="POST" id="checkoutForm">
                        <div class=" form-group">
                            <label for="ten_nguoi_nhan" class="form-label">Họ tên người nhận</label><br>
                            <input type="text" class="form-control" id="ten_nguoi_nhan" name="ten_nguoi_nhan" 
                                value="<?php echo $userInfo['ho_ten'] ?? ''; ?>" required>
                        </div>

                        <div class=" form-group">
                            <label for="email_nguoi_nhan" class="form-label">Email</label><br>
                            <input type="email" class="form-control" id="email_nguoi_nhan" name="email_nguoi_nhan" 
                                value="<?php echo $userInfo['email'] ?? ''; ?>" required>
                        </div>

                        <div class=" form-group">
                            <label for="sdt_nguoi_nhan" class="form-label">Số điện thoại</label><br>
                            <input type="tel" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" 
                                value="<?php echo $userInfo['so_dien_thoai'] ?? ''; ?>" required>
                        </div>

                        <div class=" form-group">
                            <label for="dia_chi_nguoi_nhan" class="form-label">Địa chỉ nhận hàng</label><br>
                            <textarea class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" rows="3" required></textarea>
                        </div>

                        <div class=" form-group">
                            <label for="ghi_chu" class="form-label">Ghi chú</label><br>
                            <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3"></textarea>
                        </div>

                        <div class="">
                            <label class="form-label">Phương thức thanh toán</label>
                            <div class="list-group">
                                <?php foreach ($phuongThucThanhToan as $pttt): ?>
                                <label class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" name="phuong_thuc_thanh_toan_id" 
                                        value="<?php echo $pttt['id']; ?>" required>
                                    <?php echo $pttt['ten']; ?>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">Đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
        <style>
            .form-control{
                width: 1194px !important;
            }
        </style>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Đơn hàng của bạn</h4>
                </div>
                <div class="card-body">
                    <div class="order-summary">
                        <?php foreach ($gioHang as $item): ?>
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <h6 class="mb-0"><?php echo $item['ten_san_pham']; ?></h6>
                                <small class="text-muted">x<?php echo $item['so_luong']; ?></small>
                            </div>
                            <div class="text-end">
                                <div class="fw-bold"><?php echo number_format($item['don_gia'] * $item['so_luong'], 0, ',', '.'); ?> VNĐ</div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">Tổng tiền:</div>
                            <div class="fw-bold text-danger"><?php echo number_format($tongTien, 0, ',', '.'); ?> VNĐ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>

<style>
/* Reset và base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Card styles */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    background: #fff;
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
    padding: 15px 20px;
}

.card-body {
    padding: 20px;
}

/* Form styles */
.form-label {
    font-weight: 500;
    color: #495057;
    margin-bottom: 8px;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 5px;
    padding: 10px 15px;
    transition: border-color 0.2s;
}

.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* List group styles */
.list-group {
    border-radius: 5px;
    overflow: hidden;
}

.list-group-item {
    border: 1px solid #dee2e6;
    padding: 12px 15px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.list-group-item:hover {
    background-color: #f8f9fa;
}

/* Button styles */
.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 12px 20px;
    font-weight: 500;
    transition: background-color 0.2s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Order summary styles */
.order-summary {
    max-height: 400px;
    overflow-y: auto;
    padding-right: 10px;
}

.order-summary::-webkit-scrollbar {
    width: 5px;
}

.order-summary::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.order-summary::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 5px;
}

.order-summary::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Responsive styles */
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }
    
    .card-body {
        padding: 15px;
    }
    
    .form-control {
        padding: 8px 12px;
    }
}
</style>

<script>
document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    if (!validateForm()) {
        e.preventDefault();
    }
});

function validateForm() {
    const requiredFields = ['ten_nguoi_nhan', 'email_nguoi_nhan', 'sdt_nguoi_nhan', 'dia_chi_nguoi_nhan'];
    let isValid = true;

    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });

    const paymentMethod = document.querySelector('input[name="phuong_thuc_thanh_toan_id"]:checked');
    if (!paymentMethod) {
        alert('Vui lòng chọn phương thức thanh toán');
        isValid = false;
    }

    return isValid;
}
</script> 