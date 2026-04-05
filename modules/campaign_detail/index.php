<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo

?>
<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Campaign Details | Transparent Guardian</title>
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
        }
        .editorial-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 2rem;
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body selection:bg-secondary-fixed selection:text-on-secondary-fixed">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
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
</nav>
<main class="pt-24 pb-20">
<!-- Hero Section: Editorial Asymmetry -->
<?php
require_once '../../includes/database.php'; // Đảm bảo đường dẫn chính xác

// 1. LẤY VÀ XỬ LÝ DỮ LIỆU
$campaign_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$campaign = get_campaign_detail($campaign_id);

if (!$campaign) {
    echo "<h1>Không tìm thấy chiến dịch!</h1>";
    exit;
}

// Xử lý các biến hiển thị
$img_path = "/Charity/templates/assets/image/campaigns/{$campaign_id}/campaign_{$campaign_id}.jpg";
$org_name = htmlspecialchars($campaign['org_name'] ?? 'Tổ chức ẩn danh');
$campaign_name = htmlspecialchars($campaign['campaign_name']);
$description = nl2br(htmlspecialchars($campaign['description'])); // nl2br để giữ format xuống dòng

// Số liệu tài chính
$target_amount = $campaign['target_amount'];
$total_donated = $campaign['total_donated'];
$total_donors = $campaign['total_donors'];

// Tính phần trăm (%) tiến trình
$percent = ($target_amount > 0) ? min(100, round(($total_donated / $target_amount) * 100, 1)) : 0;

// Tính số ngày còn lại
$end_date_timestamp = strtotime($campaign['end_date']);
$current_timestamp = time();
$days_remaining = max(0, floor(($end_date_timestamp - $current_timestamp) / (60 * 60 * 24)));

// Lấy danh sách Donors
$donors = get_campaign_donors($campaign_id, 5); // Lấy 5 người gần nhất
?>

<section class="max-w-7xl mx-auto px-6 mb-20 mt-10">
    <div class="editorial-grid items-center">
        <div class="col-span-12 lg:col-span-7 relative">
            <div class="aspect-[16/9] overflow-hidden rounded-xl bg-surface-variant">
                <img alt="<?= $campaign_name ?>" class="w-full h-full object-cover" src="<?= $img_path ?>" onerror="this.src='/Charity/templates/assets/image/placeholder.jpg';"/>
            </div>
            <div class="absolute -bottom-6 -right-6 hidden lg:block">
                <div class="bg-secondary-container text-on-secondary-container px-6 py-4 rounded-xl shadow-lg border-b-4 border-on-secondary-fixed-variant">
                    <span class="text-lg font-headline font-extrabold"><?= $percent ?>% Tiến trình gây quỹ</span>
                </div>
            </div>
        </div>
        
        <div class="col-span-12 lg:col-span-4 lg:col-start-9">
            <span class="inline-block bg-secondary-fixed text-on-secondary-fixed px-3 py-1 rounded-full text-xs font-bold mb-4 uppercase tracking-tighter">
                <?= $org_name ?>
            </span>
            
            <h1 class="text-5xl lg:text-6xl font-headline font-extrabold tracking-tighter leading-tight mb-6">
                <?= $campaign_name ?>
            </h1>
            
            <p class="text-on-surface-variant text-lg leading-relaxed mb-8">
                <?= mb_substr(strip_tags($description), 0, 150) ?>...
            </p>
            
            <div class="flex flex-wrap gap-4">
                <button class="flex items-center gap-2 text-primary font-bold hover:opacity-80 transition-opacity">
                    <span class="material-symbols-outlined" data-icon="share">share</span> Share Campaign
                </button>
                <button class="flex items-center gap-2 text-primary font-bold hover:opacity-80 transition-opacity">
                    <span class="material-symbols-outlined" data-icon="favorite">favorite</span> Add to Wishlist
                </button>
            </div>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6">
    <div class="editorial-grid gap-10 lg:grid-cols-12 grid">
        <div class="col-span-12 lg:col-span-8 space-y-16">
            <div class="bg-surface-container-low p-10 lg:p-16 rounded-xl">
                <h2 class="text-3xl font-headline font-bold mb-8">The Story</h2>
                <div class="space-y-6 text-lg text-on-surface-variant leading-relaxed">
                    <p><?= $description ?></p>
                </div>
            </div>
            
            <div class="space-y-8">
                <h2 class="text-3xl font-headline font-bold">Recent Guardians</h2>
                <div class="space-y-4">
                    
                    <?php if (empty($donors)): ?>
                        <p class="text-on-surface-variant">Chưa có lượt quyên góp nào. Hãy là người đầu tiên!</p>
                    <?php else: ?>
                        <?php foreach ($donors as $donor): 
                            // Lấy 2 chữ cái đầu của tên để làm Avatar
                            $initials = strtoupper(mb_substr(preg_replace('/[^a-zA-Z]/', '', $donor['full_name']), 0, 2));
                            if (empty($initials)) $initials = "US";
                            
                            $donor_name = htmlspecialchars($donor['full_name']);
                            $amount_formatted = number_format($donor['amount'], 0, ',', '.') . ' VNĐ';
                            $time_ago = time_elapsed_string($donor['donation_time']);
                        ?>
                        <div class="flex items-center justify-between p-6 bg-surface-container-lowest rounded-xl border border-surface-container">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold">
                                    <?= $initials ?>
                                </div>
                                <div>
                                    <p class="font-bold"><?= $donor_name ?></p>
                                    <p class="text-sm text-on-surface-variant">"For a better future."</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-headline font-extrabold text-primary">+ <?= $amount_formatted ?></p>
                                <p class="text-xs text-on-surface-variant"><?= $time_ago ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if ($total_donors > 5): ?>
                        <button class="w-full py-4 text-primary font-bold border-2 border-primary/10 rounded-xl hover:bg-primary/5 transition-colors">
                            View All <?= $total_donors ?> Donors
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4">
            <div class="sticky top-32 space-y-6">
                <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_20px_40px_rgba(25,28,29,0.06)] border border-outline-variant/20">
                    <div class="mb-8">
                        <div class="flex justify-between items-end mb-4">
                            <div>
                                <span class="text-4xl font-headline font-extrabold text-primary">
                                    <?= number_format($total_donated, 0, ',', '.') ?> VNĐ
                                </span>
                                <span class="text-on-surface-variant block text-sm">raised of <?= number_format($target_amount, 0, ',', '.') ?> VNĐ goal</span>
                            </div>
                            <div class="text-right">
                                <span class="text-2xl font-headline font-bold text-secondary"><?= $percent ?>%</span>
                            </div>
                        </div>
                        <div class="w-full h-3 bg-surface-variant rounded-full overflow-hidden">
                            <div class="h-full bg-primary rounded-full" style="width: <?= $percent ?>%"></div>
                        </div>
                    </div>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-sm">
                            <span class="text-on-surface-variant">Donors</span>
                            <span class="font-bold"><?= number_format($total_donors) ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-on-surface-variant">Days Remaining</span>
                            <span class="font-bold"><?= $days_remaining ?> Days</span>
                        </div>
                    </div>
<div class="space-y-4">
<button class="w-full bg-secondary-container text-on-secondary-container py-5 rounded-xl font-headline font-extrabold text-xl shadow-[0_4px_0_0_#743500] hover:translate-y-[1px] hover:shadow-[0_2px_0_0_#743500] active:translate-y-[4px] active:shadow-none transition-all">
                                    Donate Now
                                </button>
<button class="w-full bg-surface-container-high text-on-surface py-4 rounded-xl font-bold flex items-center justify-center gap-2 hover:bg-surface-dim transition-colors">
<span class="material-symbols-outlined" data-icon="volunteer_activism">volunteer_activism</span>
                                    Join as Volunteer
                                </button>
</div>
<p class="text-center text-xs text-on-surface-variant mt-6 px-4 leading-relaxed">
<span class="material-symbols-outlined text-[10px] align-middle mr-1" data-icon="verified_user">verified_user</span>
                                100% of your donation goes directly to the field. Administrative costs are covered by our private endowment.
                            </p>
</div>
<!-- Share Card -->
<div class="bg-primary/5 p-6 rounded-xl border-l-4 border-primary">
<h4 class="font-bold mb-2">Help us spread the word</h4>
<p class="text-sm text-on-surface-variant mb-4">Campaigns shared on social media raise 3x more funds.</p>
<div class="flex gap-2">
<button class="p-3 bg-white rounded-lg shadow-sm hover:scale-110 transition-transform">
<svg class="w-5 h-5 fill-primary" viewbox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg>
</button>
<button class="p-3 bg-white rounded-lg shadow-sm hover:scale-110 transition-transform">
<svg class="w-5 h-5 fill-primary" viewbox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path></svg>
</button>
<button class="p-3 bg-white rounded-lg shadow-sm hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-primary" data-icon="link">link</span>
</button>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- Floating Donation Widget (Persistent) -->
<div class="fixed bottom-8 right-8 z-[60] md:hidden">
<button class="bg-tertiary text-on-tertiary p-5 rounded-full shadow-2xl flex items-center justify-center">
<span class="material-symbols-outlined text-3xl" data-icon="volunteer_activism" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
</button>
</div>
<!-- Footer -->
<footer class="w-full border-t border-slate-200 bg-slate-50">
<div class="flex flex-col md:flex-row justify-between items-center px-8 py-12 w-full max-w-7xl mx-auto">
<div class="mb-8 md:mb-0 text-left">
<div class="text-xl font-bold text-slate-900 mb-2">Transparent Guardian</div>
<p class="text-slate-500 max-w-xs text-sm">Empowering global change through radical transparency and community-driven action.</p>
</div>
<div class="flex flex-col md:flex-row gap-8 items-center font-inter text-sm">
<a class="text-slate-500 hover:text-blue-500 hover:underline transition-all" href="#">About Us</a>
<a class="text-slate-500 hover:text-blue-500 hover:underline transition-all" href="#">Impact Reports</a>
<a class="text-slate-500 hover:text-blue-500 hover:underline transition-all" href="#">Contact</a>
<a class="text-slate-500 hover:text-blue-500 hover:underline transition-all" href="#">Privacy Policy</a>
</div>
<div class="mt-8 md:mt-0 text-slate-500 text-xs">
                © 2024 The Transparent Guardian. All rights reserved.
            </div>
</div>
</footer>
</body></html>