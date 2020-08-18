<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'cliente' => 'API\ClienteController',
    'fornecedor' => 'API\FornecedorController',
    'produto' => 'API\ProdutoController',
    'venda' => 'API\VendaController',
    'vendedor' => 'API\VendedorController',
]);

Route::get('vendas/{id_venda}/itens', 'API\ItemVendaController@index');
Route::post('vendas/itens', 'API\ItemVendaController@store');
Route::get('vendas/{id_venda}/itens/{id}', 'API\ItemVendaController@show');
Route::put('vendas/{id_venda}/itens/{id}', 'API\ItemVendaController@update');
Route::delete('vendas/{id_venda}/itens/{id}', 'API\ItemVendaController@destroy');