@extends('layout.usermasterlayout')

@section('content')
<div class="min-h-screen py-10 px-4" style="background-color: var(--bg-cream);">
    <div class="max-w-6xl mx-auto">

        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4" style="color: var(--primary-dark);">
                Search <span style="color: var(--primary-medium);">Results</span> 🎯
            </h1>
            <div class="inline-block px-6 py-2 rounded-full border-2" style="border-color: var(--accent-tan); background-color: white;">
                <p class="text-sm font-medium" style="color: var(--text-dark);">
                    Found <span class="text-lg font-bold" style="color: var(--primary-dark);">{{$searchResultCount}}</span> 
                    quizzes for "<span class="italic">{{$searchName}}</span>"
                </p>
            </div>
        </div>

        @if($searchQuiz->isEmpty())
            <div class="text-center bg-white rounded-3xl shadow-sm border-2 border-dashed py-20 px-6" style="border-color: var(--accent-tan);">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6" style="background-color: var(--bg-cream);">
                    <span class="text-4xl">🕵️‍♂️</span>
                </div>
                <h2 class="text-2xl font-bold mb-2" style="color: var(--primary-dark);">No quizzes found!</h2>
                <p class="opacity-70 max-w-md mx-auto mb-8" style="color: var(--text-dark);">
                    We couldn't find anything matching your keywords. Try checking your spelling or use more general terms.
                </p>
                <a href="{{ url('/') }}" class="btn-signup-accent inline-block">
                    Clear Search & Restart
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($searchQuiz as $val)
                    <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl border transition-all duration-300 hover:-translate-y-2 flex flex-col overflow-hidden group" style="border-color: var(--accent-tan);">
                        
                        <div class="p-6 grow">
                            <div class="flex justify-between items-center mb-5">
                                <span class="text-[10px] uppercase tracking-widest font-bold px-3 py-1 rounded-lg" style="background-color: var(--bg-cream); color: var(--primary-dark); border: 1px solid var(--accent-tan);">
                                    {{$val->category->category}}
                                </span>
                                <span class="flex items-center gap-1 text-xs font-bold opacity-60" style="color: var(--primary-dark);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    {{$val->mcq_count}} MCQs
                                </span>
                            </div>

                            <h3 class="text-xl font-extrabold mb-3 line-clamp-2 transition-colors group-hover:text-primary-medium" style="color: var(--primary-dark);">
                                {{$val->quiz_name}}
                            </h3>
                            
                            <p class="text-sm leading-relaxed opacity-70 line-clamp-3 mb-4" style="color: var(--text-dark);">
                                Master this module with our expert-curated questions. Designed specifically for competitive exam patterns.
                            </p>
                        </div>

                        <div class="px-6 pb-6">
                            <a href="{{ route('startquiz', ['id'=>$val->id , 'quizname'=>$val->quiz_name]) }}" 
                               class="btn-standard w-full block text-center py-3 transform group-hover:scale-105">
                                Start Quiz 🚀
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-16 text-center">
            <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 font-bold transition-all hover:gap-4" style="color: var(--primary-dark);">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Go Back
            </a>
        </div>

    </div>
</div>
@endsection