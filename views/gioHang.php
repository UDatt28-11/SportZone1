<?php require_once 'layout/header.php'; ?>
<?php require_once './views/layout/menu.php'; ?>
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

            <!-- Thêm phần hiển thị tổng tiền -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                <div class="flex justify-between items-center">
                    <div class="text-lg font-semibold">Tổng tiền:</div>
                    <div class="text-2xl font-bold text-red-600">
                        <?= number_format($tongTien, 0, ',', '.') ?> đ
                    </div>
                </div>
            </div>

            <div class="mt-4 flex justify-between">
                <a href="<?= BASE_URL ?>" class="btn btn-secondary bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Tiếp tục mua sắm
                </a>
                <div>
                    <button type="submit" name="update"
                            class="btn btn-warning bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Cập nhật giỏ hàng
                    </button>
                    <a href="<?= BASE_URL ?>?act=checkout" 
                       class="btn btn-primary btn-payment-submit bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 ml-4">
                        Thanh toán
                    </a>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php require_once 'layout/footer.php'; ?>