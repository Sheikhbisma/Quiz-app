<nav class="shadow-md border-b" style="background-color: var(--primary-dark); border-color: var(--accent-tan);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16 items-center">
            <div class="shrink-0">
                <a href="#" class="text-2xl font-extrabold tracking-tight" style="color: var(--accent-tan);">
                    Quiz<span style="color: var(--primary-medium);">Site</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <a href="/" class="nav-link-base">Home</a>
                <a href="{{route('userCategoryPage')}}" class="nav-link-base">Categories</a>
                
                @if(session('userdetails'))
                    <a href="{{route('quizdetails')}}" class="nav-link-base">Quiz Details</a>
                    <a href="{{route('logoutuser')}}" class="btn-signup-accent">Logout</a>
                @else
                    <a href="{{route('userlogin')}}" class="btn-signup-accent">Login</a>
                    <a href="/user-signup" class="btn-signup-accent ml-2">Signup</a>
                @endif
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-button" class="focus:outline-none p-2 rounded-md" style="color: var(--primary-dark);">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden" style="background-color: var(--bg-cream); border-top: 1px solid var(--accent-tan);">
        <div class="px-4 pt-2 pb-4 space-y-2">
            <a href="/" class="block nav-link-base">Home</a>
            <a href="{{route('userCategoryPage')}}" class="block nav-link-base">Categories</a>
            
            @if(session('userdetails'))
                <a href="{{route('quizdetails')}}" class="block nav-link-base">Quiz Details</a>
                <a href="{{route('logoutuser')}}" class="block text-center btn-standard mt-2">Logout</a>
            @else
                <a href="{{route('userlogin')}}" class="block text-center btn-standard mt-2">Login</a>
                <a href="/user-signup" class="block text-center btn-signup-accent mt-2">Signup</a>
            @endif
        </div>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        if (btn && menu) {
            btn.addEventListener('click', () => {
                console.log("Button clicked!"); // Check this in Inspect > Console
                menu.classList.toggle('hidden');
            });
        } else {
            console.error("Menu or Button ID not found!");
        }
    });
</script>