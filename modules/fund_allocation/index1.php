<?php
require_once '../../includes/database.php';
$products = get_all_products();
$shops = get_all_shops();
$campaign_id = isset($_GET['campaign_id']) ? (int)$_GET['campaign_id'] : 0;
// Giả sử phiếu mua hàng này được lập từ một allocation_id (Kế hoạch phân bổ quỹ)
// Bạn cần truyền ẩn ID này để lưu vào CSDL
$allocation_id = 1; 
?>

<!DOCTYPE html>

<html class="light" lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Lập phiếu mua hàng - Stewardship Portal</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<!-- Tailwind for extended styling utility -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-fixed-dim": "#ffb68a",
                        "inverse-surface": "#2e3132",
                        "inverse-on-surface": "#f0f1f2",
                        "primary-container": "#0d6efd",
                        "inverse-primary": "#b1c5ff",
                        "surface-tint": "#0057ce",
                        "on-secondary-fixed": "#321300",
                        "outline-variant": "#c1c6d6",
                        "tertiary-fixed-dim": "#ffb3b2",
                        "surface-bright": "#f8f9fa",
                        "on-secondary": "#ffffff",
                        "on-background": "#191c1d",
                        "on-primary-container": "#ffffff",
                        "secondary-fixed": "#ffdbc8",
                        "surface-container-high": "#e7e8e9",
                        "on-primary": "#ffffff",
                        "outline": "#727785",
                        "tertiary": "#b91830",
                        "surface-variant": "#e1e3e4",
                        "tertiary-container": "#dd3645",
                        "on-error": "#ffffff",
                        "secondary-container": "#ff8016",
                        "on-tertiary": "#ffffff",
                        "on-primary-fixed": "#001946",
                        "error-container": "#ffdad6",
                        "on-secondary-fixed-variant": "#743500",
                        "on-secondary-container": "#5f2a00",
                        "surface": "#f8f9fa",
                        "on-error-container": "#93000a",
                        "background": "#f8f9fa",
                        "surface-container-low": "#f3f4f5",
                        "on-tertiary-container": "#130001",
                        "surface-container-highest": "#e1e3e4",
                        "primary": "#0057cd",
                        "on-tertiary-fixed": "#410008",
                        "on-surface": "#191c1d",
                        "primary-fixed-dim": "#b1c5ff",
                        "on-tertiary-fixed-variant": "#92001f",
                        "on-primary-fixed-variant": "#00419e",
                        "primary-fixed": "#dae2ff",
                        "tertiary-fixed": "#ffdad9",
                        "surface-container": "#edeeef",
                        "error": "#ba1a1a",
                        "on-surface-variant": "#414754",
                        "surface-container-lowest": "#ffffff",
                        "secondary": "#984700",
                        "surface-dim": "#d9dadb"
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
        h1, h2, h3, .font-manrope { font-family: 'Manrope', sans-serif; }

        /* Bootstrap form overrides to match the theme */
        .form-control, .form-select {
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            border-color: #e1e3e4;
            background-color: #f3f4f5;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 87, 205, 0.15);
            border-color: #0057cd;
        }
        .btn-primary {
            background-color: #0057cd;
            border-color: #0057cd;
            border-radius: 1rem;
            padding: 0.75rem 1.5rem;
            font-weight: 700;
        }
        .btn-primary:hover {
            background-color: #00419e;
            border-color: #00419e;
        }
        .table {
            border-collapse: separate;
            border-spacing: 0 0.75rem;
        }
        .table thead th {
            border-bottom: none;
            color: #727785;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .table tbody tr {
            background-color: #f8f9fa;
            border-radius: 1rem;
            transition: all 0.3s ease;
        }
        .table tbody tr:hover {
            background-color: #edeeef;
        }
        .table tbody td {
            border-top: none;
            vertical-align: middle;
            padding: 1rem;
        }
        .table-item-input {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
        }
        .table-item-input:focus {
            box-shadow: none !important;
        }
    </style>
</head>
<body class="bg-surface text-on-surface">
<!-- SideNavBar (Shared Component) -->
<aside class="fixed left-0 top-0 h-full flex flex-col w-64 bg-slate-50 dark:bg-slate-900 font-manrope text-sm font-medium z-50 border-e border-slate-200">
<div class="p-6 flex flex-col gap-6 h-full">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-white" data-icon="shield">shield</span>
</div>
<div>
<h2 class="text-xl font-bold tracking-tight text-blue-800 dark:text-blue-300">Guardian Admin</h2>
<p class="text-[10px] text-slate-500 uppercase tracking-widest">Institutional Steward</p>
</div>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 text-slate-500 dark:text-slate-400" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                Dashboard
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 text-slate-500 dark:text-slate-400" href="#">
<span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                Impact Reports
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 text-slate-500 dark:text-slate-400" href="#">
<span class="material-symbols-outlined" data-icon="volunteer_activism">volunteer_activism</span>
                Donations
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 text-blue-700 dark:text-blue-400 font-bold border-r-4 border-blue-700 bg-blue-50/50" href="#">
<span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
                Purchase Slips
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors duration-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 text-slate-500 dark:text-slate-400" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
                Settings
            </a>
</nav>
<button class="btn btn-primary w-full shadow-lg shadow-primary/20 flex items-center justify-center gap-2">
<span class="material-symbols-outlined" data-icon="add">add</span>
            New Campaign
        </button>
<div class="flex items-center gap-3 p-4 bg-slate-100 dark:bg-slate-800 rounded-2xl mt-auto">
<div class="w-10 h-10 rounded-full bg-slate-300 overflow-hidden">
<img alt="Admin profile photo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDG8udk6N2DRRYwJeM0KVa-xmT3_MWhRauQydS38GCynxdvHfNmBLwWU3EZaM2JlYpftuzOei7opYLf0ju-_pqDgkfFuNYxeVhxwpSPP97eMlpOblmdSI4iTS74W5kbnuc1-A17vnQ4W_i0raMis7JKuS_JlL3nbv8z9fXhm2AmnabJKRpA20ef2bjym7gMt5NAaUu4skZHJBzQMZj-g7Q0KFRzbxZ53zz8TvMC89H40AeS3nFOsdD7I6l7SukpuxGwYRPeW2oh3o4W"/>
</div>
<div class="overflow-hidden">
<p class="font-bold truncate text-sm">Admin User</p>
<p class="text-[10px] text-slate-500 truncate">admin@guardian.org</p>
</div>
</div>
</div>
</aside>
<!-- TopNavBar (Shared Component) -->
<header class="fixed top-0 right-0 left-0 flex justify-between items-center pl-72 pr-8 h-16 bg-white/80 dark:bg-slate-950/80 backdrop-blur-md shadow-sm z-40">
<div class="flex items-center gap-8">
<span class="text-lg font-bold text-primary">Stewardship Portal</span>
<nav class="hidden md:flex gap-6">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-600 transition-colors text-sm" href="#">Overview</a>
<a class="text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 pb-1 text-sm font-semibold" href="#">Audit Log</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3 text-slate-400 text-sm" data-icon="search">search</span>
<input class="form-control form-control-sm ps-9 rounded-pill bg-slate-100 border-0 text-sm w-64" placeholder="Search logs..." type="text"/>
</div>
<button class="btn btn-link p-2 text-slate-600">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<div class="w-8 h-8 rounded-full bg-slate-200 overflow-hidden border border-slate-100">
<img alt="User avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVm7rDGGbFq4dioxltkedf_3R0dB9TzbEtxUZ8fXuc2ilZM4BfaIyja7yP6d4vYmaOVD9-05UvEBzZKnm9q-Uh4Sg7tq4u_KOV4zQExbzCB8TlTuMyH2_gsFpjbnqcvcm-Lz-SGPk7uLO-OtCakPemS-wJjhoq5suSDtIPz1xqaGRhoqWg7_xyTa9a_Dp-1IWKBht6omVapB5LjfqOtKYXoCnW_XINpuGPLp7FP-UibhNRngegWbBtKByHbJNVnDxJyf-lj9yjGzWq"/>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="ml-64 pt-16 min-h-screen bg-surface">
<!-- Bootstrap Container -->
<div class="container py-12 px-xl-5">
<!-- Breadcrumbs & Editorial Header -->
<div class="mb-5">
<nav aria-label="breadcrumb">
<ol class="breadcrumb text-[10px] font-bold uppercase tracking-widest mb-3">
<li class="breadcrumb-item text-slate-500">Admin</li>
<li class="breadcrumb-item text-slate-500">Stewardship</li>
<li aria-current="page" class="breadcrumb-item active text-primary">Purchase Slips</li>
</ol>
</nav>
<h1 class="display-4 fw-black font-headline text-on-surface mb-3">Lập phiếu mua hàng</h1>
<p class="lead text-on-surface-variant max-w-2xl">
                Đảm bảo tính minh bạch bằng cách ghi lại mọi chi phí mua sắm vật tư cho các chiến dịch cứu trợ cộng đồng.
            </p>
</div>
<!-- Bootstrap Grid System -->
<div class="row g-5">
<div class="col-lg-9">
    <form id="purchaseForm" action="add_purchase_slip.php" method="POST">
        <input type="hidden" name="allocation_id" value="<?= $allocation_id ?>">
        
        <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 bg-white">
            <div class="row mb-5 border-bottom pb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-[10px] fw-bold text-secondary-container text-uppercase tracking-widest d-block mb-1">Mã chứng từ</label>
                    <span class="h4 fw-black font-headline m-0 text-muted">Tạo tự động</span>
                </div>
                <div class="col-md-6 text-md-end">
                    <label class="text-[10px] fw-bold text-slate-400 text-uppercase tracking-widest d-block mb-1">Ngày lập phiếu</label>
                    <span class="h5 fw-bold font-headline m-0"><?= date('d/m/Y') ?></span>
                </div>
            </div>

            <div class="table-responsive mb-4">
                <table class="table align-middle" id="productTable">
                    <thead>
                        <tr>
                            <th style="width: 45%">Tên hàng hóa</th>
                            <th class="text-center" style="width: 15%">Số lượng</th>
                            <th class="text-end" style="width: 20%">Đơn giá (VNĐ)</th>
                            <th class="text-end" style="width: 20%">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <tr class="item-row">
                            <td>
                                <select name="id_products[]" class="form-select fw-medium" required>
                                    <option value="">-- Chọn sản phẩm --</option>
                                    <?php foreach ($products as $p): ?>
                                        <option value="<?= $p['id_product'] ?>"><?= htmlspecialchars($p['nam_product']) ?> (<?= $p['unit'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="text-center">
                                <input name="quantities[]" class="form-control form-control-sm text-center fw-bold mx-auto input-qty" style="width: 80px;" type="number" min="1" required/>
                            </td>
                            <td class="text-end">
                                <input name="prices[]" class="form-control table-item-input text-end fw-medium input-price" type="text" placeholder="0" required/>
                            </td>
                            <td class="text-end fw-bold text-primary row-total">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <button type="button" id="addRowBtn" class="btn btn-link text-decoration-none text-primary fw-bold p-0 mb-5 d-flex align-items-center gap-2">
                <div class="bg-primary-container text-white rounded-circle p-1 d-flex">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                </div>
                Thêm hàng hóa mới
            </button>

            <div class="row align-items-end border-top pt-4 g-4">
                <div class="col-md-7">
                    <div class="mb-3">
                        <div class="input-group input-group-sm bg-transparent border-0">
                            <span class="input-group-text bg-transparent border-0 ps-0 text-secondary">
                                <span class="material-symbols-outlined">notes</span>
                            </span>
                            <input name="note" class="form-control bg-transparent border-0 border-bottom border-transparent hover:border-slate-200" placeholder="Ghi chú thêm về lô hàng này..." type="text"/>
                        </div>
                    </div>
                    <div>
                        <div class="input-group input-group-sm bg-transparent border-0">
                            <span class="input-group-text bg-transparent border-0 ps-0 text-secondary">
                                <span class="material-symbols-outlined">store</span>
                            </span>
                            <select name="id_shop" class="form-select bg-transparent border-0 fw-bold" required>
                                <option value="">-- Chọn nhà cung cấp --</option>
                                <?php foreach ($shops as $shop): ?>
                                    <option value="<?= $shop['id_shop'] ?>"><?= htmlspecialchars($shop['name_shop']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-end">
                    <div class="bg-primary-container bg-opacity-10 rounded-4 p-4">
                        <label class="text-[10px] fw-bold text-slate-500 text-uppercase tracking-widest d-block mb-1">Tổng tiền thanh toán</label>
                        <div class="d-flex align-items-baseline justify-content-end gap-2">
                            <input type="hidden" name="total_amount" id="hiddenTotal" value="0">
                            <span class="h1 fw-black font-headline text-primary m-0" id="grandTotal">0</span>
                            <span class="h5 fw-bold text-primary text-opacity-50 m-0">VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-5 text-end">
                <button type="submit" class="btn btn-primary btn-lg shadow-xl py-3 px-5 d-inline-flex align-items-center gap-3">
                    <span>Lập phiếu mua hàng</span>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Side Info Column -->
<div class="col-lg-3">
<div class="row g-4">
<!-- Guidelines -->
<div class="col-12">
<div class="card border-0 rounded-4 bg-light p-4 position-relative overflow-hidden">
<div class="position-absolute top-0 end-0 p-3 opacity-10">
<span class="material-symbols-outlined display-4 text-primary">info</span>
</div>
<h6 class="text-[10px] fw-black text-uppercase tracking-widest text-slate-500 mb-4 d-flex align-items-center gap-2">
<span class="material-symbols-outlined text-primary text-sm">info</span>
                                Quy định lập phiếu
                            </h6>
<div class="small fw-medium text-muted">
<div class="d-flex gap-2 mb-3">
<span class="text-primary fw-bold">01.</span>
<span>Mọi phiếu mua hàng phải có hóa đơn đỏ (VAT) đính kèm.</span>
</div>
<div class="d-flex gap-2 mb-3">
<span class="text-primary fw-bold">02.</span>
<span>Chi trên 20 triệu VNĐ cần chữ ký phê duyệt Hội đồng.</span>
</div>
<div class="d-flex gap-2">
<span class="text-primary fw-bold">03.</span>
<span>Hàng hóa phải được nhập kho kiểm định trước.</span>
</div>
</div>
</div>
</div>
<!-- Budget Info -->
<div class="col-12">
<div class="card border-0 rounded-4 bg-orange-500 text-white p-4 shadow-sm" style="background-color: #ff8016;">
<label class="text-[10px] fw-bold text-uppercase tracking-widest opacity-75 mb-2">Ngân sách còn lại</label>
<h4 class="fw-black font-headline mb-3">1.250.400.000 <small class="fw-normal h6">VNĐ</small></h4>
<div class="progress mb-3" style="height: 6px; background-color: rgba(255,255,255,0.2);">
<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" class="progress-bar bg-white" role="progressbar" style="width: 65%"></div>
</div>
<p class="x-small fw-medium opacity-90 m-0" style="font-size: 0.7rem;">
                                Đã sử dụng 35% ngân sách cho "Cứu trợ Miền Trung 2024".
                            </p>
</div>
</div>
<!-- Source Selector -->
<div class="col-12">
<div class="card border-0 rounded-4 bg-white shadow-sm p-4">
<div class="d-flex align-items-center gap-3 mb-3">
<div class="bg-danger-subtle text-danger rounded-3 p-2 d-flex">
<span class="material-symbols-outlined">volunteer_activism</span>
</div>
<div>
<label class="text-[10px] fw-bold text-slate-400 text-uppercase tracking-widest d-block">Nguồn quỹ</label>
<span class="fw-bold small">Quỹ Khẩn Cấp</span>
</div>
</div>
<button class="btn btn-outline-primary btn-sm w-100 rounded-3">
                                Thay đổi nguồn quỹ
                            </button>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- Floating Help Button -->
<div class="fixed bottom-8 right-8 z-50">
<button class="w-14 h-14 bg-white rounded-full shadow-2xl flex items-center justify-center text-primary hover:scale-110 transition-transform group">
<span class="material-symbols-outlined text-2xl" data-icon="support_agent">support_agent</span>
<div class="absolute bottom-full right-0 mb-4 scale-0 group-hover:scale-100 transition-transform origin-bottom-right bg-dark text-white px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap">
            Cần hỗ trợ lập phiếu?
        </div>
</button>
</div>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.getElementById('tableBody');
    const addRowBtn = document.getElementById('addRowBtn');
    const grandTotalEl = document.getElementById('grandTotal');
    const hiddenTotal = document.getElementById('hiddenTotal');
    const form = document.getElementById('purchaseForm');

    // Hàm định dạng số 1000000 -> 1.000.000
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Hàm lấy giá trị số nguyên từ chuỗi đã format
    function parseNumber(str) {
        return parseInt(str.replace(/\./g, '')) || 0;
    }

    // Tính toán lại toàn bộ bảng
    function calculateTotal() {
        let grandTotal = 0;
        const rows = document.querySelectorAll('.item-row');
        
        rows.forEach(row => {
            const qty = parseInt(row.querySelector('.input-qty').value) || 0;
            const price = parseNumber(row.querySelector('.input-price').value);
            const rowTotal = qty * price;
            
            row.querySelector('.row-total').innerText = formatNumber(rowTotal);
            grandTotal += rowTotal;
        });

        grandTotalEl.innerText = formatNumber(grandTotal);
        hiddenTotal.value = grandTotal; // Lưu để push lên Backend
    }

    // Sự kiện lắng nghe việc nhập số lượng và đơn giá
    tableBody.addEventListener('input', function(e) {
        if (e.target.classList.contains('input-price')) {
            // Chỉ cho phép nhập số
            let val = e.target.value.replace(/\D/g, ''); 
            e.target.value = val ? formatNumber(val) : '';
        }
        if (e.target.classList.contains('input-qty') || e.target.classList.contains('input-price')) {
            calculateTotal();
        }
    });

    // Thêm dòng mới
    addRowBtn.addEventListener('click', function() {
        // Clone lại dòng đầu tiên (hoặc lấy 1 template chuẩn)
        const firstRow = document.querySelector('.item-row');
        const newRow = firstRow.cloneNode(true);
        
        // Reset dữ liệu của dòng vừa copy
        newRow.querySelector('select').value = '';
        newRow.querySelector('.input-qty').value = '';
        newRow.querySelector('.input-price').value = '';
        newRow.querySelector('.row-total').innerText = '0';
        
        tableBody.appendChild(newRow);
    });

    // Validate trước khi Submit (Ngăn gửi đi nếu hàng hóa có giá trị 0)
    form.addEventListener('submit', function(e) {
        if (parseInt(hiddenTotal.value) <= 0) {
            e.preventDefault();
            alert("Vui lòng điền đủ số lượng và đơn giá cho hàng hoá!");
        }
    });
});
</script>