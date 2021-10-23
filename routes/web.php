<?php

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
    return view('welcome');
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