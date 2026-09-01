@extends('layout.usermasterlayout')
@section('title', 'Quiz Result | QuizSite')

@section('content')
<div class="px-4 py-10 md:px-8">
    <div class="mx-auto grid max-w-6xl grid-cols-1 gap-8 lg:grid-cols-12">

        <div class="lg:col-span-4">
            <div class="card-premium sticky top-24 p-8 text-center !shadow-2xl">
                <span class="section-eyebrow">Your Performance</span>
                <h1 class="mb-8 mt-2 text-3xl font-extrabold" style="color: var(--text-dark);">Quiz Result</h1>

                @php $percentage = ($allResults['correctAns']/$allResults['allquest'])*100; @endphp
                <div class="relative mx-auto mb-8 flex h-40 w-40 items-center justify-center rounded-full"
                     style="background: conic-gradient(#4338ca {{ $percentage }}%, #e7e5f4 0);">
                    <div class="flex h-32 w-32 flex-col items-center justify-center rounded-full bg-white shadow-sm">
                        <span class="text-4xl font-extrabold" style="color: var(--text-dark);">{{ $allResults['correctAns'] }}</span>
                        <span class="text-[10px] font-bold uppercase opacity-40">Out of {{ $allResults['allquest'] }}</span>
                    </div>
                </div>

                <div class="mb-8">
                    @if($percentage >= 70)
                        <p class="font-extrabold uppercase tracking-widest text-green-600"><i class="bi bi-trophy-fill"></i> Excellent Work!</p>
                    @elseif($percentage >= 40)
                        <p class="font-extrabold uppercase tracking-widest text-amber-500"><i class="bi bi-fire"></i> Good Effort</p>
                    @else
                        <p class="font-extrabold uppercase tracking-widest text-red-500"><i class="bi bi-arrow-repeat"></i> Keep Practicing</p>
                    @endif
                </div>

                <div class="mb-8 grid grid-cols-2 gap-3">
                    <div class="rounded-2xl border border-green-100 bg-green-50 p-4">
                        <p class="text-xl font-extrabold text-green-600">{{ $allResults['correctAns'] }}</p>
                        <p class="text-[9px] font-bold uppercase opacity-60">Correct</p>
                    </div>
                    <div class="rounded-2xl border border-red-100 bg-red-50 p-4">
                        <p class="text-xl font-extrabold text-red-500">{{ $allResults['wrongAns'] }}</p>
                        <p class="text-[9px] font-bold uppercase opacity-60">Wrong</p>
                    </div>
                </div>

                @if($percentage > 70)
                    <a href="{{ route('certificate',['id'=>$allResults['recordid']]) }}"
                       class="btn-standard w-full !py-4 text-xs uppercase tracking-widest">
                        <i class="bi bi-award"></i> Get Certificate
                    </a>
                @endif

                <a href="/" class="btn-outline mt-4 w-full !py-4 text-xs uppercase tracking-widest">
                    <i class="bi bi-house-door"></i> Home
                </a>
            </div>
        </div>

        <div class="space-y-6 lg:col-span-8">
            <div class="flex items-center justify-between px-4">
                <h2 class="text-xl font-extrabold uppercase tracking-widest" style="color: var(--text-dark);">Question Review</h2>
                <div class="flex gap-2 text-[10px] font-bold uppercase">
                    <span class="text-green-600">● Correct</span>
                    <span class="text-red-500">● Wrong</span>
                </div>
            </div>

            @foreach($allResults['result'] as $value)
                <div class="card-premium overflow-hidden">
                    <div class="flex items-center justify-between border-b px-6 py-3
                        {{ $value->is_correct == 1 ? 'bg-green-50/40' : 'bg-red-50/40' }}"
                        style="border-color: var(--accent-tan);">
                        <span class="text-[10px] font-extrabold uppercase tracking-widest opacity-40 italic">MCQ #{{ $loop->iteration }}</span>
                        <i class="bi {{ $value->is_correct == 1 ? 'bi-check-circle-fill text-green-600' : 'bi-x-circle-fill text-red-500' }}"></i>
                    </div>

                    <div class="p-6 md:p-8">
                        <h3 class="mb-6 text-lg font-extrabold leading-tight" style="color: var(--text-dark);">{{ $value->mcqs }}</h3>

                        <div class="mb-6 grid grid-cols-1 gap-3 md:grid-cols-2">
                            @foreach(['A'=>$value->Option_A,'B'=>$value->Option_B,'C'=>$value->Option_C,'D'=>$value->Option_D] as $key => $options)
                                @php
                                    $isCorrect = ($key == $value->Correct_Answer);
                                    $isSelected = ($key == $value->selected_answer);
                                    $isError = ($isSelected && $value->is_correct == 0);
                                @endphp
                                <div class="relative flex items-center gap-3 rounded-xl border-2 p-3 transition-all
                                    @if($isCorrect) border-green-500 bg-green-50/50 @elseif($isError) border-red-400 bg-red-50/50 @else border-stone-100 bg-stone-50/30 @endif">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-[10px] font-extrabold
                                        @if($isCorrect) bg-green-500 text-white @elseif($isError) bg-red-500 text-white @else bg-stone-200 text-stone-500 @endif">
                                        {{ $key }}
                                    </span>
                                    <span class="text-xs font-bold {{ $isCorrect ? 'text-green-900' : 'text-stone-600' }}">{{ $options }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="rounded-2xl border border-dashed bg-stone-50 p-4" style="border-color: var(--accent-tan);">
                            <h4 class="mb-2 text-[9px] font-extrabold uppercase tracking-widest text-stone-400">Explanation</h4>
                            <p class="text-xs italic leading-relaxed text-stone-500">
                                The answer is <strong class="text-stone-800">{{ $value->Correct_Answer }}</strong>.
                                (Dummy: This concept is crucial for understanding the overall topic. Always double-check your logic on this specific point).
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection