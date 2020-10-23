<?php

use Illuminate\Http\Request;

//Rutas de Auth de JWT
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


//RECUPERACION DE PASSWORDS
Route::post('forgotPassword', 'ForgotPasswordController@forgot');
Route::post('passwordReset', 'ForgotPasswordController@reset');


#CRUD USERS
//Validando uso de token para acceder a las rutas
Route::middleware(['jwt.auth'])->group(function(){
    Route::get('usuarios', 'UserController@show')->name('listar_usuarios');
    Route::post('usuarios', 'UserController@store')->name('agregar_usuario');
    Route::get('usuarios/{id}', 'UserController@get')->name('obtener_usuario');
    Route::put('usuarios/{id}', 'UserController@update')->name('modificar_usuario');
    Route::delete('usuarios/{id}', 'UserController@destroy')->name('eliminar_usuario');
});


#CRUD PRODUCTOS
//Validando uso de token para acceder a las rutas
Route::middleware(['jwt.auth'])->group(function(){
    Route::get('productos', 'ProductoController@show')->name('listar_productos');
    Route::post('productos', 'ProductoController@store')->name('agregar_producto');
    Route::get('productos/{id}', 'ProductoController@get')->name('obtener_producto');
    Route::post('productos/update/{id}', 'ProductoController@update')->name('modificar_producto');
    Route::delete('productos/{id}', 'ProductoController@destroy')->name('eliminar_producto');
    Route::get('productos/search/{param}', 'ProductoController@search')->name('buscar_producto');
});
