@extends('layout.usermasterlayout')
@section('title', str_replace('-',' ',$name) ." MCQs with Answers - Practice Test")

@section('content')
<div class="px-4 py-12">
    <div class="mx-auto max-w-4xl">

        <nav class="mb-8 flex items-center gap-2 text-sm font-semibold opacity-60" aria-label="Breadcrumb">
            <a href="/" style="color: var(--text-dark);">Home</a>
            <i class="bi bi-chevron-right text-[10px]"></i>
            <a href="/user-categories" style="color: var(--text-dark);">Quizzes</a>
            <i class="bi bi-chevron-right text-[10px]"></i>
            <span class="font-bold" style="color: var(--primary-medium);">{{ str_replace('-',' ' ,$name )}}</span>
        </nav>

        <div class="card-premium overflow-hidden !shadow-2xl">
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col items-center justify-center p-10 text-center text-white md:w-2/5"
                     style="background-image: linear-gradient(135deg, #0f0c29, #1e1b4b 55%, #312e81);">
                    <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-2xl border border-white/20 bg-white/10">
                        <i class="bi bi-journal-check text-4xl"></i>
                    </div>
                    <h2 class="mb-2 text-3xl font-extrabold">{{ $quiz_count }}</h2>
                    <p class="text-sm font-bold uppercase tracking-widest text-indigo-100/70">Total MCQs</p>

                    <div class="mt-8 w-full border-t border-white/10 pt-8 text-indigo-100/60">
                        <p class="text-[10px] italic">Verified for 2026 Standards</p>
                    </div>
                </div>

                <div class="p-8 md:w-3/5 md:p-12">
                    <span class="badge-premium mb-4">Online Practice Module</span>

                    <h1 class="mb-4 text-3xl font-extrabold md:text-4xl" style="color: var(--text-dark);">
                        {{ str_replace('-',' ' ,$name )}} <span class="text-gradient">MCQs</span>
                    </h1>

                    <p class="mb-8 leading-relaxed text-gray-500">
                        Master your knowledge in <span class="font-bold text-gray-800">{{ str_replace('-',' ' ,$name )}}</span>.
                        This module is curated by experts to help you prepare for academic exams and professional interviews.
                    </p>

                    <div class="mb-10 rounded-2xl border-2 p-6" style="background-color: var(--bg-cream); border-color: var(--accent-tan);">
                        <h3 class="mb-4 flex items-center gap-2 text-sm font-extrabold uppercase tracking-wider" style="color: var(--text-dark);">
                            <i class="bi bi-exclamation-octagon-fill" style="color: var(--primary-medium);"></i> Important Rules:
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3 text-sm font-semibold">
                                <i class="bi bi-1-circle-fill mt-0.5" style="color: var(--primary-medium);"></i>
                                <span>You can only select an answer once. Once marked, your choice cannot be changed.</span>
                            </li>
                            <li class="flex items-start gap-3 text-sm font-semibold">
                                <i class="bi bi-2-circle-fill mt-0.5" style="color: var(--primary-medium);"></i>
                                <span>Instant feedback will be provided immediately after you click an option.</span>
                            </li>
                            <li class="flex items-start gap-3 text-sm font-semibold">
                                <i class="bi bi-3-circle-fill mt-0.5" style="color: var(--primary-medium);"></i>
                                <span>Detailed explanations are available for each question to enhance your learning.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="flex flex-col gap-4 pt-4 sm:flex-row">
                        @if(session('userdetails'))
                            <a href="{{ route('usermcqs', ['id'=>$quizid , 'name'=>$name]) }}"
                               class="btn-standard flex-1 justify-center !py-4 text-base">
                                Start Practice <i class="bi bi-rocket-takeoff"></i>
                            </a>
                        @else
                            <a href="{{ route('quizsign') }}"
                               class="btn-signup-accent flex-1 justify-center !py-4 text-base">
                                Join to Start <i class="bi bi-person-plus"></i>
                            </a>
                            <a href="{{ route('quizlogin') }}"
                               class="btn-standard flex-1 justify-center !py-4 text-base">
                                Login <i class="bi bi-box-arrow-in-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <p class="mt-10 text-center text-xl font-medium italic opacity-50">
            "Good luck! Every expert was once a beginner." <i class="bi bi-emoji-smile-fill" style="color: var(--primary-medium);"></i>
        </p>
    </div>
</div>
@endsection