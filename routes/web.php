<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\ProjectController;
use App\Models\Project;

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

Route::get('/index', function () {
    
    $progetti = Project::all();

    $data = [
        "progetti" => $progetti
    ];

    return view('index', $data);
});
Route::get('/show', function (Project $project) {
    
    $data = [
        "project" => $project
    ];
    
    return view('show', $data);
});



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
    });

require __DIR__ . '/auth.php';
