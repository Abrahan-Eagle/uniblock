<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->sentence(4);

        return [
            
            'name' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(100),
            'statusx' => $this->faker->randomElement(['DRAFT', 'PUBLISHED']),
            //'level' => $this->faker->randomElement(['blog', 'sermon', 'event']),

        ];
    }
}

