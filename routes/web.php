<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index']);

Route::get('/galeri', function () {
    return view('galeri', [
        "title" => "Galeri"
    ]);
});

Route::get('/sejarah', function () {
    return view('sejarah', [
        "title" => "Sejarah Singkat"
    ]);
});

Route::get('/visimisi', function () {
    return view('visimisi', [
        "title" => "Visi & Misi"
    ]);
});

Route::get('/fasilitas', function () {
    return view('fasilitas', [
        "title" => "Fasilitas"
    ]);
});

//halaman single post
Route::get('/{post:slug}', [PostController::class, 'show']);