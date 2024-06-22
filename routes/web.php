<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
Route::get('/', [CategorieController::class, 'index']);


Route::resource('categories', CategorieController::class);
