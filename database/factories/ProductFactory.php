<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
    	return [
    	    'name' => $this->faker->name,
            'brand' => $this->faker->company,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'category' => $this->faker->word,
    	];
    }

    
}
