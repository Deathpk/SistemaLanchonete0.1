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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Dashboard de admin
Route::get('/admin', 'authController@dashboard')->name('admin');
Route::get('/admin/register', 'authController@register')->name('admin.register');
Route::get('/admin/login', 'authController@showLoginForm')->name('admin.login');
Route::post('/admin/login/do', 'authController@login')->middleware('App\Http\Middleware\AdminMiddleware')->name('admin.login.do');
Route::get('/admin/logout', 'authController@logout')->name('admin.logout');

Route::resource('allusers', 'userController');

//Mostrar o cardápio
Route::get('/cardapio', 'cardapioController@showCardapio')->name('cardapio');

//Rotas para products
Route::resource('products', 'productsController');

