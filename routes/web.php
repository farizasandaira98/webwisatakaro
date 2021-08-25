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

Route::get('/','IndexController@index');
Route::get('/destinasi','IndexController@destinasi');
Route::get('/destinasi/cari', 'IndexController@destinasisearch');
Route::get('/destinasi/{id}','IndexController@destinasireadmore');
Route::get('/pakettour','IndexController@pakettour');
Route::get('/pakettour/cari','IndexController@pakettoursearch');
Route::get('/about','IndexController@about');

Auth::routes();
Route::prefix('user')->group(function() {
    Route::get('/', 'HomeController@index')->name('user.dashboard');
    Route::get('/destinasi','HomeController@destinasi');
    Route::get('/destinasi/cari', 'HomeControllerr@destinasisearch');
    Route::get('/destinasi/{id}','HomeController@destinasireadmore');
    Route::get('/pakettour','HomeController@pakettour');
    Route::get('/pakettour/cari','HomeController@pakettoursearch');
    Route::get('/booking/{id}','HomeController@booking');
    Route::get('/bookingall/{name}','HomeController@bookingall');
    Route::get('/notatransaksi','HomeController@nota');
    Route::post('/booking/store', 'HomeController@store');
    Route::get('/about','HomeController@about');
   }) ;


Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
    Route::get('/register', 'Auth\AdminLoginController@showFormRegister')->name('admin.register');
    Route::post('/register', 'Auth\AdminLoginController@register')->name('admin.register.submit');

    Route::get('/destinasiwisata', 'DestinasiController@index');
    Route::get('/destinasiwisata/tambah', 'DestinasiController@tambah');
    Route::post('/destinasiwisata/store', 'DestinasiController@store');
    Route::get('/destinasiwisata/edit/{id}', 'DestinasiController@edit');
    Route::post('/destinasiwisata/update/{id}', 'DestinasiController@update');
    Route::get('/destinasiwisata/hapus/{id}', 'DestinasiController@destroy');
    Route::get('/destinasiwisata/cari', 'DestinasiController@search');

    Route::get('/mobiltravel', 'MobilTravelController@index');
    Route::get('/mobiltravel/tambah', 'MobilTravelController@tambah');
    Route::post('/mobiltravel/store', 'MobilTravelController@store');
    Route::get('/mobiltravel/edit/{id}', 'MobilTravelController@edit');
    Route::post('/mobiltravel/update/{id}', 'MobilTravelController@update');
    Route::get('/mobiltravel/hapus/{id}', 'MobilTravelController@destroy');
    Route::get('/mobiltravel/cari', 'MobilTravelController@search');

    Route::get('/user', 'DataUserController@datauser');
    Route::get('/user/hapus/{id}', 'DataUserController@datauserhapus');
    Route::get('/user/cari', 'DataUserController@datausercari');

    Route::get('/pakettour', 'PaketTourController@index');
    Route::get('/pakettour/tambah', 'PaketTourController@tambah');
    Route::post('/pakettour/store', 'PaketTourController@store');
    Route::get('/pakettour/edit/{id}', 'PaketTourController@edit');
    Route::post('/pakettour/update/{id}', 'PaketTourController@update');
    Route::get('/pakettour/hapus/{id}', 'PaketTourController@destroy');
    Route::get('/pakettour/cari', 'PaketTourController@search');

    Route::get('/booking', 'Auth\AdminController@booking');
    Route::get('/booking/cari', 'Auth\AdminController@bookingsearch');
    Route::get('/booking/update/{id}', 'Auth\AdminController@update');
    Route::get('/booking/hapus/{id}', 'Auth\AdminController@destroy');

    Route::get('/supir', 'SupirController@index');
    Route::get('/supir/tambah', 'SupirController@tambah');
    Route::post('/supir/store', 'SupirController@store');
    Route::get('/supir/edit/{id}', 'SupirController@edit');
    Route::post('/supir/update/{id}', 'SupirController@update');
    Route::get('/supir/ubahstatus/{id}', 'SupirController@ubahstatus');
    Route::get('/supir/hapus/{id}', 'SupirController@destroy');
    Route::get('/supir/cari', 'SupirController@search');
   }) ;
