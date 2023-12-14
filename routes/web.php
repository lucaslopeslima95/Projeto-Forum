<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SiteController;


Route::delete('/supports/{id}',[SupportController::class,'destroy'])->name('supports.destroy');
Route::put('/supports/{id}',[SupportController::class,'update'])->name('supports.update');
Route::get('/supports/{id}/edit',[SupportController::class,'edit'])->name('supports.edit');
Route::get('/supports/create',[SupportController::class,'create'])->name('supports.create');
Route::get('/supports/{id}',[SupportController::class,'show'])->name('supports.show');
Route::post('/supports',[SupportController::class,'store'])->name('supports.store');
Route::get('/supports',[SupportController::class,'index'])->name('supports.index');
Route::get('/contato',[SiteController::class,'contact']);
