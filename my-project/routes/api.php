<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::post('genres/create', [GenreController::class, 'store']);
Route::get('genres/{id}', [GenreController::class, 'index']);
Route::put('genres/{id}/update', [GenreController::class, 'update']);
Route::delete('genres/{id}/delete', [GenreController::class, 'destroy']);

Route::post('authors/create', [AuthorController::class, 'store']);
Route::get('authors/{id}', [AuthorController::class, 'index']);
Route::patch('authors/{id}/update', [AuthorController::class, 'update']);
Route::delete('authors/{id}/delete', [AuthorController::class, 'destroy']);

Route::post('books/create', [BookController::class, 'store']);
Route::get('books/{id}', [BookController::class, 'index']);
Route::get('books', [BookController::class, 'getAll']);
Route::patch('books/{id}/update', [BookController::class, 'update']);
Route::delete('books/{id}/delete', [BookController::class, 'destroy']);
