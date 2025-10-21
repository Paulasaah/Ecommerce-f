@extends('layouts.app')

@section('title', 'Create New Product — LUXE Colombia')

@push('styles')
<style>
    .create-product-section {
        padding: 8rem 4rem 4rem;
        max-width: 900px;
        margin: 0 auto;
    }

    .form-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .form-header h1 {
        margin-bottom: 1rem;
    }

    .form-header p {
        color: #666;
    }

    .product-form {
        background: white;
        padding: 3rem;
        border: 1px solid var(--pearl);
        border-radius: 2px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 500;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 0.8rem;
        color: var(--onyx);
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 1rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--ivory);
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--gold);
        background: white;
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
        line-height: 1.6;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }

    .file-upload {
        border: 2px dashed #ccc;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--ivory);
        border-radius: 8px;
        position: relative;
    }

    .file-upload:hover {
        border-color: var(--gold);
        background: var(--champagne);
    }

    .file-upload input[type="file"] {
        display: none;
    }

    .upload-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 1rem;
        stroke: var(--gold);
    }

    .image-preview {
        max-width: 300px;
        margin: 1rem auto 0;
        border: 1px solid var(--pearl);
        border-radius: 8px;
        overflow: hidden;
    }

    .image-preview img {
        width: 100%;
        height: auto;
        display: block;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 3rem;
        justify-content: flex-end;
    }

    .btn-cancel {
        padding: 1rem 2.5rem;
        background: transparent;
        color: var(--onyx);
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-cancel:hover {
        border-color: var(--onyx);
        background: var(--pearl);
    }

    .required {
        color: var(--gold);
    }

    .error-message {
        color: #DC3545;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: none;
    }

    .form-group.has-error .form-input,
    .form-group.has-error .form-select,
    .form-group.has-error .form-textarea {
        border-color: #DC3545;
    }

    .form-group.has-error .error-message {
        display: block;
    }

    @media (max-width: 768px) {
        .create-product-section {
            padding: 6rem 2rem 2rem;
        }

        .product-form {
            padding: 2rem 1.5rem;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-cancel,
        .btn-primary {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')

<section class="create-product-section">
    <div class="form-header">
        <p class="section-label">Admin Panel</p>
        <h1>Create New Product</h1>
        <p>Add a new luxury item to the LUXE Colombia collection</p>
    </div>

    @if ($errors->any())
        <div class="alert-auth alert-danger" style="margin-bottom: 2rem;">
            <i class="fas fa-exclamation-circle"></i>
            <div>
                <strong>Please correct the following errors:</strong>
                <ul style="margin: 0.5rem 0 0 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="product-form" id="productForm">
        @csrf

        <!-- Product Name -->
        <div class="form-group">
            <label class="form-label" for="name">Product Name <span class="required">*</span></label>
            <input type="text"
                   id="name"
                   name="name"
                   class="form-input"
                   placeholder="e.g., Silk Evening Dress"
                   value="{{ old('name') }}"
                   required>
            <span class="error-message">Please enter a product name</span>
        </div>

        <!-- Category & Price -->
        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="category">Category <span class="required">*</span></label>
                <select id="category" name="category" class="form-select" required>
                    <option value="">Select category</option>
                    @foreach($category as $cat)
                        <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                <span class="error-message">Please select a category</span>
            </div>

            <div class="form-group">
                <label class="form-label" for="price">Price (USD) <span class="required">*</span></label>
                <input type="number"
                       id="price"
                       name="price"
                       class="form-input"
                       placeholder="2450.00"
                       step="0.01"
                       min="0"
                       value="{{ old('price') }}"
                       required>
                <span class="error-message">Please enter a valid price</span>
            </div>
        </div>

        <!-- SKU & Stock -->
        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="sku">SKU <span class="required">*</span></label>
                <input type="text"
                       id="sku"
                       name="sku"
                       class="form-input"
                       placeholder="LUXE-001"
                       value="{{ old('sku') }}"
                       required>
                <span class="error-message">Please enter a unique SKU</span>
            </div>

            <div class="form-group">
                <label class="form-label" for="stock">Stock Quantity <span class="required">*</span></label>
                <input type="number"
                       id="stock"
                       name="stock"
                       class="form-input"
                       placeholder="25"
                       min="0"
                       value="{{ old('stock') }}"
                       required>
                <span class="error-message">Please enter stock quantity</span>
            </div>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label class="form-label" for="description">Product Description <span class="required">*</span></label>
            <textarea id="description"
                      name="description"
                      class="form-textarea"
                      placeholder="Elegant silk evening dress with intricate Colombian-inspired embroidery. Perfect for special occasions."
                      required>{{ old('description') }}</textarea>
            <span class="error-message">Please enter a description</span>
        </div>

        <!-- Badge/Tag -->
        <div class="form-group">
            <label class="form-label" for="badge">Badge/Tag (Optional)</label>
            <select id="badge" name="badge" class="form-select">
                <option value="">No badge</option>
                <option value="NEW" {{ old('badge') == 'NEW' ? 'selected' : '' }}>NEW</option>
                <option value="EXCLUSIVE" {{ old('badge') == 'EXCLUSIVE' ? 'selected' : '' }}>EXCLUSIVE</option>
                <option value="LIMITED" {{ old('badge') == 'LIMITED' ? 'selected' : '' }}>LIMITED</option>
                <option value="SALE" {{ old('badge') == 'SALE' ? 'selected' : '' }}>SALE</option>
            </select>
        </div>

        <!-- Sizes Available -->
        <div class="form-group">
            <label class="form-label">Available Sizes <span class="required">*</span></label>
            <div style="display: flex; gap: 1rem; margin-top: 0.5rem; flex-wrap: wrap;">
                @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                    <input type="checkbox"
                           name="sizes[]"
                           value="{{ $size }}"
                           {{ is_array(old('sizes')) && in_array($size, old('sizes')) ? 'checked' : '' }}
                           style="width: 18px; height: 18px; cursor: pointer;">
                    <span>{{ $size }}</span>
                </label>
                @endforeach
            </div>
            <span class="error-message" id="sizesError">Please select at least one size</span>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label class="form-label" for="image">Product Image <span class="required">*</span></label>
            <label for="image" class="file-upload" id="fileUploadLabel">
                <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" y1="3" x2="12" y2="15"></line>
                </svg>
                <p style="color: var(--gold); font-weight: 500; margin-bottom: 0.5rem;">Click to upload image</p>
                <p style="font-size: 0.9rem; color: #666;">PNG, JPG or WEBP (max. 5MB)</p>
                <input type="file" id="image" name="image" accept="image/*" required>
                <div class="image-preview" id="imagePreview" style="display: none;"></div>
            </label>
            <span class="error-message">Please select an image</span>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <a href="{{ route('products.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-primary">Create Product</button>
        </div>
    </form>
</section>

@endsection

@push('scripts')
<script>
    // File upload preview
    const imageInput = document.getElementById('image');
    const fileUploadLabel = document.getElementById('fileUploadLabel');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file) {
            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                imageInput.value = '';
                return;
            }

            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                alert('Please select a valid image file (JPG, PNG, or WEBP)');
                imageInput.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                imagePreview.style.display = 'block';

                // Hide upload icon and text
                fileUploadLabel.querySelector('.upload-icon').style.display = 'none';
                fileUploadLabel.querySelectorAll('p').forEach(p => p.style.display = 'none');
            };
            reader.readAsDataURL(file);
        }
    });

    // Form validation
    const productForm = document.getElementById('productForm');

    productForm.addEventListener('submit', function(e) {
        let isValid = true;

        // Validate name
        const nameInput = document.getElementById('name');
        if (!nameInput.value.trim()) {
            showError(nameInput);
            isValid = false;
        } else {
            hideError(nameInput);
        }

        // Validate category
        const categorySelect = document.getElementById('category');
        if (!categorySelect.value) {
            showError(categorySelect);
            isValid = false;
        } else {
            hideError(categorySelect);
        }

        // Validate price
        const priceInput = document.getElementById('price');
        if (!priceInput.value || parseFloat(priceInput.value) < 0) {
            showError(priceInput);
            isValid = false;
        } else {
            hideError(priceInput);
        }

        // Validate SKU
        const skuInput = document.getElementById('sku');
        if (!skuInput.value.trim()) {
            showError(skuInput);
            isValid = false;
        } else {
            hideError(skuInput);
        }

        // Validate stock
        const stockInput = document.getElementById('stock');
        if (!stockInput.value || parseInt(stockInput.value) < 0) {
            showError(stockInput);
            isValid = false;
        } else {
            hideError(stockInput);
        }

        // Validate description
        const descriptionTextarea = document.getElementById('description');
        if (!descriptionTextarea.value.trim()) {
            showError(descriptionTextarea);
            isValid = false;
        } else {
            hideError(descriptionTextarea);
        }

        // Validate sizes
        const sizesChecked = document.querySelectorAll('input[name="sizes[]"]:checked');
        const sizesError = document.getElementById('sizesError');
        if (sizesChecked.length === 0) {
            sizesError.style.display = 'block';
            isValid = false;
        } else {
            sizesError.style.display = 'none';
        }

        // Validate image
        if (!imageInput.files || imageInput.files.length === 0) {
            showError(imageInput);
            isValid = false;
        } else {
            hideError(imageInput);
        }

        if (!isValid) {
            e.preventDefault();
            // Scroll to first error
            const firstError = document.querySelector('.form-group.has-error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });

    function showError(input) {
        const formGroup = input.closest('.form-group');
        formGroup.classList.add('has-error');
    }

    function hideError(input) {
        const formGroup = input.closest('.form-group');
        formGroup.classList.remove('has-error');
    }

    // Real-time validation
    document.querySelectorAll('.form-input, .form-select, .form-textarea').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                showError(this);
            } else {
                hideError(this);
            }
        });

        input.addEventListener('input', function() {
            if (this.value.trim()) {
                hideError(this);
            }
        });
    });

    // Auto-generate SKU from product name
    const nameInput = document.getElementById('name');
    const skuInput = document.getElementById('sku');

    nameInput.addEventListener('blur', function() {
        if (!skuInput.value) {
            const sku = 'LUXE-' + this.value
                .toUpperCase()
                .replace(/[^A-Z0-9]/g, '')
                .substring(0, 6) +
                '-' + Date.now().toString().slice(-4);
            skuInput.value = sku;
        }
    });

    // Price formatting
    const priceInput = document.getElementById('price');
    priceInput.addEventListener('blur', function() {
        if (this.value) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    });
</script>
@endpush
