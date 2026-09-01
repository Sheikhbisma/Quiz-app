@extends('layout.MasterLayout')

@section('content')
<div class="min-h-screen py-10 px-6" style="background-color: var(--bg-cream);">
    <div class="max-w-5xl mx-auto space-y-8">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-8 rounded-[2.5rem] border border-(--accent-tan)] shadow-sm">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-(--bg-cream)] flex items-center justify-center text-(--primary-dark)] shadow-inner">
                    <i class="bi bi-journal-text text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-black tracking-tight" style="color: var(--primary-dark);">
                        {{ str_replace('-',' ',$category) }}
                    </h2>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mt-1">Available Quizzes in this category</p>
                </div>
            </div>
            
            <a href="" 
               class="flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-black text-white text-[11px] uppercase tracking-widest transition-all shadow-lg active:scale-95"
               style="background-color: var(--primary-dark);">
                <i class="bi bi-plus-circle-fill"></i> New Quiz
            </a>
        </div>

        <div class="space-y-4">
            @forelse($quiz as $q)
            <div class="group bg-white rounded-[2rem] p-6 border border-stone-100 hover:border-(--primary-medium)] hover:shadow-xl hover:shadow-(--primary-medium)]/5 transition-all duration-300">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    
                    <div class="flex items-center gap-5">
                        <span class="text-xs font-black text-stone-300 group-hover:text-(--primary-medium)] transition-colors">
                            #{{ str_pad($q->id, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <div>
                            <h3 class="text-lg font-bold capitalize" style="color: var(--primary-dark);">
                                {{ str_replace('-',' ', $q->quiz_name) }}
                            </h3>
                            <div class="flex items-center gap-3 mt-1">
                                <span class="text-[9px] font-black uppercase tracking-tighter text-stone-400">
                                    Status: <span class="text-green-600">Active</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{route('viewmcqs', ['id'=>$q->id , 'quiz_name' => Str::slug($q->quiz_name)])}}" 
                           class="flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all text-[10px] font-black uppercase tracking-widest shadow-sm"
                           title="View Questions">
                            <i class="bi bi-eye-fill"></i> View
                        </a>

                        <a href="{{route('quiz',['id'=>$q->id])}}" 
                           class="flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-green-50 text-green-700 hover:bg-(--primary-dark)] hover:text-white transition-all text-[10px] font-black uppercase tracking-widest shadow-sm"
                           title="Add Questions to this Quiz">
                            <i class="bi bi-plus-lg"></i> Add MCQ
                        </a>

                       <form action="{{route('quiz.delete' , $q->id)}}" method="post" onsubmit="return confirm('Warning: Deleting this Quiz might delete all related Mcqs!')">
        @csrf
        @method('DELETE')
        <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all shadow-sm">
            <i class="bi bi-trash3-fill text-xs"></i>
        </button>
    </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-[3rem] py-20 border-2 border-dashed border-stone-100 flex flex-col items-center justify-center opacity-40">
                <i class="bi bi-folder-x text-6xl"></i>
                <p class="text-sm font-black uppercase tracking-widest mt-4">No quizzes found here</p>
            </div>
            @endforelse
        </div>

        <div class="text-center pt-4">
            <a href="{{route('category')}}" class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-400 hover:text-(--primary-dark)] transition-colors">
                <i class="bi bi-arrow-left mr-2"></i> Back to Categories
            </a>
        </div>
    </div>
</div>

<style>
   
</style>
@endsection