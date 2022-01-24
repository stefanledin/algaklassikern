<?php

namespace Tests\Unit;

use App\Models\Activity;
use App\Models\Discipline;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DisciplineTest extends TestCase
{
    use RefreshDatabase;

    public function test_discipline_model()
    {
        $attributes = [
            'name' => 'Skidor',
            'distance_to_complete' => 90000,
            'from_date' => '2022-01-01',
            'to_date' => '2022-03-31',
        ];

        Discipline::create($attributes);

        $this->assertDatabaseHas('disciplines', $attributes);
    }

    public function test_calculates_remaining_distance_for_user()
    {
        /** @var Discipline $skiing */
        $skiing = Discipline::factory()->create([
            'name' => 'Skidåkning', 
            'distance_to_complete' => 90000
        ]);
        
        /** @var User $user */
        $user = User::factory()->create();

        Activity::factory()->create([
            'date' => now()->subWeek()->toDateString(),
            'distance' => 10000,
            'discipline_id' => $skiing->id,
            'user_id' => $user->id,
        ]);

        Activity::factory()->create([
            'date' => now()->toDateString(),
            'distance' => 5000,
            'discipline_id' => $skiing->id,
            'user_id' => $user->id,
        ]);

        $this->assertEquals(75000, $skiing->distanceRemainingForUser($user));

        /** @var User $user2 */
        $user2 = User::factory()->create();

        Activity::factory()->create([
            'date' => now()->toDateString(),
            'distance' => 45000,
            'discipline_id' => $skiing->id,
            'user_id' => $user2->id,
        ]);
        
        $this->assertEquals(45000, $skiing->distanceRemainingForUser($user2));
    }

    public function test_activities_can_only_be_added_durning_the_active_period()
    {
        $year = now()->year;

        now()->setTestNow($year.'-04-01');

        /** @var Discipline $skiing */
        $skiing = Discipline::create([
            'name' => 'Skidor',
            'distance_to_complete' => 90000,
            'from_date' => $year . '-01-01',
            'to_date' => $year . '-03-31',
        ]);

        $this->assertFalse($skiing->isActiveDiscipline);

        now()->setTestNow($year.'-03-01');

        $this->assertTrue($skiing->isActiveDiscipline);
    }
}
