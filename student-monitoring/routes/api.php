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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->name('.api')->group(function(){
	Route::prefix('pergunta')->group(function(){
		Route::get('/', 'Tipo_de_perguntaController@index')->name('index_Tipo_de_pergunta');
		Route::get('/{id}', 'Tipo_de_perguntaController@show')->name('single_Tipo_de_pergunta');
		Route::post('/', 'Tipo_de_perguntaController@store')->name('store_Tipo_de_pergunta');
		Route::put('/{id}', 'Tipo_de_perguntaController@update')->name('update_Tipo_de_pergunta');
		Route::delete('/{id}', 'Tipo_de_perguntaController@delete')->name('delete_Tipo_de_pergunta');
		Route::delete('/', 'Tipo_de_perguntaController@drop')->name('delete_All_Tipo_de_pergunta');
	});
});






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

//FormControler

// Route::get('/form/{id}', 'FormController@index')->name('form');
// Route::post('/form/save', 'FormController@store')->name('formsave');


// //Formexit -> Index
// // Route::get('/formexit', ['as' => 'formexit', 'uses' => 'FormexitController@index']);
// //Formexit -> Index
// // Route::post('/formexit/save','FormexitController@store')->name('formExitStore');



// //FormTitleController
// Route::get('/formulariotitle', 'FormtitleController@index')->name('criarform');
// Route::post('/formulariotitle/save', 'FormtitleController@store')->name('salvarform');

// //???
// Route::get('/index', function(){
// 	return view ('home2');
// })->name('index');

// //RespostaController
// Route::get('/resposta','RespostaController@index')->name('resposta');

// //PerguntasController
// Route::get('/pergunta/{id}','PerguntasController@index')->name('perg');
// Route::post('/pergunta/save','PerguntasController@store')->name('pergSave');


// //StatusController
// Route::get('/status','StatusController@index')->name('status');
// //VizualizarController
// Route::get('/visu','VisualizarController@index')->name('visu');
// Route::get('/visu/{id}', 'VisuController@index')->name('visus');

