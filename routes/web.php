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
    return view('table');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('registro');
});

Route::get('/register_contact', function () {
    return view('registro_contact');
});

Route::get('/register_update', function () {
    return view('resgister_update');
});