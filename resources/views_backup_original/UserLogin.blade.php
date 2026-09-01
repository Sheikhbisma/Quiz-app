@extends('layout.usermasterlayout')

@section('content')
<section class="flex justify-center items-center min-h-screen py-12" style="background-color: var(--bg-cream);">

    <div class="w-full max-w-md mx-4">
        
        <div class="bg-white rounded-3xl shadow-xl border p-8 md:p-10" style="border-color: var(--accent-tan);">
            
            @if(session('msg'))
                <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200">
                    <p class="text-green-700 text-sm font-medium flex items-center gap-2">
                        <i class="bi bi-check-circle-fill"></i> {{session('msg')}}
                    </p>
                </div>
            @endif

            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 shadow-sm" style="background-color: var(--bg-cream);">
                    <i class="bi bi-person-lock text-3xl" style="color: var(--primary-dark);"></i>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight" style="color: var(--primary-dark);">Welcome Back</h2>
                <p class="mt-2 text-sm opacity-70" style="color: var(--text-dark);">Enter your credentials to continue</p>
            </div>

            <form action="{{route('userlog')}}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-bold mb-2" style="color: var(--primary-dark);">
                        Email or Username
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input
                            type="text"
                            name="email"
                            id="username"
                            placeholder="Enter your email"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 transition-all outline-none focus:ring-4 focus:ring-stone-100"
                            style="border-color: var(--accent-tan); background-color: var(--bg-cream);"
                            required
                        >
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold mb-2" style="color: var(--primary-dark);">
                        Password
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40">
                            <i class="bi bi-shield-lock-fill"></i>
                        </span>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="••••••••"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 transition-all outline-none focus:ring-4 focus:ring-stone-100"
                            style="border-color: var(--accent-tan); background-color: var(--bg-cream);"
                            required
                        >
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input
                            type="checkbox"
                            name="remember"
                            class="w-4 h-4 rounded border-gray-300 text-green-700 focus:ring-green-600 cursor-pointer"
                        >
                        <span class="text-sm opacity-80 group-hover:opacity-100 transition-opacity" style="color: var(--text-dark);">Remember me</span>
                    </label>
                    <a href="{{route('forgot')}}" class="text-sm font-bold hover:underline transition duration-300" style="color: var(--primary-medium);">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="btn-standard w-full! py-4 flex items-center justify-center gap-2 text-lg shadow-lg hover:shadow-xl">
                    <span>Login Now</span>
                    <i class="bi bi-arrow-right-short text-2xl"></i>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t text-center" style="border-color: var(--accent-tan);">
                <p class="text-sm opacity-70" style="color: var(--text-dark);">
                    Don't have an account? 
                    <a href="{{route('usersignup')}}" class="font-bold hover:underline" style="color: var(--primary-dark);">Create Account</a>
                </p>
            </div>
        </div>

        <p class="text-center text-sm mt-8 opacity-50" style="color: var(--primary-dark);">
            &copy; {{ date('Y') }} Quiz Library. All rights reserved.
        </p>
    </div>
</section>
@endsection