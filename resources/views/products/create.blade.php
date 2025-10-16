@extends('layouts.app')


@section('content')
    <!-- Formulario -->
    <div class="container">
        <div class="form-container">
            <div class="form-card">
                <!-- Header -->
                <div class="form-header">
                    <div class="form-header-content">
                        <div class="form-icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <h1>Crear Nuevo Producto</h1>
                        <p>Completa la información para agregar un producto increíble</p>
                    </div>
                </div>

                <!-- Form Body -->
                <div class="form-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="form-label">
                                <i class="fas fa-tag label-icon"></i>
                                Nombre del Producto
                                <span class="required">*</span>
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
                                <i class="fas fa-certificate label-icon"></i>
                                Marca
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="brand"
                                name="brand"
                                placeholder="Ej: Apple, Nike, Samsung"
                                required
                            >
                            <div class="form-text">
                                La marca del fabricante del producto
                            </div>
                        </div>

                        <!-- Categoría -->
                        <div class="mb-4">
                            <label for="categoria" class="form-label">
                                <i class="fas fa-layer-group label-icon"></i>
                                Categoría
                                <span class="required">*</span>
                            </label>
                            <select
                                class="form-select"
                                id="categoria"
                                name="categoria"
                                required
                            >
                                <option value="" selected disabled>Selecciona una categoría</option>
                                <option value="electronica">📱 Electrónica</option>
                                <option value="ropa">👕 Ropa y Moda</option>
                                <option value="deportes">⚽ Deportes</option>
                                <option value="hogar">🏠 Hogar y Jardín</option>
                                <option value="juguetes">🎮 Juguetes y Juegos</option>
                                <option value="libros">📚 Libros</option>
                                <option value="alimentos">🍕 Alimentos y Bebidas</option>
                                <option value="salud">💊 Salud y Belleza</option>
                                <option value="automotriz">🚗 Automotriz</option>
                                <option value="otros">🔧 Otros</option>
                            </select>
                            <div class="form-text">
                                Categoría que mejor describe tu producto
                            </div>
                        </div>

                        <!-- Precio -->
                        <div class="mb-4">
                            <label for="precio" class="form-label">
                                <i class="fas fa-dollar-sign label-icon"></i>
                                Precio
                                <span class="required">*</span>
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
                                <i class="fas fa-align-left label-icon"></i>
                                Descripción
                                <span class="required">*</span>
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
                                <i class="fas fa-image label-icon"></i>
                                Imagen del Producto
                                <span class="required">*</span>
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
                        <div class="form-actions">
                            <button type="submit" class="btn btn-save">
                                <i class="fas fa-check me-2"></i>Guardar Producto
                            </button>
                            <a href="{{ url('/products') }}" class="btn btn-cancel">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </a>
                        </div>
                    </form>
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

