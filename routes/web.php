<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RolerController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\LoginController;
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

/* 
**
** Route Customer
**
*/





/* 
**
** Route Admin
**
*/
Route::controller(LoginController::class)->group(function(){
    Route::get('/admin/login', 'index')->name('login.index');
    Route::post('/admin/login/login', 'login')->name('login.login');
    Route::get('/admin/logout', 'logout')->name('login.logout');
});
Route::middleware('checkLoginAdmin')->prefix('admin')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/', 'index')->name('dashboard.index');
    });
    Route::middleware('checkRoleAdmin')->group(function(){
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
        Route::controller(SlideController::class)->group(function(){
            Route::get('/slide/create', 'create')->name('slide.create');
            Route::post('/slide/store', 'store')->name('slide.store');
            Route::get('/slide/show/{id}', 'show')->name('slide.detail');
            Route::get('/slide/edit/{id}', 'edit')->name('slide.edit');
            Route::put('/slide/update/{id}', 'update')->name('slide.update');
            Route::delete('/slide/delete/{id}', 'destroy')->name('slide.delete');
        });
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/category/create', 'create')->name('category.create');
            Route::post('/category/store', 'store')->name('category.store');
            Route::get('/category/edit/{id}', 'edit')->name('category.edit');
            Route::put('/category/update/{id}', 'update')->name('category.update');
            Route::delete('/category/delete/{id}', 'destroy')->name('category.delete');
        });
        Route::controller(ProductController::class)->group(function(){
            Route::get('/product/create', 'create')->name('product.create');
            Route::get('/product/show/{id}', 'show')->name('product.detail');
            Route::post('/product/store', 'store')->name('product.store');
            Route::get('/product/edit/{id}', 'edit')->name('product.edit');
            Route::put('/product/update/{id}', 'update')->name('product.update');
            Route::delete('/product/delete/{id}', 'destroy')->name('product.delete');
        });
        Route::controller(CustomerController::class)->group(function(){
            Route::get('/customer/create', 'create')->name('customer.create');
            Route::post('/customer/store', 'store')->name('customer.store');
            Route::get('/customer/edit/{id}', 'edit')->name('customer.edit');
            Route::put('/customer/update/{id}', 'update')->name('customer.update');
            Route::delete('/customer/delete/{id}', 'destroy')->name('customer.delete');
        });
        Route::controller(OrderController::class)->group(function(){
            Route::get('/order/create', 'create')->name('order.create');
            Route::post('/order/store', 'store')->name('order.store');
            Route::delete('/order/delete/{id}', 'destroy')->name('order.delete');
        });
        Route::controller(OrderDetailController::class)->group(function(){
            Route::get('/order-detail/create', 'create')->name('orderDetail.create');
            Route::post('/order-detail/store', 'store')->name('orderDetail.store');
            Route::delete('/order-detail/delete/{id}', 'destroy')->name('orderDetail.delete');
        });
    });
    Route::controller(AdminController::class)->group(function(){
        Route::get('/user-admin/show/{id}', 'show')->name('admin.detail');
    });
    Route::controller(SlideController::class)->group(function(){
        Route::get('/slide', 'index')->name('slide.index');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category', 'index')->name('category.index');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product', 'index')->name('product.index');
    });
    Route::controller(CustomerController::class)->group(function(){
        Route::get('/customer', 'index')->name('customer.index');
    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('/order', 'index')->name('order.index');
        Route::get('/order/edit/{id}', 'edit')->name('order.edit');
        Route::put('/order/update/{id}', 'update')->name('order.update');
    });
    Route::controller(OrderDetailController::class)->group(function(){
        Route::get('/order-detail', 'index')->name('orderDetail.index');
        Route::get('/order-detail/edit/{id}', 'edit')->name('orderDetail.edit');
        Route::put('/order-detail/update/{id}', 'update')->name('orderDetail.update');
    });
});


/* 
**
** Route Public
**
*/
Route::controller(AddressController::class)->group(function(){
    Route::post('/address/get-ciy', 'getCity')->name('getCity');
    Route::post('/address/get-district', 'getDistrict')->name('getDistrict');
    Route::post('/address/get-ward', 'getWard')->name('getWard');
});