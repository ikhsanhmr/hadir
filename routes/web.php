<?php

use App\Http\Controllers\Dashboard\AcaraController;
use App\Http\Controllers\Frontend\AbsensiController;
use App\Http\Controllers\Frontend\AcaraController as FrontendAcaraController;
use App\Http\Controllers\UsersController;
use App\Models\Acara;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

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

Route::get('/', [AbsensiController::class, 'index']);
Route::get('/absensi/ajax/{id}', [AbsensiController::class, 'fetch'])->name('absensi.ajax');
Route::get('/absensi/{id}', [AbsensiController::class, 'show'])->name('absensi.fetch');
Route::get('/absensi/{id}/exportPDF', [AbsensiController::class, 'exportPDF'])->name('absensi.exportPDF');
Route::post('/absensi/{id}', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/admin/acara/exportPDF/{id}', [AcaraController::class, 'exportPDF'])->name('acara.exportPDF');



    // Auth
    Route::get('/login', function(){
        return view('admin.login');
    })->middleware('guest');
    Route::post('logout', [AbsensiController::class, 'logout'])->name('logout');
    // ADMIN DASHBOARD
    Route::prefix('admin')->group(function(){
        // Master Data
        Route::resource('acara', AcaraController::class)->middleware('auth');

    });
