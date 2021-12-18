<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\FeatController;
use App\Http\Controllers\Admin\FutereController;
use App\Http\Controllers\Admin\PopularController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\StartoController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\WatchController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(['prefix' =>LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function (){


    require __DIR__.'/auth.php';
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/contact/sendToTg', [HomeController::class, 'sendToTg'])->name('contact.send');

   
});





Route::get('/logout', function () {
    return view('site.home');
})->name('logout');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class,'index'])->name('admin');
    Route::resources([
       
        'admin/start' => StartoController::class,
        'admin/watch' => WatchController::class,
        'admin/future' => FutereController::class,
        'admin/about' => AboutController::class,
        'admin/video' => VideoController::class,
        'admin/product' => ProductController::class,
        'admin/services' => ServicesController::class,
        'admin/popular' => PopularController::class,
        'admin/client' => ClientController::class,
        'admin/feat' => FeatController::class,
        'admin/faqs' => FaqsController::class,
        'admin/info' => InfoController::class,


    ]);

    Route::post('/admin/start/upload', [StartoController::class, 'upload'])->name('admin.start.upload');
    Route::post('/admin/watch/upload', [WatchController::class, 'upload'])->name('admin.watch.upload');
    Route::post('/admin/future/upload', [FutereController::class, 'upload'])->name('admin.future.upload');
    Route::post('/admin/about/upload', [AboutController::class, 'upload'])->name('admin.about.upload');

    Route::post('/admin/video/upload', [VideoController::class, 'upload'])->name('admin.video.upload');
    Route::post('/admin/product/upload', [ProductController::class, 'upload'])->name('admin.product.upload');
    Route::post('/admin/services/upload', [ServicesController::class, 'upload'])->name('admin.services.upload');
    Route::post('/admin/popular/upload', [PopularController::class, 'upload'])->name('admin.popular.upload');
    Route::post('/admin/client/upload', [ClientController::class, 'upload'])->name('admin.client.upload');
    Route::post('/admin/feat/upload', [FeatController::class, 'upload'])->name('admin.feat.upload');
    Route::post('/admin/faqs/upload', [FaqsController::class, 'upload'])->name('admin.faqs.upload');
    Route::post('/admin/info/upload', [InfoController::class, 'upload'])->name('admin.info.upload');






 
});
