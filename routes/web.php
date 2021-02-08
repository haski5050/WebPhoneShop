<?php

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

Route::get('/', [App\Http\Controllers\MainController::class, 'main'])->name('MainPage');


Auth::routes();
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::match(['get', 'post'], 'register', function(){
    return redirect()->route('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/add', [App\Http\Controllers\MainController::class, 'add'])->name('AddPage');
    Route::post('/add', [App\Http\Controllers\MainController::class, 'addPhoneSubmit'])->name('addPhone');
    Route::get('/addCategory', [App\Http\Controllers\MainController::class, 'addCategory'])->name('AddctPage');
    Route::post('/addCategory', [App\Http\Controllers\MainController::class, 'addCategorySubmit'])->name('addCategory');
    Route::get('/reports', [App\Http\Controllers\MainController::class, 'reports'])->name('reportsPage');
    Route::get('/changePhone/{id}', [App\Http\Controllers\MainController::class, 'changePhone'])->name('changePhone');
    Route::post('/chagePhone/{id}/submit',[\App\Http\Controllers\MainController::class,'updatePhone'])->name('updatePhone');
    Route::get('/changePhone/delete/{id}',[\App\Http\Controllers\MainController::class, 'deletePhone'])->name('deletePhone');
    Route::get('/orders',[\App\Http\Controllers\MainController::class,'ordersPage'])->name('ordersPage');
    Route::post('/orders/update/{id}',[\App\Http\Controllers\MainController::class, 'ordersUpdate'])->name('OrdersUpdate');
});

Route::post('/searchResult', [App\Http\Controllers\MainController::class, 'search'])->name('Search');
Route::get('/about', [App\Http\Controllers\MainController::class, 'about'])->name('aboutPage');
Route::post('/about', [App\Http\Controllers\MainController::class, 'report'])->name('addReport');



Route::get('/category', [App\Http\Controllers\MainController::class, 'category'])->name('categoryPage');
Route::post('/', [App\Http\Controllers\MainController::class, 'categorySelect'])->name('categorySelect');
Route::get('/aboutPhone/{id}', [App\Http\Controllers\MainController::class, 'aboutPhone'])->name('aboutPhone');
Route::get('/basket',[\App\Http\Controllers\CookieController::class,'showCookie'])->name('basketPage');


Route::post('/aboutPhone/{id}/addToBasket',[\App\Http\Controllers\CookieController::class, 'addToBasket'])->name('addToBasket');
Route::get('/basket/delete/{id}',[\App\Http\Controllers\CookieController::class, 'deleteBasket'])->name('deleteBasketItem');
Route::get('/basket/order/',[\App\Http\Controllers\CookieController::class, 'orderSubmit'])->name('orderBasket');
Route::post('/basket/order/submit',[\App\Http\Controllers\CookieController::class, 'orderUpdate'])->name('orderUpdate');
