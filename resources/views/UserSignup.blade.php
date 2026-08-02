@extends('layout.usermasterlayout')

@section('content')
<section class="flex justify-center items-center min-h-screen py-10" style="background-color: var(--bg-cream);">
    <div class="bg-white w-full max-w-2xl mx-4 rounded-3xl shadow-xl border p-8 md:p-10" style="border-color: var(--accent-tan);">
        
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 shadow-sm" style="background-color: var(--bg-cream);">
                <i class="bi bi-person-plus-fill text-3xl" style="color: var(--primary-dark);"></i>
            </div>
            <h1 class="text-3xl font-extrabold" style="color: var(--primary-dark);">Create Account</h1>
            <p class="opacity-70 mt-2 text-sm" style="color: var(--text-dark);">Join our community and start practicing today.</p>
        </div>

        <form action="{{route('usersign')}}" id="signupForm" class="space-y-6" method="post">
            @csrf

            <div class="flex items-center gap-4 mb-4">
                <span class="text-xs font-bold uppercase tracking-widest opacity-50" style="color: var(--primary-dark);">Login Credentials</span>
                <div class="h-px grow opacity-20" style="background-color: var(--primary-dark);"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="username" class="block text-sm font-bold mb-2" style="color: var(--primary-dark);">Username</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-person"></i></span>
                        <input type="text" id="username" name="username" required
                            class="w-full pl-11 pr-4 py-2.5 border-2 rounded-xl outline-none transition-all focus:ring-4 focus:ring-stone-100"
                            style="border-color: var(--accent-tan); background-color: var(--bg-cream);"
                            placeholder="johndoe" value="{{ old('username') }}">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold mb-2" style="color: var(--primary-dark);">Email Address</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" required
                            class="w-full pl-11 pr-4 py-2.5 border-2 rounded-xl outline-none transition-all focus:ring-4 focus:ring-stone-100"
                            style="border-color: var(--accent-tan); background-color: var(--bg-cream);"
                            placeholder="you@example.com" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold mb-2" style="color: var(--primary-dark);">Password</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-shield-lock"></i></span>
                        <input type="password" id="password" name="password" required minlength="6"
                            class="w-full pl-11 pr-4 py-2.5 border-2 rounded-xl outline-none transition-all focus:ring-4 focus:ring-stone-100"
                            style="border-color: var(--accent-tan); background-color: var(--bg-cream);"
                            placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <label for="confirmPassword" class="block text-sm font-bold mb-2" style="color: var(--primary-dark);">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-shield-check"></i></span>
                        <input type="password" id="confirmPassword" name="confirmPassword" required
                            class="w-full pl-11 pr-4 py-2.5 border-2 rounded-xl outline-none transition-all focus:ring-4 focus:ring-stone-100"
                            style="border-color: var(--accent-tan); background-color: var(--bg-cream);"
                            placeholder="••••••••">
                    </div>
                    <p id="errorMessage" class="text-red-500 text-xs mt-1 hidden"></p>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-standard w-full! py-3.5 text-lg shadow-lg flex items-center justify-center gap-2 transform transition hover:scale-[1.01]">
                    Create My Account <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </form>

        <p class="text-center text-sm mt-8 opacity-70" style="color: var(--text-dark);">
            Already have an account? 
            <a href="{{route('userlogin')}}" class="font-bold hover:underline" style="color: var(--primary-dark);">Login here</a>
        </p>
    </div>
</section>
@endsection