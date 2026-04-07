<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo
?>
<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Công cụ theo dõi tác động</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
<body class="bg-surface font-body text-on-surface">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm dark:shadow-none">
<div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
<div class="text-2xl font-extrabold tracking-tighter text-blue-700 dark:text-blue-400 font-headline">
                Transparent Guardian
            </div>
<div class="hidden md:flex space-x-8">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope font-bold text-sm tracking-tight transition-opacity duration-400 ease-out" href="#">Home</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope font-bold text-sm tracking-tight transition-opacity duration-400 ease-out" href="#">Campaigns</a>
<a class="text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400 pb-1 font-manrope font-bold text-sm tracking-tight" href="#">My Joined Campaigns</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 font-manrope font-bold text-sm tracking-tight transition-opacity duration-400 ease-out" href="#">My Account</a>
</div>
<div class="flex items-center space-x-4">
<button class="text-slate-600 dark:text-slate-400 font-manrope font-bold text-sm tracking-tight hover:opacity-80 transition-opacity duration-400 ease-out">Login</button>
<button class="bg-primary text-on-primary px-5 py-2 rounded-xl font-manrope font-bold text-sm tracking-tight hover:opacity-90 scale-95 active:scale-90 transition-all">Sign Up</button>
</div>
</div>
</nav>
<main class="pt-24 pb-20 max-w-7xl mx-auto px-6">
<!-- Hero Section: Editorial Header -->
<header class="mb-16 md:flex items-end justify-between">
<div class="md:w-2/3">
<div class="inline-block bg-secondary-fixed text-on-secondary-fixed px-3 py-1 rounded-full text-xs font-bold mb-4">Live Tracking</div>
<h1 class="text-5xl md:text-7xl font-headline font-extrabold tracking-tighter leading-none mb-6">
                    Where Your <span class="text-primary">Impact</span> Flows.
                </h1>
<p class="text-xl text-on-surface-variant max-w-xl leading-relaxed">
                    Every cent you donate follows a path of radical transparency. Trace the journey from your contribution to the hands of those in need.
                </p>
</div>
<div class="hidden md:block pb-2">
<div class="bg-surface-container-low p-6 rounded-xl border-l-4 border-primary">
<span class="block text-xs uppercase tracking-widest font-bold text-outline mb-1">Total Contribution</span>
<span class="text-3xl font-headline font-extrabold text-primary">$1,240.00</span>
</div>
</div>
</header>
<!-- Bento Grid: Financial Breakdown & Impact Map -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-20">
<!-- Cost Breakdown Card -->
<div class="lg:col-span-5 bg-surface-container-lowest rounded-xl p-8 editorial-shadow">
<h3 class="text-2xl font-headline font-bold mb-8">Financial Breakdown</h3>
<div class="space-y-8">
<div>
<div class="flex justify-between items-end mb-2">
<span class="font-bold text-on-surface">Supplies &amp; Resources</span>
<span class="text-primary font-bold">80%</span>
</div>
<div class="h-3 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full" style="width: 80%"></div>
</div>
<p class="text-sm text-on-surface-variant mt-2 italic">Direct purchase of food, medical kits, and textbooks.</p>
</div>
<div>
<div class="flex justify-between items-end mb-2">
<span class="font-bold text-on-surface">Logistics &amp; Delivery</span>
<span class="text-secondary font-bold">10%</span>
</div>
<div class="h-3 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-secondary rounded-full" style="width: 10%"></div>
</div>
<p class="text-sm text-on-surface-variant mt-2 italic">Transportation, warehousing, and field distribution.</p>
</div>
<div>
<div class="flex justify-between items-end mb-2">
<span class="font-bold text-on-surface">Administration</span>
<span class="text-outline font-bold">10%</span>
</div>
<div class="h-3 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-outline rounded-full" style="width: 10%"></div>
</div>
<p class="text-sm text-on-surface-variant mt-2 italic">Core team operations and secure platform maintenance.</p>
</div>
</div>
<div class="mt-12 pt-8 border-t border-surface-variant">
<div class="flex items-center space-x-4">
<div class="bg-primary-fixed p-3 rounded-full">
<span class="material-symbols-outlined text-primary">verified</span>
</div>
<div>
<p class="font-bold text-sm">Audited by ImpactWatch</p>
<p class="text-xs text-on-surface-variant">Last verified: 2 days ago</p>
</div>
</div>
</div>
</div>
<!-- Visual Flowchart / Impact Map -->
<div class="lg:col-span-7 bg-surface-container-low rounded-xl overflow-hidden relative min-h-[500px] flex flex-col p-8">
<div class="relative z-10">
<h3 class="text-2xl font-headline font-bold mb-2">The Journey of Your $1,240</h3>
<p class="text-on-surface-variant text-sm mb-8">Nairobi Clean Water Project • Campaign ID: #7721</p>
</div>
<div class="flex-grow flex items-center justify-center relative">
<!-- Flowchart SVG Overlay -->
<svg class="absolute inset-0 w-full h-full pointer-events-none" fill="none" viewbox="0 0 800 400" xmlns="http://www.w3.org/2000/svg">
<path d="M100 200 C 250 200, 250 100, 400 100" stroke="#0057cd" stroke-dasharray="8 4" stroke-width="2"></path>
<path d="M100 200 C 250 200, 250 300, 400 300" stroke="#984700" stroke-dasharray="8 4" stroke-width="2"></path>
<path d="M400 100 L 650 200" stroke="#0057cd" stroke-dasharray="8 4" stroke-width="2"></path>
<path d="M400 300 L 650 200" stroke="#984700" stroke-dasharray="8 4" stroke-width="2"></path>
</svg>
<!-- Flow Nodes -->
<div class="absolute left-4 top-1/2 -translate-y-1/2 flex flex-col items-center">
<div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center editorial-shadow mb-2 border-4 border-white">
<span class="material-symbols-outlined text-white text-3xl">volunteer_activism</span>
</div>
<span class="text-xs font-bold uppercase tracking-tighter">Your Gift</span>
</div>
<div class="absolute top-[15%] left-[45%] -translate-x-1/2 flex flex-col items-center">
<div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center shadow-sm mb-2 border border-surface-variant">
<span class="material-symbols-outlined text-primary">shopping_cart</span>
</div>
<span class="text-xs font-bold uppercase tracking-tighter">Supplies Purchased</span>
</div>
<div class="absolute bottom-[15%] left-[45%] -translate-x-1/2 flex flex-col items-center">
<div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center shadow-sm mb-2 border border-surface-variant">
<span class="material-symbols-outlined text-secondary">local_shipping</span>
</div>
<span class="text-xs font-bold uppercase tracking-tighter">Logistics Center</span>
</div>
<div class="absolute right-4 top-1/2 -translate-y-1/2 flex flex-col items-center">
<div class="w-20 h-20 bg-secondary-container rounded-full flex items-center justify-center editorial-shadow mb-2 border-4 border-white">
<span class="material-symbols-outlined text-on-secondary-container text-4xl">child_care</span>
</div>
<span class="text-xs font-bold uppercase tracking-tighter text-on-secondary-container">Community Impact</span>
</div>
</div>
<div class="mt-auto bg-white/40 backdrop-blur-md p-4 rounded-lg flex items-center justify-between">
<div class="flex -space-x-2">
<img class="w-8 h-8 rounded-full border-2 border-white object-cover" data-alt="portrait of a smiling girl from an east african community with bright eyes and natural lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkSjk3lUw5GlGIyM9CFz-7mRyWLcD5KDfWNEWM4Bu832Tteux9o2IAWHdGTOh990IdsS3uym1T8dL4aX59VwyQzMj9Ey72FRGKTOuv_aUuAOt-7ApyMmZj9D6R0EKCeBIcd2aoXyP-6kH7dg1uSPRpk5haC9iA95ciamxbY5699pFtD-vztMABSuguGKucIdU9AzhHUbZjqmM1-a52kQX_dMpLl6Pm6p_Y_-ELA23oVZE3R3zvIM4Muiblqs_FXQBl_w3V7ZTiDN1v"/>
<img class="w-8 h-8 rounded-full border-2 border-white object-cover" data-alt="portrait of an elderly man with kind expression in a rural outdoor setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-Kl0LC_5WveeRdhrxgq3JeDXsO5Z2I-wlNV7PPdfO5riWlemZOdbAWMhHEbg2Ms2mfooolelAHkbNItosumwIjXOwg4veZYEESvkFCebWzn65t4bfSQZRKisSk5B16V1tz-GSXMb7O8jrqyUznV5UFBUfdAKsVKAGLsSdgTC-a1FRzL_7VIBO9ciyHLn9fYbDpE-G2jjhvRNEM8mKd_DzysW7H620FdmUQ2h7BoHrfWAKoxvcPfuelRTsSMLrB24fHWHWvhGKYwC1"/>
<div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 flex items-center justify-center text-[10px] font-bold">+14</div>
</div>
<span class="text-sm font-medium">16 households reached in Nairobi</span>
</div>
</div>
</div>
<!-- Progress Timeline Section -->
<section class="mb-20">
<h2 class="text-3xl font-headline font-extrabold mb-12 flex items-center">
                Real-Time Updates
                <span class="ml-4 h-2 w-2 rounded-full bg-error animate-pulse"></span>
</h2>
<div class="relative">
<!-- Vertical Line -->
<div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-surface-variant -translate-x-1/2"></div>
<div class="space-y-16">
<!-- Update 1 -->
<div class="relative flex flex-col md:flex-row items-start md:items-center">
<div class="md:w-1/2 md:pr-12 md:text-right order-2 md:order-1 mt-4 md:mt-0">
<div class="bg-surface-container-lowest p-6 rounded-xl editorial-shadow inline-block text-left w-full md:w-auto md:max-w-md">
<span class="text-xs font-bold text-primary mb-2 block">OCT 24, 2024</span>
<h4 class="font-bold text-lg mb-2">Goods delivered to Kibera Community Center</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">The final batch of water purification tablets and storage tanks have been successfully installed and verified by our local field agents.</p>
<div class="mt-4 flex space-x-2 overflow-x-auto pb-2">
<img class="w-24 h-24 rounded-lg object-cover" data-alt="group of volunteers in blue vests distributing boxes of supplies in a bustling community marketplace" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBO2FZwrbHNVCr9HrKICvCIN9sxXq0OY6VJ-tCcYsLjfwJpHXGpvglyK9MxD_mVrjm_mduLnuyMeFZIWWZ5OvUySzuEclOrKhga6UoOvIaPHKZScX0JYBsm5bCbTLvi9_Owl6RL0XtoKUUcIfgT7gcWk8L_kNHglOqMJGir3NzyMU_3wDQNyBwC_0ZeKnMzIk-uwj2WdodbAUnBko0Z4p8ahwWJZWMxoNZQDGOYOSIPVpyJykcP22HY7BbRUOdU9Ti1EL4lQSEAnI6D"/>
<img class="w-24 h-24 rounded-lg object-cover" data-alt="closeup of clean water flowing from a newly installed blue faucet into a steel cup" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAqEk9TyQuAMAkBiWTx8xD1TGV95-7PK5nquvC1_48wJdzqhOmQrTCm7cIgPYFH6KHOnDdytbK60fdmc4D0y9gWb6FIfShLo_lu7qqjow6wilRPTgvx3QPINTIy93-yZdp1To5MeYD0BrMgW0lqMMSHjXzdINxW8Ih4bdZg9zVBhWK0LBuY05O-VLQDOOREd2FoMWmONB4AZEeSBzxWjweEYj7EYxh4negatOjzmm02wnSi9xsWZfOnJwMyBxHgjVCRnEUfAE9jVMnM"/>
</div>
</div>
</div>
<div class="absolute left-4 md:left-1/2 -translate-x-1/2 z-10">
<div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center ring-4 ring-white">
<span class="material-symbols-outlined text-white text-sm">done</span>
</div>
</div>
<div class="md:w-1/2 md:pl-12 order-3">
<span class="hidden md:inline-block text-sm font-bold text-outline">Status: Completed</span>
</div>
</div>
<!-- Update 2 -->
<div class="relative flex flex-col md:flex-row items-start md:items-center">
<div class="md:w-1/2 md:pr-12 md:text-right order-2 md:order-1 mt-4 md:mt-0">
<span class="hidden md:inline-block text-sm font-bold text-outline">Status: In Transit</span>
</div>
<div class="absolute left-4 md:left-1/2 -translate-x-1/2 z-10">
<div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center ring-4 ring-white">
<span class="material-symbols-outlined text-white text-sm">local_shipping</span>
</div>
</div>
<div class="md:w-1/2 md:pl-12 order-3">
<div class="bg-surface-container-lowest p-6 rounded-xl editorial-shadow inline-block text-left w-full md:w-auto md:max-w-md">
<span class="text-xs font-bold text-secondary mb-2 block">OCT 20, 2024</span>
<h4 class="font-bold text-lg mb-2">Shipment Cleared Customs</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">Medical supplies and hygiene kits have passed secondary inspection at Mombasa Port and are currently being loaded onto field trucks.</p>
</div>
</div>
</div>
<!-- Update 3 -->
<div class="relative flex flex-col md:flex-row items-start md:items-center opacity-60">
<div class="md:w-1/2 md:pr-12 md:text-right order-2 md:order-1 mt-4 md:mt-0">
<div class="bg-surface-container-lowest p-6 rounded-xl editorial-shadow inline-block text-left w-full md:w-auto md:max-w-md">
<span class="text-xs font-bold text-outline mb-2 block">OCT 15, 2024</span>
<h4 class="font-bold text-lg mb-2">Funding Goal Reached</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">Campaign #7721 successfully raised $45,000. Procurement of supplies has officially begun with regional suppliers.</p>
</div>
</div>
<div class="absolute left-4 md:left-1/2 -translate-x-1/2 z-10">
<div class="w-8 h-8 bg-outline rounded-full flex items-center justify-center ring-4 ring-white">
<span class="material-symbols-outlined text-white text-sm">payments</span>
</div>
</div>
<div class="md:w-1/2 md:pl-12 order-3">
<span class="hidden md:inline-block text-sm font-bold text-outline">Status: Archive</span>
</div>
</div>
</div>
</div>
</section>
<!-- Final CTA/Transparency Note -->
<section class="bg-primary-container text-on-primary-container rounded-xl p-10 md:flex items-center justify-between">
<div class="md:w-2/3 mb-8 md:mb-0">
<h3 class="text-3xl font-headline font-bold mb-4">Want a deeper look?</h3>
<p class="opacity-90 leading-relaxed">Download the full, unedited ledger for this campaign including every receipt, logistics bill, and verified field report.</p>
</div>
<button class="bg-white text-primary px-8 py-4 rounded-xl font-bold flex items-center space-x-2 hover:scale-105 transition-transform">
<span class="material-symbols-outlined">download</span>
<span>Impact Report (PDF)</span>
</button>
</section>
</main>
<!-- Footer -->
<footer class="w-full border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950">
<div class="flex flex-col md:flex-row justify-between items-center px-8 py-12 w-full max-w-7xl mx-auto">
<div class="mb-8 md:mb-0">
<span class="text-xl font-bold text-slate-900 dark:text-white font-headline">Transparent Guardian</span>
<p class="mt-2 font-inter text-sm text-slate-500 dark:text-slate-400">© 2024 The Transparent Guardian. All rights reserved.</p>
</div>
<div class="flex flex-wrap justify-center gap-8">
<a class="font-inter text-sm text-slate-500 hover:text-blue-500 transition-all hover:underline" href="#">About Us</a>
<a class="font-inter text-sm text-slate-500 hover:text-blue-500 transition-all hover:underline" href="#">Impact Reports</a>
<a class="font-inter text-sm text-slate-500 hover:text-blue-500 transition-all hover:underline" href="#">Contact</a>
<a class="font-inter text-sm text-slate-500 hover:text-blue-500 transition-all hover:underline" href="#">Privacy Policy</a>
</div>
</div>
</footer>
<!-- Floating Donation Widget -->
<div class="fixed bottom-6 right-6 z-50">
<div class="bg-surface-container-lowest/90 backdrop-blur-md p-4 rounded-2xl shadow-2xl border border-white/50 flex flex-col items-center max-w-[140px]">
<span class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-2">Help More</span>
<button class="w-14 h-14 bg-secondary text-white rounded-full flex items-center justify-center hover:scale-110 active:scale-95 transition-all shadow-lg shadow-secondary/20">
<span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">favorite</span>
</button>
<span class="text-xs font-bold mt-2 text-on-surface">Donate Now</span>
</div>
</div>
</body></html>