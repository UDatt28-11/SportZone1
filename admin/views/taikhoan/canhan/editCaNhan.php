<!-- header  -->
<?php require './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý khách hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?= BASE_URL_ADMIN . '?act=sua-thong-tin-ca-nhan-quan-tri' ?>" method="post">
            <div class="wrapper bg-white mt-sm-5">
                <div class="d-flex align-items-start py-3 border-bottom">
                    <img src="<?= BASE_URL_ADMIN . $thongTin['anh_dai_dien']  ?>" width="90" height="90" id="img" class="img" alt=""
                        onerror="this.onerror=null; this.src='https://www.w3schools.com/w3images/avatar2.png'">
                    <div class="pl-sm-4 pl-2" id="img-section">
                        <b>Chỉnh sửa hình ảnh đại diện</b>
                        <p>Accepted file type .png. Less than 1MB</p>
                        <button class="btn button border"><b>Upload</b></button>
                    </div>
                </div>
                <div class="py-3 border-bottom">
                    <h2 class="text-center">Thông tin cá nhân</h2>
                    <p class="text-center">Chỉnh sửa thông tin cá nhân của bạn</p>
                </div>
                <div class="py-2">
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="firstname">First Name</label>
                            <input type="text" class="bg-light form-control" placeholder="Steve">
                        </div>
                        <div class="col-md-6 pt-md-0 pt-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="bg-light form-control" placeholder="Smith">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="email">Email Address</label>
                            <input type="text" class="bg-light form-control" placeholder="steve_@email.com">
                        </div>
                        <div class="col-md-6 pt-md-0 pt-3">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="bg-light form-control" placeholder="+1 213-548-6015">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="country">Country</label>
                            <select name="country" id="country" class="bg-light">
                                <option value="india" selected>India</option>
                                <option value="usa">USA</option>
                                <option value="uk">UK</option>
                                <option value="uae">UAE</option>
                            </select>
                        </div>
                        <div class="col-md-6 pt-md-0 pt-3" id="lang">
                            <label for="language">Language</label>
                            <div class="arrow">
                                <select name="language" id="language" class="bg-light">
                                    <option value="english" selected>English</option>
                                    <option value="english_us">English (United States)</option>
                                    <option value="enguk">English UK</option>
                                    <option value="arab">Arabic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <input type="submit" class="btn btn-primary mr-3" value="Save Changes">
                    </div>
        </form>
        <hr>
        <h3 class="text-center">Đổi Mật Khẩu</h3>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-info alert-dismissible">
                <a class="panel-close close" data-dismiss="alert">X</a>
                <i class="fa fa-coffee"></i>
                <?= htmlspecialchars($_SESSION['success']) ?>
            </div>
            <?php unset($_SESSION['success']);
            ?>
        <?php endif; ?>


        <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="post">
            <div class="form-group">
                <label for="old_pass" class="col-md-3 control-label">Mật khẩu Cũ:</label>
                <div class="col-md-12">
                    <input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="Nhập mật khẩu cũ">
                    <?php if (isset($_SESSION['error']['old_pass'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
                        <?php unset($_SESSION['error']['old_pass']); ?>
                        <?php unset($_SESSION['success']);?>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="new_pass" class="col-md-3 control-label">Mật Khẩu Mới:</label>
                <div class="col-md-12">
                    <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="Nhập mật khẩu mới">
                    <?php if (isset($_SESSION['error']['new_pass'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
                        <?php unset($_SESSION['success']);?>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_pass" class="col-md-3 control-label">Nhập Lại Mật Khẩu Mới:</label>
                <div class="col-md-12">
                    <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="Nhập lại mật khẩu mới">
                    <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
                        <?php unset($_SESSION['error']['confirm_pass']); ?>
                    <?php } ?>
                </div>
            </div>
            <div class="py-3 pb-4 border-bottom">
                <input type="submit" class="btn btn-primary mr-3" value="Save Changes">
            </div>
        </form>
</div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

</body>

</html>