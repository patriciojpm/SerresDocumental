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

Auth::routes();




//rutas del sistema
Route::middleware(['auth'])->group(function(){

   

Route::get('Admin/home', 'HomeController@index')->name('home');
Route::get('Cliente/home', 'HomeController@indexCliente')->name('homeCliente');

//usuarios
route::post('users/store','UserController@store')->name('users.create')->middleware('permission:users.create'); // ruta para grabar
route::get('users','UserController@index')->name('users.index')->middleware('permission:users.index'); // ruta para ver todos los usuarios
route::get('users/create','UserController@create')->name('users.create')->middleware('permission:users.create');// ruta formularios de creación
route::put('users/{user}','UserController@update')->name('users.update')->middleware('permission:users.update');//ruta de actualización del registro
route::get('users/{user}','UserController@show')->name('users.show')->middleware('permission:users.show');// formulario de solo muestra d einformación del usuario
route::delete('users/{user}','UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');//Ruta de eliminación del usuario directamente
route::get('users/{user}/edit','UserController@edit')->name('users.edit')->middleware('permission:users.edit');//ruta del formulario de edición del usuario

//roles
route::post('roles/store')->name('roles.create')->middleware('permission:roles.create'); // ruta para grabar
route::get('roles')->name('roles.index')->middleware('permission:roles.index'); // ruta para ver todos los roles
route::get('roles/create')->name('roles.create')->middleware('permission:roles.create');// ruta formularios de creación
route::put('roles/{user}')->name('roles.update')->middleware('permission:roles.update');//ruta de actualización del registro
route::get('userolesrs/{user}')->name('roles.show')->middleware('permission:roles.show');// formulario de solo muestra de información del rol
route::delete('roles/{user}')->name('roles.destroy')->middleware('permission:roles.destroy');//Ruta de eliminación del rol directamente
route::get('roles/{user}/edit')->name('roles.edit')->middleware('permission:roles.edit');//ruta del formulario de edición del rol

//

});