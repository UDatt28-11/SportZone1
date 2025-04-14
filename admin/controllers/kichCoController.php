<?php
class KichCoController{
    public $modelKichCo;
    public function __construct(){
        $this->modelKichCo = new Size();
    }

    public function danhSachKichCo(){
        $listKichCo = $this->modelKichCo->getAllSizes();
        require_once './views/kichCo/list.php';
    }

    public function formAddKichCo(){
        require_once './views/kichCo/add.php';
    }

    public function postAddKichCo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $KichCo = $_POST['kich_co'];
            

            $errors = [];
            if(empty($KichCo)){
                $errors['kich_co'] = 'kích cỡ không được để trống';
            }
            $_SESSION['error'] = $errors;
            if(empty($errors) ){
                $this->modelKichCo->addSize($KichCo);
                header("Location: " . BASE_URL_ADMIN . "?act=list-kich-co");
                exit;
            }else{
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . "?act=form-them-kich-co");
                exit;
            }
        }
    }

    public function formEditKichCo(){
        $kichCoId = $_GET['id_kich_co'];
        $kichCo = $this->modelKichCo->getSizeById($kichCoId);
        require_once './views/kichCo/edit.php';
    }

    public function postEditKichCo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $KichCoId = $_POST['id_kich_co'];
            $KichCo = $_POST['kich_co'];
            $errors = [];
            if(empty($KichCo)){
                $errors['kich_co'] = 'kích cỡ không được để trống';
            }
            $_SESSION['error'] = $errors;
            if(empty($errors) ){
                $this->modelKichCo->updateSize($KichCoId, $KichCo);
                header("Location: " . BASE_URL_ADMIN . "?act=list-kich-co");
                exit;
            }else{
                $_SESSION['flash'] = true;
                header("Location: ". BASE_URL_ADMIN. "?act=form-sua-kich-co&id_kich_co=". $KichCoId);
                exit;
            }
        }
    }

    public function deleteKichCo(){
        $id = $_GET['id_kich_co'];
        $KichCo = $this->modelKichCo->getSizeById($id);
        if($KichCo){
            $this->modelKichCo->deleteSize($id);
        }
        header("Location: ". BASE_URL_ADMIN. "?act=list-kich-co");
        exit();
    }
}