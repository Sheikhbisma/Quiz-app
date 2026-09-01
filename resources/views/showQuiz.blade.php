@extends('layout.MasterLayout')
@section('title', 'Quizzes in ' . str_replace('-',' ',$category))

@section('content')
<div class="px-6 py-10">
    <div class="mx-auto max-w-5xl space-y-8">

        <div class="card-premium flex flex-col justify-between gap-4 p-8 md:flex-row md:items-center">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl text-white shadow-inner"
                     style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                    <i class="bi bi-journal-text text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight capitalize" style="color: var(--text-dark);">{{ str_replace('-',' ',$category) }}</h2>
                    <p class="mt-1 text-[10px] font-bold uppercase tracking-widest text-slate-400">Available Quizzes in this category</p>
                </div>
            </div>

            <a href="" class="btn-standard items-center">
                <i class="bi bi-plus-circle-fill"></i> New Quiz
            </a>
        </div>

        <div class="space-y-4">
            @forelse($quiz as $q)
            <div class="card-premium p-6">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-center">

                    <div class="flex items-center gap-5">
                        <span class="text-xs font-extrabold text-slate-300 transition-colors group-hover:text-indigo-500">
                            #{{ str_pad($q->id, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <div>
                            <h3 class="text-lg font-bold capitalize" style="color: var(--text-dark);">{{ str_replace('-',' ', $q->quiz_name) }}</h3>
                            <div class="mt-1 flex items-center gap-3">
                                <span class="text-[9px] font-extrabold uppercase tracking-tighter text-slate-400">
                                    Status: <span class="text-green-600">Active</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('viewmcqs', ['id'=>$q->id , 'quiz_name' => Str::slug($q->quiz_name)]) }}"
                           class="btn-outline !px-4 !py-2 text-[10px] uppercase tracking-widest" title="View Questions">
                            <i class="bi bi-eye-fill"></i> View
                        </a>

                        <a href="{{ route('quiz',['id'=>$q->id]) }}"
                           class="btn-outline !px-4 !py-2 text-[10px] uppercase tracking-widest" title="Add Questions to this Quiz">
                            <i class="bi bi-plus-lg"></i> Add MCQ
                        </a>

                        <form action="{{ route('quiz.delete' , $q->id) }}" method="post" onsubmit="return confirm('Warning: Deleting this Quiz might delete all related Mcqs!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-500 transition-all hover:bg-red-500 hover:text-white shadow-sm">
                                <i class="bi bi-trash3-fill text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="flex flex-col items-center justify-center bg-white py-20 opacity-40"
                 style="border: 2px dashed var(--accent-tan); border-radius: 3rem;">
                <i class="bi bi-folder-x text-6xl"></i>
                <p class="mt-4 text-sm font-extrabold uppercase tracking-widest">No quizzes found here</p>
            </div>
            @endforelse
        </div>

        <div class="pt-4 text-center">
            <a href="{{ route('category') }}" class="text-[10px] font-extrabold uppercase tracking-[0.3em] text-slate-400 transition-colors hover:text-indigo-600">
                <i class="bi bi-arrow-left me-2"></i> Back to Categories
            </a>
        </div>
    </div>
</div>
@endsection