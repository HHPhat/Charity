<?php
require_once 'Blockchain.php';
require_once 'helper.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

// INPUT từ form
$campaign_id = $_POST['campaign_id'];
$from_account = $_POST['from_account']; // STK người gửi
$to_account = $_POST['to_account'];     // STK nhận
$amount = $_POST['amount'];
$type = $_POST['type']; // donate | allocate

$data = [
    "type" => $type,
    "from" => $from_account,
    "to" => $to_account,
    "amount" => $amount,
    "time" => date("H:i:s d-m-Y")
];

// Load blockchain cũ
$existing = loadBlockchain($campaign_id);

if ($existing) {
    $blockchain = new Blockchain();
    $blockchain->chain = [];

    foreach ($existing as $block) {
        $blockchain->chain[] = new Block(
            $block['index'],
            $block['timestamp'],
            $block['data'],
            $block['previousHash']
        );
    }
} else {
    $blockchain = new Blockchain();
}

// Thêm block mới
$blockchain->addBlock($data);

// Lưu lại JSON
saveBlockchain($campaign_id, $blockchain->chain);

echo json_encode([
    "status" => "success",
    "message" => "Đã ghi blockchain"
]);
