<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo
    require_once '../../includes/database.php';
?>
<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Chiến dịch của tôi</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "on-secondary-fixed": "#321300",
              "on-surface": "#191c1d",
              "on-error-container": "#93000a",
              "surface-variant": "#e1e3e4",
              "primary": "#0057cd",
              "surface-bright": "#f8f9fa",
              "on-secondary": "#ffffff",
              "on-background": "#191c1d",
              "surface-tint": "#0057ce",
              "on-surface-variant": "#414754",
              "tertiary-container": "#dd3645",
              "error": "#ba1a1a",
              "on-tertiary-container": "#130001",
              "surface-container-highest": "#e1e3e4",
              "secondary-fixed": "#ffdbc8",
              "on-primary-fixed-variant": "#00419e",
              "surface-container": "#edeeef",
              "surface-dim": "#d9dadb",
              "on-primary-fixed": "#001946",
              "secondary": "#984700",
              "on-tertiary-fixed-variant": "#92001f",
              "inverse-on-surface": "#f0f1f2",
              "on-tertiary": "#ffffff",
              "on-primary-container": "#ffffff",
              "inverse-primary": "#b1c5ff",
              "tertiary": "#b91830",
              "primary-fixed": "#dae2ff",
              "on-tertiary-fixed": "#410008",
              "surface-container-lowest": "#ffffff",
              "tertiary-fixed": "#ffdad9",
              "on-error": "#ffffff",
              "outline-variant": "#c1c6d6",
              "surface": "#f8f9fa",
              "secondary-container": "#ff8016",
              "background": "#f8f9fa",
              "surface-container-high": "#e7e8e9",
              "primary-fixed-dim": "#b1c5ff",
              "on-secondary-fixed-variant": "#743500",
              "error-container": "#ffdad6",
              "secondary-fixed-dim": "#ffb68a",
              "on-primary": "#ffffff",
              "surface-container-low": "#f3f4f5",
              "on-secondary-container": "#5f2a00",
              "inverse-surface": "#2e3132",
              "primary-container": "#0d6efd",
              "outline": "#727785",
              "tertiary-fixed-dim": "#ffb3b2"
            },
            fontFamily: {
              "headline": ["Manrope"],
              "body": ["Inter"],
              "label": ["Inter"]
            },
            borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .headline-font { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm dark:shadow-none">
<div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
<div class="text-2xl font-extrabold tracking-tighter text-blue-700 dark:text-blue-400">
                Transparent Guardian
            </div>
<div class="hidden md:flex items-center space-x-8 font-manrope font-bold text-sm tracking-tight">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="../../">Home</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="../campaigns">Campaigns</a>
<a class="text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400 pb-1 hover:opacity-80 transition-opacity duration-400 ease-out" href="../joined_campaigns">My Joined Campaigns</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="../accounts">My Account</a>
</div>
<div class="flex items-center space-x-4">
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
        <div class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity" onclick="window.location.href='modules/accounts/'">
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
</nav>
<main class="pt-24 pb-20 max-w-7xl mx-auto px-6">
<!-- Profile Summary Section -->
<section class="mb-16">
<div class="bg-surface-container-lowest p-8 md:p-12 rounded-xl shadow-sm flex flex-col md:flex-row items-center gap-8 md:gap-12 relative overflow-hidden">
<!-- Asymmetric overlap decoration -->
<div class="absolute -top-10 -right-10 w-40 h-40 bg-secondary-fixed opacity-20 rounded-full blur-3xl"></div>
<div class="relative w-32 h-32 md:w-40 md:h-40 shrink-0">
<img alt="User Profile" class="w-full h-full object-cover rounded-xl shadow-lg transform -rotate-3 border-4 border-white" data-alt="close-up portrait of a middle-aged man with a warm smile, wearing a simple linen shirt in a bright airy studio" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBiokBCPkq1K3f5Ms_BxB_4jlA61SdEzkJB73G6eMcMQimOd5tBHY76g6iuZOy04SMbdAL4pPOZxaaRw_9Jia9KiSNglOx7Vkf3rkm2l32Ce57K-mW3uV2NxFSaRTDrZTmaWjnIq8FVqsjYfum_0yDZIfkY2w274wO-DeXfTd7ccWXnmGvXlEwmsXDGCjcW2xDOdXuVU9kfc1OqlH55W-zoI2qUfMjm0FpTsQl4PHIuVbG4VWtFvpcTl5-aoJS4NDeQ2GSy39cCW2aE"/>
<div class="absolute -bottom-2 -right-2 bg-secondary text-on-secondary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Guardian Plus</div>
</div>
<div class="flex-grow text-center md:text-left">
<span class="text-secondary font-semibold text-sm tracking-widest uppercase mb-2 block">Your Impact Journey</span>
<h1 class="text-4xl md:text-5xl font-extrabold text-on-surface leading-tight mb-4 headline-font">Welcome back, Sarah.</h1>
<p class="text-on-surface-variant text-lg max-w-xl leading-relaxed">Through your generosity, you've touched 14 lives across 3 global campaigns this year. Your stewardship is the bridge to a brighter future.</p>
</div>
<div class="grid grid-cols-2 gap-4 w-full md:w-auto">
<div class="bg-surface-container-low p-6 rounded-xl text-center">
<p class="text-primary font-extrabold text-3xl headline-font">$1,240</p>
<p class="text-on-surface-variant text-xs font-medium uppercase mt-1">Total Given</p>
</div>
<div class="bg-surface-container-low p-6 rounded-xl text-center">
<p class="text-secondary font-extrabold text-3xl headline-font">06</p>
<p class="text-on-surface-variant text-xs font-medium uppercase mt-1">Active Projects</p>
</div>
</div>
</div>
</section>
<!-- Campaigns List Section -->
<section class="space-y-6">
<div class="flex items-center justify-between mb-8">
<h2 class="text-2xl font-bold headline-font text-on-surface">Active Contributions</h2>
<div class="flex gap-2">
<span class="bg-secondary-fixed text-on-secondary-fixed px-4 py-1.5 rounded-full text-sm font-semibold">Latest Donations</span>
</div>
</div>
<!-- Campaign Item 1 -->
<div class="flex flex-col gap-6">
<?php
// Kiểm tra session và gọi hàm
if (isset($_SESSION['donor_id'])) {
    $donor_id = $_SESSION['donor_id'];
    $donated_campaigns = get_user_donated_campaigns($donor_id);
    if (empty($donated_campaigns)) {
        echo "<p class='text-on-surface-variant'>Bạn chưa tham gia đóng góp cho chiến dịch nào.</p>";
    } else {
        foreach ($donated_campaigns as $campaign) {
            $campaign_id = $campaign['campaign_id'];
            $org_name = htmlspecialchars($campaign['org_name']);
            $campaign_name = htmlspecialchars($campaign['campaign_name']);
            
            // Xử lý định dạng thời gian
            $first_donation_time = date('d/m/Y', strtotime($campaign['first_donation_time']));
            $end_date = date('d/m/Y', strtotime($campaign['end_date']));
            
            // Xử lý tiền tệ
            $total_donated = $campaign['total_donated'];
            $target_amount = $campaign['target_amount'];
            
            // Tính phần trăm đóng góp của user so với mục tiêu (để làm thanh progress bar)
            // Nếu bạn muốn progress bar thể hiện tổng tiền của TẤT CẢ mọi người thì cần query thêm, ở đây tạm dùng % của riêng user này
            $percent = ($target_amount > 0) ? min(100, round(($total_donated / $target_amount) * 100)) : 0;
            
            // Đường dẫn ảnh
            $img_path = "/Charity/templates/assets/image/campaigns/{$campaign_id}/campaign_{$campaign_id}.jpg";
?>
            <div class="group bg-surface-container-lowest rounded-xl overflow-hidden hover:shadow-md transition-all duration-400 ease-out border-l-4 border-primary">
                <div class="p-6 md:p-8 flex flex-col md:flex-row gap-8 items-center">
                    
                    <div class="w-full md:w-48 h-32 shrink-0 overflow-hidden rounded-lg">
                        <img alt="<?= $campaign_name ?>" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                             src="<?= $img_path ?>"
                             onerror="this.src='/Charity/templates/assets/image/placeholder.jpg';" />
                    </div>
                    
                    <div class="flex-grow">
                        <div class="flex flex-wrap items-center gap-3 mb-2">
                            <span class="text-xs font-bold uppercase tracking-widest text-primary"><?= $org_name ?></span>
                            <span class="text-on-surface-variant text-sm">•</span>
                            <span class="text-on-surface-variant text-sm font-medium">Tham gia ngày: <?= $first_donation_time ?></span>
                        </div>
                        
                        <h3 class="text-xl font-bold mb-3 headline-font text-on-surface"><?= $campaign_name ?></h3>
                        
                        <div class="w-full bg-surface-variant h-1.5 rounded-full mb-4">
                            <div class="bg-primary h-full rounded-full" style="width: <?= $percent ?>%"></div>
                        </div>
                        
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-xl">payments</span>
                                <span class="text-on-surface font-bold">$<?= number_format($total_donated, 2) ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-on-surface-variant text-xl">event</span>
                                <span class="text-on-surface-variant">Kết thúc: <?= $end_date ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="shrink-0 w-full md:w-auto">
                        <button class="w-full md:w-auto bg-surface-container-high hover:bg-primary hover:text-white text-on-surface-variant font-bold px-8 py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2" 
                                type="button" 
                                onclick="window.location.href='../campaign_detail?id=<?= $campaign_id ?>'">
                            View Donation Tracking
                            <span class="material-symbols-outlined text-lg">arrow_forward</span>
                        </button>
                    </div>
                    
                </div>
            </div>
<?php
        }
    }
    
} else {
    echo "<p class='text-on-surface-variant'>Vui lòng đăng nhập để xem thông tin đóng góp của bạn.</p>";
    
}
?>
</div>
</section>
<!-- Upsell Banner -->
<section class="mt-20">
<div class="bg-primary-container p-10 rounded-xl relative overflow-hidden group">
<div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-transparent pointer-events-none"></div>
<div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
<div>
<h2 class="text-white text-3xl font-bold headline-font mb-2">Want to amplify your impact?</h2>
<p class="text-white/80 text-lg">Set up a monthly recurring donation and join our Inner Circle of Guardians.</p>
</div>
<button class="bg-secondary text-on-secondary px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:brightness-110 transition-all flex items-center gap-3">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">favorite</span>
                        Become a Partner
                    </button>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="w-full border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950">
<div class="flex flex-col md:flex-row justify-between items-center px-8 py-12 w-full max-w-7xl mx-auto">
<div class="mb-8 md:mb-0">
<div class="text-xl font-bold text-slate-900 dark:text-white mb-2">The Transparent Guardian</div>
<p class="font-inter text-sm text-slate-500 dark:text-slate-400 max-w-xs text-center md:text-left">Revolutionizing charity through radical transparency and editorial storytelling.</p>
</div>
<div class="flex flex-wrap justify-center gap-8 mb-8 md:mb-0">
<a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">About Us</a>
<a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Impact Reports</a>
<a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Contact</a>
<a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Privacy Policy</a>
</div>
<div class="font-inter text-sm text-slate-500 dark:text-slate-400">
                © 2024 The Transparent Guardian. All rights reserved.
            </div>
</div>
</footer>
<!-- Floating Donation Widget (Glassmorphism) -->
<div class="fixed bottom-6 right-6 z-40 bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-[0_20px_40px_rgba(25,28,29,0.06)] border border-white/50 hidden lg:flex flex-col items-center gap-3 w-48 border-outline-variant/20">
<div class="w-full flex justify-between items-center mb-1">
<span class="text-xs font-bold text-on-surface-variant uppercase tracking-tighter">Your Score</span>
<span class="text-primary font-bold text-sm">A+</span>
</div>
<div class="w-full bg-surface-container-high h-2 rounded-full">
<div class="bg-primary h-full rounded-full w-[85%]"></div>
</div>
<p class="text-[10px] text-center text-on-surface-variant leading-tight">You are in the top 5% of global donors this month!</p>
<button class="w-full py-2 bg-secondary-container text-on-secondary-container rounded-lg text-xs font-bold hover:opacity-90 transition-opacity">Donate Again</button>
</div>
</body></html>