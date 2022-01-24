<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DisciplineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Skidåkning',
            'distance_to_complete' => 90000,
            'from_date' => now()->year.'-01-01',
            'to_date' => now()->year.'-03-31',
        ];
    }
}
