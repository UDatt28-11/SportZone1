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
        try{
            $sql = 'INSERT INTO kich_co_sp (kich_co) VALUES (:kich_co)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':kich_co' => $kich_co]);
            return true;
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
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