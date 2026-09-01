@extends('layout.MasterLayout')

@section('content')
<div class="min-h-screen py-10 px-6" style="background-color: var(--bg-cream);">
    <div class="max-w-4xl mx-auto">
        
        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-100 text-green-700 px-5 py-4 rounded-2xl mb-8 text-sm font-bold shadow-sm animate-bounce">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(isset($findCategory))
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-(--accent-tan) overflow-hidden">
            <div class="p-8 md:p-12">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-2xl bg-(--bg-cream) flex items-center justify-center text-(--primary-dark)">
                        <i class="bi bi-folder-plus text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-black uppercase tracking-tight" style="color: var(--primary-dark);">Add Quiz to Category</h2>
                        <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mt-1">Target: {{ $findCategory->category }}</p>
                    </div>
                </div>

                <form action="{{route('addquiz')}}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $findCategory->id }}">
                    
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-3 opacity-50" style="color: var(--primary-dark);">Quiz Title / Name</label>
                        <input type="text" name="quiz" placeholder="e.g. Midterm Examination 2024" 
                            class="custom-input w-full px-6 py-4 rounded-2xl border-2 border-stone-50 bg-stone-50/50 focus:bg-white focus:outline-none transition-all font-bold text-sm" required>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-2xl font-black text-white text-[11px] uppercase tracking-widest transition-all shadow-lg hover:opacity-90 active:scale-95" style="background-color: var(--primary-dark);">
                        Create Quiz In This Category
                    </button>
                </form>
            </div>
        </div>

        @elseif(isset($quiz))
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-(--accent-tan)] overflow-hidden">
            <div class="px-8 py-6 border-b border-stone-50 flex items-center justify-between bg-stone-50/30">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-(--primary-medium)] flex items-center justify-center text-white">
                        <i class="bi bi-list-check"></i>
                    </div>
                    <div>
                        <h2 class="text-sm font-black uppercase" style="color: var(--primary-dark);">{{$quiz->quiz_name}}</h2>
                        <a href="{{route('viewmcqs' , ['id'=>$quiz->id , 'quiz_name'=>$quiz->quiz_name]) }}" class="text-[9px] font-black text-stone-400 hover:text-(--primary-medium)] flex items-center gap-1 transition-colors uppercase tracking-widest">
                            Current Questions: <span class="text-(--primary-dark)]">{{$totalmcqs}}</span> <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-8 md:p-12">
                <form action="{{route('addmcqs')}}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{$quiz->id}}">

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-3 opacity-50" style="color: var(--primary-dark);">Enter Question</label>
                        <textarea name="question" rows="3" placeholder="Write your question here..." 
                            class="custom-input w-full px-6 py-4 rounded-2xl border-2 border-stone-50 bg-stone-50/50 focus:bg-white focus:outline-none transition-all font-bold text-sm" required></textarea>
                        @error('question') <p class="text-red-500 text-[10px] mt-2 font-bold">{{$message}}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @for($i=0 ; $i < 4 ; $i++)
                        @php $opt = chr(65 + $i); @endphp
                        <div>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[10px] font-black text-stone-300">{{$opt}}</span>
                                <input type="text" name="{{$opt}}" placeholder="Option {{$opt}}" 
                                    class="custom-input w-full pl-10 pr-4 py-3.5 rounded-xl border-2 border-stone-50 bg-stone-50/30 focus:bg-white focus:outline-none transition-all font-bold text-xs">
                            </div>
                            @error($opt) <p class="text-red-500 text-[9px] mt-1 font-bold italic">{{$message}}</p> @enderror
                        </div>
                        @endfor
                    </div>

                    <div class="pt-4">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-3 opacity-50" style="color: var(--primary-dark);">Mark Correct Answer</label>
                        <div class="relative">
                            <select name="correctoption" required class="custom-select w-full px-6 py-4 rounded-2xl border-2 border-stone-50 bg-stone-50/50 focus:bg-white focus:outline-none transition-all font-bold text-sm appearance-none">
                                <option value="">Pick the right option...</option>
                                @for($i=0 ; $i < 4 ; $i++)
                                <option value="{{chr(65 + $i)}}">Option {{chr(65 + $i)}}</option>
                                @endfor
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-stone-300 pointer-events-none">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        @error('correctoption') <p class="text-red-500 text-[10px] mt-2 font-bold">{{$message}}</p> @enderror
                    </div>

                    <div class="flex flex-col md:flex-row gap-4 pt-4">
                        <button name="addmore" value="add-more" type="submit" 
                            class="flex-1 py-4 rounded-2xl font-black border-2 border-(--primary-dark)] text-(--primary-dark)] text-[10px] uppercase tracking-widest hover:bg-(--primary-dark)] hover:text-white transition-all">
                            Save & Add Another
                        </button>
                        <button name="submit" value="add-submit" type="submit" 
                            class="flex-1 py-4 rounded-2xl font-black text-white text-[10px] uppercase tracking-widest transition-all shadow-lg hover:opacity-90" style="background-color: var(--primary-dark);">
                            Save & Finish
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @else
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-(--accent-tan)] overflow-hidden">
            <div class="p-8 md:p-12">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-2xl bg-(--bg-cream)] flex items-center justify-center text-(--primary-dark)]">
                        <i class="bi bi-plus-square-fill text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-black uppercase tracking-tight" style="color: var(--primary-dark);">Create New Quiz</h2>
                        <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mt-1">Manual Setup</p>
                    </div>
                </div>

                <form action="{{route('addquiz')}}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-3 opacity-50" style="color: var(--primary-dark);">Quiz Name</label>
                        <input type="text" name="quiz" placeholder="e.g. General Knowledge" 
                            class="custom-input w-full px-6 py-4 rounded-2xl border-2 border-stone-50 bg-stone-50/50 focus:bg-white focus:outline-none transition-all font-bold text-sm" required>
                        @error('quiz') <p class="text-red-500 text-[10px] mt-2 font-bold">{{$message}}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-3 opacity-50" style="color: var(--primary-dark);">Choose Category</label>
                        <div class="relative">
                            <select name="category_id" required class="custom-select w-full px-6 py-4 rounded-2xl border-2 border-stone-50 bg-stone-50/50 focus:bg-white focus:outline-none transition-all font-bold text-sm appearance-none">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-stone-300 pointer-events-none">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-2xl font-black text-white text-[11px] uppercase tracking-widest transition-all shadow-lg hover:opacity-90" style="background-color: var(--primary-dark);">
                        Proceed to Questions <i class="bi bi-arrow-right ml-1"></i>
                    </button>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>

<style>
   

    .custom-input:focus, .custom-select:focus {
        border-color: var(--primary-medium) !important;
        box-shadow: 0 10px 25px -10px rgba(84, 107, 65, 0.1);
    }
</style>
@endsection