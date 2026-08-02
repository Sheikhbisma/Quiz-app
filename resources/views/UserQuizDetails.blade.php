@extends('layout.usermasterlayout')

@section('content')
<div class="min-h-screen py-12 px-4" style="background-color: var(--bg-cream);">
    <div class="max-w-4xl mx-auto">

        @if($quizrecords && count($quizrecords) > 0)
            <div class="text-center mb-10">
                <span class="inline-block px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest mb-3" 
                      style="background-color: white; color: var(--primary-dark); border: 1px solid var(--accent-tan);">
                    Performance Tracking
                </span>
                <h1 class="text-4xl font-black mb-2" style="color: var(--primary-dark);">My Quiz History</h1>
                <p class="text-stone-500 font-medium italic">"Your only competition is the person you were yesterday."</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white rounded-3xl shadow-sm p-6 border-b-4 flex flex-col items-center justify-center transition-transform hover:scale-105" style="border-color: var(--primary-medium);">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-3" style="background-color: var(--bg-cream);">
                        <i class="bi bi-layers-half text-xl" style="color: var(--primary-dark);"></i>
                    </div>
                    <p class="text-3xl font-black" style="color: var(--primary-dark);">{{ $recordscount['totalAttempt'] }}</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-50">Total Attempts</p>
                </div>

                <div class="bg-white rounded-3xl shadow-sm p-6 border-b-4 flex flex-col items-center justify-center transition-transform hover:scale-105" style="border-color: #15803d;">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-3" style="background-color: #f0fdf4;">
                        <i class="bi bi-patch-check-fill text-xl text-green-700"></i>
                    </div>
                    <p class="text-3xl font-black text-green-800">{{ $recordscount['completed'] }}</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-50">Completed</p>
                </div>

                <div class="bg-white rounded-3xl shadow-sm p-6 border-b-4 flex flex-col items-center justify-center transition-transform hover:scale-105" style="border-color: #b91c1c;">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-3" style="background-color: #fef2f2;">
                        <i class="bi bi-hourglass-split text-xl text-red-700"></i>
                    </div>
                    <p class="text-3xl font-black text-red-800">{{ $recordscount['incomplete'] }}</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-50">Incomplete</p>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-stone-100">
                
                <div class="hidden md:grid grid-cols-12 gap-4 px-8 py-5 font-black text-[11px] uppercase tracking-[0.2em]" 
                     style="background-color: var(--primary-dark); color: white;">
                    <div class="col-span-1">#</div>
                    <div class="col-span-4">Quiz Identity</div>
                    <div class="col-span-3">Timestamp</div>
                    <div class="col-span-2">Status</div>
                    <div class="col-span-2 text-right">Action</div>
                </div>

                <div class="divide-y divide-stone-100">
                    @foreach($quizrecords as $details)
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 px-8 py-6 items-center hover:bg-stone-50 transition-all group">
                        
                        <div class="hidden md:block col-span-1">
                            <span class="w-8 h-8 flex items-center justify-center rounded-xl font-bold text-xs border border-stone-200" 
                                  style="color: var(--primary-dark);">
                                {{ $loop->iteration }}
                            </span>
                        </div>

                        <div class="col-span-4">
                            <p class="text-[10px] font-bold uppercase opacity-40 mb-1 md:hidden">Quiz Name</p>
                            <p class="font-extrabold text-lg tracking-tight" style="color: var(--primary-dark);">
                                {{ $details->quiz_name }}
                            </p>
                        </div>

                        <div class="col-span-3">
                            <p class="text-[10px] font-bold uppercase opacity-40 mb-1 md:hidden">Date & Time</p>
                            <div class="flex items-center gap-2">
                                <i class="bi bi-calendar3 text-[10px] opacity-40"></i>
                                <p class="text-sm font-bold text-stone-600">{{ $details->created_at->format('d M, Y') }}</p>
                            </div>
                            <p class="text-[10px] font-medium text-stone-400 ml-5">{{ $details->created_at->format('h:i A') }}</p>
                        </div>

                        <div class="col-span-2">
                            @if($details->status == 1)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-green-100 text-green-700 border border-green-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-700 animate-pulse"></span>
                                    Completed
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-red-50 text-red-600 border border-red-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                                    Incomplete
                                </span>
                            @endif
                        </div>

                        <div class="col-span-2 text-right">
                            @if($details->status == 1)
                                <a href="{{ route('result', $details->id) }}" 
                                   class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl text-[11px] font-black uppercase tracking-tighter transition-all hover:bg-stone-900 hover:text-white border-2 border-stone-900">
                                    Result <i class="bi bi-eye-fill"></i>
                                </a>
                            @else
                                <a href="{{ route('resumequiz', ['record_id'=>$details->id]) }}" 
                                   class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl text-[11px] font-black uppercase tracking-tighter text-white transition-all hover:opacity-90 shadow-md"
                                   style="background-color: var(--primary-medium);">
                                    Resume <i class="bi bi-play-fill"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="/" class="btn-standard px-10 py-4 inline-flex items-center gap-3 shadow-lg">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Back to Home</span>
                </a>
            </div>

        @else
            <div class="text-center py-20 bg-white rounded-4xl border-2 border-dashed border-stone-200">
                <div class="w-20 h-20 bg-stone-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="bi bi-clipboard-x text-4xl text-stone-300"></i>
                </div>
                <h2 class="text-2xl font-black mb-2" style="color: var(--primary-dark);">No Quiz History Found</h2>
                <p class="text-stone-500 mb-8 px-6">It looks like you haven't attempted any quizzes yet. Start your first quiz today!</p>
                <a href="/" class="btn-standard px-8 py-3 inline-block">Explore Quizzes</a>
            </div>
        @endif

    </div>
</div>
@endsection