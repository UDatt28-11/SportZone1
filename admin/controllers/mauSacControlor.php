<?php
class MauSacController{
    public $modelMauSac;
    public function __construct(){
        $this->modelMauSac = new Color();
    }

    public function danhSachMauSac(){
        $listMauSac = $this->modelMauSac->getAllColors();
        require_once './views/mauSac/list.php';
    }

    public function formAddMauSac(){
        require_once './views/mauSac/add.php';
    }

    public function postAddMauSac(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $mauSac = $_POST['mau_sac'];
            

            $errors = [];
            if(empty($mauSac)){
                $errors['mau_sac'] = 'Màu sắc không được để trống';
            }
            $_SESSION['error'] = $errors;
            if(empty($errors) ){
                $this->modelMauSac->addColor($mauSac);
                header("Location: " . BASE_URL_ADMIN . "?act=list-mau-sac");
                exit;
            }else{
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . "?act=form-them-mau-sac");
                exit;
            }
        }
    }

    public function formEditMauSac(){
        $mauSacId = $_GET['id_mau_sac'];
        $mau = $this->modelMauSac->getColorById($mauSacId);
        require_once './views/mauSac/edit.php';
    }

    public function postEditMauSac(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $mauSacId = $_POST['id_mau_sac'];
            $mauSac = $_POST['mau_sac'];
            $errors = [];
            if(empty($mauSac)){
                $errors['mau_sac'] = 'Màu sắc không được để trống';
            }
            $_SESSION['error'] = $errors;
            if(empty($errors) ){
                $this->modelMauSac->updateColor($mauSacId, $mauSac);
                header("Location: " . BASE_URL_ADMIN . "?act=list-mau-sac");
                exit;
            }else{
                $_SESSION['flash'] = true;
                header("Location: ". BASE_URL_ADMIN. "?act=form-sua-mau-sac&id_mau_sac=". $mauSacId);
                exit;
            }
        }
    }

    public function deleteMauSac(){
        $id = $_GET['id_mau_sac'];
        $mauSac = $this->modelMauSac->getColorById($id);
        if($mauSac){
            $this->modelMauSac->deleteColor($id);
        }
        header("Location: ". BASE_URL_ADMIN. "?act=list-mau-sac");
        exit();
    }
}