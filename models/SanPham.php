<?php
class SanPham{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham(){
        try {
            $sql = 'SELECT san_phams .*, danh_mucs.ten_danh_muc 
            FROM san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id){
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getListAnhSanPham($id){
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id_san_pham = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id){
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getListSanPhamDanhMuc($danh_muc_id){
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = '. $danh_muc_id;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function getAllMauCuaBienThe($id){
        try {
            $sql = "SELECT pc.id, pc.mau_sac 
                    FROM bien_the_sp pv  
                    JOIN mau_sp pc ON pv.mau_id = pc.id  
                    WHERE pv.sp_id = :san_pham_id
                    GROUP BY pc.id;
                    ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id'=>$id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();

        }
    }
    public function getGoiAnhMauSanPham($id,$id_color){
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE id_san_pham = :id_san_pham and mau_id = :mau_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_san_pham'=>$id, ':mau_id'=>$id_color]);
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e){
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getBienTheById($id){
        try{
            $sql = "SELECT * FROM bien_the_sp WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getGoiSizeMauSanPham($id,$colorId){
        try{
            $sql = "SELECT bt.id, ks.kich_co , bt.ton_kho , bt.mau_id
            FROM bien_the_sp bt
            JOIN kich_co_sp ks ON bt.size_id = ks.id
            WHERE bt.sp_id = :sp_id AND mau_id= :id_mau_sac AND bt.trang_thai = 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':sp_id'=>$id, ':id_mau_sac'=>$colorId]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
}
?>