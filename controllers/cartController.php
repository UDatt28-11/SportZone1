<?php
class CartController{
    private $cartModel;
    public $modelSanPham;
    private $productModel;
    public function __construct() {
        $this->cartModel = new GioHang($_SESSION['user_id']);
        $this->modelSanPham = new SanPham();
    }
    public function add(){
        $id = $_GET['id_san_pham'];
        $sanPham =  $this->modelSanPham->getDetailSanPham($id);
        // var_dump($_SESSION['user_id']);die;
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?act=login');
            exit;
        }
        $user_id = $_SESSION['user_id'];
        $bienTheId = $_POST['bien_the_id'];
        // var_dump($bienTheId);die;
        $soLuong = $_POST['so_luong'];

        
        if($bienTheId == ''){
            echo "
                <script>
                    alert('Hãy chọn sản phẩm');
                    window.location.href = '" . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['id'] . "';
                </script>
            ";
        } else {
            $this->cartModel->themVaoGio($bienTheId, $soLuong);
            echo "
                <script>
                    alert('Thêm thành công');
                    window.location.href = '" . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['id'] . "';
                </script>
            ";
        }
        exit;
    }
}