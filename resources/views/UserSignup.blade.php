@extends('layout.usermasterlayout')
@section('title', 'Create Free Account | QuizSite')

@section('content')
<section class="relative flex min-h-screen items-center justify-center py-14">
    <div class="pointer-events-none absolute inset-0 hero-gradient opacity-40"></div>

    <div class="relative w-full max-w-2xl px-4">
        <div class="card-premium p-8 md:p-10 !shadow-2xl">

            <div class="mb-8 text-center">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl text-white shadow-lg"
                     style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                    <i class="bi bi-person-plus-fill text-3xl"></i>
                </div>
                <h1 class="text-3xl font-extrabold" style="color: var(--text-dark);">Create Account</h1>
                <p class="mt-2 text-sm opacity-60">Join our community and start practicing today.</p>
            </div>

            <form action="{{ route('usersign') }}" id="signupForm" class="space-y-6" method="post">
                @csrf

                <div class="mb-4 flex items-center gap-4">
                    <span class="text-xs font-extrabold uppercase tracking-widest opacity-50" style="color: var(--text-dark);">Login Credentials</span>
                    <div class="h-px grow opacity-20" style="background-color: var(--text-dark);"></div>
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <label for="username" class="mb-2 block text-sm font-bold" style="color: var(--text-dark);">Username</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-person"></i></span>
                            <input type="text" id="username" name="username" required
                                   class="input-premium !pl-11" placeholder="johndoe" value="{{ old('username') }}">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-bold" style="color: var(--text-dark);">Email Address</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-envelope"></i></span>
                            <input type="email" id="email" name="email" required
                                   class="input-premium !pl-11" placeholder="you@example.com" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-1 text-xs font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-bold" style="color: var(--text-dark);">Password</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-shield-lock"></i></span>
                            <input type="password" id="password" name="password" required minlength="6"
                                   class="input-premium !pl-11" placeholder="••••••••">
                        </div>
                    </div>

                    <div>
                        <label for="confirmPassword" class="mb-2 block text-sm font-bold" style="color: var(--text-dark);">Confirm Password</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40"><i class="bi bi-shield-check"></i></span>
                            <input type="password" id="confirmPassword" name="confirmPassword" required
                                   class="input-premium !pl-11" placeholder="••••••••">
                        </div>
                        <p id="errorMessage" class="mt-1 text-xs font-bold text-red-500 hidden"></p>
                    </div>
                </div>

                <button type="submit" class="btn-standard w-full !py-4 text-base">
                    Create My Account <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            <p class="mt-8 text-center text-sm opacity-60">
                Already have an account?
                <a href="{{ route('userlogin') }}" class="font-bold hover:underline" style="color: var(--primary-medium);">Login here</a>
            </p>
        </div>
    </div>
</section>
@endsection