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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/', 'Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () { return view('index', ['alert_content' => "Data berhasil disimpan"]); });
    // Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout')->name('logout');

    Route::resource('konfigurasi/setup', 'Konfigurasi\SetupController');
    Route::resource('master-data/divisi', 'MasterData\DivisiController');
    Route::resource('master-data/karyawan', 'MasterData\KaryawanController');
});