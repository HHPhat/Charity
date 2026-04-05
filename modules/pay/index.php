<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo

?>
<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Donate - Transparent Guardian</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;400;600;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-secondary-fixed-variant": "#743500",
                    "on-secondary": "#ffffff",
                    "surface-bright": "#f8f9fa",
                    "outline": "#727785",
                    "surface-container-low": "#f3f4f5",
                    "secondary": "#984700",
                    "primary-fixed": "#dae2ff",
                    "surface": "#f8f9fa",
                    "primary-container": "#0d6efd",
                    "on-background": "#191c1d",
                    "tertiary-container": "#dd3645",
                    "surface-tint": "#0057ce",
                    "on-primary-fixed-variant": "#00419e",
                    "tertiary": "#b91830",
                    "on-error-container": "#93000a",
                    "primary": "#0057cd",
                    "secondary-fixed-dim": "#ffb68a",
                    "on-tertiary-fixed": "#410008",
                    "error-container": "#ffdad6",
                    "on-tertiary-container": "#130001",
                    "surface-container-lowest": "#ffffff",
                    "inverse-primary": "#b1c5ff",
                    "on-error": "#ffffff",
                    "surface-container-high": "#e7e8e9",
                    "on-surface": "#191c1d",
                    "primary-fixed-dim": "#b1c5ff",
                    "on-primary-container": "#ffffff",
                    "tertiary-fixed-dim": "#ffb3b2",
                    "tertiary-fixed": "#ffdad9",
                    "surface-variant": "#e1e3e4",
                    "on-tertiary": "#ffffff",
                    "inverse-on-surface": "#f0f1f2",
                    "on-primary": "#ffffff",
                    "error": "#ba1a1a",
                    "background": "#f8f9fa",
                    "on-surface-variant": "#414754",
                    "secondary-container": "#ff8016",
                    "on-secondary-container": "#5f2a00",
                    "on-secondary-fixed": "#321300",
                    "on-primary-fixed": "#001946",
                    "secondary-fixed": "#ffdbc8",
                    "on-tertiary-fixed-variant": "#92001f",
                    "surface-container-highest": "#e1e3e4",
                    "outline-variant": "#c1c6d6",
                    "inverse-surface": "#2e3132",
                    "surface-dim": "#d9dadb",
                    "surface-container": "#edeeef"
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
        .hero-glass {
            background: rgba(248, 249, 250, 0.8);
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-surface text-on-background font-body selection:bg-primary-fixed selection:text-on-primary-fixed">
<!-- Top Navigation -->
<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
<div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
<div class="text-2xl font-extrabold tracking-tighter text-blue-700">Transparent Guardian</div>
<div class="hidden md:flex items-center gap-8 font-manrope font-bold text-sm tracking-tight">
<a class="text-slate-600 hover:text-blue-600 transition-opacity duration-400 ease-out" href="../../">Home</a>
<a class="text-blue-700 border-b-2 border-blue-700 pb-1 transition-opacity duration-400 ease-out" href="../campaigns">Campaigns</a>
<a class="text-slate-600 hover:text-blue-600 transition-opacity duration-400 ease-out" href="../joined_campaigns">My Joined Campaigns</a>
<a class="text-slate-600 hover:text-blue-600 transition-opacity duration-400 ease-out" href="../accounts">My Account</a>
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
        <div class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity" onclick="window.location.href='my_account.php'">
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
<main class="max-w-7xl mx-auto px-8 py-12 md:py-20">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
<!-- Hero & Context Section (Asymmetric Editorial Layout) -->
<div class="lg:col-span-5 flex flex-col gap-12 sticky top-32">
<div class="relative group">
<div class="absolute -top-6 -left-6 w-24 h-24 bg-secondary-fixed rounded-full opacity-50 z-0"></div>
<h1 class="text-5xl md:text-6xl font-extrabold font-headline leading-[1.1] text-primary relative z-10 tracking-tight">
                        Clean Water for Remote Villages
                    </h1>
</div>
<p class="text-lg text-on-surface-variant leading-relaxed max-w-md">
                    In the mountainous reaches of the Central Highlands, thousands of families travel 5km daily for water that isn't safe to drink. Your contribution builds sustainable filtration systems that last a generation.
                </p>
<div class="relative rounded-xl overflow-hidden aspect-[4/5] shadow-2xl">
<img alt="Clean Water Impact" class="w-full h-full object-cover grayscale-[30%] hover:grayscale-0 transition-all duration-700" data-alt="Candid photograph of a child in a rural village drinking clean water from a new community well, warm natural lighting, high-end editorial style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDMKP5ac-NQbcHNEg08TwdYx3UD1ZM0gYFfLHDomuBw41Q75hTNst1YdatpSATVd-dqpVlTFQqT3m-qVoT3_h1lwpVQn3-R2poPOFICh0iXzE3HeA20jPUsMgIKJ_ipzuXiMxY0NVENZvFPGJCjxqBU47402vGKDZb1sbtsu065Sfx4AA4NMlZWX08IMvZpWdwg0c-M2Qzv-QZL5zOi7Wwd6ZkR4Jc-YgJ-RuiM6cgihPDdDdsyLaqNglN9eqA1K_NJciJM_mIADDbQ"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/40 to-transparent"></div>
<div class="absolute bottom-6 left-6 right-6 p-6 hero-glass rounded-xl border border-white/20">
<p class="font-headline font-bold text-primary italic">"Water is the foundation of dignity. Without it, there is no education, no health, no future."</p>
<p class="text-sm mt-2 text-on-surface-variant">— Project Lead, Ha Giang</p>
</div>
</div>
<div class="flex gap-6 items-center">
<div class="flex flex-col">
<span class="text-3xl font-extrabold text-tertiary font-headline tracking-tighter">84%</span>
<span class="text-xs uppercase tracking-widest text-on-surface-variant font-medium">Funded</span>
</div>
<div class="h-10 w-[1px] bg-outline-variant"></div>
<div class="flex flex-col">
<span class="text-3xl font-extrabold text-primary font-headline tracking-tighter">12</span>
<span class="text-xs uppercase tracking-widest text-on-surface-variant font-medium">Villages Left</span>
</div>
</div>
</div>
<!-- Donation Form Section -->
<div class="lg:col-span-7 bg-surface-container-lowest rounded-[2rem] p-8 md:p-12 shadow-[0_20px_40px_rgba(25,28,29,0.06)]">
<form action="confirm.php" method="POST" class="space-y-10">
    
    <input type="hidden" name="campaign_name" value="Clean Water for Remote Villages">

    <section>
        <label class="block text-sm font-bold font-headline uppercase tracking-widest text-on-surface-variant mb-6">Payment Method</label>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <label class="relative flex flex-col items-center justify-center p-6 border-2 border-outline-variant rounded-xl cursor-pointer hover:border-primary group transition-all">
                <input checked="" class="absolute top-4 right-4 text-primary focus:ring-primary" name="payment_method" type="radio" value="card"/>
                <span class="material-symbols-outlined text-3xl mb-2 text-on-surface-variant group-hover:text-primary">credit_card</span>
                <span class="font-bold text-sm">Card</span>
            </label>
        </div>

        <div class="mt-8 p-8 bg-surface-container-low rounded-2xl border border-outline-variant/30 space-y-6">
            <h3 class="text-lg font-bold font-headline text-primary flex items-center gap-2">
                <span class="material-symbols-outlined">credit_card</span>
                Card Details
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Select Bank</label>
                    <select name="bank" required class="w-full px-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 font-bold transition-all">
                        <option value="">Choose your bank</option>
                        <option value="vcb">Vietcombank</option>
                        <option value="tcb">Techcombank</option>
                        <option value="ncb">NCB</option>
                        <option value="vpb">VPBank</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Card Number</label>
                    <input name="card_number" id="cardNumber" class="w-full px-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 font-bold tracking-widest transition-all" placeholder="xxxx xxxx xxxx xxxx" type="text" required/>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Cardholder Name</label>
                    <input name="cardholder_name" id="cardholderName" class="w-full px-4 py-4 bg-surface-container-highest/50 border-none rounded-xl font-bold text-on-surface-variant cursor-not-allowed" readonly="" type="text" value=""/>
                </div>
                
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Issuing Date (MM/YY)</label>
                    <input name="issuing_date" class="w-full px-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 font-bold transition-all" placeholder="01/24" type="text" required/>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">OTP Code</label>
                    <div class="relative">
                        <input name="otp_code" class="w-full pl-4 pr-24 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 font-bold transition-all" placeholder="Enter OTP" type="text" required/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <label class="block text-sm font-bold font-headline uppercase tracking-widest text-on-surface-variant mb-6">Select Amount (VNĐ)</label>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <button class="amount-btn py-4 px-2 rounded-xl bg-surface-container text-on-surface font-bold hover:bg-primary hover:text-white transition-all duration-300" type="button" data-amount="100000">100.000</button>
            <button class="amount-btn py-4 px-2 rounded-xl bg-primary text-on-primary font-bold shadow-lg shadow-primary/20 ring-4 ring-primary/10 transition-all duration-300" type="button" data-amount="500000">500.000</button>
            <button class="amount-btn py-4 px-2 rounded-xl bg-surface-container text-on-surface font-bold hover:bg-primary hover:text-white transition-all duration-300" type="button" data-amount="1000000">1.000.000</button>
            <button class="amount-btn py-4 px-2 rounded-xl bg-surface-container text-on-surface font-bold hover:bg-primary hover:text-white transition-all duration-300" type="button" data-amount="5000000">5.000.000</button>
        </div>
        <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 font-bold text-on-surface-variant">VNĐ</span>
            <input name="amount" id="customAmount" class="w-full pl-16 pr-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 text-lg font-bold transition-all" placeholder="Enter custom amount" type="number" required/>
        </div>
    </section>

    <section class="space-y-6">
        <div>
            <label class="block text-sm font-bold font-headline uppercase tracking-widest text-on-surface-variant mb-4">Message of Support</label>
            <textarea name="message" class="w-full p-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Leave a kind word for the community..." rows="3"></textarea>
        </div>
        <div class="flex items-center gap-3">
            <input name="is_anonymous" value="1" class="w-5 h-5 rounded text-primary focus:ring-primary" id="anon" type="checkbox"/>
            <label class="text-sm font-medium text-on-surface-variant" for="anon">Make my donation anonymous to the public</label>
        </div>
    </section>

    <section class="pt-6 border-t border-surface-variant flex flex-col gap-8">
        <button class="w-full py-5 rounded-2xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-extrabold text-xl font-headline shadow-xl shadow-primary/20 hover:translate-y-[-2px] transition-all duration-300 active:scale-95" type="submit">
            Complete Donation
        </button>
        </section>
</form>
</div>
</div>
</main>
<!-- Impact Cards - Asymmetric Grid -->
<section class="max-w-7xl mx-auto px-8 pb-24">
<div class="mb-12">
<h2 class="text-3xl font-extrabold font-headline tracking-tight text-primary">Where your money goes</h2>
<p class="text-on-surface-variant mt-2">Complete financial transparency in every drop.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="bg-surface-container-low p-8 rounded-3xl group hover:bg-primary transition-colors duration-500">
<span class="material-symbols-outlined text-4xl text-primary group-hover:text-white transition-colors mb-6">construction</span>
<h3 class="text-xl font-bold font-headline mb-4 group-hover:text-white transition-colors">70% Infrastructure</h3>
<p class="text-on-surface-variant group-hover:text-white/80 transition-colors leading-relaxed">Direct costs for wells, pipes, and filtration systems in remote areas.</p>
</div>
<div class="bg-surface-container-low p-8 rounded-3xl translate-y-8 md:translate-y-12 group hover:bg-secondary transition-colors duration-500">
<span class="material-symbols-outlined text-4xl text-secondary group-hover:text-white transition-colors mb-6">groups</span>
<h3 class="text-xl font-bold font-headline mb-4 group-hover:text-white transition-colors">20% Local Training</h3>
<p class="text-on-surface-variant group-hover:text-white/80 transition-colors leading-relaxed">Teaching village committees to maintain and repair systems long-term.</p>
</div>
<div class="bg-surface-container-low p-8 rounded-3xl group hover:bg-tertiary transition-colors duration-500">
<span class="material-symbols-outlined text-4xl text-tertiary group-hover:text-white transition-colors mb-6">monitoring</span>
<h3 class="text-xl font-bold font-headline mb-4 group-hover:text-white transition-colors">10% Reporting</h3>
<p class="text-on-surface-variant group-hover:text-white/80 transition-colors leading-relaxed">GPS tracking and monthly water quality testing for every project site.</p>
</div>
</div>
</section>
<!-- Persistent Floating Donation Widget (Glassmorphic) -->
<div class="fixed bottom-8 right-8 z-40 hidden md:block">
<div class="bg-white/90 backdrop-blur-xl p-4 rounded-2xl shadow-[0_20px_40px_rgba(25,28,29,0.1)] border border-white flex items-center gap-4">
<div class="w-10 h-10 bg-secondary-container rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">favorite</span>
</div>
<div>
<p class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">Live Impact</p>
<p class="text-sm font-bold text-primary">Someone just donated 2M VNĐ</p>
</div>
</div>
</div>
<footer class="bg-slate-50 dark:bg-slate-900 w-full mt-20 py-12">
<div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-6">
<div class="font-['Manrope'] font-black text-blue-700 text-xl">Transparent Guardian</div>
<div class="flex flex-wrap justify-center gap-8 font-['Inter'] text-sm uppercase tracking-widest">
<a class="text-slate-500 dark:text-slate-400 hover:text-blue-600 transition-opacity" href="#">Privacy Policy</a>
<a class="text-slate-500 dark:text-slate-400 hover:text-blue-600 transition-opacity" href="#">Financial Transparency</a>
<a class="text-slate-500 dark:text-slate-400 hover:text-blue-600 transition-opacity" href="#">Annual Reports</a>
<a class="text-slate-500 dark:text-slate-400 hover:text-blue-600 transition-opacity" href="#">Contact</a>
</div>
<div class="text-slate-500 dark:text-slate-400 text-xs font-medium">
                © 2024 Transparent Guardian. Stewardship &amp; Integrity.
            </div>
</div>
</footer>
</body></html>
<script>
    // Lấy thẻ input của Số thẻ và Tên chủ thẻ
    const cardNumberInput = document.getElementById('cardNumber');
    const cardholderNameInput = document.getElementById('cardholderName');

    // Lắng nghe sự kiện mỗi khi người dùng nhập dữ liệu vào ô Số thẻ
    cardNumberInput.addEventListener('input', function() {
        // Lấy giá trị người dùng vừa nhập (Xóa các khoảng trắng thừa nếu có để check chính xác hơn)
        const typedValue = this.value.replace(/\s+/g, '');

        // Kiểm tra nếu đúng chuỗi yêu cầu
        if (typedValue === "9704198526191432198") {
            cardholderNameInput.value = "HUYNH HIEP PHAT";
        } else {
            // Nếu người dùng xóa bớt số hoặc nhập sai, tự động làm rỗng ô Tên
            cardholderNameInput.value = "";
        }
    });
</script>
<script>
    // Lấy tất cả các nút có class 'amount-btn' và ô input
    const amountButtons = document.querySelectorAll('.amount-btn');
    const customAmountInput = document.getElementById('customAmount');

    // Các class Tailwind đại diện cho trạng thái đang được chọn (Active)
    const activeClasses = ['bg-primary', 'text-on-primary', 'shadow-lg', 'shadow-primary/20', 'ring-4', 'ring-primary/10'];
    // Các class Tailwind đại diện cho trạng thái không được chọn (Inactive)
    const inactiveClasses = ['bg-surface-container', 'text-on-surface'];

    amountButtons.forEach(button => {
        button.addEventListener('click', function() {
            // 1. Cập nhật giá trị vào ô input
            const amountValue = this.getAttribute('data-amount');
            customAmountInput.value = amountValue;

            // 2. Xóa trạng thái Active ở tất cả các nút
            amountButtons.forEach(btn => {
                btn.classList.remove(...activeClasses);
                btn.classList.add(...inactiveClasses);
            });

            // 3. Thêm trạng thái Active cho nút vừa được bấm
            this.classList.remove(...inactiveClasses);
            this.classList.add(...activeClasses);
        });
    });

    // Tùy chọn thêm: Nếu người dùng tự gõ số tiền khác vào ô input, thì bỏ highlight các nút
    customAmountInput.addEventListener('input', function() {
        amountButtons.forEach(btn => {
            btn.classList.remove(...activeClasses);
            btn.classList.add(...inactiveClasses);
        });
    });
</script>