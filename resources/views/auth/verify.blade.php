@extends('layouts.app')

@section('body_class', 'login-page')

@section('content')
<div class="login-container">
    <div class="login-card">
        <!-- Header -->
        <div class="login-header">
            <div class="logo-icon">S</div>
            <h2>Verificar Email</h2>
            <p>Confirma tu dirección de correo</p>
        </div>

        <!-- Body -->
        <div class="login-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert" style="background: rgba(74, 124, 89, 0.1); color: var(--success-green); border-left: 4px solid var(--success-green); padding: 1rem; margin-bottom: 2rem; border-radius: 0;">
                    <i class="fas fa-check-circle me-2"></i>{{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p style="color: var(--luxury-accent); font-size: 0.95rem; line-height: 1.7; margin-bottom: 2rem; text-align: center;">
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
            </p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn-login">
                    <i class="fas fa-paper-plane me-2"></i>Reenviar Email de Verificación
                </button>
            </form>

            <div class="signup-link">
                <p><a href="{{ route('products.index') }}">Volver al inicio</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
