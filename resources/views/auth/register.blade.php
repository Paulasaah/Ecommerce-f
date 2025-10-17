@extends('layouts.app')

@section('body_class', 'login-page')

@section('content')
<div class="login-container">
    <div class="login-card">
        <!-- Header -->
        <div class="login-header">
            <div class="logo-icon">S</div>
            <h2>ShopHub</h2>
            <p>Crear nueva cuenta</p>
        </div>

        <!-- Body -->
        <div class="login-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <div class="input-icon">
                        <input
                            id="name"
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Tu nombre"
                            required
                            autocomplete="name"
                            autofocus
                        >
                        <i class="fas fa-user"></i>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

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
                            autocomplete="new-password"
                        >
                        <i class="fas fa-lock"></i>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Password Confirmation Field -->
                <div class="form-group">
                    <label for="password-confirm">Confirmar Contraseña</label>
                    <div class="input-icon">
                        <input
                            id="password-confirm"
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                        >
                        <i class="fas fa-lock"></i>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-login">
                    <i class="fas fa-user-plus me-2"></i>Crear Cuenta
                </button>

                <!-- Login Link -->
                <div class="signup-link">
                    <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
