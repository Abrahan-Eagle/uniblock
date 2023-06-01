<?php

namespace Database\Factories;

use App\Models\Sermon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SermonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sermon::class;

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
            'img' => $this->faker->randomElement(['sermon1.jpg' , 'sermon2.jpg' , 'sermon3.jpg']),
            'url_video' => $this->faker->url,
            
        ];
    }
}
