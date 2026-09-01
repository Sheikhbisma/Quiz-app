@extends('layout.usermasterlayout')
@section('title', 'Reset Password | QuizSite')

@section('content')
<section class="relative flex min-h-screen items-center justify-center px-4 py-14">
    <div class="pointer-events-none absolute inset-0 hero-gradient opacity-40"></div>

    <div class="relative w-full max-w-md">
        <div class="card-premium p-8 md:p-10 !shadow-2xl">

            <div class="mb-10 text-center">
                @if(session('errors'))
                    <p class="mb-4 rounded-xl bg-red-50 px-4 py-3 text-sm font-bold text-red-600">{{ session('errors') }}</p>
                @endif
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl text-white shadow-lg"
                     style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                    <i class="bi bi-key-fill text-3xl"></i>
                </div>
                <h2 class="mb-2 text-2xl font-extrabold" style="color: var(--text-dark);">Enter New Password</h2>
                <p class="text-sm leading-relaxed opacity-50">Your new password must be different from the previously used one.</p>
            </div>

            <form action="{{ route('resetPassword') }}" id="resetForm" method="POST" class="space-y-8">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="relative">
                    <label class="absolute -top-3 left-4 z-10 bg-white px-2 text-xs font-bold text-slate-500">Password</label>
                    <div class="flex items-center rounded-xl border-2 px-4 py-3 transition-all focus-within:border-indigo-500" style="border-color: var(--accent-tan);">
                        <i class="bi bi-lock me-3 text-gray-400"></i>
                        <input id="password" type="password" name="password" placeholder="••••••••••••"
                               class="w-full bg-transparent text-sm outline-none" style="color: var(--text-dark);" required>
                    </div>
                </div>

                <div class="relative">
                    <label class="absolute -top-3 left-4 z-10 bg-white px-2 text-xs font-bold text-slate-500">Confirm Password</label>
                    <div class="flex items-center rounded-xl border-2 px-4 py-3 transition-all focus-within:border-indigo-500" style="border-color: var(--accent-tan);">
                        <i class="bi bi-lock me-3 text-gray-400"></i>
                        <input id="confirmPassword" type="password" name="conPass" placeholder="••••••••••••"
                               class="w-full bg-transparent text-sm outline-none" style="color: var(--text-dark);" required>
                    </div>
                    <p id="errorMessage" class="mt-1 text-xs font-bold text-red-500 hidden"></p>
                </div>

                <button type="submit" class="btn-standard w-full !py-4">
                    Continue <i class="bi bi-check-lg"></i>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    const form = document.getElementById('resetForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const errorMessage = document.getElementById('errorMessage');

    confirmPassword.addEventListener('input', validatePasswords);
    password.addEventListener('input', validatePasswords);

    function validatePasswords() {
        const p = password.value;
        const c = confirmPassword.value;

        if (p === '' && c === '') {
            errorMessage.classList.add('hidden');
            confirmPassword.classList.remove('!border-red-500');
            return;
        }
        if (p === '' && c !== '') {
            errorMessage.classList.remove('hidden');
            errorMessage.textContent = 'Please enter password first';
            return;
        }
        if (p === c) {
            errorMessage.classList.add('hidden');
        } else if (c !== '') {
            errorMessage.classList.remove('hidden');
            errorMessage.textContent = 'Passwords do not match';
        }
    }
</script>
@endsection