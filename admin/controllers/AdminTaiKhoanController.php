<?php
session_start();
class AdminTaiKhoanController{
   public $modelTaiKhoan;

    public function __construct(){
         $this->modelTaiKhoan = new AdminTaiKhoan();
    }
    public function danhSachQuanTri(){
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan(1);
        
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri(){
        
        require_once './views/taikhoan/quantri/addQuanTri.php';
        deleteSessionError();
    }

    public function postAddTaiKhoan()
    {
        // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ Và Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            $_SESSION['error'] = $errors;
            // Nếu ko có lỗi thì tiến hành thêm tai khoản
            if (empty($errors)) {
                // Nếu ko có lỗi thì tiến hành thêm tài khoản
                // var_dump('Oke');
                // đặt pass mặc định là 12345678
                $password = password_hash('12345678', PASSWORD_BCRYPT);
                // var_dump($password);
                // die();
                $chuc_vu_id = 1; // Chức vụ là quản trị viên
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // Trả về form và lỗi
                $_SESSION['flash']= true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }
    public function formEditQuanTri(){
        $quan_Tri_id = $_GET['id_quan-tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($quan_Tri_id);
        // var_dump($quanTri);die();
        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionError();
    }
    public function postEditQuanTri()
    {
    // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $quan_tri_id = $_POST['id'] ?? '';

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? 1;

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ Và Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            
            $_SESSION['error'] = $errors;
            // Nếu ko có lỗi thì tiến hành thêm tai khoản
            if (empty($errors)) {
               
                $this->modelTaiKhoan->updateTaiKhoan( $quan_tri_id,$ho_ten, $email, $so_dien_thoai, $trang_thai);

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // Trả về form và lỗi
                $_SESSION['flash']= true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan-tri='.$quan_tri_id);
                exit();
            }
        }
    }
public function resetPassword(){
            $tai_khoan_id = $_GET['id_quan-tri'];
            $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
            $password = password_hash('12345678', PASSWORD_BCRYPT);
            $status= $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
            // var_dump($status);die();
            // Nếu reset mật khẩu thành công thì chuyển hướng về trang danh sách tài khoản
            // Nếu không thành công thì hiển thị thông báo lỗi
            if($status && $tai_khoan['chuc_vu_id'] == 1){
                        header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            
            }
            elseif($status && $tai_khoan['chuc_vu_id'] == 2){
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            }
            else{
                $_SESSION['flash'] = 'Reset mật khẩu thất bại';
            }
            exit();
    }
    // danh sách khách hàng
    public function danhSachKhachHang(){
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($quanTri);die();
        require_once './views/taikhoan/khachhang/editKhachHang.php';
        deleteSessionError();
    }
}