<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Forgot Password - The Transparent Guardian</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@700;800&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
            borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .headline-font { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface flex flex-col min-h-screen">
<!-- TopAppBar Replacement (Logo Only for Transactional) -->
<header class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md">
<div class="flex justify-between items-center px-6 py-6 max-w-7xl mx-auto w-full">
<div class="text-blue-700 font-extrabold text-xl tracking-tighter headline-font">
                The Transparent Guardian
            </div>
<a class="text-on-surface-variant hover:text-primary transition-colors text-sm font-semibold tracking-wide flex items-center gap-2 group" href="#">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
                Back to Login
            </a>
</div>
</header>
<!-- Main Content Canvas -->
<main class="flex-grow flex items-center justify-center px-6 pt-24 pb-12">
<div class="w-full max-w-md">
<!-- Asymmetric Layout Container -->
<div class="relative">
<!-- Decorative Subtle Background Element -->
<div class="absolute -top-12 -left-12 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10"></div>
<div class="absolute -bottom-12 -right-12 w-48 h-48 bg-secondary/5 rounded-full blur-2xl -z-10"></div>
<!-- Editorial Header -->
<div class="mb-10">
<div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary-fixed mb-6 text-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'wght' 600;">lock_reset</span>
</div>
<h1 class="headline-font font-extrabold text-4xl tracking-tight text-on-surface mb-4">
                        Secure Account <br/><span class="text-primary">Recovery</span>
</h1>
<p class="text-on-surface-variant leading-relaxed font-body text-lg">
                        Enter your registered email address below. We will send a secure link to reset your credentials.
                    </p>
</div>
<!-- Recovery Form Card -->
<div class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_20px_40px_rgba(25,28,29,0.04)]">
<form action="#" class="space-y-6" method="POST">
<!-- Email Input Field -->
<div>
<label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2 ml-1" for="email">
                                Email Address
                            </label>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-outline">
<span class="material-symbols-outlined text-[20px]">mail</span>
</div>
<input class="w-full pl-11 pr-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 transition-all duration-400 font-body text-on-surface placeholder:text-outline/60" id="email" name="email" placeholder="name@guardian.org" required="" type="email"/>
</div>
</div>
<!-- Action Button -->
<button class="w-full bg-primary hover:bg-primary-container text-on-primary font-bold py-4 rounded-xl shadow-[0_4px_0_#00419e] active:translate-y-1 active:shadow-none transition-all duration-200 flex items-center justify-center gap-2 group" type="submit">
<span>Send Reset Link</span>
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
</button>
</form>
</div>
<!-- Footer/Support Info -->
<div class="mt-12 text-center">
<p class="text-on-surface-variant text-sm font-body">
                        Having trouble? <a class="text-primary font-semibold hover:underline" href="#">Contact stewardship support</a>
</p>
</div>
<!-- Emotional Narrative Section (Asymmetric) -->
<div class="mt-20 flex flex-col md:flex-row items-center gap-8 border-t border-surface-variant/30 pt-12">
<div class="w-full md:w-1/3">
<div class="aspect-square rounded-2xl overflow-hidden bg-surface-container-high relative">
<img alt="Supportive community" class="w-full h-full object-cover grayscale opacity-60 mix-blend-multiply" data-alt="Close up of two people shaking hands warmly in a sunlit room, emphasizing trust and human connection" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6L9zKkxKfyLSFllWzVCF7YAW4ThkE0q4hkWJ5Sz0QK9Reae1aZ0tO1X-C_46SpJCF_TQbvHQiV4KP7WkgPSv0sowkkaNEgqdrnpHxJJZtjsV79DpeEBAahVGecwxMQcwfYo3lEaoqBfHE6Hnct8479r-JWanNzp2QfB6ml3tDbYAmJHxdCaeDsjjSu664FOVLLOo6wFQzDMzyU6c7ewRXE6g0abdiNSm0D_m-CLJBJcAYeDx4v-naZxxg8r9qqYhnGwHALs3q9bjB"/>
<div class="absolute inset-0 bg-primary/10"></div>
</div>
</div>
<div class="w-full md:w-2/3">
<span class="text-secondary font-bold text-xs uppercase tracking-[0.2em] block mb-2">Transparency First</span>
<h3 class="headline-font font-bold text-xl text-on-surface mb-2">We protect your intent.</h3>
<p class="text-on-surface-variant text-sm leading-relaxed">
                            Your security ensures that every contribution reaches its destination. By securing your account, you help us maintain the chain of trust.
                        </p>
</div>
</div>
</div>
</div>
</main>
<!-- Simple Transactional Footer -->
<footer class="py-10 border-t border-surface-variant/20">
<div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-medium text-outline uppercase tracking-widest">
<div>© 2024 The Transparent Guardian</div>
<div class="flex gap-8">
<a class="hover:text-primary transition-colors" href="#">Security Policy</a>
<a class="hover:text-primary transition-colors" href="#">Privacy</a>
</div>
</div>
</footer>
<!-- Floating Security Chip (Glassmorphism) -->
<div class="fixed bottom-6 right-6 hidden md:flex items-center gap-3 bg-surface-container-lowest/90 backdrop-blur-xl px-5 py-3 rounded-full shadow-2xl border border-white/20">
<div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
<span class="text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant">Encrypted Recovery Channel Active</span>
<span class="material-symbols-outlined text-primary text-[18px]">verified_user</span>
</div>
</body></html>