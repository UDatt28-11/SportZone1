<?php
class Color{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllColors(){
        try{
            $sql = 'SELECT * FROM mau_sp';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getColorById($id){
        try{
            $sql = 'SELECT * FROM mau_sp WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
        }
    }

    public function addColor($mau){
        try{
            $sql = 'INSERT INTO mau_sp (mau_sac) VALUES (:mau)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':mau' => $mau]);
            return true;
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
        }
    }

    public function updateColor($id, $mau){
        try{
            $sql = 'UPDATE mau_sp SET mau_sac = :mau WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id, ':mau' => $mau]);
            return true;
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
        }
    }

    public function deleteColor($id){
        try{
            $sql = 'DELETE FROM mau_sp WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
        }
    }
}