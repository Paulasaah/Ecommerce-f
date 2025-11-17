@extends('layouts.app')

@section('body_class', 'login-page')

@section('content')
<div class="login-container">
    <div class="login-card">
        <!-- Header -->
        <div class="login-header">
            <div class="logo-icon">S</div>
            <h2>Recuperar Contraseña</h2>
            <p>Ingresa tu email para restablecer</p>
        </div>

        <!-- Body -->
        <div class="login-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert" style="background: rgba(74, 124, 89, 0.1); color: var(--success-green); border-left: 4px solid var(--success-green); padding: 1rem; margin-bottom: 2rem; border-radius: 0;">
                    <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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

                <!-- Submit Button -->
                <button type="submit" class="btn-login">
                    <i class="fas fa-paper-plane me-2"></i>Enviar Link de Recuperación
                </button>

                <!-- Back to Login -->
                <div class="signup-link">
                    <p>¿Recordaste tu contraseña? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
