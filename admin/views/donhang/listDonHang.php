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
                            <h3>Lọc danh sách</h3>
                            <div class="flex items-center justify-between mb-2">
                                <button id="toggleStatusBtn" class="btn btn-sm btn-primary">
                                    <i class="fas fa-chevron-down" id="statusFilterIcon"></i> Lọc trạng thái đơn hàng
                                </button>
                                <a href="<?= BASE_URL_ADMIN . '?act=don-hang'?>"><button class="btn btn-sm btn-info">Hiển thị tất cả</button></a>
                            </div>
                            <div id="statusFilter" style="display: none;">
                                <form action="<?= BASE_URL_ADMIN ?>?act=don-hang" method="GET" class="flex flex-wrap gap-4">
                                    <input type="hidden" name="act" value="don-hang">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="1" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('1', $_GET['trang_thai']) ? 'checked' : '' ?>>Chưa xác nhận
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="2" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('2', $_GET['trang_thai']) ? 'checked' : '' ?>>Đã xác nhận
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="3" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('3', $_GET['trang_thai']) ? 'checked' : '' ?>>Chờ thanh toán
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="4" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('4', $_GET['trang_thai']) ? 'checked' : '' ?>>Đã thanh toán
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="5" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('5', $_GET['trang_thai']) ? 'checked' : '' ?>>Đang chuẩn bị hàng
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="6" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('6', $_GET['trang_thai']) ? 'checked' : '' ?>>Đang giao hàng
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="7" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('7', $_GET['trang_thai']) ? 'checked' : '' ?>>Giao hàng thành công
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="8" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('8', $_GET['trang_thai']) ? 'checked' : '' ?>>Giao hàng thất bại
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="9" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('9', $_GET['trang_thai']) ? 'checked' : '' ?>>Hoàn thành
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="10" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('10', $_GET['trang_thai']) ? 'checked' : '' ?>>Đã hủy
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="11" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('11', $_GET['trang_thai']) ? 'checked' : '' ?>>Đã hủy bởi admin
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="12" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('12', $_GET['trang_thai']) ? 'checked' : '' ?>>Yêu cầu hủy
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="trang_thai[]" value="13" class="mr-2" <?= isset($_GET['trang_thai']) && in_array('13', $_GET['trang_thai']) ? 'checked' : '' ?>>Đã hoàn hàng
                                    </div>
                                    <div class="w-full mt-4">
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="donHangTable" class="table table-bordered table-striped">
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
                                            <form action="<?= BASE_URL_ADMIN . '?act=xac-nhan-don-hang'?>" method="post">
                                                <input type="hidden" name="id_don_hang" value="<?= $donHang['id']?>">
                                                <?php if($donHang['trang_thai_id'] == 1):  ?>
                                                    <input type="hidden" name="trang_thai_id" value="2">
                                                    <button type="submit" name="submit" class="btn btn-sm btn-success">Xác nhận</button>
                                                    <button class="btn btn-sm btn-warning" type="button" onclick="cancel(<?=$donHang['id']?>)">Từ chối đơn hàng</button>
                                                <?php endif; ?>
                                                <?php if($donHang['trang_thai_id'] == 2):  ?>
                                                    <?php if($donHang['phuong_thuc_thanh_toan_id'] == 1):?>
                                                    <input type="hidden" name="trang_thai_id" value="5">
                                                    <button type="submit" class="btn btn-sm btn-success">chuẩn bị hàng</button>
                                                    <?php endif;?>
                                                    <?php if($donHang['phuong_thuc_thanh_toan_id'] == 2):?>
                                                    <input type="hidden" name="trang_thai_id" value="3">
                                                    <button type="submit" class="btn btn-sm btn-success">Yêu cầu thanh toán</button>
                                                    <?php endif;?>
                                                    
                                                <?php endif; ?>
                                                <?php if($donHang['trang_thai_id'] == 3):  ?>
                                                    <input type="hidden" name="trang_thai_id" value="4">
                                                    <button type="submit" class="btn btn-sm btn-success">Xác nhận thanh toán</button>
                                                <?php endif; ?>
                                                <?php if($donHang['trang_thai_id'] == 4):  ?>
                                                    <input type="hidden" name="trang_thai_id" value="5">
                                                    <button type="submit" class="btn btn-sm btn-success">Chuẩn bị hàng</button>
                                                <?php endif; ?>
                                                <?php if($donHang['trang_thai_id'] == 5):  ?>
                                                    <input type="hidden" name="trang_thai_id" value="6">
                                                    <button type="submit" class="btn btn-sm btn-success">Giao hàng</button>
                                                <?php endif; ?>
                                                <?php if($donHang['trang_thai_id'] == 6):  ?>
                                                    <input type="hidden" name="trang_thai_id" value="7">
                                                    <button type="submit" class="btn btn-sm btn-success">Đã giao</button>
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
                                                    <input type="hidden" name="trang_thai_id" value="13" id="">
                                                    <button type="submit" class="btn btn-sm btn-warning">Xác nhận hoàn hàng</button>
                                                <?php endif; ?>
                                                <?php if($donHang['trang_thai_id'] == 11):  ?>
                                                    <div>Đã hủy</div>
                                                <?php endif; ?>
                                                <?php if($donHang['trang_thai_id'] == 12):  ?>
                                                    <input type="hidden" value="11" name="trang_thai_id" id="">
                                                    <input type="hidden" value="y" name="yeuCauHuy" id="">
                                                    <button type="submit" class="btn btn-sm btn-warning">Xác nhận hủy</button>
                                                <?php endif; ?>
                                                <?php if($donHang['trang_thai_id'] == 13):  ?>
                                                    <div>Đã hoàn hàng</div>
                                                <?php endif; ?>

                                            </form>
                                            
                                        </td>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                        <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?>đ</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= BASE_URL_ADMIN .'?act=chi-tiet-don-hang&id_don_hang='. $donHang['id'] ?>">
                                                    <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
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
$(function() {
    // Xử lý thu gọn/mở rộng form
    function toggleStatusFilter() {
        const statusFilter = document.getElementById('statusFilter');
        const statusFilterIcon = document.getElementById('statusFilterIcon');
        
        if (statusFilter.style.display === 'none') {
            statusFilter.style.display = 'block';
            statusFilterIcon.classList.remove('fa-chevron-down');
            statusFilterIcon.classList.add('fa-chevron-up');
        } else {
            statusFilter.style.display = 'none';
            statusFilterIcon.classList.remove('fa-chevron-up');
            statusFilterIcon.classList.add('fa-chevron-down');
        }
    }

    // Gán sự kiện click cho nút
    document.getElementById('toggleStatusBtn').addEventListener('click', function(e) {
        e.preventDefault();
        toggleStatusFilter();
    });

    // Khởi tạo DataTable
    $('#donHangTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json"
        }
    });
});
    function cancel(donHangId) {
    if (confirm('Bạn có chắc chắn muốn từ chối đơn hàng này?')) {
        // Thêm debug để kiểm tra
        console.log('Từ chối đơn hàng ID:', donHangId);
        
        // Tạo URL với tham số
        const url = new URL('<?= BASE_URL_ADMIN ?>');
        url.searchParams.append('act', 'cancel');
        url.searchParams.append('id_don_hang', donHangId);
        console.log(url.toString());
        
        // Chuyển hướng
        window.location.href = url.toString();
    }
}

</script>


</body>

</html>