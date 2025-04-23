<?php

require_once __DIR__ . '/../vendor/autoload.php'; // đường dẫn autoload

use PayOS\PayOS;

class PaymentController
{
    public $donHangModel;
    public function __construct() {
        $this->donHangModel = new donHang();
    }
    // Thông tin cấu hình PayOS - test nhanh
    private $clientId = '5f45d3f8-2a03-4ff2-a809-24c92c4935b1';
    private $apiKey = '68d11acd-9583-4306-885e-ae93e2a7e88a';
    private $checksumKey = '9614b6d58aa73c37ecf0fde4c574fb9c063c875d780483175dca5c3b86a2d0ce';

    public function createPayment()
    {
        $payOS = new PayOS($this->clientId, $this->apiKey, $this->checksumKey);
        
        $donHang_id = $_GET['don_hang_id'];
        $donHang = $this->donHangModel->getDonHangById($donHang_id);
        // print_r($donHang);die;
        $chiTiet = $this->donHangModel->getChiTietDonHang($donHang_id);
        $items = [];
        foreach ($chiTiet as $item) {
            $items[] = [
                'name' => $item['ten_san_pham'] ?? 'Tên sản phẩm',
                'price' => $item['gia'] ?? 1000,
                'quantity' => $item['so_luong'] ?? 1
            ];
        }


        $orderCode = intval(substr(strval(microtime(true) * 10000), -6));

        $data = [
            "orderCode" => $orderCode,
            "amount" => $donHang['tong_tien'],
            "description" => "Thanh toán đơn hàng",
            "items" => $items,
            "returnUrl" => BASE_URL . "?act=thanh-toan-thanh-cong&id_don_hang=" . $donHang_id,
            "cancelUrl" => BASE_URL . "?act=don-hang"
        ];

        $response = $payOS->createPaymentLink($data);

        // PHP thuần redirect
        header("Location: " . $response['checkoutUrl']);
        exit;
    }
}
