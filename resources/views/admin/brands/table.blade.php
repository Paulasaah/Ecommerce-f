@extends('admin.layouts.app')

@section('content')

<div class="luxury-dashboard">
    <div class="luxury-header">
        <h3>Lista de Marcas</h3>
        <p>Unab Shop - Gestión de Marcas</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-4">
            <i class="fas fa-exclamation-triangle" style="margin-right: 8px;"></i>
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h6>
                <i class="material-symbols-rounded" style="vertical-align: middle; margin-right: 8px;">list</i>
                Lista de Marcas
            </h6>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success mb-3" href="{{ route('admin.brands.create') }}">
                <i class="fas fa-plus" style="margin-right: 8px;"></i>Agregar nueva marca
            </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Actualizado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brands as $brand)
                        <tr>
                            <th scope="row">{{ $brand->id }}</th>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $brand->products_count }} productos
                                </span>
                            </td>
                            <td>{{ $brand->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $brand->updated_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta marca?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fas fa-inbox fa-3x mb-3" style="opacity: 0.3;"></i>
                                <p class="mb-0">No hay marcas registradas</p>
                                <a href="{{ route('admin.brands.create') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus" style="margin-right: 8px;"></i>Crear Primera Marca
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $brands->links() }}
        </div>
    </div>
</div>
@endsection
