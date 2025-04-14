<?php
class GioHangController
{
    public $modelGioHang;
    
    public function __construct()
    {
        $this->modelGioHang = new GioHang();
    }
    
    public function formGioHang()
    {
        // Hàm này dùng để hiển thị form giỏ hàng
        require_once './views/gioHang.php';
    }
    public function gioHang()
    {
        // Lấy danh sách sản phẩm trong giỏ hàng từ session
        $gioHang = $_SESSION['gio_hang'] ?? [];

        // Tính tổng tiền trong giỏ hàng
        $tongTien = 0;
        foreach ($gioHang as $item) {
            $tongTien += $item['so_luong'] * $item['don_gia'];
        }

        // Hiển thị trang giỏ hàng
        require_once './views/gioHang.php';
    }
}