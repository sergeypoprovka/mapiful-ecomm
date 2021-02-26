<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
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

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('users', UserController::class)->names([
        'index'=>'admin.customers',
        'show'=>'admin.customers.show',
        'store'=>'admin.customers.store',
        'create'=>'admin.customers.create',
        'edit'=>'admin.customers.edit',
        'update'=>'admin.customers.update',
        'destroy'=>'admin.customers.delete'
    ]);
    Route::resource('products', ProductController::class)->names([
        'index'=>'admin.products',
        'show'=>'admin.products.show',
        'store'=>'admin.products.store',
        'create'=>'admin.products.create',
        'edit'=>'admin.products.edit',
        'update'=>'admin.products.update',
        'destroy'=>'admin.products.delete'
    ]);
});