@extends('layout.usermasterlayout')
@section('title', 'My Quiz History | QuizSite')

@section('content')
<div class="px-4 py-12">
    <div class="mx-auto max-w-4xl">

        @if($quizrecords && count($quizrecords) > 0)
            <div class="mb-10 text-center">
                <span class="badge-premium mb-3">Performance Tracking</span>
                <h1 class="mb-2 text-4xl font-extrabold" style="color: var(--text-dark);">My Quiz History</h1>
                <p class="font-medium italic opacity-50">"Your only competition is the person you were yesterday."</p>
            </div>

            <div class="mb-12 grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="card-premium flex flex-col items-center justify-center p-6 text-center">
                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-2xl" style="background-color: var(--bg-cream);">
                        <i class="bi bi-layers-half text-xl" style="color: var(--primary-medium);"></i>
                    </div>
                    <p class="text-3xl font-extrabold" style="color: var(--text-dark);">{{ $recordscount['totalAttempt'] }}</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-50">Total Attempts</p>
                </div>
                <div class="card-premium flex flex-col items-center justify-center p-6 text-center">
                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-2xl bg-green-50">
                        <i class="bi bi-patch-check-fill text-xl text-green-600"></i>
                    </div>
                    <p class="text-3xl font-extrabold text-green-700">{{ $recordscount['completed'] }}</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-50">Completed</p>
                </div>
                <div class="card-premium flex flex-col items-center justify-center p-6 text-center">
                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50">
                        <i class="bi bi-hourglass-split text-xl text-red-500"></i>
                    </div>
                    <p class="text-3xl font-extrabold text-red-600">{{ $recordscount['incomplete'] }}</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-50">Incomplete</p>
                </div>
            </div>

            <div class="card-premium overflow-hidden !shadow-2xl">
                <div class="hidden grid-cols-12 gap-4 px-8 py-5 text-[11px] font-extrabold uppercase tracking-[0.2em] text-white md:grid"
                     style="background-image: linear-gradient(90deg, #4338ca, #7c3aed);">
                    <div class="col-span-1">#</div>
                    <div class="col-span-4">Quiz Identity</div>
                    <div class="col-span-3">Timestamp</div>
                    <div class="col-span-2">Status</div>
                    <div class="col-span-2 text-right">Action</div>
                </div>

                <div class="divide-y" style="border-color: var(--accent-tan);">
                    @foreach($quizrecords as $details)
                    <div class="grid grid-cols-1 items-center gap-4 px-8 py-6 transition-all hover:bg-indigo-50/40 md:grid-cols-12">

                        <div class="hidden md:block md:col-span-1">
                            <span class="flex h-8 w-8 items-center justify-center rounded-xl border text-xs font-bold" style="color: var(--primary-medium); border-color: var(--accent-tan);">
                                {{ $loop->iteration }}
                            </span>
                        </div>

                        <div class="md:col-span-4">
                            <p class="mb-1 text-[10px] font-bold uppercase opacity-40 md:hidden">Quiz Name</p>
                            <p class="text-lg font-extrabold tracking-tight capitalize" style="color: var(--text-dark);">{{ $details->quiz_name }}</p>
                        </div>

                        <div class="md:col-span-3">
                            <p class="mb-1 text-[10px] font-bold uppercase opacity-40 md:hidden">Date & Time</p>
                            <div class="flex items-center gap-2">
                                <i class="bi bi-calendar3 text-[10px] opacity-40"></i>
                                <p class="text-sm font-bold text-slate-500">{{ $details->created_at->format('d M, Y') }}</p>
                            </div>
                            <p class="ml-5 text-[10px] font-medium text-slate-400">{{ $details->created_at->format('h:i A') }}</p>
                        </div>

                        <div class="md:col-span-2">
                            @if($details->status == 1)
                                <span class="inline-flex items-center gap-1.5 rounded-full border border-green-200 bg-green-50 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-green-600">
                                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-green-600"></span> Completed
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-red-500">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span> Incomplete
                                </span>
                            @endif
                        </div>

                        <div class="md:col-span-2 md:text-right">
                            @if($details->status == 1)
                                <a href="{{ route('result', $details->id) }}"
                                   class="btn-outline inline-flex !px-4 !py-2 text-[11px] uppercase tracking-tight">
                                    Result <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('certificate', $details->id) }}"
                                   class="btn-standard mt-2 inline-flex !px-4 !py-2 text-[11px] uppercase tracking-tight">
                                    Certificate <i class="bi bi-award"></i>
                                </a>
                            @else
                                <a href="{{ route('resumequiz', ['record_id'=>$details->id]) }}"
                                   class="btn-standard inline-flex !px-4 !py-2 text-[11px] uppercase tracking-tight">
                                    Resume <i class="bi bi-play-fill"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="/" class="btn-standard px-10 !py-4 shadow-lg">
                    <i class="bi bi-house-door-fill"></i> Back to Home
                </a>
            </div>

        @else
            <div class="mx-auto max-w-lg rounded-3xl border-2 border-dashed bg-white py-20 text-center" style="border-color: var(--accent-tan);">
                <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-indigo-50">
                    <i class="bi bi-clipboard-x text-4xl text-indigo-300"></i>
                </div>
                <h2 class="mb-2 text-2xl font-extrabold" style="color: var(--text-dark);">No Quiz History Found</h2>
                <p class="mb-8 px-6 opacity-60">It looks like you haven't attempted any quizzes yet. Start your first quiz today!</p>
                <a href="/" class="btn-standard px-8 !py-3">Explore Quizzes</a>
            </div>
        @endif

    </div>
</div>
@endsection