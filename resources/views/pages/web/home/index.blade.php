@extends('layouts.app')

@section('title', 'Home - ' . config('app.name'))

@section('description', 'Welcome to ' . config('app.name') . ' - Your gateway to amazing web experiences')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-gradient-primary text-white py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Welcome to {{ config('app.name') }}</h1>
                <p class="lead mb-4">
                    Build amazing web experiences with modern technologies. 
                    Fast, reliable, and user-friendly solutions for your business.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#features" class="btn btn-light btn-lg px-4">Explore Features</a>
                    <a href="#" 
                       class="btn btn-outline-light btn-lg px-4">Get Started</a>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <i class="fas fa-rocket fa-10x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">Why Choose Us?</h2>
                <p class="lead text-muted">We provide cutting-edge solutions for your business needs</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-bolt text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="card-title fw-bold">Lightning Fast</h5>
                        <p class="card-text text-muted">
                            Built with performance in mind. Experience blazing fast load times 
                            and smooth interactions.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-shield-alt text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="card-title fw-bold">Secure & Reliable</h5>
                        <p class="card-text text-muted">
                            Your data security is our priority. We implement the latest 
                            security practices to keep you safe.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-mobile-alt text-info" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="card-title fw-bold">Responsive Design</h5>
                        <p class="card-text text-muted">
                            Perfect experience on any device. Mobile-first approach ensures 
                            your site looks great everywhere.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-2">Ready to Get Started?</h3>
                <p class="text-muted mb-0">
                    Join thousands of satisfied users and start building something amazing today.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                @guest
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">Sign Up Now</a>
                    @endif
                @else
                    <a href="#" class="btn btn-primary btn-lg px-5">Dashboard</a>
                @endguest
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .min-vh-50 {
        min-height: 50vh;
    }
    .hero-section {
        margin-top: -76px;
        padding-top: 120px !important;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endpush
