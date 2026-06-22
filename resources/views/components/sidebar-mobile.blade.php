<div>
    <div x-show="mobileSidebarOpen" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 md:hidden" @click="mobileSidebarOpen = false" x-cloak></div>
    
    <aside 
        x-show="mobileSidebarOpen" 
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 w-64 bg-slate-900 text-slate-300 flex flex-col z-50 md:hidden" x-cloak>
        
        <div class="h-16 flex items-center justify-between px-4 bg-slate-950 border-b border-slate-800">
            <span class="font-bold text-white">Menu JelantahHub</span>
            <button @click="mobileSidebarOpen = false" class="text-slate-400 hover:text-white p-1 rounded-lg hover:bg-slate-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('masyarakat.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold bg-emerald-600 text-white shadow-md shadow-emerald-900/20">
                Dashboard Utama
            </a>
            <a href="{{ route('masyarakat.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                Penyetoran
            </a>
        </nav>
    </aside>
</div>