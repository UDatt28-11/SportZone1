<?php

class AdminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelDonHang;
    public $modelMau;
    public $modelSize;

    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDonHang = new AdminDonHang();
        $this->modelDanhMuc = new AdminDanhMuc();
        $this->modelMau = new Color();
        $this->modelSize = new Size();
    }

    public function danhSachSanPham()
    {

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham()
    {
        // Hàm này dùng để hiển thị form nhập
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listMau = $this->modelMau->getAllColors();
        require_once './views/sanpham/addSanPham.php';

        // Xóa session sau khi load trang 
        deleteSessionError();
    }

    public function postAddSanPham()
    {
        // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            // $ngay_nhap = date('Y-m-d');
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            // var_dump($hinh_anh); die();
            // Lưu hình ảnh vào 
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            // mảng hình ảnh 
            // $img_array = $_FILES['img_array'];

            $colors = $_POST['colors'];


            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'giá sản phẩm không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'số lượng sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'danh mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái sản phẩm phải chọn';
            }
            if (empty($hinh_anh)) {
                $errors['hinh_anh'] = 'Phải chọn ảnh sản phẩm';
            }

            if (empty($colors)) {
                $errors['mau_sac'] = 'Phải chọn màu sắc';
            }
            
            $_SESSION['error'] = $errors;
            

            // Nếu ko có lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu ko có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');
                $san_pham_id = $this->modelSanPham->insertSanPham(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb,
                    $colors
                );

                // Xử lý thêm album ảnh sản phẩm img_array
                // if (!empty($img_array['name'])) {
                //     foreach ($img_array['name'] as $key => $value) {
                //         $file = [
                //             'name' => $img_array['name'][$key],
                //             'type' => $img_array['type'][$key],
                //             'tmp_name' => $img_array['tmp_name'][$key],
                //             'error' => $img_array['error'][$key],
                //             'size' => $img_array['size'][$key]
                //         ];

                //         // $link_hinh_anh = uploadFile($file, './uploads/');
                //         // $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                //     }
                // }


                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // Trả về form và lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form 
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }

    public function formAllBienThe(){
        $id = $_GET['id_san_pham'];
        $listBienThe = $this->modelSanPham->getAllBienTheFromSP($id);
        $product = $this->modelSanPham->getDetailSanPham($id);
        if($listBienThe){
            require_once './views/sanpham/listBienThe.php';
        }else{
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function listMauCuaBienThe(){
        $id = $_GET['id_san_pham'];
        $listMauCuaBienThe = $this->modelSanPham->getAllMauCuaBienThe($id);
        $product = $this->modelSanPham->getDetailSanPham($id);
        if($listMauCuaBienThe){
            require_once './views/sanpham/listMauCuaBienThe.php';
            deleteSessionError();
        }else{
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function formAddMauBienThe() {
        $id = $_GET['id_san_pham'];
        $product = $this->modelSanPham->getDetailSanPham($id);
        $listMauBienThe = $this->modelSanPham->getAllMauCuaBienThe($id);
        $colors = $this->modelMau->getAllColors();
    
        $existingColors = array_column($listMauBienThe, 'mau_sac');
        $colorAdd = [];
    
        foreach ($colors as $color) {
            if (!in_array($color['mau_sac'], $existingColors)) {
                $colorAdd[] = $color;
            }
        }
    
        // Thêm biến flag để biết có màu để thêm hay không
        $hasNewColors = !empty($colorAdd);
    
        // Truyền vào view tất cả các màu (đã có & mới) + flag
        require_once './views/sanpham/addMauSanPham.php';
        deleteSessionError();
    }
    
    public function addMauBienThe() {
        $id = $_GET['id_san_pham'];
        $sizes = $this->modelSize->getAllIdSizes();
        $product = $this->modelSanPham->getDetailSanPham($id);
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $colors = $_POST['colors'];
            // var_dump($colors);die();
            // var_dump($sizes);die();
            // Kiểm tra xem $colors có phải là mảng không
                foreach ($colors as $color) {
                        foreach ($sizes as $size) {
                            // var_dump($size);die();
                                $this->modelSanPham->addMauBienThe(
                                    $product['id'],
                                    $color,
                                    $size['id'],
                                    $product['gia_khuyen_mai']
                                );
                }
            }
            // Chuyển hướng sau khi thêm
            header("Location: " . BASE_URL_ADMIN . '?act=list-mau-bien-the&id_san_pham=' . $id);
            exit;
        }
    }
    public function deleteMauCuaBienThe(){
        $id = $_GET['id_san_pham'];
        $mau = $_GET['id_mau_sac'];
        try {
            $this->modelSanPham->deleteMauCuaBienThe($id, $mau);
            header("Location: " . BASE_URL_ADMIN . '?act=list-mau-bien-the&id_san_pham='. $id);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
    public function postHinhAnh(){
        $id = $_GET['id_san_pham'];
        $product = $this->modelSanPham->getDetailSanPham($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $color_ids = $_POST['color_id'] ?? [];
            
            foreach ($color_ids as $color_id) {
                // var_dump($_FILES['images']);die;
                if (isset($_FILES['images']['name'][$color_id])) {
                    $fileNames = $_FILES['images']['name'][$color_id];
                    $tmpNames = $_FILES['images']['tmp_name'][$color_id];
                    $errors = $_FILES['images']['error'][$color_id];
                    $sizes = $_FILES['images']['size'][$color_id];
                    $types = $_FILES['images']['type'][$color_id];
    
                    foreach ($fileNames as $index => $name) {
                        if ($errors[$index] === UPLOAD_ERR_OK) {
                            // Tạo file giả giống $_FILES structure
                            $file = [
                                'name' => $fileNames[$index],
                                'tmp_name' => $tmpNames[$index],
                                'error' => $errors[$index],
                                'size' => $sizes[$index],
                                'type' => $types[$index]
                            ];
                            // var_dump($file);
                            $uploadedPath = uploadFile($file, './uploads/');
                            // var_dump($product['id'], $color_id, $uploadedPath);

                            if ($uploadedPath) {
                                // Lưu vào DB
                                $this->modelSanPham->insertGoiAnhSanPham($product['id'], $color_id, $uploadedPath);
                            }
                        }
                    }
                }else{
                    $this->modelSanPham->insertGoiAnhSanPham($product['id'], $color_id, null);
                }
            }
    
            $_SESSION['message'] = "Thêm gói ảnh thành công!";
            header("Location: " . BASE_URL_ADMIN . '?act=list-mau-bien-the&id_san_pham=' . $product['id']);
            exit();
        }
    }
    public function listAnhMauSanPham(){
        $id = $_GET['id_san_pham'];
        $product = $this->modelSanPham->getDetailSanPham($id);
        $id_color = $_GET['id_mau_sac'];
        $mauSanPham = $this->modelMau->getColorById($id_color);
        $goiAnh = $this->modelSanPham->getGoiAnhMauSanPham($id, $id_color);
        if($goiAnh){
            require_once './views/sanpham/listAnhSanPham.php';
            deleteSessionError();
        }else{
            // header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function postEditAnhMauSanPham(){
        $productId = $_GET['id_san_pham'];
        $product = $this->modelSanPham->getDetailSanPham($productId);
        $colorId = $_GET['id_mau_sac'];
        $mauSanPham = $this->modelMau->getColorById($colorId);
        if($_SERVER['REQUEST_METHOD']){
            foreach ($_FILES['new_image']['name'] as $id => $name) {
                if ($_FILES['new_image']['error'][$id] === UPLOAD_ERR_OK) {
                    // Xử lý upload ảnh mới
                    $file = [
                        'name' => $_FILES['new_image']['name'][$id],
                        'type' => $_FILES['new_image']['type'][$id],
                        'tmp_name' => $_FILES['new_image']['tmp_name'][$id],
                        'error' => $_FILES['new_image']['error'][$id],
                        'size' => $_FILES['new_image']['size'][$id],
                    ];

                    // Lấy ảnh cũ để xóa
                    $oldImage = $this->modelSanPham->getDetailAnhSanPham($id);
                    if (!empty($oldImage['link_hinh_anh'])) {
                        deleteFile($oldImage['link_hinh_anh']);
                    }

                    // Upload ảnh mới
                    $uploadedPath = uploadFile($file, '../uploads/');
                    if ($uploadedPath) {
                        // Cập nhật ảnh mới cho ID tương ứng
                        $this->modelSanPham->updateAnhSanPham($id, $uploadedPath);
                    }
                }
            }
            header("Location: " . BASE_URL_ADMIN . "?act=list-goi-hinh-anh&id_san_pham=" . $product['id'] . "&id_mau_sac=" . $mauSanPham['id']);
            exit();
        }
    }    public function deleteAnhMauSanPham(){
        $id_anh = $_GET['id_anh'];
        $productId = $_GET['id_san_pham'];
        $product = $this->modelSanPham->getDetailSanPham($productId);
        $colorId = $_GET['id_mau_sac'];
        $mauSanPham = $this->modelMau->getColorById($colorId);
        $oldImage = $this->modelSanPham->getDetailAnhSanPham($id_anh);
        if (!empty($oldImage['link_hinh_anh'])) {
            deleteFile($oldImage['link_hinh_anh']);
        }
        $this->modelSanPham->destroyAnhSanPham($id_anh);

        header("Location: " . BASE_URL_ADMIN . "?act=list-goi-hinh-anh&id_san_pham=" . $product['id'] . "&id_mau_sac=" . $mauSanPham['id']);
        exit;
    }
    public function formEditSanPham()
    {   
        // Hàm này dùng để hiển thị form nhập
        // Lấy ra thông tin của sản phẩm cần sửa
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        // $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function postEditBienThe(){
        $sanPham = $this->modelSanPham->getDetailSanPham($_GET['id_san_pham']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $variantIds = $_POST['variant_id'];
            $stocks = $_POST['ton_kho'];
            $prices = $_POST['don_gia'];
            $statuses = $_POST['trang_thai'];
        try {
            foreach ($variantIds as $index => $id) {
                $ton_kho = $stocks[$index];
                $don_gia = $prices[$index];
                $trang_thai = $statuses[$index];
        
                $this->modelSanPham->editBienThe(
                    $id,
                    $ton_kho,
                    $don_gia,
                    $trang_thai
                );
            }
            
        
            echo "<script>alert('Cập nhật thành công!');
                window.location.href = '" . BASE_URL_ADMIN . "?act=list-bien-the&id_san_pham=" . $sanPham['id'] . "';
            
                </script>";
                // header("Location: " . BASE_URL_ADMIN . '?act=list-bien-the&id_san_pham=' . $sanPham['id']);
            } catch (PDOException $e) {
                echo "Error: ". $e->getMessage();
            }
        }
    }



    public function postEditSanPham()
    {
        // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            // Lấy ra dữ liệu cũ của sản phẩm 

            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // Truy vấn  
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // Lấy ảnh cũ để phục vụ cho sửa ảnh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;




            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'giá sản phẩm không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'số lượng sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'danh mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái sản phẩm phải chọn';
            }
            
            
            // var_dump($errors);die;

            // logic sửa ảnh 
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                // upload ảnh mới lên 
                $new_file = uploadFile($hinh_anh, './uploads/');

                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            // Nếu ko có lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {

                // Nếu ko có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');

                $this->modelSanPham->updateSanPham(
                    $san_pham_id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $new_file
                );


                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // Trả về form và lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form 
                $_SESSION['error'] = $errors;
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
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

    public function postEditAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            // Lấy danh sách ảnh hiện tại của sản phẩm
            // $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

            // xử lý các ảnh được gửi từ form
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            // Khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ 
            $upload_file = [];

            // Upload ảnh mới hoặc thay thế ảnh cũ 
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            // Lưu ảnh mới vào db và xóa ảnh cũ nếu có 
            // foreach ($upload_file as $file_info) {
            //     if ($file_info['id']) {
            //         $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

            //         // cập nhật ảnh cũ
            //         $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

            //         // xóa ảnh cũ
            //         deleteFile($old_file);
            //     } else {
            //         // Thêm ảnh mới 
            //         $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
            //     }
            // }

            // Xử lý xóa ảnh 
            // foreach ($listAnhSanPhamCurrent as $anhSP) {
            //     $anh_id = $anhSP['id'];
            //     if (in_array($anh_id, $img_delete)) {
            //         // Xóa ảnh trong db
            //         $this->modelSanPham->destroyAnhSanPham($anh_id);

            //         // Xóa file 
            //         deleteFile($anhSP['link_hinh_anh']);
            //     }
            // }
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }


    public function deleteSanPham()
    {


        $id = $_GET['id_san_pham'] ?? null;

        if (!$id) {
            $_SESSION['error'] = 'Không xác định được sản phẩm cần xử lý.';
            // Có thể redirect hoặc return ở đây
            return;
        }

        $sanPhamInDon = $this->modelDonHang->getDonHangByAPId($id);
        // var_dump($sanPhamInDon);die;

        if (empty($sanPhamInDon)) {
            $sanPham = $this->modelSanPham->getDetailSanPham($id);
            // Tiếp tục xử lý với $sanPham
        } else {
            $_SESSION['error'] = 'Sản phẩm này không thể xóa vì đã được đặt hàng.';
            // Có thể redirect hoặc hiển thị thông báo lỗi
        }

        

        // $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);


        if ($sanPham) {
            deleteFile($sanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        // if ($listAnhSanPham) {
        //     foreach ($listAnhSanPham as $key => $anhSP) {
        //         deleteFile($anhSP['link_hinh_anh']);
        //         $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
        //     }
        // }

        header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }


    public function detailSanPham()
    {
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listMauSac = $this->modelSanPham->getAllMauCuaBienThe($id);
        // $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        
        if ($_GET['act'] == 'lay-anh-theo-mau') {
            $idSanPham = $_GET['id_san_pham'];
            $idMauSac = $_GET['id_mau_sac'];
            $listAnh = $this->modelSanPham->getGoiAnhMauSanPham($idSanPham, $idMauSac);
            foreach ($listAnh as $anh) {
                echo '<img style="width:100px; height:100px; margin:5px" src="' . BASE_URL . '../uploads/' . $anh['link_hinh_anh'] . '" />';
            }
            exit;
        }
        if ($_GET['act'] == 'lay-anh-theo-mau') {
            $idSanPham = $_GET['id_san_pham'];
            $idMauSac = $_GET['id_mau_sac'];
            $listSize = $this->modelSanPham->getGoiSizeMauSanPham($idSanPham, $idMauSac);
            foreach ($listSize as $Size) {
                echo '<button type="button" onclick="setActiveSize(this)" class="btn btn-outline-dark">' . $Size['kich_co'] . '</button>';
            }
            exit;
        }

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        // var_dump($listAnhSanPham);die;
        if ($sanPham) {
            require_once './views/sanpham/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function getListAnhTheoMau() {
        $productId = $_GET['id_san_pham'];
        $colorId = $_GET['id_mau_sac'];
        $images = $this->modelSanPham->getGoiAnhMauSanPham($productId, $colorId);
    
        // Render view nhỏ chỉ chứa danh sách ảnh
        include './views/sanpham/_partial_image_list.php';
    }
    public function getListSizeTheoMau() {
        $productId = $_GET['id_san_pham'];
        $colorId = $_GET['id_mau_sac'];
        $listKichCo = $this->modelSanPham->getGoiSizeMauSanPham($productId, $colorId);
    
        // Render view nhỏ chỉ chứa danh sách ảnh
        include './views/sanpham/_partial_size_list.php';
    }
    public function layThongTinBienThe() {
        $idBienThe = $_GET['id_bien_the'];
        $bienThe = $this->modelSanPham->getBienTheById($idBienThe);
        // var_dump($bienThe);die;

        if ($bienThe) {
            header('Content-Type: application/json');
            echo json_encode([
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
    
    public function updateTrangThaiBinhLuan()
    {
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);

        if ($binhLuan) {
            $trang_thai_update = '';
            if ($binhLuan['trang_thai'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }
            $status = $this->modelSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
            if ($status) {
                if ($name_view == 'detail_khach') {
                    header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id']);
                }else{
                    header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
                }
            }
        }
    }
}