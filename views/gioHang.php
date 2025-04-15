<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<br>
 <br>
<br><hr><br>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Giỏ hàng của bạn</h1>
    
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error'] ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($listGioHang)): ?>
        <div class="text-center py-8">
            <p class="text-gray-600">Giỏ hàng của bạn đang trống</p>
            <a href="<?= BASE_URL ?>" class="mt-4 inline-block bg-black text-white px-4 py-2 rounded">
                Tiếp tục mua sắm
            </a>
        </div>
    <?php else: ?>
        <form method="POST" action="?act=update-gio-hang" class="bg-white shadow-md rounded-lg p-6">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">Sản phẩm</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Đơn giá</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Số lượng</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Thành tiền</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listGioHang as $item): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">
                                <?= htmlspecialchars($item['ten_san_pham']) ?>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <?= number_format($item['don_gia'], 0, ',', '.') ?> đ
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <input type="number" name="so_luong[<?= $item['bien_the_id'] ?>]" 
                                       value="<?= $item['so_luong'] ?>" min="1"
                                       class="w-16 border border-gray-300 rounded text-center focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <?= number_format($item['don_gia'] * $item['so_luong'], 0, ',', '.') ?> đ
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button type="submit" name="remove" value="<?= $item['bien_the_id'] ?>"
                                        class="btn btn-danger bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mt-4 flex justify-between">
                <a href="<?= BASE_URL ?>" class="btn btn-secondary bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Tiếp tục mua sắm
                </a>
                <div>
                    <button type="submit" name="update"
                            class="btn btn-warning bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Cập nhật giỏ hàng
                    </button>
                    <a href="?act=dat-hang" class="btn btn-success bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                        Đặt Hàng
                    </a>
                </div>
            </div>
        </form>
        <form method="POST" action="?act=dat-hang" class="bg-white shadow-md rounded-lg p-6 mt-6">
            <h2 class="text-xl font-bold mb-4">Thông tin đặt hàng</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="ten_nguoi_nhan" class="block text-sm font-medium text-gray-700">Tên người nhận</label>
                    <input type="text" name="ten_nguoi_nhan" id="ten_nguoi_nhan" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="email_nguoi_nhan" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email_nguoi_nhan" id="email_nguoi_nhan" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="sdt_nguoi_nhan" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="text" name="sdt_nguoi_nhan" id="sdt_nguoi_nhan" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="dia_chi_nguoi_nhan" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                    <textarea name="dia_chi_nguoi_nhan" id="dia_chi_nguoi_nhan" required
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div>
                    <label for="ghi_chu" class="block text-sm font-medium text-gray-700">Ghi chú</label>
                    <textarea name="ghi_chu" id="ghi_chu"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div>
                    <label for="phuong_thuc_thanh_toan_id" class="block text-sm font-medium text-gray-700">Phương thức thanh toán</label>
                    <select name="phuong_thuc_thanh_toan_id" id="phuong_thuc_thanh_toan_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="1">COD (Thanh toán khi nhận hàng)</option>
                        <option value="2">Thanh toán VNPay</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-payment-submit mt-4 bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                Đặt Hàng
            </button>
        </form>
    <?php endif; ?>
</div>

<?php require_once 'layout/footer.php'; ?>