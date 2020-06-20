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
    return view('home.welcome');
})->name('welcome');

Auth::routes();

Route::get('/about', function(){
    return view('home.about');
})->name('about');
Route::get('/contact-us', function(){
    return view('home.contact');
})->name('contact');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contabilità','HomeController@index')->name('contabilita');
Route::get('/impostazioni','StockController@impostazione')->name('impostazioni');
Route::get('/cassa','HomeController@index')->name('cassa');

Route::get('/retrieveData/{id}','AjaxController@retrieve_dataJS')->name('retrieve_dataJS');

