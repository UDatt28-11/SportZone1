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

    public function addGioHang()
    {
        // Đảm bảo phương thức POST đúng chữ in hoa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['user_client'])) {
                // Lấy thông tin tài khoản từ email
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    
               var_dump("hi"); 
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
    // Thêm vào giỏ hàng 
    // public function addGioHang(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         if (isset($_SESSION['user_client'])) {
    //             $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    //             // Lấy dữ liệu giỏ hàng của người dùng
    //             $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
    //             if (!$gioHang) {
    //                 $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
    //                 $gioHang = ['id'=>$gioHangId];
    //                 $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    //             }else{
    //                 $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    //             }

    //             $san_pham_id = $_POST['san_pham_id'];
    //             $so_luong = $_POST['so_luong'];

    //             $checkSanPham = false;
    //             foreach($chiTietGioHang as $detail){
    //                 if ($detail['san_pham_id'] == $san_pham_id) {
    //                     $newSoLuong = $detail['so_luong'] + $so_luong;
    //                     $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
    //                     $checkSanPham = true;
    //                     break;
    //                 }
    //             }
    //             if(!$checkSanPham){
    //                 $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
    //             }
    //             // var_dump("Thêm Thành công"); die;
    //             header("Location:" . BASE_URL . '?act=gio-hang');
    //         }else{
    //             var_dump('Chưa đăng nhập');die;
    //         }
    //     }
    // }
    public function gioHang(){
        // if (isset($_SESSION['user_client'])) {
        //     $email = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        //     // Lấy dữ liệu giỏ hàng của người dùng
            
        //     $gioHang = $this->modelGioHang->getGioHangFromUser($email['id']);
        //     if (!$gioHang) {
        //         $gioHangId = $this->modelGioHang->addGioHang($email['id']);
        //         $gioHang = ['id'=>$gioHangId];
        //         $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        //     }else{
        //         $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        //     }
            // var_dump($chiTietGioHang);die;

            require_once './views/gioHang.php';

    //     }else{
    //         header("Location: ". BASE_URL . '?act=login');
    //     }
    }
   
}
?>