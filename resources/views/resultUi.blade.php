@extends('layout.usermasterlayout')

@section('content')
<div class="min-h-screen py-10 px-4 md:px-8" style="background-color: var(--bg-cream);">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <div class="lg:col-span-4">
            <div class="bg-white rounded-[2.5rem] shadow-xl p-8 sticky top-10 border border-stone-100 text-center">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-400">Your Performance</span>
                <h1 class="text-3xl font-black mt-2 mb-8" style="color: var(--primary-dark);">Quiz Result</h1>
@php 
    $percentage = ($allResults['correctAns']/$allResults['allquest'])*100 ;
@endphp 
                <div class="relative w-40 h-40 mx-auto mb-8 flex items-center justify-center rounded-full" 
                     style="background: conic-gradient(var(--primary-medium) <?php  echo $percentage ?>%, #f5f5f4 0);">
                    <div class="w-32 h-32 bg-white rounded-full flex flex-col items-center justify-center shadow-sm">
                        <span class="text-4xl font-black" style="color: var(--primary-dark);">{{$allResults['correctAns']}}</span>
                        <span class="text-[10px] font-bold opacity-40 uppercase">Out of {{$allResults['allquest']}}</span>
                    </div>
                </div>

                <div class="mb-8">
                    @php $perc = ($allResults['correctAns']/$allResults['allquest'])*100; @endphp
                    @if($perc >= 70)
                        <p class="text-green-700 font-black uppercase text-sm tracking-widest">Excellent Work!</p>
                    @elseif($perc >= 40)
                        <p class="text-yellow-600 font-black uppercase text-sm tracking-widest">Good Effort</p>
                    @else
                        <p class="text-red-600 font-black uppercase text-sm tracking-widest">Keep Practicing</p>
                    @endif
                </div>

                <div class="grid grid-cols-2 gap-3 mb-8">
                    <div class="bg-green-50 p-4 rounded-2xl border border-green-100">
                        <p class="text-xl font-black text-green-700">{{$allResults['correctAns']}}</p>
                        <p class="text-[9px] font-bold uppercase opacity-60">Correct</p>
                    </div>
                    <div class="bg-red-50 p-4 rounded-2xl border border-red-100">
                        <p class="text-xl font-black text-red-600">{{$allResults['wrongAns']}}</p>
                        <p class="text-[9px] font-bold uppercase opacity-60">Wrong</p>
                    </div>
                </div>

                @if($perc > 70)
                    <a href="{{route('certificate',['id'=>$allResults['recordid']])}}" 
                       class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 rounded-2xl bg-stone-900 text-white font-bold text-xs uppercase tracking-widest hover:opacity-90 transition-all shadow-lg">
                        <i class="bi bi-award"></i> Get Certificate
                    </a>
                @endif

                <a href="/" class="mt-4 w-full inline-flex items-center justify-center gap-2 px-6 py-4 rounded-2xl border-2 border-stone-200 text-stone-500 font-bold text-xs uppercase tracking-widest hover:bg-stone-50 transition-all">
                    🏠 Home
                </a>
            </div>
        </div>

        <div class="lg:col-span-8 space-y-6">
            <div class="flex items-center justify-between px-4">
                <h2 class="text-xl font-black uppercase tracking-widest" style="color: var(--primary-dark);">Question Review</h2>
                <div class="flex gap-2 text-[10px] font-bold uppercase">
                    <span class="text-green-600">● Correct</span>
                    <span class="text-red-500">● Wrong</span>
                </div>
            </div>

            @foreach($allResults['result'] as $value)
                <div class="bg-white rounded-[2rem] shadow-sm border border-stone-100 overflow-hidden group">
                    <div class="px-6 py-3 flex justify-between items-center border-b border-stone-50 
                        {{ $value->is_correct == 1 ? 'bg-green-50/30' : 'bg-red-50/30' }}">
                        <span class="text-[10px] font-black uppercase tracking-widest opacity-40 italic">MCQ #{{ $loop->iteration }}</span>
                        <i class="bi {{ $value->is_correct == 1 ? 'bi-check-circle-fill text-green-600' : 'bi-x-circle-fill text-red-500' }}"></i>
                    </div>

                    <div class="p-6 md:p-8">
                        <h3 class="text-lg font-extrabold mb-6 leading-tight" style="color: var(--primary-dark);">{{$value->mcqs}}</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                            @foreach(['A'=>$value->Option_A,'B'=>$value->Option_B,'C'=>$value->Option_C,'D'=>$value->Option_D] as $key => $options)
                                @php
                                    $isCorrect = ($key == $value->Correct_Answer);
                                    $isSelected = ($key == $value->selected_answer);
                                    $isError = ($isSelected && $value->is_correct == 0);
                                @endphp
                                <div class="relative flex items-center gap-3 p-3 rounded-xl border-2 transition-all
                                    @if($isCorrect) border-green-500 bg-green-50/50 @elseif($isError) border-red-400 bg-red-50/50 @else border-stone-50 bg-stone-50/30 @endif">
                                    <span class="w-7 h-7 flex-shrink-0 flex items-center justify-center rounded-lg font-black text-[10px]
                                        @if($isCorrect) bg-green-500 text-white @elseif($isError) bg-red-500 text-white @else bg-stone-200 text-stone-500 @endif">
                                        {{$key}}
                                    </span>
                                    <span class="text-xs font-bold {{ $isCorrect ? 'text-green-900' : 'text-stone-600' }}">{{$options}}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="bg-stone-50 rounded-2xl p-4 border border-dashed border-stone-200">
                            <h4 class="text-[9px] font-black uppercase tracking-widest text-stone-400 mb-2">Explanation</h4>
                            <p class="text-xs text-stone-500 italic leading-relaxed">
                                The answer is <strong class="text-stone-800">{{$value->Correct_Answer}}</strong>. (Dummy: This concept is crucial for understanding the overall topic. Always double-check your logic on this specific point).
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection