<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/sobre_nos', function () {
    return 'Sobre nós';
});
Route::get('/contato', function () {
    return 'Contato';
});

/* principais verbos http para controle de requisiçõe de servidores
Route::get($uri, $callback)
get
post
put
patch
delete
options
*/