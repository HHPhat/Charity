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
            borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
<div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
<div class="text-2xl font-extrabold tracking-tighter text-blue-700">Transparent Guardian</div>
<div class="hidden md:flex space-x-8 items-center">
<a class="text-slate-600 hover:text-blue-600 font-manrope font-bold text-sm tracking-tight transition-opacity duration-400 ease-out" href="../../">Home</a>
<a class="text-slate-600 hover:text-blue-600 font-manrope font-bold text-sm tracking-tight transition-opacity duration-400 ease-out" href="../campaigns">Campaigns</a>
<a class="text-slate-600 hover:text-blue-600 font-manrope font-bold text-sm tracking-tight transition-opacity duration-400 ease-out" href="../joined_campaigns">My Joined Campaigns</a>
<a class="text-blue-700 border-b-2 border-blue-700 pb-1 font-manrope font-bold text-sm tracking-tight transition-opacity duration-400 ease-out" href="#">My Account</a>
</div>
<div class="flex items-center space-x-4">
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
<main class="pt-24 pb-20 max-w-7xl mx-auto px-6">
    <?php if(isset($_SESSION['success'])): ?>
    <div class="bg-green-500 text-white p-3 rounded mb-4 text-center">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>
<!-- Header Section -->
<header class="mb-12">
<h1 class="text-4xl font-extrabold tracking-tight text-on-surface mb-2">Account Settings</h1>
<p class="text-on-surface-variant max-w-2xl">Manage your personal information, security preferences, and track your impact on the community.</p>
</header>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- Sidebar Navigation -->
<aside class="lg:col-span-3 space-y-2">
<nav class="flex flex-col space-y-1">
<button class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-surface-container-high text-primary font-semibold text-left">
<span class="material-symbols-outlined">person</span>
<span>Profile Information</span>
</button>
<button class="flex items-center space-x-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-colors text-left">
<span class="material-symbols-outlined">security</span>
<span>Security &amp; Password</span>
</button>
<button class="flex items-center space-x-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-colors text-left">
<span class="material-symbols-outlined">favorite</span>
<span>My Donations</span>
</button>
<button class="flex items-center space-x-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-colors text-left">
<span class="material-symbols-outlined">notifications</span>
<span>Notifications</span>
</button>
</nav>
</aside>
<!-- Main Content Area -->
<div class="lg:col-span-9 space-y-10">
<!-- Profile Section -->
<section class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_20px_40px_rgba(25,28,29,0.04)]">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
<div class="flex items-center space-x-6">
<div class="relative group">
<img alt="Profile Avatar" class="w-24 h-24 rounded-full object-cover border-4 border-surface-container" data-alt="professional portrait of a middle-aged man with a warm smile, wearing a casual linen shirt in a bright airy studio" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeTvUEfLCl7nPp_ZmZadTxJa03CHiszgU4EhP6soz4RypEK8rtawayBT3zaod84uP13oTbI51V7nCrbBJgYd0kAKJBMvpccqg_DIu6MpiHiatt2gPwO1F6ytO9n3gF-l6ZtT2DCcpkBXuus_0zDBEF6qedVqcgOxJQ5zC-tg_kwNV76uFlj5HbFx8DAyYW6j7G64lpCgcoh06aYQ0WU4_ZUKw59m76wtHf9UZB7_hjIO3lveOlaF1kVhSlW45R-cSg9-k1auPG5h5c"/>
<button class="absolute bottom-0 right-0 bg-primary text-on-primary p-1.5 rounded-full shadow-lg hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-sm">edit</span>
</button>
</div>
<div>

<h2 class="text-2xl font-bold text-on-surface">
    <?= htmlspecialchars($_SESSION ['full_name']) ?>
</h2>


 <p class="text-on-surface-variant text-sm">
    Member since 
    <?= date("F Y", strtotime($_SESSION['donor']['creation_date'] ?? 'now')) ?>
</p>
<div class="mt-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed text-on-secondary-fixed">
    <?= htmlspecialchars($_SESSION['role']) ?>
</div>
</div>
</div>




<!-- Edit Profile Button -->
<button id="editProfileBtn" class="disable-when-deactive flex items-center justify-center space-x-2 border-2 border-primary text-primary px-5 py-2 rounded-xl font-bold text-sm hover:bg-primary/5 transition-colors">
    <span class="material-symbols-outlined text-lg">edit_note</span>
    <span>Edit Profile</span>
</button>
</div> 
<!-- Modal -->
<div id="editProfileModal" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden">
    <div class="bg-white rounded-xl p-6 w-96">
        <h2 class="text-lg font-bold mb-4">Edit Profile</h2>

        <form method="POST" action="update_profile.php">
            <div class="mb-3">
                <label class="block text-sm font-medium">Full Name</label>
                <input type="text" name="full_name"
                    value="<?= htmlspecialchars($_SESSION ['full_name'] ?? '') ?>"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email"
                    value="<?= htmlspecialchars($_SESSION['donor_email'] ?? '') ?>"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium">Phone</label>
                <input type="text" name="phone"
                    value="<?= htmlspecialchars($_SESSION['donor_phone'] ?? '') ?>"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium">CCCD</label>
                <input type="text" name="citizen_id"
                    value="<?= htmlspecialchars($_SESSION['donor_citizenid'] ?? '') ?>"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" id="closeModal" class="px-4 py-2 rounded border">
                    Cancel
                </button>
                <button type="submit" name="save_profile" class="px-4 py-2 bg-primary text-white rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>



<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="space-y-1">
        <label class="text-xs font-bold uppercase tracking-wider text-outline">Email Address (Read-only)</label>
        <div class="flex items-center space-x-2 px-4 py-3 bg-surface-container-low rounded-lg text-on-surface-variant">
            <span class="material-symbols-outlined text-lg">mail</span>
            <span>
                <?php 
                    echo isset($_SESSION['donor_email']) ? htmlspecialchars($_SESSION['donor_email']) : 'Not set'; 
                ?>
            </span>
        </div>
    </div>
<!-- </div> -->



<div class="space-y-1">
    <label class="text-xs font-bold uppercase tracking-wider text-outline">Phone Number (Read-only)</label>
    <div class="flex items-center space-x-2 px-4 py-3 bg-surface-container-low rounded-lg text-on-surface-variant">
        <span class="material-symbols-outlined text-lg">phone</span>
        <span>
            <?php 
                // Kiểm tra session, nếu chưa có thì "Not set"
                echo isset($_SESSION['donor_phone']) ? htmlspecialchars($_SESSION['donor_phone']) : 'Not set'; 
            ?>
        </span>
    </div>
</div>





<div class="space-y-1">
    <label class="text-xs font-bold uppercase tracking-wider text-outline">CCCD</label>
    <div class="flex items-center space-x-2 px-4 py-3 bg-surface-container-low rounded-lg text-on-surface-variant">
        <span class="material-symbols-outlined text-lg">assignment_ind</span>
        <span>
            <?php 
                // Kiểm tra session, nếu chưa có thì hiển thị "Not set"
                echo isset($_SESSION['donor_citizenid']) ? htmlspecialchars($_SESSION['donor_citizenid']) : 'Not set'; 
            ?>
        </span>
    </div>
</div>







<div class="space-y-1">
<label class="text-xs font-bold uppercase tracking-wider text-outline">Location</label>
<div class="flex items-center space-x-2 px-4 py-3 bg-surface-container-highest rounded-lg text-on-surface">
<span class="material-symbols-outlined text-lg">location_on</span>
<span>HaNoi</span>
</div>
</div>
</div>
</section>




<!-- Security Section -->
<section class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_20px_40px_rgba(25,28,29,0.04)]">
<h3 class="text-xl font-bold text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">verified_user</span>
                        Security Settings
                    </h3>
<div class="space-y-6">
<div class="flex items-center justify-between p-4 bg-surface rounded-lg">
<div class="flex items-center space-x-4">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined">lock</span>
</div>
<div>
<p class="font-bold text-on-surface">Two-Factor Authentication</p>
<p class="text-sm text-on-surface-variant">Add an extra layer of security to your account.</p>
</div>
</div>
<div class="relative inline-flex items-center cursor-pointer">
<div class="w-11 h-6 bg-primary rounded-full transition-colors"></div>
<div class="absolute left-6 top-1 bg-white w-4 h-4 rounded-full transition-transform"></div>
</div>
</div>


<div class="flex items-center justify-between p-4 bg-surface rounded-lg">
<div class="flex items-center space-x-4">
<div class="w-10 h-10 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined">password</span>
</div>
<div>
<p class="font-bold text-on-surface">Change Password</p>
<p class="text-sm text-on-surface-variant">Update your password regularly for better safety.</p>
</div>
</div>
<button id="openPasswordModal" 
class="disable-when-deactive text-primary font-bold text-sm hover:underline">
Update
</button>
</div>

<div id="changePasswordModal" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden">
    <div class="bg-white rounded-xl p-6 w-96">
        <h2 class="text-lg font-bold mb-4">Change Password</h2>

       <form method="POST" action="update_password.php">
    <div class="mb-3 relative">
        <label class="block text-sm font-medium">Current Password</label>
        <input type="password" name="current_password" id="current_password" class="w-full border px-3 py-2 rounded" required>
        <span class="material-symbols-outlined absolute right-3 top-9 cursor-pointer" onclick="togglePassword('current_password', this)">visibility</span>
    </div>

    <div class="mb-3 relative">
        <label class="block text-sm font-medium">New Password</label>
        <input type="password" name="new_password" id="new_password" class="w-full border px-3 py-2 rounded" required>
        <span class="material-symbols-outlined absolute right-3 top-9 cursor-pointer" onclick="togglePassword('new_password', this)">visibility</span>
    </div>

    <div class="mb-3 relative">
        <label class="block text-sm font-medium">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="w-full border px-3 py-2 rounded" required>
        <span class="material-symbols-outlined absolute right-3 top-9 cursor-pointer" onclick="togglePassword('confirm_password', this)">visibility</span>
    </div>

    <div class="flex justify-end space-x-2">
        <button type="button" id="closePasswordModal" class="px-4 py-2 border rounded">Cancel</button>
        <button type="submit" name="change_password" class="px-4 py-2 bg-primary text-white rounded">Save</button>
    </div>
</form>

<script>
function togglePassword(inputId, icon) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        icon.textContent = "visibility_off";
    } else {
        input.type = "password";
        icon.textContent = "visibility";
    }
}
</script>
    </div>
</div>

<div class="flex items-center justify-between p-4 bg-surface rounded-lg">
<div class="flex items-center space-x-4">
<div class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-outline">
<span class="material-symbols-outlined">devices</span>
</div>
<div>
<p class="font-bold text-on-surface">Logged-in Devices</p>
<p class="text-sm text-on-surface-variant">Manage your active sessions on other devices.</p>
</div>
</div>
<button class="text-primary font-bold text-sm hover:underline">Review (2)</button>
</div>
</div>
</section>



<!-- Critical Actions -->
<section class="flex flex-col md:flex-row gap-4 justify-between items-center p-8 bg-surface-container-low rounded-xl">
<div class="text-center md:text-left">
<h4 class="font-bold text-on-surface">Looking to leave?</h4>
<p class="text-sm text-on-surface-variant">We're sorry to see you go. You can deactivate your account temporarily or delete it permanently.</p>
</div>
<div class="flex space-x-4">

<!-- <button class="text-error font-bold text-sm px-4 py-2 border border-error/20 rounded-lg hover:bg-error/5 transition-colors">Deactivate Account</button> -->

<button id="toggleStatusBtn" class="px-4 py-2 rounded-lg font-bold border transition-colors">
    <?php
    $status = $_SESSION['account_status'] ?? 'Active';
    if($status === 'Active'){
        echo 'Deactivate Account';
        $btnStyle = 'bg-white text-red-500 border-red-500 hover:bg-red-50';
    } else {
        echo 'Activate Account';
        $btnStyle = 'bg-white text-green-500 border-green-500 hover:bg-green-50';
    }
    ?>
</button>

<script>
const btn = document.getElementById('toggleStatusBtn');
btn.className += ' <?php echo $btnStyle; ?>';
</script>
</div>
</section>





</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-slate-50 border-t border-slate-200">
<div class="flex flex-col md:flex-row justify-between items-center px-8 py-12 w-full max-w-7xl mx-auto">
<div class="mb-8 md:mb-0">
<div class="text-xl font-bold text-slate-900 mb-2">Transparent Guardian</div>
<p class="font-inter text-sm text-slate-500 max-w-xs">Building trust through radical transparency in charitable stewardship.</p>
</div>
<div class="flex flex-wrap justify-center gap-8 mb-8 md:mb-0">
<a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">About Us</a>
<a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Impact Reports</a>
<a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Contact</a>
<a class="text-slate-500 hover:text-blue-500 font-inter text-sm hover:underline transition-all" href="#">Privacy Policy</a>
</div>
<div class="text-right">
<p class="font-inter text-sm text-slate-500">© 2024 The Transparent Guardian. All rights reserved.</p>
<div class="flex justify-center md:justify-end space-x-4 mt-4 text-slate-400">
<span class="material-symbols-outlined text-xl cursor-pointer hover:text-primary transition-colors">public</span>
<span class="material-symbols-outlined text-xl cursor-pointer hover:text-primary transition-colors">hub</span>
<span class="material-symbols-outlined text-xl cursor-pointer hover:text-primary transition-colors">share</span>
</div>
</div>
</div>
</footer>
<!-- Floating Donation Widget -->
<div class="fixed bottom-6 right-6 z-40">
<div class="bg-surface-container-lowest/90 backdrop-blur-md p-4 rounded-2xl shadow-[0_20px_40px_rgba(25,28,29,0.12)] border border-outline-variant/20 max-w-xs">
<div class="flex items-center space-x-3 mb-3">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined" data-weight="fill">volunteer_activism</span>
</div>
<div>
<p class="font-bold text-sm text-on-surface">Your Impact Hub</p>
<p class="text-xs text-on-surface-variant">Active: 3 Campaigns</p>
</div>
</div>
<div class="space-y-2 mb-4">
<div class="flex justify-between text-xs mb-1">
<span class="text-outline">Monthly Goal</span>
<span class="font-bold">$840/$1,200</span>
</div>
<div class="w-full bg-surface-variant h-1.5 rounded-full overflow-hidden">
<div class="bg-primary h-full w-[70%] rounded-full"></div>
</div>
</div>
<button class="w-full bg-secondary text-on-secondary py-2.5 rounded-xl font-bold text-sm shadow-[0_2px_0_0_#743500] hover:scale-[1.02] active:scale-95 transition-transform">
                Quick Donate
            </button>
</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const editBtn = document.getElementById('editProfileBtn');
    const modal = document.getElementById('editProfileModal');
    const closeBtn = document.getElementById('closeModal');

    // Mở modal
    editBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Đóng modal
    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Click ra ngoài modal cũng đóng
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
});
</script>

<script>
document.getElementById("openPasswordModal").onclick = () => {
    document.getElementById("changePasswordModal").classList.remove("hidden");
};

document.getElementById("closePasswordModal").onclick = () => {
    document.getElementById("changePasswordModal").classList.add("hidden");
};
</script>


<div class="flex space-x-4">
    <button id="deactivateBtn" class="text-error font-bold text-sm px-4 py-2 border border-error/20 rounded-lg hover:bg-error/5 transition-colors">
        Deactivate Account
    </button>
</div>

<script>
document.getElementById('deactivateBtn').addEventListener('click', function() {
    if (!confirm("Bạn có chắc muốn tạm khóa tài khoản không?")) return;

    fetch('status.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=deactivate'
    })
    .then(response => response.text())
    .then(data => {
        alert('Tài khoản đã bị khóa!');
        location.reload(); // load lại trang để cập nhật trạng thái
    })
    .catch(error => console.error('Error:', error));
});
</script>

<script>
btn.addEventListener('click', function() {
    if (!confirm("Bạn có chắc muốn đổi trạng thái tài khoản không?")) return;

    fetch('/Charity/modules/accounts/status.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=toggle'
    })
    .then(res => res.text())
    .then(newStatus => {
        newStatus = newStatus.trim();

        if(newStatus === 'Active'){
            btn.textContent = 'Deactivate Account';
            btn.classList.remove('text-green-500','border-green-500','hover:bg-green-50');
            btn.classList.add('text-red-500','border-red-500','hover:bg-red-50');
        } else if(newStatus === 'Deactive'){
            btn.textContent = 'Activate Account';
            btn.classList.remove('text-red-500','border-red-500','hover:bg-red-50');
            btn.classList.add('text-green-500','border-green-500','hover:bg-green-50');
        }

        // Disable tất cả form và nút khác nếu Deactive
        document.querySelectorAll('.disable-when-deactive').forEach(el => {
            el.disabled = (newStatus === 'Deactive');
        });
    })
    .catch(err => console.error('AJAX Error:', err));
});
</script>
</body></html>