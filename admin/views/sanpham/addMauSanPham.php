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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-mau-sac' ?>">
                                <button class="btn btn-success">Thêm Màu Sắc mới</button>
                            </a>
                        </div>
                        <!-- sửa -->
                        <?php
                        // var_dump($errors);die;
                        // var_dump($_SESSION['error']);
                        if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($_SESSION['error'] as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php unset($_SESSION['error']); // Xóa lỗi sau khi hiển thị ?>
                        <?php endif; ?>
                        <!-- sửa -->
                        <?php if (!$hasNewColors): ?>
                            <div class="alert alert-warning">Tất cả màu sắc đã được thêm cho sản phẩm này.
                                <a
                                    href="<?= BASE_URL_ADMIN . '?act=list-mau-bien-the&id_san_pham=' . $product['id'] ?>">
                                    <button class="btn btn-secondary">Quay lại</button>
                                </a>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?= BASE_URL_ADMIN . '?act=them-mau-san-pham&id_san_pham=' . $product['id'] ?>">
                            <div class="form-group">
                                <label>Chọn màu sắc để thêm:</label><br>
                                <div class="addColor">
                                <?php if (!empty($colorAdd)): ?>
                                    <?php foreach ($colorAdd as $color): ?>
                                        <div class="form-check ">
                                            <input 
                                                class="form-check-input " 
                                                type="checkbox" 
                                                name="colors[]" 
                                                value="<?= $color['id'] ?>" 
                                                id="color_<?= $color['id'] ?>"
                                            >
                                            <label class="form-check-label" for="color_<?= $color['id'] ?>">
                                                <?= $color['mau_sac'] ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php else: ?>
                                    <p class="text-muted">Không còn màu nào để thêm.</p>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="form-control btn btn-primary" <?= empty($colorAdd) ? 'disabled' : '' ?>>Thêm màu</button>
                        </form>

                        </div>
                    </div>
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