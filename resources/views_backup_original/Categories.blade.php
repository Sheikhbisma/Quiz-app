@extends('layout.MasterLayout')

@section('content')
<div class="min-h-screen py-10 px-6" style="background-color: var(--bg-cream);">
    <div class="max-w-6xl mx-auto space-y-12">

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-(--accent-tan) overflow-hidden">
            <div class="px-8 py-6 border-b border-stone-50 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-black tracking-tight" style="color: var(--primary-dark);">Add New Category</h2>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mt-1">Create a new group for your quizzes</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-(--bg-cream) flex items-center justify-center" style="color: var(--primary-dark);">
                    <i class="bi bi-folder-plus text-xl"></i>
                </div>
            </div>

            <div class="p-8">
                @if(session('success'))
                    <div class="flex items-center gap-3 bg-green-50 border border-green-100 text-green-700 px-5 py-3 rounded-2xl mb-6 text-sm font-bold animate-pulse">
                        <i class="bi bi-check-circle-fill"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('addcategory') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-end">
                    @csrf
                    <div class="grow w-full">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-2 opacity-50" style="color: var(--primary-dark);">
                            Category Title
                        </label>
                        <input
                            type="text"
                            name="category"
                            placeholder="e.g. Web Development, General Science"
                            class="custom-input w-full px-5 py-4 rounded-2xl border-2 border-stone-50 bg-stone-50/50 focus:bg-white focus:outline-none transition-all font-bold text-sm"
                            required>
                        @error('category')
                            <p class="text-red-500 text-[10px] font-bold mt-2 uppercase italic tracking-tighter">! {{$message}}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="w-full md:w-auto px-8 py-4 rounded-2xl font-black text-white text-[11px] uppercase tracking-widest transition-all shadow-lg active:scale-95 hover:opacity-90"
                        style="background-color: var(--primary-dark);">
                        <span class="flex items-center justify-center gap-2">
                            <i class="bi bi-plus-circle-fill"></i> Save Category
                        </span>
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-6">
            <div class="flex items-center justify-between px-2">
                <h2 class="text-2xl font-black tracking-tight" style="color: var(--primary-dark);">Existing Categories</h2>
                <span class="px-4 py-1.5 rounded-full bg-white border border-(--accent-tan) text-[10px] font-bold uppercase tracking-widest text-stone-400">
                    Total: {{ count($categories) }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($categories as $category)
                <div class="group bg-white rounded-4xl border border-stone-100 p-6 hover:shadow-xl hover:shadow-(--primary-medium)/10 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-(--bg-cream) opacity-50 group-hover:scale-150 transition-transform duration-500"></div>

                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white shadow-md" style="background-color: var(--primary-medium);">
                                <i class="bi bi-collection-fill"></i>
                            </div>
                          <div class="flex gap-2">
    <a href="{{route('viewpage',['categoryId'=>$category->id])}}" 
       class="w-8 h-8 flex items-center justify-center rounded-lg bg-green-50 text-green-700 hover:bg-(--primary-dark) hover:text-white transition-all shadow-sm"
       title="Add New Quiz">
        <i class="bi bi-plus-lg text-xs"></i>
    </a>

    <a href="{{route('quiz-list', ['id'=>$category->id, 'category'=>$category->category])}}" 
       class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm"
       title="View Quizzes">
        <i class="bi bi-eye-fill text-xs"></i>
    </a>

 

    <form action="{{route('category.delete' , $category->id)}}" method="post" onsubmit="return confirm('Warning: Deleting this category might delete all related quizzes!')">
        @csrf
        @method('DELETE')
        <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all shadow-sm">
            <i class="bi bi-trash3-fill text-xs"></i>
        </button>
    </form>
</div>
                        </div>

                        <h3 class="text-lg font-black uppercase tracking-tight mb-1" style="color: var(--primary-dark);">
                            {{ str_replace('-',' ',$category->category) }}
                        </h3>
                        
                        <div class="flex flex-col gap-2 mt-4">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 rounded-full bg-stone-100 flex items-center justify-center text-[8px] text-stone-500 font-bold uppercase">
                                    {{ substr($category->creator, 0, 1) }}
                                </div>
                                <span class="text-[11px] font-bold text-stone-500">By {{ $category->creator }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-stone-400">
                                <i class="bi bi-calendar3 text-[10px]"></i>
                                <span class="text-[10px] font-bold italic">{{ $category->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 bg-white rounded-[3rem] border-2 border-dashed border-stone-100 flex flex-col items-center justify-center opacity-40">
                    <i class="bi bi-folder-x text-6xl mb-4"></i>
                    <p class="text-sm font-black uppercase tracking-widest">No categories found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
 

    .custom-input:focus {
        border-color: var(--primary-medium) !important;
        box-shadow: 0 10px 25px -5px rgba(84, 107, 65, 0.1);
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection