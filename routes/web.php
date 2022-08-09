<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RolerController;
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

Route::middleware('checkLoginAdmin')->prefix('admin')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/', 'index')->name('dashboard.index');
    });
    Route::controller(RolerController::class)->group(function(){
        Route::get('/role', 'index')->name('role.index');
        Route::get('/role/create', 'create')->name('role.create');
        Route::post('/role/store', 'store')->name('role.store');
        Route::get('/role/edit/{id}', 'edit')->name('role.edit');
        Route::put('/role/update/{id}', 'update')->name('role.update');
        Route::delete('/role/delete/{id}', 'destroy')->name('role.delete');
    });
    Route::controller(AdminController::class)->group(function(){
        Route::get('/user-admin', 'index')->name('admin.index');
        Route::get('/user-admin/show/{id}', 'show')->name('admin.detail');
        Route::get('/user-admin/create', 'create')->name('admin.create');
        Route::post('/user-admin/store', 'store')->name('admin.store');
        Route::get('/user-admin/edit/{id}', 'edit')->name('admin.edit');
        Route::put('/user-admin/update/{id}', 'update')->name('admin.update');
        Route::delete('/user-admin/delete/{id}', 'destroy')->name('admin.delete');
    });
});

Route::controller(AddressController::class)->group(function(){
    Route::post('/address/get-ciy', 'getCity')->name('getCity');
    Route::post('/address/get-district', 'getDistrict')->name('getDistrict');
    Route::post('/address/get-ward', 'getWard')->name('getWard');
});