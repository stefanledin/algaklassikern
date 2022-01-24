<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discipline::create([
            'name' => 'Skidåkning',
            'distance_to_complete' => 90000,
            'from_date' => '2022-01-01',
            'to_date' => '2022-03-31',
        ]);
        Discipline::create([
            'name' => 'Cykling',
            'distance_to_complete' => 3150,
            'from_date' => '2022-04-01',
            'to_date' => '2022-06-30',
        ]);
        Discipline::create([
            'name' => 'Simning',
            'distance_to_complete' => 3000,
            'from_date' => '2022-07-01',
            'to_date' => '2022-08-31',
        ]);
        Discipline::create([
            'name' => 'Löpning',
            'distance_to_complete' => 30000,
            'from_date' => '2022-07-01',
            'to_date' => '2022-08-31',
        ]);
    }
}
