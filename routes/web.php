<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
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



Route::prefix('admin')->group(function(){

    Route::get('/login',[LoginController::class,'index']);
    Route::post('/login',[LoginController::class,'postlogin']);
Route::get('Home',[HomeController::class,'index']);
Route::prefix('categories')->group(function(){
 Route::controller(CategoryController::class)->group(function(){
    Route::get('create','create')->middleware('can:category-add')->name('category.create');
    Route::post('store','store')->name('category.store');
    Route::get('list','list')->middleware('can:category-list');
    Route::get('edit/{id}','edit')->middleware('can:category-edit')->name('category.edit');
    Route::post('update/{id}','update')->name('category.update');
    Route::get('delete/{id}','delete')->middleware('can:category-delete')->name('category.delete');
});
});
Route::prefix('menu')->group(function(){
    Route::controller(MenuController::class)->group(function(){
        Route::get('create','create')->name('menu.create');
        Route::post('store','store')->name('menu.store');
        Route::get('list','list')->middleware('can:menu-list');
        Route::get('edit/{id}','edit')->name('menu.edit');
        Route::post('update/{id}','update')->name('menu.update');
        Route::get('delete/{id}','delete')->name('menu.delete');
    });
    });
Route::prefix('product')->group(function(){
    Route::controller(ProductController::class)->group(function(){
        Route::get('create','create')->name('product.create');
        Route::post('store','store')->name('product.store');
        Route::get('list','list');
        Route::get('edit/{id}','edit')->name('product.edit');
        Route::post('update/{id}','update')->name('product.update');
        Route::get('delete/{id}','delete')->name('product.delete');
        });
        });
Route::prefix('slider')->group(function(){
    Route::controller(SliderController::class)->group(function(){
        Route::get('create','create')->name('slider.create');
        Route::post('store','store')->name('slider.store');
        Route::get('list','list');
        Route::get('edit/{id}','edit')->name('slider.edit');
        Route::post('update/{id}','update')->name('slider.update');
        Route::get('delete/{id}','delete')->name('slider.delete');
        });
        });
Route::prefix('setting')->group(function(){
    Route::controller(SettingController::class)->group(function(){
        Route::get('create','create')->name('setting.create');
        Route::post('store','store')->name('setting.store');
        Route::get('list','list');
        Route::get('edit/{id}','edit')->name('setting.edit');
        Route::post('update/{id}','update')->name('setting.update');
        Route::get('delete/{id}','delete')->name('setting.delete');
        });
        });
Route::prefix('user')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('create','create')->name('user.create');
        Route::post('store','store')->name('user.store');
        Route::get('list','list');
        Route::get('edit/{id}','edit')->name('user.edit');
        Route::post('update/{id}','update')->name('user.update');
        Route::get('delete/{id}','delete')->name('user.delete');
        });
        });
Route::prefix('role')->group(function(){
    Route::controller(RoleController::class)->group(function(){
        Route::get('create','create')->name('role.create');
        Route::post('store','store')->name('role.store');
        Route::get('list','list');
        Route::get('edit/{id}','edit')->name('role.edit');
        Route::post('update/{id}','update')->name('role.update');
        Route::get('delete/{id}','delete')->name('role.delete');
        });
        });
Route::prefix('permission')->group(function(){
    Route::controller(PermissionController::class)->group(function(){
        Route::get('create','create')->name('permission.create');
        Route::post('store','store')->name('permission.store');
        Route::get('list','list');
        Route::get('edit/{id}','edit')->name('permission.edit');
        Route::post('update/{id}','update')->name('permission.update');
        Route::get('delete/{id}','delete')->name('permission.delete');
        });
        });
});