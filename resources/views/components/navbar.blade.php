<nav class="sticky top-0 z-50 border-b border-stone-200/50 shadow-sm" style="background-color: white;">
    <div class="container mx-auto px-8 py-4 flex justify-between items-center">
        
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-inner" style="background-color: var(--primary-dark);">
                <i class="bi bi-grid-1x2-fill text-white text-lg"></i>
            </div>
            <div>
                <h2 class="text-xl font-black tracking-tighter leading-none" style="color: var(--primary-dark);">QUIZ <span class="opacity-40 font-light">PRO</span></h2>
                <span class="text-[9px] font-black uppercase tracking-[0.3em] opacity-40">Admin Console</span>
            </div>
        </div>

        <ul class="hidden md:flex space-x-8 items-center">
            <li>
                <a href="{{ route('dashboard') }}" 
                   class="text-[11px] font-black uppercase tracking-widest hover:opacity-100 transition-all {{ request()->routeIs('dashboard') ? 'opacity-100' : 'opacity-40' }}" 
                   style="color: var(--primary-dark);">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{route('category')}}" 
                   class="text-[11px] font-black uppercase tracking-widest hover:opacity-100 transition-all {{ request()->routeIs('category') ? 'opacity-100' : 'opacity-40' }}" 
                   style="color: var(--primary-dark);">
                    Categories
                </a>
            </li>
            <li>
                <a href="{{route('quiz')}}" 
                   class="text-[11px] font-black uppercase tracking-widest hover:opacity-100 transition-all {{ request()->routeIs('quiz') ? 'opacity-100' : 'opacity-40' }}" 
                   style="color: var(--primary-dark);">
                    Quiz Engine
                </a>
            </li>
        </ul>

        <div class="flex items-center gap-6">
            @if(isset($admin))
                <div class="hidden lg:flex items-center gap-3 border-r border-stone-200 pr-6">
                    <div class="text-right">
                        <p class="text-[10px] font-black uppercase tracking-wider" style="color: var(--primary-dark);">{{ $admin->name ?? 'Administrator' }}</p>
                        <p class="text-[9px] font-bold text-green-600 uppercase">System Online</p>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-stone-100 border border-stone-200 flex items-center justify-center">
                        <i class="bi bi-person-fill text-stone-400"></i>
                    </div>
                </div>

                <a href="/login"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-black text-[10px] uppercase tracking-widest transition-all shadow-sm active:scale-95"
                   style="background-color: #fef2f2; color: #b91c1c; border: 1px solid #fee2e2;">
                    <i class="bi bi-box-arrow-right"></i>
                    Sign Out
                </a>
            @endif
        </div>
    </div>
</nav>

<style>
    /* Active Link Indicator logic if you want a dot under active link */
    .active-link::after {
        content: '';
        display: block;
        width: 15px;
        height: 3px;
        background: var(--primary-dark);
        margin: 0 auto;
        border-radius: 10px;
        margin-top: 4px;
    }
</style>