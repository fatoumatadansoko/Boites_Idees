<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\IdeeController;

// Redirection de la racine vers l'index des idées
Route::redirect('/', '/idees');

// Route vers l'index des idées
Route::get('/idees', [IdeeController::class, 'index'])->name('idees.index');

// Routes ressources pour les catégories et idées
Route::resource('categories', CategorieController::class);
Route::resource('idees', IdeeController::class)->except('index'); // Exclure l'index des idées pour éviter la redondance
