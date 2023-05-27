<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ['as' => 'site.home', 'uses' => 'App\Http\Controllers\Site\HomeController@index']);

Route::get('/login', ['as' => 'site.login', 'uses' => 'App\Http\Controllers\Site\LoginController@index']);
Route::get('/login/sair', ['as' => 'site.login.sair', 'uses' => 'App\Http\Controllers\Site\LoginController@sair']);
Route::post('/login/entrar', ['as' => 'site.login.entrar', 'uses' => 'App\Http\Controllers\Site\LoginController@entrar']);

Route::get('/contato/{id?}',['uses' => 'App\Http\Controllers\ContatoController@index']);
Route::post('/contato',['uses' => 'App\Http\Controllers\ContatoController@criar']);
Route::put('/contato',['uses' => 'App\Http\Controllers\ContatoController@editar']);

Route::group(['middleware'=>'auth'], function(){

  Route::get('/admin/cursos', ['as' => 'admin.cursos', 'uses' => 'App\Http\Controllers\Admin\CursoController@index']);
  Route::get('/admin/cursos/adicionar', ['as' => 'admin.cursos.adicionar', 'uses' => 'App\Http\Controllers\Admin\CursoController@adicionar']);
  Route::post('/admin/cursos/salvar', ['as' => 'admin.cursos.salvar', 'uses' => 'App\Http\Controllers\Admin\CursoController@salvar']);
  Route::get('/admin/cursos/editar/{id}', ['as' => 'admin.cursos.editar', 'uses' => 'App\Http\Controllers\Admin\CursoController@editar']);
  Route::put('/admin/cursos/atualizar/{id}', ['as' => 'admin.cursos.atualizar', 'uses' => 'App\Http\Controllers\Admin\CursoController@atualizar']);
  Route::get('/admin/cursos/deletar/{id}', ['as' => 'admin.cursos.deletar', 'uses' => 'App\Http\Controllers\Admin\CursoController@deletar']);
  
});