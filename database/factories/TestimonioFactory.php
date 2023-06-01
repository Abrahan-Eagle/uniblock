<?php

namespace Database\Factories;

use App\Models\Testimonio;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimonio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'title' => $this->faker->text(150),
            'content' => $this->faker->paragraph,
            'img' => $this->faker->randomElement(['person_1.jpg' , 'person_2.jpg']),
            
        ];
    }
}
