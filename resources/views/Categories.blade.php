@extends('layout.MasterLayout')
@section('title', 'Categories')

@section('content')
<div class="px-6 py-10">
    <div class="mx-auto max-w-6xl space-y-12">

        <div class="card-premium overflow-hidden">
            <div class="flex items-center justify-between border-b px-8 py-6" style="border-color: var(--accent-tan);">
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight" style="color: var(--text-dark);">Add New Category</h2>
                    <p class="mt-1 text-[10px] font-bold uppercase tracking-widest text-slate-400">Create a new group for your quizzes</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl text-white shadow-lg"
                     style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                    <i class="bi bi-folder-plus text-xl"></i>
                </div>
            </div>

            <div class="p-8">
                @if(session('success'))
                    <div class="mb-6 flex items-center gap-3 rounded-2xl border border-green-100 bg-green-50 px-5 py-3 text-sm font-bold text-green-700 animate-pulse">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('addcategory') }}" method="POST" class="flex flex-col items-end gap-4 md:flex-row">
                    @csrf
                    <div class="w-full grow">
                        <label class="mb-2 block text-[10px] font-extrabold uppercase tracking-[0.2em] opacity-60" style="color: var(--text-dark);">
                            Category Title
                        </label>
                        <input type="text" name="category" placeholder="e.g. Web Development, General Science"
                               class="input-premium" required>
                        @error('category')
                            <p class="mt-2 text-[10px] font-bold uppercase italic tracking-tighter text-red-500">! {{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn-standard w-full shrink-0 md:w-auto">
                        <i class="bi bi-plus-circle-fill"></i> Save Category
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-6">
            <div class="flex items-center justify-between px-2">
                <h2 class="text-2xl font-extrabold tracking-tight" style="color: var(--text-dark);">Existing Categories</h2>
                <span class="badge-premium">Total: {{ count($categories) }}</span>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse($categories as $category)
                <div class="card-premium group relative overflow-hidden p-6">
                    <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full opacity-40 transition-transform duration-500 group-hover:scale-150"
                         style="background-color: var(--bg-cream);"></div>

                    <div class="relative z-10">
                        <div class="mb-4 flex items-start justify-between">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl text-white shadow-md"
                                 style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                                <i class="bi bi-collection-fill"></i>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('viewpage',['categoryId'=>$category->id]) }}"
                                   class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 text-green-600 transition-all hover:bg-green-600 hover:text-white shadow-sm"
                                   title="Add New Quiz">
                                    <i class="bi bi-plus-lg text-xs"></i>
                                </a>
                                <a href="{{ route('quiz-list', ['id'=>$category->id, 'category'=>$category->category]) }}"
                                   class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-500 transition-all hover:bg-blue-500 hover:text-white shadow-sm"
                                   title="View Quizzes">
                                    <i class="bi bi-eye-fill text-xs"></i>
                                </a>
                                <form action="{{ route('category.delete' , $category->id) }}" method="post" onsubmit="return confirm('Warning: Deleting this category might delete all related quizzes!')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-500 transition-all hover:bg-red-500 hover:text-white shadow-sm">
                                        <i class="bi bi-trash3-fill text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <h3 class="mb-1 text-lg font-extrabold uppercase tracking-tight" style="color: var(--text-dark);">
                            {{ str_replace('-',' ',$category->category) }}
                        </h3>

                        <div class="mt-4 flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <div class="flex h-5 w-5 items-center justify-center rounded-full text-[8px] font-extrabold uppercase" style="background-color: var(--bg-cream); color: var(--primary-medium);">
                                    {{ substr($category->creator, 0, 1) }}
                                </div>
                                <span class="text-[11px] font-bold text-slate-500">By {{ $category->creator }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-400">
                                <i class="bi bi-calendar3 text-[10px]"></i>
                                <span class="text-[10px] font-bold italic">{{ $category->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full flex flex-col items-center justify-center bg-white py-20 opacity-40" style="border: 2px dashed var(--accent-tan); border-radius: 3rem;">
                    <i class="bi bi-folder-x mb-4 text-6xl"></i>
                    <p class="text-sm font-extrabold uppercase tracking-widest">No categories found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection