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
Route::delete('/gastos/{id}', [
    'uses' => 'GastoController@deleteGasto'
]);

Route::get('/receitas/{email}', [
    'uses' => 'ReceitaController@getReceitas'
]);

Route::get('/gastos/{email}', [
    'uses' => 'GastoController@getGastos'
]);

Route::post('/usuarios', [ //Registrar
    'uses' => 'UsuariosController@postUsuarios'
]);

Route::post('/authuser', [ //Login
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

Route::post('/gasto', [
    'uses' => 'GastoController@postGasto'
]);

Route::post('/receita', [
    'uses' => 'ReceitaController@postReceita'
]);