@extends('layout.MasterLayout')

@section('content')
<div class="min-h-screen py-8 px-6" style="background-color: var(--bg-cream);">
    <div class="max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-black tracking-tight" style="color: var(--primary-dark);">
                    @if($admin)
                        Welcome back, {{ $admin->username }}! 👋
                    @else
                        Admin Dashboard
                    @endif
                </h1>
                <p class="text-stone-500 font-medium mt-1 text-sm">Here is what's happening with your quiz platform today.</p>
            </div>
            
            <div class="flex gap-3">
                <a href="{{ route('category') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-stone-200 rounded-xl text-[11px] font-black uppercase tracking-widest hover:bg-stone-50 transition-all shadow-sm">
                    <i class="bi bi-plus-lg"></i> New Category
                </a>
                <a href="{{ route('quiz') }}" class="inline-flex items-center gap-2 px-5 py-2.5 text-white rounded-xl text-[11px] font-black uppercase tracking-widest hover:opacity-90 transition-all shadow-lg shadow-green-900/20" style="background-color: var(--primary-dark);">
                    <i class="bi bi-patch-plus"></i> Create Quiz
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-stone-100 flex items-center gap-5 transition-transform hover:scale-[1.02]">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-amber-50 text-amber-600">
                    <i class="bi bi-folder2-open text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-40">Categories</p>
                    <h3 class="text-2xl font-black" style="color: var(--primary-dark);">12</h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-stone-100 flex items-center gap-5 transition-transform hover:scale-[1.02]">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-blue-50 text-blue-600">
                    <i class="bi bi-controller text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-40">Total Quizzes</p>
                    <h3 class="text-2xl font-black" style="color: var(--primary-dark);">48</h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-stone-100 flex items-center gap-5 transition-transform hover:scale-[1.02]">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-purple-50 text-purple-600">
                    <i class="bi bi-list-check text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-40">Total MCQs</p>
                    <h3 class="text-2xl font-black" style="color: var(--primary-dark);">240</h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-stone-100 flex items-center gap-5 transition-transform hover:scale-[1.02]">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-green-50 text-green-600">
                    <i class="bi bi-people-fill text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-40">Active Users</p>
                    <h3 class="text-2xl font-black" style="color: var(--primary-dark);">1,205</h3>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 bg-white rounded-[2.5rem] p-10 shadow-sm border border-stone-100 relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-xl font-black mb-6" style="color: var(--primary-dark);">System Status</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-stone-50 rounded-2xl border border-stone-100">
                            <div class="flex items-center gap-3">
                                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                <span class="text-sm font-bold text-stone-600">Server Response</span>
                            </div>
                            <span class="text-xs font-black text-green-600 uppercase">Optimal</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-stone-50 rounded-2xl border border-stone-100">
                            <div class="flex items-center gap-3">
                                <i class="bi bi-database-check text-stone-400"></i>
                                <span class="text-sm font-bold text-stone-600">Database Backup</span>
                            </div>
                            <span class="text-xs font-black text-stone-400 uppercase">2 Hours Ago</span>
                        </div>
                    </div>

                    <div class="mt-10 p-8 rounded-[2rem] text-white" style="background-color: var(--primary-dark);">
                        <h4 class="text-lg font-bold mb-2">Need to update content?</h4>
                        <p class="text-sm opacity-70 mb-6">Manage your quiz bank, add new questions, or organize your categories with our intuitive tools.</p>
                        <div class="flex gap-4">
                            <a href="{{ route('quiz') }}" class="px-6 py-3 bg-white text-stone-900 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-stone-100 transition-all">Go to Quiz Bank</a>
                        </div>
                    </div>
                </div>
                <i class="bi bi-rocket-takeoff absolute -bottom-10 -right-10 text-[15rem] opacity-[0.03]" style="color: var(--primary-dark);"></i>
            </div>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-stone-100">
                <h2 class="text-lg font-black mb-6" style="color: var(--primary-dark);">Recent Alerts</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-1 h-10 rounded-full bg-amber-400"></div>
                        <div>
                            <p class="text-xs font-black text-stone-800 uppercase tracking-tight">New User Registration</p>
                            <p class="text-[11px] text-stone-400 mt-0.5 font-medium">5 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-1 h-10 rounded-full bg-blue-400"></div>
                        <div>
                            <p class="text-xs font-black text-stone-800 uppercase tracking-tight">Quiz "PHP Basics" Updated</p>
                            <p class="text-[11px] text-stone-400 mt-0.5 font-medium">1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-1 h-10 rounded-full bg-green-400"></div>
                        <div>
                            <p class="text-xs font-black text-stone-800 uppercase tracking-tight">System Backup Complete</p>
                            <p class="text-[11px] text-stone-400 mt-0.5 font-medium">2 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection