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
                    <h1>Biến thể màu của <?=$product['ten_san_pham']?></h1>
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
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-mau-bien-the&id_san_pham=' .  $product['id'] ?>">
                                <button class="btn btn-success">Thêm màu mới</button>
                            </a>
                            <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" >
                                <button type="button" class="btn btn-secondary">
                                    Quay về danh sách
                                </button>
                            </a>
                        </div>
                        
                        <form action="<?= BASE_URL_ADMIN . '?act=them-goi-hinh-bien-the&id_san_pham=' . $product['id'] ?>" method="post"
                        enctype="multipart/form-data">
                            <div class="card-header">
                            <button type="submit" class="btn btn-primary">Cập nhật hình ảnh biến thể</button>
                            
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Màu sắc</th>
                                            <th>Thêm gói ảnh</th>
                                            <th>thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // var_dump($listMauCuaBienThe);die();
                                        foreach ($listMauCuaBienThe as $key => $sanPham) : ?>
                                        <tr>
                                            <input type="hidden" name="color_id[]" value="<?= $sanPham['id']?>">

                                            <td><?= $key + 1 ?></td>
                                            <td><?= $sanPham['mau_sac'] ?></td>
                                            <td>
                                                <input type="file" name="images[<?= $sanPham['id'] ?>][]" multiple>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=list-goi-hinh-anh&id_san_pham=' . $product['id'] . '&id_mau_sac=' . $sanPham['id'] ?>">
                                                    <button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-mau-bien-the&id_san_pham=' . $product['id'] . '&id_mau_sac=' . $sanPham['id'] ?>"
                                                    onclick="return confirm('Bạn có đồng ý xóa hay không?')">
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Màu sắc</th>
                                            <th>Thêm gói ảnh</th>
                                            <th>thao tác</th>
                                            
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