<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'LUXE',
            'Atelier Bogotá',
            'OroAndes',
            'Norte Leather',
            'Pacífica Couture',
            'Montaña Alta',
            'Páramo',
            'Selva',
            'Andina',
            'Sierra',
        ];

        foreach ($names as $name) {
            Brand::firstOrCreate(['name' => $name]);
        }

        // Si quieres volumen adicional para pruebas:
        // Brand::factory(8)->create();
    }
}
