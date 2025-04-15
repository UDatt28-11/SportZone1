<?php 
require_once 'models/HinhAnhSanPham.php';
require_once 'layout/header.php'; 
require_once './views/layout/menu.php'; 
?>
<br>
<br>
<br><hr><br>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Lịch sử đơn hàng</h1>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            <?= $_SESSION['success'] ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <?= $_SESSION['error'] ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($donHangList)): ?>
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
            <p>Bạn chưa có đơn hàng nào.</p>
        </div>
    <?php else: ?>
        <div class="space-y-8">
            <?php foreach ($donHangList as $donHang): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Header -->
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800">Đơn hàng #<?= $donHang['ma_don_hang'] ?></h2>
                                <p class="text-gray-600">Ngày đặt: <?= date('d/m/Y', strtotime($donHang['ngay_dat'])) ?></p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-gray-800">Tổng tiền: <?= number_format($donHang['tong_tien'], 0, ',', '.') ?>đ</p>
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                    <?= $donHang['trang_thai_id'] == 9 ? 'bg-green-100 text-green-800' : 
                                       ($donHang['trang_thai_id'] == 1 ? 'bg-yellow-100 text-yellow-800' : 
                                       ($donHang['trang_thai_id'] == 11 ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800')) ?>">
                                    <?= $donHang['ten_trang_thai'] ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="px-6 py-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">Sản phẩm đã đặt (<?= count($donHang['chi_tiet']) ?>)</h3>
                            <button onclick="toggleProducts(<?= $donHang['id'] ?>)" 
                                    class="text-blue-600 hover:text-blue-800 flex items-center">
                                <span id="toggleText-<?= $donHang['id'] ?>">Xem chi tiết</span>
                                <svg id="toggleIcon-<?= $donHang['id'] ?>" class="w-5 h-5 ml-1 transform rotate-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>
                        <div id="products-<?= $donHang['id'] ?>" class="space-y-4" style="display: none;">
                            <?php foreach ($donHang['chi_tiet'] as $chiTiet): ?>
                                <?php
                                $hinhAnh = (new HinhAnhSanPham())->getHinhAnhBySanPhamAndMau($chiTiet['sp_id'], $chiTiet['mau_id']);
                                ?>
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-4">
                                        <img src="<?= BASE_URL . ($hinhAnh ? $hinhAnh['link_hinh_anh'] : 'uploads/default.jpg') ?>" 
                                             alt="<?= $chiTiet['ten_san_pham'] ?>" 
                                             class="w-20 h-20 object-cover rounded">
                                        <div>
                                            <h4 class="font-medium text-gray-800"><?= $chiTiet['ten_san_pham'] ?></h4>
                                            <div class="text-sm text-gray-600">
                                                <p>Số lượng: <?= $chiTiet['so_luong'] ?></p>
                                                <?php if ($chiTiet['mau_sac']): ?>
                                                    <p>Màu: <?= $chiTiet['mau_sac'] ?></p>
                                                <?php endif; ?>
                                                <?php if ($chiTiet['kich_co']): ?>
                                                    <p>Size: <?= $chiTiet['kich_co'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-gray-800"><?= number_format($chiTiet['don_gia'], 0, ',', '.') ?>đ</p>
                                        <p class="text-sm text-gray-600">Thành tiền: <?= number_format($chiTiet['don_gia'] * $chiTiet['so_luong'], 0, ',', '.') ?>đ</p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Shipping Info -->
                    <div class="px-6 py-4 bg-gray-50">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Thông tin giao hàng</h3>
                                <div class="space-y-1 text-gray-600">
                                    <p><span class="font-medium">Người nhận:</span> <?= $donHang['ten_nguoi_nhan'] ?></p>
                                    <p><span class="font-medium">Số điện thoại:</span> <?= $donHang['sdt_nguoi_nhan'] ?></p>
                                    <p><span class="font-medium">Email:</span> <?= $donHang['email_nguoi_nhan'] ?></p>
                                    <p><span class="font-medium">Địa chỉ:</span> <?= $donHang['dia_chi_nguoi_nhan'] ?></p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Thông tin thanh toán</h3>
                                <div class="space-y-1 text-gray-600">
                                    <p><span class="font-medium">Phương thức:</span> <?= $donHang['ten_phuong_thuc'] ?></p>
                                    <?php if ($donHang['ghi_chu']): ?>
                                        <p><span class="font-medium">Ghi chú:</span> <?= $donHang['ghi_chu'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <?php if ($donHang['trang_thai_id'] == 1 || $donHang['trang_thai_id'] == 3): ?>
                        <div class="px-6 py-4 border-t">
                            <div class="flex justify-end">
                                <button onclick="huyDonHang(<?= $donHang['id'] ?>)" 
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                                    Hủy đơn hàng
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
// Thu gọn tất cả đơn hàng khi trang được tải
document.addEventListener('DOMContentLoaded', function() {
    const orderIds = <?= json_encode(array_column($donHangList, 'id')) ?>;
    orderIds.forEach(orderId => {
        const productsDiv = document.getElementById(`products-${orderId}`);
        const toggleText = document.getElementById(`toggleText-${orderId}`);
        const toggleIcon = document.getElementById(`toggleIcon-${orderId}`);
        
        productsDiv.style.display = 'none';
        toggleText.textContent = 'Xem chi tiết';
        toggleIcon.classList.remove('rotate-180');
        toggleIcon.classList.add('rotate-0');
    });
});

function toggleProducts(orderId) {
    const productsDiv = document.getElementById(`products-${orderId}`);
    const toggleText = document.getElementById(`toggleText-${orderId}`);
    const toggleIcon = document.getElementById(`toggleIcon-${orderId}`);
    
    if (productsDiv.style.display === 'none') {
        productsDiv.style.display = 'block';
        toggleText.textContent = 'Thu gọn';
        toggleIcon.classList.remove('rotate-0');
        toggleIcon.classList.add('rotate-180');
    } else {
        productsDiv.style.display = 'none';
        toggleText.textContent = 'Xem chi tiết';
        toggleIcon.classList.remove('rotate-180');
        toggleIcon.classList.add('rotate-0');
    }
}

function huyDonHang(donHangId) {
    if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')) {
        window.location.href = '<?= BASE_URL ?>?act=huy-don-hang&id=' + donHangId;
    }
}
</script>

<?php require_once 'layout/footer.php'; ?> 