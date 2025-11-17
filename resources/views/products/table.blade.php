@extends('admin.layouts.app')

@section('content')

<div class="luxury-dashboard">
    <div class="luxury-header">
        <h3>Lista de Productos</h3>
        <p>Unab Shop - Lista de Productos</p>
    </div>
    <div class="card">
        <div class="card-header">
            <h6>
                <i class="material-symbols-rounded" style="vertical-align: middle; margin-right: 8px;">list</i>
                Lista de Productos
            </h6>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Actualizado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->brand ? $product->brand->name : 'Sin marca' }}</td>
                            <td>{{ $product->category ? $product->category->name : 'Sin categoría' }}</td>
                            <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $product->updated_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a style="color: red" href="a">Eliminar</a>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fas fa-inbox fa-3x mb-3" style="opacity: 0.3;"></i>
                                <p class="mb-0">No hay productos registrados</p>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus" style="margin-right: 8px;"></i>Crear Primer Producto
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
