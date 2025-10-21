<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImageHelper;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'sku',
        'category_id',
        'image_url',
        'badge',
        'sizes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'sizes' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the product image URL with fallback
     */
    public function getImageAttribute()
    {
        return ImageHelper::getProductImage($this);
    }

    /**
     * Check if product is in stock
     */
    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Get available sizes as array
     */
    public function getSizesArrayAttribute(): array
    {
        if (is_string($this->sizes)) {
            return json_decode($this->sizes, true) ?? [];
        }
        return is_array($this->sizes) ? $this->sizes : [];
    }

    /**
     * Scope to get only in-stock products
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * Scope to get products by category
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope to get featured products (with badges)
     */
    public function scopeFeatured($query)
    {
        return $query->whereNotNull('badge');
    }

    /**
     * Scope to search products
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%")
                    ->orWhere('sku', 'like', "%{$term}%");
    }

    /**
     * Scope to order by price
     */
    public function scopeOrderByPrice($query, $direction = 'asc')
    {
        return $query->orderBy('price', $direction);
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}

// ===== EJEMPLO DE USO =====
//
// 1. Obtener productos en stock:
//    $products = Product::inStock()->get();
//
// 2. Buscar productos:
//    $results = Product::search('dress')->get();
//
// 3. Productos por categoría:
//    $products = Product::byCategory(1)->get();
//
// 4. Productos destacados:
//    $featured = Product::featured()->get();
//
// 5. Ordenar por precio:
//    $products = Product::orderByPrice('desc')->get();
//
// 6. Obtener imagen del producto:
//    $product->image (usa el helper automáticamente)
//
// 7. Verificar stock:
//    if ($product->isInStock()) { ... }
//
// 8. Precio formateado:
//    {{ $product->formatted_price }}
