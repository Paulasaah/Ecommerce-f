<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'brand_id'
    ];
    public $timestamps = true;

    /**
     * Relación: Un producto pertenece a una marca
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * Relación: Un producto pertenece a una categoría
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
