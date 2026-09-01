@extends('layout.MasterLayout')
@section('title', 'MCQs List')

@section('content')
<div class="px-6 py-10">
    <div class="mx-auto max-w-5xl">
        <div class="card-premium overflow-hidden !shadow-2xl">

            <div class="px-8 py-6 text-white" style="background-image: linear-gradient(120deg, #4338ca, #7c3aed);">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-extrabold">MCQS List — <span class="capitalize">{{ str_replace('-',' ',$qName) }}</span></h2>
                        <p class="mt-1 text-xs text-indigo-100/80">Total {{ count($view) }} questions</p>
                    </div>
                    <div class="hidden h-10 w-10 items-center justify-center rounded-xl bg-white/10 md:flex">
                        <i class="bi bi-list-check text-lg"></i>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-indigo-50/60 text-xs uppercase" style="color: var(--text-dark);">
                        <tr>
                            <th class="px-8 py-4 font-extrabold">#ID</th>
                            <th class="px-8 py-4 font-extrabold">MCQS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y" style="border-color: var(--accent-tan);">
                        @forelse($view as $v)
                        <tr class="transition-colors hover:bg-indigo-50/30">
                            <td class="px-8 py-4 font-bold" style="color: var(--primary-medium);">{{ $v->id }}</td>
                            <td class="px-8 py-4 text-slate-600">{{ $v->mcqs }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="py-10 text-center font-bold text-slate-400">No MCQS Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection