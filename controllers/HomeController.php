<?php
class HomeController{
    public $modelSanPham;
    public $modelTaiKhoan;

    
    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
    }
    public function home(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function chiTietSanPham(){
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

        // var_dump($listSanPhamCungDanhMuc);die;
        if($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL . '?act=san-pham');
            exit();
        }
    }
    //Login
    public function formLogin(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }
    public function postLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
    
            $errors = [];
    
            if (empty($email)) {
                $errors['email'] = "Vui lòng nhập email.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không hợp lệ.";
            }
    
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập mật khẩu.";
            }
    
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . BASE_URL . "?act=login");
                exit();
            }
    
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            unset($_SESSION['user_client']);
    
            if (is_array($user)) {
                // Đăng nhập thành công
                $_SESSION['user_client'] = $user;
                echo "<script>window.location.href = '" . BASE_URL . "';</script>";
                exit();
            } else {
                // Trả về lỗi từ model
                $_SESSION['error'] = $user;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    
    
    //Resgister
    public function formRegister(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/auth/formRegister.php';
        deleteSessionError();
        exit();
    }

    
   
}
?>