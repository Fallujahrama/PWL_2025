<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;

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
Route::pattern('id', '[0-9]+'); // Pastikan parameter {id} hanya berupa angka

// Rute otentikasi
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/register' , [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postregister']);

Route::middleware(['auth'])->group(function () {
    // welcome controller
    Route::get('/', [WelcomeController::class, 'index']);

    // user controller
    // artinya semua route di dalam group ini harus punya role ADM (Administrator)
    Route::middleware(['authorize:ADM'])->group(function(){
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index']); // menampilkan halaman awal Level
            Route::post('/list', [UserController::class, 'list'])->name('user.list'); // menampilkan data Level dalam bentuk json untuk datatables
            Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah Level
            Route::post('/', [UserController::class, 'store']); // menyimpan data Level baru

            Route::get('/create_ajax', [UserController::class, 'create_ajax']); // menampilkan halaman form tambah Level dengan ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']); // menyimpan data user baru ajax

            Route::get('/{id}', [UserController::class, 'show']); // menampilkan detail Level
            Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit Level
            Route::put('/{id}', [UserController::class, 'update']); // menyimpan perubahan data Level

            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // menampilkan halaman form edit Level dengan ajax
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // menyimpan perubahan data Level dengan ajax

            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // menghapus data user dengan ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // menghapus data user dengan ajax
            Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user

            Route::get('/import', [UserController::class, 'import']); // ajax form upload excel
            Route::post('/import_ajax', [UserController::class, 'import_ajax']); // AJAX import excel
        });
    });

    // level controller
    // artinya semua route di dalam group ini harus punya role ADM (Administrator)
    Route::middleware(['authorize:ADM'])->group(function () {
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']); // menampilkan halaman awal Level
            Route::post('/list', [LevelController::class, 'list']); // menampilkan data Level dalam bentuk json untuk datatables
            Route::get('/create', [LevelController::class, 'create']); // menampilkan halaman form tambah Level
            Route::post('/', [LevelController::class, 'store']);  // menyimpan data Level baru

            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // menampilkan halaman form tambah Level dengan ajax
            Route::post('/ajax', [LevelController::class, 'store_ajax']); // menyimpan data level baru ajax

            Route::get('/{id}', [LevelController::class, 'show']); // menampilkan detail Level
            Route::get('/{id}/edit', [LevelController::class, 'edit']); // menampilkan halaman form edit Level
            Route::put('/{id}', [LevelController::class, 'update']);  // menyimpan perubahan data Level

            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // menampilkan halaman form edit Level dengan ajax
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // menyimpan perubahan data Level dengan ajax

            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // menghapus data level dengan ajax
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // menghapus data level dengan ajax
            Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level

            Route::get('/import', [LevelController::class, 'import']); // ajax form upload excel
            Route::post('/import_ajax', [LevelController::class, 'import_ajax']); // AJAX import excel
        });
    });

    // kategori controller
    // artinya semua route di dalam group ini harus punya role ADM (Administrator) dan MNG (Manager)
    Route::middleware(['authorize:ADM,MNG'])->group(function(){
        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index']); // menampilkan halaman awal Kategori
            Route::post('/list', [KategoriController::class, 'list']); // menampilkan data Kategori dalam bentuk json untuk datatables
            Route::get('/create', [KategoriController::class, 'create']); // menampilkan halaman form tambah Kategori
            Route::post('/', [KategoriController::class, 'store']);  // menyimpan data Kategori baru

            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // menampilkan halaman form tambah kategori dengan ajax
            Route::post('/ajax', [KategoriController::class, 'store_ajax']); // menyimpan data kategori baru ajax

            Route::get('/{id}', [KategoriController::class, 'show']); // menampilkan detail Kategori
            Route::get('/{id}/edit', [KategoriController::class, 'edit']); // menampilkan halaman form edit Kategori
            Route::put('/{id}', [KategoriController::class, 'update']);  // menyimpan perubahan data Kategori

            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // menampilkan halaman form edit kategori dengan ajax
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // menyimpan perubahan data kategori dengan ajax

            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // menghapus data kategori dengan ajax
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // menghapus data kategori dengan ajax
            Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data kategori
        });
    });

    // supplier controller
    // artinya semua route di dalam group ini harus punya role ADM (Administrator) dan MNG (Manager)
    Route::middleware(['authorize:ADM,MNG'])->group(function(){
        Route::group(['prefix' => 'supplier'], function () {
            Route::get('/', [SupplierController::class, 'index']); // menampilkan halaman awal Supplier
            Route::post('/list', [SupplierController::class, 'list']); // menampilkan data Supplier dalam bentuk json untuk datatables
            Route::get('/create', [SupplierController::class, 'create']); // menampilkan halaman form tambah Supplier
            Route::post('/', [SupplierController::class, 'store']);  // menyimpan data Supplier baru

            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // menampilkan halaman form tambah Supplier dengan ajax
            Route::post('/ajax', [SupplierController::class, 'store_ajax']); // menyimpan data Supplier baru ajax

            Route::get('/{id}', [SupplierController::class, 'show']); // menampilkan detail Supplier
            Route::get('/{id}/edit', [SupplierController::class, 'edit']); // menampilkan halaman form edit Supplier
            Route::put('/{id}', [SupplierController::class, 'update']);  // menyimpan perubahan data Supplier

            Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // menampilkan halaman form edit Supplier dengan ajax
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // menyimpan perubahan data Supplier dengan ajax

            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // menghapus data Supplier dengan ajax
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // menghapus data Supplier dengan ajax
            Route::delete('/{id}', [SupplierController::class, 'destroy']); // menghapus data Supplier
        });
    });

    // barang controller
    // Staff hanya bisa melihat data barang
    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal Barang
            Route::post('/list', [BarangController::class, 'list']); // menampilkan data Barang dalam bentuk json untuk datatables
            Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail Barang
        });
    });

    // ADM & MNG bisa menambah, mengedit, dan menghapus barang
    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah Barang
            Route::post('/', [BarangController::class, 'store']);  // menyimpan data Barang baru

            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // menampilkan halaman form tambah barang dengan ajax
            Route::post('/ajax', [BarangController::class, 'store_ajax']); // menyimpan data barang baru ajax

            Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit Barang
            Route::put('/{id}', [BarangController::class, 'update']);  // menyimpan perubahan data Barang

            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // menampilkan halaman form edit barang dengan ajax
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // menyimpan perubahan data barang dengan ajax

            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // menghapus data barang dengan ajax
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // menghapus data barang dengan ajax
            Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data barang

            Route::get('/import', [BarangController::class, 'import']); // ajax form upload excel
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']); // AJAX import excel
        });
    });
});


