@extends('layout.usermasterlayout')

@section('content')

<div class="container mx-auto mt-12 px-4 mb-12 flex justify-center">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 md:p-10 border border-gray-50">
        
        <div class="text-center mb-10">
           @if(session('errors'))
            <p class="text-red-700">
{{session('errors')}}
</p>
@endif
            <h2 class="text-2xl font-bold text-indigo-900 mb-3">
                Enter New Password
            </h2>
            <p class="text-gray-400 text-sm leading-relaxed">
                Your new password must be different from previously used password.
            </p>
        </div>

        <form action="{{route('resetPassword')}}" id="resetForm" method="POST" class="space-y-8">
            @csrf
<input type="hidden" name="email" value="{{$email}}">
            <div class="relative">
                <label class="absolute -top-3 left-4 bg-white px-2 text-xs font-semibold text-gray-500 z-10">
                    Password
                </label>
                <div class="flex items-center border-2 border-gray-100 rounded-xl px-4 py-3 focus-within:border-indigo-500 transition-all">
                    <i class="bi bi-lock text-gray-400 mr-3"></i>
                    <input 
                    id="password"
                        type="password" 
                        name="password"
                        placeholder="••••••••••••" 
                        class="w-full focus:outline-none text-gray-700 bg-transparent"
                        required
                    >
                </div>
            </div>

            <div class="relative">
                <label class="absolute -top-3 left-4 bg-white px-2 text-xs font-semibold text-gray-500 z-10">
                    Confirm Password
                </label>
                <div class="flex items-center border-2 border-gray-100 rounded-xl px-4 py-3 focus-within:border-indigo-500 transition-all">
                    <i class="bi bi-lock text-gray-400 mr-3"></i>
                    <input 
                    id="confirmPassword"
                        type="password" 
                        name="conPass"
                        placeholder="••••••••••••" 
                        class="w-full focus:outline-none text-gray-700 bg-transparent"
                        required
                    >
                </div>
                 <p id="errorMessage" class="text-red-500 text-xs mt-1 hidden"></p>
            </div>

            <div class="pt-4">
                <button 
                    type="submit" 
                    class="w-full bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-200 transition-all transform active:scale-95"
                >
                    Continue
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<!-- Simple Script for Password Matching -->
<script>
    const form = document.getElementById('resetForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const errorMessage = document.getElementById('errorMessage');
 
   confirmPassword.addEventListener('input', validatePasswords);
password.addEventListener('input', validatePasswords);

function validatePasswords() {
    const passwordValue = password.value;
    const confirmValue = confirmPassword.value;
    
    // Agar dono khali hain, to koi error nahi
    if (passwordValue === '' && confirmValue === '') {
        errorMessage.classList.add('hidden');
        confirmPassword.classList.remove('border-red-500');
        return;
    }
    
    // Agar password khali hai lekin confirm mein kuch hai
    if (passwordValue === '' && confirmValue !== '') {
        errorMessage.classList.remove('hidden');
        errorMessage.textContent = 'Please enter password first';
        confirmPassword.classList.add('border-red-500');
        return;
    }
    
    // Normal match check
    if (passwordValue === confirmValue) {
        errorMessage.classList.add('hidden');
        confirmPassword.classList.remove('border-red-500');
    } 
    if(passwordValue != confirmValue && confirmValue != '') {
        errorMessage.classList.remove('hidden');
        errorMessage.textContent = 'Passwords do not match';
        confirmPassword.classList.add('border-red-500');
    }
}
</script>
@endsection