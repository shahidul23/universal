<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// PDF Generate Routes
Route::get('generate-pdf', 'App\Http\Controllers\PDFController@generatePDF')->name('fdf');
Route::get('generate-pdf-booking/{query}', 'App\Http\Controllers\BookingController@generatePDF')->name('pdf.booking')->middleware('admin');
Route::get('generate-pdf-corporate/{query}', 'App\Http\Controllers\CorporateController@generatePDF')->name('pdf.corporate')->middleware('admin');
Route::get('generate-pdf-query/{query}', 'App\Http\Controllers\QueryController@generatePDF')->name('pdf.query')->middleware('admin');
Route::get('generate-pdf-patient/{query}', 'App\Http\Controllers\PatientController@generatePDF')->name('pdf.patient')->middleware('admin');

// Route::get('/log', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
// Route::get('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register')->middleware('admin');
Route::get('users', 'App\Http\Controllers\Auth\RegisterController@showAllUser')->name('users')->middleware('admin');

// consultant Routes
Route::group(['prefix' => 'consultant'], function () {
    Route::get('/', 'App\Http\Controllers\ConsultantController@index')->name('admin.consultants')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\ConsultantController@show')->name('admin.consultant.show')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\ConsultantController@paging')->name('admin.consultant.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\ConsultantController@search')->name('admin.consultant.search')->middleware('auth');
    Route::get('/create', 'App\Http\Controllers\ConsultantController@create')->name('admin.consultant.create')->middleware('admin');
    Route::get('/edit/{id}', 'App\Http\Controllers\ConsultantController@edit')->name('admin.consultant.edit')->middleware('admin');
    Route::post('/create', 'App\Http\Controllers\ConsultantController@store')->name('admin.consultant.store')->middleware('admin');
    Route::post('/edit/{id}', 'App\Http\Controllers\ConsultantController@update')->name('admin.consultant.update')->middleware('admin');
    Route::get('/delete/{id}', 'App\Http\Controllers\ConsultantController@delete')->name('admin.consultant.delete')->middleware('admin');
});
// Package Routes
Route::group(['prefix' => 'package'], function () {
    Route::get('/', 'App\Http\Controllers\packageController@index')->name('packages')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\packageController@show')->name('package.show')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\packageController@paging')->name('package.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\packageController@search')->name('package.search')->middleware('auth');
    Route::get('/create', 'App\Http\Controllers\packageController@create')->name('package.create')->middleware('admin');
    Route::get('/edit/{id}', 'App\Http\Controllers\packageController@edit')->name('package.edit')->middleware('admin');
    Route::post('/create', 'App\Http\Controllers\packageController@store')->name('package.store')->middleware('admin');
    Route::post('/edit/{id}', 'App\Http\Controllers\packageController@update')->name('package.update')->middleware('admin');
    Route::get('/delete/{id}', 'App\Http\Controllers\packageController@delete')->name('package.delete')->middleware('admin');
});

// Service Routes
Route::group(['prefix' => 'service'], function () {
    Route::group(['middleware' => ['auth']], function () { 
        Route::get('/', 'App\Http\Controllers\serviceController@index')->name('services');
        Route::get('/show/{id}', 'App\Http\Controllers\serviceController@show')->name('service.show');
        Route::post('/paging', 'App\Http\Controllers\serviceController@paging')->name('service.paging');
        Route::post('/search', 'App\Http\Controllers\serviceController@search')->name('service.search');
     });
    Route::group(['middleware' => ['admin']], function () { 
        Route::get('/create', 'App\Http\Controllers\serviceController@create')->name('service.create');
        Route::get('/edit/{id}', 'App\Http\Controllers\serviceController@edit')->name('service.edit');
        Route::post('/create', 'App\Http\Controllers\serviceController@store')->name('service.store');
        Route::post('/edit/{id}', 'App\Http\Controllers\serviceController@update')->name('service.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\serviceController@delete')->name('service.delete');
     });
});

// phonedirectory Routes
Route::group(['prefix' => 'phonedirectory'], function () {
    Route::get('/', 'App\Http\Controllers\phonedirectoryController@index')->name('phonedirectories')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\phonedirectoryController@show')->name('phonedirectory.show')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\phonedirectoryController@paging')->name('phonedirectory.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\phonedirectoryController@search')->name('phonedirectory.search')->middleware('auth');
    Route::group(['middleware' => ['admin']], function () { 
        Route::get('/create', 'App\Http\Controllers\phonedirectoryController@create')->name('phonedirectory.create');
        Route::get('/edit/{id}', 'App\Http\Controllers\phonedirectoryController@edit')->name('phonedirectory.edit');
        Route::post('/create', 'App\Http\Controllers\phonedirectoryController@store')->name('phonedirectory.store');
        Route::post('/edit/{id}', 'App\Http\Controllers\phonedirectoryController@update')->name('phonedirectory.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\phonedirectoryController@delete')->name('phonedirectory.delete');
     });
});


// patient Routes
Route::group(['prefix' => 'patient'], function () {
    Route::get('/', 'App\Http\Controllers\patientController@index')->name('patients')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\patientController@show')->name('patient.show')->middleware('auth');
    Route::get('/showInfo/{phone}', 'App\Http\Controllers\patientController@showInfo')->name('patient.showInfo')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\patientController@paging')->name('patient.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\patientController@search')->name('patient.search')->middleware('auth');
    Route::group(['middleware' => ['admin']], function () { 
        Route::get('/create', 'App\Http\Controllers\patientController@create')->name('patient.create');
        Route::get('/edit/{id}', 'App\Http\Controllers\patientController@edit')->name('patient.edit');
        Route::post('/create', 'App\Http\Controllers\patientController@store')->name('patient.store');
        Route::post('/edit/{id}', 'App\Http\Controllers\patientController@update')->name('patient.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\patientController@delete')->name('patient.delete');
     });
});

// note Routes
Route::group(['prefix' => 'note'], function () {
    Route::get('/', 'App\Http\Controllers\noteController@index')->name('notes')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\noteController@show')->name('note.show')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\noteController@paging')->name('note.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\noteController@search')->name('note.search')->middleware('auth');
    Route::group(['middleware' => ['admin']], function () { 
        Route::get('/create', 'App\Http\Controllers\noteController@create')->name('note.create');
        Route::get('/edit/{id}', 'App\Http\Controllers\noteController@edit')->name('note.edit');
        Route::post('/create', 'App\Http\Controllers\noteController@store')->name('note.store');
        Route::post('/edit/{id}', 'App\Http\Controllers\noteController@update')->name('note.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\noteController@delete')->name('note.delete');
     });
});

// promotion Routes
Route::group(['prefix' => 'promotion'], function () {
    Route::get('/', 'App\Http\Controllers\promotionController@index')->name('promotions')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\promotionController@show')->name('promotion.show')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\promotionController@paging')->name('promotion.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\promotionController@search')->name('promotion.search')->middleware('auth');
    Route::group(['middleware' => ['admin']], function () { 
        Route::get('/create', 'App\Http\Controllers\promotionController@create')->name('promotion.create');
        Route::get('/edit/{id}', 'App\Http\Controllers\promotionController@edit')->name('promotion.edit');
        Route::post('/create', 'App\Http\Controllers\promotionController@store')->name('promotion.store');
        Route::post('/edit/{id}', 'App\Http\Controllers\promotionController@update')->name('promotion.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\promotionController@delete')->name('promotion.delete');
    });
});


// corporate Routes
Route::group(['prefix' => 'corporate'], function () {
    Route::get('/', 'App\Http\Controllers\corporateController@index')->name('corporates')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\corporateController@show')->name('corporate.show')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\corporateController@paging')->name('corporate.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\corporateController@search')->name('corporate.search')->middleware('auth');
    Route::group(['middleware' => ['admin']], function () {        
        Route::get('/create', 'App\Http\Controllers\corporateController@create')->name('corporate.create');
        Route::get('/edit/{id}', 'App\Http\Controllers\corporateController@edit')->name('corporate.edit');
        Route::post('/create', 'App\Http\Controllers\corporateController@store')->name('corporate.store');
        Route::post('/edit/{id}', 'App\Http\Controllers\corporateController@update')->name('corporate.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\corporateController@delete')->name('corporate.delete');
    });
});

// booking Routes
Route::group(['prefix' => 'booking'], function () {
    Route::get('/', 'App\Http\Controllers\bookingController@index')->name('bookings')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\bookingController@show')->name('booking.show')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\bookingController@paging')->name('booking.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\bookingController@search')->name('booking.search')->middleware('auth');
    Route::get('/create', 'App\Http\Controllers\bookingController@create')->name('booking.create')->middleware('admin');
    Route::get('/edit/{id}', 'App\Http\Controllers\bookingController@edit')->name('booking.edit')->middleware('admin');
    Route::post('/create', 'App\Http\Controllers\bookingController@store')->name('booking.store')->middleware('admin');
    Route::post('/edit/{id}', 'App\Http\Controllers\bookingController@update')->name('booking.update')->middleware('admin');
    Route::get('/delete/{id}', 'App\Http\Controllers\bookingController@delete')->name('booking.delete')->middleware('admin');
});

// query Routes
Route::group(['prefix' => 'query'], function () {
    Route::get('/', 'App\Http\Controllers\queryController@index')->name('querys')->middleware('auth');
    Route::get('/show/{id}', 'App\Http\Controllers\queryController@show')->name('query.show')->middleware('auth');
    Route::post('/paging', 'App\Http\Controllers\queryController@paging')->name('query.paging')->middleware('auth');
    Route::post('/search', 'App\Http\Controllers\queryController@search')->name('query.search')->middleware('auth');
    Route::get('/create', 'App\Http\Controllers\queryController@create')->name('query.create')->middleware('admin');
    Route::get('/edit/{id}', 'App\Http\Controllers\queryController@edit')->name('query.edit')->middleware('admin');
    Route::post('/create', 'App\Http\Controllers\queryController@store')->name('query.store')->middleware('admin');
    Route::post('/edit/{id}', 'App\Http\Controllers\queryController@update')->name('query.update')->middleware('admin');
    Route::get('/delete/{id}', 'App\Http\Controllers\queryController@delete')->name('query.delete')->middleware('admin');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return view('pages.about');
// });