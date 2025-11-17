<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brand";
    protected $primarykey = 'id';
    protected $fillable = ['name'];
    public $timestamps = true;

    /**
     * Relación: Una marca tiene muchos productos
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
