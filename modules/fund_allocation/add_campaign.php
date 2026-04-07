<!DOCTYPE html>

<html lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Chiến dịch mới</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-container": "#0d6efd",
                        "outline-variant": "#c1c6d6",
                        "error": "#ba1a1a",
                        "surface-container": "#edeeef",
                        "on-primary-container": "#ffffff",
                        "on-error-container": "#93000a",
                        "primary": "#0057cd",
                        "on-tertiary-container": "#130001",
                        "on-secondary-container": "#5f2a00",
                        "surface-container-low": "#f3f4f5",
                        "surface-container-highest": "#e1e3e4",
                        "secondary": "#984700",
                        "tertiary-fixed": "#ffdad9",
                        "on-secondary-fixed": "#321300",
                        "on-secondary-fixed-variant": "#743500",
                        "surface-tint": "#0057ce",
                        "background": "#f8f9fa",
                        "tertiary-container": "#dd3645",
                        "outline": "#727785",
                        "secondary-fixed-dim": "#ffb68a",
                        "on-primary-fixed-variant": "#00419e",
                        "inverse-on-surface": "#f0f1f2",
                        "on-primary": "#ffffff",
                        "on-background": "#191c1d",
                        "surface": "#f8f9fa",
                        "surface-dim": "#d9dadb",
                        "on-primary-fixed": "#001946",
                        "tertiary": "#b91830",
                        "inverse-surface": "#2e3132",
                        "secondary-fixed": "#ffdbc8",
                        "surface-container-high": "#e7e8e9",
                        "on-tertiary-fixed-variant": "#92001f",
                        "on-error": "#ffffff",
                        "primary-fixed": "#dae2ff",
                        "tertiary-fixed-dim": "#ffb3b2",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed": "#410008",
                        "on-secondary": "#ffffff",
                        "surface-bright": "#f8f9fa",
                        "on-surface-variant": "#414754",
                        "secondary-container": "#ff8016",
                        "on-surface": "#191c1d",
                        "primary-fixed-dim": "#b1c5ff",
                        "on-tertiary": "#ffffff",
                        "surface-variant": "#e1e3e4",
                        "inverse-primary": "#b1c5ff",
                        "surface-container-lowest": "#ffffff"
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-headline { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-background text-on-background antialiased">
<!-- SideNavBar Shell -->
<aside class="h-screen w-64 border-r-0 fixed left-0 top-0 bg-slate-50 dark:bg-slate-900 flex flex-col py-8 px-4 font-manrope antialiased z-50">
<div class="mb-10 px-4">
<a href="../../"><h1 class="text-xl font-bold tracking-tight text-blue-700 dark:text-blue-400">Guardian Admin</h1>
<p class="text-xs text-slate-500 uppercase tracking-widest mt-1">Stewardship Portal</p></a>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:bg-white/80 transition-all duration-300" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-semibold">Dashboard</span>
</a>
<!-- Active Tab: Campaigns -->
<a class="flex items-center gap-3 px-4 py-3 rounded-xl text-blue-700 dark:text-blue-400 font-bold border-r-4 border-blue-700 dark:border-blue-400 bg-white dark:bg-slate-950/50 scale-95 active:scale-90 transition-transform" href="#">
<span class="material-symbols-outlined">campaign</span>
<span>Campaigns</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:bg-white/80 transition-all duration-300" href="#">
<span class="material-symbols-outlined">group</span>
<span>Donors</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:bg-white/80 transition-all duration-300" href="#">
<span class="material-symbols-outlined">assessment</span>
<span>Impact Reports</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:bg-white/80 transition-all duration-300" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Settings</span>
</a>
</nav>
<div class="mt-auto space-y-1">
<button class="w-full bg-primary text-white py-3 rounded-xl font-bold mb-6 shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
                New Campaign
            </button>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-white/80 transition-all" href="#">
<span class="material-symbols-outlined">help</span>
<span>Help Center</span>
</a>
</div>
</aside>
<!-- TopNavBar Shell -->
<header class="sticky top-0 z-40 w-full bg-white/80 dark:bg-slate-950/80 backdrop-blur-md shadow-sm dark:shadow-none flex justify-between items-center h-16 px-8 ml-64">
<div class="flex items-center gap-4 flex-1">
<div class="relative w-full max-w-md">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-50 border-none rounded-lg focus:ring-2 focus:ring-primary/20 transition-all text-sm" placeholder="Search campaigns..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4 text-slate-600">
<button class="material-symbols-outlined hover:text-primary transition-colors">notifications</button>
<button class="material-symbols-outlined hover:text-primary transition-colors">mail</button>
</div>
<div class="h-8 w-[1px] bg-slate-200"></div>
<div class="flex items-center gap-3">
<span class="text-sm font-semibold font-manrope text-slate-700">Admin Profile</span>
<img class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm" data-alt="Professional portrait of a male charity administrator in business attire, clean background, high-end corporate style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0RoaHDpUiq8P1LyUR97Pjkxu-TX1G9RVRMQ_bJDygoMsp2sCpo3eIw6qz_asT21U2dccrwOXbVd-nuusL2GY7Tzv9FCrrF6fM5SKIn7AoXbdvgPj933WrxkVgLHfIgyY8EgrQBZxA-Bo_NtRWwCzauz7Ou4cWFMCTNaLqn_8ebqXJzvjgZvLsDS_G135ZCQMI-K_7uXPe_6JdSdzEZ2jlpE9657tDa4sWyEXbq6u-28aTjxxV_S-R-bT5H9Jb7OotpRI0TwTIltEy"/>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="ml-64 p-12 min-h-screen">
<div class="max-w-4xl mx-auto">
<!-- Breadcrumbs & Header -->
<div class="mb-10">
<nav class="flex items-center gap-2 text-sm text-slate-400 mb-2">
<a class="hover:text-primary" href="#">Campaigns</a>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span class="text-slate-600 font-medium">New Campaign</span>
</nav>
<h2 class="text-4xl font-extrabold font-headline tracking-tight text-on-surface">Khởi tạo chiến dịch mới</h2>
<p class="text-slate-500 mt-2 text-lg">Define the mission, set the goals, and inspire your community.</p>
</div>
<!-- Form Card: The Transparent Guardian Style -->
<div class="bg-surface-container-lowest rounded-2xl shadow-[0_20px_40px_rgba(25,28,29,0.06)] p-10 relative overflow-hidden">
<!-- Decorative Accent -->
<div class="absolute top-0 right-0 w-32 h-32 bg-secondary/5 rounded-bl-full -mr-10 -mt-10"></div>
<form action="process_add_campaign.php" method="POST" enctype="multipart/form-data" class="space-y-8">
    
    <section class="space-y-6">
        <div>
            <label class="block text-sm font-bold font-headline text-slate-700 mb-2">Tên chiến dịch</label>
            <input name="campaign_name" required class="w-full bg-surface-container-highest border-none rounded-md px-4 py-3 focus:ring-2 focus:ring-primary/20 transition-all text-on-surface placeholder:text-slate-400" placeholder="Nhập tên chiến dịch..." type="text"/>
        </div>
        <div>
            <label class="block text-sm font-bold font-headline text-slate-700 mb-2">Tóm tắt chiến dịch</label>
            <textarea name="summary" required class="w-full bg-surface-container-highest border-none rounded-md px-4 py-3 focus:ring-2 focus:ring-primary/20 transition-all text-on-surface placeholder:text-slate-400" placeholder="Mô tả ngắn gọn về mục tiêu của chiến dịch..." rows="3"></textarea>
        </div>
    </section>

    <section>
        <label class="block text-sm font-bold font-headline text-slate-700 mb-2">Mô tả chi tiết hoàn cảnh</label>
        <div class="rounded-md overflow-hidden bg-surface-container-highest border-none">
            <div class="flex gap-2 p-2 border-b border-white/20 bg-slate-100/50">
                <button class="p-1 hover:bg-white rounded transition-colors" type="button"><span class="material-symbols-outlined text-sm">format_bold</span></button>
                <button class="p-1 hover:bg-white rounded transition-colors" type="button"><span class="material-symbols-outlined text-sm">format_italic</span></button>
            </div>
            <textarea name="detailed_context" required class="w-full bg-transparent border-none px-4 py-3 focus:ring-0 text-on-surface placeholder:text-slate-400" placeholder="Hãy kể câu chuyện đầy cảm hứng về hoàn cảnh cần được giúp đỡ..." rows="8"></textarea>
        </div>
    </section>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4 border-t border-slate-100">
        <div>
            <label class="block text-sm font-bold font-headline text-slate-700 mb-2">Số tiền mục tiêu (VNĐ)</label>
            <div class="relative">
                <input name="target_amount" required min="10000" class="w-full bg-surface-container-highest border-none rounded-md pl-4 pr-16 py-3 focus:ring-2 focus:ring-primary/20 transition-all text-on-surface font-semibold" placeholder="50000000" type="number"/>
                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">VNĐ</div>
            </div>
        </div>
        <div>
            <label class="block text-sm font-bold font-headline text-slate-700 mb-2">Ngày kết thúc chiến dịch</label>
            <div class="relative">
                <input name="end_date" required class="w-full bg-surface-container-highest border-none rounded-md px-4 py-3 focus:ring-2 focus:ring-primary/20 transition-all text-on-surface" type="date"/>
            </div>
        </div>
    </div>

    <div class="bg-surface-container-low p-6 rounded-xl border-dashed border-2 border-slate-200 flex flex-col items-center justify-center text-center relative hover:bg-slate-50 cursor-pointer transition-colors" onclick="document.getElementById('cover_image').click();">
        <span class="material-symbols-outlined text-4xl text-slate-300 mb-2">add_photo_alternate</span>
        <p class="text-sm font-bold text-slate-600">Thêm ảnh bìa chiến dịch</p>
        <p class="text-xs text-slate-400 mt-1" id="file_name_display">Ảnh chất lượng cao giúp tăng 40% khả năng quyên góp.</p>
        
        <input type="file" name="cover_image" id="cover_image" accept="image/*" class="hidden" required onchange="document.getElementById('file_name_display').innerText = this.files[0].name">
        
        <button class="mt-4 px-6 py-2 bg-white rounded-full text-xs font-bold shadow-sm border border-slate-100 hover:bg-slate-50 transition-all pointer-events-none" type="button">Chọn ảnh</button>
    </div>

    <div class="flex items-center justify-between pt-8">
        <button class="text-slate-500 font-semibold hover:text-error transition-colors" type="button">Hủy bỏ</button>
        <div class="flex gap-4">
            <button class="px-8 py-4 bg-surface-container-highest text-slate-700 rounded-xl font-bold hover:bg-slate-200 transition-all" type="button">Lưu nháp</button>
            <button class="px-10 py-4 bg-gradient-to-r from-primary to-primary-container text-white rounded-xl font-bold shadow-lg shadow-primary/25 hover:scale-[1.02] active:scale-95 transition-all" type="submit">
                Khởi tạo chiến dịch
            </button>
        </div>
    </div>
</form>
</div>
<!-- Impact Quote Asymmetry -->
</div>
</main>
<!-- Floating Helper Widget -->
<div class="fixed bottom-8 right-8 bg-white/90 backdrop-blur-xl p-4 rounded-2xl shadow-2xl border border-white/20 flex items-center gap-4 z-50">
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white">
<span class="material-symbols-outlined">auto_awesome</span>
</div>
<div>
<p class="text-xs font-bold text-slate-400 uppercase tracking-tighter">AI Assistant</p>
<p class="text-sm font-semibold text-slate-700">Cần hỗ trợ viết câu chuyện?</p>
</div>
<button class="bg-primary/10 text-primary p-2 rounded-lg hover:bg-primary/20 transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</body></html>