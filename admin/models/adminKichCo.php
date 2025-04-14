<?php
class Size{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllSizes(){
        try{
            $sql = 'SELECT * FROM kich_co_sp';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getAllIdSizes(){
        try{
            $sql = 'SELECT id FROM kich_co_sp';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getSizeById($id){
        try{
            $sql = 'SELECT * FROM kich_co_sp WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
        }
    }

    public function addSize($kich_co){
        try {
            $this->conn->beginTransaction();
    
            $sql = 'INSERT INTO kich_co_sp (kich_co) VALUES (:kich_co)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':kich_co' => $kich_co]);
    
            $sizeId = $this->conn->lastInsertId();
    
            // Tạo biến thể cho size mới
            $this->createBienThe($sizeId);
    
            $this->conn->commit();
            return $sizeId;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
    
    private function createBienThe($sizeId) {
        try {
            // Lấy toàn bộ sản phẩm
            $products = $this->conn->query("SELECT * FROM san_phams")->fetchAll(PDO::FETCH_ASSOC);
    
            // Chuẩn bị câu lệnh kiểm tra tồn tại
            $checkStmt = $this->conn->prepare("SELECT COUNT(*) FROM bien_the_sp WHERE sp_id = ? AND mau_id = ? AND size_id = ?");
    
            // Chuẩn bị chèn biến thể mới
            $insertStmt = $this->conn->prepare("INSERT INTO bien_the_sp (sp_id, mau_id, size_id, ton_kho, don_gia) 
                                                VALUES (?, ?, ?, 0, ?)");
    
            foreach ($products as $product) {
                $sp_id = $product['id'];
    
                // Lấy các màu hiện có của sản phẩm này
                $colors = $this->conn->prepare("SELECT DISTINCT mau_id FROM bien_the_sp WHERE sp_id = ?");
                $colors->execute([$sp_id]);
                $colorList = $colors->fetchAll(PDO::FETCH_COLUMN); // chỉ lấy mau_id
    
                foreach ($colorList as $mau_id) {
                    // Kiểm tra nếu biến thể đã tồn tại thì bỏ qua
                    $checkStmt->execute([$sp_id, $mau_id, $sizeId]);
                    $exists = $checkStmt->fetchColumn();
    
                    if ($exists == 0) {
                        $insertStmt->execute([
                            $sp_id,
                            $mau_id,
                            $sizeId,
                            $product['gia_khuyen_mai'] ?? 0
                        ]);
                    }
                }
            }
        } catch (Exception $e) {
            throw new Exception("Lỗi khi tạo biến thể: " . $e->getMessage());
        }
    }
    

    public function updateSize($id, $kich_co){
        try{
            $sql = 'UPDATE kich_co_sp SET kich_co = :kich_co WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id, ':kich_co' => $kich_co]);
            return true;
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
        }
    }

    public function deleteSize($id){
        try{
            $sql = 'DELETE FROM kich_co_sp WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
        }
    }
}