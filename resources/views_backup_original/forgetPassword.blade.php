@extends('layout.usermasterlayout')

@section('content')

<div class="container mx-auto mt-12 px-4 mb-12 flex justify-center">
    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        
        <div class="p-8 md:p-12 text-center">
            <div class="flex justify-center mb-6">
                <div class="bg-indigo-50 text-indigo-600 rounded-full p-4">
                    <i class="bi bi-shield-lock text-4xl"></i>
                </div>
            </div>

            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Forgot Password
            </h2>

            <p class="text-gray-500 text-sm mb-8 leading-relaxed italic">
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.
            </p>

            <form action="{{route('forgotPassword')}}" method="POST" class="space-y-6 text-left">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email"
                        placeholder="Enter your registered e-mail" 
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-gray-600 transition-all"
                        required
                    >
                </div>

                <div class="pt-2 text-center">
                    <button 
                        type="submit" 
                        class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-12 rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5"
                    >
                        Reset my Password
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-50">
                <a href="" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                    <i class="bi bi-arrow-left mr-1"></i> Back to Login
                </a>
            </div>
        </div>
    </div>
</div>

@endsection