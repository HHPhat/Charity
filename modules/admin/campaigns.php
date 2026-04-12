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
<div class="px-4 mb-10 flex items-center gap-3">
<div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-white">
<span class="material-symbols-outlined" data-icon="volunteer_activism">volunteer_activism</span>
</div>
<div>
<h1 class="font-['Manrope'] font-black text-xl text-blue-700 dark:text-blue-400 leading-none">Kindred Heart</h1>
<p class="text-[10px] uppercase tracking-[0.2em] text-slate-500 mt-1">Institutional Stewardship</p>
</div>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 text-slate-600 dark:text-slate-400 font-medium hover:text-blue-600 dark:hover:text-blue-300 hover:bg-slate-100 dark:hover:bg-slate-900" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 text-blue-700 dark:text-blue-400 font-bold border-r-4 border-blue-700 dark:border-blue-400 bg-blue-50/50 dark:bg-blue-900/20" href="#">
<span class="material-symbols-outlined" data-icon="volunteer_activism">volunteer_activism</span>
<span>Campaigns</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 text-slate-600 dark:text-slate-400 font-medium hover:text-blue-600 dark:hover:text-blue-300 hover:bg-slate-100 dark:hover:bg-slate-900" href="#">
<span class="material-symbols-outlined" data-icon="group">group</span>
<span>Users</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 text-slate-600 dark:text-slate-400 font-medium hover:text-blue-600 dark:hover:text-blue-300 hover:bg-slate-100 dark:hover:bg-slate-900" href="#">
<span class="material-symbols-outlined" data-icon="account_balance">account_balance</span>
<span>Charities</span>
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
<div class="h-8 w-[1px] bg-slate-200 mx-2"></div>
<div class="flex items-center gap-3">
<div class="text-right hidden sm:block">
<p class="text-xs font-bold text-on-surface">Admin</p>
<p class="text-[10px] text-slate-500">Guardian Administrator</p>
</div>
<img alt="Administrator Profile" class="w-10 h-10 rounded-full object-cover ring-2 ring-white shadow-sm" data-alt="Close up portrait of a professional man in a navy suit against a clean studio background, soft lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBh5Q6kc2lpdJAOIrL4j461LxnD3xRmuHbcASJXJCUIQcn5Tdv-HQjCBq4fPibWFdh7-L0RVPPi2s31lgHu-5CgEJlhBsscK-fXZgf2lC7OXjmnqT38eEuQVsr-A3Xu5hgDgqCkeCJCOp-jF5vkemrEIQy2isDkj8wHv2A1mBKX7IwiUnHg_CsMizdmcNg1rYchwXRiSAJ9ztlUiyPIiKJB-xpyMglrn0rvJM5O1vTVnUuGadHK0P3pUwX3EBm74reHGvtYg-8Llskw"/>
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
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<div class="bg-surface-container-lowest p-6 rounded-xl border-b-4 border-primary transition-transform hover:-translate-y-1 duration-400">
<p class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-4">Total Campaigns</p>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-headline font-extrabold">1,284</span>
<span class="text-xs text-green-600 font-bold">+12%</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border-b-4 border-secondary transition-transform hover:-translate-y-1 duration-400">
<p class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-4">Active</p>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-headline font-extrabold">42</span>
<span class="material-symbols-outlined text-secondary text-sm" style="font-variation-settings: 'FILL' 1;">bolt</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border-b-4 border-slate-200 transition-transform hover:-translate-y-1 duration-400">
<p class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-4">Completed</p>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-headline font-extrabold">1,242</span>
</div>
</div>
<div class="bg-secondary-fixed p-6 rounded-xl transition-transform hover:-translate-y-1 duration-400 relative overflow-hidden">
<div class="relative z-10">
<p class="text-on-secondary-fixed text-xs font-bold uppercase tracking-widest mb-4">Total Raised</p>
<div class="flex items-baseline gap-1">
<span class="text-3xl font-headline font-extrabold text-on-secondary-fixed">4.2B</span>
<span class="text-xs font-bold text-on-secondary-fixed/70">VNĐ</span>
</div>
</div>
<span class="material-symbols-outlined absolute -right-4 -bottom-4 text-8xl text-secondary/10 pointer-events-none" style="font-variation-settings: 'FILL' 1;">favorite</span>
</div>
</div>
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
<!-- Row 1 -->
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-lg overflow-hidden bg-slate-200 shrink-0">
<img alt="Clean Water Initiative" class="w-full h-full object-cover" data-alt="Clear water being poured into a glass held by a child, soft natural lighting, high contrast" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCi-5xSIdG6hfZ-9059UMnTtvvqOBrKZRDDsXx7XpSaQIPo2UCIiMOJWYjycW6bjeT0OZgGUAE5yXDd6-ll_eucKj23y9aw_sMOJhjxdwdU5FKPK5qwYdCBeQSOmjZ-6W8_3EN9wb2YhJcbSoAVpcrZPiU4OkzijAje3pljT1CRBcByrKlIxaBHRy57uUknxiN2QaIVgb7-CGfzENSsBC4zsO5odpzt-wm5-WBWdX3BilkRXTpTapzo2_ML9k-JBSAF3rHOAlJ5pmDv"/>
</div>
<div>
<p class="font-headline font-bold text-sm text-on-surface group-hover:text-primary transition-colors">Nước sạch cho vùng cao</p>
<p class="text-xs text-slate-400">ID: KH-2024-001</p>
</div>
</div>
</td>
<td class="px-6 py-5">
<p class="text-xs font-semibold text-slate-600">Green Heart NGO</p>
</td>
<td class="px-6 py-5">
<div class="w-40">
<div class="flex justify-between items-center mb-1">
<span class="text-[10px] font-black text-primary">75%</span>
</div>
<div class="h-1.5 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full" style="width: 75%"></div>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-wider">
<span class="w-1 h-1 rounded-full bg-green-600"></span>
                                        Active
                                    </span>
</td>
<td class="px-6 py-5 text-right">
<p class="font-headline font-bold text-sm">500,000,000</p>
</td>
<td class="px-8 py-5 text-right">
<p class="text-xs text-slate-500">15 Th05, 2024</p>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-lg overflow-hidden bg-slate-200 shrink-0">
<img alt="Education for All" class="w-full h-full object-cover" data-alt="Group of diverse children laughing in a classroom setting, vibrant colors, warm lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9Aa0cgptmE5rH4loAfpk_zL6rhaKpVHD902uR2Ag9qpCPRxOvQUeSboz671a9iOHpLcwY0Bq2VxUtcSyBhanDS6QQaNI2I_YKLqFdTQc8QmBDcrk3ywG7tQg4o9Zm9pnH2UFixGgI_fo7Qm932TleI5GVoOwmLbzex-3BKkuDmw7UfP8yBoMvcsjlYpl7axdl8G3t7-ci4DhuiZLMgeG9QsWiIXA8Yd_p47ckLtwJ8LmWnkzh1qhdweXh0ecToym-j8WDN9lUU10u"/>
</div>
<div>
<p class="font-headline font-bold text-sm text-on-surface group-hover:text-primary transition-colors">Áo ấm đến trường</p>
<p class="text-xs text-slate-400">ID: KH-2024-042</p>
</div>
</div>
</td>
<td class="px-6 py-5">
<p class="text-xs font-semibold text-slate-600">Vietnam Charity Foundation</p>
</td>
<td class="px-6 py-5">
<div class="w-40">
<div class="flex justify-between items-center mb-1">
<span class="text-[10px] font-black text-slate-400">100%</span>
</div>
<div class="h-1.5 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-slate-400 rounded-full" style="width: 100%"></div>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold uppercase tracking-wider">
                                        Completed
                                    </span>
</td>
<td class="px-6 py-5 text-right">
<p class="font-headline font-bold text-sm">1,200,000,000</p>
</td>
<td class="px-8 py-5 text-right">
<p class="text-xs text-slate-500">01 Th03, 2024</p>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-lg overflow-hidden bg-slate-200 shrink-0">
<img alt="Emergency Medical Care" class="w-full h-full object-cover" data-alt="Abstract medical symbols and soft pulse line on a clean white medical background, professional clinical look" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIP9SfY3oTV7WhzsrEvoLdOrG0dVEesKDIHXCs-txd2wx4XIlukU5-Xra9pxm96LRb-3HOZkl2IEGO5NFqFI2PZmnwFh1KOQrKiI4qJMwFEPL8r-XrKdEt3d_d6o9RH_xxThe1mpVusRvd94jpfpiWNq68U51fjFqfX4_zFFcBA1l48V9Fh9VjsE4_G9DWC5RzSjIHO_15zbty_TL48XSA0aNhxjitdrnWCCODR9aTriqf1Qkm7HnEJ0LgLf_NBKGbcklkX1w1h7A-"/>
</div>
<div>
<p class="font-headline font-bold text-sm text-on-surface group-hover:text-primary transition-colors">Cứu trợ y tế khẩn cấp</p>
<p class="text-xs text-slate-400">ID: KH-2024-089</p>
</div>
</div>
</td>
<td class="px-6 py-5">
<p class="text-xs font-semibold text-slate-600">Red Cross Vietnam</p>
</td>
<td class="px-6 py-5">
<div class="w-40">
<div class="flex justify-between items-center mb-1">
<span class="text-[10px] font-black text-secondary">15%</span>
</div>
<div class="h-1.5 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-secondary rounded-full" style="width: 15%"></div>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-orange-100 text-orange-700 text-[10px] font-bold uppercase tracking-wider">
<span class="w-1 h-1 rounded-full bg-orange-600"></span>
                                        Pending
                                    </span>
</td>
<td class="px-6 py-5 text-right">
<p class="font-headline font-bold text-sm">2,000,000,000</p>
</td>
<td class="px-8 py-5 text-right">
<p class="text-xs text-slate-500">30 Th09, 2024</p>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-8 py-4 bg-surface-container-low/30 border-t border-slate-100 flex items-center justify-between">
<p class="text-xs text-slate-500 font-medium">Hiển thị <span class="font-bold text-on-surface">1-3</span> trong số <span class="font-bold text-on-surface">1,284</span> chiến dịch</p>
<div class="flex items-center gap-2">
<button class="p-2 rounded-lg hover:bg-surface-container transition-colors disabled:opacity-30" disabled="">
<span class="material-symbols-outlined text-sm">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary text-white text-xs font-bold">1</button>
<button class="w-8 h-8 rounded-lg hover:bg-surface-container text-xs font-bold transition-colors">2</button>
<button class="w-8 h-8 rounded-lg hover:bg-surface-container text-xs font-bold transition-colors">3</button>
<button class="p-2 rounded-lg hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-sm">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Contextual Layout Hint: Asymmetry -->
</div>
</main>
<!-- Floating Donation Widget (Suppressed on Admin but keeping for Design System consistency) -->
<!-- Suppressed on Task-Focused Admin Page per Rules -->
</body></html>