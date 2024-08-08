<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TechnologyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/{project}', [ProjectController::class, 'show']);

Route::get('technologies', [TechnologyController::class, 'index']);

Route::post('lead', [LeadController::class, 'store']);
// Dal front tramite chiamata ajax o axios ecc...manderà tramite post dei dati. Li riceviamo a questo endpoint delegando il metodo store al LeadController che validerà,dirà se ci sono errori, salverà la lead, manderà la mail e ritornerà il success se tutto è andato bene.