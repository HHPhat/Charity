<?php
require_once 'Blockchain.php';
require_once 'helper.php';

$campaign_id = $_GET['campaign_id'];

$data = loadBlockchain($campaign_id);

if (!$data) {
    echo "Chưa có blockchain";
    exit;
}

$blockchain = new Blockchain();
$blockchain->chain = [];

foreach ($data as $block) {
    $blockchain->chain[] = new Block(
        $block['index'],
        $block['timestamp'],
        $block['data'],
        $block['previousHash']
    );
}

if ($blockchain->isChainValid()) {
    echo "Dữ liệu KHÔNG bị thay đổi";
} else {
    echo "Dữ liệu ĐÃ bị chỉnh sửa!";
}
