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
        $myBrand1->name = "Apple";
        $myBrand1->save();

        $myBrand2 = new Brand();
        $myBrand2->name = "Samgsumg";
        $myBrand2->save();

        $myBrand3 = new Brand();
        $myBrand3->name = "Xiaomi";
        $myBrand3->save();

        Brand::factory(1000)->create();
    }
}
