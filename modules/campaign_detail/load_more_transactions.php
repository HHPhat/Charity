<?php
require_once '../../includes/database.php';

$campaign_id = isset($_GET['campaign_id']) ? (int)$_GET['campaign_id'] : 0;
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = 6; // Mỗi lần bấm Load More sẽ tải thêm 6 giao dịch

// Lấy các giao dịch tiếp theo
$transactions = get_campaign_transactions($campaign_id, $limit, $offset);

if (empty($transactions)) {
    // Nếu không còn dữ liệu, trả về rỗng
    exit; 
}

// Render HTML giống hệt file campaign_detail.php
foreach ($transactions as $txn): 
    $is_expense = ($txn['transaction_type'] === 'expense');
    
    $display_name = htmlspecialchars($txn['entity_name'] ?? ($is_expense ? 'Giải ngân' : 'Nhà tài trợ ẩn danh'));
    $display_note = htmlspecialchars($txn['note'] ?? '');
    $amount_formatted = number_format($txn['amount'], 0, ',', '.') . ' VNĐ';
    $time_ago = time_elapsed_string($txn['transaction_time']); // Đảm bảo hàm này có sẵn trong database.php hoặc helper
    
    $initials = strtoupper(mb_substr(preg_replace('/[^a-zA-Z]/', '', $display_name), 0, 2));
    if (empty($initials)) $initials = $is_expense ? "CH" : "US";
    
    if ($is_expense) {
        $amount_str = '- ' . $amount_formatted;
        $text_color = 'text-red-600';
        $bg_avatar  = 'bg-red-100';
        $text_avatar = 'text-red-600';
    } else {
        $amount_str = '+ ' . $amount_formatted;
        $text_color = 'text-primary';
        $bg_avatar  = 'bg-primary-fixed';
        $text_avatar = 'text-primary';
    }
?>
    <div class="flex items-center justify-between p-6 bg-surface-container-lowest rounded-xl border border-surface-container">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full <?= $bg_avatar ?> flex items-center justify-center <?= $text_avatar ?> font-bold">
                <?= $initials ?>
            </div>
            <div>
                <p class="font-bold"><?= $display_name ?></p>
                <p class="text-sm text-on-surface-variant"><?= $display_note ?></p>
            </div>
        </div>
        <div class="text-right">
            <p class="font-headline font-extrabold <?= $text_color ?>"><?= $amount_str ?></p>
            <p class="text-xs text-on-surface-variant"><?= $time_ago ?></p>
        </div>
    </div>
<?php endforeach; ?>