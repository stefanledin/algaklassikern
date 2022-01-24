<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_log_in()
    {
        $this->browse(function(Browser $browser) {
            $user = User::factory()->create([
                'email' => $email = 'user@example.com',
                'password' => Hash::make('pass')
            ]);

            $browser
                ->visit('/')
                ->click('@login')
                ->waitForRoute('login')
                ->type('email', $email)
                ->type('password', 'pass')
                ->click('@login-btn')
                ->assertRouteIs('dashboard')
                ;
        });
    }

    public function test_guest_cant_visit_dashboard()
    {
        $this->browse(function(Browser $browser) {
            $browser
                ->visitRoute('dashboard')
                ->assertRouteIs('login');
        });
    }
}
