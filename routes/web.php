<?php

use App\Http\Controllers\CompeController;
use App\Http\Controllers\TimController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/tim', function () {
//     return view('index');
// });

Route::get('/tim', [TimController::class, 'index']);

// Route::get('/yourCompetition', function () {
//     return view('yourCompe');
// });

Route::get('/yourCompetition', [CompeController::class, 'showCompe']);
Route::get('/listCompetition', [CompeController::class, 'listLomba']);

Route::get('/listCompetition', [CompeController::class, 'listLomba'])->name('registration.submit');;



