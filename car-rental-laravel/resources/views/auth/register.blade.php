@extends('layouts.auth')

@section('title', 'Register - CARrent')

@section('content')
<div class="login-container">
    <div class="row g-0">
        <!-- Left Side - Image -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="login-image">
                <div class="overlay"></div>
                <div class="content">
                    <h1>Join SoloAuto</h1>
                    <p>Start your journey with us</p>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Register Form -->
        <div class="col-lg-6">
            <div class="login-form-container">
                <div class="login-form-wrapper">
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}" class="back-home">
                            <i class="fas fa-arrow-left"></i> Back to Home
                        </a>
                    </div>

                    <div class="login-header">
                        <h2>Create Account</h2>
                        <p>Join our car rental community</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="login-form">
                        @csrf

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       placeholder="Enter your full name"
                                       required 
                                       autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="Enter your email"
                                       required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Create a password"
                                       required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" 
                                       class="form-control" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       placeholder="Confirm your password"
                                       required>
                            </div>
                        </div>

                        <button type="submit" class="btn-login">
                            <i class="fas fa-user-plus"></i>
                            Create Account
                        </button>

                        <div class="register-link">
                            Already have an account? 
                            <a href="{{ route('login') }}">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.login-container {
    min-height: 100vh;
    background-color: #f8f9fa;
}

.login-image {
    height: 100vh;
    background-image: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
    background-size: cover;
    background-position: center;
    position: relative;
}

.login-image .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 100%);
}

.login-image .content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    width: 80%;
}

.login-image h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
    font-weight: 700;
}

.login-image p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.login-form-container {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.login-form-wrapper {
    width: 100%;
    max-width: 450px;
}

.back-home {
    color: #6c757d;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.back-home:hover {
    color: #0d6efd;
}

.login-header {
    text-align: center;
    margin-bottom: 2rem;
}

.login-header h2 {
    font-size: 2rem;
    color: #212529;
    margin-bottom: 0.5rem;
}

.login-header p {
    color: #6c757d;
    margin-bottom: 0;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #495057;
    font-weight: 500;
}

.input-group {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
    z-index: 1;
}

.form-control {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    font-size: 1rem;
    border: 1px solid #ced4da;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.btn-login {
    width: 100%;
    padding: 0.75rem;
    background: #0d6efd;
    color: white;
    border: none;
    border-radius: 0.5rem;
    font-size: 1rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-login:hover {
    background: #0b5ed7;
    transform: translateY(-1px);
}

.register-link {
    text-align: center;
    margin-top: 1.5rem;
    color: #6c757d;
}

.register-link a {
    color: #0d6efd;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.register-link a:hover {
    color: #0a58ca;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

@media (max-width: 991.98px) {
    .login-form-container {
        height: auto;
        min-height: 100vh;
    }
}
</style>
@endsection
