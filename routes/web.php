<?php

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ExtracurricularController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TapelController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\MappingMapelController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KkmMapelController;
use App\Http\Controllers\Admin\PembelajaranController;
use App\Http\Controllers\Admin\IntervalPredikatController;
use App\Http\Controllers\Admin\KdMapelController;
use App\Http\Controllers\Teacher\KdMapelGuruController;
use App\Http\Controllers\Teacher\RencanaPenilaianSumatifController;
use App\Http\Controllers\Teacher\RencanaPenilaianFormatifController;
use App\Http\Controllers\Teacher\RencanaBobotPenilaianController;
use App\Http\Controllers\Teacher\NilaiFormatifController;
use App\Http\Controllers\Teacher\NilaiSumatifController;
use App\Http\Controllers\Teacher\NilaiSumatifAkhirController;
use App\Http\Controllers\Teacher\KirimNilaiAkhirRapotController;
use App\Http\Controllers\Teacher\KirimNilaiFormatifController;
use App\Http\Controllers\Walikelas\PesertaDidikController;
use App\Http\Controllers\Walikelas\StatusPenilaianGuruController;
use App\Http\Controllers\Walikelas\HasilPengelolaanNilaiController;
use App\Http\Controllers\Student\NilaiAkhirSemesterController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Walikelas\HasilPengelolaanNilai;
use App\Models\Pembelajaran;
use App\Models\RencanaPenilaianSumatif;

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

Route::get('/visionMision', [ProfileController::class, 'visionMision']);
Route::get('/greeting', [ProfileController::class, 'greeting']);
Route::get('/history', [ProfileController::class, 'history']);
Route::get('/structure', [ProfileController::class, 'structure']);

Route::get('/categories', function() {
        return view('categories', [
        'title' => 'Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/posts', [PostController::class, 'indexFE']);
Route::get('/post/{post:slug}', [PostController::class, 'showFE']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/settingtapel', [LoginController::class, 'setting_tapel'])->name('setting.tapel');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['middleware' => 'checkRole:1'], function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::get('profiles/checkSlug', [ProfileController::class, 'checkSlug']);
            Route::resource('profiles', ProfileController::class);

            Route::get('posts/checkSlug', [PostController::class, 'checkSlug']);
            Route::resource('posts', PostController::class);

            Route::get('categories/checkSlug', [CategoryController::class, 'checkSlug']);
            Route::resource('categories', CategoryController::class);

            Route::resource('galleries', GalleryController::class);

            Route::get('extracurriculars/checkSlug', [ExtracurricularController::class, 'checkSlug']);
            Route::resource('extracurriculars', ExtracurricularController::class);

            Route::resource('teachers', TeacherController::class);

            Route::resource('users', UserController::class);

            Route::resource('tapel', TapelController::class);

            Route::resource('subjects', SubjectController::class);

            Route::resource('mapping', MappingMapelController::class);

            Route::resource('kkm', KkmMapelController::class);

            Route::resource('interval', IntervalPredikatController::class);

            Route::resource('kd', KdMapelController::class);

            Route::post('kelas/group', [KelasController::class, 'store_group'])->name('kelas.group');
            Route::post('kelas/group/{group}', [KelasController::class, 'delete_group'])->name('kelas.group.delete');
            Route::resource('kelas', KelasController::class);

            Route::resource('students', StudentController::class);

            Route::post('pembelajaran/settings', [PembelajaranController::class, 'settings'])->name('pembelajaran.settings');
            Route::resource('pembelajaran', PembelajaranController::class);

            Route::get('getKelas/ajax/{id}', [AjaxController::class, 'ajax_kelas']);

        });
    });

    Route::group(['middleware' => 'checkRole:2'], function () {
        Route::group(['prefix' => 'teacher'], function () {
            Route::get('akses', [LoginController::class, 'ganti_akses'])->name('akses');

            Route::group(['middleware' => 'checkAksesGuru:Guru Mapel'], function () {
                Route::resource('ck', KdMapelGuruController::class);

                Route::resource('rencanasumatif', RencanaPenilaianSumatifController::class);

                Route::resource('rencanaformatif', RencanaPenilaianFormatifController::class);

                Route::resource('bobotnilai', RencanaBobotPenilaianController::class);

                Route::resource('nilaiformatif', NilaiFormatifController::class);

                Route::resource('nilaisumatif', NilaiSumatifController::class);

                Route::resource('nilaisumatifakhir', NilaiSumatifAkhirController::class);

                Route::resource('kirimnilaiakhir', KirimNilaiAkhirRapotController::class);

                // Route::resource('kirimnilaiformatif', KirimNilaiFormatifController::class);



            });

            Route::group(['middleware' => 'checkAksesGuru:Wali Kelas'], function () {
                Route::get('pesertadidik', [PesertaDidikController::class, 'index'])->name('pesertadidik');

                Route::get('statusnilaiguru', [StatusPenilaianGuruController::class, 'index'])->name('statusnilaiguru');

                Route::get('hasilnilai', [HasilPengelolaanNilaiController::class, 'index'])->name('hasilnilai');
            });
        });

    });

    Route::group(['middleware' => 'checkRole:3'], function () {
        Route::get('nilaiakhirsemester', [NilaiAkhirSemesterController::class, 'index'])->name('nilaiakhirsemester');
    });
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
