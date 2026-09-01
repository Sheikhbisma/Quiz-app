@extends('layout.MasterLayout')
@section('title', 'Admin Login')

@section('content')
<section class="relative flex min-h-screen items-center justify-center p-4">
    <div class="pointer-events-none absolute inset-0 hero-gradient opacity-40"></div>

    <div class="relative w-full max-w-[400px]">
        <div class="card-premium relative overflow-hidden p-8 !shadow-2xl">
            <div class="absolute left-0 top-0 h-1.5 w-full" style="background-image: linear-gradient(90deg, #4338ca, #7c3aed, #f59e0b);"></div>

            <div class="mb-6 text-center">
                <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl text-white shadow-lg"
                     style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                    <i class="bi bi-shield-lock-fill text-2xl"></i>
                </div>
                <h2 class="text-2xl font-extrabold tracking-tight" style="color: var(--text-dark);">Admin Login</h2>
                <p class="mt-1 text-xs opacity-50">Restricted area — authorized personnel only</p>
            </div>

            <form action="/login" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="mb-1.5 block text-[10px] font-extrabold uppercase tracking-widest opacity-60" style="color: var(--text-dark);">Username</label>
                    <input type="text" name="username" placeholder="Admin ID" class="input-premium" style="color: var(--text-dark);">
                    @error('username')
                        <p class="mt-1 text-[10px] font-bold uppercase italic text-red-500">! {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-[10px] font-extrabold uppercase tracking-widest opacity-60" style="color: var(--text-dark);">Password</label>
                    <input type="password" name="password" placeholder="••••••••" class="input-premium" style="color: var(--text-dark);">
                    @error('password')
                        <p class="mt-1 text-[10px] font-bold uppercase italic text-red-500">! {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between py-1">
                    <label class="group flex cursor-pointer items-center gap-2">
                        <input type="checkbox" name="remember" class="h-4 w-4 rounded border-stone-200 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-[10px] font-bold text-stone-500 transition group-hover:text-stone-800">Remember</span>
                    </label>
                    <a href="#" class="text-[10px] font-extrabold uppercase tracking-widest opacity-40 transition hover:opacity-100">Forgot?</a>
                </div>

                <button type="submit" class="btn-standard w-full !py-3.5 text-[10px] uppercase tracking-[0.2em]">
                    Sign In
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-[10px] font-bold uppercase tracking-[0.3em] opacity-40">
            &copy; {{ date('Y') }} Admin Panel
        </p>
    </div>
</section>
@endsection