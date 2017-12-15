<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::group(['middleware' => ['web']], function () {
route::get('/','VistaController@inicio');
 route::get('registro','VistaController@registro');
 route::get('clientes','VistaController@clientes');
 route::get('proveedores','VistaController@proveedores');
 route::get('sedes','VistaController@sedes');
 route::get('pruebas','VistaController@pruebas');
 route::get('materiaPrima','VistaController@materiaPrima');
 route::get('diseñoAvion','VistaController@diseñoAvion');
 Route::resource('client', 'clientController');

route::resource('lugares','LugarController');

Route::get('/buscarEstado/{id}/pertenece','VistaController@buscarEstados');

Route::get('/buscarMunicipio/{id}/pertenece','VistaController@buscarMunicipios');

Route::get('/buscarParroquia/{id}/pertenece','VistaController@buscarParroquias');

Route::post('/inserta-proveedor','ProveedorController@insertar_proveedor' );
Route::post('/inserta-materialprueba','PruebasController@insertar_matp' );

Route::get('/lista-proveedor','ProveedorController@listar_proveedor' );

});




Route::auth();

Route::get('/home', 'HomeController@index');
