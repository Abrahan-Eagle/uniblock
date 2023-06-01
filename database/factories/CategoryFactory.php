<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(4);
        
        return [
            
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(20),
            'level' => $this->faker->randomElement(['blog', 'sermon', 'event']),

        ];
    }
}
