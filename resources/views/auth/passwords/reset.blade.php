@extends('layouts.app')

@section('content')
<div class="login-main">
    <div class="login-container">
        <div class="login-card reset-password-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo-icon">🔐</div>
                <h2>{{ __('Reset Password') }}</h2>
                <p>{{ __('Ingresa tu nueva contraseña') }}</p>
            </div>

            <!-- Body -->
            <div class="login-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <div class="input-icon">
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ $email ?? old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                                placeholder="correo@ejemplo.com"
                            >
                            <i class="fas fa-envelope"></i>
                        </div>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <div class="input-icon">
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                            >
                            <i class="fas fa-lock"></i>
                        </div>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <div class="input-icon">
                            <input
                                id="password-confirm"
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                            >
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-reset">
                        {{ __('Reset Password') }}
                    </button>

                    <!-- Back to Login -->
                    <div class="back-to-login">
                        <p>
                            {{ __('¿Recordaste tu contraseña?') }}
                            <a href="{{ route('login') }}">{{ __('Volver al inicio de sesión') }}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
