@extends('layout.usermasterlayout')
@section('title', 'Login | QuizSite')

@section('content')
<section class="relative flex min-h-screen items-center justify-center py-14">
    <div class="pointer-events-none absolute inset-0 hero-gradient opacity-40"></div>

    <div class="relative w-full max-w-md px-4">
        <div class="card-premium p-8 md:p-10 !shadow-2xl">
            @if(session('msg'))
                <div class="mb-6 flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 px-5 py-4">
                    <i class="bi bi-check-circle-fill text-green-600"></i>
                    <p class="text-sm font-bold text-green-700">{{ session('msg') }}</p>
                </div>
            @endif

            <div class="mb-8 text-center">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl text-white shadow-lg"
                     style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                    <i class="bi bi-person-lock text-3xl"></i>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight" style="color: var(--text-dark);">Welcome Back</h2>
                <p class="mt-2 text-sm opacity-60">Enter your credentials to continue</p>
            </div>

            <form action="{{ route('userlog') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="username" class="mb-2 block text-sm font-bold" style="color: var(--text-dark);">Email or Username</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-envelope-fill"></i></span>
                        <input type="text" name="email" id="username" placeholder="Enter your email"
                               class="input-premium !pl-11" required>
                    </div>
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-bold" style="color: var(--text-dark);">Password</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-shield-lock-fill"></i></span>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                               class="input-premium !pl-11" required>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="group flex cursor-pointer items-center gap-2">
                        <input type="checkbox" name="remember" class="h-4 w-4 cursor-pointer rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-sm opacity-60 transition group-hover:opacity-100">Remember me</span>
                    </label>
                    <a href="{{ route('forgot') }}" class="text-sm font-bold transition hover:underline" style="color: var(--primary-medium);">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="btn-standard w-full !py-4 text-base">
                    Login Now <i class="bi bi-arrow-right-short text-2xl"></i>
                </button>
            </form>

            <div class="mt-8 border-t pt-6 text-center" style="border-color: var(--accent-tan);">
                <p class="text-sm opacity-60">Don't have an account?
                    <a href="{{ route('usersignup') }}" class="font-bold hover:underline" style="color: var(--primary-medium);">Create Account</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection