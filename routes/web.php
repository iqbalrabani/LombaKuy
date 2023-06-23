<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\CompeController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use App\Http\Controllers\RingkasanController;
use App\Models\Tim;
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

Route::get('/edit', [TimController::class, 'edit']);

// ! KOMPETISI (HAIDAR)
// Testing
Route::get('/test/{name}', [CompeController::class, 'testing']);

Route::get('/yourCompetition', [CompeController::class, 'showCompe']);
Route::get('/yourCompetition/{namePengguna}', [CompeController::class, 'showCompe']);
Route::get('/yourCompetition/{namePengguna}/{idPengguna}', [CompeController::class, 'showCompe2']);
Route::get('/listCompetition', [CompeController::class, 'listLomba']);
Route::get('/yourCompetition', [CompeController::class, 'showCompe'])->name('your-competitions');
Route::get('/listCompetition', [CompeController::class, 'listLomba'])->name('registration.submit');

// perpindahan dari yourcompe ke list compe yang ada
Route::get('/listCompetition/{idPengguna}', [CompeController::class, 'listLomba2'])->name('list-compe2');

// Apply lomba - Daftar timnya
Route::get('/buattim', [TimController::class, 'buat'])->name('buat-tim');

// Tambah lomba
Route::post('/applyCompetition', [CompeController::class, 'applyLomba'])->name('apply-lomba');
Route::get('/applyCompetition/{idPengguna}/{idLomba}', [CompeController::class, 'applyLomba2'])->name('apply-lomba2');

// hapus lomba
Route::get('/lomba/delete/{idLomba}',[CompeController::class,'deleteLomba']);

//  SHOW TEAM DARI KOMPETISI KE PROFILE TIM (HAIDAR)
Route::get('/lomba/showTeam/{idPengguna}',[CompeController::class,'showTeam']);


// ! LOGIN (mayun)
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