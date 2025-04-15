<?php
// session_start();
class AdminTaiKhoanController{
   public $modelTaiKhoan;
   public $modelDonHang;
   public $modelSanPham;

    public function __construct(){
         $this->modelTaiKhoan = new AdminTaiKhoan();
         $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
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
        $quan_Tri_id = $_GET['id_quan_tri'];
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
            $tai_khoan_id = $_GET['id_quan_tri'];
            $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
            // var_dump($tai_khoan);die();
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

    public function postEditKhachHang()
    {
    // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $khach_hang_id = $_POST['id'] ?? '';

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ??  '';
            $dia_chi = $_POST['dia_chi'] ??  '';
            $trang_thai = $_POST['trang_thai'] ?? '';

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
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['gioi_tinh'] = 'Vui lòng chọn trạng thái tài khoản';
            }
            $_SESSION['error'] = $errors;
            // Nếu ko có lỗi thì tiến hành thêm tai khoản
            if (empty($errors)) {
               
                $this->modelTaiKhoan->updateKhachHang(
                                                     $khach_hang_id,
                                                             $ho_ten,
                                                             $email,
                                                             $ngay_sinh,
                                                             $gioi_tinh,
                                                             $dia_chi,
                                                             $so_dien_thoai,
                                                             $trang_thai);

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                // Trả về form và lỗi
                $_SESSION['flash']= true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang='.$khach_hang_id);
                exit();
            }
        }
    }

    public function detailKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        $listDonHang  = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        
        require_once './views/taikhoan/khachhang/detailKhachHang.php';
        deleteSessionError();
    }
    
    public function formLogin(){
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit(); 
        }
    
    public function login(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // lấy email và pass gửi lên từ form 
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                // var_dump($email);die;
    
                // Xử lý kiểm tra thông tin đăng nhập
                $user = $this->modelTaiKhoan->checkLogin($email, $password);
    
                if ($user == $email) { // Trường hợp đăng nhập thành công
                    // Lưu thông tin vào session 
                    $_SESSION['user_admin'] = $user;
                    echo "<script type='text/javascript'>
                    alert('Đăng nhập Admin thành công');
                    window.location.href = '" . BASE_URL_ADMIN . "';
                     </script>";
                    // header("Location: " . BASE_URL_ADMIN);
                    exit();
                }else{
                    // Lỗi thì lưu lỗi vào session
                    $_SESSION['error'] = $user;
                    // var_dump($_SESSION['error']);die;
    
                    $_SESSION['flash'] = true;
    
                    header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                    exit(); 
                }
            }
        }
    public function logout(){
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        }
    }

    public function formEditCaNhanQuanTri(){
        $email = $_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);
        // var_dump($thongTin);die();
        require_once './views/taikhoan/canhan/editCaNhan.php';
        deleteSessionError();
    }

    public function postEditMatKhauCaNhan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'] ?? '';
            $new_pass = $_POST['new_pass'] ?? '';
            $confirm_pass = $_POST['confirm_pass'] ?? '';

            // Lấy thông tin người dùng từ session
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_admin']);
            $errors = [];

            // Kiểm tra mật khẩu cũ
            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng nhập mật khẩu cũ';
            } elseif (!password_verify($old_pass, $user['mat_khau'])) {
                $errors['old_pass'] = 'Mật khẩu cũ không đúng';
            }

            // Kiểm tra mật khẩu mới
            if (empty($new_pass)) {
                $errors['new_pass'] = 'Vui lòng nhập mật khẩu mới';
            } elseif (strlen($new_pass) < 8) {
                $errors['new_pass'] = 'Mật khẩu mới phải có ít nhất 8 ký tự';
            }

            // Kiểm tra xác nhận mật khẩu
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Vui lòng nhập lại mật khẩu mới';
            } elseif ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không khớp';
            }

            // Nếu có lỗi, lưu lỗi vào session và chuyển hướng về form
            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }

            // Nếu không có lỗi, cập nhật mật khẩu
            $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
            $status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
            if ($status) {
                $_SESSION['success'] = "Đã đổi mật khẩu thành công";
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            } else {
                $_SESSION['error'] = ['general' => 'Đổi mật khẩu thất bại, vui lòng thử lại'];
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }
    }
    
    public function postEditCaNhanQuanTri() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_GET['id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';

            $errors = [];

            // Kiểm tra dữ liệu
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ và Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }

            // Lưu lỗi vào session
            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                // Cập nhật thông tin cá nhân
                $this->modelTaiKhoan->updateKhachHang(
                    $id,
                    $ho_ten,
                    $email,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $so_dien_thoai,
                    1 // Trạng thái mặc định là 1 (active)
                );

                $_SESSION['success'] = 'Cập nhật thông tin cá nhân thành công';
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            } else {
                // Có lỗi, chuyển hướng về form
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }
    }

    public function updateAvatar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['user_id']; // Lấy ID người dùng từ session
            $avatar = $_FILES['avatar'] ?? null;

            $errors = [];

            // Kiểm tra file ảnh
            if ($avatar && $avatar['error'] === UPLOAD_ERR_OK) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($avatar['type'], $allowedTypes)) {
                    $errors['avatar'] = 'Chỉ chấp nhận các định dạng ảnh JPEG, PNG, GIF.';
                }

                if ($avatar['size'] > 2 * 1024 * 1024) { // Giới hạn 2MB
                    $errors['avatar'] = 'Kích thước ảnh không được vượt quá 2MB.';
                }
            } else {
                $errors['avatar'] = 'Vui lòng chọn một ảnh hợp lệ.';
            }

            // Nếu có lỗi, lưu lỗi vào session và chuyển hướng
            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }

            // Xử lý upload ảnh
            $avatarPath = uploadFile($avatar, './uploadADMIN/avatars/');
            if (!$avatarPath) {
                $_SESSION['error'] = ['avatar' => 'Không thể upload ảnh. Vui lòng thử lại.'];
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }

            // Cập nhật ảnh đại diện trong cơ sở dữ liệu
            $status = $this->modelTaiKhoan->updateAvatar($id, $avatarPath);

            if ($status) {
                $_SESSION['success'] = 'Cập nhật ảnh đại diện thành công.';
            } else {
                $_SESSION['error'] = ['general' => 'Cập nhật ảnh đại diện thất bại.'];
            }

            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
            exit();
        }
    }
}