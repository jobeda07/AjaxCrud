<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;



Route::get('/',[AjaxController::class,'ProductPage'])->name('ProductPage');
Route::post('/Storeproduct',[AjaxController::class,'StoreProduct'])->name('Store.Product');