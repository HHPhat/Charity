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
<div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center">
<span class="material-symbols-outlined text-white" data-icon="verified_user">verified_user</span>
</div>
<div>
<h1 class="text-2xl font-black text-blue-700 dark:text-blue-500 tracking-tighter font-headline">Guardian Admin</h1>
<p class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Stewardship Portal</p>
</div>
</div>
</div>
<nav class="flex-1 px-4 space-y-2">
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-400 ease-out rounded-xl font-medium" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-400 ease-out rounded-xl font-medium" href="#">
<span class="material-symbols-outlined" data-icon="campaign">campaign</span>
<span>Campaigns</span>
</a>
<!-- Active State: Users -->
<a class="flex items-center gap-4 py-3 text-blue-700 dark:text-blue-400 font-bold border-l-4 border-blue-700 dark:border-blue-400 pl-4 bg-slate-100 dark:bg-slate-900 rounded-r-xl sidebar-active" href="#">
<span class="material-symbols-outlined" data-icon="group" style="font-variation-settings: 'FILL' 1;">group</span>
<span>Users</span>
</a>
<a class="flex items-center gap-4 py-3 text-slate-500 dark:text-slate-400 pl-5 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-400 ease-out rounded-xl font-medium" href="#">
<span class="material-symbols-outlined" data-icon="verified_user">verified_user</span>
<span>Charities</span>
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
<div class="h-8 w-[1px] bg-slate-200 mx-2"></div>
<button class="flex items-center gap-3 group">
<div class="text-right">
<p class="text-xs font-bold text-on-surface">Admin Console</p>
<p class="text-[10px] text-slate-500">System Administrator</p>
</div>
<img alt="Administrator Profile" class="w-10 h-10 rounded-full border-2 border-primary/10 group-hover:border-primary transition-colors" data-alt="professional portrait of a confident male executive in a neutral studio setting with soft lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2Nut19_QGTKy9p4psBZ0u_1p0I4VQ-wyX7W36neoCyfJfnd44QnUwMbi7cnJf_ldi5y0zYs638dca-QvtLErflzonpoMIG2JBGOiSnKXMf28iYX20cXpnt95y9aE5enCHPybT55tc9Rz95wfEAcYttDs2qW2z2KXFmnvg7RTARZs7VWzNc7d2byyUgTs0FylgoIao-y6lbHaW5UQzQh90GPjDb-WfkTBClYbRyMSFFRY2wc75LJwNpQEUGo7on1qQPiFEfWoFAiEQ"/>
</button>
<button class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-bold text-sm shadow-sm hover:shadow-md transition-all active:scale-95">
                    Impact Report
                </button>
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
<div class="grid grid-cols-12 gap-6 mb-10">
<div class="col-span-12 lg:col-span-4 bg-primary p-8 rounded-[2rem] text-white relative overflow-hidden group">
<div class="relative z-10">
<p class="text-primary-fixed text-sm font-bold uppercase tracking-widest opacity-80">Tổng cộng</p>
<h3 class="text-5xl font-black font-headline mt-2">12,482</h3>
<p class="mt-4 text-primary-fixed/80 text-sm leading-relaxed">Người dùng tích cực trong hệ thống Guardian.</p>
</div>
<span class="material-symbols-outlined absolute -right-4 -bottom-4 text-[12rem] opacity-10 rotate-12 group-hover:rotate-0 transition-transform duration-700" data-icon="group">group</span>
</div>
<div class="col-span-12 lg:col-span-8 grid grid-cols-2 md:grid-cols-3 gap-6">
<div class="bg-surface-container-lowest p-6 rounded-3xl border border-transparent hover:border-primary/10 transition-all flex flex-col justify-between">
<div class="w-12 h-12 rounded-2xl bg-secondary-fixed flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-on-secondary-fixed" data-icon="volunteer_activism" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
</div>
<div>
<p class="text-4xl font-bold font-headline">8.2B</p>
<p class="text-sm text-slate-500 font-medium">VNĐ Tổng quyên góp</p>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-3xl border border-transparent hover:border-primary/10 transition-all flex flex-col justify-between">
<div class="w-12 h-12 rounded-2xl bg-primary-fixed flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-on-primary-fixed" data-icon="campaign" style="font-variation-settings: 'FILL' 1;">campaign</span>
</div>
<div>
<p class="text-4xl font-bold font-headline">142</p>
<p class="text-sm text-slate-500 font-medium">Chiến dịch đã tham gia</p>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-3xl border border-transparent hover:border-primary/10 transition-all flex flex-col justify-between hidden md:flex">
<div class="w-12 h-12 rounded-2xl bg-tertiary-fixed flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-on-tertiary-fixed" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
<div>
<p class="text-4xl font-bold font-headline">98%</p>
<p class="text-sm text-slate-500 font-medium">Tỷ lệ xác thực danh tính</p>
</div>
</div>
</div>
</div>
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
<div class="overflow-x-auto">
<table class="w-full text-left border-separate border-spacing-y-2">
<thead>
<tr class="text-slate-400 text-[11px] uppercase tracking-widest font-bold">
<th class="px-6 py-4">Tên</th>
<th class="px-6 py-4">Liên hệ</th>
<th class="px-6 py-4">Định danh</th>
<th class="px-6 py-4">Tài khoản</th>
<th class="px-6 py-4">Ngày sinh</th>
<th class="px-6 py-4">Số điện thoại</th>
<th class="px-6 py-4">Chiến dịch</th>
<th class="px-6 py-4 text-right">Thao tác</th>
</tr>
</thead>
<tbody class="text-sm">
<!-- Row 1 -->
<tr class="group hover:bg-surface-container-low transition-colors duration-300">
<td class="px-6 py-4 rounded-l-2xl">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-primary">TP</div>
<div>
<p class="font-bold text-on-surface">Trần Anh Phan</p>
<p class="text-xs text-slate-400">ID: #8821</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<p class="font-medium">phan.tran@email.com</p>
<p class="text-xs text-slate-400">0902 345 678</p>
</td>
<td class="px-6 py-4">
<span class="font-mono text-xs bg-surface-variant px-2 py-1 rounded">079093001234</span>
</td>
<td class="px-6 py-4 font-semibold text-primary">@phananhtran</td>
<td class="px-6 py-4 text-slate-500">12/05/1988</td>
<td class="px-6 py-4 font-bold text-tertiary"><p class="font-medium">0902 345 678</p></td>
<td class="px-6 py-4">
<div class="w-full bg-surface-variant h-1.5 rounded-full overflow-hidden max-w-[80px]">
<div class="bg-primary h-full w-[65%]"></div>
</div>
<p class="text-[10px] mt-1 font-bold text-slate-400">12 Chiến dịch</p>
</td>
<td class="px-6 py-4 rounded-r-2xl text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
</button>
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-secondary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="edit">edit</span>
</button>
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-tertiary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="group hover:bg-surface-container-low transition-colors duration-300">
<td class="px-6 py-4 rounded-l-2xl">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700">LH</div>
<div>
<p class="font-bold text-on-surface">Lê Minh Hoàng</p>
<p class="text-xs text-slate-400">ID: #9124</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<p class="font-medium">hoang.le@outlook.com</p>
<p class="text-xs text-slate-400">0913 778 990</p>
</td>
<td class="px-6 py-4">
<span class="font-mono text-xs bg-surface-variant px-2 py-1 rounded">001085006672</span>
</td>
<td class="px-6 py-4 font-semibold text-primary">@hoangle_minh</td>
<td class="px-6 py-4 text-slate-500">22/11/1995</td>
<td class="px-6 py-4 font-bold text-tertiary"><p class="font-medium">0913 778 990</p></td>
<td class="px-6 py-4">
<div class="w-full bg-surface-variant h-1.5 rounded-full overflow-hidden max-w-[80px]">
<div class="bg-primary h-full w-[15%]"></div>
</div>
<p class="text-[10px] mt-1 font-bold text-slate-400">2 Chiến dịch</p>
</td>
<td class="px-6 py-4 rounded-r-2xl text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
</button>
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-secondary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="edit">edit</span>
</button>
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-tertiary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="group hover:bg-surface-container-low transition-colors duration-300">
<td class="px-6 py-4 rounded-l-2xl">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-orange-700">NM</div>
<div>
<p class="font-bold text-on-surface">Nguyễn Thùy Minh</p>
<p class="text-xs text-slate-400">ID: #1024</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<p class="font-medium">minh.nguyen@gmail.com</p>
<p class="text-xs text-slate-400">0982 111 222</p>
</td>
<td class="px-6 py-4">
<span class="font-mono text-xs bg-surface-variant px-2 py-1 rounded">038099012399</span>
</td>
<td class="px-6 py-4 font-semibold text-primary">@thuyminh.edu</td>
<td class="px-6 py-4 text-slate-500">05/09/1990</td>
<td class="px-6 py-4 font-bold text-tertiary"><p class="font-medium">0982 111 222</p></td>
<td class="px-6 py-4">
<div class="w-full bg-surface-variant h-1.5 rounded-full overflow-hidden max-w-[80px]">
<div class="bg-primary h-full w-[90%]"></div>
</div>
<p class="text-[10px] mt-1 font-bold text-slate-400">45 Chiến dịch</p>
</td>
<td class="px-6 py-4 rounded-r-2xl text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
</button>
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-secondary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="edit">edit</span>
</button>
<button class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-tertiary transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="flex items-center justify-between p-6 mt-4">
<div class="flex items-center gap-2">
<span class="text-sm text-slate-400">Hiển thị</span>
<select class="bg-surface-container-low border-none rounded-lg text-xs font-bold py-1.5 focus:ring-0">
<option>10</option>
<option>25</option>
<option>50</option>
</select>
</div>
<div class="flex gap-2">
<button class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-100 text-slate-400 hover:bg-primary hover:text-white transition-all">
<span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-white font-bold">1</button>
<button class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-100 hover:bg-slate-50 font-bold">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-100 hover:bg-slate-50 font-bold">3</button>
<span class="w-10 h-10 flex items-center justify-center text-slate-300">...</span>
<button class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-100 text-slate-400 hover:bg-primary hover:text-white transition-all">
<span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
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