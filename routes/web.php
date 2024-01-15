<?php

use App\Http\Controllers\AdventuresController;
use App\Http\Controllers\AttacksController;
use App\Http\Controllers\BackgroundsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RacesController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\SpellsController;
use App\Http\Controllers\SubRacesController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\WeaponsController;
use App\Models\Adventure;
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
    return Inertia::render('Home', ['adventures' => Adventure::all()]);
})->name('home');

Route::get('/D&D/about', function () {
    return Inertia::render('About');
})->name('aboutD&D');

Route::get('/D&D/aventures/lmop', function () {
    return view('D&D infos et aventures.aventure_lmop');
})->name('lmop');

Route::resource('categories', CategoriesController::class)->only('index');
Route::resource('spells', SpellsController::class)->only('index', 'show');

Route::resource('characters', CharactersController::class)->except('index');
Route::get('categories/{category}/characters', [CharactersController::class, 'index'])->name('characters.index');

Route::middleware('auth')->group(function () {
    Route::resource('profile', ProfileController::class)->only('edit', 'update', 'destroy');

    Route::group(['prefix' => 'resources'], function () {
        Route::get('/', function () {
            return Inertia::render('Admin/ResourcesIndex');
        })->name('resources');

        Route::get('/create', ResourcesController::class)->name('resources.create');

        Route::resource('adventures', AdventuresController::class)->only('create', 'store');
        Route::resource('attacks', AttacksController::class)->only('create', 'store');
        Route::resource('backgrounds', BackgroundsController::class)->only('create', 'store');
        Route::resource('features', FeaturesController::class)->only('create', 'store');
        Route::resource('goals', GoalsController::class)->only('create', 'store');
        Route::resource('races', RacesController::class)->only('create', 'store');
        Route::resource('subraces', SubRacesController::class)->only('create', 'store');
        Route::resource('utilities', UtilitiesController::class)->only('create', 'store');
        Route::resource('weapons', WeaponsController::class)->only('create', 'store');
    });
});

require __DIR__.'/auth.php';
