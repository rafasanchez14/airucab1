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
 route::get('pruebas','VistaController@pruebasmat');
  route::get('pruebascrud','VistaController@pruebascrud');
 route::get('materiaPrima','VistaController@materiaPrima');
 route::get('diseñoAvion','VistaController@diseñoAvion');
 Route::resource('material', 'materialController');
Route::get('delete/{id}','materialController@destroy');
Route::post('buscarClientes',
                ['as' => 'buscarCliente', 'uses' => 'ClienteController@buscarC']);
Route::post('buscarProveedores',
        ['as' => 'buscarProv', 'uses' => 'ProveedorController@buscarP']);
  Route::post('buscarBeneficiarios',
                ['as' => 'buscarBene', 'uses' => 'BeneController@buscarB']);
   Route::post('buscarPrueba',
                              ['as' => 'buscarPr', 'uses' => 'PruebascrudController@buscarP']);

route::resource('clientes','ClienteController');
route::resource('pruebascrud','PruebascrudController');
route::resource('pruebamat','PruebasController');
route::resource('proveedores','ProveedorController');
route::resource('beneficiarios','BeneController');
route::resource('registro','PersonalController');
route::resource('lugares','LugarController');

Route::post('/inserta-bene','BeneController@insertar_bene' );
Route::get('/buscarEstado/{id}/pertenece','VistaController@buscarEstados');
Route::get('/buscarMatpru','PruebasController@buscarMP');
Route::get('/buscarMunicipio/{id}/pertenece','VistaController@buscarMunicipios');
Route::get('/buscarParroquia/{id}/pertenece','VistaController@buscarParroquias');
Route::post('/inserta-proveedor','ProveedorController@insertar_proveedor' );
Route::post('/inserta-cliente','clientController@insertar_cliente' );
Route::post('/inserta-materialprueba','PruebasController@insertar_matp' );
Route::post('/inserta-personal','PersonalController@insertar_pers' );
Route::post('/inserta-prueba','PruebascrudController@insertar_prueba' );
Route::get('/lista-proveedor','ProveedorController@listar_proveedor' );
route::get('beneficiarios','VistaController@beneficiarios');

// Rutas para los Reportes
Route::resource('reports','reportController');
Route::get('/prov','reportController@proveedor');
Route::get('/cliente','reportController@cliente');
Route::get('/inv','reportController@inventario');
Route::get('/producto','reportController@producto');
Route::get('/ala','reportController@ala');
Route::get('/prueba','reportController@prueba');
Route::get('/modelo','reportController@modelo');
Route::get('/mejorp','reportController@mejorPlazo');
Route::get('/evolucion-aeronautica','reportController@evo');
Route::get('/piezaform','reportController@piezaform');
Route::get('/promen','reportController@promen');






});
Route::auth();
Route::get('/home', 'HomeController@index');
