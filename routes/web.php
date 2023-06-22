<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\CompeController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RingkasanController;
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


Route::get('/detail', [TimController::class, 'detail']);

Route::get('/buattim', [TimController::class, 'buat']);
Route::get('/edit', [TimController::class, 'edit']);

// ! KOMPETISI (HAIDAR)
Route::get('/yourCompetition', [CompeController::class, 'showCompe']);
Route::get('/listCompetition', [CompeController::class, 'listLomba']);
Route::get('/yourCompetition', [CompeController::class, 'showCompe'])->name('your-competitions');
Route::get('/listCompetition', [CompeController::class, 'listLomba'])->name('registration.submit');

// Tambah lomba
Route::post('/applyCompetition', [CompeController::class, 'applyLomba'])->name('apply-lomba');
// hapus lomba
Route::get('/lomba/delete/{idLomba}',[CompeController::class,'deleteLomba']);

// ! SHOW TEAM DARI KOMPETISI KE PROFILE TIM (HAIDAR)
Route::get('/lomba/showTeam/{idPengguna}',[CompeController::class,'showTeam']);


// ! LOGIN
Route::get('/listCompetition', [CompeController::class, 'listLomba'])->name('registration.submit');;

Route::get('/sesi',[SessionController::class,'index']);
Route::post('/sesi/login',[SessionController::class,'login']);

Route::get('/event',[EventController::class,'index']);
Route::post('/event/add',[EventController::class,'addLomba']);
Route::get('/event/edit/{idLomba}',[EventController::class,'editPage']);
Route::post('/event/edited/{idLomba}',[EventController::class,'editLomba']);
Route::get('/event/delete/{idLomba}',[EventController::class,'deleteLomba']);
Route::get('/getRingkasan/{id}', 'RingkasanController@show');
Route::get('/sesi/logout',[SessionController::class,'logout']);
Route::get('/sesi/register',[SessionController::class,'register']);
Route::post('/sesi/create',[SessionController::class,'create']);

// ! LOGIN
Route::get('/sesi',[SessionController::class,'index']);
Route::post('/sesi/login',[SessionController::class,'login']);