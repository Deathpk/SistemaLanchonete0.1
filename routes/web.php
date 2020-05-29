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
//Rotas do Financeiro.
Route::get('/admin/financeiro', 'usercontroller@financeiroShow')->name('admin.financeiro');
Route::put('/admin/financeiro/Options', 'usercontroller@selectedOption')->name('admin.Options');
Route::get('/admin/financeiro/Options', 'usercontroller@financeiroShow')->name('admin.Options'); // Retorna para a options.
Route::put('/admin/financeiro/month', 'usercontroller@monthOption')->name('admin.month');
Route::put('/admin/financeiro/day', 'usercontroller@dayOption')->name('admin.day');
Route::put('/admin/financeiro/year', 'usercontroller@yearOption')->name('admin.year');

Route::resource('allusers', 'userController');

//Mostrar o cardápio
Route::get('/cardapio', 'cardapioController@showCardapio')->name('cardapio');

//Rotas para products
Route::resource('products', 'productsController');

//Rotas do controller Caixa
Route::get('caixa', 'Caixa\caixaController@show')->name('caixaShow');
Route::post('caixa/show', 'Caixa\caixaController@showItens')->name('caixaShowItens');
Route::post('caixa/show/itemsprev','Caixa\caixaController@currentTransaction')->name('caixaShowPrev');
//Rotas dos Carrinhos.
Route::get('cart', 'cartController@addToCart')->name('Cart/Add');
Route::put('cart', 'cartController@addToCart')->name('Cart/Add');
Route::put('cart/remove', 'cartController@removeProd')->name('Cart/Remove');
Route::put('cart/checkout/finish', 'cartController@checkOut')->name('Cart/Checkout');
Route::put('cart/checkout/poscheckout', 'cartController@posCheckout')->name('Cart/PosCheckout');
Route::get('cart/renew', 'cartController@dropCart')->name('Cart/Renew');



