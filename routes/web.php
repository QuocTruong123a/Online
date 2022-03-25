<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuController;
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
Route::prefix('admin')->group(function(){
Route::get('Home',[HomeController::class,'index']);
Route::prefix('categories')->group(function(){
Route::controller(CategoryController::class)->group(function(){
    Route::get('create','create')->name('category.create');
    Route::post('store','store')->name('category.store');
    Route::get('list','list');
    Route::get('edit/{id}','edit')->name('category.edit');
    Route::post('update/{id}','update')->name('category.update');
    Route::get('delete/{id}','delete')->name('category.delete');
});
});
Route::prefix('menu')->group(function(){
    Route::controller(MenuController::class)->group(function(){
        Route::get('create','create')->name('menu.create');
        Route::post('store','store')->name('menu.store');
        Route::get('list','list');
        Route::get('edit/{id}','edit')->name('menu.edit');
        Route::post('update/{id}','update')->name('menu.update');
        Route::get('delete/{id}','delete')->name('menu.delete');
    });
    });
});