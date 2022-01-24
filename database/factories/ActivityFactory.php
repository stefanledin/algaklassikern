<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => now()->toDateTimeString(),
            'distance' => $this->faker->randomNumber(3),
            'discipline_id' => 1,
            'user_id' => 1,
        ];
    }
}
