@extends('admin.layouts.app')

@section('content')

<div class="luxury-dashboard">
    <!-- Header Section -->
    <div class="luxury-header">
        <h3>Nueva Marca</h3>
        <p>Unab Shop - Agregar Nueva Marca</p>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>
                        <i class="material-symbols-rounded" style="vertical-align: middle; margin-right: 8px;">add_box</i>
                        Información de la Marca
                    </h6>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <strong><i class="fas fa-exclamation-triangle" style="margin-right: 8px;"></i>Por favor corrige los siguientes errores:</strong>
                            <ul class="mb-0 mt-2" style="padding-left: 1.5rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.brands.store') }}" method="POST">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                <i class="fas fa-certificate" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Nombre de la Marca
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="Ej: Apple, Samsung, Nike..."
                                required
                                value="{{ old('name') }}"
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                Ingresa el nombre de la marca del fabricante
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check" style="margin-right: 8px;"></i>Guardar Marca
                            </button>
                            <a href="{{ route('admin.brands.table') }}" class="btn btn-outline-dark">
                                <i class="fas fa-times" style="margin-right: 8px;"></i>Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Card -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card" style="background: var(--luxury-cream); border-left: 4px solid var(--luxury-gold);">
                <div class="card-body">
                    <h6 style="color: var(--luxury-charcoal); margin-bottom: 1rem;">
                        <i class="fas fa-info-circle" style="margin-right: 8px; color: var(--luxury-gold);"></i>
                        Información Importante
                    </h6>
                    <ul style="color: var(--luxury-accent); margin-bottom: 0; padding-left: 1.5rem;">
                        <li>El nombre de la marca debe ser único en el sistema</li>
                        <li>Asegúrate de escribir correctamente el nombre de la marca</li>
                        <li>Las marcas se utilizarán para clasificar los productos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
