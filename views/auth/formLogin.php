<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>
<div class="breadcrumb-product">
    <div class="main bg-surface md:pt-[88px] pt-[70px] pb-[14px]">
        <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
            <div class="text-content">
                <div class="heading2 text-center" _msttexthash="1457443" _msthash="333">Đăng nhập</div>
                <div class="link flex items-center justify-center gap-1 caption1 mt-3 ">
                    <a href="<?= BASE_URL ?>" class="hover:underline" _msttexthash="1532700" _msthash="334">Trang
                        chủ</a>
                    <i class="ph ph-caret-right text-sm text-secondary2"></i>
                    <div class="text-secondary2 capitalize" _msttexthash="1457443" _msthash="335">Đăng nhập
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login-block md:py-20 py-10">
    <div class="container">
        <div class="content-main flex gap-y-8 max-md:flex-col">
            <div class="left md:w-1/2 w-full lg:pr-[60px] md:pr-[40px] md:border-r border-line">
                <div class="heading4" _msttexthash="1457443" _msthash="336">Đăng nhập</div>
                <br>
                <?php if (isset($_SESSION['error'])) { ?>
                <p class="text-danger login-box-msg"><?= $_SESSION['error'] ?></p>
                <?php } ?>

                <form class="md:mt-7 mt-4" action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                    <div class="email">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="email"
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="Địa chỉ Email*">
                    </div>
                    <?php if (isset($_SESSION['errors']['email'])) { ?>
                    <p class="login-box-msg text-danger mt-2" style="color: red;"><?= $_SESSION['errors']['email'] ?>
                    </p>
                    <?php } ?>

                    <div class="pass mt-5">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="password" name="password"
                            placeholder="Mật Khẩu*">
                    </div>
                    <?php if (isset($_SESSION['errors']['password'])) { ?>
                    <p class="login-box-msg text-danger mt-2" style="color: red;"><?= $_SESSION['errors']['password'] ?>
                    </p>
                    <?php } ?>

                    <div class="flex items-center justify-between mt-5">
                        <div class="flex items-center">
                            <div class="block-input">
                                <input type="checkbox" name="remember" id="remember">
                                <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                            </div>
                            <label for="remember" class="pl-2 cursor-pointer">Hãy nhớ tôi</label>
                        </div>
                        <a href="forgot-password.html" class="font-semibold hover:underline">Quên Mật khẩu?</a>
                    </div>

                    <br>
                    <div class="block-button md:mt-7 mt-4">
                        <button class="button-main">Đăng nhập</button>
                    </div>
                </form>

                <?php 
// Xoá lỗi sau khi hiển thị
unset($_SESSION['errors'], $_SESSION['error']);
?>

            </div>
            <div class="right md:w-1/2 w-full lg:pl-[60px] md:pl-[40px] flex items-center">
                <div class="text-content">
                    <div class="heading4">Khách hàng mới</div>
                    <div class="mt-2 text-secondary">Hãy là một phần của gia
                        đình khách hàng mới đang phát triển của chúng tôi! Tham gia với chúng tôi ngay hôm nay và mở
                        khóa một thế giới với các lợi ích, ưu đãi và trải nghiệm độc quyền.</div>
                    <div class="block-button md:mt-7 mt-4">
                        <a href="<?= BASE_URL . '?act=register' ?>" class="button-main">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'views/layout/footer.php'; ?>