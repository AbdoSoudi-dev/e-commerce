<?php

namespace Database\Factories;

use App\Models\Admin;
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
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->unique()->slug(),
            'image' => $this->faker->imageUrl,
            'description' => $this->faker->text(),
            'rating' => $this->faker->randomFloat(2, 0, 5),
            'category_id' => Category::factory(),
            'admin_id' => Admin::factory()
        ];
    }
}
