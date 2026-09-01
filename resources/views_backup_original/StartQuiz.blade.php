@extends('layout.usermasterlayout')
@section('title', str_replace('-',' ',$name) ." MCQs with Answers - Practice Test")

@section('content')
<div class="min-h-screen py-12 px-4" style="background-color: var(--bg-cream);">
    <div class="max-w-4xl mx-auto">
        
        <nav class="flex mb-8 opacity-70 text-sm font-medium" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="/" style="color: var(--primary-dark);">Home</a></li>
                <li style="color: var(--primary-dark);"><i class="bi bi-chevron-right text-[10px]"></i></li>
                <li><a href="/categories" style="color: var(--primary-dark);">Quizzes</a></li>
                <li style="color: var(--primary-dark);"><i class="bi bi-chevron-right text-[10px]"></i></li>
                <li style="color: var(--primary-medium);" class="font-bold">{{ str_replace('-',' ' ,$name )}}</li>
            </ol>
        </nav>

        <div class="bg-white rounded-4xl shadow-2xl border overflow-hidden flex flex-col md:flex-row shadow-stone-200/50" style="border-color: var(--accent-tan);">
            
            <div class="md:w-1/3 p-10 text-center flex flex-col justify-center items-center" style="background-color: var(--primary-dark);">
                <div class="w-20 h-20 rounded-2xl bg-white/10 flex items-center justify-center mb-6 border border-white/20">
                    <i class="bi bi-journal-check text-4xl text-white"></i>
                </div>
                <h2 class="text-white text-3xl font-bold mb-2">{{$quiz_count}}</h2>
                <p class="text-white/70 text-sm uppercase tracking-widest font-bold">Total MCQs</p>
                
                <div class="mt-8 pt-8 border-t border-white/10 w-full text-white/60">
                    <p class="text-[10px] italic">Verified for 2026 Standards</p>
                </div>
            </div>

            <div class="md:w-2/3 p-8 md:p-12">
                <span class="inline-block px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest mb-4" style="background-color: var(--bg-cream); color: var(--primary-dark); border: 1px solid var(--accent-tan);">
                    Online Practice Module
                </span>

                <h1 class="text-3xl md:text-4xl font-extrabold mb-4" style="color: var(--primary-dark);">
                    {{ str_replace('-',' ' ,$name )}} <span style="color: var(--primary-medium);">MCQs</span>
                </h1>

                <p class="text-gray-600 leading-relaxed mb-8">
                    Master your knowledge in <span class="font-bold text-gray-800">{{ str_replace('-',' ' ,$name )}}</span>. This module is curated by experts to help you prepare for academic exams and professional interviews.
                </p>

                <div class="mb-10 p-6 rounded-2xl border-2" style="background-color: var(--bg-cream); border-color: var(--accent-tan);">
                    <h3 class="flex items-center gap-2 font-extrabold mb-4 uppercase tracking-wider text-sm" style="color: var(--primary-dark);">
                        <i class="bi bi-exclamation-octagon-fill"></i> Important Rules:
                    </h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm font-semibold" style="color: var(--text-dark);">
                            <i class="bi bi-1-circle-fill mt-0.5" style="color: var(--primary-medium);"></i>
                            <span>You can only select an answer **once**. Once marked, your choice cannot be changed.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm font-semibold" style="color: var(--text-dark);">
                            <i class="bi bi-2-circle-fill mt-0.5" style="color: var(--primary-medium);"></i>
                            <span>Instant feedback will be provided immediately after you click an option.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm font-semibold" style="color: var(--text-dark);">
                            <i class="bi bi-3-circle-fill mt-0.5" style="color: var(--primary-medium);"></i>
                            <span>Detailed explanations are available for each question to enhance your learning.</span>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    @if(session('userdetails'))
                        <a href="{{route('usermcqs', ['id'=>$quizid , 'name'=>$name])}}"
                           class="btn-standard flex-1 flex items-center justify-center gap-2 py-4 text-lg">
                           Start Practice <i class="bi bi-rocket-takeoff"></i>
                        </a>
                    @else
                        <a href="{{route('quizsign')}}"
                           class="btn-signup-accent flex-1 flex items-center justify-center gap-2 py-4 text-lg">
                           Join to Start <i class="bi bi-person-plus"></i>
                        </a>
                        <a href="{{route('quizlogin')}}"
                           class="btn-standard flex-1 flex items-center justify-center gap-2 py-4 text-lg">
                           Login <i class="bi bi-box-arrow-in-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <p class="text-center mt-10 text-xl font-medium italic opacity-60" style="color: var(--primary-dark);">
            "Good luck! Every expert was once a beginner." 🍀
        </p>
    </div>
</div>
@endsection