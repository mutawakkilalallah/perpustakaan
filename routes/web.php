<?php

use App\Models\Anggota;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;

use App\Http\Controllers\ApiController;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

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


// Master Data kategori 

// route halaman data master data kategori
Route::get('/master-data/kategori', [KategoriController::class, 'getKategori'])->middleware('auth');

// route halaman tambah master data kategori
Route::get('/master-data/kategori/tambah/', [KategoriController::class, 'tambahKategori'])->middleware('auth');

// route simpan master data Kategori
Route::post('/master-data/kategori/save/', [KategoriController::class, 'saveKategori']);

// route halaman edit master data kategori
Route::get('/master-data/kategori/edit/{kategori}', [KategoriController::class, 'editKategori'])->middleware('auth');

// route update master data kategori
Route::put('/master-data/kategori/update/{kategori}', [KategoriController::class, 'updateKategori']);

// route delete master data kategori
Route::get('/master-data/kategori/delete/{kategori}', [KategoriController::class, 'deleteKategori']);

//-------------------------------------------------------------- 






// Route::get('/siswa/tambah', [AnggotaController::class, 'tambah']);

// Route::post('/siswa/save', [AnggotaController::class, 'save']);

Route::get('/', function () {
    
    return view('dashboard', [
        "title" => "Dashboard",
        "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
        "person" => Anggota::all()->count(),
        "siswa" => Anggota::all()->where('status', 'siswa')->count(),
        "pengurus" => Anggota::all()->where('status', 'pengurus')->count(),
        "userCount" => User::all()->where('status', 'pengurus')->count(),
        "kategori" => Kategori::all()->count(),
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
