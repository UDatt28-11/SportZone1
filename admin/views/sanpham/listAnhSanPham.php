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
                    <h1>Gói hình của <?=$product['ten_san_pham']?> màu <?= $mauSanPham['mau_sac'] ?></h1>
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
                            <a
                                href="<?= BASE_URL_ADMIN . '?act=list-mau-bien-the&id_san_pham=' . $product['id'] ?>">
                                <button class="btn btn-secondary">Quay lại danh sách màu sắc để thêm hình mới</button>
                            </a>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=edit-anh-mau-san-pham&id_san_pham=' . $product['id'] . '&id_mau_sac=' . $mauSanPham['id'] ?>" method="post"
                        enctype="multipart/form-data">
                            <div class="card-header">
                            <button type="submit" class="btn btn-primary">Cập nhật số liệu biến thể</button>
                            </div>
                        
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Hình</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Thao tác xử lí</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($goiAnh as $key => $sanPham) : ?>
                                        <tr>
                                            <td scope="row"><?= $key + 1 ?></td>
                                            <td><img src="<?= BASE_URL . $sanPham['link_hinh_anh']  ?>" width="120px" alt=""></td>
                                            <td>
                                                <input type="file" name="new_image[<?=$sanPham['id']?>]">
                                            </td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-hinh-anh-mau-san-pham&id_san_pham=' . $product['id'] . '&id_mau_sac=' . $mauSanPham['id'] . '&id_anh=' . $sanPham['id'] ?>"
                                                    onclick="return confirm('Bạn có đồng ý xóa hay không?')">
                                                    <button type="button"
                                                            class="btn btn-danger"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Hình</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Thao tác xử lí</th>
                                            
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