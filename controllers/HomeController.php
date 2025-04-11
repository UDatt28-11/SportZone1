<?php
class HomeController{
    public $modelSanPham;
    public $modelTaiKhoan;
    // public $modelMauSac;

    
    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        // $this->modelMauSac = new Color();
    }
    public function home(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function chiTietSanPham(){
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listMauSac = $this->modelSanPham->getAllMauCuaBienThe($id);

        // $listKichCo = $this->modelSanPham->getKichCoHienThi($id);
        // var_dump($listKichCo);die();

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

        if ($_GET['act'] == 'lay-anh-theo-mau') {
            $idSanPham = $_GET['id_san_pham'];
            $idMauSac = $_GET['id_mau_sac'];
            $listSize = $this->modelSanPham->getGoiSizeMauSanPham($idSanPham, $idMauSac);
            foreach ($listSize as $Size) {
                echo '<button type="button" onclick="setActiveSize(this)" class="btn btn-outline-dark">' . $Size['kich_co'] . '</button>';
            }
            exit;
        }
        
        // var_dump($listSanPhamCungDanhMuc);die;
        if($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL . '?act=san-pham');
            exit();
        }
    }
    public function getListSizeTheoMau() {
        $productId = $_GET['id_san_pham'];
        $colorId = $_GET['id_mau_sac'];
        $listKichCo = $this->modelSanPham->getGoiSizeMauSanPham($productId, $colorId);
    
        // Render view nhỏ chỉ chứa danh sách ảnh
        include './views/_partial_size_list.php';
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
    //Resgister
    public function formRegister(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/auth/formRegister.php';
        deleteSessionError();
        exit();
    }

    
   
}
?>