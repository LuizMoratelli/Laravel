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
//estoque wVJn8rnbpuJsZjkP
//https://medium.com/modulr/create-scaffold-with-laravel-5-7-f5ab353dff1c
//php artisan make:auth
Route::get('/', function () {
    return view('welcome');
});
//Controlador@Método
Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos/json', 'ProdutoController@listaJson');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
