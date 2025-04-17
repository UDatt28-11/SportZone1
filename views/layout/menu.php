<?php
$listDanhMuc = initDanhMuc();
$listSanPham = initSanPham();
// var_dump($listSanPham);
// var_dump($listDanhMuc);
$soLuongHangTrongGio = initSoLuongHangTrongGio();

?>

<div id="top-nav" class="top-nav style-one bg-black md:h-[44px] h-[30px]">
    <div class="container mx-auto h-full">
        <div class="top-nav-main flex justify-between max-md:justify-center h-full">
            <div class="left-content flex items-center gap-5 max-md:hidden">
                <div class="choose-type choose-language flex items-center gap-1.5">
                    <div class="select relative">
                        <p class="selected caption2 text-white">Việt Nam</p>
                        <ul class="list-option bg-white">
                            <li data-item="English" class="caption2 ">ViệtNam</li>
                        </ul>
                    </div>
                </div>
                <div class="choose-type choose-currency flex items-center gap-1.5">
                    <div class="select relative">
                        <p class="selected caption2 text-white">VNĐ</p>
                        <ul class="list-option bg-white">
                            <li data-item="VNĐ" class="caption2">VNĐ</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center text-button-uppercase text-white flex items-center">
                Khách hàng mới tiết kiệm 10% với mã GET10
            </div>
            <div class="right-content flex items-center gap-5 max-md:hidden">
                <a href="https://www.facebook.com/" target="_blank">
                    <i class="icon-facebook text-white"></i>
                </a>
                <a href="https://www.instagram.com/" target="_blank">
                    <i class="icon-instagram text-white"></i>
                </a>
                <a href="https://www.youtube.com/" target="_blank">
                    <i class="icon-youtube text-white"></i>
                </a>
                <a href="https://twitter.com/" target="_blank">
                    <i class="icon-twitter text-white"></i>
                </a>
                <a href="https://pinterest.com/" target="_blank">
                    <i class="icon-pinterest text-white"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="header" class="relative w-full">
    <div class="header-menu style-one absolute top-0 left-0 right-0 w-full md:h-[74px] h-[56px] bg-transparent">
        <div class="container mx-auto h-full">
            <div class="header-main flex justify-between h-full">
                <div class="menu-mobile-icon lg:hidden flex items-center">
                    <i class="icon-category text-2xl"></i>
                </div>
                <div class="left flex items-center gap-16">
                    <a href="<?= BASE_URL ?>"
                        class="flex items-center max-lg:absolute max-lg:left-1/2 max-lg:-translate-x-1/2">
                        <div class="heading4">Sport Zone</div>
                    </a>
                    <div class="menu-main h-full max-lg:hidden">
                        <ul class="flex items-center gap-8 h-full">
                            <li class="h-full relative">
                                <a href="<?= BASE_URL ?>"
                                    class="text-button-uppercase duration-300 h-full flex items-center justify-center gap-1">
                                    Trang Chủ
                                </a>
                            </li>
                            <li class="h-full">
                                <a href="<?= BASE_URL ?>"
                                    class="text-button-uppercase duration-300 h-full flex items-center justify-center">
                                    Giới Thiệu
                                </a>
                            </li>
                            <li class="h-full relative">
                                <a href="<?= BASE_URL ?>"
                                    class="text-button-uppercase duration-300 h-full flex items-center justify-center">
                                    Danh Mục
                                </a>
                                <div class="sub-menu py-3 px-5 -left-10 absolute bg-white rounded-b-xl">
                                    <ul class="w-full">
                                        <?php foreach ($listDanhMuc as $danhMuc): ?>
                                            <li>
                                                <a href="<?= BASE_URL ?>?act=danh-muc&id=<?= $danhMuc['id'] ?>"
                                                    class="link text-secondary duration-300">
                                                    <?= $danhMuc['ten_danh_muc'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </li>
                            


                            <li class="h-full relative">
                                <a href="<?= BASE_URL ?>"
                                    class="text-button-uppercase duration-300 h-full flex items-center justify-center">
                                    Tin Tức
                                </a>
                            </li>
                            <li class="h-full relative">
                                <a href="<?= BASE_URL ?>"
                                    class="text-button-uppercase duration-300 h-full flex items-center justify-center">
                                    Pages
                                </a>
                                <div class="sub-menu py-3 px-5 -left-10 absolute bg-white rounded-b-xl">
                                    <ul class="w-full">
                                        <li>
                                            <a href="contact.html" class="link text-secondary duration-300">
                                                Contact Us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="store-list.html" class="link text-secondary duration-300">
                                                Store List
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-not-found.html" class="link text-secondary duration-300">
                                                404
                                            </a>
                                        </li>
                                        <li>
                                            <a href="faqs.html" class="link text-secondary duration-300">
                                                FAQs
                                            </a>
                                        </li>
                                        <li>
                                            <a href="coming-soon.html" class="link text-secondary duration-300">
                                                Coming Soon
                                            </a>
                                        </li>
                                        <li>
                                            <a href="customer-feedbacks.html" class="link text-secondary duration-300">
                                                Customer Feedbacks
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Đăng ký đăng nhập -->
                <div class="right flex gap-12">
                    <div class="max-md:hidden search-icon flex items-center cursor-pointer relative">
                        <i class="ph-bold ph-magnifying-glass text-2xl"></i>
                        <div class="line absolute bg-line w-px h-6 -right-6"></div>
                    </div>
                    <div class="list-action flex items-center gap-4">
                        <div class="user-icon flex items-center justify-center cursor-pointer">
                            <label for="">
                                <?php
                        if (isset($_SESSION['user'])) {
                            echo htmlspecialchars($_SESSION['user']['email']);
                        }
                                 ?>
                            </label>
                            <i class="ph-bold ph-user text-2xl">
                            </i>
                            <div
                                class="login-popup absolute top-[74px] w-[320px] p-7 rounded-xl bg-white box-shadow-sm">
                                <?php if (!isset($_SESSION['user'])) { ?>
                                <a href="<?= BASE_URL . '?act=login' ?>" class="button-main w-full text-center">Đăng
                                    Nhập</a>
                                <div class="text-secondary text-center mt-3 pb-4">
                                    Bạn chưa có tài khoản?
                                    <a href="<?= BASE_URL . '?act=register' ?>"
                                        class="text-black pl-1 hover:underline">Đăng Ký
                                    </a>
                                </div>
                                <a href="#"
                                    class="button-main bg-white text-black border border-black w-full text-center">Hỗ
                                    Trợ</a>
                                <?php } else { ?>
                                    
                                    <a href="<?= BASE_URL . '?act=don-hang' ?>"
                                    class="button-main w-full text-center">
                                    Đơn Hàng
                                    </a><br><br>
                                    <?php
                                    if($_SESSION['chuc_vu_id'] == 1){
                                        ?>
                                        <a href="<?= BASE_URL_ADMIN . '?act=/' ?>" class="button-main
                                        w-full text-center">
                                        Quản Lý
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    <br><br>
                                <a href="<?= BASE_URL . '?act=logout-client' ?>"
                                    onclick="return confirm('Bạn muốn đăng xuất tài khoản?')"
                                    class="button-main bg-white text-black border border-black w-full text-center">Đăng Xuất</a>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="max-md:hidden wishlist-icon flex items-center relative cursor-pointer">
                            <i class="ph-bold ph-heart text-2xl"></i>
                            <span
                                class="quantity wishlist-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full">0</span>
                        </div>
                        <a href="<?= BASE_URL . '?act=gio-hang'?>">
                            <div class="max-md:hidden cart-icon flex items-center relative cursor-pointer">
                                <i class="ph-bold ph-handbag text-2xl"></i>
                                <div
                                    class="quantity cart-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full"><?=$soLuongHangTrongGio ?? 0 ; ?></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Tìm kiếm sản phẩm -->
                <div class="modal-search-block">
                    <div class="modal-search-main md:p-10 p-6 rounded-[32px]">
                        <form action="<?= BASE_URL ?>?act=search" method="GET" class="form-search relative w-full flex items-center gap-2">
                            <input type="hidden" name="act" value="search">
                            <input type="text" name="keyword" placeholder="Nhập Tên Sản Phẩm"
                                class="text-button-lg h-14 rounded-2xl border border-line w-full pl-6 pr-12" />
                            <button type="submit" class="btn-search bg-black text-white px-6 py-3 rounded-2xl hover:bg-gray-800 transition-colors">
                                <i class="ph ph-magnifying-glass text-xl"></i>
                            </button>
                        </form>
                        <div class="list-recent mt-8">
                            <div class="heading6">Bạn có thể thích</div>
                            <div
                                class="list-product four-product hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 md:mt-10 mt-6">
                                <!-- List four product -->
                                <?php foreach($listSanPham as $key => $sanPham) : ?>
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
                                                        <i
                                                            class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
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
                                                    class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                                    <?php if($sanPham['gia_khuyen_mai']) { ?>
                                                    <div class="product-price text-title">
                                                        <?= formatPrice( $sanPham['gia_khuyen_mai']). 'VNĐ'; ?>
                                                    </div>
                                                    <div class="product-origin-price caption1 text-secondary2">
                                                        <del>><?= formatPrice($sanPham['gia_san_pham']) . 'VNĐ'; ?></del>
                                                    </div>
                                                    <?php } else {?>
                                                    <div class="product-price text-title">
                                                        <?= formatPrice( $sanPham['gia_san_pham']) . 'VNĐ'; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <div
                                                        class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                                        <?= round(100 - ($sanPham['gia_khuyen_mai'] * 100 / $sanPham['gia_san_pham'])) ?>%
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
                </div>
                <!-- Danh sách yêu thích-->
                <div class="modal-wishlist-block">
                    <div class="modal-wishlist-main py-6">
                        <div class="heading px-6 pb-3 flex items-center justify-between relative">
                            <div class="heading5">Danh Sách Yêu Thích</div>
                            <div
                                class="close-btn absolute right-6 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                                <i class="ph ph-x text-sm"></i>
                            </div>
                        </div>
                        <div class="list-product px-6"></div>
                        <div
                            class="footer-modal p-6 border-t bg-white border-line absolute bottom-0 left-0 w-full text-center">
                            <a href="wishlist.html" class="button-main w-full text-center uppercase">
                                Tất Cả Danh Sách Yêu Thích</a>
                            <div
                                class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">
                                Tiếp Tục Mua Sắm
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Giỏ hàng  -->
                <div class="modal-cart-block">
                    <div class="modal-cart-main flex">
                        <div class="left w-1/2 border-r border-line py-6 max-md:hidden">
                            <div class="heading5 px-6 pb-3">Có Thể Bạn Cũng Thích</div>
                            <div class="list px-6 max-h-[500px] overflow-y-auto scroll-smooth">
                                <?php foreach ($listSanPhamCungDanhMuc as $sanPham) { ?>
                                <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line"
                                    data-item="1">
                                    <div class="infor flex items-center gap-5">
                                        <div class="bg-img">
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="img"
                                                class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                        </div>
                                        <div class="">
                                            <div class="name text-button"><?=$sanPham['ten_san_pham']?></div>
                                            <div class="flex items-center gap-2 mt-2">
                                                <div class="product-price text-title"><?=$sanPham['gia_khuyen_mai']?></div>
                                                <div class="product-origin-price text-title text-secondary2">
                                                    <del><?=$sanPham['gia_san_pham']?></del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                        Xem Chi Tiết
                                    </div>
                                </div>
                                <?php } ?>
                            
                            </div>
                        </div>
                        <div class="right cart-block md:w-1/2 w-full py-6 relative overflow-hidden">
                            <div class="heading px-6 pb-3 flex items-center justify-between relative">
                                <div class="heading5">Giỏ Hàng</div>
                                <div
                                    class="close-btn absolute right-6 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                                    <i class="ph ph-x text-sm"></i>
                                </div>
                            </div>
                            <div class="time countdown-cart px-6">
                                <div class="flex items-center gap-3 px-5 py-3 bg-green rounded-lg">
                                    <p class="text-3xl">🔥</p>
                                    <div class="caption1">
                                        Your cart will expire in
                                        <span class="text-red caption1 font-semibold"><span
                                                class="minute">04</span>:<span class="second">59</span></span>
                                        minutes!<br />
                                        Please checkout now before your items sell out!
                                    </div>
                                </div>
                            </div>
                            <div class="heading banner mt-3 px-6">
                                <div class="text">
                                    Buy
                                    <span class="text-button">
                                        $<span class="more-price">150</span>.00
                                    </span>
                                    <span>more to get </span>
                                    <span class="text-button">freeship</span>
                                </div>
                                <div class="tow-bar-block mt-3">
                                    <div class="progress-line"></div>
                                </div>
                            </div>
                            <div class="list-product px-6"></div>
                            <div class="footer-modal bg-white absolute bottom-0 left-0 w-full">
                                <div
                                    class="flex items-center justify-center lg:gap-14 gap-8 px-6 py-4 border-b border-line">
                                    <div class="note-btn item flex items-center gap-3 cursor-pointer">
                                        <i class="ph ph-note-pencil text-xl"></i>
                                        <div class="caption1">Ghi Chú</div>
                                    </div>
                                    <div class="shipping-btn item flex items-center gap-3 cursor-pointer">
                                        <i class="ph ph-truck text-xl"></i>
                                        <div class="caption1">Vận Chuyển</div>
                                    </div>
                                    <div class="coupon-btn item flex items-center gap-3 cursor-pointer">
                                        <i class="ph ph-tag text-xl"></i>
                                        <div class="caption1">Mã Giảm Giá</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-6 px-6">
                                    <div class="heading5">Tổng Phí</div>
                                    <div class="heading5 total-cart">$0.00</div>
                                </div>
                                <div class="block-button text-center p-6">
                                    <div class="flex items-center gap-4">
                                        <a href="?act=gio-hang"
                                            class="button-main basis-1/2 bg-white border border-black text-black text-center uppercase">
                                            Xem Giỏ Hàng
                                        </a>
                                        <a href="checkout.html" class="button-main basis-1/2 text-center uppercase">
                                            Kiểm Tra
                                        </a>
                                    </div>
                                    <div
                                        class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">
                                        Tiếp Tục Mua Sắm
                                    </div>
                                </div>
                                <div class="tab-item note-block">
                                    <div class="px-6 py-4 border-b border-line">
                                        <div class="item flex items-center gap-3 cursor-pointer">
                                            <i class="ph ph-note-pencil text-xl"></i>
                                            <div class="caption1">Note</div>
                                        </div>
                                    </div>
                                    <div class="form pt-4 px-6">
                                        <textarea name="form-note" id="form-note" rows="4"
                                            placeholder="Add special instructions for your order..."
                                            class="caption1 py-3 px-4 bg-surface border-line rounded-md w-full"></textarea>
                                    </div>
                                    <div class="block-button text-center pt-4 px-6 pb-6">
                                        <div class="button-main w-full text-center">Save</div>
                                        <div
                                            class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                            Cancel
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-item shipping-block">
                                    <div class="px-6 py-4 border-b border-line">
                                        <div class="item flex items-center gap-3 cursor-pointer">
                                            <i class="ph ph-truck text-xl"></i>
                                            <div class="caption1">Estimate shipping rates</div>
                                        </div>
                                    </div>
                                    <div class="form pt-4 px-6">
                                        <div class="">
                                            <label for="select-country"
                                                class="caption1 text-secondary">Country/region</label>
                                            <div class="select-block relative mt-2">
                                                <select id="select-country" name="select-country"
                                                    class="w-full py-3 pl-5 rounded-xl bg-white border border-line">
                                                    <option value="Country/region">Country/region</option>
                                                    <option value="France">France</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="UK">UK</option>
                                                    <option value="USA">USA</option>
                                                </select>
                                                <i
                                                    class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-5 right-2"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label for="select-state" class="caption1 text-secondary">State</label>
                                            <div class="select-block relative mt-2">
                                                <select id="select-state" name="select-state"
                                                    class="w-full py-3 pl-5 rounded-xl bg-white border border-line">
                                                    <option value="State">State</option>
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
                                            <label for="select-code" class="caption1 text-secondary">Postal/Zip
                                                Code</label>
                                            <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-code"
                                                type="text" placeholder="Postal/Zip Code" />
                                        </div>
                                    </div>
                                    <div class="block-button text-center pt-4 px-6 pb-6">
                                        <div class="button-main w-full text-center">Calculator</div>
                                        <div
                                            class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                            Cancel
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-item coupon-block">
                                    <div class="px-6 py-4 border-b border-line">
                                        <div class="item flex items-center gap-3 cursor-pointer">
                                            <i class="ph ph-tag text-xl"></i>
                                            <div class="caption1">Add A Coupon Code</div>
                                        </div>
                                    </div>
                                    <div class="form pt-4 px-6">
                                        <div class="">
                                            <label for="select-discount" class="caption1 text-secondary">Enter
                                                Code</label>
                                            <input class="border-line px-5 py-3 w-full rounded-xl mt-3"
                                                id="select-discount" type="text" placeholder="Discount code" />
                                        </div>
                                    </div>
                                    <div class="block-button text-center pt-4 px-6 pb-6">
                                        <div class="button-main w-full text-center">Apply</div>
                                        <div
                                            class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                            Cancel
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

    <!-- Menu Mobile -->
    <div id="menu-mobile" class="">
        <div class="menu-container bg-white h-full">
            <div class="container h-full">
                <div class="menu-main h-full overflow-hidden">
                    <div class="heading py-2 relative flex items-center justify-center">
                        <div
                            class="close-menu-mobile-btn absolute left-0 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-surface flex items-center justify-center">
                            <i class="ph ph-x text-sm"></i>
                        </div>
                        <a href="index.html" class="logo text-3xl font-semibold text-center">Anvogue</a>
                    </div>
                    <div class="form-search relative mt-2">
                        <i
                            class="ph ph-magnifying-glass text-xl absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                        <input type="text" placeholder="What are you looking for?"
                            class="h-12 rounded-lg border border-line text-sm w-full pl-10 pr-4" />
                    </div>
                    <div class="list-nav mt-6">
                        <ul>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between">Demo
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full grid grid-cols-2 pt-2 pb-6">
                                        <ul>
                                            <li>
                                                <a href="index-2.html"
                                                    class="nav-item-mobile link text-secondary duration-300 active">
                                                    Home Fashion 1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion2.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 2
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion3.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 3
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion4.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 4
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion5.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 5
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion6.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 6
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion7.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 7
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion8.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 8
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion9.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 9
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion10.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 10
                                                </a>
                                            </li>
                                            <li>
                                                <a href="fashion11.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Fashion 11
                                                </a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="underwear.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Underwear
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cosmetic1.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Cosmetic 1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cosmetic2.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Cosmetic 2
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cosmetic3.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Cosmetic 3
                                                </a>
                                            </li>
                                            <li>
                                                <a href="pet.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Pet Store
                                                </a>
                                            </li>
                                            <li>
                                                <a href="jewelry.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Jewelry
                                                </a>
                                            </li>
                                            <li>
                                                <a href="furniture.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Furniture
                                                </a>
                                            </li>
                                            <li>
                                                <a href="watch.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Watch
                                                </a>
                                            </li>
                                            <li>
                                                <a href="toys.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Toys Kid
                                                </a>
                                            </li>
                                            <li>
                                                <a href="yoga.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Yoga
                                                </a>
                                            </li>
                                            <li>
                                                <a href="organic.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Organic
                                                </a>
                                            </li>
                                            <li>
                                                <a href="marketplace.html"
                                                    class="nav-item-mobile link text-secondary duration-300">
                                                    Home Marketplace
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!"
                                    class="text-xl font-semibold flex items-center justify-between mt-5">Features
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <div class="nav-link grid grid-cols-2 gap-5 gap-y-6">
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    For Men
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Starting From 50% Off
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Outerwear | Coats
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Sweaters | Cardigans
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Shirt | Sweatshirts
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 view-all-btn">
                                                            View All
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Skincare
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Faces Skin
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Eyes Makeup
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Lip Polish
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Hair Care
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 view-all-btn">
                                                            View All
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Health</div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Cented Candle
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Health Drinks
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Yoga Clothes
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Yoga Equipment
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 view-all-btn">
                                                            View All
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    For Women
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Starting From 60% Off
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Dresses | Jumpsuits
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            T-shirts | Sweatshirts
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Accessories | Jewelry
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 view-all-btn">
                                                            View All
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    For Kid
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Kids Bed
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Boy's Toy
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Baby Blanket
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Newborn Clothing
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 view-all-btn">
                                                            View All
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    For Home
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Furniture | Decor
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Table | Living Room
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Chair | Work Room
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Lighting | Bed Room
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300 view-all-btn">
                                                            View All
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between mt-5">Shop
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <div class="nav-link grid grid-cols-2 gap-5 gap-y-6 justify-between">
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Shop Features
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb-img.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Breadcrumb IMG
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Breadcrumb 1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb2.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Breadcrumb 2
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-collection.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Collection
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Shop Features
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-filter-canvas.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Filter Canvas
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-filter-options.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Filter Options
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-filter-dropdown.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Filter Dropdown
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar-list.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Sidebar List
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Shop Layout
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-default.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Shop Default
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-default-grid.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Shop Default Grid
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-default-list.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Shop Default List
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-fullwidth.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Shop Full Width
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-square.html"
                                                            class="link text-secondary duration-300">
                                                            Shop Square
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="checkout.html"
                                                            class="link text-secondary duration-300">
                                                            Checkout
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="checkout2.html"
                                                            class="link text-secondary duration-300">
                                                            Checkout Style 2
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Products Pages
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html"
                                                            class="link text-secondary duration-300">
                                                            Wish List
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="search-result.html"
                                                            class="link text-secondary duration-300">
                                                            Search Result
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" class="link text-secondary duration-300">
                                                            Shopping Cart
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="login.html" class="link text-secondary duration-300">
                                                            Login/Register
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="forgot-password.html"
                                                            class="link text-secondary duration-300">
                                                            Forgot Password
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="order-tracking.html"
                                                            class="link text-secondary duration-300">
                                                            Order Tracking
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="my-account.html"
                                                            class="link text-secondary duration-300">
                                                            My Account
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!"
                                    class="text-xl font-semibold flex items-center justify-between mt-5">Product
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <div class="nav-link grid grid-cols-2 gap-5 gap-y-6 justify-between">
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Products Features
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="product-default.html"
                                                            class="link text-secondary duration-300">
                                                            Products Defaults
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-sale.html"
                                                            class="link text-secondary duration-300">
                                                            Products Sale
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-countdown-timer.html"
                                                            class="link text-secondary duration-300">
                                                            Products Countdown Timer
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-grouped.html"
                                                            class="link text-secondary duration-300">
                                                            Products Grouped
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-bought-together.html"
                                                            class="link text-secondary duration-300">
                                                            Frequently Bought Together
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-out-of-stock.html"
                                                            class="link text-secondary duration-300">
                                                            Products Out Of Stock
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-variable.html"
                                                            class="link text-secondary duration-300">
                                                            Products Variable
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Products Features
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="product-external.html"
                                                            class="link text-secondary duration-300">
                                                            Products External
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-on-sale.html"
                                                            class="link text-secondary duration-300">
                                                            Products On Sale
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-discount.html"
                                                            class="link text-secondary duration-300">
                                                            Products With Discount
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-sidebar.html"
                                                            class="link text-secondary duration-300">
                                                            Products With Sidebar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-fixed-price.html"
                                                            class="link text-secondary duration-300">
                                                            Products Fixed Price
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Products Layout
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="product-thumbnail-left.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Thumbnails Left
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-thumbnail-bottom.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Thumbnails Bottom
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-one-scrolling.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Grid 1 Scrolling
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-two-scrolling.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Grid 2 Scrolling
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-combined-one.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Combined 1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-combined-two.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Combined 2
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">
                                                    Products Styles
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="product-style1.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 01
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-style2.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 02
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-style3.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 03
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-style4.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 04
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="product-style5.html"
                                                            class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 05
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between mt-5">Blog
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <ul class="w-full">
                                            <li>
                                                <a href="blog-default.html" class="link text-secondary duration-300">
                                                    Blog Default
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-list.html" class="link text-secondary duration-300">
                                                    Blog List
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-grid.html" class="link text-secondary duration-300">
                                                    Blog Grid
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-detail1.html" class="link text-secondary duration-300">
                                                    Blog Detail 1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-detail2.html" class="link text-secondary duration-300">
                                                    Blog Detail 2
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between mt-5">Pages
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <ul class="w-full">
                                            <li>
                                                <a href="about.html" class="link text-secondary duration-300">
                                                    About Us
                                                </a>
                                            </li>
                                            <li>
                                                <a href="contact.html" class="link text-secondary duration-300">
                                                    Contact Us
                                                </a>
                                            </li>
                                            <li>
                                                <a href="store-list.html" class="link text-secondary duration-300">
                                                    Store List
                                                </a>
                                            </li>
                                            <li>
                                                <a href="page-not-found.html" class="link text-secondary duration-300">
                                                    404
                                                </a>
                                            </li>
                                            <li>
                                                <a href="faqs.html" class="link text-secondary duration-300">
                                                    FAQs
                                                </a>
                                            </li>
                                            <li>
                                                <a href="coming-soon.html" class="link text-secondary duration-300">
                                                    Coming Soon
                                                </a>
                                            </li>
                                            <li>
                                                <a href="customer-feedbacks.html"
                                                    class="link text-secondary duration-300">
                                                    Customer Feedbacks
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu bar -->
    <div class="menu_bar fixed bg-white bottom-0 left-0 w-full h-[70px] sm:hidden z-[101]">
        <div class="menu_bar-inner grid grid-cols-4 items-center h-full">
            <a href="<?= BASE_URL ?>" class="menu_bar-link flex flex-col items-center gap-1">
                <span class="ph-bold ph-house text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Trang Chủ</span>
            </a>
            <a href="<?= BASE_URL ?>?act=product-category" class="menu_bar-link flex flex-col items-center gap-1">
                <span class="ph-bold ph-list text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Danh Mục</span>
            </a>
            <a href="<?= BASE_URL ?>?act=gio-hang" class="menu_bar-link flex flex-col items-center gap-1">
                <div class="cart-icon relative">
                    <span class="ph-bold ph-handbag text-2xl block"></span>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <span class="quantity cart-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full">
                            <?= isset($soLuongHangTrongGio) ? $soLuongHangTrongGio : 0 ?>
                        </span>
                    <?php endif; ?>
                </div>
                <span class="menu_bar-title caption2 font-semibold">Giỏ Hàng</span>
            </a>
            <a href="<?= BASE_URL ?>?act=login" class="menu_bar-link flex flex-col items-center gap-1">
                <span class="ph-bold ph-user text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Tài Khoản</span>
            </a>
            <?php if (isset($_SESSION['user'])): ?>
            <a href="<?= BASE_URL ?>?act=don-hang" class="menu_bar-link flex flex-col items-center gap-1">
                <span class="ph-bold ph-clipboard-text text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Đơn Hàng</span>
            </a>
            <?php endif; ?>
        </div>
    </div>


</div>