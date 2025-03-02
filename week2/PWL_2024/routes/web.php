<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;
// use App\Http\Controllers\PageController;
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

// Route::get('/hello', function () {
//     return 'Hello World!';
// });

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/world', function () {
    return 'World!';
});

// Route::get('/', function () {
//     return 'Selamat Datang';
// });

Route::get('/', [HomeController::class, 'index']);

// Route::get('/about', function () {
//     return 'NIM : 2341760005 Nama : Fallujah Ramadi C';
// });

Route::get('/about', [AboutController::class, 'about']);

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' .$name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Post ke-' .$postId. " Komentar ke-: " .$commentId;
});

// Route::get('/articles/{id}', function ($id) {
//     return 'Halaman Artikel dengan ID ' .$id;
// });

Route::get('/articles/{id}', [ArticleController::class, 'articles']);

//opsional params dengan ?
Route::get('/user/{name?}', function ($name = 'John Doe') {
    return 'Nama saya ' .$name;
});

Route::resource('photos', PhotoController::class)->only ([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except ([
    'create', 'store', 'update', 'destroy'
]);

// view jika tidak diletakan didalam folder lagi
// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'Fallujah']);
// });

// view jika file nya diletakan didalam folder lagi menggunakan 'dot'
// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Fallujah']);
// });

// menampilkan view melalui controller
Route::get('/greeting', [WelcomeController::class, 'greeting']);