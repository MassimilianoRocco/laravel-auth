<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechnologyController;
use App\Models\Project;
use App\Models\Technology;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/proj_index', function () {
    
    $progetti = Project::all();

    $data = [
        "progetti" => $progetti
    ];

    return view('projects', $data);
});
Route::get('/show/{project}', function (Project $project) {
    
    $data = [
        "project" => $project
    ];
    
    return view('show', $data);
});


Route::get('/tech_index', function () {
    
    $techs = Technology::all();

    $data = [
        "techs" => $techs
    ];

    return view('technologies', $data);
});



// Route::resource('/projects', ProjectController::class)->only([
//     'index', 'show'
// ]);

// Auth::check() da usare nelle funzioni qui o in quelle dei controller per restituire magari viste diverse in base all'autenticazione o meno dell'utente. Ovviamente ha poco senso qui che abbiamo il middleware (?)

Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::resource('/projects', ProjectController::class);

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/admin_welcome', [DashboardController::class, 'home'])->name('admin_welcome');

        Route::resource('/technologies', TechnologyController::class);
    });

require __DIR__ . '/auth.php';
