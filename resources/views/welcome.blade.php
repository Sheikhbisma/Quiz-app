@extends('layout.usermasterlayout')
@section('title', 'Free General Knowledge Test Online | Interactive Quizzes & Trivia')
@section('content')

<div class="hero-gradient border-b" style="border-color: var(--accent-tan);">
    <div class="mx-auto max-w-7xl px-4 py-20 md:py-24 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <span class="badge-premium mb-6 !bg-white/70 shadow-sm">
                <i class="bi bi-mortarboard-fill"></i> 2026 Exam Ready
            </span>
            <h1 class="mb-6 text-4xl font-extrabold leading-tight tracking-tight md:text-6xl" style="color: var(--text-dark);">
                Master <span class="text-gradient">General Knowledge</span> with Free Quizzes
            </h1>
            <p class="mx-auto mb-10 max-w-2xl text-lg leading-relaxed opacity-70 md:text-xl" style="color: var(--text-dark);">
                Boost your brainpower with interactive quizzes. From science to history, explore
                1000+ questions designed for competitive exams and fun learning.
            </p>

            <div class="mx-auto max-w-2xl">
                <form action="{{ route('searchQuiz') }}" method="GET" class="relative">
                    <input type="text" name="query" placeholder="Search quizzes and press Enter..."
                           class="input-premium !rounded-2xl !border-transparent !bg-white !py-4 !pl-5 !pr-28 !text-base shadow-xl"
                           required>
                    <button type="submit" class="btn-standard absolute right-2 top-2 !px-6 !py-2.5">
                        <i class="bi bi-search"></i> Search
                    </button>
                </form>
                <div class="mt-5 flex flex-wrap items-center justify-center gap-2 text-xs opacity-60" style="color: var(--text-dark);">
                    <span class="me-1 italic">Popular:</span>
                    @foreach(['Current Affairs', 'World History', 'General Science', 'Islamic Studies'] as $tag)
                        <span class="rounded-full border px-3 py-1 font-semibold" style="border-color: var(--accent-tan); background-color: rgba(255,255,255,0.7);">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mb-20 grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="card-premium flex items-start gap-4 p-6">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-white shadow-lg"
                 style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                <i class="bi bi-lightning-charge-fill text-xl"></i>
            </div>
            <div>
                <h3 class="font-extrabold" style="color: var(--text-dark);">Instant Results</h3>
                <p class="mt-1 text-sm opacity-60">Get your score immediately after completing the quiz.</p>
            </div>
        </div>
        <div class="card-premium flex items-start gap-4 p-6">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-white shadow-lg"
                 style="background-image: linear-gradient(120deg, #f59e0b, #fbbf24);">
                <i class="bi bi-gift-fill text-xl"></i>
            </div>
            <div>
                <h3 class="font-extrabold" style="color: var(--text-dark);">100% Free</h3>
                <p class="mt-1 text-sm opacity-60">No registration required to start practicing today.</p>
            </div>
        </div>
        <div class="card-premium flex items-start gap-4 p-6">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-white shadow-lg"
                 style="background-image: linear-gradient(120deg, #2563eb, #06b6d4);">
                <i class="bi bi-journal-bookmark-fill text-xl"></i>
            </div>
            <div>
                <h3 class="font-extrabold" style="color: var(--text-dark);">Study Categories</h3>
                <p class="mt-1 text-sm opacity-60">Wide range of topics for competitive preparation.</p>
            </div>
        </div>
    </div>

    <div class="mb-10 flex items-center gap-3">
        <span class="inline-block h-10 w-1.5 rounded-full" style="background-image: linear-gradient(180deg, #4338ca, #7c3aed);"></span>
        <div>
            <p class="section-eyebrow">Browse</p>
            <h2 class="text-3xl font-extrabold" style="color: var(--text-dark);">Explore Quiz Categories</h2>
        </div>
    </div>

    @if($categories->isEmpty())
        <div class="rounded-3xl border-2 border-dashed bg-white py-20 text-center" style="border-color: var(--accent-tan);">
            <i class="bi bi-inboxes text-5xl opacity-30"></i>
            <p class="mt-4 text-xl font-medium opacity-60">No quiz categories available yet.</p>
        </div>
    @else
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($categories as $category)
            <div class="card-premium group flex flex-col overflow-hidden">
                <div class="h-2" style="background-image: linear-gradient(90deg, #4338ca, #7c3aed, #f59e0b);"></div>
                <div class="flex grow flex-col p-8">
                    <span class="badge-premium">{{ $category->quizzes_count }} Quizzes</span>
                    <h3 class="mb-3 mt-5 text-2xl font-extrabold capitalize" style="color: var(--text-dark);">
                        {{ $category->category }}
                    </h3>
                    <p class="mb-6 text-sm leading-relaxed opacity-60">
                        Practice free MCQs and enhance your knowledge skills.
                    </p>
                    <a href="{{ route('userquizlist', ['id' => $category->id, 'category' => str_replace(' ','-',$category->category)]) }}"
                       class="btn-standard mt-auto block w-full text-center">
                        Show Quiz <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

<div class="hero-gradient">
    <div class="mx-auto max-w-4xl px-4 py-16 text-center">
        <h2 class="mb-4 text-2xl font-extrabold md:text-3xl" style="color: var(--text-dark);">Why Practice General Knowledge Quizzes?</h2>
        <p class="leading-relaxed opacity-70" style="color: var(--text-dark);">
            General Knowledge is a crucial part of every competitive examination, including CSS, NTS, PPSC, and FPSC.
            Our platform provides curated <strong>General Knowledge MCQs with answers</strong>, covering Geography,
            Science, Current Affairs, and Sports.
        </p>
        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            @foreach(['CSS', 'PMS', 'NTS', 'FPSC', 'PPSC'] as $exam)
                <span class="rounded-xl border bg-white/70 px-5 py-2 text-sm font-bold backdrop-blur" style="border-color: var(--accent-tan); color: var(--primary-dark);">#{{ $exam }}</span>
            @endforeach
        </div>
    </div>
</div>

@endsection