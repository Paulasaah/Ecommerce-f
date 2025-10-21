<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Genera 60 productos aleatorios (ajusta el número)
        Product::factory(60)->create();
    }
}
