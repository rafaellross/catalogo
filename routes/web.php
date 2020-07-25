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

App\Lbc\LaravelBootstrapComponents::init();

// abc.com/lbc if you want to have the docs for it
App\Lbc\LaravelBootstrapComponents::initDocs();



Route::get('/', function () {

});

Auth::routes();

Route::get('/', 'ProdutoController@index')->name('home');


Route::resource('produtos', 'ProdutoController');
Route::resource('categorias', 'CategoriaController');