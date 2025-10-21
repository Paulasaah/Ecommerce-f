<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryId = Category::inRandomOrder()->value('id') ?? Category::factory();
        $brandId    = Brand::inRandomOrder()->value('id') ?? Brand::factory();

        return [
            'name' => ucfirst($this->faker->words(3, true)),
            'price' => $this->faker->numberBetween(120_000, 990_000),
            'description' => $this->faker->sentence(15),
            'category_id' => $categoryId,
            'brand_id' => $brandId,
        ];
    }
}
