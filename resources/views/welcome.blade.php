@extends('layout.usermasterlayout')
@section('title', 'Free General Knowledge Test Online | Interactive Quizzes & Trivia')
@section('content')

<div class="min-h-screen" style="background-color: var(--bg-cream);">
    
    <div class="py-20 px-4 border-b" style="background-color: white; border-color: var(--accent-tan);">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight" style="color: var(--primary-dark);">
                Free <span style="color: var(--primary-sage);">General Knowledge</span> Test Online
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed opacity-90" style="color: var(--primary-dark);">
                Boost your brainpower with our interactive quizzes. From science to history, explore 1000+ questions designed for competitive exams and fun learning.
            </p>

            <div class="max-w-2xl mx-auto">
                <form action="{{route('searchQuiz')}}" method="GET" class="relative">
                    <input 
                        type="text" 
                        name="query"  
                        placeholder="Search Quizzez and press Enter Or Click Search" 
                        class="w-full px-6 py-5 rounded-2xl shadow-sm text-gray-800 text-lg outline-none border-2 transition-all focus:border-sage"
                        style="border-color: var(--accent-tan); background-color: var(--bg-cream);"
                        required
                    >
                    <button type="submit" class="btn-standard absolute right-3 top-3 py-2.5!">
                        Search
                    </button>
                </form>
                <div class="mt-4 flex flex-wrap justify-center gap-2 text-xs italic" style="color: var(--primary-dark);">
                    <span>Popular: Current Affairs, World History, General Science, Islamic Studies</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            <div class="flex items-start gap-4 p-6 rounded-2xl bg-white shadow-sm border" style="border-color: var(--accent-tan);">
                <div class="p-3 rounded-lg text-white" style="background-color: var(--primary-medium);">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold" style="color: var(--primary-dark);">Instant Results</h3>
                    <p class="text-sm opacity-75">Get your score immediately after completing the quiz.</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-6 rounded-2xl bg-white shadow-sm border" style="border-color: var(--accent-tan);">
                <div class="p-3 rounded-lg text-white" style="background-color: var(--primary-medium);">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold" style="color: var(--primary-dark);">100% Free</h3>
                    <p class="text-sm opacity-75">No registration required to start practicing today.</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-6 rounded-2xl bg-white shadow-sm border" style="border-color: var(--accent-tan);">
                <div class="p-3 rounded-lg text-white" style="background-color: var(--primary-medium);">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h3 class="font-bold" style="color: var(--primary-dark);">Study Categories</h3>
                    <p class="text-sm opacity-75">Wide range of topics for competitive preparation.</p>
                </div>
            </div>
        </div>

        <h2 class="text-3xl font-bold mb-10 flex items-center gap-3" style="color: var(--primary-dark);">
            <span class="w-2 h-10 rounded-full" style="background-color: var(--primary-dark);"></span>
            Explore Quiz Categories
        </h2>
        
        @if($categories->isEmpty())
            <div class="text-center py-20 bg-white rounded-3xl border-2 border-dashed" style="border-color: var(--accent-tan);">
                <p class="text-xl font-medium" style="color: var(--primary-sage);">No quiz categories available yet.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($categories as $category)
                <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border overflow-hidden" style="border-color: var(--accent-tan);">
                    <div class="h-2" style="background-color: var(--primary-sage);"></div>
                    <div class="p-8">
                        <span class="text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest border" style="color: var(--primary-dark); border-color: var(--primary-dark);">
                            {{ $category->quizzes_count }} Quizzes
                        </span>
                        
                        <h3 class="text-2xl font-bold mt-4 mb-3" style="color: var(--primary-dark);">
                            {{ $category->category }}
                        </h3>
                        
                        <p class="text-sm leading-relaxed mb-6 opacity-70" style="color: var(--primary-dark);">
                            Practice free  MCQs and enhance your knowledge skills.
                        </p>

                        <a href="{{ route('userquizlist', ['id' => $category->id, 'category' => str_replace(' ','-',$category->category)]) }}"
                           class="btn-standard block text-center w-full">
                            Show Quiz 
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="border-t mt-20 py-20 px-4" style="background-color: white; border-color: var(--accent-tan);">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6" style="color: var(--primary-dark);">Why Practice General Knowledge Quizzes?</h2>
            <p class="leading-relaxed opacity-80" style="color: var(--primary-dark);">
                General Knowledge is a crucial part of every competitive examination, including CSS, NTS, PPSC, and FPSC. Our platform provides a curated list of **General Knowledge MCQs with answers**, covering topics like Geography, Science, Current Affairs, and Sports.
            </p>
        </div>
    </div>

</div>

@endsection