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
                    <h1>Biến thể của <?=$product['ten_san_pham']?></h1>
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
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-bien-the&id_san_pham=' . $product['id'] ?>" method="post">
                            <div class="card-header">
                            <button type="submit" class="btn btn-primary">Cập nhật số liệu biến thể</button>
                            <a href="http://localhost/SportZone1/admin/?act=san-pham" class="btn btn-secondary">Quay về danh sách</a>
                            </div>
                        
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Kích cỡ</th>
                                            <th>Màu sắc</th>
                                            <th>SL tồn kho</th>
                                            <th>Đơn giá</th>
                                            <th>Trạng thái</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listBienThe as $key => $sanPham) : ?>
                                        <tr>
                                            <input type="hidden" name="variant_id[]" value="<?= $sanPham['id'] ?>">

                                            <td><?= $key + 1 ?></td>
                                            <td><?= $sanPham['kich_co'] ?></td>
                                            <td><?= $sanPham['mau_sac'] ?></td>
                                            <td><input type="number" name="ton_kho[]" value="<?= $sanPham['ton_kho'] ?>" min="0" max="<?=$product['so_luong']?>" id=""></td>
                                            <td><input type="number" name="don_gia[]" value="<?= $sanPham['don_gia'] ?>" min="0" id=""></td>
                                            <td>
                                                <select id="trang_thai" name="trang_thai[]" class="form-control custom-select">
                                                    <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                                                    <option <?= $sanPham['trang_thai'] == 0 ? 'selected' : '' ?> value="0">Dừng bán</option>

                                                </select>
                                            </td>
                                            
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Kích cỡ</th>
                                            <th>Màu sắc</th>
                                            <th>SL tồn kho</th>
                                            <th>Đơn giá</th>
                                            <th>Trạng thái</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </form>
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