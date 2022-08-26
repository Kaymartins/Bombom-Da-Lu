<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'flavor' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2),
            'image' => $this->faker->imageUrl(640, 480, 'candy', true),
            'description' => $this->faker->text()
        ];
    }
}
