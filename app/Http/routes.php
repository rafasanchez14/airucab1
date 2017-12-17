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




Route::group(['middlewareGroups' => ['web']], function () {
route::get('/','VistaController@inicio');
 route::get('registro','VistaController@registro');
 route::get('clientes','VistaController@clientes');
 route::get('proveedores','VistaController@proveedores');
 route::get('sedes','VistaController@sedes');
 route::get('pruebas','VistaController@pruebas');
 route::get('materiaPrima','VistaController@materiaPrima');
 route::get('diseñoAvion','VistaController@diseñoAvion');
 Route::resource('material', 'materialController');
Route::get('delete/{id}','materialController@destroy');
Route::post('buscarClientes',
                ['as' => 'buscarCliente', 'uses' => 'ClienteController@buscarC']);

route::resource('clientes','ClienteController');
route::resource('lugares','LugarController');
Route::post('/modificaProv','ProveedorController@modificar_proveedor');
Route::post('/EliminaProv','ProveedorController@eliminar_proveedor');
Route::post('/inserta-bene','PersonalController@insertar_bene' );
route::resource('lugaresb','LugarController');
Route::get('/buscarEstado/{id}/pertenece','VistaController@buscarEstados');
Route::get('/buscarMatpru','PruebasController@buscarMP');
Route::get('/buscarMunicipio/{id}/pertenece','VistaController@buscarMunicipios');
Route::get('/buscarParroquia/{id}/pertenece','VistaController@buscarParroquias');
Route::post('/inserta-cliente','clientController@insertar_cliente' );
Route::post('/inserta-proveedor','ProveedorController@insertar_proveedor' );
Route::post('/inserta-materialprueba','PruebasController@insertar_matp' );
Route::post('/inserta-personal','PersonalController@insertar_pers' );
Route::get('/lista-proveedor','ProveedorController@listar_proveedor' );
route::get('beneficiarios','VistaController@beneficiarios');

});




Route::auth();

Route::get('/home', 'HomeController@index');
