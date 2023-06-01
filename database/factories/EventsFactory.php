<?php

namespace Database\Factories;

use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Events::class;

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
            'img' => $this->faker->randomElement(['event1.jpg' , 'event2.jpg' , 'event3.jpg' , 'event4.jpg',
            'event5.jpg', 'event6.jpg']),
            'title' => $this->faker->address,
            'date_activi' => $this->faker->dateTime($max = 'now', $timezone = null),
            'last_activity' => $this->faker->dateTime($max = 'now', $timezone = null),

        ];
    }
}
