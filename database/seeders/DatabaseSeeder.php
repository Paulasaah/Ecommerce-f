<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Si necesitas reinicializar tablas manualmente, descomenta:
        // \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \App\Models\Product::truncate();
        // \App\Models\Category::truncate();
        // \App\Models\Brand::truncate();
        // \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
        ]);

        // Crea productos (usa Category/Brand existentes vía ProductFactory)
        Product::factory(10)->create();

        // (Opcional) algunos “destacados” con datos más controlados:
        // Product::factory()->create([
        //     'name' => 'Vestido Seda Nocturna',
        //     'price' => 3250000,
        //     'description' => 'Seda italiana, corte sirena, edición limitada.',
        //     'category_id' => \App\Models\Category::where('name','Women')->value('id'),
        //     'brand_id' => \App\Models\Brand::where('name','LUXE')->value('id'),
        // ]);
    }
}
