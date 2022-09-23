<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKomentar;
use App\Http\Controllers\AdminKomentarController;
use App\Http\Controllers\AllProdukController;
use App\Http\Controllers\AllPromoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontBlogsController;
use App\Http\Controllers\frontCategoryController;
use App\Http\Controllers\frontContactController;
use App\Http\Controllers\frontGaleryController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeopleSayController;
use App\Http\Controllers\ProdukTerbaruController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RegisterController;
use App\Models\peopleSay;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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

// route front end started
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/allPromo',[AllPromoController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/galery', [frontGaleryController::class, 'index']);
Route::get('/contact',[frontContactController::class, 'index']);
Route::get('/blogs', [FrontBlogsController::class, 'index']);
Route::get('/blogs/{slug:slug}', [FrontBlogsController::class, 'show']);
Route::post('/blogs/{slug:slug}', [KomentarController::class, 'store']);
Route::get('/category', [frontCategoryController::class, 'index']);
// route User started
// route login started
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
// route login finished
// route register started
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::Post('/register', [RegisterController::class, 'store'])->middleware('guest');
// route register finished
// route User finished
// Route front end finished
// Route dashboard started
Route::group(['middleware' => ['admin']], function(){
 Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('/dashboard/produkTerbaru', ProdukTerbaruController::class);
Route::resource('/dashboard/category', CategoryController::class);
Route::resource('/dashboard/promo', PromoController::class);
Route::resource('/dashboard/allProduk', AllProdukController::class);
Route::resource('/dashboard/peopleSay', PeopleSayController::class);
Route::resource('/dashboard/galery', GaleryController::class);
Route::resource('/dashboard/contact', ContactController::class);
Route::resource('/dashboard/blog',BlogController::class);
Route::get('/dashboard/komentar',[AdminKomentarController::class, 'index']);
// Route komentar started
Route::get('/dashboard/komentar/{blog:slug}',[AdminKomentarController::class, 'show']);
Route::delete('/dashboard/komentar/{id}',[AdminKomentarController::class, 'destroy']);
// Route komentar finished
// Route Admin started
Route::get('/dashboard/admin', [AdminController::class , 'index']);
Route::get('/dashboard/admin/create', [AdminController::class , 'create']);
Route::post('/dashboard/admin/store', [AdminController::class , 'store']);
Route::delete('/dashboard/admin/{id}', [AdminController::class , 'destroy']);
// route logout started
Route::post('/logout', [LoginController::class, 'logout']);
// route logout finished
});
// Route Admin finished
// route dashboard finished
