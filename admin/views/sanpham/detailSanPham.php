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
                    <h1>Quản lý danh sách sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                    
                    <div class="mb-3">
                        <img id="main-image" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="width: 400px; height: 400px;" alt="Ảnh chính">
                    </div>
                        <div id="image-list" class="col-12">
                            <!-- Danh sách ảnh sẽ được render ở đây -->
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Tên sản phẩm: <?= $sanPham['ten_san_pham'] ?></h3>
                        <hr>
                        <h4 class="mt-3">Giá tiền: <small><?= $sanPham['gia_san_pham'] ?></small></h4>
                        <h4 class="mt-3">Giá khuyến mãi: <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>
                        <h4 class="mt-3">Số lượng: <small><?= $sanPham['so_luong'] ?></small></h4>
                        <h4 class="mt-3">Lượt xem: <small><?= $sanPham['luot_xem'] ?></small></h4>
                        <h4 class="mt-3">Ngày nhập: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
                        <h4 class="mt-3">Danh mục: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
                        <h4 class="mt-3">Trạng thái:
                            <small><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></small>
                        </h4>
                        <span> Màu sắc: <br></span>
                        <div class="mt-3 btn-group">
                            <?php foreach($listMauSac as $index => $mauSac){
                                ?>
                                <button type="button" class="btn btn-outline-dark <?= $index === 0 ? 'active' : '' ?>"
                                data-color-id="<?= $mauSac['id'] ?>" 
                                data-product-id="<?= $sanPham['id'] ?>"
                                onclick="setActive(this)"><?=$mauSac['mau_sac']?></button>
                            <?php
                            } ?>
                        </div>
                        


                    </div>
                    
                    <h4 class="col-12">Mô tả: <br> <small><?= $sanPham['mo_ta'] ?></small></h4>
                </div>

                <div class="col-12">
                    <hr>
                    <h2>Bình luận của sản phẩm</h2>
                    <div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Người bình luận</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <a target="_blank"
                                            href="<?= BASE_URL_ADMIN. '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'];?>">
                                            <?= $binhLuan['ho_ten'] ?>
                                        </a>
                                    </td>
                                    <td><?= $binhLuan['noi_dung'] ?></td>
                                    <td><?= $binhLuan['ngay_dang'] ?></td>
                                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                                    <td>
                                        <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>"
                                            method="POST">
                                            <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                            <input type="hidden" name="name_view" value="detail_sanpham">
                                            <button onclick="return confirm('Bạn có muốn ẩn bình luận này không?')"
                                                class="btn btn-warning">
                                                <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn':'Bỏ ẩn' ?>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
<script>
$(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
    })
})
        window.onload = function () {
        const firstBtn = document.querySelector('.btn-group .btn');
        if (firstBtn) {
            setActive(firstBtn); // Kích hoạt nút đầu tiên
        }
    };
    function setActive(button) {
        const buttons = document.querySelectorAll('.btn-group .btn');
        buttons.forEach(btn => {
            btn.classList.remove('active');
        });
        button.classList.add('active');
        const colorId = button.getAttribute('data-color-id');
        const productId = button.getAttribute('data-product-id');

        fetch(`<?= BASE_URL_ADMIN ?>?act=lay-anh-theo-mau&id_san_pham=${productId}&id_mau_sac=${colorId}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('image-list').innerHTML = data;
            });
    }
    function changeMainImage(imgElement) {
        const mainImage = document.getElementById('main-image');
        if (mainImage) {
            mainImage.src = imgElement.src;
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>