<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HilangController;
use App\Http\Controllers\Admin\TemuanController;
use App\Http\Controllers\Admin\UserController;

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

// Barang Hilang
Route::middleware(['auth', 'user-access:admin'])->controller(TemuanController::class)->group(function () {

    Route::get('/admin/barang/temuan', 'index')->name('barang.temuan');
    Route::post('/admin/barang/temuan/page', 'pagination')->name('barang.temuan.page');
    Route::post('/admin/barang/temuan/create', 'create')->name('barang.temuan.create');

    Route::get('/admin/barang/temuan/page', function() {return redirect(route('barang.temuan'));});
    Route::get('/admin/barang/temuan/create', function() {return redirect(route('barang.temuan'));});
});

Route::middleware(['auth', 'user-access:admin'])->controller(UserController::class)->group(function () {

    Route::get('/admin/user', 'index')->name('user');
    Route::get('/admin/user/detail/{id?}', 'getById')->name('user.detail');
    Route::post('/admin/user/page', 'pagination')->name('user.page');
    Route::post('/admin/user/create', 'create')->name('user.create');
    Route::post('/admin/user/update', 'update')->name('user.update');
    Route::post('/admin/user/delete', 'delete')->name('user.delete');

    Route::get('/admin/user/detail', function() {return redirect(route('user'));});
    Route::get('/admin/user/page', function() {return redirect(route('user'));});
    Route::get('/admin/user/create', function() {return redirect(route('user'));});
    Route::get('/admin/user/update', function() {return redirect(route('user'));});
    Route::get('/admin/user/delete', function() {return redirect(route('user'));});
});
