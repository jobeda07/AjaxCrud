<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;



Route::get('/',[AjaxController::class,'ProductPage'])->name('ProductPage');
Route::post('/Storeproduct',[AjaxController::class,'StoreProduct'])->name('Store.Product');
Route::post('/Updateproduct',[AjaxController::class,'UpdateProduct'])->name('Update.Product');
Route::post('/Deleteproduct',[AjaxController::class,'DeleteProduct'])->name('Delete.Product');
Route::get('/pagination/pagination-data',[AjaxController::class,'pagination']);