<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
<link rel="stylesheet" href="{{ url('/assets/dynamic-components.css') }}"></head>

<!-- 👉 BODY ko FLEX aur MIN-H-SCREEN dijiye -->
<body class="min-h-screen flex flex-col "> <!-- Yeh line bohot zaroori hai -->
    @if(session('message') || session('error'))
    <div id="dynamic-alert" 
         class="dynamic-toast {{ session('error') ? 'alert-error-custom' : 'alert-success-custom' }}" 
         role="alert">
        
        <div class="flex items-center">
            <div class="icon-box">
                @if(session('error'))
                    <i class="bi bi-exclamation-triangle-fill"></i>
                @else
                    <i class="bi bi-check-circle-fill"></i>
                @endif
            </div>
            
            <div>
                <p class="alert-title">
                    {{ session('error') ? 'Attention Required!' : 'Action Successful' }}
                </p>
                <p class="alert-desc">
                    {{ session('message') ?? session('error') }}
                </p>
            </div>
        </div>

        <button type="button" class="ms-4 opacity-40 hover:opacity-100" onclick="this.parentElement.remove()">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <script>
        setTimeout(function() {
            let alertElement = document.getElementById('dynamic-alert');
            if (alertElement) {
                let bsAlert = new bootstrap.Alert(alertElement);
                bsAlert.close();
            }
        }, 4000);
    </script>
@endif
    <!-- Navbar (Top) -->
    @include('components.user_navbar')

    <!-- Main Content (Flex-Grow = Available Space Fill Karega) -->
    <div class="grow w-full"> <!-- Yahan flex-grow add kiya -->
        @yield('content')
    </div>

    <!-- Footer (Automatically Bottom Par Aayega) -->
    @include('components.footer')

    @yield('script')
     <!-- Bootstrap JS (Toasts/alerts ke liye zaroori) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>