<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\Product\ProductController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/mensaje' , [MensajeController::class , 'index']);

Route::controller(ProductController::class)->group(function () {
    Route::get('/create' , 'create')->name('product.create');
    Route::post('/create' , 'store');
    Route::get('/update/{id}' , 'update')->name('product.update');
    Route::post('/update' , 'put');
});
