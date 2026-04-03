<div class="group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden editorial-shadow hover:-translate-y-1 transition-transform duration-400">
            <div class="relative h-64 overflow-hidden">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                     src="<?= $img_path ?>" 
                     onerror="this.src='/Charity/templates/assets/image/placeholder.jpg';"/>
                
                <div class="absolute top-4 left-4">
                    <span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">
                        <?= $org_name ?>
                    </span>
                </div>
            </div>
            
            <div class="p-8 flex flex-col flex-grow">
                <h3 class="text-2xl font-bold text-on-surface mb-3 group-hover:text-primary transition-colors">
                    <?= $name ?>
                </h3>
                
                <p class="text-xs text-outline mb-4 uppercase font-bold tracking-widest">By <?= $org_name ?></p>
                
                <p class="text-on-surface-variant text-sm leading-relaxed mb-6 flex-grow">
                    <?= htmlspecialchars($campaign['description']) ?>
                </p>
                
                <div class="flex items-center justify-between pt-4 mt-auto border-t border-surface-container">
                    <span class="text-xs font-semibold text-outline tracking-wider uppercase">12 Days Left</span>
                    <button class="flex items-center gap-2 text-primary font-bold text-sm hover:gap-3 transition-all" 
                            type="button" 
                            onclick="window.location.href='campaign_detail.php?id=<?= $id ?>'">
                        View Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>