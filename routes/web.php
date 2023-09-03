<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/dashboard',  'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::get('/analysis/total_deaths', function(){
    return view('analysis.total_deaths');
});
Route::post('/dashboard', 'App\Http\Controllers\PatientController@storeData')->name('store.data');
