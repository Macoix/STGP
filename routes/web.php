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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


Route::get('usuarios', 'UserController@index')->name('user.index');
Route::get('usuarios/crear','UserController@create')->name('user.create');
Route::get('usuarios/ver/{user}','UserController@show')->name('user.show');
Route::post('usuarios/almacenar','UserController@store')->name('user.store');
Route::get('usuarios/editar/{user}','UserController@edit')->name('user.edit');
Route::post('usuarios/actualizar/{user}','UserController@update')->name('user.update');

Route::get('tutores', 'TutoresController@index')->name('tutor.index');
Route::get('tutores/crear','TutoresController@create')->name('tutor.create');
Route::post('tutores/almacenar','TutoresController@store')->name('tutor.store');


Route::get('proyectos','ProyectosController@index')->name('proyectos.index');
Route::get('proyectos/crear','ProyectosController@create')->name('proyectos.create');
Route::post('proyectos/almacenar','ProyectosController@store')->name('proyectos.store');
Route::get('proyectos/ver/{id}','ProyectosController@show')->name('proyectos.show');
Route::get('proyectos/ver/documentos/{document}', 'ProyectosController@document');
Route::post('proyectos/ver/validacion_anexo/{id}','ProyectosController@validacion_anexo')->name('proyectos.anexo');

Route::get('carreras','CarrerasController@index')->name('carreras.index');
Route::get('carreras/crear','CarrerasController@create')->name('carreras.create');
Route::post('carreras/almacenar','CarrerasController@store')->name('carreras.store');
Route::get('carreras/editar/{carrera}', 'CarrerasController@edit')->name('carreras.edit');
Route::post('carreras/actualizar/{carrera}','CarrerasController@update')->name('carreras.update');

Route::get('periodos', 'PeriodosController@index')->name('periodos.index');
Route::get('periodos/crear','periodosController@create')->name('periodos.create');
Route::post('periodos/almacenar','periodosController@store')->name('periodos.store');

Route::get('proyectos/tutores/{id}', 'CarrerasController@getTutores');
