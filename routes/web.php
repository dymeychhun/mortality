<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PatientController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard',  'App\Http\Controllers\PatientController@index')->name('dashboard');

Route::get('/analysis/total_deaths', function(){
    return view('analysis.total_deaths');
});
Route::post('/dashboard', 'App\Http\Controllers\PatientController@store')->name('store.data');

Route::get('/dashboard/{id}', 'App\Http\Controllers\PatientController@edit')->name('edit.data');
Route::PUT('/dashboard', 'App\Http\Controllers\PatientController@update')->name('update.data');
// Route::get('/import', 'App\Http\Controllers\ExcelController@index')->name('import');
// Route::post('/import', 'App\Http\Controllers\ExcelController@upload')->name('upload');