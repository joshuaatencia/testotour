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
    //return view('layouts.navbar');
   return view('login');
   //return view('inicio_invitado');
});

Route::get('/registro', function () {
    return view('registro');
});


Route::post('/volver','controlador@volver');

Route::post('/registro','controlador@registro');

Route::post('/login','controlador@login');

Route::post('/comienza','controlador@comienza');

Route::post('/china','controlador@china');

Route::post('/coliseo','controlador@roma');

Route::post('/cristo','controlador@cristo');

Route::post('/editar','controlador@editar');

Route::get('/update/{idusuario}','controlador@update');

