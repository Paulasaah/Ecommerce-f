<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $myCategory1 = new Category();
        $myCategory1->name = "Hombre";
        $myCategory1->save();

        $myCategory2 = new Category();
        $myCategory2->name = "Mujer";
        $myCategory2->save();

        $myCategory3 = new Category();
        $myCategory3->name = "Niño";
        $myCategory3->save();

        Category::factory(10)->create();
    }
}
