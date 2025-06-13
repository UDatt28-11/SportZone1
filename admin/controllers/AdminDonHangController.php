<?php

class AdminDonHangController
{
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }

    public function danhSachDonHang()
    {
        try {
            // Lấy danh sách trạng thái
            $trangThaiModel = new TrangThai();
            $trangThaiList = $trangThaiModel->getAllTrangThai();
            
            // Lấy danh sách đơn hàng theo trạng thái được chọn
            $trangThaiIds = [];
            if (isset($_GET['trang_thai']) && is_array($_GET['trang_thai']) && !empty($_GET['trang_thai'])) {
                $trangThaiIds = array_map('intval', $_GET['trang_thai']);
            }
            
            $donHangModel = new AdminDonHang();
            $listDonHang = $donHangModel->getDonHangByStatus($trangThaiIds);
            
            // Lấy thông tin chi tiết cho mỗi đơn hàng
            foreach ($listDonHang as &$donHang) {
                $donHang['chi_tiet'] = $donHangModel->getListSpDonHang($donHang['id']);
            }
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            require_once 'views/donhang/listDonHang.php';
        } catch (Exception $e) {
            error_log("Lỗi trong danhSachDonHang: " . $e->getMessage());
            $_SESSION['error'] = "Có lỗi xảy ra khi lấy danh sách đơn hàng";
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit;
        }
    }
    public function postEditStatus()  {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id_don_hang'] ?? null;
            $trang_thai_id = $_POST['trang_thai_id'] ?? null;
            $yCH = $_POST['yeuCauHuy'] ?? 'n';
            $return = true;
        
            if (!$id || !$trang_thai_id) {
                $_SESSION['error'] = "Thiếu thông tin đơn hàng";
                header("Location: ...");
                exit;
            }
            $chiTiet = $this->modelDonHang->getListSpDonHang($id);
            if($trang_thai_id == 2){
                
                
                $duHang = true;
                foreach($chiTiet as $item){
                    $id_variant = intval($item['bien_the_id']);
                    $soLuongHienTai = $this->modelSanPham->getBienTheById($id_variant);

                    if(intval($soLuongHienTai['ton_kho']) < intval($item['so_luong'])){
                        $duHang = false;
                        break;
                    }
                }

                if(!$duHang){
                    $_SESSION['error'] = "Không đủ hàng trong kho để xử lý đơn hàng";
                    $return = false;
                } else {
                    // Trừ kho thật sự
                    foreach($chiTiet as $item){
                        $id_variant = intval($item['bien_the_id']);
                        $soLuongHienTai = $this->modelSanPham->getBienTheById($id_variant);
                        $soLuongMoi = intval($soLuongHienTai['ton_kho']) - intval($item['so_luong']);
                        $this->modelSanPham->editSLBienThe($id_variant, $soLuongMoi);
                    }
                }

                // die();
            }

            if($trang_thai_id == 13 || $yCH == "y"){
                
                // echo '<pre>'; var_dump($chiTiet); die;
                foreach($chiTiet as $item){
                    $soLuongHienTai = $this->modelSanPham->getBienTheById($item['bien_the_id']);
                    $soLuongMoi = $soLuongHienTai['ton_kho'] + $item['so_luong'];
                    $this->modelSanPham->editSLBienThe($item['bien_the_id'], $soLuongMoi);
                }
            }
            
            if($return == false){
                $_SESSION['error'] = "Không đủ hàng trong kho để xử lý đơn hàng";
                $redirect = $_SESSION['redirect_url'] ?? BASE_URL_ADMIN . '?act=don-hang';
                unset($_SESSION['redirect_url']);
                echo '
                <script>
                alert("'.$_SESSION['error'] .'");
                window.location.href = "'. $redirect .'";
                </script>';
                
                exit;
            }else{
                $this->modelDonHang->updateTrangThaiDonHang($id, $trang_thai_id);
                $redirect = $_SESSION['redirect_url'] ?? BASE_URL_ADMIN . '?act=don-hang';
                unset($_SESSION['redirect_url']);
                echo '
                <script>
                alert("Đã cập nhật trạng thái đơn hàng ");
                window.location.href = "'. $redirect .'";
                </script>';
                
                exit;
            }
            
        }
        
    }
    public function cancel(){
        try {
            // Kiểm tra và lấy ID đơn hàngf1
            $donHangId = isset($_GET['id_don_hang']) ? intval($_GET['id_don_hang']) : 0;
            
            if ($donHangId <= 0) {
                throw new Exception("Không tìm thấy đơn hàng");
            }

            // Lấy thông tin đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if (!$donHang) {
                throw new Exception("Đơn hàng không tồn tại");
            }
            
            // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
            if ($donHang['tai_khoan_id'] != $_SESSION['user_id']) {
                throw new Exception("Bạn không có quyền thực hiện thao tác này");
            }

            // Kiểm tra trạng thái đơn hàng
            if ($donHang['trang_thai_id'] != 1 && $donHang['trang_thai_id'] != 2) {
                throw new Exception("Không thể hủy đơn hàng ở trạng thái này");
            }

            // Hủy đơn hàng (cập nhật trạng thái thành 11 - Đã hủy)
            $result = $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);

            if (!$result) {
                throw new Exception("Không thể hủy đơn hàng");
            }

            $_SESSION['success'] = "Đã hủy đơn hàng thành công";
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();

        } catch (Exception $e) {
            error_log("Error in DonHangController::huyDonHang(): " . $e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    }

    public function detailDonHang()
    {
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);
        $listChiTietDonHang = $this->modelDonHang->getListSpDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        if ($donHang) {
            require_once './views/donhang/detailDonHang.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    }

    public function formEditDonHang()
    {
        // Hàm này dùng để hiển thị form nhập
        // Lấy ra thông tin của đơn hàng cần sửa
        $id = $_GET['id_don_hang'];

        $donHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        
        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=don_hang');
            exit();
        }
    }


    public function postEditDonHang()
    {
        // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            // Lấy ra dữ liệu cũ của đơn hàng 
            
            $don_hang_id = $_POST['don_hang_id'] ?? '';
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';
            

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên không được để trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại không được để trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email không được để trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
            }
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trạng thái đơn hàng lỗi';
            }

            $_SESSION['error'] = $errors;
            // var_dump($errors);die;


            // Nếu ko có lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {

                // Nếu ko có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');
                
                $a =$this->modelDonHang->updateDonHang(
                    $don_hang_id,
                    $ten_nguoi_nhan,
                    $sdt_nguoi_nhan,
                    $email_nguoi_nhan,
                    $dia_chi_nguoi_nhan,
                    $trang_thai_id,
                    $ghi_chu,
                );
                // var_dump($a);die;
                
                header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                // Trả về form và lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form 
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }

    // // Sửa album ảnh
    // - Sửa ảnh cũ
    //  + Thêm ảnh mới 
    //  + Không thêm ảnh mới
    // - Không sửa ảnh cũ
    //  + Thêm ảnh mới 
    //  + Không thêm ảnh Xóa ảnh cũ
    //  + Thêm ảnh mới 
    //  + Không thêm ảnh mới 

    // public function postEditAnhSanPham()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $san_pham_id = $_POST['san_pham_id'] ?? '';

    //         // Lấy danh sách ảnh hiện tại của sản phẩm
    //         $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

    //         // xử lý các ảnh được gửi từ form
    //         $img_array = $_FILES['img_array'];
    //         $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
    //         $current_img_ids = $_POST['current_img_ids'] ?? [];

    //         // Khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ 
    //         $upload_file = [];

    //         // Upload ảnh mới hoặc thay thế ảnh cũ 
    //         foreach ($img_array['name'] as $key => $value) {
    //             if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
    //                 $new_file = uploadFileAlbum($img_array, './uploads/', $key);
    //                 if ($new_file) {
    //                     $upload_file[] = [
    //                         'id' => $current_img_ids[$key] ?? null,
    //                         'file' => $new_file
    //                     ];
    //                 }
    //             }
    //         }

    //         // Lưu ảnh mới vào db và xóa ảnh cũ nếu có 
    //         foreach ($upload_file as $file_info) {
    //             if ($file_info['id']) {
    //                 $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

    //                 // cập nhật ảnh cũ
    //                 $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

    //                 // xóa ảnh cũ
    //                 deleteFile($old_file);
    //             } else {
    //                 // Thêm ảnh mới 
    //                 $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
    //             }
    //         }

    //         // Xử lý xóa ảnh 
    //         foreach ($listAnhSanPhamCurrent as $anhSP) {
    //             $anh_id = $anhSP['id'];
    //             if (in_array($anh_id, $img_delete)) {
    //                 // Xóa ảnh trong db
    //                 $this->modelSanPham->destroyAnhSanPham($anh_id);

    //                 // Xóa file 
    //                 deleteFile($anhSP['link_hinh_anh']);
    //             }
    //         }
    //         header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
    //         exit();
    //     }
    // }


    // public function deleteSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $sanPham = $this->modelSanPham->getDetailSanPham($id);

    //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);


    //     if ($sanPham) {
    //         deleteFile($sanPham['hinh_anh']);
    //         $this->modelSanPham->destroySanPham($id);
    //     }
    //     if ($listAnhSanPham) {
    //         foreach ($listAnhSanPham as $key => $anhSP) {
    //             deleteFile($anhSP['link_hinh_anh']);
    //             $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
    //         }
    //     }

    //     header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
    //     exit();
    // }


    // public function detailSanPham()
    // {
    //     $id = $_GET['id_san_pham'];

    //     $sanPham = $this->modelSanPham->getDetailSanPham($id);

    //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

    //     $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
    //     // var_dump($listAnhSanPham);die;
    //     if ($sanPham) {
    //         require_once './views/sanpham/detailSanPham.php';
    //     } else {
    //         header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
    //         exit();
    //     }
    // }

    // public function updateTrangThaiBinhLuan()
    // {
    //     $id_binh_luan = $_POST['id_binh_luan'];
    //     $name_view = $_POST['name_view'];
    //     $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);

    //     if ($binhLuan) {
    //         $trang_thai_update = '';
    //         if ($binhLuan['trang_thai'] == 1) {
    //             $trang_thai_update = 2;
    //         } else {
    //             $trang_thai_update = 1;
    //         }
    //         $status = $this->modelSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
    //         if ($status) {
    //             if ($name_view == 'detail_khach') {
    //                 header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id']);
    //             }else{
    //                 header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
    //             }
    //         }
    //     }
    // }
}