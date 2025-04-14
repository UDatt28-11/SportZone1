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
                <div class="col-sm-10">
                    <h1>Chi tiết đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
                </div>
                <!-- <div class="col-sm-2">
                    <form action="" method="post">
                        <select name="" id="" class="form-group">
                            <?php foreach ($listTrangThaiDonHang as $key => $trangThai) : ?>
                                <option 
                                    <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '';?> 
                                    <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : '';?> 
                                    value="<?= $trangThai['id'] ?>"><?= $trangThai['ten_trang_thai'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </form>
                </div> -->
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php
                    if ($donHang['trang_thai_id'] == 1) {
                        $color = 'warning';
                    } else if ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                        $color = 'primary';
                    } else if ($donHang['trang_thai_id'] == 10) {
                        $color = 'success';
                    } else {
                        $color = 'danger';
                    }
                    ?>
                    <div class="alert alert-<?= $color; ?>" role="alert">
                        Trạng thái đơn hàng: <b><?= $donHang['ten_trang_thai'] ?></b>
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-volleyball-ball"></i> Sprort Zone
                                    <small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']) ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Thông tin người đặt
                                <address>
                                    <strong><?= $donHang['ho_ten'] ?></strong><br>
                                    Số điện thoại: <?= $donHang['so_dien_thoai'] ?><br>
                                    Địa chỉ: <?= $donHang['dia_chi'] ?><br>
                                    Email: <?= $donHang['email'] ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Thông tin người nhận
                                <address>
                                    <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                    Số điện thoại: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                    Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                    Email: <?= $donHang['email_nguoi_nhan'] ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Mã đơn hàng:</b> <?= $donHang['ma_don_hang'] ?><br>
                                <b>Tổng tiền:</b> <?= $donHang['tong_tien'] ?><br>
                                <b>Ghi chú:</b> <?= $donHang['ghi_chu'] ?><br>
                                <b>Phương thức thanh toán:</b> <?= $donHang['ten_phuong_thuc'] ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tongTien = 0; ?>
                                        <?php foreach ($listChiTietDonHang as $key => $sanPham) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $sanPham['ten_san_pham'] ?></td>
                                            <td><?= $sanPham['don_gia'] ?></td>
                                            <td><?= $sanPham['so_luong'] ?></td>
                                            <td><?= $sanPham['thanh_tien'] ?> VNĐ</td>
                                        </tr>
                                        <?php $tongTien += $sanPham['thanh_tien'] ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->

                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày đặt hàng: <?= formatDate($donHang['ngay_dat']) ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Tổng tiền sản phẩmphẩm:</th>
                                                <td><?= $tongTien ?> VNĐ</td>
                                            </tr>
                                            <tr>
                                                <th>Vận chuyểnchuyển:</th>
                                                <td>30000 VNĐ</td>
                                            </tr>
                                            <tr>
                                                <th>Tổng:</th>
                                                <td><?=$tongTien + 30000  ?> VNĐ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

<!-- Page specific script -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<!-- Code injected by live-server -->

</body>

</html>