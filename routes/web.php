<?php

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardGalleryController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\DashboardVisionController;
use App\Http\Controllers\DashboardVisiMisiController;
use App\Http\Controllers\DashboardSambutanController;
use App\Http\Controllers\DashboardSejarahSingkatController;

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

// Route::get('/', function() {
//     return view('home', [
//         "title" => "Home",
//         "active" => "Home"
//     ]);
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/coba', function() {
    return view('coba', [
        "title" => "Home",
        "active" => "Home"
    ]);
});

Route::get('/galeri', function() {
    return view('galeri', [
        "title" => "geleri",
        "active" => "galeri"
    ]);
});



Route::get('/categories', function() {
        return view('categories', [
        'title' => 'Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});



Route::get('/posts', [PostController::class, 'index']);

Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/dashboard/posts', DashboardPostController::class);

    // Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    // Route::resource('/dashboard/categories', DashboardCategoryController::class)->scoped(['category' => 'slug']);
    // Route::get('/dashboard/categories/edit/{category:slug}', [DashboardCategoryController::class, 'edit']);
    // Route::get('/dashboard/categories', [DashboardCategoryController::class, 'index']);

    Route::resource('/dashboard/galleries', DashboardGalleryController::class);

    Route::resource('/dashboard/staffs', DashboardStaffController::class);

    Route::resource('/dashboard/visions', DashboardVisionController::class);

    Route::resource('/dashboard/visiMisi', DashboardVisiMisiController::class);

    Route::resource('/dashboard/sambutan', DashboardSambutanController::class);

    Route::get('/dashboard/sejarahSingkat/checkSlug', [DashboardPostController::class, 'checkSlug']);

    Route::resource('/dashboard/sejarahSingkat', DashboardSejarahSingkatController::class);
});







// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author')
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author) {
//     return view('posts', [
//     'title' => "Post By Author : $author->name",
//     'active' => 'categories',
//     'posts' => $author->posts->load('category', 'author')
//     ]);
// });
