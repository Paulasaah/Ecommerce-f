<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImageHelper;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */
    protected $table = 'category';
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'slug',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the category image URL with fallback
     */
    public function getImageAttribute()
    {
        return ImageHelper::getCategoryImage($this);
    }

    /**
     * Get products count for the category
     */
    public function getProductsCountAttribute(): int
    {
        return $this->products()->count();
    }

    /**
     * Get in-stock products for the category
     */
    public function inStockProducts()
    {
        return $this->products()->where('stock', '>', 0);
    }

    /**
     * Scope to get categories with products
     */
    public function scopeWithProducts($query)
    {
        return $query->has('products');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug from name if not provided
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = \Illuminate\Support\Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = \Illuminate\Support\Str::slug($category->name);
            }
        });
    }
}

// ===== ESTRUCTURA DE LA TABLA CATEGORIES =====
//
// CREATE TABLE categories (
//     id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL UNIQUE,
//     description TEXT NULLABLE,
//     image_url VARCHAR(255) NULLABLE,
//     slug VARCHAR(255) NULLABLE UNIQUE,
//     created_at TIMESTAMP NULL,
//     updated_at TIMESTAMP NULL
// );
//
// ===== EJEMPLO DE USO =====
//
// 1. Obtener categorías con productos:
//    $categories = Category::withProducts()->get();
//
// 2. Obtener productos de una categoría:
//    $products = $category->products;
//
// 3. Contar productos:
//    $count = $category->products_count;
//
// 4. Productos en stock:
//    $inStock = $category->inStockProducts()->get();
//
// 5. Obtener imagen:
//    {{ $category->image }}
