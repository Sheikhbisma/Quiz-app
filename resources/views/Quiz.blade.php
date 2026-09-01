@extends('layout.MasterLayout')
@section('title', 'Quiz Engine')

@section('content')
<div class="px-6 py-10">
    <div class="mx-auto max-w-4xl">

        @if(session('success'))
            <div class="mb-8 flex items-center gap-3 rounded-2xl border border-green-100 bg-green-50 px-5 py-4 text-sm font-bold text-green-700 shadow-sm">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        @if(isset($findCategory))
        <div class="card-premium overflow-hidden !shadow-2xl">
            <div class="p-8 md:p-12">
                <div class="mb-8 flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-white shadow-md"
                         style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                        <i class="bi bi-folder-plus text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold uppercase tracking-tight" style="color: var(--text-dark);">Add Quiz to Category</h2>
                        <p class="mt-1 text-[10px] font-bold uppercase tracking-widest text-slate-400">Target: {{ $findCategory->category }}</p>
                    </div>
                </div>

                <form action="{{ route('addquiz') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $findCategory->id }}">

                    <div>
                        <label class="mb-3 block text-[10px] font-extrabold uppercase tracking-[0.2em] opacity-60" style="color: var(--text-dark);">Quiz Title / Name</label>
                        <input type="text" name="quiz" placeholder="e.g. Midterm Examination 2024" class="input-premium" required>
                    </div>

                    <button type="submit" class="btn-standard w-full !py-4 text-[11px] uppercase tracking-widest">
                        Create Quiz In This Category <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>

        @elseif(isset($quiz))
        <div class="card-premium overflow-hidden !shadow-2xl">
            <div class="flex items-center justify-between border-b bg-indigo-50/40 px-8 py-6" style="border-color: var(--accent-tan);">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl text-white"
                         style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                        <i class="bi bi-list-check"></i>
                    </div>
                    <div>
                        <h2 class="text-sm font-extrabold uppercase" style="color: var(--text-dark);">{{ $quiz->quiz_name }}</h2>
                        <a href="{{ route('viewmcqs' , ['id'=>$quiz->id , 'quiz_name'=>$quiz->quiz_name]) }}"
                           class="flex items-center gap-1 text-[9px] font-extrabold uppercase tracking-widest text-slate-400 transition-colors hover:text-indigo-600">
                            Current Questions: <span style="color: var(--primary-medium);">{{ $totalmcqs }}</span> <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-8 md:p-12">
                <form action="{{ route('addmcqs') }}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

                    <div>
                        <label class="mb-3 block text-[10px] font-extrabold uppercase tracking-[0.2em] opacity-60" style="color: var(--text-dark);">Enter Question</label>
                        <textarea name="question" rows="3" placeholder="Write your question here..." class="input-premium" required></textarea>
                        @error('question') <p class="mt-2 text-[10px] font-bold text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        @for($i=0 ; $i < 4 ; $i++)
                        @php $opt = chr(65 + $i); @endphp
                        <div>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[10px] font-extrabold" style="color: var(--primary-medium);">{{ $opt }}</span>
                                <input type="text" name="{{ $opt }}" placeholder="Option {{ $opt }}" class="input-premium !pl-10">
                            </div>
                            @error($opt) <p class="mt-1 text-[9px] font-bold italic text-red-500">{{ $message }}</p> @enderror
                        </div>
                        @endfor
                    </div>

                    <div class="pt-2">
                        <label class="mb-3 block text-[10px] font-extrabold uppercase tracking-[0.2em] opacity-60" style="color: var(--text-dark);">Mark Correct Answer</label>
                        <div class="relative">
                            <select name="correctoption" required class="input-premium appearance-none pr-10">
                                <option value="">Pick the right option...</option>
                                @for($i=0 ; $i < 4 ; $i++)
                                <option value="{{ chr(65 + $i) }}">Option {{ chr(65 + $i) }}</option>
                                @endfor
                            </select>
                            <div class="pointer-events-none absolute right-5 top-1/2 -translate-y-1/2 text-slate-300">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        @error('correctoption') <p class="mt-2 text-[10px] font-bold text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex flex-col gap-4 pt-4 md:flex-row">
                        <button name="addmore" value="add-more" type="submit" class="btn-outline flex-1 !py-4 text-[10px] uppercase tracking-widest">
                            Save & Add Another
                        </button>
                        <button name="submit" value="add-submit" type="submit" class="btn-standard flex-1 !py-4 text-[10px] uppercase tracking-widest">
                            Save & Finish
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @else
        <div class="card-premium overflow-hidden !shadow-2xl">
            <div class="p-8 md:p-12">
                <div class="mb-8 flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl text-white shadow-md"
                         style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                        <i class="bi bi-plus-square-fill text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold uppercase tracking-tight" style="color: var(--text-dark);">Create New Quiz</h2>
                        <p class="mt-1 text-[10px] font-bold uppercase tracking-widest text-slate-400">Manual Setup</p>
                    </div>
                </div>

                <form action="{{ route('addquiz') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="mb-3 block text-[10px] font-extrabold uppercase tracking-[0.2em] opacity-60" style="color: var(--text-dark);">Quiz Name</label>
                        <input type="text" name="quiz" placeholder="e.g. General Knowledge" class="input-premium" required>
                        @error('quiz') <p class="mt-2 text-[10px] font-bold text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="mb-3 block text-[10px] font-extrabold uppercase tracking-[0.2em] opacity-60" style="color: var(--text-dark);">Choose Category</label>
                        <div class="relative">
                            <select name="category_id" required class="input-premium appearance-none pr-10">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute right-5 top-1/2 -translate-y-1/2 text-slate-300">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-standard w-full !py-4 text-[11px] uppercase tracking-widest">
                        Proceed to Questions <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection