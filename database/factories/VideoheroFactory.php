<?php

namespace Database\Factories;

use App\Models\Videohero;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoheroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Videohero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'title' => $this->faker->text(150),
            'content' => $this->faker->paragraph(100),
            'img' => $this->faker->randomElement(['founder.jpg']),
            'url_video' => $this->faker->url,

        ];
    }
}
