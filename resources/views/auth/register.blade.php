@extends('layouts.app')

@section('title', 'Create Account — LUXE Colombia')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1 class="auth-title">Create Account</h1>
            <p class="auth-subtitle">Join LUXE Colombia today</p>
        </div>

        @if ($errors->any())
        <div class="alert-auth alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <!-- Full Name -->
            <div class="form-group-auth">
                <label class="form-label-auth" for="name">Full Name</label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control-auth @error('name') is-invalid @enderror"
                        placeholder="Enter your name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                </div>
            </div>

            <!-- Email -->
            <div class="form-group-auth">
                <label class="form-label-auth" for="email">Email</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control-auth @error('email') is-invalid @enderror"
                        placeholder="your@email.com"
                        value="{{ old('email') }}"
                        required
                    >
                </div>
            </div>

            <!-- Password -->
            <div class="form-group-auth">
                <label class="form-label-auth" for="password">Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control-auth @error('password') is-invalid @enderror"
                        placeholder="Enter your password"
                        required
                    >
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="form-group-auth">
                <label class="form-label-auth" for="password-confirm">Confirm Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input
                        type="password"
                        id="password-confirm"
                        name="password_confirmation"
                        class="form-control-auth"
                        placeholder="Confirm your password"
                        required
                    >
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('password-confirm')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-auth">Create Account</button>
        </form>

        <!-- Toggle to Login -->
        <div class="auth-toggle">
            Already have an account?
            <a href="{{ route('login') }}">Sign In</a>
        </div>

        <!-- Divider -->
        <div class="auth-divider">
            <span>OR</span>
        </div>

        <!-- Guest Access -->
        <a href="{{ route('index') }}" class="btn-guest">Continue as Guest</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const button = input.nextElementSibling;
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endpush
