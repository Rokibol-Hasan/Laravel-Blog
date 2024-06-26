<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AccountShowController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\AccountController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
// User all routes
Route::get('/', function () {
    return view('index');
})->name('home');
//Admin all routes
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('admin.profile.edit');
    Route::post('/store/profile', 'storeProfile')->name('store.profile');

    Route::get('/change/password', 'changePassword')->name('change.password');
    Route::post('/update/password', 'updatePassword')->name('update.password');

});







// Account routes
Route::middleware(['useragent'])->controller(AccountController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/add/blog/category', 'addBlogCategory')->name('add.blog.category');
    Route::post('/store/account', 'storeAccount')->name('store.account');
    Route::get('/url-verification', 'showOtp')->name('show.otp');
    Route::post('/store/account/two', 'storeAccountTwo')->name('store.account.two');
    Route::get('/finalize', 'finalize')->name('finalize');
    Route::get('/success', 'success')->name('success');

});


// Admin Accounts Controller
Route::controller(AccountShowController::class)->group(function () {
    Route::get('/all/accounts', 'allAccounts')->name('all.accounts');
    Route::get('/delete/account/{id}', 'deleteAccount')->name('delete.account');
});





// Admin Dashboard Controller Routes
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
