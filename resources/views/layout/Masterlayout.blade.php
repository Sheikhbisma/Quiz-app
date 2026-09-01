<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizPro Admin | @yield('title', 'Admin Console')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-cream">
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
                    <p class="alert-desc">{{ session('message') ?? session('error') }}</p>
                </div>
            </div>
            <button type="button" class="ms-4 opacity-40 hover:opacity-100" onclick="closeToast()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <script>
            function closeToast() {
                const el = document.getElementById('dynamic-alert');
                if (el) {
                    el.style.opacity = '0';
                    el.style.transform = 'translateX(30px)';
                    setTimeout(() => el.remove(), 500);
                }
            }
            if (document.getElementById('dynamic-alert')) {
                setTimeout(closeToast, 4500);
            }
        </script>
    @endif

    @include('components.navbar')

    <main class="grow w-full">
        @yield('content')
    </main>

    @yield('script')
</body>
</html>