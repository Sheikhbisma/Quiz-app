<nav class="sticky top-0 z-50 border-b shadow-sm" style="background-color: #ffffff; border-color: var(--accent-tan);">
    <div class="mx-auto max-w-7xl px-4">
        <div class="flex h-16 items-center justify-between">
            <div class="shrink-0">
                <a href="/" class="flex items-center gap-2 text-2xl font-extrabold tracking-tight" style="color: var(--text-dark);">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl text-white shadow-lg gold-gradient">
                        <i class="bi bi-lightning-charge-fill text-lg"></i>
                    </span>
                    Quiz<span style="color: var(--primary-medium);">Site</span>
                </a>
            </div>

            <div class="hidden items-center gap-1 md:flex">
                <a href="/" class="nav-link-base">Home</a>
                <a href="{{ route('userCategoryPage') }}" class="nav-link-base">Categories</a>

                @if(session('userdetails'))
                    <a href="{{ route('quizdetails') }}" class="nav-link-base">My History</a>
                    <form action="{{ route('logoutuser') }}" method="GET" class="ms-2">
                        <button type="submit" class="btn-signup-accent px-4 py-2">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('userlogin') }}" class="ms-2 rounded-xl border px-4 py-2 text-sm font-bold transition hover:bg-slate-50" style="color: var(--primary-dark); border-color: var(--accent-tan);">
                        Login
                    </a>
                    <a href="/user-signup" class="btn-signup-accent ms-2 px-4 py-2">Signup Free</a>
                @endif
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-button" class="rounded-md p-2 focus:outline-none" style="color: var(--text-dark);">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t bg-white md:hidden" style="border-color: var(--accent-tan);">
        <div class="space-y-1 px-4 py-4">
            <a href="/" class="block rounded-xl px-4 py-2.5 text-sm font-semibold" style="color: var(--text-dark);">Home</a>
            <a href="{{ route('userCategoryPage') }}" class="block rounded-xl px-4 py-2.5 text-sm font-semibold" style="color: var(--text-dark);">Categories</a>

            @if(session('userdetails'))
                <a href="{{ route('quizdetails') }}" class="block rounded-xl px-4 py-2.5 text-sm font-semibold" style="color: var(--text-dark);">My History</a>
                <a href="{{ route('logoutuser') }}" class="btn-signup-accent mt-3 block text-center py-2.5">Logout</a>
            @else
                <a href="{{ route('userlogin') }}" class="mt-3 block rounded-xl border px-4 py-2.5 text-center text-sm font-bold" style="color: var(--primary-dark); border-color: var(--accent-tan);">Login</a>
                <a href="/user-signup" class="btn-signup-accent mt-2 block text-center py-2.5">Signup Free</a>
            @endif
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => menu.classList.toggle('hidden'));
        }
    });
</script>