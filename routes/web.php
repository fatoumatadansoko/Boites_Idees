<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;

// Redirection de la racine vers l'index des idées
Route::redirect('/', '/idees');

// Route vers l'index des idées
Route::get('/idees', [IdeeController::class, 'index'])->name('idees.index');

// Routes ressources pour les catégories et idées
Route::resource('categories', CategorieController::class);
Route::resource('idees', IdeeController::class)->except('index'); // Exclure l'index des idées pour éviter la redondance


Route::resource('commentaires', CommentaireController::class);

Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');