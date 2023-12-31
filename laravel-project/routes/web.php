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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\CityController;
Route::get('city/add', [CityController::class, 'create'])->middleware('auth')->name('city-add');
Route::post('city/add/create', [CityController::class, 'store'])->name('create_city');

Route::get('city/edit/{id}', [CityController::class, 'edit'])->name('edit_city')->middleware('auth');
Route::post('city/update/{id}', [CityController::class, 'update'])->name('update_city');

Route::get('city/all', [CityController::class, 'index'])->middleware('auth')->name('city-all');
Route::get('city/one/{id}', [CityController::class, 'show'])->middleware('auth')->name('city-one');

Route::get('city/delete/{id}', [CityController::class, 'destroy'])->name('delete_city')->middleware('auth');


use App\Http\Controllers\RatingController;
Route::get('rating/all', [RatingController::class, 'index'])->middleware('auth')->name('rating-all');
Route::get('rating/one/{id}', [RatingController::class, 'show'])->middleware('auth')->name('showrate');

Route::get('rating/add', [RatingController::class, 'create'])->middleware('auth')->name('rating-add');
Route::post('rating/add/create', [RatingController::class, 'store'])->name('create_rating');

Route::get('rating/{id}', [RatingController::class, 'edit'])->middleware('auth')->name('edit_rating');
Route::post('rating/update/{id}', [RatingController::class, 'update'])->name('update_rating');

Route::get('rating/delete/{id}', [RatingController::class, 'destroy'])->middleware('auth')->name('delete_rating');

Route::get('rating/high', [RatingController::class, 'get_high_hotel'])->middleware('auth')->name('high_rating');
;