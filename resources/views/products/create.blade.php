@extends('admin.layouts.app')


@section('content')
<div class="luxury-dashboard">
    <!-- Header Section -->
    <div class="luxury-header">
        <h3>Nuevo producto</h3>
        <p>Unab Shop - Agregar Nuevo Producto al Catálogo</p>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>
                        <i class="material-symbols-rounded" style="vertical-align: middle; margin-right: 8px;">add_box</i>
                        Información del Producto
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

                    <form id="productForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="POST">

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                <i class="fas fa-tag" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Nombre del Producto
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="Ej: iPhone 15 Pro Max 256GB"
                                required
                                value="{{ old('name') }}"
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                Ingresa un nombre descriptivo y atractivo
                            </div>
                        </div>

                        <!-- Marca -->
                        <div class="mb-4">
                            <label for="brand" class="form-label">
                                <i class="fas fa-certificate" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Marca
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <select
                                class="form-select @error('brand_id') is-invalid @enderror"
                                id="brand"
                                name="brand_id"
                                required
                            >
                                <option value="" selected disabled>Selecciona una marca</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                La marca del fabricante del producto
                            </div>
                        </div>

                        <!-- Categoría -->
                        <div class="mb-4">
                            <label for="categoria" class="form-label">
                                <i class="fas fa-layer-group" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Categoría
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <select
                                class="form-select @error('category_id') is-invalid @enderror"
                                id="category_id"
                                name="category_id"
                                required
                            >
                                <option value="" selected disabled>Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                Categoría que mejor describe tu producto
                            </div>
                        </div>

                        <!-- Precio -->
                        <div class="mb-4">
                            <label for="price" class="form-label">
                                <i class="fas fa-dollar-sign" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Precio
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                <input
                                    type="number"
                                    class="form-control @error('price') is-invalid @enderror"
                                    id="price"
                                    name="price"
                                    placeholder="0.00"
                                    step="0.01"
                                    min="0"
                                    required
                                    value="{{ old('price') }}"
                                >
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-text">
                                Utiliza punto decimal (Ej: 99.99)
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Descripción
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <textarea
                                class="form-control @error('description') is-invalid @enderror"
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Describe las características, beneficios y detalles importantes del producto..."
                                required
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                Una buena descripción aumenta las ventas
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check" style="margin-right: 8px;"></i>Guardar Producto
                            </button>
                            <a href="{{ url('/admin') }}" class="btn btn-outline-dark">
                                <i class="fas fa-times" style="margin-right: 8px;"></i>Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--js -->
    <script>
        // Preview del archivo seleccionado
        const fileInput = document.getElementById('img');
        const uploadArea = document.getElementById('fileUploadArea');

        fileInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                uploadArea.classList.add('file-selected');
                uploadArea.querySelector('.upload-text').textContent = 'Archivo seleccionado';
                uploadArea.querySelector('.upload-subtext').textContent = fileName;
                uploadArea.querySelector('.upload-icon i').className = 'fas fa-check-circle';
            }
        });

        // Drag and drop functionality
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#667eea';
            this.style.background = 'white';
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#cbd5e0';
            this.style.background = '#fafbfc';
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#cbd5e0';
            this.style.background = '#fafbfc';

            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        });
    </script>
@endsection

