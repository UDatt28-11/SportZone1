<?php
class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once './views/home.php';
    }
    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

        // var_dump($listSanPhamCungDanhMuc);die;
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL . '?act=san-pham');
            exit();
        }
    }

    public function DanhMuc()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Lấy thông tin danh mục
            $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

            $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

            // Lấy sản phẩm theo danh mục
            $listSanPham = $this->modelSanPham->getSanPhamByDanhMuc($id);

            require_once './views/detailDanhMuc.php';
        }
    }
}
