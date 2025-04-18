<?php
require_once 'layout/header.php';
require_once 'layout/menu.php';
?>

<div class="breadcrumb-block style-img">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <?php foreach ($listDanhMuc as $danhMuc) : ?>
                        <?php if ($danhMuc['id'] == $_GET['id']): ?>
                            <div class="heading1 text-center"><?= $danhMuc['ten_danh_muc'] ?></div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href="#">Trang chủ</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Danh mục</div>
                    </div>
                </div>
                <div class="filter-type menu-tab flex flex-wrap items-center justify-center gap-y-5 gap-8 lg:mt-[70px] mt-12 overflow-hidden">
                    <?php foreach ($listDanhMuc as $danhMuc) : ?>

                        <a href="<?= BASE_URL . '?act=danh-muc&id=' . $danhMuc['id'] ?>">
                            <div class="item tab-item text-button-uppercase cursor-pointer has-line-before line-2px" data-item="t-shirt"><?= $danhMuc['ten_danh_muc'] ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="bg-img absolute top-2 -right-6 max-lg:bottom-0 max-lg:top-auto w-1/3 max-lg:w-[26%] z-[0] max-sm:w-[45%]">
                <img src="assets/images/slider/bg1-1.png" alt="img" class="" />
            </div>
        </div>
    </div>
</div>


<div class="shop-product">
    <div class="container">
        <div class="list-product-block style-grid relative">
            <div class="filter-heading flex items-center justify-between gap-5 flex-wrap">
                <div class="left flex has-line items-center flex-wrap gap-5">
                    <div class="filter-sidebar-btn flex items-center gap-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4 21V14" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M4 10V3" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 21V12" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 8V3" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20 21V16" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20 12V3" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1 14H7" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9 8H15" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M17 16H23" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>Filters</span>
                    </div>
                    <div class="choose-layout menu-tab flex items-center gap-2">
                        <div class="item tab-item three-col p-2 border border-line rounded flex items-center justify-center cursor-pointer">
                            <div class="flex items-center gap-0.5">
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                            </div>
                        </div>
                        <div class="item tab-item four-col p-2 border border-line rounded flex items-center justify-center cursor-pointer active">
                            <div class="flex items-center gap-0.5">
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                            </div>
                        </div>
                        <div class="item tab-item five-col p-2 border border-line rounded flex items-center justify-center cursor-pointer">
                            <div class="flex items-center gap-0.5">
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                            </div>
                        </div>
                    </div>
                    <div class="check-sale flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="filterSale" id="filter-sale" class="border-line" />
                        <label for="filter-sale" class="cation1 cursor-pointer">Show only products on sale</label>
                    </div>
                </div>
                <div class="sort-product right flex items-center gap-3">
                    <label for="select-filter" class="caption1 capitalize">Sort by</label>
                    <div class="select-block relative">
                        <select id="select-filter" name="select-filter" class="caption1 py-2 pl-3 md:pr-20 pr-10 rounded-lg border border-line">
                            <option value="Sorting">Sorting</option>
                            <option value="soldQuantityHighToLow">Best Selling</option>
                            <option value="discountHighToLow">Best Discount</option>
                            <option value="priceHighToLow">Price High To Low</option>
                            <option value="priceLowToHigh">Price Low To High</option>
                        </select>
                        <i class="ph ph-caret-down absolute top-1/2 -translate-y-1/2 md:right-4 right-2"></i>
                    </div>
                </div>
            </div>

            <div class="sidebar style-dropdown bg-white grid md:grid-cols-4 grid-cols-2 md:gap-[30px] gap-6">
                <div class="filter-type-block">
                    <div class="heading6">Products Type</div>
                    <div class="list-type filter-type menu-tab mt-4">
                        <div class="item tab-item flex items-center justify-between cursor-pointer" data-item="t-shirt">
                            <div class="type-name text-secondary has-line-before hover:text-black capitalize">t-shirt</div>
                            <div class="text-secondary2 number">6</div>
                        </div>
                        <div class="item tab-item flex items-center justify-between cursor-pointer" data-item="dress">
                            <div class="type-name text-secondary has-line-before hover:text-black capitalize">dress</div>
                            <div class="text-secondary2 number">6</div>
                        </div>
                        <div class="item tab-item flex items-center justify-between cursor-pointer" data-item="top">
                            <div class="type-name text-secondary has-line-before hover:text-black capitalize">top</div>
                            <div class="text-secondary2 number">6</div>
                        </div>
                        <div class="item tab-item flex items-center justify-between cursor-pointer" data-item="swimwear">
                            <div class="type-name text-secondary has-line-before hover:text-black capitalize">swimwear</div>
                            <div class="text-secondary2 number">6</div>
                        </div>
                        <div class="item tab-item flex items-center justify-between cursor-pointer" data-item="shirt">
                            <div class="type-name text-secondary has-line-before hover:text-black capitalize">shirt</div>
                            <div class="text-secondary2 number">6</div>
                        </div>
                        <div class="item tab-item flex items-center justify-between cursor-pointer" data-item="underwear">
                            <div class="type-name text-secondary has-line-before hover:text-black capitalize">underwear</div>
                            <div class="text-secondary2 number">6</div>
                        </div>
                        <div class="item tab-item flex items-center justify-between cursor-pointer" data-item="sets">
                            <div class="type-name text-secondary has-line-before hover:text-black capitalize">sets</div>
                            <div class="text-secondary2 number">6</div>
                        </div>
                        <div class="item tab-item flex items-center justify-between cursor-pointer" data-item="accessories">
                            <div class="type-name text-secondary has-line-before hover:text-black capitalize">accessories</div>
                            <div class="text-secondary2 number">6</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="filter-size">
                        <div class="heading6">Size</div>
                        <div class="list-size flex items-center flex-wrap gap-3 gap-y-4 mt-4">
                            <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="XS">XS</div>
                            <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="S">S</div>
                            <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="M">M</div>
                            <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="L">L</div>
                            <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="XL">XL</div>
                            <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="2XL">2XL</div>
                            <div class="size-item text-button px-4 py-2 flex items-center justify-center rounded-full border border-line" data-item="freesize">Freesize</div>
                        </div>
                    </div>
                    <div class="filter-price mt-8">
                        <div class="heading6">Price Range</div>
                        <div class="tow-bar-block mt-5">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input class="range-min" type="range" min="0" max="300" value="0" />
                            <input class="range-max" type="range" min="0" max="300" value="300" />
                        </div>
                        <div class="price-block flex items-center justify-between flex-wrap mt-4">
                            <div class="min flex items-center gap-1">
                                <div>Min price:</div>
                                <div class="min-price">$0</div>
                            </div>
                            <div class="min flex items-center gap-1">
                                <div>Max price:</div>
                                <div class="max-price">$300</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-color">
                    <div class="heading6">colors</div>
                    <div class="list-color flex items-center flex-wrap gap-3 gap-y-4 mt-4">
                        <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="pink">
                            <div class="color bg-[#F4C5BF] w-5 h-5 rounded-full"></div>
                            <div class="caption1 capitalize">pink</div>
                        </div>
                        <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="red">
                            <div class="color bg-red w-5 h-5 rounded-full"></div>
                            <div class="caption1 capitalize">red</div>
                        </div>
                        <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="green">
                            <div class="color bg-green w-5 h-5 rounded-full"></div>
                            <div class="caption1 capitalize">green</div>
                        </div>
                        <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="yellow">
                            <div class="color bg-yellow w-5 h-5 rounded-full"></div>
                            <div class="caption1 capitalize">yellow</div>
                        </div>
                        <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="purple">
                            <div class="color bg-purple w-5 h-5 rounded-full"></div>
                            <div class="caption1 capitalize">purple</div>
                        </div>
                        <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="black">
                            <div class="color bg-black w-5 h-5 rounded-full"></div>
                            <div class="caption1 capitalize">black</div>
                        </div>
                        <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="white">
                            <div class="color bg-[#F6EFDD] w-5 h-5 rounded-full"></div>
                            <div class="caption1 capitalize">white</div>
                        </div>
                    </div>
                </div>
                <div class="filter-brand">
                    <div class="heading6">Brands</div>
                    <div class="list-brand mt-4">
                        <div class="brand-item flex items-center justify-between" data-item="adidas">
                            <div class="left flex items-center cursor-pointer">
                                <div class="block-input">
                                    <input type="checkbox" name="adidas" id="adidas" />
                                    <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                </div>
                                <label for="adidas" class="brand-name capitalize pl-2 cursor-pointer">adidas</label>
                            </div>
                            <div class="text-secondary2 number">12</div>
                        </div>
                        <div class="brand-item flex items-center justify-between" data-item="hermes">
                            <div class="left flex items-center cursor-pointer">
                                <div class="block-input">
                                    <input type="checkbox" name="hermes" id="hermes" />
                                    <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                </div>
                                <label for="hermes" class="brand-name capitalize pl-2 cursor-pointer">hermes</label>
                            </div>
                            <div class="text-secondary2 number">12</div>
                        </div>
                        <div class="brand-item flex items-center justify-between" data-item="zara">
                            <div class="left flex items-center cursor-pointer">
                                <div class="block-input">
                                    <input type="checkbox" name="zara" id="zara" />
                                    <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                </div>
                                <label for="zara" class="brand-name capitalize pl-2 cursor-pointer">zara</label>
                            </div>
                            <div class="text-secondary2 number">12</div>
                        </div>
                        <div class="brand-item flex items-center justify-between" data-item="nike">
                            <div class="left flex items-center cursor-pointer">
                                <div class="block-input">
                                    <input type="checkbox" name="nike" id="nike" />
                                    <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                </div>
                                <label for="nike" class="brand-name capitalize pl-2 cursor-pointer">nike</label>
                            </div>
                            <div class="text-secondary2 number">12</div>
                        </div>
                        <div class="brand-item flex items-center justify-between" data-item="gucci">
                            <div class="left flex items-center cursor-pointer">
                                <div class="block-input">
                                    <input type="checkbox" name="gucci" id="gucci" />
                                    <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                </div>
                                <label for="gucci" class="brand-name capitalize pl-2 cursor-pointer">gucci</label>
                            </div>
                            <div class="text-secondary2 number">12</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-filtered flex items-center gap-3 flex-wrap"></div>

            <div class="list-product hide-product-sold grid sm:grid-cols-3 grid-cols-2 sm:gap-[30px] gap-[20px] mt-7" data-item="12"></div>

            <div class="list-pagination w-full flex items-center justify-center gap-4 mt-10"></div>
        </div>
    </div>
</div>

<a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

<!-- Modal -->
<div class="modal-search-block">
    <div class="modal-search-main md:p-10 p-6 rounded-[32px]" style="padding-bottom: 500px;">
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
            </div>
        </div>
    </div>
</div>

<div class="modal-wishlist-block">
    <div class="modal-wishlist-main py-6">
        <div class="heading px-6 pb-3 flex items-center justify-between relative">
            <div class="heading5">Wishlist</div>
            <div class="close-btn absolute right-6 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                <i class="ph ph-x text-sm"></i>
            </div>
        </div>
        <div class="list-product px-6"></div>
        <div class="footer-modal p-6 border-t bg-white border-line absolute bottom-0 left-0 w-full text-center">
            <a href="wishlist.html" class="button-main w-full text-center uppercase"> View All Wish List</a>
            <div class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">Or continue shopping</div>
        </div>
    </div>
</div>

<div class="modal-cart-block">
    <div class="modal-cart-main flex">
        <div class="left w-1/2 border-r border-line py-6 max-md:hidden">
            <div class="heading5 px-6 pb-3">You May Also Like</div>
            <div class="list px-6">
                <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line" data-item="1">
                    <div class="infor flex items-center gap-5">
                        <div class="bg-img">
                            <img src="assets/images/product/fashion/1-2.png" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
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
                    <div class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">QUICK VIEW</div>
                </div>
                <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line" data-item="2">
                    <div class="infor flex items-center gap-5">
                        <div class="bg-img">
                            <img src="assets/images/product/fashion/2-2.png" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
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
                    <div class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">QUICK VIEW</div>
                </div>
                <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line" data-item="3">
                    <div class="infor flex items-center gap-5">
                        <div class="bg-img">
                            <img src="assets/images/product/fashion/3-3.png" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
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
                    <div class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">QUICK VIEW</div>
                </div>
                <div class="product-item item py-5 flex items-center justify-between gap-3" data-item="4">
                    <div class="infor flex items-center gap-5">
                        <div class="bg-img">
                            <img src="assets/images/product/fashion/4-2.png" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
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
                    <div class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">QUICK VIEW</div>
                </div>
            </div>
        </div>
        <div class="right cart-block md:w-1/2 w-full py-6 relative overflow-hidden">
            <div class="heading px-6 pb-3 flex items-center justify-between relative">
                <div class="heading5">Shopping Cart</div>
                <div class="close-btn absolute right-6 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                    <i class="ph ph-x text-sm"></i>
                </div>
            </div>
            <div class="time countdown-cart px-6">
                <div class="flex items-center gap-3 px-5 py-3 bg-green rounded-lg">
                    <p class="text-3xl">🔥</p>
                    <div class="caption1">
                        Your cart will expire in <span class="text-red caption1 font-semibold"><span class="minute">04</span>:<span class="second">59</span></span> minutes!<br />
                        Please checkout now before your items sell out!
                    </div>
                </div>
            </div>
            <div class="heading banner mt-3 px-6">
                <div class="text">
                    Buy <span class="text-button"> $<span class="more-price">150</span>.00 </span>
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
                        <div class="caption1">Note</div>
                    </div>
                    <div class="shipping-btn item flex items-center gap-3 cursor-pointer">
                        <i class="ph ph-truck text-xl"></i>
                        <div class="caption1">Shipping</div>
                    </div>
                    <div class="coupon-btn item flex items-center gap-3 cursor-pointer">
                        <i class="ph ph-tag text-xl"></i>
                        <div class="caption1">Coupon</div>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-6 px-6">
                    <div class="heading5">Subtotal</div>
                    <div class="heading5 total-cart">$0.00</div>
                </div>
                <div class="block-button text-center p-6">
                    <div class="flex items-center gap-4">
                        <a href="cart.html" class="button-main basis-1/2 bg-white border border-black text-black text-center uppercase"> View cart </a>
                        <a href="checkout.html" class="button-main basis-1/2 text-center uppercase"> Check Out </a>
                    </div>
                    <div class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">Or continue shopping</div>
                </div>
                <div class="tab-item note-block">
                    <div class="px-6 py-4 border-b border-line">
                        <div class="item flex items-center gap-3 cursor-pointer">
                            <i class="ph ph-note-pencil text-xl"></i>
                            <div class="caption1">Note</div>
                        </div>
                    </div>
                    <div class="form pt-4 px-6">
                        <textarea name="form-note" id="form-note" rows="4" placeholder="Add special instructions for your order..." class="caption1 py-3 px-4 bg-surface border-line rounded-md w-full"></textarea>
                    </div>
                    <div class="block-button text-center pt-4 px-6 pb-6">
                        <div class="button-main w-full text-center">Save</div>
                        <div class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">Cancel</div>
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
                                <select id="select-country" name="select-country" class="w-full py-3 pl-5 rounded-xl bg-white border border-line">
                                    <option value="Country/region">Country/region</option>
                                    <option value="France">France</option>
                                    <option value="Spain">Spain</option>
                                    <option value="UK">UK</option>
                                    <option value="USA">USA</option>
                                </select>
                                <i class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-5 right-2"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="select-state" class="caption1 text-secondary">State</label>
                            <div class="select-block relative mt-2">
                                <select id="select-state" name="select-state" class="w-full py-3 pl-5 rounded-xl bg-white border border-line">
                                    <option value="State">State</option>
                                    <option value="Paris">Paris</option>
                                    <option value="Madrid">Madrid</option>
                                    <option value="London">London</option>
                                    <option value="New York">New York</option>
                                </select>
                                <i class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-5 right-2"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="select-code" class="caption1 text-secondary">Postal/Zip Code</label>
                            <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-code" type="text" placeholder="Postal/Zip Code" />
                        </div>
                    </div>
                    <div class="block-button text-center pt-4 px-6 pb-6">
                        <div class="button-main w-full text-center">Calculator</div>
                        <div class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">Cancel</div>
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
                            <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-discount" type="text" placeholder="Discount code" />
                        </div>
                    </div>
                    <div class="block-button text-center pt-4 px-6 pb-6">
                        <div class="button-main w-full text-center">Apply</div>
                        <div class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">Cancel</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal-sizeguide-block">
    <div class="modal-sizeguide-main md:p-10 p-6 rounded-[32px]">
        <div class="close-btn absolute right-5 top-5 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
            <i class="ph ph-x text-sm"></i>
        </div>
        <div class="heading3">Size guide</div>
        <div class="md:mt-8 mt-6 progress">
            <div class="flex md:items-center gap-10 justify-between max-md:flex-col gap-y-5 max-md:pr-3">
                <div class="flex items-center flex-shrink-0 gap-8">
                    <span class="flex-shrink-0 md:w-14">Height</span>
                    <div class="flex items-center justify-center w-20 gap-1 py-2 border border-line rounded-lg flex-shrink-0">
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
                    <div class="flex items-center justify-center w-20 gap-1 py-2 border border-line rounded-lg flex-shrink-0">
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
            <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">XS</div>
            <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">S</div>
            <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">M</div>
            <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">L</div>
            <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">XL</div>
            <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">2XL</div>
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
</div> -->
<div class="what-new-block filter-product-block">
    <div class="container">
        <div
            class="list-product four-product hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4">
            <!-- List four product -->
            <?php foreach ($listSanPham as $key => $sanPham) : ?>
                <div class=" pb-5 xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 mt-4">
                    <div class="product-item grid-type" data-item="11">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <?php
                                $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                $ngayHienTai = new DateTime();
                                $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                if ($tinhNgay->days <= 7) {
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
                                            src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="img" />
                                        <img class="w-full h-full object-cover duration-700"
                                            src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="img" />
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
                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                        <div class="product-price text-title">
                                            <?= formatPrice($sanPham['gia_khuyen_mai']) . 'VNĐ'; ?>
                                        </div>
                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>><?= formatPrice($sanPham['gia_san_pham']) . 'VNĐ'; ?></del>
                                        </div>
                                    <?php } else { ?>
                                        <div class="product-price text-title">
                                            <?= formatPrice($sanPham['gia_san_pham']) . 'VNĐ'; ?>
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


<?php require_once 'layout/footer.php'; ?>