<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>
<div class="breadcrumb-product">
    <div class="main bg-surface md:pt-[88px] pt-[70px] pb-[14px]">
        <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
            <div class="text-content">
                <div class="heading2 text-center" _msttexthash="1457443" _msthash="333">Đăng Ký</div>
                <div class="link flex items-center justify-center gap-1 caption1 mt-3 ">
                    <a href="<?= BASE_URL ?>" class="hover:underline" _msttexthash="1532700" _msthash="334">Trang
                        chủ</a>
                    <i class="ph ph-caret-right text-sm text-secondary2"></i>
                    <div class="text-secondary2 capitalize" _msttexthash="1457443" _msthash="335">Đăng ký
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="register-block md:py-20 py-10">
    <div class="container">
        <div class="content-main flex gap-y-8 max-md:flex-col">
            <div class="left md:w-1/2 w-full lg:pr-[60px] md:pr-[40px] md:border-r border-line">
                <div class="heading4" _msttexthash="132717" _msthash="336">Đăng ký</div>
                <br>
                <?php if (isset($_SESSION['error'])): ?>
                <p class="text-danger login-box-msg" style="color:red"><?= $_SESSION['error'] ?></p>
                <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form class="md:mt-7 mt-4" action="<?= BASE_URL . '?act=resgister' ?>" method="post">
                    <!-- Họ tên -->
                    <div class="ho-ten mb-4">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="ho_ten" type="text"
                            placeholder="Họ tên*" value="<?= htmlspecialchars($_SESSION['old']['ho_ten'] ?? '') ?>">
                        <?php if (isset($_SESSION['errors']['ho_ten'])): ?>
                        <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['ho_ten'] ?></p>
                        <?php endif; ?>
                    </div>
                    <br>
                    <!-- Email -->
                    <div class="email mb-4">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="email" type="email"
                            placeholder="Địa chỉ Email*"
                            value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '') ?>">
                        <?php if (isset($_SESSION['errors']['email'])): ?>
                        <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <br>
                    <!-- Số điện thoại -->
                    <div class="so-dien-thoai mb-4">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="so_dien_thoai" type="text"
                            placeholder="Số điện thoại*"
                            value="<?= htmlspecialchars($_SESSION['old']['so_dien_thoai'] ?? '') ?>">
                        <?php if (isset($_SESSION['errors']['so_dien_thoai'])): ?>
                        <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                        <?php endif; ?>
                    </div>
                    <br>
                    <!-- Địa chỉ -->
                    <div class="dia-chi mb-4">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="dia_chi" type="text"
                            placeholder="Địa chỉ*" value="<?= htmlspecialchars($_SESSION['old']['dia_chi'] ?? '') ?>">
                        <?php if (isset($_SESSION['errors']['dia_chi'])): ?>
                        <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['dia_chi'] ?></p>
                        <?php endif; ?>
                    </div>
                    <br>
                    <!-- Mật khẩu -->
                    <div class="pass mb-4">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="password" type="password"
                            placeholder="Mật khẩu*">
                        <?php if (isset($_SESSION['errors']['password'])): ?>
                        <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['password'] ?></p>
                        <?php endif; ?>
                    </div>
                    <br>
                    <!-- Xác nhận mật khẩu -->
                    <div class="confirm-pass mb-4">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="confirmPassword"
                            type="password" placeholder="Xác nhận mật khẩu*">
                        <?php if (isset($_SESSION['errors']['confirmPassword'])): ?>
                        <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['confirmPassword'] ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    <br>
                    <!-- Ngày sinh -->
                    <div class="ngay-sinh mb-4">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="ngay_sinh" type="date"
                            placeholder="Ngày sinh*"
                            value="<?= htmlspecialchars($_SESSION['old']['ngay_sinh'] ?? '') ?>">
                        <?php if (isset($_SESSION['errors']['ngay_sinh'])): ?>
                        <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['ngay_sinh'] ?></p>
                        <?php endif; ?>
                    </div>
                    <br>
                    <!-- Giới tính -->
                    <div class="gioi-tinh mb-4">
                        <select name="gioi_tinh" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            <option value="">-- Chọn giới tính --</option>
                            <option value="1" <?= (($_SESSION['old']['gioi_tinh'] ?? '') == '1') ? 'selected' : '' ?>>
                                Nam</option>
                            <option value="2" <?= (($_SESSION['old']['gioi_tinh'] ?? '') == '2') ? 'selected' : '' ?>>Nữ
                            </option>
                        </select>
                        <?php if (isset($_SESSION['errors']['gioi_tinh'])): ?>
                        <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['gioi_tinh'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Checkbox điều khoản -->
                    <div class="flex items-center mt-5">
                        <input type="checkbox" name="remember" id="remember"
                            <?= isset($_SESSION['old']['remember']) ? 'checked' : '' ?>>
                        <label for="remember" class="pl-2 cursor-pointer text-secondary2">
                            Tôi đồng ý với <a href="#!" class="text-black hover:underline"> Điều khoản người dùng </a>
                        </label>
                    </div>
                    <?php if (isset($_SESSION['errors']['agree'])): ?>
                    <p class="text-red-500 mt-2" style="color: red;"><?= $_SESSION['errors']['agree'] ?></p>
                    <?php endif; ?>

                    <br>
                    <!-- Button -->
                    <button
                        class="button-main bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition">
                        Đăng ký
                    </button>
                </form>

                <?php 
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>

            </div>
            <div class="right md:w-1/2 w-full lg:pl-[60px] md:pl-[40px] flex items-center">
                <div class="text-content">
                    <div class="heading4" _msttexthash="3208062" _msthash="342">Bạn đã có tài khoản?</div>
                    <div class="mt-2 text-secondary" _msttexthash="161007119" _msthash="343">Chào mừng trở lại. Đăng
                        nhập để truy cập trải nghiệm được cá nhân hóa, tùy chọn đã lưu và hơn thế nữa. Chúng tôi rất vui
                        mừng được có bạn với chúng tôi một lần nữa!</div>
                    <div class="block-button md:mt-7 mt-4">
                        <a href="<?= BASE_URL . '?act=login' ?>" class="button-main" _msttexthash="1457443"
                            _msthash="344">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'views/layout/footer.php'; ?>