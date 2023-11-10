<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'image' => $this->faker->imageUrl(),
            'color' => $this->faker->randomElement(['red', 'green', 'blue', 'yellow', 'black', 'white']),
            'price' => $this->faker->numberBetween(100, 1000),
            'size' => $this->faker->randomElement(['s', 'm', 'l', 'xl', 'xxl', 'xxxl']),
            'quantity' => $this->faker->numberBetween(1, 20),
        ];
    }
}
