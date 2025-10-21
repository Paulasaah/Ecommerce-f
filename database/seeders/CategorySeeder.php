<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Women',
            'Men',
            'Accessories',
            'Shoes',
            'Bags',
            'Jewelry',
            'Fragrances',
            'Limited Edition',
        ];

        foreach ($names as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        // Si quieres volumen adicional para pruebas:
        // Category::factory(10)->create();
    }
}
