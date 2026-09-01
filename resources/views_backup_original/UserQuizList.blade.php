@extends('layout.usermasterlayout')
@section('title', str_replace('-',' ',$category) ." MCQs with Answers | Online Practice Test")
@section('content')

<div class="min-h-screen pb-16" style="background-color: var(--bg-cream);">
    
    <div class="bg-white border-b py-8" style="border-color: var(--accent-tan);">
        <div class="container mx-auto px-4">
            <nav class="flex mb-4 text-xs font-medium uppercase tracking-widest opacity-60" style="color: var(--primary-dark);">
                <a href="/" class="hover:underline">Home</a>
                <span class="mx-2">/</span>
                <a href="{{route('userCategoryPage')}}"><span class="opacity-100">Categories</span></a>
                <span class="mx-2">/</span>
                <span style="color: var(--primary-sage);">{{ str_replace('-',' ',$category) }}</span>
            </nav>
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold" style="color: var(--primary-dark);">
                        {{ str_replace('-',' ',$category) }} <span style="color: var(--primary-sage);">Quizzes</span>
                    </h1>
                    <p class="mt-2 text-sm md:text-base opacity-80" style="color: var(--primary-dark);">
                        Explore our curated collection of {{ str_replace('-',' ',$category) }} MCQs for competitive exams like CSS, NTS, and PPSC.
                    </p>
                </div>
                <div class="flex gap-2">
                    <span class="px-3 py-1 rounded-full text-xs font-bold border" style="border-color: var(--primary-dark); color: var(--primary-dark);">
                        Verified Content
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs font-bold border" style="border-color: var(--primary-sage); color: var(--primary-sage);">
                        {{ $quiz->count() }} Modules
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-10 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            
            <div class="lg:col-span-3">
                @if(!$quiz->isEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($quiz as $q)
                            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border overflow-hidden flex flex-col" style="border-color: var(--accent-tan);">
                                <div class="p-6 grow">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="text-[10px] font-bold px-2 py-1 rounded bg-stone-100 text-stone-500 uppercase tracking-tighter">
                                            Ref #{{ $q->id }}
                                        </span>
                                        <div class="flex items-center text-[10px] font-bold" style="color: var(--primary-sage);">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h.01a1 1 0 100-2H10zm3 0a1 1 0 000 2h.01a1 1 0 100-2H13zM7 13a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h.01a1 1 0 100-2H10zm3 0a1 1 0 000 2h.01a1 1 0 100-2H13z" clip-rule="evenodd"/></svg>
                                            {{ $q->mcq_count }} MCQs
                                        </div>
                                    </div>
                                    
                                    <h3 class="text-xl font-bold mb-3 transition-colors group-hover:text-sage" style="color: var(--primary-dark);">
                                        {{ str_replace('-',' ',$q->quiz_name ) }}
                                    </h3>
                                    <p class="text-sm opacity-70 leading-relaxed mb-4" style="color: var(--primary-dark);">
                                        Practice the latest {{ strtolower($category) }} questions. Essential for aspirants of FPSC and government job tests.
                                    </p>
                                </div>

                                <div class="px-6 py-4 border-t flex items-center justify-between bg-stone-50/50" style="border-color: var(--accent-tan);">
                                    <a href="{{ route('startquiz', ['id'=>$q->id , 'quizname'=> str_replace(' ','-',$q->quiz_name)]) }}" 
                                       class="btn-standard !w-full text-center py-2 flex items-center justify-center">
                                        Take Free Test <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-3xl border-2 border-dashed p-16 text-center" style="border-color: var(--accent-tan);">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-stone-100 text-stone-400 mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        </div>
                        <h2 class="text-2xl font-bold mb-2" style="color: var(--primary-dark);">No Quizzes Found</h2>
                        <p class="text-stone-500">We are currently updating this category. Please check back shortly.</p>
                    </div>
                @endif
            </div>

            <div class="space-y-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border" style="border-color: var(--accent-tan);">
                    <h4 class="font-bold mb-4 flex items-center gap-2" style="color: var(--primary-dark);">
                        <span class="w-1 h-5 rounded-full" style="background-color: var(--primary-sage);"></span>
                        Exam Preparation
                    </h4>
                    <p class="text-xs leading-relaxed opacity-80 mb-4" style="color: var(--primary-dark);">
                        Our {{ str_replace('-',' ',$category) }} MCQs cover the complete syllabus for competitive exams in Pakistan.
                    </p>
                    <ul class="text-xs space-y-2 font-bold" style="color: var(--primary-sage);">
                        <li class="flex items-center gap-2">✓ CSS / PMS Specialist</li>
                        <li class="flex items-center gap-2">✓ NTS / GAT Pattern</li>
                        <li class="flex items-center gap-2">✓ Updated 2026 Material</li>
                    </ul>
                </div>

                <div class="p-6 rounded-2xl text-white shadow-lg" style="background-color: var(--primary-dark);">
                    <h4 class="font-bold mb-2">Want to Track Progress?</h4>
                    <p class="text-xs opacity-80 mb-4">Create a free account to save your results and track your learning journey.</p>
                    <a href="/user-signup" class="btn-signup-accent !w-full block text-center py-2">Join Now</a>
                </div>
            </div>

        </div>

        <div class="mt-20 p-10 bg-white rounded-3xl border shadow-sm" style="border-color: var(--accent-tan);">
            <h2 class="text-2xl font-bold mb-6" style="color: var(--primary-dark);">Mastering {{ str_replace('-',' ',$category) }} via Interactive Testing</h2>
            <div class="grid md:grid-cols-2 gap-8 text-sm leading-relaxed opacity-80" style="color: var(--primary-dark);">
                <p>
                    General Knowledge and specialized subjects like <strong>{{ str_replace('-',' ',$category) }}</strong> are fundamental for success in any academic or professional screening. By practicing these interactive quizzes, you reinforce your memory and learn how to manage time during actual exams. 
                </p>
                <p>
                    Each quiz in our <strong>{{ $category }} section</strong> is meticulously designed to reflect current exam trends. Whether you are preparing for PPSC, FPSC, or university entrance tests, our free resource is here to help you achieve excellence without any subscription cost.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection