@extends('layouts.admin-login')

@section('content')
    <div class="futuristic-login-container">
        <!-- Animated Background Particles -->
        <div class="particles" id="particles"></div>
        
        <!-- Grid Overlay -->
        <div class="grid-overlay"></div>

        <!-- Login Card -->
        <div class="login-card">
            <!-- Logo -->
            <div class="logo-container">
                <a href="{{ route('admin.login') }}">
                    <svg class="logo-svg" width="60" height="60" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                            fill="#6366f1" />
                        <path
                            opacity="0.06"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                            fill="#161616" />
                        <path
                            opacity="0.06"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                            fill="#161616" />
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                            fill="#a855f7" />
                    </svg>
                </a>
            </div>

            <!-- Title -->
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Enter your credentials to access the admin panel</p>

            <!-- Login Form -->
            <form id="formAuthentication" action="{{ route('admin.login') }}" method="POST">
                @csrf
                
                <!-- Email Input -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input
                        type="email"
                        class="form-input"
                        id="email"
                        name="email"
                        placeholder="admin@example.com"
                        value="{{ old('email') }}"
                        autofocus
                        required />
                    @if($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <label for="password" class="form-label">Password</label>
                        <a href="{{ route('admin.password.request') }}" class="forgot-password">
                            Forgot Password?
                        </a>
                    </div>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            class="form-input"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            required />
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="ti ti-eye-off" id="eyeIcon"></i>
                        </button>
                    </div>
                    @if($errors->has('password'))
                        <div class="error-message">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="remember-me">
                    <input type="checkbox" id="remember-me" name="remember" />
                    <label for="remember-me">Remember me for 30 days</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn" id="submitBtn">
                    <span>Sign In</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        // Password Toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('ti-eye-off');
                eyeIcon.classList.add('ti-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('ti-eye');
                eyeIcon.classList.add('ti-eye-off');
            }
        });

        // Form Submission Loading State
        document.getElementById('formAuthentication').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.classList.add('btn-loading');
            submitBtn.disabled = true;
        });

        // Create Animated Particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                const size = Math.random() * 4 + 2;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 15) + 's';
                
                // Random colors
                const colors = [
                    'rgba(99, 102, 241, 0.5)',
                    'rgba(168, 85, 247, 0.5)',
                    'rgba(59, 130, 246, 0.5)'
                ];
                particle.style.background = colors[Math.floor(Math.random() * colors.length)];
                
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles on load
        createParticles();

        // Add input focus effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
@endsection
