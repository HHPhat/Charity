<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "outline": "#727785",
                      "on-secondary-fixed": "#321300",
                      "surface-container-high": "#e7e8e9",
                      "on-surface": "#191c1d",
                      "surface": "#f8f9fa",
                      "tertiary-fixed-dim": "#ffb3b2",
                      "secondary-container": "#ff8016",
                      "secondary-fixed-dim": "#ffb68a",
                      "outline-variant": "#c1c6d6",
                      "surface-tint": "#0057ce",
                      "surface-container": "#edeeef",
                      "on-tertiary-container": "#130001",
                      "on-primary-fixed-variant": "#00419e",
                      "surface-dim": "#d9dadb",
                      "surface-variant": "#e1e3e4",
                      "surface-container-lowest": "#ffffff",
                      "on-secondary-fixed-variant": "#743500",
                      "on-primary-fixed": "#001946",
                      "on-surface-variant": "#414754",
                      "primary-fixed-dim": "#b1c5ff",
                      "on-background": "#191c1d",
                      "secondary-fixed": "#ffdbc8",
                      "on-primary-container": "#ffffff",
                      "tertiary-fixed": "#ffdad9",
                      "tertiary": "#b91830",
                      "primary": "#0057cd",
                      "inverse-primary": "#b1c5ff",
                      "on-secondary-container": "#5f2a00",
                      "tertiary-container": "#dd3645",
                      "surface-container-highest": "#e1e3e4",
                      "background": "#f8f9fa",
                      "on-secondary": "#ffffff",
                      "surface-container-low": "#f3f4f5",
                      "on-tertiary": "#ffffff",
                      "primary-container": "#0d6efd",
                      "on-tertiary-fixed-variant": "#92001f",
                      "inverse-on-surface": "#f0f1f2",
                      "error-container": "#ffdad6",
                      "on-error": "#ffffff",
                      "on-primary": "#ffffff",
                      "inverse-surface": "#2e3132",
                      "primary-fixed": "#dae2ff",
                      "surface-bright": "#f8f9fa",
                      "secondary": "#984700",
                      "on-tertiary-fixed": "#410008",
                      "on-error-container": "#93000a",
                      "error": "#ba1a1a"
              },
              "borderRadius": {
                      "DEFAULT": "0.25rem",
                      "lg": "0.5rem",
                      "xl": "0.75rem",
                      "full": "9999px"
              },
              "fontFamily": {
                      "headline": ["Manrope"],
                      "body": ["Inter"],
                      "label": ["Inter"]
              }
            },
          },
        }
      </script>
<style>
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface antialiased">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 border-b border-slate-200/20 bg-slate-50/80 backdrop-blur-xl shadow-sm">
<div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
<div class="text-2xl font-extrabold tracking-tighter text-blue-700">Transparent Guardian</div>
<div class="hidden md:flex items-center gap-8 font-manrope font-bold text-sm tracking-tight">
<a class="text-slate-600 hover:text-blue-600 transition-opacity duration-400 ease-out" href="../../">Home</a>
<a class="text-blue-700 border-b-2 border-blue-700 pb-1 transition-opacity duration-400 ease-out" href="../campaigns">Campaigns</a>
<a class="text-slate-600 hover:text-blue-600 transition-opacity duration-400 ease-out" href="../joined_campaigns">My Joined Campaigns</a>
<a class="text-slate-600 hover:text-blue-600 transition-opacity duration-400 ease-out" href="../accounts">My Account</a>
</div>
<div class="flex items-center gap-4">
<?php if (empty($_SESSION['account_id'])): ?>
    <div class="flex items-center gap-2">
        <button onclick="window.location.href='../../pages/login.php'" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 font-manrope font-bold text-sm tracking-tight scale-95 active:scale-90 transition-transform">
            Login
        </button>
        <button onclick="window.location.href='../../pages/register.php'" class="bg-primary text-on-primary px-6 py-2 rounded-xl font-manrope font-bold text-sm tracking-tight scale-95 active:scale-90 transition-transform shadow-[0_2px_0_0_rgba(0,65,158,1)]">
            Sign Up
        </button>
    </div>

<?php else: ?>
    <div class="flex items-center gap-5">
        <div class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity" onclick="window.location.href='my_account.php'">
            <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                <span class="material-symbols-outlined">person</span>
            </div>
            <span class="font-manrope font-bold text-sm text-on-surface tracking-tight">
                <?= htmlspecialchars($_SESSION['account_id'] ?? 'User') ?>
            </span>
        </div>
        
        <button onclick="window.location.href='/Charity/modules/auth/logout.php'" class="text-red-500 hover:text-red-600 font-manrope font-bold text-sm tracking-tight flex items-center gap-1 scale-95 active:scale-90 transition-transform">
            <span class="material-symbols-outlined text-sm">logout</span>
            Logout
        </button>
    </div>
<?php endif; ?>
</div>
</div>
</div>
</nav>
<!-- Main Content Canvas -->
<main class="pt-32 pb-20 px-6 max-w-3xl mx-auto">
<!-- Confirmation Header -->
<header class="mb-12 text-center">
<div class="inline-flex items-center gap-2 mb-4 bg-secondary-fixed text-on-secondary-fixed px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">favorite</span>
                Thiện nguyện
            </div>
<h1 class="text-5xl font-extrabold font-headline text-on-surface tracking-tighter mb-4">Xác nhận quyên góp</h1>
<p class="text-lg text-on-surface-variant mx-auto max-w-2xl leading-relaxed">Vui lòng kiểm tra lại thông tin quyên góp của bạn. Sự hỗ trợ của bạn sẽ thay đổi cuộc sống của những người cần giúp đỡ.</p>
</header>
<!-- Centered Layout Container -->
<div class="space-y-8">
<!-- Summary Card -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-[0_20px_40px_rgba(25,28,29,0.04)] relative overflow-hidden">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16"></div>
<div class="flex items-center gap-4 mb-8">
<div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
</div>
<h2 class="text-xl font-bold font-headline">Thông tin chi tiết</h2>
</div>
<?php
// Kiểm tra nếu người dùng truy cập trực tiếp mà không qua form
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Truy cập không hợp lệ!");
}

// 1. Lấy dữ liệu từ $_POST
$campaign_name = htmlspecialchars($_POST['campaign_name'] ?? 'Chiến dịch chưa xác định');
$amount        = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
$bank_code     = $_POST['bank'] ?? '';
$_SESSION['amount']= $amount;
// 2. Map mã ngân hàng thành tên đầy đủ
$bank_names = [
    'vcb'  => 'Vietcombank',
    'tcb'  => 'Techcombank',
    'ncb'  => 'NCB',
    'vpb'  => 'VPBank'
];
$bank_full_name = $bank_names[$bank_code] ?? 'Ngân hàng khác';

// 3. Format lại số tiền thành định dạng có dấu phẩy (VD: 500,000)
$formatted_amount = number_format($amount, 0, ',', '.');
?>

<div class="space-y-6 bg-surface-container-lowest p-8 rounded-2xl max-w-lg mx-auto mt-10 shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6 text-primary">Xác nhận thông tin</h2>
    
    <div class="flex justify-between items-start border-b border-surface-container-low pb-4">
        <span class="text-on-surface-variant font-medium">Chiến dịch</span>
        <span class="text-right font-bold text-primary max-w-[340px]">
            <?= $_SESSION['campaign_name'] ?>
        </span>
    </div>
    
    <div class="flex justify-between items-center border-b border-surface-container-low pb-4">
        <span class="text-on-surface-variant font-medium">Số tiền</span>
        <span class="text-2xl font-extrabold font-headline text-tertiary">
            <?= $formatted_amount ?> VNĐ
        </span>
    </div>
    
    <div class="flex justify-between items-center border-b border-surface-container-low pb-4">
        <span class="text-on-surface-variant font-medium">Phương thức</span>
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-outline">account_balance</span>
            <span class="font-semibold">Thẻ nội địa (ATM) - <?= $bank_full_name ?></span>
        </div>
    </div>

    <?php if (!empty($_POST['message'])): ?>
    <div class="pt-2">
        <span class="text-on-surface-variant font-medium block mb-2">Lời nhắn:</span>
        <p class="italic text-sm text-outline p-4 bg-surface-container-high rounded-xl">
            "<?= htmlspecialchars($_POST['message']) ?>"
        </p>
    </div>
    <?php endif; ?>
</div>
</div>
</div>
<!-- Transparency Note -->
<div class="bg-surface-container-low p-6 rounded-xl flex gap-5 items-center">
<div class="flex-shrink-0 w-14 h-14 rounded-full bg-surface-container-lowest flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-primary text-3xl">verified_user</span>
</div>
<div>
<h4 class="font-bold text-on-surface">Cam kết minh bạch 100%</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">
                        Mọi khoản đóng góp được quản lý chuyên nghiệp và kiểm toán công khai. 
                        <a class="text-primary font-semibold hover:underline decoration-2 underline-offset-4" href="#">Xem báo cáo tài chính →</a>
</p>
</div>
</div>
<!-- Actions Below Cards -->
<div class="pt-4 space-y-6">
<form action="complete.php" method="POST" class="mt-8>
    <input type="hidden" name="amount" value="<?= $amount ?>">
    <input type="hidden" name="message" value="<?= htmlspecialchars($_POST['message'] ?? '') ?>">

<button type="submit" class="w-full bg-primary-container text-on-primary-container py-5 rounded-xl font-bold text-lg hover:scale-[0.99] transition-transform duration-200 shadow-[0_4px_0_0_#00419e] flex items-center justify-center gap-3">
                    Xác nhận &amp; Thanh toán
                    <span class="material-symbols-outlined">arrow_forward</span>
</button>
</form>

<button class="w-full text-outline font-semibold py-2 hover:text-on-surface transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-lg">arrow_back</span>
                    Quay lại
                </button>
</div>
<!-- Trust Indicators -->
<div class="pt-10 border-t border-surface-container-high">
<p class="text-center text-xs font-bold text-outline uppercase tracking-widest mb-6">Đối tác &amp; Bảo mật</p>
<div class="flex justify-center items-center gap-8 grayscale opacity-60">
<div class="flex items-center gap-1 font-bold text-sm">
<span class="material-symbols-outlined text-lg">lock</span> SSL
                    </div>
<div class="flex items-center gap-1 font-bold text-sm">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span> VERIFIED NGO
                    </div>
<div class="flex items-center gap-1 font-bold text-sm">
<span class="material-symbols-outlined text-lg">payments</span> NAPAS
                    </div>
</div>
</div>
</div>
<!-- Floating Transparency Widget -->
<div class="fixed bottom-8 right-8 hidden md:block">
<div class="bg-surface-container-lowest/90 backdrop-blur-xl p-4 rounded-xl shadow-2xl border border-surface-container-high max-w-xs">
<div class="flex items-center gap-3 mb-2">
<div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
<span class="text-[10px] font-bold uppercase tracking-widest text-outline">Real-time Impact</span>
</div>
<p class="text-xs font-medium text-on-surface-variant">Hệ thống đang xử lý 12 đóng góp khác cùng lúc.</p>
</div>
</div>
</main>
<!-- Footer -->
<footer class="w-full py-16 border-t border-slate-200 bg-slate-100 font-inter text-sm leading-relaxed">
<div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
<div>
<div class="text-lg font-bold text-slate-900 mb-4">Guardian Platform</div>
<p class="text-slate-500 max-w-md">© 2024 Guardian Platform. All funds are professionally stewarded and audited for 100% transparency.</p>
</div>
<div class="flex flex-wrap gap-x-8 gap-y-4 md:justify-end">
<a class="text-slate-500 hover:text-orange-600 transition-colors duration-300" href="#">Financial Reports</a>
<a class="text-slate-500 hover:text-orange-600 transition-colors duration-300" href="#">Tax Receipts</a>
<a class="text-slate-500 hover:text-orange-600 transition-colors duration-300" href="#">Donor Privacy Policy</a>
<a class="text-slate-500 hover:text-orange-600 transition-colors duration-300" href="#">Impact Methodology</a>
</div>
</div>
</footer>
</body></html>