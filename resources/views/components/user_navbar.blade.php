<nav class="sticky top-0 z-50 shadow-md" style="background-image: linear-gradient(120deg, #0f0c29, #1e1b4b 55%, #312e81);">
    <div class="mx-auto max-w-7xl px-4">
        <div class="flex h-16 items-center justify-between">
            <div class="shrink-0">
                <a href="/" class="flex items-center gap-2 text-2xl font-extrabold tracking-tight text-white">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl text-white shadow-lg gold-gradient">
                        <i class="bi bi-lightning-charge-fill text-lg"></i>
                    </span>
                    Quiz<span class="text-gradient">Site</span>
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
                    <a href="{{ route('userlogin') }}" class="ms-2 rounded-xl border border-white/20 px-4 py-2 text-sm font-bold text-white transition hover:bg-white/10">
                        Login
                    </a>
                    <a href="/user-signup" class="btn-signup-accent ms-2 px-4 py-2">Signup Free</a>
                @endif
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-button" class="rounded-md p-2 text-white focus:outline-none">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-white/10 md:hidden" style="background-image: linear-gradient(120deg, #0f0c29, #1e1b4b);">
        <div class="space-y-1 px-4 py-4">
            <a href="/" class="block rounded-xl px-4 py-2.5 text-sm font-semibold text-indigo-100 hover:bg-white/10">Home</a>
            <a href="{{ route('userCategoryPage') }}" class="block rounded-xl px-4 py-2.5 text-sm font-semibold text-indigo-100 hover:bg-white/10">Categories</a>

            @if(session('userdetails'))
                <a href="{{ route('quizdetails') }}" class="block rounded-xl px-4 py-2.5 text-sm font-semibold text-indigo-100 hover:bg-white/10">My History</a>
                <a href="{{ route('logoutuser') }}" class="btn-signup-accent mt-3 block text-center py-2.5">Logout</a>
            @else
                <a href="{{ route('userlogin') }}" class="mt-3 block rounded-xl border border-white/20 px-4 py-2.5 text-center text-sm font-bold text-white">Login</a>
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