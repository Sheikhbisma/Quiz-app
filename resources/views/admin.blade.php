@extends('layout.MasterLayout')
@section('title', 'Dashboard')

@section('content')
<div class="px-6 py-8">
    <div class="mx-auto max-w-7xl">

        <div class="mb-10 flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight" style="color: var(--text-dark);">
                    @if($admin)
                        Welcome back, {{ $admin->username }}! <i class="bi bi-emoji-wink" style="color: var(--primary-medium);"></i>
                    @else
                        Admin Dashboard
                    @endif
                </h1>
                <p class="mt-1 text-sm font-medium text-slate-500">Here is what's happening with your quiz platform today.</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('category') }}" class="btn-outline block !text-[11px] uppercase tracking-widest">
                    <i class="bi bi-plus-lg"></i> New Category
                </a>
                <a href="{{ route('quiz') }}" class="btn-standard block !text-[11px] uppercase tracking-widest">
                    <i class="bi bi-patch-plus"></i> Create Quiz
                </a>
            </div>
        </div>

        <div class="mb-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="card-premium flex items-center gap-5 p-6">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-500">
                    <i class="bi bi-folder2-open text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-extrabold uppercase tracking-widest opacity-40">Categories</p>
                    <h3 class="text-2xl font-extrabold" style="color: var(--text-dark);">12</h3>
                </div>
            </div>

            <div class="card-premium flex items-center gap-5 p-6">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-500">
                    <i class="bi bi-controller text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-extrabold uppercase tracking-widest opacity-40">Total Quizzes</p>
                    <h3 class="text-2xl font-extrabold" style="color: var(--text-dark);">48</h3>
                </div>
            </div>

            <div class="card-premium flex items-center gap-5 p-6">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-50 text-purple-500">
                    <i class="bi bi-list-check text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-extrabold uppercase tracking-widest opacity-40">Total MCQs</p>
                    <h3 class="text-2xl font-extrabold" style="color: var(--text-dark);">240</h3>
                </div>
            </div>

            <div class="card-premium flex items-center gap-5 p-6">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-50 text-green-500">
                    <i class="bi bi-people-fill text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-extrabold uppercase tracking-widest opacity-40">Active Users</p>
                    <h3 class="text-2xl font-extrabold" style="color: var(--text-dark);">1,205</h3>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">

            <div class="card-premium relative overflow-hidden p-10 lg:col-span-2">
                <div class="relative z-10">
                    <h2 class="mb-6 text-xl font-extrabold" style="color: var(--text-dark);"><i class="bi bi-activity me-2" style="color: var(--primary-medium);"></i>System Status</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between rounded-2xl border p-4" style="border-color: var(--accent-tan); background-color: var(--bg-cream);">
                            <div class="flex items-center gap-3">
                                <span class="h-2 w-2 animate-pulse rounded-full bg-green-500"></span>
                                <span class="text-sm font-bold text-slate-600">Server Response</span>
                            </div>
                            <span class="text-xs font-extrabold uppercase text-green-600"><i class="bi bi-check-circle-fill"></i> Optimal</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl border p-4" style="border-color: var(--accent-tan); background-color: var(--bg-cream);">
                            <div class="flex items-center gap-3">
                                <i class="bi bi-database-check text-slate-400"></i>
                                <span class="text-sm font-bold text-slate-600">Database Backup</span>
                            </div>
                            <span class="text-xs font-extrabold uppercase text-slate-400">2 Hours Ago</span>
                        </div>
                    </div>

                    <div class="mt-10 rounded-[2rem] p-8 text-white shadow-xl"
                         style="background-image: linear-gradient(135deg, #4338ca, #7c3aed);">
                        <h4 class="mb-2 text-lg font-bold"><i class="bi bi-pencil-square me-2"></i>Need to update content?</h4>
                        <p class="mb-6 text-sm text-indigo-100/80">Manage your quiz bank, add new questions, or organize your categories with our intuitive tools.</p>
                        <a href="{{ route('quiz') }}" class="btn-white !py-2.5 text-[10px] uppercase tracking-widest">Go to Quiz Bank</a>
                    </div>
                </div>
                <i class="bi bi-rocket-takeoff absolute -bottom-10 -right-10 text-[15rem] opacity-[0.04]" style="color: var(--primary-medium);"></i>
            </div>

            <div class="card-premium p-8">
                <h2 class="mb-6 text-lg font-extrabold" style="color: var(--text-dark);">Recent Alerts</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="h-10 w-1 rounded-full" style="background-image: linear-gradient(180deg, #f59e0b, #fbbf24);"></div>
                        <div>
                            <p class="text-xs font-extrabold uppercase tracking-tight text-slate-800">New User Registration</p>
                            <p class="mt-0.5 text-[11px] font-medium text-slate-400">5 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="h-10 w-1 rounded-full" style="background-image: linear-gradient(180deg, #3b82f6, #06b6d4);"></div>
                        <div>
                            <p class="text-xs font-extrabold uppercase tracking-tight text-slate-800">Quiz "PHP Basics" Updated</p>
                            <p class="mt-0.5 text-[11px] font-medium text-slate-400">1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="h-10 w-1 rounded-full" style="background-image: linear-gradient(180deg, #10b981, #34d399);"></div>
                        <div>
                            <p class="text-xs font-extrabold uppercase tracking-tight text-slate-800">System Backup Complete</p>
                            <p class="mt-0.5 text-[11px] font-medium text-slate-400">2 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection