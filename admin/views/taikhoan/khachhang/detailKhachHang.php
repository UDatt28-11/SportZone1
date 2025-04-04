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
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width: 100%" alt=""
                        onerror="this.onerror=null; this.src='https://www.w3schools.com/w3images/avatar2.png'">
                </div>

                <div class="col-8">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Họ Tên:</th>
                                <td><?= $khachHang['ho_ten'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Ngày Sinh:</th>
                                <td><?= $khachHang['ngay_sinh'] ?? ''?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <td><?= $khachHang['email'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Số Điện Thoại</th>
                                <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Giới Tính</th>
                                <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Địa Chỉ</th>
                                <td><?= $khachHang['dia_chi'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Trạng Thái</th>
                                <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive'  ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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