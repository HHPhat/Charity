<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
    ob_start(); //header, cookie

    require_once 'config.php';
    require_once 'includes/connect.php';
    require_once 'includes/database.php';
    require_once 'includes/session.php';
    
    $module = _MODULES;
    $action = _ACTION;

    
    
    // if (!empty($_GET['module'])){
    //     $module = $_GET['module'];
    // }

    // if (!empty($_GET['action'])){
    //     $action = $_GET['action'];
    // }
    // $path = 'modules/'.$module.'/'.$action.'.php';
    
    // if(!empty($path)){
    //     if(file_exists($path)){
    //         // require_once $path;
    //         header("Location: ".$path);
    //     }else{
    //         // require_once 'modules/errors/404.php';
    //         header("Location: modules/errors/404.php");
    //     }
    // }
    // else{
    //     // require_once 'modules/errors/500.php';
    //     header("Location: modules/errors/500.php");
    // }
?>
<!DOCTYPE html>
<html class="light" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Transparent Guardian | Impact Through Transparency</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                gap: 1.5rem;
            }
        </style>
    </head>
    <body class="bg-surface font-body text-on-surface antialiased">
        <!-- TopNavBar -->
        <nav class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm dark:shadow-none">
            <div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
                <div class="text-2xl font-extrabold tracking-tighter text-blue-700 dark:text-blue-400 font-headline">
                    Transparent Guardian
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a class="font-manrope font-bold text-sm tracking-tight text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400 pb-1" href="#">Home</a>
                    <a class="font-manrope font-bold text-sm tracking-tight text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="modules/campaigns">Campaigns</a>
                    <a class="font-manrope font-bold text-sm tracking-tight text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="modules/joined_campaigns">My Joined Campaigns</a>
                    <a class="font-manrope font-bold text-sm tracking-tight text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="modules/accounts">My Account</a>
                </div>
                <div class="flex items-center gap-4">
                    <?php if (empty($_SESSION['account_id'])): ?>
                        <div class="flex items-center gap-2">
                            <button onclick="window.location.href='pages/login.php'" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 font-manrope font-bold text-sm tracking-tight scale-95 active:scale-90 transition-transform">
                                Login
                            </button>
                            <button onclick="window.location.href='pages/register.php'" class="bg-primary text-on-primary px-6 py-2 rounded-xl font-manrope font-bold text-sm tracking-tight scale-95 active:scale-90 transition-transform shadow-[0_2px_0_0_rgba(0,65,158,1)]">
                                Sign Up
                            </button>
                        </div>

                    <?php else: ?>
                        <div class="flex items-center gap-5">
                            <div class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity" onclick="window.location.href='modules/accounts/'">
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
        <main class="pt-24">
            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-6 mb-20">
            <div class="editorial-grid items-center">
            <div class="col-span-12 lg:col-span-7 mb-12 lg:mb-0">
            <span class="inline-block px-4 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed text-sm font-bold mb-6">Tình thương của chúng ta</span>
            <h1 class="font-headline text-5xl md:text-7xl font-extrabold tracking-tight text-on-surface leading-[1.1] mb-8">
                                    Hạnh phúc từ tâm là <br/><span class="text-primary italic">cho đi nhiều thứ.</span>
            </h1>
            <div class="bg-surface-container-low p-8 rounded-xl relative overflow-hidden">
            <div class="relative z-10">
            <p class="text-on-surface-variant font-medium text-lg mb-2">Tổng số tiền quyên góp được</p>
            <p class="text-4xl md:text-6xl font-headline font-extrabold text-on-surface flex items-baseline gap-2">
                                            2,500,000,000 <span class="text-xl md:text-2xl font-bold text-primary">VNĐ</span>
            </p>
            </div>
            <div class="absolute top-0 right-0 p-4 opacity-10">
            <span class="material-symbols-outlined text-9xl">guardian</span>
            </div>
            </div>
            </div>
            <div class="col-span-12 lg:col-span-5 relative">
            <div class="aspect-[4/5] rounded-xl overflow-hidden shadow-2xl relative z-10 transform lg:translate-x-8">

            <img class="w-full h-full object-cover" data-alt="Candid portrait of smiling children in a community school setting with warm sunlight and soft background focus" src="/Charity/templates/assets/image/Charity.jpg"/>
            
            </div>
            <div class="absolute -bottom-6 -left-6 w-48 h-48 bg-secondary-container/20 rounded-xl -z-10 backdrop-blur-3xl"></div>
            </div>
            </div>
            </section>
            <!-- Ongoing Campaigns Section -->
            <section class="bg-surface-container-low py-20">
            <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="max-w-2xl">
            <h2 class="font-headline text-4xl font-extrabold text-on-surface mb-4">Các hoạt động đang diễn ra</h2>
            <p class="text-on-surface-variant text-lg">Mọi khoản đóng góp đều được theo dõi với sự minh bạch triệt để. Tham gia một mục tiêu cộng hưởng với trái tim bạn.</p>
            </div>
            <a class="mt-6 md:mt-0 flex items-center gap-2 text-primary font-bold hover:underline" href="#">
                                    View All Campaigns <span class="material-symbols-outlined">arrow_forward</span>
            </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Campaign Card 1 -->
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden flex flex-col group">
            <div class="relative aspect-video overflow-hidden">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" data-alt="Close up of small green sapling being planted in rich dark soil by gentle hands under bright daylight" 
            src="/Charity/templates/assets/image/001.jpg"/>
            <div class="absolute top-4 left-4">
            <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-primary shadow-sm">Môi trường</span>
            </div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
            <h3 class="font-headline text-xl font-bold text-on-surface mb-3">Trồng rừng</h3>
            <p class="text-on-surface-variant text-sm mb-6 flex-grow">Khôi phục các hệ sinh thái rừng tự nhiên và nâng cao chất lượng môi trường, đồng thời mang lại sinh kế bền vững cho cộng đồng dân tộc thông qua việc trồng cây bản địa.</p>
            <div class="mb-6">
            <div class="flex justify-between text-xs font-bold mb-2">
            <span class="text-on-surface">Đạt 75%</span>
            <span class="text-primary">150M / 200M VNĐ</span>
            </div>
            <div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
            <div class="h-full bg-primary rounded-full" style="width: 75%"></div>
            </div>
            </div>
            <button class="w-full bg-secondary-container text-on-secondary-container py-3 rounded-xl font-bold text-sm shadow-[0_2px_0_0_#984700] hover:opacity-90 transition-opacity">Donate Now</button>
            </div>
            </div>
            <!-- Campaign Card 2 -->
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden flex flex-col group">
            <div class="relative aspect-video overflow-hidden">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" data-alt="Clean fresh water pouring into a glass in a rural village setting with soft natural morning light" 
            src="/Charity/templates/assets/image/2/002.jpg"/>
            <div class="absolute top-4 left-4">
            <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-primary shadow-sm">Sức khỏe</span>
            </div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
            <h3 class="font-headline text-xl font-bold text-on-surface mb-3">Nươc sạch cho các vùng sâu</h3>
            <p class="text-on-surface-variant text-sm mb-6 flex-grow">Lắp đặt hệ thống lọc chạy bằng năng lượng mặt trời để cung cấp nước uống an toàn cho các hộ dân vùng sâu vùng xa.</p>
            <div class="mb-6">
            <div class="flex justify-between text-xs font-bold mb-2">
            <span class="text-on-surface">Đạt 42%</span>
            <span class="text-primary">336M / 800M VNĐ</span>
            </div>
            <div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
            <div class="h-full bg-primary rounded-full" style="width: 42%"></div>
            </div>
            </div>
            <button class="w-full bg-secondary-container text-on-secondary-container py-3 rounded-xl font-bold text-sm shadow-[0_2px_0_0_#984700] hover:opacity-90 transition-opacity">Donate Now</button>
            </div>
            </div>
            <!-- Campaign Card 3 -->
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden flex flex-col group">
            <div class="relative aspect-video overflow-hidden">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" data-alt="Library shelves filled with colorful children's books in a bright modern learning space"
            src="/Charity/templates/assets/image/003.jpg"/>
            <div class="absolute top-4 left-4">
            <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-primary shadow-sm">Giáo dục</span>
            </div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
            <h3 class="font-headline text-xl font-bold text-on-surface mb-3">Mở thêm trường học vùng cao</h3>
            <p class="text-on-surface-variant text-sm mb-6 flex-grow">Chúng tôi triển khai hoạt động mở thêm trường học tại các vùng cao nhằm giúp trẻ em có điều kiện tiếp cận giáo dục tốt hơn. Hoạt động này bao gồm xây dựng cơ sở vật chất, trang bị sách vở, đào tạo giáo viên và tổ chức các chương trình ngoại khóa, góp phần nâng cao tri thức, kỹ năng sống và phát triển cộng đồng địa phương.</p>
            <div class="mb-6">
            <div class="flex justify-between text-xs font-bold mb-2">
            <span class="text-on-surface">Đạt 91%</span>
            <span class="text-primary">455M / 500M VNĐ</span>
            </div>
            <div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
            <div class="h-full bg-primary rounded-full" style="width: 91%"></div>
            </div>
            </div>
            <button class="w-full bg-secondary-container text-on-secondary-container py-3 rounded-xl font-bold text-sm shadow-[0_2px_0_0_#984700] hover:opacity-90 transition-opacity">Donate Now</button>
            </div>
            </div>
            </div>
            </div>
            </section>
            <!-- Floating Donation Widget -->
            <div class="fixed bottom-6 right-6 z-40">
            <div class="bg-surface-container-lowest/90 backdrop-blur-xl p-4 rounded-xl shadow-[0_20px_40px_rgba(25,28,29,0.06)] flex items-center gap-4 border border-outline-variant/20">
            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-on-primary shadow-lg">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
            </div>
            <div>
            <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">Impact Live</p>
            <p class="text-sm font-bold text-on-surface">Join 1,240+ recent donors</p>
            </div>
            </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="w-full border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950">
            <div class="flex flex-col md:flex-row justify-between items-center px-8 py-12 w-full max-w-7xl mx-auto">
            <div class="mb-8 md:mb-0">
            <div class="text-xl font-bold text-slate-900 dark:text-white mb-2">Transparent Guardian</div>
            <p class="font-inter text-sm text-slate-500 dark:text-slate-400">© 2024 The Transparent Guardian. All rights reserved.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-8">
            <a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">About Us</a>
            <a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Impact Reports</a>
            <a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Contact</a>
            <a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Privacy Policy</a>
            </div>
            </div>
        </footer>
    </body>
</html>