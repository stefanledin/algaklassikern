<?php

namespace Tests\Browser;

use App\Models\Discipline;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateActivityTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_create_activity()
    {
        $this->browse(function(Browser $browser) {
            now()->setTestNow(now()->year.'-02-01');
            
            /** @var Discipline $discipline */
            $discipline = Discipline::factory()->create([]);
            
            /** @var User $user */
            $user = User::factory()->create();
            
            $browser
                ->loginAs($user)
                ->visitRoute('dashboard')
                ->click('@register-activity')
                ->waitForRoute('activities.create')

                ->assertValue('#discipline', $discipline->name)

                ->keys('#date', now()->year, '{tab}', '02', '01')
                ->type('distance', 2500)

                ->click('input[type="submit"]')
                ->waitForRoute('dashboard', [], 2)
                ->assertSee('Träningspasset registrerat')
                ->click('@close-message')
                ->waitUntilMissingText('Träningspasset registrerat')
                ;

            $this->assertCount(1, $user->activities);
        });
    }

    public function test_validation()
    {
        
        $this->browse(function(Browser $browser) {
            now()->setTestNow(now()->year.'-02-01');
            
            Discipline::factory()->create([]);
            
            /** @var User $user */
            $user = User::factory()->create();
            
            $browser
                ->loginAs($user)
                ->visitRoute('activities.create')
                ->click('input[type="submit"]')
                ->assertSee('Du måste ange ett datum')
                ;
        });
    }
}
