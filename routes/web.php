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


Route::get('/Main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');



Route::get('Clientes', 'ClienteController@principal');
Route::post('añadirCliente', 'ClienteController@store');
Route::get('busquedaCliente', 'ClienteController@show');
Route::post('modificarCliente', 'ClienteController@update');
Route::post('eliminarCliente', 'ClienteController@delete');


Route::get('Paquetes', 'PaqueteController@principal');
Route::post('añadirPaquete', 'PaqueteController@store');
Route::get('busquedaPaquete', 'PaqueteController@show');
Route::post('modificarPaquete', 'PaqueteController@update');
Route::post('eliminarPaquete', 'PaqueteController@delete');

Route::get('Equipos', 'EquipoController@principal');
Route::post('añadirEquipo', 'EquipoController@store');
Route::get('busquedaEquipo', 'EquipoController@show');
Route::post('modificarEquipo', 'EquipoController@update');
Route::post('eliminarEquipo', 'EquipoController@delete');

Route::get('Transportes', 'TransporteController@principal');
Route::post('añadirTransporte', 'TransporteController@store');
Route::get('busquedaTransporte', 'TransporteController@show');
Route::post('modificarTransporte', 'TransporteController@update');
Route::post('eliminarTransporte', 'TransporteController@delete');

Route::get('Sucursales', 'SucursalController@principal');
Route::post('añadirSucursal', 'SucursalController@store');
Route::get('busquedaSucursal', 'SucursalController@show');
Route::post('modificarSucursal', 'SucursalController@update');
Route::post('eliminarSucursal', 'SucursalController@delete');


Route::get('Personal', 'PersonalController@principal');
Route::post('añadirPersonal', 'PersonalController@store');
Route::get('busquedaPersonal', 'PersonalController@show');
Route::post('modificarPersonal', 'PersonalController@update');
Route::post('eliminarPersonal', 'PersonalController@delete');


Route::resource('Invs','InventarioController');
Route::get('Inventarios', 'InventarioController@principal');
Route::post('añadirInventario', 'InventarioController@store');
Route::post('modificarInventario', 'InventarioController@update');
Route::post('eliminarInventario', 'InventarioController@delete');
Route::get('busquedaInventario', 'InventarioController@show');
Route::post('añadirDetInv', 'InventarioController@storeDetail');

Route::get('RolDePago', 'RolDePagoController@principal');
Route::post('añadirRolDePago', 'RolDePagoController@store');
Route::get('busquedaRolDePago', 'RolDePagoController@show');
Route::post('modificarRolDePago', 'RolDePagoController@update');
Route::post('eliminarRolDePago', 'RolDePagoController@delete');


Route::resource('Envs','EnvioController');
Route::get('Envios', 'EnvioController@principal');
Route::post('añadirEnvio', 'EnvioController@store');
Route::post('modificarEnvio', 'EnvioController@update');
Route::post('eliminarEnvio', 'EnvioController@delete');
Route::get('busquedaEnvio', 'EnvioController@show');
Route::post('añadirDetEnv', 'EnvioController@storeDetail');


Route::resource('Ens','EntregaController');
Route::get('Entregas', 'EntregaController@principal');
Route::post('añadirEntrega', 'EntregaController@store');
Route::post('modificarEntrega', 'EntregaController@update');
Route::post('eliminarEntrega', 'EntregaController@delete');
Route::get('busquedaEntrega', 'EntregaController@show');
Route::post('añadirDetEn', 'EntregaController@storeDetail');
