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


Route::group(['prefix' => ''], function(){
    
    /***********  SERVIVIOS DE API PARA SUDLATIN*/
    Route::post('/firmador', 'srvsudlatinController@consulta')
    ->name("api.consulta");
    Route::get('/firmador', function(){
		return array("resultado" => "metodo incorrecto");
	});    
    Route::get('/getSession', 'srvsudlatinController@getSession')
    ->name("api.getSession");

    /***********  SERVIVIOS DE API PARA PADRON TELEMEDICINA*/    
    Route::get('/padron/{dni}', 'srvpadronUomController@buscarDni')
    ->where(['dni' => '[0-9]+']);    

    /***********  SERVIVIOS para el Firmador de Recetas Red basa*/    
    Route::post('/firmadigital/notificafirma', 'srvfirmadorController@notificaFirmaDigital')
    ->name("firmaDigital.notificaFirmaDigital");    
	
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
