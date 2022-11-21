<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});


// for mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa')->middleware('auth');

Route::get('/insertMahasiswa', [MahasiswaController::class, 'insertMahasiswa'])->name('insert data')->middleware('auth');
Route::post('/addMahasiswa', [MahasiswaController::class, 'addMahasiswa'])->name('add');

Route::get('/tampilDataMahasiswa/{id}', [MahasiswaController::class, 'tampilDataMahasiswa'])->name('tampildata')->middleware('auth');
Route::post('/updateDataMahasiswa/{id}', [MahasiswaController::class, 'updateDataMahasiswa'])->name('updatedata');

Route::get('/deleteMahasiswa/{id}', [MahasiswaController::class, 'daleteMahasiswa'])->name('dalete');




// for matakuliah
Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah')->middleware('auth');
Route::get('/insertMatakuliah', [MatakuliahController::class, 'insertMatakuliah'])->name('insertMatakuliah')->middleware('auth');
Route::post('/addMatakuliah', [MatakuliahController::class, 'addMatakuliah'])->name('addMatakuliah');

Route::get('/tampilDataMatakuliah/{id}', [MatakuliahController::class, 'tampilDataMatakuliah'])->name('tampildata')->middleware('auth');
Route::post('updateMatkul/{id}', [MatakuliahController::class, 'updateMatkul'])->name('updateMatkul');

Route::get('/deleteMatakuliah/{id}', [MatakuliahController::class, 'delete'])->name('delete');


//Login&Register
Route::redirect('/', '/auth/login');
Route::prefix('/auth')->group(function(){
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'processRegister']);
});