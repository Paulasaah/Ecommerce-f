<?php

namespace Database\Factories;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        $brand = ['Tommy Hilfiger', 'H&M', 'Aeropostale', 'Adidas', 'alo', 'Mattelsa', 'Levis', 'Puma', 'Nike', 'Adidas', 'Under Armour'];
        return [
            'name' => $this->faker->randomElement($brand)
        ];
    }
}
