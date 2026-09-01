@extends('layout.usermasterlayout')
@section('title', 'Browse Quiz Categories | Free General Knowledge Practice')
@section('content')

<div class="min-h-screen pb-20" style="background-color: var(--bg-cream);">

    <div class="bg-white border-b py-16" style="border-color: var(--accent-tan);">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4" style="color: var(--primary-dark);">
                Quiz <span style="color: var(--primary-medium);">Library</span>
            </h1>
            <p class="max-w-2xl mx-auto mb-8 opacity-80" style="color: var(--primary-dark);">
                Choose from our wide range of subjects. Each category is packed with MCQs designed to help you ace competitive exams like CSS, PMS, and NTS.
            </p>

            <div class="max-w-2xl mx-auto">
                <form action="{{route('searchQuiz')}}" method="GET" class="relative group">
                    <input
                        id="search"
                        type="text"
                        name="query"
                        placeholder="Find a category or quizzes"
                        class="w-full px-14 py-4 rounded-2xl border-2 transition-all outline-none shadow-sm focus:ring-4 focus:ring-stone-100"
                        style="border-color: var(--accent-tan); background-color: var(--bg-cream);"
                        required>
                    <svg class="w-6 h-6 absolute left-5 top-1/2 -translate-y-1/2 opacity-40" style="color: var(--primary-dark);"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 21l-4.35-4.35m2.85-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <button type="submit" class="btn-standard absolute right-3 top-2.5 py-2!">
                        Find
                    </button>
                </form>
            </div>
        </div>
    </div>

   <div class="max-w-7xl mx-auto -mt-10 px-4 mb-16">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        
        <div class="bg-white p-6 rounded-2xl shadow-sm border text-center transition-transform hover:scale-105" style="border-color: var(--accent-tan);">
            <div class="mb-2">
                <i class="bi bi-grid-3x3-gap-fill text-3xl" style="color: var(--primary-medium);"></i>
            </div>
            <span class="block text-2xl font-bold" style="color: var(--primary-dark);">50+</span>
            <span class="text-xs uppercase tracking-widest opacity-60 font-semibold">Categories</span>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border text-center transition-transform hover:scale-105" style="border-color: var(--accent-tan);">
            <div class="mb-2">
                <i class="bi bi-journal-text text-3xl" style="color: var(--primary-medium);"></i>
            </div>
            <span class="block text-2xl font-bold" style="color: var(--primary-dark);">10k+</span>
            <span class="text-xs uppercase tracking-widest opacity-60 font-semibold">MCQs</span>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border text-center transition-transform hover:scale-105" style="border-color: var(--accent-tan);">
            <div class="mb-2">
                <i class="bi bi-gift-fill text-3xl" style="color: var(--primary-medium);"></i>
            </div>
            <span class="block text-2xl font-bold" style="color: var(--primary-dark);">Free</span>
            <span class="text-xs uppercase tracking-widest opacity-60 font-semibold">Forever</span>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border text-center transition-transform hover:scale-105" style="border-color: var(--accent-tan);">
            <div class="mb-2">
                <i class="bi bi-patch-check-fill text-3xl" style="color: var(--primary-medium);"></i>
            </div>
            <span class="block text-2xl font-bold" style="color: var(--primary-dark);">2026</span>
            <span class="text-xs uppercase tracking-widest opacity-60 font-semibold">Updated</span>
        </div>

    </div>
</div>
    <div id="no">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4" style="color: var(--primary-dark);">
            No Category <span style="color: var(--primary-medium);">Found</span>
        </h1>
        <p>Press Enter To See Quizzes For You Search</p>
    </div>
    <div class="max-w-7xl mx-auto px-4">
        @if($categories->isEmpty())
        <div class="text-center py-20 bg-white rounded-3xl border-2 border-dashed" style="border-color: var(--accent-tan);">
            <p class="text-gray-500">No Quiz found matching your criteria.</p>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="quizGrid">
            @foreach($categories as $category)
            <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border overflow-hidden flex flex-col" style="border-color: var(--accent-tan);">

                <div class="p-8 grow">
                    <div class="w-12 h-12 rounded-xl mb-6 flex items-center justify-center text-white font-bold text-xl transition-transform group-hover:rotate-12" style="background-color: var(--primary-medium);">
                        {{ substr($category->category, 0, 1) }}
                    </div>

                    <h2 class="text-2xl font-bold mb-3" style="color: var(--primary-dark);">
                        {{ $category->category }}
                    </h2>

                    <p class="text-sm opacity-70 leading-relaxed mb-6" style="color: var(--primary-dark);">
                        Master {{ strtolower($category->category) }} with our focused practice modules and exam-ready questions.
                    </p>

                    <div class="flex items-center gap-2 mb-6 text-xs font-bold" style="color: var(--primary-medium);">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V7z" />
                        </svg>
                        {{ $category->quizzes_count }} Modules Available
                    </div>

                    <a href="{{ route('userquizlist', ['id' => $category->id, 'category' => str_replace(' ','-',$category->category)]) }}"
                        class="btn-standard w-full! block text-center py-3">
                        View Quizzes
                    </a>

                </div>

            </div>
            @endforeach
        </div>

        <div class="mt-12 flex justify-center custom-pagination">
            {{$categories->links()}}
        </div>
        @endif


    </div>

    <div class="max-w-7xl mx-auto px-4 mt-24">
        <div class="grid md:grid-cols-2 gap-12 items-center bg-white p-10 rounded-3xl border" style="border-color: var(--accent-tan);">
            <div>
                <h2 class="text-3xl font-bold mb-6" style="color: var(--primary-dark);">How to prepare using Quiz Categories?</h2>
                <div class="space-y-4">
                    <div class="flex gap-4">
                        <div class="shrink-0 w-8 h-8 rounded-full flex items-center justify-center font-bold text-white" style="background-color: var(--primary-dark);">1</div>
                        <p class="text-sm opacity-80" style="color: var(--primary-dark);"><strong>Choose Your Weak Spot:</strong> Start with categories where you feel less confident.</p>
                    </div>
                    <div class="flex gap-4">
                        <div class="shrink-0 w-8 h-8 rounded-full flex items-center justify-center font-bold text-white" style="background-color: var(--primary-dark);">2</div>
                        <p class="text-sm opacity-80" style="color: var(--primary-dark);"><strong>Daily Practice:</strong> Attempt at least 2 quizzes daily to build muscle memory.</p>
                    </div>
                    <div class="flex gap-4">
                        <div class="shrink-0 w-8 h-8 rounded-full flex items-center justify-center font-bold text-white" style="background-color: var(--primary-dark);">3</div>
                        <p class="text-sm opacity-80" style="color: var(--primary-dark);"><strong>Track Progress:</strong> Review your scores to see your improvement over time.</p>
                    </div>
                </div>
            </div>
            <div class="p-8 rounded-2xl" style="background-color: var(--bg-cream);">
                <h3 class="font-bold mb-4" style="color: var(--primary-dark);">Popular Competitive Exams</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach(['CSS', 'PMS', 'NTS', 'FPSC', 'PPSC', 'GAT', 'MDCAT', 'ECAT'] as $exam)
                    <span class="px-4 py-2 bg-white rounded-lg text-xs font-bold shadow-sm border" style="border-color: var(--accent-tan); color: var(--primary-sage);">#{{ $exam }}</span>
                    @endforeach
                </div>
                <p class="mt-6 text-xs italic opacity-60" style="color: var(--primary-dark);">*Our database is updated weekly with new MCQs based on latest paper patterns.</p>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.querySelector('input[name="query"]');
        const no = document.getElementById('no');
        // '.group' class cards par lazmi honi chahiye
        const quizCards = document.querySelectorAll('.group');
        const pagination = document.querySelector('.custom-pagination');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const value = e.target.value.toLowerCase();

                let hasVisible = false;
                quizCards.forEach(card => {
                    // ERROR FIX: 'quizCards' nahi, 'card' use karein
                    const titleElement = card.querySelector('h2');

                    if (titleElement) {
                        const titleText = titleElement.textContent.toLowerCase();

                        if (titleText.includes(value)) {
                            card.style.display = ""; // Card dikhao
                            hasVisible = true;
                        } else {
                            card.style.display = "none"; // Card chhupa do

                        }
                    }

                });
                if (hasVisible == true) {
                    no.classList.remove('active')
                    pagination.style.display = "";
                } else {
                    no.classList.add('active')
                    pagination.style.display = "none";
                }
            });
        }
    });
</script>
@endsection