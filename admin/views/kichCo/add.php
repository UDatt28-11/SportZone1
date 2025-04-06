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
                    <h1>Quản lý danh sách kích cỡ</h1>
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
                            <h3 class="card-title">Thêm kích cỡ</h3>
                        </div>
                        <!-- sửa -->
                        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
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
                        <form action="<?= BASE_URL_ADMIN . 'index.php?act=them-kich-co' ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="row card-body ">
                                <div class="form-group col-12">
                                    <label>Tên kích cỡ</label>
                                    <input type="text" class="form-control" name="kich_co"
                                        placeholder="Nhập tên kích cỡ">
                                    <?php if (isset($_SESSION['error']['kich_co'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['kich_co'] ?></p>
                                    <?php } ?>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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