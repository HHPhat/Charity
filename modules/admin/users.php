<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo
    include("../../includes/database.php");
?>
<!DOCTYPE html>

<html lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Quản lý người dùng - Admin Console</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;400;500;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "tertiary": "#b91830",
                    "on-primary-fixed-variant": "#00419e",
                    "on-tertiary-fixed-variant": "#92001f",
                    "on-primary-fixed": "#001946",
                    "inverse-on-surface": "#f0f1f2",
                    "surface-dim": "#d9dadb",
                    "surface-container-high": "#e7e8e9",
                    "secondary-fixed": "#ffdbc8",
                    "outline": "#727785",
                    "on-tertiary-container": "#130001",
                    "on-secondary-container": "#5f2a00",
                    "surface-container-low": "#f3f4f5",
                    "on-secondary-fixed-variant": "#743500",
                    "on-primary-container": "#ffffff",
                    "on-error-container": "#93000a",
                    "on-surface": "#191c1d",
                    "surface-tint": "#0057ce",
                    "surface-bright": "#f8f9fa",
                    "on-surface-variant": "#414754",
                    "tertiary-fixed-dim": "#ffb3b2",
                    "primary-fixed-dim": "#b1c5ff",
                    "surface": "#f8f9fa",
                    "secondary-fixed-dim": "#ffb68a",
                    "primary-container": "#0d6efd",
                    "surface-container": "#edeeef",
                    "tertiary-container": "#dd3645",
                    "error-container": "#ffdad6",
                    "surface-container-lowest": "#ffffff",
                    "surface-variant": "#e1e3e4",
                    "secondary": "#984700",
                    "on-primary": "#ffffff",
                    "inverse-surface": "#2e3132",
                    "primary-fixed": "#dae2ff",
                    "on-error": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "on-secondary-fixed": "#321300",
                    "primary": "#0057cd",
                    "inverse-primary": "#b1c5ff",
                    "secondary-container": "#ff8016",
                    "error": "#ba1a1a",
                    "background": "#f8f9fa",
                    "on-background": "#191c1d",
                    "tertiary-fixed": "#ffdad9",
                    "outline-variant": "#c1c6d6",
                    "surface-container-highest": "#e1e3e4",
                    "on-tertiary-fixed": "#410008",
                    "on-secondary": "#ffffff"
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
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .font-headline { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .sidebar-active { transition: all 0.4s ease-out; transform: scale(0.98); }
    </style>
</head>
<body class="text-on-surface bg-background">
<!-- SideNavBar Shell -->
<aside class="fixed left-0 top-0 h-full w-64 flex flex-col py-8 bg-slate-50 dark:bg-slate-950 z-50">
<div class="px-6 mb-10">
<div class="flex items-center gap-3">
</div>
<div>
<a href="../../"><h1 class="text-xl font-bold text-blue-700 dark:text-blue-400 font-headline leading-tight">Guardian Admin</h1></a>
<p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Institutional Steward</p>
</div>
</div>
</div>
<nav class="flex-1 px-4 space-y-2">
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-400 ease-out rounded-xl font-medium" href="index.php">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-400 ease-out rounded-xl font-medium" href="campaigns.php">
<span class="material-symbols-outlined" data-icon="campaign">campaign</span>
<span>Campaigns</span>
</a>
<!-- Active State: Users -->
<a class="flex items-center gap-4 py-3 text-blue-700 dark:text-blue-400 font-bold border-l-4 border-blue-700 dark:border-blue-400 pl-4 bg-slate-100 dark:bg-slate-900 rounded-r-xl sidebar-active" href="#">
<span class="material-symbols-outlined" data-icon="group" style="font-variation-settings: 'FILL' 1;">group</span>
<span>Users</span>
</a>
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-400 ease-out rounded-xl font-medium" href="charities.php">
<span class="material-symbols-outlined" data-icon="account_balance">account_balance</span>
<span>Charities</span>
</a>
<!-- Settings (Inactive) -->
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Settings</span>
</a>
</nav>
<div class="px-6 mb-8">
<button class="w-full py-3 bg-primary text-white rounded-xl font-bold shadow-lg shadow-blue-500/20 hover:scale-[1.02] transition-transform active:scale-95">
                Launch Appeal
            </button>
</div>
<div class="px-4 border-t border-slate-200 dark:border-slate-800 pt-6 space-y-2">
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span>Settings</span>
</a>
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
<span>Support</span>
</a>
</div>
</aside>
<!-- Main Wrapper -->
<div class="ml-64 min-h-screen flex flex-col">
<!-- TopNavBar Shell -->
<header class="sticky top-0 z-40 flex justify-between items-center px-10 py-4 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl shadow-sm dark:shadow-none transition-all duration-400 ease-out">
<div class="flex items-center flex-1 max-w-xl">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" data-icon="search">search</span>
<input class="w-full pl-12 pr-4 py-2.5 bg-surface-container-highest border-none rounded-md focus:ring-2 focus:ring-primary/20 text-sm" placeholder="Search users, IDs, or contributions..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-2">
<button class="p-2 text-slate-600 hover:text-blue-700 transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 text-slate-600 hover:text-blue-700 transition-colors">
<span class="material-symbols-outlined" data-icon="history">history</span>
</button>
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
        <div class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity" onclick="window.location.href=*../../'modules/accounts/'">
            <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                <span class="material-symbols-outlined">person</span>
            </div>
            <span class="font-manrope font-bold text-sm text-on-surface tracking-tight">
                <?= htmlspecialchars($_SESSION['account_id'] ?? 'User') ?>
            </span>
        </div>
        
        <button onclick="window.location.href='../../modules/auth/logout.php'" class="text-red-500 hover:text-red-600 font-manrope font-bold text-sm tracking-tight flex items-center gap-1 scale-95 active:scale-90 transition-transform">
            <span class="material-symbols-outlined text-sm">logout</span>
            Logout
        </button>
    </div>
<?php endif; ?>
</div>
</header>
<!-- Main Content Canvas -->
<main class="p-10 flex-1">
<div class="max-w-7xl mx-auto">
<!-- Page Header -->
<div class="flex justify-between items-end mb-10">
<div>
<h2 class="text-4xl font-extrabold font-headline tracking-tight text-on-surface">Quản lý người dùng</h2>
<p class="text-slate-500 mt-2 font-body max-w-lg">Manage your community of donors and supporters. Ensure data integrity and track impact across all campaigns.</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 px-5 py-2.5 bg-surface-container-low text-on-surface-variant rounded-xl font-semibold hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="download">download</span>
                            Xuất báo cáo
                        </button>
<button class="flex items-center gap-2 px-6 py-2.5 bg-secondary-container text-on-secondary-container rounded-xl font-bold shadow-sm hover:shadow-md transition-all">
<span class="material-symbols-outlined" data-icon="add">add</span>
                            Thêm người dùng
                        </button>
</div>
</div>
<!-- Stats Overview (Asymmetric/Editorial layout) -->
<!-- Filters & Table Section -->
<div class="bg-surface-container-lowest rounded-[2rem] p-4 shadow-sm">
<!-- High-End Filter Bar -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-2">
<div class="flex gap-3 items-center"><div class="flex border-b border-slate-200 w-full">
<button class="px-6 py-3 border-b-2 border-primary text-primary font-bold text-sm">
    Thông tin cá nhân
  </button>
<button class="px-6 py-3 text-slate-500 font-medium text-sm hover:text-primary transition-colors">
    Đóng góp
  </button>
</div></div>
<div class="text-sm text-slate-400 font-medium"> Hiển thị 1 - 10 trên 12,482 người dùng </div>
</div>
<!-- Modern Data Table -->
<?php
require_once '../../includes/database.php';

// 1. Cài đặt các thông số phân trang
$limit = 10; // Số lượng người dùng trên mỗi trang
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

// 2. Lấy dữ liệu từ Database
$total_records = get_total_donors_count(); // Hàm đã viết ở câu trước
$total_pages = ceil($total_records / $limit);
$donors = get_donors_paginated($limit, $offset);
?>

<div class="overflow-x-auto">
    <table class="w-full text-left border-separate border-spacing-y-2">
        <thead>
            <tr class="text-slate-400 text-[11px] uppercase tracking-widest font-bold">
                <th class="px-6 py-4">Tên</th>
                <th class="px-6 py-4">Liên hệ</th>
                <th class="px-6 py-4">Định danh</th>
                <th class="px-6 py-4">Tài khoản</th>
                <th class="px-6 py-4">Ngày tham gia</th> <th class="px-6 py-4">Số điện thoại</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            
            <?php if (empty($donors)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-slate-500">Không có dữ liệu nhà tài trợ.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($donors as $donor): 
                    $full_name = htmlspecialchars($donor['full_name']);
                    $email = htmlspecialchars($donor['email'] ?? 'Chưa cập nhật');
                    $phone = htmlspecialchars($donor['phone'] ?? 'Chưa cập nhật');
                    $citizen_id = htmlspecialchars($donor['citizen_id'] ?? 'N/A');
                    $account = htmlspecialchars($donor['account']);
                    $creation_date = $donor['creation_date'] ? date('d/m/Y', strtotime($donor['creation_date'])) : 'N/A';
                    
                    // Lấy 2 chữ cái đầu làm Avatar (Ví dụ: Nguyễn Minh -> NM)
                    $words = explode(" ", trim($full_name));
                    if (count($words) >= 2) {
                        $initials = mb_substr($words[0], 0, 1) . mb_substr(end($words), 0, 1);
                    } else {
                        $initials = mb_substr($full_name, 0, 2);
                    }
                    $initials = mb_strtoupper($initials);
                ?>
                <tr class="group hover:bg-surface-container-low transition-colors duration-300">
                    <td class="px-6 py-4 rounded-l-2xl border-l border-transparent group-hover:border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-orange-700">
                                <?= $initials ?>
                            </div>
                            <div>
                                <p class="font-bold text-on-surface"><?= $full_name ?></p>
                                <p class="text-xs text-slate-400">ID: #<?= $donor['donor_id'] ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 border-y border-transparent group-hover:border-slate-200">
                        <p class="font-medium"><?= $email ?></p>
                        <p class="text-xs text-slate-400"><?= $phone ?></p>
                    </td>
                    <td class="px-6 py-4 border-y border-transparent group-hover:border-slate-200">
                        <span class="font-mono text-xs bg-surface-variant px-2 py-1 rounded"><?= $citizen_id ?></span>
                    </td>
                    <td class="px-6 py-4 font-semibold text-primary border-y border-transparent group-hover:border-slate-200">
                        @<?= $account ?>
                    </td>
                    <td class="px-6 py-4 text-slate-500 border-y border-transparent group-hover:border-slate-200">
                        <?= $creation_date ?>
                    </td>
                    <td class="px-6 py-4 font-bold text-tertiary rounded-r-2xl border-r border-transparent group-hover:border-slate-200">
                        <p class="font-medium"><?= $phone ?></p>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
</div>

<?php if ($total_pages > 1): 
    $prev_page = ($page > 1) ? $page - 1 : 1;
    $next_page = ($page < $total_pages) ? $page + 1 : $total_pages;
?>
<div class="flex items-center justify-between p-6 mt-4">
    
    <div class="flex gap-2 mx-auto">
        <a href="?page=<?= $prev_page ?>" class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-100 text-slate-400 hover:bg-primary hover:text-white transition-all <?= ($page <= 1) ? 'pointer-events-none opacity-50' : '' ?>">
            <span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
        </a>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <?php if ($i == $page): ?>
                <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-white font-bold">
                    <?= $i ?>
                </span>
            <?php elseif (abs($page - $i) <= 2 || $i == 1 || $i == $total_pages): ?>
                <a href="?page=<?= $i ?>" class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-100 hover:bg-slate-50 font-bold text-slate-600">
                    <?= $i ?>
                </a>
            <?php elseif (abs($page - $i) == 3): ?>
                <span class="w-10 h-10 flex items-center justify-center text-slate-300">...</span>
            <?php endif; ?>
        <?php endfor; ?>

        <a href="?page=<?= $next_page ?>" class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-100 text-slate-400 hover:bg-primary hover:text-white transition-all <?= ($page >= $total_pages) ? 'pointer-events-none opacity-50' : '' ?>">
            <span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
        </a>
    </div>

</div>
<?php endif; ?>
<!-- Subtle Help Footer -->
<div class="mt-12 py-8 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-4 text-slate-400 text-sm">
<p>© 2024 Kindred Heart Admin. All data is encrypted with AES-256 standard.</p>
<div class="flex gap-6">
<a class="hover:text-primary transition-colors" href="#">Chính sách bảo mật</a>
<a class="hover:text-primary transition-colors" href="#">Điều khoản dịch vụ</a>
<a class="hover:text-primary transition-colors" href="#">Liên hệ hỗ trợ</a>
</div>
</div>
</div>
</main>
</div>
<!-- Floating Quick Actions -->
<div class="fixed bottom-8 right-8 z-50">
<button class="w-14 h-14 bg-white/90 backdrop-blur-xl border border-slate-100 shadow-2xl rounded-full flex items-center justify-center text-primary hover:scale-110 transition-transform active:scale-95 group">
<span class="material-symbols-outlined" data-icon="support_agent" style="font-variation-settings: 'FILL' 1;">support_agent</span>
<div class="absolute right-full mr-4 bg-on-surface text-white px-3 py-1.5 rounded-lg text-xs font-bold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity">
                Hỗ trợ kỹ thuật
            </div>
</button>
</div>
</body></html>