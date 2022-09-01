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
        $list_products = ['Diamante Negro', 'Sonho de valsa', 'Laka', 'Brigadeiro', 'Bombom', 'Beijinho', 'Bala'];
        $list_flavors = ['Chocolate','Coco','Morango','Prestigio','laranja'];
        return [
            'name' => $list_products[array_rand($list_products)],
            'flavor' => $list_flavors[array_rand($list_flavors)],
            'price' => $this->faker->randomFloat(2),
            'image' => 'bombom.jpeg',
            'description' => $this->faker->text()
        ];
    }
}
