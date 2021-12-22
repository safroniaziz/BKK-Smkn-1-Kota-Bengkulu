<?php

use App\Http\Controllers\Alumni\AlumniDashboardController;
use App\Http\Controllers\Alumni\DataPekerjaanController;
use App\Http\Controllers\Alumni\DataPendidikanController;
use App\Http\Controllers\Alumni\DataPersonalController;
use App\Http\Controllers\Alumni\DataWirausahaCotroller;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Operator\AlumniController;
use App\Http\Controllers\Operator\JurusanController;
use App\Http\Controllers\Operator\OperatorDashboardController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Route::group(['prefix'  => 'alumni/'],function(){
    Route::post('/',[RegisterController::class, 'alumniRegister'])->name('alumni.register');
    Route::get('/',[AlumniDashboardController::class, 'dashboard'])->name('alumni.dashboard');

    Route::group(['prefix'  => 'data_personal'],function(){
        Route::get('/',[DataPersonalController::class, 'index'])->name('alumni.personal');
        Route::patch('/{id}',[DataPersonalController::class, 'update'])->name('alumni.personal.update');
    });

    Route::group(['prefix'  => 'data_pendidikan'],function(){
        Route::get('/',[DataPendidikanController::class, 'index'])->name('alumni.pendidikan');
        Route::post('/',[DataPendidikanController::class, 'post'])->name('alumni.pendidikan.post');
        Route::delete('/{id}',[DataPendidikanController::class, 'delete'])->name('alumni.pendidikan.delete');
    });

    Route::group(['prefix'  => 'data_pekerjaan'],function(){
        Route::get('/',[DatapekerjaanController::class, 'index'])->name('alumni.pekerjaan');
        Route::post('/',[DataPekerjaanController::class, 'post'])->name('alumni.pekerjaan.post');
        Route::delete('/{id}',[DatapekerjaanController::class, 'delete'])->name('alumni.pekerjaan.delete');
    });

    Route::group(['prefix'  => 'data_wirausaha'],function(){
        Route::get('/',[DataWirausahaCotroller::class, 'index'])->name('alumni.wirausaha');
        Route::post('/',[DataWirausahaCotroller::class, 'post'])->name('alumni.wirausaha.post');
        Route::delete('/{id}',[DataWirausahaCotroller::class, 'delete'])->name('alumni.wirausaha.delete');
    });
});

Route::group(['prefix'  => 'operator/'],function(){
    Route::get('/',[OperatorDashboardController::class, 'dashboard'])->name('operator.dashboard');
    Route::group(['prefix'  => 'manajemen_jurusan'],function(){
        Route::get('/',[JurusanController::class, 'index'])->name('operator.jurusan');
        Route::post('/',[JurusanController::class, 'post'])->name('operator.jurusan.add');
        Route::get('/{id}/edit',[JurusanController::class, 'edit'])->name('operator.jurusan.edit');
        Route::patch('/',[JurusanController::class, 'update'])->name('operator.jurusan.update');
        Route::delete('/',[JurusanController::class, 'delete'])->name('operator.jurusan.delete');
    });

    Route::group(['prefix'  => 'manajemen_alumni'],function(){
        Route::get('/',[AlumniController::class, 'index'])->name('operator.alumni');
        Route::get('/tambah_data_alumni',[AlumniController::class, 'add'])->name('operator.alumni.add');
        Route::post('/',[AlumniController::class, 'post'])->name('operator.alumni.post');
        Route::get('/{id}/edit',[AlumniController::class, 'edit'])->name('operator.alumni.edit');
        Route::patch('/',[AlumniController::class, 'update'])->name('operator.alumni.update');
        Route::delete('/',[AlumniController::class, 'delete'])->name('operator.alumni.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/all_siswa',[SiswaController::class, 'allSiswa']);