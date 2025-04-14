<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<div class="container lg:pt-[134px] pt-24 pb-10 relative">
    <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
        <div class="text-content">
            <div class="heading2 text-center">Giỏ Hàng</div>
            <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                <a href="index.html">Trang Chủ</a>
                <i class="ph ph-caret-right text-sm text-secondary2"></i>
                <div class="text-secondary2 capitalize">Giỏ Hàng</div>
            </div>
        </div>
    </div>
</div>
<div class="cart-block md:py-20 py-10">
    <div class="container">
        <div class="content-main flex justify-between max-xl:flex-col gap-y-8">
            <div class="xl:w-2/3 xl:pr-3 w-full">
                <div class="heading banner mt-5">
                    <div class="text">
                        <font _mstmutation="1" _msttexthash="5508685" _msthash="338"> Mua thêm <span class="text-button"
                                _mstmutation="1" _istranslated="1"> <span class="more-price"
                                    _istranslated="1">$150.00</span> </span> <span _mstmutation="1" _istranslated="1">để
                                nhận </span> <span class="text-button" _mstmutation="1"
                                _istranslated="1">freeship</span></font>
                    </div>
                    <div class="tow-bar-block mt-4">
                        <div class="progress-line" style="width: 0%;"></div>
                    </div>
                </div>
                <div class="list-product w-full sm:mt-7 mt-5">
                    <div class="w-full">
                        <!-- Header -->
                        <div class="heading bg-surface bora-4 pt-4 pb-4 border-b border-gray-300">
                            <div class="flex text-sm font-semibold text-center">
                                <div class="w-1/2">Sản phẩm</div>
                                <div class="w-1/6">Giá</div>
                                <div class="w-1/6">Số lượng</div>
                                <div class="w-1/6">Tổng giá</div>
                            </div>
                        </div>

                        <!-- Danh sách sản phẩm -->
                        <div class="list-product-main w-full mt-3 divide-y divide-gray-200">
                            <?php foreach($listGioHang as $gioHang){ ?>
                                <div class="flex items-center text-center text-sm py-4">
                                    <div class="w-1/2 px-2">
                                        <div class="font-medium text-gray-800"><?= $gioHang['ten_san_pham'] ?></div>
                                    </div>
                                    <div class="w-1/6 px-2 text-gray-600">
                                        <?= number_format($gioHang['don_gia'], 0, ',', '.') ?> đ
                                    </div>
                                    <div class="w-1/6 px-2 text-gray-600">
                                        <?= $gioHang['so_luong'] ?>
                                    </div>
                                    <div class="w-1/6 px-2 font-semibold text-black">
                                        <?= number_format($gioHang['don_gia'] * $gioHang['so_luong'], 0, ',', '.') ?> đ
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="input-block discount-code w-full h-12 sm:mt-7 mt-5">
                    <form class="w-full h-full relative">
                        <input type="text" placeholder="Thêm giảm giá voucher"
                            class="w-full h-full bg-surface pl-4 pr-14 rounded-lg border border-line" required=""
                            _mstplaceholder="390208" _msthash="343">
                        <button
                            class="button-main absolute top-1 bottom-1 right-1 px-5 rounded-lg flex items-center justify-center"
                            _msttexthash="1160614" _msthash="344">Áp dụng mã</button>
                    </form>
                </div>
                <div class="list-voucher flex items-center gap-5 flex-wrap sm:mt-7 mt-5">
                    <div class="item border border-line rounded-lg py-2">
                        <div class="top flex gap-10 justify-between px-3 pb-2 border-b border-dashed border-line">
                            <div class="left">
                                <div class="caption1" _msttexthash="1886261" _msthash="345">Sự bớt</div>
                                <div class="caption1 font-bold" _msttexthash="1021709" _msthash="346">GIẢM GIÁ 10%</div>
                            </div>
                            <div class="right">
                                <div class="caption1" _msttexthash="11874122" _msthash="347">Đối với tất cả các đơn đặt
                                    hàng <br _istranslated="1">từ 200$</div>
                            </div>
                        </div>
                        <div class="bottom gap-6 items-center flex justify-between px-3 pt-2">
                            <div class="text-button-uppercase" _msttexthash="1142804" _msthash="348">Mã số: AN6810</div>
                            <div class="button-main py-1 px-2.5 capitalize text-xs" _msttexthash="1160614"
                                _msthash="349">Áp dụng mã</div>
                        </div>
                    </div>
                    <div class="item border border-line rounded-lg py-2">
                        <div class="top flex gap-10 justify-between px-3 pb-2 border-b border-dashed border-line">
                            <div class="left">
                                <div class="caption1" _msttexthash="1886261" _msthash="350">Sự bớt</div>
                                <div class="caption1 font-bold" _msttexthash="1022684" _msthash="351">GIẢM GIÁ 15%</div>
                            </div>
                            <div class="right">
                                <div class="caption1" _msttexthash="11874551" _msthash="352">Đối với tất cả các đơn đặt
                                    hàng <br _istranslated="1">từ 300$</div>
                            </div>
                        </div>
                        <div class="bottom gap-6 items-center flex justify-between px-3 pt-2">
                            <div class="text-button-uppercase" _msttexthash="1142804" _msthash="353">Mã số: AN6810</div>
                            <div class="button-main py-1 px-2.5 capitalize text-xs" _msttexthash="1160614"
                                _msthash="354">Áp dụng mã</div>
                        </div>
                    </div>
                    <div class="item border border-line rounded-lg py-2">
                        <div class="top flex gap-10 justify-between px-3 pb-2 border-b border-dashed border-line">
                            <div class="left">
                                <div class="caption1" _msttexthash="1886261" _msthash="355">Sự bớt</div>
                                <div class="caption1 font-bold" _msttexthash="1021891" _msthash="356">GIẢM GIÁ 20%</div>
                            </div>
                            <div class="right">
                                <div class="caption1" _msttexthash="11874980" _msthash="357">Đối với tất cả các đơn đặt
                                    hàng <br _istranslated="1">từ 400$</div>
                            </div>
                        </div>
                        <div class="bottom gap-6 items-center flex justify-between px-3 pt-2">
                            <div class="text-button-uppercase" _msttexthash="1142804" _msthash="358">Mã số: AN6810</div>
                            <div class="button-main py-1 px-2.5 capitalize text-xs" _msttexthash="1160614"
                                _msthash="359">Áp dụng mã</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-1/3 xl:pl-12 w-full">
                <div class="checkout-block bg-surface p-6 rounded-2xl">
                    <div class="heading5" _msttexthash="1467908" _msthash="360">Tóm tắt đơn hàng</div>
                    <div class="total-block py-5 flex justify-between border-b border-line">
                        <div class="text-title" _msttexthash="2223637" _msthash="361">Tổng phụ</div>
                        <div class="text-title">$<font _mstmutation="1" _msttexthash="20800" _msthash="362"><span
                                    class="total-product" _mstmutation="1" _istranslated="1">0,00</span><span
                                    _mstmutation="1" _istranslated="1"></span></font>
                        </div>
                    </div>
                    <div class="discount-block py-5 flex justify-between border-b border-line">
                        <div class="text-title" _msttexthash="139685" _msthash="363">Discounts</div>
                        <div class="text-title"><span>-$</span>
                            <font _mstmutation="1" _msttexthash="20800" _msthash="364"><span class="discount"
                                    _mstmutation="1" _istranslated="1">0,00</span><span _mstmutation="1"
                                    _istranslated="1"></span></font>
                        </div>
                    </div>
                    <div class="ship-block py-5 flex justify-between border-b border-line">
                        <div class="text-title" _msttexthash="2358551" _msthash="365">Vận chuyển</div>
                        <div class="choose-type flex gap-12">
                            <div class="left">
                                <div class="type">
                                    <input id="shipping" type="radio" name="ship">
                                    <label class="pl-1" for="shipping" _msttexthash="4907071" _msthash="366">Miễn phí
                                        vận chuyển:</label>
                                </div>
                                <div class="type mt-1">
                                    <input id="local" type="radio" name="ship" value="{30}">
                                    <label class="text-on-surface-variant1 pl-1" for="local" _msttexthash="1075399"
                                        _msthash="367">Địa phương:</label>
                                </div>
                                <div class="type mt-1">
                                    <input id="flat" type="radio" name="ship" value="{40}">
                                    <label class="text-on-surface-variant1 pl-1" for="flat" _msttexthash="4650542"
                                        _msthash="368">Tỷ lệ cố định:</label>
                                </div>
                            </div>
                            <div class="right">
                                <div class="ship" _msttexthash="51987" _msthash="369">0,00 US$</div>
                                <div class="local text-on-surface-variant1 mt-1" _msttexthash="61724" _msthash="370">
                                    30,00 US$</div>
                                <div class="flat text-on-surface-variant1 mt-1" _msttexthash="34632" _msthash="371">
                                    $40.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="total-cart-block pt-4 pb-4 flex justify-between">
                        <div class="heading5" _msttexthash="1971515" _msthash="372">Tất cả</div>
                        <div class=""><span class="heading5">$</span>
                            <font _mstmutation="1" _msttexthash="20800" _msthash="373"><span class="total-cart heading5"
                                    _mstmutation="1" _istranslated="1">0,00</span><span class="heading5"
                                    _mstmutation="1" _istranslated="1"></span></font>
                        </div>
                    </div>
                    <div class="block-button flex flex-col items-center gap-y-4 mt-5">
                        <a href="checkout.html" class="checkout-btn button-main text-center w-full"
                            _msttexthash="414232" _msthash="374"> Quy trình thanh toán</a>
                        <a class="text-button hover-underline" href="shop-breadcrumb1.html" _msttexthash="4174391"
                            _msthash="375">Tiếp tục mua sắm </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>