@extends('admin.layouts.app')


@section('content')
<div class="luxury-dashboard">
    <!-- Header Section -->
    <div class="luxury-header">
        <h3>Crear Producto</h3>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="form-label">
                                <i class="fas fa-tag" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Nombre del Producto
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="nombre"
                                name="nombre"
                                placeholder="Ej: iPhone 15 Pro Max 256GB"
                                required
                            >
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
                                class="form-select"
                                id="brand"
                                name="brand"
                                required
                            >
                                <option value="" selected disabled>Selecciona una marca</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
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
                                class="form-select"
                                id="categoria"
                                name="categoria"
                                required
                            >
                                <option value="" selected disabled>Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-text">
                                Categoría que mejor describe tu producto
                            </div>
                        </div>

                        <!-- Precio -->
                        <div class="mb-4">
                            <label for="precio" class="form-label">
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
                                    class="form-control"
                                    id="precio"
                                    name="precio"
                                    placeholder="0.00"
                                    step="0.01"
                                    min="0"
                                    required
                                >
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
                                class="form-control"
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Describe las características, beneficios y detalles importantes del producto..."
                                required
                            ></textarea>
                            <div class="form-text">
                                Una buena descripción aumenta las ventas
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="mb-4">
                            <label for="img" class="form-label">
                                <i class="fas fa-image" style="margin-right: 8px; color: var(--luxury-accent);"></i>
                                Imagen del Producto
                                <span style="color: var(--error-red);">*</span>
                            </label>
                            <div class="file-upload-area" id="fileUploadArea">
                                <input
                                    type="file"
                                    id="img"
                                    name="img"
                                    accept="image/*"
                                    required
                                >
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="upload-text">Arrastra tu imagen o haz clic para seleccionar</div>
                                <div class="upload-subtext">JPG, PNG o GIF (máx. 5MB)</div>
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

