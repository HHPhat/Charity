<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo
?>
<?php if (isset($_SESSION['message'])): ?>
    <div class="p-4 mb-4 text-sm rounded-lg <?php echo $_SESSION['messageType'] === 'error' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800'; ?>">
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php 
        // Xóa thông báo sau khi đã hiển thị để không bị hiện lại khi F5 trang
        unset($_SESSION['message']); 
        unset($_SESSION['messageType']);
    ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-secondary-fixed": "#321300",
                        "primary-container": "#0d6efd",
                        "on-secondary-fixed-variant": "#743500",
                        "inverse-primary": "#b1c5ff",
                        "background": "#f8f9fa",
                        "inverse-on-surface": "#f0f1f2",
                        "on-tertiary-fixed-variant": "#92001f",
                        "surface-dim": "#d9dadb",
                        "on-tertiary": "#ffffff",
                        "inverse-surface": "#2e3132",
                        "surface-container-lowest": "#ffffff",
                        "outline": "#727785",
                        "surface-tint": "#0057ce",
                        "secondary-fixed": "#ffdbc8",
                        "error": "#ba1a1a",
                        "secondary-container": "#ff8016",
                        "tertiary": "#b91830",
                        "surface-bright": "#f8f9fa",
                        "primary": "#0057cd",
                        "tertiary-container": "#dd3645",
                        "surface-variant": "#e1e3e4",
                        "on-background": "#191c1d",
                        "on-secondary": "#ffffff",
                        "on-error-container": "#93000a",
                        "error-container": "#ffdad6",
                        "on-surface-variant": "#414754",
                        "surface-container-low": "#f3f4f5",
                        "on-secondary-container": "#5f2a00",
                        "on-primary-fixed": "#001946",
                        "on-tertiary-container": "#130001",
                        "primary-fixed-dim": "#b1c5ff",
                        "surface-container-highest": "#e1e3e4",
                        "secondary": "#984700",
                        "surface-container-high": "#e7e8e9",
                        "secondary-fixed-dim": "#ffb68a",
                        "on-primary-container": "#ffffff",
                        "on-error": "#ffffff",
                        "on-primary": "#ffffff",
                        "tertiary-fixed-dim": "#ffb3b2",
                        "on-tertiary-fixed": "#410008",
                        "on-surface": "#191c1d",
                        "on-primary-fixed-variant": "#00419e",
                        "tertiary-fixed": "#ffdad9",
                        "surface-container": "#edeeef",
                        "primary-fixed": "#dae2ff",
                        "surface": "#f8f9fa",
                        "outline-variant": "#c1c6d6"
                    },
                    fontFamily: {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
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
<body class="bg-background font-body text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed overflow-x-hidden">
    <header class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md">
        <div class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto w-full">
            <div class="text-blue-700 font-extrabold text-xl tracking-tighter">
                The Transparent Guardian
            </div>
            <a class="text-on-surface-variant font-label text-sm font-semibold hover:text-blue-600 transition-colors" href="../">
                Back to home
            </a>
        </div>
    </header>

    <main class="min-h-screen flex items-stretch">
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-primary">
            <div class="absolute inset-0 z-0 opacity-60">
                <img alt="Empowerment" class="w-full h-full object-cover" data-alt="Candid high-end editorial photo of a diverse group of children laughing in a sun-drenched outdoor library with soft cinematic lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvrZgRAT2GdaN5qelcbUGaW1G1Pdq7fTUC4SbSbdu3mUewY7bwymO1wXbj_Y4sNn227wF6ILtT2n9l-_l6x_7xgG3j-UKbHi80vdNJF3qByact0O0rwWzQuQvkBt0ZnO99Gv__IVbIyNznCkXNUJtiH_zGIZwab9fZXIAoutb_oXOU1io3QBT6wRu4FdAx2nniwwSWXm9TfTFMqMWTvRhdm2gBaP5Txn1xgbsQw21yVNRH0U3XLopv2wwYOUQVFQ0eAQoJbqWXTbn2"/>
            </div>
            <div class="relative z-10 m-12 mt-32 p-12 bg-surface/10 backdrop-blur-md rounded-3xl border border-white/10 flex flex-col justify-end">
                <span class="material-symbols-outlined text-secondary-fixed mb-6 text-5xl" style="font-variation-settings: 'FILL' 1;">format_quote</span>
                <h2 class="font-headline text-4xl md:text-5xl font-extrabold text-white leading-tight mb-8">
                    "Transparency is the <span class="text-secondary-fixed">bridge</span> between compassion and impact."
                </h2>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-1 bg-secondary-fixed rounded-full"></div>
                    <p class="font-label text-white/80 uppercase tracking-widest text-xs font-bold">Guardian Collective</p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 md:p-12 lg:p-24 bg-surface pt-24 lg:pt-0">
            <div class="w-full max-w-md">
                <div class="lg:hidden mb-12 text-center">
                    <h1 class="text-blue-700 font-extrabold text-2xl tracking-tighter">The Transparent Guardian</h1>
                </div>

                <div class="mb-10">
                    <h3 class="font-headline text-3xl font-bold text-on-surface mb-2">Welcome Back</h3>
                    <p class="text-on-surface-variant">Continue your journey of stewardship and care.</p>
                </div>

                <?php if (!empty($error_message)): ?>
                    <div class="mb-6 p-4 rounded-xl bg-error-container border border-error text-on-error-container text-sm font-semibold">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <form action="../modules/auth/login.php" method="POST" class="space-y-6">
                    <div class="space-y-2">
                        <label class="block font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant px-1" for="email">Tên tài khoản / Email</label>
                        <input class="w-full px-5 py-4 rounded-xl bg-surface-container-highest border-none focus:ring-2 focus:ring-primary/20 focus:bg-white transition-all duration-300 outline-none placeholder:text-outline/50" id="email" name="email" placeholder="Nhập tài khoản (vd: admin_01)" type="text" required />
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between items-end px-1">
                            <label class="block font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant" for="password">Password</label>
                            <a class="text-xs font-semibold text-primary hover:text-primary-container transition-colors" href="forgot.php">Forgot Password?</a>
                        </div>
                        <div class="relative">
                            <input class="w-full px-5 py-4 rounded-xl bg-surface-container-highest border-none focus:ring-2 focus:ring-primary/20 focus:bg-white transition-all duration-300 outline-none placeholder:text-outline/50" id="password" name="password" placeholder="••••••••" type="password" required />
                            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline-variant hover:text-on-surface-variant" type="button">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3 px-1">
                        <input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/20 transition-all cursor-pointer" id="keep_logged_in" name="keep_logged_in" type="checkbox"/>
                        <label class="text-sm text-on-surface-variant cursor-pointer select-none" for="keep_logged_in">Keep me logged in for 30 days</label>
                    </div>

                    <button class="w-full py-4 bg-primary text-on-primary rounded-xl font-headline font-bold text-lg editorial-shadow hover:bg-primary-container active:scale-[0.98] transition-all duration-300 flex justify-center items-center gap-2" type="submit">
                        Sign In
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </form>

                <div class="mt-10 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-surface-variant"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase tracking-widest font-bold text-outline-variant">
                        <span class="bg-surface px-4">Or continue with</span>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl bg-surface-container-lowest border border-surface-variant/30 hover:bg-white hover:border-primary/20 transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" viewbox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"></path>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
                        </svg>
                        <span class="font-label text-sm font-semibold text-on-surface-variant">Google</span>
                    </button>
                    <button class="flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl bg-surface-container-lowest border border-surface-variant/30 hover:bg-white hover:border-primary/20 transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="#1877F2" viewbox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                        </svg>
                        <span class="font-label text-sm font-semibold text-on-surface-variant">Facebook</span>
                    </button>
                </div>

                <div class="mt-12 text-center">
                    <p class="text-on-surface-variant text-sm">
                        New to the guardian ecosystem? 
                        <a class="font-bold text-secondary hover:underline ml-1" href="register.php">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <div class="fixed bottom-8 right-8 z-40 hidden md:block">
        <div class="bg-surface-container-lowest/90 backdrop-blur-xl editorial-shadow rounded-2xl p-4 flex items-center gap-4 border border-white/50">
            <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center">
                <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
            </div>
            <div>
                <p class="font-label text-[10px] uppercase tracking-widest font-extrabold text-secondary">Quick Impact</p>
                <p class="font-headline text-sm font-bold text-on-surface">Every contribution counts.</p>
            </div>
            <button class="bg-secondary px-4 py-2 rounded-lg text-white font-label text-xs font-bold uppercase tracking-tight hover:opacity-80 transition-all">
                Donate
            </button>
        </div>
    </div>
</body>
</html>