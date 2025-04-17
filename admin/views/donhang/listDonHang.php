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
                    <h1>Quản lý danh sách đơn hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Trạng thái</th>
                                        <th>Cập nhật</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listDonHang as $key => $donHang) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td>
                                            <?= $donHang['ten_trang_thai'] ?>
                                        </td>
                                        <td>
                                            <?php if($donHang['trang_thai_id'] == 1):  ?>
                                                <button type="button" class="btn btn-sm btn-success">Xác nhận</button>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 2):  ?>
                                                <button type="button" class="btn btn-sm btn-success">Yêu cầu thanh toán</button>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 3):  ?>
                                                <button type="button" class="btn btn-sm btn-success">Xác nhận thanh toán</button>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 4):  ?>
                                                <button type="button" class="btn btn-sm btn-success">Chuẩn bị hàng</button>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 5):  ?>
                                                <button type="button" class="btn btn-sm btn-success">Giao hàng</button>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 6):  ?>
                                                <button type="button" class="btn btn-sm btn-success">Đã giao</button>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 7):  ?>
                                                <div>Chờ xác nhận của khác hàng</div>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 8):  ?>
                                                <div>Giao hàng thành công</div>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 9):  ?>
                                                <div>Giao hàng thành công</div>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 10):  ?>
                                                <a class="btn btn-sm btn-warning">Xác nhận hoàn hàng</a>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 11):  ?>
                                                <div>Đã hủy</div>
                                            <?php endif; ?>
                                            <?php if($donHang['trang_thai_id'] == 12):  ?>
                                                <a class="btn btn-sm btn-waring">Xác nhận hủy</a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                        <td><?= $donHang['tong_tien'] ?></td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <a
                                                    href="<?= BASE_URL_ADMIN .'?act=chi-tiet-don-hang&id_don_hang='. $donHang['id'] ?>">
                                                    <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                                                </a>
                                                
                                            </div>

                                        </td>
                                    </tr>

                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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

<!-- Page specific script -->
<script>
const trangThaiId = document.getElementById('trang_thai_id').value;

function checkTrangThai(trangThaiId) {
    if (trangThaiId == 9 || trangThaiId == 10 || trangThaiId == 11) {
        alert('Đơn hàng đã hoàn thành hoặc đã hủy không thể chỉnh sửa!');
    } else {
        // document.getElementById("check").href. = `<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>`;
        return true;
    }
}

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


</body>

</html>