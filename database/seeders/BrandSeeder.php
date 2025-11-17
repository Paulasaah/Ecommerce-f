<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $myBrand1 = new Brand;
        $myBrand1->name = "Arkitect";
        $myBrand1->save();

        $myBrand2 = new Brand();
        $myBrand2->name = "Mattelsa";
        $myBrand2->save();

        $myBrand3 = new Brand();
        $myBrand3->name = "alo";
        $myBrand3->save();

        Brand::factory(10)->create();
    }
}
