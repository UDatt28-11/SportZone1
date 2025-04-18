<?php

class AdminDanhMucController
{

    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachDanhMuc()
    {

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once './views/danhmuc/listDanhMuc.php';
    }

    public function formAddDanhMuc()
    {
        // Hàm này dùng để hiển thị form nhập
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhMuc()
    {
        // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            // Xử lý upload ảnh
            $hinh_anh = '';
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
                $hinh_anh = uploadFile($_FILES['hinh_anh'], './uploads/categories');
                if (!$hinh_anh) {
                    $errors['hinh_anh'] = 'Upload ảnh thất bại';
                }
            }

            // Nếu ko có lỗi thì tiến hành thêm danh mục
            if (empty($errors)) {
                // Nếu ko có lỗi thì tiến hành thêm danh mục
                // var_dump('Oke');

                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta, $hinh_anh);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // Trả về form và lỗi
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }

    public function formEditDanhMuc()
    {
        // Hàm này dùng để hiển thị form nhập
        // Lấy ra thông tin của danh mục cần sửa
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function postEditDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id = $_POST['id'] ?? "";
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? "";
            $mo_ta = $_POST['mo_ta'] ?? "";

            // Lấy thông tin danh mục cũ
            $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

            // Giữ ảnh cũ nếu không upload ảnh mới
            $hinh_anh = $danhMuc['hinh_anh'];

            // Tạo mảng errors trước
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            // Xử lý upload ảnh mới
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
                // Xóa ảnh cũ nếu có
                if (!empty($danhMuc['hinh_anh'])) {
                    deleteFile($danhMuc['hinh_anh']);
                }
                // Upload ảnh mới
                $hinh_anh_moi = uploadFile($_FILES['hinh_anh'], './uploads/categories/');
                if ($hinh_anh_moi) {
                    $hinh_anh = $hinh_anh_moi;
                } else {
                    $errors['hinh_anh'] = 'Upload ảnh thất bại';
                }
            }

            // Nếu không có lỗi thì tiến hành sửa danh mục
            if (empty($errors)) {
                $result = $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta, $hinh_anh);
                if ($result) {
                    header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                    exit();
                }
            }

            // Nếu có lỗi, trả về form với dữ liệu và thông báo lỗi
            $_SESSION['error'] = $errors;
            $danhMuc = [
                'id' => $id,
                'ten_danh_muc' => $ten_danh_muc,
                'mo_ta' => $mo_ta,
                'hinh_anh' => $hinh_anh
            ];
            require_once './views/danhmuc/editDanhMuc.php';
        }
    }

    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if ($danhMuc) {
            // Kiểm tra xem danh mục có sản phẩm hay không
            if ($this->modelDanhMuc->hasProducts($id)) {
                // Nếu có sản phẩm, lưu thông báo lỗi vào session
                $_SESSION['error'] = "Danh mục đang có sản phẩm, không thể xóa.";
            } else {
                // Nếu không có sản phẩm, tiến hành xóa
                $this->modelDanhMuc->destroyDanhMuc($id);
                $_SESSION['success'] = "Xóa danh mục thành công.";
            }
        } else {
            $_SESSION['error'] = "Danh mục không tồn tại.";
        }

        // Chuyển hướng về danh sách danh mục
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
}
