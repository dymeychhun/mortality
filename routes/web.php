<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/welcome', function(){
    return view('welcome');
});

Route::get('/dashboard',  [PatientController::class, 'index'])->name('dashboard');

// Route::get('/analysis/total_deaths', function(){

//     return view('analysis.total_deaths');

// });

Route::post('/dashboard', [PatientController::class, 'store'])->name('store.data');

Route::get('/dashboard/{id}', [PatientController::class, 'edit'])->name('edit.data');

Route::PUT('/dashboard', [PatientController::class, 'update'])->name('update.data');

Route::delete('/dashboard/{id}', [PatientController::class, 'destroy'])->name('destroy.data');

Route::get('/get-patients', [PatientController::class, 'fetch'])->name('fetch.data');;
