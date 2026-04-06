<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Transparent Guardian Admin Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-fixed": "#410008",
                        "tertiary-fixed-dim": "#ffb3b2",
                        "surface-tint": "#0057ce",
                        "secondary": "#984700",
                        "outline": "#727785",
                        "on-background": "#191c1d",
                        "surface-variant": "#e1e3e4",
                        "on-surface": "#191c1d",
                        "on-secondary": "#ffffff",
                        "inverse-surface": "#2e3132",
                        "tertiary-fixed": "#ffdad9",
                        "secondary-fixed": "#ffdbc8",
                        "background": "#f8f9fa",
                        "surface-container-highest": "#e1e3e4",
                        "primary": "#0057cd",
                        "on-error-container": "#93000a",
                        "on-tertiary-container": "#130001",
                        "inverse-primary": "#b1c5ff",
                        "primary-fixed": "#dae2ff",
                        "on-secondary-fixed": "#321300",
                        "inverse-on-surface": "#f0f1f2",
                        "surface-container": "#edeeef",
                        "primary-container": "#0d6efd",
                        "on-primary": "#ffffff",
                        "on-error": "#ffffff",
                        "on-tertiary-fixed-variant": "#92001f",
                        "tertiary-container": "#dd3645",
                        "surface-container-high": "#e7e8e9",
                        "on-primary-container": "#ffffff",
                        "surface-dim": "#d9dadb",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f3f4f5",
                        "secondary-fixed-dim": "#ffb68a",
                        "secondary-container": "#ff8016",
                        "on-tertiary": "#ffffff",
                        "surface": "#f8f9fa",
                        "error": "#ba1a1a",
                        "tertiary": "#b91830",
                        "surface-bright": "#f8f9fa",
                        "on-primary-fixed": "#001946",
                        "primary-fixed-dim": "#b1c5ff",
                        "outline-variant": "#c1c6d6",
                        "on-surface-variant": "#414754",
                        "error-container": "#ffdad6",
                        "on-secondary-container": "#5f2a00",
                        "on-primary-fixed-variant": "#00419e"
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
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; color: #191c1d; }
        h1, h2, h3, h4 { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface">
<div class="flex min-h-screen">
<!-- SideNavBar -->
<aside class="hidden md:flex flex-col h-screen w-64 border-r border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900 sticky top-0 z-50">
<div class="flex flex-col h-full p-6 space-y-4">
<div class="flex items-center gap-3 px-2 mb-8">
<div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white shadow-lg">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">guardian</span>
</div>
<div>
<h1 class="text-lg font-black text-blue-700 dark:text-blue-400 font-headline leading-none">Transparent Guardian</h1>
<p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mt-1">Admin Console</p>
</div>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-transform duration-300 hover:translate-x-1 font-manrope tracking-tight text-sm" href="#">
<span class="material-symbols-outlined">dashboard</span>
                        Dashboard
                    </a>
<a class="flex items-center gap-3 px-4 py-3 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-400 font-semibold rounded-lg font-manrope tracking-tight text-sm" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
                        Campaigns
                    </a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-transform duration-300 hover:translate-x-1 font-manrope tracking-tight text-sm" href="#">
<span class="material-symbols-outlined">group</span>
                        Donors
                    </a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-transform duration-300 hover:translate-x-1 font-manrope tracking-tight text-sm" href="#">
<span class="material-symbols-outlined">analytics</span>
                        Impact Reports
                    </a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-transform duration-300 hover:translate-x-1 font-manrope tracking-tight text-sm" href="#">
<span class="material-symbols-outlined">tune</span>
                        Settings
                    </a>
</nav>
<div class="pt-6 border-t border-slate-100 dark:border-slate-800">
<button class="w-full bg-primary text-on-primary py-3 px-4 rounded-xl font-bold text-sm shadow-[0_2px_0_0_#00419e] hover:brightness-110 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">add</span>
                        Create Campaign
                    </button>
</div>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 min-w-0">
<!-- TopNavBar -->
<header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm dark:shadow-none docked full-width top-0 sticky z-40">
<div class="flex justify-between items-center px-8 py-3 w-full border-b border-slate-100 dark:border-slate-800">
<div class="flex items-center flex-1">
<div class="relative w-full max-w-md">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
<input class="w-full bg-slate-50 dark:bg-slate-950 border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary/20 placeholder:text-slate-400" placeholder="Search campaigns, donors, or reports..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 transition-colors duration-300">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 transition-colors duration-300">
<span class="material-symbols-outlined">settings</span>
</button>
<div class="h-8 w-8 rounded-full bg-slate-200 overflow-hidden ml-2">
<img alt="Administrator Profile" data-alt="close-up portrait of a professional male administrator with a friendly expression in a bright modern office setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBJfE3j1_w_c67RGWkB2vyJTTFPxfCas_JQ3YdNJxWVOCDhCIkyqBEQa3xYqjejkzg21l29MOcEe4l1KZ2Yz7GnTDIKeMkBSTLclJt9IeFEHsENZH8hCpUoU-PKGGXIygwgp4O25_m9rh4jeDQuyqfUR4a-OPlFCojVh2P-d-vqUq1Ks2dObYCeieen3NBixEDEaynsuyItV9hY19GvohiWE-YvxC28eMvsV47heoH0JfzJfjlHP98nOek4RQoZqyGQC4i4hhxk_IgG"/>
</div>
</div>
</div>
</header>
<div class="p-8 space-y-12">
<!-- Header & Stats Asymmetry -->
<section class="flex flex-col md:flex-row justify-between items-end gap-8">
<div class="max-w-2xl">
<span class="inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed text-xs font-bold rounded-full mb-4">Performance Overview</span>
<h2 class="text-5xl font-black text-on-surface tracking-tight leading-tight">Impact <br/>Dashboard.</h2>
<p class="mt-4 text-on-surface-variant text-lg max-w-lg leading-relaxed">
                            Review and manage your organization's mission. Your transparency is the foundation of our collective trust.
                        </p>
</div>
<!-- Quick Stats Grid (Bento Style) -->
<div class="grid grid-cols-2 gap-4 w-full md:w-auto">
<div class="bg-white p-6 rounded-2xl shadow-[0_20px_40px_rgba(25,28,29,0.04)] flex flex-col gap-2 min-w-[180px]">
<span class="material-symbols-outlined text-primary text-3xl">payments</span>
<span class="text-2xl font-black text-on-surface tracking-tighter">$1.2M</span>
<span class="text-xs text-slate-500 font-medium uppercase tracking-wider">Funds Raised</span>
</div>
<div class="bg-primary p-6 rounded-2xl shadow-lg flex flex-col gap-2 min-w-[180px] text-on-primary">
<span class="material-symbols-outlined text-3xl">rocket_launch</span>
<span class="text-2xl font-black tracking-tighter">24</span>
<span class="text-xs text-blue-100 font-medium uppercase tracking-wider">Active Campaigns</span>
</div>
</div>
</section>
<!-- Secondary Stats Row -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="bg-surface-container-low p-6 rounded-2xl border border-transparent hover:border-primary/10 transition-all">
<div class="flex justify-between items-start">
<span class="text-on-surface-variant text-sm font-semibold">Total Donors</span>
<div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-xl">groups</span>
</div>
</div>
<div class="mt-4">
<h4 class="text-3xl font-black text-on-surface">8,421</h4>
<div class="flex items-center gap-1 mt-1 text-green-600 text-xs font-bold">
<span class="material-symbols-outlined text-sm">trending_up</span>
                                +12% this month
                            </div>
</div>
</div>
<div class="bg-surface-container-low p-6 rounded-2xl border border-transparent hover:border-primary/10 transition-all">
<div class="flex justify-between items-start">
<span class="text-on-surface-variant text-sm font-semibold">Lives Impacted</span>
<div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-tertiary shadow-sm">
<span class="material-symbols-outlined text-xl">favorite</span>
</div>
</div>
<div class="mt-4">
<h4 class="text-3xl font-black text-on-surface">42.5k</h4>
<div class="flex items-center gap-1 mt-1 text-green-600 text-xs font-bold">
<span class="material-symbols-outlined text-sm">trending_up</span>
                                +5.2k this year
                            </div>
</div>
</div>
<!-- Empty/Asymmetric spacer for editorial feel -->
<div class="md:col-span-2 relative overflow-hidden rounded-3xl bg-slate-900 flex items-center p-8">
<div class="relative z-10">
<h3 class="text-white text-xl font-bold leading-tight">Transparency <br/>is our priority.</h3>
<p class="text-slate-400 text-sm mt-2">All data is real-time and audited.</p>
</div>
<div class="absolute right-0 top-0 h-full w-1/2 opacity-40">
<img alt="abstract technology background" class="h-full w-full object-cover" data-alt="abstract digital network connection lines and nodes on a dark blue background representing data transparency and security" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlUV_2EX78wYqAd4BTPl4fy0NCAbgdU3olPKTEwk4CVb66xcTYMdJrHR2k0SpILoSFhmpkCQvtAlcf4LuRRbz3QUEeWoqybJESG9pphvL4ZxCe_gZLC2Yz9gdqP9d3I9z7bIcrkP62AY7GnR_9uBX40YCyt1qYVzfx-TVukwj5kC6-RJUs0UQ46xV09yGQMllTGpAauvpK6XXjr4KI_nqSWwfSIyA9hUisL5grP7nCKfbTB7uDF6jQ6lxtwgn1bORCrhIkgNST24Oc"/>
</div>
</div>
</section>
<!-- Campaigns List Section -->
<?php
require_once '../../includes/database.php';

// 1. Nhận các tham số từ URL
$org_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all'; // all, active, completed
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) $page = 1;
$limit = 5; // Số chiến dịch hiển thị trên 1 trang
$offset = ($page - 1) * $limit;

// 2. Lấy dữ liệu
$total_campaigns = count_campaigns_by_org($org_id, $filter);
$total_pages = ceil($total_campaigns / $limit);
$campaigns = get_campaigns_by_org($org_id, $filter, $limit, $offset);

// Hàm hỗ trợ tạo link giữ nguyên các tham số
function build_url($new_filter = null, $new_page = null) {
    global $org_id, $filter, $page;
    $f = $new_filter !== null ? $new_filter : $filter;
    $p = $new_page !== null ? $new_page : $page;
    return "?id=$org_id&filter=$f&page=$p";
}
?>

<section class="bg-white rounded-[2rem] shadow-sm overflow-hidden border border-slate-50 mt-8 max-w-7xl mx-auto">
    <div class="p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 bg-slate-50/50">
        <div>
            <h3 class="text-2xl font-bold text-on-surface">Current Initiatives</h3>
            <p class="text-on-surface-variant text-sm mt-1">Manage and monitor all ongoing charity campaigns.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex bg-white rounded-lg p-1 shadow-sm border border-slate-100">
                <a href="<?= build_url('all', 1) ?>" class="px-4 py-1.5 text-xs font-bold rounded-md transition-colors <?= $filter == 'all' ? 'bg-primary text-white' : 'text-slate-500 hover:bg-slate-50' ?>">Tất cả</a>
                <a href="<?= build_url('active', 1) ?>" class="px-4 py-1.5 text-xs font-bold rounded-md transition-colors <?= $filter == 'active' ? 'bg-primary text-white' : 'text-slate-500 hover:bg-slate-50' ?>">Đang hoạt động</a>
                <a href="<?= build_url('completed', 1) ?>" class="px-4 py-1.5 text-xs font-bold rounded-md transition-colors <?= $filter == 'completed' ? 'bg-primary text-white' : 'text-slate-500 hover:bg-slate-50' ?>">Đã hoàn thành</a>
            </div>
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
                <span class="material-symbols-outlined text-lg">filter_list</span> Filter
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-[10px] uppercase tracking-widest text-slate-400 font-bold">
                    <th class="px-8 py-6">Campaign & Organization</th>
                    <th class="px-8 py-6">Progress & Goal</th>
                    <th class="px-8 py-6 text-center">Status</th>
                    <th class="px-8 py-6">Timeline</th>
                    <th class="px-8 py-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <?php if (empty($campaigns)): ?>
                    <tr><td colspan="5" class="text-center py-10 text-slate-400">Không tìm thấy chiến dịch nào.</td></tr>
                <?php else: ?>
                    <?php foreach ($campaigns as $camp): 
                        $raised = $camp['raised_amount'];
                        $target = $camp['target_amount'];
                        $percent = ($target > 0) ? min(100, round(($raised / $target) * 100, 1)) : 0;
                        
                        // Xác định trạng thái hiển thị
                        if ($raised >= $target) {
                            $status_text = "Đã hoàn thành";
                            $status_color = "bg-green-100 text-green-700";
                            $dot_color = "bg-green-500";
                        } elseif (strtotime($camp['end_date']) > time()) {
                            $status_text = "Đang hoạt động";
                            $status_color = "bg-blue-100 text-blue-700";
                            $dot_color = "bg-blue-500";
                        } else {
                            $status_text = "Đã kết thúc (Chưa đạt)";
                            $status_color = "bg-slate-100 text-slate-600";
                            $dot_color = "bg-slate-400";
                        }
                    ?>
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-surface-variant overflow-hidden flex-shrink-0 flex items-center justify-center text-primary font-bold">
                                    C-<?= $camp['campaign_id'] ?>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-on-surface group-hover:text-primary transition-colors"><?= htmlspecialchars($camp['campaign_name']) ?></div>
                                    <div class="inline-flex items-center mt-1 text-[11px] font-bold text-slate-500 uppercase tracking-wide">
                                        <?= htmlspecialchars($camp['org_name']) ?>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-8 py-6">
                            <div class="flex flex-col gap-2">
                                <div class="flex justify-between text-xs font-bold">
                                    <span class="text-on-surface"><?= number_format($raised, 0, ',', '.') ?> VNĐ</span>
                                    <span class="text-slate-400">of <?= number_format($target, 0, ',', '.') ?></span>
                                </div>
                                <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full <?= ($percent == 100) ? 'bg-green-500' : 'bg-secondary' ?> rounded-full" style="width: <?= $percent ?>%;"></div>
                                </div>
                            </div>
                        </td>

                        <td class="px-8 py-6">
                            <div class="flex justify-center">
                                <span class="flex items-center gap-1.5 px-3 py-1 <?= $status_color ?> text-[10px] font-bold rounded-full uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full <?= $dot_color ?>"></span>
                                    <?= $status_text ?>
                                </span>
                            </div>
                        </td>

                        <td class="px-8 py-6">
                            <div class="flex flex-col text-xs">
                                <span class="font-bold text-on-surface"><?= date('d/m/Y', strtotime($camp['start_date'])) ?></span>
                                <span class="text-slate-400">Đến <?= date('d/m/Y', strtotime($camp['end_date'])) ?></span>
                            </div>
                        </td>

                        <td class="px-8 py-6">
                            <div class="flex justify-end gap-2">
                                <a href="index1.php?campaign_id=<?= $camp['campaign_id'] ?>" 
                                   class="px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors shadow-sm flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[16px]">account_balance_wallet</span>
                                    Giải ngân
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if ($total_pages > 1): ?>
    <div class="p-6 border-t border-slate-50 bg-slate-50/30 flex justify-between items-center text-xs font-bold text-slate-400 uppercase tracking-widest">
        <span>Showing <?= count($campaigns) ?> of <?= $total_campaigns ?> initiatives</span>
        <div class="flex gap-1">
            <a href="<?= $page > 1 ? build_url(null, $page - 1) : '#' ?>" class="w-8 h-8 flex items-center justify-center rounded bg-white border border-slate-100 <?= $page <= 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-slate-50 text-slate-600' ?>">
                <span class="material-symbols-outlined text-sm">chevron_left</span>
            </a>
            
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="<?= build_url(null, $i) ?>" class="w-8 h-8 flex items-center justify-center rounded border <?= $i == $page ? 'bg-primary border-primary text-white' : 'bg-white border-slate-100 text-slate-500 hover:bg-slate-50' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
            
            <a href="<?= $page < $total_pages ? build_url(null, $page + 1) : '#' ?>" class="w-8 h-8 flex items-center justify-center rounded bg-white border border-slate-100 <?= $page >= $total_pages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-slate-50 text-slate-600' ?>">
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
        </div>
    </div>
    <?php endif; ?>
</section>
</div>
<!-- Floating Global Action FAB -->
<button class="fixed bottom-8 right-8 w-14 h-14 bg-secondary text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-transform duration-300 z-50">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add</span>
</button>
</main>
</div>
<!-- Mobile BottomNavBar -->
<div class="md:hidden fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-md border-t border-slate-100 z-50 flex justify-around items-center py-3">
<button class="flex flex-col items-center gap-1 text-slate-400">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-[10px] font-bold uppercase">Home</span>
</button>
<button class="flex flex-col items-center gap-1 text-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
<span class="text-[10px] font-bold uppercase">Campaigns</span>
</button>
<button class="flex flex-col items-center gap-1 text-slate-400">
<span class="material-symbols-outlined">group</span>
<span class="text-[10px] font-bold uppercase">Donors</span>
</button>
<button class="flex flex-col items-center gap-1 text-slate-400">
<span class="material-symbols-outlined">settings</span>
<span class="text-[10px] font-bold uppercase">Profile</span>
</button>
</div>
</body></html>