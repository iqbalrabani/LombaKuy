<?php

use App\Http\Controllers\SessionController;
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

Route::get('/detail', [TimController::class, 'detail']);

Route::get('/edit', [TimController::class, 'edit']);

// Route::get('/yourCompetition', function () {
//     return view('yourCompe');
// });

Route::get('/yourCompetition', [CompeController::class, 'showCompe']);
Route::get('/listCompetition', [CompeController::class, 'listLomba']);

Route::get('/listCompetition', [CompeController::class, 'listLomba'])->name('registration.submit');;



Route::get('/sesi',[SessionController::class,'index']);
Route::post('/sesi/login',[SessionController::class,'login']);