<?php

use App\Http\Controllers\BattleController;
use App\Http\Controllers\KnightController;
use App\Models\Knight;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/createknights',[KnightController::class,'createKnights']);

Route::get('/getknights',[KnightController::class,'getKnights']);

Route::get('/getcandidates',[KnightController::class,'getCandidates']);

Route::get('/getfinalists',[KnightController::class,'getFinalists']);

Route::post('/sendletter',[KnightController::class, 'sendLetter']);

Route::get('/exclude/{id}',[KnightController::class,'excludeKnight'])->middleware('auth');

Route::post('/startbattle',[BattleController::class,'startBattle']);


require __DIR__.'/auth.php';
