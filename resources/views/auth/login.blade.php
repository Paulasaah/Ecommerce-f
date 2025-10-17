@extends('layouts.app')

@section('body_class', 'login-page')

@section('content')
<div class="login-container">
    <div class="login-card">
        <!-- Header -->
        <div class="login-header">
            <div class="logo-icon">S</div>
            <h2>ShopHub</h2>
            <p>Acceso a tu tienda</p>
        </div>

        <!-- Body -->
        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <div class="input-icon">
                        <input
                            id="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="tu@email.com"
                            required
                            autocomplete="email"
                            autofocus
                        >
                        <i class="fas fa-envelope"></i>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

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

                <!-- Remember Me -->
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="remember">
                        Recuérdame en este dispositivo
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                </button>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                @endif

                <!-- Sign Up Link -->
                @if (Route::has('register'))
                    <div class="signup-link">
                        <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
