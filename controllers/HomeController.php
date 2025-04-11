<?php
class HomeController{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    
    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
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
                $errors['email'] = "Vui lòng nhập thông tin email.";
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
    //logout
    public function logout(){
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header("Location: " . BASE_URL );
        }
    }
    //Resgister
    public function formRegister(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/auth/formRegister.php';
        deleteSessionError();
        exit();
    }
    public function postResgister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $confirmPassword = trim($_POST['confirmPassword'] ?? '');
            $agreeTerms = isset($_POST['remember']) ? true : false;
    
            $errors = [];
    
            // Validate email
            if (empty($email)) {
                $errors['email'] = "Vui lòng nhập địa chỉ email.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không hợp lệ.";
            }
    
            // Validate password
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập mật khẩu.";
            } elseif (strlen($password) < 6) {
                $errors['password'] = "Mật khẩu phải có ít nhất 6 ký tự.";
            }
    
            // Validate confirm password
            if (empty($confirmPassword)) {
                $errors['confirmPassword'] = "Vui lòng xác nhận mật khẩu.";
            } elseif ($password !== $confirmPassword) {
                $errors['confirmPassword'] = "Mật khẩu xác nhận không khớp.";
            }
    
            // Kiểm tra đồng ý điều khoản
            if (!$agreeTerms) {
                $errors['agree'] = "Bạn phải đồng ý với điều khoản.";
            }
    
            // Nếu có lỗi
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = $_POST;
    
                //  KHÔNG redirect nữa - Gọi trực tiếp view luôn
                header("Location: " . BASE_URL . "?act=register");
                exit();
            }
    
            // Gọi hàm register từ model
            $user = $this->modelTaiKhoan->registerUser($email, $password);
            unset($_SESSION['user_client']);
    
            if (is_array($user)) {
                // Đăng ký thành công, đăng nhập
                $_SESSION['user_client'] = $user;
                echo "<script>window.location.href = '" . BASE_URL . "';</script>";
                exit();
            } else {
                // Đăng ký thất bại (VD: Email đã tồn tại)
                $_SESSION['error'] = $user;
                $_SESSION['old'] = $_POST;
    
                // Trở lại form mà không redirect
                header("Location: " . BASE_URL . "?act=register");
                exit();
            }
        }
    }
    
    
    public function addGioHang()
    {
        // Đảm bảo phương thức POST đúng chữ in hoa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['user_client'])) {
                // Lấy thông tin tài khoản từ email
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    
               var_dump($mail['id']); 
                die;
                //Lấy dữ liệu người dùng 
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            }else{
                var_dump("chưa đăng nhập"); die;
            }
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
        }
    }

    public function gioHang(){
            require_once './views/gioHang.php';
    }
   
}
?>