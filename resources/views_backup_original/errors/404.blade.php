@extends('layout.usermasterlayout')

@section('title', 'Page Not Found - 404 Error')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-md-7 text-center">
            <div class="error-code text-primary mb-0" style="font-size: 120px; font-weight: 900; line-height: 1;">404</div>
            
            <h2 class="fw-bold mt-3">Oops! This Page is Missing</h2>
            <p class="text-muted mb-5 fs-5">
                The quiz or result you are looking for might have been moved, deleted, or the URL might be incorrect.
            </p>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                    <i class="bi bi-house"></i> Back to Home
                </a>
             
            </div>

            <div class="mt-5 pt-4 border-top">
                <p class="text-uppercase small fw-bold text-secondary">Can't find what you need? Try searching:</p>
                <form action="/search" method="GET" class="d-flex justify-content-center mt-3">
                    <div class="input-group" style="max-width: 450px;">
                        <input type="text" name="query" class="form-control form-control-lg" placeholder="Search for Topics (e.g. UI/UX, GK)...">
                        <button class="btn btn-primary px-4" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Subtle Floating Animation */
    .error-code {
        animation: floating 3.5s ease-in-out infinite;
        text-shadow: 10px 10px 20px rgba(0,0,0,0.05);
    }

    @keyframes floating {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    
    /* Responsive adjustment */
    @media (max-width: 576px) {
        .error-code { font-size: 80px !important; }
    }
</style>
@endsection