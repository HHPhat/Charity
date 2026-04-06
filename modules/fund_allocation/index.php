<div class="max-w-3xl mx-auto p-8 bg-surface-container-lowest rounded-2xl border border-outline-variant/30 shadow-lg mt-10">
    <div class="mb-8 border-b border-surface-container-low pb-6">
        <h2 class="text-2xl font-bold font-headline text-primary flex items-center gap-3">
            <span class="material-symbols-outlined text-3xl">account_balance_wallet</span>
            Lập Kế Hoạch Phân Bổ Quỹ
        </h2>
        <p class="text-on-surface-variant mt-2 text-sm">
            Trích xuất quỹ từ các chiến dịch đã hoàn thành để chuyển xuống cho người hưởng lợi hoặc khu vực cụ thể.
        </p>
    </div>

    <form action="process_allocation.php" method="POST" class="space-y-8">
        
        <section>
            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Trích quỹ từ chiến dịch</label>
            <select name="campaign_id" required class="w-full px-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 font-bold transition-all text-on-surface">
                <option value="">-- Lựa chọn chiến dịch --</option>
                <option value="1">Clean Water for Remote Villages (Quỹ khả dụng: 150,000,000 VNĐ)</option>
                <option value="2">Xây cầu vượt lũ Bản Nậm (Quỹ khả dụng: 320,000,000 VNĐ)</option>
            </select>
        </section>

        <section>
            <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Người / Đại diện hưởng lợi</label>
            <select name="beneficiary_id" required class="w-full px-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 font-bold transition-all text-on-surface">
                <option value="">-- Lựa chọn người hưởng lợi --</option>
                <option value="101">Trưởng bản Vàng A Chứ (Khu vực: Lai Châu)</option>
                <option value="102">Trường Tiểu học X (Khu vực: Hà Giang)</option>
            </select>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Số tiền phân bổ (VNĐ)</label>
                <div class="relative">
                    <input name="amount" type="number" required min="10000" class="w-full pl-4 pr-16 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 font-bold text-lg transition-all" placeholder="VD: 50000000"/>
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 font-bold text-on-surface-variant opacity-70">VNĐ</span>
                </div>
            </div>
            
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Ngày dự kiến cấp quỹ</label>
                <input name="allocation_date" type="date" required class="w-full px-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/20 font-bold transition-all text-on-surface" />
            </div>
        </div>

        <div class="pt-6 border-t border-surface-variant">
            <button type="submit" class="w-full py-5 rounded-2xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-extrabold text-lg font-headline shadow-xl shadow-primary/20 hover:translate-y-[-2px] transition-all duration-300 active:scale-95 flex justify-center items-center gap-2">
                <span class="material-symbols-outlined">assignment_turned_in</span>
                Xác nhận tạo kế hoạch
            </button>
        </div>
    </form>
</div>