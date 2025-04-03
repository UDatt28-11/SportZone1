<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<!-- Slider -->
<div
    class="slider-block style-one bg-linear xl:h-[860px] lg:h-[800px] md:h-[580px] sm:h-[500px] h-[350px] max-[420px]:h-[320px] w-full">
    <div class="slider-main h-full w-full">
        <div class="swiper swiper-slider h-full relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slider-item h-full w-full relative">
                        <div class="container w-full h-full flex items-center relative">
                            <div class="text-content basis-1/2">
                                <div class="text-sub-display">Giảm Giá Lên Tới 50% !</div>
                                <div class="text-display md:mt-5 mt-2">
                                    Bộ sưu tập giảm giá mùa hè
                                </div>
                                <a href="shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3">Mua Ngay
                                </a>
                            </div>
                            <div class="sub-img absolute sm:w-1/2 w-3/5 2xl:-right-[60px] -right-[16px] bottom-0">
                                <img src="./assets/images/slider/bg1-1.png" alt="bg1-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-item h-full w-full relative">
                        <div class="container w-full h-full flex items-center relative">
                            <div class="text-content basis-1/2">
                                <div class="text-sub-display">Giảm Giá Lên Tới 50% !</div>
                                <div class="text-display md:mt-5 mt-2">
                                    Xu hướng của thời đại
                                </div>
                                <a href="shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3">Mua Ngay
                                </a>
                            </div>
                            <div class="sub-img absolute w-1/2 2xl:-right-[60px] -right-[0] sm:-bottom-[60px] bottom-0">
                                <img src="./assets/images/slider/bg3-1.png" alt="bg1-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-item h-full w-full relative">
                        <div class="container w-full h-full flex items-center relative">
                            <div class="text-content basis-1/2">
                                <div class="text-sub-display">Giảm Giá Lên Tới 50% !</div>
                                <div class="text-display md:mt-5 mt-2">
                                    Phong cách thể thao bốn mùa
                                </div>
                                <a href="shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3">Mua Ngay
                                </a>
                            </div>
                            <div
                                class="sub-img absolute sm:w-1/2 w-2/3 2xl:-right-[60px] -right-[36px] sm:bottom-0 -bottom-[30px]">
                                <img src="./assets/images/slider/bg1-3.png" alt="bg1-3" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<div class="what-new-block filter-product-block md:pt-20 pt-10">
    <div class="container">
        <div class="heading flex flex-col items-center text-center">
            <div class="heading3">Sản Phẩm Của Chúng Tôi</div>
            <div class="menu-tab bg-surface rounded-2xl mt-6">
                <div class="menu flex items-center gap-2 p-1">
                    <div class="indicator absolute top-1 bottom-1 bg-white rounded-full shadow-md duration-300">
                    </div>
                    <div class="tab-item relative text-secondary text-button-uppercase py-2 px-5 cursor-pointer duration-300 hover:text-black"
                        data-item="top">
                        Bán Chạy
                    </div>
                    <div class="tab-item relative text-secondary text-button-uppercase py-2 px-5 cursor-pointer duration-300 hover:text-black active"
                        data-item="t-shirt">
                        Sale 50%
                    </div>
                    <div class="tab-item relative text-secondary text-button-uppercase py-2 px-5 cursor-pointer duration-300 hover:text-black"
                        data-item="dress">
                        Mới Nhất
                    </div>

                </div>
            </div>
        </div>
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
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        Thêm Vào Yêu Thích
                                    </div>
                                    <i class="ph ph-heart text-lg"></i>
                                </div>
                                <div
                                    class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        So Sánh Sản Phẩm
                                    </div>
                                    <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                    <i class="ph ph-check-circle text-lg checked-icon"></i>
                                </div>
                            </div>
                            <div class="product-img w-full h-full aspect-[3/4]">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                    <img class="w-full h-full object-cover duration-700"
                                        src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="img" />
                                    <img class="w-full h-full object-cover duration-700"
                                        src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="img" />
                                </a>
                            </div>
                            <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                <div
                                    class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">Xem
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
                                <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                    <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                </div>
                                <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
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
                            <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Red
                                    </div>
                                </div>
                                <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        yellow
                                    </div>
                                </div>
                                <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        green
                                    </div>
                                </div>
                            </div>

                            <div
                                class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                <?php if($sanPham['gia_khuyen_mai']) { ?>
                                <div class="product-price text-title"><?= formatPrice( $sanPham['gia_san_pham']); ?>
                                </div>
                                <div class="product-origin-price caption1 text-secondary2">
                                    <del>><?= formatPrice($sanPham['gia_khuyen_mai']); ?></del>
                                </div>
                                <?php } else {?>
                                <div class="product-price text-title"><?= formatPrice( $sanPham['gia_san_pham']); ?>
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

<div class="collection-block md:pt-20 pt-10">
    <div class="container">
        <div class="heading3 text-center">Khám Phá Bộ Sưu Tập</div>
    </div>
    <div class="list-collection relative section-swiper-navigation md:mt-10 mt-6 sm:px-5 px-4">
        <div class="swiper-button-prev lg:left-10 left-6"></div>
        <div class="swiper swiper-collection h-full relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="shop-breadcrumb1.html"
                        class="collection-item block relative rounded-2xl overflow-hidden cursor-pointer">
                        <div class="bg-img">
                            <img src="./assets/images/collection/swimwear.png" alt="swimwear" />
                        </div>
                        <div
                            class="collection-name heading5 text-center sm:bottom-8 bottom-4 lg:w-[200px] md:w-[160px] w-[100px] md:py-3 py-1.5 bg-white rounded-xl duration-500">
                            Nike
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="shop-breadcrumb1.html"
                        class="collection-item block relative rounded-2xl overflow-hidden cursor-pointer">
                        <div class="bg-img">
                            <img src="./assets/images/collection/top.png" alt="top" />
                        </div>
                        <div
                            class="collection-name heading5 text-center sm:bottom-8 bottom-4 lg:w-[200px] md:w-[160px] w-[100px] md:py-3 py-1.5 bg-white rounded-xl duration-500">
                            Adidas
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="shop-breadcrumb1.html"
                        class="collection-item block relative rounded-2xl overflow-hidden cursor-pointer">
                        <div class="bg-img">
                            <img src="./assets/images/collection/sets.png" alt="sets" />
                        </div>
                        <div
                            class="collection-name heading5 text-center sm:bottom-8 bottom-4 lg:w-[200px] md:w-[160px] w-[100px] md:py-3 py-1.5 bg-white rounded-xl duration-500">
                            New Balance
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="shop-breadcrumb1.html"
                        class="collection-item block relative rounded-2xl overflow-hidden cursor-pointer">
                        <div class="bg-img">
                            <img src="./assets/images/collection/outerwear.png" alt="outerwear" />
                        </div>
                        <div
                            class="collection-name heading5 text-center sm:bottom-8 bottom-4 lg:w-[200px] md:w-[160px] w-[100px] md:py-3 py-1.5 bg-white rounded-xl duration-500">
                            Puma
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="shop-breadcrumb1.html"
                        class="collection-item block relative rounded-2xl overflow-hidden cursor-pointer">
                        <div class="bg-img">
                            <img src="./assets/images/collection/underwear.png" alt="underwear" />
                        </div>
                        <div
                            class="collection-name heading5 text-center sm:bottom-8 bottom-4 lg:w-[200px] md:w-[160px] w-[100px] md:py-3 py-1.5 bg-white rounded-xl duration-500">
                            Fila
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="shop-breadcrumb1.html"
                        class="collection-item block relative rounded-2xl overflow-hidden cursor-pointer">
                        <div class="bg-img">
                            <img src="./assets/images/collection/t-shirt.png" alt="t-shirt" />
                        </div>
                        <div
                            class="collection-name heading5 text-center sm:bottom-8 bottom-4 lg:w-[200px] md:w-[160px] w-[100px] md:py-3 py-1.5 bg-white rounded-xl duration-500">
                            Under Armour
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="swiper-button-next lg:right-10 right-6"></div>
    </div>
</div>

<div class="tab-features-block filter-product-block md:pt-20 pt-10">
    <div class="container">
        <div class="heading flex flex-col items-center text-center">
            <div class="menu-tab bg-surface rounded-2xl">
                <div class="menu flex items-center gap-2 p-1">
                    <div class="indicator absolute top-1 bottom-1 bg-white rounded-full shadow-md duration-300">
                    </div>
                    <div class="tab-item relative text-secondary heading5 py-2 px-5 cursor-pointer duration-500 hover:text-black active"
                        data-item="best sellers">
                        BÁN CHẠY
                    </div>
                    <div class="tab-item relative text-secondary heading5 py-2 px-5 cursor-pointer duration-500 hover:text-black"
                        data-item="on sale">
                        SALE 50%
                    </div>
                    <div class="tab-item relative text-secondary heading5 py-2 px-5 cursor-pointer duration-500 hover:text-black"
                        data-item="new arrivals">
                        MỚI NHẤT
                    </div>
                </div>
            </div>
        </div>
        <div
            class="list-product six-product hide-product-sold relative section-swiper-navigation style-outline style-small-border md:mt-10 mt-6">
            <div class="swiper-button-prev2 sm:left-10 left-6">
                <i class="ph-bold ph-caret-left text-xl"></i>
            </div>
            <div class="swiper swiper-list-product h-full relative">
                <div class="swiper-wrapper">
                    <!-- List six product -->
                </div>
            </div>
            <div class="swiper-button-next2 sm:right-10 right-6">
                <i class="ph-bold ph-caret-right text-xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="banner-block style-one grid sm:grid-cols-2 gap-5 md:pt-20 pt-10">
    <a href="shop-breadcrumb-img.html" class="banner-item relative block overflow-hidden duration-500">
        <div class="banner-img">
            <img src="./assets/images/banner/1.png" class="duration-1000" alt="img" />
        </div>
        <div class="banner-content absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center">
            <div class="heading2 text-white">BÁN CHẠY</div>
            <div class="text-button text-white relative inline-block pb-1 border-b-2 border-white duration-500 mt-2">
                Shop Now
            </div>
        </div>
    </a>
    <a href="shop-breadcrumb-img.html" class="banner-item relative block overflow-hidden duration-500">
        <div class="banner-img">
            <img src="./assets/images/banner/2.png" class="duration-1000" alt="img" />
        </div>
        <div class="banner-content absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center">
            <div class="heading2 text-white">MỚI NHẤT</div>
            <div class="text-button text-white relative inline-block pb-1 border-b-2 border-white duration-500 mt-2">
                Shop Now
            </div>
        </div>
    </a>
</div>

<div class="benefit-block md:pt-20 pt-10">
    <div class="container">
        <div class="list-benefit grid items-start lg:grid-cols-4 grid-cols-2 gap-[30px]">
            <div class="benefit-item flex flex-col items-center justify-center">
                <i class="icon-phone-call lg:text-7xl text-5xl"></i>
                <div class="heading6 text-center mt-5">Dịch vụ khách hàng 24/7</div>
                <div class="caption1 text-secondary text-center mt-3">
                    Chúng tôi luôn sẵn sàng hỗ trợ bạn giải đáp mọi thắc mắc hoặc lo ngại, 24/7.
                </div>
            </div>
            <div class="benefit-item flex flex-col items-center justify-center">
                <i class="icon-return lg:text-7xl text-5xl"></i>
                <div class="heading6 text-center mt-5">Hoàn tiền trong 14 ngày</div>
                <div class="caption1 text-secondary text-center mt-3">
                    Nếu bạn không hài lòng với sản phẩm đã mua, chỉ cần trả lại
                    trong vòng 14 ngày để được hoàn lại tiền.
                </div>
            </div>
            <div class="benefit-item flex flex-col items-center justify-center">
                <i class="icon-guarantee lg:text-7xl text-5xl"></i>
                <div class="heading6 text-center mt-5">Đảm bảo của chúng tôi</div>
                <div class="caption1 text-secondary text-center mt-3">
                    Chúng tôi cam kết về sản phẩm và dịch vụ của mình và đảm bảo sự hài lòng của bạn.
                </div>
            </div>
            <div class="benefit-item flex flex-col items-center justify-center">
                <i class="icon-delivery-truck lg:text-7xl text-5xl"></i>
                <div class="heading6 text-center mt-5">Vận chuyển toàn quốc</div>
                <div class="caption1 text-secondary text-center mt-3">
                    Chúng tôi vận chuyển sản phẩm của mình trên toàn quốc, giúp khách hàng ở mọi nơi đều có thể tiếp
                    cận.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="testimonial-block md:pt-20 md:pb-16 pt-10 pb-8 md:mt-20 mt-10 bg-surface">
    <div class="container">
        <div class="heading3 text-center">Mọi người bình luận </div>
        <div class="list-testimonial pagination-mt40 md:mt-10 mt-6">
            <div class="swiper swiper-list-testimonial h-full relative">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item style-one h-full">
                            <div class="testimonial-main bg-white p-8 rounded-2xl h-full">
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                </div>
                                <div class="heading6 title mt-4">Variety of Styles!</div>
                                <div class="desc mt-2">
                                    "Fantastic shop! Great selection, fair prices, and
                                    friendly staff. Highly recommended. The quality of the
                                    products is exceptional, and the prices are very
                                    reasonable!"
                                </div>
                                <div class="text-button name mt-4">Lisa K.</div>
                                <div class="caption2 date text-secondary2 mt-1">
                                    August 13, 2024
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-one h-full">
                            <div class="testimonial-main bg-white p-8 rounded-2xl h-full">
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                </div>
                                <div class="heading6 title mt-4">Quality of Clothing!</div>
                                <div class="desc mt-2">
                                    "Anvouge's fashion collection is a game-changer! Their
                                    unique and trendy pieces have completely transformed my
                                    style. It's comfortable, stylish, and always on-trend."
                                </div>
                                <div class="text-button name mt-4">Elizabeth A.</div>
                                <div class="caption2 date text-secondary2 mt-1">
                                    August 13, 2024
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-one h-full">
                            <div class="testimonial-main bg-white p-8 rounded-2xl h-full">
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                </div>
                                <div class="heading6 title mt-4">Customer Service!</div>
                                <div class="desc mt-2">
                                    "I absolutely love this shop! The products are
                                    high-quality and the customer service is excellent. I
                                    always leave with exactly what I need and a smile on my
                                    face."
                                </div>
                                <div class="text-button name mt-4">Christin H.</div>
                                <div class="caption2 date text-secondary2 mt-1">
                                    August 13, 2024
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-one h-full">
                            <div class="testimonial-main bg-white p-8 rounded-2xl h-full">
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                </div>
                                <div class="heading6 title mt-4">Quality of Clothing!</div>
                                <div class="desc mt-2">
                                    "I can't get enough of Anvouge's high-quality clothing.
                                    It's comfortable, stylish, and always on-trend. The
                                    products are high-quality and the customer service is
                                    excellent."
                                </div>
                                <div class="text-button name mt-4">Emily G.</div>
                                <div class="caption2 date text-secondary2 mt-1">
                                    August 13, 2024
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-one h-full">
                            <div class="testimonial-main bg-white p-8 rounded-2xl h-full">
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                    <i class="ph-fill ph-star text-yellow"></i>
                                </div>
                                <div class="heading6 title mt-4">Customer Service!</div>
                                <div class="desc mt-2">
                                    "I love this shop! The products are always top-quality,
                                    and the staff is incredibly friendly and helpful. They go
                                    out of their way to make sure that I'm satisfied my
                                    purchase."
                                </div>
                                <div class="text-button name mt-4">Carolina C.</div>
                                <div class="caption2 date text-secondary2 mt-1">
                                    August 13, 2024
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>

<div class="instagram-block md:pt-20 pt-10">
    <div class="container">
        <div class="heading">
            <div class="heading3 text-center">Sport Zone On Instagram</div>
            <div class="text-center mt-3">Chủ Đề Thể Thao</div>
        </div>
        <div class="list-instagram md:mt-10 mt-6">
            <div class="swiper swiper-list-instagram">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/" target="_blank"
                            class="item relative block rounded-[32px] overflow-hidden">
                            <img src="./assets/images/instagram/0.png" alt="0"
                                class="h-full w-full duration-500 relative" />
                            <div
                                class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                <div class="icon-instagram text-2xl text-black"></div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/" target="_blank"
                            class="item relative block rounded-[32px] overflow-hidden">
                            <img src="./assets/images/instagram/1.png" alt="1"
                                class="h-full w-full duration-500 relative" />
                            <div
                                class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                <div class="icon-instagram text-2xl text-black"></div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/" target="_blank"
                            class="item relative block rounded-[32px] overflow-hidden">
                            <img src="./assets/images/instagram/2.png" alt="2"
                                class="h-full w-full duration-500 relative" />
                            <div
                                class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                <div class="icon-instagram text-2xl text-black"></div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/" target="_blank"
                            class="item relative block rounded-[32px] overflow-hidden">
                            <img src="./assets/images/instagram/3.png" alt="3"
                                class="h-full w-full duration-500 relative" />
                            <div
                                class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                <div class="icon-instagram text-2xl text-black"></div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/" target="_blank"
                            class="item relative block rounded-[32px] overflow-hidden">
                            <img src="./assets/images/instagram/4.png" alt="4"
                                class="h-full w-full duration-500 relative" />
                            <div
                                class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                <div class="icon-instagram text-2xl text-black"></div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="https://www.instagram.com/" target="_blank"
                            class="item relative block rounded-[32px] overflow-hidden">
                            <img src="./assets/images/instagram/5.png" alt="5"
                                class="h-full w-full duration-500 relative" />
                            <div
                                class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                <div class="icon-instagram text-2xl text-black"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="brand-block md:py-[60px] py-[32px]">
    <div class="container">
        <div class="list-brand">
            <div class="swiper swiper-list-brand">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-item relative flex items-center justify-center h-[36px]">
                            <img src="./assets/images/brand/1.png" alt="1"
                                class="h-full w-auto duration-500 relative object-cover" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item relative flex items-center justify-center h-[36px]">
                            <img src="./assets/images/brand/2.png" alt="2"
                                class="h-full w-auto duration-500 relative object-cover" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item relative flex items-center justify-center h-[36px]">
                            <img src="./assets/images/brand/3.png" alt="3"
                                class="h-full w-auto duration-500 relative object-cover" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item relative flex items-center justify-center h-[36px]">
                            <img src="./assets/images/brand/4.png" alt="4"
                                class="h-full w-auto duration-500 relative object-cover" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item relative flex items-center justify-center h-[36px]">
                            <img src="./assets/images/brand/5.png" alt="5"
                                class="h-full w-auto duration-500 relative object-cover" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item relative flex items-center justify-center h-[36px]">
                            <img src="./assets/images/brand/6.png" alt="6"
                                class="h-full w-auto duration-500 relative object-cover" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item relative flex items-center justify-center h-[36px]">
                            <img src="./assets/images/brand/7.png" alt="7"
                                class="h-full w-auto duration-500 relative object-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- foooter -->

<a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

<!-- Modal -->
<div class="modal-newsletter">
    <div class="container h-full flex items-center justify-center w-full">
        <div class="modal-newsletter-main">
            <div class="main-content flex rounded-[20px] overflow-hidden w-full">
                <div
                    class="left lg:w-1/2 sm:w-2/5 max-sm:hidden bg-green flex flex-col items-center justify-center gap-5 py-14">
                    <div class="text-xs font-semibold uppercase text-center">
                        Ưu Đãi Đặc Biệt
                    </div>
                    <div
                        class="lg:text-[70px] text-4xl lg:leading-[78px] leading-[42px] font-bold uppercase text-center">
                        NGÀY <br /> THỨ SÁU
                    </div>
                    <div class="text-button-uppercase text-center">
                        KHÁCH HÀNG MỚI TIẾT KIỆM<span class="text-red">30%</span> <br>VỚI MÃ
                        GIẢM GIÁ
                    </div>
                    <div class="text-button-uppercase text-red bg-white py-2 px-4 rounded-lg">
                        GET20off
                    </div>
                    <div class="button-main w-fit bg-black text-white hover:bg-white uppercase">
                        COPY NGAY
                    </div>
                </div>
                <div class="right lg:w-1/2 sm:w-3/5 w-full bg-white sm:pt-10 sm:pl-10 max-sm:p-6 relative">
                    <div
                        class="close-newsletter-btn w-10 h-10 flex items-center justify-center border border-line rounded-full absolute right-5 top-5 cursor-pointer">
                        <i class="ph-bold ph-x text-xl"></i>
                    </div>
                    <div class="heading5 pb-5">CÓ THỂ BẠN CŨNG THÍCH</div>
                    <div class="list overflow-x-auto sm:pr-6">
                        <div class="product-item item pb-5 flex items-center justify-between gap-3 border-b border-line"
                            data-item="1">
                            <div class="infor flex items-center gap-5">
                                <div class="bg-img">
                                    <img src="./assets/images/product/fashion/1-2.png" alt="img"
                                        class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                </div>
                                <div class="">
                                    <div class="name text-button">Faux-leather trousers</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="product-price text-title">$15.00</div>
                                        <div class="product-origin-price text-title text-secondary2">
                                            <del>$25.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="quick-view-btn button-main sm:py-3 py-2 sm:px-5 px-4 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                Xem Chi Tiết
                            </div>
                        </div>
                        <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line"
                            data-item="2">
                            <div class="infor flex items-center gap-5">
                                <div class="bg-img">
                                    <img src="./assets/images/product/fashion/2-2.png" alt="img"
                                        class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                </div>
                                <div class="">
                                    <div class="name text-button">Faux-leather trousers</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="product-price text-title">$15.00</div>
                                        <div class="product-origin-price text-title text-secondary2">
                                            <del>$25.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="quick-view-btn button-main sm:py-3 py-2 sm:px-5 px-4 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                Xem Chi Tiết
                            </div>
                        </div>
                        <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line"
                            data-item="3">
                            <div class="infor flex items-center gap-5">
                                <div class="bg-img">
                                    <img src="./assets/images/product/fashion/3-3.png" alt="img"
                                        class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                </div>
                                <div class="">
                                    <div class="name text-button">Faux-leather trousers</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="product-price text-title">$15.00</div>
                                        <div class="product-origin-price text-title text-secondary2">
                                            <del>$25.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="quick-view-btn button-main sm:py-3 py-2 sm:px-5 px-4 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                Xem Chi Tiết
                            </div>
                        </div>
                        <div class="product-item item py-5 flex items-center justify-between gap-3" data-item="4">
                            <div class="infor flex items-center gap-5">
                                <div class="bg-img">
                                    <img src="./assets/images/product/fashion/4-2.png" alt="img"
                                        class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                </div>
                                <div class="">
                                    <div class="name text-button">Faux-leather trousers</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="product-price text-title">$15.00</div>
                                        <div class="product-origin-price text-title text-secondary2">
                                            <del>$25.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="quick-view-btn button-main sm:py-3 py-2 sm:px-5 px-4 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                Xem Chi Tiết
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-search-block">
    <div class="modal-search-main md:p-10 p-6 rounded-[32px]">
        <div class="form-search relative w-full">
            <i class="ph ph-magnifying-glass absolute heading5 right-6 top-1/2 -translate-y-1/2 cursor-pointer"></i>
            <input type="text" placeholder="Nhập Tên Sản Phẩm"
                class="text-button-lg h-14 rounded-2xl border border-line w-full pl-6 pr-12" />
        </div>
        <div class="keyword mt-8">
            <div class="heading5">Từ Khóa Đặc Sắc Hôm Nay</div>
            <div class="list-keyword flex items-center flex-wrap gap-3 mt-4">
                <button
                    class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">
                    Dress
                </button>
                <button
                    class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">
                    T-shirt
                </button>
                <button
                    class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">
                    Underwear
                </button>
                <button
                    class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">
                    Top
                </button>
            </div>
        </div>
        <div class="list-recent mt-8">
            <div class="heading6">Sản Phẩm Đã Xem Gần Đây</div>
            <div
                class="list-product pb-5 hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 mt-4">
                <div class="product-item grid-type" data-item="14">
                    <div class="product-main cursor-pointer block">
                        <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                            <div
                                class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                New
                            </div>
                            <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                <div
                                    class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        Thêm Vào Yêu Thích
                                    </div>
                                    <i class="ph ph-heart text-lg"></i>
                                </div>
                                <div
                                    class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        So Sánh Sản Phẩm
                                    </div>
                                    <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                    <i class="ph ph-check-circle text-lg checked-icon"></i>
                                </div>
                            </div>
                            <div class="product-img w-full h-full aspect-[3/4]">
                                <img class="w-full h-full object-cover duration-700"
                                    src="./assets/images/product/fashion/14-1.png" alt="img" />
                                <img class="w-full h-full object-cover duration-700"
                                    src="./assets/images/product/fashion/14-2.png" alt="img" />
                            </div>
                            <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                <div
                                    class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                    Xem Chi Tiết
                                </div>
                                <div
                                    class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                    Thêm Vào Giỏ
                                </div>
                            </div>
                        </div>
                        <div class="product-infor mt-4 lg:mb-7">
                            <div class="product-sold sm:pb-4 pb-2">
                                <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                    <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                </div>
                                <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
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
                                Faux-leather trousers
                            </div>
                            <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                <div class="color-item bg-black w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Black
                                    </div>
                                </div>
                                <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Green
                                    </div>
                                </div>
                                <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Red
                                    </div>
                                </div>
                            </div>

                            <div
                                class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                <div class="product-price text-title">$28.00</div>
                                <div class="product-origin-price caption1 text-secondary2">
                                    <del>$36.00</del>
                                </div>
                                <div
                                    class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                    -20%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item grid-type" data-item="13">
                    <div class="product-main cursor-pointer block">
                        <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                            <div
                                class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                New
                            </div>
                            <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                <div
                                    class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        Thêm Vào Yêu Thích
                                    </div>
                                    <i class="ph ph-heart text-lg"></i>
                                </div>
                                <div
                                    class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        So Sánh Sản Phẩm
                                    </div>
                                    <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                    <i class="ph ph-check-circle text-lg checked-icon"></i>
                                </div>
                            </div>
                            <div class="product-img w-full h-full aspect-[3/4]">
                                <img class="w-full h-full object-cover duration-700"
                                    src="./assets/images/product/fashion/13-1.png" alt="img" />
                                <img class="w-full h-full object-cover duration-700"
                                    src="./assets/images/product/fashion/13-2.png" alt="img" />
                            </div>
                            <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                <div
                                    class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                    Xem Chi Tiết
                                </div>
                                <div
                                    class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                    Thêm Vào Giỏ
                                </div>
                            </div>
                        </div>
                        <div class="product-infor mt-4 lg:mb-7">
                            <div class="product-sold sm:pb-4 pb-2">
                                <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                    <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                </div>
                                <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
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
                                Faux-leather trousers
                            </div>
                            <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                <div class="color-item bg-black w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Black
                                    </div>
                                </div>
                                <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Green
                                    </div>
                                </div>
                                <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Red
                                    </div>
                                </div>
                            </div>

                            <div
                                class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                <div class="product-price text-title">$35.00</div>
                                <div class="product-origin-price caption1 text-secondary2">
                                    <del>$45.00</del>
                                </div>
                                <div
                                    class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                    -20%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item grid-type" data-item="12">
                    <div class="product-main cursor-pointer block">
                        <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                            <div
                                class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                New
                            </div>
                            <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                <div
                                    class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        Thêm Vào Yêu Thích
                                    </div>
                                    <i class="ph ph-heart text-lg"></i>
                                </div>
                                <div
                                    class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        So Sánh Sản Phẩm
                                    </div>
                                    <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                    <i class="ph ph-check-circle text-lg checked-icon"></i>
                                </div>
                            </div>
                            <div class="product-img w-full h-full aspect-[3/4]">
                                <img class="w-full h-full object-cover duration-700"
                                    src="./assets/images/product/fashion/12-1.png" alt="img" />
                                <img class="w-full h-full object-cover duration-700"
                                    src="./assets/images/product/fashion/12-2.png" alt="img" />
                            </div>
                            <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                <div
                                    class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                    Xem Chi Tiết
                                </div>
                                <div
                                    class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                    Thêm Vào Giỏ
                                </div>
                            </div>
                        </div>
                        <div class="product-infor mt-4 lg:mb-7">
                            <div class="product-sold sm:pb-4 pb-2">
                                <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                    <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                </div>
                                <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
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
                                Off-the-Shoulder Blouse
                            </div>
                            <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Red
                                    </div>
                                </div>
                                <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        yellow
                                    </div>
                                </div>
                                <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        green
                                    </div>
                                </div>
                            </div>

                            <div
                                class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                <div class="product-price text-title">$24.00</div>
                                <div class="product-origin-price caption1 text-secondary2">
                                    <del>$32.00</del>
                                </div>
                                <div
                                    class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                    -20%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-item grid-type" data-item="11">
                    <div class="product-main cursor-pointer block">
                        <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                            <div
                                class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                New
                            </div>
                            <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                <div
                                    class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        Thêm Vào Yêu Thích
                                    </div>
                                    <i class="ph ph-heart text-lg"></i>
                                </div>
                                <div
                                    class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        So Sánh Sản Phẩm
                                    </div>
                                    <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                    <i class="ph ph-check-circle text-lg checked-icon"></i>
                                </div>
                            </div>
                            <div class="product-img w-full h-full aspect-[3/4]">
                                <img class="w-full h-full object-cover duration-700"
                                    src="./assets/images/product/fashion/11-1.png" alt="img" />
                                <img class="w-full h-full object-cover duration-700"
                                    src="./assets/images/product/fashion/11-2.png" alt="img" />
                            </div>
                            <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                <div
                                    class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                    Xem Chi Tiết
                                </div>
                                <div
                                    class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                    Thêm Vào Giỏ
                                </div>
                            </div>
                        </div>
                        <div class="product-infor mt-4 lg:mb-7">
                            <div class="product-sold sm:pb-4 pb-2">
                                <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                    <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                </div>
                                <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
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
                                Off-the-Shoulder Blouse
                            </div>
                            <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        Red
                                    </div>
                                </div>
                                <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        yellow
                                    </div>
                                </div>
                                <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        green
                                    </div>
                                </div>
                            </div>

                            <div
                                class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                <div class="product-price text-title">$32.00</div>
                                <div class="product-origin-price caption1 text-secondary2">
                                    <del>$40.00</del>
                                </div>
                                <div
                                    class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                    -20%
                                </div>
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
            <div class="heading5">Danh Sách Yêu Thích</div>
            <div
                class="close-btn absolute right-6 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                <i class="ph ph-x text-sm"></i>
            </div>
        </div>
        <div class="list-product px-6"></div>
        <div class="footer-modal p-6 border-t bg-white border-line absolute bottom-0 left-0 w-full text-center">
            <a href="wishlist.html" class="button-main w-full text-center uppercase">
                Tất Cả Danh Sách Yêu Thích</a>
            <div class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">
                Tiếp Tục Mua Sắm
            </div>
        </div>
    </div>
</div>

<div class="modal-cart-block">
    <div class="modal-cart-main flex">
        <div class="left w-1/2 border-r border-line py-6 max-md:hidden">
            <div class="heading5 px-6 pb-3">Có Thể Bạn Cũng Thích</div>
            <div class="list px-6">
                <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line"
                    data-item="1">
                    <div class="infor flex items-center gap-5">
                        <div class="bg-img">
                            <img src="./assets/images/product/fashion/1-2.png" alt="img"
                                class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                        </div>
                        <div class="">
                            <div class="name text-button">Faux-leather trousers</div>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="product-price text-title">$15.00</div>
                                <div class="product-origin-price text-title text-secondary2">
                                    <del>$25.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                        Xem Chi Tiết
                    </div>
                </div>
                <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line"
                    data-item="2">
                    <div class="infor flex items-center gap-5">
                        <div class="bg-img">
                            <img src="./assets/images/product/fashion/2-2.png" alt="img"
                                class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                        </div>
                        <div class="">
                            <div class="name text-button">Faux-leather trousers</div>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="product-price text-title">$15.00</div>
                                <div class="product-origin-price text-title text-secondary2">
                                    <del>$25.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                        Xem Chi Tiết
                    </div>
                </div>
                <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line"
                    data-item="3">
                    <div class="infor flex items-center gap-5">
                        <div class="bg-img">
                            <img src="./assets/images/product/fashion/3-3.png" alt="img"
                                class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                        </div>
                        <div class="">
                            <div class="name text-button">Faux-leather trousers</div>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="product-price text-title">$15.00</div>
                                <div class="product-origin-price text-title text-secondary2">
                                    <del>$25.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                        Xem Chi Tiết
                    </div>
                </div>
                <div class="product-item item py-5 flex items-center justify-between gap-3" data-item="4">
                    <div class="infor flex items-center gap-5">
                        <div class="bg-img">
                            <img src="./assets/images/product/fashion/4-2.png" alt="img"
                                class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                        </div>
                        <div class="">
                            <div class="name text-button">Faux-leather trousers</div>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="product-price text-title">$15.00</div>
                                <div class="product-origin-price text-title text-secondary2">
                                    <del>$25.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                        Xem Chi Tiết
                    </div>
                </div>
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
                        <span class="text-red caption1 font-semibold"><span class="minute">04</span>:<span
                                class="second">59</span></span>
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
                <div class="flex items-center justify-center lg:gap-14 gap-8 px-6 py-4 border-b border-line">
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
                        <a href="cart.html"
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
                            <label for="select-country" class="caption1 text-secondary">Country/region</label>
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
                            <label for="select-code" class="caption1 text-secondary">Postal/Zip Code</label>
                            <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-code" type="text"
                                placeholder="Postal/Zip Code" />
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
                            <label for="select-discount" class="caption1 text-secondary">Enter Code</label>
                            <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-discount" type="text"
                                placeholder="Discount code" />
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

<div class="modal-sizeguide-block">
    <div class="modal-sizeguide-main md:p-10 p-6 rounded-[32px]">
        <div
            class="close-btn absolute right-5 top-5 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
            <i class="ph ph-x text-sm"></i>
        </div>
        <div class="heading3">Size guide</div>
        <div class="md:mt-8 mt-6 progress">
            <div class="flex md:items-center gap-10 justify-between max-md:flex-col gap-y-5 max-md:pr-3">
                <div class="flex items-center flex-shrink-0 gap-8">
                    <span class="flex-shrink-0 md:w-14">Height</span>
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
                    <span class="flex-shrink-0 md:w-14">Weight</span>
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
        <div class="heading6 mt-8">suggests for you:</div>
        <div class="list-size-block flex items-center gap-2 flex-wrap mt-3">
            <div
                class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                XS
            </div>
            <div
                class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                S
            </div>
            <div
                class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                M
            </div>
            <div
                class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                L
            </div>
            <div
                class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                XL
            </div>
            <div
                class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                2XL
            </div>
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
                <div class="heading5 flex-shrink-0 max-md:w-full">
                    Compare <br class="max-md:hidden" />Products
                </div>
                <div class="list-product flex items-center w-full gap-4"></div>
                <div class="block-button flex flex-col gap-4 flex-shrink-0">
                    <a href="compare.html" class="button-main whitespace-nowrap">
                        So Sánh Sản Phẩm</a>
                    <div class="button-main clear whitespace-nowrap border border-black bg-white text-black">
                        Clear All Products
                    </div>
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
                        <img src="./assets/images/product/fashion/3-1.png" alt="item"
                            class="w-full h-full object-cover" />
                    </div>
                    <div
                        class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                        <img src="./assets/images/product/fashion/3-2.png" alt="item"
                            class="w-full h-full object-cover" />
                    </div>
                    <div
                        class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                        <img src="./assets/images/product/fashion/3-3.png" alt="item"
                            class="w-full h-full object-cover" />
                    </div>
                    <div
                        class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                        <img src="./assets/images/product/fashion/3-4.png" alt="item"
                            class="w-full h-full object-cover" />
                    </div>
                </div>
            </div>
            <div class="right w-full px-6">
                <div class="heading pb-6 flex items-center justify-between relative">
                    <div class="heading5">Xem Chi Tiết</div>
                    <div
                        class="close-btn absolute right-0 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                        <i class="ph ph-x text-sm"></i>
                    </div>
                </div>
                <div class="product-infor">
                    <div class="flex justify-between">
                        <div>
                            <div class="category caption2 text-secondary font-semibold uppercase">
                                fashion
                            </div>
                            <div class="name heading4 mt-1">Off-the-Shoulder Blouse</div>
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
                        <span class="caption1 text-secondary">(1.234 reviews)</span>
                    </div>
                    <div class="flex items-center gap-1 gap-y-3 flex-wrap mt-3">
                        <div class="text-xs font-semibold bg-black text-white uppercase py-1 px-3 rounded-full">
                            best seller
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="ph-fill ph-lightning text-red text-xl"></i>
                            <div class="caption1 text-secondary">
                                Selling fast! 22 people have this in their carts.
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 flex-wrap mt-5 pb-6 border-b border-line">
                        <div class="product-price heading5">$20.00</div>
                        <div class="w-px h-4 bg-line"></div>
                        <div class="product-origin-price font-normal text-secondary2">
                            <del>$32.00</del>
                        </div>
                        <div class="product-sale caption2 font-semibold bg-green px-3 py-0.5 inline-block rounded-full">
                            -19%
                        </div>
                        <div class="desc text-secondary mt-3">
                            Keep your clothes organized, yet elegant with storage cabinets
                            by Onita Patio Furniture. Traditionally designed, they are
                            perfect to be used in the any place where you need to store.
                        </div>
                    </div>
                    <div class="list-action mt-6">
                        <div class="choose-color">
                            <div class="text-title">
                                Colors: <span class="text-title color"></span>
                            </div>
                            <div class="list-color flex items-center gap-2 flex-wrap mt-3">
                                <div class="color-item w-12 h-12 rounded-xl duration-300 relative active">
                                    <img src="./assets/images/product/color/purple.png" alt="color"
                                        class="rounded-xl" />
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        blue
                                    </div>
                                </div>
                                <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                    <img src="./assets/images/product/color/red.png" alt="color" class="rounded-xl" />
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        red
                                    </div>
                                </div>
                                <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                    <img src="./assets/images/product/color/black.png" alt="color" class="rounded-xl" />
                                    <div
                                        class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        black
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="choose-size mt-5">
                            <div class="heading flex items-center justify-between">
                                <div class="text-title">
                                    Size: <span class="text-title size"></span>
                                </div>
                                <div class="caption1 size-guide text-red underline">
                                    Size Guide
                                </div>
                            </div>
                            <div class="list-size flex items-center gap-2 flex-wrap mt-3">
                                <div
                                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                                    S
                                </div>
                                <div
                                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line active">
                                    M
                                </div>
                                <div
                                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                                    L
                                </div>
                                <div
                                    class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                                    XL
                                </div>
                            </div>
                        </div>
                        <div class="text-title mt-5">Quantity:</div>
                        <div class="choose-quantity flex items-center flex-wrap lg:justify-between gap-5 mt-3">
                            <div
                                class="quantity-block md:p-3 max-md:py-1.5 max-md:px-3 flex items-center justify-between rounded-lg border border-line sm:w-[180px] w-[120px] flex-shrink-0">
                                <i class="ph-bold ph-minus cursor-pointer body1"></i>
                                <div class="quantity body1 font-semibold">1</div>
                                <i class="ph-bold ph-plus cursor-pointer body1"></i>
                            </div>
                            <div
                                class="add-cart-btn button-main w-full text-center bg-white text-black border border-black">
                                Thêm Vào Giỏ
                            </div>
                        </div>
                        <div class="button-block mt-5">
                            <a href="checkout.html" class="button-main w-full text-center">Buy It Now</a>
                        </div>
                    </div>
                    <div class="flex items-center flex-wrap lg:gap-20 gap-8 gap-y-4 mt-5">
                        <div class="compare flex items-center gap-3 cursor-pointer">
                            <div
                                class="compare-btn md:w-12 md:h-12 w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-xl duration-300 hover:bg-black hover:text-white">
                                <i class="ph-fill ph-arrows-counter-clockwise cursor-pointer heading6"></i>
                            </div>
                            <span>Compare</span>
                        </div>
                        <div class="share flex items-center gap-3 cursor-pointer">
                            <div
                                class="share-btn md:w-12 md:h-12 w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-xl duration-300 hover:bg-black hover:text-white">
                                <i class="ph-fill ph-share-network cursor-pointer heading6"></i>
                            </div>
                            <span>Share Products</span>
                        </div>
                    </div>
                    <div class="more-infor mt-6">
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-arrow-clockwise cursor-pointer body1"></i>
                                <div class="text-title">Delivery & Return</div>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-question cursor-pointer body1"></i>
                                <div class="text-title">Ask A Question</div>
                            </div>
                        </div>
                        <div class="flex items-center flex-wrap gap-1 mt-3">
                            <i class="ph ph-timer cursor-pointer body1"></i>
                            <span class="text-title">Estimated Delivery:</span>
                            <span class="text-secondary">14 January - 18 January</span>
                        </div>
                        <div class="flex items-center flex-wrap gap-1 mt-3">
                            <i class="ph ph-eye cursor-pointer body1"></i>
                            <span class="text-title">38</span>
                            <span class="text-secondary">people viewing this product right now!</span>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">SKU:</div>
                            <div class="text-secondary">53453412</div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Categories:</div>
                            <div class="list-category text-secondary">fashion, women</div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Tag:</div>
                            <div class="list-tag text-secondary">dress</div>
                        </div>
                    </div>
                    <div class="list-payment mt-7">
                        <div
                            class="main-content lg:pt-8 pt-6 lg:pb-6 pb-4 sm:px-4 px-3 border border-line rounded-xl relative max-md:w-2/3 max-sm:w-full">
                            <div
                                class="heading6 px-5 bg-white absolute -top-[14px] left-1/2 -translate-x-1/2 whitespace-nowrap">
                                Guranteed safe checkout
                            </div>
                            <div class="list grid grid-cols-6">
                                <div class="item flex items-center justify-center lg:px-3 px-1">
                                    <img src="./assets/images/payment/Frame-0.png" alt="payment" class="w-full" />
                                </div>
                                <div class="item flex items-center justify-center lg:px-3 px-1">
                                    <img src="./assets/images/payment/Frame-1.png" alt="payment" class="w-full" />
                                </div>
                                <div class="item flex items-center justify-center lg:px-3 px-1">
                                    <img src="./assets/images/payment/Frame-2.png" alt="payment" class="w-full" />
                                </div>
                                <div class="item flex items-center justify-center lg:px-3 px-1">
                                    <img src="./assets/images/payment/Frame-3.png" alt="payment" class="w-full" />
                                </div>
                                <div class="item flex items-center justify-center lg:px-3 px-1">
                                    <img src="./assets/images/payment/Frame-4.png" alt="payment" class="w-full" />
                                </div>
                                <div class="item flex items-center justify-center lg:px-3 px-1">
                                    <img src="./assets/images/payment/Frame-5.png" alt="payment" class="w-full" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Modal -->
<?php require_once 'layout/footer.php'; ?>