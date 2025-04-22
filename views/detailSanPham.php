<?php
// var_dump($sanPham);
$productDetail = $sanPham; // Store original data
require_once 'layout/header.php';
require_once './views/layout/menu.php';
$sanPham = $productDetail; // Restore original data
//  var_dump($sanPham);
 ?>
<div class="breadcrumb-product">
    <div class="main bg-surface md:pt-[88px] pt-[70px] pb-[14px]">
        <div class="container flex items-center justify-between flex-wrap gap-3">
            <div class="left flex items-center gap-1">
                <a href="<?= BASE_URL ?>" class="caption1 text-secondary2 hover:underline">Trang chủ</a>
                <i class="ph ph-caret-right text-xs text-secondary2"></i>
                <div class="caption1 text-secondary2">Sản phẩm</div>
                <i class="ph ph-caret-right text-xs text-secondary2"></i>
                <div class="caption1 capitalize">Sản phẩm chi tiết</div>
            </div>
            <div class="right flex items-center gap-3">
                <div
                    class="prev-btn flex items-center cursor-pointer text-secondary hover:text-black pr-3 border-r border-line">
                    <i class="ph ph-caret-circle-left text-2xl text-black"></i>
                    <span class="caption1 pl-1">Sản phẩm trước</span>
                </div>
                <div class="next-btn flex items-center cursor-pointer text-secondary hover:text-black">
                    <span class="caption1 pr-1">Sản phẩm tiếp theo</span>
                    <i class="ph ph-caret-circle-right text-2xl text-black"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-detail bought-together">
    <div class="featured-product countdown-timer underwear md:py-20 py-14">
        <div class="container flex justify-between gap-y-6 flex-wrap">
            <div class="list-img md:w-1/2 md:pr-[45px] w-full flex-shrink-0">
                <div class="sticky">
                    <div class="mb-3">
                        <img id="main-image" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" 
                            class="w-[400px] h-[400px] object-cover" alt="Ảnh chính">
                    </div>
                    <div id="image-list" class="mb-3">
                        <!-- Danh sách ảnh sẽ được render ở đây -->
                    </div>
                </div>
                <!-- Popup Swiper -->
                <div class="swiper popup-img relative">
                    <span class="close-popup-btn absolute top-4 right-4 z-[2]">
                        <i class="ph ph-x text-3xl text-white"></i>
                    </span>
                    <div class="swiper-button-prev">Trái</div>
                    <div class="swiper-button-next">Phải</div>
                </div>
            </div>
            <div class="product-infor md:w-1/2 w-full lg:pl-[15px] md:pl-2">
                <div class="space-y-6">
                    <div class="flex justify-between">
                        <div>
                            <div class="product-category caption2 text-secondary font-semibold uppercase">
                                <?= $sanPham['ten_danh_muc'] ?>
                            </div>
                            <div class="product-name heading4 mt-1"><?= $sanPham['ten_san_pham'] ?></div>
                        </div>
                        <div class="add-wishlist-btn w-10 h-10 flex-shrink-0 flex items-center justify-center border border-line cursor-pointer rounded-lg duration-300 hover:bg-black hover:text-white">
                            <i class="ph ph-heart text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        <div class="rate flex">
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                        </div>
                        <?php $countComment = count($listBinhLuan); ?>
                        <span class="caption1 text-secondary"><?= $countComment . ' Đánh Giá ' ?></span>
                    </div>
                    <div class="flex items-center gap-3 flex-wrap pb-6 border-b border-line">
                        <?php if($sanPham['gia_khuyen_mai']) { ?>
                        <div id="product-price" class="product-price text-title">
                            <?= formatPrice($sanPham['gia_khuyen_mai']) . 'VNĐ'; ?>
                        </div>
                        <div class="product-origin-price caption1 text-secondary2">
                            <del><?= formatPrice($sanPham['gia_san_pham']) . 'VNĐ'; ?></del>
                        </div>
                        <?php } else {?>
                        <div class="product-price text-title"><?= formatPrice($sanPham['gia_san_pham']) . 'VNĐ'; ?></div>
                        <?php } ?>
                        <div class="product-sale caption2 font-semibold bg-green px-3 py-0.5 inline-block rounded-full">
                            <?= round(100 - ($sanPham['gia_khuyen_mai'] * 100 / $sanPham['gia_san_pham'])) ?>%
                        </div>
                    </div>
                    
                </div>
                <div class="list-action mt-6">
                    <div class="more-infor mt-6">
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-arrow-clockwise body1"></i>
                                <div class="text-title">Giao hàng & Trả hàng</div>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-question body1"></i>
                                <div class="text-title">Hỏi đáp</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <i class="ph ph-timer body1"></i>
                            <div class="text-title">Thời gian giao hàng dự kiến:</div>
                            <div class="text-secondary">Trong Nước 3 ngày Quốc Tế 1 tuần</div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <i class="ph ph-eye body1"></i>
                            <div class="text-title">38</div>
                            <div class="text-secondary">người đang xem sản phẩm này ngay bây giờ!</div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Mã sản phẩm:</div>
                            <div class="text-secondary">53453412</div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Danh mục:</div>
                            <div class="list-category text-secondary"> 
                                <?=$sanPham['ten_danh_muc'] ?></div>
                            </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Thẻ:</div>
                            <div class="list-tag text-secondary">Giày</div>
                        </div>
                    </div>
                    <div class="choose-color mt-5">
                        <div class="text-title">Màu sắc: <span class="text-title color">
                                <div class="mt-3 btn-group">
                                    <?php foreach($listMauSac as $index => $mauSac){
                                ?>
                                    <button type="button"
                                        class="btn btn-outline-dark <?= $index === 0 ? 'active' : '' ?>"
                                        data-color-id="<?= $mauSac['id'] ?>" data-product-id="<?= $sanPham['id'] ?>"
                                        onclick="setActive(this)"><?=$mauSac['mau_sac']?></button>
                                    <?php
                            } ?>
                                </div>
                                <script>
                                $(document).ready(function() {
                                    $('.product-image-thumb').on('click', function() {
                                        var $image_element = $(this).find('img')
                                        $('.product-image').prop('src', $image_element.attr('src'))
                                        $('.product-image-thumb.active').removeClass('active')
                                        $(this).addClass('active')
                                    })
                                })
                                window.onload = function() {
                                    const firstBtn = document.querySelector('.btn-group .btn');
                                    if (firstBtn) {
                                        setActive(firstBtn); // Kích hoạt nút đầu tiên
                                    }
                                };

                                function setActive(button) {
                                    const buttons = document.querySelectorAll('.btn-group .btn');
                                    buttons.forEach(btn => btn.classList.remove('active'));
                                    button.classList.add('active');

                                    const colorId = button.getAttribute('data-color-id');
                                    const productId = button.getAttribute('data-product-id');

                                    // Load ảnh theo màu
                                    fetch(`<?= BASE_URL ?>?act=lay-anh-theo-mau&id_san_pham_tt=${productId}&id_mau_sac=${colorId}`)
                                        .then(response => response.text())
                                        .then(data => {
                                            document.getElementById('image-list').innerHTML = data;
                                        });

                                    // Load size theo màu
                                    fetch(`<?= BASE_URL ?>?act=lay-size-theo-mau&id_san_pham_tt=${productId}&id_mau_sac=${colorId}`)
                                        .then(response => response.text())
                                        .then(data => {
                                            document.getElementById('size-list').innerHTML = data;
                                        });
                                }

                                function changeMainImage(imgElement) {
                                    const mainImage = document.getElementById('main-image');
                                    if (mainImage) {
                                        mainImage.src = imgElement.src;
                                    }
                                }
                                </script>
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script
                                    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js">
                                </script>
                                <script
                                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
                                </script>

                            </span></div>
                        <div class="list-color flex items-center gap-2 flex-wrap mt-3">
                            <!-- color-item -->
                        </div>
                    </div>
                    <div class="choose-size mt-5">
                        <div class="heading flex items-center justify-between">
                            <div class="text-title">Kích thước:</div>
                            <div class="caption1 size-guide text-red underline cursor-pointer">Hướng dẫn kích thước</div>
                        </div>
                        <div class="list-size flex items-center gap-4 mt-3">
                            <div id="size-list" class="btn-size-group flex items-center gap-4">
                                <!-- Các nút size sẽ được render vào đây -->
                            </div>
                        </div>
                        
                        <script>
                            function setActiveSize(button) {
                                const buttons = document.querySelectorAll('.btn-size-group .btn');
                                buttons.forEach(btn => {
                                    btn.classList.remove('active');
                                });
                                button.classList.add('active');
                                
                                // Kích hoạt nút thêm vào giỏ hàng
                                const addToCartBtn = document.querySelector('.add-cart-btn');
                                if (addToCartBtn) {
                                    addToCartBtn.disabled = false;
                                }

                                const bienTheId = button.getAttribute('data-bienthe-id');
                                fetch(`<?= BASE_URL ?>?act=lay-thong-tin-bien-the&id_bien_the=${bienTheId}`)
                                    .then(res => res.text())
                                    .then(text => {
                                        const data = JSON.parse(text);
                                        const priceElement = document.getElementById('product-price');
                                        if (priceElement && data.don_gia) {
                                            priceElement.innerText = parseInt(data.don_gia).toLocaleString('vi-VN') + ' đ';
                                        }
                                        const stockElement = document.getElementById('stock-info');
                                        if (stockElement && data.ton_kho) {
                                            stockElement.innerText = 'Số lượng: ' + parseInt(data.ton_kho);
                                            const maxQty = document.getElementById('soLuong');
                                            maxQty.max = parseInt(data.ton_kho);
                                        }
                                        const addToCartForm = document.getElementById('addToCart');
                                        if (addToCartForm) {
                                            const variant = data.id;
                                            const inputElement = document.getElementById('bienTheId');
                                            inputElement.value = variant;
                                        }
                                    })
                                    .catch(err => {
                                        console.error("Lỗi khi load giá biến thể:", err);
                                    });
                            }

                            // Vô hiệu hóa nút thêm vào giỏ hàng khi trang load
                            document.addEventListener('DOMContentLoaded', function() {
                                const addToCartBtn = document.querySelector('.add-cart-btn');
                                if (addToCartBtn) {
                                    addToCartBtn.disabled = true;
                                }
                            });
                        </script>
                    </div>
                    <div id="stock-info" class="text-title mt-5">Số lượng : <?= $sanPham['so_luong']; ?></div>
                    <div class="choose-quantity flex flex-col sm:flex-row flex-wrap gap-4 mt-3">
                        <!-- Nhóm số lượng + Thêm vào giỏ -->
                         <div id="addToCart">
                             <form action="<?= BASE_URL . "?act=add-vao-gio-hang&id_san_pham=" . $sanPham['id']?>" method="post">
                             <!-- HTML -->
                                <div class="quantity-block flex items-center justify-between rounded-lg border border-line w-[140px] px-3 py-2">
                                    <i class="ph-bold ph-minus cursor-pointer text-gray-700 hover:text-black text-lg"></i>
                                    <input type="hidden" id="bienTheId" value="" name="bien_the_id" id="">
                                    
                                    <input 
                                        type="number" 
                                        name="so_luong"
                                        min="1"
                                        id="soLuong"
                                        class="quantity text-center w-12 font-semibold border-none outline-none bg-transparent text-base hide-arrows"
                                        value="1"
                                    >
                                    <i class="ph-bold ph-plus cursor-pointer text-gray-700 hover:text-black text-lg"></i>
                                </div>
                                <script>
                                        document.querySelectorAll('.quantity-block').forEach(block => {
                                            const input = block.querySelector('.quantity');
                                            const minusBtn = block.querySelector('.ph-minus');
                                            const plusBtn = block.querySelector('.ph-plus');
                                        
                                            minusBtn.addEventListener('click', () => {
                                                let value = parseInt(input.value) || 1;
                                                if (value > 1) {
                                                    input.value = value - 1;
                                                }
                                            });
                                        
                                            plusBtn.addEventListener('click', () => {
                                                let value = parseInt(input.value) || 1;
                                                input.value = value + 1;
                                            });
                                        });
                                </script>
                                     <!-- Nút Thêm vào giỏ -->
                                     <button
                                         type="submit"
                                         class="add-cart-btn button-main px-5 py-3 text-center bg-white text-black border border-black rounded-lg w-full sm:flex-1 min-w-[160px]">
                                         Thêm vào giỏ hàng
                                     </button>
                                 </div>
                             </form>

                        <br>
                         </div>

                        <!-- Nút Mua ngay -->
                        <a href="#"
                            class="button-main px-5 py-3 text-center rounded-lg bg-black text-white w-full sm:flex-1 min-w-[160px]">
                            Mua ngay
                        </a>
                    </div>


                </div>
            </div>
            
        </div>
        <br>
        <br>
        <hr>
        <br>
        <div class="desc-tab">
            <div class="container">
                <div class="flex items-center justify-center w-full">
                    <div class="menu-tab flex items-center md:gap-[60px] gap-8">
                        <div
                            class="tab-item heading5 has-line-before text-secondary2 hover:text-black duration-300 active">
                            Description</div>
                        <div class="tab-item heading5 has-line-before text-secondary2 hover:text-black duration-300">
                            Specifications</div>
                        <div class="tab-item heading5 has-line-before text-secondary2 hover:text-black duration-300">
                            Review
                        </div>
                    </div>
                </div>
                <div class="desc-block mt-8">
                    <div class="desc-item description" data-item="Description">
                        
                           
                                <div class="heading6">Sự miêu tả</div>
                                <div class="product-description text-secondary">
                                    <?= $sanPham['mo_ta']; ?>
                                </div>
                            
                            
        
                        <div class="grid lg:grid-cols-4 grid-cols-2 gap-[30px] md:mt-10 mt-6">
                            <div class="item">
                                <div class="icon-delivery-truck text-4xl"></div>
                                <div class="heading6 mt-4">Giao hàng nhanh chóng</div>
                                <div class="text-secondary mt-2">Vận chuyển nhanh, đảm bảo hàng đến tay bạn một cách an
                                    toàn
                                    và đúng hẹn.</div>
                            </div>
                            <div class="item">
                                <div class="icon-cotton text-4xl"></div>
                                <div class="heading6 mt-4">Chất liệu cotton</div>
                                <div class="text-secondary mt-2">Sử dụng chất liệu cotton cao cấp, thoáng mát và thoải
                                    mái
                                    khi sử dụng.</div>
                            </div>
                            <div class="item">
                                <div class="icon-guarantee text-4xl"></div>
                                <div class="heading6 mt-4">Chất lượng cao</div>
                                <div class="text-secondary mt-2">Sản phẩm bền bỉ, đạt tiêu chuẩn chất lượng, đảm bảo sự
                                    hài
                                    lòng của khách hàng.</div>
                            </div>
                            <div class="item">
                                <div class="icon-leaves-compatible text-4xl"></div>
                                <div class="heading6 mt-4">Tương thích cao</div>
                                <div class="text-secondary mt-2">Phù hợp với nhiều không gian và nhu cầu sử dụng khác
                                    nhau.
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="desc-item specifications flex items-center justify-center" data-item="Specifications">
                        <div class="lg:w-1/2 sm:w-3/4 w-full">
                            <!-- Mục đánh giá -->
                            <div class="item bg-surface flex items-center gap-8 py-3 px-10">
                                <div class="text-title sm:w-1/4 w-1/3">Đánh giá</div>
                                <div class="flex items-center gap-1">
                                    <div class="rate flex">
                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                    </div>
                                    <p>(1.234)</p>
                                </div>
                            </div>

                            <!-- Mục chất liệu vỏ ngoài -->
                            <div class="item flex items-center gap-8 py-3 px-10">
                                <div class="text-title sm:w-1/4 w-1/3">Vỏ ngoài</div>
                                <p>100% polyester</p>
                            </div>

                            <!-- Mục chất liệu lớp lót -->
                            <div class="item bg-surface flex items-center gap-8 py-3 px-10">
                                <div class="text-title sm:w-1/4 w-1/3">Lớp lót</div>
                                <p>100% polyurethane</p>
                            </div>

                            <!-- Mục kích thước -->
                            <div class="item flex items-center gap-8 py-3 px-10">
                                <div class="text-title sm:w-1/4 w-1/3">Kích thước</div>
                                <p>S, M, L, XL</p>
                            </div>

                            <!-- Mục màu sắc -->
                            <div class="item bg-surface flex items-center gap-8 py-3 px-10">
                                <div class="text-title sm:w-1/4 w-1/3">Màu sắc</div>
                                <p>Xám, Đỏ, Xanh dương, Đen</p>
                            </div>

                            <!-- Mục hướng dẫn bảo quản -->
                            <div class="item flex items-center gap-8 py-3 px-10">
                                <div class="text-title sm:w-1/4 w-1/3">Bảo quản</div>
                                <div class="flex items-center gap-5">
                                    <!-- Biểu tượng SVG cho hướng dẫn bảo quản -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                        fill="none">
                                        <g clip-path="url(#clip0_5544_36682)">
                                            <path
                                                d="M8 0C3.58167 0 0 3.58167 0 8C0 12.4183 3.58167 16 8 16C12.4183 16 16 12.4183 16 8C16 3.58167 12.416 0.005 8 0ZM8 0.533333C9.88787 0.532223 11.7055 1.24913 13.0843 2.53867L12.7273 2.89567C12.6423 2.74067 12.5637 2.60067 12.4987 2.48567C12.4734 2.44723 12.439 2.41567 12.3985 2.39383C12.358 2.37199 12.3127 2.36056 12.2667 2.36056C12.2207 2.36056 12.1754 2.37199 12.1349 2.39383C12.0944 2.41567 12.0599 2.44723 12.0347 2.48567C11.7523 2.98567 11.2397 3.919 10.8613 4.76033L9.57333 6.04867C8.67742 4.37428 7.69142 2.74967 6.61967 1.182C6.5938 1.14833 6.56054 1.12105 6.52245 1.10228C6.48436 1.08351 6.44246 1.07375 6.4 1.07375C6.35754 1.07375 6.31564 1.08351 6.27755 1.10228C6.23947 1.12105 6.2062 1.14833 6.18033 1.182C6.00467 1.43667 1.86667 7.45467 1.86667 9.86667C1.86568 10.912 2.22762 11.9252 2.89067 12.7333L2.53867 13.0843C1.54675 12.021 0.887151 10.6911 0.64095 9.25796C0.394749 7.82483 0.572679 6.35099 1.15287 5.01763C1.73305 3.68427 2.69021 2.54949 3.90667 1.75282C5.12313 0.956136 6.54588 0.532273 8 0.533333ZM11.309 5.06833L12.5973 3.77967C13.1823 4.89667 13.5523 5.77033 13.6 6.16667C13.6 6.52029 13.4595 6.85943 13.2095 7.10948C12.9594 7.35952 12.6203 7.5 12.2667 7.5C11.913 7.5 11.5739 7.35952 11.3239 7.10948C11.0738 6.85943 10.9333 6.52029 10.9333 6.16667C11.0119 5.78564 11.1382 5.41605 11.3093 5.06667L11.309 5.06833Z"
                                                fill="#1F1F1F" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_5544_36682">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="desc-item review" data-item="Review">
                        <div class="top-overview flex max-sm:flex-col items-center justify-between gap-12 gap-y-4">
                            <div
                                class="left flex max-sm:flex-col gap-y-4 items-center justify-between lg:w-1/2 sm:w-2/3 w-full sm:pr-5">
                                <div class="rating flex flex-col items-center">
                                    <div class="text-display">4.6</div>
                                    <div class="flex flex-col items-center">
                                        <div class="rate flex">
                                            <i class="ph-fill ph-star text-lg text-black"></i>
                                            <i class="ph-fill ph-star text-lg text-black"></i>
                                            <i class="ph-fill ph-star text-lg text-black"></i>
                                            <i class="ph-fill ph-star text-lg text-black"></i>
                                            <i class="ph-fill ph-star text-lg text-black"></i>
                                        </div>
                                        <div class="text-secondary text-center mt-1"><?= $countComment . ' Đánh Giá ' ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-rating w-2/3">
                                    <div class="item flex items-center justify-between gap-1.5">
                                        <div class="flex items-center gap-1">
                                            <div class="caption1">5</div>
                                            <i class="ph-fill ph-star text-sm"></i>
                                        </div>
                                        <div class="progress bg-line relative w-3/4 h-2">
                                            <div
                                                class="progress-percent absolute bg-yellow w-[50%] h-full left-0 top-0">
                                            </div>
                                        </div>
                                        <div class="caption1">50%</div>
                                    </div>
                                    <div class="item flex items-center justify-between gap-1.5 mt-1">
                                        <div class="flex items-center gap-1">
                                            <div class="caption1">4</div>
                                            <i class="ph-fill ph-star text-sm"></i>
                                        </div>
                                        <div class="progress bg-line relative w-3/4 h-2">
                                            <div
                                                class="progress-percent absolute bg-yellow w-[20%] h-full left-0 top-0">
                                            </div>
                                        </div>
                                        <div class="caption1">20%</div>
                                    </div>
                                    <div class="item flex items-center justify-between gap-1.5 mt-1">
                                        <div class="flex items-center gap-1">
                                            <div class="caption1">3</div>
                                            <i class="ph-fill ph-star text-sm"></i>
                                        </div>
                                        <div class="progress bg-line relative w-3/4 h-2">
                                            <div
                                                class="progress-percent absolute bg-yellow w-[10%] h-full left-0 top-0">
                                            </div>
                                        </div>
                                        <div class="caption1">10%</div>
                                    </div>
                                    <div class="item flex items-center justify-between gap-1.5 mt-1">
                                        <div class="flex items-center gap-1">
                                            <div class="caption1">2</div>
                                            <i class="ph-fill ph-star text-sm"></i>
                                        </div>
                                        <div class="progress bg-line relative w-3/4 h-2">
                                            <div
                                                class="progress-percent absolute bg-yellow w-[10%] h-full left-0 top-0">
                                            </div>
                                        </div>
                                        <div class="caption1">10%</div>
                                    </div>
                                    <div class="item flex items-center justify-between gap-1.5 mt-1">
                                        <div class="flex items-center gap-2">
                                            <div class="caption1">1</div>
                                            <i class="ph-fill ph-star text-sm"></i>
                                        </div>
                                        <div class="progress bg-line relative w-3/4 h-2">
                                            <div
                                                class="progress-percent absolute bg-yellow w-[10%] h-full left-0 top-0">
                                            </div>
                                        </div>
                                        <div class="caption1">10%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="right">
                                <a href="#form-review"
                                    class="button-main bg-white text-black border border-black whitespace-nowrap">Viết
                                    đánh
                                    giá</a>
                            </div>
                        </div>
                        <div class="list-review mt-8">
                            <div class="heading flex items-center justify-between flex-wrap gap-4">
                                <div class="heading4"><?= count($listBinhLuan)?> Bình luận</div>
                                <div class="right flex items-center gap-3">
                                    <label for="select-filter" class="uppercase">Sắp xếp theo:</label>
                                    <div class="select-block relative">
                                        <select id="select-filter" name="select-filter"
                                            class="text-button py-2 pl-3 md:pr-14 pr-10 rounded-lg bg-white border border-line">
                                            <option value="Sorting">Sắp xếp</option>
                                            <option value="newest">Mới nhất</option>
                                            <option value="5star">5 Sao</option>
                                            <option value="4star">4 Sao</option>
                                            <option value="3star">3 Sao</option>
                                            <option value="2star">2 Sao</option>
                                            <option value="1star">1 Sao</option>
                                        </select>
                                        <i
                                            class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-4 right-2"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="item mt-6">
                                <?php foreach($listBinhLuan as $binhLuan) : ?>
                                <div class="heading flex items-center justify-between">
                                    <div class="user-infor flex gap-4">
                                        <div class="avatar">
                                            <img src="<?= $binhLuan['anh_dai_dien'] ?>" alt="img"
                                                class="w-[52px] aspect-square rounded-full" />
                                        </div>
                                        <div class="user">
                                            <div class="flex items-center gap-2">
                                                <div class="text-title"><?= $binhLuan['ho_ten'] ?></div>
                                                <div class="span text-line">-</div>
                                                <div class="rate flex">
                                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <div class="text-secondary2"><?= $binhLuan['ngay_dang']; ?></div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="more-action cursor-pointer">
                                        <i class="ph-bold ph-dots-three text-2xl"></i>
                                    </div>
                                </div>
                                <div class="mt-3"><?= $binhLuan['noi_dung']; ?></div>
                                
                                <?php endforeach ;?>
                            </div>
                        </div>
                        <div id="form-review" class="form-review pt-8">
                            <div class="heading4">Để lại bình luận</div>
                            <form action="<?= BASE_URL . '?act=binh-luan'?>" method="post" class="grid sm:grid-cols-2 gap-4 gap-y-5 mt-6">
                                
                                <input type="hidden" name="id_san_pham" value="<?=$sanPham['id']?>">
                                <div class="col-span-full message">
                                    <textarea class="border border-line px-4 py-3 w-full rounded-lg" id="message"
                                        name="noi_dung" rows="3" placeholder="Tin nhắn của bạn *" required></textarea>
                                </div>
                                <div class="col-span-full sm:pt-3">
                                    <button <?= $_SESSION['user_id'] ?? 'disabled' ?> class=" <?= $_SESSION['user_id'] ?? 'btn-disabled' ?> button-main bg-white text-black border border-black">Gửi Đánh
                                        Giá</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-features-block filter-product-block md:py-20 py-10">
        <div class="container">
            <div class="heading3 text-center">Sản phẩm liên quan</div>
            <div
                class="list-product six-product hide-product-sold relative section-swiper-navigation style-outline style-small-border md:mt-10 mt-6">
                <div class="swiper-button-prev2 sm:left-10 left-6">
                    <i class="ph-bold ph-caret-left text-xl"></i>
                </div>
                <div class="swiper swiper-list-product h-full relative">
                    <div class="swiper-wrapper">
                        <div
                            class="list-product four-product hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 md:mt-10 mt-6">
                            <!-- List four product -->
                            <?php foreach($listSanPhamCungDanhMuc as $key => $sanPham) : ?>
                            <div class=" pb-5 xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 mt-4">
                                <div class="product-item grid-type" data-item="11">
                                    <div class="product-main cursor-pointer block">
                                        <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                            <?php 
                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                    $ngayHienTai = new DateTime();
                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                    if($tinhNgay->days <= 7){
                                        ?>
                                            <div
                                                class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                                New
                                            </div>

                                            <?php } else { ?>
                                            <div
                                                class="product-tag text-button-uppercase text-white bg-red px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                                Giảm Giá</div>
                                            <?php }  ?>
                                            <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                                <div
                                                    class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                                    <div
                                                        class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                        Thêm Vào Yêu Thích
                                                    </div>
                                                    <i class="ph ph-heart text-lg"></i>
                                                </div>
                                                <div
                                                    class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                                    <div
                                                        class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                        So Sánh Sản Phẩm
                                                    </div>
                                                    <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                                    <i class="ph ph-check-circle text-lg checked-icon"></i>
                                                </div>
                                            </div>
                                            <div class="product-img w-full h-full aspect-[3/4]">
                                                <a
                                                    href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                    <img class="w-full h-full object-cover duration-700"
                                                        src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="img" />
                                                    <img class="w-full h-full object-cover duration-700"
                                                        src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="img" />
                                                </a>
                                            </div>
                                            <div
                                                class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                                <div
                                                    class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                                    <a
                                                        href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">Xem
                                                        Chi Tiết</a>
                                                </div>
                                                <div
                                                    class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                                    Thêm Vào Giỏ
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-infor mt-4 lg:mb-7">
                                            <div class="product-sold sm:pb-4 pb-2">
                                                <div
                                                    class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                                    <div class="progress-sold bg-red absolute left-0 top-0 h-full">
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                                    <div class="text-button-uppercase">
                                                        <span class="text-secondary2 max-sm:text-xs">Sold:
                                                        </span>
                                                        <span class="max-sm:text-xs">12</span>
                                                    </div>
                                                    <div class="text-button-uppercase">
                                                        <span class="text-secondary2 max-sm:text-xs">Available:
                                                        </span>
                                                        <span class="max-sm:text-xs">88</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-name text-title duration-300">
                                                <?= $sanPham['ten_san_pham'] ?>
                                            </div>
                                            <div
                                                class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                                <div
                                                    class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                                    <div
                                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                        Red
                                                    </div>
                                                </div>
                                                <div
                                                    class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                                    <div
                                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                        yellow
                                                    </div>
                                                </div>
                                                <div
                                                    class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                                    <div
                                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                        green
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                                <?php if($sanPham['gia_khuyen_mai']) { ?>
                                                <div class="product-price text-title">
                                                    <?= formatPrice( $sanPham['gia_san_pham']); ?>
                                                </div>
                                                <div class="product-origin-price caption1 text-secondary2">
                                                    <del>><?= formatPrice($sanPham['gia_khuyen_mai']); ?></del>
                                                </div>
                                                <?php } else {?>
                                                <div class="product-price text-title">
                                                    <?= formatPrice( $sanPham['gia_san_pham']); ?>
                                                </div>
                                                <?php } ?>
                                                <div
                                                    class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                                    -20%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next2 sm:right-10 right-6">
                    <i class="ph-bold ph-caret-right text-xl"></i>
                </div>
            </div>
        </div>
    </div>


    <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

    <!-- Modal -->
    <div class="modal-search-block">
        <div class="modal-search-main md:p-10 p-6 rounded-[32px]">
            <div class="form-search relative w-full">
                <i class="ph ph-magnifying-glass absolute heading5 right-6 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                <input type="text" placeholder="Searching..."
                    class="text-button-lg h-14 rounded-2xl border border-line w-full pl-6 pr-12" />
            </div>
            <div class="keyword mt-8">
                <div class="heading5">Feature keywords Today</div>
                <div class="list-keyword flex items-center flex-wrap gap-3 mt-4">
                    <button
                        class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Dress</button>
                    <button
                        class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">T-shirt</button>
                    <button
                        class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Underwear</button>
                    <button
                        class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Top</button>
                </div>
            </div>
            <div class="list-recent mt-8">
                <div class="heading6">Recently viewed products</div>
                <div
                    class="list-product pb-5 hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 mt-4">
                    <div class="product-item grid-type" data-item="14">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <div
                                    class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                    New</div>
                                <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                    <div
                                        class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                            Add To
                                            Wishlist</div>
                                        <i class="ph ph-heart text-lg"></i>
                                    </div>
                                    <div
                                        class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                            Compare Product</div>
                                        <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                        <i class="ph ph-check-circle text-lg checked-icon"></i>
                                    </div>
                                </div>
                                <div class="product-img w-full h-full aspect-[3/4]">
                                    <img class="w-full h-full object-cover duration-700"
                                        src="assets/images/product/fashion/14-1.png" alt="img" />
                                    <img class="w-full h-full object-cover duration-700"
                                        src="assets/images/product/fashion/14-2.png" alt="img" />
                                </div>
                                <div
                                    class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                    <div
                                        class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                        Quick View</div>
                                    <div
                                        class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                        Add To Cart</div>
                                </div>
                            </div>
                            <div class="product-infor mt-4 lg:mb-7">
                                <div class="product-sold sm:pb-4 pb-2">
                                    <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                        <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                    </div>
                                    <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                        <div class="text-button-uppercase">
                                            <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                            <span class="max-sm:text-xs">12</span>
                                        </div>
                                        <div class="text-button-uppercase">
                                            <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                            <span class="max-sm:text-xs">88</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-name text-title duration-300">Faux-leather trousers</div>
                                <div
                                    class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                    <div class="color-item bg-black w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            Black</div>
                                    </div>
                                    <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            Green</div>
                                    </div>
                                    <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            Red</div>
                                    </div>
                                </div>

                                <div
                                    class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                    <div class="product-price text-title">$40.00</div>
                                    <div class="product-origin-price caption1 text-secondary2">
                                        <del>$50.00</del>
                                    </div>
                                    <div
                                        class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                        -20%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-item grid-type" data-item="13">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <div
                                    class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                    New</div>
                                <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                    <div
                                        class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                            Add To
                                            Wishlist</div>
                                        <i class="ph ph-heart text-lg"></i>
                                    </div>
                                    <div
                                        class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                            Compare Product</div>
                                        <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                        <i class="ph ph-check-circle text-lg checked-icon"></i>
                                    </div>
                                </div>
                                <div class="product-img w-full h-full aspect-[3/4]">
                                    <img class="w-full h-full object-cover duration-700"
                                        src="assets/images/product/fashion/13-1.png" alt="img" />
                                    <img class="w-full h-full object-cover duration-700"
                                        src="assets/images/product/fashion/13-2.png" alt="img" />
                                </div>
                                <div
                                    class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                    <div
                                        class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                        Quick View</div>
                                    <div
                                        class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                        Add To Cart</div>
                                </div>
                            </div>
                            <div class="product-infor mt-4 lg:mb-7">
                                <div class="product-sold sm:pb-4 pb-2">
                                    <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                        <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                    </div>
                                    <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                        <div class="text-button-uppercase">
                                            <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                            <span class="max-sm:text-xs">12</span>
                                        </div>
                                        <div class="text-button-uppercase">
                                            <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                            <span class="max-sm:text-xs">88</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-name text-title duration-300">Faux-leather trousers</div>
                                <div
                                    class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                    <div class="color-item bg-black w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            Black</div>
                                    </div>
                                    <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            Green</div>
                                    </div>
                                    <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            Red</div>
                                    </div>
                                </div>

                                <div
                                    class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                    <div class="product-price text-title">$40.00</div>
                                    <div class="product-origin-price caption1 text-secondary2">
                                        <del>$50.00</del>
                                    </div>
                                    <div
                                        class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                        -20%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-item grid-type" data-item="12">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <div
                                    class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                    New</div>
                                <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                    <div
                                        class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                            Add To
                                            Wishlist</div>
                                        <i class="ph ph-heart text-lg"></i>
                                    </div>
                                    <div
                                        class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                            Compare Product</div>
                                        <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                        <i class="ph ph-check-circle text-lg checked-icon"></i>
                                    </div>
                                </div>
                                <div class="product-img w-full h-full aspect-[3/4]">
                                    <img class="w-full h-full object-cover duration-700"
                                        src="assets/images/product/fashion/12-1.png" alt="img" />
                                    <img class="w-full h-full object-cover duration-700"
                                        src="assets/images/product/fashion/12-2.png" alt="img" />
                                </div>
                                <div
                                    class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                    <div
                                        class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                        Quick View</div>
                                    <div
                                        class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                        Add To Cart</div>
                                </div>
                            </div>
                            <div class="product-infor mt-4 lg:mb-7">
                                <div class="product-sold sm:pb-4 pb-2">
                                    <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                        <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                    </div>
                                    <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                        <div class="text-button-uppercase">
                                            <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                            <span class="max-sm:text-xs">12</span>
                                        </div>
                                        <div class="text-button-uppercase">
                                            <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                            <span class="max-sm:text-xs">88</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-name text-title duration-300">Off-the-Shoulder Blouse</div>
                                <div
                                    class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                    <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            Red</div>
                                    </div>
                                    <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            yellow</div>
                                    </div>
                                    <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            green</div>
                                    </div>
                                </div>

                                <div
                                    class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                    <div class="product-price text-title">$40.00</div>
                                    <div class="product-origin-price caption1 text-secondary2">
                                        <del>$50.00</del>
                                    </div>
                                    <div
                                        class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                        -20%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-item grid-type" data-item="11">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <div
                                    class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                    New</div>
                                <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                    <div
                                        class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                            Add To
                                            Wishlist</div>
                                        <i class="ph ph-heart text-lg"></i>
                                    </div>
                                    <div
                                        class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                            Compare Product</div>
                                        <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                        <i class="ph ph-check-circle text-lg checked-icon"></i>
                                    </div>
                                </div>
                                <div class="product-img w-full h-full aspect-[3/4]">
                                    <img class="w-full h-full object-cover duration-700"
                                        src="assets/images/product/fashion/11-1.png" alt="img" />
                                    <img class="w-full h-full object-cover duration-700"
                                        src="assets/images/product/fashion/11-2.png" alt="img" />
                                </div>
                                <div
                                    class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                    <div
                                        class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                        Quick View</div>
                                    <div
                                        class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                        Add To Cart</div>
                                </div>
                            </div>
                            <div class="product-infor mt-4 lg:mb-7">
                                <div class="product-sold sm:pb-4 pb-2">
                                    <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                        <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                    </div>
                                    <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                        <div class="text-button-uppercase">
                                            <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                            <span class="max-sm:text-xs">12</span>
                                        </div>
                                        <div class="text-button-uppercase">
                                            <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                            <span class="max-sm:text-xs">88</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-name text-title duration-300">Off-the-Shoulder Blouse</div>
                                <div
                                    class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                    <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            Red</div>
                                    </div>
                                    <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            yellow</div>
                                    </div>
                                    <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            green</div>
                                    </div>
                                </div>

                                <div
                                    class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                    <div class="product-price text-title">$40.00</div>
                                    <div class="product-origin-price caption1 text-secondary2">
                                        <del>$50.00</del>
                                    </div>
                                    <div
                                        class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                        -20%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal-wishlist-block">
    <div class="modal-wishlist-main py-6">
        <div class="heading px-6 pb-3 flex items-center justify-between relative">
            <div class="heading5">Danh sách yêu thích</div>
            <div
                class="close-btn absolute right-6 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                <i class="ph ph-x text-sm"></i>
            </div>
        </div>
        <div class="list-product px-6"></div>
        <div class="footer-modal p-6 border-t bg-white border-line absolute bottom-0 left-0 w-full text-center">
            <a href="wishlist.html" class="button-main w-full text-center uppercase"> Xem tất cả danh sách mong
                muốn</a>
            <div class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">Or
                tiếp tục mua sắm</div>
        </div>
    </div>
</div>



<div class="modal-compare-block">
    <div class="modal-compare-main py-6">
        <div
            class="close-btn absolute 2xl:right-6 right-4 2xl:top-6 md:-top-4 top-3 lg:w-10 w-6 lg:h-10 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
            <i class="ph ph-x body1"></i>
        </div>
        <div class="container h-full flex items-center w-full">
            <div class="content-main flex items-center justify-between xl:gap-10 gap-6 w-full max-md:flex-wrap">
                <div class="heading5 flex-shrink-0 max-md:w-full">Compare <br class="max-md:hidden" />Products</div>
                <div class="list-product flex items-center w-full gap-4"></div>
                <div class="block-button flex flex-col gap-4 flex-shrink-0">
                    <a href="compare.html" class="button-main whitespace-nowrap"> Compare Products</a>
                    <div class="button-main clear whitespace-nowrap border border-black bg-white text-black">Clear All
                        Products</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-quickview-block">
    <div class="modal-quickview-main py-6">
        <div class="flex h-full max-md:flex-col-reverse gap-y-6">
            <div class="left lg:w-[388px] md:w-[300px] flex-shrink-0 px-6">
                <div class="list-img max-md:flex items-center gap-4">
                    <div
                        class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                        <img src="assets/images/product/fashion/3-1.png" alt="item"
                            class="w-full h-full object-cover" />
                    </div>
                    <div
                        class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                        <img src="assets/images/product/fashion/3-2.png" alt="item"
                            class="w-full h-full object-cover" />
                    </div>
                    <div
                        class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                        <img src="assets/images/product/fashion/3-3.png" alt="item"
                            class="w-full h-full object-cover" />
                    </div>
                    <div
                        class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                        <img src="assets/images/product/fashion/3-4.png" alt="item"
                            class="w-full h-full object-cover" />
                    </div>
                </div>
            </div>
            <div class="right w-full px-6">
                <div class="heading pb-6 flex items-center justify-between relative">
                    <div class="heading5">Xem Nhanh</div>
                    <div
                        class="close-btn absolute right-0 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                        <i class="ph ph-x text-sm"></i>
                    </div>
                </div>
                <div class="time countdown-cart px-6">
                    <div class="flex items-center gap-3 px-5 py-3 bg-green rounded-lg">
                        <p class="text-3xl">🔥</p>
                        <div class="caption1">
                            Giỏ hàng của bạn sẽ hết hạn trong <span class="text-red caption1 font-semibold"><span
                                    class="minute">04</span>:<span class="second">59</span></span> phút nữa!<br />
                            Vui lòng thanh toán ngay trước khi sản phẩm của bạn hết!
                        </div>
                    </div>
                </div>
                <div class="heading banner mt-3 px-6">
                    <div class="text">
                        Mua <span class="text-button"> $<span class="more-price">150</span>.00 </span>
                        <span>để nhận </span>
                        <span class="text-button">miễn phí vận chuyển</span>
                    </div>
                    <div class="tow-bar-block mt-3">
                        <div class="progress-line"></div>
                    </div>
                </div>
                <div class="list-product px-6"></div>
                <div class="footer-modal bg-white absolute bottom-0 left-0 w-full">
                    <div class="flex items-center justify-center lg:gap-14 gap-8 px-6 py-4 border-b border-line">
                        <div class="note-btn item flex items-center gap-3 cursor-pointer">
                            <i class="ph ph-note-pencil text-xl"></i>
                            <div class="caption1">Ghi chú</div>
                        </div>
                        <div class="shipping-btn item flex items-center gap-3 cursor-pointer">
                            <i class="ph ph-truck text-xl"></i>
                            <div class="caption1">Vận chuyển</div>
                        </div>
                        <div class="coupon-btn item flex items-center gap-3 cursor-pointer">
                            <i class="ph ph-tag text-xl"></i>
                            <div class="caption1">Mã giảm giá</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-6 px-6">
                        <div class="heading5">Tạm tính</div>
                        <div class="heading5 total-cart">$0.00</div>
                    </div>
                    <div class="block-button text-center p-6">
                        <div class="flex items-center gap-4">
                            <a href="cart.html"
                                class="button-main basis-1/2 bg-white border border-black text-black text-center uppercase">
                                Xem giỏ hàng </a>
                            <a href="checkout.html" class="button-main basis-1/2 text-center uppercase"> Thanh toán </a>
                        </div>
                        <div
                            class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">
                            Hoặc tiếp tục mua sắm</div>
                    </div>
                    <div class="tab-item note-block">
                        <div class="px-6 py-4 border-b border-line">
                            <div class="item flex items-center gap-3 cursor-pointer">
                                <i class="ph ph-note-pencil text-xl"></i>
                                <div class="caption1">Ghi chú</div>
                            </div>
                        </div>
                        <div class="form pt-4 px-6">
                            <textarea name="form-note" id="form-note" rows="4"
                                placeholder="Thêm hướng dẫn đặc biệt cho đơn hàng của bạn..."
                                class="caption1 py-3 px-4 bg-surface border-line rounded-md w-full"></textarea>
                        </div>
                        <div class="block-button text-center pt-4 px-6 pb-6">
                            <div class="button-main w-full text-center">Lưu</div>
                            <div
                                class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                Hủy</div>
                        </div>
                    </div>
                    <div class="tab-item shipping-block">
                        <div class="px-6 py-4 border-b border-line">
                            <div class="item flex items-center gap-3 cursor-pointer">
                                <i class="ph ph-truck text-xl"></i>
                                <div class="caption1">Ước tính phí vận chuyển</div>
                            </div>
                        </div>
                        <div class="form pt-4 px-6">
                            <div class="">
                                <label for="select-country" class="caption1 text-secondary">Quốc gia/Khu vực</label>
                                <div class="select-block relative mt-2">
                                    <select id="select-country" name="select-country"
                                        class="w-full py-3 pl-5 rounded-xl bg-white border border-line">
                                        <option value="Country/region">Quốc gia/Khu vực</option>
                                        <option value="France">Pháp</option>
                                        <option value="Spain">Tây Ban Nha</option>
                                        <option value="UK">Vương Quốc Anh</option>
                                        <option value="USA">Hoa Kỳ</option>
                                    </select>
                                    <i
                                        class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-5 right-2"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="select-state" class="caption1 text-secondary">Tiểu bang</label>
                                <div class="select-block relative mt-2">
                                    <select id="select-state" name="select-state"
                                        class="w-full py-3 pl-5 rounded-xl bg-white border border-line">
                                        <option value="State">Tiểu bang</option>
                                        <option value="Paris">Paris</option>
                                        <option value="Madrid">Madrid</option>
                                        <option value="London">London</option>
                                        <option value="New York">New York</option>
                                    </select>
                                    <i
                                        class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-5 right-2"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="select-code" class="caption1 text-secondary">Mã bưu điện/Zip</label>
                                <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-code" type="text"
                                    placeholder="Mã bưu điện/Zip" />
                            </div>
                        </div>
                        <div class="block-button text-center pt-4 px-6 pb-6">
                            <div class="button-main w-full text-center">Tính toán</div>
                            <div
                                class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                Hủy</div>
                        </div>
                    </div>
                    <div class="tab-item coupon-block">
                        <div class="px-6 py-4 border-b border-line">
                            <div class="item flex items-center gap-3 cursor-pointer">
                                <i class="ph ph-tag text-xl"></i>
                                <div class="caption1">Nhập mã giảm giá</div>
                            </div>
                        </div>
                        <div class="form pt-4 px-6">
                            <div class="">
                                <label for="select-discount" class="caption1 text-secondary">Nhập mã</label>
                                <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-discount"
                                    type="text" placeholder="Mã giảm giá" />
                            </div>
                        </div>
                        <div class="block-button text-center pt-4 px-6 pb-6">
                            <div class="button-main w-full text-center">Áp dụng</div>
                            <div
                                class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                Hủy</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal-sizeguide-block">
        <div class="modal-sizeguide-main md:p-10 p-6 rounded-[32px]">
            <div
                class="close-btn absolute right-5 top-5 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                <i class="ph ph-x text-sm"></i>
            </div>
            <div class="heading3">Hướng dẫn kích thước</div>
            <div class="md:mt-8 mt-6 progress">
                <div class="flex md:items-center gap-10 justify-between max-md:flex-col gap-y-5 max-md:pr-3">
                    <div class="flex items-center flex-shrink-0 gap-8">
                        <span class="flex-shrink-0 md:w-14">Chiều cao</span>
                        <div
                            class="flex items-center justify-center w-20 gap-1 py-2 border border-line rounded-lg flex-shrink-0">
                            <span class="height">200</span>
                            <span class="caption1 text-secondary">Cm</span>
                        </div>
                    </div>
                    <div class="filter-price filter-height w-full">
                        <div class="tow-bar-block">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input class="range-max" type="range" min="0" max="200" value="200" />
                        </div>
                    </div>
                </div>
                <div class="flex md:items-center gap-10 justify-between max-md:flex-col gap-y-5 max-md:pr-3 mt-5">
                    <div class="flex items-center gap-8 flex-shrink-0">
                        <span class="flex-shrink-0 md:w-14">Cân nặng</span>
                        <div
                            class="flex items-center justify-center w-20 gap-1 py-2 border border-line rounded-lg flex-shrink-0">
                            <span class="weight">90</span>
                            <span class="caption1 text-secondary">Kg</span>
                        </div>
                    </div>
                    <div class="filter-price filter-weight w-full">
                        <div class="tow-bar-block">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input class="range-max" type="range" min="0" max="90" value="90" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="heading6 mt-8">gợi ý cho bạn:</div>
            <div class="list-size-block flex items-center gap-2 flex-wrap mt-3">
                <div
                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                    XS</div>
                <div
                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                    S</div>
                <div
                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                    M</div>
                <div
                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                    L</div>
                <div
                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                    XL</div>
                <div
                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                    2XL</div>
            </div>
            <table>
                <tr>
                    <th>Size</th>
                    <th>Bust</th>
                    <th>Waist</th>
                    <th>Low Hip</th>
                </tr>
                <tr>
                    <td>XS</td>
                    <td>32</td>
                    <td>24-25</td>
                    <td>33-34</td>
                </tr>
                <tr>
                    <td>S</td>
                    <td>34-35</td>
                    <td>26-27</td>
                    <td>35-36</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>36-37</td>
                    <td>28-29</td>
                    <td>38-40</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>38-39</td>
                    <td>30-31</td>
                    <td>42-44</td>
                </tr>
                <tr>
                    <td>XL</td>
                    <td>40-41</td>
                    <td>32-33</td>
                    <td>45-47</td>
                </tr>
                <tr>
                    <td>2XL</td>
                    <td>42-43</td>
                    <td>34-35</td>
                    <td>48-50</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="modal-compare-block">
        <div class="modal-compare-main py-6">
            <div
                class="close-btn absolute 2xl:right-6 right-4 2xl:top-6 md:-top-4 top-3 lg:w-10 w-6 lg:h-10 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                <i class="ph ph-x body1"></i>
            </div>
            <div class="container h-full flex items-center w-full">
                <div class="content-main flex items-center justify-between xl:gap-10 gap-6 w-full max-md:flex-wrap">
                    <div class="heading5 flex-shrink-0 max-md:w-full">Compare <br class="max-md:hidden" />Products</div>
                    <div class="list-product flex items-center w-full gap-4"></div>
                    <div class="block-button flex flex-col gap-4 flex-shrink-0">
                        <a href="compare.html" class="button-main whitespace-nowrap"> Compare Products</a>
                        <div class="button-main clear whitespace-nowrap border border-black bg-white text-black">Clear All
                            Products</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-quickview-block">
        <div class="modal-quickview-main py-6">
            <div class="flex h-full max-md:flex-col-reverse gap-y-6">
                <div class="left lg:w-[388px] md:w-[300px] flex-shrink-0 px-6">
                    <div class="list-img max-md:flex items-center gap-4">
                        <div
                            class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                            <img src="assets/images/product/fashion/3-1.png" alt="item"
                                class="w-full h-full object-cover" />
                        </div>
                        <div
                            class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                            <img src="assets/images/product/fashion/3-2.png" alt="item"
                                class="w-full h-full object-cover" />
                        </div>
                        <div
                            class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                            <img src="assets/images/product/fashion/3-3.png" alt="item"
                                class="w-full h-full object-cover" />
                        </div>
                        <div
                            class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                            <img src="assets/images/product/fashion/3-4.png" alt="item"
                                class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
                <div class="right w-full px-6">
                    <div class="heading pb-6 flex items-center justify-between relative">
                        <div class="heading5">Xem Nhanh</div>
                        <div
                            class="close-btn absolute right-0 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                            <i class="ph ph-x text-sm"></i>
                        </div>
                    </div>
                    <div class="product-infor">
                        <div class="flex justify-between">
                            <div>
                                <div class="category caption2 text-secondary font-semibold uppercase">thời trang</div>
                                <div class="name heading4 mt-1">Áo Blouse Khoét Vai</div>
                            </div>
                            <div
                                class="add-wishlist-btn w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-lg duration-300 hover:bg-black hover:text-white">
                                <i class="ph ph-heart text-xl"></i>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="rate flex">
                                <i class="ph-fill ph-star text-sm text-yellow"></i>
                                <i class="ph-fill ph-star text-sm text-yellow"></i>
                                <i class="ph-fill ph-star text-sm text-yellow"></i>
                                <i class="ph-fill ph-star text-sm text-yellow"></i><i
                                    class="ph-fill ph-star text-sm text-yellow"></i>
                            </div>
                            <span class="caption1 text-secondary">(1.234 đánh giá)</span>
                        </div>
                        <div class="flex items-center gap-1 gap-y-3 flex-wrap mt-3">
                            <div class="text-xs font-semibold bg-black text-white uppercase py-1 px-3 rounded-full">bán
                                chạy
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph-fill ph-lightning text-red text-xl"></i>
                                <div class="caption1 text-secondary">Bán nhanh! 22 người đã có món này trong giỏ hàng.
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 flex-wrap mt-5 pb-6 border-b border-line">
                            <div class="product-price heading5">$20.00</div>
                            <div class="w-px h-4 bg-line"></div>
                            <div class="product-origin-price font-normal text-secondary2">
                                <del>$32.00</del>
                            </div>
                            <div
                                class="product-sale caption2 font-semibold bg-green px-3 py-0.5 inline-block rounded-full">
                                -19%</div>
                            <div class="desc text-secondary mt-3">Giữ cho quần áo của bạn gọn gàng nhưng vẫn thanh lịch
                                với
                                các
                                tủ đựng đồ của Onita Patio Furniture. Thiết kế truyền thống, hoàn hảo để sử dụng ở mọi
                                nơi
                                cần lưu trữ.</div>
                        </div>
                        <div class="list-action mt-6">
                            <div class="choose-color">
                                <div class="text-title">Màu sắc: <span class="text-title color"></span></div>
                                <div class="list-color flex items-center gap-2 flex-wrap mt-3">
                                    <div class="color-item w-12 h-12 rounded-xl duration-300 relative active">
                                        <img src="assets/images/product/color/purple.png" alt="color"
                                            class="rounded-xl" />
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            xanh lam</div>
                                    </div>
                                    <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                        <img src="assets/images/product/color/red.png" alt="color" class="rounded-xl" />
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            đỏ</div>
                                    </div>
                                    <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                        <img src="assets/images/product/color/black.png" alt="color"
                                            class="rounded-xl" />
                                        <div
                                            class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                            đen</div>
                                    </div>
                                </div>
                            </div>
                            <div class="choose-size mt-5">
                                <div class="heading flex items-center justify-between">
                                    <div class="text-title">Kích cỡ: <span class="text-title size"></span></div>
                                    <div class="caption1 size-guide text-red underline cursor-pointer">Hướng dẫn kích cỡ</div>
                                </div>
                                <div class="list-size flex items-center gap-4 mt-3">
                                    <div class="btn-size-group flex items-center gap-4">
                                        <!-- Các nút size sẽ được render vào đây -->
                                    </div>
                                </div>
                                <style>
                                    .btn-size-group {
                                        display: flex;
                                        gap: 12px;
                                        margin-top: 8px;
                                    }
                                    .btn-size-group .btn {
                                        padding: 8px 16px;
                                        border: 1px solid #ddd;
                                        border-radius: 4px;
                                        cursor: pointer;
                                        transition: all 0.3s ease;
                                        background-color: #fff;
                                        color: #000;
                                        min-width: 40px;
                                        text-align: center;
                                    }
                                    .btn-size-group .btn:hover {
                                        background-color: #f0f0f0;
                                    }
                                    .btn-size-group .btn.active {
                                        background-color: #000;
                                        color: #fff;
                                        border-color: #000;
                                    }
                                    .add-cart-btn {
                                        padding: 12px 24px;
                                        background-color: #000;
                                        color: #fff;
                                        border: none;
                                        border-radius: 4px;
                                        cursor: pointer;
                                        transition: all 0.3s ease;
                                        width: 100%;
                                        margin-top: 16px;
                                    }
                                    .add-cart-btn:disabled {
                                        background-color: #ccc;
                                        cursor: not-allowed;
                                        opacity: 0.7;
                                    }
                                </style>
                                <script>
                                    function setActiveSize(button) {
                                        const buttons = document.querySelectorAll('.btn-size-group .btn');
                                        buttons.forEach(btn => {
                                            btn.classList.remove('active');
                                        });
                                        button.classList.add('active');
                                        
                                        // Kích hoạt nút thêm vào giỏ hàng
                                        const addToCartBtn = document.querySelector('.add-cart-btn');
                                        if (addToCartBtn) {
                                            addToCartBtn.disabled = false;
                                        }

                                        const bienTheId = button.getAttribute('data-bienthe-id');
                                        fetch(`<?= BASE_URL ?>?act=lay-thong-tin-bien-the&id_bien_the=${bienTheId}`)
                                            .then(res => res.text())
                                            .then(text => {
                                                const data = JSON.parse(text);
                                                const priceElement = document.getElementById('product-price');
                                                if (priceElement && data.don_gia) {
                                                    priceElement.innerText = parseInt(data.don_gia).toLocaleString('vi-VN') + ' đ';
                                                }
                                                const stockElement = document.getElementById('stock-info');
                                                if (stockElement && data.ton_kho) {
                                                    stockElement.innerText = 'Số lượng: ' + parseInt(data.ton_kho);
                                                    const maxQty = document.getElementById('soLuong');
                                                    maxQty.max = parseInt(data.ton_kho);
                                                }
                                                const addToCartForm = document.getElementById('addToCart');
                                                if (addToCartForm) {
                                                    const variant = data.id;
                                                    const inputElement = document.getElementById('bienTheId');
                                                    inputElement.value = variant;
                                                }
                                            })
                                            .catch(err => {
                                                console.error("Lỗi khi load giá biến thể:", err);
                                            });
                                    }

                                    // Vô hiệu hóa nút thêm vào giỏ hàng khi trang load
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const addToCartBtn = document.querySelector('.add-cart-btn');
                                        if (addToCartBtn) {
                                            addToCartBtn.disabled = true;
                                        }
                                    });
                                </script>
                            </div>
                            <div class="text-title mt-5">Số lượng:</div>
                            <div class="choose-quantity flex items-center flex-wrap lg:justify-between gap-5 mt-3">
                                <div
                                    class="quantity-block md:p-3 max-md:py-1.5 max-md:px-3 flex items-center justify-between rounded-lg border border-line sm:w-[180px] w-[120px] flex-shrink-0">
                                    <i class="ph-bold ph-minus cursor-pointer body1"></i>
                                    <div class="quantity body1 font-semibold">1</div>
                                    <i class="ph-bold ph-plus cursor-pointer body1"></i>
                                </div>
                                <div
                                    class="add-cart-btn button-main w-full text-center bg-white text-black border border-black">
                                    Thêm vào giỏ hàng</div>
                            </div>
                            <div class="button-block mt-5">
                                <a href="checkout.html" class="button-main w-full text-center">Mua Ngay</a>
                            </div>
                            <div class="flex items-center flex-wrap lg:gap-20 gap-8 gap-y-4 mt-5">
                                <div class="compare flex items-center gap-3 cursor-pointer">
                                    <div
                                        class="compare-btn md:w-12 md:h-12 w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-xl duration-300 hover:bg-black hover:text-white">
                                        <i class="ph-fill ph-arrows-counter-clockwise cursor-pointer heading6"></i>
                                    </div>
                                    <span>So sánh</span>
                                </div>
                                <div class="share flex items-center gap-3 cursor-pointer">
                                    <div
                                        class="share-btn md:w-12 md:h-12 w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-xl duration-300 hover:bg-black hover:text-white">
                                        <i class="ph-fill ph-share-network cursor-pointer heading6"></i>
                                    </div>
                                    <span>Chia sẻ sản phẩm</span>
                                </div>
                            </div>
                            <div class="more-infor mt-6">
                                <div class="flex items-center gap-4 flex-wrap">
                                    <div class="flex items-center gap-1">
                                        <i class="ph ph-arrow-clockwise cursor-pointer body1"></i>
                                        <div class="text-title">Giao hàng & Trả hàng</div>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <i class="ph ph-question cursor-pointer body1"></i>
                                        <div class="text-title">Hỏi câu hỏi</div>
                                    </div>
                                </div>
                                <div class="flex items-center flex-wrap gap-1 mt-3">
                                    <i class="ph ph-timer cursor-pointer body1"></i>
                                    <span class="text-title">Giao hàng dự kiến:</span>
                                    <span class="text-secondary">14 tháng 1 - 18 tháng 1</span>
                                </div>
                                <div class="flex items-center flex-wrap gap-1 mt-3">
                                    <i class="ph ph-eye cursor-pointer body1"></i>
                                    <span class="text-title">38</span>
                                    <span class="text-secondary">người đang xem sản phẩm này ngay bây giờ!</span>
                                </div>
                                <div class="flex items-center gap-1 mt-3">
                                    <div class="text-title">Mã sản phẩm:</div>
                                    <div class="text-secondary">53453412</div>
                                </div>
                                <div class="flex items-center gap-1 mt-3">
                                    <div class="text-title">Danh mục:</div>
                                    <div class="list-category text-secondary">thời trang, phụ nữ</div>
                                </div>
                                <div class="flex items-center gap-1 mt-3">
                                    <div class="text-title">Thẻ:</div>
                                    <div class="list-tag text-secondary">váy</div>
                                </div>
                            </div>
                            <div class="list-payment mt-7">
                                <div
                                    class="main-content lg:pt-8 pt-6 lg:pb-6 pb-4 sm:px-4 px-3 border border-line rounded-xl relative max-md:w-2/3 max-sm:w-full">
                                    <div
                                        class="heading6 px-5 bg-white absolute -top-[14px] left-1/2 -translate-x-1/2 whitespace-nowrap">
                                        Thanh toán an toàn đảm bảo</div>
                                    <div class="list grid grid-cols-6">
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="assets/images/payment/Frame-0.png" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="assets/images/payment/Frame-1.png" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="assets/images/payment/Frame-2.png" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="assets/images/payment/Frame-3.png" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="assets/images/payment/Frame-4.png" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="assets/images/payment/Frame-5.png" alt="payment" class="w-full" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/phosphor-icons.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/product-detail.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartBtn = document.querySelector('.add-to-cart-btn');
        const colorSelect = document.querySelector('.color-select');
        const sizeSelect = document.querySelector('.size-select');
        const quantityInput = document.querySelector('.quantity-input');
        const errorMessage = document.querySelector('.error-message');

        // Kiểm tra và cập nhật trạng thái nút thêm vào giỏ hàng
        function updateAddToCartButton() {
            const hasColor = colorSelect && colorSelect.value !== '';
            const hasSize = sizeSelect && sizeSelect.value !== '';
            const hasQuantity = quantityInput && quantityInput.value > 0;

            if (addToCartBtn) {
                if (hasColor && hasSize && hasQuantity) {
                    addToCartBtn.disabled = false;
                    addToCartBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    addToCartBtn.disabled = true;
                    addToCartBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }
        }

        // Hiển thị thông báo lỗi
        function showError(message) {
            if (errorMessage) {
                errorMessage.textContent = message;
                errorMessage.classList.remove('hidden');
                setTimeout(() => {
                    errorMessage.classList.add('hidden');
                }, 3000);
            }
        }

        // Xử lý sự kiện thêm vào giỏ hàng
        if (addToCartBtn) {
            addToCartBtn.addEventListener('click', function(e) {
                e.preventDefault();

                // Kiểm tra đã chọn màu sắc chưa
                if (colorSelect && colorSelect.value === '') {
                    showError('Vui lòng chọn màu sắc');
                    return;
                }

                // Kiểm tra đã chọn kích thước chưa
                if (sizeSelect && sizeSelect.value === '') {
                    showError('Vui lòng chọn kích thước');
                    return;
                }

                // Kiểm tra số lượng
                if (quantityInput && (quantityInput.value <= 0 || quantityInput.value > 10)) {
                    showError('Số lượng phải từ 1 đến 10');
                    return;
                }

                // Lấy thông tin sản phẩm
                const bienTheId = sizeSelect ? sizeSelect.value : '';
                const soLuong = quantityInput ? quantityInput.value : 1;

                // Gửi request thêm vào giỏ hàng
                fetch('?act=add-gio-hang', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: new URLSearchParams({
                        bien_the_id: bienTheId,
                        so_luong: soLuong
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hiển thị thông báo thành công
                        alert('Thêm vào giỏ hàng thành công!');
                        // Cập nhật số lượng sản phẩm trong giỏ hàng
                        const cartCount = document.querySelector('.cart-count');
                        if (cartCount) {
                            cartCount.textContent = data.tongSoLuong;
                        }
                    } else {
                        showError(data.message || 'Thêm vào giỏ hàng thất bại');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showError('Có lỗi xảy ra khi thêm vào giỏ hàng');
                });
            });
        }

        // Thêm event listeners cho các input
        if (colorSelect) {
            colorSelect.addEventListener('change', updateAddToCartButton);
        }
        if (sizeSelect) {
            sizeSelect.addEventListener('change', updateAddToCartButton);
        }
        if (quantityInput) {
            quantityInput.addEventListener('change', updateAddToCartButton);
        }

        // Kiểm tra ban đầu
        updateAddToCartButton();
    });
    </script>
    </body>

    <!-- Mirrored from anvogue-html.vercel.app/product-bought-together.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Mar 2025 09:43:11 GMT -->

    </html>


    <!--End Modal -->
    <?php require_once 'layout/footer.php'; ?>