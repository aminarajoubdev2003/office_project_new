<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
 
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
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/t', function () {
    return view('Ticket');
});

Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users.index');
 
Route::get('/users/delet/{id}', [UserController::class, 'destroy'])->middleware('auth')->name('users.destroy');
Route::get('/test/{id}',[UserController::class,'edit'])->middleware('auth')->name('users.edit');
Route::post('/test/update/{id}',[UserController::class,'update'])->name('update-user');
Route::post('/usersCreate', [UserController::class, 'store'])->name('users.store');
Route::get('/uc', function () {
    return view('users.createuser');
})->middleware('auth')->name('users.create');
Route::get('/users/{id}', [UserController::class,'show'])->middleware('auth')->name('users.show');
 
 
 ////////////////////////////////////////////////
 Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth')->name('tickets.index');
 
 Route::get('/tickets/delet/{ticket}', [TicketController::class, 'destroy'])->middleware('auth')->name('tickets.destroy');
 Route::get('/ticket/{ticket}',[TicketController::class,'edit'])->middleware('auth')->name('tickets.edit');
 Route::post('/ticket/update/{ticket}',[TicketController::class,'update'])->name('tickets.update');
 Route::post('/ticketsCreate', [TicketController::class, 'store'])->name('tickets.store');
 
 Route::get('tickets/create', [TicketController::class,'create'])->middleware('auth')->name('tickets.create');
 Route::get('/tickets/{id}', [TicketController::class,'show'])->middleware('auth')->name('tickets.show');

 Route::get('/search', [TicketController::class,'search'])->middleware('auth')->name('search.index');
Route::post('/search',  [TicketController::class,'searchshow'])->name('search.search');
////////////////////////////////////////////////
 