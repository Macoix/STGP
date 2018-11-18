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
Route::post('proyectos/ver/subida_tomo/{id}','ProyectosController@subirTomo1')->name('proyectos.tomo');
Route::get('proyectos/ver/documentos2/{document}', 'ProyectosController@document2');
Route::post('proyecto/actualizar/{id}','ProyectosController@update')->name('proyectos.update');
Route::get('proyectos/editar/{id}','ProyectosController@edit')->name('proyectos.edit');
Route::post('proyectos/almacenar/comite/{id}', 'ProyectoEvaluacionesComiteController@store')->name('proyectos.comite');
Route::post('proyectos/almacenar/evaluacion/{id}', 'ProyectoEvaluacionesComiteController@aprobar')->name('proyectos.aprobar');
Route::post('proyectos/ver/subida_tomo2/{id}','ProyectosController@subirTomo2')->name('proyectos.tomo2');
Route::get('proyectos/jurados/crear/{id}','ProyectoJuradosController@create')->name('jurados.create');
Route::get('proyectos/ver/documentos3/{document}', 'ProyectosController@document3');
Route::post('proyectos/almacenar/jurados/{id}','ProyectoJuradosController@store')->name('jurados.store');
Route::post('proyectos/veredicto/{id}','ProyectosController@veredicto')->name('proyectos.veredicto');




Route::get('carreras','CarrerasController@index')->name('carreras.index');
Route::get('carreras/crear','CarrerasController@create')->name('carreras.create');
Route::post('carreras/almacenar','CarrerasController@store')->name('carreras.store');
Route::get('carreras/editar/{carrera}', 'CarrerasController@edit')->name('carreras.edit');
Route::post('carreras/actualizar/{carrera}','CarrerasController@update')->name('carreras.update');

Route::get('periodos', 'PeriodosController@index')->name('periodos.index');
Route::get('periodos/crear','periodosController@create')->name('periodos.create');
Route::post('periodos/almacenar','periodosController@store')->name('periodos.store');

Route::get('proyectos/tutores/{id}', 'CarrerasController@getTutores');
