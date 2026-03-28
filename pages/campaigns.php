<?php
    if (!defined('_HIENU')){
        die('Truy cập không hợp lệ');
    }
    session_start(); // Bắt buộc phải có ở đầu file để dùng Session hiển thị thông báo
?>
<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Active Campaigns | Transparent Guardian</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
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
            borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm dark:shadow-none">
<div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
<div class="flex items-center gap-8">
<span class="text-2xl font-extrabold tracking-tighter text-blue-700 dark:text-blue-400">Transparent Guardian</span>
<div class="hidden md:flex items-center gap-6">
<a class="font-manrope font-bold text-sm tracking-tight text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="#">Home</a>
<a class="font-manrope font-bold text-sm tracking-tight text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400 pb-1 hover:opacity-80 transition-opacity duration-400 ease-out" href="#">Campaigns</a>
<a class="font-manrope font-bold text-sm tracking-tight text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="#">My Joined Campaigns</a>
<a class="font-manrope font-bold text-sm tracking-tight text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-300 hover:opacity-80 transition-opacity duration-400 ease-out" href="#">My Account</a>
</div>
</div>
<div class="flex items-center gap-4">
<button class="text-slate-600 dark:text-slate-400 hover:text-blue-600 font-manrope font-bold text-sm tracking-tight scale-95 active:scale-90 transition-transform">Login</button>
<button class="bg-primary text-on-primary px-6 py-2 rounded-xl font-manrope font-bold text-sm tracking-tight scale-95 active:scale-90 transition-transform shadow-[0_2px_0_0_rgba(0,65,158,1)]">Sign Up</button>
</div>
</div>
</nav>
<main class="pt-28 pb-20 px-6 max-w-7xl mx-auto">
<!-- Header & Search Section -->
<header class="mb-16">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
<div class="max-w-2xl">
<h1 class="text-5xl font-extrabold tracking-tight text-on-surface mb-4 leading-tight">
                        Active <span class="text-primary">Stewardship</span> Campaigns
                    </h1>
<p class="text-lg text-on-surface-variant leading-relaxed">
                        Discover transparent initiatives across the globe. Every donation is tracked with institutional integrity and heartfelt purpose.
                    </p>
</div>
<!-- Search Component -->
<div class="w-full md:w-96">
<div class="relative group">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full pl-12 pr-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 transition-all text-on-surface placeholder:text-outline" placeholder="Search campaigns..." type="text"/>
</div>
</div>
</div>
</header>
<!-- Category Filters (Bento-style chips) -->
<section class="mb-12">
<div class="flex flex-wrap gap-3">
<button class="px-6 py-2.5 rounded-full bg-primary text-on-primary text-sm font-semibold tracking-wide shadow-md">All Initiatives</button>
<button class="px-6 py-2.5 rounded-full bg-secondary-fixed text-on-secondary-fixed text-sm font-semibold tracking-wide hover:bg-secondary-fixed-dim transition-colors">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm">child_care</span> Children
                    </span>
</button>
<button class="px-6 py-2.5 rounded-full bg-surface-container-low text-on-surface-variant text-sm font-semibold tracking-wide hover:bg-surface-container-high transition-colors">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm">eco</span> Environment
                    </span>
</button>
<button class="px-6 py-2.5 rounded-full bg-surface-container-low text-on-surface-variant text-sm font-semibold tracking-wide hover:bg-surface-container-high transition-colors">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm">medical_services</span> Healthcare
                    </span>
</button>
<button class="px-6 py-2.5 rounded-full bg-surface-container-low text-on-surface-variant text-sm font-semibold tracking-wide hover:bg-surface-container-high transition-colors">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm">school</span> Education
                    </span>
</button>
<button class="px-6 py-2.5 rounded-full bg-surface-container-low text-on-surface-variant text-sm font-semibold tracking-wide hover:bg-surface-container-high transition-colors">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm">emergency_share</span> Emergency Relief
                    </span>
</button>
</div>
</section>
<!-- Campaigns Grid -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
<!-- Card 1 -->
<div class="group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden editorial-shadow hover:-translate-y-1 transition-transform duration-400">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="Candid portrait of smiling school children in a brightly lit rural classroom in East Africa with soft natural light" 
src="/Charity/Management/templates/assets/image/004.jpg"/>
<div class="absolute top-4 left-4">
<span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">Children</span>
</div>
</div>
<div class="p-8 flex flex-col flex-grow">
<h3 class="text-2xl font-bold text-on-surface mb-3 group-hover:text-primary transition-colors">Building Tomorrow: Rural Schools Initiative</h3>
<p class="text-on-surface-variant text-sm leading-relaxed mb-6 flex-grow">Providing clean water, digital tablets, and certified teachers for 15 remote villages in the Rift Valley.</p>
<div class="mb-6">
<div class="flex justify-between items-end mb-2">
<span class="text-primary font-extrabold text-lg">$42,500 <span class="text-xs font-normal text-outline">raised</span></span>
<span class="text-on-surface-variant font-bold text-sm">85%</span>
</div>
<div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full w-[85%]"></div>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-auto border-t border-surface-container">
<span class="text-xs font-semibold text-outline tracking-wider uppercase">12 Days Left</span>
<button class="flex items-center gap-2 text-primary font-bold text-sm hover:gap-3 transition-all">
                            View Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Card 2 (Emergency - Tertiary emphasis) -->
<div class="group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden editorial-shadow hover:-translate-y-1 transition-transform duration-400">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="Aerial view of clean water distribution center during an emergency relief effort with white tents and organized logistics"
src="/Charity/Management/templates/assets/image/005.jpg"/>
<div class="absolute top-4 left-4">
<span class="bg-tertiary-container text-on-tertiary-container px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">Emergency</span>
</div>
</div>
<div class="p-8 flex flex-col flex-grow border-l-4 border-tertiary">
<h3 class="text-2xl font-bold text-on-surface mb-3 group-hover:text-tertiary transition-colors">Flood Relief: Urban Crisis Response</h3>
<p class="text-on-surface-variant text-sm leading-relaxed mb-6 flex-grow">Emergency medical supplies and temporary housing for families displaced by recent coastal storms.</p>
<div class="mb-6">
<div class="flex justify-between items-end mb-2">
<span class="text-tertiary font-extrabold text-lg">$128,900 <span class="text-xs font-normal text-outline">raised</span></span>
<span class="text-on-surface-variant font-bold text-sm">64%</span>
</div>
<div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-tertiary rounded-full w-[64%]"></div>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-auto border-t border-surface-container">
<span class="text-xs font-semibold text-tertiary tracking-wider uppercase">Urgent Action</span>
<button class="flex items-center gap-2 text-primary font-bold text-sm hover:gap-3 transition-all">
                            View Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden editorial-shadow hover:-translate-y-1 transition-transform duration-400">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="Lush green reforestation project with young saplings planted in rows against a majestic mountain backdrop under morning fog" 
src="/Charity/Management/templates/assets/image/006.jpg"/>
<div class="absolute top-4 left-4">
<span class="bg-surface-container text-on-surface-variant px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">Environment</span>
</div>
</div>
<div class="p-8 flex flex-col flex-grow">
<h3 class="text-2xl font-bold text-on-surface mb-3 group-hover:text-primary transition-colors">Ocean Guardian: Coral Reef Restoration</h3>
<p class="text-on-surface-variant text-sm leading-relaxed mb-6 flex-grow">Deploying bio-engineered habitats to restore endangered marine ecosystems across the South Pacific.</p>
<div class="mb-6">
<div class="flex justify-between items-end mb-2">
<span class="text-primary font-extrabold text-lg">$15,200 <span class="text-xs font-normal text-outline">raised</span></span>
<span class="text-on-surface-variant font-bold text-sm">30%</span>
</div>
<div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full w-[30%]"></div>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-auto border-t border-surface-container">
<span class="text-xs font-semibold text-outline tracking-wider uppercase">45 Days Left</span>
<button class="flex items-center gap-2 text-primary font-bold text-sm hover:gap-3 transition-all">
                            View Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Card 4 -->
<div class="group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden editorial-shadow hover:-translate-y-1 transition-transform duration-400">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="Professional medical staff in scrubs performing a diagnostic check with high-tech equipment in a clean modern clinic" 
src="/Charity/Management/templates/assets/image/007.jpg"/>
<div class="absolute top-4 left-4">
<span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">Healthcare</span>
</div>
</div>
<div class="p-8 flex flex-col flex-grow">
<h3 class="text-2xl font-bold text-on-surface mb-3 group-hover:text-primary transition-colors">Heart Watch: Mobile Screening Units</h3>
<p class="text-on-surface-variant text-sm leading-relaxed mb-6 flex-grow">Equipping mobile vans with cardiology equipment to provide free screenings in underserved urban areas.</p>
<div class="mb-6">
<div class="flex justify-between items-end mb-2">
<span class="text-primary font-extrabold text-lg">$55,000 <span class="text-xs font-normal text-outline">raised</span></span>
<span class="text-on-surface-variant font-bold text-sm">92%</span>
</div>
<div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full w-[92%]"></div>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-auto border-t border-surface-container">
<span class="text-xs font-semibold text-outline tracking-wider uppercase">2 Days Left</span>
<button class="flex items-center gap-2 text-primary font-bold text-sm hover:gap-3 transition-all">
                            View Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Card 5 -->
<div class="group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden editorial-shadow hover:-translate-y-1 transition-transform duration-400">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="Creative student workspace with colorful art supplies, books, and natural light streaming through large library windows" 
src="/Charity/Management/templates/assets/image/008.jpg"/>
<div class="absolute top-4 left-4">
<span class="bg-surface-container text-on-surface-variant px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">Education</span>
</div>
</div>
<div class="p-8 flex flex-col flex-grow">
<h3 class="text-2xl font-bold text-on-surface mb-3 group-hover:text-primary transition-colors">Project Literacy: Community Libraries</h3>
<p class="text-on-surface-variant text-sm leading-relaxed mb-6 flex-grow">Transforming vacant spaces into vibrant community reading rooms with curated book collections.</p>
<div class="mb-6">
<div class="flex justify-between items-end mb-2">
<span class="text-primary font-extrabold text-lg">$11,000 <span class="text-xs font-normal text-outline">raised</span></span>
<span class="text-on-surface-variant font-bold text-sm">50%</span>
</div>
<div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full w-[50%]"></div>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-auto border-t border-surface-container">
<span class="text-xs font-semibold text-outline tracking-wider uppercase">20 Days Left</span>
<button class="flex items-center gap-2 text-primary font-bold text-sm hover:gap-3 transition-all">
                            View Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Card 6 -->
<div class="group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden editorial-shadow hover:-translate-y-1 transition-transform duration-400">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="Modern high-efficiency solar panels installed on a community center roof against a clear blue sky" 
src="/Charity/Management/templates/assets/image/009.jpg"/>
<div class="absolute top-4 left-4">
<span class="bg-surface-container text-on-surface-variant px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">Environment</span>
</div>
</div>
<div class="p-8 flex flex-col flex-grow">
<h3 class="text-2xl font-bold text-on-surface mb-3 group-hover:text-primary transition-colors">Solar Power for Shelters</h3>
<p class="text-on-surface-variant text-sm leading-relaxed mb-6 flex-grow">Reducing operating costs for women's shelters by installing sustainable solar energy systems.</p>
<div class="mb-6">
<div class="flex justify-between items-end mb-2">
<span class="text-primary font-extrabold text-lg">$28,000 <span class="text-xs font-normal text-outline">raised</span></span>
<span class="text-on-surface-variant font-bold text-sm">70%</span>
</div>
<div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full w-[70%]"></div>
</div>
</div>
<div class="flex items-center justify-between pt-4 mt-auto border-t border-surface-container">
<span class="text-xs font-semibold text-outline tracking-wider uppercase">8 Days Left</span>
<button class="flex items-center gap-2 text-primary font-bold text-sm hover:gap-3 transition-all">
                            View Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
</section>
<!-- Pagination -->
<nav class="mt-20 flex justify-center items-center gap-2">
<button class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface transition-colors">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-on-primary font-bold">1</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface transition-colors font-medium">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface transition-colors font-medium">3</button>
<span class="mx-2 text-outline">...</span>
<button class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface transition-colors font-medium">12</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</nav>
</main>
<!-- Floating Donation Widget -->
<div class="fixed bottom-8 right-8 z-40">
<div class="bg-surface-container-lowest/90 backdrop-blur-xl editorial-shadow rounded-2xl p-6 border border-outline-variant/20 max-w-xs">
<h4 class="font-headline font-extrabold text-lg text-on-surface mb-2">Instant Impact</h4>
<p class="text-xs text-on-surface-variant mb-4">Support our global emergency fund for immediate deployment.</p>
<div class="flex gap-2 mb-4">
<button class="flex-1 py-2 bg-surface-container-high rounded-lg text-sm font-bold hover:bg-primary hover:text-on-primary transition-all">$10</button>
<button class="flex-1 py-2 bg-surface-container-high rounded-lg text-sm font-bold hover:bg-primary hover:text-on-primary transition-all">$25</button>
<button class="flex-1 py-2 bg-surface-container-high rounded-lg text-sm font-bold hover:bg-primary hover:text-on-primary transition-all">$50</button>
</div>
<button class="w-full bg-secondary text-on-secondary py-3 rounded-xl font-bold tracking-tight shadow-[0_2px_0_0_rgba(116,53,0,1)] active:translate-y-[1px] active:shadow-none transition-all">Donate Now</button>
</div>
</div>
<!-- Footer -->
<footer class="w-full border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 mt-20">
<div class="flex flex-col md:flex-row justify-between items-center px-8 py-12 w-full max-w-7xl mx-auto">
<div class="mb-8 md:mb-0">
<span class="text-xl font-bold text-slate-900 dark:text-white">Transparent Guardian</span>
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
</body></html>