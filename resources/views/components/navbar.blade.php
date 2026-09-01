<nav class="sticky top-0 z-50 border-b bg-white/85 backdrop-blur-xl shadow-sm" style="border-color: var(--accent-tan);">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3.5 lg:px-8">

        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl text-white shadow-lg" style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                <i class="bi bi-grid-1x2-fill text-lg"></i>
            </div>
            <div>
                <h2 class="text-xl leading-none font-extrabold tracking-tight" style="color: var(--text-dark);">
                    Quiz<span style="color: var(--primary-medium);">Pro </span><span class="text-sm font-bold opacity-40">Admin</span>
                </h2>
                <span class="text-[9px] font-bold uppercase tracking-[0.3em] opacity-40">Console</span>
            </div>
        </div>

        <ul class="hidden items-center gap-6 md:flex">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="rounded-lg px-4 py-2 text-[11px] font-extrabold uppercase tracking-widest transition-all hover:bg-indigo-50"
                   style="color: {{ request()->routeIs('dashboard') ? 'var(--primary-medium)' : '#64748b' }};">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('category') }}"
                   class="rounded-lg px-4 py-2 text-[11px] font-extrabold uppercase tracking-widest transition-all hover:bg-indigo-50"
                   style="color: {{ request()->routeIs('category') ? 'var(--primary-medium)' : '#64748b' }};">
                    Categories
                </a>
            </li>
            <li>
                <a href="{{ route('quiz') }}"
                   class="rounded-lg px-4 py-2 text-[11px] font-extrabold uppercase tracking-widest transition-all hover:bg-indigo-50"
                   style="color: {{ request()->routeIs('quiz') ? 'var(--primary-medium)' : '#64748b' }};">
                    Quiz Engine
                </a>
            </li>
        </ul>

        <div class="flex items-center gap-4">
            @if(isset($admin))
                <div class="hidden items-center gap-3 border-r pr-4 lg:flex" style="border-color: var(--accent-tan);">
                    <div class="text-right">
                        <p class="text-[10px] font-extrabold uppercase tracking-wider" style="color: var(--text-dark);">{{ $admin->username }}</p>
                        <p class="text-[9px] font-bold uppercase tracking-wider text-green-600">System Online</p>
                    </div>
                    <div class="flex h-9 w-9 items-center justify-center rounded-full border shadow-sm" style="border-color: var(--accent-tan); color: var(--primary-medium); background-color: var(--bg-cream);">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <a href="/login"
                   class="inline-flex items-center gap-2 rounded-xl border px-4 py-2 text-[10px] font-extrabold uppercase tracking-widest transition-all"
                   style="background-color:#fff7f7; color:#b91c1c; border-color:#fee2e2;">
                    <i class="bi bi-box-arrow-right"></i>
                    Sign Out
                </a>
            @endif
        </div>
    </div>
</nav>