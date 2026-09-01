@extends('layout.usermasterlayout')
@section('title', str_replace('-',' ',$category) ." MCQs with Answers | Online Practice Test")
@section('content')

<div class="hero-gradient border-b" style="border-color: var(--accent-tan);">
    <div class="mx-auto max-w-7xl px-4 py-12">
        <nav class="mb-6 flex items-center gap-2 text-xs font-bold uppercase tracking-widest opacity-60" style="color: var(--text-dark);">
            <a href="/" class="hover:opacity-70">Home</a>
            <span class="opacity-50">/</span>
            <a href="{{ route('userCategoryPage') }}" class="hover:opacity-70">Categories</a>
            <span class="opacity-50">/</span>
            <span class="opacity-100" style="color: var(--primary-dark);">{{ str_replace('-',' ',$category) }}</span>
        </nav>

        <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
            <div>
                <h1 class="text-3xl font-extrabold md:text-4xl" style="color: var(--text-dark);">
                    {{ str_replace('-',' ',$category) }} <span class="text-gradient">Quizzes</span>
                </h1>
                <p class="mt-2 text-sm opacity-70 md:text-base" style="color: var(--text-dark);">
                    Explore our curated collection of {{ str_replace('-',' ',$category) }} MCQs for competitive exams like CSS, NTS, and PPSC.
                </p>
            </div>
            <div class="flex gap-2">
                <span class="badge-premium !bg-white/80 shadow-sm">
                    <i class="bi bi-patch-check-fill"></i> Verified Content
                </span>
                <span class="badge-premium !bg-white/80 shadow-sm">{{ $quiz->count() }} Modules</span>
            </div>
        </div>
    </div>
</div>

<div class="mx-auto mt-10 max-w-7xl px-4">
    <div class="grid grid-cols-1 gap-10 lg:grid-cols-4">

        <div class="lg:col-span-3">
            @if(!$quiz->isEmpty())
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    @foreach($quiz as $q)
                        <div class="card-premium group flex flex-col">
                            <div class="flex grow flex-col p-6">
                                <div class="mb-4 flex items-start justify-between">
                                    <span class="badge-premium !bg-indigo-50">Ref #{{ $q->id }}</span>
                                    <span class="flex items-center gap-1 text-xs font-bold" style="color: var(--primary-medium);">
                                        <i class="bi bi-list-check"></i> {{ $q->mcq_count }} MCQs
                                    </span>
                                </div>

                                <h3 class="mb-3 text-xl font-extrabold capitalize transition-colors group-hover:text-indigo-600" style="color: var(--text-dark);">
                                    {{ str_replace('-',' ',$q->quiz_name) }}
                                </h3>
                                <p class="mb-4 text-sm leading-relaxed opacity-60">
                                    Practice the latest {{ strtolower($category) }} questions. Essential for aspirants of FPSC and government job tests.
                                </p>
                            </div>

                            <div class="mt-auto border-t px-6 py-4" style="border-color: var(--accent-tan);">
                                <a href="{{ route('startquiz', ['id'=>$q->id , 'quizname'=> str_replace(' ','-',$q->quiz_name)]) }}"
                                   class="btn-standard w-full text-center">
                                    Take Free Test <i class="bi bi-arrow-right-short text-lg"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded-3xl border-2 border-dashed bg-white p-16 text-center" style="border-color: var(--accent-tan);">
                    <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-indigo-50 text-indigo-400">
                        <i class="bi bi-journal-x text-4xl"></i>
                    </div>
                    <h2 class="mb-2 text-2xl font-extrabold" style="color: var(--text-dark);">No Quizzes Found</h2>
                    <p class="text-slate-500">We are currently updating this category. Please check back shortly.</p>
                </div>
            @endif
        </div>

        <div class="space-y-8">
            <div class="card-premium p-6">
                <h4 class="mb-4 flex items-center gap-2 font-extrabold" style="color: var(--text-dark);">
                    <span class="inline-block h-5 w-1.5 rounded-full" style="background-image: linear-gradient(180deg, #4338ca, #7c3aed);"></span>
                    Exam Preparation
                </h4>
                <p class="mb-4 text-xs leading-relaxed opacity-60">
                    Our {{ str_replace('-',' ',$category) }} MCQs cover the complete syllabus for competitive exams in Pakistan.
                </p>
                <ul class="space-y-2 text-xs font-bold" style="color: var(--primary-medium);">
                    <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> CSS / PMS Specialist</li>
                    <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> NTS / GAT Pattern</li>
                    <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> Updated 2026 Material</li>
                </ul>
            </div>

            <div class="rounded-3xl p-6 text-white shadow-xl" style="background-image: linear-gradient(135deg, #4338ca, #7c3aed);">
                <h4 class="mb-2 text-lg font-extrabold"><i class="bi bi-graph-up-arrow"></i> Want to Track Progress?</h4>
                <p class="mb-5 text-xs text-indigo-100/90">Create a free account to save your results and track your learning journey.</p>
                <a href="/user-signup" class="btn-signup-accent block w-full text-center">Join Now Free</a>
            </div>
        </div>

    </div>

    <div class="mt-20 rounded-3xl bg-white p-10 shadow-sm" style="border: 1px solid var(--accent-tan);">
        <h2 class="mb-6 text-2xl font-extrabold" style="color: var(--text-dark);">Mastering {{ str_replace('-',' ',$category) }} via Interactive Testing</h2>
        <div class="grid gap-8 text-sm leading-relaxed opacity-60 md:grid-cols-2">
            <p>
                General Knowledge and specialized subjects like <strong>{{ str_replace('-',' ',$category) }}</strong> are fundamental
                for success in any academic or professional screening. By practicing these interactive quizzes, you reinforce your
                memory and learn how to manage time during actual exams.
            </p>
            <p>
                Each quiz in our <strong>{{ $category }} section</strong> is meticulously designed to reflect current exam trends.
                Whether you are preparing for PPSC, FPSC, or university entrance tests, our free resource is here to help you
                achieve excellence without any subscription cost.
            </p>
        </div>
    </div>
</div>

@endsection