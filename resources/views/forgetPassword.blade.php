@extends('layout.usermasterlayout')
@section('title', 'Forgot Password | QuizSite')

@section('content')
<section class="relative flex min-h-screen items-center justify-center px-4 py-14">
    <div class="pointer-events-none absolute inset-0 hero-gradient opacity-40"></div>

    <div class="relative w-full max-w-lg">
        <div class="card-premium p-8 md:p-12 !shadow-2xl text-center">
            <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl text-white shadow-lg"
                 style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                <i class="bi bi-shield-lock text-3xl"></i>
            </div>

            <h2 class="mb-3 text-3xl font-extrabold" style="color: var(--text-dark);">Forgot Password</h2>
            <p class="mb-8 text-sm leading-relaxed opacity-60">
                Enter your registered email address and we'll send you a password reset link.
            </p>

            <form action="{{ route('forgotPassword') }}" method="POST" class="space-y-6 text-left">
                @csrf
                <div>
                    <label for="email" class="mb-2 block text-sm font-bold" style="color: var(--text-dark);">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your registered email"
                           class="input-premium" required>
                </div>

                <button type="submit" class="btn-standard w-full">
                    <i class="bi bi-envelope-arrow-up"></i> Reset my Password
                </button>
            </form>

            <div class="mt-8 border-t pt-6" style="border-color: var(--accent-tan);">
                <a href="{{ route('userlogin') }}" class="text-sm font-bold transition hover:underline" style="color: var(--primary-medium);">
                    <i class="bi bi-arrow-left me-1"></i> Back to Login
                </a>
            </div>
        </div>
    </div>
</section>
@endsection