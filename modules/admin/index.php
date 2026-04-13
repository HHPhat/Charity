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

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Transparent Guardian | Admin Dashboard</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary": "#b91830",
                        "primary-fixed": "#dae2ff",
                        "on-primary-fixed-variant": "#00419e",
                        "tertiary-fixed": "#ffdad9",
                        "surface-tint": "#0057ce",
                        "secondary-fixed": "#ffdbc8",
                        "on-surface": "#191c1d",
                        "background": "#f8f9fa",
                        "surface-container": "#edeeef",
                        "on-primary-fixed": "#001946",
                        "on-primary-container": "#ffffff",
                        "on-background": "#191c1d",
                        "on-error": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#dd3645",
                        "surface-container-high": "#e7e8e9",
                        "error-container": "#ffdad6",
                        "primary": "#0057cd",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-highest": "#e1e3e4",
                        "secondary-container": "#ff8016",
                        "on-secondary": "#ffffff",
                        "inverse-surface": "#2e3132",
                        "on-secondary-container": "#5f2a00",
                        "on-error-container": "#93000a",
                        "secondary": "#984700",
                        "surface-container-low": "#f3f4f5",
                        "on-primary": "#ffffff",
                        "inverse-on-surface": "#f0f1f2",
                        "on-secondary-fixed": "#321300",
                        "on-tertiary-fixed": "#410008",
                        "surface-variant": "#e1e3e4",
                        "primary-fixed-dim": "#b1c5ff",
                        "tertiary-fixed-dim": "#ffb3b2",
                        "on-surface-variant": "#414754",
                        "primary-container": "#0d6efd",
                        "on-secondary-fixed-variant": "#743500",
                        "surface-dim": "#d9dadb",
                        "outline": "#727785",
                        "on-tertiary-container": "#130001",
                        "on-tertiary-fixed-variant": "#92001f",
                        "surface-bright": "#f8f9fa",
                        "inverse-primary": "#b1c5ff",
                        "secondary-fixed-dim": "#ffb68a",
                        "outline-variant": "#c1c6d6",
                        "error": "#ba1a1a",
                        "surface": "#f8f9fa"
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
        .editorial-shadow {
            box-shadow: 0 20px 40px rgba(25, 28, 29, 0.06);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface">
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-full w-64 flex flex-col py-8 bg-slate-50 dark:bg-slate-950 z-50">
<div class="px-6 mb-10">
<div class="flex items-center gap-3">
</div>
<div>
<h1 class="text-xl font-bold text-blue-700 dark:text-blue-400 font-headline leading-tight">Guardian Admin</h1>
<p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Institutional Steward</p>
</div>
</div>
</div>
<nav class="flex-1 space-y-1">
<!-- Dashboard Active -->
<a class="flex items-center gap-4 py-3 text-blue-700 dark:text-blue-400 font-bold border-l-4 border-blue-700 dark:border-blue-400 pl-4 bg-slate-100 dark:bg-slate-900 rounded-r-xl sidebar-active" href="#">
<span class="material-symbols-outlined" data-icon="group" style="font-variation-settings: 'FILL' 1;">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope font-semibold tracking-tight transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800" href="campaigns.php">
<span class="material-symbols-outlined">campaign</span>
<span>Campaigns</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope font-semibold tracking-tight transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800" href="users.php">
<span class="material-symbols-outlined">group</span>
<span>Users</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope font-semibold tracking-tight transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800" href="charities.php">
<span class="material-symbols-outlined">account_balance</span>
<span>Charities</span>
</a>
<!-- Settings (Inactive) -->
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Settings</span>
</a>
</nav>
</div>
<div class="mt-auto p-8 space-y-4">
<button class="w-full bg-primary text-on-primary py-3 rounded-xl font-headline font-bold text-sm editorial-shadow hover:opacity-90 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">add</span>
                Create Campaign
            </button>
<div class="pt-4 border-t border-slate-200 dark:border-slate-800 space-y-1">
<a class="flex items-center gap-3 px-4 py-2 text-slate-500 dark:text-slate-400 hover:text-blue-600 font-manrope font-semibold tracking-tight transition-all" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Settings</span>
</a>
<a class="flex items-center gap-3 px-4 py-2 text-slate-500 dark:text-slate-400 hover:text-blue-600 font-manrope font-semibold tracking-tight transition-all" href="#">
<span class="material-symbols-outlined">help</span>
<span>Support</span>
</a>
</div>
</div>
</aside>
<!-- TopNavBar -->
<header class="flex justify-between items-center h-16 px-8 ml-64 w-[calc(100%-16rem)] fixed top-0 bg-white/80 dark:bg-slate-950/80 backdrop-blur-xl z-40">
<div class="flex items-center flex-1 max-w-xl">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-900 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20" placeholder="Search across campaigns, donors, or transactions..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4 text-slate-600 dark:text-slate-400">
<button class="hover:text-blue-600 transition-all">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="hover:text-blue-600 transition-all">
<span class="material-symbols-outlined">history</span>
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
</div>
</header>
<!-- Main Content -->
<main class="ml-64 pt-24 px-8 pb-12">
<!-- Header Section -->
<section class="mb-12">
<div class="flex justify-between items-end">
<div>
<span class="bg-secondary-fixed text-on-secondary-fixed text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-3 inline-block">Institutional Overview</span>
<h2 class="text-4xl font-headline font-extrabold tracking-tight text-on-surface">Dashboard Dashboard</h2>
<p class="text-slate-500 font-medium mt-2 max-w-xl">Monitor your organization's impact metrics and active stewardship efforts across all verified channels.</p>
</div>
<div class="flex gap-3">
<div class="bg-surface-container-low p-1 rounded-lg flex">
<button class="px-4 py-1.5 text-xs font-bold rounded-md bg-white shadow-sm text-primary">Live View</button>
<button class="px-4 py-1.5 text-xs font-bold text-slate-500">Historical</button>
</div>
</div>
</div>
</section>
<!-- Metrics Bento Grid -->
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
<!-- Middle Section: Trends & Featured -->
<section class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
<!-- Donation Trend Chart Visual -->
<div class="lg:col-span-2 bg-surface-container-lowest p-8 rounded-3xl editorial-shadow relative overflow-hidden">
<div class="flex justify-between items-start mb-8">
<div>
<h3 class="text-xl font-headline font-bold">Donation Momentum</h3>
<p class="text-sm text-slate-500">Weekly accumulation vs. forecasted goals</p>
</div>
<div class="flex gap-4">
<div class="flex items-center gap-2 text-xs font-bold">
<span class="w-3 h-3 rounded-full bg-primary"></span> Actual
                        </div>
<div class="flex items-center gap-2 text-xs font-bold">
<span class="w-3 h-3 rounded-full bg-slate-200"></span> Goal
                        </div>
</div>
</div>
<!-- SVG Chart Mockup -->
<div class="h-64 w-full relative">
<svg class="w-full h-full" viewbox="0 0 800 250">
<defs>
<lineargradient id="chartGradient" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#0057cd" stop-opacity="0.2"></stop>
<stop offset="100%" stop-color="#0057cd" stop-opacity="0"></stop>
</lineargradient>
</defs>
<path d="M0,200 Q100,180 200,190 T400,140 T600,120 T800,40" fill="none" stroke="#0057cd" stroke-linecap="round" stroke-width="4"></path>
<path d="M0,200 Q100,180 200,190 T400,140 T600,120 T800,40 L800,250 L0,250 Z" fill="url(#chartGradient)"></path>
<path d="M0,210 Q150,205 300,190 T600,170 T800,160" fill="none" stroke="#e1e3e4" stroke-dasharray="8,8" stroke-width="2"></path>
<!-- Data Points -->
<circle cx="200" cy="190" fill="#0057cd" r="4"></circle>
<circle cx="400" cy="140" fill="#0057cd" r="4"></circle>
<circle cx="600" cy="120" fill="#0057cd" r="4"></circle>
<circle cx="800" cy="40" fill="#0057cd" r="6"></circle>
</svg>
<!-- Floating Data Tooltip -->
<div class="absolute top-4 right-10 bg-on-surface text-white p-3 rounded-xl text-xs font-bold editorial-shadow">
                        Peak: $84.2k
                    </div>
</div>
<div class="flex justify-between mt-6 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
<span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
</div>
</div>
<!-- Spotlight Card -->
<div class="bg-primary text-white rounded-3xl p-8 flex flex-col justify-between relative overflow-hidden">
<div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
<div class="relative z-10">
<span class="bg-white/20 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full inline-block mb-6">Critical Update</span>
<h3 class="text-2xl font-headline font-bold leading-tight mb-4">Amazon Basin Restoration Project</h3>
<p class="text-white/80 text-sm leading-relaxed mb-6">Reached 94% of funding goal. Requires immediate steward verification for phase two disbursement.</p>
</div>
<div class="relative z-10 space-y-4">
<div class="bg-white/10 rounded-2xl p-4 flex items-center justify-between">
<div>
<p class="text-[10px] text-white/60 font-bold uppercase">Target</p>
<p class="font-bold">$2.5M</p>
</div>
<div class="text-right">
<p class="text-[10px] text-white/60 font-bold uppercase">Raised</p>
<p class="font-bold">$2.38M</p>
</div>
</div>
<button class="w-full bg-white text-primary py-3 rounded-xl font-headline font-bold text-sm">Review Disbursement</button>
</div>
</div>
</section>
<!-- Table: Latest Campaigns -->
<section class="bg-surface-container-lowest rounded-3xl editorial-shadow overflow-hidden">
<div class="p-8 flex justify-between items-center border-b border-slate-50">
<div>
<h3 class="text-xl font-headline font-bold">Latest Campaigns</h3>
<p class="text-sm text-slate-500">Real-time status of recently launched initiatives</p>
</div>
<button class="text-primary font-bold text-sm flex items-center gap-1 hover:underline">
                    View All <span class="material-symbols-outlined text-sm">chevron_right</span>
</button>
</div>
<div class="overflow-x-auto">
<?php
require_once '../../includes/database.php';

// Lấy 3 chiến dịch mới nhận được quyên góp
$latest_campaigns = get_latest_donated_campaigns(3);
?>

<table class="w-full text-left">
    <thead>
        <tr class="text-[10px] uppercase tracking-widest font-bold text-slate-400 bg-slate-50/50">
            <th class="px-8 py-4">Campaign Name</th>
            <th class="px-8 py-4">Lead Organization</th>
            <th class="px-8 py-4">Progress</th>
            <th class="px-8 py-4">Status</th>
            <th class="px-8 py-4">Timeline</th>
            <th class="px-8 py-4 text-right">Action</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
        
        <?php if (empty($latest_campaigns)): ?>
            <tr>
                <td colspan="6" class="px-8 py-6 text-center text-slate-500">Chưa có dữ liệu chiến dịch.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($latest_campaigns as $camp): 
                $id = $camp['campaign_id'];
                $img_path = "/Charity/templates/assets/image/campaigns/{$id}/campaign_{$id}.jpg";
                
                $c_name = htmlspecialchars($camp['campaign_name']);
                $org_name = htmlspecialchars($camp['org_name']);
                
                // Tính phần trăm tiến độ
                $target = $camp['target_amount'];
                $raised = $camp['total_raised'];
                $percent = ($target > 0) ? min(100, round(($raised / $target) * 100)) : 0;
                
                // Định dạng thời gian
                $start_date = date('d/m/Y', strtotime($camp['start_date']));
                $end_date = date('d/m/Y', strtotime($camp['end_date']));
                
                // Xử lý hiển thị trạng thái
                $status_raw = strtolower($camp['status']);
                if ($status_raw === 'ongoing') {
                    $status_text = 'Đang hoạt động';
                    $status_class = 'bg-emerald-100 text-emerald-700';
                } elseif ($status_raw === 'completed' || $percent >= 100) {
                    $status_text = 'Đã hoàn thành';
                    $status_class = 'bg-blue-100 text-blue-700';
                } else {
                    $status_text = 'Đã kết thúc';
                    $status_class = 'bg-slate-100 text-slate-600';
                }
            ?>
            
            <tr class="hover:bg-slate-50/50 transition-colors">
                <td class="px-8 py-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg overflow-hidden shrink-0 bg-slate-200">
                            <img class="w-full h-full object-cover" 
                                 src="<?= $img_path ?>" 
                                 onerror="this.src='/Charity/templates/assets/image/default_campaign.jpg'" 
                                 alt="<?= $c_name ?>"/>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-on-surface line-clamp-1" title="<?= $c_name ?>"><?= $c_name ?></p>
                            <p class="text-[10px] text-slate-400">ID: CA-<?= str_pad($id, 4, '0', STR_PAD_LEFT) ?></p>
                        </div>
                    </div>
                </td>
                
                <td class="px-8 py-6">
                    <p class="text-sm font-medium text-slate-700"><?= $org_name ?></p>
                </td>
                
                <td class="px-8 py-6 w-48">
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden" title="<?= number_format($raised, 0, ',', '.') ?> VNĐ">
                            <div class="h-full <?= $percent >= 100 ? 'bg-green-500' : 'bg-primary' ?>" style="width: <?= $percent ?>%"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-600"><?= $percent ?>%</span>
                    </div>
                </td>
                
                <td class="px-8 py-6">
                    <span class="px-2 py-1 rounded-md <?= $status_class ?> text-[10px] font-bold uppercase tracking-tight">
                        <?= $status_text ?>
                    </span>
                </td>
                
                <td class="px-8 py-6">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-slate-700"><?= $start_date ?></span>
                        <span class="text-[10px] text-slate-400">Đến <?= $end_date ?></span>
                    </div>
                </td>
                
                <td class="px-8 py-6 text-right">
                    <button class="text-slate-400 hover:text-primary transition-colors" onclick="window.location.href='../campaign_detail/?id=<?= $id ?>'">
                        <span class="material-symbols-outlined">more_vert</span>
                    </button>
                </td>
            </tr>
            
            <?php endforeach; ?>
        <?php endif; ?>
        
    </tbody>
</table>
</div>
</section>
</main>

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