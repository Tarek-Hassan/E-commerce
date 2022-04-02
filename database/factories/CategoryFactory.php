<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name=$this->faker->unique()->words($nb=2,$asText=true);
        return [
            'name' => $category_name,
            'slug' => Str::slug($category_name),
        ];
    }
}
