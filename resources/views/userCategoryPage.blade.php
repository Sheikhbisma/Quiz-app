@extends('layout.usermasterlayout')
@section('title', 'Browse Quiz Categories | Free General Knowledge Practice')
@section('content')

<div class="hero-gradient border-b" style="border-color: var(--accent-tan);">
    <div class="mx-auto max-w-7xl px-4 py-16">
        <div class="mx-auto max-w-2xl text-center">
            <p class="section-eyebrow mb-3">Quiz Library</p>
            <h1 class="mb-4 text-4xl font-extrabold md:text-5xl" style="color: var(--text-dark);">
                Quiz <span class="text-gradient">Library</span>
            </h1>
            <p class="mx-auto mb-8 max-w-2xl opacity-70" style="color: var(--text-dark);">
                Choose from our wide range of subjects. Each category is packed with MCQs designed to help
                you learn something new every day.
            </p>
            <form action="{{ route('searchQuiz') }}" method="GET" class="relative mx-auto max-w-xl">
                <input id="search" type="text" name="query" placeholder="Find a category or quizzes"
                       class="input-premium !rounded-2xl !border-transparent !bg-white !py-4 !pl-12 !pr-28 shadow-xl"
                       required>
                <i class="bi bi-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <button type="submit" class="btn-standard absolute right-2 top-2 !py-2.5">
                    Find <i class="bi bi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<div class="mx-auto -mt-8 mb-16 max-w-7xl px-4">
    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        <div class="card-premium p-6 text-center">
            <i class="bi bi-grid-3x3-gap-fill mb-2 block text-3xl" style="color: var(--primary-medium);"></i>
            <span class="block text-2xl font-extrabold" style="color: var(--text-dark);">50+</span>
            <span class="text-xs font-bold uppercase tracking-widest opacity-50">Categories</span>
        </div>
        <div class="card-premium p-6 text-center">
            <i class="bi bi-journal-text mb-2 block text-3xl" style="color: var(--primary-medium);"></i>
            <span class="block text-2xl font-extrabold" style="color: var(--text-dark);">10k+</span>
            <span class="text-xs font-bold uppercase tracking-widest opacity-50">MCQs</span>
        </div>
        <div class="card-premium p-6 text-center">
            <i class="bi bi-gift-fill mb-2 block text-3xl" style="color: var(--primary-medium);"></i>
            <span class="block text-2xl font-extrabold" style="color: var(--text-dark);">Free</span>
            <span class="text-xs font-bold uppercase tracking-widest opacity-50">Forever</span>
        </div>
        <div class="card-premium p-6 text-center">
            <i class="bi bi-patch-check-fill mb-2 block text-3xl" style="color: var(--primary-medium);"></i>
            <span class="block text-2xl font-extrabold" style="color: var(--text-dark);">2026</span>
            <span class="text-xs font-bold uppercase tracking-widest opacity-50">Updated</span>
        </div>
    </div>
</div>

<div id="no">
    <h1 class="mb-2 text-4xl font-extrabold md:text-5xl" style="color: var(--text-dark);">
        No Category <span class="text-gradient">Found</span>
    </h1>
    <p class="opacity-60">Press Enter To See Quizzes For Your Search</p>
</div>

<div class="mx-auto max-w-7xl px-4">
    @if($categories->isEmpty())
        <div class="rounded-3xl border-2 border-dashed bg-white py-20 text-center" style="border-color: var(--accent-tan);">
            <p class="text-lg font-semibold text-gray-400">No quiz found matching your criteria.</p>
        </div>
    @else
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4" id="quizGrid">
            @foreach($categories as $category)
            <div class="card-premium group flex flex-col">
                <div class="flex grow flex-col p-8">
                    <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl text-xl font-extrabold text-white shadow-lg transition-transform duration-300 group-hover:rotate-12"
                         style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                        {{ strtoupper(substr($category->category, 0, 1)) }}
                    </div>

                    <h2 class="mb-3 text-2xl font-extrabold capitalize" style="color: var(--text-dark);">
                        {{ $category->category }}
                    </h2>

                    <p class="mb-6 text-sm leading-relaxed opacity-60">
                        Master {{ strtolower($category->category) }} with focused practice modules and easy-to-learn questions.
                    </p>

                    <div class="mb-6 flex items-center gap-2 text-xs font-bold" style="color: var(--primary-medium);">
                        <i class="bi bi-journal-check"></i>
                        {{ $category->quizzes_count }} Modules Available
                    </div>

                    <a href="{{ route('userquizlist', ['id' => $category->id, 'category' => str_replace(' ','-',$category->category)]) }}"
                       class="btn-standard mt-auto block w-full text-center">
                        View Quizzes <i class="bi bi-arrow-right-short text-lg"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="custom-pagination mt-12 flex justify-center">
            {{ $categories->links() }}
        </div>
    @endif
</div>

<div class="mx-auto mt-24 max-w-7xl px-4">
    <div class="grid items-center gap-10 rounded-3xl bg-white p-10 md:grid-cols-2" style="border-color: var(--accent-tan); border: 1px solid var(--accent-tan);">
        <div>
            <p class="section-eyebrow mb-3">How to prepare</p>
            <h2 class="mb-6 text-3xl font-extrabold" style="color: var(--text-dark);">How to prepare using Quiz Categories?</h2>
            <div class="space-y-5">
                <div class="flex gap-4">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-sm font-extrabold text-white"
                         style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">1</div>
                    <p class="text-sm leading-relaxed opacity-70"><strong style="color: var(--text-dark);">Choose Your Weak Spot:</strong> Start with categories where you feel less confident.</p>
                </div>
                <div class="flex gap-4">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-sm font-extrabold text-white"
                         style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">2</div>
                    <p class="text-sm leading-relaxed opacity-70"><strong style="color: var(--text-dark);">Daily Practice:</strong> Attempt at least 2 quizzes daily to build muscle memory.</p>
                </div>
                <div class="flex gap-4">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-sm font-extrabold text-white"
                         style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">3</div>
                    <p class="text-sm leading-relaxed opacity-70"><strong style="color: var(--text-dark);">Track Progress:</strong> Review your scores to see your improvement over time.</p>
                </div>
            </div>
        </div>
        <div class="rounded-3xl p-8" style="background-color: var(--bg-cream);">
            <h3 class="mb-4 text-lg font-extrabold" style="color: var(--text-dark);">Popular Topics</h3>
            <div class="flex flex-wrap gap-2">
                @foreach(['Geography', 'Science', 'History', 'Art & Culture', 'Sports', 'Current Affairs', 'Space', 'World Records'] as $topic)
                    <span class="chip-exam px-4 py-2">#{{ $topic }}</span>
                @endforeach
            </div>
            <p class="mt-6 text-xs italic opacity-50" style="color: var(--text-dark);">*Our database is updated regularly with fresh general knowledge MCQs.</p>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.querySelector('input[name="query"]');
        const no = document.getElementById('no');
        const quizCards = document.querySelectorAll('.card-premium');
        const pagination = document.querySelector('.custom-pagination');

        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const value = e.target.value.toLowerCase();
                let hasVisible = false;

                quizCards.forEach(card => {
                    const titleElement = card.querySelector('h2');
                    if (titleElement) {
                        const titleText = titleElement.textContent.toLowerCase();
                        if (titleText.includes(value)) {
                            card.style.display = "";
                            hasVisible = true;
                        } else {
                            card.style.display = "none";
                        }
                    }
                });

                if (hasVisible) {
                    no.classList.remove('active');
                    if (pagination) pagination.style.display = "";
                } else {
                    no.classList.add('active');
                    if (pagination) pagination.style.display = "none";
                }
            });
        }
    });
</script>
@endsection