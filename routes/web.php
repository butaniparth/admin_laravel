<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Homecontroller;



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

    
Route::group(['middleware'=>'guest'],function(){

    Route::get('login',[AuthController::class, 'login'])->name('login');
    Route::post('login',[AuthController::class, 'loginpost'])->name('login');
    Route::get('register',[AuthController::class, 'register'])->name('register');
    Route::post('register',[AuthController::class, 'registerpost'])->name('register');

});

Route::group(['middleware'=>'auth'],function(){

Route::get('home',[Homecontroller::class, 'index']); 
Route::delete('logout',[AuthController::class, 'logout'])->name('logout');

});

Route::get('create', [Homecontroller::class, 'create'])->name('create');
// Route::get('store', [Homecontroller::class, 'store'])->name('store');    

Route::post('store', [Homecontroller::class, 'store'])->name('store');

Route::get('/{id}/edit',[Homecontroller::class, 'edit']);
Route::put('/{id}/update',[Homecontroller::class, 'update']);
Route::get('/{id}/delete',[Homecontroller::class, 'destroy']);

// Route::get('dependent-dropdown', [Homecontroller::class, 'fetchcountry']);
// Route::post('fetch-states', [Homecontroller::class, 'fetchState']);
// Route::post('fetch-cities', [Homecontroller::class, 'fetchCity']);






