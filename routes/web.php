<?php

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
//verifikasi email

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//verifikasi email user
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','welcomeController@welcome');
Route::get('filter-produk','welcomeController@filter');


////////// Admin \\\\\\\\\\\

 //master produk
Route::resource('produk','produkController');
Route::get('/pproduk/delete/{id}', 'produkController@delete')->name('produk.delete');

// Master Ticket
Route::resource('ticket','ticketController');

// Master Customer
Route::resource('pelanggan','addcustomerController');

//Mater Kategori Produk
Route::resource('kategori','KategoriController');
Route::get('/kategori/delete/{id}', 'KategoriController@delete')->name('kategori.delete');

////////// END Admin \\\\\\\\\\\

////////// Customer \\\\\\\\\\\

Route::resource('customer','customerController');

