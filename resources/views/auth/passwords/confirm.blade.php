@extends('layouts.app')

@section('body_class', 'login-page')

@section('content')
<div class="login-container">
    <div class="login-card">
        <!-- Header -->
        <div class="login-header">
            <div class="logo-icon">🔒</div>
            <h2>Confirmar Contraseña</h2>
            <p>Por favor confirma tu contraseña</p>
        </div>

        <!-- Body -->
        <div class="login-body">
            <p style="color: var(--luxury-accent); font-size: 0.95rem; line-height: 1.7; margin-bottom: 2rem; text-align: center;">
                {{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="input-icon">
                        <input
                            id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                        >
                        <i class="fas fa-lock"></i>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-login">
                    <i class="fas fa-check me-2"></i>Confirmar Contraseña
                </button>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
