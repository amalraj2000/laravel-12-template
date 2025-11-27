<footer class="bg-dark text-white mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="fw-bold mb-3">{{ config('app.name', 'Laravel') }}</h5>
                <p class="text-white-50">
                    Building amazing web experiences with Laravel. 
                    Modern, responsive, and user-friendly.
                </p>
            </div>
            <div class="col-md-2 mb-4 mb-md-0">
                <h6 class="fw-semibold mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    @if(Route::has('web.about'))
                    <li class="mb-2"><a href="{{ route('web.about') }}" class="text-white-50 text-decoration-none">About</a></li>
                    @endif
                    @if(Route::has('web.contact-us'))
                    <li class="mb-2"><a href="{{ route('web.contact-us') }}" class="text-white-50 text-decoration-none">Contact</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-md-2 mb-4 mb-md-0">
                <h6 class="fw-semibold mb-3">Account</h6>
                <ul class="list-unstyled">
                    @guest
                        @if (Route::has('login'))
                        <li class="mb-2"><a href="{{ route('login') }}" class="text-white-50 text-decoration-none">Login</a></li>
                        @endif
                        @if (Route::has('register'))
                        <li class="mb-2"><a href="{{ route('register') }}" class="text-white-50 text-decoration-none">Register</a></li>
                        @endif
                    @else
                        <li class="mb-2"><a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('footer-logout-form').submit();"
                           class="text-white-50 text-decoration-none">Logout</a></li>
                        <form id="footer-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold mb-3">Connect With Us</h6>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white-50 text-decoration-none" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white-50 text-decoration-none" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white-50 text-decoration-none" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-white-50 text-decoration-none" aria-label="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr class="my-4 bg-white-50">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-white-50 mb-0">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

