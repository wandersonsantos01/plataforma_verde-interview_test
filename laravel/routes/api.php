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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(array('prefix' => 'residuos'), function () {
    Route::post('', 'ResiduosController@store');
    Route::get('', 'ResiduosController@show');
    Route::delete('{idResiduo}', 'ResiduosController@destroy');
    Route::put('{idResiduo}', 'ResiduosController@update');

    Route::get('/planilha/{nomePlanilha}', 'ResiduosController@showPlanilha');
});
