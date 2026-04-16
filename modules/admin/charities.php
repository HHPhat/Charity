<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo
    include("../../includes/database.php");
?>
<!DOCTYPE html>

<html class="light" lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-tertiary": "#ffffff",
                    "inverse-surface": "#2e3132",
                    "secondary": "#984700",
                    "secondary-fixed-dim": "#ffb68a",
                    "surface-container-highest": "#e1e3e4",
                    "on-tertiary-fixed-variant": "#92001f",
                    "on-tertiary-fixed": "#410008",
                    "on-secondary-fixed-variant": "#743500",
                    "inverse-primary": "#b1c5ff",
                    "surface": "#f8f9fa",
                    "on-secondary-container": "#5f2a00",
                    "on-error-container": "#93000a",
                    "on-surface": "#191c1d",
                    "on-secondary": "#ffffff",
                    "secondary-container": "#ff8016",
                    "primary-container": "#0d6efd",
                    "primary": "#0057cd",
                    "surface-dim": "#d9dadb",
                    "tertiary-fixed-dim": "#ffb3b2",
                    "outline-variant": "#c1c6d6",
                    "tertiary-container": "#dd3645",
                    "surface-container-low": "#f3f4f5",
                    "inverse-on-surface": "#f0f1f2",
                    "on-secondary-fixed": "#321300",
                    "surface-tint": "#0057ce",
                    "surface-bright": "#f8f9fa",
                    "on-background": "#191c1d",
                    "primary-fixed-dim": "#b1c5ff",
                    "on-surface-variant": "#414754",
                    "on-primary-fixed-variant": "#00419e",
                    "tertiary-fixed": "#ffdad9",
                    "on-primary": "#ffffff",
                    "primary-fixed": "#dae2ff",
                    "error-container": "#ffdad6",
                    "error": "#ba1a1a",
                    "background": "#f8f9fa",
                    "surface-container-high": "#e7e8e9",
                    "on-tertiary-container": "#130001",
                    "on-primary-fixed": "#001946",
                    "tertiary": "#b91830",
                    "on-primary-container": "#ffffff",
                    "surface-container-lowest": "#ffffff",
                    "surface-container": "#edeeef",
                    "secondary-fixed": "#ffdbc8",
                    "outline": "#727785",
                    "surface-variant": "#e1e3e4",
                    "on-error": "#ffffff"
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-headline { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .scale-98-active:active { transform: scale(0.98); }
    </style>
</head>
<body class="bg-surface text-on-surface">
<!-- SideNavBar from JSON -->
<aside class="fixed left-0 top-0 flex flex-col py-8 px-4 h-screen w-64 border-r border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900 z-50">
<div class="px-6 mb-10">
<div class="flex items-center gap-3">
</div>
<div>
<a href="../../"><h1 class="text-xl font-bold text-blue-700 dark:text-blue-400 font-headline leading-tight">Guardian Admin</h1></a>
<p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Institutional Steward</p>
</div>
</div>
</div>
<nav class="flex-1 space-y-1">
<!-- Dashboard (Inactive) -->
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="index.php">
<span class="material-symbols-outlined">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-400 ease-out rounded-xl font-medium" href="campaigns.php">
<span class="material-symbols-outlined" data-icon="campaign">campaign</span>
<span>Campaigns</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="users.php">
<span class="material-symbols-outlined">group</span>
<span>User</span>
</a>
<a class="flex items-center gap-4 py-3 text-blue-700 dark:text-blue-400 font-bold border-l-4 border-blue-700 dark:border-blue-400 pl-4 bg-slate-100 dark:bg-slate-900 rounded-r-xl sidebar-active" href="#">
<span class="material-symbols-outlined" data-icon="group" style="font-variation-settings: 'FILL' 1;">account_balance</span>
<span>Charities</span>
<!-- Impact Reports (Inactive) -->
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="#">
<span class="material-symbols-outlined">analytics</span>
<span>Impact Reports</span>
</a>
<!-- Settings (Inactive) -->
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Settings</span>
</a>
</nav>
<div class="mt-auto space-y-4">
<button class="w-full py-3 bg-primary text-on-primary font-bold rounded-xl shadow-md hover:bg-primary/90 transition-all">
                New Campaign
            </button>
<div class="flex items-center gap-3 p-3 bg-white dark:bg-slate-800 rounded-2xl shadow-sm">
<img alt="Admin User Profile" class="w-10 h-10 rounded-full bg-slate-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7T5n1JV8vUHPGOKm2F7kRKc5j4iFSgLlVqTLnlGbeuCJAMBpLgOgCQh-bXIOTIH6BXU6YZCqPJcmLwXZbhySj9mjUl6CnXp8A5JcOUnY2CL6NxZfxuJ_vLivzMxF3uC1u4LBzJmo7bSEt79hVTaISRihDdMZEyJzTWSQZ8QHRGf3XhtGu0FMUnXI_hk9NrAdZF3SYe44jtiSWSDTGu-Nww_jvJfrbJ5-HJ6NHPTqIr2sHUp1e4Eh9zC4Y1EPkQi_P9al_lKsWzPs4"/>
<div class="overflow-hidden">
<p class="text-xs font-bold text-on-surface truncate">Admin User</p>
<p class="text-[10px] text-slate-500 truncate">admin@guardian.org</p>
</div>
</div>
<a class="flex items-center gap-3 px-4 py-2 text-slate-500 hover:text-blue-600 font-manrope text-xs font-semibold" href="#">
<span class="material-symbols-outlined text-sm">help_outline</span>
<span>Help Center</span>
</a>
</div>
</aside>
<!-- Main Content Area -->
<main class="ml-64 min-h-screen">
<!-- TopNavBar from JSON -->
<header class="sticky top-0 h-16 flex items-center justify-between px-8 bg-white/80 dark:bg-slate-950/80 backdrop-blur-md z-40">
<div class="flex items-center gap-6">
<div class="relative w-64">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
<input class="w-full pl-9 pr-4 py-2 bg-surface-container-highest/50 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20" placeholder="Tìm kiếm tổ chức..." type="text"/>
</div>
<nav class="hidden md:flex gap-4">
<a class="text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400 pb-1 font-manrope text-sm font-medium" href="#">Overview</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-medium ease-out duration-400" href="#">Audit Log</a>
</nav>
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
<!-- Page Content -->
<div class="p-8 space-y-8">
<!-- Header Section -->
<div class="flex items-end justify-between">
<div class="space-y-1">
<h1 class="text-4xl font-extrabold tracking-tight text-on-surface">Quản lý Tổ chức Từ thiện</h1>
<p class="text-slate-500 font-medium">Giám sát và quản lý các đối tác thiện nguyện chiến lược.</p>
</div>
<div class="flex gap-3">
<div class="bg-secondary-fixed text-on-secondary-fixed px-4 py-2 rounded-full text-xs font-bold flex items-center gap-2">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">favorite</span>
                        Đang hoạt động: 24
                    </div>
</div>
</div>
<!-- Dashboard Statistics Bento -->
<?php
// Gọi các hàm lấy dữ liệu từ database (đảm bảo bạn đã có các hàm này)
$total_amount = get_total_donations_amount(); 
$total_orgs = get_total_organizations_count(); // Nếu bạn muốn dùng cho ô khác
?>

<div class="grid grid-cols-12 gap-6">
    
    <div class="col-span-12 lg:col-span-4 bg-surface-container-lowest p-6 rounded-3xl border-none shadow-sm flex flex-col justify-between">
        <div>
            <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Tổng quỹ huy động</p>
            <h3 class="text-3xl font-extrabold text-primary">
                <span class="animate-number" data-target="<?= $total_amount ?>">0</span> ₫
            </h3>
        </div>
        <div class="mt-4 flex items-center gap-2 text-green-600 text-sm font-bold">
            <span class="material-symbols-outlined text-sm">trending_up</span>
            +12.5% tháng này
        </div>
    </div>

    <div class="col-span-6 lg:col-span-4 bg-surface-container-lowest p-6 rounded-3xl border-none shadow-sm">
        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Đối tác</p>
        <h3 class="text-3xl font-extrabold text-secondary">
            <span class="animate-number" data-target="<?= $total_orgs ?>">0</span>
        </h3>
        <div class="mt-4 h-1.5 w-full bg-surface-variant rounded-full overflow-hidden">
            <div class="h-full bg-secondary w-2/3"></div>
        </div>
    </div>

    <div class="col-span-6 lg:col-span-4 bg-tertiary-container text-on-tertiary p-6 rounded-3xl border-none shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold opacity-80 uppercase tracking-widest mb-1">Trạng thái hệ thống</p>
            <h3 class="text-2xl font-bold">Ổn định</h3>
        </div>
        <span class="material-symbols-outlined text-4xl opacity-50">verified_user</span>
    </div>

</div>
<!-- Table Container -->
<?php
// 1. XỬ LÝ HÀNH ĐỘNG DUYỆT / TỪ CHỐI (Nếu có)
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($_GET['action'] == 'approve') {
        approve_organization($id);
        echo "<script>alert('Đã duyệt tổ chức thành công!'); window.location.href='?tab=pending';</script>";
        exit;
    } elseif ($_GET['action'] == 'reject') {
        reject_organization($id);
        echo "<script>alert('Đã từ chối và xóa tổ chức!'); window.location.href='?tab=pending';</script>";
        exit;
    }
}

// 2. LOGIC ĐIỀU HƯỚNG TAB
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'all';

// 3. LOGIC LẤY DỮ LIỆU
if ($tab == 'pending') {
    // Tab "Chờ duyệt" (Có phân trang)
    $limit = 10;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $limit;
    
    $total_records = count_pending_organizations();
    $total_pages = ceil($total_records / $limit);
    $orgs_data = get_pending_organizations($limit, $offset);
    
    // Tính toán hiển thị số lượng (VD: 1-10)
    $start_display = ($total_records > 0) ? $offset + 1 : 0;
    $end_display = min($offset + $limit, $total_records);
} else {
    // Tab "Tất cả tổ chức" (Giữ nguyên hàm cũ của bạn)
    $orgs_data = get_organizations_summary();
}
?>

<div class="bg-surface-container-lowest rounded-3xl shadow-sm overflow-hidden border-none">
    
    <div class="p-6 flex items-center justify-between border-b border-surface-container">
        <div class="flex gap-4">
            <a href="?tab=all" class="text-sm font-bold px-4 py-2 rounded-xl transition-colors <?= $tab == 'all' ? 'text-primary bg-primary-fixed' : 'text-slate-500 hover:bg-slate-50' ?>">
                Tất cả tổ chức
            </a>
            <a href="?tab=pending" class="text-sm font-medium px-4 py-2 rounded-xl transition-colors <?= $tab == 'pending' ? 'text-primary bg-primary-fixed' : 'text-slate-500 hover:bg-slate-50' ?>">
                Chờ duyệt
                <?php if($tab != 'pending' && count_pending_organizations() > 0): ?>
                    <span class="ml-1 px-1.5 py-0.5 rounded-full bg-red-500 text-white text-[10px]">!</span>
                <?php endif; ?>
            </a>
        </div>
        <div class="flex gap-2">
            <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">filter_list</span>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            
            <?php if ($tab == 'all'): ?>
                <thead>
                    <tr class="bg-surface-container-low text-slate-500 text-[10px] uppercase font-bold tracking-widest">
                        <th class="px-8 py-4">Tên tổ chức</th>
                        <th class="px-8 py-4">Tài khoản</th>
                        <th class="px-8 py-4">Số chiến dịch</th>
                        <th class="px-8 py-4">Tổng tiền kêu gọi được</th>
                        <th class="px-8 py-4 text-right">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    <?php if (empty($orgs_data)): ?>
                        <tr><td colspan="5" class="px-8 py-6 text-center text-slate-500">Chưa có dữ liệu tổ chức.</td></tr>
                    <?php else: ?>
                        <?php foreach ($orgs_data as $org): 
                            $org_name = htmlspecialchars($org['org_name']);
                            // Logic tạo Avatar initials...
                            $words = explode(" ", $org_name);
                            $initials = count($words) >= 2 ? mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1) : mb_substr($org_name, 0, 2);
                            $initials = mb_strtoupper($initials);
                        ?>
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary font-bold text-lg"><?= $initials ?></div>
                                    <div>
                                        <p class="font-bold text-on-surface"><?= $org_name ?></p>
                                        <p class="text-xs text-slate-400">ID Tổ chức: #<?= $org['org_id'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 font-medium text-slate-600"><?= htmlspecialchars($org['account']) ?></td>
                            <td class="px-8 py-5"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700"><?= $org['total_campaigns'] ?> Chiến dịch</span></td>
                            <td class="px-8 py-5 font-bold text-on-surface"><?= number_format($org['total_raised'], 0, ',', '.') ?> ₫</td>
                            <td class="px-8 py-5 text-right"><button onclick="window.location.href='org_detail_view.php?id=<?= $org['org_id'] ?>'" class="text-slate-400 hover:text-primary transition-colors material-symbols-outlined">more_vert</button></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>

            <?php else: ?>
                <thead>
                    <tr class="bg-surface-container-low text-slate-500 text-[10px] uppercase font-bold tracking-widest">
                        <th class="px-6 py-4">Tên tổ chức</th>
                        <th class="px-6 py-4">Mã số thuế</th>
                        <th class="px-6 py-4">Tài khoản LK</th>
                        <th class="px-6 py-4">Ví mã hóa</th>
                        <th class="px-6 py-4">Ngày đăng ký</th>
                        <th class="px-6 py-4 text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    <?php if (empty($orgs_data)): ?>
                        <tr><td colspan="6" class="px-8 py-6 text-center text-slate-500">Tuyệt vời! Không có tổ chức nào đang chờ duyệt.</td></tr>
                    <?php else: ?>
                        <?php foreach ($orgs_data as $org): ?>
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <p class="font-bold text-on-surface"><?= htmlspecialchars($org['org_name']) ?></p>
                                <p class="text-xs text-slate-400">ID: #<?= $org['org_id'] ?></p>
                            </td>
                            <td class="px-6 py-4 font-mono text-sm text-slate-600"><?= htmlspecialchars($org['tax_code']) ?></td>
                            <td class="px-6 py-4 font-medium text-primary">@<?= htmlspecialchars($org['account']) ?></td>
                            <td class="px-6 py-4">
                                <span class="text-xs bg-slate-100 px-2 py-1 rounded" title="<?= htmlspecialchars($org['wallet_address']) ?>">
                                    <?= mb_substr($org['wallet_address'], 0, 10) ?>...
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500"><?= date('d/m/Y H:i', strtotime($org['created_date'])) ?></td>
                            
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="org_detail.php?id=<?= $org['org_id'] ?>" title="Xem chi tiết" class="text-slate-400 hover:text-blue-500 transition-colors">
                                        <span class="material-symbols-outlined text-xl">visibility</span>
                                    </a>
                                    <a href="?tab=pending&action=approve&id=<?= $org['org_id'] ?>" onclick="return confirm('Bạn có chắc chắn duyệt tổ chức này?');" title="Phê duyệt" class="text-slate-400 hover:text-emerald-500 transition-colors">
                                        <span class="material-symbols-outlined text-xl">check_circle</span>
                                    </a>
                                    <a href="?tab=pending&action=reject&id=<?= $org['org_id'] ?>" onclick="return confirm('Tổ chức sẽ bị xóa vĩnh viễn khỏi hệ thống. Xác nhận từ chối?');" title="Từ chối & Xóa" class="text-slate-400 hover:text-red-500 transition-colors">
                                        <span class="material-symbols-outlined text-xl">cancel</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            <?php endif; ?>

        </table>
    </div>

    <?php if ($tab == 'pending' && $total_records > 0): ?>
    <div class="p-6 bg-surface-container-low/30 flex items-center justify-between border-t border-surface-container">
        <p class="text-xs font-medium text-slate-500">Hiển thị <?= $start_display ?>-<?= $end_display ?> trong số <?= $total_records ?> tổ chức chờ duyệt</p>
        <div class="flex gap-2">
            <a href="?tab=pending&page=<?= max(1, $page - 1) ?>" class="p-2 flex items-center bg-white border border-surface-container rounded-lg text-slate-400 hover:text-primary transition-all <?= ($page <= 1) ? 'opacity-50 pointer-events-none' : '' ?>">
                <span class="material-symbols-outlined text-sm">chevron_left</span>
            </a>
            <a href="?tab=pending&page=<?= min($total_pages, $page + 1) ?>" class="p-2 flex items-center bg-white border border-surface-container rounded-lg text-slate-400 hover:text-primary transition-all <?= ($page >= $total_pages) ? 'opacity-50 pointer-events-none' : '' ?>">
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
        </div>
    </div>
    <?php endif; ?>

</div>
</div>
<!-- Floating Action Button contextually relevant for admin creation -->
<button class="fixed bottom-8 right-8 w-14 h-14 bg-secondary text-on-secondary rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-transform group">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add</span>
<span class="absolute right-16 bg-on-surface text-white px-3 py-1 rounded-lg text-xs opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">Thêm tổ chức mới</span>
</button>
</main>
<!-- Background Decoration -->
<div class="fixed top-0 right-0 -z-10 w-1/2 h-full opacity-5 pointer-events-none">
<div class="absolute top-0 right-0 w-[800px] h-[800px] bg-primary rounded-full blur-[160px] -translate-y-1/2 translate-x-1/2"></div>
<div class="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-secondary rounded-full blur-[140px] translate-y-1/2"></div>
</div>
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