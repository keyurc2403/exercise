<?php

use Illuminate\Support\Facades\Route;




Route::get('/get_city', [App\Http\Controllers\Auth\RegisterController::class, 'getCity'])->name('get.city');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    //Dashboard
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //Product
    Route::resource('/products', App\Http\Controllers\ProductController::class);

});
