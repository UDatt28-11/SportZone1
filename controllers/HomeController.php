<?php
class HomeController{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;

    
    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang($_SESSION['user_id']);
    }
    public function home(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        // var_dump($listSanPham);
        require_once './views/home.php';
    }
    public function chiTietSanPham(){
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        // var_dump($sanPham);

        $listGioHang = $this->modelGioHang->getGioHang();
        // var_dump($listGioHang);
        $soLuongHangTrongGio = count($listGioHang);
        // var_dump($soLuongHangTrongGio);

        $listMauSac = $this->modelSanPham->getAllMauCuaBienThe($id);

        // $listKichCo = $this->modelSanPham->getKichCoHienThi($id);
        // var_dump($listKichCo);die();

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

        // var_dump($listSanPhamCungDanhMuc);die();
        
        // var_dump($listSanPhamCungDanhMuc);die;
        if($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL . '?act=/');
            exit();
        }
    }
    public function getListAnhTheoMau() {
        $productId = $_GET['id_san_pham_tt'];
        $colorId = $_GET['id_mau_sac'];
        $images = $this->modelSanPham->getGoiAnhMauSanPham($productId, $colorId);
    
        // Render view nhỏ chỉ chứa danh sách ảnh
        include './views/_partial_image_list.php';
    }
    public function layThongTinBienThe() {
        $idBienThe = $_GET['id_bien_the'];
        // var_dump($idBienThe);
        $bienThe = $this->modelSanPham->getBienTheById($idBienThe);
        // var_dump($bienThe);die;

        if ($bienThe) {
            header('Content-Type: application/json');
            echo json_encode([
                'id' => $bienThe['id'],
                'don_gia' => $bienThe['don_gia'] ?? 0,
                'ton_kho' => $bienThe['ton_kho'] ?? 0
            ]);
        } else {
            header('Content-Type: application/json');
            echo json_encode([
                'error' => 'Không tìm thấy biến thể'
            ]);
        }
        exit;
    }
    public function getListSizeTheoMau() {
        $productId = $_GET['id_san_pham_tt'];
        $colorId = $_GET['id_mau_sac'];
        $listKichCo = $this->modelSanPham->getGoiSizeMauSanPham($productId, $colorId);
    
        // Render view nhỏ chỉ chứa danh sách ảnh
        include './views/_partial_size_list.php';
    }
    public function formGioHang(){


        require_once './views/gioHang.php';
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
                $_SESSION['user_id'] = $user['id'];
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
    public function postRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $ho_ten = trim($_POST['ho_ten'] ?? '');
            $ngay_sinh = trim($_POST['ngay_sinh'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $so_dien_thoai = trim($_POST['so_dien_thoai'] ?? '');
            $gioi_tinh = trim($_POST['gioi_tinh'] ?? '');
            $dia_chi = trim($_POST['dia_chi'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $confirmPassword = trim($_POST['confirmPassword'] ?? '');
            $agreeTerms = isset($_POST['remember']);
    
            $errors = [];
    
            // Validate họ tên
            if (empty($ho_ten)) {
                $errors['ho_ten'] = "Vui lòng nhập họ tên.";
            }
    
            // Validate ngày sinh
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = "Vui lòng nhập ngày sinh.";
            }
    
            // Validate email
            if (empty($email)) {
                $errors['email'] = "Vui lòng nhập địa chỉ email.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không hợp lệ.";
            }
            // Validate số điện thoại
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = "Vui lòng nhập số điện thoại.";
            }
    
            // Validate giới tính
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = "Vui lòng chọn giới tính.";
            }
    
            // Validate địa chỉ
            if (empty($dia_chi)) {
                $errors['dia_chi'] = "Vui lòng nhập địa chỉ.";
            }
    
            // Validate mật khẩu
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập mật khẩu.";
            } elseif (strlen($password) < 6) {
                $errors['password'] = "Mật khẩu phải có ít nhất 6 ký tự.";
            }
    
            // Validate xác nhận mật khẩu
            if (empty($confirmPassword)) {
                $errors['confirmPassword'] = "Vui lòng xác nhận mật khẩu.";
            } elseif ($password !== $confirmPassword) {
                $errors['confirmPassword'] = "Mật khẩu xác nhận không khớp.";
            }
    
            // Kiểm tra đồng ý điều khoản
            if (!$agreeTerms) {
                $errors['agree'] = "Bạn phải đồng ý với điều khoản.";
            }
    
            // Nếu có lỗi, quay lại form
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = $_POST;
                header("Location: " . BASE_URL . "?act=register");
                exit();
            }
    
            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
            // Tiến hành đăng ký
            $user = $this->modelTaiKhoan->registerUser([
                'ho_ten' => $ho_ten,
                'ngay_sinh' => $ngay_sinh,
                'email' => $email,
                'so_dien_thoai' => $so_dien_thoai,
                'gioi_tinh' => $gioi_tinh,
                'dia_chi' => $dia_chi,
                'mat_khau' => $hashedPassword,
            ]);
    
            // Gỡ user cũ (nếu có)
            unset($_SESSION['user_client']);
    
            if (is_array($user)) {
                // Lưu user nếu cần
                $_SESSION['user_client'] = $user;
            
                // Hiển thị thông báo và chuyển hướng sau khi đăng ký thành công
                echo "<script>
                    window.location.href = '" . BASE_URL . "?act=login';
                </script>";
                exit();
            } else {
                // Nếu có lỗi thì giữ lại dữ liệu cũ và thông báo lỗi
                $_SESSION['error'] = $user;
                $_SESSION['old'] = $_POST;
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
    
              
                //Lấy dữ liệu người dùng 
                // $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

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