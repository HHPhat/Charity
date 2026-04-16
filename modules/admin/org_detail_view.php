<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo
    $org_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $_SESSION['org_id']= $org_id;
require_once '../../includes/database.php';
?>
<!DOCTYPE html>

<html class="light" lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Đăng ký Tổ chức Từ thiện | Kindred Heart</title>
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
                    "inverse-surface": "#2e3132",
                    "secondary-container": "#ff8016",
                    "tertiary": "#b91830",
                    "surface": "#f8f9fa",
                    "on-primary-fixed": "#001946",
                    "secondary-fixed-dim": "#ffb68a",
                    "on-primary": "#ffffff",
                    "background": "#f8f9fa",
                    "on-tertiary-container": "#130001",
                    "on-tertiary-fixed-variant": "#92001f",
                    "on-primary-fixed-variant": "#00419e",
                    "on-secondary-fixed": "#321300",
                    "inverse-on-surface": "#f0f1f2",
                    "on-secondary-fixed-variant": "#743500",
                    "surface-variant": "#e1e3e4",
                    "on-error-container": "#93000a",
                    "surface-container-lowest": "#ffffff",
                    "surface-bright": "#f8f9fa",
                    "secondary": "#984700",
                    "on-error": "#ffffff",
                    "on-secondary-container": "#5f2a00",
                    "surface-container": "#edeeef",
                    "inverse-primary": "#b1c5ff",
                    "on-tertiary-fixed": "#410008",
                    "surface-container-low": "#f3f4f5",
                    "on-secondary": "#ffffff",
                    "on-primary-container": "#ffffff",
                    "primary-fixed-dim": "#b1c5ff",
                    "error": "#ba1a1a",
                    "surface-container-highest": "#e1e3e4",
                    "on-background": "#191c1d",
                    "tertiary-fixed": "#ffdad9",
                    "surface-dim": "#d9dadb",
                    "secondary-fixed": "#ffdbc8",
                    "on-surface-variant": "#414754",
                    "on-surface": "#191c1d",
                    "surface-container-high": "#e7e8e9",
                    "error-container": "#ffdad6",
                    "tertiary-container": "#dd3645",
                    "primary-fixed": "#dae2ff",
                    "on-tertiary": "#ffffff",
                    "primary": "#0057cd",
                    "outline": "#727785",
                    "outline-variant": "#c1c6d6",
                    "tertiary-fixed-dim": "#ffb3b2",
                    "primary-container": "#0d6efd",
                    "surface-tint": "#0057ce"
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
        .tonal-shift-no-border {
            border: none !important;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #191c1d;
        }
        h1, h2, h3 {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>
<body class="bg-surface selection:bg-primary-fixed">
<nav class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm dark:shadow-none tonal-shift-no-border">
<div class="flex justify-between items-center px-8 py-4 max-w-full font-['Manrope'] antialiased">
<a href="charities.php"><div class="text-2xl font-bold tracking-tight text-blue-700 dark:text-blue-400">Transparent Guardian</div></a>
<div class="hidden md:flex items-center gap-8">
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
<main class="min-h-screen pt-24 pb-20 px-4 md:px-8 max-w-7xl mx-auto">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
<section class="lg:col-span-6 xl:col-span-5 space-y-10">
<header class="space-y-4">
</header>
<?php
// Khởi tạo biến mặc định để tránh lỗi nếu không có dữ liệu
$org_name = $tax_code = $full_name = $email = $phone = $citizen_id = "Không có thông tin";
$img_path = "";

// Kiểm tra xem có session org_id hay không
if (isset($_SESSION['org_id'])) {
    $org_id = $_SESSION['org_id'];
    
    // Gọi hàm vừa viết
    $info = get_organization_and_donor_info($org_id);
    
    if ($info) {
        $org_name = htmlspecialchars($info['org_name'] ?? '');
        $tax_code = htmlspecialchars($info['tax_code'] ?? '');
        $full_name = htmlspecialchars($info['full_name'] ?? 'Chưa cập nhật');
        $email = htmlspecialchars($info['email'] ?? 'Chưa cập nhật');
        $phone = htmlspecialchars($info['phone'] ?? 'Chưa cập nhật');
        $citizen_id = htmlspecialchars($info['citizen_id'] ?? 'Chưa cập nhật');
    }
    
    // Lấy đường dẫn ảnh
    $img_path = "/Charity/templates/uploads/org/{$org_id}/portrait.jpg";
}
?>

<form id="orgForm" action="#" method="POST" class="space-y-8">
    <div class="space-y-6">
        <div class="space-y-2">
            <label class="text-sm font-semibold text-on-surface-variant tracking-wide px-1">Tên tổ chức</label>
            <input name="org_name" value="<?= $org_name ?>" disabled class="w-full px-6 py-4 rounded-xl bg-surface-container-highest border-none text-on-surface opacity-70 cursor-not-allowed" type="text"/>
        </div>
        <div class="space-y-2">
            <label class="text-sm font-semibold text-on-surface-variant tracking-wide px-1">Mã số thuế</label>
            <input name="tax_code" value="<?= $tax_code ?>" disabled class="w-full px-6 py-4 rounded-xl bg-surface-container-highest border-none text-on-surface opacity-70 cursor-not-allowed" type="text"/>
        </div>
        <div class="space-y-4">
            <label class="text-sm font-semibold text-on-surface-variant tracking-wide px-1 block">Xác thực người đại diện</label>
            
            <div id="photo_container" class="group relative aspect-video rounded-2xl bg-surface-container-highest overflow-hidden flex items-center justify-center border-2 border-solid border-outline-variant">
                <img id="captured_photo" class="absolute inset-0 w-full h-full object-cover" 
                     src="<?= $img_path ?>" 
                     onerror="this.src='/Charity/templates/assets/image/default_avatar.jpg'" 
                     alt="Ảnh chân dung người đại diện" />
            </div>
            
        </div>
    </div>
</form>
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
?>  
</section>
<section class="lg:col-span-6 xl:col-start-8 xl:col-span-5 mt-12 lg:mt-0">
    <div class="sticky top-32 space-y-8">
        <div class="p-8 md:p-10 rounded-3xl bg-surface-container-low shadow-sm">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-1.5 h-8 bg-secondary rounded-full"></div>
                <h2 class="text-2xl font-bold text-on-surface">Thông tin xem trước</h2>
            </div>
            
            <div class="space-y-6">
                <div class="p-6 rounded-2xl bg-surface-container-lowest space-y-1">
                    <p class="text-xs font-bold uppercase tracking-widest text-outline">Tên người đăng ký</p>
                    <p class="text-base font-bold text-on-surface"><?= $full_name ?></p>
                </div>
                
                <div class="p-6 rounded-2xl bg-surface-container-lowest space-y-1">
                    <p class="text-xs font-bold uppercase tracking-widest text-outline">Email</p>
                    <p class="text-base font-semibold text-on-surface"><?= $email ?></p>
                </div>
                
                <div class="p-6 rounded-2xl bg-surface-container-lowest space-y-1">
                    <p class="text-xs font-bold uppercase tracking-widest text-outline">Số điện thoại</p>
                    <p class="text-base font-semibold text-on-surface"><?= $phone ?></p>
                </div>
                
                <div class="p-6 rounded-2xl bg-surface-container-lowest space-y-1">
                    <p class="text-xs font-bold uppercase tracking-widest text-outline">Mã số định danh (CCCD/CMND)</p>
                    <p class="text-base font-mono font-semibold text-primary"><?= $citizen_id ?></p>
                </div>
            </div>
            
            <div class="mt-10 p-6 bg-secondary-container/10 rounded-2xl flex gap-4 items-start border border-secondary-container/20">
                <span class="material-symbols-outlined text-secondary-container">verified_user</span>
                <div class="text-sm text-on-secondary-container font-medium">
                    Thông tin này sẽ được đội ngũ kiểm duyệt xem xét trong vòng 24-48 giờ làm việc.
                </div>
            </div>
        </div>
        <div class="hidden xl:block relative group h-48 overflow-hidden rounded-3xl">
        </div>
    </div>
</section>
</div>
</main>
<footer class="bg-slate-50 dark:bg-slate-950 w-full py-12 px-8 font-['Inter'] text-sm tracking-wide bg-shift-no-lines">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
<div class="font-['Manrope'] font-bold text-slate-900 dark:text-slate-100 text-lg">Kindred Heart</div>
<div class="flex flex-wrap justify-center gap-8">
<a class="text-slate-500 hover:text-blue-600 transition-opacity ease-out duration-400" href="#">Privacy Policy</a>
<a class="text-slate-500 hover:text-blue-600 transition-opacity ease-out duration-400" href="#">Terms of Service</a>
<a class="text-slate-500 hover:text-blue-600 transition-opacity ease-out duration-400" href="#">Impact Reports</a>
<a class="text-slate-500 hover:text-blue-600 transition-opacity ease-out duration-400" href="#">Help Center</a>
</div>
<div class="text-slate-500">© 2024 Kindred Heart. The Transparent Guardian.</div>
</div>
</footer>
</body></html>