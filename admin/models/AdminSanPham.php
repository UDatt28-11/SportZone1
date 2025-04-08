<?php 

class AdminSanPham {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham(){
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh, $colors){
        try {
            $this->conn->beginTransaction();
            $sql = 'INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, danh_muc_id, trang_thai, mo_ta, hinh_anh)
                    VALUES (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
            ]);

            $productId = $this->conn->lastInsertId();

            $this->createBienThe($productId, $colors, $gia_khuyen_mai);

            $this->conn->commit();
            return $productId;
            // Lấy id sản phẩm vừa thêm
            // return $this->conn->lastInsertId();
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "lỗi" . $e->getMessage();
        }
    }
    private function createBienThe($productId, $colors, $price) {
        try {
            // Lấy danh sách màu sắc từ DB
            $sizes = $this->conn->query("SELECT * FROM kich_co_sp")->fetchAll(PDO::FETCH_COLUMN);
    
            // Chuẩn bị câu lệnh INSERT
            $stmt = $this->conn->prepare("INSERT INTO bien_the_sp (sp_id, mau_id, size_id, ton_kho, don_gia) 
                                          VALUES (?, ?, ?, 0, ?)");
    
            foreach ($colors as $colorId) {
                // Thêm biến thể cho mỗi size
                foreach ($sizes as $sizeId) {
                    $stmt->execute([$productId, $colorId, $sizeId, $price]);
                }
            }
        } catch (Exception $e) {
            throw new Exception("Lỗi khi tạo biến thể: " . $e->getMessage());
        }
    }
    public function getAllBienTheFromSP($productId){
        try {
            $sql = 'SELECT bien_the_sp.*, kich_co_sp.kich_co, mau_sp.mau_sac
                    FROM bien_the_sp
                    INNER JOIN kich_co_sp ON bien_the_sp.size_id = kich_co_sp.id
                    INNER JOIN mau_sp ON bien_the_sp.mau_id = mau_sp.id
                    WHERE bien_the_sp.sp_id = :san_pham_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id'=>$productId]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
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
    public function addMauBienThe($san_pham_id, $mau_id, $size_id, $don_gia){
        try{
            $this->conn->beginTransaction();
            $sql = "INSERT INTO bien_the_sp (sp_id, mau_id, size_id, ton_kho, don_gia) VALUES (:san_pham_id, :mau_id, :size_id, 0, :don_gia)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id'=>$san_pham_id, ':mau_id'=>$mau_id, ':size_id'=>$size_id, ':don_gia'=>$don_gia]);
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "lỗi" . $e->getMessage();
        }
    }
    public function deleteMauCuaBienThe($productId, $colorId){
        try{
            $sql = "DELETE FROM bien_the_sp WHERE sp_id = :san_pham_id AND
            mau_id = :mau_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id'=>$productId, ':mau_id'=>$colorId]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }


    public function insertGoiAnhSanPham($san_pham_id , $mau_id , $link_hinh_anh){
        try {
            $sql = 'INSERT INTO hinh_anh_san_phams (id_san_pham, mau_id , link_hinh_anh )
                    VALUES (:id_san_pham, :mau_id, :link_hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id_san_pham' => $san_pham_id,
                ':mau_id' => $mau_id,
                ':link_hinh_anh' => $link_hinh_anh,
            ]);

            // Lấy id sản phẩm vừa thêm
            return true;
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

    public function updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh){
        try {
            
            $sql = 'UPDATE san_phams
                    SET 
                        ten_san_pham = :ten_san_pham,
                        gia_san_pham = :gia_san_pham,
                        gia_khuyen_mai = :gia_khuyen_mai,
                        so_luong = :so_luong,
                        danh_muc_id = :danh_muc_id,
                        trang_thai = :trang_thai,
                        mo_ta = :mo_ta,
                        hinh_anh = :hinh_anh
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
                ':id' => $san_pham_id
            ]);

            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function editBienThe($id, $ton_kho, $don_gia, $trang_thai){
        try{
            $this->conn->beginTransaction();
            $sql = "UPDATE bien_the_sp 
                SET ton_kho = :ton_kho, don_gia = :don_gia, trang_thai = :trang_thai 
                WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ton_kho' => $ton_kho,
                ':don_gia' => $don_gia,
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);
            $this->conn->commit();
            return true;
        }catch (Exception $e){
            $this->conn->rollBack();
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDetailAnhSanPham($id){
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }


    public function updateAnhSanPham($id, $new_file){
        try {
            
            $sql = 'UPDATE hinh_anh_san_phams
                    SET 
                        link_hinh_anh = :new_file
                        
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':new_file' => $new_file,
                ':id' => $id
            ]);

            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function destroyAnhSanPham($id){
        try {
            $sql = 'DELETE FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function destroySanPham($id){
        try {
            $sql = 'DELETE FROM san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    
    

    // Bình luận
    public function getBinhLuanFromKhachHang($id){
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham
            FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
            WHERE binh_luans.tai_khoan_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getBinhLuanFromSanPham($id){
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
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

    public function getDetailBinhLuan($id){
        try {
            $sql = 'SELECT * FROM binh_luans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateTrangThaiBinhLuan($id, $trang_thai){
        try {
            
            $sql = 'UPDATE binh_luans
                    SET 
                        trang_thai = :trang_thai
                        
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);

            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    
    
}