<?php 
    session_start();
    // if (!isset($_SESSION["role"]) || $_SESSION["role"] != "Admin" ) {
    //     die('Truy cập không hợp lệ');
    // }
    include("../../includes/database.php");
    // Lấy dữ liệu từ database
    $total_amount = get_total_donations_amount(); 
    
    $active_campaigns = get_active_campaigns_count();

    $total_donors = get_total_donors_count();
    $total_orgs = get_total_organizations_count();
?>
<!DOCTYPE html>

<html class="light" lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Quản lý chiến dịch | Kindred Heart</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "outline": "#727785",
                      "surface-dim": "#d9dadb",
                      "surface-container-high": "#e7e8e9",
                      "secondary-fixed": "#ffdbc8",
                      "surface-container-low": "#f3f4f5",
                      "on-secondary-fixed-variant": "#743500",
                      "on-primary-container": "#ffffff",
                      "on-tertiary-container": "#130001",
                      "on-secondary-container": "#5f2a00",
                      "tertiary": "#b91830",
                      "on-tertiary-fixed-variant": "#92001f",
                      "on-primary-fixed": "#001946",
                      "inverse-on-surface": "#f0f1f2",
                      "on-primary-fixed-variant": "#00419e",
                      "surface": "#f8f9fa",
                      "secondary-fixed-dim": "#ffb68a",
                      "on-surface-variant": "#414754",
                      "tertiary-fixed-dim": "#ffb3b2",
                      "primary-fixed-dim": "#b1c5ff",
                      "primary-container": "#0d6efd",
                      "surface-container": "#edeeef",
                      "on-surface": "#191c1d",
                      "on-error-container": "#93000a",
                      "surface-tint": "#0057ce",
                      "surface-bright": "#f8f9fa",
                      "on-primary": "#ffffff",
                      "inverse-surface": "#2e3132",
                      "primary-fixed": "#dae2ff",
                      "on-error": "#ffffff",
                      "tertiary-container": "#dd3645",
                      "surface-container-lowest": "#ffffff",
                      "surface-variant": "#e1e3e4",
                      "secondary": "#984700",
                      "error-container": "#ffdad6",
                      "error": "#ba1a1a",
                      "background": "#f8f9fa",
                      "on-background": "#191c1d",
                      "surface-container-highest": "#e1e3e4",
                      "on-tertiary-fixed": "#410008",
                      "on-secondary": "#ffffff",
                      "tertiary-fixed": "#ffdad9",
                      "outline-variant": "#c1c6d6",
                      "on-tertiary": "#ffffff",
                      "on-secondary-fixed": "#321300",
                      "secondary-container": "#ff8016",
                      "primary": "#0057cd",
                      "inverse-primary": "#b1c5ff"
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
        .editorial-asymmetry {
            grid-template-columns: repeat(12, 1fr);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface antialiased flex min-h-screen">
<!-- SideNavBar Component -->
<aside class="flex flex-col h-full sticky left-0 top-0 pt-6 pb-8 px-4 h-screen w-72 border-r border-slate-200/50 dark:border-slate-800/50 bg-slate-50 dark:bg-slate-950 font-['Manrope'] font-semibold tracking-wide text-sm">
    
<div class="px-6 mb-10">
<div class="flex items-center gap-3">
</div>
<div>
<h1 class="text-xl font-bold text-blue-700 dark:text-blue-400 font-headline leading-tight">Guardian Admin</h1>
<p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Institutional Steward</p>
</div>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 text-slate-600 dark:text-slate-400 font-medium hover:text-blue-600 dark:hover:text-blue-300 hover:bg-slate-100 dark:hover:bg-slate-900" href="index.php">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-4 py-3 text-blue-700 dark:text-blue-400 font-bold border-l-4 border-blue-700 dark:border-blue-400 pl-4 bg-slate-100 dark:bg-slate-900 rounded-r-xl sidebar-active" href="#">
<span class="material-symbols-outlined" data-icon="group" style="font-variation-settings: 'FILL' 1;">campaign</span>
<span>Campaigns</span>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 text-slate-600 dark:text-slate-400 font-medium hover:text-blue-600 dark:hover:text-blue-300 hover:bg-slate-100 dark:hover:bg-slate-900" href="users.php">
<span class="material-symbols-outlined" data-icon="group">group</span>
<span>Users</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 text-slate-600 dark:text-slate-400 font-medium hover:text-blue-600 dark:hover:text-blue-300 hover:bg-slate-100 dark:hover:bg-slate-900" href="charities.php">
<span class="material-symbols-outlined" data-icon="account_balance">account_balance</span>
<span>Charities</span>
</a>
<!-- Settings (Inactive) -->
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Settings</span>
</a>
</nav>
<div class="mt-auto pt-6 space-y-1 border-t border-slate-200/50">
<a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-100 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
<span>Support</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-100 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span>Archive</span>
</a>
<button class="w-full mt-4 bg-primary text-white py-3 rounded-xl font-bold hover:shadow-lg transition-all active:scale-95 flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">add</span>
<span>Start Appeal</span>
</button>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 flex flex-col min-w-0">
<!-- TopNavBar Component -->
<header class="flex justify-between items-center px-8 py-3 w-full sticky top-0 z-50 bg-slate-50/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200/50 dark:border-slate-800/50 shadow-sm">
<div class="flex items-center flex-1 max-w-xl">
<div class="relative w-full group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-100/50 border-none rounded-lg focus:ring-2 focus:ring-primary/20 text-sm transition-all" placeholder="Tìm kiếm chiến dịch hoặc tổ chức..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4 ml-8">
<button class="p-2 rounded-full hover:bg-slate-200/50 dark:hover:bg-slate-800/50 transition-colors duration-400 text-slate-500">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 rounded-full hover:bg-slate-200/50 dark:hover:bg-slate-800/50 transition-colors duration-400 text-slate-500">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
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
</div>
</header>
<!-- Content Canvas -->
<div class="p-8 space-y-10">
<!-- Hero Header Section -->
<div class="grid grid-cols-12 gap-6 items-end">
<div class="col-span-12 md:col-span-8">
<h2 class="font-headline font-extrabold text-4xl tracking-tighter text-on-surface mb-2">Quản lý chiến dịch</h2>
<p class="text-slate-500 font-body max-w-lg">Theo dõi và điều phối các nỗ lực thiện nguyện toàn cầu nhằm mang lại tác động tối ưu nhất.</p>
</div>
<div class="col-span-12 md:col-span-4 flex justify-end">
<button class="bg-primary text-white px-6 py-3.5 rounded-xl font-headline font-bold text-sm shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all flex items-center gap-2 group">
<span class="material-symbols-outlined text-lg group-hover:rotate-90 transition-transform">add</span>
                        Thêm chiến dịch mới
                    </button>
</div>
</div>
<!-- Stats Bento Grid -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
    <div class="bg-surface-container-lowest p-6 rounded-2xl editorial-shadow group border-l-4 border-primary">
        <div class="flex justify-between items-start mb-4">
            <div class="w-10 h-10 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
                <span class="material-symbols-outlined">payments</span>
            </div>
            <span class="text-xs font-bold text-emerald-600 flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">trending_up</span> +12.5%
            </span>
        </div>
        <p class="text-slate-500 text-sm font-medium">Tổng tiền quyên góp</p>
        <h3 class="text-2xl font-headline font-extrabold mt-1">
            <span class="animate-number" data-target="<?= $total_amount ?>">0</span> <span class="text-sm">VNĐ</span>
        </h3>
        <div class="mt-4 h-1 w-full bg-slate-100 rounded-full overflow-hidden">
            <div class="h-full bg-primary w-[75%]"></div>
        </div>
    </div>

    <div class="bg-surface-container-lowest p-6 rounded-2xl editorial-shadow border-l-4 border-secondary-container">
        <div class="flex justify-between items-start mb-4">
            <div class="w-10 h-10 rounded-lg bg-secondary-fixed flex items-center justify-center text-secondary">
                <span class="material-symbols-outlined">campaign</span>
            </div>
            <span class="text-xs font-bold text-slate-400">Đang thực hiện</span>
        </div>
        <p class="text-slate-500 text-sm font-medium">Chiến dịch hoạt động</p>
        <h3 class="text-2xl font-headline font-extrabold mt-1">
            <span class="animate-number" data-target="<?= $active_campaigns ?>">0</span>
        </h3>
        </div>

    <div class="bg-surface-container-lowest p-6 rounded-2xl editorial-shadow border-l-4 border-blue-400">
        <div class="flex justify-between items-start mb-4">
            <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                <span class="material-symbols-outlined">verified_user</span>
            </div>
            <span class="text-xs font-bold text-emerald-600 flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">check_circle</span> 99.8%
            </span>
        </div>
        <p class="text-slate-500 text-sm font-medium">Nhà tài trợ xác thực</p>
        <h3 class="text-2xl font-headline font-extrabold mt-1">
            <span class="animate-number" data-target="<?= $total_donors ?>">0</span>
        </h3>
        <p class="text-[10px] text-slate-400 mt-4 uppercase tracking-tighter font-bold">Identity verified by Guardian Shield</p>
    </div>

    <div class="bg-surface-container-lowest p-6 rounded-2xl editorial-shadow border-l-4 border-tertiary">
        <div class="flex justify-between items-start mb-4">
            <div class="w-10 h-10 rounded-lg bg-tertiary-fixed flex items-center justify-center text-tertiary">
                <span class="material-symbols-outlined">volunteer_activism</span>
            </div>
        </div>
        <p class="text-slate-500 text-sm font-medium">Tổ chức đối tác</p>
        <h3 class="text-2xl font-headline font-extrabold mt-1">
            <span class="animate-number" data-target="<?= $total_orgs ?>">0</span>
        </h3>
        <div class="mt-4 flex items-center gap-2 text-[10px] font-bold text-tertiary">
            <span class="material-symbols-outlined text-xs">location_on</span> Global Network Reach
        </div>
    </div>
</section>
<!-- Main Table Section -->
<div class="bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden">
<!-- Filter Bar -->
<div class="px-8 py-5 border-b border-slate-100 flex flex-wrap items-center justify-between gap-4">
<div class="flex items-center gap-6">
<button class="text-primary font-bold text-sm border-b-2 border-primary pb-1">Tất cả</button>
<button class="text-slate-500 font-medium text-sm hover:text-on-surface transition-colors pb-1">Đang hoạt động</button>
<button class="text-slate-500 font-medium text-sm hover:text-on-surface transition-colors pb-1">Hoàn thành</button>
<button class="text-slate-500 font-medium text-sm hover:text-on-surface transition-colors pb-1">Đang chờ</button>
</div>
<div class="flex items-center gap-3">
<button class="flex items-center gap-2 px-4 py-2 bg-surface-container rounded-lg text-xs font-bold text-on-surface-variant hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined text-sm">filter_list</span>
                            Bộ lọc nâng cao
                        </button>
<button class="flex items-center gap-2 px-4 py-2 bg-surface-container rounded-lg text-xs font-bold text-on-surface-variant hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined text-sm">download</span>
                            Xuất báo cáo
                        </button>
</div>
</div>
<!-- Table -->
<?php
require_once '../../includes/database.php';

// 1. Cài đặt các thông số phân trang
$limit = 5; // Số chiến dịch hiển thị trên 1 trang
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

// 2. Lấy dữ liệu
$total_campaigns = get_total_campaigns_count2();
$total_pages = ceil($total_campaigns / $limit);
$campaigns = get_paginated_campaigns($limit, $offset);

// 3. Tính toán số hiển thị cho dòng "Hiển thị X-Y trong số Z"
$start_display = ($total_campaigns > 0) ? $offset + 1 : 0;
$end_display = min($offset + $limit, $total_campaigns);
?>

<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-surface-container-low/50">
                <th class="px-8 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-black">Tên chiến dịch</th>
                <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-black">Tổ chức</th>
                <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-black">Tiến trình</th>
                <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-black">Trạng thái</th>
                <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-black text-right">Mục tiêu (VNĐ)</th>
                <th class="px-8 py-4 text-[10px] uppercase tracking-widest text-slate-500 font-black text-right">Ngày kết thúc</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            
            <?php if (empty($campaigns)): ?>
                <tr>
                    <td colspan="6" class="px-8 py-5 text-center text-slate-500">Không có dữ liệu chiến dịch.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($campaigns as $camp): 
                    $id = $camp['campaign_id'];
                    $c_name = htmlspecialchars($camp['campaign_name']);
                    $org_name = htmlspecialchars($camp['org_name'] ?? 'Tổ chức ẩn danh');
                    $target = $camp['target_amount'];
                    $raised = $camp['total_raised'];
                    
                    // Tính phần trăm
                    $percent = ($target > 0) ? min(100, round(($raised / $target) * 100)) : 0;
                    
                    // Xử lý Ngày kết thúc
                    $end_date = date('d Thm, Y', strtotime($camp['end_date'])); // Ví dụ: 30 Th09, 2024
                    
                    // Ảnh bìa
                    $img_path = "/Charity/templates/assets/image/campaigns/{$id}/campaign_{$id}.jpg";
                    
                    // Xử lý Trạng thái (Màu sắc và nội dung)
                    $status_raw = strtolower($camp['status']);
                    if ($status_raw == 'ongoing') {
                        $status_label = 'Ongoing';
                        $status_bg = 'bg-emerald-100 text-emerald-700';
                        $status_dot = 'bg-emerald-600';
                    } elseif ($status_raw == 'pending') {
                        $status_label = 'Pending';
                        $status_bg = 'bg-orange-100 text-orange-700';
                        $status_dot = 'bg-orange-600';
                    } else {
                        $status_label = 'Completed';
                        $status_bg = 'bg-blue-100 text-blue-700';
                        $status_dot = 'bg-blue-600';
                    }
                ?>
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg overflow-hidden bg-slate-200 shrink-0">
                                <img alt="<?= $c_name ?>" class="w-full h-full object-cover" 
                                     src="<?= $img_path ?>" 
                                     onerror="this.src='/Charity/templates/assets/image/default_campaign.jpg'"/>
                            </div>
                            <div>
                                <p class="font-headline font-bold text-sm text-on-surface group-hover:text-primary transition-colors line-clamp-1" title="<?= $c_name ?>">
                                    <?= $c_name ?>
                                </p>
                                <p class="text-xs text-slate-400">ID: CA-<?= str_pad($id, 4, '0', STR_PAD_LEFT) ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-xs font-semibold text-slate-600"><?= $org_name ?></p>
                    </td>
                    <td class="px-6 py-5">
                        <div class="w-40">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-[10px] font-black <?= $percent >= 100 ? 'text-emerald-600' : 'text-secondary' ?>"><?= $percent ?>%</span>
                            </div>
                            <div class="h-1.5 w-full bg-surface-variant rounded-full overflow-hidden" title="<?= number_format($raised, 0, ',', '.') ?> VNĐ">
                                <div class="h-full <?= $percent >= 100 ? 'bg-emerald-500' : 'bg-secondary' ?> rounded-full" style="width: <?= $percent ?>%"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full <?= $status_bg ?> text-[10px] font-bold uppercase tracking-wider">
                            <span class="w-1 h-1 rounded-full <?= $status_dot ?>"></span>
                            <?= $status_label ?>
                        </span>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <p class="font-headline font-bold text-sm"><?= number_format($target, 0, ',', '.') ?></p>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <p class="text-xs text-slate-500"><?= $end_date ?></p>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            
        </tbody>
    </table>
</div>

<div class="px-8 py-4 bg-surface-container-low/30 border-t border-slate-100 flex items-center justify-between">
    <p class="text-xs text-slate-500 font-medium">
        Hiển thị <span class="font-bold text-on-surface"><?= $start_display ?>-<?= $end_display ?></span> 
        trong số <span class="font-bold text-on-surface"><?= number_format($total_campaigns, 0, ',', '.') ?></span> chiến dịch
    </p>
    
    <?php if ($total_pages > 1): ?>
        <div class="flex items-center gap-2">
            <a href="?page=<?= max(1, $page - 1) ?>" class="p-2 rounded-lg hover:bg-surface-container transition-colors <?= ($page <= 1) ? 'opacity-30 pointer-events-none' : '' ?>">
                <span class="material-symbols-outlined text-sm">chevron_left</span>
            </a>
            
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $page): ?>
                    <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white text-xs font-bold"><?= $i ?></span>
                <?php elseif (abs($page - $i) <= 2 || $i == 1 || $i == $total_pages): ?>
                    <a href="?page=<?= $i ?>" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-surface-container text-xs font-bold transition-colors"><?= $i ?></a>
                <?php elseif (abs($page - $i) == 3): ?>
                    <span class="text-slate-400 text-xs">...</span>
                <?php endif; ?>
            <?php endfor; ?>
            
            <a href="?page=<?= min($total_pages, $page + 1) ?>" class="p-2 rounded-lg hover:bg-surface-container transition-colors <?= ($page >= $total_pages) ? 'opacity-30 pointer-events-none' : '' ?>">
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
        </div>
    <?php endif; ?>
</div>
<!-- Contextual Layout Hint: Asymmetry -->
</div>
</main>
<!-- Floating Donation Widget (Suppressed on Admin but keeping for Design System consistency) -->
<!-- Suppressed on Task-Focused Admin Page per Rules -->
</body></html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hàm định dạng số hàng nghìn (vd: 1.000.000)
    const formatNumber = (num) => num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    // Lấy tất cả các thẻ có class animate-number
    const counters = document.querySelectorAll('.animate-number');
    const duration = 2000; // Tổng thời gian chạy 2 giây
    const frameRate = 1000 / 60; // 60 khung hình/giây
    const totalFrames = Math.round(duration / frameRate);

    counters.forEach(counter => {
        const target = parseFloat(counter.getAttribute('data-target')) || 0;
        let currentFrame = 0;

        const updateCounter = () => {
            currentFrame++;
            // Thuật toán ease-out: giúp số chạy mượt, chậm dần về cuối
            const progress = 1 - Math.pow(1 - currentFrame / totalFrames, 3);
            const currentValue = Math.floor(progress * target);

            counter.innerText = formatNumber(currentValue);

            if (currentFrame < totalFrames) {
                requestAnimationFrame(updateCounter);
            } else {
                counter.innerText = formatNumber(target); // Fix số cuối cùng
            }
        };

        requestAnimationFrame(updateCounter);
    });
});
</script>