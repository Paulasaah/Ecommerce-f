<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto - ShopHub</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #fafbfc;
            min-height: 100vh;
            padding: 2rem 0;
        }

        /* Navbar Minimalista */
        .navbar-custom {
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
            padding: 1rem 0;
            margin-bottom: 3rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 1.2rem;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .logo-text {
            font-weight: 700;
            font-size: 1.4rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-back-nav {
            background: #f7fafc;
            color: #4a5568;
            font-weight: 600;
            border: 1px solid #e2e8f0;
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-back-nav:hover {
            background: white;
            border-color: #cbd5e0;
            color: #2d3748;
        }

        /* Form Container */
        .form-container {
            max-width: 750px;
            margin: 0 auto;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .form-header {
            padding: 2.5rem;
            text-align: center;
            border-bottom: 1px solid #f7fafc;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #667eea10 0%, #764ba210 100%);
            border-radius: 50%;
        }

        .form-header-content {
            position: relative;
            z-index: 1;
        }

        .form-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem auto;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .form-icon i {
            font-size: 2rem;
            color: white;
        }

        .form-header h1 {
            font-weight: 800;
            font-size: 2rem;
            margin: 0 0 0.5rem 0;
            color: #1a202c;
            letter-spacing: -0.5px;
        }

        .form-header p {
            margin: 0;
            color: #718096;
            font-size: 1rem;
        }

        .form-body {
            padding: 2.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.6rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label .required {
            color: #e53e3e;
        }

        .label-icon {
            color: #a0aec0;
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.85rem 1.1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fafbfc;
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.08);
            background: white;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 130px;
        }

        .form-text {
            font-size: 0.85rem;
            color: #a0aec0;
            margin-top: 0.4rem;
        }

        /* File Upload Minimalista */
        .file-upload-area {
            border: 2px dashed #cbd5e0;
            border-radius: 16px;
            padding: 3rem 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fafbfc;
            position: relative;
        }

        .file-upload-area:hover {
            border-color: #667eea;
            background: white;
        }

        .file-upload-area input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem auto;
        }

        .upload-icon i {
            font-size: 2rem;
            color: #cbd5e0;
        }

        .upload-text {
            color: #2d3748;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .upload-subtext {
            color: #a0aec0;
            font-size: 0.9rem;
        }

        .file-selected {
            border-color: #48bb78;
            background: #f0fff4;
        }

        .file-selected .upload-icon {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        }

        .file-selected .upload-icon i {
            color: white;
        }

        .file-selected .upload-text {
            color: #38a169;
        }

        /* Input Group Minimalista */
        .input-group-text {
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: #a0aec0;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }

        .input-group .form-control:focus {
            border-left: none;
        }

        /* Botones Minimalistas */
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 1px solid #f7fafc;
        }

        .btn-save {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.35);
            color: white;
        }

        .btn-cancel {
            flex: 1;
            background: #f7fafc;
            color: #4a5568;
            font-weight: 600;
            border: 2px solid #e2e8f0;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background: white;
            border-color: #cbd5e0;
            color: #2d3748;
        }

        @media (max-width: 768px) {
            .form-body {
                padding: 1.8rem;
            }

            .form-header {
                padding: 2rem 1.5rem;
            }

            .form-header h1 {
                font-size: 1.6rem;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-custom">
        <div class="container">
            <a href="{{ url('/products') }}" class="logo-container">
                <div class="logo-icon">S</div>
                <span class="logo-text">ShopHub</span>
            </a>
            <a href="{{ url('/products') }}" class="btn-back-nav">
                <i class="fas fa-arrow-left me-2"></i>Volver
            </a>
        </div>
    </nav>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

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
</body>
</html>
