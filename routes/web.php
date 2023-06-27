<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\CompeController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\EventController;
use App\Models\Member;
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


// LANDING PAGE
Route::get('/', function () {
    return view('landing.index');
});

// Rute untuk menambahkan anggota tim
Route::post('/tim/tambah-member', [TimController::class, 'tambahMember'])->name('tambahMember');
// web.php
Route::get('/tim/buat/{idPengguna}', [TimController::class, 'buat'])->name('buat-tim');

// Route::get('/buattim/{idPengguna}', [TimController::class, 'buat'])->name('buat-tim');

Route::delete('/tim/member/{namaMember}', [TimController::class, 'deleteMember'])->name('deleteMember');

Route::post('/tim/simpan-tim', [TimController::class, 'simpanTim'])->name('simpan-tim');

Route::get('/yourCompe/{idTim}', [TimController::class, 'yourCompe'])->name('yourCompe');

Route::post('yourCompetition/{namePengguna}/{idPengguna}', [TimController::class, 'yourCompe'])->name('yourCompetition');

Route::get('yourCompetitionx', [TimController::class, 'kembali'])->name('kembali');

Route::get('/yourCompe', [TimController::class, 'yourCompe'])->name('yourCompe');


// Rute untuk menyimpan tim
Route::post('/tim/simpan', [TimController::class, 'simpanTim'])->name('simpanTim');

// Rute untuk mengatur ulang form
Route::get('/tim/reset', [TimController::class, 'resetForm'])->name('resetForm');

// Rute untuk halaman index (contoh saja)
Route::get('/tim', [TimController::class, 'index'])->name('index');

Route::get('/detail', [TimController::class, 'detail']);

Route::get('/edit', [TimController::class, 'edit']);

// ! KOMPETISI (HAIDAR)
// Testing
Route::get('/test/{name}', [CompeController::class, 'testing']);

Route::get('/yourCompetition', [CompeController::class, 'showCompe']);
Route::post('/yourCompetition', function (Request $request) {
    // Validasi data yang diterima dari permintaan
    $request->validate([
        'namaTim' => 'required',
        'anggota' => 'required|array',
        'anggota.*.nama' => 'required',
        'anggota.*.idPengguna' => 'required',
        'anggota.*.kedudukan' => 'required',
    ]);

    // Ambil data dari permintaan
    $namaTim = $request->input('namaTim');
    $anggota = $request->input('anggota');

    // Simpan data tim ke database
    $tim = new Tim();
    $tim->namaTim = $namaTim;
    $tim->save();

    // Simpan data anggota tim ke database
    foreach ($anggota as $dataAnggota) {
        $nama = $dataAnggota['nama'];
        $idPengguna = $dataAnggota['idPengguna'];
        $kedudukan = $dataAnggota['kedudukan'];

        $tim->anggota()->create([
            'nama' => $nama,
            'idPengguna' => $idPengguna,
            'kedudukan' => $kedudukan,
        ]);
    }

    return response()->json(['message' => 'Tim berhasil disimpan']);
});
Route::get('/yourCompetition/{namePengguna}', [CompeController::class, 'showCompe']);
Route::get('/yourCompetition/{namePengguna}/{idPengguna}', [CompeController::class, 'showCompe2']);
Route::get('/listCompetition', [CompeController::class, 'listLomba']);
Route::get('/yourCompetition', [CompeController::class, 'showCompe'])->name('your-competitions');
Route::get('/listCompetition', [CompeController::class, 'listLomba'])->name('registration.submit');

// perpindahan dari yourcompe ke list compe yang ada
Route::get('/listCompetition/{idPengguna}/{namePengguna}', [CompeController::class, 'listLomba2'])->name('list-compe2');

// Apply lomba - Daftar timnya

// Tambah lomba
Route::post('/applyCompetition', [CompeController::class, 'applyLomba'])->name('apply-lomba');
Route::get('/applyCompetition/{idPengguna}/{idLomba}', [CompeController::class, 'applyLomba2'])->name('apply-lomba2');

// hapus lomba
Route::get('/lomba/delete/{idLomba}', [CompeController::class, 'deleteLomba']);

// ! SHOW TEAM DARI KOMPETISI KE PROFILE TIM (HAIDAR)
Route::get('/lomba/showTeam/{idPengguna}', [CompeController::class, 'showTeam']);
Route::get('/lomba/delete/{idLomba}', [CompeController::class, 'deleteLomba']);
Route::get('/lomba/delete/{idLomba}/{namePengguna}/{idPen}', [CompeController::class, 'deleteLomba2']);


//  SHOW TEAM DARI KOMPETISI KE PROFILE TIM (HAIDAR)
Route::get('/lomba/showTeam/{idPengguna}', [CompeController::class, 'showTeam']);


// ! LOGIN (mayun)
Route::get('/listCompetition', [CompeController::class, 'listLomba'])->name('registration.submit');;

Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);

// Show Event dari Admin
Route::get('/event', [EventController::class, 'index']);

// Menambah Event
Route::post('/event/add', [EventController::class, 'addLomba']);

// Merubah Event
Route::get('/event/edit/{idLomba}', [EventController::class, 'editPage']);
Route::post('/event/edited/{idLomba}', [EventController::class, 'editLomba']);

// Menghapus Event
Route::get('/event/delete/{idLomba}', [EventController::class, 'deleteLomba']);

// Fitur Register
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);

// Fitur Login
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);

// Fitur Logout
Route::get('/sesi/logout', [SessionController::class, 'logout']);

