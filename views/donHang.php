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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($donHangList as $donHang): ?>
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden flex flex-col">
            <!-- Header -->
            <div class="bg-gray-100 px-5 py-4 border-b">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Đơn hàng #<?= $donHang['ma_don_hang'] ?></h2>
                        <p class="text-sm text-gray-600">Ngày đặt: <?= date('d/m/Y', strtotime($donHang['ngay_dat'])) ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-base font-bold text-black"><?= number_format($donHang['tong_tien'], 0, ',', '.') ?>đ</p>
                        <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs font-medium
                            <?= $donHang['trang_thai_id'] == 9 ? 'bg-green-100 text-green-700' : 
                                ($donHang['trang_thai_id'] == 1 ? 'bg-yellow-100 text-yellow-700' : 
                                ($donHang['trang_thai_id'] == 11 ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700')) ?>">
                            <?= $donHang['ten_trang_thai'] ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="px-5 py-4">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-sm font-semibold text-gray-700">Sản phẩm đã đặt (<?= count($donHang['chi_tiet']) ?>)</h3>
                    <button onclick="toggleProducts(<?= $donHang['id'] ?>)" class="text-sm text-blue-600 hover:underline flex items-center">
                        <span id="toggleText-<?= $donHang['id'] ?>">Xem chi tiết</span>
                        <svg id="toggleIcon-<?= $donHang['id'] ?>" class="w-4 h-4 ml-1 transform rotate-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
                <div id="products-<?= $donHang['id'] ?>" class="hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php foreach ($donHang['chi_tiet'] as $chiTiet): ?>
                            <?php
                                $hinhAnh = (new HinhAnhSanPham())->getHinhAnhBySanPhamAndMau($chiTiet['sp_id'], $chiTiet['mau_id']);
                            ?>
                            <div class="bg-gray-50 rounded-lg p-3 shadow-sm">
                                <img src="<?= BASE_URL . ($hinhAnh ? $hinhAnh['link_hinh_anh'] : 'uploads/default.jpg') ?>" 
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

            <!-- Giao hàng & thanh toán -->
            <div class="px-5 py-4 border-t bg-gray-50">
                <div class="grid grid-cols-1 gap-4 text-sm text-gray-700">
                    <div>
                        <p><strong>Người nhận:</strong> <?= $donHang['ten_nguoi_nhan'] ?></p>
                        <p><strong>SĐT:</strong> <?= $donHang['sdt_nguoi_nhan'] ?></p>
                        <p><strong>Email:</strong> <?= $donHang['email_nguoi_nhan'] ?></p>
                        <p><strong>Địa chỉ:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?></p>
                    </div>
                    <div>
                        <p><strong>Phương thức thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?></p>
                        <?php if ($donHang['ghi_chu']): ?>
                            <p><strong>Ghi chú:</strong> <?= $donHang['ghi_chu'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Hành động -->
            <?php if ($donHang['trang_thai_id'] == 1 || $donHang['trang_thai_id'] == 3): ?>
                <div class="px-5 py-4 border-t bg-white">
                    <div class="flex justify-end">
                        <button onclick="huyDonHang(<?= $donHang['id'] ?>)" 
                            class="text-sm bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
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