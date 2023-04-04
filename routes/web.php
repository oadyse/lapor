<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HilangController;

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// USER
Route::middleware(['auth', 'user-access:user'])->group(function () {
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// ADMIN
Route::middleware(['auth', 'user-access:admin'])->controller(AdminController::class)->group(function () {
  
    Route::get('/admin/home','index')->name('dashboard');

});

// Barang Hilang
Route::middleware(['auth', 'user-access:admin'])->controller(HilangController::class)->group(function () {
  
    Route::get('/admin/barang/hilang', 'index')->name('barang.hilang');
    Route::post('/admin/barang/hilang/page', 'pagination')->name('barang.hilang.page');
    Route::post('/admin/barang/hilang/create', 'create')->name('barang.hilang.create');

    Route::get('/admin/barang/hilang/page', function() {return redirect(route('barang.hilang'));});
    Route::get('/admin/barang/hilang/create', function() {return redirect(route('barang.hilang'));});
});
