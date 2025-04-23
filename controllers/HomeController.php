<?php
class HomeController{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelDanhMuc;
    public $modelGioHang;

    
    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelDanhMuc = new DanhMuc();
        // Chỉ khởi tạo GioHang nếu user đã đăng nhập
        if (isset($_SESSION['user_id'])) {
            $this->modelGioHang = new GioHang($_SESSION['user_id']);

        }
        
    }
    public function home(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        
        // Khởi tạo biến giỏ hàng
        $listGioHang = [];
        // $soLuongHangTrongGio = 0;
        
        // // Chỉ lấy giỏ hàng nếu đã đăng nhập và modelGioHang đã được khởi tạo
        // if (isset($_SESSION['user_id']) && $this->modelGioHang) {
        //     $listGioHang = $this->modelGioHang->getGioHang();
        //     $soLuongHangTrongGio = count($listGioHang);
        // }
        
        require_once './views/home.php';
    }
    public function chiTietSanPham(){
        if (!isset($_GET['id_san_pham'])) {
            header("Location: " . BASE_URL);
            exit();
        }

        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        if (!$sanPham) {
            header("Location: " . BASE_URL);
            exit();
        }

        // Xử lý giỏ hàng
        $listGioHang = [];
        // $soLuongHangTrongGio = 0;
        if ($this->modelGioHang) {
            $listGioHang = $this->modelGioHang->getGioHang();
            $_SESSION['SLTGH'] = count($listGioHang);
        }
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        // var_dump($listDanhMuc);die;
        $listMauSac = $this->modelSanPham->getAllMauCuaBienThe($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        
        require_once './views/detailSanPham.php';
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
        $listGioHang = $this->modelGioHang->getGioHang();
        $soLuongHangTrongGio = count($listGioHang);
        // var_dump($listGioHang);
        // echo '<pre>';
        // print_r($listGioHang);
        // echo '</pre>';
        $tongTien = 0;
        foreach ($listGioHang as $gioHang) {
            $donGia = floatval($gioHang['don_gia']);
            $soLuong = intval($gioHang['so_luong']);
            $tongTien += $donGia * $soLuong;
        }

        require_once './views/gioHang.php';
    }
    
    //Login
    public function formLogin(){
        if(!empty($_SESSION['user']) ){
            header('Location:' . BASE_URL . '?act=/');
            exit;
        }
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }
    public function postLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            // print_r($user);die;

            if (is_array($user)) {
                // Đăng nhập thành công
                $_SESSION['user'] = $user;
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['chuc_vu_id'] = $user['chuc_vu_id'];
                
                // Xóa các session lỗi nếu có
                unset($_SESSION['errors']);
                unset($_SESSION['error']);
                
                // Chuyển hướng về trang chủ
                header("Location: " . BASE_URL);
                exit();
            } else {
                // Đăng nhập thất bại
                $_SESSION['error'] = $user;
                header("Location: " . BASE_URL . "?act=login");
                exit();
            }
        }
    }
    //logout
    public function logout(){
        session_destroy();
        header('Location: ' . BASE_URL);
        exit;
    }
    //Resgister
    public function formRegister(){
        if(!empty($_SESSION['user']) ){
            header('Location:' . BASE_URL . '?act=/');
            exit;
        }
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
            unset($_SESSION['user']);
    
            if (is_array($user)) {
                // Lưu user nếu cần
                $_SESSION['user'] = $user;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['chuc_vu_id'] = $user['chuc_vu_id'];
            
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
    
    public function binhLuan(){
        try{
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $user_id = $_SESSION['user_id'];
                $noi_dung = $_POST['noi_dung'] ?? ''; // Lấy nội dung bình luận
                $id_san_pham = $_POST['id_san_pham'] ?? null;
                // var_dump($id_san_pham);die;
                if (empty($noi_dung)) {
                    throw new Exception("Nội dung bình luận không được để trống.");
                }
                // Tiến hành thêm bình luận
                $this->modelSanPham->binhLuan($id_san_pham, $user_id, $noi_dung);
                // $_SESSION['success'] = "Bình luận đã được thêm thành công.";
                header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $id_san_pham);
                exit();
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
        }
    }
    
    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (!isset($_SESSION['user_id'])) {
                echo json_encode(['error' => 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng']);
                exit;
            }

            // Kiểm tra modelGioHang đã được khởi tạo chưa
            if (!$this->modelGioHang) {
                try {
                    $this->modelGioHang = new GioHang($_SESSION['user_id']);
                } catch (Exception $e) {
                    echo json_encode(['error' => 'Không thể khởi tạo giỏ hàng']);
                    exit;
                }
            }

            // Lấy dữ liệu từ POST
            $bienTheId = $_POST['bien_the_id'] ?? null;
            $soLuong = intval($_POST['so_luong'] ?? 1);

            // Validate dữ liệu
            if (!$bienTheId || $soLuong < 1) {
                echo json_encode(['error' => 'Dữ liệu không hợp lệ']);
                exit;
            }

            try {
                // Thêm sản phẩm vào giỏ hàng
                $this->modelGioHang->themVaoGio($bienTheId, $soLuong);
                
                // Lấy thông tin giỏ hàng mới nhất
                $gioHang = $this->modelGioHang->getGioHang();
                
                echo json_encode([
                    'success' => true,
                    'message' => 'Thêm sản phẩm vào giỏ hàng thành công',
                    'cart' => $gioHang
                ]);
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
            exit;
        }
    }

    public function gioHang(){
        $listGioHang = $this->modelGioHang->getGioHang();

        require_once './views/gioHang.php';
    }
   
}
?>