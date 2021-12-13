<?php

use App\Models\Anggota;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KelasController;

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





//-------------------------------------------------------------- 
// Router untuk mengelola data user dan juga autentikasi user

// route halaman data user
Route::get('/user', [UserController::class, 'getUser'])->middleware('auth');

// route halaman tambah user
Route::get('/user/tambah/', [UserController::class, 'tambahUser'])->middleware('auth');

// route simpan user
Route::post('/user/save/', [UserController::class, 'saveUser']);

// route halaman edit user
Route::get('/user/edit/{user}', [UserController::class, 'editUser'])->middleware('auth');

// route halaman profile user
Route::get('/user/profile/{user}', [UserController::class, 'profileUser'])->middleware('auth');

// route update user
Route::put('/user/update/{user}', [UserController::class, 'updateUser']);

// route update password user
Route::put('/user/updatePassword/{user}', [UserController::class, 'updatePasswordUser']);

// route delete user
Route::get('/user/delete/{user}', [UserController::class, 'deleteUser']);

// route halaman login
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

// route autentikasi login
Route::post('/login', [LoginController::class, 'authenticate']);

// route autentikasi logout
Route::post('/logout', [LoginController::class, 'logout']);

//-------------------------------------------------------------- 





//-------------------------------------------------------------- 
// Router untuk mengelola master data


// Master Data Kelas 

// route halaman data master data kelas
Route::get('/master-data/kelas', [KelasController::class, 'getKelas'])->middleware('auth');

// route halaman tambah master data kelas
Route::get('/master-data/kelas/tambah/', [KelasController::class, 'tambahKelas'])->middleware('auth');

// route simpan master data kelas
Route::post('/master-data/kelas/save/', [KelasController::class, 'saveKelas']);

// route halaman edit master data kelas
Route::get('/master-data/kelas/edit/{kelas}', [KelasController::class, 'editKelas'])->middleware('auth');

// route update master data kelas
Route::put('/master-data/kelas/update/{kelas}', [KelasController::class, 'updateKelas']);

// route delete master data kelas
Route::get('/master-data/kelas/delete/{kelas}', [KelasController::class, 'deleteKelas']);

//-------------------------------------------------------------- 





// Route::get('/siswa/tambah', [AnggotaController::class, 'tambah']);

// Route::post('/siswa/save', [AnggotaController::class, 'save']);

Route::get('/', function () {
    return view('dashboard', [
        "title" => "Dashboard",
        "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
    ]);
})->middleware('auth');

Route::get('/maintenance', function () {
    return view('maintenance', [
        "title" => "Maintenance",
        "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
    ]);
})->middleware('auth');

// get siswa
Route::get('/siswa', [AnggotaController::class, 'getSiswa'])->middleware('auth');

// get user

// get detail person
// Route::get('/siswa/detail/{anggota}', [AnggotaController::class, 'detail']);
