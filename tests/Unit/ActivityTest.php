<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Activity;
use App\Models\Discipline;
use App\Models\User;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_activity_model()
    {
        /** @var User $user */
        $user = User::factory()->create();

        Activity::create([
            'date' => now()->toDateString(),
            'distance' => 5000,
            'discipline_id' => 1,
            'user_id' => $user->id,
        ]);

        $this->assertCount(1, Activity::all());
        $this->assertEquals(5000, Activity::first()->distance);
    }

    public function test_activity_belongs_to_a_discipline()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Discipline $discipline */
        $discipline = Discipline::factory()->create();

        $activity = new Activity([
            'date' => now()->subDay()->toDateString(),
            'distance' => 10000,
        ]);

        $activity->discipline()->associate($discipline);
        $activity->save();

        $this->assertCount(1, Activity::all());
    }
}
