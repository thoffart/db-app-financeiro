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

Route::get('/gastos/{email}', [
    'uses' => 'GastoController@getGastos'
]);

Route::post('/gasto', [
    'uses' => 'GastoController@postGasto'
]);

Route::put('/gastos', [
    'uses' => 'GastoController@updateGasto'
]);



Route::post('/usuarios', [ //Registrar
    'uses' => 'UsuariosController@postUsuarios'
]);

Route::patch('/usuarios/{id}', 'UsuariosController@patchUsuarios');

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



Route::get('/listas/{lista}', 'ListaController@getListas');

Route::post('/listas','ListaController@postListas');

Route::delete('listas/{lista}', 'ListaController@deleteListas');



Route::post('/receita', [
    'uses' => 'ReceitaController@postReceita'
]);

Route::get('/receitas/{email}', [
    'uses' => 'ReceitaController@getReceitas'
]);

Route::delete('/receita/{id}', 'ReceitaController@deleteReceita');

Route::put('/receitas', 'ReceitaController@updateReceita');

Route::delete('/receitas/{id}', [
    'uses' => 'ReceitaController@deletarReceitas'
]);

Route::get('/receitas/{email}/{filter}', [
    'uses' => 'ReceitaController@getReceitaFilter'
]);

Route::get('/gastoss/{email}/{filter}', [
    'uses' => 'GastoController@getGastosFilter'
]);


Route::get('/categoriass/', [
    'uses' => 'CategoriaController@getCategoriasLista'
]);