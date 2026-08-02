@extends('layout.MasterLayout')

@section('content')
<section class="flex justify-center items-center min-h-screen p-4" style="background-color: var(--bg-cream);">

    <div class="w-full max-w-[380px]"> <div class="bg-white rounded-[2rem] shadow-2xl border border-stone-100 p-8 relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-1.5" style="background-color: var(--primary-dark);"></div>

            <div class="text-center mb-6">
                <h2 class="text-2xl font-black tracking-tighter" style="color: var(--primary-dark);">ADMIN LOGIN</h2>
                <div class="w-8 h-1 mx-auto mt-2 rounded-full opacity-20" style="background-color: var(--primary-dark);"></div>
            </div>

            <form action="/login" method="POST" class="space-y-4"> @csrf

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest mb-1.5 opacity-50" style="color: var(--primary-dark);">
                        Username
                    </label>
                    <input
                        type="text"
                        name="username"
                        placeholder="Admin ID"
                        class="w-full px-4 py-3 rounded-xl border-2 border-stone-50 bg-stone-50/50 focus:bg-white focus:outline-none transition-all font-bold text-sm"
                        style="color: var(--primary-dark);"
                    >
                    @error('username')
                        <p class="text-red-500 text-[9px] font-bold mt-1 uppercase italic">! {{$message}}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="block text-[10px] font-black uppercase tracking-widest opacity-50" style="color: var(--primary-dark);">
                            Password
                        </label>
                    </div>
                    <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        class="w-full px-4 py-3 rounded-xl border-2 border-stone-50 bg-stone-50/50 focus:bg-white focus:outline-none transition-all font-bold text-sm"
                    >
                    @error('password')
                        <p class="text-red-500 text-[9px] font-bold mt-1 uppercase italic">! {{$message}}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between py-1">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-stone-200 text-stone-800 focus:ring-0">
                        <span class="text-[10px] font-bold text-stone-500 group-hover:text-stone-800">Remember</span>
                    </label>
                    <a href="#" class="text-[10px] font-black uppercase tracking-widest opacity-40 hover:opacity-100">Forgot?</a>
                </div>

                <button
                    type="submit"
                    class="w-full py-3.5 px-6 rounded-xl font-black text-white text-[10px] uppercase tracking-[0.2em]
                           transition-all shadow-lg active:scale-95 mt-2"
                    style="background-color: var(--primary-dark);"
                >
                    SIGN IN
                </button>
            </form>
        </div>

        <p class="text-center text-stone-400 font-bold text-[9px] mt-6 uppercase tracking-[0.3em] opacity-50">
            &copy; {{ date('Y') }} Admin Panel
        </p>
    </div>
</section>

<style>
    input:focus {
        border-color: var(--primary-medium) !important;
    }
</style>
@endsection