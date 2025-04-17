<?php require_once 'layout/header.php'; ?>
<?php require_once './views/layout/menu.php'; ?>
<br><br><br><br>
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <div class="mb-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="<?= BASE_URL ?>" class="text-gray-700 hover:text-blue-600">
                        Trang chủ
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500 md:ml-2"><?= $danhMuc['ten_danh_muc'] ?></span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Category Title -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold"><?= $danhMuc['ten_danh_muc'] ?></h1>
        <p class="text-gray-600 mt-2"><?= $danhMuc['mo_ta'] ?? '' ?></p>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php if (!empty($sanPhams)): ?>
            <?php foreach($sanPhams as $sanPham): ?>
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="relative">
                        <a href="<?= BASE_URL ?>?act=chi-tiet-san-pham&id_san_pham=<?= $sanPham['id'] ?>">
                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>" class="w-full h-64 object-cover">
                        </a>
                        <?php if($sanPham['gia_khuyen_mai']): ?>
                            <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-lg">
                                -<?= round(($sanPham['gia_san_pham'] - $sanPham['gia_khuyen_mai']) / $sanPham['gia_san_pham'] * 100) ?>%
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">
                            <a href="<?= BASE_URL ?>?act=chi-tiet-san-pham&id_san_pham=<?= $sanPham['id'] ?>" class="hover:text-blue-600">
                                <?= $sanPham['ten_san_pham'] ?>
                            </a>
                        </h3>
                        <div class="flex items-center justify-between">
                            <div class="price">
                                <?php if($sanPham['gia_khuyen_mai']): ?>
                                    <span class="text-xl font-bold text-red-500"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>đ</span>
                                    <span class="price-original text-sm text-gray-500 line-through ml-2"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>đ</span>
                                <?php else: ?>
                                    <span class="text-xl font-bold text-decoration-line-through"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                            </div>
                            <!-- <a href="<?= BASE_URL ?>?act=them-gio-hang&id_san_pham=<?= $sanPham['id'] ?>" class="btn-primary">Thêm vào giỏ</a> -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">Không có sản phẩm nào trong danh mục này.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?> 