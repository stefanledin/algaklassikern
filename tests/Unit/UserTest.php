<?php

namespace Tests\Unit;

use App\Models\Activity;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations, HasFactory;

    /**
     * Testar att en användare kan skapas & sparas i databasen.
     */
    public function test_user_model()
    {
        $userAttributes = [
            'firstname' => 'Stefan',
            'lastname' => 'Ledin',
            'email' => 'info@stefanledin.se',
            'password' => Hash::make('my-password'),
        ];

        User::create($userAttributes);

        $this->assertDatabaseHas('users', $userAttributes);
    }

    public function test_user_has_activities()
    {
        /** @var User $user */
        $user = User::factory()->create();
        
        $activity = Activity::factory()->make([
            'user_id' => null,
        ]);

        $user->activities()->save($activity);

        $this->assertCount(1, $user->activities);
    }
}
