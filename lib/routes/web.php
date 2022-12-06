<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;

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

Route::get('/', [FrontendController::class,'home']);
Route::get('detail/{id}/{slug}.html', [FrontendController::class,'detail']);
Route::post('detail/{id}/{slug}.html', [FrontendController::class,'postComment']);
Route::get('category/{id}/{slug}.html', [FrontendController::class,'category']);
Route::get('search', [FrontendController::class,'search']);
//Cart
Route::get('/cart', [CartController::class,'store']);
Route::post('/save-cart', [CartController::class,'save']);
Route::get('/update-cart', [CartController::class,'update']);
Route::get('/delete-cart/{rowId}', [CartController::class,'delete']);



Route::group(['namespace'=>'Admin'], function(){
    Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'], function(){
        Route::get('/',[LoginController::class,'index']);
        Route::post('/',[LoginController::class,'login']);
    });
    Route::get('logout',[HomeController::class,'logout']);
    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'], function(){
        Route::get('home',[HomeController::class,'index']);

        Route::group(['prefix'=>'category'], function(){
            Route::get('/',[CategoryController::class,'index']);
            Route::post('/',[CategoryController::class,'create']);
            Route::get('edit/{id}',[CategoryController::class,'edit']);
            Route::post('edit/{id}',[CategoryController::class,'update']);
            Route::get('delete/{id}',[CategoryController::class,'destroy']);
        });

        Route::group(['prefix'=>'product'], function(){
            Route::get('/',[ProductController::class,'store']);
            Route::get('add',[ProductController::class,'index']);
            Route::post('add',[ProductController::class,'create']);
            Route::get('edit/{id}',[ProductController::class,'edit']);
            Route::post('edit/{id}',[ProductController::class,'update']);
            Route::get('delete/{id}',[ProductController::class,'destroy']);
        });
    });
});

