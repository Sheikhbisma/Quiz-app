@extends('layout.usermasterlayout')
@section('title', 'Search Results | QuizSite')

@section('content')
<div class="px-4 py-10">
    <div class="mx-auto max-w-6xl">

        <div class="mb-12 text-center">
            <p class="section-eyebrow mb-3">Search</p>
            <h1 class="mb-4 text-4xl font-extrabold md:text-5xl" style="color: var(--text-dark);">
                Search <span class="text-gradient">Results</span>
            </h1>
            <div class="inline-block rounded-full border-2 bg-white px-6 py-2" style="border-color: var(--accent-tan);">
                <p class="text-sm font-medium opacity-70">
                    Found <span class="text-lg font-extrabold" style="color: var(--primary-medium);">{{ $searchResultCount }}</span>
                    quizzes for "<span class="italic">{{ $searchName }}</span>"
                </p>
            </div>
        </div>

        @if($searchQuiz->isEmpty())
            <div class="mx-auto max-w-lg rounded-3xl border-2 border-dashed bg-white py-20 px-6 text-center" style="border-color: var(--accent-tan);">
                <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-indigo-50 text-4xl">
                    <i class="bi bi-search text-indigo-400"></i>
                </div>
                <h2 class="mb-2 text-2xl font-bold" style="color: var(--text-dark);">No quizzes found!</h2>
                <p class="mx-auto mb-8 max-w-md opacity-60">
                    We couldn't find anything matching your keywords. Try checking your spelling or use more general terms.
                </p>
                <a href="{{ url('/') }}" class="btn-signup-accent inline-block">Clear Search & Restart</a>
            </div>
        @else
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($searchQuiz as $val)
                    <div class="card-premium group flex flex-col">
                        <div class="flex grow flex-col p-6">
                            <div class="mb-5 flex items-center justify-between">
                                <span class="badge-premium !bg-indigo-50">{{ $val->category->category }}</span>
                                <span class="flex items-center gap-1 text-xs font-bold" style="color: var(--primary-medium);">
                                    <i class="bi bi-list-check"></i> {{ $val->mcq_count }} MCQs
                                </span>
                            </div>

                            <h3 class="mb-3 text-xl font-extrabold capitalize transition-colors group-hover:text-indigo-600" style="color: var(--text-dark);">
                                {{ $val->quiz_name }}
                            </h3>

                            <p class="mb-4 text-sm leading-relaxed opacity-60">
                                Master this module with our expert-curated questions. Learning should be easy and enjoyable.
                            </p>
                        </div>

                        <div class="mt-auto px-6 pb-6">
                            <a href="{{ route('startquiz', ['id'=>$val->id , 'quizname'=>$val->quiz_name]) }}"
                               class="btn-standard block w-full text-center">
                                Start Quiz <i class="bi bi-rocket-takeoff"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-16 text-center">
            <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 font-bold transition-all hover:gap-4" style="color: var(--primary-medium);">
                <i class="bi bi-arrow-left"></i> Go Back
            </a>
        </div>

    </div>
</div>
@endsection