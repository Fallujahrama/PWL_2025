<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/category/{category}', [ProductController::class, 'category']);
// Route::get('/user/{id}/name/{name}', [UserController::class, 'show']);
// Route::get('/penjualan', [PenjualanController::class, 'index']);
// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// // Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// welcome controller
Route::get('/', [WelcomeController::class, 'index']);

// products controller
Route::get('/products', [ProductController::class, 'index']);

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// user controller
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
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});

// level controller
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']); // menampilkan halaman awal Level
    Route::post('/list', [LevelController::class, 'list']); // menampilkan data Level dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']); // menampilkan halaman form tambah Level
    Route::post('/', [LevelController::class, 'store']);  // menyimpan data Level baru
    Route::get('/{id}', [LevelController::class, 'show']); // menampilkan detail Level
    Route::get('/{id}/edit', [LevelController::class, 'edit']); // menampilkan halaman form edit Level
    Route::put('/{id}', [LevelController::class, 'update']);  // menyimpan perubahan data Level
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data user
});

// kategori controller
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']); // menampilkan halaman awal Kategori
    Route::post('/list', [KategoriController::class, 'list']); // menampilkan data Kategori dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']); // menampilkan halaman form tambah Kategori
    Route::post('/', [KategoriController::class, 'store']);  // menyimpan data Kategori baru
    Route::get('/{id}', [KategoriController::class, 'show']); // menampilkan detail Kategori
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); // menampilkan halaman form edit Kategori
    Route::put('/{id}', [KategoriController::class, 'update']);  // menyimpan perubahan data Kategori
    Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data user
});

// supplier controller
Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']); // menampilkan halaman awal Supplier
    Route::post('/list', [SupplierController::class, 'list']); // menampilkan data Supplier dalam bentuk json untuk datatables
    Route::get('/create', [SupplierController::class, 'create']); // menampilkan halaman form tambah Supplier
    Route::post('/', [SupplierController::class, 'store']);  // menyimpan data Supplier baru
    Route::get('/{id}', [SupplierController::class, 'show']); // menampilkan detail Supplier
    Route::get('/{id}/edit', [SupplierController::class, 'edit']); // menampilkan halaman form edit Supplier
    Route::put('/{id}', [SupplierController::class, 'update']);  // menyimpan perubahan data Supplier
    Route::delete('/{id}', [SupplierController::class, 'destroy']); // menghapus data user
});

// barang controller
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal Barang
    Route::post('/list', [BarangController::class, 'list']); // menampilkan data Barang dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah Barang
    Route::post('/', [BarangController::class, 'store']);  // menyimpan data Barang baru
    Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail Barang
    Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit Barang
    Route::put('/{id}', [BarangController::class, 'update']);  // menyimpan perubahan data Barang
    Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data user
});
