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
                    <h1>Chỉnh sửa thông tin cá nhân</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Hiển thị thông báo lỗi hoặc thành công -->
        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php foreach ($_SESSION['error'] as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <p><?= htmlspecialchars($_SESSION['success']) ?></p>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <!-- Form thay đổi ảnh đại diện -->
        <div class="wrapper bg-white mt-sm-5">
            <div class="py-3 border-bottom">
                <h2 class="text-center">Thay đổi ảnh đại diện</h2>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=update-avatar' ?>" method="post" enctype="multipart/form-data">
                <div class="d-flex align-items-start py-3 border-bottom">
                    <img src="<?= $thongTin['anh_dai_dien'] ? BASE_URL_ADMIN . $thongTin['anh_dai_dien'] : 'https://www.w3schools.com/w3images/avatar2.png' ?>" 
                         width="90" height="90" id="img" class="img" alt="">
                    <div class="pl-sm-4 pl-2" id="img-section">
                        <b>Chỉnh sửa hình ảnh đại diện</b>
                        <p>Accepted file type: .png, .jpg, .jpeg. Max size: 2MB</p>
                        <input type="file" name="avatar" class="form-control mb-2">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Form chỉnh sửa thông tin cá nhân -->
        <div class="wrapper bg-white mt-sm-5">
            <div class="py-3 border-bottom">
                <h2 class="text-center">Thông tin cá nhân</h2>
                <p class="text-center">Chỉnh sửa thông tin cá nhân của bạn</p>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=sua-thong-tin-ca-nhan-quan-tri&id=' . $thongTin['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="py-2">
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="ho_ten">Họ và Tên</label>
                            <input type="text" class="bg-light form-control" name="ho_ten" id="ho_ten" placeholder="Họ và Tên" value="<?= htmlspecialchars($thongTin['ho_ten']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="bg-light form-control" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($thongTin['email']) ?>" required>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="so_dien_thoai">Số điện thoại</label>
                            <input type="tel" class="bg-light form-control" name="so_dien_thoai" id="so_dien_thoai" placeholder="Số điện thoại" value="<?= htmlspecialchars($thongTin['so_dien_thoai']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ngay_sinh">Ngày sinh</label>
                            <input type="date" class="bg-light form-control" name="ngay_sinh" id="ngay_sinh" value="<?= htmlspecialchars($thongTin['ngay_sinh']) ?>">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="gioi_tinh">Giới tính</label>
                            <select name="gioi_tinh" id="gioi_tinh" class="bg-light form-control">
                                <option value="0" <?= $thongTin['gioi_tinh'] == '0' ? 'selected' : '' ?>>Nam</option>
                                <option value="1" <?= $thongTin['gioi_tinh'] == '1' ? 'selected' : '' ?>>Nữ</option>
                                <option value="Khác" <?= $thongTin['gioi_tinh'] == 'Khác' ? 'selected' : '' ?>>Khác</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="dia_chi">Địa chỉ</label>
                            <input type="text" class="bg-light form-control" name="dia_chi" id="dia_chi" placeholder="Địa chỉ" value="<?= htmlspecialchars($thongTin['dia_chi']) ?>">
                        </div>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <input type="submit" class="btn btn-primary mr-3" value="Lưu thay đổi">
                    </div>
                </div>
            </form>
        </div>

        <!-- Form đổi mật khẩu -->
        <div class="wrapper bg-white mt-sm-5">
            <div class="py-3 border-bottom">
                <h2 class="text-center">Đổi mật khẩu</h2>
                <p class="text-center">Thay đổi mật khẩu của bạn</p>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="post">
                <div class="py-2">
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="old_pass">Mật khẩu cũ</label>
                            <input type="password" class="bg-light form-control" name="old_pass" id="old_pass" placeholder="Nhập mật khẩu cũ">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="new_pass">Mật khẩu mới</label>
                            <input type="password" class="bg-light form-control" name="new_pass" id="new_pass" placeholder="Nhập mật khẩu mới">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="confirm_pass">Nhập lại mật khẩu mới</label>
                            <input type="password" class="bg-light form-control" name="confirm_pass" id="confirm_pass" placeholder="Nhập lại mật khẩu mới">
                        </div>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <input type="submit" class="btn btn-primary mr-3" value="Đổi mật khẩu">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->
</body>

</html>