<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo

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
<h1 class="text-xl font-bold text-blue-700 dark:text-blue-400 font-headline leading-tight">Guardian Admin</h1>
<p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Institutional Steward</p>
</div>
</div>
</div>
<nav class="flex-1 space-y-1">
<!-- Dashboard (Inactive) -->
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-400 ease-out rounded-xl font-medium" href="#">
<span class="material-symbols-outlined" data-icon="campaign">campaign</span>
<span>Campaigns</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 transition-colors duration-400 ease-out hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope text-sm font-semibold tracking-tight rounded-xl scale-98-active transition-all duration-400" href="#">
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
<div class="grid grid-cols-12 gap-6">
<div class="col-span-12 lg:col-span-4 bg-surface-container-lowest p-6 rounded-3xl border-none shadow-sm flex flex-col justify-between">
<div>
<p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Tổng quỹ huy động</p>
<h3 class="text-3xl font-extrabold text-primary">15.420.000.000 ₫</h3>
</div>
<div class="mt-4 flex items-center gap-2 text-green-600 text-sm font-bold">
<span class="material-symbols-outlined text-sm">trending_up</span>
                        +12.5% tháng này
                    </div>
</div>
<div class="col-span-6 lg:col-span-4 bg-surface-container-lowest p-6 rounded-3xl border-none shadow-sm">
<p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Chiến dịch mới</p>
<h3 class="text-3xl font-extrabold text-secondary">42</h3>
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
<div class="bg-surface-container-lowest rounded-3xl shadow-sm overflow-hidden border-none">
<div class="p-6 flex items-center justify-between border-b border-surface-container">
<div class="flex gap-4">
<button class="text-sm font-bold text-primary px-4 py-2 bg-primary-fixed rounded-xl">Tất cả tổ chức</button>
<button class="text-sm font-medium text-slate-500 px-4 py-2 hover:bg-slate-50 rounded-xl transition-colors">Chờ duyệt</button>
</div>
<div class="flex gap-2">
<button class="p-2 text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">filter_list</span>
</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-container-low text-slate-500 text-[10px] uppercase font-bold tracking-widest">
<th class="px-8 py-4">Tên tổ chức</th>
<th class="px-8 py-4">Tài khoản</th>
<th class="px-8 py-4">Số chiến dịch</th>
<th class="px-8 py-4">Tổng tiền quyên góp</th>
<th class="px-8 py-4 text-right">Hành động</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary font-bold text-lg">
                                            BH
                                        </div>
<div>
<p class="font-bold text-on-surface">Bếp Hát Hòa Bình</p>
<p class="text-xs text-slate-400">NGO Quốc tế</p>
</div>
</div>
</td>
<td class="px-8 py-5 font-medium text-slate-600">bephathoabinh_vn</td>
<td class="px-8 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700">12 Chiến dịch</span>
</td>
<td class="px-8 py-5 font-bold text-on-surface">3.450.000.000 ₫</td>
<td class="px-8 py-5 text-right">
<button class="text-slate-400 hover:text-primary transition-colors material-symbols-outlined">more_vert</button>
</td>
</tr>
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary font-bold text-lg">
                                            HT
                                        </div>
<div>
<p class="font-bold text-on-surface">Hoa Sen Trắng</p>
<p class="text-xs text-slate-400">Cứu trợ Xã hội</p>
</div>
</div>
</td>
<td class="px-8 py-5 font-medium text-slate-600">hoasentrang_charity</td>
<td class="px-8 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700">8 Chiến dịch</span>
</td>
<td class="px-8 py-5 font-bold text-on-surface">1.120.000.000 ₫</td>
<td class="px-8 py-5 text-right">
<button class="text-slate-400 hover:text-primary transition-colors material-symbols-outlined">more_vert</button>
</td>
</tr>
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-tertiary/10 flex items-center justify-center text-tertiary font-bold text-lg">
                                            XN
                                        </div>
<div>
<p class="font-bold text-on-surface">Xanh &amp; Năng Lượng</p>
<p class="text-xs text-slate-400">Môi trường</p>
</div>
</div>
</td>
<td class="px-8 py-5 font-medium text-slate-600">xanhnagluong_eco</td>
<td class="px-8 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700">5 Chiến dịch</span>
</td>
<td class="px-8 py-5 font-bold text-on-surface">890.000.000 ₫</td>
<td class="px-8 py-5 text-right">
<button class="text-slate-400 hover:text-primary transition-colors material-symbols-outlined">more_vert</button>
</td>
</tr>
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary font-bold text-lg">
                                            VC
                                        </div>
<div>
<p class="font-bold text-on-surface">Vòng Tay Cha</p>
<p class="text-xs text-slate-400">Trẻ em &amp; Giáo dục</p>
</div>
</div>
</td>
<td class="px-8 py-5 font-medium text-slate-600">vongtaycha_foundation</td>
<td class="px-8 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700">19 Chiến dịch</span>
</td>
<td class="px-8 py-5 font-bold text-on-surface">5.200.000.000 ₫</td>
<td class="px-8 py-5 text-right">
<button class="text-slate-400 hover:text-primary transition-colors material-symbols-outlined">more_vert</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-6 bg-surface-container-low/30 flex items-center justify-between border-t border-surface-container">
<p class="text-xs font-medium text-slate-500">Hiển thị 1-4 trong số 24 tổ chức</p>
<div class="flex gap-2">
<button class="p-2 bg-white border border-surface-container rounded-lg text-slate-400 hover:text-primary transition-all">
<span class="material-symbols-outlined text-sm">chevron_left</span>
</button>
<button class="p-2 bg-white border border-surface-container rounded-lg text-slate-400 hover:text-primary transition-all">
<span class="material-symbols-outlined text-sm">chevron_right</span>
</button>
</div>
</div>
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