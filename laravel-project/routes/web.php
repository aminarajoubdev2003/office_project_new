<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\hotelcontroller;
use App\Http\Controllers\customercontroller;
 
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
Route::get('city/add', [CityController::class, 'create'])->middleware('auth')->name('city-add');
Route::post('city/add/create', [CityController::class, 'store'])->name('create_city');
Route::get('city/edit/{id}', [CityController::class, 'edit'])->name('edit_city')->middleware('auth');
Route::post('city/update/{id}', [CityController::class, 'update'])->name('update_city');
Route::get('city/all', [CityController::class, 'index'])->middleware('auth')->name('city-all');
Route::get('city/one/{id}', [CityController::class, 'show'])->middleware('auth')->name('city-one');

Route::get('city/delete/{id}', [CityController::class, 'destroy'])->name('delete_city')->middleware('auth');
//////////////////////////////////////////////////////
Route::get('rating/all', [RatingController::class, 'index'])->middleware('auth')->name('rating-all');
Route::get('rating/one/{id}', [RatingController::class, 'show'])->middleware('auth')->name('showrate');

Route::get('rating/add', [RatingController::class, 'create'])->middleware('auth')->name('rating-add');
Route::post('rating/add/create', [RatingController::class, 'store'])->name('create_rating');
Route::get('rating/{id}', [RatingController::class, 'edit'])->middleware('auth')->name('edit_rating');
Route::post('rating/update/{id}', [RatingController::class, 'update'])->name('update_rating');

Route::get('rating/delete/{id}', [RatingController::class, 'destroy'])->middleware('auth')->name('delete_rating');

Route::get('rating/high', [RatingController::class, 'get_high_hotel'])->middleware('auth')->name('high_rating');
/////////////////////////////////////////
Route::get('/companyshow', [CompanyController::class,'index'])->middleware('auth');

Route::get('/companyedit/{id}', [CompanyController::class,'edit'])->middleware('auth')->name('edit-company');
Route::post('/companyupdate/{id}', [CompanyController::class,'update'])->name('update-company');

Route::get('/company', [CompanyController::class,'create'])->middleware('auth')->name('create-company');
Route::post('/companystore', [CompanyController::class,'store'])->name('store-company');

Route::get('/companydestroy/{id}', [CompanyController::class,'destroy'])->middleware('auth')->name('destroy-company');
//-------------------------------------------------------------------------------------------------
 
Route::get('/Bookingshow', [BookingController::class,'index'])->middleware('auth');

Route::get('/Bookingedit/{id}', [BookingController::class,'edit'])->middleware('auth')->name('edit-booking');
Route::post('/Bookingupdate/{id}', [BookingController::class,'update'])->name('update-booking');

Route::get('/Booking', [BookingController::class,'create'])->middleware('auth')->name('create-Booking');
Route::post('/Bookingstore', [BookingController::class,'store'])->name('store-Booking');

Route::get('/Bookingdestroy/{id}', [BookingController::class,'destroy'])->middleware('auth')->name('destroy-booking');
//////////////////////////////////////////
Route::get('/indexcustomer',[customercontroller::class,'index'])->middleware('auth')->name('indexcustomer');

Route::get('/add/create',[customercontroller::class,'create'])->middleware('auth')->name('createcustomer');
Route::post('/post/store',[customercontroller::class,'store'])->name('addcustomer');

Route::get('/edat/{id}',[customercontroller::class,'edat'])->middleware('auth')->name('editcus');
Route::post('/edat/{id}',[customercontroller::class,'update'])->name('updatecus');

Route::get('/delet/{id}',[customercontroller::class,'destore'])->middleware('auth')->name('deletcust');
Route::post('/searshe/{name}',[customercontroller::class,'searsh'])->name('sear');



///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/hotel',[hotelcontroller::class,'index'])->middleware('auth')->name('hotel.index');

Route::get('/add/createhotel',[hotelcontroller::class,'create'])->middleware('auth')->name('addhotel');
Route::post('/add/storehotel',[hotelcontroller::class,'store'])->name('storehotel');

Route::get('/edit/hotel/{id}',[hotelcontroller::class,'edit'])->middleware('auth')->name('edithot');





Route::get('/delet/hotel/{id}',[hotelcontroller::class,'destore'])->middleware('auth')->name('delethotel');