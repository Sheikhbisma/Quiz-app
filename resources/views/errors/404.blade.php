@extends('layout.usermasterlayout')
@section('title', 'Page Not Found - 404 Error')

@section('content')
<div class="px-4 py-16">
    <div class="mx-auto max-w-lg text-center pt-10">
        <p class="text-[7rem] font-black leading-none md:text-[9rem]" style="background-image: linear-gradient(120deg, #4338ca, #7c3aed, #f59e0b); -webkit-background-clip: text; background-clip: text; color: transparent; line-height: 1;">
            404
        </p>

        <h2 class="mt-2 text-3xl font-extrabold" style="color: var(--text-dark);"><i class="bi bi-emoji-frown me-2" style="color: var(--primary-medium);"></i>Oops! This Page is Missing</h2>
        <p class="mx-auto mt-3 max-w-md text-base leading-relaxed opacity-60">
            The quiz or result you are looking for might have been moved, deleted, or the URL might be incorrect.
        </p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <a href="{{ url('/') }}" class="btn-standard">
                <i class="bi bi-house-door-fill"></i> Back to Home
            </a>
            <a href="{{ route('userCategoryPage') }}" class="btn-outline">
                <i class="bi bi-grid-fill"></i> Browse Categories
            </a>
        </div>
    </div>
</div>
@endsection