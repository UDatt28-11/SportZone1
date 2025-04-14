<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<div>
    <div class="checkout-block md:py-20 py-10">
        <div class="container">
            <div class="content-main flex max-lg:flex-col-reverse gap-y-10 justify-between">
                <div class="left lg:w-1/2">
                    <div class="form-login-block mt-3">
                        <form class="p-5 border border-line rounded-lg">
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div class="email">
                                    <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="username" type="email" placeholder="Username or email" required />
                                </div>
                                <div class="pass">
                                    <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="password" type="password" placeholder="Password" required />
                                </div>
                            </div>
                            <div class="block-button mt-3">
                                <button class="button-main button-blue-hover">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="information mt-5">
                        <div class="heading5">Thông tin người nhận</div>
                        <div class="form-checkout mt-5">
                            <form>
                                <div class="grid sm:grid-cols-2 gap-4 gap-y-5 flex-wrap">
                                    <div class="">
                                        <input class="border-line px-4 py-3 w-full rounded-lg" id="Name" type="text" placeholder="Tên người nhận *" required />
                                    </div>
                                    <div class="">
                                        <input class="border-line px-4 py-3 w-full rounded-lg" id="email" type="email" placeholder="Email *" required />
                                    </div>
                                    <div class="">
                                        <input class="border-line px-4 py-3 w-full rounded-lg" id="phoneNumber" type="number" placeholder="Số điện thoại *" required />
                                    </div>
                                    <div class="">
                                        <input class="border-line px-4 py-3 w-full rounded-lg" id="city" type="text" placeholder="Địa chỉ *" required />
                                    </div>
                                    <div class="col-span-full">
                                        <textarea class="border border-line px-4 py-3 w-full rounded-lg" id="note" name="note" placeholder="Ghi chú..."></textarea>
                                    </div>
                                </div>
                                <div class="payment-block md:mt-10 mt-6">
                                    <div class="heading5">Chọn phương thức thanh toán:</div>
                                    <div class="list-payment mt-5">
                                        <div class="type bg-surface p-5 border border-line rounded-lg">
                                            <input class="cursor-pointer" type="radio" id="credit" name="payment" />
                                            <label class="text-button pl-2 cursor-pointer" for="credit">VN Pay</label>
                                            <div class="infor">
                                                <div class="text-on-surface-variant1 pt-4">
                                                    <div class="space-y-6 bg-gray-50 p-6 rounded-lg">
                                                        <!-- Tổng thanh toán -->
                                                        <div class="flex justify-between items-center border-b pb-4">
                                                            <span class="font-semibold text-gray-700">Tổng thanh toán:</span>
                                                            <span class="text-xl font-bold text-indigo-600">₫1.166.920</span>
                                                        </div>

                                                        <!-- Thông tin tài khoản -->
                                                        <div class="space-y-4">
                                                            <h3 class="font-semibold text-lg text-gray-800">Thông tin chuyển khoản</h3>
                                                            <div class="grid grid-cols-2 gap-4 text-sm">
                                                                <div class="text-gray-600">Số tài khoản định danh:</div>
                                                                <div class="font-medium"></div>
                                                                <div class="text-gray-600">Tên tài khoản:</div>
                                                                <div class="font-medium"></div>
                                                                <div class="text-gray-600">Ngân hàng:</div>
                                                                <div class="font-medium"></div>
                                                            </div>
                                                        </div>

                                                        <!-- Hướng dẫn -->
                                                        <div class="space-y-4">
                                                            <h3 class="font-semibold text-lg text-gray-800">Hướng dẫn thanh toán</h3>
                                                            <ol class="space-y-3 list-decimal list-inside text-gray-700">
                                                                <li class="pl-2">Mở ứng dụng/ web Chuyển khoản Ngân hàng (Internet Banking) của bạn để tiến hành chuyển tiền.</li>
                                                                <li class="pl-2">Nhập chính xác các thông tin chuyển khoản như đã cung cấp ở trên.</li>
                                                                <li class="pl-2">Tiến hành Chuyển khoản.</li>
                                                            </ol>
                                                        </div>

                                                        <!-- Thông báo -->
                                                        <div class="bg-blue-50 p-4 rounded-lg">
                                                            <p class="text-sm text-blue-700">
                                                                Sau khi thanh toán thành công, bạn sẽ nhận được Xác nhận đã thanh toán tại mục Thông báo > Cập nhật đơn hàng sau 2 phút, tối đa là 72 giờ.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="type bg-surface p-5 border border-line rounded-lg mt-5">
                                            <input class="cursor-pointer" type="radio" id="delivery" name="payment" />
                                            <label class="text-button pl-2 cursor-pointer" for="delivery">COD</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="block-button md:mt-10 mt-6">
                                    <button class="button-main w-full">Thanh toán</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="right lg:w-5/12">
                    <div class="checkout-block">
                        <div class="heading5 pb-3">Đơn hàng của bạn</div>
                        <div class="list-product-checkout"></div>
                        <div class="discount-block py-5 flex justify-between border-b border-line">
                            <div class="text-title">Giảm giá</div>
                            <div class="text-title">VNĐ</div>
                        </div>
                        <div class="ship-block py-5 flex justify-between border-b border-line">
                            <div class="text-title">Phí vận chuyển</div>
                            <div class="text-title"></div>
                        </div>
                        <div class="total-cart-block pt-5 flex justify-between">
                            <div class="heading5">Tổng</div>
                            <div class="heading5 total-cart">VNĐ</div>
                        </div>
                    </div>
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
                <input type="text" placeholder="Searching..." class="text-button-lg h-14 rounded-2xl border border-line w-full pl-6 pr-12" />
            </div>
            <div class="keyword mt-8">
                <div class="heading5">Feature keywords Today</div>
                <div class="list-keyword flex items-center flex-wrap gap-3 mt-4">
                    <button class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Dress</button>
                    <button class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">T-shirt</button>
                    <button class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Underwear</button>
                    <button class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Top</button>
                </div>
            </div>
            <div class="list-recent mt-8">
                <div class="heading6">Recently viewed products</div>
                <div class="list-product pb-5 hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 mt-4">
                    <div class="product-item grid-type" data-item="14">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
                                <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                    <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Add To Wishlist</div>
                                        <i class="ph ph-heart text-lg"></i>
                                    </div>
                                    <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Compare Product</div>
                                        <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                        <i class="ph ph-check-circle text-lg checked-icon"></i>
                                    </div>
                                </div>
                                <div class="product-img w-full h-full aspect-[3/4]">
                                    <img class="w-full h-full object-cover duration-700" src="assets/images/product/fashion/14-1.png" alt="img" />
                                    <img class="w-full h-full object-cover duration-700" src="assets/images/product/fashion/14-2.png" alt="img" />
                                </div>
                                <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                    <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">Quick View</div>
                                    <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">Add To Cart</div>
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
                                <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                    <div class="color-item bg-black w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">Black</div>
                                    </div>
                                    <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">Green</div>
                                    </div>
                                    <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">Red</div>
                                    </div>
                                </div>

                                <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                    <div class="product-price text-title">$40.00</div>
                                    <div class="product-origin-price caption1 text-secondary2">
                                        <del>$50.00</del>
                                    </div>
                                    <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">-20%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-item grid-type" data-item="13">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
                                <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                    <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Add To Wishlist</div>
                                        <i class="ph ph-heart text-lg"></i>
                                    </div>
                                    <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Compare Product</div>
                                        <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                        <i class="ph ph-check-circle text-lg checked-icon"></i>
                                    </div>
                                </div>
                                <div class="product-img w-full h-full aspect-[3/4]">
                                    <img class="w-full h-full object-cover duration-700" src="assets/images/product/fashion/13-1.png" alt="img" />
                                    <img class="w-full h-full object-cover duration-700" src="assets/images/product/fashion/13-2.png" alt="img" />
                                </div>
                                <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                    <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">Quick View</div>
                                    <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">Add To Cart</div>
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
                                <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                    <div class="color-item bg-black w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">Black</div>
                                    </div>
                                    <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">Green</div>
                                    </div>
                                    <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">Red</div>
                                    </div>
                                </div>

                                <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                    <div class="product-price text-title">$40.00</div>
                                    <div class="product-origin-price caption1 text-secondary2">
                                        <del>$50.00</del>
                                    </div>
                                    <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">-20%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-item grid-type" data-item="12">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
                                <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                    <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Add To Wishlist</div>
                                        <i class="ph ph-heart text-lg"></i>
                                    </div>
                                    <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Compare Product</div>
                                        <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                        <i class="ph ph-check-circle text-lg checked-icon"></i>
                                    </div>
                                </div>
                                <div class="product-img w-full h-full aspect-[3/4]">
                                    <img class="w-full h-full object-cover duration-700" src="assets/images/product/fashion/12-1.png" alt="img" />
                                    <img class="w-full h-full object-cover duration-700" src="assets/images/product/fashion/12-2.png" alt="img" />
                                </div>
                                <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                    <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">Quick View</div>
                                    <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">Add To Cart</div>
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
                                <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                    <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">Red</div>
                                    </div>
                                    <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">yellow</div>
                                    </div>
                                    <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">green</div>
                                    </div>
                                </div>

                                <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                    <div class="product-price text-title">$40.00</div>
                                    <div class="product-origin-price caption1 text-secondary2">
                                        <del>$50.00</del>
                                    </div>
                                    <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">-20%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-item grid-type" data-item="11">
                        <div class="product-main cursor-pointer block">
                            <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
                                <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                    <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Add To Wishlist</div>
                                        <i class="ph ph-heart text-lg"></i>
                                    </div>
                                    <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                        <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Compare Product</div>
                                        <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                        <i class="ph ph-check-circle text-lg checked-icon"></i>
                                    </div>
                                </div>
                                <div class="product-img w-full h-full aspect-[3/4]">
                                    <img class="w-full h-full object-cover duration-700" src="assets/images/product/fashion/11-1.png" alt="img" />
                                    <img class="w-full h-full object-cover duration-700" src="assets/images/product/fashion/11-2.png" alt="img" />
                                </div>
                                <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                    <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">Quick View</div>
                                    <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">Add To Cart</div>
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
                                <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                    <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">Red</div>
                                    </div>
                                    <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">yellow</div>
                                    </div>
                                    <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">green</div>
                                    </div>
                                </div>

                                <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                    <div class="product-price text-title">$40.00</div>
                                    <div class="product-origin-price caption1 text-secondary2">
                                        <del>$50.00</del>
                                    </div>
                                    <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">-20%</div>
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

    <div class="modal-sizeguide-block">
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
    </div>

    <div class="modal-compare-block">
        <div class="modal-compare-main py-6">
            <div class="close-btn absolute 2xl:right-6 right-4 2xl:top-6 md:-top-4 top-3 lg:w-10 w-6 lg:h-10 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                <i class="ph ph-x body1"></i>
            </div>
            <div class="container h-full flex items-center w-full">
                <div class="content-main flex items-center justify-between xl:gap-10 gap-6 w-full max-md:flex-wrap">
                    <div class="heading5 flex-shrink-0 max-md:w-full">Compare <br class="max-md:hidden" />Products</div>
                    <div class="list-product flex items-center w-full gap-4"></div>
                    <div class="block-button flex flex-col gap-4 flex-shrink-0">
                        <a href="compare.html" class="button-main whitespace-nowrap"> Compare Products</a>
                        <div class="button-main clear whitespace-nowrap border border-black bg-white text-black">Clear All Products</div>
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
                        <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                            <img src="assets/images/product/fashion/3-1.png" alt="item" class="w-full h-full object-cover" />
                        </div>
                        <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                            <img src="assets/images/product/fashion/3-2.png" alt="item" class="w-full h-full object-cover" />
                        </div>
                        <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                            <img src="assets/images/product/fashion/3-3.png" alt="item" class="w-full h-full object-cover" />
                        </div>
                        <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                            <img src="assets/images/product/fashion/3-4.png" alt="item" class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
                <div class="right w-full px-6">
                    <div class="heading pb-6 flex items-center justify-between relative">
                        <div class="heading5">Quick View</div>
                        <div class="close-btn absolute right-0 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                            <i class="ph ph-x text-sm"></i>
                        </div>
                    </div>
                    <div class="product-infor">
                        <div class="flex justify-between">
                            <div>
                                <div class="category caption2 text-secondary font-semibold uppercase">fashion</div>
                                <div class="name heading4 mt-1">Off-the-Shoulder Blouse</div>
                            </div>
                            <div class="add-wishlist-btn w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-lg duration-300 hover:bg-black hover:text-white">
                                <i class="ph ph-heart text-xl"></i>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="rate flex">
                                <i class="ph-fill ph-star text-sm text-yellow"></i>
                                <i class="ph-fill ph-star text-sm text-yellow"></i>
                                <i class="ph-fill ph-star text-sm text-yellow"></i>
                                <i class="ph-fill ph-star text-sm text-yellow"></i><i class="ph-fill ph-star text-sm text-yellow"></i>
                            </div>
                            <span class="caption1 text-secondary">(1.234 reviews)</span>
                        </div>
                        <div class="flex items-center gap-1 gap-y-3 flex-wrap mt-3">
                            <div class="text-xs font-semibold bg-black text-white uppercase py-1 px-3 rounded-full">best seller</div>
                            <div class="flex items-center gap-1">
                                <i class="ph-fill ph-lightning text-red text-xl"></i>
                                <div class="caption1 text-secondary">Selling fast! 22 people have this in their carts.</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 flex-wrap mt-5 pb-6 border-b border-line">
                            <div class="product-price heading5">$20.00</div>
                            <div class="w-px h-4 bg-line"></div>
                            <div class="product-origin-price font-normal text-secondary2">
                                <del>$32.00</del>
                            </div>
                            <div class="product-sale caption2 font-semibold bg-green px-3 py-0.5 inline-block rounded-full">-19%</div>
                            <div class="desc text-secondary mt-3">Keep your clothes organized, yet elegant with storage cabinets by Onita Patio Furniture. Traditionally designed, they are perfect to be used in the any place where you need to store.</div>
                        </div>
                        <div class="list-action mt-6">
                            <div class="choose-color">
                                <div class="text-title">Colors: <span class="text-title color"></span></div>
                                <div class="list-color flex items-center gap-2 flex-wrap mt-3">
                                    <div class="color-item w-12 h-12 rounded-xl duration-300 relative active">
                                        <img src="assets/images/product/color/purple.png" alt="color" class="rounded-xl" />
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">blue</div>
                                    </div>
                                    <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                        <img src="assets/images/product/color/red.png" alt="color" class="rounded-xl" />
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">red</div>
                                    </div>
                                    <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                        <img src="assets/images/product/color/black.png" alt="color" class="rounded-xl" />
                                        <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">black</div>
                                    </div>
                                </div>
                            </div>
                            <div class="choose-size mt-5">
                                <div class="heading flex items-center justify-between">
                                    <div class="text-title">Size: <span class="text-title size"></span></div>
                                    <div class="caption1 size-guide text-red underline">Size Guide</div>
                                </div>
                                <div class="list-size flex items-center gap-2 flex-wrap mt-3">
                                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">S</div>
                                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line active">M</div>
                                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">L</div>
                                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">XL</div>
                                </div>
                            </div>
                            <div class="text-title mt-5">Quantity:</div>
                            <div class="choose-quantity flex items-center flex-wrap lg:justify-between gap-5 mt-3">
                                <div class="quantity-block md:p-3 max-md:py-1.5 max-md:px-3 flex items-center justify-between rounded-lg border border-line sm:w-[180px] w-[120px] flex-shrink-0">
                                    <i class="ph-bold ph-minus cursor-pointer body1"></i>
                                    <div class="quantity body1 font-semibold">1</div>
                                    <i class="ph-bold ph-plus cursor-pointer body1"></i>
                                </div>
                                <div class="add-cart-btn button-main w-full text-center bg-white text-black border border-black">Add To Cart</div>
                            </div>
                            <div class="button-block mt-5">
                                <a href="checkout.html" class="button-main w-full text-center">Buy It Now</a>
                            </div>
                        </div>
                        <div class="flex items-center flex-wrap lg:gap-20 gap-8 gap-y-4 mt-5">
                            <div class="compare flex items-center gap-3 cursor-pointer">
                                <div class="compare-btn md:w-12 md:h-12 w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-xl duration-300 hover:bg-black hover:text-white">
                                    <i class="ph-fill ph-arrows-counter-clockwise cursor-pointer heading6"></i>
                                </div>
                                <span>Compare</span>
                            </div>
                            <div class="share flex items-center gap-3 cursor-pointer">
                                <div class="share-btn md:w-12 md:h-12 w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-xl duration-300 hover:bg-black hover:text-white">
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
                            <div class="main-content lg:pt-8 pt-6 lg:pb-6 pb-4 sm:px-4 px-3 border border-line rounded-xl relative max-md:w-2/3 max-sm:w-full">
                                <div class="heading6 px-5 bg-white absolute -top-[14px] left-1/2 -translate-x-1/2 whitespace-nowrap">Guranteed safe checkout</div>
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
<script src="assets/js/main.js"></script>
<?php require_once 'layout/footer.php'; ?>