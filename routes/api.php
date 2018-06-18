<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/usuarios', [
    'uses' => 'UsuariosController@postUsuarios'
]);

Route::post('/authuser', [
    'uses' => 'UsuariosController@postAuthUser'
]);

Route::get('/authuser', [
    'uses' => 'UsuariosController@getAuthUser'
]);

Route::get('/usuarios', [
    'uses' => 'UsuariosController@getUsuarios'
]);

Route::get('/categorias/{cat}', [
    'uses' => 'CategoriaController@getCategorias'
]);

Route::get('/listas/{lista}', 'ListaController@getListas');

Route::post('/listas','ListaController@postListas');


