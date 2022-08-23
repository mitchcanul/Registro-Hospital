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
//apis
Route::apiResource('apip', 'PacientesController');
Route::apiResource('apih', 'HospitalesController');
Route::apiResource('apic', 'CiudadesController');
//vistas
Route::get('/', function () {
    return view('welcome');
});
Route::get('hospital', function () {
    return view('hospital');
});
Route::get('ciudad', function () {
    return view('ciudad');
});
Route::get('master', function () {
    return view('layouts.master');
});
Route::get('pacientes', function () {
    return view('pacientes');
});
