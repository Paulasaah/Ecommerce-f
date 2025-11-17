@extends('admin.layouts.app')

@section('content')
<div class="luxury-dashboard">
    <!-- Header Section -->
    <div class="luxury-header">
        <h3>Crear Categoría</h3>
        <p>Unab Shop - Agregar Nueva Categoría al Sistema</p>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h6>
                        <i class="material-symbols-rounded" style="vertical-align: middle; margin-right: 8px;">category</i>
                        Información de la Categoría
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="POST">
                        @csrf
                        
                        <!-- Nombre de la Categoría -->
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                <i class="fas fa-tag" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Nombre de la Categoría
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name"
                                name="name" 
                                class="form-control"
                                placeholder="Ej: Hombre, Mujer, Niño, Electrónica..."
                                required
                            >
                            <div class="form-text">
                                Ingresa un nombre descriptivo para la categoría
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check" style="margin-right: 8px;"></i>Guardar Categoría
                            </button>
                            <a href="{{ route('admin.index') }}" class="btn btn-outline-dark">
                                <i class="fas fa-times" style="margin-right: 8px;"></i>Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Card (Opcional) -->
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h6>
                        <i class="material-symbols-rounded" style="vertical-align: middle; margin-right: 8px;">info</i>
                        Información
                    </h6>
                </div>
                <div class="card-body">
                    <p class="text-sm mb-3">
                        <strong>¿Qué es una categoría?</strong>
                    </p>
                    <p class="text-sm text-muted mb-3">
                        Las categorías ayudan a organizar tus productos y facilitan la navegación de los clientes en tu tienda.
                    </p>
                    <p class="text-sm mb-2">
                        <i class="fas fa-lightbulb" style="color: var(--warning-amber); margin-right: 8px;"></i>
                        <strong>Consejos:</strong>
                    </p>
                    <ul class="text-sm text-muted" style="padding-left: 1.5rem;">
                        <li class="mb-2">Usa nombres claros y descriptivos</li>
                        <li class="mb-2">Evita categorías muy específicas</li>
                        <li class="mb-2">Piensa en cómo buscarían tus clientes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection