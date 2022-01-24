<?php

use App\Http\Controllers\ActivityController;
use App\Models\Discipline;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', function () {
        /** @var User $user */
        $user = auth()->user();
        $activities = $user->activities()->orderByDesc('date')->get();

        return view('dashboard', [
            'user' => $user,
            'activities' => $activities,
            'distanceRemaining' => Discipline::current()->distanceRemainingForUser($user),
        ]);
    })->name('dashboard');

    Route::resource('activities', ActivityController::class);

});



require __DIR__.'/auth.php';
