<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TiketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'organizer' => $this->faker->name(),
            'category_id' => mt_rand(1,3),
            'location' => $this->faker->address(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'price' => $this->faker->randomFloat(2,0,100),
        ];
    }
}
